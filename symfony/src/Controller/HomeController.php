<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {
        $vars=[
            'controller_name' => 'HomeController',
            'title' => 'Home'
        ];
       

        return $this->render('home/index.html.twig', $vars);
    }


    #[Route('/page2', name: 'app_page2')]
    public function page2(): Response
    {
        return $this->render('home/page2.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
