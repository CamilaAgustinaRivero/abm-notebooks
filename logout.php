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
            <h2>Debe iniciar sesión para ver el contenido de esta página.</h2>
            <a class="logout-button" href="login.php">
                Iniciar sesión
            </a>
        </div>
    </body>
    <?php
    include("layouts/footer.php");
    ?>
</html>