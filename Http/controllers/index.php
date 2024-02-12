<?php

use App\Session;

$viewData = ['user' => Session::get('USER')];

viewPath('index.view.php', $viewData);
// ↳ Output: /Users/alissa/Desktop/KML/lara_sandbox/demo/views/index.view.php
?>