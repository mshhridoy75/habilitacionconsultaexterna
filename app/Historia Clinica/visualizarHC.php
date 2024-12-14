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

    if ($row3 = $envioverif->fetch_assoc()) {

        $consulta2 = "SELECT `datos_identificacion`, `anamnesis`, `examen_fisico`, `examen_oral`, `odontograma_inicial`, `odontograma_evolucion` 
FROM `hc_historia_clinica` 
WHERE id_Usuario = '$actual' AND id_Sede='$sedeId' AND id_Estandar=6 AND id_Persona='$cedula'";
        $rescons2 = mysqli_query($conn, $consulta2);

        $row = $rescons2->fetch_assoc();



        $datos_id = $row['datos_identificacion'];
        $anamnesis = $row['anamnesis'];
        $examen_fisico = $row['examen_fisico'];
        $examen_oral = $row['examen_oral'];
        $odontograma_inicial = $row['odontograma_inicial'];
        $odontograma_evolucion = $row['odontograma_evolucion'];






        $consulta = "SELECT * 
FROM hc_datos_identificacion as datosid
JOIN hc_anamnesis as anamnesis ON datosid.numero_identificacion = anamnesis.id_Persona
JOIN hc_examen_fisico as fisico ON datosid.numero_identificacion = fisico.id_Persona
JOIN hc_examen_oral as oral ON datosid.numero_identificacion = oral.id_Persona 
JOIN hc_odontograma_inicial as inicial ON datosid.numero_identificacion = inicial.id_Persona 
JOIN hc_odontograma_evolucion as evolucion ON datosid.numero_identificacion = evolucion.id_Persona 
WHERE datosid.id_Usuario = '$actual' AND datosid.id_Sede='$sedeId' AND datosid.id='$datos_id' AND anamnesis.id='$anamnesis'
AND fisico.id='$examen_fisico' AND oral.id='$examen_oral' AND inicial.id='$odontograma_inicial' AND evolucion.id='$odontograma_evolucion'";

        $envio = mysqli_query($conn, $consulta);



        $consevolucion = "SELECT * 
FROM hc_datos_identificacion as datosid
JOIN hc_odontograma_evolucion as evolucion ON datosid.numero_identificacion = evolucion.id_Persona 
WHERE datosid.id_Usuario = '$actual' AND datosid.id_Sede='$sedeId' AND evolucion.id='$odontograma_evolucion'";

        $envevolucion = mysqli_query($conn, $consevolucion);


        $consentimiento = "SELECT * FROM hc_consentimiento
     WHERE id_Usuario = '$actual' AND id_Sede='$sedeId' AND id_paciente='$cedula'";
        $envconsentimiento = mysqli_query($conn, $consentimiento);


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
                    <?php
                    while ($row = $envio->fetch_assoc()) {
                        $fecha_registro = $row['fecha_registro'];
                        $nombres_apellidos = $row['nombres_apellidos'];
                        $numero_identificacion = $row['numero_identificacion'];
                        $fecha_nacimiento = $row['fecha_nacimiento'];
                        $edad = $row['edad'];
                        $estado_civil = $row['estado_civil'];
                        $direccion = $row['direccion'];
                        $telefono = $row['telefono'];
                        $celular = $row['celular'];
                        $lugar_residencia = $row['lugar_residencia'];
                        $ocupacion = $row['ocupacion'];
                        $eps_vinculacion = $row['eps_vinculacion'];
                        $acompanante = $row['acompanante'];
                        $num_acompanante = $row['num_acompanante'];
                        $responsable = $row['responsable'];
                        $parentesco = $row['parentesco'];
                        $num_responsable = $row['num_responsable'];


                        $motivo = $row['motivo'];
                        $cardiaca = $row['cardiaca'];
                        $tension = $row['tension'];
                        $diabetes = $row['diabetes'];
                        $coagulacion = $row['coagulacion'];
                        $sinusitis = $row['sinusitis'];
                        $problemas_respiratorios = $row['problemas_respiratorios'];
                        $renal = $row['renal'];
                        $hepatica = $row['hepatica'];
                        $gastritis = $row['gastritis'];
                        $hepatitis = $row['hepatitis'];
                        $sida = $row['sida'];
                        $cancer = $row['cancer'];
                        $convulsiones = $row['convulsiones'];
                        $cirugias = $row['cirugias'];
                        $cual_cirugia = $row['cual_cirugia'];
                        $medicamentos = $row['medicamentos'];
                        $cual_medicamento = $row['cual_medicamento'];
                        $embarazo = $row['embarazo'];
                        $fam_cardiaca = $row['fam_cardiaca'];
                        $fam_tension = $row['fam_tension'];
                        $fam_diabetes = $row['fam_diabetes'];
                        $fam_cancer = $row['fam_cancer'];
                        $otros = $row['otros'];
                        $anestesia = $row['anestesia'];
                        $alergia = $row['alergia'];
                        $cual_alergia = $row['cual_alergia'];





                        $ultima_visita = $row['ultima_visita'];
                        $motivo = $row['motivo'];
                        $temperatura = $row['temperatura'];
                        $pulso = $row['pulso'];
                        $tension_p = $row['tension_p'];
                        $respiracion = $row['respiracion'];
                        $higiene_oral = $row['higiene_oral'];
                        $seda = $row['seda'];
                        $cepillo = $row['cepillo'];
                        $enjuague = $row['enjuague'];
                        $frecuencia = $row['frecuencia'];
                        $enhebradores = $row['enhebradores'];

                        $atm = $row['atm'];
                        $labios = $row['labios'];
                        $lengua = $row['lengua'];
                        $paladar = $row['paladar'];
                        $piso_boca = $row['piso_boca'];
                        $maxilares = $row['maxilares'];
                        $glandulas = $row['glandulas'];
                        $senos_maxilares = $row['senos_maxilares'];
                        $supernumerario = $row['supernumerario'];
                        $abrasion = $row['abrasion'];
                        $manchas_pigmentacion = $row['manchas_pigmentacion'];
                        $abceso = $row['abceso'];
                        $maloclusion = $row['maloclusion'];
                        $incluidos = $row['incluidos'];
                        $traumas = $row['traumas'];
                        $habitos = $row['habitos'];
                        $masticadores = $row['masticadores'];
                        $ganglios = $row['ganglios'];
                        $oclusion = $row['oclusion'];
                        $frenillos = $row['frenillos'];
                        $mucosas = $row['mucosas'];
                        $encias = $row['encias'];
                        $amigdalas = $row['amigdalas'];
                        $otros_oral = $row['otros_oral'];
                        $bolsas_movilidad = $row['bolsas_movilidad'];
                        $placa_blanda = $row['placa_blanda'];
                        $calculos = $row['calculos'];
                        $hemorragia_gingival = $row['hemorragia_gingival'];
                        $inflamacion_gingival = $row['inflamacion_gingival'];
                        $periodontitis = $row['periodontitis'];
                        $retracciones = $row['retracciones'];
                        $hiperplasias = $row['hiperplasias'];
                        $descripcion_rehabilitacion = $row['descripcion_rehabilitacion'];
                        $observaciones = $row['observaciones'];
                        $fecha_placa = $row['fecha_placa'];



                        $diente_1 = $row['diente_1'];
                        $diente_2 = $row['diente_2'];
                        $diente_3 = $row['diente_3'];
                        $diente_4 = $row['diente_4'];
                        $diente_5 = $row['diente_5'];
                        $diente_6 = $row['diente_6'];
                        $diente_7 = $row['diente_7'];
                        $diente_8 = $row['diente_8'];
                        $diente_9 = $row['diente_9'];
                        $diente_10 = $row['diente_10'];
                        $diente_11 = $row['diente_11'];
                        $diente_12 = $row['diente_12'];
                        $diente_13 = $row['diente_13'];
                        $diente_14 = $row['diente_14'];
                        $diente_15 = $row['diente_15'];
                        $diente_16 = $row['diente_16'];
                        $diente_17 = $row['diente_17'];
                        $diente_18 = $row['diente_18'];
                        $diente_19 = $row['diente_19'];
                        $diente_20 = $row['diente_20'];
                        $diente_21 = $row['diente_21'];
                        $diente_22 = $row['diente_22'];
                        $diente_23 = $row['diente_23'];
                        $diente_24 = $row['diente_24'];
                        $diente_25 = $row['diente_25'];
                        $diente_26 = $row['diente_26'];
                        $diente_27 = $row['diente_27'];
                        $diente_28 = $row['diente_28'];
                        $diente_29 = $row['diente_29'];
                        $diente_30 = $row['diente_30'];
                        $diente_31 = $row['diente_31'];
                        $diente_32 = $row['diente_32'];

                        while ($row2 = $envevolucion->fetch_assoc()) {

                            $diente_1_evo = $row2['diente_1_e'];
                            $diente_2_evo = $row2['diente_2_e'];
                            $diente_3_evo = $row2['diente_3_e'];
                            $diente_4_evo = $row2['diente_4_e'];
                            $diente_5_evo = $row2['diente_5_e'];
                            $diente_6_evo = $row2['diente_6_e'];
                            $diente_7_evo = $row2['diente_7_e'];
                            $diente_8_evo = $row2['diente_8_e'];
                            $diente_9_evo = $row2['diente_9_e'];
                            $diente_10_evo = $row2['diente_10_e'];
                            $diente_11_evo = $row2['diente_11_e'];
                            $diente_12_evo = $row2['diente_12_e'];
                            $diente_13_evo = $row2['diente_13_e'];
                            $diente_14_evo = $row2['diente_14_e'];
                            $diente_15_evo = $row2['diente_15_e'];
                            $diente_16_evo = $row2['diente_16_e'];
                            $diente_17_evo = $row2['diente_17_e'];
                            $diente_18_evo = $row2['diente_18_e'];
                            $diente_19_evo = $row2['diente_19_e'];
                            $diente_20_evo = $row2['diente_20_e'];
                            $diente_21_evo = $row2['diente_21_e'];
                            $diente_22_evo = $row2['diente_22_e'];
                            $diente_23_evo = $row2['diente_23_e'];
                            $diente_24_evo = $row2['diente_24_e'];
                            $diente_25_evo = $row2['diente_25_e'];
                            $diente_26_evo = $row2['diente_26_e'];
                            $diente_27_evo = $row2['diente_27_e'];
                            $diente_28_evo = $row2['diente_28_e'];
                            $diente_29_evo = $row2['diente_29_e'];
                            $diente_30_evo = $row2['diente_30_e'];
                            $diente_31_evo = $row2['diente_31_e'];
                            $diente_32_evo = $row2['diente_32_e'];

                            $row5 = $envconsentimiento->fetch_assoc();

                            $fecha_antecedentes = $row5['fecha_antecedentes'];
                            $paciente = $row5['nombre_paciente'];
                            $cedula = $row5['id_paciente'];
                            $doctor = $row5['nombre_dr'];
                            $cedula_doctor = $row5['id_dr'];
                            $responsable = $row5['nombre_responsable'];
                            $cedula_res = $row5['id_responsable'];
                            $procedimiento = $row5['procedimiento'];
                            $riesgos = $row5['riesgos'];
                            $firma_paciente = $row5['firma_paciente'];
                            $firma_dr = $row5['firma_odontologo'];









                    ?>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="description">Datos de identificacion</h3>
                                    </div>
                                    <div class="col-md-12">

                                        <table class="table table-bordered">
                                            <thead>

                                                <tr>
                                                    <th>FECHA DE REGISTRO</th>
                                                    <td class="col-md-12"><?php echo $fecha_registro ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">NOMBRE COMPLETO</th>
                                                    <td><?php echo $nombres_apellidos ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">NUMERO DE IDENTIFICACION </th>
                                                    <td><?php echo $numero_identificacion ?></td>

                                                <tr>
                                                    <th scope="col">FECHA DE NACIMIENTO </th>
                                                    <td><?php echo $fecha_nacimiento ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">EDAD</th>
                                                    <td><?php echo $edad ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">ESTADO CIVIL</th>
                                                    <td><?php echo $estado_civil ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">DIRECCION</th>
                                                    <td><?php echo $direccion ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">TELEFONO</th>
                                                    <td><?php echo $telefono ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">CELULAR</th>
                                                    <td><?php echo $celular ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">LUGAR DE RESIDENCIA</th>
                                                    <td><?php echo $lugar_residencia ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Ocupacion</th>
                                                    <td><?php echo $ocupacion ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">EPS/VINCULACION</th>
                                                    <td><?php echo $eps_vinculacion ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">NOMBRE DEL ACOMPAÑANTE</th>
                                                    <td><?php echo $acompanante ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">TELEFONO DEL ACOMPAÑANTE</th>
                                                    <td><?php echo $num_acompanante ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">RESPONSABLE</th>
                                                    <td><?php echo $responsable ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">PARENTESCO DEL RESPNOSABLE</th>
                                                    <td><?php echo $parentesco ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">TELEFONO DEL RESPONSABLE</th>
                                                    <td><?php echo $num_responsable ?></td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <h3 class="description">Anamnesis</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <h4 class="description">Antecedentes Personales</h4>
                                    </div>
                                    <div class="col-md-12">

                                        <table class="table table-bordered">
                                            <thead>

                                                <tr>
                                                    <th scope="col">Motivo de consulta </th>
                                                    <td class="col-md-12"><?php echo $motivo ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Emfermedad Cardiaca</th>
                                                    <td><?php echo $cardiaca ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Tension arterial alta</th>
                                                    <td><?php echo $tension ?></td>

                                                <tr>
                                                    <th scope="col">Diabetes</th>
                                                    <td><?php echo $diabetes ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Problemas de coagulacion</th>
                                                    <td><?php echo $coagulacion ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Sinusitis</th>
                                                    <td><?php echo $sinusitis ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Problemas respiratorios</th>
                                                    <td><?php echo $problemas_respiratorios ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Enfermedad Renal</th>
                                                    <td><?php echo $renal ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Enfermedad Hepatica</th>
                                                    <td><?php echo $hepatica ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Gastritis</th>
                                                    <td><?php echo $gastritis ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Hepatitis</th>
                                                    <td><?php echo $hepatitis ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Sida</th>
                                                    <td><?php echo $sida ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Cancer</th>
                                                    <td><?php echo $cancer ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Convulsiones</th>
                                                    <td><?php echo $convulsiones ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Cirugias (incluida oral) </th>
                                                    <td><?php echo $cirugias ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Cual?</th>
                                                    <td><?php echo $cual_cirugia ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Toma medicamentos o esta en tratamiento medico?</th>
                                                    <td><?php echo $medicamentos ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Cual?</th>
                                                    <td><?php echo $cual_medicamento ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Estado de embarazo</th>
                                                    <td><?php echo $embarazo ?></td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <h3 class="description">Antecedentes Familiares</h3>
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Enfermedad Cardiaca</th>
                                                <td class="col-md-12"><?php echo $fam_cardiaca ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Tension arterial alta</th>
                                                <td><?php echo $fam_tension ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Diabetes</th>
                                                <td><?php echo $fam_diabetes ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Cancer</th>
                                                <td><?php echo $fam_cancer ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Otros y observaciones </th>
                                                <td><?php echo $otros ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Le han aplicado anestesia oral?</th>
                                                <td><?php echo $anestesia ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Alergia:</th>
                                                <td><?php echo $alergia ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Cual?</th>
                                                <td><?php echo $cual_alergia ?></td>
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
                                                <td class="col-md-12"><?php echo $ultima_visita ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Motivo de consulta</th>
                                                <td><?php echo $motivo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Temperatura</th>
                                                <td><?php echo $temperatura ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Pulso</th>
                                                <td><?php echo $pulso ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Tension</th>
                                                <td><?php echo $tension_p ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Respiracion</th>
                                                <td><?php echo $respiracion ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Higiene Oral</th>

                                                <td><?php echo $higiene_oral ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Seda dental</th>
                                                <td><?php echo $seda ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Cepillo de dientes</th>
                                                <td><?php echo $cepillo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Enjuague Bucal</th>
                                                <td><?php echo $enjuague ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Frecuencia de cepillado</th>
                                                <td><?php echo $frecuencia ?></td>

                                            </tr>
                                            <tr>
                                                <th scope="col">Enhebradores</th>
                                                <td><?php echo $enhebradores ?></td>
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
                                                <td class="col-md-12"><?php echo $atm ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Labios</th>
                                                <td><?php echo $labios ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">lengua</th>
                                                <td><?php echo $lengua ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">paladar</th>
                                                <td><?php echo $paladar ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Piso de boca</th>
                                                <td><?php echo $piso_boca ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">maxilares</th>
                                                <td><?php echo $maxilares ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Glandulas Salivares</th>
                                                <td><?php echo $glandulas ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Senos maxilares</th>
                                                <td><?php echo $senos_maxilares ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">supernumerario</th>
                                                <td><?php echo $supernumerario ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">abrasion</th>
                                                <td><?php echo $abrasion ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">manchas/Pigmentacion</th>
                                                <td><?php echo $manchas_pigmentacion ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Abceso</th>
                                                <td><?php echo $abceso ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">maloclusion</th>
                                                <td><?php echo $maloclusion ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">incluidos</th>
                                                <td><?php echo $incluidos ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">traumas</th>
                                                <td><?php echo $traumas ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">habitos</th>
                                                <td><?php echo $habitos ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Musculos masticadores</th>
                                                <td><?php echo $masticadores ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">ganglios</th>
                                                <td><?php echo $ganglios ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">oclusion</th>
                                                <td><?php echo $oclusion ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">frenillos</th>
                                                <td><?php echo $frenillos ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">mucosas</th>
                                                <td><?php echo $mucosas ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">encias</th>
                                                <td><?php echo $encias ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">amigdalas</th>
                                                <td><?php echo $amigdalas ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">otros</th>
                                                <td><?php echo $otros_oral ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Bolsas/movilidad</th>
                                                <td><?php echo $bolsas_movilidad ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Placa blanda</th>
                                                <td><?php echo $placa_blanda ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">calculos</th>
                                                <td><?php echo $calculos ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Hemorragia gingival</th>
                                                <td><?php echo $hemorragia_gingival ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">inflamacion gingival</th>
                                                <td><?php echo $inflamacion_gingival ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">periodontitis</th>
                                                <td><?php echo $periodontitis ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">retracciones</th>
                                                <td><?php echo $retracciones ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">hiperplasias</th>
                                                <td><?php echo $hiperplasias ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Descripcion rehabilitacion oral</th>
                                                <td><?php echo $descripcion_rehabilitacion ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">observaciones</th>
                                                <td><?php echo $observaciones ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">fecha indice de placa</th>
                                                <td><?php echo $fecha_placa ?></td>
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
                                                <td><?php echo $diente_1 ?></td>
                                                <th scope="col">diente 2</th>
                                                <td><?php echo $diente_2 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 3</th>
                                                <td><?php echo $diente_3 ?></td>
                                                <th scope="col">diente 4</th>
                                                <td><?php echo $diente_4 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 5</th>
                                                <td><?php echo $diente_5 ?></td>
                                                <th scope="col">diente 6</th>
                                                <td><?php echo $diente_6 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 7</th>
                                                <td><?php echo $diente_7 ?></td>
                                                <th scope="col">diente 8</th>
                                                <td><?php echo $diente_8 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 9</th>
                                                <td><?php echo $diente_9 ?></td>
                                                <th scope="col">diente 10</th>
                                                <td><?php echo $diente_10 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 11</th>
                                                <td><?php echo $diente_11 ?></td>
                                                <th scope="col">diente 12</th>
                                                <td><?php echo $diente_12 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 13</th>
                                                <td><?php echo $diente_13 ?></td>
                                                <th scope="col">diente 14</th>
                                                <td><?php echo $diente_14 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 15</th>
                                                <td><?php echo $diente_15 ?></td>
                                                <th scope="col">diente 16</th>
                                                <td><?php echo $diente_16 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 17</th>
                                                <td><?php echo $diente_17 ?></td>
                                                <th scope="col">diente 18</th>
                                                <td><?php echo $diente_18 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 19</th>
                                                <td><?php echo $diente_19 ?></td>
                                                <th scope="col">diente 20</th>
                                                <td><?php echo $diente_20 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 21</th>
                                                <td><?php echo $diente_21 ?></td>
                                                <th scope="col">diente 22</th>
                                                <td><?php echo $diente_22 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 23</th>
                                                <td><?php echo $diente_23 ?></td>
                                                <th scope="col">diente 24</th>
                                                <td><?php echo $diente_24 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 25</th>
                                                <td><?php echo $diente_25 ?></td>
                                                <th scope="col">diente 26</th>
                                                <td><?php echo $diente_26 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 27</th>
                                                <td><?php echo $diente_27 ?></td>
                                                <th scope="col">diente 28</th>
                                                <td><?php echo $diente_28 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 29</th>
                                                <td><?php echo $diente_29 ?></td>
                                                <th scope="col">diente 30</th>
                                                <td><?php echo $diente_30 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 31</th>
                                                <td><?php echo $diente_31 ?></td>
                                                <th scope="col">diente 32</th>
                                                <td><?php echo $diente_32 ?></td>
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
                                                <td><?php echo $diente_1_evo ?></td>
                                                <th scope="col">diente 2</th>
                                                <td><?php echo $diente_2_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 3</th>
                                                <td><?php echo $diente_3_evo ?></td>
                                                <th scope="col">diente 4</th>
                                                <td><?php echo $diente_4_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 5</th>
                                                <td><?php echo $diente_5_evo ?></td>
                                                <th scope="col">diente 6</th>
                                                <td><?php echo $diente_6_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 7</th>
                                                <td><?php echo $diente_7_evo ?></td>
                                                <th scope="col">diente 8</th>
                                                <td><?php echo $diente_8_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 9</th>
                                                <td><?php echo $diente_9_evo ?></td>
                                                <th scope="col">diente 10</th>
                                                <td><?php echo $diente_10_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 11</th>
                                                <td><?php echo $diente_11_evo ?></td>
                                                <th scope="col">diente 12</th>
                                                <td><?php echo $diente_12_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 13</th>
                                                <td><?php echo $diente_13_evo ?></td>
                                                <th scope="col">diente 14</th>
                                                <td><?php echo $diente_14_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 15</th>
                                                <td><?php echo $diente_15_evo ?></td>
                                                <th scope="col">diente 16</th>
                                                <td><?php echo $diente_16_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 17</th>
                                                <td><?php echo $diente_17_evo ?></td>
                                                <th scope="col">diente 18</th>
                                                <td><?php echo $diente_18_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 19</th>
                                                <td><?php echo $diente_19_evo ?></td>
                                                <th scope="col">diente 20</th>
                                                <td><?php echo $diente_20_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 21</th>
                                                <td><?php echo $diente_21_evo ?></td>
                                                <th scope="col">diente 22</th>
                                                <td><?php echo $diente_22_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 23</th>
                                                <td><?php echo $diente_23_evo ?></td>
                                                <th scope="col">diente 24</th>
                                                <td><?php echo $diente_24_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 25</th>
                                                <td><?php echo $diente_25_evo ?></td>
                                                <th scope="col">diente 26</th>
                                                <td><?php echo $diente_26_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 27</th>
                                                <td><?php echo $diente_27_evo ?></td>
                                                <th scope="col">diente 28</th>
                                                <td><?php echo $diente_28_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 29</th>
                                                <td><?php echo $diente_29_evo ?></td>
                                                <th scope="col">diente 30</th>
                                                <td><?php echo $diente_30_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 31</th>
                                                <td><?php echo $diente_31_evo ?></td>
                                                <th scope="col">diente 32</th>
                                                <td><?php echo $diente_32_evo ?></td>
                                            </tr>
                                        </thead>
                                    </table>


                                    <div class="col-md-12">
                                        <h4 class="description">Declaracion de antecedentes medicos</h3>
                                    </div>

                                    <p>Yo <b><i><?php echo $paciente ?></i></b>
                                        Identificado con C.C N° <b><i><?php echo $cedula ?></i></b>
                                        declaro que he asistido por cuenta y voluntad propia a consultorio del(la) Dr(a) <b><i><?php echo $doctor ?></i></b>
                                        con C.C. N° <b><i><?php echo $cedula_doctor ?></i></b>
                                        y que me ha informado del diagnostico, pronostico y plan de tratamiento, así como de las complicaciones y riesgos. Si llegara a presentarse un cambio de tratamiento y de los costos, es deber del(la) Dr(a); informarme en el momento, de ellos. También conozco los beneficios, las indicaciones, contraindicaciones y los cuidados que debo tener durante y después de los procedimientos.
                                        Dejo constancia, que he declarado los antecedentes médicos importantes que debe saber e; Odontólogo sobre mi estado general de salud, medicamentos, dosis; de esta manera autorizo los procedimientos descritos en la historia clínica y estoy de acuerdo con el valor pactado del tratamiento.
                                    </p>
                                    <p>
                                        Fecha <b><i><?php echo $fecha_antecedentes ?></i></b> ⠀⠀⠀⠀
                                    </p>
                                    <p>
                                        Firma del paciente o acudiente <b><i><?php echo $firma_paciente ?></i></b> C.C <b><i><?php echo $cedula_doctor ?></i></b>
                                    </p>

                                    <!--Consentimiento Informado -->
                                    <div class="col-md-12">
                                        <h4 class="description">Consentimiento Informado</h3>
                                    </div>

                                    <p>NOMBRE DEL PACIENTE:
                                        <b><i><?php echo $paciente ?></i></b>
                                        IDENTIFICACION <b><i><?php echo $cedula ?></i></b>
                                    </p>
                                    <p>
                                        NOMBRE DEL RESPONSABLE (en caso de ser menor de edad) <b><i><?php echo $responsable ?></i></b>
                                        IDENTIFICACION <b><i><?php echo $cedula_res ?></i></b>
                                    </p>
                                    <p>
                                        YO <b><i><?php echo $paciente ?></i></b>
                                        MAYOR DE EDAD IDENTIFICADO COMO APARECE AL PIE DE MI FIRMA, ACTUANDO EN MI PROPIO NOMBRE O EN CALIDAD DE ACUDIENTE DE <b><i><?php echo $paciente ?></i></b>
                                        POR MEDIO DEL PRESENTE DOCUMENTO DE MANERA EXPRESA, EN PLENO USO DE MIS FACULTADES MENTALES MANIFIESTO:
                                    </p>
                                    <p>
                                        AUTORIZO AL(LA) DR(A). <b><i><?php echo $doctor ?></i></b>
                                        CON C.C N° <b><i><?php echo $cedula_doctor ?>,</i></b>
                                        PARA LA REALIZACION DEL (LOS) PROCEDIMIENTO (S), (O) (S) DEL PLAN DE TRATAMIENTO AQUÍ DESCRITOS:
                                    </p>
                                    <b><i><?php echo $procedimiento ?></i></b>

                                    <p>
                                        EL(LA) DR(A) <b><i><?php echo $doctor ?></i></b>
                                        ODONTOLOGO, ME HA EXPLICADO CLARAMENTE LA NATURALEZA DE LA ENFERMEDAD Y EL PROPOSITO DE LO (S) PROCEDIMIENTO (S) Y/O INTERVENCION O PROCEDIMIENTOS ESPECIAL (ES), TAMBIEN SE ME HA INFORMADO DE LAS VENTAJAS, COMPLICACIONES, MOLESTIAS, POSIBLES ALTERNATIVAS Y RIESGOS EN PARTICULAR LOS SIGUIENTES:
                                    </p>
                                    <b><i><?php echo $riesgos ?></i></b>
                                    <p>
                                        ENTIENDO QUE EN CURSO DE LOS PROCEDIMIENTOS SE PUEDEN PRESENTAR SITUACIONES IMPREVISTAS, QUE PUEDAN CAMBIAR EL CURSO DEL TRATAMIENTO Y EL COSTO, ES DEBER DE LA DOCTORA INFORMARME DE ELLOS EN EL MOMENTO DE PRESENTARSE, PARA ASI TOMAR DECISIÓN ACERCA DE LA CONTINUIDAD DEL TRATAMIENTO.
                                    </p>
                                    <p>
                                        FIRMA DEL PACIENTE Y/O ACUDIENTE <b><i><?php echo $firma_paciente ?></i></b> ⠀⠀⠀⠀FIRMA DEL ODONTOLOGO Y/O SELLO <b><i><?php echo $firma_dr ?></i></b>
                                    </p>

                            <?php
                        }
                    }

                            ?>


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

    if ($row3 = $envioverif->fetch_assoc()) {

        $consulta2 = "SELECT `datos_identificacion`, `anamnesis`, `examen_fisico`, `examen_oral`, `odontograma_inicial`, `odontograma_evolucion` 
    FROM `hc_historia_clinica` 
    WHERE id_Usuario = '$odontoSelecc' AND id_Sede='$sedeId' AND id_Estandar=6 AND id_Persona='$cedula'";
        $rescons2 = mysqli_query($conn, $consulta2);

        $row = $rescons2->fetch_assoc();



        $datos_id = $row['datos_identificacion'];
        $anamnesis = $row['anamnesis'];
        $examen_fisico = $row['examen_fisico'];
        $examen_oral = $row['examen_oral'];
        $odontograma_inicial = $row['odontograma_inicial'];
        $odontograma_evolucion = $row['odontograma_evolucion'];






        $consulta = "SELECT * 
    FROM hc_datos_identificacion as datosid
    JOIN hc_anamnesis as anamnesis ON datosid.numero_identificacion = anamnesis.id_Persona
    JOIN hc_examen_fisico as fisico ON datosid.numero_identificacion = fisico.id_Persona
    JOIN hc_examen_oral as oral ON datosid.numero_identificacion = oral.id_Persona 
    JOIN hc_odontograma_inicial as inicial ON datosid.numero_identificacion = inicial.id_Persona 
    JOIN hc_odontograma_evolucion as evolucion ON datosid.numero_identificacion = evolucion.id_Persona 
    WHERE datosid.id_Usuario = '$odontoSelecc' AND datosid.id_Sede='$sedeId' AND datosid.id='$datos_id' AND anamnesis.id='$anamnesis'
    AND fisico.id='$examen_fisico' AND oral.id='$examen_oral' AND inicial.id='$odontograma_inicial' AND evolucion.id='$odontograma_evolucion'";

        $envio = mysqli_query($conn, $consulta);



        $consevolucion = "SELECT * 
    FROM hc_datos_identificacion as datosid
    JOIN hc_odontograma_evolucion as evolucion ON datosid.numero_identificacion = evolucion.id_Persona 
    WHERE datosid.id_Usuario = '$odontoSelecc' AND datosid.id_Sede='$sedeId' AND evolucion.id='$odontograma_evolucion'";

        $envevolucion = mysqli_query($conn, $consevolucion);


        $consentimiento = "SELECT * FROM hc_consentimiento
         WHERE id_Usuario = '$odontoSelecc' AND id_Sede='$sedeId' AND id_paciente='$cedula'";
        $envconsentimiento = mysqli_query($conn, $consentimiento);


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
                <div class="main-panel" style="height:auto">
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
                    <?php
                    while ($row = $envio->fetch_assoc()) {
                        $fecha_registro = $row['fecha_registro'];
                        $nombres_apellidos = $row['nombres_apellidos'];
                        $numero_identificacion = $row['numero_identificacion'];
                        $fecha_nacimiento = $row['fecha_nacimiento'];
                        $edad = $row['edad'];
                        $estado_civil = $row['estado_civil'];
                        $direccion = $row['direccion'];
                        $telefono = $row['telefono'];
                        $celular = $row['celular'];
                        $lugar_residencia = $row['lugar_residencia'];
                        $ocupacion = $row['ocupacion'];
                        $eps_vinculacion = $row['eps_vinculacion'];
                        $acompanante = $row['acompanante'];
                        $num_acompanante = $row['num_acompanante'];
                        $responsable = $row['responsable'];
                        $parentesco = $row['parentesco'];
                        $num_responsable = $row['num_responsable'];


                        $motivo = $row['motivo'];
                        $cardiaca = $row['cardiaca'];
                        $tension = $row['tension'];
                        $diabetes = $row['diabetes'];
                        $coagulacion = $row['coagulacion'];
                        $sinusitis = $row['sinusitis'];
                        $problemas_respiratorios = $row['problemas_respiratorios'];
                        $renal = $row['renal'];
                        $hepatica = $row['hepatica'];
                        $gastritis = $row['gastritis'];
                        $hepatitis = $row['hepatitis'];
                        $sida = $row['sida'];
                        $cancer = $row['cancer'];
                        $convulsiones = $row['convulsiones'];
                        $cirugias = $row['cirugias'];
                        $cual_cirugia = $row['cual_cirugia'];
                        $medicamentos = $row['medicamentos'];
                        $cual_medicamento = $row['cual_medicamento'];
                        $embarazo = $row['embarazo'];
                        $fam_cardiaca = $row['fam_cardiaca'];
                        $fam_tension = $row['fam_tension'];
                        $fam_diabetes = $row['fam_diabetes'];
                        $fam_cancer = $row['fam_cancer'];
                        $otros = $row['otros'];
                        $anestesia = $row['anestesia'];
                        $alergia = $row['alergia'];
                        $cual_alergia = $row['cual_alergia'];





                        $ultima_visita = $row['ultima_visita'];
                        $motivo = $row['motivo'];
                        $temperatura = $row['temperatura'];
                        $pulso = $row['pulso'];
                        $tension_p = $row['tension_p'];
                        $respiracion = $row['respiracion'];
                        $higiene_oral = $row['higiene_oral'];
                        $seda = $row['seda'];
                        $cepillo = $row['cepillo'];
                        $enjuague = $row['enjuague'];
                        $frecuencia = $row['frecuencia'];
                        $enhebradores = $row['enhebradores'];

                        $atm = $row['atm'];
                        $labios = $row['labios'];
                        $lengua = $row['lengua'];
                        $paladar = $row['paladar'];
                        $piso_boca = $row['piso_boca'];
                        $maxilares = $row['maxilares'];
                        $glandulas = $row['glandulas'];
                        $senos_maxilares = $row['senos_maxilares'];
                        $supernumerario = $row['supernumerario'];
                        $abrasion = $row['abrasion'];
                        $manchas_pigmentacion = $row['manchas_pigmentacion'];
                        $abceso = $row['abceso'];
                        $maloclusion = $row['maloclusion'];
                        $incluidos = $row['incluidos'];
                        $traumas = $row['traumas'];
                        $habitos = $row['habitos'];
                        $masticadores = $row['masticadores'];
                        $ganglios = $row['ganglios'];
                        $oclusion = $row['oclusion'];
                        $frenillos = $row['frenillos'];
                        $mucosas = $row['mucosas'];
                        $encias = $row['encias'];
                        $amigdalas = $row['amigdalas'];
                        $otros_oral = $row['otros_oral'];
                        $bolsas_movilidad = $row['bolsas_movilidad'];
                        $placa_blanda = $row['placa_blanda'];
                        $calculos = $row['calculos'];
                        $hemorragia_gingival = $row['hemorragia_gingival'];
                        $inflamacion_gingival = $row['inflamacion_gingival'];
                        $periodontitis = $row['periodontitis'];
                        $retracciones = $row['retracciones'];
                        $hiperplasias = $row['hiperplasias'];
                        $descripcion_rehabilitacion = $row['descripcion_rehabilitacion'];
                        $observaciones = $row['observaciones'];
                        $fecha_placa = $row['fecha_placa'];



                        $diente_1 = $row['diente_1'];
                        $diente_2 = $row['diente_2'];
                        $diente_3 = $row['diente_3'];
                        $diente_4 = $row['diente_4'];
                        $diente_5 = $row['diente_5'];
                        $diente_6 = $row['diente_6'];
                        $diente_7 = $row['diente_7'];
                        $diente_8 = $row['diente_8'];
                        $diente_9 = $row['diente_9'];
                        $diente_10 = $row['diente_10'];
                        $diente_11 = $row['diente_11'];
                        $diente_12 = $row['diente_12'];
                        $diente_13 = $row['diente_13'];
                        $diente_14 = $row['diente_14'];
                        $diente_15 = $row['diente_15'];
                        $diente_16 = $row['diente_16'];
                        $diente_17 = $row['diente_17'];
                        $diente_18 = $row['diente_18'];
                        $diente_19 = $row['diente_19'];
                        $diente_20 = $row['diente_20'];
                        $diente_21 = $row['diente_21'];
                        $diente_22 = $row['diente_22'];
                        $diente_23 = $row['diente_23'];
                        $diente_24 = $row['diente_24'];
                        $diente_25 = $row['diente_25'];
                        $diente_26 = $row['diente_26'];
                        $diente_27 = $row['diente_27'];
                        $diente_28 = $row['diente_28'];
                        $diente_29 = $row['diente_29'];
                        $diente_30 = $row['diente_30'];
                        $diente_31 = $row['diente_31'];
                        $diente_32 = $row['diente_32'];

                        while ($row2 = $envevolucion->fetch_assoc()) {

                            $diente_1_evo = $row2['diente_1_e'];
                            $diente_2_evo = $row2['diente_2_e'];
                            $diente_3_evo = $row2['diente_3_e'];
                            $diente_4_evo = $row2['diente_4_e'];
                            $diente_5_evo = $row2['diente_5_e'];
                            $diente_6_evo = $row2['diente_6_e'];
                            $diente_7_evo = $row2['diente_7_e'];
                            $diente_8_evo = $row2['diente_8_e'];
                            $diente_9_evo = $row2['diente_9_e'];
                            $diente_10_evo = $row2['diente_10_e'];
                            $diente_11_evo = $row2['diente_11_e'];
                            $diente_12_evo = $row2['diente_12_e'];
                            $diente_13_evo = $row2['diente_13_e'];
                            $diente_14_evo = $row2['diente_14_e'];
                            $diente_15_evo = $row2['diente_15_e'];
                            $diente_16_evo = $row2['diente_16_e'];
                            $diente_17_evo = $row2['diente_17_e'];
                            $diente_18_evo = $row2['diente_18_e'];
                            $diente_19_evo = $row2['diente_19_e'];
                            $diente_20_evo = $row2['diente_20_e'];
                            $diente_21_evo = $row2['diente_21_e'];
                            $diente_22_evo = $row2['diente_22_e'];
                            $diente_23_evo = $row2['diente_23_e'];
                            $diente_24_evo = $row2['diente_24_e'];
                            $diente_25_evo = $row2['diente_25_e'];
                            $diente_26_evo = $row2['diente_26_e'];
                            $diente_27_evo = $row2['diente_27_e'];
                            $diente_28_evo = $row2['diente_28_e'];
                            $diente_29_evo = $row2['diente_29_e'];
                            $diente_30_evo = $row2['diente_30_e'];
                            $diente_31_evo = $row2['diente_31_e'];
                            $diente_32_evo = $row2['diente_32_e'];

                            $row5 = $envconsentimiento->fetch_assoc();

                            $fecha_antecedentes = $row5['fecha_antecedentes'];
                            $paciente = $row5['nombre_paciente'];
                            $cedula = $row5['id_paciente'];
                            $doctor = $row5['nombre_dr'];
                            $cedula_doctor = $row5['id_dr'];
                            $responsable = $row5['nombre_responsable'];
                            $cedula_res = $row5['id_responsable'];
                            $procedimiento = $row5['procedimiento'];
                            $riesgos = $row5['riesgos'];
                            $firma_paciente = $row5['firma_paciente'];
                            $firma_dr = $row5['firma_odontologo'];









                    ?>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="description">Datos de identificacion</h3>
                                    </div>
                                    <div class="col-md-12">

                                        <table class="table table-bordered">
                                            <thead>

                                                <tr>
                                                    <th>FECHA DE REGISTRO</th>
                                                    <td class="col-md-12"><?php echo $fecha_registro ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">NOMBRE COMPLETO</th>
                                                    <td><?php echo $nombres_apellidos ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">NUMERO DE IDENTIFICACION </th>
                                                    <td><?php echo $numero_identificacion ?></td>

                                                <tr>
                                                    <th scope="col">FECHA DE NACIMIENTO </th>
                                                    <td><?php echo $fecha_nacimiento ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">EDAD</th>
                                                    <td><?php echo $edad ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">ESTADO CIVIL</th>
                                                    <td><?php echo $estado_civil ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">DIRECCION</th>
                                                    <td><?php echo $direccion ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">TELEFONO</th>
                                                    <td><?php echo $telefono ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">CELULAR</th>
                                                    <td><?php echo $celular ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">LUGAR DE RESIDENCIA</th>
                                                    <td><?php echo $lugar_residencia ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Ocupacion</th>
                                                    <td><?php echo $ocupacion ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">EPS/VINCULACION</th>
                                                    <td><?php echo $eps_vinculacion ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">NOMBRE DEL ACOMPAÑANTE</th>
                                                    <td><?php echo $acompanante ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">TELEFONO DEL ACOMPAÑANTE</th>
                                                    <td><?php echo $num_acompanante ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">RESPONSABLE</th>
                                                    <td><?php echo $responsable ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">PARENTESCO DEL RESPNOSABLE</th>
                                                    <td><?php echo $parentesco ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">TELEFONO DEL RESPONSABLE</th>
                                                    <td><?php echo $num_responsable ?></td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <h3 class="description">Anamnesis</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <h4 class="description">Antecedentes Personales</h4>
                                    </div>
                                    <div class="col-md-12">

                                        <table class="table table-bordered">
                                            <thead>

                                                <tr>
                                                    <th scope="col">Motivo de consulta </th>
                                                    <td class="col-md-12"><?php echo $motivo ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Emfermedad Cardiaca</th>
                                                    <td><?php echo $cardiaca ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Tension arterial alta</th>
                                                    <td><?php echo $tension ?></td>

                                                <tr>
                                                    <th scope="col">Diabetes</th>
                                                    <td><?php echo $diabetes ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Problemas de coagulacion</th>
                                                    <td><?php echo $coagulacion ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Sinusitis</th>
                                                    <td><?php echo $sinusitis ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Problemas respiratorios</th>
                                                    <td><?php echo $problemas_respiratorios ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Enfermedad Renal</th>
                                                    <td><?php echo $renal ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Enfermedad Hepatica</th>
                                                    <td><?php echo $hepatica ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Gastritis</th>
                                                    <td><?php echo $gastritis ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Hepatitis</th>
                                                    <td><?php echo $hepatitis ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Sida</th>
                                                    <td><?php echo $sida ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Cancer</th>
                                                    <td><?php echo $cancer ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Convulsiones</th>
                                                    <td><?php echo $convulsiones ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Cirugias (incluida oral) </th>
                                                    <td><?php echo $cirugias ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Cual?</th>
                                                    <td><?php echo $cual_cirugia ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Toma medicamentos o esta en tratamiento medico?</th>
                                                    <td><?php echo $medicamentos ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Cual?</th>
                                                    <td><?php echo $cual_medicamento ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Estado de embarazo</th>
                                                    <td><?php echo $embarazo ?></td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <h3 class="description">Antecedentes Familiares</h3>
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Enfermedad Cardiaca</th>
                                                <td class="col-md-12"><?php echo $fam_cardiaca ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Tension arterial alta</th>
                                                <td><?php echo $fam_tension ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Diabetes</th>
                                                <td><?php echo $fam_diabetes ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Cancer</th>
                                                <td><?php echo $fam_cancer ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Otros y observaciones </th>
                                                <td><?php echo $otros ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Le han aplicado anestesia oral?</th>
                                                <td><?php echo $anestesia ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Alergia:</th>
                                                <td><?php echo $alergia ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Cual?</th>
                                                <td><?php echo $cual_alergia ?></td>
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
                                                <td class="col-md-12"><?php echo $ultima_visita ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Motivo de consulta</th>
                                                <td><?php echo $motivo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Temperatura</th>
                                                <td><?php echo $temperatura ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Pulso</th>
                                                <td><?php echo $pulso ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Tension</th>
                                                <td><?php echo $tension_p ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Respiracion</th>
                                                <td><?php echo $respiracion ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Higiene Oral</th>

                                                <td><?php echo $higiene_oral ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Seda dental</th>
                                                <td><?php echo $seda ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Cepillo de dientes</th>
                                                <td><?php echo $cepillo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Enjuague Bucal</th>
                                                <td><?php echo $enjuague ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Frecuencia de cepillado</th>
                                                <td><?php echo $frecuencia ?></td>

                                            </tr>
                                            <tr>
                                                <th scope="col">Enhebradores</th>
                                                <td><?php echo $enhebradores ?></td>
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
                                                <td class="col-md-12"><?php echo $atm ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Labios</th>
                                                <td><?php echo $labios ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">lengua</th>
                                                <td><?php echo $lengua ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">paladar</th>
                                                <td><?php echo $paladar ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Piso de boca</th>
                                                <td><?php echo $piso_boca ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">maxilares</th>
                                                <td><?php echo $maxilares ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Glandulas Salivares</th>
                                                <td><?php echo $glandulas ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Senos maxilares</th>
                                                <td><?php echo $senos_maxilares ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">supernumerario</th>
                                                <td><?php echo $supernumerario ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">abrasion</th>
                                                <td><?php echo $abrasion ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">manchas/Pigmentacion</th>
                                                <td><?php echo $manchas_pigmentacion ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Abceso</th>
                                                <td><?php echo $abceso ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">maloclusion</th>
                                                <td><?php echo $maloclusion ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">incluidos</th>
                                                <td><?php echo $incluidos ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">traumas</th>
                                                <td><?php echo $traumas ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">habitos</th>
                                                <td><?php echo $habitos ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Musculos masticadores</th>
                                                <td><?php echo $masticadores ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">ganglios</th>
                                                <td><?php echo $ganglios ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">oclusion</th>
                                                <td><?php echo $oclusion ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">frenillos</th>
                                                <td><?php echo $frenillos ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">mucosas</th>
                                                <td><?php echo $mucosas ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">encias</th>
                                                <td><?php echo $encias ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">amigdalas</th>
                                                <td><?php echo $amigdalas ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">otros</th>
                                                <td><?php echo $otros_oral ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Bolsas/movilidad</th>
                                                <td><?php echo $bolsas_movilidad ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Placa blanda</th>
                                                <td><?php echo $placa_blanda ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">calculos</th>
                                                <td><?php echo $calculos ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Hemorragia gingival</th>
                                                <td><?php echo $hemorragia_gingival ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">inflamacion gingival</th>
                                                <td><?php echo $inflamacion_gingival ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">periodontitis</th>
                                                <td><?php echo $periodontitis ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">retracciones</th>
                                                <td><?php echo $retracciones ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">hiperplasias</th>
                                                <td><?php echo $hiperplasias ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Descripcion rehabilitacion oral</th>
                                                <td><?php echo $descripcion_rehabilitacion ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">observaciones</th>
                                                <td><?php echo $observaciones ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">fecha indice de placa</th>
                                                <td><?php echo $fecha_placa ?></td>
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
                                                <td><?php echo $diente_1 ?></td>
                                                <th scope="col">diente 2</th>
                                                <td><?php echo $diente_2 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 3</th>
                                                <td><?php echo $diente_3 ?></td>
                                                <th scope="col">diente 4</th>
                                                <td><?php echo $diente_4 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 5</th>
                                                <td><?php echo $diente_5 ?></td>
                                                <th scope="col">diente 6</th>
                                                <td><?php echo $diente_6 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 7</th>
                                                <td><?php echo $diente_7 ?></td>
                                                <th scope="col">diente 8</th>
                                                <td><?php echo $diente_8 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 9</th>
                                                <td><?php echo $diente_9 ?></td>
                                                <th scope="col">diente 10</th>
                                                <td><?php echo $diente_10 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 11</th>
                                                <td><?php echo $diente_11 ?></td>
                                                <th scope="col">diente 12</th>
                                                <td><?php echo $diente_12 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 13</th>
                                                <td><?php echo $diente_13 ?></td>
                                                <th scope="col">diente 14</th>
                                                <td><?php echo $diente_14 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 15</th>
                                                <td><?php echo $diente_15 ?></td>
                                                <th scope="col">diente 16</th>
                                                <td><?php echo $diente_16 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 17</th>
                                                <td><?php echo $diente_17 ?></td>
                                                <th scope="col">diente 18</th>
                                                <td><?php echo $diente_18 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 19</th>
                                                <td><?php echo $diente_19 ?></td>
                                                <th scope="col">diente 20</th>
                                                <td><?php echo $diente_20 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 21</th>
                                                <td><?php echo $diente_21 ?></td>
                                                <th scope="col">diente 22</th>
                                                <td><?php echo $diente_22 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 23</th>
                                                <td><?php echo $diente_23 ?></td>
                                                <th scope="col">diente 24</th>
                                                <td><?php echo $diente_24 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 25</th>
                                                <td><?php echo $diente_25 ?></td>
                                                <th scope="col">diente 26</th>
                                                <td><?php echo $diente_26 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 27</th>
                                                <td><?php echo $diente_27 ?></td>
                                                <th scope="col">diente 28</th>
                                                <td><?php echo $diente_28 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 29</th>
                                                <td><?php echo $diente_29 ?></td>
                                                <th scope="col">diente 30</th>
                                                <td><?php echo $diente_30 ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 31</th>
                                                <td><?php echo $diente_31 ?></td>
                                                <th scope="col">diente 32</th>
                                                <td><?php echo $diente_32 ?></td>
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
                                                <td><?php echo $diente_1_evo ?></td>
                                                <th scope="col">diente 2</th>
                                                <td><?php echo $diente_2_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 3</th>
                                                <td><?php echo $diente_3_evo ?></td>
                                                <th scope="col">diente 4</th>
                                                <td><?php echo $diente_4_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 5</th>
                                                <td><?php echo $diente_5_evo ?></td>
                                                <th scope="col">diente 6</th>
                                                <td><?php echo $diente_6_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 7</th>
                                                <td><?php echo $diente_7_evo ?></td>
                                                <th scope="col">diente 8</th>
                                                <td><?php echo $diente_8_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 9</th>
                                                <td><?php echo $diente_9_evo ?></td>
                                                <th scope="col">diente 10</th>
                                                <td><?php echo $diente_10_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 11</th>
                                                <td><?php echo $diente_11_evo ?></td>
                                                <th scope="col">diente 12</th>
                                                <td><?php echo $diente_12_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 13</th>
                                                <td><?php echo $diente_13_evo ?></td>
                                                <th scope="col">diente 14</th>
                                                <td><?php echo $diente_14_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 15</th>
                                                <td><?php echo $diente_15_evo ?></td>
                                                <th scope="col">diente 16</th>
                                                <td><?php echo $diente_16_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 17</th>
                                                <td><?php echo $diente_17_evo ?></td>
                                                <th scope="col">diente 18</th>
                                                <td><?php echo $diente_18_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 19</th>
                                                <td><?php echo $diente_19_evo ?></td>
                                                <th scope="col">diente 20</th>
                                                <td><?php echo $diente_20_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 21</th>
                                                <td><?php echo $diente_21_evo ?></td>
                                                <th scope="col">diente 22</th>
                                                <td><?php echo $diente_22_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 23</th>
                                                <td><?php echo $diente_23_evo ?></td>
                                                <th scope="col">diente 24</th>
                                                <td><?php echo $diente_24_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 25</th>
                                                <td><?php echo $diente_25_evo ?></td>
                                                <th scope="col">diente 26</th>
                                                <td><?php echo $diente_26_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 27</th>
                                                <td><?php echo $diente_27_evo ?></td>
                                                <th scope="col">diente 28</th>
                                                <td><?php echo $diente_28_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 29</th>
                                                <td><?php echo $diente_29_evo ?></td>
                                                <th scope="col">diente 30</th>
                                                <td><?php echo $diente_30_evo ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="col">diente 31</th>
                                                <td><?php echo $diente_31_evo ?></td>
                                                <th scope="col">diente 32</th>
                                                <td><?php echo $diente_32_evo ?></td>
                                            </tr>
                                        </thead>
                                    </table>


                                    <div class="col-md-12">
                                        <h4 class="description">Declaracion de antecedentes medicos</h3>
                                    </div>

                                    <p>Yo <b><i><?php echo $paciente ?></i></b>
                                        Identificado con C.C N° <b><i><?php echo $cedula ?></i></b>
                                        declaro que he asistido por cuenta y voluntad propia a consultorio del(la) Dr(a) <b><i><?php echo $doctor ?></i></b>
                                        con C.C. N° <b><i><?php echo $cedula_doctor ?></i></b>
                                        y que me ha informado del diagnostico, pronostico y plan de tratamiento, así como de las complicaciones y riesgos. Si llegara a presentarse un cambio de tratamiento y de los costos, es deber del(la) Dr(a); informarme en el momento, de ellos. También conozco los beneficios, las indicaciones, contraindicaciones y los cuidados que debo tener durante y después de los procedimientos.
                                        Dejo constancia, que he declarado los antecedentes médicos importantes que debe saber e; Odontólogo sobre mi estado general de salud, medicamentos, dosis; de esta manera autorizo los procedimientos descritos en la historia clínica y estoy de acuerdo con el valor pactado del tratamiento.
                                    </p>
                                    <p>
                                        Fecha <b><i><?php echo $fecha_antecedentes ?></i></b> ⠀⠀⠀⠀
                                    </p>
                                    <p>
                                        Firma del paciente o acudiente <b><i><?php echo $firma_paciente ?></i></b> C.C <b><i><?php echo $cedula_doctor ?></i></b>
                                    </p>

                                    <!--Consentimiento Informado -->
                                    <div class="col-md-12">
                                        <h4 class="description">Consentimiento Informado</h3>
                                    </div>

                                    <p>NOMBRE DEL PACIENTE:
                                        <b><i><?php echo $paciente ?></i></b>
                                        IDENTIFICACION <b><i><?php echo $cedula ?></i></b>
                                    </p>
                                    <p>
                                        NOMBRE DEL RESPONSABLE (en caso de ser menor de edad) <b><i><?php echo $responsable ?></i></b>
                                        IDENTIFICACION <b><i><?php echo $cedula_res ?></i></b>
                                    </p>
                                    <p>
                                        YO <b><i><?php echo $paciente ?></i></b>
                                        MAYOR DE EDAD IDENTIFICADO COMO APARECE AL PIE DE MI FIRMA, ACTUANDO EN MI PROPIO NOMBRE O EN CALIDAD DE ACUDIENTE DE <b><i><?php echo $paciente ?></i></b>
                                        POR MEDIO DEL PRESENTE DOCUMENTO DE MANERA EXPRESA, EN PLENO USO DE MIS FACULTADES MENTALES MANIFIESTO:
                                    </p>
                                    <p>
                                        AUTORIZO AL(LA) DR(A). <b><i><?php echo $doctor ?></i></b>
                                        CON C.C N° <b><i><?php echo $cedula_doctor ?>,</i></b>
                                        PARA LA REALIZACION DEL (LOS) PROCEDIMIENTO (S), (O) (S) DEL PLAN DE TRATAMIENTO AQUÍ DESCRITOS:
                                    </p>
                                    <b><i><?php echo $procedimiento ?></i></b>

                                    <p>
                                        EL(LA) DR(A) <b><i><?php echo $doctor ?></i></b>
                                        ODONTOLOGO, ME HA EXPLICADO CLARAMENTE LA NATURALEZA DE LA ENFERMEDAD Y EL PROPOSITO DE LO (S) PROCEDIMIENTO (S) Y/O INTERVENCION O PROCEDIMIENTOS ESPECIAL (ES), TAMBIEN SE ME HA INFORMADO DE LAS VENTAJAS, COMPLICACIONES, MOLESTIAS, POSIBLES ALTERNATIVAS Y RIESGOS EN PARTICULAR LOS SIGUIENTES:
                                    </p>
                                    <b><i><?php echo $riesgos ?></i></b>
                                    <p>
                                        ENTIENDO QUE EN CURSO DE LOS PROCEDIMIENTOS SE PUEDEN PRESENTAR SITUACIONES IMPREVISTAS, QUE PUEDAN CAMBIAR EL CURSO DEL TRATAMIENTO Y EL COSTO, ES DEBER DE LA DOCTORA INFORMARME DE ELLOS EN EL MOMENTO DE PRESENTARSE, PARA ASI TOMAR DECISIÓN ACERCA DE LA CONTINUIDAD DEL TRATAMIENTO.
                                    </p>
                                    <p>
                                        FIRMA DEL PACIENTE Y/O ACUDIENTE <b><i><?php echo $firma_paciente ?></i></b> ⠀⠀⠀⠀FIRMA DEL ODONTOLOGO Y/O SELLO <b><i><?php echo $firma_dr ?></i></b>
                                    </p>

                            <?php
                        }
                    }

                            ?>


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
                    <a class="btn btn-danger col col-md-auto" href="../../gestionAdmin.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">Continuar</a>
                </div>






            </div>
        </body>

        </html>


    <?php

        //header('Location: ../../gestionAdmin.php?sedeSel=$sede&usuarioSel=$odont');
    }

    ?>


<?php } ?>