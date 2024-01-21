<?php

use App\Database;
use App\Magic;
use App\Validator;

$db = Magic::resolve(Database::class);

$reqType = $_SERVER['REQUEST_METHOD'];
$statement =
    'INSERT INTO notes (title, body, userID) VALUES (:title, :body, :userID)';

$postTitle = $_POST['title'];
$postBody = $_POST['body'];

$nView = 'notes/create.view.php';

function checkPass($t, $b, $x, $y)
{
    $config = [
        'title' => $t,
        'body' => $b,
        // 'userID' => $_POST['userID']
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

$viewData = ['page' => 'New Note', 'alert' => $alert];

viewPath($nView, $viewData);

?>