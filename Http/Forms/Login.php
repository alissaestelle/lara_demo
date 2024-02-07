<?php

namespace Http\Forms;

use App\Validator;


class Login
{
    protected $errors = [];
    
    function validate($x, $y)
    {
        $email = Validator::verifyAcct($x);
        if ($email) $this->errors[] = compact('email');

        $password = Validator::verifyCreds($y);
        if ($password) $this->errors[] = compact('password');

        return empty($this->errors);
    }

    function setError($auth) {
        $this->errors[] = compact('auth');
    }

    function getErrors() {
        return $this->errors;
    }
}

?>