<?php
error_reporting(E_ALL); ini_set('display_errors', 1);

//require 'funciones.php';

$conexion = conexion ('curso_galeria','root','cybercyber');


if (!$conexion) {
    echo 'IMPOSIBLE CONECTAR A LA BASE DE DATOS :(';
    die();
}

// define variables and set to empty values
$photoErr = $tituloErr = $textoErr ="";
$photo = $titulo = $texto = "";
$error= '';
$mensaje= '';


// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["titulo"])) {
        $tituloErr = "El titulo es requerido";
    }
    if (empty($_POST["texto"])) {
        $textoErr = "El texto es requerido";
    }else{

    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg","JPG" => "image/JPG", "jpeg" => "image/jpeg", "JPEG" => "image/JPEG","gif" => "image/gif", "png" => "image/png" );
        $filename = $_FILES["photo"]["name"];
        $filetype = strtolower($_FILES["photo"]["type"]) ;
        $filesize = $_FILES["photo"]["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die( "Error: Please select a valid format and try again.");

        // Verify file size - 10MB maximum
        $maxsize = 1 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit try again with a smaller file.");

        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $_FILES["photo"]["name"])){
                echo $_FILES["photo"]["name"] . "  already exists on server.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $_FILES["photo"]["name"]);

                $statement = $conexion->prepare('INSERT into fotos (titulo,imagen,texto)
                VALUES (:titulo,:imagen,:texto);
                ');

                $statement->execute(array(
                    ':titulo' => $_POST['titulo'],
                    ':imagen' => $_FILES['photo']['name'],
                    ':texto'  => $_POST['texto']
                ));

                $mensaje="File Uploaded Successfully!";
              //  header("refresh:2;index.php"); //refresh 3 second and redirect to index.php page

            }
        } else{
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else{
        echo "  Error:  " . $_FILES["photo"]["error"];
    }
}

}


require  'views/subir.view.php';
?>