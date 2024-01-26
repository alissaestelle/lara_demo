<?php

use App\Database;
use App\Agent;
use App\Validator;

$db = Agent::resolve(Database::class);

$reqType = $_SERVER['REQUEST_METHOD'];
$postStmt =
    'INSERT INTO notes (title, body, userID) VALUES (:title, :body, :userID)';

if ($_POST) extract($_POST);

function createNote($t, $b, $x, $y)
{
    $config = [
        ':title' => $t,
        ':body' => $b,
        ':userID' => 1
    ];

    $x->query($y, $config);
    // return 'Success'

    header('location: /notes');
    exit();
}

$alert =
    Validator::checkNote($body, 1, 1000) ?:
    createNote($title, $body, $db, $postStmt);

$viewData = ['page' => 'New Note', 'title' => $title, 'body' => $body, 'alert' => $alert];

viewPath('notes/create.view.php', $viewData);

?>