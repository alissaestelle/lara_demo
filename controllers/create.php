<?php
$page = 'New Note';

$dbConfig = include 'config.php';
$db = new Database($dbConfig['database'], 'alissa', '');

$reqType = $_SERVER['REQUEST_METHOD'];
$statement = 'INSERT INTO notes (body, userID) VALUES (:body, :userID)';

if ($reqType === 'POST') {
    $config = [
        'body' => $_POST['body'],
        // 'userID' => $_POST['userID']
        'userID' => 1
    ];
    // formatArr($_POST);
    $db->query($statement, $config);
}

include 'views/create.view.php';
