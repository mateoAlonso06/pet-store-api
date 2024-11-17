-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2024 a las 01:18:33
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
(26, 'Alimento para Perro', 'Alimentos secos y húmedos para perros de todas las razas y tamaños.'),
(28, 'Juguete para Mascotas', 'Diversos tipos de juguetes interactivos y de entretenimiento para mascotas.'),
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
(46, 28, 'Croquetas Premium', 'Alimento seco para perros adultos', 250, 5, '2024-10-01', '2025-10-01', 100, 1),
(47, 28, 'Lata de Paté', 'Alimento húmedo para perros pequeños', 150, 1, '2024-11-15', '2025-11-15', 80, 2),
(48, 29, 'Pelota de Goma', 'Pelota resistente ideal para juegos interactivos', 50, 0, '2024-09-10', '2026-09-10', 200, 3),
(49, 29, 'Cuerda Trenzada', 'Juguete masticable para fortalecer dientes', 70, 0, '2024-08-05', '2026-08-05', 150, 4),
(50, 30, 'Cama Ortopédica', 'Cama ergonómica para perros grandes', 500, 8, '2024-06-20', '2026-06-20', 25, 5),
(51, 30, 'Colchón Acolchado', 'Colchón suave para gatos y perros pequeños', 300, 4, '2024-07-15', '2026-07-15', 40, 1),
(52, 31, 'Arnés Ajustable', 'Arnés cómodo y seguro para paseos', 120, 1, '2024-05-10', '2026-05-10', 50, 2),
(53, 31, 'Collar Reflectante', 'Collar con diseño seguro para la noche', 80, 0, '2024-04-01', '2026-04-01', 75, 3),
(54, 32, 'Shampoo Antipulgas', 'Shampoo especializado para eliminar pulgas', 90, 1, '2024-03-12', '2026-03-12', 60, 4),
(55, 32, 'Toallitas Húmedas', 'Toallitas para limpiar patas y pelaje', 40, 0, '2024-02-25', '2026-02-25', 100, 5),
(56, 33, 'Abrigo Impermeable', 'Abrigo resistente al agua para climas fríos', 200, 2, '2024-01-30', '2026-01-30', 30, 1),
(57, 33, 'Jersey de Lana', 'Ropa cálida y cómoda para mascotas', 150, 1, '2024-12-20', '2026-12-20', 45, 2),
(58, 34, 'Filtro para Acuario', 'Filtro de agua para acuarios de hasta 50L', 300, 3, '2024-11-01', '2026-11-01', 20, 3),
(59, 34, 'Decoración de Coral', 'Decoración realista para acuarios', 100, 1, '2024-10-10', '2026-10-10', 50, 4),
(60, 35, 'Jaula Metálica', 'Jaula resistente para aves pequeñas', 400, 6, '2024-09-15', '2026-09-15', 15, 5),
(61, 35, 'Transportadora Plegable', 'Transportadora ligera y fácil de usar', 350, 5, '2024-08-20', '2026-08-20', 25, 1),
(62, 28, 'Semillas Variadas', 'Mezcla de semillas para aves domésticas', 120, 2, '2024-07-01', '2026-07-01', 100, 2),
(63, 28, 'Barritas Energéticas', 'Snack nutritivo para aves', 80, 1, '2024-06-15', '2026-06-15', 70, 3);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
