<?php
require('./controllers/ArticleController.php');
$list = new ArticleController();

if(isset($_POST['add']) && $_POST['add'] == 'addArticle') {
    if(($_POST['brand'] == '') || ($_POST['model'] == '') || ($_POST['serial_number'] == '') || ($_POST['responsable_name'] == '')) {
        $message = "* Todos los datos son requeridos.";
    } else {
        //$newArticle = $list -> add($_POST);
        $message= "Artículo ingresado.";
    }
} else {
    $message = null;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include("layouts/head.php");
        ?>
        <title>Ingresar notebook</title>
    </head>
    <?php
    include("layouts/header.php");
    ?>
    <body>
        <h1 class="title">Ingresar nueva notebook</h1>
        <hr>
        <div class="container-form">
            <form action="new-article.php" method="post" enctype="multipart/form-data" class="form">
                <input type="hidden" name="add" id="add" value="addArticle"/>
                <!-- Brand -->
                <label for="brand">Ingrese marca:</label>
                <select id="brand" name="brand" class="form-item">
                    <option value="apple">Apple</option>
                    <option value="exo">EXO</option>
                    <option value="exo">Microsoft</option>
                    <option value="samsung">Samsung</option>
                </select>

                <!-- Model -->
                <label for="model">Ingrese modelo:</label>
                <select id="model" name="model" class="form-item">
                    <option value="macbook-air">Macbook Air</option>
                    <option value="macbook-pro">Macbook Pro</option>
                    <option value="galaxy-book">INDEC</option>
                    <option value="galaxy-chrome">Surface</option>
                    <option value="galaxy-book">Galaxy Book</option>
                    <option value="galaxy-chrome">Galaxy Chrome</option>
                </select>
                
                <!-- Serial number -->
                <label for="serial_number">Ingrese número de serie:</label>
                <input type="text" id="serial_number" name="serial_number" placeholder="Número de serie" class="form-item">

                <!-- Responsable name -->
                <label for="responsable_name">Ingrese el nombre del responsable de la notebook:</label>
                <input type="text" id="responsable_name" name="responsable_name" placeholder="Nombre y apellido" class="form-item">

                <span class="error"> <?php echo htmlspecialchars($message)?> </span>
                <!-- Submit -->
                <div style="text-align:center;">
                    <input type="submit" value="Ingresar nueva notebook" class="form-button">
                    <a class="cancel-button" href="articles.php">Cancelar</a>
                </div>
            </form>
        </div>
    </body>
    <?php
    include("layouts/footer.php");
    ?>
</html>