<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Service\ArticleProvider;
use App\Service\ImageProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{

    /** Na kursie opisali to jako wstrzykiwanie zależności.
     * Wstrzyknęliśmy usługę ArticleRepository do kontorlera i możemy z niej korzystać */
    public function __construct(
        private ArticleRepository $articleRepository,
        private ArticleProvider $articleProvider,
        private ImageProvider $imageProvider
    )
    {
    }

    #[Route(path: '/articles' , name: 'blog-articles')]
    public function showArticles() : Response
    {
        $articles = $this->articleRepository->findAll();

        $params = [];
        if ($articles) $params = $this->articleProvider->transformDataForTwig($articles);

        return $this->render(
            view: 'blog/articles.html.twig',
            parameters: $params);
    }

    #[Route(path: '/article/{article}' , name: 'blog-article')]
    public function showArticle(Article $article) : Response
    {
        $params = [
            'article' => $this->articleProvider->prepareOneArticle($article)
        ];

        dump($params);

        return $this->render(
            view: 'blog/article.html.twig',
            parameters: $params
        );
    }
}