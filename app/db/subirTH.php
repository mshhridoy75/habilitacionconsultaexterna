<?php
$actual = $_POST['actual'];
$sede = $_POST['sede'];
session_start();

include 'conexion.php';

//$conn = OpenCon();

$nom1 = $_FILES['file']['name'];
$tmp1 = $_FILES['file']['tmp_name'];
$nom2 = $_FILES['file2']['name'];
$tmp2 = $_FILES['file2']['tmp_name'];
$nom3 = $_FILES['file3']['name'];
$tmp3 = $_FILES['file3']['tmp_name'];
$nom4 = $_FILES['file4']['name'];
$tmp4 = $_FILES['file4']['tmp_name'];
$nom5 = $_FILES['file5']['name'];
$tmp5 = $_FILES['file5']['tmp_name'];
$nom6 = $_FILES['file6']['name'];
$tmp6 = $_FILES['file6']['tmp_name'];
$nom7 = $_FILES['file7']['name'];
$tmp7 = $_FILES['file7']['tmp_name'];
$nom8 = $_FILES['file8']['name'];
$tmp8 = $_FILES['file8']['tmp_name'];


$ruta = "../docs/" . $nom1;
$ruta2 = "../docs/" . $nom2;
$ruta3 = "../docs/" . $nom3;
$ruta4 = "../docs/" . $nom4;
$ruta5 = "../docs/" . $nom5;
$ruta6 = "../docs/" . $nom6;
$ruta7 = "../docs/" . $nom7;
$ruta8 = "../docs/" . $nom8;

move_uploaded_file($tmp1, $ruta);
move_uploaded_file($tmp2, $ruta2);
move_uploaded_file($tmp3, $ruta3);
move_uploaded_file($tmp4, $ruta4);
move_uploaded_file($tmp5, $ruta5);
move_uploaded_file($tmp6, $ruta6);
move_uploaded_file($tmp7, $ruta7);
move_uploaded_file($tmp8, $ruta8);



$sql = "SELECT id FROM sede WHERE nombre='$sede'";
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    $sedeId = $row['id'];
}



$consulta = "INSERT INTO docs (id_Usuario, id_Sede, ruta, estandar, usuario_origen, usuario_Destino, nombre)  
VALUES ('$actual','$sedeId','$ruta',1,'$actual', 'admin','Titulo Profesional')
,('$actual','$sedeId','$ruta2',1,'$actual', 'admin','Titulo Especialidad')
,('$actual','$sedeId','$ruta3',1,'$actual', 'admin','Convalidación')
,('$actual','$sedeId','$ruta4',1,'$actual', 'admin','Tjt Profesional/RETHUS')
,('$actual','$sedeId','$ruta5',1,'$actual', 'admin','Formación Continua')
,('$actual','$sedeId','$ruta6',1,'$actual', 'admin','Entrenamiento equipos utilizados')
,('$actual','$sedeId','$ruta7',1,'$actual', 'admin','Modalidad Vinculación')
,('$actual','$sedeId','$ruta8',1,'$actual', 'admin','Verificación Historia Clinica')";
$envio = mysqli_query($conn, $consulta);

if ($envio) {
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
                <h5>Se subieron los documentos correctamente</h1>
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
                <h5>No se subieron los documentos</h1>
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