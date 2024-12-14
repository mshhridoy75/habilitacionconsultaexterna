<?php

$n1 = $_POST['n1'];
$numerador = $_POST['numerador'];
$denominador = $_POST['denominador'];

$n2 = $_POST['n2'];
$numerador2 = $_POST['numerador2'];
$denominador2 = $_POST['denominador2'];

$n3 = $_POST['n3'];
$numerador3 = $_POST['numerador3'];
$denominador3 = $_POST['denominador3'];

$n4 = $_POST['n4'];
$numerador4 = $_POST['numerador4'];
$denominador4 = $_POST['denominador4'];

$n5 = $_POST['n5'];
$numerador5 = $_POST['numerador5'];
$denominador5 = $_POST['denominador5'];

$n6 = $_POST['n6'];
$numerador6 = $_POST['numerador6'];
$denominador6 = $_POST['denominador6'];

$n7 = $_POST['n7'];
$numerador7 = $_POST['numerador7'];
$denominador7 = $_POST['denominador7'];

$n8 = $_POST['n8'];
$numerador8 = $_POST['numerador8'];
$denominador8 = $_POST['denominador8'];

$n9 = $_POST['n9'];
$numerador9 = $_POST['numerador9'];
$denominador9 = $_POST['denominador9'];

$n10 = $_POST['n10'];
$numerador10 = $_POST['numerador10'];
$denominador10 = $_POST['denominador10'];

$n11 = $_POST['n11'];
$numerador11 = $_POST['numerador11'];
$denominador11 = $_POST['denominador11'];

$n12 = $_POST['n12'];
$numerador12 = $_POST['numerador12'];
$denominador12 = $_POST['denominador12'];


$sede = $_POST['sede'];
$sedeId = $_POST['sedeId'];
$actual = $_POST['actual'];
session_start();
$_SESSION['actual'] = $actual;


include 'conexion.php';

//$conn = OpenCon();

$consulta = "INSERT INTO pp_indicadores (id_Usuario, id_Sede, id_Estandar, nombre, numerador, denominador, unidad, factor, formula, total)
VALUES ('$actual','$sedeId', 5,'$n1', '$numerador', '$denominador', 'Porcentaje', 100, 'Se divide el numerador entre el denominador y se multiplica por el factor x 100.', ($numerador/$denominador)*100),
('$actual','$sedeId', 5,'$n2', '$numerador2', '$denominador2', 'Porcentaje', 100, 'Se divide el numerador entre el denominador y se multiplica por el factor x 100.', ($numerador2/$denominador2)*100),
('$actual','$sedeId', 5,'$n3', '$numerador3', '$denominador3', 'Porcentaje', 100, 'Se divide el numerador entre el denominador y se multiplica por el factor x 100.', ($numerador3/$denominador3)*100),
('$actual','$sedeId', 5,'$n4', '$numerador4', '$denominador4', 'Porcentaje', 100, 'Se divide el numerador entre el denominador y se multiplica por el factor x 100.', ($numerador4/$denominador4)*100),
('$actual','$sedeId', 5,'$n5', '$numerador5', '$denominador5', 'Porcentaje', 100, 'Se divide el numerador entre el denominador y se multiplica por el factor x 100.', ($numerador5/$denominador5)*100),
('$actual','$sedeId', 5,'$n6', '$numerador6', '$denominador6', 'Porcentaje', 100, 'Se divide el numerador entre el denominador y se multiplica por el factor x 100.', ($numerador6/$denominador6)*100),
('$actual','$sedeId', 5,'$n7', '$numerador7', '$denominador7', 'Porcentaje', 100, 'Se divide el numerador entre el denominador y se multiplica por el factor x 100.', ($numerador7/$denominador7)*100),
('$actual','$sedeId', 5,'$n8', '$numerador8', '$denominador8', 'Porcentaje', 100, 'Se divide el numerador entre el denominador y se multiplica por el factor x 100.', ($numerador8/$denominador8)*100),
('$actual','$sedeId', 5,'$n9', '$numerador9', '$denominador9', 'Porcentaje', 100, 'Se divide el numerador entre el denominador y se multiplica por el factor x 100.', ($numerador9/$denominador9)*100),
('$actual','$sedeId', 5,'$n10', '$numerador10', '$denominador10', 'Porcentaje', 100, 'Se divide el numerador entre el denominador y se multiplica por el factor x 100.', ($numerador10/$denominador10)*100),
('$actual','$sedeId', 5,'$n11', '$numerador11', '$denominador11', 'Porcentaje', 100, 'Se divide el numerador entre el denominador y se multiplica por el factor x 100.', ($numerador11/$denominador11)*100),
('$actual','$sedeId', 5,'$n12', '$numerador12', '$denominador12', 'Porcentaje', 100, 'Se divide el numerador entre el denominador y se multiplica por el factor x 100.', ($numerador12/$denominador12)*100)";
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
                <h5>Se registraron los indicadores correctamente</h1>
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
                <h5>No se registraron los indicadores</h1>
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