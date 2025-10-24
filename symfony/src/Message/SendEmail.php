<?php

namespace App\Message;

use Symfony\Component\Messenger\Attribute\AsMessage;

#[AsMessage('async')]
final class SendEmail
{

    public function __construct(
         private string $content
    ) {

    }

     public function getContent(): string
    {
        return $this->content;
    }
}
