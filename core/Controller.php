<?php
namespace Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    public function loadView(string $view, array $data = [])
    {
        $loader = new FilesystemLoader("views/template");
        $twig = new Environment($loader);
        echo $twig->render($view, $data);
    }
}