-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2016 a las 06:54:48
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `Idcliente` int(11) NOT NULL,
  `Nombre` varchar(90) NOT NULL,
  `Responsable` varchar(90) NOT NULL,
  `DireccionC` varchar(200) DEFAULT NULL,
  `CPC` varchar(70) DEFAULT NULL,
  `ColoniaC` varchar(200) DEFAULT NULL,
  `DelegacionC` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Idcliente`, `Nombre`, `Responsable`, `DireccionC`, `CPC`, `ColoniaC`, `DelegacionC`) VALUES
(1, 'Adquicisiones', 'Germán Garcia Pineda', NULL, NULL, NULL, NULL),
(2, 'Activo Fijo', '', NULL, NULL, NULL, NULL),
(3, 'Obras', '', NULL, NULL, NULL, NULL),
(4, 'Servicios Materiales', 'mireya', NULL, NULL, NULL, NULL),
(5, 'Transportes', '', NULL, NULL, NULL, NULL),
(6, 'Delegacion Estatal', 'Sandra Paola Rodriguez Gomez', NULL, NULL, NULL, NULL),
(7, 'Unidad de Atención Al Derecho Habiente ', 'Lic Fabiola', NULL, NULL, NULL, NULL),
(8, 'Unidad Juridica', 'Ignacio Cora Muñoz', NULL, NULL, NULL, NULL),
(9, 'Subdelegacion Medica', 'Dr.', NULL, NULL, NULL, NULL),
(10, 'Clinica Hospital Teziutlan', '', NULL, NULL, NULL, NULL),
(11, 'C.M.F Puebla', 'Juan Hernandez', NULL, NULL, NULL, NULL),
(12, 'sdzfxgh', 'dfgxchj', NULL, NULL, NULL, NULL),
(13, 'juán peoe', 'jkhjkdshájkndjknó', NULL, NULL, NULL, NULL),
(14, 'Area Ficticia', 'Carlos Escamilla Juarez', 'Calle 2 poniente 724', '72654', 'La Paz', 'Puebla,Pue.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `Idfactura` int(11) NOT NULL,
  `Numerofact` int(30) NOT NULL,
  `Concepto` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`Idfactura`, `Numerofact`, `Concepto`) VALUES
(1, 10, 'Medicamentos y sustancias ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE IF NOT EXISTS `partida` (
  `IdPartida` varchar(15) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partida`
--

