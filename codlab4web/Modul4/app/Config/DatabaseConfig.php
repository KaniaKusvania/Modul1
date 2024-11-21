<?php
namespace app\Config;

class DatabaseConfig {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database_name = "nama_database";
    private $port = 3306;
    public $connection;

    public function __construct() {
        $this->connection = new \mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function __destruct() {
        $this->connection->close();
    }
}
?>
