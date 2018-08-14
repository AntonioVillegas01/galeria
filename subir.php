<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'funciones.php';

// define variables and set to empty values
$photoErr = $tituloErr = $textoErr ="";
$photo = $titulo = $texto = "";
$error= '';
$mensaje= '';

$conexion = conexion('practicas_php', 'root', 'cyber');

if (!$conexion) {
    echo "Error: There was a problem uploading your file. Please try again.";
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {

    if (empty($_POST["titulo"])) {
        $tituloErr = "El titulo es requerido";
    }
    if (empty($_POST["texto"])) {
        $textoErr = "El texto es requerido";
    } else {

        $check = @getimagesize($_FILES ['foto']['tmp_name']);
        if ($check !== false) {
            $carpeta_destino = 'uploads/';
            $archivo_subido = $carpeta_destino . $_FILES ['foto']['name'];
            move_uploaded_file($_FILES ['foto']['tmp_name'], $archivo_subido);

            $statement = $conexion->prepare('INSERT into fotos (titulo,imagen,texto)
                VALUES (:titulo,:imagen,:texto);
                ');

            $statement->execute(array(
                ':titulo' => strtoupper( $_POST['titulo']),
                ':imagen' => $_FILES['foto']['name'],
                ':texto' => $_POST['texto']
            ));
            $mensaje = "File Uploaded Successfully!";
            header("refresh:2;index.php"); //refresh 3 second and redirect to index.php page


        } else
            $error = "El archivo no cumple con las caracteristicas de tamaño o extension";
    }
}

require 'views/subir.view.php';

?>