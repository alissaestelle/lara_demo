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
if (!$n) {
    eHandler(404);
}

$body = $n['body'];

// ** Note Exists ** But User Isn't Authorized
$n['userID'] !== $thisUser ? eHandler(403) : include $nView;
?>

<!-- <pre>formatArr($db)</pre> -->
<!-- <pre>formatArr($n)</pre> -->
<!-- <script>consoleLog($n)</script> -->