<?php

namespace App\Message;

use Symfony\Component\Messenger\Attribute\AsMessage;

#[AsMessage('async')]
final class SendEmail
{

    public function __construct(
         private string $idEmail
    ) {

    }

     public function getIdEmail(): string
    {
        return $this->idEmail;
    }
}
