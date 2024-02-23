<?php
      $admin = create_seed_user(
        'Admin',
        'nadaldavid1@hotmail.com',
        'tecadmin2013',
        'administrador'
    );
    function create_seed_user($username,$email,$password,$type){
        return ("INSERT INTO users (username,email,password,type)
        VALUES ('".$username."','".$email."','".$password."','".$type."')");
    }
?>
