<?php
namespace Source\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    public function loadView($view, $data = array())
    {
        $loader = new FilesystemLoader("src/views/themes/" . APP_CONFIG['theme'] . "/template");
        $twig = new Environment($loader);
        echo $twig->render($view, $data);
    }
}