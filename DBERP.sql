-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para erp
CREATE DATABASE IF NOT EXISTS `erp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `erp`;

-- Volcando estructura para tabla erp.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `Numero_clientes` int(4) NOT NULL AUTO_INCREMENT,
  `Nombre_clientes` varchar(100) NOT NULL,
  `Correo_clientes` varchar(50) NOT NULL,
  `Telefono_clientes` varchar(10) NOT NULL,
  `Fecha_registro_clientes` date NOT NULL,
  `Numero_compras_clientes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Numero_clientes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla erp.clientes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla erp.encuestas
CREATE TABLE IF NOT EXISTS `encuestas` (
  `Id_encuesta` int(11) NOT NULL AUTO_INCREMENT,
  `Id_ticket_encuesta` varchar(20) NOT NULL,
  `Pregunta1_encuesta` varchar(5) NOT NULL,
  `Pregunta2_encuesta` varchar(5) NOT NULL,
  `Pregunta3_encuesta` varchar(5) NOT NULL,
  `Pregunta4_encuesta` varchar(5) NOT NULL,
  `Pregunta5_encuesta` varchar(5) NOT NULL,
  `Fecha_encuesta` date NOT NULL,
  PRIMARY KEY (`Id_encuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla erp.encuestas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `encuestas` DISABLE KEYS */;
/*!40000 ALTER TABLE `encuestas` ENABLE KEYS */;

-- Volcando estructura para tabla erp.marcas
CREATE TABLE IF NOT EXISTS `marcas` (
  `Id_marcas` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_marcas` varchar(80) NOT NULL,
  PRIMARY KEY (`Id_marcas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla erp.marcas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;

-- Volcando estructura para tabla erp.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `ID_productos` int(11) NOT NULL AUTO_INCREMENT,
  `Proveedor_productos` varchar(100) NOT NULL,
  `Codigo_productos` int(11) NOT NULL,
  `Nombre_productos` varchar(100) NOT NULL,
  `Marca_productos` varchar(50) NOT NULL,
  `Cantidad_productos` int(11) NOT NULL,
  `Presentacion_productos` varchar(30) NOT NULL,
  `Precio_proveedor_productos` varchar(5) NOT NULL,
  `Precio_venta_productos` varchar(5) NOT NULL,
  `Ganancia_productos` varchar(5) NOT NULL,
  `Fecha_registro_productos` date NOT NULL,
  PRIMARY KEY (`ID_productos`,`Codigo_productos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla erp.productos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla erp.proveedores
CREATE TABLE IF NOT EXISTS `proveedores` (
  `Id_proveedores` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_proveedores` varchar(80) NOT NULL,
  `Direccion_proveedores` varchar(200) NOT NULL,
  `Telefono_proveedores` varchar(10) NOT NULL,
  `Correo_proveedores` varchar(100) NOT NULL,
  `Nota_proveedores` text NOT NULL,
  PRIMARY KEY (`Id_proveedores`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla erp.proveedores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;

-- Volcando estructura para tabla erp.ticket
CREATE TABLE IF NOT EXISTS `ticket` (
  `Id_ticket` int(11) NOT NULL AUTO_INCREMENT,
  `Numero_venta_ticket` varchar(15) NOT NULL,
  `Id_producto_ticket` int(11) NOT NULL,
  `Codigo_producto_ticket` int(11) NOT NULL,
  `Nombre_producto_ticket` varchar(150) NOT NULL,
  `Marca_producto_ticket` varchar(50) NOT NULL,
  `Cantidad_producto_ticket` int(11) NOT NULL,
  `Precio_venta_ticket` varchar(5) NOT NULL,
  `Monto_total_ticket` varchar(5) NOT NULL,
  `Ganancia_ticket` varchar(5) NOT NULL,
  `Fecha_ticket` date NOT NULL,
  PRIMARY KEY (`Id_ticket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla erp.ticket: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;

-- Volcando estructura para tabla erp.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id_usuarios` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_usuarios` varchar(50) NOT NULL,
  `Cargo_usuarios` varchar(14) NOT NULL,
  `Telefono_usuarios` varchar(10) NOT NULL,
  `Correo_usuarios` varchar(40) NOT NULL,
  `Password_usuarios` varchar(16) NOT NULL,
  PRIMARY KEY (`Id_usuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla erp.usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`Id_usuarios`, `Nombre_usuarios`, `Cargo_usuarios`, `Telefono_usuarios`, `Correo_usuarios`, `Password_usuarios`) VALUES
	(7, 'Admin', 'Administrador', '1111111111', 'prueba@gmail.com', '123456');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla erp.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `Id_ventas` varchar(15) NOT NULL,
  `Cajero_ventas` varchar(50) NOT NULL,
  `Cliente_ventas` varchar(50) NOT NULL,
  `Id_cliente_ventas` varchar(8) NOT NULL,
  `Total_ventas_sdescuento` varchar(5) NOT NULL,
  `Total_ventas_cdescuento` varchar(5) NOT NULL,
  `Descuento_ventas` int(11) NOT NULL,
  `Dinero_recibido_ventas` varchar(5) NOT NULL,
  `Cambio_ventas` varchar(5) NOT NULL,
  `Fecha_ventas` date NOT NULL,
  `Correo_cajero` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_ventas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla erp.ventas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
