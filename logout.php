<?php
require('./controllers/LoginController.php');
$loginController = new LoginController();
$loginController -> sessionDestroy();
header("Location: ./index.php");
?>