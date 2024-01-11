<?php
include 'functions.php';
include 'Database.php';
?>

<!-- <?php
$dbConfig = include 'config.php';
$db = new Database($dbConfig['database'], 'alissa', '');
?> -->

<!-- <pre>formatArr($_SERVER)</pre> -->

<script><?= consoleLog($db) ?></script>

<?php include 'router.php'; ?>
