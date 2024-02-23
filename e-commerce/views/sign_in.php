<?php
    require("../db/conexion.php");
    require("../controllers/user_controller.php");
    session_start();
    if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
        $datos = loginUser(array($_SESSION["username"], $_SESSION["password"]), $connection);
        $auth = ($datos != false);
    } else {
        $auth = false;
    }
    if($auth==true){
        header('location: ../views/index.php');
    }
?>
<!DOCTYPE html>
<html lang="es-ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="shortcut icon" href="../public/img/logo_e-commerce_red-black.png" type="image/x-icon">
    <link rel="stylesheet" href="../public/css/card.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="../public/js/script.js" defer></script>
    <title>Registrarse</title>
</head>
<body>
    <?php 
        require_once("../views/template.php");
    ?>
    <section>
        <form action="../controllers/register_controller.php" method="POST" class="registration-form">
                <h1>Registrarse</h1>
                <div class="form-group">
                    <label for="usuario" class="form-label">Usuario:</label>
                    <input type="text" id="usuario" name="username" class="form-input" placeholder="Usuario">
                </div>
                <div class="form-group">
                    <label for="correo" class="form-label">Correo Electrónico:</label>
                    <input type="email" id="correo" name="email" class="form-input" placeholder="Correo Electrónico">
                </div class="form-group">
                <div class="form-group">
                    <label for="contrasena" class="form-label">Contraseña:</label>
                    <input type="password" id="contrasena" name="password" class="form-input" placeholder="Contraseña">
                </div>
                <div class="form-group">
                    <button type="submit" class="form-submit-button">Registrarse</button>
                </div>
        </form>
    </section>    
</body>
</html>