<?php

if ($_POST) extract($_POST);
if ($_SESSION) extract($_SESSION);

$viewData = [
    'user' => ($user ??= false),
    'page' => 'New Note',
    'title' => $title ?? '',
    'body' => $body ?? '',
    'alert' => ''
];

viewPath('notes/create.view.php', $viewData);

?>