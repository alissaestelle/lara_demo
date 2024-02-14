<?php

namespace App;

class FormException extends \Exception
{
    protected $attributes = [];
    protected $errors = [];

    function setAttr($a)
    {
        $this->attributes = $a;
    }

    function getAttr()
    {
        return $this->attributes;
    }

    function setErrors($e)
    {
        $this->errors = $e;
    }

    function getErrors()
    {
        return $this->errors;
    }

    static function throw($errs, $attr)
    {
        $instance = new static();

        $instance->setErrors($errs);
        $instance->setAttr($attr);

        throw $instance;
    }
}

?>