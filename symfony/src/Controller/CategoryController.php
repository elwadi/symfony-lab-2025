<?php

namespace App\Controller;

use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }


    #[Route('/category/create', name: 'app_category_create')]
    public function create(): Response
    {
        $data=[];
        $data['form']=$this->createForm(CategoryType::class)->createView();

        return $this->render('category/create.html.twig', $data);
    }
}
