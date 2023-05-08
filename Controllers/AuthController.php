<?php

namespace Controllers;

use Models\Auth;
use \Views\LoginView;
use Views\RegistrationView;

class AuthController
{
    public function getLoginView(): void
    {
        LoginView::render();
    }

    public function getRegistrationView()
    {
        RegistrationView::render();
    }

    public function login($data)
    {
        Auth::login($data);
    }

    public function logout()
    {
        Auth::logout();
    }

    public function registration($data)
    {
        Auth::registration($data);
    }
}