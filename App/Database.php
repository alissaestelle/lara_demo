<?php // Connect to MySQL Database → Execute Query

namespace App;

// PDO is a class provided by PHP and is considered a global class. It simply needs to be enabled with the 'use' keyword.
use PDO;

class Database
{
    // PDO → PHP Data Object
    // $dsn → Data Source Name (String)
    // ↳ Examples: Port, Host, Database Name
    public PDO $connection;
    public mixed $query;

    function __construct(
        public array $config,
        public string $user,
        public string $pw
    ) {
        $buildQuery = http_build_query($this->config, '', ';');
        $dsn = "mysql:{$buildQuery}";

        $opts = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        // Scope Resolution Operator → ::
        // ↳ Double colons after classes enable access to any static methods belonging to that class.

        $this->connection = new PDO($dsn, $this->user, $this->pw, $opts);
    }

    function query($req, $params = [])
    {
        $this->query = $this->connection->prepare($req);
        $this->query->execute($params);

        // return $query->fetchAll(PDO::FETCH_ASSOC);
        // return $query;
        return $this;
    }

    function find()
    {
        $results = $this->query->fetch();
        // return $results ?: eHandler(404);
        return $results;
    }

    function findAll()
    {
        $results = $this->query->fetchAll();
        // return $results ?: eHandler(404);
        return $results;
    }
} ?>

<!-- The query() fx was changed to incorporate query statements into the object itself versus simply returning them. Statements saved as attributes can now be applied to other methods, conditionals, etc. -->