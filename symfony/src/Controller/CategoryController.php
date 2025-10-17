<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function create(Request $request, ManagerRegistry $managerRegistry): Response
    {

        if($request->isMethod('POST')) {
            $category = new Category();
            $form = $this->createForm(CategoryType::class, $category);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $managerRegistry->getManager()->persist($category);
                $managerRegistry->getManager()->flush();
                dd($category);

            } 
        }
        $data=[];
        $data['form']=$this->createForm(CategoryType::class)->createView();

        return $this->render('category/create.html.twig', $data);
    }
}
