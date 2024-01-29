<?php
use App\Agent;
use App\Database;
use App\Validator;

$db = Agent::resolve(Database::class);

if ($_POST) extract($_POST);
if ($_SESSION) extract($_SESSION);

// Validate Form Input
$eMsg = Validator::verifyUser($email);
$pMsg = Validator::verifyCreds($password);

// Check if User Exists
function createUser($x, $y, $z)
{
    $getUser = 'SELECT * FROM users WHERE email = :email';
    $saveUser =
        'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';

    $user = $x
        ->query($getUser, [
            ':email' => $y
        ])
        ->find();

    if ($user) {
        extract($user);
        $first = explode(' ', $name);

        $_SESSION['user'] = [
            'name' => $first[0],
            'email' => $y
        ];

        header('location: /');
        exit();
    }

    if (!$user) {
        $config = [
            ':name' => 'Jane Doe',
            ':email' => $y,
            ':password' => $z
        ];

        $x->query($saveUser, $config);

        $_SESSION['user'] = [
            'name' => 'Jane Doe',
            'email' => $y
        ];

        header('location: /');
        exit();
    }
}

$eMsg ?: $pMsg ?: createUser($db, $email, $password);

$viewData = [
    'user' => $user ??= false,
    'email' => $email ?? '',
    'password' => $password ?? '',
    'eMsg' => $eMsg ?: '',
    'pMsg' => $pMsg ?: ''
];

viewPath('registration/create.view.php', $viewData);


?>