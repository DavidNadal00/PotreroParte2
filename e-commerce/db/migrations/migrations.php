<?php
    $table_product="CREATE TABLE productos (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        type VARCHAR(50),
        title VARCHAR(500),
        description TEXT,
        brand VARCHAR(50),
        model VARCHAR(50) UNIQUE,
        price FLOAT,
        discount INT(2),
        img VARCHAR(500),
        link VARCHAR(300) 
    )";
    $table_users="CREATE TABLE users (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(150) UNIQUE,
        email VARCHAR(200),
        password VARCHAR(550),
        type VARCHAR(150)
    )";
?>