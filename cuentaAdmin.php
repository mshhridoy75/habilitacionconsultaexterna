<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
session_start();
$varsesion = $_SESSION['usuario'];

if ($varsesion == null || $varsesion = '') {
    echo 'Usted no tiene autorizacion';
    die();
}

$sedeSelecc = $_GET['sedeSel'];
$odontoSelecc = $_GET['usuarioSel'];
$actual = $_GET['actual'];


include './/app/db/conexion.php';

//$conn = OpenCon();

$consulta = "SELECT * FROM usuario where id='$actual'";
$envio = mysqli_query($conn, $consulta);
$res = mysqli_num_rows($envio);

if ($res) {
    while ($row = $envio->fetch_assoc()) {
        $id = $row['id'];
        $pass = $row['password'];
        $nombre = $row['nombre'];
        $rol = $row['rol'];
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Gestion Odontologo
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="./app/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./app/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <link href="./app/css/index.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./app/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a href="#" class="simple-text logo-mini">
                    <!--<div class="logo-image-small">
                        <img src="./app/img/logo.jpg">
                    </div>
                    <p>CT</p> -->
                </a>

                <div class="logo-image-big">
                    <img src="./app/img/logofinal.jpg">
                </div>

                <a class="simple-text logo-normal text-center">
                    Estandares
                    <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="">
                        <a href="#">
                            <i class=""></i>
                            <p>Talento Humano</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class=""></i>
                            <p>Infraestructura</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class=""></i>
                            <p>Dotacion</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class=""></i>
                            <p>Medicamentos y Dispositivos</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class=""></i>
                            <p>Procesos Prioritarios</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class=""></i>
                            <p>Historia Clinica</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class=""></i>
                            <p>Interdependencia</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class=""></i>
                            <p>Gestion de Usuarios</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel" style="height: 100vh;">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand">Sede: <?php echo $sedeSelecc ?></a>
                        <a class="navbar-brand">Usuario: <?php echo $odontoSelecc ?></a>

                    </div>
                    <div class="col-md-16">
                        <a href="cuenta.php">Gestionar Cuenta</a>
                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a href="app/db/auth/sessiondie.php">Cerrar Sesion</a>
                        </a>
                    </div>
                </div>


            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="description">Gestion de cuenta</h3>
                    </div>
                    <div class="col-md-12">

                        <div class="row justify-content-md-center">
                            <div class="col col-md-2">
                                <h5 class="description">Usuario: </h5>
                            </div>
                            <div class="col col-md-2">
                                <input type="text" class="form-control" value="<?php echo $actual ?>" disabled>
                            </div>
                        </div>

                        <div class="row justify-content-md-center">
                            <div class="col col-md-2">
                                <h5 class="description">Nombre: </h5>
                            </div>
                            <div class="col col-md-2">
                                <input type="text" class="form-control" value="<?php echo $nombre ?>" disabled>
                            </div>
                        </div>

                        <div class="row justify-content-md-center">
                            <div class="col col-md-2">
                                <h5 class="description">Rol: </h5>
                            </div>
                            <div class="col col-md-2">
                                <input type="text" class="form-control" value="<?php echo $nombre ?>" disabled>
                            </div>
                        </div>

                        <div class="row justify-content-md-center">
                            <div class="col col-md-2">
                                <h5 class="description">Contraseña Actual: </h5>
                            </div>
                            <div class="col col-md-2">
                                <input type="text" class="form-control" value="<?php echo $pass ?>" disabled>
                            </div>
                        </div>

                        <form action="./app/db/editarPerfilAdmin.php" method="POST">
                            <div class="row justify-content-md-center">
                                <div class="col col-md-2">
                                    <h5 class="description">Nueva Contraseña: </h5>
                                </div>
                                <div class="col col-md-2">
                                    <input type="text" class="form-control" name="newpass" id="newpass">
                                </div>
                            </div>
                            <div class="row justify-content-md-center">
                                <div class="col col-md-2">
                                    <h5 class="description">Confirme Nueva Contraseña: </h5>
                                </div>
                                <div class="col col-md-2">
                                    <input type="text" class="form-control" name="newpassconfr" id="newpassconfr">
                                </div>

                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success col col-md-auto" value="crear">Cambiar contraseña</button>
                            </div>

                            <input type="hidden" id="sede" name="id" value="<?php echo $id ?>">
                            <input type="hidden" id='actual' name="actual" value="<?php echo $actual ?>">
                            <input type="hidden" id="sede" name="sede" value="<?php echo $sedeSelecc ?>">
                            <input type="hidden" id="odonto" name="odonto" value="<?php echo $odontoSelecc ?>">

                        </form>
                    </div>
                </div>
            </div>

        </div>



    </div>

    <!--   Core JS Files   -->
    <script src="./assets/js/core/jquery.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="./assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
</body>

</html>