<?php

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

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/notes' => 'controllers/notes.php',
    '/contact' => 'controllers/contact.php'
];

$err404 = 'views/404.php';

function testController($arr, $x)
{
    foreach ($arr as $k => $v) {
        if ($k === $x) {
            include $v;
        }
    }
}

// testController($routes, $thisURI);

function eHandler($e, $code)
{
    http_response_code($code);
    include $e;
    // include "views/{$code}.php";
}

function liveController($arr, $k, $e)
{
    array_key_exists($k, $arr) ? include $arr[$k] : eHandler($e, 404);
}

liveController($routes, $thisURI, $err404);

?>
