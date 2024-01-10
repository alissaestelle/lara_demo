<?php
include 'functions.php';

$thisURI = parse_url($_SERVER['REQUEST_URI'])['path'];
?>

<!-- <pre><?= formatArr($_SERVER) ?></pre> -->
<!-- <pre><?= formatArr($thisURI) ?></pre> -->

<?php
include 'Database.php';
include 'router.php';
?>

<!-- <script>consoleLog()</script> -->
