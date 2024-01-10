<?php

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


?>
