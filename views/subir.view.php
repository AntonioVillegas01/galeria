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
        .error {color: #FF0000;}
    </style>
    <style>

        .img-responsive {
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
        .center {
            margin: auto;
            width: 80%;
            border: 0px solid green;
            padding: 10px;
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

    <h1 class="my-4 text-center">Subir Foto</h1>
    <br>
    <div class="row text-center text-lg-left">
        <div class="col-lg-12">
            <form class="center" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>">

                <div class="form-group">
                    <label for="photo">Selecciona tu foto</label>
                    <input type="file" class="form-control-file" id="photo" name="foto" required>
                </div>

                <div class="form-group">
                    <label for="titulo">Titulo de la foto</label>
                    <span class="error">* <?php echo $tituloErr;?></span>
                    <input style="text-transform: uppercase;" type="text" class="form-control-file" id="titulo" name="titulo">
                </div>

                <div class="form-group">
                    <label for="texto">Descripción</label>
                    <span class="error">* <?php echo $textoErr;?></span>
                    <textarea class="form-control" id="texto" name="texto" rows="5" placeholder="Ingresa la descripcion" maxlength="200"></textarea>
                </div>
                <br>
                <?php if (isset($error)): ?>
                    <p class="error"> <?php echo $error; ?></p>
                <?php endif; ?>
                <?php if (isset($mensaje)): ?>
                    <p style="color: green"> <?php echo $mensaje ?> </p>
                <?php endif; ?>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                        <input type="submit"  name="btn_insert" class="btn btn-success " value="Insert">
                        <input type="reset"  name="btn_reset" class="btn btn-danger " value="Reset">
                    </div>
                </div>
                <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
            </form>
        </div>


    </div>


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
