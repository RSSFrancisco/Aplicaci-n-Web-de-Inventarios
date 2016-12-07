-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2016 a las 02:00:53
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_ehuico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_bitacora`
--

CREATE TABLE `tb_bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `usuario` char(250) NOT NULL DEFAULT '0',
  `accion` char(250) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_bitacora`
--

INSERT INTO `tb_bitacora` (`id_bitacora`, `usuario`, `accion`, `fecha`) VALUES
(1, 'admin', 'Edito el producto Canaleta', '2016-06-27 22:55:39'),
(2, 'admin', 'Edito el producto Hule Natural', '2016-06-27 22:56:34'),
(3, 'admin', 'Actualizo el Usuario con nombre Invitado', '2016-06-27 23:00:15'),
(4, 'admin', 'Elimino el Producto con ID 12', '2016-06-27 23:03:48'),
(5, 'admin', 'Elimino el Usuario con ID 12', '2016-06-27 23:06:49'),
(6, 'admin', 'Elimino La venta  con ID 11', '2016-06-27 23:08:46'),
(7, 'admin', 'Guardo un nuevo producto con Nombre ejemplo producto', '2016-06-27 23:12:02'),
(8, 'admin', 'Hizo una busqueda de: cadenas en java', '2016-06-27 23:19:36'),
(9, 'admin', 'Hizo una busqueda de: acero', '2016-06-27 23:19:54'),
(10, 'admin', 'Cerro sesiÃ³n en el sistema', '2016-06-27 23:20:46'),
(11, 'admin', 'Inicio sesiÃ³n en el sistema', '2016-06-27 23:21:07'),
(12, 'admin', 'Guardo un nuevo usuario con nombre: dasdsa', '2016-06-27 23:21:35'),
(13, 'admin', 'Guardo una nueva venta del cliente : asakj', '2016-06-27 23:22:03'),
(14, 'admin', 'Elimino La venta  con ID 50', '2016-06-27 23:22:28'),
(15, 'admin', 'Hizo una busqueda de: la patrona', '2016-06-27 23:22:49'),
(16, 'admin', 'Edito el producto Hule de Hypalon', '2016-06-27 23:23:20'),
(17, 'admin', 'Hizo una busqueda de: ventas', '2016-06-27 23:23:44'),
(18, 'admin', 'Hizo una busqueda de:', '2016-06-27 23:23:49'),
(19, 'admin', 'Hizo una busqueda de: informacion de ventas', '2016-06-27 23:24:27'),
(20, 'admin', 'Hizo una busqueda de: Canaleta', '2016-06-27 23:32:39'),
(21, 'admin', 'Hizo una busqueda de: canaleta', '2016-06-27 23:33:19'),
(22, 'admin', 'Elimino el Producto con ID 13', '2016-06-27 23:38:03'),
(23, 'admin', 'Cerro sesiÃ³n en el sistema', '2016-06-27 23:42:08'),
(24, 'admin', 'Inicio sesiÃ³n en el sistema', '2016-06-27 23:42:14'),
(25, 'admin', 'Cerro sesiÃ³n en el sistema', '2016-06-27 23:43:21'),
(26, 'admin', 'Inicio sesiÃ³n en el sistema', '2016-06-27 23:44:25'),
(27, 'admin', 'Cerro sesiÃ³n en el sistema', '2016-06-27 23:59:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_productos`
--

