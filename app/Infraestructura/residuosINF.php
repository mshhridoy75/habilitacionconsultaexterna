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


    $consulta = "SELECT inf_residuo.fecha, inf_no_aprov.inertes, inf_no_aprov.bolsas_Iner, inf_no_aprov.ordinarios, inf_no_aprov.bolsas_Ordi, inf_no_pelig.biodegradables, inf_no_pelig.bolsas_Bio, inf_no_pelig.reciclables, inf_no_pelig.bolsas_Reci, inf_aprov.bolsas_Batas, inf_aprov.bolsas_Envolve, inf_aprov.inertes AS inerApro, inf_aprov.bolsas_Iner AS nInerApro, inf_aprov.ordinarios AS ordiApro, inf_aprov.bolsas_Ordi AS nOrdiApro, inf_residuo.responsable, inf_residuo.empresa_Recolectora, inf_residuo.frecuencia       
FROM inf_residuo
JOIN inf_no_aprov ON inf_residuo.no_Aprovechable = inf_no_aprov.id
JOIN inf_no_pelig ON inf_residuo.no_Peligroso = inf_no_pelig.id
JOIN inf_aprov ON inf_residuo.aprovechable = inf_aprov.id 
WHERE id_Usuario='$actual' AND id_Sede='$sedeId'";

    $envio = mysqli_query($conn, $consulta);

    $consulta2 = "SELECT inf_infeccioso.biosanitario, inf_infeccioso.bolsas_Biosan, inf_infeccioso.anato, inf_infeccioso.bolsas_Anato, inf_infeccioso.cortopunzante, inf_infeccioso.bolsas_Corto, inf_infeccioso.animales, inf_infeccioso.bolsas_Ani, inf_quimico.farmacos, inf_quimico.bolsas_Farma, inf_quimico.citotoxicos, inf_quimico.bolsas_Cito, inf_quimico.metales, inf_quimico.bolsas_Metal, inf_quimico.reactivos, inf_quimico.bolsas_Reactivos, inf_quimico.contenedores, inf_quimico.bolsas_Conte, inf_quimico.aceite, inf_quimico.bolsas_Aceite, inf_radioactivo.fuentes_Abiertas, inf_radioactivo.fuentes_Cerradas
