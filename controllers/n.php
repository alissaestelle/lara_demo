<?php
$page = 'Note';

$dbConfig = include 'config.php';
$db = new Database($dbConfig['database'], 'alissa', '');

$thisUser = $_GET['id'];
$statement = 'SELECT * FROM notes WHERE id = :id';

$n = $db->query($statement, ['id' => $thisUser])->fetch();
$body = $n['body'];

// "Include" === "Paste"
include 'views/n.view.php';
?>

<!-- <pre>formatArr()</pre> -->
<script><?= consoleLog($n) ?></script>