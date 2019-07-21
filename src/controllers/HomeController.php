<?php
namespace Source\Controllers;

use Source\Core\Controller;
use Source\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = new User;
        $data = array(
            "users" => $user->find()->fetch(true)
        );
        
        $this->loadView('home/index.twig', $data);
    }
}