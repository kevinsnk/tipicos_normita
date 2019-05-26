-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2019 a las 20:47:40
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tipicos_normita`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_empleado`
--

CREATE TABLE `cargo_empleado` (
  `ID_CARGO` int(11) NOT NULL,
  `NOMBRE_CARGO` varchar(45) NOT NULL,
  `SALARIO` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo_empleado`
--

INSERT INTO `cargo_empleado` (`ID_CARGO`, `NOMBRE_CARGO`, `SALARIO`) VALUES
(1, 'Mesero', 200.00),
(2, 'Cajero', 215.00),
(3, 'Bodeguero', 220.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_CATEGORIA` int(11) NOT NULL,
  `NOMBRE_CATEGORIA` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_CATEGORIA`, `NOMBRE_CATEGORIA`) VALUES
(1, 'Almuerzo'),
(2, 'Cena'),
(3, 'Desayuno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combos`
--

CREATE TABLE `combos` (
  `ID_COMBO` int(11) NOT NULL,
  `NOMBRE_COMBO` varchar(45) NOT NULL,
  `TIPO_COMBO` int(11) NOT NULL,
  `PRECIO` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `ID_EMPLEADO` int(11) NOT NULL,
  `NOMBRE` varchar(40) NOT NULL,
  `APELLIDO` varchar(50) NOT NULL,
  `DUI` varchar(10) NOT NULL,
  `NIT` varchar(17) NOT NULL,
  `TEL1` varchar(9) NOT NULL,
  `TEL2` varchar(9) NOT NULL,
  `FECHANAC` date NOT NULL,
  `DIRECCION` varchar(40) NOT NULL,
  `ESTADO_EMPLEADO` int(11) NOT NULL,
  `CARGO` int(11) NOT NULL,
  `USUARIO` varchar(20) DEFAULT NULL,
  `CONTRA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`ID_EMPLEADO`, `NOMBRE`, `APELLIDO`, `DUI`, `NIT`, `TEL1`, `TEL2`, `FECHANAC`, `DIRECCION`, `ESTADO_EMPLEADO`, `CARGO`, `USUARIO`, `CONTRA`) VALUES
(2, 'Kevin Nicolas', 'Santos', '000002331', '1022112211', '23001056', '78664433', '1996-11-20', 'San Salvador', 1, 2, NULL, NULL),
(4, 'Luis', 'Melendez', '3333333', '99999999', '88778899', '34567890', '2019-05-21', 'ufg', 2, 3, NULL, NULL),
(5, 'Javier', 'Coto', '00000000', '2121212121', '11234455', '3332211', '2019-05-14', 'UFGavidia', 1, 2, NULL, NULL),
(6, 'Elmer', 'Duran', '00000011', '12121212121', '23001056', '78664433', '2019-05-06', 'UFGavidia', 1, 1, 'javi12', '112233');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_empleado`
--

CREATE TABLE `estado_empleado` (
  `ID_ESTADO_EMPLEADO` int(11) NOT NULL,
  `ESTADO_EMPLEADO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_empleado`
--

INSERT INTO `estado_empleado` (`ID_ESTADO_EMPLEADO`, `ESTADO_EMPLEADO`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_mesa`
--

CREATE TABLE `estado_mesa` (
  `ID_ESTADO_MESA` int(11) NOT NULL,
  `ESTADO_ORDEN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_orden`
--

CREATE TABLE `estado_orden` (
  `ID_ESTADO_ORDEN` int(11) NOT NULL,
  `ESTADO_ORDEN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_ticket`
--

CREATE TABLE `estado_ticket` (
  `ID_ESTADO_TICKET` int(11) NOT NULL,
  `ESTADO_TICKET` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente`
--

CREATE TABLE `ingrediente` (
  `ID_INGREDIENTES` int(11) NOT NULL,
  `INGREDIENTE` varchar(75) DEFAULT NULL,
  `PRESENTACION` varchar(60) DEFAULT NULL,
  `VENCIMIENTO` varchar(45) DEFAULT NULL,
  `MARCA` int(11) NOT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `TIPO_UNIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingrediente`
--

INSERT INTO `ingrediente` (`ID_INGREDIENTES`, `INGREDIENTE`, `PRESENTACION`, `VENCIMIENTO`, `MARCA`, `CANTIDAD`, `TIPO_UNIDAD`) VALUES
(1, 'Soda', 'Vidrio', '2019-05-31', 1, 10, 3),
(4, 'Frijoles', 'Bolsa', '2019-06-19', 2, 12, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente_por_producto`
--

CREATE TABLE `ingrediente_por_producto` (
  `PRODUCTO` int(11) NOT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `INGREDIENTES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `ID_MARCA` int(11) NOT NULL,
  `MARCA` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`ID_MARCA`, `MARCA`) VALUES
(1, 'COCA-COLA'),
(2, 'Naturas'),
(3, 'San Francisco'),
(4, 'Molsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `ID_MESA` int(11) NOT NULL,
  `NOMBRE_MESA` varchar(45) DEFAULT NULL,
  `CAPACIDAD` varchar(45) NOT NULL,
  `ID_ESTADO_MESA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `ID_ORDEN` int(11) NOT NULL,
  `MESA` int(11) NOT NULL,
  `PRODUCTO` int(11) DEFAULT NULL,
  `COMBO` int(11) DEFAULT NULL,
  `DESCRIPCION` varchar(300) DEFAULT NULL,
  `TIPO_ORDEN` int(11) NOT NULL,
  `ESTADO_ORDEN` int(11) NOT NULL,
  `USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CATEGORIA` int(11) NOT NULL,
  `PRECIO` double(8,2) NOT NULL,
  `DESCRIPCION` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_PRODUCTO`, `NOMBRE`, `CATEGORIA`, `PRECIO`, `DESCRIPCION`) VALUES
(3, 'Pure de Papas', 2, 2.20, 'Con ensalada'),
(4, 'Carne Asada', 2, 2.50, 'con soda'),
(5, 'Pupusas', 3, 0.70, 'Revueltas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_por_combo`
--

CREATE TABLE `productos_por_combo` (
  `COMBO` int(11) NOT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `PRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_jornada`
--

CREATE TABLE `registro_jornada` (
  `ID_REGISTRO_JORNADA` int(11) NOT NULL,
  `HORA_ENTRADA` datetime DEFAULT NULL,
  `HORA_SALIDA` datetime DEFAULT NULL,
  `EMPLEADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_detalle`
--

CREATE TABLE `ticket_detalle` (
  `ID_TICKET_DETALLE` int(11) NOT NULL,
  `ID_TICKET` int(11) NOT NULL,
  `ORDEN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_encabezado`
--

CREATE TABLE `ticket_encabezado` (
  `ID_TICKET` int(11) NOT NULL,
  `FECHA` datetime NOT NULL,
  `MESA` int(11) NOT NULL,
  `PROPINA` double(8,2) NOT NULL,
  `DESCUENTO` double(8,2) NOT NULL,
  `SUB_TOTAL` double(8,2) NOT NULL,
  `TOTAL` double(8,2) NOT NULL,
  `EFECTIVO` double(8,2) NOT NULL,
  `CAMBIO` double(8,2) NOT NULL,
  `ESTADO_TICKET` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_combo`
--

CREATE TABLE `tipo_combo` (
  `ID_TIPO_COMBO` int(11) NOT NULL,
  `TIPO_COMBO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_orden`
--

CREATE TABLE `tipo_orden` (
  `ID_TIPO_ORDEN` int(11) NOT NULL,
  `TIPO_ORDEN` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_unidad`
--

CREATE TABLE `tipo_unidad` (
  `ID_TIPO_UNIDAD` int(11) NOT NULL,
  `TIPO_UNIDAD` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_unidad`
--

INSERT INTO `tipo_unidad` (`ID_TIPO_UNIDAD`, `TIPO_UNIDAD`) VALUES
(1, 'gramos'),
(2, 'kilogramo'),
(3, 'litros'),
(4, 'libras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRE` varchar(45) DEFAULT NULL,
  `CONTRA` varchar(45) DEFAULT NULL,
  `EMPLEADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo_empleado`
--
ALTER TABLE `cargo_empleado`
  ADD PRIMARY KEY (`ID_CARGO`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Indices de la tabla `combos`
--
ALTER TABLE `combos`
  ADD PRIMARY KEY (`ID_COMBO`),
  ADD KEY `TIPO_COMBO` (`TIPO_COMBO`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`ID_EMPLEADO`),
  ADD KEY `ESTADO_EMPLEADO` (`ESTADO_EMPLEADO`),
  ADD KEY `CARGO` (`CARGO`);

--
-- Indices de la tabla `estado_empleado`
--
ALTER TABLE `estado_empleado`
  ADD PRIMARY KEY (`ID_ESTADO_EMPLEADO`);

--
-- Indices de la tabla `estado_mesa`
--
ALTER TABLE `estado_mesa`
  ADD PRIMARY KEY (`ID_ESTADO_MESA`);

--
-- Indices de la tabla `estado_orden`
--
ALTER TABLE `estado_orden`
  ADD PRIMARY KEY (`ID_ESTADO_ORDEN`);

--
-- Indices de la tabla `estado_ticket`
--
ALTER TABLE `estado_ticket`
  ADD PRIMARY KEY (`ID_ESTADO_TICKET`);

--
-- Indices de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`ID_INGREDIENTES`),
  ADD KEY `MARCA` (`MARCA`),
  ADD KEY `TIPO_UNIDAD` (`TIPO_UNIDAD`);

--
-- Indices de la tabla `ingrediente_por_producto`
--
ALTER TABLE `ingrediente_por_producto`
  ADD KEY `PRODUCTO` (`PRODUCTO`),
  ADD KEY `INGREDIENTES` (`INGREDIENTES`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`ID_MARCA`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`ID_MESA`),
  ADD KEY `ID_ESTADO_MESA` (`ID_ESTADO_MESA`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`ID_ORDEN`),
  ADD KEY `MESA` (`MESA`),
  ADD KEY `PRODUCTO` (`PRODUCTO`),
  ADD KEY `COMBO` (`COMBO`),
  ADD KEY `TIPO_ORDEN` (`TIPO_ORDEN`),
  ADD KEY `ESTADO_ORDEN` (`ESTADO_ORDEN`),
  ADD KEY `USUARIO` (`USUARIO`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_PRODUCTO`),
  ADD KEY `CATEGORIA` (`CATEGORIA`);

--
-- Indices de la tabla `productos_por_combo`
--
ALTER TABLE `productos_por_combo`
  ADD KEY `PRODUCTO` (`PRODUCTO`),
  ADD KEY `COMBO` (`COMBO`);

--
-- Indices de la tabla `registro_jornada`
--
ALTER TABLE `registro_jornada`
  ADD PRIMARY KEY (`ID_REGISTRO_JORNADA`),
  ADD KEY `EMPLEADO` (`EMPLEADO`);

--
-- Indices de la tabla `ticket_detalle`
--
ALTER TABLE `ticket_detalle`
  ADD PRIMARY KEY (`ID_TICKET_DETALLE`),
  ADD KEY `ID_TICKET` (`ID_TICKET`),
  ADD KEY `ORDEN` (`ORDEN`);

--
-- Indices de la tabla `ticket_encabezado`
--
ALTER TABLE `ticket_encabezado`
  ADD PRIMARY KEY (`ID_TICKET`),
  ADD KEY `MESA` (`MESA`),
  ADD KEY `ESTADO_TICKET` (`ESTADO_TICKET`);

--
-- Indices de la tabla `tipo_combo`
--
ALTER TABLE `tipo_combo`
  ADD PRIMARY KEY (`ID_TIPO_COMBO`);

--
-- Indices de la tabla `tipo_orden`
--
ALTER TABLE `tipo_orden`
  ADD PRIMARY KEY (`ID_TIPO_ORDEN`);

--
-- Indices de la tabla `tipo_unidad`
--
ALTER TABLE `tipo_unidad`
  ADD PRIMARY KEY (`ID_TIPO_UNIDAD`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `EMPLEADO` (`EMPLEADO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo_empleado`
--
ALTER TABLE `cargo_empleado`
  MODIFY `ID_CARGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `combos`
--
ALTER TABLE `combos`
  MODIFY `ID_COMBO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `ID_EMPLEADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estado_empleado`
--
ALTER TABLE `estado_empleado`
  MODIFY `ID_ESTADO_EMPLEADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_mesa`
--
ALTER TABLE `estado_mesa`
  MODIFY `ID_ESTADO_MESA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_orden`
--
ALTER TABLE `estado_orden`
  MODIFY `ID_ESTADO_ORDEN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_ticket`
--
ALTER TABLE `estado_ticket`
  MODIFY `ID_ESTADO_TICKET` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `ID_INGREDIENTES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `ID_MARCA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `ID_MESA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `ID_ORDEN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registro_jornada`
--
ALTER TABLE `registro_jornada`
  MODIFY `ID_REGISTRO_JORNADA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ticket_detalle`
--
ALTER TABLE `ticket_detalle`
  MODIFY `ID_TICKET_DETALLE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ticket_encabezado`
--
ALTER TABLE `ticket_encabezado`
  MODIFY `ID_TICKET` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_combo`
--
ALTER TABLE `tipo_combo`
  MODIFY `ID_TIPO_COMBO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_orden`
--
ALTER TABLE `tipo_orden`
  MODIFY `ID_TIPO_ORDEN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_unidad`
--
ALTER TABLE `tipo_unidad`
  MODIFY `ID_TIPO_UNIDAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `combos`
--
ALTER TABLE `combos`
  ADD CONSTRAINT `combos_ibfk_1` FOREIGN KEY (`TIPO_COMBO`) REFERENCES `tipo_combo` (`ID_TIPO_COMBO`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`ESTADO_EMPLEADO`) REFERENCES `estado_empleado` (`ID_ESTADO_EMPLEADO`) ON DELETE CASCADE,
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`CARGO`) REFERENCES `cargo_empleado` (`ID_CARGO`);

--
-- Filtros para la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD CONSTRAINT `ingrediente_ibfk_1` FOREIGN KEY (`MARCA`) REFERENCES `marca` (`ID_MARCA`),
  ADD CONSTRAINT `ingrediente_ibfk_2` FOREIGN KEY (`TIPO_UNIDAD`) REFERENCES `tipo_unidad` (`ID_TIPO_UNIDAD`);

--
-- Filtros para la tabla `ingrediente_por_producto`
--
ALTER TABLE `ingrediente_por_producto`
  ADD CONSTRAINT `ingrediente_por_producto_ibfk_1` FOREIGN KEY (`PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`),
  ADD CONSTRAINT `ingrediente_por_producto_ibfk_2` FOREIGN KEY (`INGREDIENTES`) REFERENCES `ingrediente` (`ID_INGREDIENTES`);

--
-- Filtros para la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD CONSTRAINT `mesas_ibfk_1` FOREIGN KEY (`ID_ESTADO_MESA`) REFERENCES `estado_mesa` (`ID_ESTADO_MESA`);

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`MESA`) REFERENCES `mesas` (`ID_MESA`),
  ADD CONSTRAINT `ordenes_ibfk_2` FOREIGN KEY (`PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`),
  ADD CONSTRAINT `ordenes_ibfk_3` FOREIGN KEY (`COMBO`) REFERENCES `combos` (`ID_COMBO`),
  ADD CONSTRAINT `ordenes_ibfk_4` FOREIGN KEY (`TIPO_ORDEN`) REFERENCES `tipo_orden` (`ID_TIPO_ORDEN`),
  ADD CONSTRAINT `ordenes_ibfk_5` FOREIGN KEY (`ESTADO_ORDEN`) REFERENCES `estado_orden` (`ID_ESTADO_ORDEN`),
  ADD CONSTRAINT `ordenes_ibfk_6` FOREIGN KEY (`USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`CATEGORIA`) REFERENCES `categoria` (`ID_CATEGORIA`);

--
-- Filtros para la tabla `productos_por_combo`
--
ALTER TABLE `productos_por_combo`
  ADD CONSTRAINT `productos_por_combo_ibfk_1` FOREIGN KEY (`PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`),
  ADD CONSTRAINT `productos_por_combo_ibfk_2` FOREIGN KEY (`COMBO`) REFERENCES `combos` (`ID_COMBO`);

--
-- Filtros para la tabla `registro_jornada`
--
ALTER TABLE `registro_jornada`
  ADD CONSTRAINT `registro_jornada_ibfk_1` FOREIGN KEY (`EMPLEADO`) REFERENCES `empleados` (`ID_EMPLEADO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ticket_detalle`
--
ALTER TABLE `ticket_detalle`
  ADD CONSTRAINT `ticket_detalle_ibfk_1` FOREIGN KEY (`ID_TICKET`) REFERENCES `ticket_encabezado` (`ID_TICKET`),
  ADD CONSTRAINT `ticket_detalle_ibfk_2` FOREIGN KEY (`ORDEN`) REFERENCES `ordenes` (`ID_ORDEN`);

--
-- Filtros para la tabla `ticket_encabezado`
--
ALTER TABLE `ticket_encabezado`
  ADD CONSTRAINT `ticket_encabezado_ibfk_1` FOREIGN KEY (`MESA`) REFERENCES `mesas` (`ID_MESA`),
  ADD CONSTRAINT `ticket_encabezado_ibfk_2` FOREIGN KEY (`ESTADO_TICKET`) REFERENCES `estado_ticket` (`ID_ESTADO_TICKET`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_12` FOREIGN KEY (`EMPLEADO`) REFERENCES `empleados` (`ID_EMPLEADO`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`EMPLEADO`) REFERENCES `empleados` (`ID_EMPLEADO`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
