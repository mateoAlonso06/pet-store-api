-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2024 a las 19:52:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_mascotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`) VALUES
(26, 'Alimento para Perros', 'Alimentos secos y húmedos para perros de todas las razas y tamaños.'),
(28, 'Juguetes para Mascotas', 'Diversos tipos de juguetes interactivos y de entretenimiento para mascotas.'),
(29, 'Camas y Colchones', 'Camas cómodas y duraderas para perros y gatos de todas las edades.'),
(30, 'Accesorios para Paseo', 'Correas, collares y arneses para pasear de forma segura a tus mascotas.'),
(31, 'Productos de Higiene', 'Shampoos, acondicionadores y artículos de limpieza para mantener la higiene de las mascotas.'),
(32, 'Ropa para Mascotas', 'Prendas y accesorios para proteger y vestir a tus mascotas con estilo.'),
(33, 'Accesorios para Acuarios', 'Equipos y decoraciones para acuarios de agua dulce y salada.'),
(34, 'Jaulas y Transportadoras', 'Jaulas y transportadoras seguras y cómodas para el traslado de mascotas.'),
(35, 'Alimento para Aves', 'Comida variada y equilibrada para aves domésticas y exóticas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `peso_neto` decimal(10,0) NOT NULL,
  `fecha_empaquetado` date NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `nombre`, `descripcion`, `precio`, `peso_neto`, `fecha_empaquetado`, `fecha_vencimiento`, `stock`, `id_proveedor`) VALUES
(29, 30, 'Collar rosa', 'Collar rosa para darle el estilo que necesito tu perro', 10000, 1, '2024-10-27', NULL, 10, 1),
(30, 26, 'Alimento Seco Perro Adulto', 'Alimento balanceado para perros adultos de todas las razas', 1500, 3, '2024-10-01', '2025-10-01', 30, 1),
(32, 28, 'Pelota Interactiva para Mascot', 'Pelota de goma para entretener a tu mascota por horas', 500, 0, '2024-08-20', NULL, 100, 3),
(33, 29, 'Cama Acolchonada para Perros', 'Cama de tamaño mediano para perros de hasta 20 kg', 2000, 3, '2024-07-10', NULL, 20, 4),
(34, 30, 'Collar Rosa', 'Collar rosa para darle el estilo que necesita tu perro', 10000, 1, '2024-10-27', NULL, 10, 1),
(35, 31, 'Shampoo para Mascotas', 'Shampoo suave para el pelaje de perros y gatos', 1200, 0, '2024-06-05', '2025-06-05', 60, 5),
(36, 32, 'Abrigo para Perro', 'Abrigo de lana para perro, ideal para el invierno', 1500, 0, '2024-05-01', NULL, 15, 2),
(37, 33, 'Decoración de Acuario', 'Piedras decorativas para acuarios de agua dulce', 300, 2, '2024-03-25', NULL, 100, 3),
(38, 34, 'Transportadora Mediana', 'Transportadora de plástico resistente para gatos y perros pequeños', 5000, 2, '2024-02-10', NULL, 5, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre`, `telefono`, `direccion`) VALUES
(1, 'Mascotas Felices S.A.', '2494 363525', 'Calle Pinto 1500, Tandil'),
(2, 'Todo para tu Mascota', '2266 6856484', 'Reforma universitaria, 1300'),
(3, 'Distribuidora Animalia', '223 654648668', 'Av Pedro Luro 3500, Mar del Plata'),
(4, 'Pet Supplies Inc.', '2005 5653268', 'Buzon 790, Tandil'),
(5, 'Cuidado Animal', '2494 65446', 'Av primera junta, Bs As');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `rol`, `password`) VALUES
(9, 'webadmin', 'admin', '$2y$10$uOAwkc.9KdjLc27nxVr3pOnk.4JjY2rZahkaIkCmL9Rm0lqP6PP8G'),
(10, 'mateo', 'user', '$2y$10$qeSJsTlft/KJ.BR3hhTfe.qk.pT.GTeQb.Y3DRykcghZyCPGoeJDG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
