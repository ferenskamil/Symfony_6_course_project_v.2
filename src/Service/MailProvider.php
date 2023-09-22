<?php

namespace App\Service;

use App\Mail\WelcomeMailTrait;

class MailProvider
{
    use WelcomeMailTrait;

    private string $html;
    private string $altText;

    public function sendWelcomeMail() : void
    {
        $this->html = $this->getHtmlWelcomeMail();
        $this->altText = $this->getAltTextWelcomeMail();
    }
}