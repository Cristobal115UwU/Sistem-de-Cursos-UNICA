<?php 

    // Consultar la propiedad
    require 'includes/config/database.php';
    $db = conectarDB();


    // Inserta un admin
    $email = "correo@admin.com";
    $password = "1234";

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    // echo strlen($passwordHash);


    // echo $passwordHash;

    $query = "INSERT INTO admin (correo_admin, password_admin) VALUES('${email}', '${passwordHash}') ";
    $resultado = $db->query($query);
?>