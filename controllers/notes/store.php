<?php

use App\Database;
use App\Agent;
use App\Validator;

$db = Agent::resolve(Database::class);

$reqType = $_SERVER['REQUEST_METHOD'];
$statement =
    'INSERT INTO notes (title, body, userID) VALUES (:title, :body, :userID)';

$postTitle = $_POST['title'] ?? '';
$postBody = $_POST['body'] ?? '';

function checkPass($t, $b, $x, $y)
{
    $config = [
        'title' => $t,
        'body' => $b,
        'userID' => 1
    ];

    $x->query($y, $config);
    // return 'Success'

    header('location: /notes');
    exit();
}

$alert =
    Validator::checkStr($postBody, 1, 1000) ?:
    checkPass($postTitle, $postBody, $db, $statement);

$viewData = ['page' => 'New Note', 'title' => $postTitle, 'body' => $postBody, 'alert' => $alert];

viewPath('notes/create.view.php', $viewData);

?>