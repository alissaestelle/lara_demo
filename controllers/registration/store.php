<!-- <pre><?= formatArr($_POST) ?></pre> -->
<?php
use App\Agent;
use App\Database;
use App\Validator;

$db = Agent::resolve(Database::class);

if ($_POST) {
    extract($_POST);
}

// Validate Form Input
$eMsg = Validator::verifyUser($email);
$pMsg = Validator::verifyCreds($password);

// Check if User Exists
// If Yes, Redirect to Login
// If No, Create User

function createUser($x, $y, $z)
{
    $getUser = 'SELECT * FROM users WHERE email = :email';
    $saveUser =
        'INSERT INTO users (email, password) VALUES (:email, :password)';

    $user = $x
        ->query($getUser, [
            ':email' => $y
        ])
        ->find();

    if ($user) {
        var_dump($user);

        $_SESSION['user'] = [
            'email' => $y
        ];

        viewPath('index.view.php', ['user' => $_SESSION['user']]);
        // header('location: /');
        exit();
    }

    $config = [
        ':email' => $y,
        ':password' => $z
    ];

    $x->query($saveUser, $config);

    // $_SESSION['user'] = [
    //     'email' => $y
    // ];

    header('location: /');
    exit();
}

$eMsg ?: $pMsg ?: createUser($db, $email, $password);

$viewData = [
    'email' => $email ?? '',
    'password' => $password ?? '',
    'eMsg' => $eMsg ?: '',
    'pMsg' => $pMsg ?: ''
];

viewPath('registration/create.view.php', $viewData);


?>