<?php
class Database {

    public $connection;

    public function __construct() {
        $this->open_database_connection();
    }

    public function open_database_connection() {
        try {
            $dsn = 'mysql:host='. DB_HOST .';dbname='. DB_NAME;
            $this->connection = new PDO($dsn, DB_USER, DB_PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection Failed! <br>' . $e->getMessage());
        }
    }
}

$database = new Database();
?>