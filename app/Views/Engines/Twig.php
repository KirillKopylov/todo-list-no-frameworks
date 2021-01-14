<?php


namespace App\Views\Engines;


use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Twig implements RenderInterface
{
    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(getcwd() . '/app/Views/twig');
        $this->twig = new Environment($loader);
        $this->twig->addGlobal('isAdmin', isset($_COOKIE['admin']));
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