<?php

// ** GENERAL **

// echo nl2br("Test Text \n");
// Note: The echo keyword only accepts string values.

// Note: var_dump() accepts all datatypes.

// Superglobals
// ↳ PHP includes universal variables that can be used in any script/file (i.e. $_SERVER).

// "Include" === "Paste"

// Class Example
class Post
{
    public string $author;

    function __construct(public string $title)
    {
    }

    function details()
    {
        $postDetails = "{$this->title} by {$this->author}";
        return $postDetails;
    }
}

$phpBasics = new Post('Understanding PHP Basics');
$phpBasics->author = 'Alissa Wiley';
?>

<?php
// Namespacing is a way to organize/route class files. If a given folder contains a collection of class files, the namepace for those files would be the name of the folder. If those classes were then used in other parts of the project later, they could be imported with the 'use' keyword (i.e. use <Folder>/<Class>)
?>


<?php
// Connect to MySQL Database Example

$dsn =
    'mysql:host=127.0.0.1;port=3306;dbname=demobase;user=alissa;charset=utf8mb4';
$pdo = new PDO($dsn);
// PDO → PHP Data Object
// $dsn → Data Source Name (String)
// ↳ Examples: Port, Host, Database Name

$query = $pdo->prepare('SELECT * FROM posts');
$query->execute();

$posts = $query->fetchAll(PDO::FETCH_ASSOC);

// $post = $db->query('SELECT * FROM posts')->fetchAll();
// $posts = $db->query('SELECT * FROM posts WHERE id > 1')->fetchAll();

// $userID = $_GET['id'] ?? '';
// $test = 'SELECT * FROM posts WHERE id = ?';
// $test = 'SELECT * FROM posts WHERE id = :id';
// $posts = $db->query($test, ['id' => $userID])->fetch();
?>


<?php
// Unusable Fx (Saving for the Logic)

function switchViews($uri)
{
    switch ($uri) {
        case '/':
            include 'controllers/index.php';
            break;
        case '/about':
            include 'controllers/about.php';
            break;
        case '/contact':
            include 'controllers/contact.php';
            break;
        default:
            include 'views/404.php';
            break;
    }
}

function testController($arr, $x)
{
    foreach ($arr as $k => $v) {
        if ($k === $x) {
            include $v;
        }
    }
}

function liveController($arr, $k)
{
    array_key_exists($k, $arr) ? include basePath($arr[$k]) : eHandler(404);
}

// Routes Logic That I Enjoyed:

// foreach ($routes as $k => $v) {
//     $router->routes[] = [$k => $v];
// }

?>