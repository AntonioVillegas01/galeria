<?php

require 'funciones.php';

$conexion = conexion('practicas_php', 'root', 'cyber');

if (!$conexion) {
    echo "Error: There was a problem . Please try again.";
    die();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

if (!$id) {
    header('location: index.php');
}

    $statement= $conexion->prepare('SELECT * FROM fotos WHERE id = :id');
    $statement->execute(array(':id' => $id));

    $foto = $statement->fetch();

    if (!$foto) {
        header('location: index.php');
    }



require  'views/foto.view.php';
?>