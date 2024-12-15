<?php
$actual = $_POST['actual'];
$sedeId = $_POST['sede'];
$mes = $_POST['mes'];

session_start();
$_SESSION['actual'] = $actual;


include 'conexion.php';

//$conn = OpenCon();

if ($mes == 1) {
    $nomes = 'Enero';
} elseif ($mes == 2) {
    $nomes = 'Febrero';
} elseif ($mes == 3) {
    $nomes = 'Marzo';
} elseif ($mes == 4) {
    $nomes = 'Abril';
} elseif ($mes == 5) {
    $nomes = 'Mayo';
} elseif ($mes == 6) {
    $nomes = 'Junio';
} elseif ($mes == 7) {
    $nomes = 'Julio';
} elseif ($mes == 8) {
    $nomes = 'Agosto';
} elseif ($mes == 9) {
    $nomes = 'Septiembre';
} elseif ($mes == 10) {
    $nomes = 'Octubre';
} elseif ($mes == 11) {
    $nomes = 'Noviembre';
} elseif ($mes == 12) {
    $nomes = 'Diciembre';
}



$consulta = "SELECT descripcion, marca, serie, presentacion, registro_sanitario, clasi_riesgo, vida_util, lote, fecha_vencimiento 
FROM med_reg_dispositivo 
where id_Usuario='$actual' AND id_Sede='$sedeId' AND id_Estandar=4 AND MONTH(fecha_vencimiento)=$mes
ORDER BY 
   fecha_vencimiento ASC";
$envio = mysqli_query($conn, $consulta);


header("Content-Type: application/vnd.ms-excel; charset=ISO-8859-1");
header("Content-Disposition: attachment; filename=Consolidado_Dispositivos_Medicos_$nomes.xls");

?>

<table border="1">
    <caption>
        Consolidado Dispositivos Medicos
    </caption>
    <tr>
        <th>FECHA DE VENCIMIENTO</th>
        <th>DESCRIPCION</th>
        <th>MARCA</th>
        <th>SERIE</th>
        <th>PRESENTACION</th>
        <th>REGISTRO SANITARIO</th>
        <th>CLASIFICACION DE RIESGO</th>
        <th>VIDA UTIL</th>
        <th>LOTE</th>
    </tr>
    <?php

    while ($row = $envio->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $row['fecha_vencimiento']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['marca']; ?></td>
            <td><?php echo $row['serie']; ?></td>
            <td><?php echo $row['presentacion']; ?></td>
            <td><?php echo $row['registro_sanitario']; ?></td>
            <td><?php echo $row['clasi_riesgo']; ?></td>
            <td><?php echo $row['vida_util']; ?></td>
            <td><?php echo $row['lote']; ?></td>

        </tr>
    <?php
    }
    mysqli_free_result($envio);
    ?>