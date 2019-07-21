<?php
namespace Source\Models;

use Source\core\Model;

class User extends Model
{
    public function __construct()
    {
        parent::__construct("users", ["name", "email"], "id", true);
    }
}