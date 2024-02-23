<?php
    require("../db/conexion.php");
    require("../controllers/user_controller.php");
    require_once("../controllers/products_controller.php");
    session_start();
    // Verificar si las claves "username" y "password" están definidas en $_SESSION
    if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
        $datos = loginUser(array($_SESSION["username"], $_SESSION["password"]), $connection);
        $auth = ($datos != false);
    } else {
        $auth = false;
    }
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/card.css">
    <link rel="shortcut icon" href="../public/img/logo_e-commerce_red-black.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Inicio</title>
</head>
<body>
    <?php 
        require_once("../views/template.php");
    ?>
    <section class="product">
        <h2>Microfono</h2>
        <button class="pre-btn"><img src="../public/img/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="../public/img/arrow.png" alt=""></button>
        <div class="product-container">
            <?php 
                productMic($connection);
            ?>
        </div> 
    </section>
    <section class="product">
        <h2>Mouse</h2>
        <button class="pre-btn"><img src="../public/img/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="../public/img/arrow.png" alt=""></button>
        <div class="product-container">
            <?php 
                productMouse($connection);
            ?>
        </div> 
    </section>
    <footer>
        <nav>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-youtube"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-tiktok"></i></a>
        </nav>
        <p style="margin-block:5px;">Todos los derechos reservados &copy; 2023 Empresa de Hardware</p>
    </footer>
    <script src="../public/js/script.js"></script>
    <script src="../public/js/modal.js"></script>
</body>
</html>