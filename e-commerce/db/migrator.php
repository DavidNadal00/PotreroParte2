<?php
    require('conexion.php');
    require('migrations/migrations.php');
    //require('migrations/migrations_dropped.php');

    $tables=array($table_product,$table_users);
    //$tables_dropped=array($td_disk);

    //Creating tables
    foreach ($tables as $table) {
        mysqli_query($connection,$table);
    }

    //Dropping tables
    /*foreach ($tables_dropped as $table_dropped) {
        mysqli_query($connection,$table_dropped);
    }*/    

    header('Location: seeder.php');
?>