<?php

// return [
//     '/' => 'controllers/index.php',
//     '/about' => 'controllers/about.php',
//     '/notes/create' => 'controllers/notes/create.php',
//     '/notes' => 'controllers/notes/index.php',
//     '/n' => 'controllers/notes/n.php',
//     '/contact' => 'controllers/contact.php'
// ];

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/notes/create', 'controllers/notes/create.php');
$router->get('/notes', 'controllers/notes/index.php');
$router->get('/n', 'controllers/notes/n.php');
$router->get('/contact', 'controllers/contact.php');

$router->delete('/n', 'controllers/notes/destroy.php');