<?php

$alert = '';

$viewData = ['page' => 'New Note', 'alert' => $alert];

viewPath('notes/create.view.php', $viewData);
?>

<pre><?= formatArr($reqType) ?></pre>