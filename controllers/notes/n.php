<?php

$dbConfig = include basePath('config.php');
$db = new Database($dbConfig['database'], 'alissa', '');

// $userConfig = ['user' => 1, 'id' => $_GET['id']];
// $statement = 'SELECT * FROM notes WHERE userID = :user AND id = :id';

$thisUser = 1;
$noteID = ['id' => $_GET['id']];
$statement = 'SELECT * FROM notes WHERE id = :id';
$nView = 'notes/n.view.php';

// 1. Validate Results
$n = $db->query($statement, $noteID)->find();

$page = $n['title'] ?? 'My Note';
$viewData = ['page' => $page, 'n' => $n];

// 3. Validate User
$n && $n['userID'] === $thisUser ? viewPath($nView, $viewData) : eHandler(403);