<?php

if ($_POST) extract($_POST);

$viewData = [
    'email' => $email ?? '',
    'password' => $password ?? '',
    'eMsg' => $eMsg ?? '',
    'pMsg' => $pMsg ?? '',

];

viewPath('registration/create.view.php', $viewData);

?>