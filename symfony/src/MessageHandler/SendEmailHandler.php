<?php

namespace App\MessageHandler;

use App\Message\SendEmail;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class SendEmailHandler
{
    public function __invoke(SendEmail $message): void
    {
        sleep(1);
        echo $message->getContent();
    }
}
