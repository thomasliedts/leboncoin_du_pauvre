<?php

namespace App\Controller;

use App\Entity\Anno;
use App\Entity\CommentThread;
use App\Form\AnnonceFormType;
use App\Repository\SaleRepository;
use Doctrine\ORM\EntityManagerInterface;
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
    public function createSale(Request $request)
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
     * @Route("/annonce/{saleId}")
     * @return Response
     */
    public function showSale($saleId, EntityManagerInterface $manager)
    {

        $saleRepository = $manager->getRepository(SaleRepository::class);
        $sale = $saleRepository->findOneBy(['id' => $saleId]);
        $commentRepository = $manager->getRepository(CommentThread::class);
        $threads = $commentRepository->findBy(['threadId' => $sale->getCommentThreadId]);

        return $this->render('annonce.html.twig', [
            'annonce' => sprintf('Vous regardez l\'annonce de vente d\'%s', $sale->getTitle()),
            'prix' => $sale->getPrice(),
            'description' => $sale->getDescription(),
            'image' => $sale->getImageUrl(),
            'etiquette' => $sale->getTag(),
            'dateDePublication' => $sale->getPublishDate(),
            'commentThreads' => $threads
        ]);
    }
}