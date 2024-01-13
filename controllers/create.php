<?php
include 'Validator.php';

$page = 'New Note';

$dbConfig = include 'config.php';
$db = new Database($dbConfig['database'], 'alissa', '');

$reqType = $_SERVER['REQUEST_METHOD'];
$statement = 'INSERT INTO notes (title, body, userID) VALUES (:title, :body, :userID)';
$alert = '';

$validator = new Validator();

if ($reqType === 'POST') {
    $postTitle = $_POST['title'];
    $postBody = $_POST['body'];
    // $charLength = strlen($postBody);

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

    function checkFail($x)
    {
        $zero = ($x === 0) ? 'Body Required' : false;
        $oneK = ($x > 1000) ? 'Character Maximum Exceeded' : false;
        $message = $zero ?: $oneK ?: false;

        return $message;
    }

    $alert =
        checkFail($validator->checkStr($postBody)) ?:
        checkPass($postBody, $postTitle, $db, $statement);
}

function toggleColor($x)
{
    $greenText = 'text-green-500';
    $redText = 'text-red-600';

    return $x === 'Success' ? $greenText : $redText;
}

include 'views/create.view.php';