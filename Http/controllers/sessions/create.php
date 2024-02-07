<?php

$viewData = [
    'email' => $email ??= false,
    'password' => $password ??= false,
    'errors' => $errs ??= false
];

viewPath('sessions/create.view.php', $viewData);