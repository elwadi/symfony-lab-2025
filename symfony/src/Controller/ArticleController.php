<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(ManagerRegistry $managerRegistry): Response
    {
        $liste=$managerRegistry->getManager()->getRepository(Article::class)->findAll();
        dd($liste);
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $liste
        ]);
    }

    #[Route('/article/create', name: 'app_article_create')]
    public function create(ManagerRegistry $managerRegistry): Response
    {
        $article= new Article();
        $article->setTitle('test');
        $article->setContent('test content');

        $managerRegistry->getManager()->persist($article);
        $managerRegistry->getManager()->flush();
        dd($article);
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
}
