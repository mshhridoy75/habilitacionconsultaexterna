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
    $consulta = "SELECT materiales_Solidos, numero_Baños, discapacitados, escalones, rampas, cuarto_Aseo, deposito, certificacion_RETIE, certificacion_ONAC, ambientes_Varios, certificaciones, incendios 
FROM inf_eval_infra 
where id_Usuario='$actual' AND id_Sede='$sedeId' AND id_Estandar=2";
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
            <div class="main-panel">
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
                            <h3 class="description">Evaluación de infraestructura</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="scrollit" id="tabla-info-1">
                                <table class="table table-bordered">
                                    <thead class="">
                                        <tr>
                                            <th scope="col" title="¿Pisos, paredes y techos están cubiertos de materiales sólidos, lisos, lavables, impermeables y resistentes a los procesos de uso, lavado y desinfección?">Pisos Paredes Techos</th>
                                            <th scope="col">Número de Baños</th>
                                            <th scope="col">Baños de discapacitados</th>
                                            <th scope="col">Escalones</th>
                                            <th scope="col">Rampas</th>
                                            <th scope="col" title="¿Cuenta con cuarto de Aseo (poceta) lavado de traperos con punto de agua y sifón, almacenamiento de trapero, detergentes, baldes?">Cuartos de aseo</th>
                                            <th scope="col" title="¿Cuenta con depósito de almacenamiento de residuos ventilado (rejilla), punto de agua y sifón, pisos y paredes lavables ?">Deposito</th>
                                            <th scope="col" title="¿El consultorio funciona en edificaciones construidas con anterioridad año 2005?">RETIE/Anterior 2005</th>
                                            <th scope="col" title="¿El consultorio funciona en edificaciones construidas con anterioridad año 2005?">ONAC/Posterior 2005</th>
                                            <th scope="col" style="padding: 0 5% 0 5%" title="El consultorio cuenta con las siguientes especificaciones: ambientes o área de recibo material contaminado, lavado (poceta), secado, empaque, área para proceso esterilización y almacenamiento del material estéril, mesón de trabajo con poceta, consultorio tiene área de 10 m2, área de entrevista, unión paredes y muros con piso media caña, sala de espera?">Ambientes Varios</th>
                                            <th scope="col" style="padding: 0 5% 0 5%" title="¿El consultorio cuenta con Certificaciones o Documentos de visita, capacitación de Bomberos, Concepto Higiénico Sanitario- Salud Pública, concepto uso del suelo y RETIE?">Certificaciones</th>
                                            <th scope="col" title="¿El consultorio cuenta con equipo de extinción de incendios y señalizaciones?">Equipo de Extincion</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">

                                        <?php
                                        while ($row = $envio->fetch_assoc()) {
                                            $pisos = $row['materiales_Solidos'];
                                            $baños = $row['numero_Baños'];
                                            $discapacitados = $row['discapacitados'];
                                            $escalones = $row['escalones'];
                                            $rampas = $row['rampas'];
                                            $cuarto_Aseo = $row['cuarto_Aseo'];
                                            $deposito = $row['deposito'];
                                            $retie = $row['certificacion_RETIE'];
                                            $onac = $row['certificacion_ONAC'];
                                            $especs = $row['ambientes_Varios'];
                                            $certs = $row['certificaciones'];
                                            $incendios = $row['incendios'];

                                        ?>
                                            <tr>
                                                <td><?php echo $pisos ?></td>
                                                <td><?php echo $baños ?></td>
                                                <td><?php echo $discapacitados ?></td>
                                                <td><?php echo $escalones ?></td>
                                                <td><?php echo $rampas ?></td>
                                                <td><?php echo $cuarto_Aseo ?></td>
                                                <td><?php echo $deposito ?></td>
                                                <td><?php echo $retie ?></td>
                                                <td><?php echo $onac ?></td>
                                                <td><?php echo $especs ?></td>
                                                <td><?php echo $certs ?></td>
                                                <td><?php echo $incendios ?></td>

                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content">
                                <div class="col col-md-2">
                                    <h5 class="description">Generar Consolidado </h5>
                                </div>
                                <form method="POST" action="../db/consEvaluacionINF.php">
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

                            <h3 class="description">Nueva evaluación</h3>


                            <div class="scrollit" id="tabla-info-2">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" title="¿Pisos, paredes y techos están cubiertos de materiales sólidos, lisos, lavables, impermeables y resistentes a los procesos de uso, lavado y desinfección?">Pisos Paredes Techos</th>
                                            <th scope="col">Número de Baños</th>
                                            <th scope="col">Baños de discapacitados</th>
                                            <th scope="col">Escalones</th>
                                            <th scope="col">Rampas</th>
                                            <th scope="col" title="¿Cuenta con cuarto de Aseo (poceta) lavado de traperos con punto de agua y sifón, almacenamiento de trapero, detergentes, baldes?">Cuartos de aseo</th>
                                            <th scope="col" title="¿Cuenta con depósito de almacenamiento de residuos ventilado (rejilla), punto de agua y sifón, pisos y paredes lavables ?">Deposito</th>
                                            <th scope="col" title="¿El consultorio funciona en edificaciones construidas con anterioridad año 2005?">RETIE/Anterior 2005</th>
                                            <th scope="col" title="¿El consultorio funciona en edificaciones construidas con anterioridad año 2005?">ONAC/Posterior 2005</th>
                                            <th scope="col" title="¿El consultorio cuenta con las siguientes especificaciones: ambientes o área de recibo material contaminado, lavado (poceta), secado, empaque, área para proceso esterilización y almacenamiento del material estéril, mesón de trabajo con poceta, consultorio tiene área de 10 m2, área de entrevista, unión paredes y muros con piso media caña, sala de espera?">Ambientes Varios</th>
                                            <th scope="col" title="¿El consultorio cuenta con Certificaciones o Documentos de visita, capacitación de Bomberos, Concepto Higiénico Sanitario- Salud Pública, concepto uso del suelo y RETIE?">Certificaciones</th>
                                            <th scope="col" title="¿El consultorio cuenta con equipo de extinción de incendios y señalizaciones?">Equipo de Extincion</th>
                                    </thead>
                                    <form method="POST" action="../db/nuevaEvaINF.php">
                                        <tbody>
                                            <tr>
                                                <th><select class=" custom-select" name="pisos" id="pisos">
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                        <option value="no">Algunas Areas</option>
                                                    </select></th>
                                                <td><input type="number" class="form-control" name="baños" id="baños"></td>
                                                <td><select class=" custom-select" name="discapacitados" id="discapacitados">
                                                        <option value="si">Uno</option>
                                                        <option value="no">Mixto</option>
                                                    </select></td>
                                                <td><select class=" custom-select" name="escalones" id="escalones">
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select></td>
                                                <td><select class=" custom-select" name="rampas" id="rampas">
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select></td>
                                                <td><select class=" custom-select" name="cuarto_Aseo" id="cuarto_Aseo">
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select></td>
                                                <td><select class=" custom-select" name="deposito" id="deposito">
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </td>
                                                <td><select class=" custom-select" name="retie" id="retie">
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </td>
                                                <td><select class=" custom-select" name="onac" id="onac">
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" class="form-control" name="especs" id="especs"></td>
                                                <td><input type="text" class="form-control" name="certs" id="certs"></td>
                                                <td><select class=" custom-select" name="incendios" id="incendios">
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
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


<?php } else {
    $odontoSelecc = $_GET['usuarioSel'];

    $consulta = "SELECT materiales_Solidos, numero_Baños, discapacitados, escalones, rampas, cuarto_Aseo, deposito, certificacion_RETIE, certificacion_ONAC, ambientes_Varios, certificaciones, incendios 
    FROM inf_eval_infra 
    where id_Usuario='$odontoSelecc' AND id_Sede='$sedeId' AND id_Estandar=2";
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
                            <a href="seleccINF.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
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
                            <h3 class="description">Evaluación de infraestructura</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="tadm">
                                <table class="table table-bordered">
                                    <thead class="">
                                        <tr>
                                            <th scope="col" title="¿Pisos, paredes y techos están cubiertos de materiales sólidos, lisos, lavables, impermeables y resistentes a los procesos de uso, lavado y desinfección?">Pisos Paredes Techos</th>
                                            <th scope="col">Número de Baños</th>
                                            <th scope="col">Baños de discapacitados</th>
                                            <th scope="col">Escalones</th>
                                            <th scope="col">Rampas</th>
                                            <th scope="col" title="¿Cuenta con cuarto de Aseo (poceta) lavado de traperos con punto de agua y sifón, almacenamiento de trapero, detergentes, baldes?">Cuartos de aseo</th>
                                            <th scope="col" title="¿Cuenta con depósito de almacenamiento de residuos ventilado (rejilla), punto de agua y sifón, pisos y paredes lavables ?">Deposito</th>
                                            <th scope="col" title="¿El consultorio funciona en edificaciones construidas con anterioridad año 2005?">RETIE/Anterior 2005</th>
                                            <th scope="col" title="¿El consultorio funciona en edificaciones construidas con anterioridad año 2005?">ONAC/Posterior 2005</th>
                                            <th scope="col" style="padding: 0 5% 0 5%" title="El consultorio cuenta con las siguientes especificaciones: ambientes o área de recibo material contaminado, lavado (poceta), secado, empaque, área para proceso esterilización y almacenamiento del material estéril, mesón de trabajo con poceta, consultorio tiene área de 10 m2, área de entrevista, unión paredes y muros con piso media caña, sala de espera?">Ambientes Varios</th>
                                            <th scope="col" style="padding: 0 5% 0 5%" title="¿El consultorio cuenta con Certificaciones o Documentos de visita, capacitación de Bomberos, Concepto Higiénico Sanitario- Salud Pública, concepto uso del suelo y RETIE?">Certificaciones</th>
                                            <th scope="col" title="¿El consultorio cuenta con equipo de extinción de incendios y señalizaciones?">Equipo de Extincion</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">

                                        <?php
                                        while ($row = $envio->fetch_assoc()) {
                                            $pisos = $row['materiales_Solidos'];
                                            $baños = $row['numero_Baños'];
                                            $discapacitados = $row['discapacitados'];
                                            $escalones = $row['escalones'];
                                            $rampas = $row['rampas'];
                                            $cuarto_Aseo = $row['cuarto_Aseo'];
                                            $deposito = $row['deposito'];
                                            $retie = $row['certificacion_RETIE'];
                                            $onac = $row['certificacion_ONAC'];
                                            $especs = $row['ambientes_Varios'];
                                            $certs = $row['certificaciones'];
                                            $incendios = $row['incendios'];

                                        ?>
                                            <tr>
                                                <td><?php echo $pisos ?></td>
                                                <td><?php echo $baños ?></td>
                                                <td><?php echo $discapacitados ?></td>
                                                <td><?php echo $escalones ?></td>
                                                <td><?php echo $rampas ?></td>
                                                <td><?php echo $cuarto_Aseo ?></td>
                                                <td><?php echo $deposito ?></td>
                                                <td><?php echo $retie ?></td>
                                                <td><?php echo $onac ?></td>
                                                <td><?php echo $especs ?></td>
                                                <td><?php echo $certs ?></td>
                                                <td><?php echo $incendios ?></td>

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