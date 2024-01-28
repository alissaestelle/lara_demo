<?php

namespace App;

class Validator
{
    static function checkNote($str, $min = 1, $max = INF)
    {
        $str = strlen(trim($str));

        $zero = $str < $min ? 'Body Required' : false;
        $oneK = $str > $max ? 'Character Maximum Exceeded' : false;
        $message = $zero ?: $oneK ?: false;

        return $message;
    }

    static function verifyUser($x)
    {
        $x = filter_var($x, FILTER_VALIDATE_EMAIL);
        $message = !$x ? 'Invalid Email Address' : false;

        return $message;
    } 

    static function verifyCreds($y)
    {
        $total = strlen($y);

        $min = $total < 7 ? '7 Character Minimum' : false;
        $max = $total > 20 ? '20 Character Maximum' : false;
        $message = $min ?: $max ?: false;

        return $message;
    }
}