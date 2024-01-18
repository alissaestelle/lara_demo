<?php

namespace App;

class Router
{
    public array $routes = [];

    function route()
    {
        foreach ($this->routes as $route) {
            foreach ($route as $k => $v) {
            }
        }
    }

    function get($x, $y)
    {
        $this->routes[] = [
            'uri' => $x,
            'controller' => $y,
            'method' => 'GET'
        ];
    }

    function post($x, $y)
    {
        $this->routes[] = [
            'uri' => $x,
            'controller' => $y,
            'method' => 'POST'
        ];
    }

    function put($x, $y)
    {
        $this->routes[] = [
            'uri' => $x,
            'controller' => $y,
            'method' => 'PUT'
        ];
    }

    function delete($x, $y)
    {
        $this->routes[] = [
            'uri' => $x,
            'controller' => $y,
            'method' => 'DELETE'
        ];
    }
}

// $routes = include basePath('routes.php');
// $thisURI = parse_url($_SERVER['REQUEST_URI'])['path'];

function switchViews($uri)
{
    switch ($uri) {
        case '/':
            include 'controllers/index.php';
            break;
        case '/about':
            include 'controllers/about.php';
            break;
        case '/contact':
            include 'controllers/contact.php';
            break;
        default:
            include 'views/404.php';
            break;
    }
}

// switchViews($thisURI);

function testController($arr, $x)
{
    foreach ($arr as $k => $v) {
        if ($k === $x) {
            include $v;
        }
    }
}

// testController($routes, $thisURI);

function liveController($arr, $k)
{
    array_key_exists($k, $arr) ? include basePath($arr[$k]) : eHandler(404);
}

// liveController($routes, $thisURI);