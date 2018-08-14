<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Marco Garcia - Gallery</title>

    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/css?family=MedievalSharp" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/all.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="css/imagehover.min.css" rel="stylesheet">
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>

        .img-responsive {
            margin: 20px;
            height: 100%;
            width: 100%;
        }

        figure {
            height: 200px;
            margin-right: 10%;
            padding: 0;
            background: #fff;
            overflow: hidden;
        }

        figure:hover + span {
            bottom: -36px;
            opacity: 1;
        }

        /* Zoom In #1 */
        .hover01 figure img {
            -webkit-transform: scale(1);
            transform: scale(1);
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
        }

        .hover01 figure:hover img {
            -webkit-transform: scale(1.3);
            transform: scale(1.3);
        }

        /* Zoom In #2 */
        .hover02 figure img {
            width: 300px;
            height: auto;
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
        }

        .hover02 figure:hover img {
            width: 350px;
        }
    </style>


</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Marco Galery</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container" style="margin-bottom: 150px">

    <h1 class="my-4 text-center text-lg-left">Thumbnail Gallery</h1>

    <p>BIENVENIDOS A MI PAGINA DE FOTOS</p>

    <div class="row text-center text-lg-left">
        <?php foreach ($fotos as $foto): ?>
            <div class="col-lg-3 col-md-4 col-xs-6  ">
                <div class="hover01 ">
                    <figure>
                        <a href="foto.php?id=<?php echo $foto ['id']; ?> ">
                            <img class="img-responsive " src="uploads/<?php echo $foto ['imagen'] ?> "></a>
                    </figure>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if ($pagina_actual > 1): ?>
        <a href="index.php?p=<?php echo $pagina_actual - 1; ?>">
            <button class="btn btn-primary float-left izquierda"><i class="fa fa-arrow-left"></i> Anterior</button>
        </a>
    <?php endif; ?>
    <?php if ($total_paginas != $pagina_actual): ?>
        <a href="index.php?p=<?php echo $pagina_actual + 1; ?>">
            <button class="btn btn-primary float-right derecha">Siguiente <i class="fa fa-arrow-right"></i></button>
        </a>
    <?php endif; ?>


</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
