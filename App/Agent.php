<?php

namespace App;

// Any variables/functions that follow the static keyword are accessible anywhere in the project and don't require instantiation to use.

class Agent
{
    public static $container;
    // protected static $container;

    static function set($x)
    {
        static::$container = $x;
        // $x === new Container();
    }

    static function get()
    {
        return static::$container;
        // Returns Container {}
    }

    static function bind($key, $fn)
    {
        return static::get()->bind($key, $fn);
        // 1. Calls get() → Returns Container { Includes bind() Fn }
        // 2. Accesses bind() from Container {}
        // 3. Calls bind() → Stores $key (Str) as a Key && $fn (Fn) as its Value
    }

    static function resolve($key)
    {
        return static::get()->resolve($key);
        // 1. Calls get() → Returns Container { Includes resolve() Fn }
        // 2. Accesses resolve() from Container {}
        // 3. Calls resolve() → Returns $fn (Stored as Value) if $key is Found
    }
}

?>