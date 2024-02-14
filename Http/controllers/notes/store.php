<?php

use App\Agent;
use App\Database;
use App\Session;
use App\Validator;

$db = Agent::resolve(Database::class);
$thisUser = Session::get('USER', '_ID');

$reqType = $_SERVER['REQUEST_METHOD'];
$postStmt =
    'INSERT INTO notes (title, body, userID) VALUES (:title, :body, :userID)';

extract($_POST);
if ($_SESSION) extract($_SESSION);

function createNote($t, $b, $u, $x, $y)
{
    $config = [
        ':title' => $t,
        ':body' => $b,
        ':userID' => $u
    ];

    $x->query($y, $config);
    // return 'Success'

    header('location: /notes');
    exit();
}

$alert =
    Validator::checkNote($body, 1, 1000) ?:
    createNote($title, $body, $thisUser, $db, $postStmt);

$viewData = [
    'user' => $user ?? false,
    'page' => 'New Note',
    'title' => $title,
    'body' => $body,
    'alert' => $alert
];

viewPath('notes/create.view.php', $viewData);

?>