<?php
namespace Source\Core;

class Controller
{
    public function loadView($view, $data = array())
    {
        extract($data);
        require "src/views/themes/" . APP_CONFIG['theme']  . "/template/" . $view . ".php";
    }

    public function loadTemplate($view, $data = array())
    {
        extract($data);
        require "src/views/themes/" . APP_CONFIG['theme'] . "/template/header.php";
        require "src/views/themes/" . APP_CONFIG['theme'] . "/template/" . $view . ".php";
        require "src/views/themes/" . APP_CONFIG['theme'] . "/template/footer.php";
    }
}