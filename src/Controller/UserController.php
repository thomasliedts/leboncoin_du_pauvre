<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class UserController extends AbstractController
{
    /**
     * @Route("/users/{userId}")
     * @return Response
     */
    public function userDetail($userId)
    {

        $user = new User();
        $user->setUserId($userId);
        $user->setUsername("testName");
        $user->setEmail("test@test.test");
        $user->setPassword("testPass");
        $user->setIsAdmin(false);

        return $this->render('user.html.twig',[
            'description'=> sprintf('C\'est la page de : %s', $user->getUsername()),
            'username'=>$user->getUsername(),
            'email'=> $user->getEmail(),
            'isAdmin'=> $user->isAdmin(),
        ]);
    }
}