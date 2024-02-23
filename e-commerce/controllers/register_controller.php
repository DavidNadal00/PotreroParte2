<?php
    require("user_controller.php");
    require("../db/conexion.php");

    $credentials= validateRegistration($_POST);

    createUser($credentials,$connection);
    header('Location: ../views/index.php');

    function validateRegistration($datos) {
        $user=$datos["username"];
        $password=$datos["password"];
        $email=$datos["email"];
        $credentials=array($user,$password,$email);
        return $credentials;
    }
?>