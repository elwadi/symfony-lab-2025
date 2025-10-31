<?php

namespace App\Message;

use Symfony\Component\Messenger\Attribute\AsMessage;

#[AsMessage('async')]
final class Notification
{
    
    public function __construct(
         private string $notification
    ) {

    }

     public function getNotification(): string
    {
        return $this->notification;
    }
}
