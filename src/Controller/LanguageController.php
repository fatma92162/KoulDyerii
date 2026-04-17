<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LanguageController extends AbstractController
{
    #[Route('/set-locale/{locale}', name: 'app_set_locale')]
    public function setLocale($locale, Request $request): Response
    {
        if (!in_array($locale, ['fr', 'en'])) {
            $locale = 'fr';
        }
        $request->getSession()->set('_locale', $locale);
        return $this->redirect($request->headers->get('referer') ?: $this->generateUrl('app_home'));
    }
}