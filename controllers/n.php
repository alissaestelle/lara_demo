<?php
$page = 'Note';

$dbConfig = include 'config.php';
$db = new Database($dbConfig['database'], 'alissa', '');

// $userConfig = ['user' => 1, 'id' => $_GET['id']];
// $statement = 'SELECT * FROM notes WHERE userID = :user AND id = :id';

$thisUser = 1;
$noteID = ['id' => $_GET['id']];
$statement = 'SELECT * FROM notes WHERE id = :id';
$nView = 'views/n.view.php';

// 1. Validate Results
$n = $db->query($statement, $noteID)->find();

// 2. Results Confirmed:
$body = $n['body'];

// 3. Validate User
$n && $n['userID'] === $thisUser ? include $nView : eHandler(403);
?>
