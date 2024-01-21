<?php

namespace App;

// Any variables/functions that follow the static keyword are accessible anywhere in the project and don't require instantiation to use.

class Magic
{
    public static $container;
    // protected static $container;

    static function set($x)
    {
        static::$container = $x;
    }

    static function get()
    {
        return static::$container;
    }

    static function bind($key, $fn)
    {
        return static::get()->bind($key, $fn);
    }

    static function resolve($key)
    {
        return static::get()->resolve($key);
    }
}

?>