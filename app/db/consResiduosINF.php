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




$consulta = "SELECT inf_residuo.fecha, inf_no_aprov.inertes, inf_no_aprov.bolsas_Iner, inf_no_aprov.ordinarios, inf_no_aprov.bolsas_Ordi, inf_no_pelig.biodegradables, inf_no_pelig.bolsas_Bio, inf_no_pelig.reciclables, inf_no_pelig.bolsas_Reci, inf_aprov.bolsas_Batas, inf_aprov.bolsas_Envolve, inf_aprov.inertes AS inerApro, inf_aprov.bolsas_Iner AS nInerApro, inf_aprov.ordinarios AS ordiApro, inf_aprov.bolsas_Ordi AS nOrdiApro, inf_residuo.responsable, inf_residuo.empresa_Recolectora, inf_residuo.frecuencia       
FROM inf_residuo
JOIN inf_no_aprov ON inf_residuo.no_Aprovechable = inf_no_aprov.id
JOIN inf_no_pelig ON inf_residuo.no_Peligroso = inf_no_pelig.id
JOIN inf_aprov ON inf_residuo.aprovechable = inf_aprov.id 
WHERE id_Sede='$sedeId' AND month(fecha)=$mes
ORDER BY 
   fecha ASC";

$envio = mysqli_query($conn, $consulta);

$consulta2 = "SELECT inf_infeccioso.biosanitario, inf_infeccioso.bolsas_Biosan, inf_infeccioso.anato, inf_infeccioso.bolsas_Anato, inf_infeccioso.cortopunzante, inf_infeccioso.bolsas_Corto, inf_infeccioso.animales, inf_infeccioso.bolsas_Ani, inf_quimico.farmacos, inf_quimico.bolsas_Farma, inf_quimico.citotoxicos, inf_quimico.bolsas_Cito, inf_quimico.metales, inf_quimico.bolsas_Metal, inf_quimico.reactivos, inf_quimico.bolsas_Reactivos, inf_quimico.contenedores, inf_quimico.bolsas_Conte, inf_quimico.aceite, inf_quimico.bolsas_Aceite, inf_radioactivo.fuentes_Abiertas, inf_radioactivo.fuentes_Cerradas
FROM inf_peligroso
JOIN inf_infeccioso ON inf_peligroso.infeccioso=inf_infeccioso.id
JOIN inf_quimico ON inf_peligroso.quimico=inf_quimico.id
JOIN inf_radioactivo ON inf_peligroso.radioactivo=inf_radioactivo.id 
WHERE month(fecha)=$mes
ORDER BY 
   fecha ASC";

$envio2 = mysqli_query($conn, $consulta2);


header("Content-Type: application/vnd.ms-excel; charset=ISO-8859-1");
header("Content-Disposition: attachment; filename=Consolidado_Residuos_$nomes.xls");

