<?php

namespace App;
// use Exception;

class Container
{
    public array $storage = [];

    function bind($key, $fn)
    {
        // STORE
        $this->storage[$key] = $fn;
    }

    function resolve($key)
    {
        // RETRIEVE
        $result = array_key_exists($key, $this->storage)
            ? $this->storage[$key]
            : throw new \Exception("No Match Found for {$key}");
        return $result();
    }
}

?>