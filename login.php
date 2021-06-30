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
    $message = null;
    if(isset($_POST['session']) && $_POST['session'] == 'sessionStart') {
        if(($_POST['username'] == '') || ($_POST['password'] == '')) {
            $message = "* Todos los datos son requeridos.";
        } else {
            $login_data = $loginController -> loginUser($_POST["username"], $_POST["password"]);
            if ($login_data) {
                $loginController -> sessionStart();
                header("Location: ./index.php");
            } else {
                $message = "Los datos ingresados no son correctos.";
            }
        }
    }
    ?>
    <body>
        <h1 class="title">Iniciar sesión</h1>
        <div class="container-form">
            <form action="login.php" method="post" class="form" id="login">
                <input type="hidden" name="session" id="session" value="sessionStart"/>
                
                <!-- Username -->
                <label for="username">Ingrese nombre de usuario:</label>
                <input type="text" id="username" name="username" placeholder="Nombre de usuario" class="form-item">
                
                <!-- Password -->
                <label for="password">Ingrese contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Contraseña" class="form-item">
                
                <span class="error"> <?php echo htmlspecialchars($message)?> </span>
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