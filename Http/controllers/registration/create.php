<?php

use App\Session;

$viewData = [
    'errors' => Session::get('_MSGS', 'ERRS') ?? []
];

viewPath('registration/create.view.php', $viewData);

?>