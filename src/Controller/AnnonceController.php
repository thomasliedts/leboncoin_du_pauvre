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
        return $this->render('annonce.html.twig',[
            'annonce'=> sprintf('Vous regardez l\'annonce de vente d\'%s', $mon_annonce)
        ]);
    }
}