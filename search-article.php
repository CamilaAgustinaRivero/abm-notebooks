<?php
require('./controllers/ArticleController.php');
require('./controllers/BrandController.php');
$articleController = new ArticleController();
$brandController = new BrandController();
$article = null;
$message = null;
if(isset($_POST['search']) && $_POST['search'] == 'searchArticle') {
    if(($_POST['search-box'] == '')) {
        $message = "No se ingresaron datos en el buscador.";
    } else {
        $article = $articleController -> searchById($_POST["search-box"]);
        $article[0]->brand_id = $brandController -> getById($article[0]->brand_id);
        if (!$article) {
            $message = "No se encontraron resultados.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <?php
    include("layouts/head.php");
    ?>
    <title>Buscar Notebook</title>
    </head>
    <?php
    include("layouts/header.php");
    ?>
    <body>
        <h1 class="title">Buscar Notebook</h1>
        <hr>
        <?php if($loginController -> logged_in()): ?>
            <div class="container-search">
                <h2>Buscar notebook por número de serie: </h2>
                <form method=post  action="" class="search-form">
                    <input type="hidden" name="search" id="search" value="searchArticle"/>
                    <input type="text" id="search-box" name="search-box" placeholder="ABC1234" class="search">
                    <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
                </form>
                <span class="error"> <?php echo htmlspecialchars($message)?> </span>
            </div>
            <div class="container-info">
                <div style="text-align:center;">
                    <h2>RESULTADOS OBTENIDOS</h2>
                    <p><b>Marca:</b> <?php echo ($article) ? $article[0] -> brand_id -> name : '[Marca]' ?> </p>
                    <p><b>Modelo:</b> <?php echo ($article) ? $article[0] -> model : '[Modelo]' ?> </p>
                    <p><b>Número de serie:</b> <?php echo ($article) ? $article[0] -> serial_number : '[ABC123]' ?> </p>
                    <p><b>Responsable:</b> <?php echo ($article) ? $article[0] -> responsable_name : '[Nombre y apellido]' ?> </p>
                </div>
            </div>
        <?php else: ?>
            <p style="margin:20px; text-align:center;">Necesita iniciar sesión para ver esta página.</p>
        <?php endif; ?>
    </body>
</html>