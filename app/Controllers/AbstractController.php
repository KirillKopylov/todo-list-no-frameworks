<?php


namespace App\Controllers;


use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

abstract class AbstractController
{
    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(getcwd() . '/app/Views');
        $this->twig = new Environment($loader);
    }

    public function render(string $view, array $data = []): string
    {
        try {
            return $this->twig->render($view, $data);
        } catch (LoaderError | RuntimeError | SyntaxError $e) {
            return $e->getMessage();
        }
    }
}