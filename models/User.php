<?php
namespace Models;

use Core\Model;

class User extends Model
{
    public function __construct()
    {
        parent::__construct("users", ["name", "email"], "id", true);
    }
}