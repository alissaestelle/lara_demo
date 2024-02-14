<?php

use App\Agent;
use App\Database;
use App\Session;
use App\Validator;

$db = Agent::resolve(Database::class);

$thisUser = Session::get('USER', '_ID');
$getStmt = 'SELECT * FROM notes WHERE id = :id';
$putStmt = 'UPDATE notes SET title = :title, body = :body WHERE id = :id';

if ($_POST) extract($_POST);

$noteID = $id;
$pTitle = $title;
$pBody = $body;

// Find the Current Note
$n = $db->query($getStmt, [':id' => $noteID])->find();
extract($n);

// Confirm the Note Belongs to the Current User
validate($userID, $thisUser);

// Validate the Form
function checkPass($i, $t, $b, $x, $y)
{
    $config = [
        ':id' => $i,
        ':title' => $t,
        ':body' => $b
    ];

    $x->query($y, $config);
    // return 'Success';

    header('location: /notes');
    exit();
}

// If Valid, Update the Record
$alert =
    Validator::checkNote($pBody, 1, 1000) ?:
    checkPass($noteID, $pTitle, $pBody, $db, $putStmt);

$viewData = [
    'user' => $user ?? false,
    'page' => 'Edit Note',
    'noteID' => $noteID,
    'title' => $pTitle,
    'body' => $pBody,
    'alert' => $alert
];

viewPath('notes/edit.view.php', $viewData);

?>