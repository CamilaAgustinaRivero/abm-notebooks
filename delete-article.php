<?php
if(!isset($_GET['id_article'])) {
    $message = "No se identificó el artículo a eliminar.";
} else {
    settype($_GET['id_article'], 'integer');
    $articleController -> deleteById($_GET['id_article']);
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
        <?php if($loginController -> logged_in()): ?>
            <h1 class="title"><?php echo htmlspecialchars($message)?></h1>
            <hr>
            <div style="text-align:center; margin:40px;">
                <a class="cancel-button" href="articles.php">Volver al listado de artículos</a>
            </div>
        <?php else: ?>
            <p style="margin:20px; text-align:center;">Necesita iniciar sesión para ver esta página.</p>
        <?php endif; ?>
    </body>
    <?php
    include("layouts/footer.php");
    ?>
</html>