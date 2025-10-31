<?php

namespace App\MessageHandler;

use App\Message\Notification;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class NotificationHandler
{
    public function __invoke(Notification $message): void
    {
        // do something with your message
        echo $message->getNotification();
    }
}
