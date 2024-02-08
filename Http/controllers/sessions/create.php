<?php

$viewData = [
    'email' => $email ??= false,
    'password' => $password ??= false,
    'errors' => $errs ??= []
];

viewPath('sessions/create.view.php', $viewData);