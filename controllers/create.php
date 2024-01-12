<?php
$page = 'New Note';

$dbConfig = include 'config.php';
$db = new Database($dbConfig['database'], 'alissa', '');

$reqType = $_SERVER['REQUEST_METHOD'];
$statement = 'INSERT INTO notes (body, userID) VALUES (:body, :userID)';

if ($reqType === 'POST') {
    $postBody = $_POST['body'];
    
    function checkPass($x, $y, $z)
    {
        $config = [
            'body' => $z,
            // 'userID' => $_POST['userID']
            'userID' => 2
        ];

        $validData = $x->query($y, $config);
        return $validData;
    }

    function checkFail($a) {
        return $a;
    }

    (strlen($postBody) === 0
            ? $alert = checkFail('Body Required')
            : strlen($postBody) > 1000)
        ? $alert = checkFail('Character Maximum Exceeded')
        : checkPass($db, $statement, $postBody);
        
    include 'views/create.view.php';
}

// include 'views/create.view.php';
?>

<script>
</script>