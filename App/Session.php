<?php

namespace App;

class Session
{
    static function has($key)
    {
        return (bool) static::get($key);
    }

    static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    static function get($key)
    {
        return $_SESSION['_MSGS'][$key] ?? $_SESSION[$key] ?? [];
    }

    static function print($key, $value)
    {
        return $_SESSION['_MSGS'][$key] = $value;
    }

    static function erase()
    {
        unset($_SESSION['_MSGS']);
    }

    static function reset()
    {
        $_SESSION = [];
    }

    static function expire()
    {
        static::reset();
        
        $params = session_get_cookie_params();
        extract($params);
        session_destroy();

        setcookie('PHPSESSID', '', time() - 3600, $path, $domain);
    }
}

?>