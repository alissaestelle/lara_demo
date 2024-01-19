<?php

use App\Database;

$dbConfig = include basePath('config.php');
$db = new Database($dbConfig['database'], 'alissa', '');

$notes = $db->query('SELECT * FROM notes WHERE userID = 1')->findAll();
$viewData = ['page' => 'My Notes', 'notes' => $notes];

viewPath('notes/index.view.php', $viewData);
