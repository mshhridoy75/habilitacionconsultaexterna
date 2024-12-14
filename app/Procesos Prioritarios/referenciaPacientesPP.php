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
    $consulta = "SELECT nombre_prestador, fecha_referencia, hora_referencia, numero_documento, tipo_documento, apellido_1, apellido_2, nombres, sexo, fecha_nacimiento, edad, estado_civil, direccion_paciente, ciudad, localidad, barrio, telefono, nombre_aseguradora, tipo_vinculacion, ocupacion, acompanante, telefono_acompanante, responsable, parentesco_responsable, telefono_responsable, sintomatologia, medidas, razones
from pp_referencia_pacientes
where id_Usuario='$actual' AND id_Sede='$sedeId' AND id_Estandar=5";

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
            <div class="main-panel" style="height:100%">
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
                            <h3 class="description">Residuos</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="scrollit" id="tabla-info-1">
                                <table class="table table-bordered">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">Nombre del prestador </th>
                                            <th scope="col">Fecha de referencia</th>
                                            <th scope="col">Hora de referencia</th>
                                            <th scope="col">Numero de documento</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Apellido 1</th>
                                            <th scope="col">Apellido 2</th>
                                            <th scope="col">Nombres</th>
                                            <th scope="col">Sexo</th>
                                            <th scope="col">Fecha de nacimiento</th>
                                            <th scope="col">Edad</th>
                                            <th scope="col">Estado Civil</th>
                                            <th scope="col">Direccion de residencia</th>
                                            <th scope="col">Ciudad</th>
                                            <th scope="col">Localidad</th>
                                            <th scope="col">Barrio</th>
                                            <th scope="col">Telefono</th>
                                            <th scope="col">Nombre de Aseguradora</th>
                                            <th scope="col">Tipo de vinculacion</th>
                                            <th scope="col">Ocupacion</th>
                                            <th scope="col">Nombre del acompañante</th>
                                            <th scope="col">Telefono del acompañante</th>
                                            <th scope="col">Responsable</th>
                                            <th scope="col">Parentesco del respnosable</th>
                                            <th scope="col">Telefono del responsable</th>
                                            <th scope="col" title="Descripción de la sintomatología, complicación o evento o incidente adverso presentado:">Sintomatología</th>
                                            <th scope="col" title="Medidas tomadas previas a la referencia para controlar el problema:">Medidas</th>
                                            <th scope="col" title="Razones por las cuales se remite:">Razones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">

                                        <?php
                                        while ($row = $envio->fetch_assoc()) {
                                            $nombre_prestador = $row['nombre_prestador'];
                                            $fecha_referencia = $row['fecha_referencia'];
                                            $hora_referencia = $row['hora_referencia'];
                                            $numero_documento = $row['numero_documento'];
                                            $tipo_documento = $row['tipo_documento'];
                                            $apellido_1 = $row['apellido_1'];
                                            $apellido_2 = $row['apellido_2'];
                                            $nombres = $row['nombres'];
                                            $sexo = $row['sexo'];
                                            $fecha_nacimiento = $row['fecha_nacimiento'];
                                            $edad = $row['edad'];
                                            $estado_civil = $row['estado_civil'];
                                            $direccion_paciente = $row['direccion_paciente'];
                                            $ciudad = $row['ciudad'];
                                            $localidad = $row['localidad'];
                                            $barrio = $row['barrio'];
                                            $telefono = $row['telefono'];
                                            $nombre_aseguradora = $row['nombre_aseguradora'];
                                            $tipo_vinculacion = $row['tipo_vinculacion'];
                                            $ocupacion = $row['ocupacion'];
                                            $acompanante = $row['acompanante'];
                                            $telefono_acompanante = $row['telefono_acompanante'];
                                            $responsable = $row['responsable'];
                                            $parentesco_responsable = $row['parentesco_responsable'];
                                            $telefono_responsable = $row['telefono_responsable'];
                                            $sintomatologia = $row['sintomatologia'];
                                            $medidas = $row['medidas'];
                                            $razones = $row['razones'];


                                        ?>
                                            <tr>
                                                <td><?php echo $nombre_prestador ?></td>
                                                <td><?php echo $fecha_referencia ?></td>
                                                <td><?php echo $hora_referencia ?></td>
                                                <td><?php echo $numero_documento ?></td>
                                                <td><?php echo $tipo_documento ?></td>
                                                <td><?php echo $apellido_1 ?></td>
                                                <td><?php echo $apellido_2 ?></td>
                                                <td><?php echo $nombres ?></td>
                                                <td><?php echo $sexo ?></td>
                                                <td><?php echo $fecha_nacimiento ?></td>
                                                <td><?php echo $edad ?></td>
                                                <td><?php echo $estado_civil ?></td>
                                                <td><?php echo $direccion_paciente ?></td>
                                                <td><?php echo $ciudad ?></td>
                                                <td><?php echo $localidad ?></td>
                                                <td><?php echo $barrio ?></td>
                                                <td><?php echo $telefono ?></td>
                                                <td><?php echo $nombre_aseguradora ?></td>
                                                <td><?php echo $tipo_vinculacion ?></td>
                                                <td><?php echo $ocupacion ?></td>
                                                <td><?php echo $acompanante ?></td>
                                                <td><?php echo $telefono_acompanante ?></td>
                                                <td><?php echo $responsable ?></td>
                                                <td><?php echo $parentesco_responsable ?></td>
                                                <td><?php echo $telefono_responsable ?></td>
                                                <td><?php echo $sintomatologia ?></td>
                                                <td><?php echo $medidas ?></td>
                                                <td><?php echo $razones ?></td>
                                            </tr>
                                        <?php
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>

                            <h3 class="description">Nuevo control</h3>


                            <div class="scrollit" id="tabla-info-2">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nombre del prestador </th>
                                            <th scope="col">Fecha de referencia</th>
                                            <th scope="col">Hora de referencia</th>
                                            <th scope="col">Numero de documento</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Apellido 1</th>
                                            <th scope="col">Apellido 2</th>
                                            <th scope="col">Nombres</th>
                                            <th scope="col">Sexo</th>
                                            <th scope="col">Fecha de nacimiento</th>
                                            <th scope="col">Edad</th>
                                            <th scope="col">Estado Civil</th>
                                            <th scope="col">Direccion de residencia</th>
                                            <th scope="col">Ciudad</th>
                                            <th scope="col">Localidad</th>
                                            <th scope="col">Barrio</th>
                                            <th scope="col">Telefono</th>
                                            <th scope="col">Nombre de Aseguradora</th>
                                            <th scope="col">Tipo de vinculacion</th>
                                            <th scope="col">Ocupacion</th>
                                            <th scope="col">Nombre del acompañante</th>
                                            <th scope="col">Telefono del acompañante</th>
                                            <th scope="col">Responsable</th>
                                            <th scope="col">Parentesco del respnosable</th>
                                            <th scope="col">Telefono del responsable</th>
                                            <th scope="col" title="Descripción de la sintomatología, complicación o evento o incidente adverso presentado:">Sintomatología</th>
                                            <th scope="col" title="Medidas tomadas previas a la referencia para controlar el problema:">Medidas</th>
                                            <th scope="col" title="Razones por las cuales se remite:">Razones</th>
                                    </thead>
                                    <form method="POST" action="../db/nuevaRefPacientePP.php">
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" name="nombre_prestador" id="nombre_prestador"></td>

                                                <td><input type="date" class="form-control" name="fecha_referencia" id="fecha_referencia"></td>

                                                <td><input type="time" class="form-control" name="hora_referencia" id="hora_referencia"></td>

                                                <td><input type="number" class="form-control" min="1" name="numero_documento" id="numero_documento"></td>

                                                <td><select class=" custom-select" name="tipo_documento" id="tipo_documento" required>
                                                        <option value="CC">CC</option>
                                                        <option value="TI">TI</option>
                                                        <option value="RC">RC</option>
                                                        <option value="RE">RE</option>
                                                    </select></td>

                                                <td><input type="text" class="form-control" name="apellido_1" id="apellido_1"></td>

                                                <td><input type="text" class="form-control" name="apellido_2" id="apellido_2"></td>

                                                <td><input type="text" class="form-control" name="nombres" id="nombres"></td>

                                                <td><select class=" custom-select" name="sexo" id="sexo" required>
                                                        <option value="M">M</option>
                                                        <option value="F">F</option>
                                                    </select></td>

                                                <td><input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"></td>

                                                <td><input type="text" class="form-control" name="edad" id="edad"></td>

                                                <td><select class=" custom-select" name="estado_civil" id="estado_civil" required>
                                                        <option value="S">S</option>
                                                        <option value="V">V</option>
                                                        <option value="C">C</option>
                                                        <option value="UL">UL</option>
                                                    </select></td>

                                                <td><input type="text" class="form-control" name="direccion_paciente" id="direccion_paciente"></td>

                                                <td><input type="text" class="form-control" name="ciudad" id="ciudad"></td>

                                                <td><input type="text" class="form-control" name="localidad" id="localidad"></td>

                                                <td><input type="text" class="form-control" name="barrio" id="barrio"></td>

                                                <td><input type="number" class="form-control" min="1" name="telefono" id="telefono"></td>

                                                <td><input type="text" class="form-control" name="nombre_aseguradora" id="nombre_aseguradora"></td>

                                                <td><input type="text" class="form-control" name="tipo_vinculacion" id="tipo_vinculacion"></td>

                                                <td><input type="text" class="form-control" name="ocupacion" id="ocupacion"></td>

                                                <td><input type="text" class="form-control" name="acompanante" id="acompanante"></td>

                                                <td><input type="number" class="form-control" min="1" name="telefono_acompanante" id="telefono_acompanante"></td>

                                                <td><input type="text" class="form-control" name="responsable" id="responsable"></td>

                                                <td><input type="text" class="form-control" name="parentesco_responsable" id="parentesco_responsable"></td>

                                                <td><input type="number" class="form-control" min="1" name="telefono_responsable" id="telefono_responsable"></td>

                                                <td><input type="text" class="form-control" name="sintomatologia" id="sintomatologia"></td>

                                                <td><input type="text" class="form-control" name="medidas" id="medidas"></td>

                                                <td><input type="text" class="form-control" name="razones" id="razones">
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

    $consulta = "SELECT nombre_prestador, fecha_referencia, hora_referencia, numero_documento, tipo_documento, apellido_1, apellido_2, nombres, sexo, fecha_nacimiento, edad, estado_civil, direccion_paciente, ciudad, localidad, barrio, telefono, nombre_aseguradora, tipo_vinculacion, ocupacion, acompanante, telefono_acompanante, responsable, parentesco_responsable, telefono_responsable, sintomatologia, medidas, razones
    from pp_referencia_pacientes
    where id_Usuario='$odontoSelecc' AND id_Sede='$sedeId' AND id_Estandar=5";

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
            <div class="main-panel" style="height:100%">
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
                            <h3 class="description">Residuos</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="tadm">
                                <table class="table table-bordered">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">Nombre del prestador </th>
                                            <th scope="col">Fecha de referencia</th>
                                            <th scope="col">Hora de referencia</th>
                                            <th scope="col">Numero de documento</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Apellido 1</th>
                                            <th scope="col">Apellido 2</th>
                                            <th scope="col">Nombres</th>
                                            <th scope="col">Sexo</th>
                                            <th scope="col">Fecha de nacimiento</th>
                                            <th scope="col">Edad</th>
                                            <th scope="col">Estado Civil</th>
                                            <th scope="col">Direccion de residencia</th>
                                            <th scope="col">Ciudad</th>
                                            <th scope="col">Localidad</th>
                                            <th scope="col">Barrio</th>
                                            <th scope="col">Telefono</th>
                                            <th scope="col">Nombre de Aseguradora</th>
                                            <th scope="col">Tipo de vinculacion</th>
                                            <th scope="col">Ocupacion</th>
                                            <th scope="col">Nombre del acompañante</th>
                                            <th scope="col">Telefono del acompañante</th>
                                            <th scope="col">Responsable</th>
                                            <th scope="col">Parentesco del respnosable</th>
                                            <th scope="col">Telefono del responsable</th>
                                            <th scope="col" title="Descripción de la sintomatología, complicación o evento o incidente adverso presentado:">Sintomatología</th>
                                            <th scope="col" title="Medidas tomadas previas a la referencia para controlar el problema:">Medidas</th>
                                            <th scope="col" title="Razones por las cuales se remite:">Razones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">

                                        <?php
                                        while ($row = $envio->fetch_assoc()) {
                                            $nombre_prestador = $row['nombre_prestador'];
                                            $fecha_referencia = $row['fecha_referencia'];
                                            $hora_referencia = $row['hora_referencia'];
                                            $numero_documento = $row['numero_documento'];
                                            $tipo_documento = $row['tipo_documento'];
                                            $apellido_1 = $row['apellido_1'];
                                            $apellido_2 = $row['apellido_2'];
                                            $nombres = $row['nombres'];
                                            $sexo = $row['sexo'];
                                            $fecha_nacimiento = $row['fecha_nacimiento'];
                                            $edad = $row['edad'];
                                            $estado_civil = $row['estado_civil'];
                                            $direccion_paciente = $row['direccion_paciente'];
                                            $ciudad = $row['ciudad'];
                                            $localidad = $row['localidad'];
                                            $barrio = $row['barrio'];
                                            $telefono = $row['telefono'];
                                            $nombre_aseguradora = $row['nombre_aseguradora'];
                                            $tipo_vinculacion = $row['tipo_vinculacion'];
                                            $ocupacion = $row['ocupacion'];
                                            $acompanante = $row['acompanante'];
                                            $telefono_acompanante = $row['telefono_acompanante'];
                                            $responsable = $row['responsable'];
                                            $parentesco_responsable = $row['parentesco_responsable'];
                                            $telefono_responsable = $row['telefono_responsable'];
                                            $sintomatologia = $row['sintomatologia'];
                                            $medidas = $row['medidas'];
                                            $razones = $row['razones'];


                                        ?>
                                            <tr>
                                                <td><?php echo $nombre_prestador ?></td>
                                                <td><?php echo $fecha_referencia ?></td>
                                                <td><?php echo $hora_referencia ?></td>
                                                <td><?php echo $numero_documento ?></td>
                                                <td><?php echo $tipo_documento ?></td>
                                                <td><?php echo $apellido_1 ?></td>
                                                <td><?php echo $apellido_2 ?></td>
                                                <td><?php echo $nombres ?></td>
                                                <td><?php echo $sexo ?></td>
                                                <td><?php echo $fecha_nacimiento ?></td>
                                                <td><?php echo $edad ?></td>
                                                <td><?php echo $estado_civil ?></td>
                                                <td><?php echo $direccion_paciente ?></td>
                                                <td><?php echo $ciudad ?></td>
                                                <td><?php echo $localidad ?></td>
                                                <td><?php echo $barrio ?></td>
                                                <td><?php echo $telefono ?></td>
                                                <td><?php echo $nombre_aseguradora ?></td>
                                                <td><?php echo $tipo_vinculacion ?></td>
                                                <td><?php echo $ocupacion ?></td>
                                                <td><?php echo $acompanante ?></td>
                                                <td><?php echo $telefono_acompanante ?></td>
                                                <td><?php echo $responsable ?></td>
                                                <td><?php echo $parentesco_responsable ?></td>
                                                <td><?php echo $telefono_responsable ?></td>
                                                <td><?php echo $sintomatologia ?></td>
                                                <td><?php echo $medidas ?></td>
                                                <td><?php echo $razones ?></td>
                                            </tr>
                                        <?php
                                        }

                                        ?>

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