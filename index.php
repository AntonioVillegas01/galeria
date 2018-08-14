<?php
error_reporting(E_ALL); ini_set('display_errors', 1);

require 'funciones.php';
$fotos_por_pagina = 8;

$pagina_actual = (isset($_GET ['p']) ? (int)$_GET['p'] : 1 );
$inicio = ($pagina_actual > 1)  ? $pagina_actual * $fotos_por_pagina - $fotos_por_pagina : 0;


$conexion = conexion('practicas_php', 'root', 'cyber');
if(!$conexion){
    //redireccionar a pagina de error falta agregar pagina
    die();
}


$statement = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM fotos LIMIT $inicio, $fotos_por_pagina");

$statement->execute();
$fotos = $statement->fetchAll();

if(!$fotos){
    header('location: error.php');
}

$statement = $conexion->prepare("
SELECT FOUND_ROWS() as total_filas");

$statement->execute();
$total_post = $statement->fetch()['total_filas'];

$total_paginas = ceil($total_post / $fotos_por_pagina );




require 'views/index.view.php';



?>