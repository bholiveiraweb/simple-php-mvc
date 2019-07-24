<?php
namespace Controllers;

use Core\Controller;
use Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $data = array(
            "users" => (new User)->find()->fetch(true)
        );
        
        $this->loadView('home/index.twig', $data);
    }
}