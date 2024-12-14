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
$nombre = $_POST['nombre'];

$sql = "SELECT id FROM sede WHERE nombre='$sedeSelecc'";
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    $sedeId = $row['id'];
}


$consulta = "SELECT nombre_Empleado, tema_Evaluacion, tipo_Evaluacion, pregunta, respuesta, correcta, puntuacion, accion_Mejora FROM th_eval where id_Usuario='$actual' AND id_Sede='$sedeId' AND id_Estandar=1 AND nombre_Empleado='$nombre'";
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
        <div class="main-panel" style="height: 100vh;">
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
                        <h3 class="description">Evaluación del personal</h3>
                    </div>
                    <div class="col-md-12">

                        <div class="tinf1">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre de Empleado</th>
                                        <th scope="col">Tema de Evaluación</th>
                                        <th scope="col">Tipo de Evaluación</th>
                                        <th scope="col">Pregunta</th>
                                        <th scope="col">Respuesta</th>
                                        <th scope="col">Correcta</th>
                                        <th scope="col">Puntuacion</th>
                                        <th scope="col">Accion de mejora</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    while ($row = $envio->fetch_assoc()) {
                                        $nombre = $row['nombre_Empleado'];
                                        $tema = $row['tema_Evaluacion'];
                                        $tipo = $row['tipo_Evaluacion'];
                                        $pregunta = $row['pregunta'];
                                        $respuesta = $row['respuesta'];
                                        $correcta = $row['correcta'];
                                        $puntuacion = $row['puntuacion'];
                                        $accion = $row['accion_Mejora'];

                                    ?>
                                        <tr>
                                            <td><?php echo $nombre ?></td>
                                            <td><?php echo $tema ?></td>
                                            <td><?php echo $tipo ?></td>
                                            <td><?php echo $pregunta ?></td>
                                            <td><?php echo $respuesta ?></td>
                                            <td><?php echo $correcta ?></td>
                                            <td><?php echo $puntuacion ?></td>
                                            <td><?php echo $accion ?></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>

                        <h3 class="description">Nueva evaluación</h3>

                    </div>

                    <div class="col-md-12">
                        <div class="tinf2">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Tema de Evaluación</th>
                                        <th scope="col">Tipo de Evaluación</th>
                                        <th scope="col">Pregunta</th>
                                        <th scope="col">Respuesta</th>
                                        <th scope="col">Correcta</th>
                                        <th scope="col">Puntuacion</th>
                                        <th scope="col">Accion de mejora</th>
                                </thead>
                                <form method="POST" action="../db/nuevaEva.php">
                                    <tbody>
                                        <tr>
                                            <th><input type="text" class="form-control" name="tema" id="tema"></th>
                                            <td><input type="text" class="form-control" name="tipo" id="tipo"></td>
                                            <td><input type="text" class="form-control" name="pregunta" id="pregunta"></td>
                                            <td><input type="text" class="form-control" name="respuesta" id="respuesta"></td>
                                            <td><select class=" custom-select" name="correcta" id="correcta">
                                                    <option value="si">Si</option>
                                                    <option value="no">No</option>
                                                </select></td>
                                            <td><input type="number" class="form-control" name="puntuacion" id="puntuacion"></td>
                                            <td><input type="text" class="form-control" name="accion" id="accion">
                                                <input type="hidden" id="sede" name="sede" value="<?php echo $sedeSelecc ?>">
                                                <input type="hidden" id='actual' name="actual" value="<?php echo $actual ?>">
                                                <input type="hidden" id='sedeId' name="sedeId" value="<?php echo $sedeId ?>">
                                                <input type="hidden" id='nombre' name="nombre" value="<?php echo $nombre ?>">
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