<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include("layouts/head.php");
        ?>
        <title>Iniciar sesión</title>
    </head>
    <?php
    include("layouts/header.php");
    ?>
    <body>
        <h1 class="title">Iniciar sesión</h1>
        <div class="container-form">
            <form action="login.php" method="post" class="form" id="login">
                <!-- Username -->
                <label for="username">Ingrese nombre de usuario:</label>
                <input type="text" id="username" name="username" placeholder="Nombre de usuario" class="form-item">
                <p>
                    <?php if ($errors->get('username')) {
                    echo 'Los datos ingresados no son validos.';}
                    ?>
                </p>

                <!-- Password -->
                <label for="password">Ingrese contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Contraseña" class="form-item">
            
                <!-- Submit -->
                <div class="container-form">
                    <input type="submit" value="Iniciar sesión" class="form-button">
                </div>
            </form>
        </div>
    </body>
    <?php
    include("layouts/footer.php");
    ?>
</html>
<script src="js/login.js"></script>