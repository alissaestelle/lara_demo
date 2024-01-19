<?php

use App\Database;
// use App\Validator;

$dbConfig = include basePath('config.php');
$db = new Database($dbConfig['database'], 'alissa', '');

// $userConfig = ['user' => 1, 'id' => $_GET['id']];
// $statement = 'SELECT * FROM notes WHERE userID = :user AND id = :id';

$thisUser = 1;
$noteID = ['id' => $_POST['id']];
$getStmt = 'SELECT * FROM notes WHERE id = :id';
$delStmt = 'DELETE FROM notes WHERE id = :id';

$n = $db->query($getStmt, $noteID)->find();
validate($n['userID'], $thisUser) && $db->query($delStmt, $noteID);

header('location: /notes');
exit();

?>
