<?php

$routes = include 'routes.php';
$thisURI = parse_url($_SERVER['REQUEST_URI'])['path'];

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
    array_key_exists($k, $arr) ? include $arr[$k] : eHandler(404);
}

liveController($routes, $thisURI);