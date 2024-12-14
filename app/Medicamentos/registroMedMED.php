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
    $consulta = "SELECT nombre, principio_activo, forma_farmac, concentracion, unidad_medida, fecha_vencimiento, lote, presentacion, registro_sanitario  
FROM med_reg_medicamentos 
where id_Usuario='$actual' AND id_Sede='$sedeId' AND id_Estandar=4
ORDER BY 
   fecha_vencimiento ASC";
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
                            <h3 class="description">Registro Medicamentos</h3>
                        </div>
                        <div class="col-md-12">

                            <div class="tinf1">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Principio Activo</th>
                                            <th scope="col">Forma Farmaceutica</th>
                                            <th scope="col">Concentracion</th>
                                            <th scope="col">Unidad de medida</th>
                                            <th scope="col">Fecha de Vencimiento</th>
                                            <th scope="col">Lote</th>
                                            <th scope="col">Presentacion</th>
                                            <th scope="col">Registro Sanitario</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        while ($row = $envio->fetch_assoc()) {
                                            $nombre = $row['nombre'];
                                            $principio = $row['principio_activo'];
                                            $forma = $row['forma_farmac'];
                                            $concentracion = $row['concentracion'];
                                            $unidad = $row['unidad_medida'];
                                            $fecha = $row['fecha_vencimiento'];
                                            $lote = $row['lote'];
                                            $presentacion = $row['presentacion'];
                                            $registro_sanitario = $row['registro_sanitario'];

                                        ?>
                                            <tr>
                                                <td><?php echo $nombre ?></td>
                                                <td><?php echo $principio ?></td>
                                                <td><?php echo $forma ?></td>
                                                <td><?php echo $concentracion ?></td>
                                                <td><?php echo $unidad ?></td>
                                                <td><?php echo $fecha ?></td>
                                                <td><?php echo $lote ?></td>
                                                <td><?php echo $presentacion ?></td>
                                                <td><?php echo $registro_sanitario ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content">
                                <div class="col col-md-2">
                                    <h5 class="description">Generar Consolidado </h5>
                                </div>
                                <form method="POST" action="../db/consMedicamentosMED.php">
                                    <div class="col">
                                        <th> <select class=" custom-select" name="mes" id="mes">
                                                <option value="1">Enero</option>
                                                <option value="2">Febrero</option>
                                                <option value="3">Marzo</option>
                                                <option value="4">Abril</option>
                                                <option value="5">Mayo</option>
                                                <option value="6">Junio</option>
                                                <option value="7">Julio</option>
                                                <option value="8">Agosto</option>
                                                <option value="9">Septiembre</option>
                                                <option value="10">Octubre</option>
                                                <option value="11">Noviembre</option>
                                                <option value="12">Diciembre</option>
                                        </th>
                                        </select>
                                        <input type="hidden" id="sede" name="sede" value="<?php echo $sedeId ?>">
                                        <input type="hidden" id='actual' name="actual" value="<?php echo $actual ?>">
                                        <button type="submit" class="btn btn-success" href="">Generar</button>
                                    </div>
                                </form>
                            </div>



                        </div>

                        <div class="col-md-12">
                            <h3 class="description">Nuevo Medicamento</h3>
                            <div class="tinf2">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Principio Activo</th>
                                            <th scope="col">Forma Farmaceutica</th>
                                            <th scope="col">Concentracion</th>
                                            <th scope="col">Unidad de medida</th>
                                            <th scope="col">Fecha de Vencimiento</th>
                                            <th scope="col">Lote</th>
                                            <th scope="col">Presentacion</th>
                                            <th scope="col">Registro Sanitario</th>
                                    </thead>
                                    <form method="POST" action="../db/nuevoMedMED.php">
                                        <tbody>
                                            <tr>
                                                <th><input type="text" class="form-control" name="nombre" id="nombre" required></th>
                                                <th><input type="text" class="form-control" name="principio" id="principio" required></th>
                                                <th><input type="text" class="form-control" name="forma" id="forma" required></th>
                                                <th><input type="text" class="form-control" name="concentracion" id="concentracion" required></th>
                                                <th><input type="text" class="form-control" name="unidad" id="unidad" required></th>
                                                <th><input type="date" class="form-control" name="fecha" id="fecha" required></th>
                                                <th><input type="text" class="form-control" name="lote" id="lote" required></th>
                                                <th><input type="text" class="form-control" name="presentacion" id="presentacion" required></th>
                                                <td><input type="text" class="form-control" name="registro" id="registro" required>
                                                    <input type="hidden" id="sede" name="sede" value="<?php echo $sedeSelecc ?>">
                                                    <input type="hidden" id='actual' name="actual" value="<?php echo $actual ?>">
                                                    <input type="hidden" id='sedeId' name="sedeId" value="<?php echo $sedeId ?>">
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
    $consulta = "SELECT nombre, principio_activo, forma_farmac, concentracion, unidad_medida, fecha_vencimiento, lote, presentacion, registro_sanitario  
    FROM med_reg_medicamentos 
    where id_Usuario='$odontoSelecc' AND id_Sede='$sedeId' AND id_Estandar=4
    ORDER BY 
       fecha_vencimiento ASC";
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
                            <a href="seleccMED.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
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
                            <h3 class="description">Registro Medicamentos</h3>
                        </div>
                        <div class="col-md-12">

                            <div class="tadm">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Principio Activo</th>
                                            <th scope="col">Forma Farmaceutica</th>
                                            <th scope="col">Concentracion</th>
                                            <th scope="col">Unidad de medida</th>
                                            <th scope="col">Fecha de Vencimiento</th>
                                            <th scope="col">Lote</th>
                                            <th scope="col">Presentacion</th>
                                            <th scope="col">Registro Sanitario</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        while ($row = $envio->fetch_assoc()) {
                                            $nombre = $row['nombre'];
                                            $principio = $row['principio_activo'];
                                            $forma = $row['forma_farmac'];
                                            $concentracion = $row['concentracion'];
                                            $unidad = $row['unidad_medida'];
                                            $fecha = $row['fecha_vencimiento'];
                                            $lote = $row['lote'];
                                            $presentacion = $row['presentacion'];
                                            $registro_sanitario = $row['registro_sanitario'];

                                        ?>
                                            <tr>
                                                <td><?php echo $nombre ?></td>
                                                <td><?php echo $principio ?></td>
                                                <td><?php echo $forma ?></td>
                                                <td><?php echo $concentracion ?></td>
                                                <td><?php echo $unidad ?></td>
                                                <td><?php echo $fecha ?></td>
                                                <td><?php echo $lote ?></td>
                                                <td><?php echo $presentacion ?></td>
                                                <td><?php echo $registro_sanitario ?></td>
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


    </html>


<?php

}

?>