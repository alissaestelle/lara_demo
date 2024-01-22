<?php

$postTitle = $_POST['title'] ?? '';
$postBody = $_POST['body'] ?? '';

$viewData = ['page' => 'New Note', 'title' => $postTitle, 'body' => $postBody, 'alert' => ''];

viewPath('notes/create.view.php', $viewData);

?>