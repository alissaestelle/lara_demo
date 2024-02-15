<?php

use App\Agent;
use App\Database;
use App\Session;

$db = Agent::resolve(Database::class);
$user = Session::get('USER', '_ID');

$notes = $db->query('SELECT * FROM notes WHERE userID = :userID', [':userID' => $user])->findAll();

$viewData = [
    'page' => 'My Notes',
    'notes' => $notes ?? []
];

viewPath('notes/index.view.php', $viewData);