<?php // Connect to MySQL Database → Execute Query

class Database
{
    // PDO → PHP Data Object
    // $dsn → Data Source Name (String)
    // ↳ Examples: Port, Host, Database Name

    public PDO $connection;

    function __construct(
        public string $user,
        public string $pw,
        public string $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=demobase;user=alissa;charset=utf8mb4',
        public array $opts = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    ) {
        $this->connection = new PDO($dsn, $user, $pw, $opts);
    }

    function query($req)
    {
        $query = $this->connection->prepare($req);
        $query->execute();

        // return $query->fetchAll(PDO::FETCH_ASSOC);
        return $query;
    }
}

$db = new Database('alissa', '');
$post = $db->query('SELECT * FROM posts WHERE id = 1')->fetch();

// $posts = $db->query('SELECT * FROM posts WHERE id > 1')->fetchAll(PDO::FETCH_ASSOC);
?>

<pre><?= formatArr($post['title']) ?></pre>

<!-- <?php foreach ($posts as $p): ?>
<li><?= $p['title'] ?></li>
<?php endforeach; ?> -->