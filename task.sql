-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2023 a las 18:28:58
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `note_registration` date NOT NULL DEFAULT current_timestamp
) ;

--
-- Volcado de datos para la tabla `notes`
--

INSERT INTO `notes` (`id`, `note`, `note_registration`) VALUES
(1, 'nota1', '2023-05-15'),
(2, 'nota2', '2023-05-15');

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
  `registration_date` date NOT NULL DEFAULT current_timestamp
) ;

--
-- Volcado de datos para la tabla `task`
--

INSERT INTO `task` (`id`, `description`, `prioridad`, `date_limit`, `complete`, `registration_date`, `date_finish`) VALUES
(1, 'Realizar tarea 1', '3', '2023-10-10', 0, '2023-04-28', '2023-05-12'),
(2, 'Realizar tarea 2', '2', '2021-12-26', 0, '2023-04-28', '0000-00-00'),
(3, 'Realizar tarea 3', '1', '2022-05-10', 0, '2023-04-28', '0000-00-00'),
(4, 'Realizar tarea 4', '0', '2023-05-06', 0, '2023-04-28', '0000-00-00'),
(5, 'Realizar tarea 5', '3', '2023-10-10', 0, '2023-04-28', '2023-08-11'),
(6, 'Realizar tarea 6', '2', '2021-12-26', 0, '2023-04-28', '2023-05-11'),
(7, 'Realizar tarea 7', '1', '2022-05-10', 0, '2023-04-28', '2023-05-11'),
(8, 'Realizar tarea 8', '0', '2023-05-06', 0, '2023-04-28', '2023-05-11'),
(10, 'Hacer la presentación', '2', '2023-08-15', 0, '2023-08-11', '0000-00-00'),
(11, 'Comprar víveres', '1', '2023-08-12', 0, '2023-08-11', '0000-00-00'),
(12, 'Revisar informe', '3', '2023-08-18', 0, '2023-08-12', '0000-00-00'),
(13, 'Llamar al cliente', '0', '2023-08-13', 0, '2023-08-12', '0000-00-00'),
(14, 'Preparar reunión', '2', '2023-08-17', 0, '2023-08-13', '0000-00-00'),
(15, 'Enviar correo electrónico', '1', '2023-08-15', 0, '2023-08-14', '0000-00-00'),
(16, 'Resolver problemas', '2', '2023-08-20', 0, '2023-08-15', '0000-00-00'),
(17, 'Actualizar sitio web', '0', '2023-08-18', 0, '2023-08-16', '0000-00-00'),
(18, 'Investigar nuevo proyecto', '3', '2023-08-25', 0, '2023-08-17', '0000-00-00'),
(19, 'Escribir informe final', '2', '2023-08-22', 0, '2023-08-18', '0000-00-00'),
(20, 'Configurar sistema', '1', '2023-08-21', 0, '2023-08-19', '0000-00-00'),
(21, 'Hacer seguimiento', '0', '2023-08-23', 0, '2023-08-20', '0000-00-00'),
(22, 'Actualizar base de datos', '2', '2023-08-24', 0, '2023-08-21', '0000-00-00'),
(23, 'Planificar presupuesto', '1', '2023-08-27', 0, '2023-08-22', '0000-00-00'),
(24, 'Resolver bugs', '2', '2023-08-26', 0, '2023-08-23', '0000-00-00'),
(25, 'Realizar pruebas', '3', '2023-08-30', 0, '2023-08-24', '0000-00-00'),
(26, 'Organizar eventos', '1', '2023-08-28', 0, '2023-08-25', '0000-00-00'),
(27, 'Redactar propuesta', '2', '2023-08-29', 0, '2023-08-26', '0000-00-00'),
(28, 'Diseñar interfaz', '0', '2023-08-31', 0, '2023-08-27', '0000-00-00'),
(29, 'Actualizar documentación', '1', '2023-09-02', 0, '2023-08-28', '0000-00-00'),
(30, 'Reunión de equipo', '1', '2023-09-05', 0, '2023-09-01', '0000-00-00'),
(31, 'Desarrollar nueva función', '2', '2023-09-08', 0, '2023-09-02', '0000-00-00'),
(32, 'Entrenamiento de nuevos empleados', '0', '2023-09-06', 0, '2023-09-03', '0000-00-00'),
(33, 'Preparar informe financiero', '3', '2023-09-12', 0, '2023-09-04', '0000-00-00'),
(34, 'Realizar pruebas de rendimiento', '2', '2023-09-10', 0, '2023-09-05', '0000-00-00'),
(35, 'Configurar servidor', '1', '2023-09-09', 0, '2023-09-06', '0000-00-00'),
(36, 'Analizar datos de ventas', '0', '2023-09-14', 0, '2023-09-07', '0000-00-00'),
(37, 'Actualizar redes sociales', '2', '2023-09-16', 0, '2023-09-08', '0000-00-00'),
(38, 'Investigar competidores', '3', '2023-09-18', 0, '2023-09-09', '0000-00-00'),
(39, 'Revisar contratos legales', '1', '2023-09-20', 0, '2023-09-10', '0000-00-00'),
(40, 'Optimizar código', '2', '2023-09-22', 0, '2023-09-11', '0000-00-00'),
(41, 'Entrevistar candidatos', '0', '2023-09-24', 0, '2023-09-12', '0000-00-00'),
(42, 'Migrar base de datos', '2', '2023-09-26', 0, '2023-09-13', '0000-00-00'),
(43, 'Diseñar logotipo', '1', '2023-09-28', 0, '2023-09-14', '0000-00-00'),
(44, 'Resolver problemas de seguridad', '3', '2023-09-30', 0, '2023-09-15', '0000-00-00'),
(45, 'Preparar presentación de ventas', '2', '2023-10-02', 0, '2023-09-16', '0000-00-00'),
(46, 'Crear contenido para blog', '1', '2023-10-04', 0, '2023-09-17', '0000-00-00'),
(47, 'Revisar código de colega', '0', '2023-10-06', 0, '2023-09-18', '0000-00-00'),
(48, 'Configurar sistema de respaldo', '1', '2023-10-08', 0, '2023-09-19', '0000-00-00'),
(49, 'Desarrollar estrategia de marketing', '3', '2023-10-10', 0, '2023-09-20', '0000-00-00'),
(50, 'Realizar pruebas de usabilidad', '1', '2023-10-12', 0, '2023-09-21', '0000-00-00'),
(51, 'Optimizar campaña publicitaria', '2', '2023-10-16', 0, '2023-09-23', '0000-00-00'),
(52, 'Entrenar a nuevo personal', '0', '2023-10-18', 0, '2023-09-24', '0000-00-00'),
(53, 'Actualizar software de seguridad', '3', '2023-10-20', 0, '2023-09-25', '0000-00-00'),
(54, 'Desarrollar prototipo', '2', '2023-10-22', 0, '2023-09-26', '0000-00-00'),
(55, 'Revisar estrategia de ventas', '1', '2023-10-24', 0, '2023-09-27', '0000-00-00'),
(56, 'Configurar servidor de pruebas', '0', '2023-10-26', 0, '2023-09-28', '0000-00-00'),
(57, 'Analizar métricas de rendimiento', '2', '2023-10-28', 0, '2023-09-29', '0000-00-00'),
(58, 'Investigar nuevas tecnologías', '3', '2023-10-30', 0, '2023-09-30', '0000-00-00'),
(59, 'Preparar informe de gestión', '1', '2023-11-02', 0, '2023-10-01', '0000-00-00'),
(60, 'Desarrollar interfaz de usuario', '2', '2023-11-04', 0, '2023-10-02', '0000-00-00'),
(61, 'Entrevistar clientes potenciales', '0', '2023-11-06', 0, '2023-10-03', '0000-00-00'),
(62, 'Migrar plataforma en la nube', '2', '2023-11-08', 0, '2023-10-04', '0000-00-00'),
(63, 'Diseñar empaque de producto', '1', '2023-11-10', 0, '2023-10-05', '0000-00-00'),
(64, 'Mejorar seguridad de la red', '3', '2023-11-12', 0, '2023-10-06', '0000-00-00'),
(65, 'Elaborar plan de capacitación', '2', '2023-11-14', 0, '2023-10-07', '0000-00-00'),
(66, 'Crear contenido multimedia', '1', '2023-11-16', 0, '2023-10-08', '0000-00-00'),
(67, 'Revisar documentación técnica', '0', '2023-11-18', 0, '2023-10-09', '0000-00-00'),
(68, 'Configurar sistema de notificaciones', '2', '2023-11-20', 0, '2023-10-10', '0000-00-00'),
(69, 'Desarrollar estrategia de expansión', '3', '2023-11-22', 0, '2023-10-11', '0000-00-00'),
(70, 'Realizar pruebas de rendimiento', '1', '2023-11-24', 0, '2023-10-12', '0000-00-00'),
(71, 'Evaluar satisfacción del cliente', '2', '2023-11-26', 0, '2023-10-13', '0000-00-00'),
(72, 'Optimizar proceso de producción', '0', '2023-11-28', 0, '2023-10-14', '0000-00-00'),
(73, 'Entrenar a nuevos líderes de equipo', '3', '2023-11-30', 0, '2023-10-15', '0000-00-00'),
(74, 'Actualizar políticas de privacidad', '2', '2023-12-02', 0, '2023-10-16', '0000-00-00'),
(75, 'Revisar estrategia de marketing', '1', '2023-12-04', 0, '2023-10-17', '0000-00-00'),
(76, 'Configurar sistema de backup', '0', '2023-12-06', 0, '2023-10-18', '0000-00-00'),
(77, 'Analizar tendencias de la industria', '2', '2023-12-08', 0, '2023-10-19', '0000-00-00'),
(78, 'Investigar nuevas oportunidades de negocio', '3', '2023-12-10', 0, '2023-10-20', '0000-00-00'),
(79, 'Preparar presentación ejecutiva', '1', '2023-12-12', 0, '2023-10-21', '0000-00-00'),
(80, 'Desarrollar estrategia de redes sociales', '2', '2023-12-14', 0, '2023-10-22', '0000-00-00'),
(81, 'Optimizar proceso de producción', '2', '2023-12-18', 0, '2023-10-24', '0000-00-00'),
(82, 'Capacitar al equipo en nuevas habilidades', '0', '2023-12-20', 0, '2023-10-25', '0000-00-00'),
(83, 'Actualizar software de seguridad', '3', '2023-12-22', 0, '2023-10-26', '0000-00-00'),
(84, 'Desarrollar nuevo producto', '2', '2023-12-24', 0, '2023-10-27', '0000-00-00'),
(85, 'Revisar estrategia de ventas', '1', '2023-12-26', 0, '2023-10-28', '0000-00-00'),
(86, 'Configurar servidor de pruebas', '0', '2023-12-28', 0, '2023-10-29', '0000-00-00'),
(87, 'Analizar métricas de rendimiento', '2', '2023-12-30', 0, '2023-10-30', '0000-00-00'),
(88, 'Investigar tendencias de mercado', '3', '2024-01-02', 0, '2023-10-31', '0000-00-00'),
(89, 'Preparar informe financiero', '1', '2024-01-04', 0, '2023-11-01', '0000-00-00'),
(90, 'Desarrollar aplicación móvil', '2', '2024-01-06', 0, '2023-11-02', '0000-00-00'),
(91, 'Entrevistar candidatos', '0', '2024-01-08', 0, '2023-11-03', '0000-00-00'),
(92, 'Migrar base de datos', '2', '2024-01-10', 0, '2023-11-04', '0000-00-00'),
(93, 'Diseñar logotipo', '1', '2024-01-12', 0, '2023-11-05', '0000-00-00'),
(94, 'Evaluar seguridad de la red', '3', '2024-01-14', 0, '2023-11-06', '0000-00-00'),
(95, 'Planificar evento corporativo', '2', '2024-01-16', 0, '2023-11-07', '0000-00-00'),
(96, 'Crear contenido multimedia', '1', '2024-01-18', 0, '2023-11-08', '0000-00-00'),
(97, 'Revisar documentación técnica', '0', '2024-01-20', 0, '2023-11-09', '0000-00-00'),
(98, 'Configurar sistema de notificaciones', '2', '2024-01-22', 0, '2023-11-10', '0000-00-00'),
(99, 'Desarrollar estrategia de expansión', '3', '2024-01-24', 0, '2023-11-11', '0000-00-00'),
(100, 'Realizar pruebas de usabilidad', '1', '2024-01-26', 0, '2023-11-12', '0000-00-00'),
(101, 'Analizar satisfacción del cliente', '2', '2024-01-28', 0, '2023-11-13', '0000-00-00'),
(102, 'Optimizar proceso de marketing', '0', '2024-01-30', 0, '2023-11-14', '0000-00-00'),
(103, 'Entrenar a nuevos líderes de equipo', '3', '2024-02-01', 0, '2023-11-15', '0000-00-00'),
(104, 'Actualizar políticas de privacidad', '2', '2024-02-03', 0, '2023-11-16', '0000-00-00'),
(105, 'Revisar estrategia de ventas', '1', '2024-02-05', 0, '2023-11-17', '0000-00-00'),
(106, 'Configurar sistema de respaldo', '0', '2024-02-07', 0, '2023-11-18', '0000-00-00'),
(107, 'Analizar tendencias de la industria', '2', '2024-02-09', 0, '2023-11-19', '0000-00-00'),
(108, 'Investigar nuevas oportunidades de negocio', '3', '2024-02-11', 0, '2023-11-20', '0000-00-00'),
(109, 'Preparar presentación ejecutiva', '1', '2024-02-13', 0, '2023-11-21', '0000-00-00'),
(110, 'Desarrollar estrategia de redes sociales', '2', '2024-02-15', 0, '2023-11-22', '0000-00-00'),
(111, 'Optimizar proceso de entrega', '2', '2024-02-19', 0, '2023-11-24', '0000-00-00'),
(112, 'Capacitar al personal en seguridad', '0', '2024-02-21', 0, '2023-11-25', '0000-00-00'),
(113, 'Actualizar software de contabilidad', '3', '2024-02-23', 0, '2023-11-26', '0000-00-00'),
(114, 'Desarrollar estrategia de marketing', '2', '2024-02-25', 0, '2023-11-27', '0000-00-00'),
(115, 'Revisar estrategia de expansión', '1', '2024-02-27', 0, '2023-11-28', '0000-00-00'),
(116, 'Configurar servidor de producción', '0', '2024-02-29', 0, '2023-11-29', '0000-00-00'),
(117, 'Analizar métricas de ventas', '2', '2024-03-02', 0, '2023-11-30', '0000-00-00'),
(118, 'Investigar nuevas tecnologías', '3', '2024-03-04', 0, '2023-12-01', '0000-00-00'),
(119, 'Preparar informe de gestión', '1', '2024-03-06', 0, '2023-12-02', '0000-00-00'),
(120, 'Desarrollar sitio web', '2', '2024-03-08', 0, '2023-12-03', '0000-00-00'),
(121, 'Entrevistar candidatos', '0', '2024-03-10', 0, '2023-12-04', '0000-00-00'),
(122, 'Migrar base de datos', '2', '2024-03-12', 0, '2023-12-05', '0000-00-00'),
(123, 'Diseñar material promocional', '1', '2024-03-14', 0, '2023-12-06', '0000-00-00'),
(124, 'Evaluar seguridad de la red', '3', '2024-03-16', 0, '2023-12-07', '0000-00-00'),
(125, 'Planificar evento corporativo', '2', '2024-03-18', 0, '2023-12-08', '0000-00-00'),
(126, 'Crear contenido multimedia', '1', '2024-03-20', 0, '2023-12-09', '0000-00-00'),
(127, 'Revisar documentación técnica', '0', '2024-03-22', 0, '2023-12-10', '0000-00-00'),
(128, 'Configurar sistema de notificaciones', '2', '2024-03-24', 0, '2023-12-11', '0000-00-00'),
(129, 'Desarrollar estrategia de ventas', '3', '2024-03-26', 0, '2023-12-12', '0000-00-00'),
(130, 'Realizar pruebas de usabilidad', '1', '2024-03-28', 0, '2023-12-13', '0000-00-00'),
(131, 'Analizar satisfacción del cliente', '2', '2024-03-30', 0, '2023-12-14', '0000-00-00'),
(132, 'Optimizar proceso de producción', '0', '2024-04-01', 0, '2023-12-15', '0000-00-00'),
(133, 'Entrenar a nuevos líderes de equipo', '3', '2024-04-03', 0, '2023-12-16', '0000-00-00'),
(134, 'Actualizar políticas de privacidad', '2', '2024-04-05', 0, '2023-12-17', '0000-00-00'),
(135, 'Revisar estrategia de marketing', '1', '2024-04-07', 0, '2023-12-18', '0000-00-00'),
(136, 'Configurar sistema de respaldo', '0', '2024-04-09', 0, '2023-12-19', '0000-00-00'),
(137, 'Analizar tendencias de la industria', '2', '2024-04-11', 0, '2023-12-20', '0000-00-00'),
(138, 'Investigar nuevas oportunidades de negocio', '3', '2024-04-13', 0, '2023-12-21', '0000-00-00'),
(139, 'Preparar presentación ejecutiva', '1', '2024-04-15', 0, '2023-12-22', '0000-00-00'),
(140, 'Desarrollar estrategia de redes sociales', '2', '2024-04-17', 0, '2023-12-23', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
