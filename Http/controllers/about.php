<?php
if ($_SESSION) extract($_SESSION);
$viewData = ['user' => $user ??= false];

viewPath('about.view.php', $viewData);
// ↳ Output: /Users/alissa/Desktop/KML/lara_sandbox/demo/views/about.view.php
?>