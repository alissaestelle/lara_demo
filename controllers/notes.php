<?php
$page = 'My Notes';

$dbConfig = include 'config.php';
$db = new Database($dbConfig['database'], 'alissa', '');

$notes = $db->query('SELECT * FROM notes WHERE userID = 1')->fetchAll();

// "Include" === "Paste"
include 'views/notes.view.php';
?>
