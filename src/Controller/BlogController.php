<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route(path: '/articles' , name: 'blog-articles')]
    public function mainPage() : Response
    {
        return new Response(content: '<h1>Tu będą wyświetlane artykuły</h1>');
    }
}