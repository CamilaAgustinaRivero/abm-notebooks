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

    public function sessionStart() 
    {
        session_start();
    }

    public function logged_in() 
    {
        return isset($_COOKIE["PHPSESSID"]);
    }

    public function sessionDestroy() 
    {
        session_start();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }
}
?>