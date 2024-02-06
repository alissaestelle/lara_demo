<?php

use App\Database;
use App\Agent;

$db = Agent::resolve(Database::class);

$notes = $db->query('SELECT * FROM notes WHERE userID = 1')->findAll();

if ($_SESSION) extract($_SESSION);

$viewData = [
    'user' => ($user ??= false),
    'page' => 'My Notes',
    'notes' => $notes
];

viewPath('notes/index.view.php', $viewData);