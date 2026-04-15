<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Kernel;
use Symfony\Component\HttpFoundation\Request;

$kernel = new Kernel('dev', true);
$kernel->boot();
$container = $kernel->getContainer();
$entityManager = $container->get('doctrine.orm.entity_manager');

$utilisateurRepository = $entityManager->getRepository('App\Entity\Utilisateur');
$pointssoldeRepository = $entityManager->getRepository('App\Entity\Pointssolde');

$utilisateurs = $utilisateurRepository->findAll();

foreach ($utilisateurs as $utilisateur) {
    $pointsSolde = $pointssoldeRepository->findOneBy(['utilisateur' => $utilisateur]);
    
    if (!$pointsSolde) {
        $pointsSolde = new \App\Entity\Pointssolde();
        $pointsSolde->setUtilisateur($utilisateur);
        $pointsSolde->setSolde(0);
        $pointsSolde->setDateCreation(new \DateTime());
        $pointsSolde->setDateModification(new \DateTime());
        $entityManager->persist($pointsSolde);
        echo "✅ Points initialisés pour: " . $utilisateur->getNom() . "\n";
    } else {
        echo "ℹ️ Points déjà existants pour: " . $utilisateur->getNom() . " (" . $pointsSolde->getSolde() . " points)\n";
    }
}

$entityManager->flush();
echo "\n✅ Initialisation terminée !\n";