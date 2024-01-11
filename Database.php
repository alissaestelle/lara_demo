<?php // Connect to MySQL Database → Execute Query

class Database
{
    // PDO → PHP Data Object
    // $dsn → Data Source Name (String)
    // ↳ Examples: Port, Host, Database Name
    public PDO $connection;

    function __construct(
        public array $config,
        public string $user,
        public string $pw
    ) {
        $buildQuery = http_build_query($this->config, '', ';');
        $dsn = "mysql:{$buildQuery}";
        $opts = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $this->connection = new PDO($dsn, $this->user, $this->pw, $opts);
        // Scope Resolution Operator → ::
        // ↳ Double colons after classes enable access to any static methods belonging to that class.
    }

    function query($req, $params = [])
    {
        $query = $this->connection->prepare($req);
        $query->execute($params);

        // return $query->fetchAll(PDO::FETCH_ASSOC);
        return $query;
    }
}
?>
