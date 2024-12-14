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


$equipo = $_POST['equipo'];
$nDoc = $_POST['nDoc'];
$actual = $_GET['actual'];
$sedeSelecc = $_GET['sede'];



$sql = "SELECT id FROM sede WHERE nombre='$sedeSelecc'";
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    $sedeId = $row['id'];
}


$odontoSelecc = $actual;

$consulta = "SELECT ruta
    FROM docs_equipos
    WHERE id_Usuario='$actual' AND id_Sede='$sedeId' AND id_Estandar=3 AND id_Equipo='equipo' AND nombre='$nDoc'";
$envio = mysqli_query($conn, $consulta);
while ($row = $envio->fetch_assoc()) 
    $ruta = $row['ruta'];



'http://' . $_SERVER['HTTP_HOST'] . '/expertoCalidad2' . '/app/' . 'docs/' . $ruta . '#toolbar=0'

?>