-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-11-2023 a las 22:52:32
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gitex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Audifonos'),
(2, 'Cargadores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nit` varchar(20) NOT NULL,
  `razon` varchar(50) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nit`, `razon`, `telefono`, `compras`, `ultima_compra`) VALUES
(1, '0', 'SIN NOMBRE', '', 4, '2023-03-09 21:22:38'),
(2, '7844570', 'Rodrigo Fortunatty', '', 0, '0000-00-00 00:00:00'),
(3, '7712988', 'Jeffrey Valdivia Flores', '78419108', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `imagen` text NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `fecha`, `id_categoria`) VALUES
(1, '101', 'JBL E500BT Wireless Ear Headphones Bluetooth Headset Super Bass Gaming Earphone', 'vistas/img/productos/101/232.jpg', 87, 90, 126, '2023-03-10 02:22:37', 1),
(2, '201', 'SAMSUNG', 'vistas/img/productos/201/322.jpg', 100, 50, 120, '2023-03-10 02:25:45', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `perfil` varchar(20) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `foto` text NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `estado`, `foto`, `ultimo_login`, `fecha`) VALUES
(1, 'Joel Meneses', 'gitex', '$2a$07$asxx54ahjppf45sd87a5auTOJpISPhYV.kPTuobvjo2/G4YP64DGS', 'Administrador', 1, '', '2023-11-28 21:01:54', '2023-11-29 02:01:54'),
(2, 'Jeffrey', 'jeffrey', '$2a$07$asxx54ahjppf45sd87a5auV0nUcnFElJiZHa3OqXy2qiL1gMsCEpq', 'Administrador', 1, 'vistas/img/usuarios/jeffrey/703.jpg', '2023-11-28 21:12:49', '2023-11-29 02:12:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `productos` text NOT NULL,
  `metodo_pago` varchar(20) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` float NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `impuesto`, `neto`, `productos`, `metodo_pago`, `fecha`, `total`, `id_cliente`, `id_vendedor`) VALUES
(1, 10001, 0, 126, '[{\"id\":\"1\",\"descripcion\":\"JBL E500BT Wireless Ear Headphones Bluetooth Headset Super Bass Gaming Earphone\",\"cantidad\":\"1\",\"stock\":\"89\",\"precio\":\"126\",\"total\":\"126\"}]', 'Efectivo', '2023-03-09 05:49:11', 126, 2, 1),
(2, 10002, 0, 252, '[{\"id\":\"1\",\"descripcion\":\"JBL E500BT Wireless Ear Headphones Bluetooth Headset Super Bass Gaming Earphone\",\"cantidad\":\"2\",\"stock\":\"87\",\"precio\":\"126\",\"total\":\"252\"}]', 'Efectivo', '2023-03-10 02:22:38', 252, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
