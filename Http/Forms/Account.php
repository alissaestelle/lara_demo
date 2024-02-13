<?php

namespace Http\Forms;
use App\FormException;
use App\Validator;

class Account
{
    protected $errors = [];

    function __construct(public array $attributes)
    {
        extract($attributes);

        $email = Validator::verifyAcct($email);

        if ($email) {
            $this->errors[] = compact('email');
        }

        $password = Validator::verifyCreds($password);

        if ($password) {
            $this->errors[] = compact('password');
        }
    }

    function setError($auth)
    {
        $this->errors[] = compact('auth');
        return $this;
    }

    function getErrors()
    {
        return $this->errors;
    }

    function failure()
    {
        return (bool) count($this->errors);
    }

    function throw()
    {
        FormException::throw($this->getErrors(), $this->attributes);
    }

    static function validate($attributes)
    {
        $instance = new static($attributes);
        return $instance->failure() ? $instance->throw() : $instance;
    }
}

?>