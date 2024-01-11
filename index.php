<?php
include 'functions.php';

$thisURI = parse_url($_SERVER['REQUEST_URI'])['path'];
?>

<!-- <pre><?= formatArr($_SERVER) ?></pre> -->
<!-- <pre><?= formatArr($thisURI) ?></pre> -->

<?php include 'Database.php'; ?>

<?php
$dbConfig = include 'config.php';

$db = new Database($dbConfig['database'], 'alissa', '');

// $post = $db->query('SELECT * FROM posts')->fetchAll();
// $posts = $db->query('SELECT * FROM posts WHERE id > 1')->fetchAll();

$userID = $_GET['id'];
// $test = 'SELECT * FROM posts WHERE id = ?';
$test = 'SELECT * FROM posts WHERE id = :id';
$posts = $db->query($test, ['id' => $userID])->fetch();
?>

<pre><?= formatArr($posts) ?></pre>

<script><?= consoleLog($db) ?></script>

<?php include 'router.php'; ?>
