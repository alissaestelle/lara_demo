<?php
// include basePath('Classes/Validator.php');

use App\Database;
use App\Magic;
use App\Validator;

$db = Magic::resolve(Database::class);

$reqType = $_SERVER['REQUEST_METHOD'];
$statement =
    'INSERT INTO notes (title, body, userID) VALUES (:title, :body, :userID)';
$alert = '';

$postTitle = $_POST['title'];
$postBody = $_POST['body'];

function checkPass($t, $b, $x, $y)
{
    $config = [
        'title' => $t,
        'body' => $b,
        // 'userID' => $_POST['userID']
        'userID' => 1
    ];

    $x->query($y, $config);
    return 'Success';
}

$alert =
    Validator::checkStr($postBody, 1, 1000) ?:
    checkPass($postTitle, $postBody, $db, $statement);

function toggleColor($x)
{
    $greenText = 'text-green-500';
    $redText = 'text-red-600';

    return $x === 'Success' ? $greenText : $redText;
}

header('location: /notes');
exit();
?>