<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/register', 'registration/create.php')->filter('Guest');
$router->post('/register', 'registration/store.php');

$router->get('/login', 'sessions/create.php')->filter('Guest');
$router->post('/login', 'sessions/store.php')->filter('Guest');
$router->delete('/logout', 'sessions/destroy.php')->filter('Auth');

$router->get('/notes', 'notes/index.php')->filter('Auth');
$router->get('/note', 'notes/note.php');
$router->delete('/note', 'notes/destroy.php');

$router->get('/note/create', 'notes/create.php');
$router->post('/note/create', 'notes/store.php');

$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note/edit', 'notes/update.php');