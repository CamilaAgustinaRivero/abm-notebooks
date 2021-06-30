<?php
require('./controllers/CalculatorController.php');
$calculatorController = new CalculatorController();
$message = null;
$price = 0;
if(isset($_POST['calculator']) && $_POST['calculator'] == 'shipping') {
    if(($_POST['weight'] == '') || ($_POST['lot'] == '') || ($_POST['adress'] == '')) {
        $message = "* Todos los datos son requeridos.";
    } else {
        $price = $calculatorController -> calculator($_POST);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <?php
    include("layouts/head.php");
    ?>
    <title>Calcular costos</title>
    </head>
    <?php
    include("layouts/header.php");
    ?>
    <body>
        <h1 class="title">Calcular costos de encomienda</h1>
        <hr>
        <?php if($loginController -> logged_in()): ?>
            <div class="container-form">
                <form method=post action="" class="form">
                    <input type="hidden" name="calculator" id="calculator" value="shipping"/>
                    <!-- Weight -->
                    <label for="weight">Ingrese el peso de la unidad (kg):</label>
                    <input type="text" id="weight" name="weight" placeholder="Ingrese el peso de cada unidad" class="form-item">

                    <!-- Lot -->
                    <label for="lot">Cantidad de notebooks a enviar:</label>
                    <input type="text" id="lot" name="lot" placeholder="Ingrese la cantidad a enviar" class="form-item">

                    <!-- Adress -->
                    <label for="adress">Destino:</label>
                    <select id="adress" name="adress" class="form-item">
                        <option value="amba">AMBA</option>
                        <option value="interior">Interior</option>
                    </select>
                    
                    <span class="error"> <?php echo htmlspecialchars($message)?> </span>
                    <!-- Submit -->
                    <div style="text-align:center;">
                    <input type="submit" value="Calcular" class="form-button">
                    <p>Costo de envío: $<?php echo $price ?></p>
                    </div>
                </form>
            </div>
        <?php else: ?>
            <p style="margin:20px; text-align:center;">Necesita iniciar sesión para ver esta página.</p>
        <?php endif; ?>
    </body>
</html>