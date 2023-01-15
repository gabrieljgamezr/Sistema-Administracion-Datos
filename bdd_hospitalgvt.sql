-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-01-2023 a las 02:39:26
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdd_hospitalgvt`
--
CREATE DATABASE IF NOT EXISTS `bdd_hospitalgvt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `bdd_hospitalgvt`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga familiar`
--

CREATE TABLE `carga familiar` (
  `ID` int(11) NOT NULL,
  `ID CARGA FAMILIAR` int(11) NOT NULL,
  `PRIMER APELLIDO` varchar(50) NOT NULL,
  `SEGUNDO APELLIDO` varchar(50) NOT NULL,
  `PRIMER NOMBRE` varchar(50) NOT NULL,
  `SEGUNDO NOMBRE` varchar(50) NOT NULL,
  `CEDULA` int(20) NOT NULL,
  `PARENTESCO` varchar(20) NOT NULL,
  `FECHA DE NACIMIENTO` date NOT NULL,
  `NIVEL DE ESTUDIO` varchar(40) NOT NULL,
  `POSEE ALGUNA CONDICION ESPECIAL` varchar(200) NOT NULL,
  `OBSERVACIONES` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_ROL` int(11) NOT NULL,
  `ROL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_ROL`, `ROL`) VALUES
(1, 'Administrador'),
(2, 'Asistente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `ID` int(11) NOT NULL,
  `CEDULA` int(20) NOT NULL,
  `Nro DE RIF` varchar(40) NOT NULL,
  `PRIMER APELLIDO` varchar(50) NOT NULL,
  `SEGUNDO APELLIDO` varchar(50) NOT NULL,
  `PRIMER NOMBRE` varchar(50) NOT NULL,
  `SEGUNDO NOMBRE` varchar(50) NOT NULL,
  `FECHA DE NACIMIENTO` date NOT NULL,
  `CIUDAD` varchar(200) NOT NULL,
  `NACIONALIDAD` varchar(200) NOT NULL,
  `DOBLE NACIONALIDAD` varchar(10) NOT NULL,
  `FECHA DE NACIONALIDAD` date NOT NULL,
  `CODIGO CARNET PATRIA` varchar(40) NOT NULL,
  `SERIAL CARNET PATRIA` varchar(40) NOT NULL,
  `GACETA Nro` varchar(20) NOT NULL,
  `PADRE/MADRE` varchar(10) NOT NULL,
  `SEXO` varchar(10) NOT NULL,
  `ESTADO CIVIL` varchar(20) NOT NULL,
  `POSEE ALGUNA DISCAPACIDAD` varchar(10) NOT NULL,
  `ESPECIFIQUE` varchar(200) NOT NULL,
  `POSEE ALGUNA ENFERMEDAD` varchar(10) NOT NULL,
  `ESPECIFIQUE ENFERMEDAD` varchar(200) NOT NULL,
  `TOMA ALGUN MEDICAMENTO` varchar(200) NOT NULL,
  `ENTIDAD BANCARIA` varchar(40) NOT NULL,
  `CUENTA NOMINA` varchar(40) NOT NULL,
  `FORMA DE PAGO` varchar(40) NOT NULL,
  `DIRECCION DE HABITACION` varchar(200) NOT NULL,
  `MUNICIPIO` varchar(200) NOT NULL,
  `ESTADO` varchar(200) NOT NULL,
  `CENTRO DE VOTACION` varchar(200) NOT NULL,
  `PERTENECE A UNA ORGANIZACION SOCIAL` varchar(10) NOT NULL,
  `CUAL ORGANIZACION SOCIAL` varchar(200) NOT NULL,
  `PERTENECE AL CONSEJO COMUNAL DE SU COMUNIDAD` varchar(10) NOT NULL,
  `TELEFONO FIJO DE HABITACION` varchar(40) NOT NULL,
  `TELEFONO MOVIL` varchar(40) NOT NULL,
  `TELEFONO DE OFICINA` varchar(40) NOT NULL,
  `CORREO ELECTRONICO` varchar(200) NOT NULL,
  `TIPO DE VIVIENDA` varchar(20) NOT NULL,
  `TENDENCIA DE VIVIENDA` varchar(20) NOT NULL,
  `MANEJA` varchar(10) NOT NULL,
  `GRADO DE LICENCIA` varchar(20) NOT NULL,
  `GRUPO SANGUINEO` varchar(10) NOT NULL,
  `ESTATURA` varchar(10) NOT NULL,
  `PESO` varchar(10) NOT NULL,
  `PANTALON` varchar(10) NOT NULL,
  `CAMISA` varchar(10) NOT NULL,
  `ZAPATO` varchar(10) NOT NULL,
  `MANO DOMINANTE` varchar(20) NOT NULL,
  `NIVEL EDUCATIVO ESTUDIOS` varchar(20) NOT NULL,
  `ESPECIALIDAD O DOCTORADO` varchar(200) NOT NULL,
  `PROFESION` varchar(40) NOT NULL,
  `DEPENDENCIA ADSCRITA NOMINALMENTE` varchar(200) NOT NULL,
  `DEPENDENCIA DONDE TRABAJA FISICAMENTE` varchar(200) NOT NULL,
  `UBICACION ADMINISTRATIVA` varchar(40) NOT NULL,
  `UBICACION FISICA` varchar(40) NOT NULL,
  `DIRECCION EXACTA DEL LUGAR DE TRABAJO` varchar(500) NOT NULL,
  `CORREO ELECTRONICO DEL LUGAR DE TRABAJO` varchar(200) NOT NULL,
  `TELEFONO DE LA OFICINA` varchar(40) NOT NULL,
  `CODIGO NOMINAL` int(10) NOT NULL,
  `CARGO` varchar(200) NOT NULL,
  `TIPO DE PERSONAL` varchar(40) NOT NULL,
  `TIPO DE TRABAJADOR` varchar(40) NOT NULL,
  `OCUPACION` varchar(200) NOT NULL,
  `CARGA HORARIA` varchar(10) NOT NULL,
  `JORNADA DIARIA` varchar(10) NOT NULL,
  `GUARDIAS NOCTURNAS` varchar(10) NOT NULL,
  `ASIC` varchar(200) NOT NULL,
  `ORGANISMO DE ADSCRIPCION` varchar(200) NOT NULL,
  `BREVE DESCRIPCION DEL CARGO` varchar(500) NOT NULL,
  `FECHA DE INGRESO` date NOT NULL,
  `ASAP ANTES DEL INGRESO D.S.M` varchar(200) NOT NULL,
  `DECLARACION JURADA DE PATRIMONIO` varchar(40) NOT NULL,
  `OBSERVACIONES` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `USUARIO` varchar(20) NOT NULL,
  `CLAVE` varchar(200) NOT NULL,
  `ID_ROL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `NOMBRE`, `USUARIO`, `CLAVE`, `ID_ROL`) VALUES
(21, 'Administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carga familiar`
--
ALTER TABLE `carga familiar`
  ADD PRIMARY KEY (`ID CARGA FAMILIAR`),
  ADD KEY `ID` (`ID`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_ROL`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `ID_ROL` (`ID_ROL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carga familiar`
--
ALTER TABLE `carga familiar`
  MODIFY `ID CARGA FAMILIAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_ROL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carga familiar`
--
ALTER TABLE `carga familiar`
  ADD CONSTRAINT `carga familiar_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `trabajadores` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
