<?php
$inertes = $_POST['inertes'];
$nInertes = $_POST['nInertes'];
$ordinarios = $_POST['ordinarios'];
$nOrdinarios = $_POST['nOrdinarios'];
$biodegradabales = $_POST['biodegradabales'];
$nBiodegradabales = $_POST['nBiodegradabales'];
$reciclables = $_POST['reciclables'];
$nReciclables = $_POST['nReciclables'];
$batas = $_POST['batas'];
$envolv = $_POST['envolv'];
$inerApro = $_POST['inerApro'];
$nInerApro = $_POST['nInerApro'];
$ordiApro = $_POST['ordiApro'];
$nOrdiApro = $_POST['nOrdiApro'];
$biosanitarios = $_POST['biosanitarios'];
$nBiosanitarios = $_POST['nBiosanitarios'];
$anato = $_POST['anato'];
$nAnato = $_POST['nAnato'];
$cortopunzantes = $_POST['cortopunzantes'];
$nCortopunzantes = $_POST['nCortopunzantes'];
$animales = $_POST['animales'];
$nAnimales = $_POST['nAnimales'];
$farmacos = $_POST['farmacos'];
$nFarmacos = $_POST['nFarmacos'];
$citotoxicos = $_POST['citotoxicos'];
$nCitotoxicos = $_POST['nCitotoxicos'];
$metales = $_POST['metales'];
$nMetales = $_POST['nMetales'];
$reactivos = $_POST['reactivos'];
$nReactivos = $_POST['nReactivos'];
$presur = $_POST['presur'];
$nPresur = $_POST['nPresur'];
$aceites = $_POST['aceites'];
$nAceites = $_POST['nAceites'];
$abiertas = $_POST['abiertas'];
$cerradas = $_POST['cerradas'];
$responsable = $_POST['responsable'];
$recolectora = $_POST['recolectora'];
$frecuencia = $_POST['frecuencia'];
$sede = $_POST['sede'];
$sedeId = $_POST['sedeId'];
$actual = $_POST['actual'];
$fecha = date('Y-m-d');
session_start();
$_SESSION['actual'] = $actual;


include 'conexion.php';

//$conn = OpenCon();

$noaprov = "INSERT INTO inf_no_aprov (inertes, bolsas_Iner, ordinarios, bolsas_Ordi)
VALUES ('$inertes', '$nInertes', '$ordinarios', '$nOrdinarios')";
$envnoaprov = mysqli_query($conn, $noaprov);

