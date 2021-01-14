<?php


namespace App\Controllers;


use App\Services\LoginService;

class LoginController extends AbstractController
{
    private LoginService $loginService;

    public function __construct()
    {
        $this->loginService = new LoginService;
    }

    public function getLogin()
    {
        $this->loginService->login();
        $this->redirectBack();
    }

    public function getLogout()
    {
        $this->loginService->logout();
        $this->redirectBack();
    }
}