?>
<table border="1">
    <caption>
        Consolidado Residuos
    </caption>
    <tr>
        <th>FECHA</th>
        <th>INERTES (KG)</th>
        <th># DE BOLSAS</th>
        <th>ORDINARIOS (KG)</th>
        <th># DE BOLSAS</th>
        <th>BIODEGRADABALES(KG)</th>
        <th># DE BOLSAS</th>
        <th>RECICLABLES (KG)</th>
        <th># DE BOLSAS</th>
        <th># DE BOLSAS BATAS</th>
        <th># DE BOLSAS ENVOLVEDERAS</th>
        <th>INERTES (KG)</th>
        <th># DE BOLSAS</th>
        <th>ORDINARIOS (KG)</th>
        <th># DE BOLSAS</th>
        <th>BIOSANITARIOS (KG)</th>
        <th># DE BOLSAS</th>
        <th>ANATOMOPATOLOGICO (KG)</th>
        <th># DE BOLSAS</th>
        <th>CORTOPUNZANTES (KG)</th>
        <th># DE BOLSAS</th>
        <th>DE ANIMALES (KG)</th>
        <th># DE BOLSAS</th>
        <th>FARMACOS (KG)</th>
        <th># DE BOLSAS</th>
        <th>CITOTÓXICOS (KG)</th>
        <th># DE BOLSAS</th>
        <th>METALES PESADOS (KG)</th>
        <th># DE BOLSAS</th>
        <th>REACTIVOS (KG)</th>
        <th># DE BOLSAS</th>
        <th>CONTENEDEROS PRESURIZADOS</th>
        <th># DE BOLSAS</th>
        <th>ACEITES USADOS (GALONES)</th>
        <th># DE BOLSAS</th>
        <th>FUENTES ABIERTAS</th>
        <th>FUENTES CERRADAS</th>
        <th>RESPONSABLE</th>
        <th>EMPRESA RECOLECTORA</th>
        <th>FRECUENCIA</th>
    </tr>
    <?php

    while ($row = $envio->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $row['fecha']; ?></td>
            <td><?php echo $row['inertes']; ?></td>
            <td><?php echo $row['bolsas_Iner']; ?></td>
            <td><?php echo $row['ordinarios']; ?></td>
            <td><?php echo $row['bolsas_Ordi']; ?></td>
            <td><?php echo $row['biodegradables']; ?></td>
            <td><?php echo $row['bolsas_Bio']; ?></td>
            <td><?php echo $row['reciclables']; ?></td>
            <td><?php echo $row['bolsas_Reci']; ?></td>
            <td><?php echo $row['bolsas_Batas']; ?></td>
            <td><?php echo $row['bolsas_Envolve']; ?></td>
            <td><?php echo $row['inerApro']; ?></td>
            <td><?php echo $row['nInerApro']; ?></td>
            <td><?php echo $row['ordiApro']; ?></td>
            <td><?php echo $row['nOrdiApro']; ?></td>



            <?php
            $row_envio2 = $envio2->fetch_assoc();
            ?>

            <td><?php echo $row_envio2['biosanitario']; ?></td>
            <td><?php echo $row_envio2['bolsas_Biosan']; ?></td>
            <td><?php echo $row_envio2['anato']; ?></td>
            <td><?php echo $row_envio2['bolsas_Anato']; ?></td>
            <td><?php echo $row_envio2['cortopunzante']; ?></td>
            <td><?php echo $row_envio2['bolsas_Corto']; ?></td>
            <td><?php echo $row_envio2['animales']; ?></td>
            <td><?php echo $row_envio2['bolsas_Ani']; ?></td>
            <td><?php echo $row_envio2['farmacos']; ?></td>
            <td><?php echo $row_envio2['bolsas_Farma']; ?></td>
            <td><?php echo $row_envio2['citotoxicos']; ?></td>
            <td><?php echo $row_envio2['bolsas_Cito']; ?></td>
            <td><?php echo $row_envio2['metales']; ?></td>
            <td><?php echo $row_envio2['bolsas_Metal']; ?></td>
            <td><?php echo $row_envio2['reactivos']; ?></td>
            <td><?php echo $row_envio2['bolsas_Reactivos']; ?></td>
            <td><?php echo $row_envio2['contenedores']; ?></td>
            <td><?php echo $row_envio2['bolsas_Conte']; ?></td>
            <td><?php echo $row_envio2['aceite']; ?></td>
            <td><?php echo $row_envio2['bolsas_Aceite']; ?></td>
            <td><?php echo $row_envio2['fuentes_Abiertas']; ?></td>
            <td><?php echo $row_envio2['fuentes_Cerradas']; ?></td>
            <td><?php echo $row['responsable']; ?></td>
            <td><?php echo $row['empresa_Recolectora']; ?></td>
            <td><?php echo $row['frecuencia']; ?></td>
        </tr>
    <?php
    }
    mysqli_free_result($envio);
    mysqli_free_result($envio2);
    ?>