<?php

if ($_POST) extract($_POST);

$viewData = ['page' => 'New Note', 'title' => $title ?? '', 'body' => $body ?? '', 'alert' => ''];

viewPath('notes/create.view.php', $viewData);

?>