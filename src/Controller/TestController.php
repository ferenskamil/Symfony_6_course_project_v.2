<?php

/** 1) Ustawiamy namespace
 *      By można było odszukać kontroler
 */
namespace App\Controller;

/** 2) Importy */
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/** Kontroler
 *  a) 1 klasa na plik (metod dowodlna ilość)
 *  b) Rozszerza AbstarctController
 *  c) Routing w atrybucie:
 *      - 1 atrybut do każdej metody
 *      - 1szy parametr - ścieżka, którą uzytkownik wpisuje w przeglądarce
 *      - 2gi parametr - nazwa routa do użytku kodzie
 *  d) Ta konkretna metoda zwraca "Response", co wyświetli content, który przekażemy jako parametr */
class TestController extends AbstractController
{
    #[Route('/test', name: 'test_index')]
    public function index() : Response
    {
        return new Response('Hello World<h1>HELLO WORLD</h1>');
    }
}