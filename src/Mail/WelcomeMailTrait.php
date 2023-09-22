<?php

namespace App\Mail;

trait WelcomeMailTrait
{
    /**Zmienne z informacjami do wstawienia do tekstu */

    public function getHtmlWelcomeMail() : string
    {

        /** pobiera info ze zmiennych */
        return <<<HTML
            <p>Lorem ipsum dolor es</p>
            <p>Przykładowy to tekst jest!</p>
        HTML;
    }

    public function getAltTextWelcomeMail() : string
    {
        /** pobiera info ze zmiennych */
        return 'Example alt text for slow connections!';
    }
}
