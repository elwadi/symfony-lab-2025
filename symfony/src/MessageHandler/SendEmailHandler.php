<?php

namespace App\MessageHandler;

use App\Entity\Email;
use App\Message\SendEmail;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class SendEmailHandler
{
    public function __construct(private ManagerRegistry $managerRegistry) {

    }
    public function __invoke(SendEmail $message): void
    {
        sleep(1);

        $entityManager = $this->managerRegistry->getManager();
        $selectedEmail = $entityManager->getRepository(Email::class)->findOneBy(['id' => $message->getIdEmail()]);
        if($selectedEmail instanceof Email){
            //traitement d'envoi d'email

            $selectedEmail->setStatus(true);
            $entityManager->persist($selectedEmail);
            $entityManager->flush();
        }
    }
}
