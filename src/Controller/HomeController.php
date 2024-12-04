<?php

namespace App\Controller;

class HomeController extends AbstractController
{
    public function index(): void
    {
        session_start();
        $this->render('home/index');
    }

    public function legal(): void
    {
        session_start();
        $this->render('home/legal');
    }

    public function accueil(): void
    {
        session_start();
        $this->render('home/accueil');
    }
}