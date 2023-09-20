<?php

namespace App\Controller;

use App\Repository\AboutMeInfoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutMeController extends AbstractController
{
    public function __construct(
        private AboutMeInfoRepository $aboutMeInfoRepository,
    )
    {
    }


    #[Route('/about-me', name: 'about-me')]
    public function index(): Response
    {
        $informations = $this->aboutMeInfoRepository->findAll();

        $params = [
            'informations' => $informations
        ];

        return $this->render('about_me/index.html.twig', $params);
    }
}
