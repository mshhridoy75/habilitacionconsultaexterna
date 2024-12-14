<?php
$fecha_registro = date('y-m-d');
$nombre_completo = $_POST['nombre_completo'];
$numero_id = $_POST['numero_id'];
$fecha_nacimiento = strtotime($_POST["fecha_nacimiento"]);
$fecha_nacimiento = date('y-m-d', $fecha_nacimiento);
$edad = $_POST['edad'];
$estado_civil = $_POST['estado_civil'];
$direccion_paciente = $_POST['direccion_paciente'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$lugar_residencia = $_POST['lugar_residencia'];
$ocupacion = $_POST['ocupacion'];
$tipo_vinculacion = $_POST['tipo_vinculacion'];
$acompanante = $_POST['acompanante'];
$telefono_acompanante = $_POST['telefono_acompanante'];
$responsable = $_POST['responsable'];
$parentesco_responsable = $_POST['parentesco_responsable'];
$telefono_responsable = $_POST['telefono_responsable'];


$motivo = $_POST['motivo'];
$cardiaca = $_POST['cardiaca'];
$tension = $_POST['tension'];
$diabetes = $_POST['diabetes'];
$coagulacion = $_POST['coagulacion'];
$sinusitis = $_POST['sinusitis'];
$problemas_respiratorios = $_POST['problemas_respiratorios'];
$renal = $_POST['renal'];
$hepatica = $_POST['hepatica'];
$gastritis = $_POST['gastritis'];
$hepatitis = $_POST['hepatitis'];
$sida = $_POST['sida'];
$cancer = $_POST['cancer'];
$convulsiones = $_POST['convulsiones'];
$cirugias = $_POST['cirugias'];
$cual_cirugia = $_POST['cual_cirugia'];
$medicamentos = $_POST['medicamentos'];
$cual_medicamento = $_POST['cual_medicamento'];
$embarazo = $_POST['embarazo'];
$fam_cardiaca = $_POST['fam_cardiaca'];
$fam_tension = $_POST['fam_tension'];
$fam_diabetes = $_POST['fam_diabetes'];
$fam_cancer = $_POST['fam_cancer'];
$otros_observaciones = $_POST['otros_observaciones'];
$anestesia = $_POST['anestesia'];
$alergia = $_POST['alergia'];
$cual_alergia = $_POST['cual_alergia'];


$ultima_visita = $_POST['ultima_visita'];
$motivo_visita = $_POST['motivo_visita'];
$temperatura = $_POST['temperatura'];
$pulso = $_POST['pulso'];
$tension_p = $_POST['tension_p'];
$respiracion = $_POST['respiracion'];
$higiene_oral = $_POST['higiene_oral'];
$seda = $_POST['seda'];
$cepillo = $_POST['cepillo'];
$enjuague = $_POST['enjuague'];
$enhebradores = $_POST['enhebradores'];
$frecuencia = $_POST['frecuencia'];


$atm = $_POST['atm'];
$labios = $_POST['labios'];
$lengua = $_POST['lengua'];
$paladar = $_POST['paladar'];
$piso_boca = $_POST['piso_boca'];
$maxilares = $_POST['maxilares'];
$glandulas = $_POST['glandulas'];
$senos_maxilares = $_POST['senos_maxilares'];
$supernumerario = $_POST['supernumerario'];
$abrasion = $_POST['abrasion'];
$manchas_pigmentacion = $_POST['manchas_pigmentacion'];
$abceso = $_POST['abceso'];
$maloclusion = $_POST['maloclusion'];
$incluidos = $_POST['incluidos'];
$traumas = $_POST['traumas'];
$habitos = $_POST['habitos'];
$masticadores = $_POST['masticadores'];
$ganglios = $_POST['ganglios'];
$oclusion = $_POST['oclusion'];
$frenillos = $_POST['frenillos'];
$mucosas = $_POST['mucosas'];
$encias = $_POST['encias'];
$amigdalas = $_POST['amigdalas'];
$otros_oral = $_POST['otros_oral'];
$bolsas_movilidad = $_POST['bolsas_movilidad'];
$placa_blanda = $_POST['placa_blanda'];
$calculos = $_POST['calculos'];
$hemorragia_gingival = $_POST['hemorragia_gingival'];
$inflamacion_gingival = $_POST['inflamacion_gingival'];
$periodontitis = $_POST['periodontitis'];
$retracciones = $_POST['retracciones'];
$hiperplasias = $_POST['hiperplasias'];
$descripcion_rehabilitacion = $_POST['descripcion_rehabilitacion'];
$observaciones = $_POST['observaciones'];
$fecha_placa = strtotime($_POST['fecha_placa']);
$fecha_placa = date('y-m-d', $fecha_placa);

$diente_1 = $_POST['diente_1'];
$diente_2 = $_POST['diente_2'];
$diente_3 = $_POST['diente_3'];
$diente_4 = $_POST['diente_4'];
$diente_5 = $_POST['diente_5'];
$diente_6 = $_POST['diente_6'];
$diente_7 = $_POST['diente_7'];
$diente_8 = $_POST['diente_8'];
$diente_9 = $_POST['diente_9'];
$diente_10 = $_POST['diente_10'];
$diente_11 = $_POST['diente_11'];
$diente_12 = $_POST['diente_12'];
$diente_13 = $_POST['diente_13'];
$diente_14 = $_POST['diente_14'];
$diente_15 = $_POST['diente_15'];
$diente_16 = $_POST['diente_16'];
$diente_17 = $_POST['diente_17'];
$diente_18 = $_POST['diente_18'];
$diente_19 = $_POST['diente_19'];
$diente_20 = $_POST['diente_20'];
$diente_21 = $_POST['diente_21'];
$diente_22 = $_POST['diente_22'];
$diente_23 = $_POST['diente_23'];
$diente_24 = $_POST['diente_24'];
$diente_25 = $_POST['diente_25'];
$diente_26 = $_POST['diente_26'];
$diente_27 = $_POST['diente_27'];
$diente_28 = $_POST['diente_28'];
$diente_29 = $_POST['diente_29'];
$diente_30 = $_POST['diente_30'];
$diente_31 = $_POST['diente_31'];
$diente_32 = $_POST['diente_32'];

$diente_1_evo = $_POST['diente_1_evo'];
$diente_2_evo = $_POST['diente_2_evo'];
$diente_3_evo = $_POST['diente_3_evo'];
$diente_4_evo = $_POST['diente_4_evo'];
$diente_5_evo = $_POST['diente_5_evo'];
$diente_6_evo = $_POST['diente_6_evo'];
$diente_7_evo = $_POST['diente_7_evo'];
$diente_8_evo = $_POST['diente_8_evo'];
$diente_9_evo = $_POST['diente_9_evo'];
$diente_10_evo = $_POST['diente_10_evo'];
$diente_11_evo = $_POST['diente_11_evo'];
$diente_12_evo = $_POST['diente_12_evo'];
$diente_13_evo = $_POST['diente_13_evo'];
$diente_14_evo = $_POST['diente_14_evo'];
$diente_15_evo = $_POST['diente_15_evo'];
$diente_16_evo = $_POST['diente_16_evo'];
$diente_17_evo = $_POST['diente_17_evo'];
$diente_18_evo = $_POST['diente_18_evo'];
$diente_19_evo = $_POST['diente_19_evo'];
$diente_20_evo = $_POST['diente_20_evo'];
$diente_21_evo = $_POST['diente_21_evo'];
$diente_22_evo = $_POST['diente_22_evo'];
$diente_23_evo = $_POST['diente_23_evo'];
$diente_24_evo = $_POST['diente_24_evo'];
$diente_25_evo = $_POST['diente_25_evo'];
$diente_26_evo = $_POST['diente_26_evo'];
$diente_27_evo = $_POST['diente_27_evo'];
$diente_28_evo = $_POST['diente_28_evo'];
$diente_29_evo = $_POST['diente_29_evo'];
$diente_30_evo = $_POST['diente_30_evo'];
$diente_31_evo = $_POST['diente_31_evo'];
$diente_32_evo = $_POST['diente_32_evo'];

$radiografias = $_POST['radiografias'];
$cual_radiografia = $_POST['cual_radiografia'];
$interpretacion = $_POST['interpretacion'];
$diagnostico = $_POST['diagnostico'];
$pronostico = $_POST['pronostico'];

$fecha_antecedentes = strtotime($_POST['fecha_antecedentes']);
$fecha_antecedentes = date('y-m-d', $fecha_antecedentes);
$paciente = $_POST['paciente'];
$cedula = $_POST['cedula'];
$doctor = $_POST['doctor'];
$cedula_doctor = $_POST['cedula_doctor'];
$responsable = $_POST['responsable'];
$cedula_res = $_POST['cedula_res'];
$procedimiento = $_POST['procedimiento'];
$riesgos = $_POST['riesgos'];
$firma_paciente = $_POST['firma_paciente'];
$firma_dr = $_POST['firma_dr'];


$sede = $_POST['sede'];
$sedeId = $_POST['sedeId'];
$actual = $_POST['actual'];
session_start();
$_SESSION['actual'] = $actual;

include 'conexion.php';

$conn = OpenCon();

//Insert datos identificacion
$consultasident = "INSERT INTO `hc_datos_identificacion`(`id_Usuario`, `id_Sede`, `id_Estandar`, `fecha_registro`, `nombres_apellidos`, `numero_identificacion`, `fecha_nacimiento`, `edad`, `estado_civil`, `direccion`, `telefono`, `celular`, `lugar_residencia`, `ocupacion`, `eps_vinculacion`, `acompanante`, `num_acompanante`, `responsable`, `parentesco`, `num_responsable`)
VALUES ('$actual', '$sedeId', 6, '$fecha_registro', '$nombre_completo', '$numero_id', '$fecha_nacimiento', '$edad', '$estado_civil', '$direccion_paciente', '$telefono', '$celular', '$lugar_residencia', '$ocupacion', '$tipo_vinculacion', '$acompanante', '$telefono_acompanante', '$responsable', '$parentesco_responsable', $telefono_responsable)";
$envdatos = mysqli_query($conn, $consultasident);

if ($envdatos) {

    //obtencion id datos identificacion
    $consultaidident = "SELECT id FROM hc_datos_identificacion 
    WHERE id_Usuario = '$actual' AND id_Sede = '$sedeId' AND numero_identificacion = '$numero_id'";
    $envidident = mysqli_query($conn, $consultaidident);
    $row = $envidident->fetch_assoc();
    $iddatos = $row['id'];


    //insert datos anamnesis
    $anamnesis = "INSERT INTO `hc_anamnesis`(`id_Usuario`, `id_Sede`, `id_Estandar`, `id_Persona`, `motivo`, `cardiaca`, `tension`, `diabetes`, `coagulacion`, `sinusitis`, `problemas_respiratorios`, `renal`, `hepatica`, `gastritis`, `hepatitis`, `sida`, `cancer`, `convulsiones`, `cirugias`, `cual_cirugia`, `medicamentos`, `cual_medicamento`, `embarazo`, `fam_cardiaca`, `fam_tension`, `fam_diabetes`, `fam_cancer`, `otros`, `anestesia`, `alergia`, `cual_alergia`)
    VALUES ('$actual', '$sedeId', 6, '$numero_id', '$motivo', '$cardiaca', '$tension', '$diabetes', '$coagulacion', '$sinusitis', '$problemas_respiratorios', '$renal', '$hepatica', '$gastritis', '$hepatitis', '$sida', '$cancer', '$convulsiones', '$cirugias', '$cual_cirugia', '$medicamentos', '$cual_medicamento', '$embarazo', '$fam_cardiaca', '$fam_tension', '$fam_diabetes', '$fam_cancer', '$otros_observaciones', '$anestesia', '$alergia', '$cual_alergia')";
    $envanamnesis = mysqli_query($conn, $anamnesis);

    if ($envanamnesis) {

        //obtencion id anamnesis
        $consultaidanamnesis = "SELECT id FROM hc_anamnesis 
        WHERE id_Usuario = '$actual' AND id_Sede = $sedeId AND id_Estandar = 6 AND motivo = '$motivo' AND cardiaca = '$cardiaca' AND tension='$tension' AND diabetes='$diabetes' AND coagulacion='$coagulacion' AND sinusitis='$sinusitis' AND problemas_respiratorios='$problemas_respiratorios' AND renal='$renal' AND hepatica='$hepatica' AND gastritis='$gastritis' AND hepatitis='$hepatitis' AND sida='$sida' AND cancer='$cancer' AND convulsiones='$convulsiones' AND cirugias='$cirugias' AND cual_cirugia='$cual_cirugia' AND medicamentos='$medicamentos' AND cual_medicamento='$cual_medicamento' AND embarazo='$embarazo' AND fam_cardiaca='$fam_cardiaca' AND fam_tension='$fam_tension' AND fam_diabetes='$fam_diabetes' AND fam_cancer='$fam_cancer' AND otros='$otros_observaciones' AND anestesia='$anestesia' AND alergia='$alergia' AND cual_alergia='$cual_alergia'";
        $envidanamnesis = mysqli_query($conn, $consultaidanamnesis);
        $row = $envidanamnesis->fetch_assoc();
        $idanamnesis = $row['id'];

        //insert datos examen fisico
        $consultaexfisic = "INSERT INTO `hc_examen_fisico`(`id_Usuario`, `id_Sede`, `id_Estandar`, `id_Persona`, `ultima_visita`, `motivo`, `temperatura`, `pulso`, `tension_p`, `respiracion`, `higiene_oral`, `seda`, `cepillo`, `enjuague`, `frecuencia`, `enhebradores`) 
        VALUES ('$actual', '$sedeId', 6, '$numero_id', '$ultima_visita', '$motivo_visita', '$temperatura', '$pulso', '$tension_p', '$respiracion', '$higiene_oral', '$seda', '$cepillo', '$enjuague', '$frecuencia', '$enhebradores')";
        $envexafisic = mysqli_query($conn, $consultaexfisic);

        if ($envexafisic) {

            //obtencion id examen fisico
            $consultaidexafisic = "SELECT id FROM hc_examen_fisico 
            WHERE `id_Usuario`='$actual' AND `id_Sede`=$sedeId AND`id_Estandar`=6 AND `ultima_visita`='$ultima_visita' AND `motivo`='$motivo_visita' AND `temperatura`=$temperatura AND `pulso`=$pulso AND `tension_p`='$tension_p' AND `respiracion`='$respiracion' AND `higiene_oral`='$higiene_oral' AND `seda`='$seda' AND `cepillo`='$cepillo' AND `enjuague`='$enjuague' AND `frecuencia`='$frecuencia' AND `enhebradores`='$enhebradores'";
            $envidexafisic = mysqli_query($conn, $consultaidexafisic);
            $row = $envidexafisic->fetch_assoc();
            $idexamenfisico = $row['id'];

            //insert examen oral
            $consultaexaoral = "INSERT INTO `hc_examen_oral`(`id_Usuario`, `id_Sede`, `id_Estandar`, `id_Persona`, `atm`, `labios`, `lengua`, `paladar`, `piso_boca`, `maxilares`, `glandulas`, `senos_maxilares`, `supernumerario`, `abrasion`, `manchas_pigmentacion`, `abceso`, `maloclusion`, `incluidos`, `traumas`, `habitos`, `masticadores`, `ganglios`, `oclusion`, `frenillos`, `mucosas`, `encias`, `amigdalas`, `otros_oral`, `bolsas_movilidad`, `placa_blanda`, `calculos`, `hemorragia_gingival`, `inflamacion_gingival`, `periodontitis`, `retracciones`, `hiperplasias`, `descripcion_rehabilitacion`, `observaciones`, `fecha_placa`)
            VALUES ('$actual', '$sedeId', 6, '$numero_id', '$atm', '$labios', '$lengua', '$paladar', '$piso_boca', '$maxilares', '$glandulas', '$senos_maxilares', '$supernumerario', '$abrasion', '$manchas_pigmentacion', '$abceso', '$maloclusion', '$incluidos', '$traumas', '$habitos', '$masticadores', '$ganglios', '$oclusion', '$frenillos', '$mucosas', '$encias', '$amigdalas', '$otros_oral', '$bolsas_movilidad', '$placa_blanda', '$calculos', '$hemorragia_gingival', '$inflamacion_gingival', '$periodontitis', '$retracciones', '$hiperplasias', '$descripcion_rehabilitacion', '$observaciones', '$fecha_placa')";
            $envexaoral = mysqli_query($conn, $consultaexaoral);

            if ($envexaoral) {

                //obtencion id examen oral
                $consultaidexaoral = "SELECT id FROM hc_examen_oral 
                WHERE id_Usuario = '$actual' AND id_Sede = $sedeId  AND id_Estandar = 6 AND atm = '$atm' AND labios = '$labios' AND lengua = '$lengua' AND paladar = '$paladar' AND piso_boca = '$piso_boca' AND maxilares = '$maxilares' AND glandulas = '$glandulas' AND senos_maxilares = '$senos_maxilares' AND supernumerario = '$supernumerario' AND abrasion = '$abrasion' AND manchas_pigmentacion = '$manchas_pigmentacion' AND abceso = '$abceso' AND maloclusion = '$maloclusion' AND incluidos = '$incluidos' AND traumas = '$traumas' AND habitos = '$habitos' AND masticadores = '$masticadores' AND ganglios = '$ganglios' AND oclusion = '$oclusion' AND frenillos = '$frenillos' AND mucosas = '$mucosas' AND encias = '$encias' AND amigdalas = '$amigdalas' AND otros_oral = '$otros_oral' AND bolsas_movilidad = '$bolsas_movilidad' AND placa_blanda = '$placa_blanda' AND calculos = '$calculos' AND hemorragia_gingival = '$hemorragia_gingival' AND inflamacion_gingival = '$inflamacion_gingival' AND periodontitis = '$periodontitis' AND retracciones = '$retracciones' AND hiperplasias = '$hiperplasias' AND descripcion_rehabilitacion = '$descripcion_rehabilitacion' AND observaciones = '$observaciones' AND fecha_placa = '$fecha_placa'";
                $envidexaoral = mysqli_query($conn, $consultaidexaoral);
                $row = $envidexaoral->fetch_assoc();
                $idexamenoral = $row['id'];

                //insert odontograma inicial

                $consodontoinicial = "INSERT INTO `hc_odontograma_inicial`(`id_Usuario`, `id_Sede`, `id_Estandar`, `id_Persona`, `diente_1`, `diente_2`, `diente_3`, `diente_4`, `diente_5`, `diente_6`, `diente_7`, `diente_8`, `diente_9`, `diente_10`, `diente_11`, `diente_12`, `diente_13`, `diente_14`, `diente_15`, `diente_16`, `diente_17`, `diente_18`, `diente_19`, `diente_20`, `diente_21`, `diente_22`, `diente_23`, `diente_24`, `diente_25`, `diente_26`, `diente_27`, `diente_28`, `diente_29`, `diente_30`, `diente_31`, `diente_32`)
                VALUES ( '$actual', '$sedeId', 6, '$numero_id', '$diente_1', '$diente_2', '$diente_3', '$diente_4', '$diente_5', '$diente_6', '$diente_7', '$diente_8', '$diente_9', '$diente_10', '$diente_11', '$diente_12', '$diente_13', '$diente_14', '$diente_15', '$diente_16', '$diente_17', '$diente_18', '$diente_19', '$diente_20', '$diente_21', '$diente_22', '$diente_23', '$diente_24', '$diente_25', '$diente_26', '$diente_27', '$diente_28', '$diente_29', '$diente_30', '$diente_31', '$diente_32')";
                $envodontoinicial = mysqli_query($conn, $consodontoinicial);

                if ($envodontoinicial) {


                    // obtencion id odontograma inicial
                    $considinicial = "SELECT id FROM hc_odontograma_inicial 
                    WHERE  id_Usuario = '$actual' AND id_Sede = $sedeId AND id_Estandar = 6 AND  diente_1 = '$diente_1' AND  diente_2 = '$diente_2' AND  diente_3 = '$diente_3' AND diente_4  = '$diente_4' AND  diente_5 = '$diente_5' AND  diente_6 = '$diente_6' AND  diente_7 = '$diente_7' AND  diente_8 = '$diente_8' AND  diente_9 = '$diente_9' AND diente_10  = '$diente_10' AND diente_11 = '$diente_11' AND diente_12 = '$diente_12' AND  diente_13 = '$diente_13' AND  diente_14 = '$diente_14' AND diente_15 = '$diente_15' AND  diente_16 = '$diente_16' AND  diente_17 = '$diente_17' AND  diente_18 = '$diente_18' AND  diente_19 = '$diente_19' AND  diente_20 = '$diente_20' AND diente_21  = '$diente_21' AND diente_22  = '$diente_22' AND  diente_23 = '$diente_23' AND  diente_24 = '$diente_24' AND diente_25  = '$diente_25' AND  diente_26 = '$diente_26' AND diente_27  = '$diente_27' AND  diente_28 = '$diente_28' AND diente_29  = '$diente_29' AND  diente_30 = '$diente_30' AND diente_31  = '$diente_31' AND  diente_32 = '$diente_32'";
                    $envidinicial = mysqli_query($conn, $considinicial);
                    $row = $envidinicial->fetch_assoc();
                    $idinicial = $row['id'];

                    // insert odontograma evolucion
                    $consodontoevolucion = "INSERT INTO `hc_odontograma_evolucion`(`id_Usuario`, `id_Sede`, `id_Estandar`, `id_Persona`, `diente_1_e`, `diente_2_e`, `diente_3_e`, `diente_4_e`, `diente_5_e`, `diente_6_e`, `diente_7_e`, `diente_8_e`, `diente_9_e`, `diente_10_e`, `diente_11_e`, `diente_12_e`, `diente_13_e`, `diente_14_e`, `diente_15_e`, `diente_16_e`, `diente_17_e`, `diente_18_e`, `diente_19_e`, `diente_20_e`, `diente_21_e`, `diente_22_e`, `diente_23_e`, `diente_24_e`, `diente_25_e`, `diente_26_e`, `diente_27_e`, `diente_28_e`, `diente_29_e`, `diente_30_e`, `diente_31_e`, `diente_32_e`)
                    VALUES ( '$actual', '$sedeId', 6, '$numero_id', '$diente_1_evo', '$diente_2_evo', '$diente_3_evo', '$diente_4_evo', '$diente_5_evo', '$diente_6_evo', '$diente_7_evo', '$diente_8_evo', '$diente_9_evo', '$diente_10_evo', '$diente_11_evo', '$diente_12_evo', '$diente_13_evo', '$diente_14_evo', '$diente_15_evo', '$diente_16_evo', '$diente_17_evo', '$diente_18_evo', '$diente_19_evo', '$diente_20_evo', '$diente_21_evo', '$diente_22_evo', '$diente_23_evo', '$diente_24_evo', '$diente_25_evo', '$diente_26_evo', '$diente_27_evo', '$diente_28_evo', '$diente_29_evo', '$diente_30_evo', '$diente_31_evo', '$diente_32_evo')";
                    $envodontoevolucion = mysqli_query($conn, $consodontoevolucion);



                    if ($envodontoevolucion) {

                        //Obtencion id odontograma evolucion
                        $considevo = "SELECT id FROM hc_odontograma_evolucion
                        WHERE  id_Usuario = '$actual' AND id_Sede = $sedeId AND id_Estandar = 6 AND  diente_1_e = '$diente_1_evo' AND  diente_2_e = '$diente_2_evo' AND  diente_3_e = '$diente_3_evo' AND diente_4_e  = '$diente_4_evo' AND  diente_5_e = '$diente_5_evo' AND  diente_6_e = '$diente_6_evo' AND  diente_7_e = '$diente_7_evo' AND  diente_8_e = '$diente_8_evo' AND  diente_9_e = '$diente_9_evo' AND diente_10_e  = '$diente_10_evo' AND diente_11_e = '$diente_11_evo' AND diente_12_e = '$diente_12_evo' AND  diente_13_e = '$diente_13_evo' AND  diente_14_e = '$diente_14_evo' AND diente_15_e = '$diente_15_evo' AND  diente_16_e = '$diente_16_evo' AND  diente_17_e = '$diente_17_evo' AND  diente_18_e = '$diente_18_evo' AND  diente_19_e = '$diente_19_evo' AND  diente_20_e = '$diente_20_evo' AND diente_21_e  = '$diente_21_evo' AND diente_22_e  = '$diente_22_evo' AND  diente_23_e = '$diente_23_evo' AND  diente_24_e = '$diente_24_evo' AND diente_25_e  = '$diente_25_evo' AND  diente_26_e = '$diente_26_evo' AND diente_27_e  = '$diente_27_evo' AND  diente_28_e = '$diente_28_evo' AND diente_29_e  = '$diente_29_evo' AND  diente_30_e = '$diente_30_evo' AND diente_31_e  = '$diente_31_evo' AND  diente_32_e = '$diente_32_evo'";
                        $envidevolucion = mysqli_query($conn, $considevo);
                        $row = $envidevolucion->fetch_assoc();
                        $idevolucion = $row['id'];

                        // Insert pronostico
                        $consultadiagpron = "INSERT INTO `hc_diag_pron`(`id_Usuario`, `id_Sede`, `id_Estandar`, `radiografias`, `cuales_radiografias`, `interpretacion`, `diagnostico`, `pronostico`) 
                        VALUES ( '$actual', '$sedeId', 6, '$radiografias', '$cual_radiografia', '$interpretacion', '$diagnostico', '$pronostico')";
                        $envioconsdiag = mysqli_query($conn, $consultadiagpron);


                        if ($envioconsdiag) {

                            //Obtencion id pronostico
                            $considconsem = "SELECT id FROM hc_diag_pron
                            WHERE  id_Usuario = '$actual' AND id_Sede = $sedeId AND id_Estandar = 6 AND radiografias='$radiografias' AND cuales_radiografias='$cual_radiografia' AND interpretacion= '$interpretacion' AND diagnostico='$diagnostico' AND  pronostico='$pronostico'";
                            $envioconsid = mysqli_query($conn, $considconsem);
                            $row = $envioconsid->fetch_assoc();
                            $id_diag = $row['id'];

                            //Insert consentimiento informado
                            $consultaconsen = "INSERT INTO `hc_consentimiento`(`id_Usuario`, `id_Sede`, `id_Estandar`, `fecha_antecedentes`, `nombre_paciente`, `id_paciente`, `nombre_dr`, `id_dr`, `nombre_responsable`, `id_responsable`, `procedimiento`, `riesgos`, `firma_paciente`, `firma_odontologo`) 
                            VALUES ( '$actual', '$sedeId', 6, '$fecha_antecedentes', '$paciente', '$cedula', '$doctor', '$cedula_doctor', '$responsable', '$cedula_res', '$procedimiento', '$riesgos', '$firma_paciente', '$firma_dr')";
                            $envconsentimiento = mysqli_query($conn, $consultaconsen);


                            if ($envconsentimiento) {

                                //Obtencion id consentimiento
                                $considconsem = "SELECT id FROM hc_consentimiento
                                WHERE  id_Usuario = '$actual' AND id_Sede = $sedeId AND id_Estandar = 6 AND fecha_antecedentes='$fecha_antecedentes' AND nombre_paciente='$paciente' AND id_paciente= '$cedula' AND nombre_dr='$doctor' AND  id_dr='$cedula_doctor' AND nombre_responsable='$responsable' AND id_responsable='$cedula_res' AND procedimiento='$procedimiento' AND riesgos='$riesgos' AND firma_paciente='$firma_paciente' AND firma_odontologo='$firma_dr'";
                                $envioconsid = mysqli_query($conn, $considconsem);
                                $row = $envioconsid->fetch_assoc();
                                $id_consentimiento = $row['id'];


                                // insert historia clinica
                                $consultahc = "INSERT INTO `hc_historia_clinica`(`id_Usuario`, `id_Sede`, `id_Estandar`, `id_Persona`, `datos_identificacion`, `anamnesis`, `examen_fisico`, `examen_oral`, `odontograma_inicial`, `odontograma_evolucion`, `id_diagnostico`, `consentimiento` )
                                VALUES ( '$actual', '$sedeId', 6, '$numero_id', '$iddatos', '$idanamnesis', '$idexamenfisico', '$idexamenoral', '$idinicial', '$idevolucion', '$id_diag', '$id_consentimiento')";
                                $envhc = mysqli_query($conn, $consultahc);

                                if ($envhc) {
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
                                                <h5>Se registró la historia clinica</h1>
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
                                //echo 'pronostico diagnostico';
                            }
                            //echo 'Consentimiento';
                        }
                        //echo 'hc';
                    }
                    //echo 'evolucion ';
                }
                // echo 'inicial ';
            }
            //echo 'oral ';
        }
        // echo 'fisico ';
    }
    // echo 'anamnesis ';
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
                <h5>No se registró la historia clinica</h1>
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