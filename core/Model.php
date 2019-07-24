<?php
namespace Core;

use CoffeeCode\DataLayer\DataLayer;

class Model extends DataLayer
{
    public function __construct(string $entity, array $required, string $primary = null, bool $timestamps = null)
    {
        parent::__construct($entity, $required, $primary, $timestamps);
    }
}