<?php

$db_host="localhost"; //localhost server
$db_user="root"; //database username
$db_password="cyber"; //database password
$db_name="curso_galeria"; //database name



function conexion($db_name,$db_user,$db_password){
    try
    {
        $conexion=new PDO("mysql:host=127.0.0.1;dbname={$db_name}",$db_user,$db_password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;

    }
    catch(PDOEXCEPTION $e)
    {
        $e->getMessage();
    }

}





?>