<?php
$actual = $_POST['actual'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$nombre = $_POST['nombre'];
$sedeOdonto = $_POST['sedeOdonto'];
$rol = $_POST['rol'];
$sede = $_POST['sede'];
$odonto = $_POST['odonto'];
session_start();
$_SESSION['usuario'] = $usuario;



include 'conexion.php';

//$conn = OpenCon();

if ($rol == 'odontologo') {

    $consulta = "INSERT INTO usuario (usuario, pass, nombre, rol)  VALUES ('$usuario','$hashed_password','$nombre','$rol')";
    $envio = mysqli_query($conn, $consulta);

    if ($envio) {
        $consulta2 = "INSERT INTO sede (nombre)  VALUES ('$sedeOdonto')";
        $envio2 = mysqli_query($conn, $consulta2);



        if ($envio2) {

            $conselec = "SELECT id from sede WHERE nombre='$sedeOdonto'";
            $envioselec = mysqli_query($conn, $conselec);
            $row = $envioselec->fetch_assoc();
            $id_sede_odonto = $row['id'];



            $consulta3 = "INSERT INTO sede_odonto (id_Sede, id_Usuario)  VALUES ('$id_sede_odonto', '$usuario')";
            $envio3 = mysqli_query($conn, $consulta3);

            if ($envio3) {
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
                            <h5>Se registró el usuario correctamente</h1>
                        </div>

                        <div class="logo-image-big bt">
                            <img src="../img/checked.png" alt="exitoso" class="img-succ"> </img>
                        </div>

                        <div>
                            <a class="btn btn-success col col-md-auto" href="../../gestionAdmin.php?sedeSel=<?php echo $sede ?>&usuarioSel=<?php echo $odonto ?>&actual=<?php echo $actual ?>">Continuar</a>
                        </div>






                    </div>
                </body>

                </html>

        <?php
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
                    <h5>No se registró el usuario</h1>
                </div>

                <div class="logo-image-big bt">
                    <img src="../img/cancel.png" alt="exitoso" class="img-succ"> </img>
                </div>

                <div>
                    <a class="btn btn-danger col col-md-auto" href="../../gestionAdmin.php?sedeSel=<?php echo $sede ?>&usuarioSel=<?php echo $odonto ?>">Continuar</a>
                </div>






            </div>
        </body>

        </html>


    <?php

        //header('Location: ../../gestionAdmin.php?sedeSel=$sede&usuarioSel=$odont');
    }
} else {
    $consulta = "INSERT INTO usuario (id, pass, nombre, rol)  VALUES ('$usuario','$hashed_password','$nombre','$rol')";
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
                    <h5>Se registró el usuario correctamente</h1>
                </div>

                <div class="logo-image-big bt">
                    <img src="../img/checked.png" alt="exitoso" class="img-succ"> </img>
                </div>

                <div>
                    <a class="btn btn-success col col-md-auto" href="../../gestionAdmin.php?sedeSel=<?php echo $sede ?>&usuarioSel=<?php echo $odonto ?>&actual=<?php echo $actual ?>">Continuar</a>
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
                    <h5>No se registró el usuario</h1>
                </div>

                <div class="logo-image-big bt">
                    <img src="../img/cancel.png" alt="exitoso" class="img-succ"> </img>
                </div>

                <div>
                    <a class="btn btn-danger col col-md-auto" href="../../gestionAdmin.php?sedeSel=<?php echo $sede ?>&usuarioSel=<?php echo $odonto ?>">Continuar</a>
                </div>






            </div>
        </body>

        </html>


<?php

        //header('Location: ../../gestionAdmin.php?sedeSel=$sede&usuarioSel=$odont');
    }
}

?>