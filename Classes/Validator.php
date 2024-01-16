<?php

class Validator
{
    static function checkStr($str, $min = 1, $max = INF)
    {
        $str = strlen(trim($str));
        var_dump($str);

        $zero = $str < $min ? 'Body Required' : false;
        $oneK = $str > $max ? 'Character Maximum Exceeded' : false;
        $message = $zero ?: $oneK ?: false;

        return $message;
    }
}