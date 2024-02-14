<?php

// use App\Validator;

use App\Agent;
use App\Database;
use App\Session;

$db = Agent::resolve(Database::class);

// Another Option:
// $db = Agent::get()->resolve('App\Database');

// $userConfig = ['user' => 1, 'id' => $_GET['id']];
// $statement = 'SELECT * FROM notes WHERE userID = :user AND id = :id';

$thisUser = Session::get('USER', '_ID');
$noteID = [':id' => $_POST['id']];
$getStmt = 'SELECT * FROM notes WHERE id = :id';
$delStmt = 'DELETE FROM notes WHERE id = :id';

$n = $db->query($getStmt, $noteID)->find();
validate($n['userID'], $thisUser) && $db->query($delStmt, $noteID);

header('location: /notes');
exit();

?>