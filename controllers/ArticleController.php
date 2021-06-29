<?php
require_once('./database/Connection.php');
require_once('./models/Article.php');

class ArticleController
{
    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getInstance();
    }

    public function getAll()
    {
        $sql = "SELECT Articles.id, Articles.serial_number, Articles.responsable_name, Articles.brand_id, Articles.model, Brands.name AS `brand` FROM articles INNER JOIN brands ON Articles.brand_id=Brands.id ORDER BY brand";
        $statement = $this->conn->getConnection()->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "article");
        return $statement->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT Articles.id, Articles.serial_number, Articles.responsable_name, Articles.brand_id, Articles.model, Brands.name AS `brand` FROM articles INNER JOIN brands ON Articles.brand_id=Brands.id WHERE Articles.id=:id";
        $statement = $this->conn->getConnection()->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "article");
        return $statement->fetchAll();
    }

    public function add($obj)
    {   
        $sqlAdd = "INSERT INTO articles (serial_number, responsable_name, id, model, brand_id)"
        . "VALUES ('".$obj['serial_number']."', '".$obj['responsable_name']."', '".$obj['id']."', '".$obj['model']."', '".$obj['brand']->id."')";
        $statementAdd = $this->conn->getConnection()->prepare($sqlAdd)->execute();
    }

    public function deleteById($id)
    {
        $sqlDelete = 'DELETE FROM articles WHERE id=:id';
        $statementDelete = $this->conn->getConnection()->prepare($sqlDelete);
        $statementDelete->bindValue(':id', $id);
        $statementDelete->execute();
    }

    public function modifyById($id, $obj)
    {
        $sqlModify = "UPDATE Articles SET `model`=:model, `brand_id`=:brand_id, `responsable_name`=:responsable_name WHERE `id`=:id";
        $statementModify = $this->conn->getConnection()->prepare($sqlModify);
        $statementModify->bindValue(':model', $obj['model']);
        $statementModify->bindValue(':brand_id', $obj['brand_id']);
        $statementModify->bindValue(':responsable_name', $obj['responsable_name']);
        $statementModify->bindValue(':id', $id);
        $statementModify->execute();
    }

    public function searchById($id)
    {
        $sqlSearch = "SELECT * FROM articles where `serial_number`=:serial_number";
        $statementSearch = $this->conn->getConnection()->prepare($sqlSearch);
        $statementSearch->bindValue(':serial_number', $id);
        $statementSearch->execute();
        $statementSearch->setFetchMode(PDO::FETCH_CLASS, "article");
        return $statementSearch->fetchAll();
    }
}
?>