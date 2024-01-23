<?php

use App\Database;
use App\Agent;

$db = Agent::resolve(Database::class);

// $userConfig = ['user' => 1, 'id' => $_GET['id']];
// $statement = 'SELECT * FROM notes WHERE userID = :user AND id = :id';

$thisUser = 1;
$noteID = [':id' => $_GET['id']];
$getStmt = 'SELECT * FROM notes WHERE id = :id';;

// 1. Validate Results
$n = $db->query($getStmt, $noteID)->find();
extract($n);

$page = $title ?? 'My Note';
$viewData = [
    'page' => $page,
    'nID' => $id,
    'title' => $title,
    'body' => $body
];

// 3. Validate User
validate($userID, $thisUser) && viewPath('notes/note.view.php', $viewData);
?>