<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonce/{mon_annonce}")
     * @return Response
     */

    public function showAnnonce($mon_annonce)
    {
        $prix = 35;
        $description = 'coucou je suis une description';
        $image = 'coucou je serai l\'image';
        $dateDePublication = 'bonjour je serai la date de publication';
        $etiquette = 'fleurs';
        $commentThreads = [
            ["Commentaire de base 1", ["Réponse 1"]],
            ["Commentaire de base 2", ["Réponse 2", "Réponse 3"]],
            ["Commentaire de base 3", []]
        ];

        return $this->render('annonce.html.twig', [
            'annonce' => sprintf('Vous regardez l\'annonce de vente d\'%s', $mon_annonce),
            'prix' => $prix,
            'description' => $description,
            'image' => $image,
            'etiquette' => $etiquette,
            'dateDePublication' => $dateDePublication,
            'commentThreads' => $commentThreads
        ]);
    }
}