<?php

if ($_POST) extract($_POST);
if ($_SESSION) extract($_SESSION);

$viewData = [
    'user' => $user ??= false,
    'name' => $name ??= false,
    'email' => $email ??= false,
    'password' => $password ??= false,
    'eMsg' => $eMsg ??= false,
    'pMsg' => $pMsg ??= false,

];

viewPath('registration/create.view.php', $viewData);

?>