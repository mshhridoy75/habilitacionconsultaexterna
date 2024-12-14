-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2024 at 10:19 PM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u368085307_expertocalidad`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cronograma_mantenimiento`
--
ALTER TABLE `cronograma_mantenimiento`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `plan_mantenimiento`
--
ALTER TABLE `plan_mantenimiento`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `plan_mantenimiento`
--
ALTER TABLE `plan_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `verificacion_alertras`
--
ALTER TABLE `verificacion_alertras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
