<?php

use App\Database;
use App\Agent;

$db = Agent::resolve(Database::class);

$thisUser = 1;
$noteID = [':id' => $_GET['id']];
$getStmt = 'SELECT * FROM notes WHERE id = :id';

// 1. Validate Results
$n = $db->query($getStmt, $noteID)->find();
extract($n);

$page = $title ?? 'My Note';

$viewData = ['page' => $page, 'noteID' => $id, 'title' => $title, 'body' => $body, 'alert' => ''];

// 3. Validate User
validate($userID, $thisUser);

// $viewData = ['page' => 'Edit Note', 'alert' => ''];

viewPath('notes/edit.view.php', $viewData);

?>