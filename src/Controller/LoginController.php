<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\User;

class LoginController extends AbstractController
{

    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // Juste pour remplir un User pour la première utilisation du script, à ne pas utiliser dans la vrai vie
        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findAll();
        if(!$users)
        {
            $entityManager = $this->getDoctrine()->getManager();
            $user = new User();
            $user->setEmail("logistique@gmail.com");
            $user->setRoles(["ROLE_LOGISTIQUE"]);
            $user->setPassword('$2y$13$XzxAgnIAwq6NK2NfJtrapu0LRgLBLfLJ9tmZB.xvWvYojlNoSEPGq');
            $entityManager->persist($user);
            $entityManager->flush();
        }
        
        // obtenir l'erreur de connexion s'il y en a une
         $error = $authenticationUtils->getLastAuthenticationError();
        // dernier nom d'utilisateur taper par l'utilisateur
         $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }
}
