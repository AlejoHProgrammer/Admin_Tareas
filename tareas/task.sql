-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2023 a las 22:41:47
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `task`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `note` varchar(1000) NOT NULL,
  `note_registration` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notes`
--

INSERT INTO `notes` (`id`, `note`, `note_registration`) VALUES
(2, 'Se modifico codigo para la tabla de arriba OPP (tabla ya foreach)', '2023-06-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `priority`
--

CREATE TABLE `priority` (
  `id_prioridad` int(11) NOT NULL,
  `prioridad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `priority`
--

INSERT INTO `priority` (`id_prioridad`, `prioridad`) VALUES
(0, 'Revisar'),
(1, 'Pendiente'),
(2, 'Importante'),
(3, 'Urgente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `task`
--

CREATE TABLE `task` (
  `id` int(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `prioridad` varchar(10) DEFAULT NULL,
  `date_limit` date NOT NULL,
  `complete` int(1) NOT NULL,
  `registration_date` date NOT NULL DEFAULT current_timestamp(),
  `date_finish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `task`
--

INSERT INTO `task` (`id`, `description`, `prioridad`, `date_limit`, `complete`, `registration_date`, `date_finish`) VALUES
(1, 'Realizar tarea 1', '3', '2023-10-10', 1, '2023-04-28', '2023-05-12'),
(2, 'Realizar tarea 2', '2', '2021-12-26', 0, '2023-04-28', '0000-00-00'),
(3, 'Realizar tarea 3', '1', '2022-05-10', 0, '2023-04-28', '0000-00-00'),
(4, 'Realizar tarea 4', '0', '2023-05-06', 0, '2023-04-28', '0000-00-00'),
(5, 'Realizar tarea 5', '3', '2023-10-10', 0, '2023-04-28', '0000-00-00'),
(6, 'Realizar tarea 6', '2', '2021-12-26', 0, '2023-04-28', '2023-05-11'),
(7, 'Realizar tarea 7', '1', '2022-05-10', 0, '2023-04-28', '2023-05-11'),
(8, 'Realizar tarea 8', '0', '2023-05-06', 0, '2023-04-28', '2023-05-11'),
(0, ' Realizar tarea 9', '3', '2023-06-03', 1, '2023-05-29', '2023-05-29'),
(0, ' Tarea 10', '2', '2023-06-23', 0, '2023-06-05', '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
