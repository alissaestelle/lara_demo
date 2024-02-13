<?php

namespace App;

class FormException extends \Exception
{
    public readonly array $errors;
    public readonly string $data;
    
    // protected $errors = [];
    // protected $form = [];

    static function throw($errs, $data)
    {
        extract($data);
        $instance = new static();

        $instance->errors = $errs;
        $instance->data = $email;

        throw $instance;
    }
}

?>