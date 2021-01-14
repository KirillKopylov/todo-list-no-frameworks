<?php


namespace App\Controllers;


use App\Views\Engines\Twig;

abstract class AbstractController
{
    protected function render(string $view, array $data = []): string
    {
        $twig = new Twig;
        return $twig->render($view, $data);
    }

    protected function redirectBack()
    {
        $previousPage = $_SERVER['HTTP_REFERER'];
        if ($previousPage) {
            header("Location: $previousPage");
        } else {
            header('Location: /');
        }
    }
}