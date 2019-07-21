<?php
namespace Source\core;

use CoffeeCode\DataLayer\DataLayer;

class Model extends DataLayer
{
    public function __construct(string $entity, array $required, string $primary = 'id', bool $timestamps = true)
    {
        parent::__construct($entity, $required, $primary, $timestamps);
    }
}