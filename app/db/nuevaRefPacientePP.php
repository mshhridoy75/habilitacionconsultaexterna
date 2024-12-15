<?php
$nombre_prestador = $_POST['nombre_prestador'];

$fecha_referencia = strtotime($_POST['fecha_referencia']);
$fecha_referencia = date('y-m-d', $fecha_referencia);

$hora_referencia = strtotime($_POST["hora_referencia"]);
$hora_referencia = date('H:i', $hora_referencia);

$numero_documento = $_POST['numero_documento'];
$tipo_documento = $_POST['tipo_documento'];
$apellido_1 = $_POST['apellido_1'];
$apellido_2 = $_POST['apellido_2'];
$nombres = $_POST['nombres'];
$sexo = $_POST['sexo'];

$fecha_nacimiento = strtotime($_POST['fecha_nacimiento']);
$fecha_nacimiento = date('y-m-d', $fecha_nacimiento);

$edad = $_POST['edad'];
$estado_civil = $_POST['estado_civil'];
$direccion_paciente = $_POST['direccion_paciente'];
$ciudad = $_POST['ciudad'];
$localidad = $_POST['localidad'];
$barrio = $_POST['barrio'];
$telefono = $_POST['telefono'];
$nombre_aseguradora = $_POST['nombre_aseguradora'];
$tipo_vinculacion = $_POST['tipo_vinculacion'];
$ocupacion = $_POST['ocupacion'];
$acompanante = $_POST['acompanante'];
$telefono_acompanante = $_POST['telefono_acompanante'];
$responsable = $_POST['responsable'];
$parentesco_responsable = $_POST['parentesco_responsable'];
$telefono_responsable = $_POST['telefono_responsable'];
$sintomatologia = $_POST['sintomatologia'];
$medidas = $_POST['medidas'];
$razones = $_POST['razones'];



$sede = $_POST['sede'];
$sedeId = $_POST['sedeId'];
$actual = $_POST['actual'];
session_start();
$_SESSION['actual'] = $actual;


include 'conexion.php';

//$conn = OpenCon();

$consulta = "INSERT INTO pp_referencia_pacientes (id_Usuario, id_Sede, id_Estandar, nombre_prestador, fecha_referencia, hora_referencia, numero_documento, tipo_documento, apellido_1, apellido_2, nombres, sexo, fecha_nacimiento, edad, estado_civil, direccion_paciente, ciudad, localidad, barrio, telefono, nombre_aseguradora, tipo_vinculacion, ocupacion, acompanante, telefono_acompanante, responsable, parentesco_responsable, telefono_responsable, sintomatologia, medidas, razones) 
VALUES ('$actual','$sedeId', 5, '$nombre_prestador', '$fecha_referencia', '$hora_referencia', '$numero_documento', '$tipo_documento', '$apellido_1', '$apellido_2', '$nombres', '$sexo', '$fecha_nacimiento', '$edad', '$estado_civil', '$direccion_paciente', '$ciudad', '$localidad', '$barrio', '$telefono', '$nombre_aseguradora', '$tipo_vinculacion', '$ocupacion', '$acompanante', '$telefono_acompanante', '$responsable', '$parentesco_responsable', '$telefono_responsable', '$sintomatologia', '$medidas', '$razones')";
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
                <h5>Se registró la referencia correctamente</h1>
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
                <h5>No se registró la referencia</h1>
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

    //header('Location: ../../gestionAdmin.php?sedeSel=$sede&usuarioSel=$odont');
}

?>