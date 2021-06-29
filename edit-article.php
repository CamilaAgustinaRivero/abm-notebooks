<?php
require('./controllers/ArticleController.php');
require('./controllers/BrandController.php');
$articleController = new ArticleController();
$article = $articleController -> getById($_GET["id_article"]);
$brandController = new BrandController();
$message = null;
if(isset($_POST['update']) && $_POST['update'] =='updateArticle') {
    if(($_POST['brand'] == '') || ($_POST['model'] == '') || ($_POST['responsable_name'] =='')) {
        $message = "* Todos los datos son requeridos.";
    } else {
        $brand_id = $brandController -> getIdByName($_POST['brand']);
        $_POST['brand_id'] = $brand_id->id;
        $articleController -> modifyById($_GET["id_article"], $_POST);
        $message = "Artículo actualizado.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include("layouts/head.php");
        ?>
        <title>Editar notebook</title>
    </head>
    <?php
    include("layouts/header.php");
    ?>
    <body>
        <h1 class="title">Editar notebook</h1>
        <hr>
        <div class="container-info">
            <div class="info">
                <h2>DATOS DE LA NOTEBOOK SELECCIONADA </h2>
                <p><b>Marca:</b> <?php echo $article[0] -> brand ?></p>
                <p><b>Modelo:</b> <?php echo $article[0] -> model ?> </p>
                <p><b>Número de serie:</b> <?php echo $article[0] -> serial_number ?> </p>
                <p><b>Responsable:</b> <?php echo $article[0] -> responsable_name ?> </p>
            </div>
        </div>
        <div class="container-form">
            <form method=post action="" class="form">
                <input type="hidden" name="update" id="update" value="updateArticle"/>
                <!-- Brand -->
                <label for="brand">Actualizar marca:</label>
                <select id="brand" name="brand" class="form-item">
                    <option value="apple">Apple</option>
                    <option value="exo">EXO</option>
                    <option value="exo">Microsoft</option>
                    <option value="samsung">Samsung</option>
                </select>

                <!-- Model -->
                <label for="model">Actualizar modelo:</label>
                <select id="model" name="model" class="form-item">
                    <option value="macbook-air">Macbook Air</option>
                    <option value="macbook-pro">Macbook Pro</option>
                    <option value="indec">INDEC</option>
                    <option value="indec">Surface</option>
                    <option value="galaxy-book">Galaxy Book</option>
                    <option value="galaxy-chrome">Galaxy Chrome</option>
                </select>

                <!-- Responsable name -->
                <label for="responsable_name">Actualizar nombre del responsable de la notebook:</label>
                <input type="text" id="responsable_name" name="responsable_name" placeholder="Nombre y apellido" class="form-item">

                <span class="error"> <?php echo htmlspecialchars($message)?> </span>
                <!-- Submit -->
                <div style="text-align:center;">
                    <input type="submit" value="Actualizar" class="form-button">
                    <a class="cancel-button" href="articles.php">Volver</a>
                </div>
            </form>
        </div>
    </body>
</html>