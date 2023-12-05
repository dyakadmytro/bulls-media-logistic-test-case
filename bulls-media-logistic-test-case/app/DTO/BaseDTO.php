<?php

namespace App\DTO;

abstract class BaseDTO
{
    public function toArray():array {
        throw new \Exception('overwrite this method!');
    }
}
