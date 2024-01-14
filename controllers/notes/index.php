<?php
$page = 'My Notes';

$dbConfig = include 'config.php';
$db = new Database($dbConfig['database'], 'alissa', '');

$notes = $db->query('SELECT * FROM notes WHERE userID = 2')->findAll();

// "Include" === "Paste"
include 'views/notes/index.view.php';