<?php

namespace App\Controller;

class ErrorController extends AbstractController
{
    public function error404(): void
    {
        session_start();
        $this->renderError(404);
    }
}