FROM inf_peligroso
JOIN inf_infeccioso ON inf_peligroso.infeccioso=inf_infeccioso.id
JOIN inf_quimico ON inf_peligroso.quimico=inf_quimico.id
JOIN inf_radioactivo ON inf_peligroso.radioactivo=inf_radioactivo.id
WHERE id_Usuario='$actual' AND id_Sede='$sedeId'";

    $envio2 = mysqli_query($conn, $consulta2);

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
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Inertes (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Ordinarios (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Biodegradabales(Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Reciclables (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col" title="Batas Hospitalarias unico uso no contaminadas">No de Bolsas Batas</th>
                                            <th scope="col" title="Envolvederas de esterilizar sin contacto con contaminantes">No de Bolsas Envolvederas</th>
                                            <th scope="col">Inertes (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Ordinarios (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Biosanitarios (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Anatomopatologico (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Cortopunzantes (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">De animales (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Farmacos (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Citotóxicos (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Metales pesados (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Reactivos (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Contenederos presurizados</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Aceites Usados (galones)</th>
                                            <th scope="col">No de Galones</th>
                                            <th scope="col">Fuentes abiertas</th>
                                            <th scope="col">Fuentes cerradas</th>
                                            <th scope="col">Responsable</th>
                                            <th scope="col">Empresa Recolectora</th>
                                            <th scope="col">Frecuencia</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">

                                        <?php
                                        while ($row = $envio->fetch_assoc()) {
                                            $fecha = $row['fecha'];
                                            $inertes = $row['inertes'];
                                            $nInertes = $row['bolsas_Iner'];
                                            $ordinarios = $row['ordinarios'];
                                            $nOrdinarios = $row['bolsas_Ordi'];
                                            $biodegradables = $row['biodegradables'];
                                            $nBiodegradables = $row['bolsas_Bio'];
                                            $reciclables = $row['reciclables'];
                                            $nReciclables = $row['bolsas_Reci'];
                                            $batas = $row['bolsas_Batas'];
                                            $envolv = $row['bolsas_Envolve'];
                                            $inerApro = $row['inerApro'];
                                            $nInerApro = $row['nInerApro'];
                                            $ordiApro = $row['ordiApro'];
                                            $nOrdiApro = $row['nOrdiApro'];
                                            $responsable = $row['responsable'];
                                            $recolectora = $row['empresa_Recolectora'];
                                            $frecuencia = $row['frecuencia'];

                                            $row_envio2 = $envio2->fetch_assoc();

                                            $biosanitarios = $row_envio2['biosanitario'];
                                            $nBiosanitarios = $row_envio2['bolsas_Biosan'];
                                            $anato = $row_envio2['anato'];
                                            $nAnato = $row_envio2['bolsas_Anato'];
                                            $cortopunzantes = $row_envio2['cortopunzante'];
                                            $nCortopunzantes = $row_envio2['bolsas_Corto'];
                                            $animales = $row_envio2['animales'];
                                            $nAnimales = $row_envio2['bolsas_Ani'];
                                            $farmacos = $row_envio2['farmacos'];
                                            $nFarmacos = $row_envio2['bolsas_Farma'];
                                            $citotoxicos = $row_envio2['citotoxicos'];
                                            $nCitotoxicos = $row_envio2['bolsas_Cito'];
                                            $metales = $row_envio2['metales'];
                                            $nMetales = $row_envio2['bolsas_Metal'];
                                            $reactivos = $row_envio2['reactivos'];
                                            $nReactivos = $row_envio2['bolsas_Reactivos'];
                                            $presur = $row_envio2['contenedores'];
                                            $nPresur = $row_envio2['bolsas_Conte'];
                                            $aceites = $row_envio2['aceite'];
                                            $nAceites = $row_envio2['bolsas_Aceite'];
                                            $abiertas = $row_envio2['fuentes_Abiertas'];
                                            $cerradas = $row_envio2['fuentes_Cerradas'];


                                        ?>
                                            <tr>
                                                <td><?php echo $fecha ?></td>
                                                <td><?php echo $inertes ?></td>
                                                <td><?php echo $nInertes ?></td>
                                                <td><?php echo $ordinarios ?></td>
                                                <td><?php echo $nOrdinarios ?></td>
                                                <td><?php echo $biodegradables ?></td>
                                                <td><?php echo $nBiodegradables ?></td>
                                                <td><?php echo $reciclables ?></td>
                                                <td><?php echo $nReciclables ?></td>
                                                <td><?php echo $batas ?></td>
                                                <td><?php echo $envolv ?></td>
                                                <td><?php echo $inerApro ?></td>
                                                <td><?php echo $nInerApro ?></td>
                                                <td><?php echo $ordiApro ?></td>
                                                <td><?php echo $nOrdiApro ?></td>
                                                <td><?php echo $biosanitarios ?></td>
                                                <td><?php echo $nBiosanitarios ?></td>
                                                <td><?php echo $anato ?></td>
                                                <td><?php echo $nAnato ?></td>
                                                <td><?php echo $cortopunzantes ?></td>
                                                <td><?php echo $nCortopunzantes ?></td>
                                                <td><?php echo $animales ?></td>
                                                <td><?php echo $nAnimales ?></td>
                                                <td><?php echo $farmacos ?></td>
                                                <td><?php echo $nFarmacos ?></td>
                                                <td><?php echo $citotoxicos ?></td>
                                                <td><?php echo $nCitotoxicos ?></td>
                                                <td><?php echo $metales ?></td>
                                                <td><?php echo $nMetales ?></td>
                                                <td><?php echo $reactivos ?></td>
                                                <td><?php echo $nReactivos ?></td>
                                                <td><?php echo $presur ?></td>
                                                <td><?php echo $nPresur ?></td>
                                                <td><?php echo $aceites ?></td>
                                                <td><?php echo $nAceites ?></td>
                                                <td><?php echo $abiertas ?></td>
                                                <td><?php echo $cerradas ?></td>
                                                <td><?php echo $responsable ?></td>
                                                <td><?php echo $recolectora ?></td>
                                                <td><?php echo $frecuencia ?></td>
                                            </tr>
                                        <?php
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content">
                                <div class="col col-md-2">
                                    <h5 class="description">Generar Consolidado </h5>
                                </div>
                                <form method="POST" action="../db/consResiduosINF.php">
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

                            <h3 class="description">Nuevo control</h3>


                            <div class="scrollit" id="tabla-info-2">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Inertes (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Ordinarios (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Biodegradabales(Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Reciclables (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col" title="Batas Hospitalarias unico uso no contaminadas">No de Bolsas Batas</th>
                                            <th scope="col" title="Envolvederas de esterilizar sin contacto con contaminantes">No de Bolsas Envolvederas</th>
                                            <th scope="col">Inertes (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Ordinarios (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Biosanitarios (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Anatomopatologico (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Cortopunzantes (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">De animales (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Farmacos (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Citotóxicos (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Metales pesados (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Reactivos (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Contenederos presurizados</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Aceites Usados (galones)</th>
                                            <th scope="col">No de Galones</th>
                                            <th scope="col">Fuentes abiertas</th>
                                            <th scope="col">Fuentes cerradas</th>
                                            <th scope="col">Responsable</th>
                                            <th scope="col">Empresa Recolectora</th>
                                            <th scope="col">Frecuencia</th>
                                    </thead>
                                    <form method="POST" action="../db/nuevoResINF.php">
                                        <tbody>
                                            <tr>
                                                <td><input type="number" class="form-control" min="1" name="inertes" id="inertes"></td>

                                                <td><input type="number" class="form-control" min="1" name="nInertes" id="nInertes"></td>

                                                <td><input type="number" class="form-control" min="1" name="ordinarios" id="ordinarios"></td>

                                                <td><input type="number" class="form-control" min="1" name="nOrdinarios" id="nOrdinarios"></td>

                                                <td><input type="number" class="form-control" min="1" name="biodegradabales" id="biodegradabales"></td>

                                                <td><input type="number" class="form-control" min="1" name="nBiodegradabales" id="nBiodegradabales"></td>

                                                <td><input type="number" class="form-control" min="1" name="reciclables" id="reciclables"></td>

                                                <td><input type="number" class="form-control" min="1" name="nReciclables" id="nReciclables"></td>

                                                <td><input type="number" class="form-control" min="1" name="batas" id="batas"></td>

                                                <td><input type="number" class="form-control" min="1" name="envolv" id="envolv"></td>

                                                <td><input type="number" class="form-control" min="1" name="inerApro" id="inerApro"></td>

                                                <td><input type="number" class="form-control" min="1" name="nInerApro" id="nInerApro"></td>

                                                <td><input type="number" class="form-control" min="1" name="ordiApro" id="ordiApro"></td>

                                                <td><input type="number" class="form-control" min="1" name="nOrdiApro" id="nOrdiApro"></td>

                                                <td><input type="number" class="form-control" min="1" name="biosanitarios" id="biosanitarios"></td>

                                                <td><input type="number" class="form-control" min="1" name="nBiosanitarios" id="nBiosanitarios"></td>

                                                <td><input type="number" class="form-control" min="1" name="anato" id="anato"></td>

                                                <td><input type="number" class="form-control" min="1" name="nAnato" id="nAnato"></td>

                                                <td><input type="number" class="form-control" min="1" name="cortopunzantes" id="cortopunzantes"></td>

                                                <td><input type="number" class="form-control" min="1" name="nCortopunzantes" id="nCortopunzantes"></td>

                                                <td><input type="number" class="form-control" min="1" name="animales" id="animales"></td>

                                                <td><input type="number" class="form-control" min="1" name="nAnimales" id="nAnimales"></td>

                                                <td><input type="number" class="form-control" min="1" name="farmacos" id="farmacos"></td>

                                                <td><input type="number" class="form-control" min="1" name="nFarmacos" id="nFarmacos"></td>

                                                <td><input type="number" class="form-control" min="1" name="citotoxicos" id="citotoxicos"></td>

                                                <td><input type="number" class="form-control" min="1" name="nCitotoxicos" id="nCitotoxicos"></td>

                                                <td><input type="number" class="form-control" min="1" name="metales" id="metales"></td>

                                                <td><input type="number" class="form-control" min="1" name="nMetales" id="nMetales"></td>

                                                <td><input type="number" class="form-control" min="1" name="reactivos" id="reavtivos"></td>

                                                <td><input type="number" class="form-control" min="1" name="nReactivos" id="nReactivos"></td>

                                                <td><input type="number" class="form-control" min="1" name="presur" id="presur"></td>

                                                <td><input type="number" class="form-control" min="1" name="nPresur" id="nPresur"></td>

                                                <td><input type="number" class="form-control" min="1" name="aceites" id="aceites"></td>

                                                <td><input type="number" class="form-control" min="1" name="nAceites" id="nAceites"></td>

                                                <td><input type="number" class="form-control" min="1" name="abiertas" id="abiertas"></td>

                                                <td><input type="number" class="form-control" min="1" name="cerradas" id="cerradas"></td>

                                                <td><input type="text" class="form-control" name="responsable" id="responsable"></td>

                                                <td><select class="custom-select" name="recolectora" id="recolectora">
                                                        <option value="Ciudad Limpia">Ciudad Limpia</option>
                                                        <option value="Ecocapital ESP">Ecocapital ESP</option>
                                                        <option value="Promoambiental">Promoambiental</option>
                                                        <option value="Lime">Lime</option>
                                                        <option value="Bogota Limpia">Bogota Limpia</option>
                                                        <option value="Area Limpia">Area Limpia</option>
                                                        <option value="Departamental">Departamental</option>
                                                    </select>

                                                </td>

                                                <td><input type="number" class="form-control" min="1" name="frecuencia" id="frecuencia">
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
    
    $consulta = "SELECT 
        inf_residuo.fecha, 
        inf_no_aprov.inertes, 
        inf_no_aprov.bolsas_Iner, 
        inf_no_aprov.ordinarios, 
        inf_no_aprov.bolsas_Ordi, 
        inf_no_pelig.biodegradables, 
        inf_no_pelig.bolsas_Bio, 
        inf_no_pelig.reciclables, 
        inf_no_pelig.bolsas_Reci, 
        inf_aprov.bolsas_Batas, 
        inf_aprov.bolsas_Envolve, 
        inf_aprov.inertes AS inerApro, 
        inf_aprov.bolsas_Iner AS nInerApro, 
        inf_aprov.ordinarios AS ordiApro, 
        inf_aprov.bolsas_Ordi AS nOrdiApro, 
        inf_residuo.responsable, 
        inf_residuo.empresa_Recolectora, 
        inf_residuo.frecuencia
    FROM inf_residuo
    JOIN inf_no_aprov ON inf_residuo.no_Aprovechable = inf_no_aprov.id
    JOIN inf_no_pelig ON inf_residuo.no_Peligroso = inf_no_pelig.id
    JOIN inf_aprov ON inf_residuo.aprovechable = inf_aprov.id
    JOIN usuario ON inf_residuo.id_Usuario = usuario.id  -- Add this join to link the tables
    JOIN sede ON inf_residuo.id_Sede = sede.id 
    WHERE usuario.id='$actual' AND sede.id='$sedeId'";


    /*$consulta = "SELECT inf_residuo.fecha, inf_no_aprov.inertes, inf_no_aprov.bolsas_Iner, inf_no_aprov.ordinarios, inf_no_aprov.bolsas_Ordi, inf_no_pelig.biodegradables, inf_no_pelig.bolsas_Bio, inf_no_pelig.reciclables, inf_no_pelig.bolsas_Reci, inf_aprov.bolsas_Batas, inf_aprov.bolsas_Envolve, inf_aprov.inertes AS inerApro, inf_aprov.bolsas_Iner AS nInerApro, inf_aprov.ordinarios AS ordiApro, inf_aprov.bolsas_Ordi AS nOrdiApro, inf_residuo.responsable, inf_residuo.empresa_Recolectora, inf_residuo.frecuencia       
FROM inf_residuo
JOIN inf_no_aprov ON inf_residuo.no_Aprovechable = inf_no_aprov.id
JOIN inf_no_pelig ON inf_residuo.no_Peligroso = inf_no_pelig.id
JOIN inf_aprov ON inf_residuo.aprovechable = inf_aprov.id 
WHERE id_Usuario='$actual' AND id_Sede='$sedeId'";*/

    $envio = mysqli_query($conn, $consulta);

    $consulta2 = "SELECT inf_infeccioso.biosanitario, inf_infeccioso.bolsas_Biosan, inf_infeccioso.anato, inf_infeccioso.bolsas_Anato, inf_infeccioso.cortopunzante, inf_infeccioso.bolsas_Corto, inf_infeccioso.animales, inf_infeccioso.bolsas_Ani, inf_quimico.farmacos, inf_quimico.bolsas_Farma, inf_quimico.citotoxicos, inf_quimico.bolsas_Cito, inf_quimico.metales, inf_quimico.bolsas_Metal, inf_quimico.reactivos, inf_quimico.bolsas_Reactivos, inf_quimico.contenedores, inf_quimico.bolsas_Conte, inf_quimico.aceite, inf_quimico.bolsas_Aceite, inf_radioactivo.fuentes_Abiertas, inf_radioactivo.fuentes_Cerradas
FROM inf_peligroso
JOIN inf_infeccioso ON inf_peligroso.infeccioso=inf_infeccioso.id
JOIN inf_quimico ON inf_peligroso.quimico=inf_quimico.id
JOIN inf_radioactivo ON inf_peligroso.radioactivo=inf_radioactivo.id
JOIN usuario ON inf_peligroso.id_Usuario = usuario.id  -- Join the 'usuario' table
JOIN sede ON inf_peligroso.id_Sede = sede.id  -- Join the 'sede' table
WHERE usuario.id='$actual' AND sede.id='$sedeId'";


    $envio2 = mysqli_query($conn, $consulta2);

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
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Inertes (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Ordinarios (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Biodegradabales(Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Reciclables (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col" title="Batas Hospitalarias unico uso no contaminadas">No de Bolsas Batas</th>
                                            <th scope="col" title="Envolvederas de esterilizar sin contacto con contaminantes">No de Bolsas Envolvederas</th>
                                            <th scope="col">Inertes (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Ordinarios (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Biosanitarios (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Anatomopatologico (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Cortopunzantes (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">De animales (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Farmacos (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Citotóxicos (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Metales pesados (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Reactivos (Kg)</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Contenederos presurizados</th>
                                            <th scope="col">No de Bolsas</th>
                                            <th scope="col">Aceites Usados (galones)</th>
                                            <th scope="col">No de Galones</th>
                                            <th scope="col">Fuentes abiertas</th>
                                            <th scope="col">Fuentes cerradas</th>
                                            <th scope="col">Responsable</th>
                                            <th scope="col">Empresa Recolectora</th>
                                            <th scope="col">Frecuencia</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">

                                        <?php
                                        while ($row = $envio->fetch_assoc()) {
                                            $fecha = $row['fecha'];
                                            $inertes = $row['inertes'];
                                            $nInertes = $row['bolsas_Iner'];
                                            $ordinarios = $row['ordinarios'];
                                            $nOrdinarios = $row['bolsas_Ordi'];
                                            $biodegradables = $row['biodegradables'];
                                            $nBiodegradables = $row['bolsas_Bio'];
                                            $reciclables = $row['reciclables'];
                                            $nReciclables = $row['bolsas_Reci'];
                                            $batas = $row['bolsas_Batas'];
                                            $envolv = $row['bolsas_Envolve'];
                                            $inerApro = $row['inerApro'];
                                            $nInerApro = $row['nInerApro'];
                                            $ordiApro = $row['ordiApro'];
                                            $nOrdiApro = $row['nOrdiApro'];
                                            $responsable = $row['responsable'];
                                            $recolectora = $row['empresa_Recolectora'];
                                            $frecuencia = $row['frecuencia'];

                                            $row_envio2 = $envio2->fetch_assoc();

                                            $biosanitarios = $row_envio2['biosanitario'];
                                            $nBiosanitarios = $row_envio2['bolsas_Biosan'];
                                            $anato = $row_envio2['anato'];
                                            $nAnato = $row_envio2['bolsas_Anato'];
                                            $cortopunzantes = $row_envio2['cortopunzante'];
                                            $nCortopunzantes = $row_envio2['bolsas_Corto'];
                                            $animales = $row_envio2['animales'];
                                            $nAnimales = $row_envio2['bolsas_Ani'];
                                            $farmacos = $row_envio2['farmacos'];
                                            $nFarmacos = $row_envio2['bolsas_Farma'];
                                            $citotoxicos = $row_envio2['citotoxicos'];
                                            $nCitotoxicos = $row_envio2['bolsas_Cito'];
                                            $metales = $row_envio2['metales'];
                                            $nMetales = $row_envio2['bolsas_Metal'];
                                            $reactivos = $row_envio2['reactivos'];
                                            $nReactivos = $row_envio2['bolsas_Reactivos'];
                                            $presur = $row_envio2['contenedores'];
                                            $nPresur = $row_envio2['bolsas_Conte'];
                                            $aceites = $row_envio2['aceite'];
                                            $nAceites = $row_envio2['bolsas_Aceite'];
                                            $abiertas = $row_envio2['fuentes_Abiertas'];
                                            $cerradas = $row_envio2['fuentes_Cerradas'];


                                        ?>
                                            <tr>
                                                <td><?php echo $fecha ?></td>
                                                <td><?php echo $inertes ?></td>
                                                <td><?php echo $nInertes ?></td>
                                                <td><?php echo $ordinarios ?></td>
                                                <td><?php echo $nOrdinarios ?></td>
                                                <td><?php echo $biodegradables ?></td>
                                                <td><?php echo $nBiodegradables ?></td>
                                                <td><?php echo $reciclables ?></td>
                                                <td><?php echo $nReciclables ?></td>
                                                <td><?php echo $batas ?></td>
                                                <td><?php echo $envolv ?></td>
                                                <td><?php echo $inerApro ?></td>
                                                <td><?php echo $nInerApro ?></td>
                                                <td><?php echo $ordiApro ?></td>
                                                <td><?php echo $nOrdiApro ?></td>
                                                <td><?php echo $biosanitarios ?></td>
                                                <td><?php echo $nBiosanitarios ?></td>
                                                <td><?php echo $anato ?></td>
                                                <td><?php echo $nAnato ?></td>
                                                <td><?php echo $cortopunzantes ?></td>
                                                <td><?php echo $nCortopunzantes ?></td>
                                                <td><?php echo $animales ?></td>
                                                <td><?php echo $nAnimales ?></td>
                                                <td><?php echo $farmacos ?></td>
                                                <td><?php echo $nFarmacos ?></td>
                                                <td><?php echo $citotoxicos ?></td>
                                                <td><?php echo $nCitotoxicos ?></td>
                                                <td><?php echo $metales ?></td>
                                                <td><?php echo $nMetales ?></td>
                                                <td><?php echo $reactivos ?></td>
                                                <td><?php echo $nReactivos ?></td>
                                                <td><?php echo $presur ?></td>
                                                <td><?php echo $nPresur ?></td>
                                                <td><?php echo $aceites ?></td>
                                                <td><?php echo $nAceites ?></td>
                                                <td><?php echo $abiertas ?></td>
                                                <td><?php echo $cerradas ?></td>
                                                <td><?php echo $responsable ?></td>
                                                <td><?php echo $recolectora ?></td>
                                                <td><?php echo $frecuencia ?></td>



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



        <?php

    }

        ?>