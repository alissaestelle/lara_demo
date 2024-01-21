<?php

use App\Database;
use App\Magic;

$db = Magic::resolve(Database::class);

// $userConfig = ['user' => 1, 'id' => $_GET['id']];
// $statement = 'SELECT * FROM notes WHERE userID = :user AND id = :id';

$thisUser = 1;
$noteID = ['id' => $_GET['id']];
$getStmt = 'SELECT * FROM notes WHERE id = :id';
$nView = 'notes/n.view.php';

// 1. Validate Results
$n = $db->query($getStmt, $noteID)->find();

$page = $n['title'] ?? 'My Note';
$viewData = ['page' => $page, 'n' => $n];

// 3. Validate User
validate($n['userID'], $thisUser) && viewPath($nView, $viewData);
?>