CREATE TABLE `tb_productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(300) DEFAULT NULL,
  `descripcion` text,
  `numero_parte` char(50) DEFAULT NULL,
  `costo` float DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `medidas` varchar(150) DEFAULT NULL,
  `material` varchar(300) DEFAULT NULL,
  `dureza` varchar(100) DEFAULT NULL,
  `imagen` mediumtext,
  `fecha_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_productos`
--

INSERT INTO `tb_productos` (`id_producto`, `nombre`, `descripcion`, `numero_parte`, `costo`, `precio`, `medidas`, `material`, `dureza`, `imagen`, `fecha_modificacion`) VALUES
(3, 'Canaleta', 'Sin Ninguna descripciÃ³n', '002', 1200, 122, '12 X .6', 'Acero', '2', 'imagenes/productos/canaletas-saneamiento-080302010.jpg', '2016-06-27 22:55:39'),
(4, 'Amortiguador', 'Ninguna', '01', 1200, 12, '25 x 18 centimetros', 'acero inoxidable', '3', 'imagenes/productos/vibraflot01b.jpg', '2016-06-23 07:04:01'),
(5, 'Hule neopreno', 'Faldon', '004', 3000, 233, '6 x 6 Metros', 'Neopreno', '1', 'imagenes/productos/hule_faldon.jpg', '2016-06-23 07:07:13'),
(7, 'Hule de nitrilo', 'Ninguna', '003', 4000, 443, '9 x 9 Metros', 'Nitrilo', '1', 'imagenes/productos/nitrilo.png', '2016-06-23 07:07:15'),
(8, 'Hule de Hypalon', 'Nigunas', '005', 5000, 455, '12 x 13 Metros', 'Hypalon', '2', 'imagenes/productos/Hypalon-Rolls-Hypalon-Sheets-Hypalon-Fabrics-for-Inflatable-Boats-Rafts-and-Life-Float.jpg', '2016-06-27 23:23:20'),
(9, 'Hule de Nordel', 'Ninguna', '006', 3400, 547, '10 x 6 Metros', 'Nordel', '3', 'imagenes/productos/nordel.jpg', '2016-06-23 07:07:20'),
(10, 'Hule Natural', 'Sin ninguna descripciÃ³n', '007', 2300, 234, '12 x 5 Metros', 'Hule Natural', '1', 'imagenes/productos/hulesnatural.jpg', '2016-06-27 22:56:34'),
(11, 'silicon', 'Ninguna', '004', 1212, 1233, '12 x 12 Centimetros', 'Silicon Natural', '4', 'imagenes/productos/silicon.jpg', '2016-06-23 07:27:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `telefono` char(50) DEFAULT NULL,
  `contrasenia` varchar(250) DEFAULT NULL,
  `tipo` char(90) DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  `fecha_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `nombre`, `usuario`, `correo`, `telefono`, `contrasenia`, `tipo`, `estado`, `fecha_modificacion`) VALUES
