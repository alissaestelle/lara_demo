<?php

// return [
//     '/' => 'controllers/index.php',
//     '/about' => 'controllers/about.php',
//     '/notes/create' => 'controllers/notes/create.php',
//     '/notes' => 'controllers/notes/index.php',
//     '/n' => 'controllers/notes/note.php',
//     '/contact' => 'controllers/contact.php'
// ];

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/notes/create', 'controllers/notes/create.php');
$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/note.php');
$router->get('/contact', 'controllers/contact.php');

$router->post('/note/create', 'controllers/notes/store.php');
$router->delete('/note', 'controllers/notes/destroy.php');