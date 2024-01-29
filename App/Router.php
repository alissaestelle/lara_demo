<?php

namespace App;
use App\Middleware\Auth;
use App\Middleware\Guest;
use App\Middleware\Index;

class Router
{
    // protected array $routes = [];
    public array $routes = [];
    public string $check;

    function assign($x, $y, $z)
    {
        $this->routes[] = [
            'uri' => $x,
            'controller' => $y,
            'method' => $z,
            'middleware' => NULL
        ];

        return $this;

        // Using the Compact Fx:
        // function assign($uri, $controller, $method)
        // {
        //     $this->routes[] = compact('uri', 'controller', 'method');
        // }
    }

    function get($x, $y)
    {
        return $this->assign($x, $y, 'GET');
    }

    function post($x, $y)
    {
        return $this->assign($x, $y, 'POST');
    }

    function patch($x, $y)
    {
        return $this->assign($x, $y, 'PATCH');
    }

    function update($x, $y)
    {
        return $this->assign($x, $y, 'PUT');
    }

    function delete($x, $y)
    {
        return $this->assign($x, $y, 'DELETE');
    }

    function filter($key)
    {
        $end = count($this->routes) - 1;
        $keys = array_keys($this->routes[$end]);
        $this->routes[$end][$keys[3]] = $key;
        return $this;
    }

    function failure($code = 404)
    {
        http_response_code($code);
        return include basePath("views/{$code}.php");
    }

    function route($x, $y)
    {
        (new Auth);
        (new Guest);

        foreach ($this->routes as $route) {
            extract($route);

            if ($uri === $x && $method === $y) {
                // $index = Index::MAP[$middleware];

                // if ($index) {
                    // (new $index)->handle();
                    // ↳ This syntax is equal to (new Auth) or (new Guest)
                // }

                Index::resolve($middleware);

                return include basePath($controller);
            }
        }
        $this->failure();
    }
}

?>