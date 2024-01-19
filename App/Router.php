<?php

namespace App;

class Router
{
    // protected array $routes = [];
    public array $routes = [];
    public string $check;

    function assign($u, $c, $m)
    {
        $this->routes[] = [
            'uri' => $u,
            'controller' => $c,
            'method' => $m
        ];

        // Using the Compact Fx:

        // function assign($uri, $controller, $method)
        // {
        //     $this->routes[] = compact('uri', 'controller', 'method');
        // }
    }

    function get($u, $c)
    {
        $this->assign($u, $c, 'GET');
    }

    function post($u, $c)
    {
        $this->assign($u, $c, 'POST');
    }

    function update($u, $c)
    {
        $this->assign($u, $c, 'PUT');
    }

    function delete($u, $c)
    {
        $this->assign($u, $c, 'DELETE');
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
            // if ($uri === $u && $method === $c) $this->filter($controller);
            if ($uri === $x && $method === $y) {
                return include basePath($controller);
            }
        }
        $this->failure();
    }
}