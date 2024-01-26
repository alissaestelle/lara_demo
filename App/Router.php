<?php

namespace App;

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
            'method' => $z
        ];

        // Using the Compact Fx:
        // function assign($uri, $controller, $method)
        // {
        //     $this->routes[] = compact('uri', 'controller', 'method');
        // }
    }

    function get($x, $y)
    {
        $this->assign($x, $y, 'GET');
    }

    function post($x, $y)
    {
        $this->assign($x, $y, 'POST');
    }

    function patch($x, $y)
    {
        $this->assign($x, $y, 'PATCH');
    }

    function update($x, $y)
    {
        $this->assign($x, $y, 'PUT');
    }

    function delete($x, $y)
    {
        $this->assign($x, $y, 'DELETE');
    }

    function failure($code = 404)
    {
        http_response_code($code);
        return include basePath("views/{$code}.php");
    }

    function route($x, $y)
    {
        foreach ($this->routes as $route) {
            extract($route);
            if ($uri === $x && $method === $y) {
                return include basePath($controller);
            }
        }
        $this->failure();
    }
}