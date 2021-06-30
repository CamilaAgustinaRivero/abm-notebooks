<?php
require('./controllers/ArticleController.php');
$articleController = new ArticleController();
$articles = $articleController -> getAll(); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include("layouts/head.php");
        ?>
        <title>Listado de Notebooks</title>
    </head>
    <?php
    include("layouts/header.php");
    ?>
    <body>
        <h1 class="title">Listado de Notebooks</h1>
        <hr>
        <?php if($loginController -> logged_in()): ?>
            <div class="container-table">
                <table class="table">
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Número de serie</th>
                    <th>Nombre de la persona responsable</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($articles as $article): ?>
                    <tr>
                    <td><?php echo $article->brand ?></td>
                    <td><?php echo $article->model ?></td>
                    <td><?php echo $article->serial_number ?></td>
                    <td><?php echo $article->responsable_name ?></td>
                    <td style="text-align:center;">
                        <a href="edit-article.php?id_article=<?php echo $article->id?>">
                            <i class="far fa-edit" style="color:#EEB100;"></i>
                        </a>
                        &nbsp
                        <a href="delete-article.php?id_article=<?php echo $article->id?>"><i class="far fa-trash-alt" style="color:#C54F34;"></i></a>
                    </td>
                    </tr>
                <?php endforeach; ?>
                </table>
            </div>
        <?php else: ?>
            <p style="margin:20px; text-align:center;">Necesita iniciar sesión para ver esta página.</p>
        <?php endif; ?>
    </body>
    <?php
    include("layouts/footer.php");
    ?>
</html>