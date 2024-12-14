<?php
$actual = $_POST['actual'];
$sedeId = $_POST['sede'];
$mes = $_POST['mes'];

session_start();
$_SESSION['actual'] = $actual;


include 'conexion.php';

$conn = OpenCon();

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



$consulta = "SELECT nombre, principio_activo, forma_farmac, concentracion, unidad_medida, fecha_vencimiento, lote, presentacion, registro_sanitario  
FROM med_reg_medicamentos 
where id_Usuario='$actual' AND id_Sede='$sedeId' AND id_Estandar=4 AND MONTH(fecha_vencimiento)=$mes
ORDER BY 
   fecha_vencimiento ASC";
$envio = mysqli_query($conn, $consulta);


header("Content-Type: application/vnd.ms-excel; charset=ISO-8859-1");
header("Content-Disposition: attachment; filename=Consolidado_Medicamentos_$nomes.xls");

?>

<table border="1">
    <caption>
        Consolidado Medicamentos
    </caption>
    <tr>
        <th>FECHA DE VENCIMIENTO</th>
        <th>NOMBRE</th>
        <th>PRINCIPIO ACTIVO</th>
        <th>FORMA FARMACEUTICA</th>
        <th>CONCENTRACION</th>
        <th>UNIDAD DE MEDIDA</th>
        <th>LOTE</th>
        <th>PRESENTACION</th>
        <th>REGISTRO SANITARIO</th>
    </tr>
    <?php

    while ($row = $envio->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $row['fecha_vencimiento']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['principio_activo']; ?></td>
            <td><?php echo $row['forma_farmac']; ?></td>
            <td><?php echo $row['concentracion']; ?></td>
            <td><?php echo $row['unidad_medida']; ?></td>
            <td><?php echo $row['lote']; ?></td>
            <td><?php echo $row['presentacion']; ?></td>
            <td><?php echo $row['registro_sanitario']; ?></td>

        </tr>
    <?php
    }
    mysqli_free_result($envio);
    ?>