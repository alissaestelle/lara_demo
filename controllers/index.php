<?php
$_SESSION['name'] = 'Alissa';

$viewData = ['page' => 'Home'];

viewPath('index.view.php', $viewData);
// ↳ Output: /Users/alissa/Desktop/KML/lara_sandbox/demo/views/index.view.php
?>