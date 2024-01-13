<?php
$page = 'New Note';

$dbConfig = include 'config.php';
$db = new Database($dbConfig['database'], 'alissa', '');

$reqType = $_SERVER['REQUEST_METHOD'];
$statement = 'INSERT INTO notes (body, userID) VALUES (:body, :userID)';
$alert = '';

if ($reqType === 'POST') {
    $postBody = $_POST['body'];
    $charLength = strlen($postBody);

    function checkPass($x, $y, $z)
    {
        $config = [
            'body' => $z,
            // 'userID' => $_POST['userID']
            'userID' => 2
        ];

        $x->query($y, $config);
        return 'Success';
    }

    function checkFail($x, $y)
    {
        $zero = ($x === 0) ? 'Body Required' : false;
        $oneK = ($x > 1000) ? 'Character Maximum Exceeded' : false;
        $message = $zero ?: $oneK ?: false;

        return $message;
    }

    $alert =
        checkFail($charLength, $postBody) ?:
        checkPass($db, $statement, $postBody);
}

function statusColor($x)
{
    $greenText = 'text-green-500';
    $redText = 'text-red-600';

    return $x === 'Success' ? $greenText : $redText;
}

include 'views/create.view.php';