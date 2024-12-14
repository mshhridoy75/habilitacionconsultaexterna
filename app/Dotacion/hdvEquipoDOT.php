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

$sql = "SELECT id FROM sede WHERE nombre='$sedeSelecc'";
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    $sedeId = $row['id'];
}

if ($actual != 'admin') {

    $consulta = "SELECT equi.id, equi.fecha_adquisicion, equi.origen, equi.proveedor, equi.email, equi.telefono, equi.placa_inventario, equi.nombre, equi.marca, equi.modelo, equi.serie, equi.clasi_riesgo, equi.registro_sanitario, doc_invima, manual_uso, guias_rapidas
FROM dot_hdv_equipo as equi
WHERE equi.id_Usuario='$actual' AND equi.id_Sede='$sedeId' AND equi.id_Estandar=3";
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
                            <h3 class="description">Equipos</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="scrollit" id="tabla-info-1">
                                <table class="table table-bordered">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">Fecha Adquisicion</th>
                                            <th scope="col">Origen</th>
                                            <th scope="col">Proveedor</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Telefono</th>
                                            <th scope="col">Placa Inventario</th>
                                            <th scope="col">Nombre del equipo</th>
                                            <th scope="col">Marca</th>
                                            <th scope="col">Modelo</th>
                                            <th scope="col">Serie</th>
                                            <th scope="col">Clasificación de Riegos</th>
                                            <th scope="col">Registro Sanitario INVIMA</th>
                                            <th scope="col">Documento INVIMA</th>
                                            <th scope="col">Manual de uso</th>
                                            <th scope="col">Guia de uso</th>
                                            <th scope="col">Mantenimientos</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">

                                        <?php
                                        while ($row = $envio->fetch_assoc()) {
                                            $id_Equipo = $row['id'];
                                            $fecha = $row['fecha_adquisicion'];
                                            $origen = $row['origen'];
                                            $proveedor = $row['proveedor'];
                                            $email = $row['email'];
                                            $telefono = $row['telefono'];
                                            $placa_inventario = $row['placa_inventario'];
                                            $nombre = $row['nombre'];
                                            $marca = $row['marca'];
                                            $modelo = $row['modelo'];
                                            $serie = $row['serie'];
                                            $clasi_riesgo = $row['clasi_riesgo'];
                                            $registro_sanitario = $row['registro_sanitario'];
                                            $doc_invima = $row['doc_invima'];
                                            $manual_uso = $row['manual_uso'];
                                            $guias_rapidas = $row['guias_rapidas'];

                                        ?>
                                            <tr>
                                                <td><?php echo $fecha ?></td>
                                                <td><?php echo $origen ?></td>
                                                <td><?php echo $proveedor ?></td>
                                                <td><?php echo $email ?></td>
                                                <td><?php echo $telefono ?></td>
                                                <td><?php echo $placa_inventario ?></td>
                                                <td><?php echo $nombre ?></td>
                                                <td><?php echo $marca ?></td>
                                                <td><?php echo $modelo ?></td>
                                                <td><?php echo $serie ?></td>
                                                <td><?php echo $clasi_riesgo ?></td>
                                                <td><?php echo $registro_sanitario ?></td>
                                                <form method="POST" target='_black' action="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/expertoCalidad2' . '/app/' . 'docs/' . $doc_invima . '#toolbar=0' ?>">
                                                    <td>
                                                        <button type="submit" class="btn btn-success">Ver documento</button>
                                                    </td>
                                                </form>
                                                <form method="POST" target='_black' action="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/expertoCalidad2' . '/app/' . 'docs/' . $manual_uso . '#toolbar=0' ?>">
                                                    <td>
                                                        <button type="submit" class="btn btn-success">Ver documento</button>
                                                    </td>
                                                </form>
                                                <form method="POST" target='_black' action="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/expertoCalidad2' . '/app/' . 'docs/' . $guias_rapidas . '#toolbar=0' ?>">
                                                    <td>
                                                        <button type="submit" class="btn btn-success">Ver documento</button>
                                                    </td>
                                                </form>
                                                <form method="POST" action="mantEquiDOT.php?sede=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">
                                                    <td>
                                                        <button type="submit" class="btn btn-success">Ir</button>
                                                        <input type="hidden" value="<?php echo $id_Equipo ?>" name="equipo" id="equipo">
                                                    </td>
                                                </form>


                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>

                            <h3 class="description">Nuevo equipo</h3>


                            <div class="scrollit" id="tabla-info-2">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fecha Adquisicion</th>
                                            <th scope="col">Origen</th>
                                            <th scope="col">Proveedor</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Telefono</th>
                                            <th scope="col">Placa Inventario</th>
                                            <th scope="col">Nombre del equipo</th>
                                            <th scope="col">Marca</th>
                                            <th scope="col">Modelo</th>
                                            <th scope="col">Serie</th>
                                            <th scope="col">Clasificación de Riegos</th>
                                            <th scope="col">Registro Sanitario INVIMA</th>
                                            <th scope="col">Documento INVIMA</th>
                                            <th scope="col">Manual de uso</th>
                                            <th scope="col">Guia de uso</th>
                                    </thead>
                                    <form method="POST" action="../db/nuevaHdvDOT.php" enctype="multipart/form-data">
                                        <tbody>
                                            <tr>
                                                <td><input type="date" class="form-control" name="fecha" id="fecha"></td>
                                                <td><input type="text" class="form-control" name="origen" id="origen"></td>
                                                <td><input type="text" class="form-control" name="proveedor" id="proveedor"></td>
                                                <td><input type="text" class="form-control" name="email" id="email"></td>
                                                <td><input type="number" class="form-control" name="telefono" id="telefono"></td>
                                                <td><input type="text" class="form-control" name="placa_inventario" id="placa_inventario"></td>
                                                <td><input type="text" class="form-control" name="nombre" id="nombre"></td>
                                                <td><input type="text" class="form-control" name="marca" id="marca"></td>
                                                <td><input type="text" class="form-control" name="modelo" id="modelo"></td>
                                                <td><input type="text" class="form-control" name="serie" id="serie"></td>
                                                <td><select class=" custom-select" name="riesgo" id="riesgo" required>
                                                        <option value="CLASE I">CLASE I</option>
                                                        <option value="CLASE IIA">CLASE IIA</option>
                                                        <option value="CLASE IIB">CLASE IIB</option>
                                                        <option value="CLASE III">CLASE III</option>
                                                    </select></td>
                                                <td><input type="text" class="form-control" name="registro_sanitario" id="registro_sanitario">
                                                    <input type="hidden" id="sede" name="sede" value="<?php echo $sedeSelecc ?>">
                                                    <input type="hidden" id='actual' name="actual" value="<?php echo $actual ?>">
                                                    <input type="hidden" id='sedeId' name="sedeId" value="<?php echo $sedeId ?>">
                                                </td>
                                                <td><input type="file" name="docinv" id="docinv"></td>
                                                <td><input type="file" name="manual" id="manual"></td>
                                                <td><input type="file" name="guia" id="guia"></td>
                                                <td>
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

    $consulta = "SELECT equi.id, equi.fecha_adquisicion, equi.origen, equi.proveedor, equi.email, equi.telefono, equi.placa_inventario, equi.nombre, equi.marca, equi.modelo, equi.serie, equi.clasi_riesgo, equi.registro_sanitario, doc_invima, manual_uso, guias_rapidas
    FROM dot_hdv_equipo as equi
    WHERE equi.id_Usuario='$odontoSelecc' AND equi.id_Sede='$sedeId' AND equi.id_Estandar=3";
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
                            <a href="seleccDOT.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
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
                            <h3 class="description">Equipos</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="tadm">
                                <table class="table table-bordered">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">Fecha Adquisicion</th>
                                            <th scope="col">Origen</th>
                                            <th scope="col">Proveedor</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Telefono</th>
                                            <th scope="col">Placa Inventario</th>
                                            <th scope="col">Nombre del equipo</th>
                                            <th scope="col">Marca</th>
                                            <th scope="col">Modelo</th>
                                            <th scope="col">Serie</th>
                                            <th scope="col">Clasificación de Riegos</th>
                                            <th scope="col">Registro Sanitario INVIMA</th>
                                            <th scope="col">Documento INVIMA</th>
                                            <th scope="col">Manual de uso</th>
                                            <th scope="col">Guia de uso</th>
                                            <th scope="col">Mantenimientos</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">

                                        <?php
                                        while ($row = $envio->fetch_assoc()) {
                                            $id_Equipo = $row['id'];
                                            $fecha = $row['fecha_adquisicion'];
                                            $origen = $row['origen'];
                                            $proveedor = $row['proveedor'];
                                            $email = $row['email'];
                                            $telefono = $row['telefono'];
                                            $placa_inventario = $row['placa_inventario'];
                                            $nombre = $row['nombre'];
                                            $marca = $row['marca'];
                                            $modelo = $row['modelo'];
                                            $serie = $row['serie'];
                                            $clasi_riesgo = $row['clasi_riesgo'];
                                            $registro_sanitario = $row['registro_sanitario'];
                                            $doc_invima = $row['doc_invima'];
                                            $manual_uso = $row['manual_uso'];
                                            $guias_rapidas = $row['guias_rapidas'];

                                        ?>
                                            <tr>
                                                <td><?php echo $fecha ?></td>
                                                <td><?php echo $origen ?></td>
                                                <td><?php echo $proveedor ?></td>
                                                <td><?php echo $email ?></td>
                                                <td><?php echo $telefono ?></td>
                                                <td><?php echo $placa_inventario ?></td>
                                                <td><?php echo $nombre ?></td>
                                                <td><?php echo $marca ?></td>
                                                <td><?php echo $modelo ?></td>
                                                <td><?php echo $serie ?></td>
                                                <td><?php echo $clasi_riesgo ?></td>
                                                <td><?php echo $registro_sanitario ?></td>
                                                <form method="POST" target='_black' action="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/expertoCalidad2' . '/app/' . 'docs/' . $doc_invima . '#toolbar=0' ?>">
                                                    <td>
                                                        <button type="submit" class="btn btn-success">Ver documento</button>
                                                    </td>
                                                </form>
                                                <form method="POST" target='_black' action="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/expertoCalidad2' . '/app/' . 'docs/' . $manual_uso . '#toolbar=0' ?>">
                                                    <td>
                                                        <button type="submit" class="btn btn-success">Ver documento</button>
                                                    </td>
                                                </form>
                                                <form method="POST" target='_black' action="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/expertoCalidad2' . '/app/' . 'docs/' . $guias_rapidas . '#toolbar=0' ?>">
                                                    <td>
                                                        <button type="submit" class="btn btn-success">Ver documento</button>
                                                    </td>
                                                </form>
                                                <form method="POST" action="mantEquiDOT.php?sede=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">
                                                    <td>
                                                        <button type="submit" class="btn btn-success">Ir</button>
                                                        <input type="hidden" value="<?php echo $id_Equipo ?>" name="equipo" id="equipo">
                                                    </td>
                                                </form>


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

}

?>