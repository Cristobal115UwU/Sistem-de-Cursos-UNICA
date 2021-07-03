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

    $query = "INSERT INTO admin (correo, password) VALUES('${email}', '${passwordHash}') ";

    $db->query($query);

?>