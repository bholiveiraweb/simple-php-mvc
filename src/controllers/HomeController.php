<?php
namespace Source\Controllers;

use Source\Core\Controller;
use Source\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = new User;
        $data['users'] = $user->find()->fetch(true);
        
        $this->loadTemplate('home/index', $data);
    }
}