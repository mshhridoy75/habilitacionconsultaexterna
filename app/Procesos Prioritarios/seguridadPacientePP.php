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

$sql = "SELECT id FROM sede WHERE nombre='$sedeSelecc'";
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    $sedeId = $row['id'];
}
if ($actual != 'admin') {

    $consulta = "SELECT causas, accion_mejora, fecha_inicio, fecha_final, fecha_seguimiento, resultado
FROM pp_seguridad_paciente
WHERE id_Usuario='$actual' AND id_Sede='$sedeId' AND id_Estandar=5";
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
                            <h3 class="description">Seguridad del paciente</h3>
                        </div>
                        <div class="col-md-12">

                            <div class="tinf1">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Causas</th>
                                            <th scope="col">Accion de mejora</th>
                                            <th scope="col">Fecha de Inicio</th>
                                            <th scope="col">Fecha de Finalización</th>
                                            <th scope="col">Fecha de seguimiento</th>
                                            <th scope="col">Resultado del seguimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        while ($row = $envio->fetch_assoc()) {
                                            $causas = $row['causas'];
                                            $mejora = $row['accion_mejora'];
                                            $inicio = $row['fecha_inicio'];
                                            $final = $row['fecha_final'];
                                            $seguimiento = $row['fecha_seguimiento'];
                                            $resultado = $row['resultado'];

                                        ?>
                                            <tr>
                                                <td><?php echo $causas ?></td>
                                                <td><?php echo $mejora ?></td>
                                                <td><?php echo $inicio ?></td>
                                                <td><?php echo $final ?></td>
                                                <td><?php echo $seguimiento ?></td>
                                                <td><?php echo $resultado ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>

                            <h3 class="description">Nuevo plan de mejoramiento</h3>

                        </div>

                        <div class="col-md-12">
                            <div class="tinf2">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Causas</th>
                                            <th scope="col">Accion de mejora</th>
                                            <th scope="col">Fecha de Inicio</th>
                                            <th scope="col">Fecha de Finalización</th>
                                            <th scope="col">Fecha de seguimiento</th>
                                            <th scope="col">Resultado del seguimiento</th>
                                    </thead>
                                    <form method="POST" action="../db/nuevoPlanSeguriPaciente.php">
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" name="causas" id="causas" required></td>
                                                <td><input type="text" class="form-control" name="mejora" id="mejora" required></td>
                                                <td><input type="date" class="form-control" name="inicio" id="inicio" required></td>
                                                <td><input type="date" class="form-control" name="final" id="final" required></td>
                                                <td><input type="date" class="form-control" name="seguimiento" id="seguimiento"></td>
                                                <td><select class="custom-select" name="resultado" id="resultado" required>
                                                        <option value="Se cumplio">Se cumplio</option>
                                                        <option value="Atrasada">Atrasada</option>
                                                        <option value="No iniciada">No iniciada</option>
                                                    </select>
                                                    <input type="hidden" id="sede" name="sede" value="<?php echo $sedeSelecc ?>">
                                                    <input type="hidden" id='actual' name="actual" value="<?php echo $actual ?>">
                                                    <input type="hidden" id='sedeId' name="sedeId" value="<?php echo $sedeId ?>">
                                                </td>
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



<?php } else {

    $odontoSelecc = $_GET['usuarioSel'];
    $consulta = "SELECT causas, accion_mejora, fecha_inicio, fecha_final, fecha_seguimiento, resultado
    FROM pp_seguridad_paciente
    WHERE id_Usuario='$odontoSelecc' AND id_Sede='$sedeId' AND id_Estandar=5";
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
                            <a href="seleccPP.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Procesos Prioritarios</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Historia Clinica/seleccHC.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
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
                            <h3 class="description">Seguridad del paciente</h3>
                        </div>
                        <div class="col-md-12">

                            <div class="tadm">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Causas</th>
                                            <th scope="col">Accion de mejora</th>
                                            <th scope="col">Fecha de Inicio</th>
                                            <th scope="col">Fecha de Finalización</th>
                                            <th scope="col">Fecha de seguimiento</th>
                                            <th scope="col">Resultado del seguimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        while ($row = $envio->fetch_assoc()) {
                                            $causas = $row['causas'];
                                            $mejora = $row['accion_mejora'];
                                            $inicio = $row['fecha_inicio'];
                                            $final = $row['fecha_final'];
                                            $seguimiento = $row['fecha_seguimiento'];
                                            $resultado = $row['resultado'];

                                        ?>
                                            <tr>
                                                <td><?php echo $causas ?></td>
                                                <td><?php echo $mejora ?></td>
                                                <td><?php echo $inicio ?></td>
                                                <td><?php echo $final ?></td>
                                                <td><?php echo $seguimiento ?></td>
                                                <td><?php echo $resultado ?></td>
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

<?php } ?>