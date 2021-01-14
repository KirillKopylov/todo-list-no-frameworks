<?php


namespace App\Services;


class LoginService
{
    public function login()
    {
        setcookie('admin', 123, time() + 3600, '/');
    }

    public function logout()
    {
        setcookie('admin', FALSE, -1, '/', $_SERVER['SERVER_NAME']);
    }
}