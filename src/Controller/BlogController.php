<?php

namespace App\Controller;

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
    public function mainPage() : Response
    {
        /**
         * ->findAll() przepisałem z kursu */
        $articles = $this->articleRepository->findAll();

        /**dd() dump and die
         *      Po wykonaniu w oknie wyświetli nam się to co chcemy, ale strona nie będzie się ładować         */
        // dd($articles);
        /**dump() do profilera*/
        dump($articles);

        // return new Response(content: '<h1>Tu będą wyświetlane artykuły</h1>');
        return $this->render(view: 'test.html.twig');
    }
}