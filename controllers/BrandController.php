<?php
require_once('./database/Connection.php');
require_once('./models/Brand.php');
class BrandController {
    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getInstance();
    }

    public function getById($id)
    {
        $sql = "SELECT Brands.id, Brands.name FROM Brands WHERE Brands.id=:id";
        $statement = $this->conn->getConnection()->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Brand");
        return $statement->fetch();
    }

    public function getIdByName($name)
    {
        $sql = "SELECT Brands.id, Brands.name FROM Brands WHERE Brands.name=:name";
        $statement = $this->conn->getConnection()->prepare($sql);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Brand");
        return $statement->fetch();
    }
}
?>