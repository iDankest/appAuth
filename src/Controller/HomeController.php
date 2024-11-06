<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(): Response
    {
        return $this->render('home/dashboard.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/admin', name: 'admin')]
    public function admin(AuthorizationCheckerInterface $authChecker): Response
    {
        if (!$authChecker->isGranted('ROLE_ADMIN')) {
            return $this->render('home/index.html.twig', [
                'controller_name' => 'HomeController',
            ]);
         }
        return $this->render('home/admin.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
