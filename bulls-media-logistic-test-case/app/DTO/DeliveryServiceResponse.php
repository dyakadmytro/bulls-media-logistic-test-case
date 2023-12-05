<?php

namespace App\DTO;

class DeliveryServiceResponse
{
    public $content;

    /**
     * @param $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

}
