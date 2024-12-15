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




$consulta = "SELECT materiales_Solidos, numero_Baños, discapacitados, escalones, rampas, cuarto_Aseo, deposito, certificacion_RETIE, certificacion_ONAC, ambientes_Varios, certificaciones, incendios 
FROM inf_eval_infra 
where id_Usuario='$actual' AND id_Sede='$sedeId' AND id_Estandar=2 AND month(fecha_reg)=$mes";
$envio = mysqli_query($conn, $consulta);

header("Content-Type: application/vnd.ms-excel; charset=ISO-8859-1");
header("Content-Disposition: attachment; filename=Consolidado_Evaluacion_Infraestructura_$nomes.xls");

?>

<table border="1">
    <caption>
        Consolidado Evaluacion Infraestructura
    </caption>
    <tr>
        <th>FECHA</th>
        <th>PISOS PAREDES TECHOS</th>
        <th>NÚMERO DE BAÑOS</th>
        <th>BAÑOS DE DISCAPACITADOS</th>
        <th>ESCALONES</th>
        <th>RAMPAS</th>
        <th>CUARTOS DE ASEO</th>
        <th>DEPOSITO</th>
        <th>RETIE/ANTERIOR 2005</th>
        <th>ONAC/POSTERIOR 2005</th>
        <th>AMBIENTES VARIOS</th>
        <th>CERTIFICACIONES</th>
        <th>EQUIPO DE EXTINCION</th>
    </tr>
    <?php

    while ($row = $envio->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $row['fecha_reg']; ?></td>
            <td><?php echo $row['materiales_Solidos']; ?></td>
            <td><?php echo $row['numero_Baños']; ?></td>
            <td><?php echo $row['discapacitados']; ?></td>
            <td><?php echo $row['escalones']; ?></td>
            <td><?php echo $row['rampas']; ?></td>
            <td><?php echo $row['cuarto_Aseo']; ?></td>
            <td><?php echo $row['deposito']; ?></td>
            <td><?php echo $row['certificacion_RETIE']; ?></td>
            <td><?php echo $row['certificacion_ONAC']; ?></td>
            <td><?php echo $row['ambientes_Varios']; ?></td>
            <td><?php echo $row['certificaciones']; ?></td>
            <td><?php echo $row['incendios']; ?></td>
        </tr>
    <?php
    }
    mysqli_free_result($envio);
    ?>