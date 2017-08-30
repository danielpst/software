-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2017 a las 22:22:54
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `alcaldia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acl`
--

CREATE TABLE IF NOT EXISTS `acl` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`ai`),
  KEY `action_id` (`action_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acl_actions`
--

CREATE TABLE IF NOT EXISTS `acl_actions` (
  `action_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `action_desc` varchar(100) NOT NULL COMMENT 'Human readable description',
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`action_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acl_categories`
--

CREATE TABLE IF NOT EXISTS `acl_categories` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `category_desc` varchar(100) NOT NULL COMMENT 'Human readable description',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_code` (`category_code`),
  UNIQUE KEY `category_desc` (`category_desc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_sessions`
--

CREATE TABLE IF NOT EXISTS `auth_sessions` (
  `id` varchar(128) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auth_sessions`
--

INSERT INTO `auth_sessions` (`id`, `user_id`, `login_time`, `modified_at`, `ip_address`, `user_agent`) VALUES
('mhblh55h66gkq5kdv0hti4tv90fcug16', 1375265633, '2017-05-27 19:05:36', '2017-05-27 17:30:00', '::1', 'Chrome 58.0.3029.110 on Windows 7'),
('a1m2pv7n11756j7gjs2nho7uks9ba7e6', 1375265633, '2017-05-23 23:54:33', '2017-05-23 22:17:23', '::1', 'Chrome 58.0.3029.110 on Windows 7'),
('qqbaaubfiqbr65ln2j6to4mjevhmcv9m', 1375265633, '2017-05-21 15:31:25', '2017-05-21 16:04:58', '::1', 'Chrome 58.0.3029.110 on Windows 7'),
('kjs04q3kn24i356ha3qekocjafumok2u', 1375265633, '2017-05-21 20:51:44', '2017-05-21 21:25:09', '::1', 'Chrome 58.0.3029.110 on Windows 7'),
('ltbrq7ughv4uo53gihttbfkeoj77btuc', 1152185043, '2017-08-12 00:05:27', '2017-08-11 23:12:42', '::1', 'Chrome 60.0.3112.90 on Windows 7'),
('7hhmi0ehlop12du12cvdua1okenbhme1', 1152185043, '2017-08-12 18:24:34', '2017-08-12 16:41:09', '::1', 'Chrome 60.0.3112.90 on Windows 7'),
('dca00bd8meml046ekq16div4avlfrpeg', 1152185043, '2017-08-14 03:35:08', '2017-08-14 03:02:23', '::1', 'Chrome 60.0.3112.90 on Windows 7'),
('002qim6ma8khdbno9c0urnp2ie0pocf3', 1152185043, '2017-08-14 12:39:15', '2017-08-14 12:07:30', '::1', 'Chrome 60.0.3112.90 on Windows 7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_programa`
--

CREATE TABLE IF NOT EXISTS `cat_programa` (
  `nombre` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_programa`
--

INSERT INTO `cat_programa` (`nombre`) VALUES
('ACTUALIZACION'),
('FORMATEO'),
('Office'),
('RECOVERY'),
('Sistema Operativo'),
('Varios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_red`
--

CREATE TABLE IF NOT EXISTS `configuracion_red` (
  `id_placa` int(7) NOT NULL DEFAULT '0',
  `nombre_equipo` varchar(15) DEFAULT NULL,
  `dominio` varchar(20) DEFAULT NULL,
  `en_red` tinyint(1) DEFAULT NULL,
  `id_nombre_red` varchar(20) DEFAULT NULL,
  `dhcp` tinyint(1) DEFAULT NULL,
  `ip_fija` varchar(16) DEFAULT NULL,
  `mac_fija` varchar(20) DEFAULT NULL,
  `mac_inalambrica` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_placa`),
  KEY `id_nombre_red` (`id_nombre_red`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion_red`
--

INSERT INTO `configuracion_red` (`id_placa`, `nombre_equipo`, `dominio`, `en_red`, `id_nombre_red`, `dhcp`, `ip_fija`, `mac_fija`, `mac_inalambrica`) VALUES
(9876, 'SISTEMAS-2', 'Alcaldia.Local', 1, 'Alcaldia', 0, '192.168.1.41', '98:87:76:54:43', '12:23:34:45:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denied_access`
--

CREATE TABLE IF NOT EXISTS `denied_access` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  `reason_code` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencia`
--

CREATE TABLE IF NOT EXISTS `dependencia` (
  `nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dependencia`
--

INSERT INTO `dependencia` (`nombre`) VALUES
('PERSONERIA'),
('SRIA. COMUNICACIONES'),
('SRIA. DE AGRICULTURA'),
('SRIA. DE DLLO. COMUNITARIO'),
('SRIA. DE HACIENDA'),
('SRIA. DE PLANEACION'),
('SRIA. DE PLANEACION - CATASTRO'),
('SRIA. DE SALUD Y P.S'),
('SRIA. DE SALUD Y P.S - SANIDAD'),
('SRIA. G.H Y SERVICIOS ADMIN.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `placa` int(7) NOT NULL,
  `id_tipo_equipo` varchar(15) DEFAULT NULL,
  `id_marca_equipo` varchar(15) DEFAULT NULL,
  `id_estado_equipo` varchar(10) DEFAULT NULL,
  `referencia` varchar(20) DEFAULT NULL,
  `serial` varchar(20) NOT NULL,
  `producto_nro` varchar(20) DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `imagen` varchar(20) NOT NULL,
  `folio_nro` int(3) DEFAULT NULL,
  `hoja_fisica` varchar(20) DEFAULT NULL,
  `inst_fisicos` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`placa`),
  UNIQUE KEY `serial` (`serial`),
  KEY `id_tipo_equipo` (`id_tipo_equipo`),
  KEY `id_marca_equipo` (`id_marca_equipo`),
  KEY `id_estado_equipo` (`id_estado_equipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`placa`, `id_tipo_equipo`, `id_marca_equipo`, `id_estado_equipo`, `referencia`, `serial`, `producto_nro`, `fecha_compra`, `imagen`, `folio_nro`, `hoja_fisica`, `inst_fisicos`) VALUES
(9876, 'Cómputo', 'HP', 'Alta', 'ProOne 400 G2', 'XMLSTRDO11', 'XMLSTRDO11#095', '2017-06-15', '9876.png', 15, 'HV_0009876.pdf', 'CD con recovery, Cd con drivers e instalador de officce');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_equipo`
--

CREATE TABLE IF NOT EXISTS `estado_equipo` (
  `estado` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_equipo`
--

INSERT INTO `estado_equipo` (`estado`) VALUES
('Alta'),
('Baja'),
('Reparación'),
('Sin Uso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hardware`
--

CREATE TABLE IF NOT EXISTS `hardware` (
  `id_placa` int(7) NOT NULL,
  `procesador` varchar(60) DEFAULT NULL,
  `marca_disco` varchar(25) DEFAULT NULL,
  `capacidad_disco` varchar(6) DEFAULT NULL,
  `capacidad_ram` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_placa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hardware`
--

INSERT INTO `hardware` (`id_placa`, `procesador`, `marca_disco`, `capacidad_disco`, `capacidad_ram`) VALUES
(9876, 'Intel Core i7 @ 3.20Ghz 3.10GHz', 'Hitachi', '1 TB', '4 GB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ips_on_hold`
--

CREATE TABLE IF NOT EXISTS `ips_on_hold` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_errors`
--

CREATE TABLE IF NOT EXISTS `login_errors` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username_or_email` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `login_errors`
--

INSERT INTO `login_errors` (`ai`, `username_or_email`, `ip_address`, `time`) VALUES
(22, 'daperezsa', '::1', '2017-08-12 18:24:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_equipo`
--

CREATE TABLE IF NOT EXISTS `marca_equipo` (
  `nombre` varchar(25) NOT NULL DEFAULT '',
  `logo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca_equipo`
--

INSERT INTO `marca_equipo` (`nombre`, `logo`) VALUES
('HP', '123'),
('LEnovo', '12545');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE IF NOT EXISTS `programas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `logo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `nombre`, `categoria`, `logo`) VALUES
(1, 'RECOVERY', 'RECOVERY', 'recovery.png'),
(19, 'Windows 7 Professional x 64 Bits', 'Sistema Operativo', 'logo_win7Prox64.jpg'),
(20, 'Office 2016 Hogar y Empresas', 'Office', 'Office2016HyE.jpg'),
(21, 'Winrar x64 Bits', 'Varios', 'winrarx64bits.jpg'),
(22, 'Adobe Reader', 'Varios', 'AdobeReader.jpg'),
(23, 'Google Chrome', 'Varios', 'descarga.jpg'),
(25, 'RECOVERY', 'RECOVERY', 'recovery1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prog_x_equi`
--

CREATE TABLE IF NOT EXISTS `prog_x_equi` (
  `id_programa` int(11) NOT NULL,
  `id_placa` int(7) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_instalacion` date NOT NULL,
  `serial` varchar(50) DEFAULT NULL,
  `fecha_desistalacion` date DEFAULT NULL,
  `original` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_programa`,`id_placa`),
  KEY `id_placa` (`id_placa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prog_x_equi`
--

INSERT INTO `prog_x_equi` (`id_programa`, `id_placa`, `estado`, `fecha_instalacion`, `serial`, `fecha_desistalacion`, `original`) VALUES
(1, 9876, 1, '2017-07-21', NULL, NULL, 1),
(19, 9876, 1, '2017-07-21', '88XJB-7KMP9-9HX2V-PYKKK-KWB44', NULL, 1),
(20, 9876, 1, '2017-07-24', 'KKXJB-7KMP9-9HX2V-PYKKK-KWB44', NULL, 1),
(21, 9876, 1, '2017-08-21', NULL, NULL, 1),
(22, 9876, 1, '2017-08-08', NULL, NULL, 1),
(23, 9876, 1, '2017-08-21', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes`
--

CREATE TABLE IF NOT EXISTS `redes` (
  `nombre` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `redes`
--

INSERT INTO `redes` (`nombre`) VALUES
('Alcaldia'),
('Sede 2 - Comunicaciones'),
('Sede 3-Agricultura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE IF NOT EXISTS `responsable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_placa` int(7) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `id_dependencia` varchar(40) NOT NULL,
  `fecha_asignacion` date NOT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `observacion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_dependencia` (`id_dependencia`),
  KEY `id_placa` (`id_placa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`id`, `id_placa`, `nombre`, `id_dependencia`, `fecha_asignacion`, `fecha_entrega`, `observacion`) VALUES
(2, 9876, 'Daniel Perez', 'SRIA. DE DLLO. COMUNITARIO', '2017-08-24', NULL, 'equipo lo usa juan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte`
--

CREATE TABLE IF NOT EXISTS `soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_placa` int(7) NOT NULL,
  `fecha` date NOT NULL,
  `falla` varchar(200) NOT NULL,
  `actividad_realizada` varchar(200) NOT NULL,
  `solucionado` tinyint(4) DEFAULT '1',
  `evidencia` varchar(30) DEFAULT NULL,
  `folio_evidencia` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_placa` (`id_placa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `soporte`
--

INSERT INTO `soporte` (`id`, `id_placa`, `fecha`, `falla`, `actividad_realizada`, `solucionado`, `evidencia`, `folio_evidencia`) VALUES
(3, 9876, '2017-08-21', 'Falta SOftware', 'Instalar Software', 1, 'SO_0009876_2017-08-21.pdf', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipo`
--

CREATE TABLE IF NOT EXISTS `tipo_equipo` (
  `nombre` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_equipo`
--

INSERT INTO `tipo_equipo` (`nombre`) VALUES
('Cómputo'),
('Impresora'),
('Multifuncional'),
('Pantalla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `username_or_email_on_hold`
--

CREATE TABLE IF NOT EXISTS `username_or_email_on_hold` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username_or_email` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL,
  `username` varchar(12) DEFAULT NULL,
  `nombre` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `auth_level` tinyint(3) unsigned NOT NULL,
  `banned` enum('0','1') NOT NULL DEFAULT '0',
  `passwd` varchar(60) NOT NULL,
  `passwd_recovery_code` varchar(60) DEFAULT NULL,
  `passwd_recovery_date` datetime DEFAULT NULL,
  `passwd_modified_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `nombre`, `email`, `auth_level`, `banned`, `passwd`, `passwd_recovery_code`, `passwd_recovery_date`, `passwd_modified_at`, `last_login`, `created_at`, `modified_at`) VALUES
(1152185043, 'admin', 'Daniel Perez Sanchez', 'daperezsat@example.com', 9, '0', '$2y$11$gtGmVDpI45yDj.mjE1qaS.hTdQyp3ByPrLxCMPQj8V7AHwHXsvahy', '$2y$11$JEUCEqRd23MaUqYTKarW6e5F2FPIBkmSIhyQ6b2P8KMOcbGW9AYIO', '2017-05-08 18:08:42', '2017-08-11 17:03:24', '2017-08-14 12:39:15', '2017-05-01 18:54:24', '2017-08-14 10:39:15');

--
-- Disparadores `users`
--
DROP TRIGGER IF EXISTS `ca_passwd_trigger`;
DELIMITER //
CREATE TRIGGER `ca_passwd_trigger` BEFORE UPDATE ON `users`
 FOR EACH ROW BEGIN
    IF ((NEW.passwd <=> OLD.passwd) = 0) THEN
        SET NEW.passwd_modified_at = NOW();
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_equipo`
--

CREATE TABLE IF NOT EXISTS `usuario_equipo` (
  `id_placa` int(7) NOT NULL DEFAULT '0',
  `nombre` varchar(20) NOT NULL DEFAULT '',
  `contrasena` varchar(10) DEFAULT NULL,
  `id_tipo_usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_placa`,`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_equipo`
--

INSERT INTO `usuario_equipo` (`id_placa`, `nombre`, `contrasena`, `id_tipo_usuario`) VALUES
(9876, 'Administrador', 'AGu4rne318', 'Administrador'),
(9876, 'Invitado', 'ninguna', 'Usuario Estandar');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acl`
--
ALTER TABLE `acl`
  ADD CONSTRAINT `acl_ibfk_1` FOREIGN KEY (`action_id`) REFERENCES `acl_actions` (`action_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `acl_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `acl_actions`
--
ALTER TABLE `acl_actions`
  ADD CONSTRAINT `acl_actions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `acl_categories` (`category_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `configuracion_red`
--
ALTER TABLE `configuracion_red`
  ADD CONSTRAINT `configuracion_red_ibfk_1` FOREIGN KEY (`id_placa`) REFERENCES `equipo` (`placa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `configuracion_red_ibfk_2` FOREIGN KEY (`id_nombre_red`) REFERENCES `redes` (`nombre`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`id_tipo_equipo`) REFERENCES `tipo_equipo` (`nombre`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_ibfk_2` FOREIGN KEY (`id_marca_equipo`) REFERENCES `marca_equipo` (`nombre`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_ibfk_3` FOREIGN KEY (`id_estado_equipo`) REFERENCES `estado_equipo` (`estado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `hardware`
--
ALTER TABLE `hardware`
  ADD CONSTRAINT `hardware_ibfk_1` FOREIGN KEY (`id_placa`) REFERENCES `equipo` (`placa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `programas_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `cat_programa` (`nombre`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `prog_x_equi`
--
ALTER TABLE `prog_x_equi`
  ADD CONSTRAINT `prog_x_equi_ibfk_1` FOREIGN KEY (`id_placa`) REFERENCES `equipo` (`placa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prog_x_equi_ibfk_2` FOREIGN KEY (`id_programa`) REFERENCES `programas` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `responsable_ibfk_1` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencia` (`nombre`) ON UPDATE CASCADE,
  ADD CONSTRAINT `responsable_ibfk_2` FOREIGN KEY (`id_placa`) REFERENCES `equipo` (`placa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD CONSTRAINT `soporte_ibfk_1` FOREIGN KEY (`id_placa`) REFERENCES `equipo` (`placa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_equipo`
--
ALTER TABLE `usuario_equipo`
  ADD CONSTRAINT `usuario_equipo_ibfk_1` FOREIGN KEY (`id_placa`) REFERENCES `equipo` (`placa`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