if ($envnoaprov) {

    $idnoaprov = "SELECT id FROM inf_no_aprov 
    WHERE inertes = $inertes AND bolsas_Iner=$nInertes AND ordinarios=$ordinarios AND bolsas_Ordi=$nOrdinarios";
    $envidnoaprov = mysqli_query($conn, $idnoaprov);

    while ($row = $envidnoaprov->fetch_assoc()) {
        $idnoaprovechable = $row['id'];
    }

    $nopeli = "INSERT INTO inf_no_pelig (biodegradables, bolsas_Bio , reciclables, bolsas_Reci)
    VALUES ('$biodegradabales', '$nBiodegradabales', '$reciclables', '$nReciclables')";
    $envnopeli = mysqli_query($conn, $nopeli);

    if ($envnopeli) {

        $idnopeli = "SELECT id FROM inf_no_pelig 
        WHERE biodegradables = $biodegradabales AND bolsas_Bio=$nBiodegradabales AND reciclables=$reciclables AND bolsas_Reci=$nReciclables";
        $envidnopeli = mysqli_query($conn, $idnopeli);
        while ($row = $envidnopeli->fetch_assoc()) {
            $idnopeligroso = $row['id'];
        }



        $aprov = "INSERT INTO inf_aprov (bolsas_Batas, bolsas_Envolve , inertes, bolsas_Iner, ordinarios, bolsas_Ordi)
        VALUES ('$batas', '$envolv', '$inerApro', '$nInerApro', '$ordiApro', '$nOrdiApro')";
        $envaprov = mysqli_query($conn, $aprov);

        if ($envaprov) {

            $idaprov = "SELECT id FROM inf_aprov 
            WHERE bolsas_Batas = $batas AND bolsas_Envolve=$envolv AND inertes=$inerApro AND bolsas_Iner=$nInerApro AND ordinarios=$ordiApro AND bolsas_Ordi=$nOrdiApro";
            $envidaprov = mysqli_query($conn, $idaprov);
            while ($row = $envidaprov->fetch_assoc()) {
                $idaprovechables = $row['id'];
            }

            $infecc = "INSERT INTO inf_infeccioso (biosanitario, bolsas_Biosan , anato, bolsas_Anato, cortopunzante, bolsas_Corto, animales, bolsas_Ani)
            VALUES ('$biosanitarios', '$nBiosanitarios', '$anato', '$nAnato', '$cortopunzantes', '$nCortopunzantes', '$animales', '$nAnimales')";
            $envinfecc = mysqli_query($conn, $infecc);

            if ($envinfecc) {

                $idinfecc = "SELECT id FROM inf_infeccioso 
                WHERE biosanitario = $biosanitarios AND bolsas_Biosan=$nBiosanitarios AND anato=$anato AND bolsas_Anato=$nAnato AND cortopunzante=$cortopunzantes AND bolsas_Corto=$nCortopunzantes AND animales=$animales AND bolsas_Ani=$nAnimales";
                $envidinfecc = mysqli_query($conn, $idinfecc);
                while ($row = $envidinfecc->fetch_assoc()) {
                    $idinfeccioso = $row['id'];
                }

                $quimico = "INSERT INTO inf_quimico (farmacos, bolsas_Farma , citotoxicos, bolsas_Cito, metales, bolsas_Metal, reactivos, bolsas_Reactivos, contenedores, bolsas_Conte, aceite, bolsas_Aceite)
                VALUES ('$farmacos', '$nFarmacos', '$citotoxicos', '$nCitotoxicos', '$metales', '$nMetales', '$reactivos', '$nReactivos','$presur','$nPresur','$aceites','$nAceites')";
                $envquimico = mysqli_query($conn, $quimico);

                if ($envquimico) {

                    $idquimi = "SELECT id FROM inf_quimico 
                    WHERE farmacos = $farmacos AND bolsas_Farma=$nFarmacos AND citotoxicos=$citotoxicos AND bolsas_Cito=$nCitotoxicos AND metales=$metales AND bolsas_Metal=$nMetales AND reactivos=$reactivos AND bolsas_Reactivos=$nReactivos AND contenedores=$presur AND bolsas_Conte=$nPresur AND aceite=$aceites AND bolsas_Aceite=$nAceites";
                    $envidquimi = mysqli_query($conn, $idquimi);
                    while ($row = $envidquimi->fetch_assoc()) {
                        $idquimico = $row['id'];
                    }


                    $radio = "INSERT INTO inf_radioactivo (fuentes_Abiertas, fuentes_Cerradas)
                    VALUES ('$abiertas', '$cerradas')";
                    $envradio = mysqli_query($conn, $radio);

                    if ($envradio) {
                        $idrad = "SELECT id FROM inf_radioactivo 
                        WHERE fuentes_Abiertas = $abiertas AND fuentes_Cerradas=$cerradas";
                        $envidrad = mysqli_query($conn, $idrad);
                        while ($row = $envidrad->fetch_assoc()) {
                            $idradio = $row['id'];
                        }

                        $pelig = "INSERT INTO inf_peligroso (id_Usuario, id_Sede, infeccioso, quimico, radioactivo)
                        VALUES ('$actual', '$sedeId', '$idinfeccioso', '$idquimico', '$idradio')";
                        $envpelig = mysqli_query($conn, $pelig);

                        if ($envpelig) {

                            $idpelig = "SELECT id FROM inf_peligroso 
                            WHERE infeccioso = $idinfeccioso AND quimico=$idquimico AND radioactivo=$idradio";
                            $envidpelig = mysqli_query($conn, $idpelig);
                            while ($row = $envidpelig->fetch_assoc()) {
                                $idpeligroso = $row['id'];
                            }

                            $residuo = "INSERT INTO inf_residuo (id_Usuario, id_Sede, id_Estandar, fecha, no_Aprovechable, no_Peligroso, aprovechable, peligroso, responsable, 	empresa_Recolectora, frecuencia)
                            VALUES ('$actual', '$sedeId', 2, '$fecha', '$idnoaprovechable', '$idnopeligroso', '$idaprovechables', '$idpeligroso', '$responsable', '$recolectora', '$frecuencia')";
                            $envresiduo = mysqli_query($conn, $residuo);

                            if ($envresiduo) {
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
                                            <h5>Se registró el control correctamente</h1>
                                        </div>

                                        <div class="logo-image-big bt">
                                            <img src="../img/checked.png" alt="exitoso" class="img-succ"> </img>
                                        </div>

                                        <div>
                                            <a class="btn btn-success col col-md-auto" href="../../principalOdontologo.php?sedeSel=<?php echo $sede ?>&actual=<?php echo $actual ?>">Continuar</a>
                                        </div>






                                    </div>
                                </body>

                                </html>

    <?php

                            }
                        }
                    }
                }
            }
        }
    }
} else {
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
                <h5>No se registró la evaluación</h1>
            </div>

            <div class="logo-image-big bt">
                <img src="../img/cancel.png" alt="exitoso" class="img-succ"> </img>
            </div>

            <div>
                <a class="btn btn-danger col col-md-auto" href="../../principalOdontologo.php?sedeSel=<?php echo $sede ?>&actual=<?php echo $actual ?>">Continuar</a>
            </div>






        </div>
    </body>

    </html>
<?php
}
?>