<?php
use App\Agent;
use App\Database;
use App\Validator;

$db = Agent::resolve(Database::class);

if ($_POST) extract($_POST);
if ($_SESSION) extract($_SESSION);

// Validate Form Input
$eMsg = Validator::verifyAcct($email);
$pMsg = Validator::verifyCreds($password);

// Check if User Exists
function createUser($v, $w, $x, $y, $z)
{
    $getUser = 'SELECT * FROM users WHERE email = :email';
    $saveUser =
        'INSERT INTO users (firstName, lastName, email, password) VALUES (:firstName, :lastName, :email, :password)';

    $user = $v
        ->query($getUser, [
            ':email' => $y
        ])
        ->find();

    if ($user) {
        extract($user);
        // $first = explode(' ', $name);

        login($firstName, $email);
        header('location: /');
        exit();
    }

    if (!$user) {
        $config = [
            ':firstName' => $w,
            ':lastName' => $x,
            ':email' => $y,
            ':password' => password_hash($z, PASSWORD_BCRYPT)
        ];

        $v->query($saveUser, $config);

        login($w, $y);
        header('location: /');
        exit();
    }
}

$eMsg ?: $pMsg ?: createUser($db, $firstName, $lastName, $email, $password);

$viewData = [
    'firstName' => ($firstName ??= false),
    'lastName' => ($lastName ??= false),
    'email' => ($email ??= false),
    'password' => ($password ??= false),
    'eMsg' => $eMsg ?: false,
    'pMsg' => $pMsg ?: false
];

viewPath('registration/create.view.php', $viewData);

?>