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

        $middleware
            ? (new $middleware)->handle()
            : throw new \Exception('No Matching Key Found');
    }
}

?>