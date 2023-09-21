<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    public function __construct(
        private ContactRepository $contactRepository
    )
    {
    }


    #[Route('/contact', name: 'blog-contact')]
    public function index(): Response
    {
        $contactInfo = $this->contactRepository->findAll();

        $params = [
            'contactInfo' => $contactInfo
        ];

        return $this->render('contact/index.html.twig', $params);
    }
}
