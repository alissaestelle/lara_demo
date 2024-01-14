<?php
include 'Validator.php';

$page = 'New Note';

$dbConfig = include 'config.php';
$db = new Database($dbConfig['database'], 'alissa', '');

$reqType = $_SERVER['REQUEST_METHOD'];
$statement = 'INSERT INTO notes (title, body, userID) VALUES (:title, :body, :userID)';
$alert = '';

if ($reqType === 'POST') {
    $postTitle = $_POST['title'];
    $postBody = $_POST['body'];

    function checkPass($b, $t, $x, $y)
    {
        $config = [
            'title' => $t,
            'body' => $b,
            // 'userID' => $_POST['userID']
            'userID' => 2
        ];

        $x->query($y, $config);
        return 'Success';
    }

    $alert =
        Validator::checkStr($postBody, 1, 1000) ?:
        checkPass($postBody, $postTitle, $db, $statement);
}

function toggleColor($x)
{
    $greenText = 'text-green-500';
    $redText = 'text-red-600';

    return $x === 'Success' ? $greenText : $redText;
}

include 'views/notes/create.view.php';