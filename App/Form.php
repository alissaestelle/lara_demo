<?php

namespace App;

class Form extends \Exception
{
    protected $errors = [];

    static function throw($x, $y)
    {
        $instance = new static();

        $instance->errors = $x;
    }
}

?>
