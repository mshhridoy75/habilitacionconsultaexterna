<!DOCTYPE html>
<html lang="en">

<head>
    <title>Experto Calidad</title>
    <meta charset="utf-8" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./app/css/index.css" type="text/css">
    <link rel="stylesheet" href="./app/css/bootstrap.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>


    <div class="succ text-center">




            <div class="col-12">
                <h5>Se registró el usuario correctamente</h1>
            </div>

            <div class="logo-image-big bt">
                <img src="./app/img/checked.png" alt="exitoso" class="img-succ"> </img>
            </div>

            <div>
                <a href="../../gestionAdmin.php?sedeSel=<?php echo $sede ?>&usuarioSel=<?php echo $odont ?>">Continuar</a>
                <!-- <button class="btn btn-success col col-md-auto" value="crear" href="../../gestionAdmin.php?sedeSel=<?php echo $sede ?>&usuarioSel=<?php echo $odont ?>">Crear Usuario</button> -->
            </div>

    </div>
</body>

</html>