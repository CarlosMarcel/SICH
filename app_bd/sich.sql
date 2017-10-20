-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2017 a las 09:20:53
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sich`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `idAlimentos` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `peso` varchar(45) DEFAULT NULL,
  `puntoReorden` varchar(45) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `Estado` enum('A','I') DEFAULT NULL,
  `tipoMedida` varchar(45) DEFAULT NULL,
  `tbl_administrador_idAdministrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_administrador`
--

CREATE TABLE `tbl_administrador` (
  `idAdministrador` int(11) NOT NULL,
  `Persona_idPersona` int(11) NOT NULL,
  `tbl_login_idLogin` int(11) NOT NULL,
  `tbl_luces_idluces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_administrador`
--

INSERT INTO `tbl_administrador` (`idAdministrador`, `Persona_idPersona`, `tbl_login_idLogin`, `tbl_luces_idluces`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bitacora`
--

CREATE TABLE `tbl_bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` enum('A','I') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_bitacora`
--

INSERT INTO `tbl_bitacora` (`id_bitacora`, `persona_id`, `fecha`, `hora`, `estado`) VALUES
(2, 2, '2017-10-03', '07:15:00', 'A'),
(3, 2, '2017-10-03', '07:30:00', 'A'),
(4, 2, '2017-10-04', '12:00:00', 'A'),
(5, 1, '2017-10-18', '17:00:00', 'A'),
(6, 1, '2017-10-19', '23:06:09', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleado`
--

CREATE TABLE `tbl_empleado` (
  `idEmpleado` int(11) NOT NULL,
  `Persona_idPersona` int(11) NOT NULL,
  `tbl_login_idLogin` int(11) NOT NULL,
  `puesto` varchar(45) DEFAULT NULL,
  `salario` varchar(45) DEFAULT NULL,
  `fechaIngreso` date DEFAULT NULL,
  `horario` varchar(45) DEFAULT NULL,
  `estado` enum('A','I') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_empleado`
--

INSERT INTO `tbl_empleado` (`idEmpleado`, `Persona_idPersona`, `tbl_login_idLogin`, `puesto`, `salario`, `fechaIngreso`, `horario`, `estado`) VALUES
(3, 3, 3, 'Jardinero', '10000', '2017-08-04', '8:00am a 4:00pm', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_login`
--

CREATE TABLE `tbl_login` (
  `idLogin` int(11) NOT NULL,
  `correoElectronico` varchar(50) NOT NULL,
  `contraseña` char(128) NOT NULL,
  `estado` enum('A','I') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_luces`
--

CREATE TABLE `tbl_luces` (
  `idluces` int(11) NOT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `horaEncendido` time DEFAULT NULL,
  `horaApagado` time DEFAULT NULL,
  `estado` enum('A','I') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_luces`
--

INSERT INTO `tbl_luces` (`idluces`, `ubicacion`, `horaEncendido`, `horaApagado`, `estado`) VALUES
(1, 'Sala', '17:00:00', '20:00:00', 'A'),
(2, 'Cocina', '19:30:00', '21:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_persona`
--

CREATE TABLE `tbl_persona` (
  `idPersona` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `apellido2` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `tipoRol` enum('Administrador','Usuarios','Empleado') DEFAULT NULL,
  `codigoAcceso` int(11) DEFAULT NULL,
  `estado` enum('A','I') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_persona`
--

INSERT INTO `tbl_persona` (`idPersona`, `cedula`, `nombre`, `apellido`, `apellido2`, `telefono`, `correo`, `fechaNacimiento`, `direccion`, `tipoRol`, `codigoAcceso`, `estado`) VALUES
(1, 666, 'cesar', 'g', 't', '222', 's@s', '2017-10-01', 'd', 'Usuarios', 1234, 'A'),
(2, 23, 'd', 'd', 'j', '4', 'n', '2017-10-04', 'j', 'Usuarios', 213, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_registrollamadas`
--

CREATE TABLE `tbl_registrollamadas` (
  `idregistroLlamadas` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time NOT NULL,
  `estado` enum('A','I') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tareas`
--

CREATE TABLE `tbl_tareas` (
  `tareas_id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estadoTarea` enum('Completo','Incompleto') NOT NULL,
  `fecha` date NOT NULL,
  `estado` enum('A','I') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tareas`
--

INSERT INTO `tbl_tareas` (`tareas_id`, `empleado_id`, `nombre`, `estadoTarea`, `fecha`, `estado`) VALUES
(2, 3, 'limpiar plantas', 'Incompleto', '2017-10-18', 'A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`idAlimentos`);

--
-- Indices de la tabla `tbl_bitacora`
--
ALTER TABLE `tbl_bitacora`
  ADD PRIMARY KEY (`id_bitacora`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`idLogin`);

--
-- Indices de la tabla `tbl_luces`
--
ALTER TABLE `tbl_luces`
  ADD PRIMARY KEY (`idluces`);

--
-- Indices de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD PRIMARY KEY (`idPersona`),
  ADD UNIQUE KEY `codigoAcceso` (`codigoAcceso`);

--
-- Indices de la tabla `tbl_registrollamadas`
--
ALTER TABLE `tbl_registrollamadas`
  ADD PRIMARY KEY (`idregistroLlamadas`);

--
-- Indices de la tabla `tbl_tareas`
--
ALTER TABLE `tbl_tareas`
  ADD PRIMARY KEY (`tareas_id`),
  ADD KEY `empleado_id` (`empleado_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `idAlimentos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_bitacora`
--
ALTER TABLE `tbl_bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_luces`
--
ALTER TABLE `tbl_luces`
  MODIFY `idluces` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_registrollamadas`
--
ALTER TABLE `tbl_registrollamadas`
  MODIFY `idregistroLlamadas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_tareas`
--
ALTER TABLE `tbl_tareas`
  MODIFY `tareas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_bitacora`
--
ALTER TABLE `tbl_bitacora`
  ADD CONSTRAINT `tbl_bitacora_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `tbl_persona` (`idPersona`);

--
-- Filtros para la tabla `tbl_tareas`
--
ALTER TABLE `tbl_tareas`
  ADD CONSTRAINT `tbl_tareas_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `tbl_empleado` (`idEmpleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
