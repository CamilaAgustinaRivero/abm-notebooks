<?php
require_once('./database/config.php');

class Connection
{
    private static $instance;

    private $connection;

    private function setConnection($conn)
    {
        $this->connection = $conn;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function disconnect()
    {
        $this->setConnection(null);
        self::$instance = null;
    }

    private function __construct()
    {
        try {
            $connection = new PDO(DSN, DB_USER, DB_PASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setConnection($connection);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
?>