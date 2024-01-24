<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/register', 'controllers/registration/create.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/note.php');
$router->get('/note/create', 'controllers/notes/create.php');
$router->get('/note/edit', 'controllers/notes/edit.php');

$router->post('/note/create', 'controllers/notes/store.php');
$router->patch('/note/edit', 'controllers/notes/update.php');
$router->delete('/note', 'controllers/notes/destroy.php');