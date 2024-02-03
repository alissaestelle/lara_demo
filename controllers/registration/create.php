<?php

$viewData = [
    'firstName' => $firstName ??= false,
    'lastName' => $lastName ??= false,
    'email' => $email ??= false,
    'password' => $password ??= false,
    'eMsg' => $eMsg ??= false,
    'pMsg' => $pMsg ??= false,

];

viewPath('registration/create.view.php', $viewData);

?>