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




$consulta = "SELECT tipo, nombre, contenido, stock_unidad, fecha 
FROM dot_inv_instrum 
where id_Usuario='$actual' AND id_Sede='$sedeId' AND id_Estandar=3 AND MONTH(fecha) = $mes";
$envio = mysqli_query($conn, $consulta);


header("Content-Type: application/vnd.ms-excel; charset=ISO-8859-1");
header("Content-Disposition: attachment; filename=Consolidado_Inventario_Instrumental_$nomes.xls");

?>

<table border="1">
    <caption>
        Consolidado Inventario Instrumental
    </caption>
    <tr>
        <th>FECHA DE ENTRADA</th>
        <th>TIPO</th>
        <th>NOMBRE</th>
        <th>CONTENIDO</th>
        <th>STOCK/UNIDAD</th>
    </tr>
    <?php

    while ($row = $envio->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $row['fecha']; ?></td>
            <td><?php echo $row['tipo']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['contenido']; ?></td>
            <td><?php echo $row['stock_unidad']; ?></td>
        </tr>
    <?php
    }
    mysqli_free_result($envio);
    ?>