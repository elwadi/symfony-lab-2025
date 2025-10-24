<?php

namespace App\Controller;

use App\Entity\Email;
use App\Message\SendEmail;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(MessageBusInterface $bus,ManagerRegistry $managerRegistry): Response
    {
        for ($i = 0; $i < 100; $i++) {
            
            $email = new Email();
            $email->setDestination('contact@isga.ma');
            $email->setContent('Email test content '.time());
            $email->setStatus(false);
            $managerRegistry->getManager()->persist($email);
            $managerRegistry->getManager()->flush();

            $bus->dispatch(new SendEmail($email->getId()));
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
