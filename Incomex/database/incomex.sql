-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2023 a las 06:37:11
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `incomex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Pantalones'),
(2, 'Camisas'),
(3, 'Busos'),
(4, 'Sudaderas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_pedidos`
--

CREATE TABLE `lineas_pedidos` (
  `id` int(255) NOT NULL,
  `pedido_id` int(255) NOT NULL,
  `producto_id` int(255) NOT NULL,
  `unidades` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lineas_pedidos`
--

INSERT INTO `lineas_pedidos` (`id`, `pedido_id`, `producto_id`, `unidades`) VALUES
(1, 1, 5, 2),
(2, 2, 4, 1),
(3, 3, 4, 1),
(4, 4, 4, 1),
(5, 5, 4, 1),
(6, 6, 5, 1),
(7, 7, 5, 1),
(8, 8, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `coste` float(200,2) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `provincia`, `localidad`, `direccion`, `coste`, `estado`, `fecha`, `hora`) VALUES
(1, 2, 'Pichincha', 'Quito', 'Checa', 113.00, 'confirm', '2023-02-01', '00:46:14'),
(2, 2, 'Pichincha', 'Quito', 'quito', 76.56, 'confirm', '2023-02-01', '00:47:34'),
(3, 2, 'Quito', 'Quito', 'Checa', 76.56, 'confirm', '2023-02-01', '08:30:38'),
(4, 2, 'Quito', 'Quito', 'Checa', 76.56, 'confirm', '2023-02-01', '08:34:06'),
(5, 2, 'Pichincha', 'Quito', 'Checa', 76.56, 'confirm', '2023-02-01', '08:34:50'),
(6, 2, 'Pichincha', 'Quito', 'Checa', 56.50, 'confirm', '2023-02-01', '08:56:19'),
(7, 2, 'Pichincha', 'Quito', 'Checa', 56.50, 'confirm', '2023-02-01', '08:58:25'),
(8, 3, 'Checa', 'Quito', 'QUITO', 14.30, 'confirm', '2023-02-01', '23:53:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` float(100,2) NOT NULL,
  `stock` int(255) NOT NULL,
  `oferta` varchar(2) DEFAULT NULL,
  `fecha` date NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `oferta`, `fecha`, `imagen`) VALUES
(1, 2, 'Camisa THN', 'Prueba', 12.30, 26, NULL, '2023-02-01', 'camisa2.jpg'),
(2, 2, 'Camisa Ts', 'Prueba 2', 34.57, 156, NULL, '2023-02-01', 'camisa.png'),
(3, 1, 'Pantalon', 'Prueba', 14.30, 10, NULL, '2023-02-01', 'pantalon.png'),
(4, 3, 'Buso', 'Buso', 76.56, 56, NULL, '2023-02-01', 'buzo.png'),
(5, 4, 'Sudadera', 'Sudadera', 56.50, 100, NULL, '2023-02-01', 'sudadera.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(10) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `rol`, `imagen`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.com', '$2y$04$EEIIExLCmxJLu055wlSsFu2bh63KFPogTXU6nA.bwb4Aww5DWOAJ2', 'admin', NULL),
(2, 'pepito', 'pepito', 'pepito@gmail.com', '$2y$04$wbc77RkEOPWb9Lpd46vuyeVcY0rahvZSmo0jEmTPJP4NfQSLbwHv6', 'user', NULL),
(3, 'user', 'user', 'user@gmail.com', '$2y$04$vcD0/2n5hb.fwTNIe4bdyeUBcRVfCN0fU9U7pax23vk0VnQPKlyVu', 'user', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_linea_pedido` (`pedido_id`),
  ADD KEY `fk_linea_producto` (`producto_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedido_usuario` (`usuario_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_categoria` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  ADD CONSTRAINT `fk_linea_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `fk_linea_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedido_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
