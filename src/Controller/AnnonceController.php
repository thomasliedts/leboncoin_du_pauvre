<?php

namespace App\Controller;

use App\Entity\Anno;
use App\Entity\CommentThread;
use App\Form\AnnonceFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnonceController extends AbstractController
{

    /**
     * @Route("/annonce/create_annonce")
     * @return Response
     */
    public function createAnnonce(Request $request)
    {
        $annonceForm = $this->createForm(AnnonceFormType::class);
        $annonceForm->handleRequest($request);
        if ($annonceForm->isSubmitted() && $annonceForm->isValid()) {
            dd($annonceForm->getData()); //todo handle fixtures or wtv?
        }
        return $this->render('createAnnonce.html.twig', [
            'createAnnonceForm' => $annonceForm->createView()
        ]);
    }

    /**
     * @Route("/annonce/{mon_annonce}")
     * @return Response
     */
    public function showAnnonce($mon_annonce)
    {
        $annonce = new Anno();
        $annonce->setTitre($mon_annonce);
        $annonce->setPrix(35);
        $annonce->setDescription('coucou je suis une description');
        $annonce->setImageUrl('coucou je serai l\'image');
        $annonce->setPublicationDate('bonjour je serai la date de publication');
        $annonce->setEtiquette('fleurs');

        $commentThreads1 = new CommentThread();
        $commentThreads1->setComment("Commentaire de base 1");
        $commentThreads1->setAnswers(["Réponse 1"]);

        $commentThreads2 = new CommentThread();
        $commentThreads2->setComment("Commentaire de base 2");
        $commentThreads2->setAnswers(["Réponse 2", "Réponse 3"]);

        $commentThreads3 = new CommentThread();
        $commentThreads3->setComment("Commentaire de base 3");
        $commentThreads3->setAnswers([]);

        $annonce->setCommentThreads([$commentThreads1, $commentThreads2, $commentThreads3]);

        return $this->render('annonce.html.twig', [
            //TODO change annonce later
            'annonce' => sprintf('Vous regardez l\'annonce de vente d\'%s', $annonce->getTitre()),
            'prix' => $annonce->getPrix(),
            'description' => $annonce->getDescription(),
            'image' => $annonce->getImageUrl(),
            'etiquette' => $annonce->getEtiquette(),
            'dateDePublication' => $annonce->getPublicationDate(),
            'commentThreads' => $annonce->getCommentThreads()
        ]);
    }
}