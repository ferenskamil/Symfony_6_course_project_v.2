<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{

    /** Na kursie opisali to jako wstrzykiwanie zależności.
     * Wstrzyknęliśmy usługę ArticleRepository do kontorlera i możemy z niej korzystać */
    public function __construct(
        private ArticleRepository $articleRepository
    )
    {
    }

    #[Route(path: '/articles' , name: 'blog-articles')]
    public function showArticles() : Response
    {
        /**
         * ->findAll() przepisałem z kursu */
        $articles = $this->articleRepository->findAll();

        /**dd() dump and die
         *      Po wykonaniu w oknie wyświetli nam się to co chcemy, ale strona nie będzie się ładować         */
        // dd($articles);
        /**dump() do profilera*/
        dump($articles);

        foreach ($articles as $article) {
            $params['articles'][] = [
                'title' => $article->getTitle(),
                'content' => substr($article->getContent() , 0 , 30) . '...',
                'link' => "article/{$article->getId()}"
            ];
        }

        return $this->render(
            view: 'articles.html.twig',
            parameters: $params);
    }

    #[Route(path: '/article/{article}' , name: 'blog-article')]
    public function showArticle(Article $article) : Response
    {
        $params = [
            'article' => $article
        ];

        return $this->render('article.html.twig' , $params);
    }
}