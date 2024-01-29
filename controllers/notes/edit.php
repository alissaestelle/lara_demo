<?php

use App\Database;
use App\Agent;

$db = Agent::resolve(Database::class);

$thisUser = 1;
$noteID = [':id' => $_GET['id']];
$getNote = 'SELECT * FROM notes WHERE id = :id';

if ($_SESSION) extract($_SESSION);

// 1. Validate Results
$n = $db->query($getNote, $noteID)->find();
extract($n);

$page = $title ?? 'My Note';

$viewData = [
    'user' => $user ??= false,
    'page' => $page,
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