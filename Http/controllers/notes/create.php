<?php

if ($_POST) extract($_POST);

$viewData = [
    'user' => ($user ?? false),
    'page' => 'New Note',
    'title' => $title ?? '',
    'body' => $body ?? '',
    'alert' => ''
];

viewPath('notes/create.view.php', $viewData);

?>