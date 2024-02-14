<?php

namespace Http\Forms;
use App\FormException;
use App\Validator;

class Entry
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

    static function validate($attr)
    {
        $_this = new static($attr);
        return $_this->failure() ? $_this->throw() : $_this;

        // Note: $this isn't available for use inside static functions, but a specific class instance can still be manually simulated using the new static() fn.
    }
}

?>