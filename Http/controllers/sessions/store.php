<?php

use App\Authenticator;
use App\Session;
use Http\Forms\Login;

extract($_POST);

// Validate User Login Form:
$form = new Login();
$validation = $form->validate($email, $password);

// If User Input Valid → Authenticate the User:
if ($validation) {
    $auth = new Authenticator();
    $status = $auth->attempt($email, $password);

    // Check for Auth Errors
        // Error Found → (Error = True)
        // Error Not Found → (Error = False)
    $error = $status ?: false;

    // User Authentication
        // Error === True ? Generate Error
        // Error === False ? Redirect to User Dashboard
    $error ? $form->setError($status) : redirect('/');
}

Session::print('_MSGS', ['ERRS' => $form->getErrors()]);
Session::print('OLD', ['EMAIL' => $email]);

// If User Input Invalid → Return to Login Page:

$viewData = [
    'email' => Session::get('OLD', 'EMAIL') ?? false,
    'errors' => Session::get('_MSGS', 'ERRS') ?? []
];

redirect('/login', $viewData);
// viewPath('sessions/create.view.php', $viewData);

?>