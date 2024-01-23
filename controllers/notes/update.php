<?php

use App\Database;
use App\Agent;
use App\Validator;

$db = Agent::resolve(Database::class);

$thisUser = 1;
$getStmt = 'SELECT * FROM notes WHERE id = :id';
$putStmt = 'UPDATE notes SET title = :title, body = :body WHERE id = :id';

$noteID = $_POST['id'];
$postTitle = $_POST['title'];
$postBody = $_POST['body'];

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
        ':body' => $b,
    ];

    $x->query($y, $config);
    // return 'Success';

    header('location: /notes');
    exit();
}


// If Valid, Update the Record
$alert =
    Validator::checkStr($postBody, 1, 1000) ?:
    checkPass($noteID, $postTitle, $postBody, $db, $putStmt);

$viewData = ['page' => 'Edit Note', 'noteID' => $noteID, 'title' => $postTitle, 'body' => $postBody, 'alert' => $alert];

viewPath('notes/edit.view.php', $viewData);

?>