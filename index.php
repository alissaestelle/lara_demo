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

// $post = $db->query('SELECT * FROM posts WHERE id = 1')->fetch();
// $posts = $db->query('SELECT * FROM posts WHERE id > 1')->fetchAll();
?>

<pre><?= formatArr($db) ?></pre>

<!-- <?php foreach ($posts as $p): ?>
<li><?= $p['title'] ?></li>
<?php endforeach; ?> -->

<script><?= consoleLog($db) ?></script>

<?php include 'router.php'; ?>
