<?php

if ($_SESSION) extract($_SESSION);
$viewData = ['user' => $user ??= false];

viewPath('index.view.php', $viewData);
// ↳ Output: /Users/alissa/Desktop/KML/lara_sandbox/demo/views/index.view.php
?>