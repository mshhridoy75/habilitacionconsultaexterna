<?php
$pregunta = $_POST['pregunta'];
$id_pregunta = $_POST['id_pregunta'];
$respuesta = $_POST['respuesta'];



$actual = $_POST['actual'];
if ($actual != 'admin') {
    $odontoSelecc = $actual;
} else {
    $odontoSelecc = $_POST['usuarioSel'];
}

$sede = $_POST['sede'];
$sedeId = $_POST['sedeId'];

session_start();
$_SESSION['actual'] = $actual;


include 'conexion.php';

//$conn = OpenCon();

if ($actual != 'admin') {



    $consulta = "INSERT INTO respuesta (id_Usuario, id_Sede, pregunta, respuesta, usuario_origen, usuario_destino) 
    VALUES ('$actual','$sedeId', '$pregunta', '$respuesta', 'admin', '$actual')";
    $envio = mysqli_query($conn, $consulta);

    if ($envio) {

        $delete = "DELETE FROM pregunta
        WHERE id = $id_pregunta";
        $deletereg = mysqli_query($conn, $delete);

        if ($deletereg) {
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
                        <h5>Se registró la respuesta correctamente</h1>
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
                        <h5>No se registró la respuesta</h1>
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
    }
} else {

    $consulta = "INSERT INTO respuesta (id_Usuario, id_Sede, pregunta, respuesta, usuario_origen, usuario_destino) 
    VALUES ('$odontoSelecc','$sedeId', '$pregunta', '$respuesta', '$odontoSelecc', '$actual')";
    $envio = mysqli_query($conn, $consulta);

    if ($envio) {

        $delete = "DELETE FROM pregunta
        WHERE id = $id_pregunta";
        $deletereg = mysqli_query($conn, $delete);

        if ($deletereg) {

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
                        <h5>Se registró la pregunta correctamente</h1>
                    </div>

                    <div class="logo-image-big bt">
                        <img src="../img/checked.png" alt="exitoso" class="img-succ"> </img>
                    </div>

                    <div>
                        <a class="btn btn-success col col-md-auto" href="../../gestionAdmin.php?sedeSel=<?php echo $sede ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">Continuar</a>
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
                        <h5>No se registró la pregunta</h1>
                    </div>

                    <div class="logo-image-big bt">
                        <img src="../img/cancel.png" alt="exitoso" class="img-succ"> </img>
                    </div>

                    <div>
                        <a class="btn btn-danger col col-md-auto" href="../../gestionAdmin.php?sedeSel=<?php echo $sede ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">Continuar</a>
                    </div>






                </div>
            </body>

            </html>


<?php

            //header('Location: ../../gestionAdmin.php?sedeSel=$sede&usuarioSel=$odont');
        }
    }
}
?>