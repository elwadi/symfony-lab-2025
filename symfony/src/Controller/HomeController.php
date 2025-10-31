<?php

namespace App\Controller;

use App\Message\Notification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
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
    
    #[Route('/notification', name: 'app_notification')]
    public function notification(MessageBusInterface $bus): Response
    {
        for ($i = 0; $i < 10; $i++) {
            $bus->dispatch(new Notification('Notification test '.time()));
        }

        return $this->render('home/page2.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
