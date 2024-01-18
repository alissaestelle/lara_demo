<?php

use App\Database;

$dbConfig = include basePath('config.php');
$db = new Database($dbConfig['database'], 'alissa', '');
$reqType = $_SERVER['REQUEST_METHOD'];

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
$n && $n['userID'] === $thisUser ? viewPath($nView, $viewData) : eHandler(403);

// if ($reqType === 'POST') {
//     $delStmt = 'DELETE FROM notes WHERE id = :id';
//     $n && $n['userID'] === $thisUser
//         ? $db->query($delStmt, $noteID)->find()
//         : '';

//     header('location: /notes');
//     exit();
// }