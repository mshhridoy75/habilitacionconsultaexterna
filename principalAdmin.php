<?php
session_start();
$varsesion = $_SESSION['usuario'];


if ($varsesion == null || $varsesion = '') {
    echo 'Usted no tiene autorizacion';
    die();
}
$actual = $_GET['usuario'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Experto Calidad</title>
    <meta charset="utf-8" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="app/css/index.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body class="fondo">

    <div class="modal-dialog text-center">
        <div class="col-sm-10 main-section">
            <div class="modal-content">
                <!-- Tabs Titles -->

                <!-- Icon -->
                <div class="logo-image-big">
                    <img src="app/img/logofinale.jpg" alt="logo" style="width:100%; "> </img>
                </div>

                <!-- Login Form -->

                <div class="col-12">
                    <h5>Seleccione el profesional a gestionar:</h1>
                </div>

                <!-- <form method="POST" action="principalOdontologo.php"> -->
                <div class="tinf1">
                    <div class="form-group container">
                        <div class="row m-2">
                            <div class="col-md-12">

                                <?php
                                include 'app/db/conexion.php';

                                $sql = "SELECT id FROM usuario WHERE rol='odontologo'";
                                $result = mysqli_query($conn, $sql);
                                while ($row = $result->fetch_assoc()) {
                                    $odont = $row['id'];

                                ?>

                                    <div class="row justify-content-md-center">
                                        <div class="col col-md-7">
                                            <h5 class="description"><?php echo $odont ?> </h5>
                                        </div>
                                        <form method="POST" action="sedeAdmin.php?odont=<?php echo $odont ?>&actual=<?php echo $actual ?>">
                                            <div class="col col-md-3" style="margin-bottom: 1.5rem;">
                                                <button type="submit" class="btn btn-success" href="">Navegar</button>
                                            </div>

                                        </form>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
    </div>
</body>
<html>