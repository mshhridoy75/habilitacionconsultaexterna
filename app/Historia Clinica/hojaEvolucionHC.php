<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
session_start();
$varsesion = $_SESSION['usuario'];

if ($varsesion == null || $varsesion = '') {
    echo 'Usted no tiene autorizacion';
    die();
}

include '../db/conexion.php';

//$conn = OpenCon();


$actual = $_GET['actual'];
$sedeSelecc = $_GET['sede'];
$cedula = $_GET['cedula'];

$sql = "SELECT id FROM sede WHERE nombre='$sedeSelecc'";
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    $sedeId = $row['id'];
}

if ($actual != 'admin') {
    $verif = "SELECT numero_identificacion FROM hc_datos_identificacion 
WHERE id_Usuario = '$actual' AND id_Sede='$sedeId' AND id_Estandar=6 AND numero_identificacion='$cedula'";
    $envioverif = mysqli_query($conn, $verif);

    if ($row = $envioverif->fetch_assoc()) {


        $consulta = "SELECT fecha, tratamiento, nombre_odonto, paciente
FROM hc_evolucion 
where id_Usuario='$actual' AND id_Sede='$sedeId' AND id_Estandar=6 AND id_persona='$cedula'";
        $envio = mysqli_query($conn, $consulta);


?>
        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8" />
            <link rel="icon" type="image/png" href="./assets/img/favicon.png">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <title>
                Gestion Odontologo
            </title>
            <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
            <!--     Fonts and icons     -->
            <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
            <!-- CSS Files -->
            <link href="../css/bootstrap.min.css" rel="stylesheet" />
            <link href="../css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
            <link href="../css/index.css" rel="stylesheet" />
            <!-- CSS Just for demo purpose, don't include it in your project -->
            <link href="../demo/demo.css" rel="stylesheet" />
        </head>

        <body class="">
            <div class="wrapper ">
                <div class="sidebar" data-color="white" data-active-color="danger">
                    <div class="logo">
                        <a href="#" class="simple-text logo-mini">
                            <!--<div class="logo-image-small">
                        <img src="./app/img/logo.jpg">
                    </div>
                    <p>CT</p> -->
                        </a>

                        <div class="logo-image-big">
                            <img src="../img/logofinal.jpg">
                        </div>

                        <a class="simple-text logo-normal text-center">
                            Estandares
                            <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
                        </a>
                    </div>
                    <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li class="">
                            <a href="../Talento Humano/seleccTH.php?sedeSel=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">
                                <p>Talento Humano</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Infraestructura/seleccINF.php?sedeSel=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Infraestructura</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Dotacion/seleccDOT.php?sedeSel=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Dotacion</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Medicamentos/seleccMED.php?sedeSel=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Medicamentos y Dispositivos</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Procesos Prioritarios/seleccPP.php?sedeSel=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Procesos Prioritarios</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Historia Clinica/seleccHC.php?sedeSel=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Historia Clinica</p>
                            </a>
                        </li>
                        <li>
                            <a href="../../moduloPreguntas.php?sedeSel=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Modulo de preguntas</p>
                            </a>
                        </li>
                    </ul>
                </div>
                </div>
                <div class="main-panel" style="height: 100%;">
                    <!-- Navbar -->
                    <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                        <div class="container-fluid">
                            <div class="navbar-wrapper">
                                <a class="navbar-brand">Sede: <?php echo $sedeSelecc ?></a>
                                <a class="navbar-brand">Usuario: <?php echo $actual ?></a>

                            </div>
                            <div class="col-md-16">
                                <a href="cuenta.php">Gestionar Cuenta</a>
                                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <a href="../db/auth/sessiondie.php">Cerrar Sesion</a>
                                </a>
                            </div>
                        </div>


                    </nav>
                    <!-- End Navbar -->
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="description">Plan de tratamientos del paciente</h3>
                            </div>
                            <div class="col-md-12">

                                <div class="tinf1">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Tratamiento Ejecutado</th>
                                                <th scope="col">Nombre/Firma Odontologo</th>
                                                <th scope="col">Nombre/Firma Paciente</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            while ($row = $envio->fetch_assoc()) {
                                                $fecha = $row['fecha'];
                                                $tratamiento = $row['tratamiento'];
                                                $nombre_odonto = $row['nombre_odonto'];
                                                $paciente = $row['paciente'];


                                            ?>
                                                <tr>
                                                    <td><?php echo $fecha ?></td>
                                                    <td><?php echo $tratamiento ?></td>
                                                    <td><?php echo $nombre_odonto ?></td>
                                                    <td><?php echo $paciente ?></td>

                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>

                                <h3 class="description">Nuevo registro de evolucion</h3>

                            </div>

                            <div class="col-md-12">
                                <div class="tinf2">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Tratamiento Ejecutado</th>
                                                <th scope="col">Nombre/Firma Odontologo</th>
                                                <th scope="col">Nombre/Firma Paciente</th>
                                        </thead>
                                        <form method="POST" action="../db/nuevaEvolucionHC.php">
                                            <tbody>
                                                <tr>


                                                    <th><input type="date" class="form-control" name="fecha" id="fecha" required></th>
                                                    <th><input type="text" class="form-control" name="tratamiento" id="tratamiento" required></th>
                                                    <th><input type="text" class="form-control" name="firma_dr" id="firma_dr" required></th>
                                                    <td><input type="text" class="form-control" name="firma_paciente" id="firma_paciente" required>
                                                        <input type="hidden" id="sede" name="sede" value="<?php echo $sedeSelecc ?>">
                                                        <input type="hidden" id='actual' name="actual" value="<?php echo $actual ?>">
                                                        <input type="hidden" id='sedeId' name="sedeId" value="<?php echo $sedeId ?>">
                                                        <input type="hidden" id='cedula' name="cedula" value="<?php echo $cedula ?>">

                                                    </td>
                                                </tr>

                                            </tbody>


                                    </table>
                                    <div class="col col-md-3">
                                        <button type="submit" class="btn btn-success" href="">Guardar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



                <!--   Core JS Files   -->
                <script src="./assets/js/core/jquery.min.js"></script>
                <script src="./assets/js/core/popper.min.js"></script>
                <script src="./assets/js/core/bootstrap.min.js"></script>
                <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
                <!--  Google Maps Plugin    -->
                <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
                <!-- Chart JS -->
                <script src="./assets/js/plugins/chartjs.min.js"></script>
                <!--  Notifications Plugin    -->
                <script src="./assets/js/plugins/bootstrap-notify.js"></script>
                <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
                <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
        </body>

        </html>
    <?php
    } else {
    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title>Experto Calidad</title>
            <meta charset="utf-8" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <link rel="stylesheet" href="../../app/css/index.css" type="text/css">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <!------ Include the above in your HEAD tag ---------->
        </head>

        <body class="fondo-dos">


            <div class="succ text-center">


                <div class="col-12">
                    <h5>El usuario no tiene una historia clinica registrada</h1>
                </div>

                <div class="logo-image-big bt">
                    <img src="../img/cancel.png" alt="exitoso" class="img-succ"> </img>
                </div>

                <div>
                    <a class="btn btn-danger col col-md-auto" href="../../principalOdontologo.php?sedeSel=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">Continuar</a>
                </div>






            </div>
        </body>

        </html>


    <?php

        //header('Location: ../../gestionAdmin.php?sedeSel=$sede&usuarioSel=$odont');
    }

    ?>


    <?php } else {

    $odontoSelecc = $_GET['usuarioSel'];

    $verif = "SELECT numero_identificacion FROM hc_datos_identificacion 
    WHERE id_Usuario = '$odontoSelecc' AND id_Sede='$sedeId' AND id_Estandar=6 AND numero_identificacion='$cedula'";
    $envioverif = mysqli_query($conn, $verif);

    if ($row = $envioverif->fetch_assoc()) {


        $consulta = "SELECT fecha, tratamiento, nombre_odonto, paciente
    FROM hc_evolucion 
    where id_Usuario='$odontoSelecc' AND id_Sede='$sedeId' AND id_Estandar=6 AND id_persona='$cedula'";
        $envio = mysqli_query($conn, $consulta);


    ?>
        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8" />
            <link rel="icon" type="image/png" href="./assets/img/favicon.png">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <title>
                Gestion Administrador
            </title>
            <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
            <!--     Fonts and icons     -->
            <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
            <!-- CSS Files -->
            <link href="../css/bootstrap.min.css" rel="stylesheet" />
            <link href="../css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
            <link href="../css/index.css" rel="stylesheet" />
            <!-- CSS Just for demo purpose, don't include it in your project -->
            <link href="../demo/demo.css" rel="stylesheet" />
        </head>

        <body class="">
            <div class="wrapper ">
                <div class="sidebar" data-color="white" data-active-color="danger">
                    <div class="logo">
                        <a href="#" class="simple-text logo-mini">
                            <!--<div class="logo-image-small">
                            <img src="./app/img/logo.jpg">
                        </div>
                        <p>CT</p> -->
                        </a>

                        <div class="logo-image-big">
                            <img src="../img/logofinal.jpg">
                        </div>

                        <a class="simple-text logo-normal text-center">
                            Estandares
                            <!-- <div class="logo-image-big">
                <img src="../assets/img/logo-big.png">
              </div> -->
                        </a>
                    </div>


                    <div class="sidebar-wrapper">
                        <ul class="nav">
                            <li class="">
                                <a href="../Talento Humano/seleccTH.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                    <i class=""></i>
                                    <p>Talento Humano</p>

                                </a>
                            </li>
                            <li>
                                <a href="../Infraestructura/seleccINF.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                    <i class=""></i>
                                    <p>Infraestructura</p>
                                </a>
                            </li>
                            <li>
                                <a href="../Dotacion/seleccDOT.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                    <i class=""></i>
                                    <p>Dotacion</p>
                                </a>
                            </li>
                            <li>
                                <a href="../Medicamentos/seleccMED.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                    <i class=""></i>
                                    <p>Medicamentos y Dispositivos</p>
                                </a>
                            </li>
                            <li>
                                <a href="../Procesos Prioritarios/seleccPP.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                    <i class=""></i>
                                    <p>Procesos Prioritarios</p>
                                </a>
                            </li>
                            <li>
                                <a href="seleccHC.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                    <i class=""></i>
                                    <p>Historia Clinica</p>
                                </a>
                            </li>
                            <li>
                                <a href="../../moduloPreguntas.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                    <i class=""></i>
                                    <p>Modulo de preguntas</p>
                                </a>
                            </li>
                            <li>
                                <a href="../../gestionUsuarios.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                    <i class=""></i>
                                    <p>Gestion de Usuarios</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="main-panel" style="height: 100%;">
                    <!-- Navbar -->
                    <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                        <div class="container-fluid">
                            <div class="navbar-wrapper">
                                <a class="navbar-brand">Sede: <?php echo $sedeSelecc ?></a>
                                <a class="navbar-brand">Usuario: <?php echo $odontoSelecc ?></a>

                            </div>
                            <div class="col-md-16">
                                <a href="cuenta.php">Gestionar Cuenta</a>
                                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <a href="../db/auth/sessiondie.php">Cerrar Sesion</a>
                                </a>
                            </div>
                        </div>


                    </nav>
                    <!-- End Navbar -->
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="description">Plan de tratamientos del paciente</h3>
                            </div>
                            <div class="col-md-12">

                                <div class="tadm">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Tratamiento Ejecutado</th>
                                                <th scope="col">Nombre/Firma Odontologo</th>
                                                <th scope="col">Nombre/Firma Paciente</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            while ($row = $envio->fetch_assoc()) {
                                                $fecha = $row['fecha'];
                                                $tratamiento = $row['tratamiento'];
                                                $nombre_odonto = $row['nombre_odonto'];
                                                $paciente = $row['paciente'];


                                            ?>
                                                <tr>
                                                    <td><?php echo $fecha ?></td>
                                                    <td><?php echo $tratamiento ?></td>
                                                    <td><?php echo $nombre_odonto ?></td>
                                                    <td><?php echo $paciente ?></td>

                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>


                            </div>


                        </div>
                    </div>

                </div>



                <!--   Core JS Files   -->
                <script src="./assets/js/core/jquery.min.js"></script>
                <script src="./assets/js/core/popper.min.js"></script>
                <script src="./assets/js/core/bootstrap.min.js"></script>
                <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
                <!--  Google Maps Plugin    -->
                <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
                <!-- Chart JS -->
                <script src="./assets/js/plugins/chartjs.min.js"></script>
                <!--  Notifications Plugin    -->
                <script src="./assets/js/plugins/bootstrap-notify.js"></script>
                <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
                <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
        </body>

        </html>
    <?php
    } else {
    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title>Experto Calidad</title>
            <meta charset="utf-8" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <link rel="stylesheet" href="../../app/css/index.css" type="text/css">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <!------ Include the above in your HEAD tag ---------->
        </head>

        <body class="fondo-dos">


            <div class="succ text-center">


                <div class="col-12">
                    <h5>El usuario no tiene una historia clinica registrada</h1>
                </div>

                <div class="logo-image-big bt">
                    <img src="../img/cancel.png" alt="exitoso" class="img-succ"> </img>
                </div>

                <div>
                    <a class="btn btn-danger col col-md-auto" href="../../principalOdontologo.php?sedeSel=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">Continuar</a>
                </div>






            </div>
        </body>

        </html>


    <?php

        //header('Location: ../../gestionAdmin.php?sedeSel=$sede&usuarioSel=$odont');
    }

    ?>



<?php } ?>