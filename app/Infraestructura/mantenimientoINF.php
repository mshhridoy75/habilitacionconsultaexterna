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

include '../db/conexion.php';

//$conn = OpenCon();


$actual = $_GET['actual'];
$sedeSelecc = $_GET['sede'];

$sql = "SELECT id FROM sede WHERE nombre='$sedeSelecc'";
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    $sedeId = $row['id'];
}

if ($actual != 'admin') {
    $consulta = "SELECT acabados, techos, paredes, puertas, pisos, barandas, marcos, cubiertas, ventanas, herrajes, instalaciones, iluminacion, agua_Potable, aguas_Negras, baños_Discapacitados, rampas, instalaciones_Hidro, desechos, otros, observaciones
FROM inf_mantenimiento WHERE id_Usuario='$actual' and id_Sede='$sedeId' and id_Estandar=2";

    $envio = mysqli_query($conn, $consulta);

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
        <link href="../css/bootstrap.min.css" rel="stylesheet" />
        <link href="../css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
        <link href="../css/index.css" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../demo/demo.css" rel="stylesheet" />
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
                        <img src="../img/logofinal.jpg">
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
                            <a href="../Talento Humano/seleccTH.php?sedeSel=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">
                                <p>Talento Humano</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Infraestructura/seleccINF.php?sedeSel=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Infraestructura</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Dotacion/seleccDOT.php?sedeSel=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Dotacion</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Medicamentos/seleccMED.php?sedeSel=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Medicamentos y Dispositivos</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Procesos Prioritarios/seleccPP.php?sedeSel=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Procesos Prioritarios</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Historia Clinica/seleccHC.php?sedeSel=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Historia Clinica</p>
                            </a>
                        </li>
                        <li>
                            <a href="../../moduloPreguntas.php?sedeSel=<?php echo $sedeSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Modulo de preguntas</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel" style="height: 190%;">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <a class="navbar-brand">Sede: <?php echo $sedeSelecc ?></a>
                            <a class="navbar-brand">Usuario: <?php echo $actual ?></a>

                        </div>
                        <div class="col-md-16">
                            <a href="cuenta.php">Gestionar Cuenta</a>
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a href="../db/auth/sessiondie.php">Cerrar Sesion</a>
                            </a>
                        </div>
                    </div>


                </nav>
                <!-- End Navbar -->
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="description">Mantenimiento</h3>
                            <h5 class="description">Convenciones:</h5>
                            <h5 class="description" style="color: darkgreen;">1-Óptimo.</h5>
                            <h5 class="description" style="color: seagreen;">2-Muy Bueno.</h5>
                            <h5 class="description" style="color: coral;">3-Bueno.</h5>
                            <h5 class="description" style="color: red;">4-Regular.</h5>
                            <h5 class="description" style="color: purple;">5-No Aplica.</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="tinf1">
                                <table class="table table-bordered">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">Materiales acabados</th>
                                            <th scope="col">Pintura de techos</th>
                                            <th scope="col">Pinturas de paredes</th>
                                            <th scope="col">Pintura de puertas</th>
                                            <th scope="col">Pisos</th>
                                            <th scope="col">Barandas</th>
                                            <th scope="col">Marcos de puertas</th>
                                            <th scope="col">Cubiertas de techo estructura y pintura</th>
                                            <th scope="col">Ventanas</th>
                                            <th scope="col">Herrajes ventanas</th>
                                            <th scope="col">Instalaciones eléctricas, toma corrientes</th>
                                            <th scope="col">Iluminación</th>
                                            <th scope="col">Agua potable</th>
                                            <th scope="col">Aguas Negras</th>
                                            <th scope="col">Baño discapacitados</th>
                                            <th scope="col">Rampas</th>
                                            <th scope="col">Instalaciones Hidro sanitarias</th>
                                            <th scope="col">Desechos</th>
                                            <th scope="col">Otros</th>
                                            <th scope="col">Observaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        while ($row = $envio->fetch_assoc()) {
                                            $acabados = $row['acabados'];
                                            $techos = $row['techos'];
                                            $paredes = $row['paredes'];
                                            $puertas = $row['puertas'];
                                            $pisos = $row['pisos'];
                                            $barandas = $row['barandas'];
                                            $marcos = $row['marcos'];
                                            $cubiertas = $row['cubiertas'];
                                            $ventanas = $row['ventanas'];
                                            $herrajes = $row['herrajes'];
                                            $instal = $row['instalaciones'];
                                            $iluminacion = $row['iluminacion'];
                                            $potable = $row['agua_Potable'];
                                            $negras = $row['aguas_Negras'];
                                            $discapacitados = $row['baños_Discapacitados'];
                                            $rampas = $row['rampas'];
                                            $hidro = $row['instalaciones_Hidro'];
                                            $desechos = $row['desechos'];
                                            $otros = $row['otros'];
                                            $observaciones = $row['observaciones'];


                                        ?>
                                            <tr>
                                                <td><?php echo $acabados ?></td>
                                                <td><?php echo $techos ?></td>
                                                <td><?php echo $paredes ?></td>
                                                <td><?php echo $puertas ?></td>
                                                <td><?php echo $pisos ?></td>
                                                <td><?php echo $barandas ?></td>
                                                <td><?php echo $marcos ?></td>
                                                <td><?php echo $cubiertas ?></td>
                                                <td><?php echo $ventanas ?></td>
                                                <td><?php echo $herrajes ?></td>
                                                <td><?php echo $instal ?></td>
                                                <td><?php echo $iluminacion ?></td>
                                                <td><?php echo $potable ?></td>
                                                <td><?php echo $negras ?></td>
                                                <td><?php echo $discapacitados ?></td>
                                                <td><?php echo $rampas ?></td>
                                                <td><?php echo $hidro ?></td>
                                                <td><?php echo $desechos ?></td>
                                                <td><?php echo $otros ?></td>
                                                <td><?php echo $observaciones ?></td>



                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>

                            <h3 class="description">Nuevo plan</h3>
                            <h5 class="description">Convenciones:</h5>
                            <h5 class="description" style="color: darkgreen;">1-Óptimo.</h5>
                            <h5 class="description" style="color: seagreen;">2-Muy Bueno.</h5>
                            <h5 class="description" style="color: coral;">3-Bueno.</h5>
                            <h5 class="description" style="color: red;">4-Regular.</h5>
                            <h5 class="description" style="color: purple;">5-No Aplica.</h5>


                            <div class="tinf2">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Materiales acabados</th>
                                            <th scope="col">Pintura de techos</th>
                                            <th scope="col">Pinturas de paredes</th>
                                            <th scope="col">Pintura de puertas</th>
                                            <th scope="col">Pisos</th>
                                            <th scope="col">Barandas</th>
                                            <th scope="col">Marcos de puertas</th>
                                            <th scope="col">Cubiertas de techo estructura y pintura</th>
                                            <th scope="col">Ventanas</th>
                                            <th scope="col">Herrajes ventanas</th>
                                            <th scope="col">Instalaciones eléctricas, toma corrientes</th>
                                            <th scope="col">Iluminación</th>
                                            <th scope="col">Agua potable</th>
                                            <th scope="col">Aguas Negras</th>
                                            <th scope="col">Baño discapacitados</th>
                                            <th scope="col">Rampas</th>
                                            <th scope="col">Instalaciones Hidro sanitarias</th>
                                            <th scope="col">Desechos</th>
                                            <th scope="col">Otros</th>
                                            <th scope="col">Observaciones</th>
                                    </thead>
                                    <form method="POST" action="../db/nuevoManteINF.php">
                                        <tbody>
                                            <tr>
                                                <td><select class="custom-select" name="acabados" id="acabados">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>

                                                <td><select class="custom-select" name="techos" id="techos">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="paredes" id="paredes">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="puertas" id="puertas">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="pisos" id="pisos">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="barandas" id="barandas">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="marcos" id="marcos">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="cubiertas" id="cubiertas">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="ventanas" id="ventanas">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="herrajes" id="herrajes">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="instal" id="instal">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="iluminacion" id="iluminacion">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="potable" id="potable">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="negras" id="negras">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="discapacitados" id="discapacitados">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="rampas" id="rampas">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="hidro" id="hidro">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="desechos" id="desechos">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>
                                                <td><select class="custom-select" name="otros" id="otros">
                                                        <option value="1-Optimo" style="color: white; background-color: darkgreen;">1-Optimo</option>
                                                        <option value="2-Muy Bueno" style="color: white; background-color: seagreen;">2-Muy Bueno</option>
                                                        <option value="3-Bueno" style="color: white; background-color: coral;">3-Bueno</option>
                                                        <option value="4-Regular" style="color: white; background-color: red;">4-Regular</option>
                                                        <option value="5-No Aplica" style="color: white; background-color: purple;">5-No Aplica</option>
                                                    </select></td>

                                                <td><input type="text" class="form-control" name="observaciones" id="observaciones" placeholder="Observaciones">
                                                    <input type="hidden" id="sede" name="sede" value="<?php echo $sedeSelecc ?>">
                                                    <input type="hidden" id='actual' name="actual" value="<?php echo $actual ?>">
                                                    <input type="hidden" id='sedeId' name="sedeId" value="<?php echo $sedeId ?>">
                                                </td>
                                            </tr>

                                        </tbody>


                                </table>

                                <button type="submit" class="btn btn-success" href="">Guardar</button>
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


<?php } else {
    $odontoSelecc = $_GET['usuarioSel'];

    $consulta = "SELECT acabados, techos, paredes, puertas, pisos, barandas, marcos, cubiertas, ventanas, herrajes, instalaciones, iluminacion, agua_Potable, aguas_Negras, baños_Discapacitados, rampas, instalaciones_Hidro, desechos, otros, observaciones
    FROM inf_mantenimiento WHERE id_Usuario='$odontoSelecc' and id_Sede='$sedeId' and id_Estandar=2";

    $envio = mysqli_query($conn, $consulta);

?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="./assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            Gestion Administrador
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <!-- CSS Files -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" />
        <link href="../css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
        <link href="../css/index.css" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../demo/demo.css" rel="stylesheet" />
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
                        <img src="../img/logofinal.jpg">
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
                            <a href="../Talento Humano/seleccTH.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Talento Humano</p>

                            </a>
                        </li>
                        <li>
                            <a href="seleccINF.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Infraestructura</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Dotacion/seleccDOT.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Dotacion</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Medicamentos/seleccMED.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Medicamentos y Dispositivos</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Procesos Prioritarios/seleccPP.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Procesos Prioritarios</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Historia Clinica/seleccHC.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Historia Clinica</p>
                            </a>
                        </li>
                        <li>
                            <a href="../../moduloPreguntas.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Modulo de preguntas</p>
                            </a>
                        </li>
                        <li>
                            <a href="../../gestionUsuarios.php?sedeSel=<?php echo $sedeSelecc ?>&usuarioSel=<?php echo $odontoSelecc ?>&actual=<?php echo $actual ?>">
                                <i class=""></i>
                                <p>Gestion de Usuarios</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel" style="height: 100%;">
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
                                <a href="../db/auth/sessiondie.php">Cerrar Sesion</a>
                            </a>
                        </div>
                    </div>


                </nav>
                <!-- End Navbar -->
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="description">Mantenimiento</h3>
                            <h5 class="description">Convenciones:</h5>
                        </div>


                        <h5 class="description" style="color: darkgreen;"> 1-Óptimo.‎ </h5>
                        <h5 class="description" style="color: seagreen;">/2-Muy Bueno. </h5>
                        <h5 class="description" style="color: coral;">/3-Bueno. </h5>
                        <h5 class="description" style="color: red;">/4-Regular. </h5>
                        <h5 class="description" style="color: purple;">/5-No Aplica. </h5>

                        <div class="col-md-12">

                        </div>
                        <div class="col-md-12">
                            <div class="tadm">
                                <table class="table table-bordered">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">Materiales acabados</th>
                                            <th scope="col">Pintura de techos</th>
                                            <th scope="col">Pinturas de paredes</th>
                                            <th scope="col">Pintura de puertas</th>
                                            <th scope="col">Pisos</th>
                                            <th scope="col">Barandas</th>
                                            <th scope="col">Marcos de puertas</th>
                                            <th scope="col">Cubiertas de techo estructura y pintura</th>
                                            <th scope="col">Ventanas</th>
                                            <th scope="col">Herrajes ventanas</th>
                                            <th scope="col">Instalaciones eléctricas, toma corrientes</th>
                                            <th scope="col">Iluminación</th>
                                            <th scope="col">Agua potable</th>
                                            <th scope="col">Aguas Negras</th>
                                            <th scope="col">Baño discapacitados</th>
                                            <th scope="col">Rampas</th>
                                            <th scope="col">Instalaciones Hidro sanitarias</th>
                                            <th scope="col">Desechos</th>
                                            <th scope="col">Otros</th>
                                            <th scope="col">Observaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        while ($row = $envio->fetch_assoc()) {
                                            $acabados = $row['acabados'];
                                            $techos = $row['techos'];
                                            $paredes = $row['paredes'];
                                            $puertas = $row['puertas'];
                                            $pisos = $row['pisos'];
                                            $barandas = $row['barandas'];
                                            $marcos = $row['marcos'];
                                            $cubiertas = $row['cubiertas'];
                                            $ventanas = $row['ventanas'];
                                            $herrajes = $row['herrajes'];
                                            $instal = $row['instalaciones'];
                                            $iluminacion = $row['iluminacion'];
                                            $potable = $row['agua_Potable'];
                                            $negras = $row['aguas_Negras'];
                                            $discapacitados = $row['baños_Discapacitados'];
                                            $rampas = $row['rampas'];
                                            $hidro = $row['instalaciones_Hidro'];
                                            $desechos = $row['desechos'];
                                            $otros = $row['otros'];
                                            $observaciones = $row['observaciones'];


                                        ?>
                                            <tr>
                                                <td><?php echo $acabados ?></td>
                                                <td><?php echo $techos ?></td>
                                                <td><?php echo $paredes ?></td>
                                                <td><?php echo $puertas ?></td>
                                                <td><?php echo $pisos ?></td>
                                                <td><?php echo $barandas ?></td>
                                                <td><?php echo $marcos ?></td>
                                                <td><?php echo $cubiertas ?></td>
                                                <td><?php echo $ventanas ?></td>
                                                <td><?php echo $herrajes ?></td>
                                                <td><?php echo $instal ?></td>
                                                <td><?php echo $iluminacion ?></td>
                                                <td><?php echo $potable ?></td>
                                                <td><?php echo $negras ?></td>
                                                <td><?php echo $discapacitados ?></td>
                                                <td><?php echo $rampas ?></td>
                                                <td><?php echo $hidro ?></td>
                                                <td><?php echo $desechos ?></td>
                                                <td><?php echo $otros ?></td>
                                                <td><?php echo $observaciones ?></td>



                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
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


<?php

}

?>