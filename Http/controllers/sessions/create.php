<?php

$viewData = [
    'email' => $email ??= false,
    'password' => $password ??= false,
    'eMsg' => $eMsg ??= false,
    'pMsg' => $pMsg ??= false,
    'logMsg' => $logMsg ??= false,
];

viewPath('sessions/create.view.php', $viewData);