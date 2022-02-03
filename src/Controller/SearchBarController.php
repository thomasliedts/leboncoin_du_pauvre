<?php

namespace App\Controller;

use App\Form\SearchFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class SearchBarController extends AbstractController
{
    public function findArticlesByName($query){


        return new JsonResponse([

        ]);
    }

    public function createSearchForm(Request $request): FormInterface
    {
        $searchForm = $this->createForm(SearchFormType::class);
        $searchForm->handleRequest($request);
        if ($searchForm->isSubmitted() && $searchForm->isValid()) {
            dd($searchForm->getData()); //todo handle fixtures or wtv?
        }
        return $searchForm;
    }
}