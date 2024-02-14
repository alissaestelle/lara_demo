<?php

use App\Agent;
use App\Database;
use App\Session;

$db = Agent::resolve(Database::class);

// $userConfig = ['user' => 1, 'id' => $_GET['id']];
// $statement = 'SELECT * FROM notes WHERE userID = :user AND id = :id';

$thisUser = Session::get('USER', '_ID');
$noteID = [':id' => $_GET['id']];
$getStmt = 'SELECT * FROM notes WHERE id = :id';

// 1. Validate Results
$n = $db->query($getStmt, $noteID)->find();
$n ? extract($n) : eHandler(404);

$page = $title ?? 'My Note';
$viewData = [
    'user' => $user ??= false,
    'page' => $page,
    'nID' => $id,
    'title' => $title,
    'body' => $body
];

// 3. Validate User
validate($userID, $thisUser) && viewPath('notes/note.view.php', $viewData);
?>