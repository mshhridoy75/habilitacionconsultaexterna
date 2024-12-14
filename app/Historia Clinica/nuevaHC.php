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
        <div class="main-panel" style="height:auto">
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
                        <h3 class="description">Historia Clinica</h3>
                    </div>
                    <div class="col-md-12">

                        <h3 class="description">Datos de identificacion</h3>


                        <div class="scrollit" id="tabla-info-2">
                            <table class="table table-bordered">
                                <form method="POST" action="../db/nuevaHC.php">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nombre completo </th>
                                            <td><input type="text" class="form-control" name="nombre_completo" id="nombre_completo"></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Numero de identificacion</th>
                                            <td><input type="number" class="form-control" name="numero_id" id="numero_id"></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Fecha de nacimiento</th>
                                            <td><input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Edad</th>
                                            <td><input type="text" class="form-control" name="edad" id="edad"></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Estado civil</th>
                                            <td><select class=" custom-select" name="estado_civil" id="estado_civil" required>
                                                    <option value="Soltero">Soltero</option>
                                                    <option value="Viudo">Viudo</option>
                                                    <option value="Casado">Casado</option>
                                                    <option value="Union Libre">Union Libre</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Direccion</th>
                                            <td><input type="text" class="form-control" name="direccion_paciente" id="direccion_paciente"></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Telefono</th>
                                            <td><input type="number" class="form-control" min="1" name="telefono" id="telefono"></td>
                                        </tr>
                                        <tr>

                                            <th scope="col">Celular</th>
                                            <td><input type="number" class="form-control" min="1" name="celular" id="celular"></td>
                                        </tr>
                                        <tr>

                                            <th scope="col">Lugar de Residencia</th>
                                            <td><input type="text" class="form-control" name="lugar_residencia" id="lugar_residencia"></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Ocupacion</th>
                                            <td><input type="text" class="form-control" name="ocupacion" id="ocupacion"></td>
                                        </tr>
                                        <tr>

                                            <th scope="col">Eps/Vinculacion</th>
                                            <td><input type="text" class="form-control" name="tipo_vinculacion" id="tipo_vinculacion"></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Nombre del acompañante</th>
                                            <td><input type="text" class="form-control" name="acompanante" id="acompanante"></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Telefono del acompañante</th>
                                            <td><input type="number" class="form-control" min="1" name="telefono_acompanante" id="telefono_acompanante"></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Responsable</th>
                                            <td><input type="text" class="form-control" name="responsable" id="responsable"></td>
                                        </tr>
                                        <tr>

                                            <th scope="col">Parentesco del respnosable</th>
                                            <td><input type="text" class="form-control" name="parentesco_responsable" id="parentesco_responsable"></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Telefono del responsable</th>
                                            <td>
                                                <input type="number" class="form-control" min="1" name="telefono_responsable" id="telefono_responsable">
                                            </td>
                                        </tr>
                                    </thead>
                            </table>

                            <div class="col-md-12">
                                <h3 class="description">Anamnesis</h3>
                            </div>
                            <div class="col-md-12">
                                <h4 class="description">Antecedentes Personales</h3>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Motivo de consulta </th>
                                        <td><input type="text" class="form-control" name="motivo" id="motivo"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Emfermedad Cardiaca</th>
                                        <td><select class=" custom-select" name="cardiaca" id="cardiaca" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Tension arterial alta</th>
                                        <td><select class=" custom-select" name="tension" id="tension" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Diabetes</th>
                                        <td><select class=" custom-select" name="diabetes" id="diabetes" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Problemas de coagulacion</th>
                                        <td><select class=" custom-select" name="coagulacion" id="coagulacion" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Sinusitis</th>
                                        <td><select class=" custom-select" name="sinusitis" id="sinusitis" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>

                                        <th scope="col">Problemas respiratorios</th>
                                        <td><select class=" custom-select" name="problemas_respiratorios" id="problemas_respiratorios" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>

                                        <th scope="col">Enfermedad Renal</th>
                                        <td><select class=" custom-select" name="renal" id="renal" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Enfermedad Hepatica</th>
                                        <td><select class=" custom-select" name="hepatica" id="hepatica" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>

                                        <th scope="col">Gastritis</th>
                                        <td><select class=" custom-select" name="gastritis" id="gastritis" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Hepatitis</th>
                                        <td><select class=" custom-select" name="hepatitis" id="hepatitis" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Sida</th>
                                        <td><select class=" custom-select" name="sida" id="sida" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Cancer</th>
                                        <td><select class=" custom-select" name="cancer" id="cancer" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Convulsiones</th>
                                        <td><select class=" custom-select" name="convulsiones" id="convulsiones" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Cirugias (incluida oral) </th>
                                        <td><select class=" custom-select" name="cirugias" id="cirugias" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Cual?</th>
                                        <td><input type="text" class="form-control" value="No Aplica" name="cual_cirugia" id="cual_cirugia"></td>
                                    </tr>

                                    <tr>
                                        <th scope="col">Toma medicamentos o esta en tratamiento medico?</th>
                                        <td><select class=" custom-select" name="medicamentos" id="medicamentos" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Cual?</th>
                                        <td><input type="text" class="form-control" value="No Aplica" name="cual_medicamento" id="cual_medicamento"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Estado de embarazo</th>
                                        <td><select class=" custom-select" name="embarazo" id="embarazo" required>
                                                <option value="No aplica">No Aplica</option>
                                                <option value="0 a 3 meses">0 a 3 meses</option>
                                                <option value="3 a 6 meses">3 a 6 meses</option>
                                                <option value="6 a 9 meses">6 a 9 meses</option>
                                            </select>
                                        </td>
                                    </tr>



                                </thead>
                            </table>

                            <div class="col-md-12">
                                <h4 class="description">Antecedentes Familiares</h3>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Enfermedad Cardiaca</th>
                                        <td><input type="text" class="form-control" name="fam_cardiaca" id="fam_cardiaca"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Tension arterial alta</th>
                                        <td><select class=" custom-select" name="fam_tension" id="fam_tension" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Diabetes</th>
                                        <td><select class=" custom-select" name="fam_diabetes" id="fam_diabetes" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Cancer</th>
                                        <td><select class=" custom-select" name="fam_cancer" id="fam_cancer" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="col">Otros y observaciones </th>
                                        <td><input type="text" class="form-control" name="otros_observaciones" id="otros_observaciones"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Le han aplicado anestesia oral?</th>
                                        <td><select class=" custom-select" name="anestesia" id="anestesia" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Alergia:</th>
                                        <td><select class=" custom-select" name="alergia" id="alergia" required>
                                                <option value="Anestesia Local">Anestesia Local</option>
                                                <option value="Penicilina">Penicilina</option>
                                                <option value="Otro">Otro</option>
                                                <option value="Ninguno">Ninguno</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Cual?</th>
                                        <td><input type="text" class="form-control" value="No Aplica" name="cual_alergia" id="cual_alergia"></td>
                                    </tr>

                                </thead>
                            </table>


                            <div class="col-md-12">
                                <h4 class="description">Examen Fisico</h3>
                            </div>


                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Ultima visita al odontologo</th>
                                        <td><select class=" custom-select" name="ultima_visita" id="ultima_visita" required>
                                                <option value="Menos de 3 meses">Menos de 3 meses</option>
                                                <option value="3 a 6 meses">3 a 6 meses</option>
                                                <option value="Mas de 6 meses">Mas de 6 meses</option>

                                            </select>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Motivo de consulta</th>
                                        <td><input type="text" class="form-control" name="motivo_visita" id="motivo_visita"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Temperatura</th>
                                        <td><input type="number" class="form-control" name="temperatura" id="temperatura"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Pulso</th>
                                        <td><input type="number" class="form-control" name="pulso" id="pulso"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Tension</th>
                                        <td><input type="number" class="form-control" name="tension_p" id="tension_p"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Respiracion</th>
                                        <td><input type="text" class="form-control" name="respiracion" id="respiracion"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Higiene Oral</th>
                                        <td><select class=" custom-select" name="higiene_oral" id="higiene_oral" required>
                                                <option value="Buena">Buena</option>
                                                <option value="Regular">Regular</option>
                                                <option value="Mala">Mala</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Seda dental</th>
                                        <td><select class=" custom-select" name="seda" id="seda" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Cepillo de dientes</th>
                                        <td><select class=" custom-select" name="cepillo" id="cepillo" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Enjuague Bucal</th>
                                        <td><select class=" custom-select" name="enjuague" id="enjuague" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Frecuencia de cepillado</th>
                                        <td><input type="text" class="form-control" name="frecuencia" id="frecuencia"></td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Enhebradores</th>
                                        <td><select class=" custom-select" name="enhebradores" id="enhebradores" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                </thead>
                            </table>

                            <div class="col-md-12">
                                <h4 class="description">Examen Oral</h3>
                            </div>


                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ATM</th>
                                        <td><select class=" custom-select" name="atm" id="atm" required>
                                                <option value="Normal">Normal</option>
                                                <option value="Anormal">Anormal</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Labios</th>
                                        <td><select class=" custom-select" name="labios" id="labios" required>
                                                <option value="Normal">Normal</option>
                                                <option value="Anormal">Anormal</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">lengua</th>
                                        <td><select class=" custom-select" name="lengua" id="lengua" required>
                                                <option value="Normal">Normal</option>
                                                <option value="Anormal">Anormal</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">paladar</th>
                                        <td><select class=" custom-select" name="paladar" id="paladar" required>
                                                <option value="Normal">Normal</option>
                                                <option value="Anormal">Anormal</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Piso de boca</th>
                                        <td><select class=" custom-select" name="piso_boca" id="piso_boca" required>
                                                <option value="Normal">Normal</option>
                                                <option value="Anormal">Anormal</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">maxilares</th>
                                        <td><select class=" custom-select" name="maxilares" id="maxilares" required>
                                                <option value="Normal">Normal</option>
                                                <option value="Anormal">Anormal</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Glandulas Salivares</th>
                                        <td><select class=" custom-select" name="glandulas" id="glandulas" required>
                                                <option value="Normal">Normal</option>
                                                <option value="Anormal">Anormal</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Senos maxilares</th>
                                        <td><select class=" custom-select" name="senos_maxilares" id="senos_maxilares" required>
                                                <option value="Normal">Normal</option>
                                                <option value="Anormal">Anormal</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Musculos masticadores</th>
                                        <td><select class=" custom-select" name="masticadores" id="masticadores" required>
                                                <option value="Normal">Normal</option>
                                                <option value="Anormal">Anormal</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">ganglios</th>
                                        <td><select class=" custom-select" name="ganglios" id="ganglios" required>
                                                <option value="Normal">Normal</option>
                                                <option value="Anormal">Anormal</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">oclusion</th>
                                        <td><select class=" custom-select" name="oclusion" id="oclusion" required>
                                                <option value="Normal">Normal</option>
                                                <option value="Anormal">Anormal</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">frenillos</th>
                                        <td><select class=" custom-select" name="frenillos" id="frenillos" required>
                                                <option value="Normal">Normal</option>
                                                <option value="Anormal">Anormal</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">mucosas</th>
                                        <td><select class=" custom-select" name="mucosas" id="mucosas" required>
                                                <option value="Normal">Normal</option>
                                                <option value="Anormal">Anormal</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">encias</th>
                                        <td><select class=" custom-select" name="encias" id="encias" required>
                                                <option value="Normal">Normal</option>
                                                <option value="Anormal">Anormal</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">amigdalas</th>
                                        <td><select class=" custom-select" name="amigdalas" id="amigdalas" required>
                                                <option value="Normal">Normal</option>
                                                <option value="Anormal">Anormal</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">otros</th>
                                        <td><input type="text" class="form-control" value="No aplica" name="otros_oral" id="otros_oral"></td>
                                    </tr>
                                </thead>
                            </table>


                            <div class="col-md-12">
                                <h4 class="description">Examen Dental</h3>
                            </div>


                            <table class="table table-bordered">
                                <thead>

                                    <tr>
                                        <th scope="col">supernumerario</th>
                                        <td><select class=" custom-select" name="supernumerario" id="supernumerario" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">abrasion</th>
                                        <td><select class=" custom-select" name="abrasion" id="abrasion" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">manchas/Pigmentacion</th>
                                        <td><select class=" custom-select" name="manchas_pigmentacion" id="manchas_pigmentacion" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Abceso</th>
                                        <td><select class=" custom-select" name="abceso" id="abceso" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">maloclusion</th>
                                        <td><select class=" custom-select" name="maloclusion" id="maloclusion" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">incluidos</th>
                                        <td><select class=" custom-select" name="incluidos" id="incluidos" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">traumas</th>
                                        <td><select class=" custom-select" name="traumas" id="traumas" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">habitos</th>
                                        <td><select class=" custom-select" name="habitos" id="habitos" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                </thead>
                            </table>

                            <div class="col-md-12">
                                <h4 class="description">Examen periodontal</h3>
                            </div>


                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Bolsas/movilidad</th>
                                        <td><select class=" custom-select" name="bolsas_movilidad" id="bolsas_movilidad" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Placa blanda</th>
                                        <td><select class=" custom-select" name="placa_blanda" id="placa_blanda" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">calculos</th>
                                        <td><select class=" custom-select" name="calculos" id="calculos" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Hemorragia gingival</th>
                                        <td><select class=" custom-select" name="hemorragia_gingival" id="hemorragia_gingival" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">inflamacion gingival</th>
                                        <td><select class=" custom-select" name="inflamacion_gingival" id="inflamacion_gingival" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">periodontitis</th>
                                        <td><select class=" custom-select" name="periodontitis" id="periodontitis" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">retracciones</th>
                                        <td><select class=" custom-select" name="retracciones" id="retracciones" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">hiperplasias</th>
                                        <td><select class=" custom-select" name="hiperplasias" id="hiperplasias" required>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </td>
                                    </tr>

                            <tr>
                                <th scope="col">Descripcion rehabilitacion oral</th>
                                <td><input type="text" class="form-control" name="descripcion_rehabilitacion" id="descripcion_rehabilitacion"></td>
                            </tr>
                            <tr>
                                <th scope="col">observaciones</th>
                                <td><input type="text" class="form-control" name="observaciones" id="observaciones"></td>
                            </tr>
                            <tr>
                                <th scope="col">fecha indice de placa</th>
                                <td><input type="date" class="form-control" name="fecha_placa" id="fecha_placa"></td>
                            </tr>
                            </thead>
                            </table>

                            <div class="col-md-12">
                                <h4 class="description">Odontograma Inicial</h3>
                            </div>

                            <table class="table table-bordered">
                                <div class="logo-image-big">
                                    <img src="../img/odontograma.png" alt="logo" style="width:40%; display:block; margin:auto;"> </img>
                                </div>
                                <thead>
                                    <tr>
                                        <th scope="col">diente 1</th>
                                        <td><select class=" custom-select" name="diente_1" id="diente_1" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 2</th>
                                        <td><select class=" custom-select" name="diente_2" id="diente_2" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <th scope="col">diente 3</th>
                                    <td><select class=" custom-select" name="diente_3" id="diente_3" required>
                                            <option value="Sano">Sano</option>
                                            <option value="Cardio">Cardio</option>
                                            <option value="Obturado">Obturado</option>
                                            <option value="Ausente">Ausente</option>
                                            <option value="Exodon.Indic">Exodon.Indic</option>
                                            <option value="Con Endodoncia">Con Endodoncia</option>
                                            <option value="Endodon.Indic">Endodon.Indic</option>
                                            <option value="Sellante.Indic">Sellante.Indic</option>
                                            <option value="Sellante">Sellante</option>

                                        </select>
                                    </td>
                                    <th scope="col">diente 4</th>
                                    <td><select class=" custom-select" name="diente_4" id="diente_4" required>
                                            <option value="Sano">Sano</option>
                                            <option value="Cardio">Cardio</option>
                                            <option value="Obturado">Obturado</option>
                                            <option value="Ausente">Ausente</option>
                                            <option value="Exodon.Indic">Exodon.Indic</option>
                                            <option value="Con Endodoncia">Con Endodoncia</option>
                                            <option value="Endodon.Indic">Endodon.Indic</option>
                                            <option value="Sellante.Indic">Sellante.Indic</option>
                                            <option value="Sellante">Sellante</option>

                                        </select>
                                    </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 5</th>
                                        <td><select class=" custom-select" name="diente_5" id="diente_5" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 6</th>
                                        <td><select class=" custom-select" name="diente_6" id="diente_6" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 7</th>
                                        <td><select class=" custom-select" name="diente_7" id="diente_7" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 8</th>
                                        <td><select class=" custom-select" name="diente_8" id="diente_8" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 9</th>
                                        <td><select class=" custom-select" name="diente_9" id="diente_9" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 10</th>
                                        <td><select class=" custom-select" name="diente_10" id="diente_10" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 11</th>
                                        <td><select class=" custom-select" name="diente_11" id="diente_11" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 12</th>
                                        <td><select class=" custom-select" name="diente_12" id="diente_12" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 13</th>
                                        <td><select class=" custom-select" name="diente_13" id="diente_13" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 14</th>
                                        <td><select class=" custom-select" name="diente_14" id="diente_14" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 15</th>
                                        <td><select class=" custom-select" name="diente_15" id="diente_15" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 16</th>
                                        <td><select class=" custom-select" name="diente_16" id="diente_16" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 17</th>
                                        <td><select class=" custom-select" name="diente_17" id="diente_17" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 18</th>
                                        <td><select class=" custom-select" name="diente_18" id="diente_18" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 19</th>
                                        <td><select class=" custom-select" name="diente_19" id="diente_19" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 20</th>
                                        <td><select class=" custom-select" name="diente_20" id="diente_20" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 21</th>
                                        <td><select class=" custom-select" name="diente_21" id="diente_21" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 22</th>
                                        <td><select class=" custom-select" name="diente_22" id="diente_22" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 23</th>
                                        <td><select class=" custom-select" name="diente_23" id="diente_23" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 24</th>
                                        <td><select class=" custom-select" name="diente_24" id="diente_24" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 25</th>
                                        <td><select class=" custom-select" name="diente_25" id="diente_25" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 26</th>
                                        <td><select class=" custom-select" name="diente_26" id="diente_26" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 27</th>
                                        <td><select class=" custom-select" name="diente_27" id="diente_27" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 28</th>
                                        <td><select class=" custom-select" name="diente_28" id="diente_28" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 29</th>
                                        <td><select class=" custom-select" name="diente_29" id="diente_29" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 30</th>
                                        <td><select class=" custom-select" name="diente_30" id="diente_30" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 31</th>
                                        <td><select class=" custom-select" name="diente_31" id="diente_31" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 32</th>
                                        <td><select class=" custom-select" name="diente_32" id="diente_32" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                    </tr>
                                </thead>
                            </table>

                            <div class="col-md-12">
                                <h4 class="description">Odontograma Evolucion</h3>
                            </div>

                            <table class="table table-bordered">
                                <div class="logo-image-big">
                                    <img src="../img/odontograma.png" alt="logo" style="width:40%; display:block; margin:auto;"> </img>
                                </div>
                                <thead>
                                    <tr>
                                        <th scope="col">diente 1</th>
                                        <td><select class=" custom-select" name="diente_1_evo" id="diente_1_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 2</th>
                                        <td><select class=" custom-select" name="diente_2_evo" id="diente_2_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <th scope="col">diente 3</th>
                                    <td><select class=" custom-select" name="diente_3_evo" id="diente_3_evo" required>
                                            <option value="Sano">Sano</option>
                                            <option value="Cardio">Cardio</option>
                                            <option value="Obturado">Obturado</option>
                                            <option value="Ausente">Ausente</option>
                                            <option value="Exodon.Indic">Exodon.Indic</option>
                                            <option value="Con Endodoncia">Con Endodoncia</option>
                                            <option value="Endodon.Indic">Endodon.Indic</option>
                                            <option value="Sellante.Indic">Sellante.Indic</option>

                                        </select>
                                    </td>
                                    <th scope="col">diente 4</th>
                                    <td><select class=" custom-select" name="diente_4_evo" id="diente_4_evo" required>
                                            <option value="Sano">Sano</option>
                                            <option value="Cardio">Cardio</option>
                                            <option value="Obturado">Obturado</option>
                                            <option value="Ausente">Ausente</option>
                                            <option value="Exodon.Indic">Exodon.Indic</option>
                                            <option value="Con Endodoncia">Con Endodoncia</option>
                                            <option value="Endodon.Indic">Endodon.Indic</option>
                                            <option value="Sellante.Indic">Sellante.Indic</option>

                                        </select>
                                    </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 5</th>
                                        <td><select class=" custom-select" name="diente_5_evo" id="diente_5_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 6</th>
                                        <td><select class=" custom-select" name="diente_6_evo" id="diente_6_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 7</th>
                                        <td><select class=" custom-select" name="diente_7_evo" id="diente_7_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 8</th>
                                        <td><select class=" custom-select" name="diente_8_evo" id="diente_8_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 9</th>
                                        <td><select class=" custom-select" name="diente_9_evo" id="diente_9_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 10</th>
                                        <td><select class=" custom-select" name="diente_10_evo" id="diente_10_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 11</th>
                                        <td><select class=" custom-select" name="diente_11_evo" id="diente_11_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 12</th>
                                        <td><select class=" custom-select" name="diente_12_evo" id="diente_12_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 13</th>
                                        <td><select class=" custom-select" name="diente_13_evo" id="diente_13_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 14</th>
                                        <td><select class=" custom-select" name="diente_14_evo" id="diente_14_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 15</th>
                                        <td><select class=" custom-select" name="diente_15_evo" id="diente_15_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 16</th>
                                        <td><select class=" custom-select" name="diente_16_evo" id="diente_16_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 17</th>
                                        <td><select class=" custom-select" name="diente_17_evo" id="diente_17_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 18</th>
                                        <td><select class=" custom-select" name="diente_18_evo" id="diente_18_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 19</th>
                                        <td><select class=" custom-select" name="diente_19_evo" id="diente_19_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 20</th>
                                        <td><select class=" custom-select" name="diente_20_evo" id="diente_20_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 21</th>
                                        <td><select class=" custom-select" name="diente_21_evo" id="diente_21_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 22</th>
                                        <td><select class=" custom-select" name="diente_22_evo" id="diente_22_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 23</th>
                                        <td><select class=" custom-select" name="diente_23_evo" id="diente_23_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 24</th>
                                        <td><select class=" custom-select" name="diente_24_evo" id="diente_24_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 25</th>
                                        <td><select class=" custom-select" name="diente_25_evo" id="diente_25_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 26</th>
                                        <td><select class=" custom-select" name="diente_26_evo" id="diente_26_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 27</th>
                                        <td><select class=" custom-select" name="diente_27_evo" id="diente_27_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 28</th>
                                        <td><select class=" custom-select" name="diente_28_evo" id="diente_28_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 29</th>
                                        <td><select class=" custom-select" name="diente_29_evo" id="diente_29_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 30</th>
                                        <td><select class=" custom-select" name="diente_30_evo" id="diente_30_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diente 31</th>
                                        <td><select class=" custom-select" name="diente_31_evo" id="diente_31_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>

                                            </select>
                                        </td>
                                        <th scope="col">diente 32</th>
                                        <td><select class=" custom-select" name="diente_32_evo" id="diente_32_evo" required>
                                                <option value="Sano">Sano</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Obturado">Obturado</option>
                                                <option value="Ausente">Ausente</option>
                                                <option value="Exodon.Indic">Exodon.Indic</option>
                                                <option value="Con Endodoncia">Con Endodoncia</option>
                                                <option value="Endodon.Indic">Endodon.Indic</option>
                                                <option value="Sellante.Indic">Sellante.Indic</option>
                                                <option value="Sellante">Sellante</option>

                                            </select>
                                        </td>
                                    </tr>
                                </thead>
                            </table>

                            <div class="col-md-12">
                                <h4 class="description">Interpretacion</h3>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">radiografias</th>
                                        <td><select class=" custom-select" name="radiografias" id="radiografias" required>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Cual</th>
                                        <td><input type="text" class="form-control" name="cual_radiografia" id="cual_radiografia"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Interpretacion</th>
                                        <td><input type="text" class="form-control" name="interpretacion" id="interpretacion"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">diagnostico</th>
                                        <td><input type="text" class="form-control" name="diagnostico" id="diagnostico"></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">pronostico</th>
                                        <td><input type="text" class="form-control" name="pronostico" id="pronostico">
                                            <input type="hidden" id="sede" name="sede" value="<?php echo $sedeSelecc ?>">
                                            <input type="hidden" id='actual' name="actual" value="<?php echo $actual ?>">
                                            <input type="hidden" id='sedeId' name="sedeId" value="<?php echo $sedeId ?>">
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                            <!--Declaracion de antecedentes medicos -->
                            <div class="col-md-12">
                                <h4 class="description">Declaracion de antecedentes medicos</h3>
                            </div>

                            <p>Yo <input type="text" class="col col-md-3" name="paciente" id="paciente">
                                Identificado con C.C N° <input type="number" class="col col-md-3" name="cedula" id="cedula">
                                declaro que he asistido por cuenta y voluntad propia a consultorio del(la) Dr(a) <input type="text" class="col col-md-3" name="doctor" id="doctor">
                                con C.C. N° <input type="text" class="col col-md-3" name="cedula_doctor" id="cedula_doctor">
                                y que me ha informado del diagnostico, pronostico y plan de tratamiento, así como de las complicaciones y riesgos. Si llegara a presentarse un cambio de tratamiento y de los costos, es deber del(la) Dr(a); informarme en el momento, de ellos. También conozco los beneficios, las indicaciones, contraindicaciones y los cuidados que debo tener durante y después de los procedimientos.
                                Dejo constancia, que he declarado los antecedentes médicos importantes que debe saber e; Odontólogo sobre mi estado general de salud, medicamentos, dosis; de esta manera autorizo los procedimientos descritos en la historia clínica y estoy de acuerdo con el valor pactado del tratamiento.
                            </p>
                            <p>
                                Fecha <input type="date" class="col col-md-3" name="fecha_antecedentes" id="fecha_antecedentes">
                            </p>
                            <p>
                                Firma del paciente o acudiente <input type="text" class="col col-md-3" name="firma_paciente" id="firma_paciente"> C.C <input type="text" class="col col-md-3" name="cedula" id="cedula">
                            </p>

                            <!--Consentimiento Informado -->
                            <div class="col-md-12">
                                <h4 class="description">Consentimiento Informado</h3>
                            </div>

                            <p>NOMBRE DEL PACIENTE:
                                <input type="text" class="col col-md-3" name="paciente" id="paciente">
                                IDENTIFICACION<input type="number" class="col col-md-3" name="cedula" id="cedula">
                            </p>
                            <p>
                                NOMBRE DEL RESPONSABLE (en caso de ser menor de edad) <input type="text" class="col col-md-3" name="responsable" id="responsable">
                                IDENTIFICACION<input type="number" class="col col-md-3" name="cedula_res" id="cedula_res">
                            </p>
                            <p>
                                YO <input type="text" class="col col-md-3" name="paciente" id="paciente">
                                MAYOR DE EDAD IDENTIFICADO COMO APARECE AL PIE DE MI FIRMA, ACTUANDO EN MI PROPIO NOMBRE O EN CALIDAD DE ACUDIENTE DE <input type="text" class="col col-md-3" name="paciente" id="paciente">
                                POR MEDIO DEL PRESENTE DOCUMENTO DE MANERA EXPRESA, EN PLENO USO DE MIS FACULTADES MENTALES MANIFIESTO:
                            </p>
                            <p>
                                AUTORIZO AL(LA) DR(A). <input type="text" class="col col-md-3" name="doctor" id="doctor">
                                CON C.C N°<input type="number" class="col col-md-3" name="cedula_doctor" id="cedula_doctor">,
                                PARA LA REALIZACION DEL (LOS) PROCEDIMIENTO (S), (O) (S) DEL PLAN DE TRATAMIENTO AQUÍ DESCRITOS:
                            </p>
                            <input type="text" class="col" name="procedimiento" id="procedimiento">

                            <p>
                                EL(LA) DR(A)<input type="text" class="col col-md-3" name="doctor" id="doctor">
                                ODONTOLOGO, ME HA EXPLICADO CLARAMENTE LA NATURALEZA DE LA ENFERMEDAD Y EL PROPOSITO DE LO (S) PROCEDIMIENTO (S) Y/O INTERVENCION O PROCEDIMIENTOS ESPECIAL (ES), TAMBIEN SE ME HA INFORMADO DE LAS VENTAJAS, COMPLICACIONES, MOLESTIAS, POSIBLES ALTERNATIVAS Y RIESGOS EN PARTICULAR LOS SIGUIENTES:
                            </p>
                            <input type="text" class="col" name="riesgos" id="riesgos">
                            <p>
                                ENTIENDO QUE EN CURSO DE LOS PROCEDIMIENTOS SE PUEDEN PRESENTAR SITUACIONES IMPREVISTAS, QUE PUEDAN CAMBIAR EL CURSO DEL TRATAMIENTO Y EL COSTO, ES DEBER DE LA DOCTORA INFORMARME DE ELLOS EN EL MOMENTO DE PRESENTARSE, PARA ASI TOMAR DECISIÓN ACERCA DE LA CONTINUIDAD DEL TRATAMIENTO.
                            </p>
                            <p>
                                FIRMA DEL PACIENTE Y/O ACUDIENTE <input type="text" class="col col-md-3" name="firma_paciente" id="firma_paciente"> FIRMA DEL ODONTOLOGO Y/O SELLO <input type="text" class="col col-md-3" name="firma_dr" id="firma_dr">
                            </p>



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