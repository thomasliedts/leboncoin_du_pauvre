<?php

namespace App\Controller;

use App\Entity\trucsjnfcvsez;
use App\Form\LoginFormType;
use App\Form\SignupFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class UserController extends AbstractController
{
    /**
     * @Route("/users/signup")
     * @return Response
     */
    public function userSignUp(Request $request)
    {
        $signUpForm = $this->createForm(SignupFormType::class);
        $signUpForm->handleRequest($request);
        if ($signUpForm->isSubmitted() && $signUpForm->isValid()) {
            dd($signUpForm->getData()); //todo handle fixtures or wtv?
        }
        return $this->render('signup.html.twig', [
            'signUpForm' => $signUpForm->createView()
        ]);
    }

    /**
     * @Route("/users/login")
     * @return Response
     */
    public function userLogIn(Request $request)
    {
        $loginForm = $this->createForm(LoginFormType::class);
        $loginForm->handleRequest($request);
        if ($loginForm->isSubmitted() && $loginForm->isValid()) {
            dd($loginForm->getData()); //todo handle fixtures or wtv?
        }
        return $this->render('login.html.twig', [
            'loginForm' => $loginForm->createView()
        ]);
    }

    /**
     * @Route("/users/{userId}")
     * @return Response
     */
    public function userDetail($userId)
    {

        $user = new trucsjnfcvsez();
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