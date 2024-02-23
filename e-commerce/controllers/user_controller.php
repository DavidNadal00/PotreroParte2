<?php 
    function createUser($credentials,$connection){
        $consulta="INSERT INTO users (username,password,email) VALUES ('".$credentials[0]."','".$credentials[1]."','".$credentials[2]."')";
        mysqli_query($connection,$consulta);
    }

    function loginUser($credentials,$connection){
        $consulta = "SELECT * FROM users WHERE username ='".$credentials[0]."' AND password='".$credentials[1]."'";

        $datos = mysqli_query($connection,$consulta);
        if($datos!=false){
            $datos=mysqli_fetch_array($datos);
        }
        return ($datos);
    }
?>