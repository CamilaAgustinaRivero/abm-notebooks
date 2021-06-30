<?php
require('./controllers/LoginController.php');
$loginController = new LoginController();
$loginController -> sessionDestroy();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include("layouts/head.php");
        ?>
        <title>Log out</title>
    </head>
    <body>
        <h1 class="title">Log out</h1>
        <div class="container-logout">
            <a class="nav-button" href="login.php">
                Iniciar sesión
            </a>
        </div>
    </body>
    <?php
    include("layouts/footer.php");
    ?>
</html>