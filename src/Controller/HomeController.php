<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class HomeController extends AbstractController
{
/**
 * @Route("/")
 * @return Response
 */

    public function homepage()
    {
        return new Response(content: 'Tu vas etre ma home pas');
    }

    /**
     * @Route("/questions/{my_question}")
     * @return Response
     */
    public function show($my_question)
    {

        $answers =  [
            'premiere reponse',
            'deuxieme reponse',
            'j\'ai eu un kirlia shiny'
        ];

        return $this->render('show.html.twig',[
            'question'=> sprintf('La question posée est : %s', $my_question),
            'answers' => $answers
        ]);
    }
}