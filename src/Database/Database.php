<?php

namespace Cmostores\Database;
use mysqli;

class Database {
    private $host;
    private $username;
    private $password;
    private $dbname;
    public $connection;

    public function __construct() {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = 'Shawen@123';
        $this->dbname = 'cmo_stores';

        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function connection() {
        return $this->connection;
    }
}

?>