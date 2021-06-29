<?php
require('./controllers/ArticleController.php');
$list = new ArticleController();

if(!isset($_GET['id_article'])) {
    $message = "No se identificó el artículo a eliminar.";
} else {
    settype($_GET['id_article'], 'integer');
    $list -> deleteById($_GET['id_article']);
    $message = "Artículo eliminado.";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include("layouts/head.php");
        ?>
        <title>Eliminar notebook</title>
    </head>
    <?php
    include("layouts/header.php");
    ?>
    <body>
        <h1 class="title"><?php echo htmlspecialchars($message)?></h1>
        <hr>
        <div style="text-align:center; margin:40px;">
            <a class="cancel-button" href="articles.php">Volver al listado de artículos</a>
        </div>
    </body>
    <?php
    include("layouts/footer.php");
    ?>
</html>