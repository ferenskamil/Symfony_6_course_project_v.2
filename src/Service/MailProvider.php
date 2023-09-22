<?php

namespace App\Service;

use App\Mail\WelcomeMailTrait;
use Exception;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Throwable;

class MailProvider
{
    use WelcomeMailTrait;

    private string $userName;
    private string $userEmail;


    public function sendWelcomeMail(MailerInterface $mailer, string $userName, string $userEmail) : void
    {
        $this->userEmail = $userEmail;
        $this->userName = $userName;

        $senderMail = 'testowedev123@gmail.com';

        $html = $this->getHtmlWelcomeMail();
        $altText = $this->getAltTextWelcomeMail();
        $subject = $this->getSubject();

        try {
            $email = (new Email())
            ->from($senderMail)
            ->to($userEmail)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject($subject)
            ->text($altText)
            ->html($html);

            $mailer->send($email);
        } catch (Throwable $th) {
            throw new Exception("Email could not be send | " . $th->getMessage());
        }
    }
}