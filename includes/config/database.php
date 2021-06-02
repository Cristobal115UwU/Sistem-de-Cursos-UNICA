<?php
function conectarDB()  {
    try{
        $db = new PDO("pgsql:host=192.168.154.30;dbname=cursosunica","cursosunica",";(b4K5*CuR505sUn1c4\\5Y/W");
        return $db;
    }catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }
}