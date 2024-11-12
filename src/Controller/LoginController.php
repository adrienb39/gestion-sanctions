<?php

namespace App\Controller;

class LoginController extends AbstractController {
    public function index(): void {
        $this->render('account/login');
    }
}
