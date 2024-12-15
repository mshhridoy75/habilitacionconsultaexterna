-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2024 a las 20:20:34
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `expertocalidad`
--

-- --------------------------------------------------------
CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(100) NOT NULL UNIQUE,
    pass VARCHAR(255) NOT NULL,
    rol ENUM('administrador', 'odontologo', 'otro_rol') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Estructura de tabla para la tabla `cronograma_mantenimiento`
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
-- Estructura de tabla para la tabla `listado _medicamentos _dispositivos médicos`
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
-- Estructura de tabla para la tabla `matriz documental`
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
-- Estructura de tabla para la tabla `plan_mantenimiento`
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
-- Estructura de tabla para la tabla `presupuesto_gestion_ambiental`
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
-- Estructura de tabla para la tabla `registro_capacitaciones`
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
-- Estructura de tabla para la tabla `relación_equipos_biomedicos`
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
-- Estructura de tabla para la tabla `verificacion_alertras`
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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cronograma_mantenimiento`
--
ALTER TABLE `cronograma_mantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `listado _medicamentos _dispositivos médicos`
--
ALTER TABLE `listado _medicamentos _dispositivos médicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `matriz documental`
--
ALTER TABLE `matriz documental`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plan_mantenimiento`
--
ALTER TABLE `plan_mantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `presupuesto_gestion_ambiental`
--
ALTER TABLE `presupuesto_gestion_ambiental`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_capacitaciones`
--
ALTER TABLE `registro_capacitaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `relación_equipos_biomedicos`
--
ALTER TABLE `relación_equipos_biomedicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `verificacion_alertras`
--
ALTER TABLE `verificacion_alertras`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cronograma_mantenimiento`
--
ALTER TABLE `cronograma_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `listado _medicamentos _dispositivos médicos`
--
ALTER TABLE `listado _medicamentos _dispositivos médicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `matriz documental`
--
ALTER TABLE `matriz documental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plan_mantenimiento`
--
ALTER TABLE `plan_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presupuesto_gestion_ambiental`
--
ALTER TABLE `presupuesto_gestion_ambiental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_capacitaciones`
--
ALTER TABLE `registro_capacitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `relación_equipos_biomedicos`
--
ALTER TABLE `relación_equipos_biomedicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `verificacion_alertras`
--
ALTER TABLE `verificacion_alertras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
