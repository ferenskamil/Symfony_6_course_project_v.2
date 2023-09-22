<?php

namespace App\Controller;

use App\Service\MailProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{

    public function __construct(
        private MailProvider $mailProvider
    )
    {
    }

    #[Route('/mail', name: 'register-welcome-mail')]
    public function index(): Response
    {
        /** kontroloer decyduje o tym, żeby wysłac maila i więcej go nie interesuje */
        $this->mailProvider->sendWelcomeMail();

        /** kontroloer przekazuje to co ma być wyświetlone użytkownikowi  */
        $params = [
            'controller_name' => 'MailController',
            'html' => $this->mailProvider->getHtmlWelcomeMail()
        ];

        return $this->render('mail/index.html.twig', $params);
    }
}
