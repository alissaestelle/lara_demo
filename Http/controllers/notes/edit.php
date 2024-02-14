<?php

use App\Agent;
use App\Database;
use App\Session;

$db = Agent::resolve(Database::class);

$thisUser = Session::get('USER', '_ID');
$noteID = [':id' => $_GET['id']];
$getNote = 'SELECT * FROM notes WHERE id = :id';

// 1. Validate Results
$n = $db->query($getNote, $noteID)->find();
extract($n);

$viewData = [
    'user' => $user ??= false,
    'page' => 'Edit Note',
    'noteID' => $id,
    'title' => $title,
    'body' => $body,
    'alert' => ''
];

// 3. Validate User
validate($userID, $thisUser);

// $viewData = ['page' => 'Edit Note', 'alert' => ''];

viewPath('notes/edit.view.php', $viewData);

?>