(10, 'admin', 'admin', 'root@gmail.com', '83475874365', 'MTIz', 'Administrador', b'0', '2016-06-27 23:59:53'),
(11, 'Invitado', 'Invitados', 'invitado@gmail.com', '435837', 'b3pvbm8z', 'Invitado', b'0', '2016-06-27 23:00:15'),
(13, 'dasdsa', 'sadsad', 'sadas', '3434', 'MTEx', 'Administrador', b'0', '2016-06-27 23:21:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ventas`
--

CREATE TABLE `tb_ventas` (
  `id_venta` int(11) NOT NULL,
  `factura` varchar(300) DEFAULT '0',
  `cliente` varchar(300) DEFAULT '0',
  `costo_molde` float DEFAULT '0',
  `costo_materiales` float DEFAULT '0',
  `costo_horno` float DEFAULT '0',
  `costo_prensa` float DEFAULT '0',
  `total` float DEFAULT '0',
  `fecha_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_ventas`
--

INSERT INTO `tb_ventas` (`id_venta`, `factura`, `cliente`, `costo_molde`, `costo_materiales`, `costo_horno`, `costo_prensa`, `total`, `fecha_modificacion`) VALUES
(2, '12312312312', 'Maseca', 3000, 2000, 8900.9, 2300.9, 2466, '2016-06-25 21:13:33'),
(3, '75467674365', 'La patrona', 2000, 2333, 8769, 576.9, 0, '2016-06-03 04:20:29'),
(4, '632466236', 'Ingenio San Nicolas', 1212, 1213, 4444, 5566, 0, '2016-06-03 05:14:02'),
(5, '324324', 'Potrero', 2323, 2323, 2323, 232, 0, '2016-06-03 05:22:42'),
(6, '666666', 'nuevo', 7676, 76767, 667, 6676, 0, '2016-06-03 05:36:53'),
(7, '23423423', 'ingenio oaxaca', 324, 324, 234, 234, 0, '2016-06-03 07:35:31'),
(8, '123123', 'ingenio azucarero', 23544, 324324, 32432, 324324, 0, '2016-06-03 07:51:03'),
(9, '3465346878787', 'Ingenio cordoba', 324, 43, 34, 343, 0, '2016-06-03 08:03:04'),
(14, '3423425', 'asdd', 34, 34, 34, 34, 2466, '2016-06-25 21:11:38'),
(15, '436574657', 'sadhg', 454, 455, 45, 45, 0, '2016-06-15 21:24:42'),
(16, '345435', 'dfdwsf', 4545, 43545, 4545, 545, 0, '2016-06-15 21:39:53'),
(17, '3434', 'dsfdf', 343, 34, 34, 334, 0, '2016-06-15 22:02:59'),
(18, '23432432', 'ninguno', 343.56, 349.9, 1234, 89.9, 0, '2016-06-16 18:11:46'),
(19, 'r5435345', 'sdfdf', 45, 45, 66.8, 89.7, 0, '2016-06-16 18:28:23'),
(20, '345354', 'sadsad', 78.9, 67.9, 667, 675, 0, '2016-06-16 18:29:18'),
(21, '12121', 'asas', 1, 1, 1, 1, 0, '2016-06-16 18:32:48'),
(22, '2323', 'sadas', 1, 1, 1, 1, 0, '2016-06-16 18:45:05'),
(23, '234234', 'asas', 1, 1, 1, 1, 0, '2016-06-16 18:48:52'),
(24, '343434', 'asas', 12, 12, 12, 12, 0, '2016-06-16 19:31:41'),
(25, '34343434', 'ninguno', 437, 345.9, 455, 456, 0, '2016-06-18 06:06:21'),
(26, '3432432', 'ssadasd', 12, 121, 12, 12, 0, '2016-06-18 06:20:27'),
(27, '324324', 'sadsad', 324, 324, 324, 234, 0, '2016-06-18 06:45:12'),
(28, '324234', 'asdsad', 3434, 343, 343, 34, 0, '2016-06-18 06:54:09'),
(29, '234234', 'sdfsdf', 234, 324, 234, 234, 666, '2016-06-18 06:55:56'),
(30, '4535', 'dfd', 435, 435, 435, 43, 666, '2016-06-18 07:03:46'),
(31, '324324', 'sadsa', 213, 123, 123, 123, 649, '2016-06-18 07:04:57'),
(32, '1212', 'asdsad', 324234, 324, 32324, 324, 0, '2016-06-18 07:08:28'),
(33, '32432432', 'asdsad', 343, 234, 324, 324, 0, '2016-06-18 17:20:19'),
(34, '232', 'sdad', 324, 234, 324, 324, 0, '2016-06-18 17:23:34'),
(35, 'ewrewr', 'sdfdfdf', 34543500, 43543, 43543, 435, 0, '2016-06-18 17:27:17'),
(36, '324234', 'asdasd', 34543, 345, 34543, 5435, 0, '2016-06-18 17:32:18'),
(37, '34324', 'sdad', 3243, 234, 324, 324, 4393, '2016-06-18 17:39:47'),
(38, '435345', 'sadsad', 45.9, 67.9, 87.89, 343.5, 1215.19, '2016-06-19 15:47:11'),
(39, '12312', 'asd', 324, 234, 324, 34, 0, '2016-06-23 06:47:28'),
(40, '4543534', 'sdsdf', 34343, 3434, 343, 343, 0, '2016-06-23 06:49:00'),
(41, '76343646', 'nueva venta', 67, 34, 34, 34, 169, '2016-06-23 06:51:42'),
(42, '342234324', 'cliente nuevo ', 23, 233, 232, 232, 0, '2016-06-23 06:54:51'),
(43, '34234234', 'prueba mil', 3434, 343, 34, 34, 0, '2016-06-23 07:00:48'),
(44, '34234', 'dsfsdf', 34, 3, 3, 3, 0, '2016-06-23 07:02:35'),
(47, '5464565', 'Nuevo', 1233, 1212, 1212, 121, 803995, '2016-06-23 07:28:52'),
(48, '3244324', 'nada nada', 3847870, 977, 8787, 8787, 0, '2016-06-27 19:38:41'),
(49, '435345', 'dsfdsf', 43534, 43543.9, 435, 435, 91646.9, '2016-06-27 19:51:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ventas_productos`
--

CREATE TABLE `tb_ventas_productos` (
  `id_venta_producto` int(11) NOT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `fecha_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_ventas_productos`
--

INSERT INTO `tb_ventas_productos` (`id_venta_producto`, `id_venta`, `id_producto`, `cantidad`, `subtotal`, `fecha_modificacion`) VALUES
(1, 8, 1, 2, 0, '2016-06-03 07:51:13'),
(2, 9, 1, 3, 0, '2016-06-03 08:03:09'),
(8, 14, 1, 5, NULL, '2016-06-15 04:30:22'),
(9, 17, 1, 45, 3015, '2016-06-15 22:04:20'),
(10, 17, 2, 79, 5293, '2016-06-15 22:05:00'),
(11, 18, 1, 2, 134, '2016-06-16 18:27:45'),
(12, 18, 2, 1, 67, '2016-06-16 18:26:28'),
(13, 18, 0, 3, 201, '2016-06-16 18:27:19'),
(14, 20, 1, 2, 134, '2016-06-16 18:31:53'),
(15, 21, 1, 1, 67, '2016-06-16 18:32:55'),
(16, 22, 1, 3, 201, '2016-06-16 18:45:32'),
(17, 22, 2, 2, 134, '2016-06-16 18:46:24'),
(18, 23, 1, 121, 8107, '2016-06-16 18:59:44'),
(19, 23, 0, 2, 134, '2016-06-16 18:52:50'),
(20, 23, 2, 2, 134, '2016-06-16 18:56:48'),
(21, 24, 1, 1, 67, '2016-06-16 19:36:33'),
(22, 24, 2, 1, 67, '2016-06-16 19:37:28'),
(23, 25, 1, 2, 134, '2016-06-18 06:18:50'),
(24, 26, 1, 1, 67, '2016-06-18 06:20:37'),
(25, 26, 2, 6, 402, '2016-06-18 06:23:26'),
(26, 27, 1, 12, 804, '2016-06-18 06:45:23'),
(27, 28, 2, 1, 67, '2016-06-18 06:54:16'),
(28, 29, 0, 2, 134, '2016-06-18 06:55:50'),
(29, 29, 1, 2, 134, '2016-06-18 06:55:53'),
(30, 30, 1, 1, 67, '2016-06-18 07:03:44'),
(31, 31, 2, 1, 67, '2016-06-18 07:04:55'),
(32, 32, 1, 23, 1541, '2016-06-18 07:10:54'),
(33, 32, 2, 8, 536, '2016-06-18 07:11:57'),
(34, 33, 1, 2, 134, '2016-06-18 17:20:33'),
(35, 34, 1, 2, 134, '2016-06-18 17:23:42'),
(36, 35, 1, 4, 268, '2016-06-18 17:27:23'),
(37, 35, 2, 1, 67, '2016-06-18 17:30:36'),
(38, 36, 1, 2, 134, '2016-06-18 17:32:25'),
(40, 37, 2, 2, 134, '2016-06-18 17:36:34'),
(41, 38, 1, 2, 134, '2016-06-19 15:46:48'),
(42, 38, 2, 8, 536, '2016-06-19 15:46:57'),
(46, 47, 11, 4, 4932, '2016-06-25 04:55:54'),
(47, 47, 4, 2, 2466, '2016-06-23 07:28:26'),
(48, 47, 5, 78, 96174, '2016-06-23 07:28:34'),
(49, 47, 8, 567, 699111, '2016-06-23 07:28:44'),
(50, 47, 7, 12, 14796, '2016-06-25 04:57:15'),
(51, 14, 4, 2, 2466, '2016-06-25 21:11:34'),
(52, 2, 5, 2, 2466, '2016-06-25 21:13:31'),
(53, 3, 4, 3, 3699, '2016-06-26 01:46:16'),
(54, 39, 5, 3, 3699, '2016-06-26 01:56:58'),
(55, 49, 3, 3, 3699, '2016-06-27 19:51:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_bitacora`
--
ALTER TABLE `tb_bitacora`
  ADD PRIMARY KEY (`id_bitacora`);

--
-- Indices de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- Indices de la tabla `tb_ventas_productos`
--
ALTER TABLE `tb_ventas_productos`
  ADD PRIMARY KEY (`id_venta_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_bitacora`
--
ALTER TABLE `tb_bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `tb_ventas_productos`
--
ALTER TABLE `tb_ventas_productos`
  MODIFY `id_venta_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
