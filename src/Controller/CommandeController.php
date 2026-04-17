<?php

namespace App\Controller;

use App\Repository\CommandRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/mes-commandes')]
class CommandeController extends AbstractController
{
    // ... le reste de votre code
}