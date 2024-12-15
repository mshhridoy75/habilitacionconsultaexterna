-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 12:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expertocalidad`
--

-- --------------------------------------------------------

--
-- Table structure for table `cronograma_mantenimiento`
--

CREATE TABLE `cronograma_mantenimiento` (
  `id` int(11) NOT NULL,
  `actividad` varchar(100) NOT NULL,
  `cuando` varchar(100) NOT NULL,
  `fecha_programado` date NOT NULL,
  `fecha_ejecutado` date NOT NULL,
  `documento_asociado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `ruta` varchar(255) DEFAULT NULL,
  `estandar` tinyint(1) DEFAULT 0,
  `usuario_origen` varchar(100) DEFAULT NULL,
  `usuario_Destino` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `nombre`, `descripcion`, `fecha_creacion`, `ruta`, `estandar`, `usuario_origen`, `usuario_Destino`) VALUES
(1, 'Offer Letter', 'Job offer letter for a new hire', NULL, 'C:/xampp/htdocs/uploads/docs/offer_letter.pdf\r\n', 0, '1', '2'),
(2, 'Visa Kit', 'Complete visa documentation', NULL, '/uploads/docs/visa_kit.pdf', 0, '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `dot_hdv_equipo`
--

CREATE TABLE `dot_hdv_equipo` (
  `id` int(11) NOT NULL,
  `fecha_adquisicion` date DEFAULT NULL,
  `origen` varchar(255) DEFAULT NULL,
  `proveedor` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `placa_inventario` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `serie` varchar(255) DEFAULT NULL,
  `clasi_riesgo` varchar(255) DEFAULT NULL,
  `registro_sanitario` varchar(255) DEFAULT NULL,
  `doc_invima` varchar(255) DEFAULT NULL,
  `manual_uso` varchar(255) DEFAULT NULL,
  `guias_rapidas` varchar(255) DEFAULT NULL,
  `id_Usuario` int(11) DEFAULT NULL,
  `id_Sede` int(11) DEFAULT NULL,
  `id_Estandar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dot_relacion_equipos`
--

CREATE TABLE `dot_relacion_equipos` (
  `id` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `id_Sede` int(11) NOT NULL,
  `id_Estandar` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `registro_sanitario` varchar(100) DEFAULT NULL,
  `clasi_riesgo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estandar`
--

CREATE TABLE `estandar` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inf_aprov`
--

CREATE TABLE `inf_aprov` (
  `id` int(11) NOT NULL,
  `bolsas_Batas` int(11) NOT NULL,
  `bolsas_Envolve` int(11) NOT NULL,
  `inertes` int(11) NOT NULL,
  `bolsas_Iner` int(11) NOT NULL,
  `ordinarios` int(11) NOT NULL,
  `bolsas_Ordi` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `id_Sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inf_eval_infra`
--

CREATE TABLE `inf_eval_infra` (
  `id` int(11) NOT NULL,
  `id_Usuario` int(11) DEFAULT NULL,
  `id_Sede` int(11) DEFAULT NULL,
  `id_Estandar` int(11) DEFAULT NULL,
  `materiales_Solidos` text DEFAULT NULL,
  `numero_Baños` int(11) DEFAULT NULL,
  `discapacitados` tinyint(1) DEFAULT NULL,
  `escalones` tinyint(1) DEFAULT NULL,
  `rampas` tinyint(1) DEFAULT NULL,
  `cuarto_Aseo` tinyint(1) DEFAULT NULL,
  `deposito` tinyint(1) DEFAULT NULL,
  `certificacion_RETIE` tinyint(1) DEFAULT NULL,
  `certificacion_ONAC` tinyint(1) DEFAULT NULL,
  `ambientes_Varios` text DEFAULT NULL,
  `certificaciones` text DEFAULT NULL,
  `incendios` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `inf_infeccioso`
--

CREATE TABLE `inf_infeccioso` (
  `id` int(11) NOT NULL,
  `biosanitario` int(11) NOT NULL,
  `bolsas_Biosan` int(11) NOT NULL,
  `anato` int(11) NOT NULL,
  `bolsas_Anato` int(11) NOT NULL,
  `cortopunzante` int(11) NOT NULL,
  `bolsas_Corto` int(11) NOT NULL,
  `animales` int(11) NOT NULL,
  `bolsas_Ani` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `id_Sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inf_mantenimiento`
--

CREATE TABLE `inf_mantenimiento` (
  `id` int(11) NOT NULL,
  `acabados` varchar(255) DEFAULT NULL,
  `techos` varchar(255) DEFAULT NULL,
  `paredes` varchar(255) DEFAULT NULL,
  `puertas` varchar(255) DEFAULT NULL,
  `pisos` varchar(255) DEFAULT NULL,
  `barandas` varchar(255) DEFAULT NULL,
  `marcos` varchar(255) DEFAULT NULL,
  `cubiertas` varchar(255) DEFAULT NULL,
  `ventanas` varchar(255) DEFAULT NULL,
  `herrajes` varchar(255) DEFAULT NULL,
  `instalaciones` varchar(255) DEFAULT NULL,
  `iluminacion` varchar(255) DEFAULT NULL,
  `agua_Potable` varchar(255) DEFAULT NULL,
  `aguas_Negras` varchar(255) DEFAULT NULL,
  `baños_Discapacitados` varchar(255) DEFAULT NULL,
  `rampas` varchar(255) DEFAULT NULL,
  `instalaciones_Hidro` varchar(255) DEFAULT NULL,
  `desechos` varchar(255) DEFAULT NULL,
  `otros` varchar(255) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `id_Usuario` int(11) NOT NULL,
  `id_Sede` int(11) NOT NULL,
  `id_Estandar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inf_no_aprov`
--

CREATE TABLE `inf_no_aprov` (
  `id` int(11) NOT NULL,
  `inertes` int(11) NOT NULL,
  `bolsas_Iner` int(11) NOT NULL,
  `ordinarios` int(11) NOT NULL,
  `bolsas_Ordi` int(11) NOT NULL,
  `biodegradables` int(11) NOT NULL,
  `bolsas_Bio` int(11) NOT NULL,
  `reciclables` int(11) NOT NULL,
  `bolsas_Reci` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `id_Sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inf_no_pelig`
--

CREATE TABLE `inf_no_pelig` (
  `id` int(11) NOT NULL,
  `biodegradables` int(11) NOT NULL,
  `bolsas_Bio` int(11) NOT NULL,
  `reciclables` int(11) NOT NULL,
  `bolsas_Reci` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `id_Sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inf_peligroso`
--

CREATE TABLE `inf_peligroso` (
  `id` int(11) NOT NULL,
  `infeccioso` int(11) NOT NULL,
  `quimico` int(11) NOT NULL,
  `radioactivo` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `id_Sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inf_quimico`
--

CREATE TABLE `inf_quimico` (
  `id` int(11) NOT NULL,
  `farmacos` int(11) NOT NULL,
  `bolsas_Farma` int(11) NOT NULL,
  `citotoxicos` int(11) NOT NULL,
  `bolsas_Cito` int(11) NOT NULL,
  `metales` int(11) NOT NULL,
  `bolsas_Metal` int(11) NOT NULL,
  `reactivos` int(11) NOT NULL,
  `bolsas_Reactivos` int(11) NOT NULL,
  `contenedores` int(11) NOT NULL,
  `bolsas_Conte` int(11) NOT NULL,
  `aceite` int(11) NOT NULL,
  `bolsas_Aceite` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `id_Sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inf_radioactivo`
--

CREATE TABLE `inf_radioactivo` (
  `id` int(11) NOT NULL,
  `fuentes_Abiertas` int(11) NOT NULL,
  `fuentes_Cerradas` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `id_Sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inf_residuo`
--

CREATE TABLE `inf_residuo` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `no_Aprovechable` int(11) NOT NULL,
  `no_Peligroso` int(11) NOT NULL,
  `aprovechable` int(11) NOT NULL,
  `responsable` varchar(255) NOT NULL,
  `empresa_Recolectora` varchar(255) NOT NULL,
  `frecuencia` varchar(255) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `id_Sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listado _medicamentos _dispositivos médicos`
--

CREATE TABLE `listado _medicamentos _dispositivos médicos` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `medicamento` varchar(45) NOT NULL,
  `dispositivo` varchar(45) NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `presentacion` varchar(100) NOT NULL,
  `registro_sanitario` int(50) NOT NULL,
  `concentracion` varchar(50) NOT NULL,
  `Numero_lote` varchar(50) NOT NULL,
  `serie` varchar(50) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `clasificacion_riesgo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `matriz documental`
--

CREATE TABLE `matriz documental` (
  `id` int(11) NOT NULL,
  `criterios` varchar(100) NOT NULL,
  `documentos` varchar(100) NOT NULL,
  `responsable revisión` varchar(100) NOT NULL,
  `fecha revisión` date NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `aprobado` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `med_temp_humedad`
--

CREATE TABLE `med_temp_humedad` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `jornada` varchar(50) NOT NULL,
  `temp_ambiente` decimal(5,2) NOT NULL,
  `humedad_relativa` decimal(5,2) NOT NULL,
  `cadena_frio` varchar(255) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `id_Sede` int(11) NOT NULL,
  `id_Estandar` int(11) NOT NULL,
  `sala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `med_temp_humedad`
--

INSERT INTO `med_temp_humedad` (`id`, `fecha`, `jornada`, `temp_ambiente`, `humedad_relativa`, `cadena_frio`, `id_Usuario`, `id_Sede`, `id_Estandar`, `sala`) VALUES
(1, '2024-12-14', 'Morning', 22.50, 55.00, 'Cold storage verified', 1, 1, 4, 'Sala A'),
(2, '2024-12-14', 'Afternoon', 24.00, 60.00, 'Cold storage interrupted', 1, 1, 4, 'Sala B');

-- --------------------------------------------------------

--
-- Table structure for table `plan_mantenimiento`
--

CREATE TABLE `plan_mantenimiento` (
  `id` int(11) NOT NULL,
  `parametros_chequear` varchar(100) NOT NULL,
  `bueno` varchar(45) NOT NULL,
  `regular` varchar(45) NOT NULL,
  `malo` varchar(45) NOT NULL,
  `NA` varchar(45) NOT NULL,
  `periiocidad` varchar(45) NOT NULL,
  `acción_correctiva` varchar(100) NOT NULL,
  `fecha_propuesta` date NOT NULL,
  `fecha_ejecución` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `id_Sede` int(11) NOT NULL,
  `usuario_origen` int(11) NOT NULL,
  `usuario_destino` int(11) DEFAULT NULL,
  `pregunta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `presupuesto_gestion_ambiental`
--

CREATE TABLE `presupuesto_gestion_ambiental` (
  `id` int(11) NOT NULL,
  `cantidad` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `valor_unitario` decimal(50,0) NOT NULL,
  `valor_total` decimal(50,0) NOT NULL,
  `observaciones` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `registro_capacitaciones`
--

CREATE TABLE `registro_capacitaciones` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `documento_identidad` varchar(50) NOT NULL,
  `firma` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `relación_equipos_biomedicos`
--

CREATE TABLE `relación_equipos_biomedicos` (
  `id` int(11) NOT NULL,
  `nombre_equipo` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `serie` varchar(50) NOT NULL,
  `registro_sanitario` varchar(50) NOT NULL,
  `clasificacion_riesgo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `respuesta`
--

CREATE TABLE `respuesta` (
  `id` int(11) NOT NULL,
  `id_Usuario` int(11) DEFAULT NULL,
  `id_Sede` int(11) DEFAULT NULL,
  `usuario_origen` int(11) DEFAULT NULL,
  `usuario_destino` int(11) DEFAULT NULL,
  `pregunta` text DEFAULT NULL,
  `respuesta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `sede`
--

CREATE TABLE `sede` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sede`
--

INSERT INTO `sede` (`id`, `nombre`, `direccion`, `telefono`, `ciudad`, `creado_en`) VALUES
(1, 'Sede Central', 'Av. Principal 123', '555-1234', 'Ciudad A', '2024-12-11 17:42:03'),
(2, 'Sede Norte', 'Calle 45 678', '555-5678', 'Ciudad B', '2024-12-11 17:42:03'),
(3, '', NULL, NULL, NULL, '2024-12-12 19:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `sede_odonto`
--

CREATE TABLE `sede_odonto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `horario_atencion` varchar(255) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sede_odonto`
--

INSERT INTO `sede_odonto` (`id`, `nombre`, `direccion`, `telefono`, `especialidad`, `horario_atencion`, `ciudad`, `creado_en`) VALUES
(1, 'Dr. Juan Perez', 'Calle Ficticia 123', '555-7890', 'Ortodoncia', 'Lunes a Viernes, 9:00 AM - 6:00 PM', 'Ciudad A', '2024-12-11 17:45:07'),
(2, 'Dr. Maria Gomez', 'Av. Principal 456', '555-1234', 'Cirugía Oral', 'Lunes a Viernes, 10:00 AM - 5:00 PM', 'Ciudad B', '2024-12-11 17:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `th_crono_cap`
--

CREATE TABLE `th_crono_cap` (
  `id` int(11) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `responsable` varchar(255) NOT NULL,
  `metodologia` text NOT NULL,
  `duracion` int(11) NOT NULL,
  `soporte_asistencia` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `id_estandar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `th_crono_cap`
--

INSERT INTO `th_crono_cap` (`id`, `tema`, `fecha`, `responsable`, `metodologia`, `duracion`, `soporte_asistencia`, `id_usuario`, `id_sede`, `id_estandar`) VALUES
(3, 'Introduction to First Aid', '2024-12-01', 'Dr. Smith', 'Lecture and Hands-On', 120, 'uploads/first_aid.pdf', 1, 1, 1),
(4, 'Emergency Procedures', '2024-12-05', 'Dr. Lee', 'Workshop', 90, 'uploads/emergency.pdf', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `th_eval`
--

CREATE TABLE `th_eval` (
  `id` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `id_Sede` int(11) NOT NULL,
  `id_Estandar` int(11) NOT NULL,
  `eval_score` int(11) DEFAULT NULL,
  `eval_date` date DEFAULT NULL,
  `eval_notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `rol` enum('administrador','odontologo','otro_rol') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `pass`, `nombre`, `rol`) VALUES
(1, 'admin', '$2y$10$sJGz6OqIQzJaCcMAe1CG7.tc1XJ1AWyDvDO3OqZ2nxGcTKl7HcM8O', '', 'administrador'),
(2, 'odontologo', '$2y$10$X4WQMovMKKr21Fetehcu2uvlIrxTASbSyoGqRedj9GEhV48wsTJMS', '', 'odontologo'),
(3, '', '$2y$10$zHMgNGd8NmLoh7jMFPgRU.kaKdpn8kOqGebGZwe05XHSfNIIm79PW', 'admin', 'odontologo');

-- --------------------------------------------------------

--
-- Table structure for table `verificacion_alertras`
--

CREATE TABLE `verificacion_alertras` (
  `id` int(11) NOT NULL,
  `fecha-consulta_alerta` date NOT NULL,
  `farmacovigilancia` varchar(30) NOT NULL,
  `tecnovigilancia` varchar(30) NOT NULL,
  `resultado_verificación` varchar(200) NOT NULL,
  `observaciones` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cronograma_mantenimiento`
--
ALTER TABLE `cronograma_mantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dot_hdv_equipo`
--
ALTER TABLE `dot_hdv_equipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Sede` (`id_Sede`),
  ADD KEY `id_Estandar` (`id_Estandar`);

--
-- Indexes for table `dot_relacion_equipos`
--
ALTER TABLE `dot_relacion_equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Sede` (`id_Sede`);

--
-- Indexes for table `estandar`
--
ALTER TABLE `estandar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inf_aprov`
--
ALTER TABLE `inf_aprov`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Sede` (`id_Sede`);

--
-- Indexes for table `inf_eval_infra`
--
ALTER TABLE `inf_eval_infra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Sede` (`id_Sede`),
  ADD KEY `id_Estandar` (`id_Estandar`);

--
-- Indexes for table `inf_infeccioso`
--
ALTER TABLE `inf_infeccioso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Sede` (`id_Sede`);

--
-- Indexes for table `inf_mantenimiento`
--
ALTER TABLE `inf_mantenimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Sede` (`id_Sede`),
  ADD KEY `fk_id_Estandar` (`id_Estandar`);

--
-- Indexes for table `inf_no_aprov`
--
ALTER TABLE `inf_no_aprov`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Sede` (`id_Sede`);

--
-- Indexes for table `inf_no_pelig`
--
ALTER TABLE `inf_no_pelig`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Sede` (`id_Sede`);

--
-- Indexes for table `inf_peligroso`
--
ALTER TABLE `inf_peligroso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infeccioso` (`infeccioso`),
  ADD KEY `quimico` (`quimico`),
  ADD KEY `radioactivo` (`radioactivo`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Sede` (`id_Sede`);

--
-- Indexes for table `inf_quimico`
--
ALTER TABLE `inf_quimico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Sede` (`id_Sede`);

--
-- Indexes for table `inf_radioactivo`
--
ALTER TABLE `inf_radioactivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Sede` (`id_Sede`);

--
-- Indexes for table `inf_residuo`
--
ALTER TABLE `inf_residuo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Sede` (`id_Sede`);

--
-- Indexes for table `listado _medicamentos _dispositivos médicos`
--
ALTER TABLE `listado _medicamentos _dispositivos médicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matriz documental`
--
ALTER TABLE `matriz documental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `med_temp_humedad`
--
ALTER TABLE `med_temp_humedad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Sede` (`id_Sede`);

--
-- Indexes for table `plan_mantenimiento`
--
ALTER TABLE `plan_mantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Sede` (`id_Sede`),
  ADD KEY `usuario_origen` (`usuario_origen`),
  ADD KEY `usuario_destino` (`usuario_destino`);

--
-- Indexes for table `presupuesto_gestion_ambiental`
--
ALTER TABLE `presupuesto_gestion_ambiental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registro_capacitaciones`
--
ALTER TABLE `registro_capacitaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relación_equipos_biomedicos`
--
ALTER TABLE `relación_equipos_biomedicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Sede` (`id_Sede`),
  ADD KEY `usuario_origen` (`usuario_origen`),
  ADD KEY `usuario_destino` (`usuario_destino`);

--
-- Indexes for table `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sede_odonto`
--
ALTER TABLE `sede_odonto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `th_crono_cap`
--
ALTER TABLE `th_crono_cap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_sede` (`id_sede`);

--
-- Indexes for table `th_eval`
--
ALTER TABLE `th_eval`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Sede` (`id_Sede`),
  ADD KEY `id_Estandar` (`id_Estandar`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `verificacion_alertras`
--
ALTER TABLE `verificacion_alertras`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cronograma_mantenimiento`
--
ALTER TABLE `cronograma_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dot_hdv_equipo`
--
ALTER TABLE `dot_hdv_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dot_relacion_equipos`
--
ALTER TABLE `dot_relacion_equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estandar`
--
ALTER TABLE `estandar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inf_aprov`
--
ALTER TABLE `inf_aprov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inf_eval_infra`
--
ALTER TABLE `inf_eval_infra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inf_infeccioso`
--
ALTER TABLE `inf_infeccioso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inf_mantenimiento`
--
ALTER TABLE `inf_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inf_no_aprov`
--
ALTER TABLE `inf_no_aprov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inf_no_pelig`
--
ALTER TABLE `inf_no_pelig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inf_peligroso`
--
ALTER TABLE `inf_peligroso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inf_quimico`
--
ALTER TABLE `inf_quimico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inf_radioactivo`
--
ALTER TABLE `inf_radioactivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inf_residuo`
--
ALTER TABLE `inf_residuo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listado _medicamentos _dispositivos médicos`
--
ALTER TABLE `listado _medicamentos _dispositivos médicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matriz documental`
--
ALTER TABLE `matriz documental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `med_temp_humedad`
--
ALTER TABLE `med_temp_humedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plan_mantenimiento`
--
ALTER TABLE `plan_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `presupuesto_gestion_ambiental`
--
ALTER TABLE `presupuesto_gestion_ambiental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registro_capacitaciones`
--
ALTER TABLE `registro_capacitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relación_equipos_biomedicos`
--
ALTER TABLE `relación_equipos_biomedicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sede`
--
ALTER TABLE `sede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sede_odonto`
--
ALTER TABLE `sede_odonto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `th_crono_cap`
--
ALTER TABLE `th_crono_cap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `th_eval`
--
ALTER TABLE `th_eval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verificacion_alertras`
--
ALTER TABLE `verificacion_alertras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dot_hdv_equipo`
--
ALTER TABLE `dot_hdv_equipo`
  ADD CONSTRAINT `dot_hdv_equipo_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dot_hdv_equipo_ibfk_2` FOREIGN KEY (`id_Sede`) REFERENCES `sede` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dot_hdv_equipo_ibfk_3` FOREIGN KEY (`id_Estandar`) REFERENCES `estandar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dot_relacion_equipos`
--
ALTER TABLE `dot_relacion_equipos`
  ADD CONSTRAINT `dot_relacion_equipos_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dot_relacion_equipos_ibfk_2` FOREIGN KEY (`id_Sede`) REFERENCES `sede` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inf_aprov`
--
ALTER TABLE `inf_aprov`
  ADD CONSTRAINT `inf_aprov_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inf_aprov_ibfk_2` FOREIGN KEY (`id_Sede`) REFERENCES `sede` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inf_eval_infra`
--
ALTER TABLE `inf_eval_infra`
  ADD CONSTRAINT `inf_eval_infra_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inf_eval_infra_ibfk_2` FOREIGN KEY (`id_Sede`) REFERENCES `sede` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inf_eval_infra_ibfk_3` FOREIGN KEY (`id_Estandar`) REFERENCES `estandar` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inf_infeccioso`
--
ALTER TABLE `inf_infeccioso`
  ADD CONSTRAINT `inf_infeccioso_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inf_infeccioso_ibfk_2` FOREIGN KEY (`id_Sede`) REFERENCES `sede` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inf_mantenimiento`
--
ALTER TABLE `inf_mantenimiento`
  ADD CONSTRAINT `fk_id_Estandar` FOREIGN KEY (`id_Estandar`) REFERENCES `estandar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inf_mantenimiento_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `inf_mantenimiento_ibfk_2` FOREIGN KEY (`id_Sede`) REFERENCES `sede` (`id`);

--
-- Constraints for table `inf_no_aprov`
--
ALTER TABLE `inf_no_aprov`
  ADD CONSTRAINT `inf_no_aprov_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inf_no_aprov_ibfk_2` FOREIGN KEY (`id_Sede`) REFERENCES `sede` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inf_no_pelig`
--
ALTER TABLE `inf_no_pelig`
  ADD CONSTRAINT `inf_no_pelig_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inf_no_pelig_ibfk_2` FOREIGN KEY (`id_Sede`) REFERENCES `sede` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inf_peligroso`
--
ALTER TABLE `inf_peligroso`
  ADD CONSTRAINT `inf_peligroso_ibfk_1` FOREIGN KEY (`infeccioso`) REFERENCES `inf_infeccioso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inf_peligroso_ibfk_2` FOREIGN KEY (`quimico`) REFERENCES `inf_quimico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inf_peligroso_ibfk_3` FOREIGN KEY (`radioactivo`) REFERENCES `inf_radioactivo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inf_peligroso_ibfk_4` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inf_peligroso_ibfk_5` FOREIGN KEY (`id_Sede`) REFERENCES `sede` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inf_quimico`
--
ALTER TABLE `inf_quimico`
  ADD CONSTRAINT `inf_quimico_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inf_quimico_ibfk_2` FOREIGN KEY (`id_Sede`) REFERENCES `sede` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inf_radioactivo`
--
ALTER TABLE `inf_radioactivo`
  ADD CONSTRAINT `inf_radioactivo_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inf_radioactivo_ibfk_2` FOREIGN KEY (`id_Sede`) REFERENCES `sede` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inf_residuo`
--
ALTER TABLE `inf_residuo`
  ADD CONSTRAINT `inf_residuo_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inf_residuo_ibfk_2` FOREIGN KEY (`id_Sede`) REFERENCES `sede` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `med_temp_humedad`
--
ALTER TABLE `med_temp_humedad`
  ADD CONSTRAINT `med_temp_humedad_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `med_temp_humedad_ibfk_2` FOREIGN KEY (`id_Sede`) REFERENCES `sede` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `pregunta_ibfk_2` FOREIGN KEY (`id_Sede`) REFERENCES `sede` (`id`),
  ADD CONSTRAINT `pregunta_ibfk_3` FOREIGN KEY (`usuario_origen`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `pregunta_ibfk_4` FOREIGN KEY (`usuario_destino`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `respuesta_ibfk_2` FOREIGN KEY (`id_Sede`) REFERENCES `sede` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `respuesta_ibfk_3` FOREIGN KEY (`usuario_origen`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `respuesta_ibfk_4` FOREIGN KEY (`usuario_destino`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `th_crono_cap`
--
ALTER TABLE `th_crono_cap`
  ADD CONSTRAINT `th_crono_cap_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `th_crono_cap_ibfk_2` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `th_eval`
--
ALTER TABLE `th_eval`
  ADD CONSTRAINT `th_eval_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `th_eval_ibfk_2` FOREIGN KEY (`id_Sede`) REFERENCES `sede` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `th_eval_ibfk_3` FOREIGN KEY (`id_Estandar`) REFERENCES `estandar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
