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

$conn = OpenCon();

$actual = $_GET['actual'];
$sedeSelecc = $_GET['sede'];
$odontoSelecc = $_GET['usuarioSel'];

$sql = "SELECT id FROM sede WHERE nombre='$sedeSelecc'";
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    $sedeId = $row['id'];
}


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
        <div class="main-panel" style="height: auto;">
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
                        <h3 class="description">Indicadores</h3>
                    </div>
                    <div class="col-md-12">
                        <form action="../db/nuevoIndicadorPP.php" method="POST">
                            <div class="row justify-content-md-center">
                                <div class="col col-md-5">
                                    <h5 class="description">Porcentaje de incidentes o eventos adversos asociados a fallas en la identificación del paciente: </h5>
                                    <input type="hidden" name="n1" value="Porcentaje de incidentes o eventos adversos asociados a fallas en la identificación del paciente">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Numerador" title="Número de incidentes o eventos adversos asociados a fallas en la identificación del paciente" name="numerador" id="numerador">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Denominador" title="Total de eventos adversos presentados en el periodo" name="denominador" id="denominador">
                                </div>

                            </div>
                            <div class="row justify-content-md-center">
                                <div class="col col col-md-5">
                                    <h5 class="description">Proporción de pacientes identificados correctamente: </h5>
                                    <input type="hidden" name="n2" value="Proporción de pacientes identificados correctamente">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Numerador" title="Número pacientes identificados correctamente con minimo dos datos personales" name="numerador2" id="numerador2">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Denominador" title="Total de pacientes identificados" name="denominador2" id="denominador2">
                                </div>

                            </div>

                            <div class="row justify-content-md-center">
                                <div class="col col col-md-5">
                                    <h5 class="description">Número total de eventos adversos detectados y gestionados: </h5>
                                    <input type="hidden" name="n3" value="Número total de eventos adversos detectados y gestionados">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Numerador" title="Número total de eventos adversos detectados y gestionados" name="numerador3" id="numerador3">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Denominador" title="Número total de eventos adversos detectados" name="denominador3" id="denominador3">
                                </div>

                            </div>

                            <div class="row justify-content-md-center">
                                <div class="col col col-md-5">
                                    <h5 class="description">Proporción de infecciones derivadas de los procedimientos realizados: </h5>
                                    <input type="hidden" name="n4" value="Proporción de infecciones derivadas de los procedimientos realizados">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Numerador" title="Número de pacientes con infección posterior a la atención" name="numerador4" id="numerador4">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Denominador" title="Número total de pacientes a quienes se les realizo procedimiento" name="denominador4" id="denominador4">
                                </div>

                            </div>

                            <div class="row justify-content-md-center">
                                <div class="col col col-md-5">
                                    <h5 class="description">Proporción de complicaciones derivadas de los procedimientos realizados: </h5>
                                    <input type="hidden" name="n5" value="Proporción de complicaciones derivadas de los procedimientos realizados">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Numerador" title="Número de pacientes con Complicaciones derivadas de los procedimientos, posteriores a la atención" name="numerador5" id="numerador5">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Denominador" title="Número total de pacientes atendidos a quienes se les realizo un procedimiento" name="denominador5" id="denominador5">
                                </div>

                            </div>

                            <div class="row justify-content-md-center">
                                <div class="col col col-md-5">
                                    <h5 class="description">Proporción de complicaciones anestésicas: </h5>
                                    <input type="hidden" name="n6" value="Proporción de complicaciones anestésicas">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Numerador" title="Número total de pacientes que presentaron complicaciones anestésicas" name="numerador6" id="numerador6">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Denominador" title="Número total de pacientes atendidos a quienes se les aplicó anestesia local" name="denominador6" id="denominador6">
                                </div>

                            </div>

                            <div class="row justify-content-md-center">
                                <div class="col col col-md-5">
                                    <h5 class="description">Complicaciones quirúrgicas: </h5>
                                    <input type="hidden" name="n7" value="Complicaciones quirúrgicas">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Numerador" title="Numero total de pacientes con complicacion QX" name="numerador7" id="numerador7">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Denominador" title="Numero total de  pacientes a los que se les realizo procedimientos quirúrgicos" name="denominador7" id="denominador7">
                                </div>

                            </div>

                            <div class="row justify-content-md-center">
                                <div class="col col col-md-5">
                                    <h5 class="description">Proporción de infecciones en la consulta: </h5>
                                    <input type="hidden" name="n8" value="Proporción de infecciones en la consulta">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Numerador" title="Número de infecciones en la consulta " name="numerador8" id="numerador8">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Denominador" title="Numero total de procedimientos realizados " name="denominador8" id="denominador8">
                                </div>

                            </div>

                            <div class="row justify-content-md-center">
                                <div class="col col col-md-5">
                                    <h5 class="description">Proporción de reacciones adversas a medicamentos: </h5>
                                    <input type="hidden" name="n9" value="Proporción de reacciones adversas a medicamentos">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Numerador" title="Número de casos notificados de reacción adversa a medicamentos causados en un periodo determinado " name="numerador9" id="numerador9">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Denominador" title="Población medicada durante ese periodo " name="denominador9" id="denominador9">
                                </div>

                            </div>

                            <div class="row justify-content-md-center">
                                <div class="col col col-md-5">
                                    <h5 class="description">Porcentaje de errores de medicación: </h5>
                                    <input type="hidden" name="n10" value="Porcentaje de errores de medicación">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Numerador" title="Número de errores de medicación en el periodo " name="numerador10" id="numerador10">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Denominador" title="Numero de pacientes atendidos en el periodo " name="denominador10" id="denominador10">
                                </div>

                            </div>

                            <div class="row justify-content-md-center">
                                <div class="col col col-md-5">
                                    <h5 class="description">Proporción de caidas del paciente: </h5>
                                    <input type="hidden" name="n11" value="Proporción de caidas del paciente">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Numerador" title=" Número de caídas " name="numerador11" id="numerador11">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Denominador" title="No de pacientes atendidos o remitidos en el periodo " name="denominador11" id="denominador11">
                                </div>

                            </div>

                            <div class="row justify-content-md-center">
                                <div class="col col col-md-5">
                                    <h5 class="description">Adherencia al protocolo prevención de caidas: </h5>
                                    <input type="hidden" name="n12" value="Adherencia al protocolo prevención de caidas">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Numerador" title="Criterios cumplidos" name="numerador12" id="numerador12">
                                </div>
                                <div class="col col-md-2">
                                    <input type="number" class="" placeholder="Denominador" title="Criterios a cumplir  " name="denominador12" id="denominador12">
                                </div>

                            </div>
                            <div class="row justify-content-md-center">
                                <button type="submit" class="btn btn-success" href="">Guardar</button>
                            </div>
                            <input type="hidden" id="sede" name="sede" value="<?php echo $sedeSelecc ?>">
                            <input type="hidden" id='actual' name="actual" value="<?php echo $actual ?>">
                            <input type="hidden" id='sedeId' name="sedeId" value="<?php echo $sedeId ?>">
                        </form>
                    </div>




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