INSERT INTO `partida` (`IdPartida`, `Nombre`, `Descripcion`) VALUES
('21101-0000', 'Materiales y Útiles de Oficina', ' Asignaciones Destinadas a la adquisición de materiales y artículos diversos, propios para el uso de las oficinas, tales como: papelería,formas, libretas, carpetas, y cualquier tipo de papel, vasos y servilletas desechables, limpia-tipos       '),
('21201-0000', 'Materiales y Útiles de Impresión y Reproducción', 'Asignaciones destinadas a la adquisicion de materiales utilizados en la impresion,reproduccion y encuadernacion, tales como: fijadores, tintas, pastas, logotipos y demas materiales y utilies para el mismo fin. Incluye rollos fotograficos      '),
('21601-0000', 'Material de Limpieza', 'Asignaciones destinadas a la adquisicion de materiales, articulos y enseres para el aseo, limpieza e higiene tales como: escobas, jergas, detergentes, jabones y otros productos similares  '),
('24801-0000', 'Materiales Complementarios', 'Asignaciones destinadas a la adquisicion de materiales de cualquier naturaleza para el acondicionamiento de las obras publicas y bienes inmuebles, tales como: alfombras, tapices, pisos, persianas, y demas accesorios. '),
('25101-0001', 'Sustancias Quimicas', 'Asignaciones destinadas para la adquisición de productos químicos básicos que requieren las Unidades Medicas para la realización de análisis pre-analíticos y pruebas manuales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE IF NOT EXISTS `presupuesto` (
  `Idpresu` int(11) NOT NULL,
  `Presupuesto` double NOT NULL,
  `FechaIni` date DEFAULT NULL,
  `FechaFin` date DEFAULT NULL,
  `IdPartida` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `presupuesto`
--

INSERT INTO `presupuesto` (`Idpresu`, `Presupuesto`, `FechaIni`, `FechaFin`, `IdPartida`) VALUES
(4, 4000, '2015-01-01', '2015-12-31', '21101-0000'),
(5, 222.5, '2014-01-01', '2014-12-31', '21601-0000'),
(6, 61699.9, '2015-01-01', '2015-12-31', '21201-0000'),
(7, 9958.6, '2014-01-01', '2014-12-31', '21201-0000'),
(8, 6000, '2015-01-01', '2015-12-01', '21601-0000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `Idpr` int(11) NOT NULL,
  `Fechapro` datetime NOT NULL,
  `Descripcion` varchar(300) NOT NULL,
  `Preciouni` double NOT NULL,
  `Cantidad` double NOT NULL,
  `Importe` double NOT NULL,
  `ImporteIva` double DEFAULT NULL,
  `Idpm` int(11) NOT NULL,
  `Idcli` int(11) NOT NULL,
  `IdPartida` varchar(11) NOT NULL,
  `AOP` varchar(15) DEFAULT NULL,
  `Factura` varchar(30) DEFAULT NULL,
  `NoFinanzas` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Idpr`, `Fechapro`, `Descripcion`, `Preciouni`, `Cantidad`, `Importe`, `ImporteIva`, `Idpm`, `Idcli`, `IdPartida`, `AOP`, `Factura`, `NoFinanzas`) VALUES
(8, '2016-08-12 17:18:43', 'Kova-Trol 1 anormal alto 4 frascos de 15ml', 2320, 2, 4640, 5382.4, 119, 11, '25101-0001', 'AOP33-15', '366', ''),
(9, '2015-06-22 11:14:36', 'kova-trol II anormal bajo 4 frascos de 15 ml', 2505, 2, 5010, 5811.6, 119, 11, '25101-0001', 'AOP33-15', '366', NULL),
(10, '2015-06-16 14:25:39', 'Trombo Plastina parcial liquida activada I.D ', 805, 15, 12075, 14007, 119, 11, '25101-0001', 'AOP33-15', '366', NULL),
(11, '2015-06-16 14:25:54', 'Tiempo de Protombina', 885, 25, 22125, 25665, 119, 11, '25101-0001', 'AOP33-15', '366', NULL),
(12, '2015-06-16 15:20:25', 'Punta Para Pipeta Huma Pette (AR 21376) de cinco microlitros', 1525, 1, 1525, 1769, 119, 11, '25101-0001', 'AOP33-15', '366', NULL),
(13, '2015-06-16 15:20:43', 'Papel Adherible color blanco tamaño carta paquete C/50 hojas ', 80, 6, 480, 556.8, 113, 1, '21101-0000', 'AOP32-15', '428', NULL),
(14, '2015-06-16 15:20:51', 'PAPEL AUTOADHERIBLE', 58.57, 4, 234.28, 271.7648, 113, 1, '21101-0000', 'AOP122-2014', '364', NULL),
(16, '2015-06-16 15:20:55', '100 tarjetas Media Carta', 86.91, 1, 86.91, 100.8156, 113, 1, '21101-0000', 'AOP122-2014', '364', NULL),
(25, '2015-06-16 15:20:47', 'Papel Opalina carta blanco C/100 125', 71.57, 1, 71.57, 83.0212, 113, 1, '21101-0000', 'AOP122-2014', '364', NULL),
(27, '2015-06-16 15:20:36', 'Bandera Institucional de .90 x 1.58 Mts. con logo del ISSSTE ambos lados, en razo doble', 1120, 2, 2240, 2598.4, 120, 7, '24801-0000', 'AOP29-2015', '869', NULL),
(28, '2015-06-16 15:20:29', 'Asta bandera en medida reglamentaria de 2,20 Mts', 880, 2, 1760, 2041.6, 120, 7, '24801-0000', 'AOP29-2015', '869', NULL),
(29, '2015-06-16 15:20:33', 'Bandera para escritorio en razo doble. Logo del ISSSTE para ambos lados de .14 X .25 cms', 350, 2, 700, 812, 120, 7, '24801-0000', 'AOP29-2015', '869', NULL),
(30, '2015-06-16 15:20:40', 'Pedestal Reglamentario', 480, 2, 960, 1113.6, 120, 7, '24801-0000', 'AOP29-2015', '869', NULL),
(31, '2015-07-05 18:29:43', 'curita', 23.98, 34, 815.32, 945.7712, 123, 14, '24801-0000', 'AOP2014-2403', '345', 'D. F. 567'),
(32, '2015-07-05 18:32:03', 'rollo', 23.78, 12, 285.36, 331.0176, 123, 14, '24801-0000', 'AOP2014-2403', '345', 'D. F. 567'),
(33, '2015-07-05 19:27:57', 'lapiz', 3.78, 56, 211.68, 245.5488, 123, 14, '21101-0000', 'AOP2014-2403', '345', 'D. F. 567'),
(34, '2015-07-05 19:28:43', 'hojas tamaño carta', 78.98, 6, 473.88, 549.7008, 123, 14, '21101-0000', 'AOP2014-2403', '345', 'D. F. 567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `Idpm` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `NombreEmp` varchar(100) NOT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Colonia` varchar(100) DEFAULT NULL,
  `Delegacion` varchar(100) DEFAULT NULL,
  `CP` varchar(95) DEFAULT NULL,
  `RepreLegal` varchar(200) DEFAULT NULL,
  `Telefono` varchar(30) DEFAULT NULL,
  `RFC` varchar(25) DEFAULT NULL,
  `Correo` varchar(50) NOT NULL,
  `Idtp` int(11) NOT NULL,
  `Actcost` varchar(100) DEFAULT NULL,
  `ComIdent` varchar(100) DEFAULT NULL,
  `CRFC` varchar(100) DEFAULT NULL,
  `EstadoBanc` varchar(100) DEFAULT NULL,
  `DomicilioFiscal` varchar(100) DEFAULT NULL,
  `CartaMem` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`Idpm`, `Fecha`, `NombreEmp`, `Direccion`, `Colonia`, `Delegacion`, `CP`, `RepreLegal`, `Telefono`, `RFC`, `Correo`, `Idtp`, `Actcost`, `ComIdent`, `CRFC`, `EstadoBanc`, `DomicilioFiscal`, `CartaMem`) VALUES
(113, '2015-01-13 17:21:47', 'Sistemas en Tecnologia de la Informacion S.A de C.', '17 Oriente  No 1801  Int  2 Piso Azcarate Pue', 'hlhlkhklh', 'nklnklnlnl', '456456', 'b,bjbjlbbjlbbbjbl', '222 2409379', 'Sti 020318118', 'ventas@itsystems.mx', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(118, '2015-03-19 12:21:52', 'Comercializadora y Logistica de Puebla SRL de CV', 'Calle Nuevo Leon  No 10129 Col. Popular Emili', NULL, NULL, NULL, NULL, '2190174', 'clp1311046s0', '', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(119, '2015-03-24 11:34:45', 'Biotecnica del Sureste S.A de C.V', 'Cipres 723', 'gfctgcftyctycycy', '', '', '', '(222) 4672550  (222) 4672559', 'BSU1212278J0', '', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(120, '2015-02-23 12:26:26', 'Comercializadora de banderas Mexico, S.A de C.V', 'Calle Camino a Tlalmiminolpan s/n', NULL, NULL, NULL, NULL, '5738 9456 y 5738 9458', 'CBM020926733', '', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(121, '2015-04-06 10:49:44', 'Jose Meliton Fernando Trujillo Flores', 'Acatita de bajan 5906', NULL, NULL, NULL, NULL, '2222330394', 'TUFM540401F79', '', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(122, '2015-06-22 08:52:54', 'júan Peres', 'jkbdiubuibfibfiá jknsdndk', NULL, NULL, NULL, NULL, '1231312312332', 'yubasjhdgiasfg', 'jdnajkndjk1@jknjknkn.com', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(123, '2015-07-05 16:33:58', 'Miguel Mexicano Herrera', 'Privada Zaragoza 10 B', 'Ignacio Romero Vargas', 'Puebla,Pue', '72120', 'Juan Perez Lopez', '2227113239', 'njndndhlasdnhlas', 'miguelmexicano18@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrocambios`
--

CREATE TABLE IF NOT EXISTS `registrocambios` (
  `IdRegistroCambios` int(11) NOT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Cambios` varchar(500) DEFAULT NULL,
  `Antes` varchar(500) DEFAULT NULL,
  `Tabla` varchar(45) DEFAULT NULL,
  `Idusuario` int(21) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registrocambios`
--

INSERT INTO `registrocambios` (`IdRegistroCambios`, `Fecha`, `Cambios`, `Antes`, `Tabla`, `Idusuario`) VALUES
(32, '2015-05-13 15:15:53', 'Partida: 21101-0000 NombreEmp:113', 'Descripcion: Papel Opalina carta blanco C/100 125  Importe: 71.57', 'Productos', 0),
(33, '2015-05-13 15:16:16', 'Partida: 21101-0000 NombreEmp:113', 'Descripcion: Papel Adherible color blanco tamaño carta paquete C/50 hojas   Importe: 480', 'Productos', 0),
(34, '2015-05-13 15:17:28', 'Partida: 24801-0000 NombreEmp:120', 'Descripcion: Bandera Institucional de .90 x 1.58 Mts. con logo del ISSSTE ambos lados, en razo doble  Importe: 2240', 'Productos', 0),
(35, '2015-05-13 15:23:59', 'Nombre: Unidad de Atención Al Derecho Habiente  Responsable: Lic Fabiola', 'Nombre: Unidad de AtenciÃ³n Al Derecho Habiente  Responsable: Lic Fabiola', 'Clientes', 3),
(36, '2015-05-13 15:26:01', 'Partida: 24801-0000 NombreEmp:120', 'Descripcion: Asta bandera en medida reglamentaria de 2,20 Mts  Importe: 1760', 'Productos', 0),
(37, '2015-05-13 15:26:14', 'Partida: 24801-0000 NombreEmp:120', 'Descripcion: Bandera para escritorio en razo doble. Logo del ISSSTE para ambos lados de .14 X .25 cms  Importe: 700', 'Productos', 0),
(38, '2015-05-13 15:26:31', 'Partida: 24801-0000 NombreEmp:120', 'Descripcion: Pedestal Reglamentario  Importe: 960', 'Productos', 0),
(39, '2015-06-16 14:23:32', 'Partida: 25101-0001 NombreEmp:119', 'Descripcion: Trombo Plastina parcial liquida activada I.D   Importe: 12075', 'Productos', 0),
(40, '2015-06-16 14:25:41', 'Partida: 25101-0001 NombreEmp:119', 'Descripcion: Trombo Plastina parcial liquida activada I.D   Importe: 12075', 'Productos', 0),
(41, '2015-06-16 14:25:50', 'Partida: 25101-0001 NombreEmp:119', 'Descripcion: Kova-Trol 1 anormal alto 4 frascos de 15ml  Importe: 4640', 'Productos', 0),
(42, '2015-06-16 14:25:55', 'Partida: 25101-0001 NombreEmp:119', 'Descripcion: Tiempo de Protombina  Importe: 22125', 'Productos', 0),
(43, '2015-06-16 14:25:59', 'Partida: 25101-0001 NombreEmp:119', 'Descripcion: kova-trol II anormal bajo 4 frascos de 15 ml  Importe: 5010', 'Productos', 0),
(44, '2015-06-16 15:20:27', 'Partida: 25101-0001 NombreEmp:119', 'Descripcion: Punta Para Pipeta Huma Pette (AR 21376) de cinco microlitros  Importe: 1525', 'Productos', 0),
(45, '2015-06-16 15:20:30', 'Partida: 24801-0000 NombreEmp:120', 'Descripcion: Asta bandera en medida reglamentaria de 2,20 Mts  Importe: 1760', 'Productos', 0),
(46, '2015-06-16 15:20:34', 'Partida: 24801-0000 NombreEmp:120', 'Descripcion: Bandera para escritorio en razo doble. Logo del ISSSTE para ambos lados de .14 X .25 cms  Importe: 700', 'Productos', 0),
(47, '2015-06-16 15:20:38', 'Partida: 24801-0000 NombreEmp:120', 'Descripcion: Bandera Institucional de .90 x 1.58 Mts. con logo del ISSSTE ambos lados, en razo doble  Importe: 2240', 'Productos', 0),
(48, '2015-06-16 15:20:41', 'Partida: 24801-0000 NombreEmp:120', 'Descripcion: Pedestal Reglamentario  Importe: 960', 'Productos', 0),
(49, '2015-06-16 15:20:45', 'Partida: 21101-0000 NombreEmp:113', 'Descripcion: Papel Adherible color blanco tamaño carta paquete C/50 hojas   Importe: 480', 'Productos', 0),
(50, '2015-06-16 15:20:48', 'Partida: 21101-0000 NombreEmp:113', 'Descripcion: Papel Opalina carta blanco C/100 125  Importe: 71.57', 'Productos', 0),
(51, '2015-06-16 15:20:52', 'Partida: 21101-0000 NombreEmp:113', 'Descripcion: PAPEL AUTOADHERIBLE  Importe: 234.28', 'Productos', 0),
(52, '2015-06-16 15:20:57', 'Partida: 21101-0000 NombreEmp:113', 'Descripcion: 100 tarjetas Media Carta  Importe: 86.91', 'Productos', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proveedor`
--

CREATE TABLE IF NOT EXISTS `tipo_proveedor` (
  `Idtp` int(11) NOT NULL,
  `Tipo` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_proveedor`
--

INSERT INTO `tipo_proveedor` (`Idtp`, `Tipo`) VALUES
(1, 'Persona Moral'),
(2, 'Persona Fisica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferencias`
--

CREATE TABLE IF NOT EXISTS `transferencias` (
  `IdTransferencias` int(11) NOT NULL,
  `PresuIni` varchar(45) DEFAULT NULL,
  `PresuActual` varchar(45) DEFAULT NULL,
  `Monto` double DEFAULT NULL,
  `Comentario` varchar(200) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `IdPartida` varchar(15) NOT NULL,
  `Idpresu` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transferencias`
--

INSERT INTO `transferencias` (`IdTransferencias`, `PresuIni`, `PresuActual`, `Monto`, `Comentario`, `Fecha`, `IdPartida`, `Idpresu`) VALUES
(24, '67699', '68699', 1000, 'falta presupuesto', '2015-06-08 13:22:31', '21201-0000', 6),
(25, '0', '-1000', -1000, 'falta presupuesto', '2015-06-08 13:22:31', '21601-0000', 8),
(28, '67699', '61699', -6000, 'falta presupuesto', '2015-06-08 13:26:29', '21201-0000', 6),
(29, '0', '6000', 6000, 'falta presupuesto', '2015-06-08 13:26:29', '21601-0000', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Idusuario` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Privilegio` int(11) NOT NULL,
  `Login` char(50) NOT NULL,
  `Password` char(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Idusuario`, `Nombre`, `Privilegio`, `Login`, `Password`) VALUES
(1, 'pedro lopez juarez', 2, 'pedró214', 'pedro'),
(2, 'German Énrique Garcia Pineda', 1, 'gpineda', 'gpineda'),
(3, 'Miguel Mexicano Herrera', 1, 'Admin', 'migue19'),
(5, 'veronica', 2, 'vero', '1234'),
(6, 'Zámarripa Almazan', 2, 'zama', 'zama'),
(7, 'ahrfhiowq', 1, 'ndkjaks', 'kjdkl');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Idcliente`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`Idfactura`);

--
-- Indices de la tabla `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`IdPartida`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`Idpresu`),
  ADD KEY `fk_Presupuesto_Partida1_idx` (`IdPartida`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Idpr`),
  ADD KEY `fk_productos_proveedores1_idx` (`Idpm`),
  ADD KEY `fk_productos_clientes1_idx` (`Idcli`),
  ADD KEY `fk_Productos_Partida1_idx` (`IdPartida`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`Idpm`),
  ADD UNIQUE KEY `Idpm` (`Idpm`),
  ADD KEY `Idpm_2` (`Idpm`),
  ADD KEY `fk_proveedores_tipo_proveedor_idx` (`Idtp`);

--
-- Indices de la tabla `registrocambios`
--
ALTER TABLE `registrocambios`
  ADD PRIMARY KEY (`IdRegistroCambios`),
  ADD KEY `fk_RegistroCambios_Usuarios1_idx` (`Idusuario`);

--
-- Indices de la tabla `tipo_proveedor`
--
ALTER TABLE `tipo_proveedor`
  ADD PRIMARY KEY (`Idtp`);

--
-- Indices de la tabla `transferencias`
--
ALTER TABLE `transferencias`
  ADD PRIMARY KEY (`IdTransferencias`),
  ADD KEY `fk_Transferencias_Partida1_idx` (`IdPartida`),
  ADD KEY `fk_Transferencias_Presupuesto1_idx` (`Idpresu`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Idcliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `Idfactura` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `Idpresu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Idpr` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `Idpm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT de la tabla `registrocambios`
--
ALTER TABLE `registrocambios`
  MODIFY `IdRegistroCambios` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `tipo_proveedor`
--
ALTER TABLE `tipo_proveedor`
  MODIFY `Idtp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `transferencias`
--
ALTER TABLE `transferencias`
  MODIFY `IdTransferencias` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Idusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD CONSTRAINT `fk_Presupuesto_Partida1` FOREIGN KEY (`IdPartida`) REFERENCES `partida` (`IdPartida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_Productos_Partida1` FOREIGN KEY (`IdPartida`) REFERENCES `partida` (`IdPartida`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_clientes1` FOREIGN KEY (`Idcli`) REFERENCES `clientes` (`Idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_proveedores1` FOREIGN KEY (`Idpm`) REFERENCES `proveedores` (`Idpm`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `fk_proveedores_tipo_proveedor` FOREIGN KEY (`Idtp`) REFERENCES `tipo_proveedor` (`Idtp`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registrocambios`
--
ALTER TABLE `registrocambios`
  ADD CONSTRAINT `fk_RegistroCambios_Usuarios1` FOREIGN KEY (`Idusuario`) REFERENCES `usuarios` (`Idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transferencias`
--
ALTER TABLE `transferencias`
  ADD CONSTRAINT `fk_Transferencias_Partida1` FOREIGN KEY (`IdPartida`) REFERENCES `partida` (`IdPartida`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Transferencias_Presupuesto1` FOREIGN KEY (`Idpresu`) REFERENCES `presupuesto` (`Idpresu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
