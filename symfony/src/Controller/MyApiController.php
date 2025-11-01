<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MyApiController extends AbstractController
{
    #[Route('/my/api', name: 'app_my_api')]
    public function index(): JsonResponse
    {
        return new JsonResponse([
            'message'=>"Hello world"
        ]);
    }
}
