<?php
$page = 'Note';

$dbConfig = include 'config.php';
$db = new Database($dbConfig['database'], 'alissa', '');

// $thisUser = ['user' => 1, 'id' => $_GET['id']];
// $statement = 'SELECT * FROM notes WHERE userID = :user AND id = :id';

// $thisUser = ['user' => 1, 'id' => $_GET['id']];
$thisUser = 1;
$noteID = ['id' => $_GET['id']];
$statement = 'SELECT * FROM notes WHERE id = :id';
$nView = 'views/n.view.php';

$n = $db->query($statement, $noteID)->find();

// Check to See if Note Exists
// if (!$n) {
//     eHandler(404);
// }

function validate()
{
}

// ** Note Exists ** But User Isn't Authorized
$n && $n['userID'] === $thisUser ? include $nView : eHandler(403);
?>

<!-- <pre>formatArr($db)</pre> -->
<!-- <pre>formatArr($n)</pre> -->
<!-- <script>consoleLog($n)</script> -->