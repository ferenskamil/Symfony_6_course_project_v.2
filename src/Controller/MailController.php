<?php

namespace App\Controller;

use App\Service\MailProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;

class MailController extends AbstractController
{

    public function __construct(
        private MailProvider $mailProvider,
        private MailerInterface $mailerInterface
    )
    {
    }

    #[Route('/mail', name: 'register-welcome-mail')]
    public function index(): Response
    {
        /** Get info from DB - here is test example */
        $userName = 'Kamil879';
        $userEmail = 'testowedev123@gmail.com';

        /** Send welcome email*/
        $this->mailProvider->sendWelcomeMail($this->mailerInterface, $userName, $userEmail);

        /** Pass parameters to display*/
        $params = [
            'controller_name' => 'MailController',
            'html' => $this->mailProvider->getHtmlWelcomeMail()
        ];

        /** Render page */
        return $this->render('mail/index.html.twig', $params);
    }
}
