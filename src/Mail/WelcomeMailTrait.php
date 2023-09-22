<?php

namespace App\Mail;

trait WelcomeMailTrait
{
    public function getSubject() : string
    {
        return "Hello {$this->userName}! You have been registered!";
    }

    public function getHtmlWelcomeMail() : string
    {
        return <<<HTML
            <h1>Hello {$this->userName}!</h1>
            <p>Lorem ipsum dolor es</p>
            <p>Przykładowy to tekst jest!</p>
        HTML;
    }

    public function getAltTextWelcomeMail() : string
    {
        return "Hello {$this->userName}! This is example alt text for slow connections!";
    }
}
