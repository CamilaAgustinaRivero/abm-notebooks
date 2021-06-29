<?php
require_once('./database/Connection.php');
require_once('./models/User.php');

class LoginController {
    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getInstance();
    }

    public function loginUser($username, $pw)
    {
        $sql = "SELECT Users.id, Users.name, Users.password FROM Users WHERE Users.name=:username AND Users.password=:userpassword";
        $statement = $this->conn->getConnection()->prepare($sql);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':userpassword', $pw);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "User");
        return $statement->fetch();
    }
}
?>