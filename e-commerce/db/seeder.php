<?php
    require('conexion.php');
    require('seeds/seeds_users.php');
    require('seeds/seeds_productos.php');
    
    $productos = array($seiren_x,$quadcast,$yeti_blackout,$blazar_gm300,$essential,$G203,$pulsefire_surge,$M719_RGB);

    foreach ($productos as $producto) {
        mysqli_query($connection,$producto);
    }
    $usuarios = array($admin);

    foreach ($usuarios as $usuario) {
        mysqli_query($connection,$usuario);
    }
    header('Location: ../views/index.php');
?>