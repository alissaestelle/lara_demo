<?php

namespace App\Middleware;
use App\Middleware\Auth;
use App\Middleware\Guest;

class Index
{
    const MAP = [
        'Auth' => Auth::class,
        'Guest' => Guest::class
    ];

    static function resolve($key)
    {
        $middleware = static::MAP[$key] ?? false;
        // static:: refers to the MAP constant.

        $middleware
            ? (new $middleware)->handle()
            : throw new \Exception('No Matching Key Found');
    }
}

// formatArr(Index::MAP);
?>

<!-- NOTES -->

<!-- 
    ** See L:20 → (new $middleware) **

    1.  (new $middleware)
        = new static::MAP[$key]
        = new [$key]::class
        = new Class\Namespace
    
    The MAP constant is an associative array that contains classes as keys and namespaces as values.
    ::MAP checks to see if the provided argument matches any of the keys in its array, and if so, it returns the namespace belonging to that key.

    ** Comparison Examples **

    1.  $testPath = new \App\Middleware\Auth;
        var_dump($testPath);
    
    2.  $testParen = new Auth();
        var_dump($testParen);

    Both examples will instantiate the Auth class.
-->