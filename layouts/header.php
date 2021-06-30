<?php
require('./controllers/LoginController.php');
$loginController = new LoginController();
?>

<header>
    <nav class="navbar">
        <div>
            <ul class="nav-list">
                <li>
                    <a class="nav-item" href="index.php">
                        <img src="./img/favicon.png" style="width: 25px;">
                    </a>
                </li>
                <li>
                   <a class="nav-item" href="new-article.php">Ingresar nueva notebook</a>
                </li>
                <li>
                    <a class="nav-item" href="articles.php">Listado de notebooks</a>
                </li>
                <li>
                    <a class="nav-item" href="search-article.php">Buscar notebook</a>
                </li>
                <li>
                    <a class="nav-item" href="#">Calcular costo de encomienda</a>
                </li>
                <?php if($loginController -> logged_in()): ?>
                    <li>
                        <button class="logout-button">
                            Cerrar sesión
                        </button>
                    </li>
                <?php else: ?>
                    <li>
                        <a class="nav-button" href="login.php">
                            Iniciar sesión
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>