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
function createUser($w, $x, $y, $z)
{
    $getUser = 'SELECT * FROM users WHERE email = :email';
    $saveUser =
        'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';

    $user = $w
        ->query($getUser, [
            ':email' => $y
        ])
        ->find();

    if ($user) {
        extract($user);
        $first = explode(' ', $name);

        login($first[0], $y);
        header('location: /');
        exit();
    }

    if (!$user) {
        $config = [
            ':name' => $x,
            ':email' => $y,
            ':password' => password_hash($z, PASSWORD_BCRYPT)
        ];

        $w->query($saveUser, $config);

        login($x, $y);
        header('location: /');
        exit();
    }
}

$eMsg ?: $pMsg ?: createUser($db, $name, $email, $password);

$viewData = [
    'user' => $user ??= false,
    'name' => $name ??= false,
    'email' => $email ??= false,
    'password' => $password ??= false,
    'eMsg' => $eMsg ?: false,
    'pMsg' => $pMsg ?: false
];

viewPath('registration/create.view.php', $viewData);


?>