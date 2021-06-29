<?php
require('./controllers/ArticleController.php');
$list = new ArticleController();
$article = null;
if(isset($_POST['search']) && $_POST['search'] == 'searchArticle') {
    if(($_POST['search-box'] == '')) {
        $message = "No se ingresaron datos en el buscador.";
    } else {
        $article = $list -> searchById($_POST["search-box"]);
        if (!$article) {
            $message = "No se encontraron resultados.";
        } else {
            $message = null;
        }
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
        <title>Home</title>
    </head>
    <?php
    include("layouts/header.php");
    ?>
    <body>
        <h1 class="title">
            Bienvenido al sistema de 
            </br>Gestión de notebooks del INDEC
        </h1>
        <hr>
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
                <p><b>Marca:</b> <?php echo ($article) ? $article[0] -> brand_id : '[Marca]' ?> </p>
                <p><b>Modelo:</b> <?php echo ($article) ? $article[0] -> model : '[Modelo]' ?> </p>
                <p><b>Número de serie:</b> <?php echo ($article) ? $article[0] -> serial_number : '[ABC123]' ?> </p>
                <p><b>Responsable:</b> <?php echo ($article) ? $article[0] -> responsable_name : '[Nombre y apellido]' ?> </p>
            </div>
        </div>
    </body>
    <?php
    include("layouts/footer.php");
    ?>
</html>