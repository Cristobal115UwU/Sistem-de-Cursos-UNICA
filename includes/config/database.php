<?php
function conectarDB()  {
    try{
        $db = new PDO("pgsql:host=192.168.154.30;dbname=cursosunica","cursosunica",";(b4K5*CuR505sUn1c4\\5Y/W");
        //$db = new PDO("pgsql:host=127.0.0.1;dbname=cursosprueba;port=5435;","postgres","lol4dummie");
        return $db;
    }catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }
}