-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2022 a las 20:19:20
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
-- Base de datos: `studium_dws_p2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juguetes`
--

CREATE TABLE `juguetes` (
  `idJuguete` int(11) NOT NULL,
  `nombreJuguete` varchar(45) NOT NULL,
  `precioJuguete` float(10,2) NOT NULL,
  `idReyFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `juguetes`
--

INSERT INTO `juguetes` (`idJuguete`, `nombreJuguete`, `precioJuguete`, `idReyFK`) VALUES
(1, 'Aula de ciencia: Robot Mini ERP', 159.95, 1),
(2, 'Carbón', 0.00, 2),
(3, 'Cochecito Classic', 99.95, 3),
(4, 'Consola PS4 1 TB', 349.90, 2),
(5, 'Lego Villa familiar modular', 64.99, 3),
(6, 'Magia Borrás Clásica 150 trucos con luz', 32.95, 1),
(7, 'Meccano Excavadora construcción', 30.99, 1),
(8, 'Nenuco Hace pompas', 29.95, 2),
(9, 'Peluche delfín rosa', 34.00, 3),
(10, 'Pequeordenador', 22.95, 1),
(11, 'Robot Coji', 69.95, 2),
(12, 'Telescopio astronómico terrestre', 72.00, 3),
(13, 'Twister', 17.95, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ninios`
--

CREATE TABLE `ninios` (
  `idNInio` int(11) NOT NULL,
  `nombreNinio` varchar(45) NOT NULL,
  `apellidosNinio` varchar(45) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `bueno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ninios`
--

INSERT INTO `ninios` (`idNInio`, `nombreNinio`, `apellidosNinio`, `fechaNacimiento`, `bueno`) VALUES
(1, 'Alberto', 'Alcántara', '1994-10-13', 'No'),
(2, 'Beatriz', 'Bueno', '1982-04-18', 'Sí'),
(3, 'Carlos', 'Crepo', '1998-12-01', 'Sí'),
(4, 'Diana', 'Domínguez', '1987-09-02', 'No'),
(5, 'Emilio', 'Enamorado', '1996-08-12', 'Sí'),
(6, 'Francisca', 'Fernández', '1990-07-28', 'Sí');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalos`
--

CREATE TABLE `regalos` (
  `idRegalo` int(11) NOT NULL,
  `idJugueteFK` int(11) NOT NULL,
  `idNinioFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `regalos`
--

INSERT INTO `regalos` (`idRegalo`, `idJugueteFK`, `idNinioFK`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 4, 2),
(4, 5, 2),
(5, 6, 3),
(6, 7, 3),
(7, 8, 4),
(8, 9, 4),
(9, 10, 5),
(10, 11, 5),
(11, 12, 6),
(12, 13, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reyesmagos`
--

CREATE TABLE `reyesmagos` (
  `idReyMago` int(11) NOT NULL,
  `nombreRey` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reyesmagos`
--

INSERT INTO `reyesmagos` (`idReyMago`, `nombreRey`) VALUES
(1, 'Melchor'),
(2, 'Gaspar'),
(3, 'Baltasar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `juguetes`
--
ALTER TABLE `juguetes`
  ADD PRIMARY KEY (`idJuguete`),
  ADD KEY `idReyFK` (`idReyFK`);

--
-- Indices de la tabla `ninios`
--
ALTER TABLE `ninios`
  ADD PRIMARY KEY (`idNInio`);

--
-- Indices de la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`idRegalo`),
  ADD KEY `idNinioFK` (`idNinioFK`),
  ADD KEY `idJugueteFK` (`idJugueteFK`);

--
-- Indices de la tabla `reyesmagos`
--
ALTER TABLE `reyesmagos`
  ADD PRIMARY KEY (`idReyMago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juguetes`
--
ALTER TABLE `juguetes`
  MODIFY `idJuguete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ninios`
--
ALTER TABLE `ninios`
  MODIFY `idNInio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `regalos`
--
ALTER TABLE `regalos`
  MODIFY `idRegalo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `reyesmagos`
--
ALTER TABLE `reyesmagos`
  MODIFY `idReyMago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juguetes`
--
ALTER TABLE `juguetes`
  ADD CONSTRAINT `idReyFK` FOREIGN KEY (`idReyFK`) REFERENCES `reyesmagos` (`idReyMago`);

--
-- Filtros para la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD CONSTRAINT `idJugueteFK` FOREIGN KEY (`idJugueteFK`) REFERENCES `juguetes` (`idJuguete`),
  ADD CONSTRAINT `idNinioFK` FOREIGN KEY (`idNinioFK`) REFERENCES `ninios` (`idNInio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
