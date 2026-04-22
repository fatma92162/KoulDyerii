<?php

namespace App\Controller;

use App\Service\ClipdropImageEditor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AiImageController extends AbstractController
{
    #[Route('/ai-image/edit', name: 'app_ai_image_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ClipdropImageEditor $editor): Response
    {
        $result = null;
        $error = null;

        if ($request->isMethod('POST')) {
            /** @var UploadedFile|null $image */
            $image = $request->files->get('image');
            /** @var UploadedFile|null $mask */
            $mask = $request->files->get('mask');

            $action = (string) $request->request->get('action', 'remove_background');
            $prompt = trim((string) $request->request->get('prompt', ''));

            if (!$image) {
                $error = 'Please upload an image.';
            } else {
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'];
                if (!in_array($image->getMimeType(), $allowedMimeTypes, true)) {
                    $error = 'Only JPG, PNG, and WEBP images are allowed.';
                }
            }

            if ($action === 'replace_background' && $prompt === '') {
                $error = 'A prompt is required for background replacement.';
            }

            if ($action === 'cleanup' && !$mask) {
                $error = 'A mask image is required for cleanup.';
            }

            if (!$error) {
                $tmpDir = $this->getParameter('kernel.project_dir') . '/var/ai-inputs';
                if (!is_dir($tmpDir)) {
                    mkdir($tmpDir, 0775, true);
                }

                $imageName = uniqid('input_', true) . '.' . ($image->guessExtension() ?: 'png');
                $image->move($tmpDir, $imageName);
                $imagePath = $tmpDir . '/' . $imageName;

                $maskPath = null;
                if ($mask) {
                    $maskName = uniqid('mask_', true) . '.' . ($mask->guessExtension() ?: 'png');
                    $mask->move($tmpDir, $maskName);
                    $maskPath = $tmpDir . '/' . $maskName;
                }

                try {
                    $result = $editor->edit($imagePath, $action, $prompt, $maskPath);
                } catch (\Throwable $e) {
                    $error = $e->getMessage();
                } finally {
                    if (isset($imagePath) && is_file($imagePath)) {
                        @unlink($imagePath);
                    }

                    if ($maskPath && is_file($maskPath)) {
                        @unlink($maskPath);
                    }
                }
            }
        }

        return $this->render('ai_image/edit.html.twig', [
            'result' => $result,
            'error' => $error,
        ]);
    }
}
