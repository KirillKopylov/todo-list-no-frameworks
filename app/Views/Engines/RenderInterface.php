<?php


namespace App\Views\Engines;


interface RenderInterface
{
    public function render(string $view, array $data = []);
}