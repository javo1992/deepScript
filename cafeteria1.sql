/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : cafeteria1

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-11-08 09:27:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for accesos_empresa
-- ----------------------------
DROP TABLE IF EXISTS `accesos_empresa`;
CREATE TABLE `accesos_empresa` (
  `id_accesos_empresa` int(255) NOT NULL AUTO_INCREMENT,
  `paginas` int(255) DEFAULT NULL,
  `empresa` int(255) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_accesos_empresa`),
  KEY `FK_EMPRESA_ACCESOS` (`empresa`),
  KEY `FK_PAGINAS_ACCESOS` (`paginas`),
  KEY `FK_USUARIO_ACCESOS` (`usuario`),
  CONSTRAINT `accesos_empresa_ibfk_1` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `accesos_empresa_ibfk_2` FOREIGN KEY (`paginas`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `accesos_empresa_ibfk_3` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of accesos_empresa
-- ----------------------------
INSERT INTO `accesos_empresa` VALUES ('47', '3', '6', '21');
INSERT INTO `accesos_empresa` VALUES ('48', '4', '6', '21');
INSERT INTO `accesos_empresa` VALUES ('49', '13', '6', '21');
INSERT INTO `accesos_empresa` VALUES ('50', '36', '6', '21');
INSERT INTO `accesos_empresa` VALUES ('51', '26', '6', '21');
INSERT INTO `accesos_empresa` VALUES ('52', '37', '6', '21');
INSERT INTO `accesos_empresa` VALUES ('53', '8', '6', '21');
INSERT INTO `accesos_empresa` VALUES ('54', '39', '6', '21');
INSERT INTO `accesos_empresa` VALUES ('55', '45', '6', '21');
INSERT INTO `accesos_empresa` VALUES ('63', '46', '6', '21');
INSERT INTO `accesos_empresa` VALUES ('65', '51', '6', '18');
INSERT INTO `accesos_empresa` VALUES ('66', '52', '6', '18');
INSERT INTO `accesos_empresa` VALUES ('103', '1', '30', '36');
INSERT INTO `accesos_empresa` VALUES ('104', '2', '30', '36');
INSERT INTO `accesos_empresa` VALUES ('105', '3', '30', '36');
INSERT INTO `accesos_empresa` VALUES ('106', '26', '30', '36');
INSERT INTO `accesos_empresa` VALUES ('107', '37', '30', '36');
INSERT INTO `accesos_empresa` VALUES ('108', '46', '30', '36');
INSERT INTO `accesos_empresa` VALUES ('109', '47', '30', '36');
INSERT INTO `accesos_empresa` VALUES ('110', '48', '30', '36');
INSERT INTO `accesos_empresa` VALUES ('111', '49', '30', '36');
INSERT INTO `accesos_empresa` VALUES ('112', '51', '30', '36');
INSERT INTO `accesos_empresa` VALUES ('113', '52', '30', '36');
INSERT INTO `accesos_empresa` VALUES ('114', '55', '30', '36');
INSERT INTO `accesos_empresa` VALUES ('115', '45', '30', '36');
INSERT INTO `accesos_empresa` VALUES ('130', '1', '7', '38');
INSERT INTO `accesos_empresa` VALUES ('131', '2', '7', '38');
INSERT INTO `accesos_empresa` VALUES ('132', '3', '7', '38');
INSERT INTO `accesos_empresa` VALUES ('133', '26', '7', '38');
INSERT INTO `accesos_empresa` VALUES ('134', '37', '7', '38');
INSERT INTO `accesos_empresa` VALUES ('135', '45', '7', '38');
INSERT INTO `accesos_empresa` VALUES ('136', '46', '7', '38');
INSERT INTO `accesos_empresa` VALUES ('137', '47', '7', '38');
INSERT INTO `accesos_empresa` VALUES ('138', '48', '7', '38');
INSERT INTO `accesos_empresa` VALUES ('139', '49', '7', '38');
INSERT INTO `accesos_empresa` VALUES ('140', '51', '7', '38');
INSERT INTO `accesos_empresa` VALUES ('141', '52', '7', '38');
INSERT INTO `accesos_empresa` VALUES ('142', '55', '7', '38');
INSERT INTO `accesos_empresa` VALUES ('143', '1', '34', '39');
INSERT INTO `accesos_empresa` VALUES ('144', '2', '34', '39');
INSERT INTO `accesos_empresa` VALUES ('145', '3', '34', '39');
INSERT INTO `accesos_empresa` VALUES ('146', '26', '34', '39');
INSERT INTO `accesos_empresa` VALUES ('147', '37', '34', '39');
INSERT INTO `accesos_empresa` VALUES ('148', '45', '34', '39');
INSERT INTO `accesos_empresa` VALUES ('149', '46', '34', '39');
INSERT INTO `accesos_empresa` VALUES ('150', '47', '34', '39');
INSERT INTO `accesos_empresa` VALUES ('151', '48', '34', '39');
INSERT INTO `accesos_empresa` VALUES ('152', '49', '34', '39');
INSERT INTO `accesos_empresa` VALUES ('153', '51', '34', '39');
INSERT INTO `accesos_empresa` VALUES ('154', '52', '34', '39');
INSERT INTO `accesos_empresa` VALUES ('155', '55', '34', '39');
INSERT INTO `accesos_empresa` VALUES ('156', '1', '35', '40');
INSERT INTO `accesos_empresa` VALUES ('157', '2', '35', '40');
INSERT INTO `accesos_empresa` VALUES ('158', '3', '35', '40');
INSERT INTO `accesos_empresa` VALUES ('159', '26', '35', '40');
INSERT INTO `accesos_empresa` VALUES ('160', '37', '35', '40');
INSERT INTO `accesos_empresa` VALUES ('161', '45', '35', '40');
INSERT INTO `accesos_empresa` VALUES ('162', '46', '35', '40');
INSERT INTO `accesos_empresa` VALUES ('163', '47', '35', '40');
INSERT INTO `accesos_empresa` VALUES ('164', '48', '35', '40');
INSERT INTO `accesos_empresa` VALUES ('165', '49', '35', '40');
INSERT INTO `accesos_empresa` VALUES ('166', '51', '35', '40');
INSERT INTO `accesos_empresa` VALUES ('167', '52', '35', '40');
INSERT INTO `accesos_empresa` VALUES ('168', '55', '35', '40');
INSERT INTO `accesos_empresa` VALUES ('169', '1', '8', '24');
INSERT INTO `accesos_empresa` VALUES ('170', '2', '8', '24');
INSERT INTO `accesos_empresa` VALUES ('171', '3', '8', '24');
INSERT INTO `accesos_empresa` VALUES ('172', '26', '8', '24');
INSERT INTO `accesos_empresa` VALUES ('173', '37', '8', '24');
INSERT INTO `accesos_empresa` VALUES ('174', '45', '8', '24');
INSERT INTO `accesos_empresa` VALUES ('175', '46', '8', '24');
INSERT INTO `accesos_empresa` VALUES ('176', '47', '8', '24');
INSERT INTO `accesos_empresa` VALUES ('177', '48', '8', '24');
INSERT INTO `accesos_empresa` VALUES ('178', '49', '8', '24');
INSERT INTO `accesos_empresa` VALUES ('179', '51', '8', '24');
INSERT INTO `accesos_empresa` VALUES ('180', '52', '8', '24');
INSERT INTO `accesos_empresa` VALUES ('181', '55', '8', '24');

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id_categoria` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A',
  `empresa` int(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT '../img/sistema/sin_imagen.jpg',
  PRIMARY KEY (`id_categoria`),
  KEY `FK_EMPRESA` (`empresa`) USING BTREE,
  CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES ('1', 'Sambwich', 'A', '5', '../img/articulos/product-10.jpg');
INSERT INTO `categoria` VALUES ('2', 'Yaroa', 'A', '5', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('3', 'Servicios De Papas', 'A', '5', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('4', 'Burritos        ', 'A', '5', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('5', 'Hamburguesa ', 'A', '5', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('6', 'Quesadillas', 'A', '5', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('7', 'Plato', 'A', '5', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('8', 'Batida', 'A', '5', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('9', 'Jugos naturales ', 'A', '5', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('10', 'Pasta ', 'A', '5', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('11', 'Pasta', 'A', '5', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('12', 'Guarniciones', 'A', '5', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('13', 'nueva categoria', 'A', '5', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('14', 'servicios', 'A', '6', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('15', 'Hamburguesa ', 'A', '6', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('16', 'SERVICIOS', 'A', '7', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('17', 'producto 1', 'A', '30', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('18', 'FUMIGACION', 'A', '8', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('19', 'SERVICIOS', 'A', '34', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('20', 'HARDWARE', 'A', '34', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('21', 'SOFTWARE', 'A', '34', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('22', 'Equipos', 'A', '35', '../img/sistema/sin_imagen.jpg');
INSERT INTO `categoria` VALUES ('23', 'SOFTWARE', 'A', '35', '../img/sistema/sin_imagen.jpg');

-- ----------------------------
-- Table structure for cierre_caja
-- ----------------------------
DROP TABLE IF EXISTS `cierre_caja`;
CREATE TABLE `cierre_caja` (
  `id_cierre_caja` int(255) NOT NULL AUTO_INCREMENT,
  `billetes_100` varchar(255) DEFAULT '0',
  `billetes_50` varchar(255) DEFAULT '0',
  `billetes_20` varchar(255) DEFAULT '0',
  `billetes_10` varchar(255) DEFAULT '0',
  `billetes_5` varchar(255) DEFAULT '0',
  `billetes_1` varchar(255) DEFAULT '0',
  `centavos_50` varchar(255) DEFAULT '0',
  `centavos_25` varchar(255) DEFAULT '0',
  `centavos_10` varchar(255) DEFAULT '0',
  `centavos_5` varchar(255) DEFAULT '0',
  `centavos_1` varchar(255) DEFAULT '0',
  `fecha` date DEFAULT NULL,
  `responsable` int(11) DEFAULT NULL,
  `faltante` varchar(255) DEFAULT '0',
  `sobrante` varchar(255) DEFAULT '0',
  `total_dia` varchar(255) DEFAULT '0',
  `total_retiros` varchar(255) DEFAULT '0',
  `total_caja` varchar(255) DEFAULT '0',
  `total_ingresos` varchar(255) DEFAULT '0',
  `tarjetas` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id_cierre_caja`),
  KEY `FK_USUARIO_CIERECAJA` (`responsable`),
  CONSTRAINT `cierre_caja_ibfk_1` FOREIGN KEY (`responsable`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cierre_caja
-- ----------------------------

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id_cliente` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT '',
  `mail` varchar(255) DEFAULT NULL,
  `direccion` varchar(110) DEFAULT '',
  `id_empresa` int(11) DEFAULT NULL,
  `ci_ruc` varchar(13) DEFAULT '',
  `Razon_Social` varchar(100) DEFAULT NULL,
  `tipo` char(1) DEFAULT 'C',
  `password` varchar(255) DEFAULT NULL,
  `TD` varchar(10) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A',
  PRIMARY KEY (`id_cliente`),
  KEY `fk_cliente_empresa` (`id_empresa`) USING BTREE,
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=297 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES ('22', 'CONSUMIDO FINAL', '9999999999', 'EXAMPLE@EXAMPLE.COM', 'SIN DIRECCION', '5', '9999999999', 'CONSUMIDO FINAL', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('27', 'Javier Farinango', '987242579', 'example@example.com', 'av. el inca', '5', '1722214507', 'Javier Farinango', 'C', '1234', 'C', null, 'A');
INSERT INTO `cliente` VALUES ('28', 'proveedor 1', '', 'example@example.com', 'el calsado', '5', '12365479', 'Corporacion s.a', 'P', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('29', 'proveedor 2', '', 'example@example.com', 'el dorado', '5', '852369741', 'favorita cia ltda', 'P', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('32', 'DISTRIBUIDORA DE CARNES CIA LTDA', '987463251', 'EXAMPLE@EXAMPLE.COM', 'KILOMETRO 14 Y MEDIO VIA CONOPCOTO', '5', '9999999999999', '', 'P', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('33', 'INDUSTRIA DE LACTEOS', '12542541251', 'example@lacteos.com', 'kilometro 6', '5', '1478523691001', 'LACTESO SA', 'P', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('38', 'CONSUMIDO FINAL', '9999999999', 'javier.farianngo92@example.com', 'consumidor final', '6', '9999999999', 'CONSUMIDO FINAL', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('40', 'proveedor 1', '', 'example@example.com', 'el calsado', '6', '12365479', 'Corporacion s.a', 'P', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('41', 'proveedor 2', '', 'example@example.com', 'el dorado', '6', '1722214507001', 'favorita cia ltda', 'P', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('42', 'DISTRIBUIDORA DE CARNES CIA LTDA', '987463251', 'EXAMPLE@EXAMPLE.COM', 'KILOMETRO 14 Y MEDIO VIA CONOPCOTO', '6', '1522214507001', '', 'P', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('43', 'INDUSTRIA DE LACTEOS', '12542541251', 'example@lacteos.com', 'kilometro 6', '6', '1478523691001', 'LACTESO SA', 'P', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('44', 'Javier Farinango', '987242579', 'example@example.com', 'av. la prensa', '6', '1722214507', 'Javier Farinango', 'P', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('51', 'Mayra Guaraca', '0987242589', 'mayra.guaraca@gmail.com', 'av. la prensa', '6', '1750188326', 'mayra guaraca', 'P', null, 'C', 'cliente_51_6.png', 'A');
INSERT INTO `cliente` VALUES ('62', 'Javier Farinango', '0987456321', 'javier.farinango92@gmail.com', 'av  la prensa y carbajar', '6', '1722214507', 'MICROCLICK', 'P', null, 'C', 'cliente_62_6.png', 'A');
INSERT INTO `cliente` VALUES ('63', 'CORRALROSALES.LTDA', '2544144', 'pilar@corralrosales.com', 'ROBLES Y AMAZONAS', '7', '1792719402001', 'CORRALROSALES.LTDA', 'C', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('64', 'CONSUMIDOR FINAL', '987463251', 'EXAMPLE@EXAMPLE.COM', 'KILOMETRO 14 Y MEDIO VIA CONOPCOTO', '7', '9999999999999', 'CONSUMIDOR FINAL', 'C', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('65', 'CORRAL & ROSALES CIA.LTDA', '2544144', 'jcadena@corralrosales.com', 'Robles E4-136 y amazonas Edif. Proinco Calisto. piso 12', '7', '1791308182001', 'CORRAL & ROSALES CIA.LTDA', 'C', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('66', 'CORSINF', '0999219738', 'mrubio@corsinf.com', 'DE LOS MOTILONES n40-345', null, '1712605284001', 'CONSINF', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('67', 'CORSINF', '0999219738', 'mrubio@corsinf.com', 'DE LOS MOTILONES n40-345', null, '1712605284001', 'COSINF', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('68', 'CORSINF', '0999219738', 'mrubio@corsinf.com', 'DE LOS MOTILONES n40-345', null, '1712605284001', 'COSINF', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('69', 'CORSINF', '0999219738', 'mrubio@corsinf.com', 'DE LOS MOTILONES n40-345', '7', '1712605284001', 'COSINF', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('72', 'broodboetiek.S.A.', '2005235673', 'broodboetiekquito@gmail.com', 'la ceramica y ruta viva tumbaco', '7', '1792802547001', 'broodboetiek.S.A.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('75', 'walter vaca', '099999999', 'example@example.com', 'av la gasca y esmeraldas', '6', '0702164179', 'prismanet', 'P', null, 'C', 'cliente_75_6.png', 'A');
INSERT INTO `cliente` VALUES ('76', 'COSUMIDO FINAL', '0222222', 'example@example.com', 'EXAMPLE', '8', '9999999999999', 'CONSUMIDOR FINAL', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('77', 'TIENDAS INDUSTRIALES ASOCIADAS TIA S. A.', '042598830', 'logistica100@tia.com.ec', 'CHIMBORAZO 217 Y LUQUE ESQ.', '8', '0990017514001', 'TIENDAS INDUSTRIALES ASOCIADAS TIA S. A.', 'C', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('78', 'TRANSPORTE PESADO IMALAYA TRANSPEIMALAYA S.A.', '0990313904', 'transpesimalaya2016@outlook.com', 'CAYETANO CESTARIS S7-158 Y PADRE ELIAS BRITO', '8', '1792680778001', 'TRANSPEIMALAYA S.A.', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('83', 'CONSUMIDOS FINAL', '99999999', 'consumidos@final.com', 'consumidos final', '30', '999999999999', 'CONSUMIDOR FINAL', 'P', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('85', '', '042598830', 'logistica100@tia.com.ec', 'CHIMBORAZO 217 Y LUQUE ESQ.', '8', '0990017514001', '', 'C', null, 'R', null, 'I');
INSERT INTO `cliente` VALUES ('86', 'TIENDAS INDUSTRIALES ASOCIADAS TIA S. A.', '042598830', 'logistica100@tia.com.ec', 'CHIMBORAZO 217 Y LUQUE ESQ.', '8', '0990017514001', 'TIENDAS INDUSTRIALES ASOCIADAS TIA S. A.', 'C', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('87', 'Javier farinango', '0987242579', 'javier.farinango92@gmail.com', 'jipiro y santa barbara', '8', '1722214507001', 'Javier Farinango', 'P', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('88', 'TIENDAS INDUSTRIALES ASOCIADAS TIA S. A.', '042598830', 'logistica100@tia.com.ec', 'CHIMBORAZO 217 Y LUQUE ESQ.', '8', '0990017514001', 'TIENDAS INDUSTRIALES ASOCIADAS TIA S. A.', 'P', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('89', 'JAVIER FARINANGO', '0987242579', 'javier.farinango92@hotmail.com', 'Jipiro y Santa Barbara', '8', '1722214507001', 'JAVIER FARINANGO', 'C', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('90', 'TRANSCORMOGAL S.A.', '0967725552', 'facturacion@transcormogal.com', 'GALO MOLINA Y MAXIMILIANO RODRIGUEZ', '8', '1792282411001', 'TRANSCORMOGAL S.A.', 'C', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('91', 'Compañía de transporte de carga Villarroel y Villarroel CIA LTDA', '0984063534', 'vyv_transcarga@hotmail.com', 'Victoria Alta S61 y Oe4F', '8', '1792379881001', 'Compañía de transporte de carga Villarroel y Villarroel CIA LTDA', 'C', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('92', 'ECUATRANSPO CIA LTDA', '2975285', 'ecuatrans-cialtda@hotmail.com', 'Ciudadela del ejercito', '8', '1791738381001', 'ECUATRANSPO CIA LTDA', 'C', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('93', 'COMPAÑIA DE CARGA PESADA Y LOGISTICA TRANSAYALA S.A.', '0984708447', 'Proveedores@admoracastro.com', 'CONOCOTO / ABDON CALDERON N30-08 Y ISIDRO AYORA MIRANDA', '8', '1792514762001', 'COMPAÑIA DE CARGA PESADA Y LOGISTICA TRANSAYALA S.A.', 'C', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('94', 'TRANSMORACASTRO C.A.', '0981348834', 'proveedores@admoracastro.com', 'DE LOS EUCALIPTOS E2-60 Y JUNCAL', '8', '1792644305001', 'TRANSMORACASTRO C.A.', 'C', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('95', 'CONSUMIDOS FINAL', '99999999', 'consumidos@final.com', 'consumidos final', '7', '999999999999', 'CONSUMIDOR FINAL', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('96', 'Geancarlo Asencio Panchana', '099031390', 'geanasencio@hotmail.com', 'Calderon', '7', '0922284856', 'Geancarlo Asencio Panchana', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('97', 'CONSUMIDOS FINAL', '99999999', 'consumidos@final.com', 'consumidos final', '34', '999999999999', 'CONSUMIDOR FINAL', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('98', 'GIGATRADE', '2271021', 'gigatrade@hotmail.com', 'ISLA FERNANDINA N43-78 Y TOMAS DE BERLANGA', '34', '1791985192001', 'GIGATRADE', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('99', 'FEPP', '', 'facturalago@fepp.org.ec', '12 de febrero 267 y 10 de agosto', '34', '1790164241001', 'FEPP', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('100', 'SACOS GALLARDO CIA LTDA', '22573520', 'erikag@sacosgallardo.com.ec', 'ROCAFUERTE OE6 19', '34', '1792227577001', 'SACOS GALLARDO CIA LTDA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('101', 'SURTILLANTAS', '3317520', 'auxiliarcontable@surtillantas.com', 'Av Atahualpa Oe2-28 y Hernando de la Cruz', '34', '1792095107001', 'SURTILLANTAS', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('102', 'UDSS SPECIALIZED SERVICES ECUADOR S.A', '5101340', 'veronica.amaguana@udssinc.com', 'Catalina Aldaz N34-155 y Portugal  Ed. Catalina Plaza P6. Of.607', '34', '1792331951001', 'UDSS SPECIALIZED SERVICES ECUADOR S.A', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('103', 'PUCE', '2991700', 'avasquez@puce.edu.ec', 'AV. 12 DE OCTUBRE 1076 Y ROCA', '34', '1790105601001', 'PUCE', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('104', 'ALEXANDRA GALLARDO ROMERO', '6022678', 'mediasytextiles@yahoo.es', 'José de la cuadra n13-349 y de la fraternidad', '34', '1712964129001', 'ALEXANDRA GALLARDO ROMERO', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('105', 'TELDATA', '3196030', 'kleberveo@hotmail.com', 'Alborada - Monjas', '34', '1791802314001', 'TELDATA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('106', 'CASA DE LA CULTURA ECUATORIANA BENJAMIN CARRION', '2902272', 'jlsamaniegom@gmail.com', 'Av. 6 de Diciembre y Patria', '34', '1760005890001', 'CASA DE LA CULTURA ECUATORIANA BENJAMIN CARRION', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('107', 'ZUBERTECH ENLACE DIGITAL S.A.', '22463522', 'adiaz@enlacedigital.com.ec', 'Francisco de Izazaga N45-07 y Pio Valdivieso', '34', '1792410770001', 'ZUBERTECH ENLACE DIGITAL S.A.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('108', 'CFR AJUSTADORA DE SINIESTRO S.A.', '2500055', 'cfrajustes@gmail.com', 'GRAL. ROBLES Y AV. AMAZONAS EDIFICIO PROINCO CALISTO', '34', '1792676541001', 'CFR AJUSTADORA DE SINIESTRO S.A.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('109', 'SOFT WAREHOUSE S.A.', '2904164', 'paola.freire@fit-bank.com', 'Camilo Destruge N24-633 y Francisco Salazar', '34', '1791859669001', 'SOFT WAREHOUSE S.A.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('110', 'GALO SALCEDO', '2443755', 'galosalcedo@yahoo.com', 'De los Sauces 176', '34', '1706462148001', 'GALO SALCEDO', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('111', 'VOLRISK CONSULTORES ACTUARIALES CIA. LTDA.', '3825605', 'infoec@vol-risk.com', 'Av Shyris N32-218 y Av Eloy Alfaro', '34', '1792334314001', 'VOLRISK CONSULTORES ACTUARIALES CIA. LTDA.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('112', 'FERRERE ABOGADOS ECUADOR FEREC S.A.', '3810950', 'proveedoreses@ferrere.com', 'AVENIDA 12 DE OCTUBRE N24-68 Y LINCOLN', '34', '1792573408001', 'FERRERE ABOGADOS ECUADOR FEREC S.A.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('113', 'UNIVERSIDAD DE LAS FUERZAS ARMADAS ESPE', '3989400', 'pibedoya@espe.edu.ec', 'AV. GRAL. RUMIÑAHUI S/N Y AMBATO', '34', '1768007390001', 'UNIVERSIDAD DE LAS FUERZAS ARMADAS ESPE', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('114', 'LOCATION WORLD S.A.', '22523082', 'gabriela.lema@location-world.com', 'Julio Zaldumbide N24-598 y Miravalle', '34', '1791922727001', 'LOCATION WORLD S.A.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('115', 'ALVARO LEDESMA', '999449720', 'jeffolopez8@gmail.com', 'Río Coca 2027 y Amazonas', '34', '1703416394001', 'ALVARO LEDESMA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('116', 'JOSELITO COBO BERNAL', '2647734', 'rcmcobo@hotmail.com', 'José Victoria N25-30 y Av. Colón', '34', '1708765183001', 'JOSELITO COBO BERNAL', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('117', 'CONJUNTO HABITACIONAL PUEBLO BLANCO DEL VALLE II ETAPA C-1', '3810321', 'lizza1973@hotmail.com', 'Pasaje Abel Gilbert 13-91 y Av. Sebastian de Benalcazar', '34', '2390009251001', 'CONJUNTO HABITACIONAL PUEBLO BLANCO DEL VALLE II ETAPA C-1', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('118', 'ROTE GLOBAL CIA.LTDA', '2452299', 'stenorio@roteglobal.com.ec', 'Calle A N43-74 y Edmundo Carvajal', '34', '1792125081001', 'ROTE GLOBAL CIA.LTDA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('119', 'ANDREA DIAZ AYALA', '2556832', 'asistenteadministrativo@effigia.com.ec', 'LEONIDAZ PLAZA N24-7351 Y MARISCAL FOSH', '34', '1704779501001', 'ANDREA DIAZ AYALA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('120', 'FRANCISCO ESTEBAN MATEUS ALARCON', '2401072', 'esteban.mateus@gmail.com', 'Urbanización El Labrador E2-66', '34', '1705909081', 'FRANCISCO ESTEBAN MATEUS ALARCON', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('121', 'NANCY VEGA', '2562096', 'nan61v@hotmail.com', 'Cristóbal de Acuña E1-18 a Av 10 de Agosto', '34', '1707117048', 'NANCY VEGA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('122', 'FAST COMMERCE CIA. LTDA.', '22231316', 'comercial@fastcommerce-fc.com', 'Ulloa 611 y Cristobal de Acuña. Edificio La Finca. piso 2 Oficina 6', '34', '1792703158001', 'FAST COMMERCE CIA. LTDA.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('123', 'ASOCIACI\\u00d3N O CUENTAS EN PARTICIPACI\\u00d3N GREEN FOODS', '', 'dominiquefreile@grupoenereat.com', 'Shyris y Bélgica', '34', '1792739365001', 'ASOCIACI\\u00d3N O CUENTAS EN PARTICIPACI\\u00d3N GREEN FOODS', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('124', 'TRANQUITO S.A', '3411513', 'tranquito@gmail.com', 'Barrio Atucucho Calle OEA 56131 y calle F', '34', '1791310810001', 'TRANQUITO S.A', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('125', 'PABON ARMAS JORGE OSWALDO', '2254052', 'opabona.cs@gmail.com', 'José Arízaga E4-11 y Jorge Drom', '34', '400363271001', 'PABON ARMAS JORGE OSWALDO', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('126', 'LMT CONEXUS GROUP S.A', '', 'fe.emi@conexus-group.com', 'SAN JOSE COSTA RICA  CURRIDABAT CENTRO COMERCIAL JOSE MARIA ZELEDON CASA 121', '34', '3101680692', 'LMT CONEXUS GROUP S.A', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('127', 'OPTIMA COMUNICACIONES S A', '', 'rfcattaruzzi@gmail.com', 'MONTIEL 2451 1440-CIUDAD AUTONOMA BUENOS AIRES', '34', '30-70797611-6', 'OPTIMA COMUNICACIONES S A', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('128', 'LUIS HERNAN SANTAMARIA SALVADOR', '3948300', 'lhsantamaria@yahoo.com', 'Panamericana sur Km 28 Tambillo', '34', '1703768778001', 'LUIS HERNAN SANTAMARIA SALVADOR', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('129', 'ECUAPETQUIM CIA LTDA', '3948300', 'contabilidad@ecuapetquim.com', 'MIRAFLORES VELLO SN', '34', '1791727797001', 'ECUAPETQUIM CIA LTDA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('130', 'TELECROB ANDINA SRL', '', 'rfcattaruzzi@gmail.com', 'ESCAZU SAN RAFAEL Del SUPERMERCADO AMPM 150 mts ESTE y 75 mts NORTE', '34', '3102735827', 'TELECROB ANDINA SRL', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('131', 'BOSTON SERVICIOS MEDICOS DE ECUADOR BOSTONMED S.A.', '', 'facturacion@elexial.com', 'Avenida Eloy Alfaro N29-235', '34', '1792970369001', 'BOSTON SERVICIOS MEDICOS DE ECUADOR BOSTONMED S.A.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('132', 'ERIKA GALLARDO', '', 'erika90_4@hotmail.com', '', '34', '1721348108001', 'ERIKA GALLARDO', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('133', 'TECHMILL TECNOLOGIES PRIVATE LIMITED', '', 'patricio.cj@techmilltecnologies.com', 'Pedro Ponce Carrasco E9-25 y Av 6 de Diciembre', '34', '1793016200001', 'TECHMILL TECNOLOGIES PRIVATE LIMITED', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('134', 'BETY MONCAYO', '', 'bety_amg@hotmail.com', 'CC Quicenteo Sur', '34', '1714960711001', 'BETY MONCAYO', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('135', 'CASABACA S.A.', '2223444', 'mbpenaherrera@casabaca.com', ' 10 DE AGOSTO N21-281', '34', '1790009459001', 'CASABACA S.A.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('136', 'ENELOJOFILMS CIA LTDA', '2231418', 'facturas@enelojofilms.com', 'Camino de Orellana N27-231', '34', '1792113091001', 'ENELOJOFILMS CIA LTDA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('137', 'HULARUSS CIA. LTDA.', '', 'dortega@hularuss.net', 'Cumbaya', '34', '1792328284001', 'HULARUSS CIA. LTDA.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('138', 'FRANCISCO CHECA', '', 'ada_corp@yahoo.com', 'Vía Intervalles Lote 39', '34', '1705554408001', 'FRANCISCO CHECA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('139', 'DBRAG TECNOLOGIA EN INFORMACION CIA LTDA', '3828370', 'facturas@dbrag.com', 'Whymper N27-70 y Ave. Orellana', '34', '1791847601001', 'DBRAG TECNOLOGIA EN INFORMACION CIA LTDA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('140', 'LUTOPSA S.A', '5126374', 'lutopsaecuador@hotmail.com', 'VELASCO IBARRA S/N', '34', '992548460001', 'LUTOPSA S.A', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('141', 'AGEDOMO', '', 'agedomo5521@gmail.com', 'Dolores Veintimilla y Rita Lecumberry N2-79', '34', '1720986692001', 'AGEDOMO', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('142', 'SMARTPROCESS S.A', '', 'agrijalva@smartprocessgroup.com', 'Dirección José Padilla 330 e iñaquito', '34', '1792829534001', 'SMARTPROCESS S.A', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('143', 'RED DE SERVICIOS ECUADOR SAS', '', 'contabilidad@reddeservicios.ec', 'AV REPUBLICA DEL SALVADOR N36140', '34', '1793135528001', 'RED DE SERVICIOS ECUADOR SAS', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('144', 'CELEC EP CORPORACION ELECTRICA DEL ECUADOR', '', 'alejandro.regalado@celec.gob.ec', 'AV 6 DE DICIEMBRE N26-235', '34', '1768152800001', 'CELEC EP CORPORACION ELECTRICA DEL ECUADOR', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('145', 'LEGAL BUSINESS ASESORIA & CONSULTORIA', '2220198', 'infolegalbusiness@gmail.com', 'Veintimilla E10-78 y Av 12 de Octubre', '34', '1792584825001', 'LEGAL BUSINESS ASESORIA & CONSULTORIA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('146', 'INNOVA CONSTRUCTION-TECHNOLOGIES ECUADOR S.A.S', '', 'asistente.contable@novadobe.com', 'AV CRISTOBAL COLON E8-35 Y DIEGO DE ALMAGRO', '34', '1793191081001', 'INNOVA CONSTRUCTION-TECHNOLOGIES ECUADOR S.A.S', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('147', 'NAGARRO S.A.S', '', 'maritza.rolon@nagarro.com', 'CALLE PEDRO PONCE CARRASCO E9-25 Y AV. 6 DE DICIEMBRE', '34', '1793194424001', 'NAGARRO S.A.S', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('148', 'DISTRIMARKET', '222522294', 'jessy.natalia1983@gmail.com', '6 de diciembre entre Veintimilla y Wilson Edificio Lasso N23-60', '34', '1792141850001', 'DISTRIMARKET', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('149', 'CENTRO DE MEDICINA FAMILIAR', '', 'cecibelarellano6@gmail.com', 'Calle San Francisco y Av.America', '34', '1792818893001', 'CENTRO DE MEDICINA FAMILIAR', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('150', 'CONGREGACION HERMANAS DOMINICAS', '3959960', 'msosa@saintdominic.edu.ec', 'Dirección César Davila N10-222', '34', '1791906810001', 'CONGREGACIONN HERMANAS DOMINICAS', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('151', 'CONGREGACI\\u00d3N DE HERMANAS DOMINICAS DE LA INMACULADA CONCEPCI\\u00d3N', '', 'It@uesdgq.edu.ec', 'Veintemilla 1128 y  Av. Río Amazonas', '34', '1790098753001', 'CONGREGACI\\u00d3N DE HERMANAS DOMINICAS DE LA INMACULADA CONCEPCI\\u00d3N', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('152', 'FUNDACI\\u00d3N VALLE INTEROCE\\u00c1NICO', '22222101', 'info@mediya.ec', 'Medardo silva Oe5-221', '34', '1791323548001', 'FUNDACI\\u00d3N VALLE INTEROCE\\u00c1NICO', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('153', 'PPG CONSTRUCCIONES Y TECNOLOGIA CIA. LTDA.', '', 'jcompras@forto.com.ec', 'Dirección Catalina Aldaz N34 y Portugal', '34', '1792308224001', 'PPG CONSTRUCCIONES Y TECNOLOGIA CIA. LTDA.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('154', 'ASINTEL ECUADOR S.A.S', '', 'contabilidad@asintelecuador.com', 'Calderon 9  de Agosto y Tulcán', '34', '1793199417001', 'ASINTEL ECUADOR S.A.S', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('155', 'FUNDACION PROSPERAR SALUD', '', 'contabilidad@reddeservicios.ec', 'Av. Rio Amazonas y Av. Naciones Unidas', '34', '1793194697001', 'FUNDACION PROSPERAR SALUD', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('156', 'UNIDAD EDUCATIVA SALESIANA CARDENAL SPELLMAN', '3560001', 'mrodriguez@spellman.edu.ec', 'Rio Santiago S/N y Alfonso Lamiña', '34', '1790098842001', 'UNIDAD EDUCATIVA SALESIANA CARDENAL SPELLMAN', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('157', 'WILLIAN LEON', '', 'contabilidad@wltechnologies.com.ec', 'La Floresta Ibarra', '34', '1002582276001', 'WILLIAN LEON', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('158', 'SIFIZSOFT CIA LTDA', '', 'seguridad@sifizsoft.com', 'Rumipamba E2-214 y Av. Rep\\u00fablica', '34', '1791935950001', 'SIFIZSOFT CIA LTDA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('159', 'MILTON RUBIO', '0999219738', 'mrubio@corsinf.com', 'Rio Coca 2027 y Amazonas\r\n', '34', '1712605284', 'CORSINF', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('160', 'Cooperativa de Ahorro y Credito Microemprasarial Sucre', '05500005', 'jpiguave@coacmes.com', 'San Jacinto Manabí', '34', '1391707363001', 'COACMES', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('161', 'EUREK SOLUCIONES', '', 'madiaz@eurek.com.ec', 'Veintimilla y Juan Leon Mera ', '34', '1711923795001', 'Díaz Velazco Christian Renato', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('162', 'Verdades Bíblicas SCC', '0979831178', 'gerencia@vbscc.com', 'San Fernando\r\n', '34', '1792584914001', 'Verdades Bíblicas SCC', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('165', 'CONSUMIDOS FINAL', '99999999', 'consumidos@final.com', 'consumidos final', '35', '999999999999', 'CONSUMIDOR FINAL', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('166', 'GIGATRADE', '2271021', 'gigatrade@hotmail.com', 'ISLA FERNANDINA N43-78 Y TOMAS DE BERLANGA', '35', '1791985192001', 'GIGATRADE', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('167', 'FEPP', '', 'facturalago@fepp.org.ec', '12 de febrero 267 y 10 de agosto', '35', '1790164241001', 'FEPP', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('168', 'SACOS GALLARDO CIA LTDA', '22573520', 'erikag@sacosgallardo.com.ec', 'ROCAFUERTE OE6 19', '35', '1792227577001', 'SACOS GALLARDO CIA LTDA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('169', 'SURTILLANTAS', '3317520', 'auxiliarcontable@surtillantas.com', 'Av Atahualpa Oe2-28 y Hernando de la Cruz', '35', '1792095107001', 'SURTILLANTAS', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('170', 'UDSS SPECIALIZED SERVICES ECUADOR S.A', '5101340', 'veronica.amaguana@udssinc.com', 'Catalina Aldaz N34-155 y Portugal  Ed. Catalina Plaza P6. Of.607', '35', '1792331951001', 'UDSS SPECIALIZED SERVICES ECUADOR S.A', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('171', 'PUCE', '2991700', 'avasquez@puce.edu.ec', 'AV. 12 DE OCTUBRE 1076 Y ROCA', '35', '1790105601001', 'PUCE', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('172', 'ALEXANDRA GALLARDO ROMERO', '6022678', 'mediasytextiles@yahoo.es', 'José de la cuadra n13-349 y de la fraternidad', '35', '1712964129001', 'ALEXANDRA GALLARDO ROMERO', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('173', 'TELDATA', '3196030', 'kleberveo@hotmail.com', 'Alborada - Monjas', '35', '1791802314001', 'TELDATA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('174', 'CASA DE LA CULTURA ECUATORIANA BENJAMIN CARRION', '2902272', 'jlsamaniegom@gmail.com', 'Av. 6 de Diciembre y Patria', '35', '1760005890001', 'CASA DE LA CULTURA ECUATORIANA BENJAMIN CARRION', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('175', 'ZUBERTECH ENLACE DIGITAL S.A.', '22463522', 'adiaz@enlacedigital.com.ec', 'Francisco de Izazaga N45-07 y Pio Valdivieso', '35', '1792410770001', 'ZUBERTECH ENLACE DIGITAL S.A.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('176', 'CFR AJUSTADORA DE SINIESTRO S.A.', '2500055', 'cfrajustes@gmail.com', 'GRAL. ROBLES Y AV. AMAZONAS EDIFICIO PROINCO CALISTO', '35', '1792676541001', 'CFR AJUSTADORA DE SINIESTRO S.A.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('177', 'SOFT WAREHOUSE S.A.', '2904164', 'paola.freire@fit-bank.com', 'Camilo Destruge N24-633 y Francisco Salazar', '35', '1791859669001', 'SOFT WAREHOUSE S.A.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('178', 'GALO SALCEDO', '2443755', 'galosalcedo@yahoo.com', 'De los Sauces 176', '35', '1706462148001', 'GALO SALCEDO', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('179', 'VOLRISK CONSULTORES ACTUARIALES CIA. LTDA.', '3825605', 'infoec@vol-risk.com', 'Av Shyris N32-218 y Av Eloy Alfaro', '35', '1792334314001', 'VOLRISK CONSULTORES ACTUARIALES CIA. LTDA.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('180', 'FERRERE ABOGADOS ECUADOR FEREC S.A.', '3810950', 'proveedoreses@ferrere.com', 'AVENIDA 12 DE OCTUBRE N24-68 Y LINCOLN', '35', '1792573408001', 'FERRERE ABOGADOS ECUADOR FEREC S.A.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('181', 'UNIVERSIDAD DE LAS FUERZAS ARMADAS ESPE', '3989400', 'pibedoya@espe.edu.ec', 'AV. GRAL. RUMIÑAHUI S/N Y AMBATO', '35', '1768007390001', 'UNIVERSIDAD DE LAS FUERZAS ARMADAS ESPE', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('182', 'LOCATION WORLD S.A.', '22523082', 'gabriela.lema@location-world.com', 'Julio Zaldumbide N24-598 y Miravalle', '35', '1791922727001', 'LOCATION WORLD S.A.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('183', 'ALVARO LEDESMA', '999449720', 'jeffolopez8@gmail.com', 'Río Coca 2027 y Amazonas', '35', '1703416394001', 'ALVARO LEDESMA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('184', 'JOSELITO COBO BERNAL', '2647734', 'rcmcobo@hotmail.com', 'José Victoria N25-30 y Av. Colón', '35', '1708765183001', 'JOSELITO COBO BERNAL', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('185', 'CONJUNTO HABITACIONAL PUEBLO BLANCO DEL VALLE II ETAPA C-1', '3810321', 'lizza1973@hotmail.com', 'Pasaje Abel Gilbert 13-91 y Av. Sebastian de Benalcazar', '35', '2390009251001', 'CONJUNTO HABITACIONAL PUEBLO BLANCO DEL VALLE II ETAPA C-1', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('186', 'ROTE GLOBAL CIA.LTDA', '2452299', 'stenorio@roteglobal.com.ec', 'Calle A N43-74 y Edmundo Carvajal', '35', '1792125081001', 'ROTE GLOBAL CIA.LTDA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('187', 'ANDREA DIAZ AYALA', '2556832', 'asistenteadministrativo@effigia.com.ec', 'LEONIDAZ PLAZA N24-7351 Y MARISCAL FOSH', '35', '1704779501001', 'ANDREA DIAZ AYALA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('188', 'FRANCISCO ESTEBAN MATEUS ALARCON', '2401072', 'esteban.mateus@gmail.com', 'Urbanización El Labrador E2-66', '35', '1705909081', 'FRANCISCO ESTEBAN MATEUS ALARCON', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('189', 'NANCY VEGA', '2562096', 'nan61v@hotmail.com', 'Cristóbal de Acuña E1-18 a Av 10 de Agosto', '35', '1707117048', 'NANCY VEGA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('190', 'FAST COMMERCE CIA. LTDA.', '22231316', 'comercial@fastcommerce-fc.com', 'Ulloa 611 y Cristobal de Acuña. Edificio La Finca. piso 2 Oficina 6', '35', '1792703158001', 'FAST COMMERCE CIA. LTDA.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('191', 'ASOCIACI\\u00d3N O CUENTAS EN PARTICIPACI\\u00d3N GREEN FOODS', '', 'dominiquefreile@grupoenereat.com', 'Shyris y Bélgica', '35', '1792739365001', 'ASOCIACI\\u00d3N O CUENTAS EN PARTICIPACI\\u00d3N GREEN FOODS', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('192', 'TRANQUITO S.A', '3411513', 'tranquito@gmail.com', 'Barrio Atucucho Calle OEA 56131 y calle F', '35', '1791310810001', 'TRANQUITO S.A', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('193', 'PABON ARMAS JORGE OSWALDO', '2254052', 'opabona.cs@gmail.com', 'José Arízaga E4-11 y Jorge Drom', '35', '400363271001', 'PABON ARMAS JORGE OSWALDO', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('194', 'LMT CONEXUS GROUP S.A', '', 'fe.emi@conexus-group.com', 'SAN JOSE COSTA RICA  CURRIDABAT CENTRO COMERCIAL JOSE MARIA ZELEDON CASA 121', '35', '3101680692', 'LMT CONEXUS GROUP S.A', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('195', 'OPTIMA COMUNICACIONES S A', '', 'rfcattaruzzi@gmail.com', 'MONTIEL 2451 1440-CIUDAD AUTONOMA BUENOS AIRES', '35', '30-70797611-6', 'OPTIMA COMUNICACIONES S A', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('196', 'LUIS HERNAN SANTAMARIA SALVADOR', '3948300', 'lhsantamaria@yahoo.com', 'Panamericana sur Km 28 Tambillo', '35', '1703768778001', 'LUIS HERNAN SANTAMARIA SALVADOR', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('197', 'ECUAPETQUIM CIA LTDA', '3948300', 'contabilidad@ecuapetquim.com', 'MIRAFLORES VELLO SN', '35', '1791727797001', 'ECUAPETQUIM CIA LTDA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('198', 'TELECROB ANDINA SRL', '', 'rfcattaruzzi@gmail.com', 'ESCAZU SAN RAFAEL Del SUPERMERCADO AMPM 150 mts ESTE y 75 mts NORTE', '35', '3102735827', 'TELECROB ANDINA SRL', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('199', 'BOSTON SERVICIOS MEDICOS DE ECUADOR BOSTONMED S.A.', '', 'facturacion@elexial.com', 'Avenida Eloy Alfaro N29-235', '35', '1792970369001', 'BOSTON SERVICIOS MEDICOS DE ECUADOR BOSTONMED S.A.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('200', 'ERIKA GALLARDO', '', 'erika90_4@hotmail.com', '', '35', '1721348108001', 'ERIKA GALLARDO', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('201', 'TECHMILL TECNOLOGIES PRIVATE LIMITED', '', 'patricio.cj@techmilltecnologies.com', 'Pedro Ponce Carrasco E9-25 y Av 6 de Diciembre', '35', '1793016200001', 'TECHMILL TECNOLOGIES PRIVATE LIMITED', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('202', 'BETY MONCAYO', '', 'bety_amg@hotmail.com', 'CC Quicenteo Sur', '35', '1714960711001', 'BETY MONCAYO', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('203', 'CASABACA S.A.', '2223444', 'mbpenaherrera@casabaca.com', ' 10 DE AGOSTO N21-281', '35', '1790009459001', 'CASABACA S.A.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('204', 'ENELOJOFILMS CIA LTDA', '2231418', 'facturas@enelojofilms.com', 'Camino de Orellana N27-231', '35', '1792113091001', 'ENELOJOFILMS CIA LTDA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('205', 'HULARUSS CIA. LTDA.', '', 'dortega@hularuss.net', 'Cumbaya', '35', '1792328284001', 'HULARUSS CIA. LTDA.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('206', 'FRANCISCO CHECA', '', 'ada_corp@yahoo.com', 'Vía Intervalles Lote 39', '35', '1705554408001', 'FRANCISCO CHECA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('207', 'DBRAG TECNOLOGIA EN INFORMACION CIA LTDA', '3828370', 'facturas@dbrag.com', 'Whymper N27-70 y Ave. Orellana', '35', '1791847601001', 'DBRAG TECNOLOGIA EN INFORMACION CIA LTDA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('208', 'LUTOPSA S.A', '5126374', 'lutopsaecuador@hotmail.com', 'VELASCO IBARRA S/N', '35', '992548460001', 'LUTOPSA S.A', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('209', 'AGEDOMO', '', 'agedomo5521@gmail.com', 'Dolores Veintimilla y Rita Lecumberry N2-79', '35', '1720986692001', 'AGEDOMO', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('210', 'SMARTPROCESS S.A', '', 'agrijalva@smartprocessgroup.com', 'Dirección José Padilla 330 e iñaquito', '35', '1792829534001', 'SMARTPROCESS S.A', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('211', 'RED DE SERVICIOS ECUADOR SAS', '', 'contabilidad@reddeservicios.ec', 'AV REPUBLICA DEL SALVADOR N36140', '35', '1793135528001', 'RED DE SERVICIOS ECUADOR SAS', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('212', 'CELEC EP CORPORACION ELECTRICA DEL ECUADOR', '', 'alejandro.regalado@celec.gob.ec', 'AV 6 DE DICIEMBRE N26-235', '35', '1768152800001', 'CELEC EP CORPORACION ELECTRICA DEL ECUADOR', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('213', 'LEGAL BUSINESS ASESORIA & CONSULTORIA', '2220198', 'infolegalbusiness@gmail.com', 'Veintimilla E10-78 y Av 12 de Octubre', '35', '1792584825001', 'LEGAL BUSINESS ASESORIA & CONSULTORIA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('214', 'INNOVA CONSTRUCTION-TECHNOLOGIES ECUADOR S.A.S', '', 'asistente.contable@novadobe.com', 'AV CRISTOBAL COLON E8-35 Y DIEGO DE ALMAGRO', '35', '1793191081001', 'INNOVA CONSTRUCTION-TECHNOLOGIES ECUADOR S.A.S', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('215', 'NAGARRO S.A.S', '', 'maritza.rolon@nagarro.com', 'CALLE PEDRO PONCE CARRASCO E9-25 Y AV. 6 DE DICIEMBRE', '35', '1793194424001', 'NAGARRO S.A.S', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('216', 'DISTRIMARKET', '222522294', 'jessy.natalia1983@gmail.com', '6 de diciembre entre Veintimilla y Wilson Edificio Lasso N23-60', '35', '1792141850001', 'DISTRIMARKET', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('217', 'CENTRO DE MEDICINA FAMILIAR', '', 'cecibelarellano6@gmail.com', 'Calle San Francisco y Av.America', '35', '1792818893001', 'CENTRO DE MEDICINA FAMILIAR', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('218', 'CONGREGACION HERMANAS DOMINICAS', '3959960', 'msosa@saintdominic.edu.ec', 'Dirección César Davila N10-222', '35', '1791906810001', 'CONGREGACIONN HERMANAS DOMINICAS', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('219', 'CONGREGACI\\u00d3N DE HERMANAS DOMINICAS DE LA INMACULADA CONCEPCI\\u00d3N', '', 'It@uesdgq.edu.ec', 'Veintemilla 1128 y  Av. Río Amazonas', '35', '1790098753001', 'CONGREGACI\\u00d3N DE HERMANAS DOMINICAS DE LA INMACULADA CONCEPCI\\u00d3N', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('220', 'FUNDACI\\u00d3N VALLE INTEROCE\\u00c1NICO', '22222101', 'info@mediya.ec', 'Medardo silva Oe5-221', '35', '1791323548001', 'FUNDACI\\u00d3N VALLE INTEROCE\\u00c1NICO', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('221', 'PPG CONSTRUCCIONES Y TECNOLOGIA CIA. LTDA.', '', 'jcompras@forto.com.ec', 'Dirección Catalina Aldaz N34 y Portugal', '35', '1792308224001', 'PPG CONSTRUCCIONES Y TECNOLOGIA CIA. LTDA.', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('222', 'ASINTEL ECUADOR S.A.S', '', 'contabilidad@asintelecuador.com', 'Calderon 9  de Agosto y Tulcán', '35', '1793199417001', 'ASINTEL ECUADOR S.A.S', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('223', 'FUNDACION PROSPERAR SALUD', '', 'contabilidad@reddeservicios.ec', 'Av. Rio Amazonas y Av. Naciones Unidas', '35', '1793194697001', 'FUNDACION PROSPERAR SALUD', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('224', 'UNIDAD EDUCATIVA SALESIANA CARDENAL SPELLMAN', '3560001', 'mrodriguez@spellman.edu.ec', 'Rio Santiago S/N y Alfonso Lamiña', '35', '1790098842001', 'UNIDAD EDUCATIVA SALESIANA CARDENAL SPELLMAN', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('225', 'WILLIAN LEON', '', 'contabilidad@wltechnologies.com.ec', 'La Floresta Ibarra', '35', '1002582276001', 'WILLIAN LEON', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('226', 'SIFIZSOFT CIA LTDA', '', 'seguridad@sifizsoft.com', 'Rumipamba E2-214 y Av. Rep\\u00fablica', '35', '1791935950001', 'SIFIZSOFT CIA LTDA', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('227', 'MILTON RUBIO', '0999219738', 'mrubio@corsinf.com', 'Rio Coca 2027 y Amazonas\r\n', '35', '1712605284', 'CORSINF', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('228', 'Cooperativa de Ahorro y Credito Microemprasarial Sucre', '05500005', 'jpiguave@coacmes.com', 'San Jacinto Manabí', '35', '1391707363001', 'COACMES', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('229', 'EUREK SOLUCIONES', '', 'madiaz@eurek.com.ec', 'Veintimilla y Juan Leon Mera ', '35', '1711923795001', 'Díaz Velazco Christian Renato', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('230', 'Verdades Bíblicas SCC', '0979831178', 'gerencia@vbscc.com', 'San Fernando\r\n', '35', '1792584914001', 'Verdades Bíblicas SCC', 'C', null, 'C', null, 'A');
INSERT INTO `cliente` VALUES ('292', 'CONECTIFLOR ANDINO CIA LTDA', '', 'office@conectiflor.com', 'Cayambe Guachala la Bota', '35', '1793062113001', 'CONECTIFLOR ANDINO CIA LTDA', 'C', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('293', 'APCH ADUCAR', '2862586', 'csilva@ueapch.edu.ec', 'Calle de los Piqueros oe12-235', '35', '1793205714001', 'APCH ADUCAR', 'C', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('294', 'FEDEPAL', '2248914', 'info@fedepal.ec', 'República del Salvador 525 e Irlanda', '35', '1791721004001', 'FEDEPAL', 'C', null, null, null, 'A');
INSERT INTO `cliente` VALUES ('295', 'CORPORACION DE SISTEMAS INFORMATICOS CORSINF SAS', '3920507', 'nmorales@corsinf.com', 'De los Motilones N40-345', '34', '1793211628001', 'CORSINF', 'C', null, 'R', null, 'A');
INSERT INTO `cliente` VALUES ('296', 'CLINICA DE ESPECIALIDADES GALENUS S.A.', '2240277', 'clinicagalenus@gmail.com', 'PARIS N43-212 Y RIO COCA', '35', '1791413083001', 'CLINICA DE ESPECIALIDADES GALENUS S.A.', 'C', null, 'R', null, 'A');

-- ----------------------------
-- Table structure for codigos_secuenciales
-- ----------------------------
DROP TABLE IF EXISTS `codigos_secuenciales`;
CREATE TABLE `codigos_secuenciales` (
  `id_secuenciales` int(11) NOT NULL AUTO_INCREMENT,
  `detalle_secuencial` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT '1',
  `id_empresa` varchar(255) DEFAULT NULL,
  `Autorizacion` varchar(255) DEFAULT NULL,
  `Serie` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_secuenciales`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of codigos_secuenciales
-- ----------------------------
INSERT INTO `codigos_secuenciales` VALUES ('1', 'FA_SERIE_001001', '22', '6', '0702164179001', '001-001', 'FA');
INSERT INTO `codigos_secuenciales` VALUES ('2', 'RE_SERIE_001002', '37', '6', '0702164179001', '001-002', 'RE');
INSERT INTO `codigos_secuenciales` VALUES ('3', 'GR_SERIE_001002', '22', '6', '0702164179001', '001-002', 'GR');
INSERT INTO `codigos_secuenciales` VALUES ('6', 'NC_SERIE_001002', '8', '6', '0702164179001', '001-002', 'NC');
INSERT INTO `codigos_secuenciales` VALUES ('7', 'FA_SERIE_001100', '64', '8', '1792680778001', '001-100', 'FA');
INSERT INTO `codigos_secuenciales` VALUES ('8', 'GR_SERIE_001003', '3', '8', '1792680778001\r\n', '001-003', 'GR');
INSERT INTO `codigos_secuenciales` VALUES ('58', 'NC_SERIE_001003', '7', '8', '1792680778001', '001-003', 'NC');
INSERT INTO `codigos_secuenciales` VALUES ('59', 'FA_SERIE_001001', '13', '7', '1722214507001', '001-001', 'FA');
INSERT INTO `codigos_secuenciales` VALUES ('60', 'RE_SERIE_001001', '1', '7', '1722214507001', '001-001', 'RE');
INSERT INTO `codigos_secuenciales` VALUES ('61', 'NC_SERIE_001001', '1', '7', '1722214507001', '001-001', 'NC');
INSERT INTO `codigos_secuenciales` VALUES ('62', 'GR_SERIE_001001', '1', '7', '1722214507001', '001-001', 'GR');
INSERT INTO `codigos_secuenciales` VALUES ('63', 'LC_SERIE_001001', '1', '7', '1722214507001', '001-001', 'LC');
INSERT INTO `codigos_secuenciales` VALUES ('64', 'FA_SERIE_001001', '843', '34', '1712605284001', '001-001', 'FA');
INSERT INTO `codigos_secuenciales` VALUES ('65', 'RE_SERIE_001001', '1', '34', '1712605284001', '001-001', 'RE');
INSERT INTO `codigos_secuenciales` VALUES ('66', 'NC_SERIE_001001', '1', '34', '1712605284001', '001-001', 'NC');
INSERT INTO `codigos_secuenciales` VALUES ('67', 'GR_SERIE_001001', '1', '34', '1712605284001', '001-001', 'GR');
INSERT INTO `codigos_secuenciales` VALUES ('68', 'LC_SERIE_001001', '1', '34', '1712605284001', '001-001', 'LC');
INSERT INTO `codigos_secuenciales` VALUES ('69', 'GR_SERIE_001001', '1', '34', null, null, null);
INSERT INTO `codigos_secuenciales` VALUES ('70', 'FA_SERIE_001001', '102', '35', '1793211628001', '001-001', 'FA');
INSERT INTO `codigos_secuenciales` VALUES ('71', 'RE_SERIE_001001', '1', '35', '1793211628001', '001-001', 'RE');
INSERT INTO `codigos_secuenciales` VALUES ('72', 'NC_SERIE_001001', '1', '35', '1793211628001', '001-001', 'NC');
INSERT INTO `codigos_secuenciales` VALUES ('73', 'GR_SERIE_001001', '1', '35', '1793211628001', '001-001', 'GR');
INSERT INTO `codigos_secuenciales` VALUES ('74', 'LC_SERIE_001001', '1', '35', '1793211628001', '001-001', 'LC');
INSERT INTO `codigos_secuenciales` VALUES ('75', 'FA_SERIE_001003', '1', '8', '1792680778001', '001-003', null);

-- ----------------------------
-- Table structure for colores
-- ----------------------------
DROP TABLE IF EXISTS `colores`;
CREATE TABLE `colores` (
  `ID_COLORES` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO` varchar(255) DEFAULT NULL,
  `DESCRIPCION` varchar(255) DEFAULT NULL,
  `ESTADO` char(1) DEFAULT NULL,
  PRIMARY KEY (`ID_COLORES`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of colores
-- ----------------------------
INSERT INTO `colores` VALUES ('1', '18', 'N/A', 'A');
INSERT INTO `colores` VALUES ('4', '2', 'ROJO', 'A');
INSERT INTO `colores` VALUES ('5', '3', 'AMARILLO', 'A');
INSERT INTO `colores` VALUES ('6', '4', 'BLANCO', 'A');
INSERT INTO `colores` VALUES ('7', '5', 'VERDE', 'A');
INSERT INTO `colores` VALUES ('8', '6', 'NEGRO', 'A');
INSERT INTO `colores` VALUES ('9', '7', 'DORADO', 'A');
INSERT INTO `colores` VALUES ('10', '8', 'PLOMO', 'A');
INSERT INTO `colores` VALUES ('11', '9', 'TOMATE', 'A');
INSERT INTO `colores` VALUES ('12', '10', 'CAFE', 'A');
INSERT INTO `colores` VALUES ('13', '11', 'ROSADOVINO', 'A');
INSERT INTO `colores` VALUES ('14', '12', 'VINO', 'A');
INSERT INTO `colores` VALUES ('15', '13', 'CELESTE', 'A');
INSERT INTO `colores` VALUES ('16', '14', 'CREMA', 'A');
INSERT INTO `colores` VALUES ('17', '15', 'MORADO', 'A');
INSERT INTO `colores` VALUES ('18', '16', 'VARIOS', 'A');

-- ----------------------------
-- Table structure for combo
-- ----------------------------
DROP TABLE IF EXISTS `combo`;
CREATE TABLE `combo` (
  `id_combo` int(255) NOT NULL AUTO_INCREMENT,
  `id_producto` int(255) DEFAULT NULL,
  `id_producto_add` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_combo`),
  KEY `FK_PRODUCTO_CAOMBO` (`id_producto`),
  KEY `FK_PRODUCTO_ADD_COMBO` (`id_producto_add`),
  CONSTRAINT `combo_ibfk_1` FOREIGN KEY (`id_producto_add`) REFERENCES `productos` (`id_productos`),
  CONSTRAINT `combo_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_productos`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of combo
-- ----------------------------

-- ----------------------------
-- Table structure for empresa
-- ----------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `id_empresa` int(255) NOT NULL AUTO_INCREMENT,
  `Razon_Social` varchar(100) DEFAULT '',
  `Nombre_Comercial` varchar(100) DEFAULT '',
  `RUC` varchar(13) DEFAULT '',
  `Direccion` varchar(100) DEFAULT '',
  `telefono` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `matriz` varchar(255) DEFAULT NULL,
  `Ruta_Certificado` varchar(255) DEFAULT '',
  `Clave_Certificado` varchar(255) NOT NULL DEFAULT '',
  `IP_VPN` varchar(100) DEFAULT NULL,
  `BASE` varchar(100) DEFAULT NULL,
  `TIPO_BASE` varchar(100) DEFAULT NULL,
  `USUARIO` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `PUERTO` varchar(50) DEFAULT NULL,
  `Ambiente` varchar(255) DEFAULT NULL,
  `Periodo` varchar(255) DEFAULT '.',
  `obligadoContabilidad` varchar(2) DEFAULT 'NO',
  `contribuyenteEspecial` varchar(255) DEFAULT NULL,
  `valor_iva` varchar(3) DEFAULT '12',
  `smtp_host` varchar(50) DEFAULT NULL,
  `smtp_port` varchar(50) DEFAULT NULL,
  `smtp_usuario` varchar(50) DEFAULT NULL,
  `smtp_pass` varchar(50) DEFAULT '',
  `smtp_secure` varchar(10) DEFAULT 'tls',
  `N_MESAS` int(11) DEFAULT 30,
  `facturacion_electronica` bit(1) DEFAULT b'0',
  `procesar_automatico` bit(1) DEFAULT b'0',
  `encargado_envios` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of empresa
-- ----------------------------
INSERT INTO `empresa` VALUES ('5', 'CAFETERIA', 'CAFETERIA', '1722214507', '', '231456987', '', '../img/empresa/logo.jpeg', null, 'walter_jalil_vaca_prieto_natural_2020_09_10.p12', 'Dlcjvl1210', 'localhost', 'cafeteria', 'MYSQL', 'root', '', '3306', '1', '.', '1', null, '18', '', null, '', '', 'tls', '30', '\0', '\0', '11');
INSERT INTO `empresa` VALUES ('6', 'VACA PRIETO WALTER JALIL', 'DISKCOVER SYSTEM', '0702164179001', 'Desarrollo para programacion de DiskCover System', '99999999', 'ejfc19omoshiroi@gmail.com', '../img/empresa/logo.jpeg', null, 'walter_jalil_vaca_prieto_natural_2020_09_10.p12', 'Dlcjvl1210', 'localhost', 'cafeteria1', 'MYSQL', 'root', '', '3306', '1', '.', '0', '4519', '12', '', null, '', '', 'tls', '0', '', '', '12');
INSERT INTO `empresa` VALUES ('7', 'EDISON JAVIER FARINANGO CABEZAS', 'EDISON JAVIER FARINANGO CABEZAS', '1722214507001', 'COLINAS DEL VALLES JIPIRO Y SANTA BARBARA', '0987242579', 'javier.farinango92@gmail.com', '../img/empresa/logo.png', null, 'EDISON_JAVIER_FARINANGO_CABEZAS_0102024.p12', 'Fa19071992', 'localhost', 'cafeteria1', 'MYSQL', 'root', '', '3306', '1', '.', '0', null, '15', '', null, '', '', 'tls', '30', '', '', '');
INSERT INTO `empresa` VALUES ('8', 'TRANSPEIMALAYA S.A.', 'TRANSPORTE PESADO IMALAYA TRANSPEIMALAYA S.A.', '1792680778001', 'CAYETANO CESTARIS S7-158 Y PADRE ELIAS BRITO', '0990313904', 'transpesimalaya2016@outlook.com', '../img/empresa/1792680778001.jpeg', null, 'TranspeimalayaFirma2024.p12', 'Imalaya2024', 'localhost', 'cafeteria1', 'MYSQL', 'root', '', '3306', '2', '.', '1', null, '12', '', null, '', '', 'tls', '30', '', '', '');
INSERT INTO `empresa` VALUES ('30', 'empresa xyz', 'empresa xyz', '1234567890001', 'la madrid', '0987654321', 'example.com', '../img/empresa/empresa_xyz', null, '', '', 'localhost', 'cafeteria1', 'MYSQL', 'root', '', '3306', '1', '.', '0', null, '12', null, null, null, '', 'tls', '30', '', '\0', null);
INSERT INTO `empresa` VALUES ('31', 'empresa 123', 'empresa 123', '1234567890001', 'la pradera', '0987654321', 'example.com', '../img/empresa/empresa_123.png', null, '', '', 'localhost', 'cafeteria1', 'MYSQL', 'root', '', '3306', '1', '.', '0', null, '12', null, null, null, '', 'tls', '30', '', '\0', null);
INSERT INTO `empresa` VALUES ('34', 'MILTON ANDRES RUBIO PUETATE', 'CORSINF', '1712605284001', 'De los Motilones N40-345 y Camilo Gallegos', '3920507', 'factura@corsinf.com', '../img/empresa/logo.png', null, 'milton_andres_rubio_puetate.p12', 'Casta12/*', 'localhost', 'cafeteria1', 'MYSQL', 'root', '', '3306', '2', '.', '0', null, '15', '', null, 'factura', 'Data12/**', 'tls', '30', '', '', '');
INSERT INTO `empresa` VALUES ('35', 'Corporación de Sistemas Informáticos  Corsinf SAS', 'Corsinf ', '1793211628001', 'De Los Motilones N40-345 y Miguel Albornoz\n', '23920507', 'mrubio@corsinf.com', '../img/empresa/logo.jpeg', null, 'MILTON_ANDRES_RUBIO_PUETATE_040124191006.p12', 'Cata1208', 'localhost', 'cafeteria1', 'MYSQL', 'root', '', '3306', '2', '.', '1', null, '15', '', null, '', '', 'tls', '30', '', '', '');

-- ----------------------------
-- Table structure for entregas
-- ----------------------------
DROP TABLE IF EXISTS `entregas`;
CREATE TABLE `entregas` (
  `id_localizacion` int(255) NOT NULL AUTO_INCREMENT,
  `latitud` varchar(255) DEFAULT NULL,
  `longitud` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT '',
  `telefono` varchar(11) DEFAULT '',
  `id_factura` int(11) DEFAULT NULL,
  `entregado` bit(1) DEFAULT b'0',
  `pedido` varchar(255) DEFAULT NULL,
  `empresa` int(11) DEFAULT NULL,
  `principal` varchar(255) DEFAULT NULL,
  `secundario` varchar(255) DEFAULT NULL,
  `numero_casa` varchar(255) DEFAULT NULL,
  `responsable` int(255) DEFAULT NULL,
  `lat_responsable` varchar(255) DEFAULT '0',
  `lon_responsable` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id_localizacion`),
  KEY `FK_FACTURAS_ENTREGAS` (`id_factura`),
  KEY `FK_EMPRESA_ENTREGA` (`empresa`),
  KEY `FK_USUARIO_ENTREGAS` (`responsable`),
  CONSTRAINT `entregas_ibfk_1` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entregas_ibfk_2` FOREIGN KEY (`id_factura`) REFERENCES `facturas` (`id_factura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `entregas_ibfk_3` FOREIGN KEY (`responsable`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of entregas
-- ----------------------------

-- ----------------------------
-- Table structure for estado
-- ----------------------------
DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
  `ID_ESTADO` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO` varchar(255) DEFAULT NULL,
  `DESCRIPCION` varchar(255) DEFAULT NULL,
  `ESTADO` char(1) DEFAULT NULL,
  PRIMARY KEY (`ID_ESTADO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of estado
-- ----------------------------
INSERT INTO `estado` VALUES ('1', 'B', 'BUENO', 'A');
INSERT INTO `estado` VALUES ('2', 'M', 'MALO', 'A');
INSERT INTO `estado` VALUES ('3', 'R', 'REGULAR', 'A');

-- ----------------------------
-- Table structure for facturas
-- ----------------------------
DROP TABLE IF EXISTS `facturas`;
CREATE TABLE `facturas` (
  `id_factura` int(255) NOT NULL AUTO_INCREMENT,
  `num_factura` int(255) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT '0.0000',
  `descuento` varchar(255) DEFAULT '0.0000',
  `iva` varchar(255) DEFAULT '0.0000',
  `total` varchar(255) DEFAULT '0.0000',
  `id_empresa` int(255) DEFAULT NULL,
  `id_usuario` int(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `serie` varchar(255) DEFAULT NULL,
  `Autorizacion` varchar(100) DEFAULT '123456789',
  `Sin_Iva` varchar(255) DEFAULT '0.0000',
  `Porc_IVA` varchar(255) DEFAULT '0.0000',
  `Con_IVA` varchar(255) DEFAULT '0.0000',
  `Tipo_pago` varchar(5) DEFAULT '.',
  `Propina` decimal(8,4) DEFAULT 0.0000,
  `Clave_Acceso` varchar(255) DEFAULT NULL,
  `estado_factura` char(2) DEFAULT 'P',
  `id_pedido` varchar(11) DEFAULT '',
  `datos_adicionales` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `FK_USUARIO_FACTURA` (`id_usuario`) USING BTREE,
  KEY `FK_CLIENTE_FACTURA` (`id_cliente`) USING BTREE,
  KEY `FK_FACTURAS_EMPRESA` (`id_empresa`) USING BTREE,
  CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  CONSTRAINT `facturas_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=554 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of facturas
-- ----------------------------
INSERT INTO `facturas` VALUES ('237', '1', '1.50', '0.00', '0.18', '1.68', '6', '18', '2023-03-25', '44', '001-002', '2503202301070216417900110010020000000011234567814', '0', '0.12', '1.5', '01', '0.0000', '2503202301070216417900110010020000000011234567814', 'A', '', null);
INSERT INTO `facturas` VALUES ('238', '2', '151.50', '0.00', '0.18', '151.68', '6', '18', '2023-03-25', '51', '001-002', '0504202301070216417900110010020000000021234567819', '150', '0.12', '1.5', '.', '0.0000', '0504202301070216417900110010020000000021234567819', 'A', '', null);
INSERT INTO `facturas` VALUES ('239', '3', '100.00', '0.00', '0.00', '100.00', '6', '18', '2023-03-25', '51', '001-002', '2503202301070216417900110010020000000031234567815', '100', '0.12', '0', '01', '0.0000', '2503202301070216417900110010020000000031234567815', 'AN', '', null);
INSERT INTO `facturas` VALUES ('240', '2', '150.00', '0.00', '0.00', '150.00', '6', '18', '2023-03-26', '44', '001-002', '0504202301070216417900110010020000000021234567819', '150', '0.12', '0', '20', '0.0000', '0504202301070216417900110010020000000021234567819', 'A', '', null);
INSERT INTO `facturas` VALUES ('250', '8', '301.5', '0', '0.18', '301.68', '6', '18', '2023-03-26', '41', '001-002', '0702164179001', '300', '0.12', '1.5', '01', '0.0000', null, 'P', '', null);
INSERT INTO `facturas` VALUES ('251', '9', '0.00', '0.00', '0.00', '0.00', '6', '18', '2023-03-29', '41', '001-002', '2903202301070216417900110010020000000091234567816', '0', '0.12', '0', '20', '0.0000', '2903202301070216417900110010020000000091234567816', 'A', '', null);
INSERT INTO `facturas` VALUES ('255', '13', '151.5', '0', '0.18', '151.68', '6', '18', '2023-03-29', null, '001-002', '01070216417900110010020000000131234567815', '150', '0.12', '1.5', '01', '0.0000', '01070216417900110010020000000131234567815', 'R', '', null);
INSERT INTO `facturas` VALUES ('256', '14', '151.5', '0', '0.18', '151.68', '6', '18', '2023-03-29', null, '001-002', '01070216417900110010020000000141234567810', '150', '0.12', '1.5', '01', '0.0000', '01070216417900110010020000000141234567810', 'R', '', null);
INSERT INTO `facturas` VALUES ('257', '15', '151.5', '0', '0.18', '151.68', '6', '18', '2023-03-29', null, '001-002', '0702164179001', '150', '0.12', '1.5', '01', '0.0000', null, 'P', '', null);
INSERT INTO `facturas` VALUES ('258', '16', '0.00', '0.00', '0.00', '0.00', '6', '18', '2023-03-29', '41', '001-002', '2903202301070216417900110010020000000161234567814', '0', '0.12', '0', '01', '0.0000', '2903202301070216417900110010020000000161234567814', 'R', '', null);
INSERT INTO `facturas` VALUES ('259', '17', '151.5', '0', '0.18', '151.68', '6', '18', '2023-03-29', '41', '001-002', '2903202301070216417900110010020000000171234567811', '150', '0.12', '1.5', '01', '0.0000', '2903202301070216417900110010020000000171234567811', 'A', '', null);
INSERT INTO `facturas` VALUES ('260', '18', '151.50', '0.00', '0.18', '151.68', '6', '18', '2023-03-29', '62', '001-002', '2903202301070216417900110010020000000181234567815', '150', '0.12', '1.5', '20', '0.0000', '2903202301070216417900110010020000000181234567815', 'A', '', null);
INSERT INTO `facturas` VALUES ('261', '19', '1.00', '0.00', '0.00', '1.00', '6', '18', '2023-04-03', '38', '001-002', '0304202301070216417900110010020000000191234567812', '1', '0.12', '0', '01', '0.0000', '0304202301070216417900110010020000000191234567812', 'A', '', null);
INSERT INTO `facturas` VALUES ('265', '1', '400.00', '0.00', '48.00', '448.00', '7', '22', '2023-04-04', '65', '001-001', '0501202401179321162800120010010000000011234567813', '0', '0.12', '400', '01', '0.0000', '0501202401179321162800120010010000000011234567813', 'A', '', null);
INSERT INTO `facturas` VALUES ('266', '20', '1.00', '0.00', '0.00', '1.00', '6', '18', '2023-04-04', '44', '001-002', '0702164179001', '1', '0.12', '0', '01', '0.0000', null, 'P', '', null);
INSERT INTO `facturas` VALUES ('267', '2', '150.00', '0.00', '0.00', '150.00', '6', '18', '2023-04-05', '38', '001-002', '0504202301070216417900110010020000000021234567819', '150', '0.12', '0', '01', '0.0000', '0504202301070216417900110010020000000021234567819', 'A', '', null);
INSERT INTO `facturas` VALUES ('268', '21', '1.00', '0.00', '0.00', '1.00', '6', '18', '2023-04-06', '44', '001-001', '1502202401179321162800120010010000000211234567812', '1', '0.12', '0', '01', '0.0000', '1502202401179321162800120010010000000211234567812', 'A', '', null);
INSERT INTO `facturas` VALUES ('269', '3', '0.00', '0.00', '0.00', '0.00', '6', '18', '2023-04-06', '38', '001-002', '0702164179001', '0', '0.12', '0', '.', '0.0000', null, 'P', '', null);
INSERT INTO `facturas` VALUES ('270', '1', '0.00', '0.00', '0.00', '0.00', '8', '24', '2023-04-03', '76', '001-003', '0304202301179268077800110010030000000011234567818', '0', '0.12', '0', '01', '0.0000', '0304202301179268077800110010030000000011234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('271', '22', '1.00', '0.00', '0.00', '1.00', '6', '21', '2023-04-05', '44', '001-002', '0504202301070216417900110010020000000221234567818', '1', '0.12', '0', '01', '0.0000', '0504202301070216417900110010020000000221234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('272', '2', '81.00', '0.00', '0.00', '81.00', '8', '24', '2023-04-07', '77', '001-003', '0704202301179268077800110010030000000021234567811', '81', '0.12', '0', '01', '0.0000', '0704202301179268077800110010030000000021234567811', 'AN', '', '');
INSERT INTO `facturas` VALUES ('273', '3', '40.00', '0.00', '0.00', '40.00', '8', '24', '2023-04-07', '77', '001-003', '0704202301179268077800110010030000000031234567817', '40', '0.12', '0', '01', '0.0000', '0704202301179268077800110010030000000031234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('274', '4', '81.00', '0.00', '0.00', '81.00', '8', '24', '2023-04-07', '77', '001-003', '0704202301179268077800120010030000000041234567810', '81', '0.12', '0', '20', '0.0000', '0704202301179268077800120010030000000041234567810', 'A', '', 'PLACAS: RAB4339');
INSERT INTO `facturas` VALUES ('275', '5', '40.00', '0.00', '0.00', '40.00', '8', '24', '2023-04-07', '77', '001-003', '0704202301179268077800120010030000000051234567816', '40', '0.12', '0', '20', '0.0000', '0704202301179268077800120010030000000051234567816', 'A', '', 'PLACAS: RAB4339');
INSERT INTO `facturas` VALUES ('276', '6', '893.11', '0.00', '0.00', '893.11', '8', '24', '2023-04-10', '77', '001-003', '1004202301179268077800120010030000000061234567813', '893.11', '0.12', '0', '20', '0.0000', '1004202301179268077800120010030000000061234567813', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('278', '8', '197.64', '0.00', '0.00', '197.64', '8', '24', '2023-04-10', '77', '001-003', '1004202301179268077800120010030000000081234567814', '197.64', '0.12', '0', '20', '0.0000', '1004202301179268077800120010030000000081234567814', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('285', '9', '919.16', '0.00', '0.00', '919.16', '8', '24', '2023-04-18', '77', '001-003', '1804202301179268077800120010030000000091234567816', '919.16', '0.12', '0', '20', '0.0000', '1804202301179268077800120010030000000091234567816', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('286', '10', '395.28', '0.00', '0.00', '395.28', '8', '24', '2023-04-18', '77', '001-003', '1804202301179268077800120010030000000101234567811', '395.28', '0.12', '0', '20', '0.0000', '1804202301179268077800120010030000000101234567811', 'A', '', 'PLACAS 4339');
INSERT INTO `facturas` VALUES ('287', '11', '0.00', '0.00', '0.00', '0.00', '8', '24', '2023-04-18', '89', '001-003', '1804202301179268077800120010030000000111234567817', '0', '0.12', '0', '01', '0.0000', '1804202301179268077800120010030000000111234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('288', '12', '183.00', '0.00', '0.00', '183.00', '8', '24', '2023-04-21', '86', '001-003', '2104202301179268077800120010030000000121234567814', '183', '0.12', '0', '20', '0.0000', '2104202301179268077800120010030000000121234567814', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('289', '13', '3220.00', '0.00', '0.00', '3220.00', '8', '24', '2023-04-22', '90', '001-003', '2204202301179268077800120010030000000131234567814', '3220', '0.12', '0', '01', '0.0000', '2204202301179268077800120010030000000131234567814', 'A', '', 'PLACAS PAB8609');
INSERT INTO `facturas` VALUES ('291', '14', '310.52', '0.00', '0.00', '310.52', '8', '24', '2023-04-26', '86', '001-003', '2604202301179268077800120010030000000141234567818', '310.52', '0.12', '0', '20', '0.0000', '2604202301179268077800120010030000000141234567818', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('292', '15', '852.12', '0.00', '0.00', '852.12', '8', '24', '2023-04-26', '86', '001-003', '2604202301179268077800120010030000000151234567813', '852.12', '0.12', '0', '20', '0.0000', '2604202301179268077800120010030000000151234567813', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('293', '16', '592.92', '0.00', '0.00', '592.92', '8', '24', '2023-05-01', '86', '001-003', '0105202301179268077800120010030000000161234567815', '592.92', '0.12', '0', '20', '0.0000', '0105202301179268077800120010030000000161234567815', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('294', '17', '189.16', '0.00', '0.00', '189.16', '8', '24', '2023-05-03', '86', '001-003', '0305202301179268077800120010030000000171234567811', '189.16', '0.12', '0', '20', '0.0000', '0305202301179268077800120010030000000171234567811', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('295', '18', '197.64', '0.00', '0.00', '197.64', '8', '24', '2023-05-09', '86', '001-003', '0905202301179268077800120010030000000181234567812', '197.64', '0.12', '0', '20', '0.0000', '0905202301179268077800120010030000000181234567812', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('296', '19', '407.36', '0.00', '0.00', '407.36', '8', '24', '2023-05-09', '86', '001-003', '0905202301179268077800120010030000000191234567818', '407.36', '0.12', '0', '20', '0.0000', '0905202301179268077800120010030000000191234567818', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('297', '20', '359.28', '0.00', '0.00', '359.28', '8', '24', '2023-05-10', '86', '001-003', '1005202301179268077800120010030000000201234567816', '359.28', '0.12', '0', '20', '0.0000', '1005202301179268077800120010030000000201234567816', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('298', '21', '891.00', '0.00', '0.00', '891.00', '8', '24', '2023-05-12', '91', '001-003', '1205202301179268077800120010030000000211234567810', '891', '0.12', '0', '01', '0.0000', '1205202301179268077800120010030000000211234567810', 'A', '', '');
INSERT INTO `facturas` VALUES ('299', '22', '1228.58', '0.00', '0.00', '1228.58', '8', '24', '2023-05-17', '86', '001-003', '1705202301179268077800120010030000000221234567819', '1228.58', '0.12', '0', '20', '0.0000', '1705202301179268077800120010030000000221234567819', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('300', '23', '224.00', '0.00', '0.00', '224.00', '8', '24', '2023-05-17', '86', '001-003', '1705202301179268077800120010030000000231234567814', '224', '0.12', '0', '20', '0.0000', '1705202301179268077800120010030000000231234567814', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('301', '24', '612.58', '0.00', '0.00', '612.58', '8', '24', '2023-05-23', '86', '001-003', '2305202301179268077800120010030000000241234567815', '612.58', '0.12', '0', '20', '0.0000', '2305202301179268077800120010030000000241234567815', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('302', '25', '228.42', '0.00', '0.00', '228.42', '8', '24', '2023-05-23', '86', '001-003', '2305202301179268077800120010030000000251234567810', '228.42', '0.12', '0', '20', '0.0000', '2305202301179268077800120010030000000251234567810', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('303', '26', '710.00', '0.00', '0.00', '710.00', '8', '24', '2023-05-27', '86', '001-003', '2705202301179268077800120010030000000261234567814', '710', '0.12', '0', '20', '0.0000', '2705202301179268077800120010030000000261234567814', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('304', '27', '270.00', '0.00', '0.00', '270.00', '8', '24', '2023-05-31', '92', '001-003', '3105202301179268077800120010030000000271234567816', '270', '0.12', '0', '01', '0.0000', '3105202301179268077800120010030000000271234567816', 'A', '', 'PLACAS PAB8609');
INSERT INTO `facturas` VALUES ('305', '28', '694.58', '0.00', '0.00', '694.58', '8', '24', '2023-06-02', '86', '001-003', '0206202301179268077800120010030000000281234567811', '694.58', '0.12', '0', '20', '0.0000', '0206202301179268077800120010030000000281234567811', 'A', '', 'PLACAR RAB4339');
INSERT INTO `facturas` VALUES ('306', '29', '197.64', '0.00', '0.00', '197.64', '8', '24', '2023-06-02', '86', '001-003', '0206202301179268077800120010030000000291234567817', '197.64', '0.12', '0', '20', '0.0000', '0206202301179268077800120010030000000291234567817', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('307', '30', '180.00', '0.00', '0.00', '180.00', '8', '24', '2023-06-12', '93', '001-003', '1206202301179268077800120010030000000301234567816', '180', '0.12', '0', '01', '0.0000', '1206202301179268077800120010030000000301234567816', 'A', '', 'PLACAS PAB8609');
INSERT INTO `facturas` VALUES ('308', '31', '698.91', '0.00', '0.00', '698.91', '8', '24', '2023-06-14', '86', '001-003', '1406202301179268077800120010030000000311234567810', '698.91', '0.12', '0', '20', '0.0000', '1406202301179268077800120010030000000311234567810', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('309', '32', '234.09', '0.00', '0.00', '234.09', '8', '24', '2023-06-14', '86', '001-003', '1406202301179268077800120010030000000321234567816', '234.09', '0.12', '0', '20', '0.0000', '1406202301179268077800120010030000000321234567816', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('310', '33', '394.50', '0.00', '0.00', '394.50', '8', '24', '2023-06-20', '86', '001-003', '2006202301179268077800120010030000000331234567817', '394.5', '0.12', '0', '20', '0.0000', '2006202301179268077800120010030000000331234567817', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('311', '34', '607.50', '0.00', '0.00', '607.50', '8', '24', '2023-06-20', '86', '001-003', '2006202301179268077800120010030000000341234567812', '607.5', '0.12', '0', '20', '0.0000', '2006202301179268077800120010030000000341234567812', 'A', '', '');
INSERT INTO `facturas` VALUES ('312', '35', '400.91', '0.00', '0.00', '400.91', '8', '24', '2023-06-28', '86', '001-003', '2806202301179268077800120010030000000351234567814', '400.91', '0.12', '0', '20', '0.0000', '2806202301179268077800120010030000000351234567814', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('313', '36', '607.50', '0.00', '0.00', '607.50', '8', '24', '2023-06-28', '86', '001-003', '2806202301179268077800120010030000000361234567811', '607.5', '0.12', '0', '20', '0.0000', '2806202301179268077800120010030000000361234567811', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('314', '37', '300.38', '0.00', '0.00', '300.38', '8', '24', '2023-06-29', '86', '001-003', '2906202301179268077800120010030000000371234567811', '300.38', '0.12', '0', '20', '0.0000', '2906202301179268077800120010030000000371234567811', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('315', '38', '900.00', '0.00', '0.00', '900.00', '8', '24', '2023-07-03', '91', '001-003', '0307202301179268077800120010030000000381234567817', '900', '0.12', '0', '01', '0.0000', '0307202301179268077800120010030000000381234567817', 'AN', '', 'Placas PAB8609');
INSERT INTO `facturas` VALUES ('316', '39', '891.00', '0.00', '0.00', '891.00', '8', '24', '2023-07-03', '91', '001-003', '0307202301179268077800120010030000000391234567812', '891', '0.12', '0', '01', '0.0000', '0307202301179268077800120010030000000391234567812', 'A', '', 'Placas PAB8609');
INSERT INTO `facturas` VALUES ('317', '40', '351.00', '0.00', '0.00', '351.00', '8', '24', '2023-07-04', '86', '001-003', '0407202301179268077800120010030000000401234567812', '351', '0.12', '0', '20', '0.0000', '0407202301179268077800120010030000000401234567812', 'AN', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('318', '41', '405.00', '0.00', '0.00', '405.00', '8', '24', '2023-07-04', '86', '001-003', '0407202301179268077800120010030000000411234567818', '405', '0.12', '0', '20', '0.0000', '0407202301179268077800120010030000000411234567818', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('319', '42', '490.00', '0.00', '0.00', '490.00', '8', '24', '2023-07-04', '90', '001-003', '0407202301179268077800120010030000000421234567813', '490', '0.12', '0', '01', '0.0000', '0407202301179268077800120010030000000421234567813', 'A', '', 'PLACAS PAB8609');
INSERT INTO `facturas` VALUES ('320', '43', '84.00', '0.00', '0.00', '84.00', '8', '24', '2023-07-13', '86', '001-003', '1307202301179268077800120010030000000431234567818', '84', '0.12', '0', '20', '0.0000', '1307202301179268077800120010030000000431234567818', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('321', '44', '648.50', '0.00', '0.00', '648.50', '8', '24', '2023-07-18', '86', '001-003', '1807202301179268077800120010030000000441234567816', '648.5', '0.12', '0', '20', '0.0000', '1807202301179268077800120010030000000441234567816', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('323', '45', '581.91', '0.00', '0.00', '581.91', '8', '24', '2023-07-18', '86', '001-003', '1807202301179268077800120010030000000451234567811', '581.91', '0.12', '0', '20', '0.0000', '1807202301179268077800120010030000000451234567811', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('324', '46', '457.09', '0.00', '0.00', '457.09', '8', '24', '2023-07-25', '86', '001-003', '2507202301179268077800120010030000000461234567817', '457.09', '0.12', '0', '20', '0.0000', '2507202301179268077800120010030000000461234567817', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('326', '47', '1174.50', '0.00', '0.00', '1174.50', '8', '24', '2023-07-25', '86', '001-003', '2507202301179268077800120010030000000471234567812', '1174.5', '0.12', '0', '20', '0.0000', '2507202301179268077800120010030000000471234567812', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('327', '48', '30.00', '0.00', '0.00', '30.00', '8', '24', '2023-07-26', '86', '001-003', '2607202301179268077800120010030000000481234567812', '30', '0.12', '0', '20', '0.0000', '2607202301179268077800120010030000000481234567812', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('329', '49', '351.00', '0.00', '0.00', '351.00', '8', '24', '2023-08-07', '86', '001-003', '0708202301179268077800120010030000000491234567811', '351', '0.12', '0', '20', '0.0000', '0708202301179268077800120010030000000491234567811', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('330', '50', '436.59', '0.00', '0.00', '436.59', '8', '24', '2023-08-08', '86', '001-003', '0808202301179268077800120010030000000501234567811', '436.59', '0.12', '0', '20', '0.0000', '0808202301179268077800120010030000000501234567811', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('331', '51', '267.00', '0.00', '0.00', '267.00', '8', '24', '2023-08-08', '86', '001-003', '0808202301179268077800120010030000000511234567817', '267', '0.12', '0', '20', '0.0000', '0808202301179268077800120010030000000511234567817', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('332', '52', '649.75', '0.00', '0.00', '649.75', '8', '24', '2023-08-15', '86', '001-003', '1508202301179268077800120010030000000521234567812', '649.75', '0.12', '0', '20', '0.0000', '1508202301179268077800120010030000000521234567812', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('333', '53', '202.50', '0.00', '0.00', '202.50', '8', '24', '2023-08-15', '86', '001-003', '1508202301179268077800120010030000000531234567818', '202.5', '0.12', '0', '20', '0.0000', '1508202301179268077800120010030000000531234567818', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('334', '54', '6065.00', '0.00', '0.00', '6065.00', '8', '24', '2023-08-18', '90', '001-003', '1808202301179268077800120010030000000541234567817', '6065', '0.12', '0', '01', '0.0000', '1808202301179268077800120010030000000541234567817', 'A', '', 'PLACAS PAB8609');
INSERT INTO `facturas` VALUES ('336', '55', '3480.00', '0.00', '0.00', '3480.00', '8', '24', '2023-08-18', '90', '001-003', '1808202301179268077800120010030000000551234567812', '3480', '0.12', '0', '01', '0.0000', '1808202301179268077800120010030000000551234567812', 'A', '', 'PLACAS PAB8609');
INSERT INTO `facturas` VALUES ('337', '56', '1450.00', '0.00', '0.00', '1450.00', '8', '24', '2023-08-22', '86', '001-003', '2208202301179268077800120010030000000561234567814', '1450', '0.12', '0', '20', '0.0000', '2208202301179268077800120010030000000561234567814', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('338', '57', '290.00', '0.00', '0.00', '290.00', '8', '24', '2023-08-24', '93', '001-003', '2408202301179268077800120010030000000571234567819', '290', '0.12', '0', '01', '0.0000', '2408202301179268077800120010030000000571234567819', 'AN', '', 'PLACAS PAB8609');
INSERT INTO `facturas` VALUES ('339', '58', '290.00', '0.00', '0.00', '290.00', '8', '24', '2023-08-24', '94', '001-003', '2408202301179268077800120010030000000581234567814', '290', '0.12', '0', '01', '0.0000', '2408202301179268077800120010030000000581234567814', 'A', '', 'PLACAS PAB8609');
INSERT INTO `facturas` VALUES ('340', '59', '652.25', '0.00', '0.00', '652.25', '8', '24', '2023-08-28', '86', '001-003', '2808202301179268077800120010030000000591234567818', '652.25', '0.12', '0', '20', '0.0000', '2808202301179268077800120010030000000591234567818', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('341', '60', '2050.00', '0.00', '0.00', '2050.00', '8', '24', '2023-08-29', '90', '001-003', '2908202301179268077800120010030000000601234567818', '2050', '0.12', '0', '01', '0.0000', '2908202301179268077800120010030000000601234567818', 'A', '', 'PLACAS PAB8609');
INSERT INTO `facturas` VALUES ('342', '61', '200.00', '0.00', '0.00', '200.00', '8', '24', '2023-09-01', '90', '001-003', '0109202301179268077800120010030000000611234567816', '200', '0.12', '0', '20', '0.0000', '0109202301179268077800120010030000000611234567816', 'AN', '', 'PLACAS PAB8608');
INSERT INTO `facturas` VALUES ('344', '62', '200.00', '0.00', '0.00', '200.00', '8', '24', '2023-09-01', '94', '001-003', '0109202301179268077800120010030000000621234567811', '200', '0.12', '0', '20', '0.0000', '0109202301179268077800120010030000000621234567811', 'A', '', 'PLACAS PAB8609');
INSERT INTO `facturas` VALUES ('345', '63', '468.18', '0.00', '0.00', '468.18', '8', '24', '2023-09-04', '86', '001-003', '0409202301179268077800120010030000000631234567810', '468.18', '0.12', '0', '20', '0.0000', '0409202301179268077800120010030000000631234567810', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('346', '64', '502.82', '0.00', '0.00', '502.82', '8', '24', '2023-09-04', '86', '001-003', '0409202301179268077800120010030000000641234567816', '502.82', '0.12', '0', '20', '0.0000', '0409202301179268077800120010030000000641234567816', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('347', '65', '920.70', '0.00', '0.00', '920.70', '8', '24', '2023-09-04', '91', '001-003', '0409202301179268077800120010030000000651234567811', '920.7', '0.12', '0', '01', '0.0000', '0409202301179268077800120010030000000651234567811', 'A', '', 'PLACAS PAB8609');
INSERT INTO `facturas` VALUES ('348', '66', '1152.00', '0.00', '0.00', '1152.00', '8', '24', '2023-09-12', '86', '001-003', '1209202301179268077800120010030000000661234567811', '1152', '0.12', '0', '20', '0.0000', '1209202301179268077800120010030000000661234567811', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('349', '67', '287.10', '0.00', '0.00', '287.10', '8', '24', '2023-09-15', '91', '001-003', '1509202301179268077800120010030000000671234567810', '287.1', '0.12', '0', '01', '0.0000', '1509202301179268077800120010030000000671234567810', 'A', '', 'PLACAS PAB8609');
INSERT INTO `facturas` VALUES ('350', '68', '912.25', '0.00', '0.00', '912.25', '8', '24', '2023-09-19', '78', '001-003', '1909202301179268077800120010030000000681234567814', '912.25', '0.12', '0', '20', '0.0000', '1909202301179268077800120010030000000681234567814', 'AN', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('351', '69', '912.25', '0.00', '0.00', '912.25', '8', '24', '2023-09-22', '86', '001-003', '2209202301179268077800120010030000000691234567811', '912.25', '0.12', '0', '20', '0.0000', '2209202301179268077800120010030000000691234567811', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('352', '70', '1157.00', '0.00', '0.00', '1157.00', '8', '24', '2023-09-26', '86', '001-003', '2609202301179268077800120010030000000701234567815', '1157', '0.12', '0', '20', '0.0000', '2609202301179268077800120010030000000701234567815', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('353', '71', '329.50', '0.00', '0.00', '329.50', '8', '24', '2023-10-03', '86', '001-003', '0310202301179268077800120010030000000711234567818', '329.5', '0.12', '0', '20', '0.0000', '0310202301179268077800120010030000000711234567818', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('354', '72', '425.50', '0.00', '0.00', '425.50', '8', '24', '2023-10-03', '86', '001-003', '0310202301179268077800120010030000000721234567813', '425.5', '0.12', '0', '20', '0.0000', '0310202301179268077800120010030000000721234567813', 'A', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('357', '73', '396.00', '0.00', '0.00', '396.00', '8', '24', '2023-10-04', '91', '001-003', '0410202301179268077800120010030000000731234567813', '396', '0.12', '0', '01', '0.0000', '0410202301179268077800120010030000000731234567813', 'A', '', 'PLACAS PAB8609');
INSERT INTO `facturas` VALUES ('358', '74', '650.00', '0.00', '0.00', '650.00', '8', '24', '2023-10-05', '90', '001-003', '0510202301179268077800120010030000000741234567813', '650', '0.12', '0', '01', '0.0000', '0510202301179268077800120010030000000741234567813', 'A', '', 'PLACAS PAB8609');
INSERT INTO `facturas` VALUES ('359', '75', '550.00', '0.00', '0.00', '550.00', '8', '24', '2023-10-05', '90', '001-003', '0510202301179268077800120010030000000751234567819', '550', '0.12', '0', '01', '0.0000', '0510202301179268077800120010030000000751234567819', 'A', '', 'PLACAS PAB8609');
INSERT INTO `facturas` VALUES ('360', '10', '1.00', '0.00', '0.00', '1.00', '7', '38', '2023-10-06', '96', '001-001', '3001202401179321162800120010010000000101234567810', '1', '0.12', '0', '01', '0.0000', '3001202401179321162800120010010000000101234567810', 'A', '', '');
INSERT INTO `facturas` VALUES ('361', '1', '50.00', '0.00', '6.00', '56.00', '34', '39', '2023-10-06', '97', '001-001', '0501202401179321162800120010010000000011234567813', '0', '0.12', '50', '20', '0.0000', '0501202401179321162800120010010000000011234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('363', '2', '4585.28', '0.00', '550.23', '5135.51', '34', '39', '2023-10-06', '116', '001-001', '0610202301171260528400110010010000000021234567811', '0', '0.12', '4585.28', '01', '0.0000', '0610202301171260528400110010010000000021234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('380', '3', '450.80', '0.00', '54.10', '504.90', '34', '39', '2023-10-06', '116', '001-001', '0610202301171260528400110010010000000031234567817', '0', '0.12', '450.8', '01', '0.0000', '0610202301171260528400110010010000000031234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('381', '4', '5461.40', '0.00', '655.37', '6116.77', '34', '39', '2023-10-06', '116', '001-001', '0901202401179321162800120010010000000041234567818', '0', '0.12', '5461.4', '01', '0.0000', '0901202401179321162800120010010000000041234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('382', '5', '4585.28', '0.00', '550.23', '5135.51', '34', '39', '2023-10-06', '116', '001-001', '0901202401179321162800120010010000000051234567813', '0', '0.12', '4585.28', '01', '0.0000', '0901202401179321162800120010010000000051234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('383', '6', '100.00', '0.00', '12.00', '112.00', '34', '39', '2023-10-06', '116', '001-001', '1201202401179321162800120010010000000061234567810', '0', '0.12', '100', '01', '0.0000', '1201202401179321162800120010010000000061234567810', 'A', '', '');
INSERT INTO `facturas` VALUES ('384', '11', '1.00', '0.00', '0.00', '1.00', '7', '38', '2023-10-06', '96', '001-001', '3001202401179321162800120010010000000111234567816', '1', '0.12', '0', '01', '0.0000', '3001202401179321162800120010010000000111234567816', 'A', '', '');
INSERT INTO `facturas` VALUES ('385', '7', '3268.30', '0.00', '392.20', '3660.50', '34', '39', '2023-10-06', '116', '001-001', '1501202401179321162800120010010000000071234567811', '0', '0.12', '3268.3', '01', '0.0000', '1501202401179321162800120010010000000071234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('387', '8', '930.50', '0.00', '111.66', '1042.16', '34', '39', '2023-10-06', '159', '001-001', '2601202401179321162800120010010000000081234567813', '0', '0.12', '930.5', '01', '0.0000', '2601202401179321162800120010010000000081234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('389', '793', '5318.10', '0.00', '638.17', '5956.27', '34', '39', '2023-10-10', '126', '001-001', '1712605284001', '0', '0.12', '5318.1', '01', '0.0000', '101020230117126052840012.0000000001234567812', 'R', '', '');
INSERT INTO `facturas` VALUES ('390', '794', '5318.10', '0.00', '638.17', '5956.27', '34', '39', '2023-10-09', '126', '001-001', '1010202301171260528400120010010000007941234567813', '0', '0.12', '5318.1', '09', '0.0000', '1010202301171260528400120010010000007941234567813', 'R', '', '');
INSERT INTO `facturas` VALUES ('391', '795', '5318.10', '0.00', '638.17', '5956.27', '34', '39', '2023-10-09', '126', '001-001', '0910202301171260528400120010010000007951234567816', '0', '0.12', '5318.1', '01', '0.0000', '0910202301171260528400120010010000007951234567816', 'A', '', '');
INSERT INTO `facturas` VALUES ('392', '796', '85454.34', '0.00', '10254.53', '95708.87', '34', '39', '2023-10-09', '150', '001-001', '0910202301171260528400120010010000007961234567811', '0', '0.12', '85454.34', '01', '0.0000', '0910202301171260528400120010010000007961234567811', 'R', '', '');
INSERT INTO `facturas` VALUES ('393', '797', '85454.34', '0.00', '10254.53', '95708.87', '34', '39', '2023-10-10', '150', '001-001', '1010202301171260528400120010010000007971234567811', '0', '0.12', '85454.34', '01', '0.0000', '1010202301171260528400120010010000007971234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('394', '798', '3105.53', '0.00', '372.66', '3478.19', '34', '39', '2023-10-16', '160', '001-001', '1610202301171260528400120010010000007981234567812', '0', '0.12', '3105.53', '20', '0.0000', '1610202301171260528400120010010000007981234567812', 'A', '', 'PAGO 30 DIAS');
INSERT INTO `facturas` VALUES ('395', '799', '815.00', '0.00', '22.20', '837.20', '34', '39', '2023-10-23', '138', '001-001', '2310202301171260528400120010010000007991234567818', '630', '0.12', '185', '20', '0.0000', '2310202301171260528400120010010000007991234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('396', '800', '240.00', '0.00', '28.80', '268.80', '34', '39', '2023-10-23', '119', '001-001', '2310202301171260528400120010010000008001234567811', '0', '0.12', '240', '20', '0.0000', '2310202301171260528400120010010000008001234567811', 'A', '', 'Discos para los equipos de Lorena, Anilu y Grabador Home');
INSERT INTO `facturas` VALUES ('397', '76', '488.00', '0.00', '0.00', '488.00', '8', '24', '2023-10-26', '86', '001-003', '2610202301179268077800120010030000000761234567816', '488', '0.12', '0', '20', '0.0000', '2610202301179268077800120010030000000761234567816', 'R', '', 'PLACAS RAB4339');
INSERT INTO `facturas` VALUES ('399', '803', '300.00', '0.00', '36.00', '336.00', '34', '39', '2023-10-31', '138', '001-001', '3110202301171260528400120010010000008031234567812', '0', '0.12', '300', '20', '0.0000', '3110202301171260528400120010010000008031234567812', 'A', '', '');
INSERT INTO `facturas` VALUES ('400', '802', '500.00', '0.00', '60.00', '560.00', '34', '39', '2023-10-31', '119', '001-001', '3110202301171260528400120010010000008021234567817', '0', '0.12', '500', '20', '0.0000', '3110202301171260528400120010010000008021234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('401', '801', '245.00', '0.00', '29.40', '274.40', '34', '39', '2023-10-31', '126', '001-001', '3110202301171260528400120010010000008011234567811', '0', '0.12', '245', '20', '0.0000', '3110202301171260528400120010010000008011234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('402', '804', '486.00', '0.00', '58.32', '544.32', '34', '39', '2023-10-31', '131', '001-001', '3110202301171260528400120010010000008041234567818', '0', '0.12', '486', '20', '0.0000', '3110202301171260528400120010010000008041234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('403', '805', '60.00', '0.00', '7.20', '67.20', '34', '39', '2023-10-31', '100', '001-001', '3110202301171260528400120010010000008051234567813', '0', '0.12', '60', '20', '0.0000', '3110202301171260528400120010010000008051234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('404', '806', '5202.90', '0.00', '624.35', '5827.25', '34', '39', '2023-11-07', '126', '001-001', '0711202301171260528400120010010000008061234567811', '0', '0.12', '5202.9', '20', '0.0000', '0711202301171260528400120010010000008061234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('405', '807', '196.43', '0.00', '23.57', '220.00', '34', '39', '2023-11-07', '126', '001-001', '0711202301171260528400120010010000008071234567817', '0', '0.12', '196.43', '20', '0.0000', '0711202301171260528400120010010000008071234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('406', '808', '1703.38', '0.00', '204.41', '1907.79', '34', '39', '2023-11-10', '161', '001-001', '1011202301171260528400120010010000008081234567814', '0', '0.12', '1703.38', '20', '0.0000', '1011202301171260528400120010010000008081234567814', 'A', '', '');
INSERT INTO `facturas` VALUES ('407', '809', '150.00', '0.00', '18.00', '168.00', '34', '39', '2023-11-10', '131', '001-001', '1011202301171260528400120010010000008091234567811', '0', '0.12', '150', '20', '0.0000', '1011202301171260528400120010010000008091234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('408', '810', '807.58', '0.00', '96.91', '904.49', '34', '39', '2023-11-10', '157', '001-001', '1011202301171260528400120010010000008101234567815', '0', '0.12', '807.58', '20', '0.0000', '1011202301171260528400120010010000008101234567815', 'A', '', '');
INSERT INTO `facturas` VALUES ('409', '811', '3288.60', '0.00', '394.63', '3683.23', '34', '39', '2023-11-14', '119', '001-001', '1411202301171260528400120010010000008111234567819', '0', '0.12', '3288.6', '20', '0.0000', '1411202301171260528400120010010000008111234567819', 'A', '', '');
INSERT INTO `facturas` VALUES ('410', '0', '0.00', '0.00', '0.00', '0.00', '7', '38', '2023-11-13', '96', '.', '123456789', '0', '0.12', '0', '.', '0.0000', null, 'P', '', null);
INSERT INTO `facturas` VALUES ('411', '812', '945.00', '0.00', '75.60', '1020.60', '34', '39', '2023-11-24', '147', '001-001', '2411202301171260528400120010010000008121234567818', '315', '0.12', '630', '20', '0.0000', '2411202301171260528400120010010000008121234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('412', '813', '315.00', '0.00', '0.00', '315.00', '34', '39', '2023-11-27', '147', '001-001', '2711202301171260528400120010010000008131234567817', '315', '0.12', '0', '20', '0.0000', '2711202301171260528400120010010000008131234567817', 'R', '', '');
INSERT INTO `facturas` VALUES ('413', '814', '315.00', '0.00', '0.00', '315.00', '34', '39', '2023-11-27', '147', '001-001', '2711202301171260528400120010010000008141234567812', '315', '0.12', '0', '20', '0.0000', '2711202301171260528400120010010000008141234567812', 'A', '', '');
INSERT INTO `facturas` VALUES ('414', '815', '560.00', '0.00', '67.20', '627.20', '34', '39', '2023-11-27', '147', '001-001', '2711202301171260528400120010010000008151234567818', '0', '0.12', '560', '20', '0.0000', '2711202301171260528400120010010000008151234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('415', '816', '300.00', '0.00', '36.00', '336.00', '34', '39', '2023-11-29', '138', '001-001', '2911202301171260528400120010010000008161234567812', '0', '0.12', '300', '20', '0.0000', '2911202301171260528400120010010000008161234567812', 'A', '', '');
INSERT INTO `facturas` VALUES ('416', '817', '500.00', '0.00', '60.00', '560.00', '34', '39', '2023-11-29', '119', '001-001', '2911202301171260528400120010010000008171234567818', '0', '0.12', '500', '20', '0.0000', '2911202301171260528400120010010000008171234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('417', '818', '486.00', '0.00', '58.32', '544.32', '34', '39', '2023-11-29', '131', '001-001', '2911202301171260528400120010010000008181234567813', '0', '0.12', '486', '20', '0.0000', '2911202301171260528400120010010000008181234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('418', '819', '60.00', '0.00', '7.20', '67.20', '34', '39', '2023-11-29', '100', '001-001', '2911202301171260528400120010010000008191234567819', '0', '0.12', '60', '01', '0.0000', '2911202301171260528400120010010000008191234567819', 'A', '', '');
INSERT INTO `facturas` VALUES ('419', '820', '245.00', '0.00', '29.40', '274.40', '34', '39', '2023-11-29', '126', '001-001', '2911202301171260528400120010010000008201234567814', '0', '0.12', '245', '20', '0.0000', '2911202301171260528400120010010000008201234567814', 'A', '', '');
INSERT INTO `facturas` VALUES ('420', '821', '347.76', '0.00', '41.73', '389.49', '34', '39', '2023-11-29', '103', '001-001', '2911202301171260528400120010010000008211234567811', '0', '0.12', '347.76', '20', '0.0000', '2911202301171260528400120010010000008211234567811', 'AN', '', '');
INSERT INTO `facturas` VALUES ('421', '822', '347.76', '0.00', '41.73', '389.49', '34', '39', '2023-12-02', '103', '001-001', '0212202301171260528400120010010000008221234567812', '0', '0.12', '347.76', '20', '0.0000', '0212202301171260528400120010010000008221234567812', 'A', '', '');
INSERT INTO `facturas` VALUES ('422', '823', '168.00', '0.00', '20.16', '188.16', '34', '39', '2023-12-06', '150', '001-001', '0612202301171260528400120010010000008231234567816', '0', '0.12', '168', '20', '0.0000', '0612202301171260528400120010010000008231234567816', 'A', '', '');
INSERT INTO `facturas` VALUES ('423', '824', '7156.60', '0.00', '858.79', '8015.39', '34', '39', '2023-12-06', '126', '001-001', '0612202301171260528400120010010000008241234567811', '0', '0.12', '7156.6', '01', '0.0000', '0612202301171260528400120010010000008241234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('424', '825', '462.00', '0.00', '55.44', '517.44', '34', '39', '2023-12-07', '104', '001-001', '0712202301171260528400120010010000008251234567811', '0', '0.12', '462', '01', '0.0000', '0712202301171260528400120010010000008251234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('425', '826', '1.00', '0.00', '0.12', '1.12', '34', '39', '2023-12-15', '159', '001-001', '1512202301171260528400120010010000008261234567811', '0', '0.12', '1', '01', '0.0000', '1512202301171260528400120010010000008261234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('426', '827', '1.00', '0.00', '0.12', '1.12', '34', '39', '2023-12-15', '159', '001-001', '1512202301171260528400120010010000008271234567817', '0', '0.12', '1', '01', '0.0000', '1512202301171260528400120010010000008271234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('427', '828', '347.76', '0.00', '41.73', '389.49', '34', '39', '2023-12-15', '103', '001-001', '1512202301171260528400120010010000008281234567812', '0', '0.12', '347.76', '20', '0.0000', '1512202301171260528400120010010000008281234567812', 'A', '', '');
INSERT INTO `facturas` VALUES ('428', '829', '569.91', '0.00', '68.39', '638.30', '34', '39', '2023-12-19', '100', '001-001', '1912202301171260528400120010010000008291234567816', '0', '0.12', '569.91', '20', '0.0000', '1912202301171260528400120010010000008291234567816', 'R', '', '');
INSERT INTO `facturas` VALUES ('429', '830', '623.00', '0.00', '74.76', '697.76', '34', '39', '2023-12-19', '100', '001-001', '1912202301171260528400120010010000008301234567811', '0', '0.12', '623', '20', '0.0000', '1912202301171260528400120010010000008301234567811', 'R', '', '');
INSERT INTO `facturas` VALUES ('430', '831', '842.91', '0.00', '101.15', '944.06', '34', '39', '2023-12-19', '100', '001-001', '1912202301171260528400120010010000008311234567817', '0', '0.12', '842.91', '20', '0.0000', '1912202301171260528400120010010000008311234567817', 'R', '', '');
INSERT INTO `facturas` VALUES ('431', '832', '842.91', '0.00', '101.15', '944.06', '34', '39', '2023-12-19', '100', '001-001', '1912202301171260528400120010010000008321234567812', '0', '0.12', '842.91', '20', '0.0000', '1912202301171260528400120010010000008321234567812', 'R', '', '');
INSERT INTO `facturas` VALUES ('432', '833', '842.91', '0.00', '101.15', '944.06', '34', '39', '2023-12-19', '100', '001-001', '1912202301171260528400120010010000008331234567818', '0', '0.12', '842.91', '20', '0.0000', '1912202301171260528400120010010000008331234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('433', '834', '500.00', '0.00', '60.00', '560.00', '34', '39', '2023-12-30', '119', '001-001', '3012202301171260528400120010010000008341234567811', '0', '0.12', '500', '20', '0.0000', '3012202301171260528400120010010000008341234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('434', '835', '300.00', '0.00', '36.00', '336.00', '34', '39', '2023-12-30', '138', '001-001', '3012202301171260528400120010010000008351234567815', '0', '0.12', '300', '01', '0.0000', '3012202301171260528400120010010000008351234567815', 'A', '', '');
INSERT INTO `facturas` VALUES ('435', '836', '486.00', '0.00', '58.32', '544.32', '34', '39', '2023-12-30', '131', '001-001', '3012202301171260528400120010010000008361234567810', '0', '0.12', '486', '20', '0.0000', '3012202301171260528400120010010000008361234567810', 'A', '', '');
INSERT INTO `facturas` VALUES ('436', '837', '60.00', '0.00', '7.20', '67.20', '34', '39', '2023-12-30', '100', '001-001', '3012202301171260528400120010010000008371234567816', '0', '0.12', '60', '20', '0.0000', '3012202301171260528400120010010000008371234567816', 'A', '', '');
INSERT INTO `facturas` VALUES ('437', '838', '245.00', '0.00', '29.40', '274.40', '34', '39', '2023-12-30', '126', '001-001', '3012202301171260528400120010010000008381234567811', '0', '0.12', '245', '20', '0.0000', '3012202301171260528400120010010000008381234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('438', '839', '150.00', '0.00', '18.00', '168.00', '34', '39', '2024-01-02', '162', '001-001', '0201202401171260528400120010010000008391234567818', '0', '0.12', '150', '20', '0.0000', '0201202401171260528400120010010000008391234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('440', '1', '1.00', '0.00', '0.12', '1.12', '35', '40', '2024-01-05', '165', '001-001', '0501202401179321162800120010010000000011234567813', '0', '0.12', '1', '01', '0.0000', '0501202401179321162800120010010000000011234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('448', '1', '5480.34', '0.00', '657.64', '6137.98', '35', '40', '2024-01-05', '194', '001-001', '0501202401179321162800120010010000000011234567813', '0', '0.12', '5480.34', '01', '0.0000', '0501202401179321162800120010010000000011234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('450', '4', '1216.61', '0.00', '145.99', '1362.60', '35', '40', '2024-01-09', '168', '001-001', '0901202401179321162800120010010000000041234567818', '0', '0.12', '1216.61', '20', '0.0000', '0901202401179321162800120010010000000041234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('451', '5', '902.72', '0.00', '108.33', '1011.05', '35', '40', '2024-01-09', '187', '001-001', '0901202401179321162800120010010000000051234567813', '0', '0.12', '902.72', '20', '0.0000', '0901202401179321162800120010010000000051234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('453', '6', '300.00', '0.00', '36.00', '336.00', '35', '40', '2024-01-12', '292', '001-001', '1201202401179321162800120010010000000061234567810', '0', '0.12', '300', '20', '0.0000', '1201202401179321162800120010010000000061234567810', 'A', '', '');
INSERT INTO `facturas` VALUES ('454', '7', '245.00', '0.00', '29.40', '274.40', '35', '40', '2024-01-15', '194', '001-001', '1501202401179321162800120010010000000071234567811', '0', '0.12', '245', '01', '0.0000', '1501202401179321162800120010010000000071234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('455', '8', '495.80', '0.00', '59.50', '555.30', '35', '40', '2024-01-26', '218', '001-001', '2601202401179321162800120010010000000081234567813', '0', '0.12', '495.8', '20', '0.0000', '2601202401179321162800120010010000000081234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('456', '9', '500.00', '0.00', '60.00', '560.00', '35', '40', '2024-01-30', '206', '001-001', '3001202401179321162800120010010000000091234567815', '0', '0.12', '500', '01', '0.0000', '3001202401179321162800120010010000000091234567815', 'R', '', '');
INSERT INTO `facturas` VALUES ('457', '10', '500.00', '0.00', '60.00', '560.00', '35', '40', '2024-01-30', '206', '001-001', '3001202401179321162800120010010000000101234567810', '0', '0.12', '500', '20', '0.0000', '3001202401179321162800120010010000000101234567810', 'A', '', '');
INSERT INTO `facturas` VALUES ('458', '11', '500.00', '0.00', '60.00', '560.00', '35', '40', '2024-01-30', '187', '001-001', '3001202401179321162800120010010000000111234567816', '0', '0.12', '500', '20', '0.0000', '3001202401179321162800120010010000000111234567816', 'A', '', '');
INSERT INTO `facturas` VALUES ('459', '12', '400.00', '0.00', '48.00', '448.00', '35', '40', '2024-01-30', '199', '001-001', '3001202401179321162800120010010000000121234567811', '0', '0.12', '400', '20', '0.0000', '3001202401179321162800120010010000000121234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('460', '13', '245.00', '0.00', '29.40', '274.40', '35', '40', '2024-01-30', '194', '001-001', '0404202401172221450700110010010000000131234567817', '0', '0.12', '245', '20', '0.0000', '0404202401172221450700110010010000000131234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('461', '14', '60.00', '0.00', '7.20', '67.20', '35', '40', '2024-01-30', '168', '001-001', '3001202401179321162800120010010000000141234567812', '0', '0.12', '60', '20', '0.0000', '3001202401179321162800120010010000000141234567812', 'A', '', '');
INSERT INTO `facturas` VALUES ('462', '15', '100.00', '0.00', '12.00', '112.00', '35', '40', '2024-01-30', '176', '001-001', '3001202401179321162800120010010000000151234567818', '0', '0.12', '100', '20', '0.0000', '3001202401179321162800120010010000000151234567818', 'AN', '', '');
INSERT INTO `facturas` VALUES ('463', '16', '100.00', '0.00', '12.00', '112.00', '35', '40', '2024-02-01', '176', '001-001', '0102202401179321162800120010010000000161234567813', '0', '0.12', '100', '20', '0.0000', '0102202401179321162800120010010000000161234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('464', '17', '9629766.00', '0.00', '1155571.92', '10785337.92', '35', '40', '2024-02-06', '194', '001-001', '0602202401179321162800120010010000000171234567811', '0', '0.12', '9629766', '20', '0.0000', '0602202401179321162800120010010000000171234567811', 'AN', '', '');
INSERT INTO `facturas` VALUES ('465', '18', '5349.87', '0.00', '641.98', '5991.85', '35', '40', '2024-02-06', '194', '001-001', '0602202401179321162800120010010000000181234567817', '0', '0.12', '5349.87', '20', '0.0000', '0602202401179321162800120010010000000181234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('466', '19', '160.00', '0.00', '19.20', '179.20', '35', '40', '2024-02-15', '218', '001-001', '1502202401179321162800120010010000000191234567811', '0', '0.12', '160', '20', '0.0000', '1502202401179321162800120010010000000191234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('467', '20', '9399.00', '0.00', '1127.88', '10526.88', '35', '40', '2024-02-15', '218', '001-001', '1502202401179321162800120010010000000201234567817', '0', '0.12', '9399', '20', '0.0000', '1502202401179321162800120010010000000201234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('468', '21', '528.00', '0.00', '63.36', '591.36', '35', '40', '2024-02-15', '218', '001-001', '1502202401179321162800120010010000000211234567812', '0', '0.12', '528', '20', '0.0000', '1502202401179321162800120010010000000211234567812', 'A', '', '');
INSERT INTO `facturas` VALUES ('469', '22', '515.20', '0.00', '61.83', '577.03', '35', '40', '2024-02-15', '218', '001-001', '1502202401179321162800120010010000000221234567818', '0', '0.12', '515.2', '20', '0.0000', '1502202401179321162800120010010000000221234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('470', '23', '29352.16', '0.00', '3522.28', '32874.44', '35', '40', '2024-02-15', '218', '001-001', '1502202401179321162800120010010000000231234567813', '0', '0.12', '29352.16', '20', '0.0000', '1502202401179321162800120010010000000231234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('471', '24', '1120.00', '0.00', '134.40', '1254.40', '35', '40', '2024-02-26', '293', '001-001', '2602202401179321162800120010010000000241234567817', '0', '0.12', '1120', '20', '0.0000', '2602202401179321162800120010010000000241234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('472', '25', '500.00', '0.00', '60.00', '560.00', '35', '40', '2024-02-29', '187', '001-001', '2902202401179321162800120010010000000251234567816', '0', '0.12', '500', '20', '0.0000', '2902202401179321162800120010010000000251234567816', 'A', '', '');
INSERT INTO `facturas` VALUES ('473', '26', '500.00', '0.00', '60.00', '560.00', '35', '40', '2024-02-29', '206', '001-001', '2902202401179321162800120010010000000261234567811', '0', '0.12', '500', '20', '0.0000', '2902202401179321162800120010010000000261234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('474', '27', '245.00', '0.00', '29.40', '274.40', '35', '40', '2024-02-29', '194', '001-001', '2902202401179321162800120010010000000271234567817', '0', '0.12', '245', '20', '0.0000', '2902202401179321162800120010010000000271234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('475', '28', '60.00', '0.00', '7.20', '67.20', '35', '40', '2024-02-29', '168', '001-001', '2902202401179321162800120010010000000281234567812', '0', '0.12', '60', '20', '0.0000', '2902202401179321162800120010010000000281234567812', 'A', '', '');
INSERT INTO `facturas` VALUES ('476', '29', '400.00', '0.00', '48.00', '448.00', '35', '40', '2024-02-29', '199', '001-001', '2902202401179321162800120010010000000291234567818', '0', '0.12', '400', '20', '0.0000', '2902202401179321162800120010010000000291234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('477', '30', '5367.60', '0.00', '644.11', '6011.71', '35', '40', '2024-03-05', '194', '001-001', '0503202401179321162800120010010000000301234567814', '0', '0.12', '5367.6', '20', '0.0000', '0503202401179321162800120010010000000301234567814', 'A', '', '');
INSERT INTO `facturas` VALUES ('478', '31', '80.34', '0.00', '9.64', '89.98', '35', '40', '2024-03-06', '194', '001-001', '0603202401179321162800120010010000000311234567814', '0', '0.12', '80.34', '20', '0.0000', '0603202401179321162800120010010000000311234567814', 'A', '', '');
INSERT INTO `facturas` VALUES ('479', '32', '928.20', '0.00', '111.38', '1039.58', '35', '40', '2024-03-12', '176', '001-001', '1203202401179321162800120010010000000321234567815', '0', '0.12', '928.2', '20', '0.0000', '1203202401179321162800120010010000000321234567815', 'A', '', '');
INSERT INTO `facturas` VALUES ('481', '63', '0.00', '0.00', '0.00', '0.00', '8', '24', '2024-03-09', '89', '001-100', '0903202401179268077800120011000000000631234567811', '0', '0.12', '0', '01', '0.0000', '0903202401179268077800120011000000000631234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('482', '33', '60.00', '0.00', '7.20', '67.20', '35', '40', '2024-03-31', '168', '001-001', '3103202401179321162800120010010000000331234567813', '0', '0.12', '60', '01', '0.0000', '3103202401179321162800120010010000000331234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('483', '34', '500.00', '0.00', '60.00', '560.00', '35', '40', '2024-03-31', '206', '001-001', '3103202401179321162800120010010000000341234567819', '0', '0.12', '500', '01', '0.0000', '3103202401179321162800120010010000000341234567819', 'A', '', '');
INSERT INTO `facturas` VALUES ('484', '35', '500.00', '0.00', '60.00', '560.00', '35', '40', '2024-03-31', '187', '001-001', '3103202401179321162800120010010000000351234567814', '0', '0.12', '500', '20', '0.0000', '3103202401179321162800120010010000000351234567814', 'A', '', '');
INSERT INTO `facturas` VALUES ('485', '36', '400.00', '0.00', '48.00', '448.00', '35', '40', '2024-03-31', '199', '001-001', '3103202401179321162800120010010000000361234567811', '0', '0.12', '400', '20', '0.0000', '3103202401179321162800120010010000000361234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('486', '37', '245.00', '0.00', '29.40', '274.40', '35', '40', '2024-03-31', '194', '001-001', '3103202401179321162800120010010000000371234567815', '0', '0.12', '245', '20', '0.0000', '3103202401179321162800120010010000000371234567815', 'A', '', '');
INSERT INTO `facturas` VALUES ('487', '13', '10.00', '0.00', '1.50', '11.50', '7', '38', '2024-04-04', '95', '001-001', '0404202401172221450700110010010000000131234567817', '0', '0.15', '10', '01', '0.0000', '0404202401172221450700110010010000000131234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('488', '38', '5372.22', '0.00', '805.83', '6178.05', '35', '40', '2024-04-04', '194', '001-001', '0404202401179321162800120010010000000381234567811', '0', '0.15', '5372.22', '20', '0.0000', '0404202401179321162800120010010000000381234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('489', '39', '704.00', '0.00', '105.60', '809.60', '35', '40', '2024-04-11', '206', '001-001', '1104202401179321162800120010010000000391234567815', '0', '0.15', '704', '20', '0.0000', '1104202401179321162800120010010000000391234567815', 'A', '', '');
INSERT INTO `facturas` VALUES ('490', '40', '719.60', '0.00', '107.94', '827.54', '35', '40', '2024-04-17', '218', '001-001', '1704202401179321162800120010010000000401234567818', '0', '0.15', '719.6', '20', '0.0000', '1704202401179321162800120010010000000401234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('491', '41', '400.00', '0.00', '60.00', '460.00', '35', '40', '2024-04-29', '206', '001-001', '2904202401179321162800120010010000000411234567816', '0', '0.15', '400', '20', '0.0000', '2904202401179321162800120010010000000411234567816', 'A', '', '');
INSERT INTO `facturas` VALUES ('492', '42', '500.00', '0.00', '75.00', '575.00', '35', '40', '2024-04-29', '187', '001-001', '2904202401179321162800120010010000000421234567811', '0', '0.15', '500', '20', '0.0000', '2904202401179321162800120010010000000421234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('493', '43', '245.00', '0.00', '36.75', '281.75', '35', '40', '2024-04-29', '194', '001-001', '2904202401179321162800120010010000000431234567817', '0', '0.15', '245', '20', '0.0000', '2904202401179321162800120010010000000431234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('494', '44', '60.00', '0.00', '9.00', '69.00', '35', '40', '2024-04-29', '168', '001-001', '2904202401179321162800120010010000000441234567812', '0', '0.15', '60', '20', '0.0000', '2904202401179321162800120010010000000441234567812', 'A', '', '');
INSERT INTO `facturas` VALUES ('495', '45', '400.00', '0.00', '60.00', '460.00', '35', '40', '2024-04-29', '199', '001-001', '2904202401179321162800120010010000000451234567818', '0', '0.15', '400', '20', '0.0000', '2904202401179321162800120010010000000451234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('496', '46', '1430.32', '0.00', '214.55', '1644.87', '35', '40', '2024-04-29', '206', '001-001', '2904202401179321162800120010010000000461234567813', '0', '0.15', '1430.32', '20', '0.0000', '2904202401179321162800120010010000000461234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('497', '47', '964.66', '0.00', '144.70', '1109.36', '35', '40', '2024-04-29', '218', '001-001', '2904202401179321162800120010010000000471234567819', '0', '0.15', '964.66', '20', '0.0000', '2904202401179321162800120010010000000471234567819', 'A', '', '');
INSERT INTO `facturas` VALUES ('498', '48', '14.13', '0.00', '2.12', '16.25', '35', '40', '2024-05-05', '194', '001-001', '0505202401179321162800120010010000000481234567815', '0', '0.15', '14.13', '20', '0.0000', '0505202401179321162800120010010000000481234567815', 'A', '', '');
INSERT INTO `facturas` VALUES ('499', '49', '80.34', '0.00', '12.05', '92.39', '35', '40', '2024-05-05', '194', '001-001', '0505202401179321162800120010010000000491234567810', '0', '0.15', '80.34', '20', '0.0000', '0505202401179321162800120010010000000491234567810', 'A', '', '');
INSERT INTO `facturas` VALUES ('500', '50', '5373.68', '0.00', '806.05', '6179.73', '35', '40', '2024-05-05', '194', '001-001', '0505202401179321162800120010010000000501234567816', '0', '0.15', '5373.68', '20', '0.0000', '0505202401179321162800120010010000000501234567816', 'A', '', '');
INSERT INTO `facturas` VALUES ('501', '51', '2541.69', '0.00', '381.26', '2922.95', '35', '40', '2024-05-22', '197', '001-001', '2205202401179321162800120010010000000511234567815', '0', '0.15', '2541.69', '20', '0.0000', '2205202401179321162800120010010000000511234567815', 'A', '', '');
INSERT INTO `facturas` VALUES ('502', '52', '400.00', '0.00', '60.00', '460.00', '35', '40', '2024-05-28', '206', '001-001', '2805202401179321162800120010010000000521234567818', '0', '0.15', '400', '20', '0.0000', '2805202401179321162800120010010000000521234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('503', '53', '500.00', '0.00', '75.00', '575.00', '35', '40', '2024-05-28', '187', '001-001', '2805202401179321162800120010010000000531234567813', '0', '0.15', '500', '20', '0.0000', '2805202401179321162800120010010000000531234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('504', '54', '245.00', '0.00', '36.75', '281.75', '35', '40', '2024-05-28', '194', '001-001', '2805202401179321162800120010010000000541234567819', '0', '0.15', '245', '20', '0.0000', '2805202401179321162800120010010000000541234567819', 'A', '', '');
INSERT INTO `facturas` VALUES ('505', '55', '400.00', '0.00', '60.00', '460.00', '35', '40', '2024-05-28', '199', '001-001', '2805202401179321162800120010010000000551234567814', '0', '0.15', '400', '20', '0.0000', '2805202401179321162800120010010000000551234567814', 'A', '', '');
INSERT INTO `facturas` VALUES ('506', '56', '60.00', '0.00', '9.00', '69.00', '35', '40', '2024-05-28', '168', '001-001', '2805202401179321162800120010010000000561234567811', '0', '0.15', '60', '20', '0.0000', '2805202401179321162800120010010000000561234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('507', '57', '1151.44', '0.00', '172.72', '1324.16', '35', '40', '2024-05-30', '218', '001-001', '3005202401179321162800120010010000000571234567812', '0', '0.15', '1151.44', '20', '0.0000', '3005202401179321162800120010010000000571234567812', 'A', '', '');
INSERT INTO `facturas` VALUES ('508', '58', '5480.34', '0.00', '822.05', '6302.39', '35', '40', '2024-06-04', '194', '001-001', '0406202401179321162800120010010000000581234567811', '0', '0.15', '5480.34', '20', '0.0000', '0406202401179321162800120010010000000581234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('509', '59', '554.88', '0.00', '83.23', '638.11', '35', '40', '2024-06-21', '199', '001-001', '2106202401179321162800120010010000000591234567810', '0', '0.15', '554.88', '20', '0.0000', '2106202401179321162800120010010000000591234567810', 'A', '', '');
INSERT INTO `facturas` VALUES ('510', '60', '175.00', '0.00', '26.25', '201.25', '35', '40', '2024-06-27', '294', '001-001', '2706202401179321162800120010010000000601234567813', '0', '0.15', '175', '20', '0.0000', '2706202401179321162800120010010000000601234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('511', '61', '400.00', '0.00', '60.00', '460.00', '35', '40', '2024-06-27', '206', '001-001', '2706202401179321162800120010010000000611234567819', '0', '0.15', '400', '20', '0.0000', '2706202401179321162800120010010000000611234567819', 'A', '', '');
INSERT INTO `facturas` VALUES ('512', '62', '500.00', '0.00', '75.00', '575.00', '35', '40', '2024-06-27', '187', '001-001', '2706202401179321162800120010010000000621234567814', '0', '0.15', '500', '20', '0.0000', '2706202401179321162800120010010000000621234567814', 'A', '', '');
INSERT INTO `facturas` VALUES ('513', '63', '245.00', '0.00', '36.75', '281.75', '35', '40', '2024-06-27', '194', '001-001', '2706202401179321162800120010010000000631234567811', '0', '0.15', '245', '20', '0.0000', '2706202401179321162800120010010000000631234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('514', '64', '400.00', '0.00', '60.00', '460.00', '35', '40', '2024-06-27', '199', '001-001', '2706202401179321162800120010010000000641234567815', '0', '0.15', '400', '20', '0.0000', '2706202401179321162800120010010000000641234567815', 'A', '', '');
INSERT INTO `facturas` VALUES ('515', '65', '60.00', '0.00', '9.00', '69.00', '35', '40', '2024-06-27', '168', '001-001', '2706202401179321162800120010010000000651234567810', '0', '0.15', '60', '20', '0.0000', '2706202401179321162800120010010000000651234567810', 'A', '', '');
INSERT INTO `facturas` VALUES ('516', '66', '254.15', '0.00', '38.12', '292.27', '35', '40', '2024-06-28', '226', '001-001', '2806202401179321162800120010010000000661234567810', '0', '0.15', '254.15', '20', '0.0000', '2806202401179321162800120010010000000661234567810', 'A', '', '');
INSERT INTO `facturas` VALUES ('517', '67', '386.82', '0.00', '58.02', '444.84', '35', '40', '2024-07-01', '187', '001-001', '0107202401179321162800120010010000000671234567813', '0', '0.15', '386.82', '20', '0.0000', '0107202401179321162800120010010000000671234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('518', '68', '40.20', '0.00', '6.03', '46.23', '35', '40', '2024-07-02', '206', '001-001', '0207202401179321162800120010010000000681234567813', '0', '0.15', '40.2', '20', '0.0000', '0207202401179321162800120010010000000681234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('519', '69', '130.00', '0.00', '19.50', '149.50', '35', '40', '2024-07-02', '204', '001-001', '0207202401179321162800120010010000000691234567819', '0', '0.15', '130', '20', '0.0000', '0207202401179321162800120010010000000691234567819', 'A', '', '');
INSERT INTO `facturas` VALUES ('520', '70', '5604.22', '0.00', '840.64', '6444.86', '35', '40', '2024-07-03', '194', '001-001', '0307202401179321162800120010010000000701234567819', '0', '0.15', '5604.22', '20', '0.0000', '0307202401179321162800120010010000000701234567819', 'A', '', '');
INSERT INTO `facturas` VALUES ('521', '71', '1000.00', '0.00', '150.00', '1150.00', '35', '40', '2024-07-03', '293', '001-001', '0307202401179321162800120010010000000711234567814', '0', '0.15', '1000', '20', '0.0000', '0307202401179321162800120010010000000711234567814', 'A', '', '');
INSERT INTO `facturas` VALUES ('522', '72', '580.50', '0.00', '87.07', '667.57', '35', '40', '2024-07-03', '168', '001-001', '0307202401179321162800120010010000000721234567811', '0', '0.15', '580.5', '20', '0.0000', '0307202401179321162800120010010000000721234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('523', '842', '0.00', '0.00', '0.00', '0.00', '34', '39', '2024-06-12', '295', '001-001', '123456789', '0', '0.12', '0', '20', '0.0000', null, 'P', '', '');
INSERT INTO `facturas` VALUES ('524', '73', '251.16', '0.00', '37.67', '288.83', '35', '40', '2024-07-18', '296', '001-001', '1807202401179321162800120010010000000731234567811', '0', '0.15', '251.16', '20', '0.0000', '1807202401179321162800120010010000000731234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('525', '74', '175.00', '0.00', '26.25', '201.25', '35', '40', '2024-07-24', '294', '001-001', '2407202401179321162800120010010000000741234567812', '0', '0.15', '175', '01', '0.0000', '2407202401179321162800120010010000000741234567812', 'A', '', '');
INSERT INTO `facturas` VALUES ('526', '75', '166.76', '0.00', '25.02', '191.78', '35', '40', '2024-07-24', '218', '001-001', '2407202401179321162800120010010000000751234567818', '0', '0.15', '166.76', '20', '0.0000', '2407202401179321162800120010010000000751234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('527', '76', '200.00', '0.00', '30.00', '230.00', '35', '40', '2024-07-31', '199', '001-001', '3107202401179321162800120010010000000761234567813', '0', '0.15', '200', '20', '0.0000', '3107202401179321162800120010010000000761234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('528', '77', '60.00', '0.00', '9.00', '69.00', '35', '40', '2024-07-31', '168', '001-001', '3107202401179321162800120010010000000771234567819', '0', '0.15', '60', '20', '0.0000', '3107202401179321162800120010010000000771234567819', 'A', '', '');
INSERT INTO `facturas` VALUES ('529', '78', '500.00', '0.00', '75.00', '575.00', '35', '40', '2024-07-31', '187', '001-001', '3107202401179321162800120010010000000781234567814', '0', '0.15', '500', '20', '0.0000', '3107202401179321162800120010010000000781234567814', 'A', '', '');
INSERT INTO `facturas` VALUES ('530', '79', '400.00', '0.00', '60.00', '460.00', '35', '40', '2024-07-31', '206', '001-001', '3107202401179321162800120010010000000791234567811', '0', '0.15', '400', '20', '0.0000', '3107202401179321162800120010010000000791234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('531', '80', '245.00', '0.00', '36.75', '281.75', '35', '40', '2024-07-31', '194', '001-001', '3107202401179321162800120010010000000801234567815', '0', '0.15', '245', '20', '0.0000', '3107202401179321162800120010010000000801234567815', 'A', '', '');
INSERT INTO `facturas` VALUES ('532', '81', '5540.72', '0.00', '831.11', '6371.83', '35', '40', '2024-08-01', '194', '001-001', '0108202401179321162800120010010000000811234567816', '0', '0.15', '5540.72', '20', '0.0000', '0108202401179321162800120010010000000811234567816', 'A', '', '');
INSERT INTO `facturas` VALUES ('533', '82', '1000.00', '0.00', '150.00', '1150.00', '35', '40', '2024-08-05', '293', '001-001', '0508202401179321162800120010010000000821234567811', '0', '0.15', '1000', '20', '0.0000', '0508202401179321162800120010010000000821234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('534', '83', '3690.96', '0.00', '553.65', '4244.61', '35', '40', '2024-08-12', '171', '001-001', '1208202401179321162800120010010000000831234567815', '0', '0.15', '3690.96', '20', '0.0000', '1208202401179321162800120010010000000831234567815', 'A', '', '');
INSERT INTO `facturas` VALUES ('535', '84', '175.00', '0.00', '26.25', '201.25', '35', '40', '2024-08-27', '294', '001-001', '2708202401179321162800120010010000000841234567817', '0', '0.15', '175', '20', '0.0000', '2708202401179321162800120010010000000841234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('536', '85', '55.78', '0.00', '8.37', '64.15', '35', '40', '2024-08-27', '294', '001-001', '2708202401179321162800120010010000000851234567812', '0', '0.15', '55.78', '20', '0.0000', '2708202401179321162800120010010000000851234567812', 'A', '', '');
INSERT INTO `facturas` VALUES ('537', '86', '1000.00', '0.00', '150.00', '1150.00', '35', '40', '2024-08-29', '293', '001-001', '2908202401179321162800120010010000000861234567817', '0', '0.15', '1000', '20', '0.0000', '2908202401179321162800120010010000000861234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('538', '87', '60.00', '0.00', '9.00', '69.00', '35', '40', '2024-08-29', '168', '001-001', '2908202401179321162800120010010000000871234567812', '0', '0.15', '60', '20', '0.0000', '2908202401179321162800120010010000000871234567812', 'A', '', '');
INSERT INTO `facturas` VALUES ('539', '88', '200.00', '0.00', '30.00', '230.00', '35', '40', '2024-08-29', '199', '001-001', '2908202401179321162800120010010000000881234567818', '0', '0.15', '200', '20', '0.0000', '2908202401179321162800120010010000000881234567818', 'A', '', '');
INSERT INTO `facturas` VALUES ('540', '89', '400.00', '0.00', '60.00', '460.00', '35', '40', '2024-08-29', '206', '001-001', '2908202401179321162800120010010000000891234567813', '0', '0.15', '400', '01', '0.0000', '2908202401179321162800120010010000000891234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('541', '90', '500.00', '0.00', '75.00', '575.00', '35', '40', '2024-08-29', '187', '001-001', '2908202401179321162800120010010000000901234567819', '0', '0.15', '500', '20', '0.0000', '2908202401179321162800120010010000000901234567819', 'A', '', '');
INSERT INTO `facturas` VALUES ('542', '91', '245.00', '0.00', '36.75', '281.75', '35', '40', '2024-08-29', '194', '001-001', '2908202401179321162800120010010000000911234567814', '0', '0.15', '245', '20', '0.0000', '2908202401179321162800120010010000000911234567814', 'A', '', '');
INSERT INTO `facturas` VALUES ('543', '92', '5400.00', '0.00', '810.00', '6210.00', '35', '40', '2024-09-03', '194', '001-001', '0309202401179321162800120010010000000921234567811', '0', '0.15', '5400', '20', '0.0000', '0309202401179321162800120010010000000921234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('544', '93', '80.34', '0.00', '12.05', '92.39', '35', '40', '2024-09-03', '194', '001-001', '0309202401179321162800120010010000000931234567817', '0', '0.15', '80.34', '20', '0.0000', '0309202401179321162800120010010000000931234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('545', '94', '621.89', '0.00', '93.28', '715.17', '35', '40', '2024-09-04', '194', '001-001', '0409202401179321162800120010010000000941234567817', '0', '0.15', '621.89', '20', '0.0000', '0409202401179321162800120010010000000941234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('548', '98', '400.00', '0.00', '60.00', '460.00', '35', '40', '2024-09-30', '206', '001-001', '3009202401179321162800120010010000000981234567811', '0', '0.15', '400', '20', '0.0000', '3009202401179321162800120010010000000981234567811', 'A', '', '');
INSERT INTO `facturas` VALUES ('549', '99', '500.00', '0.00', '75.00', '575.00', '35', '40', '2024-09-30', '187', '001-001', '3009202401179321162800120010010000000991234567817', '0', '0.15', '500', '01', '0.0000', '3009202401179321162800120010010000000991234567817', 'A', '', '');
INSERT INTO `facturas` VALUES ('550', '100', '60.00', '0.00', '9.00', '69.00', '35', '40', '2024-09-30', '168', '001-001', '3009202401179321162800120010010000001001234567810', '0', '0.15', '60', '20', '0.0000', '3009202401179321162800120010010000001001234567810', 'A', '', '');
INSERT INTO `facturas` VALUES ('551', '101', '200.00', '0.00', '30.00', '230.00', '35', '40', '2024-09-30', '199', '001-001', '3009202401179321162800120010010000001011234567816', '0', '0.15', '200', '20', '0.0000', '3009202401179321162800120010010000001011234567816', 'A', '', '');
INSERT INTO `facturas` VALUES ('552', '102', '5826.23', '0.00', '873.93', '6700.16', '35', '40', '2024-10-01', '194', '001-001', '0110202401179321162800120010010000001021234567813', '0', '0.15', '5826.23', '20', '0.0000', '0110202401179321162800120010010000001021234567813', 'A', '', '');
INSERT INTO `facturas` VALUES ('553', '843', '705.00', '0.00', '87.75', '792.75', '34', '39', '2024-11-08', '150', '001-001', '123456789', '120', '0.12', '585', '20', '0.0000', null, 'P', '', '');

-- ----------------------------
-- Table structure for forma_pago
-- ----------------------------
DROP TABLE IF EXISTS `forma_pago`;
CREATE TABLE `forma_pago` (
  `id_forma_pago` int(11) NOT NULL AUTO_INCREMENT,
  `forma_pago` varchar(255) DEFAULT NULL,
  `estado_forma_pago` char(255) DEFAULT 'A',
  `comprobante` int(1) DEFAULT 0,
  `mostrar_en` varchar(255) DEFAULT '1',
  `id_empresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_forma_pago`),
  KEY `FK_EMPRESA_FORMA-PAGO` (`id_empresa`) USING BTREE,
  CONSTRAINT `forma_pago_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of forma_pago
-- ----------------------------
INSERT INTO `forma_pago` VALUES ('5', 'EFECTIVO', 'A', '0', '1', '5');
INSERT INTO `forma_pago` VALUES ('6', 'EFECTIVO', 'A', '0', '1', '6');

-- ----------------------------
-- Table structure for genero
-- ----------------------------
DROP TABLE IF EXISTS `genero`;
CREATE TABLE `genero` (
  `ID_GENERO` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO` varchar(255) DEFAULT NULL,
  `DESCRIPCION` varchar(255) DEFAULT NULL,
  `ESTADO` char(1) DEFAULT NULL,
  PRIMARY KEY (`ID_GENERO`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of genero
-- ----------------------------
INSERT INTO `genero` VALUES ('1', '1', 'N/A', 'A');
INSERT INTO `genero` VALUES ('2', '2', 'VIDRIO', 'A');
INSERT INTO `genero` VALUES ('3', '3', 'TELA', 'A');
INSERT INTO `genero` VALUES ('4', '4', 'MIMBRE', 'A');
INSERT INTO `genero` VALUES ('5', '5', 'ELECTRICO', 'A');
INSERT INTO `genero` VALUES ('6', '6', 'MIXTO', 'A');
INSERT INTO `genero` VALUES ('7', '7', 'PLASTICO', 'A');
INSERT INTO `genero` VALUES ('8', '8', 'CERAMICA', 'A');
INSERT INTO `genero` VALUES ('9', '9', 'ELECTRONICO', 'A');
INSERT INTO `genero` VALUES ('10', '10', 'MADERA', 'A');
INSERT INTO `genero` VALUES ('11', '11', 'CUERINA', 'A');
INSERT INTO `genero` VALUES ('12', '12', 'LOSA', 'A');
INSERT INTO `genero` VALUES ('13', '13', 'ETERNIT', 'A');
INSERT INTO `genero` VALUES ('14', '14', 'FIBRA', 'A');
INSERT INTO `genero` VALUES ('15', '15', 'MARMOL', 'A');
INSERT INTO `genero` VALUES ('16', '16', 'FORMICA', 'A');
INSERT INTO `genero` VALUES ('19', '17', 'METAL', 'A');

-- ----------------------------
-- Table structure for guia_remision
-- ----------------------------
DROP TABLE IF EXISTS `guia_remision`;
CREATE TABLE `guia_remision` (
  `id_empresa` varchar(255) DEFAULT '',
  `id_fac_interna` varchar(255) DEFAULT NULL,
  `TC` varchar(2) DEFAULT NULL,
  `Serie` varchar(7) DEFAULT '',
  `Factura` int(11) DEFAULT NULL,
  `Autorizacion` varchar(49) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `id_cliente` varchar(10) DEFAULT '',
  `Definitivo` varchar(20) DEFAULT NULL,
  `Fecha_Tours` varchar(25) DEFAULT NULL,
  `DAU` int(11) DEFAULT NULL,
  `FUE` int(11) DEFAULT NULL,
  `Declaracion` varchar(20) DEFAULT NULL,
  `Remision` int(11) DEFAULT NULL,
  `Comercial` varchar(120) DEFAULT NULL,
  `Cantidad` decimal(19,4) DEFAULT NULL,
  `Kilos` decimal(19,4) DEFAULT NULL,
  `Solicitud` int(11) DEFAULT NULL,
  `CIRUC_Comercial` varchar(13) DEFAULT NULL,
  `Entrega` varchar(60) DEFAULT NULL,
  `CIRUC_Entrega` varchar(13) DEFAULT NULL,
  `CiudadGRI` varchar(35) DEFAULT NULL,
  `CiudadGRF` varchar(35) DEFAULT NULL,
  `Placa_Vehiculo` varchar(10) DEFAULT NULL,
  `FechaGRE` datetime DEFAULT NULL,
  `FechaGRI` datetime DEFAULT NULL,
  `FechaGRF` datetime DEFAULT NULL,
  `Pedido` varchar(15) DEFAULT NULL,
  `Zona` varchar(50) DEFAULT NULL,
  `estado` varchar(3) DEFAULT '',
  `Serie_GR` varchar(7) DEFAULT '',
  `Autorizacion_GR` varchar(49) DEFAULT NULL,
  `Clave_Acceso_GR` varchar(49) DEFAULT NULL,
  `Orden_Compra` int(11) DEFAULT NULL,
  `Lugar_Entrega` varchar(50) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`),
  KEY `IDX_Facturas_Auxiliares` (`id_empresa`,`TC`,`Serie`,`Factura`,`Fecha`,`id_cliente`,`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of guia_remision
-- ----------------------------
INSERT INTO `guia_remision` VALUES ('6', null, 'GR', '001-002', '1', '2503202301070216417900110010020000000011234567814', '2023-03-26 00:00:00', '62', null, null, null, null, null, '12', 'Javier Farinango', null, null, null, '1722214507', 'Javier Farinango', '1750188326', 'AGUARICO', 'ALAUSI', 'XXX-999', '2023-03-25 00:00:00', '2023-03-25 00:00:00', '2023-03-25 00:00:00', 'pedido8', 'zona 12', 'A', '001-002', '2503202306070216417900110010020000000121234567816', '2503202306070216417900110010020000000121234567816', null, 'plazoleta', '17');
INSERT INTO `guia_remision` VALUES ('6', '251', 'GR', '001-002', '9', '2903202301070216417900110010020000000091234567816', '2023-03-29 00:00:00', '41', null, null, null, null, null, '13', 'Javier Farinango', null, null, null, '1722214507', 'Javier Farinango', '1750188326', '24 DE MAYO', '24 DE MAYO', 'XXX-999', '2023-03-11 00:00:00', '2023-03-11 00:00:00', '2023-03-11 00:00:00', 'pediro 12', 'zona 12', 'R', '001-002', '1103202306070216417900110010020000000131234567811', '1103202306070216417900110010020000000131234567811', null, 'plazoleta cristo', '18');
INSERT INTO `guia_remision` VALUES ('6', '259', 'GR', '001-002', '17', '2903202301070216417900110010020000000171234567811', '2023-03-29 00:00:00', '41', null, null, null, null, null, '14', 'Javier Farinango', null, null, null, '1722214507', 'Javier Farinango', '1750188326', 'AGUARICO', 'AGUARICO', 'XXX-999', '2023-03-29 00:00:00', '2023-03-29 00:00:00', '2023-03-29 00:00:00', 'pediro 12', 'zona 12', 'AN', '001-002', '2903202306070216417900110010020000000141234567815', '2903202306070216417900110010020000000141234567815', null, 'plazoleta cristo', '19');
INSERT INTO `guia_remision` VALUES ('6', null, 'GR', '001-003', '2', '98765654543432234', '2023-03-27 00:00:00', '41', null, null, null, null, null, '15', 'Javier Farinango', null, null, null, '1722214507', 'Javier Farinango', '1750188326', 'ARENILLAS', 'AMBATO', 'XXX-999', '2023-03-29 00:00:00', '2023-03-29 00:00:00', '2023-03-29 00:00:00', 'pediro 23', 'zona 12', 'A', '001-002', '2903202306070216417900110010020000000151234567810', '2903202306070216417900110010020000000151234567810', null, 'portal', '20');
INSERT INTO `guia_remision` VALUES ('6', '260', 'GR', '001-002', '18', '2903202301070216417900110010020000000181234567815', '2023-03-29 00:00:00', '62', null, null, null, null, null, '16', 'Javier Farinango', null, null, null, '1722214507', 'Javier Farinango', '1750188326', '24 DE MAYO', 'AGUARICO', 'XXX-999', '2023-03-29 00:00:00', '2023-03-29 00:00:00', '2023-03-29 00:00:00', 'pediro 12', 'zona 12', 'A', '001-002', '2903202306070216417900110010020000000161234567816', '2903202306070216417900110010020000000161234567816', null, 'plazoleta cristo', '21');
INSERT INTO `guia_remision` VALUES ('6', null, 'GR', '001-003', '18', '00000001', '2023-03-28 00:00:00', '62', null, null, null, null, null, '17', 'Javier Farinango', null, null, null, '1722214507', 'Javier Farinango', '1750188326', 'AGUARICO', 'ALAUSI', 'XXX-999', '2023-03-29 00:00:00', '2023-03-29 00:00:00', '2023-03-29 00:00:00', 'pediro 12', 'zona 12', 'R', '001-002', '2903202306070216417900110010020000000171234567811', '2903202306070216417900110010020000000171234567811', null, 'plazoleta cristo', '22');
INSERT INTO `guia_remision` VALUES ('6', null, 'GR', '001-003', '6', '2903202301070216417900110010020000000091234567816', '2023-03-28 00:00:00', '41', null, null, null, null, null, '18', 'Javier Farinango', null, null, null, '1722214507', 'Javier Farinango', '1750188326', '24 DE MAYO', 'AMBATO', 'XXX-999', '2023-03-29 00:00:00', '2023-03-29 00:00:00', '2023-03-29 00:00:00', 'pediro 12', 'zona 12', 'A', '001-002', '2903202306070216417900110010020000000181234567817', '2903202306070216417900110010020000000181234567817', null, 'plazoleta cristo', '23');
INSERT INTO `guia_remision` VALUES ('6', '273', 'GR', '001-002', '5', '2903202301070216417900110010020000000051234567814', '2023-03-29 00:00:00', '62', null, null, null, null, null, '19', 'Javier Farinango', null, null, null, '1722214507', 'Javier Farinango', '1722214507', 'AGUARICO', 'AGUARICO', 'XXX-999', '2023-03-29 00:00:00', '2023-03-29 00:00:00', '2023-03-29 00:00:00', 'pediro 12', 'zona 12', 'A', '001-002', '2903202306070216417900110010020000000191234567812', '2903202306070216417900110010020000000191234567812', null, 'plazoleta cristo', '24');
INSERT INTO `guia_remision` VALUES ('6', null, 'GR', '001-002', '2', '1234567890', '2023-04-10 00:00:00', '62', null, null, null, null, null, '20', 'Javier Farinango', null, null, null, '1722214507', 'Javier Farinango', '1722214507', 'AGUARICO', 'AGUARICO', 'XXX-999', '2023-04-10 00:00:00', '2023-04-10 00:00:00', '2023-04-10 00:00:00', 'pediro 12', 'zona 12', 'A', '001-002', '1004202306070216417900110010020000000201234567811', '1004202306070216417900110010020000000201234567811', null, 'plazoleta cristo', '25');
INSERT INTO `guia_remision` VALUES ('6', null, 'GR', '', null, null, null, '42', null, null, null, null, null, '21', 'Javier Farinango', null, null, null, '1722214507', 'Javier Farinango', '1722214507', 'AGUARICO', 'AGUARICO', 'XXX-999', '2023-04-11 00:00:00', '2023-04-11 00:00:00', '2023-04-11 00:00:00', '', '', 'P', '001-001', '0702164179001', null, null, '', '26');
INSERT INTO `guia_remision` VALUES ('6', null, 'GR', '', null, null, null, '43', null, null, null, null, null, '1', 'Javier Farinango', null, null, null, '1722214507', 'Javier Farinango', '1750188326', 'AGUARICO', 'AGUARICO', 'XXX-999', '2023-04-11 00:00:00', '2023-04-11 00:00:00', '2023-04-11 00:00:00', 'pediro 12', 'zona 12', 'P', '001-001', '0702164179001', null, null, 'plazoleta cristo', '27');
INSERT INTO `guia_remision` VALUES ('6', null, 'GR', '001-001', '1', '1234567890', '2023-04-11 00:00:00', '41', null, null, null, null, null, '2', 'Javier Farinango', null, null, null, '1722214507', 'Javier Farinango', '1750188326', 'ALFREDO BAQUERIZO MORENO', 'AMBATO', 'XXX-999', '2023-04-11 00:00:00', '2023-04-11 00:00:00', '2023-04-11 00:00:00', 'pediro 12', 'zona 12', 'A', '001-001', '1104202306070216417900110010010000000021234567818', '1104202306070216417900110010010000000021234567818', null, 'plazoleta cristo', '28');

-- ----------------------------
-- Table structure for kardex_temp
-- ----------------------------
DROP TABLE IF EXISTS `kardex_temp`;
CREATE TABLE `kardex_temp` (
  `id_kardex` int(255) NOT NULL AUTO_INCREMENT,
  `id_producto` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `TP` varchar(255) DEFAULT NULL,
  `entrada` varchar(255) DEFAULT NULL,
  `salida` varchar(255) DEFAULT NULL,
  `valor_unitario` varchar(255) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT '',
  `total_iva` varchar(255) DEFAULT NULL,
  `existencias` varchar(255) DEFAULT NULL,
  `costo` varchar(255) DEFAULT NULL,
  `valor_total` varchar(255) DEFAULT '',
  `Factura` varchar(255) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `fecha_Fab` date DEFAULT NULL,
  `fecha_Exp` date DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `proveedor` varchar(255) DEFAULT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  `serie` varchar(255) DEFAULT NULL,
  `empresa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kardex`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of kardex_temp
-- ----------------------------

-- ----------------------------
-- Table structure for kit
-- ----------------------------
DROP TABLE IF EXISTS `kit`;
CREATE TABLE `kit` (
  `id_kit` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) DEFAULT NULL,
  `id_materia_prima` int(11) DEFAULT NULL,
  `cantida` varchar(255) DEFAULT NULL,
  `tamanio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kit`),
  KEY `FK_MATERIA_KIT` (`id_materia_prima`),
  KEY `FK_PRODUCTO_KIT` (`id_producto`),
  KEY `FK_TAMANIO_KIT` (`tamanio`),
  CONSTRAINT `kit_ibfk_1` FOREIGN KEY (`id_materia_prima`) REFERENCES `productos` (`id_productos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `kit_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_productos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `kit_ibfk_3` FOREIGN KEY (`tamanio`) REFERENCES `tamanio` (`id_tamanio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of kit
-- ----------------------------

-- ----------------------------
-- Table structure for lineas_factura
-- ----------------------------
DROP TABLE IF EXISTS `lineas_factura`;
CREATE TABLE `lineas_factura` (
  `id_lineas` int(255) NOT NULL AUTO_INCREMENT,
  `producto` varchar(255) DEFAULT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `precio_uni` varchar(255) DEFAULT NULL,
  `porc_descuento` varchar(255) DEFAULT '',
  `descuento` varchar(255) DEFAULT NULL,
  `iva` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `id_factura` int(11) DEFAULT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  `porc_iva` decimal(8,4) DEFAULT NULL,
  `Serie_No` varchar(100) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT NULL,
  `id_guiaRemi` varchar(11) DEFAULT '',
  `observacion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_lineas`),
  KEY `FK_LINEAS_FACTURA` (`id_factura`) USING BTREE,
  KEY `FK_PRODUCTO_LINEA` (`referencia`) USING BTREE,
  CONSTRAINT `lineas_factura_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `facturas` (`id_factura`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=842 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lineas_factura
-- ----------------------------
INSERT INTO `lineas_factura` VALUES ('338', 'servicio de trasporte', '1', '1.50', '0.00', '0.00', '0.18', '1.68', '237', '10.23.25', '0.1200', '001-002', '1.50', null, null);
INSERT INTO `lineas_factura` VALUES ('339', 'servicio de trasporte', '1', '1.50', '0.00', '0.00', '0.18', '1.68', '238', '10.23.25', '0.1200', '001-002', '1.50', null, null);
INSERT INTO `lineas_factura` VALUES ('340', 'Pollo  1', '1', '150.00', '0.00', '0.00', '0.00', '150.00', '238', '01.01.37', '0.0000', '001-002', '150.00', null, null);
INSERT INTO `lineas_factura` VALUES ('341', 'Queso', '1', '100.00', '0.00', '0.00', '0.00', '100.00', '239', '01.01.36', '0.0000', '001-002', '100.00', null, null);
INSERT INTO `lineas_factura` VALUES ('344', 'Pollo  1', '1', '150.00', '0.00', '0.00', '0.00', '150.00', '240', '01.01.37', '0.0000', '001-002', '150.00', null, null);
INSERT INTO `lineas_factura` VALUES ('357', 'servicio de trasporte', '1', '1.50', '0.00', '0.00', '0.18', '1.68', '259', '10.23.25', '0.1200', '001-002', '1.50', '19', null);
INSERT INTO `lineas_factura` VALUES ('358', 'Pollo  1', '1', '150.00', '0.00', '0.00', '0.00', '150.00', '259', '01.01.37', '0.0000', '001-002', '150.00', '19', null);
INSERT INTO `lineas_factura` VALUES ('359', 'servicio de trasporte', '1', '1.50', '0.00', '0.00', '0.18', '1.68', null, '10.23.25', '0.1200', '001-002', '1.50', '20', null);
INSERT INTO `lineas_factura` VALUES ('360', 'Pollo  1', '1', '150.00', '0.00', '0.00', '0.00', '150.00', '260', '01.01.37', '0.0000', '001-002', '150.00', '21', null);
INSERT INTO `lineas_factura` VALUES ('361', 'servicio de trasporte', '1', '1.50', '0.00', '0.00', '0.18', '1.68', '260', '10.23.25', '0.1200', '001-002', '1.50', '21', null);
INSERT INTO `lineas_factura` VALUES ('362', 'Queso', '1', '100.00', '0.00', '0.00', '0.00', '100.00', null, '01.01.36', '0.0000', '001-002', '100.00', '22', null);
INSERT INTO `lineas_factura` VALUES ('363', 'servicio de trasporte', '1', '1.50', '0.00', '0.00', '0.18', '1.68', null, '10.23.25', '0.1200', '001-002', '1.50', '23', null);
INSERT INTO `lineas_factura` VALUES ('367', 'SERVICIO DE TRANSPORTE LOS DIAS 14 Y 26 DE MARZO DE 2023', '1', '81.00', '0.00', '0.00', '0.00', '81.00', '272', '2', '0.0000', '001-003', '81.00', '', '');
INSERT INTO `lineas_factura` VALUES ('368', 'SERVICIO DE TRANSPORTE DEL DÍA 14 DE MARZO DE 2022 ', '1', '40.00', '0.00', '0.00', '0.00', '40.00', '273', '3', '0.0000', '001-003', '40.00', '', '');
INSERT INTO `lineas_factura` VALUES ('369', 'SERVICIO DE TRANSPORTE LOS DIAS 14 Y 26 DE MARZO DE 2023', '1', '81.00', '0.00', '0.00', '0.00', '81.00', '274', '2', '0.0000', '001-003', '81.00', '', '');
INSERT INTO `lineas_factura` VALUES ('374', 'SERVICIO DE TRANSPORTE DEL DÍA 14 DE MARZO DE 2022 ', '1', '40.00', '0.00', '0.00', '0.00', '40.00', '275', '3', '0.0000', '001-003', '40.00', '', '');
INSERT INTO `lineas_factura` VALUES ('375', 'Servicios prueba', '1', '0.00', '0.00', '0.00', '0.00', '0.00', null, '001.001', '0.0000', '001-003', '0.00', '25', '');
INSERT INTO `lineas_factura` VALUES ('376', 'SERVICIO DE TRANSPORTE LOS DIAS 1 - 2 - 3 - 4 - 6 - 8 DE MARZO DE 2023', '1', '893.11', '0.00', '0.00', '0.00', '893.11', '276', '2', '0.0000', '001-003', '893.11', '', '');
INSERT INTO `lineas_factura` VALUES ('377', 'SERVICIO DE TRANSPORTE DEL DIA 8 DE ABRIL DE 2023 ', '1', '197.64', '0.00', '0.00', '0.00', '197.64', '278', '3', '0.0000', '001-003', '197.64', '', '');
INSERT INTO `lineas_factura` VALUES ('387', 'SERVICIO DE TRANSPORTE LOS DIAS 10 - 11 - 13 - 14 DE ABRIL DE 2023', '1', '919.16', '0.00', '0.00', '0.00', '919.16', '285', '2', '0.0000', '001-003', '919.16', '', '');
INSERT INTO `lineas_factura` VALUES ('388', 'SERVICIO DE TRANSPORTE LOS DIAS 10 Y 13 DE ABRIL DE 2023', '1', '395.28', '0.00', '0.00', '0.00', '395.28', '286', '2', '0.0000', '001-003', '395.28', '', '');
INSERT INTO `lineas_factura` VALUES ('390', 'Servicios prueba', '1', '0.00', '0.00', '0.00', '0.00', '0.00', '287', '001.001', '0.0000', '001-003', '0.00', '', '');
INSERT INTO `lineas_factura` VALUES ('392', 'SERVICIO DE TRANSPORTE DEL DÍA 09 DE ABRIL DE 2022 ', '1', '183', '0.00', '0.00', '0.00', '183.00', '288', '3', '0.0000', '001-003', '183.00', '', '');
INSERT INTO `lineas_factura` VALUES ('393', 'VIAJES DE LA UNIVERSAL', '1', '3220', '0.00', '0.00', '0.00', '3220.00', '289', '3', '0.0000', '001-003', '3220.00', '', '');
INSERT INTO `lineas_factura` VALUES ('396', 'SERVICIO DE TRANSPORTE LOS DIAS 17 - 20 - 21 - 22 - 23 DE ABRIL DE 2023', '1', '310.52', '0.00', '0.00', '0.00', '310.52', '291', '2', '0.0000', '001-003', '310.52', '', '');
INSERT INTO `lineas_factura` VALUES ('398', 'SERVICIO DE TRANSPORTE LOS DIAS 17 - 20 -22 - 24 DE ABRIL DE 2023', '1', '852.12', '0.00', '0.00', '0.00', '852.12', '292', '2', '0.0000', '001-003', '852.12', '', '');
INSERT INTO `lineas_factura` VALUES ('399', 'SERVICIO DE TRANSPORTE DE LOS DIAS 10 - 13 - 27 DE ABRIL DE 2023', '1', '592.92', '0.00', '0.00', '0.00', '592.92', '293', '3', '0.0000', '001-003', '592.92', '', '');
INSERT INTO `lineas_factura` VALUES ('401', 'SERVICIO DE TRANSPORTE LOS DIAS 24 - 25 - 27 DE ABRIL DE 2023', '1', '189.16', '0.00', '0.00', '0.00', '189.16', '294', '2', '0.0000', '001-003', '189.16', '', '');
INSERT INTO `lineas_factura` VALUES ('402', 'SERVICIO DE TRANSPORTE DEL DÍA 04 DE MAYO DE 2022', '1', '197.64', '0.00', '0.00', '0.00', '197.64', '295', '3', '0.0000', '001-003', '197.64', '', '');
INSERT INTO `lineas_factura` VALUES ('403', 'SERVICIO DE TRANSPORTE LOS DIAS 02 - 04 - 05 - 06 DE MAYO DE 2023', '1', '407.36', '0.00', '0.00', '0.00', '407.36', '296', '2', '0.0000', '001-003', '407.36', '', '');
INSERT INTO `lineas_factura` VALUES ('404', 'SERVICIO DE TRANSPORTE DE LOS DIAS 10 - 13 DE ABRIL DE 2023', '1', '359.28', '0.00', '0.00', '0.00', '359.28', '297', '3', '0.0000', '001-003', '359.28', '', '');
INSERT INTO `lineas_factura` VALUES ('406', 'SERVICIO DE TRANSPORTE', '1', '891', '0.00', '0.00', '0.00', '891.00', '298', '3', '0.0000', '001-003', '891.00', '', '');
INSERT INTO `lineas_factura` VALUES ('407', 'SERVICIO DE TRANSPORTE LOS DIAS 7 - 9 - 11 - 12 - 13 DE MAYO DE 2023', '1', '1228.58', '0.00', '0.00', '0.00', '1228.58', '299', '2', '0.0000', '001-003', '1228.58', '', '');
INSERT INTO `lineas_factura` VALUES ('408', 'SERVICIO DE TRANSPORTE DEL DÍA 11 DE MAYO DE 2023', '1', '224', '0.00', '0.00', '0.00', '224.00', '300', '3', '0.0000', '001-003', '224.00', '', '');
INSERT INTO `lineas_factura` VALUES ('409', 'SERVICIO DE TRANSPORTE LOS DIAS 16 - 16 - 18 - 19 - 20 DE MAYO DE 2023', '1', '612.58', '0.00', '0.00', '0.00', '612.58', '301', '2', '0.0000', '001-003', '612.58', '', '');
INSERT INTO `lineas_factura` VALUES ('410', 'SERVICIO DE TRANSPORTE DEL DÍA 18 DE MAYO DE 2023', '1', '228.42', '0.00', '0.00', '0.00', '228.42', '302', '3', '0.0000', '001-003', '228.42', '', '');
INSERT INTO `lineas_factura` VALUES ('411', 'SERVICIO DE TRANSPORTE LOS DIAS 15 Y 25 DE MAYO DE 2023', '1', '710', '0.00', '0.00', '0.00', '710.00', '303', '2', '0.0000', '001-003', '710.00', '', '');
INSERT INTO `lineas_factura` VALUES ('412', 'SERVICIO DE TRANSPORTE ', '1', '270', '0.00', '0.00', '0.00', '270.00', '304', '3', '0.0000', '001-003', '270.00', '', '');
INSERT INTO `lineas_factura` VALUES ('413', 'SERVICIO DE TRANSPORTE LOS DIAS 25 - 26 - 27 - 29 - 30 DE MAYO DE 2023', '1', '694.58', '0.00', '0.00', '0.00', '694.58', '305', '2', '0.0000', '001-003', '694.58', '', '');
INSERT INTO `lineas_factura` VALUES ('414', 'SERVICIO DE TRANSPORTE DEL DÍA 25 DE MAYO DE 2023', '1', '197.64', '0.00', '0.00', '0.00', '197.64', '306', '3', '0.0000', '001-003', '197.64', '', '');
INSERT INTO `lineas_factura` VALUES ('415', 'SERVICIO DE TRANSPORTE', '1', '180', '0.00', '0.00', '0.00', '180.00', '307', '2', '0.0000', '001-003', '180.00', '', '');
INSERT INTO `lineas_factura` VALUES ('416', 'SERVICIO DE TRANSPORTE LOS DIAS 01 - 05 - 06 - 08 - 09 - 10 DE JUNIO DE 2023', '1', '698.91', '0.00', '0.00', '0.00', '698.91', '308', '2', '0.0000', '001-003', '698.91', '', '');
INSERT INTO `lineas_factura` VALUES ('417', 'SERVICIO DE TRANSPORTE DEL DIA 10 DE JUNIO DE 2023 ', '1', '234.09', '0.00', '0.00', '0.00', '234.09', '309', '3', '0.0000', '001-003', '234.09', '', '');
INSERT INTO `lineas_factura` VALUES ('418', 'SERVICIO DE TRANSPORTE LOS DIAS 11 - 12 - 13 - 15 - 16 - 17 DE JUNIO DE 2023', '1', '394.50', '0.00', '0.00', '0.00', '394.50', '310', '2', '0.0000', '001-003', '394.50', '', '');
INSERT INTO `lineas_factura` VALUES ('419', 'SERVICIO DE TRANSPORTE LOS DIAS 12 - 15 - 17  DE JUNIO DE 2023', '1', '607.50', '0.00', '0.00', '0.00', '607.50', '311', '2', '0.0000', '001-003', '607.50', '', '');
INSERT INTO `lineas_factura` VALUES ('420', 'SERVICIO DE TRANSPORTE LOS DIAS 19 - 20 - 22 - 23 - 24 DE JUNIO DE 2023', '1', '400.91', '0.00', '0.00', '0.00', '400.91', '312', '2', '0.0000', '001-003', '400.91', '', '');
INSERT INTO `lineas_factura` VALUES ('421', 'SERVICIO DE TRANSPORTE LOS DIAS 19 - 22 - 24 DE JUNIO DE 2023', '1', '607.50', '0.00', '0.00', '0.00', '607.50', '313', '2', '0.0000', '001-003', '607.50', '', '');
INSERT INTO `lineas_factura` VALUES ('422', 'Servicio logístico de transporte - tarifa extraordinaria acordada entre las partes', '1', '300.38', '0.00', '0.00', '0.00', '300.38', '314', '3', '0.0000', '001-003', '300.38', '', '');
INSERT INTO `lineas_factura` VALUES ('423', 'SERVICIO DE TRANSPORTE', '1', '900.00', '0.00', '0.00', '0.00', '900.00', '315', '3', '0.0000', '001-003', '900.00', '', '');
INSERT INTO `lineas_factura` VALUES ('424', 'SERVICIO DE TRANSPORTE PARA TUTI ', '1', '891', '0.00', '0.00', '0.00', '891.00', '316', '3', '0.0000', '001-003', '891.00', '', '');
INSERT INTO `lineas_factura` VALUES ('425', 'SERVICIO DE TRANSPORTE LOS DIAS 25 - 26 - 27 - 29 DE JUNIO DE 2023', '1', '351', '0.00', '0.00', '0.00', '351.00', '317', '2', '0.0000', '001-003', '351.00', '', '');
INSERT INTO `lineas_factura` VALUES ('426', 'SERVICIO DE TRANSPORTE LOS DIAS 26 - 29 DE JUNIO DE 2023', '1', '405', '0.00', '0.00', '0.00', '405.00', '318', '2', '0.0000', '001-003', '405.00', '', '');
INSERT INTO `lineas_factura` VALUES ('427', 'VIAJES LA UNIVERSAL', '1', '490', '0.00', '0.00', '0.00', '490.00', '319', '3', '0.0000', '001-003', '490.00', '', '');
INSERT INTO `lineas_factura` VALUES ('428', 'SERVICIO DE TRANSPORTE DEL DÍA 18 DE JUNIO DE 2023', '1', '84', '0.00', '0.00', '0.00', '84.00', '320', '3', '0.0000', '001-003', '84.00', '', '');
INSERT INTO `lineas_factura` VALUES ('429', 'SERVICIO DE TRANSPORTE DE LOS DIAS 10 - 13 - 15 DE JULIO DE 2023', '1', '648.50', '0.00', '0.00', '0.00', '648.50', '321', '3', '0.0000', '001-003', '648.50', '', '');
INSERT INTO `lineas_factura` VALUES ('431', 'SERVICIO DE TRANSPORTE LOS DIAS 09 - 10 - 13 - 14 - 15 DE JULIO DE 2023', '1', '581.91', '0.00', '0.00', '0.00', '581.91', '323', '2', '0.0000', '001-003', '581.91', '', '');
INSERT INTO `lineas_factura` VALUES ('433', 'SERVICIO DE TRANSPORTE LOS DIAS 17 - 22 DE JULIO DE 2023', '1', '457.09', '0.00', '0.00', '0.00', '457.09', '324', '2', '0.0000', '001-003', '457.09', '', '');
INSERT INTO `lineas_factura` VALUES ('434', 'SERVICIO DE TRANSPORTE LOS DIAS 16 - 17 - 18 - 21 - 22 - 23 DE JULIO DE 2023', '1', '1174.50', '0.00', '0.00', '0.00', '1174.50', '326', '2', '0.0000', '001-003', '1174.50', '', '');
INSERT INTO `lineas_factura` VALUES ('436', 'SERVICIO DE TRANSPORTE DEL DÍA 26 DE JULIO DE 2023 ', '1', '30.00', '0.00', '0.00', '0.00', '30.00', '327', '3', '0.0000', '001-003', '30.00', '', '');
INSERT INTO `lineas_factura` VALUES ('438', 'SERVICIO DE TRANSPORTE LOS DIAS 25 - 26 - 27 - 29 DE JUNIO DE 2023', '1', '351.00', '0.00', '0.00', '0.00', '351.00', '329', '2', '0.0000', '001-003', '351.00', '', '');
INSERT INTO `lineas_factura` VALUES ('440', 'SERVICIO DE TRANSPORTE LOS DIAS 03 - 05 DE AGOSTO DE 2023', '1', '436.59', '0.00', '0.00', '0.00', '436.59', '330', '2', '0.0000', '001-003', '436.59', '', '');
INSERT INTO `lineas_factura` VALUES ('441', 'SERVICIO DE TRANSPORTE LOS DIAS 01 - 03 - 04 - 05 DE AGOSTO DE 2023', '1', '267', '0.00', '0.00', '0.00', '267.00', '331', '2', '0.0000', '001-003', '267.00', '', '');
INSERT INTO `lineas_factura` VALUES ('442', 'SERVICIO DE TRANSPORTE LOS DIAS 6 - 7 - 8 - 10 - 12 DE AGOSTO DE 2023', '1', '649.75', '0.00', '0.00', '0.00', '649.75', '332', '2', '0.0000', '001-003', '649.75', '', '');
INSERT INTO `lineas_factura` VALUES ('444', 'SERVICIO DE TRANSPORTE DEL DÍA 07 DE AGOSTO DE 2023 ', '1', '202.5', '0.00', '0.00', '0.00', '202.50', '333', '3', '0.0000', '001-003', '202.50', '', '');
INSERT INTO `lineas_factura` VALUES ('446', 'VIAJES LA UNIVERSAL ', '1', '6065', '0.00', '0.00', '0.00', '6065.00', '334', '3', '0.0000', '001-003', '6065.00', '', '');
INSERT INTO `lineas_factura` VALUES ('447', 'PAQUETERIA ', '1', '3480', '0.00', '0.00', '0.00', '3480.00', '336', '3', '0.0000', '001-003', '3480.00', '', '');
INSERT INTO `lineas_factura` VALUES ('449', 'SERVICIO DE TRANSPORTE LOS DIAS 13 - 14 - 15 - 18 - 19 DE AGOSTO DE 2023', '1', '1450', '.00', '0.00', '0.00', '1450.00', '337', '2', '0.0000', '001-003', '1450.00', '', '');
INSERT INTO `lineas_factura` VALUES ('451', 'SERVICIO DE TRANSPORTE ', '1', '290', '0.00', '0.00', '0.00', '290.00', '338', '3', '0.0000', '001-003', '290.00', '', '');
INSERT INTO `lineas_factura` VALUES ('452', 'SERVICIO DE TRANSPORTE', '1', '290', '0.00', '0.00', '0.00', '290.00', '339', '3', '0.0000', '001-003', '290.00', '', '');
INSERT INTO `lineas_factura` VALUES ('453', 'SERVICIO DE TRANSPORTE LOS DIAS 20 - 21 - 24 DE AGOSTO DE 2023', '1', '652.25', '0.00', '0.00', '0.00', '652.25', '340', '2', '0.0000', '001-003', '652.25', '', '');
INSERT INTO `lineas_factura` VALUES ('454', 'VIAJES LA UNIVERSAL', '1', '2050', '0.00', '0.00', '0.00', '2050.00', '341', '2', '0.0000', '001-003', '2050.00', '', '');
INSERT INTO `lineas_factura` VALUES ('455', 'VIAJES LA UNIVERSAL', '1', '200', '0.00', '0.00', '0.00', '200.00', '342', '3', '0.0000', '001-003', '200.00', '', '');
INSERT INTO `lineas_factura` VALUES ('456', 'VIAJES LA UNIVERSAL', '1', '200', '0.00', '0.00', '0.00', '200.00', '344', '3', '0.0000', '001-003', '200.00', '', '');
INSERT INTO `lineas_factura` VALUES ('457', 'SERVICIO DE TRANSPORTE LOS DIAS 28 Y 31 DE AGOSTO DE 2023', '1', '468.18', '0.00', '0.00', '0.00', '468.18', '345', '2', '0.0000', '001-003', '468.18', '', '');
INSERT INTO `lineas_factura` VALUES ('458', 'SERVICIO DE TRANSPORTE LOS DIAS 26 - 27 - 28 - 29 - 31 DE AGOSTO DE 2023', '1', '502.82', '0.00', '0.00', '0.00', '502.82', '346', '2', '0.0000', '001-003', '502.82', '', '');
INSERT INTO `lineas_factura` VALUES ('459', 'SERVICIO DE TRANSPORTE', '1', '920.70', '0.00', '0.00', '0.00', '920.70', '347', '3', '0.0000', '001-003', '920.70', '', '');
INSERT INTO `lineas_factura` VALUES ('460', 'SERVICIO DE TRANSPORTE LOS DIAS 01 - 02 - 04 - 05 DE ABRIL DE 2023', '1', '1152', '0.00', '0.00', '0.00', '1152.00', '348', '2', '0.0000', '001-003', '1152.00', '', '');
INSERT INTO `lineas_factura` VALUES ('461', 'SERVICIO DE TRANSPORTE DE GUAYAQUIL A QUITO ', '1', '287.1', '0.00', '0.00', '0.00', '287.10', '349', '3', '0.0000', '001-003', '287.10', '', '');
INSERT INTO `lineas_factura` VALUES ('462', 'SERVICIO DE TRANSPORTE LOS DIAS 10 - 11 - 12 - 14 Y 16 DE SEPTIEMBRE DE 2023', '1', '912.25', '0.00', '0.00', '0.00', '912.25', '350', '2', '0.0000', '001-003', '912.25', '', '');
INSERT INTO `lineas_factura` VALUES ('463', 'SERVICIO DE TRANSPORTE LOS DIAS 10 - 11 - 12 - 14 Y 16 DE SEPTIEMBRE DE 2023', '1', '912.25', '0.00', '0.00', '0.00', '912.25', '351', '3', '0.0000', '001-003', '912.25', '', '');
INSERT INTO `lineas_factura` VALUES ('465', 'SERVICIO DE TRANSPORTE LOS DIAS 17 - 18 - 19 - 21 - 22 - 24 DE SEPTIEMBRE DE 2023', '1', '1157', '0.00', '0.00', '0.00', '1157.00', '352', '2', '0.0000', '001-003', '1157.00', '', '');
INSERT INTO `lineas_factura` VALUES ('466', 'SERVICIO DE TRANSPORTE LOS DIAS 25 - 26 - 28 - 29 - 30 DE SEPTIEMBRE DE 2023', '1', '329.50', '0.00', '0.00', '0.00', '329.50', '353', '2', '0.0000', '001-003', '329.50', '', '');
INSERT INTO `lineas_factura` VALUES ('467', 'SERVICIO DE TRANSPORTE LOS DIAS 25 Y 28 DE SEPTIEMBRE DE 2023', '1', '425.50', '0.00', '0.00', '0.00', '425.50', '354', '2', '0.0000', '001-003', '425.50', '', '');
INSERT INTO `lineas_factura` VALUES ('468', 'SERVICIO DE TRANSPORTE', '1', '396', '0.00', '0.00', '0.00', '396.00', '357', '2', '0.0000', '001-003', '396.00', '', '');
INSERT INTO `lineas_factura` VALUES ('469', 'SERVICIO DE ENCOMIENDA', '1', '650', '0.00', '0.00', '0.00', '650.00', '358', '3', '0.0000', '001-003', '650.00', '', '');
INSERT INTO `lineas_factura` VALUES ('470', 'VIAJES LA UNIVERSAL', '1', '550', '0.00', '0.00', '0.00', '550.00', '359', '2', '0.0000', '001-003', '550.00', '', '');
INSERT INTO `lineas_factura` VALUES ('471', 'mantenimiento', '1', '1', '0.00', '0.00', '0.00', '1.00', '360', '01.01.006', '0.0000', '001-001', '1.00', '', '');
INSERT INTO `lineas_factura` VALUES ('472', 'CASE TORRE', '1', '50.00', '0.00', '0.00', '6.00', '56.00', '361', '197', '0.1200', '001-001', '50.00', '', '');
INSERT INTO `lineas_factura` VALUES ('474', 'SERVIDOR HPE ML30 G10+ E-2314 1P 16G NHP 1TB', '1', '4585.28', '0.00', '0.00', '550.23', '5135.51', '363', '226', '0.1200', '001-001', '4585.28', '', '');
INSERT INTO `lineas_factura` VALUES ('475', 'LICENCIA DE USO DE PLATAFORMA MSC', '1', '450.80', '0.00', '0.00', '54.10', '504.90', '380', '225', '0.1200', '001-001', '450.80', '', '');
INSERT INTO `lineas_factura` VALUES ('476', 'DISCO DURO ESPECIAL DVR PURPLE 4TB', '47', '116.20', '0.00', '0.00', '655.37', '6116.77', '381', '186', '0.1200', '001-001', '5461.40', '', '');
INSERT INTO `lineas_factura` VALUES ('477', 'SERVIDOR HPE ML30 G10+ E-2314 1P 16G NHP 1TB', '1', '4585.28', '0.00', '0.00', '550.23', '5135.51', '382', '226', '0.1200', '001-001', '4585.28', '', '');
INSERT INTO `lineas_factura` VALUES ('478', 'SOPORTE THE-HUB', '1', '100.00', '0.00', '0.00', '12.00', '112.00', '383', '134', '0.1200', '001-001', '100.00', '', '');
INSERT INTO `lineas_factura` VALUES ('479', 'mantenimiento', '1', '1', '0.00', '0.00', '0.00', '1.00', '384', '01.01.006', '0.0000', '001-001', '1.00', '', '');
INSERT INTO `lineas_factura` VALUES ('480', 'DISCO DURO 10 TB', '10', '326.83', '0.00', '0.00', '392.20', '3660.50', '385', '206', '0.1200', '001-001', '3268.30', '', '');
INSERT INTO `lineas_factura` VALUES ('482', 'LICENCENCIA HIKCENTRAL PARA GESTIÓN DE PERSONAL', '1', '930.50', '0.00', '0.00', '111.66', '1042.16', '387', '221', '0.1200', '001-001', '930.50', '', '');
INSERT INTO `lineas_factura` VALUES ('483', 'OUTSORCING DE TALENTO', '1', '5318.10', '0.00', '0.00', '638.17', '5956.27', '389', '182', '0.1200', '001-001', '5318.10', '', '');
INSERT INTO `lineas_factura` VALUES ('484', 'OUTSORCING DE TALENTO', '1', '5318.10', '0.00', '0.00', '638.17', '5956.27', '390', '182', '0.1200', '001-001', '5318.10', '', '');
INSERT INTO `lineas_factura` VALUES ('485', 'OUTSORCING DE TALENTO', '1', '5318.10', '0.00', '0.00', '638.17', '5956.27', '391', '182', '0.1200', '001-001', '5318.10', '', '');
INSERT INTO `lineas_factura` VALUES ('486', 'CAMARA OJO DE PEZ | 6MP', '33', '574.45', '0.00', '0.00', '2274.82', '21231.67', '392', '200', '0.1200', '001-001', '18956.85', '', '');
INSERT INTO `lineas_factura` VALUES ('487', 'CAMARA IP DOMO 5MP L1.6MM PANORAMICA 180°', '10', '195.78', '0.00', '0.00', '234.94', '2192.74', '392', '201', '0.1200', '001-001', '1957.80', '', '');
INSERT INTO `lineas_factura` VALUES ('488', 'CAMARA OJO DE PEZ | 5MP | 180° ACUSENSE', '8', '386.40', '0.00', '0.00', '370.94', '3462.14', '392', '202', '0.1200', '001-001', '3091.20', '', '');
INSERT INTO `lineas_factura` VALUES ('489', 'CAMARA PTZ | 2MP | ACUSENSE', '2', '745.75', '0.00', '0.00', '178.98', '1670.48', '392', '203', '0.1200', '001-001', '1491.50', '', '');
INSERT INTO `lineas_factura` VALUES ('490', 'INJECTOR POE 60W', '2', '26.13', '0.00', '0.00', '6.27', '58.53', '392', '223', '0.1200', '001-001', '52.26', '', '');
INSERT INTO `lineas_factura` VALUES ('494', 'DECODER 8 SALIDAS HDMI', '1', '2203.77', '0.00', '0.00', '264.45', '2468.22', '392', '207', '0.1200', '001-001', '2203.77', '', '');
INSERT INTO `lineas_factura` VALUES ('495', 'PANTALLA LCD 65 PUL. USO 24/7', '2', '1818.66', '0.00', '0.00', '436.48', '4073.80', '392', '208', '0.1200', '001-001', '3637.32', '', '');
INSERT INTO `lineas_factura` VALUES ('496', 'MONITOR DE CCTV 43 PUL PARA CCTV', '1', '726.43', '0.00', '0.00', '87.17', '813.60', '392', '209', '0.1200', '001-001', '726.43', '', '');
INSERT INTO `lineas_factura` VALUES ('497', 'CONTROL JOYSTICK HIKVISION CON PANTALLA', '2', '1253.22', '0.00', '0.00', '300.77', '2807.21', '392', '210', '0.1200', '001-001', '2506.44', '', '');
INSERT INTO `lineas_factura` VALUES ('498', 'LECTOR BIOMETRICO FACIAL HUELLA', '25', '203.50', '0.00', '0.00', '610.50', '5698.00', '392', '211', '0.1200', '001-001', '5087.50', '', '');
INSERT INTO `lineas_factura` VALUES ('499', 'FUENTE PARA CONTROL DE ACCESO 5AMP', '10', '34.78', '0.00', '0.00', '41.74', '389.54', '392', '212', '0.1200', '001-001', '347.80', '', '');
INSERT INTO `lineas_factura` VALUES ('500', 'BATERIA RECARGABLE 12VDC 7AMP', '10', '16.74', '0.00', '0.00', '20.09', '187.49', '392', '213', '0.1200', '001-001', '167.40', '', '');
INSERT INTO `lineas_factura` VALUES ('501', 'HIKCENTRAL MONITOREO CCTV | 300CH', '1', '8870.46', '0.00', '0.00', '1064.46', '9934.92', '392', '214', '0.1200', '001-001', '8870.46', '', '');
INSERT INTO `lineas_factura` VALUES ('502', 'LICENCIA HIKCENTRAL PARA 1 CANAL ADICIONAL', '80', '34.78', '0.00', '0.00', '333.89', '3116.29', '392', '215', '0.1200', '001-001', '2782.40', '', '');
INSERT INTO `lineas_factura` VALUES ('503', 'LICENCIA HIKCENTRAL GESTIÓN VIDEOWALL', '1', '2165.13', '0.00', '0.00', '259.82', '2424.95', '392', '216', '0.1200', '001-001', '2165.13', '', '');
INSERT INTO `lineas_factura` VALUES ('504', 'LIC. HC ACTIVACIÓN MÓDULO ACCESOS 16 PUERTAS', '1', '717.42', '0.00', '0.00', '86.09', '803.51', '392', '217', '0.1200', '001-001', '717.42', '', '');
INSERT INTO `lineas_factura` VALUES ('505', 'LICENCIA HC PARA 1 ACCESO ADICIONAL', '9', '37.38', '0.00', '0.00', '40.37', '376.79', '392', '218', '0.1200', '001-001', '336.42', '', '');
INSERT INTO `lineas_factura` VALUES ('506', 'LIC. HC 1 CANAL DE RECONOCIMIENTO FACIAL', '8', '197.38', '0.00', '0.00', '189.48', '1768.52', '392', '219', '0.1200', '001-001', '1579.04', '', '');
INSERT INTO `lineas_factura` VALUES ('507', 'LICENCIA HIKCENTRAL PARA GESTION DE VISITAS', '1', '386.40', '0.00', '0.00', '46.37', '432.77', '392', '220', '0.1200', '001-001', '386.40', '', '');
INSERT INTO `lineas_factura` VALUES ('508', 'LICENCENCIA HIKCENTRAL PARA GESTIÓN DE PERSONAL', '1', '930.50', '0.00', '0.00', '111.66', '1042.16', '392', '221', '0.1200', '001-001', '930.50', '', '');
INSERT INTO `lineas_factura` VALUES ('509', 'DESARROLLO A MEDIDA', '1', '5508.00', '0.00', '0.00', '660.96', '6168.96', '392', '224', '0.1200', '001-001', '5508.00', '', '');
INSERT INTO `lineas_factura` VALUES ('510', 'LICENCIA DE USO DE PLATAFORMA MSC', '1', '450.80', '0.00', '0.00', '54.10', '504.90', '392', '225', '0.1200', '001-001', '450.80', '', '');
INSERT INTO `lineas_factura` VALUES ('511', 'SERVIDOR HPE ML30 G10+ E-2314 1P 16G NHP 1TB', '1', '4585.28', '0.00', '0.00', '550.23', '5135.51', '392', '226', '0.1200', '001-001', '4585.28', '', '');
INSERT INTO `lineas_factura` VALUES ('512', 'PACK DE MANTENIMIENTO ANUAL', '1', '890.00', '0.00', '0.00', '106.80', '996.80', '392', '227', '0.1200', '001-001', '890.00', '', '');
INSERT INTO `lineas_factura` VALUES ('514', 'GRABADOR IDS DEEPINMIND | 32CH', '1', '1545.60', '0.00', '0.00', '185.47', '1731.07', '392', '204', '0.1200', '001-001', '1545.60', '', '');
INSERT INTO `lineas_factura` VALUES ('515', 'GRABADOR 64CH | 8 BAHIAS DISCO DURO', '3', '1776.46', '0.00', '0.00', '639.53', '5968.91', '392', '205', '0.1200', '001-001', '5329.38', '', '');
INSERT INTO `lineas_factura` VALUES ('516', 'DISCO DURO 10 TB', '28', '326.83', '0.00', '0.00', '1098.15', '10249.39', '392', '206', '0.1200', '001-001', '9151.24', '', '');
INSERT INTO `lineas_factura` VALUES ('542', 'PACK DE MANTENIMIENTO ANUAL', '1', '890.00', '0.00', '0.00', '106.80', '996.80', '393', '227', '0.1200', '001-001', '890.00', '', '');
INSERT INTO `lineas_factura` VALUES ('543', 'SERVIDOR HPE ML30 G10+ E-2314 1P 16G NHP 1TB', '1', '4585.28', '0.00', '0.00', '550.23', '5135.51', '393', '226', '0.1200', '001-001', '4585.28', '', '');
INSERT INTO `lineas_factura` VALUES ('544', 'LICENCIA DE USO DE PLATAFORMA MSC', '1', '450.80', '0.00', '0.00', '54.10', '504.90', '393', '225', '0.1200', '001-001', '450.80', '', '');
INSERT INTO `lineas_factura` VALUES ('545', 'DESARROLLO A MEDIDA', '1', '5508.00', '0.00', '0.00', '660.96', '6168.96', '393', '224', '0.1200', '001-001', '5508.00', '', '');
INSERT INTO `lineas_factura` VALUES ('546', 'LICENCENCIA HIKCENTRAL PARA GESTIÓN DE PERSONAL', '1', '930.50', '0.00', '0.00', '111.66', '1042.16', '393', '221', '0.1200', '001-001', '930.50', '', '');
INSERT INTO `lineas_factura` VALUES ('547', 'LICENCIA HIKCENTRAL PARA GESTION DE VISITAS', '1', '386.40', '0.00', '0.00', '46.37', '432.77', '393', '220', '0.1200', '001-001', '386.40', '', '');
INSERT INTO `lineas_factura` VALUES ('548', 'LIC. HC 1 CANAL DE RECONOCIMIENTO FACIAL', '8', '197.38', '0.00', '0.00', '189.48', '1768.52', '393', '219', '0.1200', '001-001', '1579.04', '', '');
INSERT INTO `lineas_factura` VALUES ('549', 'LICENCIA HC PARA 1 ACCESO ADICIONAL', '9', '37.38', '0.00', '0.00', '40.37', '376.79', '393', '218', '0.1200', '001-001', '336.42', '', '');
INSERT INTO `lineas_factura` VALUES ('550', 'LIC. HC ACTIVACIÓN MÓDULO ACCESOS 16 PUERTAS', '1', '717.42', '0.00', '0.00', '86.09', '803.51', '393', '217', '0.1200', '001-001', '717.42', '', '');
INSERT INTO `lineas_factura` VALUES ('551', 'LICENCIA HIKCENTRAL GESTIÓN VIDEOWALL', '1', '2165.13', '0.00', '0.00', '259.82', '2424.95', '393', '216', '0.1200', '001-001', '2165.13', '', '');
INSERT INTO `lineas_factura` VALUES ('552', 'LICENCIA HIKCENTRAL PARA 1 CANAL ADICIONAL', '80', '34.78', '0.00', '0.00', '333.89', '3116.29', '393', '215', '0.1200', '001-001', '2782.40', '', '');
INSERT INTO `lineas_factura` VALUES ('553', 'HIKCENTRAL MONITOREO CCTV | 300CH', '1', '8870.46', '0.00', '0.00', '1064.46', '9934.92', '393', '214', '0.1200', '001-001', '8870.46', '', '');
INSERT INTO `lineas_factura` VALUES ('554', 'BATERIA RECARGABLE 12VDC 7AMP', '10', '16.74', '0.00', '0.00', '20.09', '187.49', '393', '213', '0.1200', '001-001', '167.40', '', '');
INSERT INTO `lineas_factura` VALUES ('555', 'FUENTE PARA CONTROL DE ACCESO 5AMP', '10', '34.78', '0.00', '0.00', '41.74', '389.54', '393', '212', '0.1200', '001-001', '347.80', '', '');
INSERT INTO `lineas_factura` VALUES ('556', 'LECTOR BIOMETRICO FACIAL HUELLA', '25', '203.50', '0.00', '0.00', '610.50', '5698.00', '393', '211', '0.1200', '001-001', '5087.50', '', '');
INSERT INTO `lineas_factura` VALUES ('557', 'CONTROL JOYSTICK HIKVISION CON PANTALLA', '2', '1253.22', '0.00', '0.00', '300.77', '2807.21', '393', '210', '0.1200', '001-001', '2506.44', '', '');
INSERT INTO `lineas_factura` VALUES ('558', 'MONITOR DE CCTV 43 PUL PARA CCTV', '1', '726.43', '0.00', '0.00', '87.17', '813.60', '393', '209', '0.1200', '001-001', '726.43', '', '');
INSERT INTO `lineas_factura` VALUES ('559', 'PANTALLA LCD 65 PUL. USO 24/7', '2', '1818.66', '0.00', '0.00', '436.48', '4073.80', '393', '208', '0.1200', '001-001', '3637.32', '', '');
INSERT INTO `lineas_factura` VALUES ('560', 'DECODER 8 SALIDAS HDMI', '1', '2203.77', '0.00', '0.00', '264.45', '2468.22', '393', '207', '0.1200', '001-001', '2203.77', '', '');
INSERT INTO `lineas_factura` VALUES ('561', 'DISCO DURO 10 TB', '28', '326.83', '0.00', '0.00', '1098.15', '10249.39', '393', '206', '0.1200', '001-001', '9151.24', '', '');
INSERT INTO `lineas_factura` VALUES ('562', 'GRABADOR 64CH | 8 BAHIAS DISCO DURO', '3', '1776.46', '0.00', '0.00', '639.53', '5968.91', '393', '205', '0.1200', '001-001', '5329.38', '', '');
INSERT INTO `lineas_factura` VALUES ('563', 'GRABADOR IDS DEEPINMIND | 32CH', '1', '1545.60', '0.00', '0.00', '185.47', '1731.07', '393', '204', '0.1200', '001-001', '1545.60', '', '');
INSERT INTO `lineas_factura` VALUES ('564', 'INJECTOR POE 60W', '2', '26.13', '0.00', '0.00', '6.27', '58.53', '393', '223', '0.1200', '001-001', '52.26', '', '');
INSERT INTO `lineas_factura` VALUES ('565', 'CAMARA PTZ | 2MP | ACUSENSE', '2', '745.75', '0.00', '0.00', '178.98', '1670.48', '393', '203', '0.1200', '001-001', '1491.50', '', '');
INSERT INTO `lineas_factura` VALUES ('566', 'CAMARA OJO DE PEZ | 5MP | 180° ACUSENSE', '8', '386.40', '0.00', '0.00', '370.94', '3462.14', '393', '202', '0.1200', '001-001', '3091.20', '', '');
INSERT INTO `lineas_factura` VALUES ('567', 'CAMARA IP DOMO 5MP L1.6MM PANORAMICA 180°', '10', '195.78', '0.00', '0.00', '234.94', '2192.74', '393', '201', '0.1200', '001-001', '1957.80', '', '');
INSERT INTO `lineas_factura` VALUES ('568', 'CAMARA OJO DE PEZ | 6MP', '33', '574.45', '0.00', '0.00', '2274.82', '21231.67', '393', '200', '0.1200', '001-001', '18956.85', '', '');
INSERT INTO `lineas_factura` VALUES ('569', 'LICENCIA KASPERSKY CLOUD PRO', '1', '3105.53', '0.00', '0.00', '372.66', '3478.19', '394', '196', '0.1200', '001-001', '3105.53', '', '90 nodos, PC SERVER / 180 MOVILES');
INSERT INTO `lineas_factura` VALUES ('570', 'Tarjetas de Proximidad', '100', '1.85', '0.00', '0.00', '22.20', '207.20', '395', '116', '0.1200', '001-001', '185.00', '', '');
INSERT INTO `lineas_factura` VALUES ('571', 'Cable fibra multimodo 6 hilos', '1', '250.00', '0.00', '0.00', '0.00', '250.00', '395', '6514552', '0.0000', '001-001', '250.00', '', '');
INSERT INTO `lineas_factura` VALUES ('572', 'Cable red blindado Cat6', '1', '220.00', '0.00', '0.00', '0.00', '220.00', '395', '3028203', '0.0000', '001-001', '220.00', '', '');
INSERT INTO `lineas_factura` VALUES ('573', 'Protectores de RJ45', '1', '35.00', '0.00', '0.00', '0.00', '35.00', '395', '6003184', '0.0000', '001-001', '35.00', '', '');
INSERT INTO `lineas_factura` VALUES ('574', 'Conectores RJ45 Cat6', '1', '35.00', '0.00', '0.00', '0.00', '35.00', '395', '8304096', '0.0000', '001-001', '35.00', '', '');
INSERT INTO `lineas_factura` VALUES ('575', 'Fiber transceiver module', '4', '22.5', '0.00', '0.00', '0.00', '90.00', '395', '3351843', '0.0000', '001-001', '90.00', '', '');
INSERT INTO `lineas_factura` VALUES ('576', 'DISCO DURO SSD 480GB', '3', '80', '0.00', '0.00', '28.80', '268.80', '396', '72', '0.1200', '001-001', '240.00', '', '');
INSERT INTO `lineas_factura` VALUES ('577', 'SERVICIO DE TRANSPORTE LOS DIAS 21 Y 23 DE OCTUBRE DE 2023', '1', '488', '0.00', '0.00', '0.00', '488.00', '397', '2', '0.0000', '001-003', '488.00', '', '');
INSERT INTO `lineas_factura` VALUES ('578', 'SOPORTE THE-HUB', '1', '300.00', '0.00', '0.00', '36.00', '336.00', '399', '134', '0.1200', '001-001', '300.00', '', '');
INSERT INTO `lineas_factura` VALUES ('579', 'OUTSORCING', '1', '500.00', '0.00', '0.00', '60.00', '560.00', '400', '1', '0.1200', '001-001', '500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('580', 'SERVICIO DE CLOUT CALLING', '1', '245.00', '0.00', '0.00', '29.40', '274.40', '401', '91', '0.1200', '001-001', '245.00', '', '');
INSERT INTO `lineas_factura` VALUES ('581', 'OUTSORCING', '1', '486.00', '0.00', '0.00', '58.32', '544.32', '402', '1', '0.1200', '001-001', '486.00', '', '');
INSERT INTO `lineas_factura` VALUES ('582', 'HOSTING INCONTROL', '1', '60.00', '0.00', '0.00', '7.20', '67.20', '403', '70', '0.1200', '001-001', '60.00', '', '');
INSERT INTO `lineas_factura` VALUES ('583', 'OUTSORCING DE TALENTO', '1', '5202.90', '0.00', '0.00', '624.35', '5827.25', '404', '182', '0.1200', '001-001', '5202.90', '', '');
INSERT INTO `lineas_factura` VALUES ('584', 'GASTOS DE EDUCADORAS', '1', '196.43', '0.00', '0.00', '23.57', '220.00', '405', '136', '0.1200', '001-001', '196.43', '', '');
INSERT INTO `lineas_factura` VALUES ('585', 'LICENCIA KASPERSKY CLOUD', '26', '55.13', '0.00', '0.00', '172.01', '1605.39', '406', '12', '0.1200', '001-001', '1433.38', '', '');
INSERT INTO `lineas_factura` VALUES ('586', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '1', '270', '0.00', '0.00', '32.40', '302.40', '406', '4', '0.1200', '001-001', '270.00', '', '');
INSERT INTO `lineas_factura` VALUES ('587', 'DVR DIGITAL SISTEMA TRIBIDO PARA 8 CANALES COMPRESIÓN 264 /1TB HD', '1', '150.00', '0.00', '0.00', '18.00', '168.00', '407', '81', '0.1200', '001-001', '150.00', '', '');
INSERT INTO `lineas_factura` VALUES ('588', 'IMPRESORA TERMICA 80MM 80MM AUTO-CUTTER', '1', '118.50', '0.00', '0.00', '14.22', '132.72', '408', '194', '0.1200', '001-001', '118.50', '', '');
INSERT INTO `lineas_factura` VALUES ('589', 'EQUIPO POS – MARCA: ZKTEKO ZKBIO550', '1', '689.08', '0.00', '0.00', '82.69', '771.77', '408', '195', '0.1200', '001-001', '689.08', '', '');
INSERT INTO `lineas_factura` VALUES ('599', 'SERVIDOR DELL PE R340', '1', '2798.60', '0.00', '0.00', '335.83', '3134.43', '409', '300', '0.1200', '001-001', '2798.60', '', '');
INSERT INTO `lineas_factura` VALUES ('600', 'UPS 1KVA ON LINE 110V', '1', '490', '0.00', '0.00', '58.80', '548.80', '409', '11', '0.1200', '001-001', '490.00', '', '');
INSERT INTO `lineas_factura` VALUES ('601', 'HD 800gb, SSD SAT SATA', '1', '315.00', '0.00', '0.00', '0.00', '315.00', '411', 'DISCO', '0.0000', '001-001', '315.00', '', '');
INSERT INTO `lineas_factura` VALUES ('602', 'MEMORIA DE 16GB DDR4 2133P', '2', '280.00', '0.00', '0.00', '67.20', '627.20', '411', '199', '0.1200', '001-001', '560.00', '', '');
INSERT INTO `lineas_factura` VALUES ('603', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '1', '70.00', '0.00', '0.00', '8.40', '78.40', '411', '4', '0.1200', '001-001', '70.00', '', '');
INSERT INTO `lineas_factura` VALUES ('604', 'HD 800gb, SSD SAT SATA', '1', '315.00', '0.00', '0.00', '0.00', '315.00', '412', 'DISCO', '0.0000', '001-001', '315.00', '', '');
INSERT INTO `lineas_factura` VALUES ('605', 'HD 800gb, SSD SAT SATA', '1', '315.00', '0.00', '0.00', '0.00', '315.00', '413', 'DISCO', '0.0000', '001-001', '315.00', '', '');
INSERT INTO `lineas_factura` VALUES ('606', 'MEMORIA DE 16GB DDR4 2133P', '2', '280.00', '0.00', '0.00', '67.20', '627.20', '414', '199', '0.1200', '001-001', '560.00', '', '');
INSERT INTO `lineas_factura` VALUES ('607', 'SOPORTE THE-HUB', '1', '300.00', '0.00', '0.00', '36.00', '336.00', '415', '134', '0.1200', '001-001', '300.00', '', '');
INSERT INTO `lineas_factura` VALUES ('608', 'OUTSORCING', '1', '500.00', '0.00', '0.00', '60.00', '560.00', '416', '1', '0.1200', '001-001', '500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('609', 'OUTSORCING', '1', '486.00', '0.00', '0.00', '58.32', '544.32', '417', '1', '0.1200', '001-001', '486.00', '', '');
INSERT INTO `lineas_factura` VALUES ('610', 'HOSTING INCONTROL', '1', '60.00', '0.00', '0.00', '7.20', '67.20', '418', '70', '0.1200', '001-001', '60.00', '', '');
INSERT INTO `lineas_factura` VALUES ('611', 'SERVICIO DE CLOUT CALLING', '1', '245.00', '0.00', '0.00', '29.40', '274.40', '419', '91', '0.1200', '001-001', '245.00', '', '');
INSERT INTO `lineas_factura` VALUES ('612', 'LICENCIA ACCESS MSI COMUNICATOR APUDATA', '1', '347.76', '0.00', '0.00', '41.73', '389.49', '420', '149', '0.1200', '001-001', '347.76', '', '');
INSERT INTO `lineas_factura` VALUES ('613', 'LICENCIA ACCESS MSI COMUNICATOR APUDATA', '1', '347.76', '0.00', '0.00', '41.73', '389.49', '421', '149', '0.1200', '001-001', '347.76', '', '');
INSERT INTO `lineas_factura` VALUES ('614', 'MEMORIA 8 GB PC2400', '2', '35.00', '0.00', '0.00', '8.40', '78.40', '422', 'MEMORIAS', '0.1200', '001-001', '70.00', '', '');
INSERT INTO `lineas_factura` VALUES ('615', 'HD M2 1TB ', '1', '98.00', '0.00', '0.00', '11.76', '109.76', '422', 'DISCOS', '0.1200', '001-001', '98.00', '', '');
INSERT INTO `lineas_factura` VALUES ('616', 'OUTSORCING DE TALENTO', '1', '6865.59', '0.00', '0.00', '823.87', '7689.46', '423', '182', '0.1200', '001-001', '6865.59', '', '');
INSERT INTO `lineas_factura` VALUES ('617', 'GASTOS DE EDUCADORAS', '1', '49.99', '0.00', '0.00', '6.00', '55.99', '423', '136', '0.1200', '001-001', '49.99', '', '');
INSERT INTO `lineas_factura` VALUES ('618', 'LINEA CELULAR', '9', '26.78', '0.00', '0.00', '28.92', '269.94', '423', '198', '0.1200', '001-001', '241.02', '', '');
INSERT INTO `lineas_factura` VALUES ('619', 'SWITCH 24 PUERTOS POE', '1', '462.00', '0.00', '0.00', '55.44', '517.44', '424', 'SWITCH', '0.1200', '001-001', '462.00', '', '');
INSERT INTO `lineas_factura` VALUES ('620', 'SOPORTE THE-HUB', '1', '1', '0.00', '0.00', '0.12', '1.12', '425', '134', '0.1200', '001-001', '1.00', '', '');
INSERT INTO `lineas_factura` VALUES ('621', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '1', '1', '0.00', '0.00', '0.12', '1.12', '426', '4', '0.1200', '001-001', '1.00', '', '');
INSERT INTO `lineas_factura` VALUES ('622', 'LICENCIA ACCESS MSI COMUNICATOR APUDATA', '1', '347.76', '0.00', '0.00', '41.73', '389.49', '427', '149', '0.1200', '001-001', '347.76', '', '');
INSERT INTO `lineas_factura` VALUES ('624', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '1', '350.00', '0.00', '0.00', '42.00', '392.00', '428', '4', '0.1200', '001-001', '350.00', '', '');
INSERT INTO `lineas_factura` VALUES ('625', 'HD SSD 240GB ENTERPRISE', '1', '219.91', '0.00', '0.00', '26.39', '246.30', '428', 'HD SSD 240gb', '0.1200', '001-001', '219.91', '', '');
INSERT INTO `lineas_factura` VALUES ('629', 'HD SSD 240GB ENTERPRISE NAS', '1', '273', '0.00', '0.00', '32.76', '305.76', '428', 'HD SSD 240GB ENTERPRISE NAS', '0.1200', '001-001', '273.00', '', '');
INSERT INTO `lineas_factura` VALUES ('630', 'HD SSD 240GB ENTERPRISE', '1', '273.00', '0.00', '0.00', '32.76', '305.76', '429', 'HD SSD 240gb', '0.1200', '001-001', '273.00', '', '');
INSERT INTO `lineas_factura` VALUES ('631', 'HD SSD 240GB ENTERPRISE NAS', '1', '219.91', '0.00', '0.00', '26.39', '246.30', '429', 'HD SSD 240GB ENTERPRISE NAS', '0.1200', '001-001', '219.91', '', '');
INSERT INTO `lineas_factura` VALUES ('632', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '1', '350', '0.00', '0.00', '42.00', '392.00', '429', '4', '0.1200', '001-001', '350.00', '', '');
INSERT INTO `lineas_factura` VALUES ('633', 'HD SSD 240GB ENTERPRISE', '1', '273.00', '0.00', '0.00', '32.76', '305.76', '430', 'HD SSD 240gb', '0.1200', '001-001', '273.00', '', '');
INSERT INTO `lineas_factura` VALUES ('634', 'HD SSD ENTERPRISE 250GB NAS', '1', '219.91', '0.00', '0.00', '26.39', '246.30', '430', 'HD SSD ENTERPRISE 250GB NAS', '0.1200', '001-001', '219.91', '', '');
INSERT INTO `lineas_factura` VALUES ('635', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '1', '350', '0.00', '0.00', '42.00', '392.00', '430', '4', '0.1200', '001-001', '350.00', '', '');
INSERT INTO `lineas_factura` VALUES ('637', 'HD SSD 240GB ENTERPRISE', '1', '273.00', '0.00', '0.00', '32.76', '305.76', '431', 'HD SSD 240gb', '0.1200', '001-001', '273.00', '', '');
INSERT INTO `lineas_factura` VALUES ('638', 'HD ENTERPRISE SSD NAS 250GB', '1', '219.91', '0.00', '0.00', '26.39', '246.30', '431', 'HD ENTERPRISE SSD NAS 250GB', '0.1200', '001-001', '219.91', '', '');
INSERT INTO `lineas_factura` VALUES ('640', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '1', '350', '0.00', '0.00', '42.00', '392.00', '431', '4', '0.1200', '001-001', '350.00', '', '');
INSERT INTO `lineas_factura` VALUES ('641', 'HD SSD 240GB ENTERPRISE', '1', '273.00', '0.00', '0.00', '32.76', '305.76', '432', 'HD SSD 240GB ENTERPRISE', '0.1200', '001-001', '273.00', '', '');
INSERT INTO `lineas_factura` VALUES ('642', 'HD ENTERPRISE SSD NAS 250GB', '1', '219.91', '0.00', '0.00', '26.39', '246.30', '432', 'hdnas250en', '0.1200', '001-001', '219.91', '', '');
INSERT INTO `lineas_factura` VALUES ('643', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '1', '350', '0.00', '0.00', '42.00', '392.00', '432', '4', '0.1200', '001-001', '350.00', '', '');
INSERT INTO `lineas_factura` VALUES ('644', 'OUTSORCING', '1', '500', '0.00', '0.00', '60.00', '560.00', '433', '1', '0.1200', '001-001', '500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('645', 'SOPORTE THE-HUB', '1', '300.00', '0.00', '0.00', '36.00', '336.00', '434', '134', '0.1200', '001-001', '300.00', '', '');
INSERT INTO `lineas_factura` VALUES ('646', 'OUTSORCING', '1', '486.00', '0.00', '0.00', '58.32', '544.32', '435', '1', '0.1200', '001-001', '486.00', '', '');
INSERT INTO `lineas_factura` VALUES ('647', 'HOSTING INCONTROL', '1', '60.00', '0.00', '0.00', '7.20', '67.20', '436', '70', '0.1200', '001-001', '60.00', '', '');
INSERT INTO `lineas_factura` VALUES ('648', 'SERVICIO DE CLOUT CALLING', '1', '245.00', '0.00', '0.00', '29.40', '274.40', '437', '91', '0.1200', '001-001', '245.00', '', '');
INSERT INTO `lineas_factura` VALUES ('649', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '1', '150', '0.00', '0.00', '18.00', '168.00', '438', '4', '0.1200', '001-001', '150.00', '', '');
INSERT INTO `lineas_factura` VALUES ('650', 'SWITCH 24 PUERTOS POE', '1', '1', '0.00', '0.00', '0.12', '1.12', '440', 'SWITCH', '0.1200', '001-001', '1.00', '', '');
INSERT INTO `lineas_factura` VALUES ('651', 'OUTSORCING DE TALENTO', '1', '5400', '0.00', '0.00', '648.00', '6048.00', '448', '182', '0.1200', '001-001', '5400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('652', 'LINEA CELULAR', '3', '26.78', '0.00', '0.00', '9.64', '89.98', '448', '198', '0.1200', '001-001', '80.34', '', '');
INSERT INTO `lineas_factura` VALUES ('653', 'LICENCIA KASPERSKY CLOUD PRO', '1', '866.61', '0.00', '0.00', '103.99', '970.60', '450', '196', '0.1200', '001-001', '866.61', '', '');
INSERT INTO `lineas_factura` VALUES ('654', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '1', '350', '0.00', '0.00', '42.00', '392.00', '450', '4', '0.1200', '001-001', '350.00', '', '');
INSERT INTO `lineas_factura` VALUES ('655', 'LICENCIA KASPERSKY CLOUD PRO', '1', '902.72', '0.00', '0.00', '108.33', '1011.05', '451', '196', '0.1200', '001-001', '902.72', '', '');
INSERT INTO `lineas_factura` VALUES ('657', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '1', '300', '0.00', '0.00', '36.00', '336.00', '453', '4', '0.1200', '001-001', '300.00', '', '');
INSERT INTO `lineas_factura` VALUES ('658', 'SERVICIO DE CLOUT CALLING', '1', '245.00', '0.00', '0.00', '29.40', '274.40', '454', '91', '0.1200', '001-001', '245.00', '', '');
INSERT INTO `lineas_factura` VALUES ('661', 'Canon G2100', '2', '42.50', '0.00', '0.00', '10.20', '95.20', '455', 'G2100', '0.1200', '001-001', '85.00', '', '');
INSERT INTO `lineas_factura` VALUES ('662', 'Mainboard G2100', '1', '68.00', '0.00', '0.00', '8.16', '76.16', '455', 'mbo', '0.1200', '001-001', '68.00', '', '');
INSERT INTO `lineas_factura` VALUES ('663', 'DDR4 8GB', '4', '38', '0.00', '0.00', '18.24', '170.24', '455', '8GB', '0.1200', '001-001', '152.00', '', '');
INSERT INTO `lineas_factura` VALUES ('664', 'SOLID STATE Drive Kingstong 500GB', '3', '63.60', '0.00', '0.00', '22.90', '213.70', '455', '500GB', '0.1200', '001-001', '190.80', '', '');
INSERT INTO `lineas_factura` VALUES ('665', 'SOPORTE THE-HUB', '1', '500.00', '0.00', '0.00', '60.00', '560.00', '456', '134', '0.1200', '001-001', '500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('666', 'SOPORTE THE-HUB', '1', '500', '0.00', '0.00', '60.00', '560.00', '457', '134', '0.1200', '001-001', '500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('667', 'OUTSORCING', '1', '500', '0.00', '0.00', '60.00', '560.00', '458', '1', '0.1200', '001-001', '500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('668', 'OUTSORCING', '1', '400', '0.00', '0.00', '48.00', '448.00', '459', '1', '0.1200', '001-001', '400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('669', 'SERVICIO DE CLOUT CALLING', '1', '245.00', '0.00', '0.00', '29.40', '274.40', '460', '91', '0.1200', '001-001', '245.00', '', '');
INSERT INTO `lineas_factura` VALUES ('670', 'HOSTING INCONTROL', '1', '60.00', '0.00', '0.00', '7.20', '67.20', '461', '70', '0.1200', '001-001', '60.00', '', '');
INSERT INTO `lineas_factura` VALUES ('671', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '2', '50', '0.00', '0.00', '12.00', '112.00', '462', '4', '0.1200', '001-001', '100.00', '', '');
INSERT INTO `lineas_factura` VALUES ('672', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '2', '50', '0.00', '0.00', '12.00', '112.00', '463', '4', '0.1200', '001-001', '100.00', '', '');
INSERT INTO `lineas_factura` VALUES ('673', 'OUTSORCING DE TALENTO', '5349.87', '1800.00', '0.00', '0.00', '1155571.92', '10785337.92', '464', '182', '0.1200', '001-001', '9629766.00', '', '');
INSERT INTO `lineas_factura` VALUES ('674', 'OUTSORCING DE TALENTO', '1', '5349.87', '0.00', '0.00', '641.98', '5991.85', '465', '182', '0.1200', '001-001', '5349.87', '', '');
INSERT INTO `lineas_factura` VALUES ('675', 'Cabezales3 EPSON i310', '1', '70.00', '0.00', '0.00', '8.40', '78.40', '466', 'i310cab2', '0.1200', '001-001', '70.00', '', '');
INSERT INTO `lineas_factura` VALUES ('676', 'Cabezales1 EPSON i310', '2', '45.00', '0.00', '0.00', '10.80', '100.80', '466', 'i310cab1', '0.1200', '001-001', '90.00', '', '');
INSERT INTO `lineas_factura` VALUES ('679', 'Mano de Obra y Materiales Soldador', '1', '150.00', '0.00', '0.00', '18.00', '168.00', '467', 'Otros1', '0.1200', '001-001', '150.00', '', '');
INSERT INTO `lineas_factura` VALUES ('680', 'Bandeja metálica de 20cm', '2', '28.00', '0.00', '0.00', '6.72', '62.72', '467', 'Rack6', '0.1200', '001-001', '56.00', '', '');
INSERT INTO `lineas_factura` VALUES ('681', 'Tomacorreinte Tomas Vertical', '9', '35.00', '0.00', '0.00', '37.80', '352.80', '467', 'Rack5', '0.1200', '001-001', '315.00', '', '');
INSERT INTO `lineas_factura` VALUES ('682', 'Organizador de 6U', '2', '59.00', '0.00', '0.00', '14.16', '132.16', '467', 'Rack4', '0.1200', '001-001', '118.00', '', '');
INSERT INTO `lineas_factura` VALUES ('683', 'Electrocerraduras Z y L', '2', '45.00', '0.00', '0.00', '10.80', '100.80', '467', 'Cerradura1', '0.1200', '001-001', '90.00', '', '');
INSERT INTO `lineas_factura` VALUES ('684', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '1', '3500', '0.00', '0.00', '420.00', '3920.00', '467', '4', '0.1200', '001-001', '3500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('685', 'Rack Cerrado Aéreo', '1', '450.00', '0.00', '0.00', '54.00', '504.00', '467', 'Rack3', '0.1200', '001-001', '450.00', '', '');
INSERT INTO `lineas_factura` VALUES ('686', 'Rack de 36U', '3', '980.00', '0.00', '0.00', '352.80', '3292.80', '467', 'Rack2', '0.1200', '001-001', '2940.00', '', '');
INSERT INTO `lineas_factura` VALUES ('687', 'Rack de 42U', '1', '1780.00', '0.00', '0.00', '213.60', '1993.60', '467', 'Rack1', '0.1200', '001-001', '1780.00', '', '');
INSERT INTO `lineas_factura` VALUES ('688', 'Lectores Wiegand', '6', '34.00', '0.00', '0.00', '24.48', '228.48', '468', 'Acceso3', '0.1200', '001-001', '204.00', '', '');
INSERT INTO `lineas_factura` VALUES ('689', 'Caja de Accesos 4 Puertas DS-K2604', '1', '158.00', '0.00', '0.00', '18.96', '176.96', '468', 'Acceso2', '0.1200', '001-001', '158.00', '', '');
INSERT INTO `lineas_factura` VALUES ('690', 'BATERIA RECARGABLE 12VDC 7AMP', '1', '24', '0.00', '0.00', '2.88', '26.88', '468', '213', '0.1200', '001-001', '24.00', '', '');
INSERT INTO `lineas_factura` VALUES ('691', 'Fuente de Poder PL-12DCAK', '1', '58.00', '0.00', '0.00', '6.96', '64.96', '468', 'FuentePoder1', '0.1200', '001-001', '58.00', '', '');
INSERT INTO `lineas_factura` VALUES ('692', 'Ip Video Intercom DS-KH6320-WTE', '1', '84.00', '0.00', '0.00', '10.08', '94.08', '468', 'Portero1', '0.1200', '001-001', '84.00', '', '');
INSERT INTO `lineas_factura` VALUES ('693', 'BATERIA RECARGABLE 12VDC 7AMP', '10', '16.74', '0.00', '0.00', '20.09', '187.49', '469', '213', '0.1200', '001-001', '167.40', '', '');
INSERT INTO `lineas_factura` VALUES ('694', 'FUENTE PARA CONTROL DE ACCESO 5AMP', '10', '34.78', '0.00', '0.00', '41.74', '389.54', '469', '212', '0.1200', '001-001', '347.80', '', '');
INSERT INTO `lineas_factura` VALUES ('699', 'UPS 3000VA - 2400W', '7', '892.58', '0.00', '0.00', '749.77', '6997.83', '470', 'UPS', '0.1200', '001-001', '6248.06', '', '');
INSERT INTO `lineas_factura` VALUES ('700', 'Kit de Patch Cort cortos para Switch', '1', '1661.52', '0.00', '0.00', '199.38', '1860.90', '470', 'Redes3', '0.1200', '001-001', '1661.52', '', '');
INSERT INTO `lineas_factura` VALUES ('701', 'Trans 10 Gbps Single-Mode Optical Module 10G-D-20', '1', '708.40', '0.00', '0.00', '85.01', '793.41', '470', 'Redes2', '0.1200', '001-001', '708.40', '', '');
INSERT INTO `lineas_factura` VALUES ('702', 'Trans 10 Gbps Long-Range Direct Attach Cable 5m', '1', '50.23', '0.00', '0.00', '6.03', '56.26', '470', 'Redes', '0.1200', '001-001', '50.23', '', '');
INSERT INTO `lineas_factura` VALUES ('703', 'Switch 32-port, Layer 3', '1', '1286.71', '0.00', '0.00', '154.41', '1441.12', '470', 'Switch3', '0.1200', '001-001', '1286.71', '', '');
INSERT INTO `lineas_factura` VALUES ('704', 'Switch USW-Enterprise-48-PoE (720W) aace', '6', '2059.51', '0.00', '0.00', '1482.85', '13839.91', '470', 'Switch2', '0.1200', '001-001', '12357.06', '', '');
INSERT INTO `lineas_factura` VALUES ('706', 'Switch Enterprise 8 PoE', '3', '591.19', '0.00', '0.00', '212.83', '1986.40', '470', 'Switch1', '0.1200', '001-001', '1773.57', '', '');
INSERT INTO `lineas_factura` VALUES ('707', 'Access Point U6 Enterprise Unifi WIFI', '10', '462.39', '0.00', '0.00', '554.87', '5178.77', '470', 'wifi1', '0.1200', '001-001', '4623.90', '', '');
INSERT INTO `lineas_factura` VALUES ('708', 'Dream Machine Special Edition', '1', '642.71', '0.00', '0.00', '77.13', '719.84', '470', 'Firewall1', '0.1200', '001-001', '642.71', '', '');
INSERT INTO `lineas_factura` VALUES ('709', 'SERVICIOS CORSINF DATA ANALITICS', '1', '1120', '0.00', '0.00', '134.40', '1254.40', '471', '4', '0.1200', '001-001', '1120.00', '', '');
INSERT INTO `lineas_factura` VALUES ('710', 'OUTSORCING', '1', '500', '0.00', '0.00', '60.00', '560.00', '472', '1', '0.1200', '001-001', '500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('711', 'SOPORTE THE-HUB', '1', '500', '0.00', '0.00', '60.00', '560.00', '473', '134', '0.1200', '001-001', '500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('712', 'SERVICIO DE CLOUT CALLING', '1', '245.00', '0.00', '0.00', '29.40', '274.40', '474', '91', '0.1200', '001-001', '245.00', '', '');
INSERT INTO `lineas_factura` VALUES ('713', 'HOSTING INCONTROL', '1', '60.00', '0.00', '0.00', '7.20', '67.20', '475', '70', '0.1200', '001-001', '60.00', '', '');
INSERT INTO `lineas_factura` VALUES ('714', 'OUTSORCING', '1', '400.00', '0.00', '0.00', '48.00', '448.00', '476', '1', '0.1200', '001-001', '400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('715', 'OUTSORCING DE TALENTO', '1', '5367.60', '0.00', '0.00', '644.11', '6011.71', '477', '182', '0.1200', '001-001', '5367.60', '', '');
INSERT INTO `lineas_factura` VALUES ('716', 'LINEA CELULAR', '3', '26.78', '0.00', '0.00', '9.64', '89.98', '478', '198', '0.1200', '001-001', '80.34', '', '');
INSERT INTO `lineas_factura` VALUES ('717', 'Servicios prueba', '1', '0.00', '0.00', '0.00', '0.00', '0.00', '481', '001.001', '0.0000', '001-003', '0.00', '', '');
INSERT INTO `lineas_factura` VALUES ('718', 'RJE0011 RUIJIE REYEE ACCESS POINT WIFI 6 AX1800 DUAL BAND 2  PTOS GIGA RG-RAP2260(G)', '1', '159.60', '0.00', '0.00', '19.15', '178.75', '479', 'RG-RAP2260', '0.1200', '001-001', '159.60', '', '');
INSERT INTO `lineas_factura` VALUES ('719', 'RJE0004 RUIJIE REYEE SWITCH CLOUD 24 PTOS POE + 2 SFP 370W  RACK C2 RG-ES226GC-P', '1', '441.00', '0.00', '0.00', '52.92', '493.92', '479', 'RG-ES226GC', '0.1200', '001-001', '441.00', '', '');
INSERT INTO `lineas_factura` VALUES ('720', 'RJE0024 RUIJIE REYEE ROUTER GATEWAY CLOUD 5 PTOS GIGA  2WAN RG-EG105G-V2', '1', '117.60', '0.00', '0.00', '14.11', '131.71', '479', 'RJE0024', '0.1200', '001-001', '117.60', '', '');
INSERT INTO `lineas_factura` VALUES ('721', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '1', '210.00', '0.00', '0.00', '25.20', '235.20', '479', '4', '0.1200', '001-001', '210.00', '', '');
INSERT INTO `lineas_factura` VALUES ('723', 'HOSTING INCONTROL', '1', '60.00', '0.00', '0.00', '7.20', '67.20', '482', '70', '0.1200', '001-001', '60.00', '', '');
INSERT INTO `lineas_factura` VALUES ('724', 'SOPORTE THE-HUB', '1', '500.00', '0.00', '0.00', '60.00', '560.00', '483', '134', '0.1200', '001-001', '500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('725', 'OUTSORCING', '1', '500.00', '0.00', '0.00', '60.00', '560.00', '484', '1', '0.1200', '001-001', '500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('726', 'OUTSORCING', '1', '400.00', '0.00', '0.00', '48.00', '448.00', '485', '1', '0.1200', '001-001', '400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('727', 'SERVICIO DE CLOUT CALLING', '1', '245.00', '0.00', '0.00', '29.40', '274.40', '486', '91', '0.1200', '001-001', '245.00', '', '');
INSERT INTO `lineas_factura` VALUES ('728', 'Desarrollo', '1', '10', '0.00', '0.00', '1.50', '11.50', '487', '01.01.005', '0.1500', '001-001', '10.00', '', '');
INSERT INTO `lineas_factura` VALUES ('729', 'OUTSORCING DE TALENTO', '1', '5291.88', '0.00', '0.00', '793.78', '6085.66', '488', '182', '0.1500', '001-001', '5291.88', '', '');
INSERT INTO `lineas_factura` VALUES ('730', 'LINEA CELULAR', '3', '26.78', '0.00', '0.00', '12.05', '92.39', '488', '198', '0.1500', '001-001', '80.34', '', '');
INSERT INTO `lineas_factura` VALUES ('732', 'Access Point U7 Pro Unifi WIFI', '2', '352', '0.00', '0.00', '105.60', '809.60', '489', 'wifi1', '0.1500', '001-001', '704.00', '', '');
INSERT INTO `lineas_factura` VALUES ('733', 'DISCO DURO SSD 480GB', '6', '63', '0.00', '0.00', '56.70', '434.70', '490', '72', '0.1500', '001-001', '378.00', '', '');
INSERT INTO `lineas_factura` VALUES ('734', 'MEMORIAS DE 8GB LAP', '6', '42', '0.00', '0.00', '37.80', '289.80', '490', '102', '0.1500', '001-001', '252.00', '', '');
INSERT INTO `lineas_factura` VALUES ('735', 'DIMM DDR3 8GB', '1', '42', '0.00', '0.00', '6.30', '48.30', '490', '158', '0.1500', '001-001', '42.00', '', '');
INSERT INTO `lineas_factura` VALUES ('737', 'Kit de Pasta Térmica', '2', '23.80', '0.00', '0.00', '7.14', '54.74', '490', 'Redes3', '0.1500', '001-001', '47.60', '', '');
INSERT INTO `lineas_factura` VALUES ('738', 'SOPORTE THE-HUB', '1', '400.00', '0.00', '0.00', '60.00', '460.00', '491', '134', '0.1500', '001-001', '400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('739', 'OUTSORCING', '1', '500.00', '0.00', '0.00', '75.00', '575.00', '492', '1', '0.1500', '001-001', '500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('740', 'SERVICIO DE CLOUT CALLING', '1', '245.00', '0.00', '0.00', '36.75', '281.75', '493', '91', '0.1500', '001-001', '245.00', '', '');
INSERT INTO `lineas_factura` VALUES ('741', 'HOSTING INCONTROL', '1', '60.00', '0.00', '0.00', '9.00', '69.00', '494', '70', '0.1500', '001-001', '60.00', '', '');
INSERT INTO `lineas_factura` VALUES ('742', 'OUTSORCING', '1', '400.00', '0.00', '0.00', '60.00', '460.00', '495', '1', '0.1500', '001-001', '400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('743', 'Firewall UDM', '1', '539.06', '0.00', '0.00', '80.86', '619.92', '496', '107', '0.1500', '001-001', '539.06', '', '');
INSERT INTO `lineas_factura` VALUES ('744', 'UNIFI AP-AC 6 PRO', '2', '445.63', '0.00', '0.00', '133.69', '1024.95', '496', '165', '0.1500', '001-001', '891.26', '', '');
INSERT INTO `lineas_factura` VALUES ('745', 'UPS 3000VA - 2400W', '1', '964.66', '0.00', '0.00', '144.70', '1109.36', '497', 'UPS', '0.1500', '001-001', '964.66', '', '');
INSERT INTO `lineas_factura` VALUES ('746', 'GASTOS DE EDUCADORAS', '1', '14.13', '0.00', '0.00', '2.12', '16.25', '498', '136', '0.1500', '001-001', '14.13', '', '');
INSERT INTO `lineas_factura` VALUES ('747', 'LINEA CELULAR', '3', '26.78', '0.00', '0.00', '12.05', '92.39', '499', '198', '0.1500', '001-001', '80.34', '', '');
INSERT INTO `lineas_factura` VALUES ('748', 'OUTSORCING DE TALENTO', '1', '5373.68', '0.00', '0.00', '806.05', '6179.73', '500', '182', '0.1500', '001-001', '5373.68', '', '');
INSERT INTO `lineas_factura` VALUES ('750', 'UPS 1KVA INTERACTIVO', '1', '120.26', '0.00', '0.00', '18.04', '138.30', '501', 'UPS 1KVA INTERACTIVO', '0.1500', '001-001', '120.26', '', '');
INSERT INTO `lineas_factura` VALUES ('751', 'PATCH PANEL MODULAR CAT6 24 PTOS', '2', '64.69', '0.00', '0.00', '19.41', '148.79', '501', '50', '0.1500', '001-001', '129.38', '', '');
INSERT INTO `lineas_factura` VALUES ('752', 'SWITCH POE 8 PUERTOS', '1', '43.13', '0.00', '0.00', '6.47', '49.60', '501', 'SWITCH POE 8 PUERTOS', '0.1500', '001-001', '43.13', '', '');
INSERT INTO `lineas_factura` VALUES ('753', 'LECTOR BIOMETRICO', '1', '186.88', '0.00', '0.00', '28.03', '214.91', '501', 'LECTOR BIOMETRICO', '0.1500', '001-001', '186.88', '', '');
INSERT INTO `lineas_factura` VALUES ('754', 'TELEFONO WIFI ', '1', '129.38', '0.00', '0.00', '19.41', '148.79', '501', 'TELEFONO WIFI ', '0.1500', '001-001', '129.38', '', '');
INSERT INTO `lineas_factura` VALUES ('756', 'PATCH CORD 3 PIES', '10', '5.75', '0.00', '0.00', '8.63', '66.13', '501', '108', '0.1500', '001-001', '57.50', '', '');
INSERT INTO `lineas_factura` VALUES ('757', 'CONFIGURACION E INSTALACION', '1', '600', '0.00', '0.00', '90.00', '690.00', '501', '48', '0.1500', '001-001', '600.00', '', '');
INSERT INTO `lineas_factura` VALUES ('758', 'Access Point U6 Enterprise Unifi WIFI', '2', '368', '0.00', '0.00', '110.40', '846.40', '501', 'wifi1', '0.1500', '001-001', '736.00', '', '');
INSERT INTO `lineas_factura` VALUES ('759', 'FIREWLL UDM UNIFI SECURITY GATEWAY', '1', '539.16', '0.00', '0.00', '80.87', '620.03', '501', '107', '0.1500', '001-001', '539.16', '', '');
INSERT INTO `lineas_factura` VALUES ('760', 'SOPORTE THE-HUB', '1', '400', '0.00', '0.00', '60.00', '460.00', '502', '134', '0.1500', '001-001', '400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('761', 'OUTSORCING', '1', '500.00', '0.00', '0.00', '75.00', '575.00', '503', '1', '0.1500', '001-001', '500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('762', 'SERVICIO DE CLOUT CALLING', '1', '245.00', '0.00', '0.00', '36.75', '281.75', '504', '91', '0.1500', '001-001', '245.00', '', '');
INSERT INTO `lineas_factura` VALUES ('764', 'OUTSORCING', '1', '400.00', '0.00', '0.00', '60.00', '460.00', '505', '1', '0.1500', '001-001', '400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('765', 'HOSTING INCONTROL', '1', '60.00', '0.00', '0.00', '9.00', '69.00', '506', '70', '0.1500', '001-001', '60.00', '', '');
INSERT INTO `lineas_factura` VALUES ('766', 'COP. DELL OPTIPLEX AIO 7410', '1', '1151.44', '0.00', '0.00', '172.72', '1324.16', '507', '226', '0.1500', '001-001', '1151.44', '', '');
INSERT INTO `lineas_factura` VALUES ('767', 'OUTSORCING DE TALENTO', '3', '1800.00', '0.00', '0.00', '810.00', '6210.00', '508', '182', '0.1500', '001-001', '5400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('768', 'LINEA CELULAR', '3', '26.78', '0.00', '0.00', '12.05', '92.39', '508', '198', '0.1500', '001-001', '80.34', '', '');
INSERT INTO `lineas_factura` VALUES ('769', 'LICENCIA KASPERSKY CLOUD PRO', '1', '554.88', '0.00', '0.00', '83.23', '638.11', '509', '196', '0.1500', '001-001', '554.88', '', '');
INSERT INTO `lineas_factura` VALUES ('770', 'OUTSORCING', '1', '175', '0.00', '0.00', '26.25', '201.25', '510', '1', '0.1500', '001-001', '175.00', '', '');
INSERT INTO `lineas_factura` VALUES ('771', 'SOPORTE THE-HUB', '1', '400.00', '0.00', '0.00', '60.00', '460.00', '511', '134', '0.1500', '001-001', '400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('772', 'OUTSORCING', '1', '500', '0.00', '0.00', '75.00', '575.00', '512', '1', '0.1500', '001-001', '500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('773', 'SERVICIO DE CLOUT CALLING', '1', '245.00', '0.00', '0.00', '36.75', '281.75', '513', '91', '0.1500', '001-001', '245.00', '', '');
INSERT INTO `lineas_factura` VALUES ('774', 'OUTSORCING', '1', '400', '0.00', '0.00', '60.00', '460.00', '514', '1', '0.1500', '001-001', '400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('775', 'HOSTING INCONTROL', '1', '60.00', '0.00', '0.00', '9.00', '69.00', '515', '70', '0.1500', '001-001', '60.00', '', '');
INSERT INTO `lineas_factura` VALUES ('776', 'LICENCIA KASPERSKY CLOUD PRO', '1', '254.15', '0.00', '0.00', '38.12', '292.27', '516', '196', '0.1500', '001-001', '254.15', '', '');
INSERT INTO `lineas_factura` VALUES ('777', 'UPS 1KVA INTERACTIVO', '3', '95', '0.00', '0.00', '42.75', '327.75', '517', 'UPS 1KVA INTERACTIVO', '0.1500', '001-001', '285.00', '', '');
INSERT INTO `lineas_factura` VALUES ('778', 'DISCO DURO SSD 480GB', '1', '61.82', '0.00', '0.00', '9.27', '71.09', '517', '72', '0.1500', '001-001', '61.82', '', '');
INSERT INTO `lineas_factura` VALUES ('779', 'MEMORIAS DE 4GB ', '1', '40.00', '0.00', '0.00', '6.00', '46.00', '517', '102', '0.1500', '001-001', '40.00', '', '');
INSERT INTO `lineas_factura` VALUES ('780', 'FIRMA ELECTRONICA PNR 5AÑOS', '1', '40.20', '0.00', '0.00', '6.03', '46.23', '518', 'PNR5', '0.1500', '001-001', '40.20', '', '');
INSERT INTO `lineas_factura` VALUES ('781', 'MANTENIMIENTO DE UPS Y REPUESTOS', '2', '65', '0.00', '0.00', '19.50', '149.50', '519', '67', '0.1500', '001-001', '130.00', '', '');
INSERT INTO `lineas_factura` VALUES ('782', 'OUTSORCING DE TALENTO', '1', '5331.38', '0.00', '0.00', '799.71', '6131.09', '520', '182', '0.1500', '001-001', '5331.38', '', '');
INSERT INTO `lineas_factura` VALUES ('783', 'LINEA CELULAR', '3', '26.78', '0.00', '0.00', '12.05', '92.39', '520', '198', '0.1500', '001-001', '80.34', '', '');
INSERT INTO `lineas_factura` VALUES ('784', 'GASTO EN GIRAS', '1', '192.50', '0.00', '0.00', '28.88', '221.38', '520', '145', '0.1500', '001-001', '192.50', '', '');
INSERT INTO `lineas_factura` VALUES ('785', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '1', '1000.00', '0.00', '0.00', '150.00', '1150.00', '521', '4', '0.1500', '001-001', '1000.00', '', '');
INSERT INTO `lineas_factura` VALUES ('786', 'GABINETE   COMPACTO MONOBLOQUE', '1', '192.63', '0.00', '0.00', '28.89', '221.52', '522', '59', '0.1500', '001-001', '192.63', '', '');
INSERT INTO `lineas_factura` VALUES ('787', 'MULTITOMA', '1', '40.25', '0.00', '0.00', '6.04', '46.29', '522', '6514552', '0.1500', '001-001', '40.25', '', '');
INSERT INTO `lineas_factura` VALUES ('788', 'PATCH PANEL MODULAR PARA  CAT5E Y CAT6 24 PTOS', '1', '61.81', '0.00', '0.00', '9.27', '71.08', '522', '50', '0.1500', '001-001', '61.81', '', '');
INSERT INTO `lineas_factura` VALUES ('789', 'Bandeja metálica de 20cm', '1', '15.81', '0.00', '0.00', '2.37', '18.18', '522', 'Rack6', '0.1500', '001-001', '15.81', '', '');
INSERT INTO `lineas_factura` VALUES ('790', 'UPS 2KVA INTERACTIVO', '1', '85', '0.00', '0.00', '12.75', '97.75', '522', 'UPS 1KVA INTERACTIVO', '0.1500', '001-001', '85.00', '', '');
INSERT INTO `lineas_factura` VALUES ('791', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '1', '185', '0.00', '0.00', '27.75', '212.75', '522', '4', '0.1500', '001-001', '185.00', '', '');
INSERT INTO `lineas_factura` VALUES ('793', 'LECTOR BIOMETRICO FACIAL HUELLA', '1', '182.16', '0.00', '0.00', '27.32', '209.48', '524', '211', '0.1500', '001-001', '182.16', '', '');
INSERT INTO `lineas_factura` VALUES ('794', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '1', '69', '0.00', '0.00', '10.35', '79.35', '524', '4', '0.1500', '001-001', '69.00', '', '');
INSERT INTO `lineas_factura` VALUES ('795', 'OUTSORCING', '1', '175', '0.00', '0.00', '26.25', '201.25', '525', '1', '0.1500', '001-001', '175.00', '', '');
INSERT INTO `lineas_factura` VALUES ('797', 'BATERIA DELL TYPE H7XW1 COMPATIBLE 268X5 3 CELDAS  *ORIGINAL*', '1', '60.38', '0.00', '0.00', '9.06', '69.44', '526', 'LECTOR BIOMETRICO', '0.1500', '001-001', '60.38', '', '');
INSERT INTO `lineas_factura` VALUES ('798', 'Disco Duro Sata Ssd Wd 500gb 7mm 2.5\'\' Sata Para Lapto/ Pc', '1', '43.13', '0.00', '0.00', '6.47', '49.60', '526', 'LECTOR BIOMETRICO', '0.1500', '001-001', '43.13', '', '');
INSERT INTO `lineas_factura` VALUES ('799', 'Memoria 8gb 1600 Kingston Ddr3 Laptop Kvr16ls11/8 Sodimm', '1', '63.25', '0.00', '0.00', '9.49', '72.74', '526', 'LECTOR BIOMETRICO', '0.1500', '001-001', '63.25', '', '');
INSERT INTO `lineas_factura` VALUES ('800', 'OUTSORCING', '1', '200', '0.00', '0.00', '30.00', '230.00', '527', '1', '0.1500', '001-001', '200.00', '', '');
INSERT INTO `lineas_factura` VALUES ('801', 'HOSTING INCONTROL', '1', '60.00', '0.00', '0.00', '9.00', '69.00', '528', '70', '0.1500', '001-001', '60.00', '', '');
INSERT INTO `lineas_factura` VALUES ('802', 'OUTSORCING', '1', '500', '0.00', '0.00', '75.00', '575.00', '529', '1', '0.1500', '001-001', '500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('803', 'SOPORTE THE-HUB', '1', '400.00', '0.00', '0.00', '60.00', '460.00', '530', '134', '0.1500', '001-001', '400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('804', 'SERVICIO DE CLOUT CALLING', '1', '245.00', '0.00', '0.00', '36.75', '281.75', '531', '91', '0.1500', '001-001', '245.00', '', '');
INSERT INTO `lineas_factura` VALUES ('806', 'LINEA CELULAR', '3', '26.78', '0.00', '0.00', '12.05', '92.39', '532', '198', '0.1500', '001-001', '80.34', '', '');
INSERT INTO `lineas_factura` VALUES ('807', 'GASTOS DE EDUCADORAS', '1', '60.38', '0.00', '0.00', '9.06', '69.44', '532', '136', '0.1500', '001-001', '60.38', '', '');
INSERT INTO `lineas_factura` VALUES ('808', 'OUTSORCING', '1', '5400', '0.00', '0.00', '810.00', '6210.00', '532', '1', '0.1500', '001-001', '5400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('810', 'OUTSORCING', '1', '1000', '0.00', '0.00', '150.00', '1150.00', '533', '1', '0.1500', '001-001', '1000.00', '', '');
INSERT INTO `lineas_factura` VALUES ('811', 'CINTAS DE RESINA 6200', '3', '124.60', '0.00', '0.00', '56.07', '429.87', '534', 'RESINA', '0.1500', '001-001', '373.80', '', '');
INSERT INTO `lineas_factura` VALUES ('814', 'Etiquetas 1.7656x0.5156in (44.5x19.1mm); TT, RFID 5000roll', '2', '897.12', '0.00', '0.00', '269.14', '2063.38', '534', 'RFID 44', '0.1500', '001-001', '1794.24', '', '');
INSERT INTO `lineas_factura` VALUES ('815', 'Etiquetas 1.7656x0.5156in (45x13mm); TT, RFID 600roll', '3', '507.64', '0.00', '0.00', '228.44', '1751.36', '534', 'RFID 45', '0.1500', '001-001', '1522.92', '', '');
INSERT INTO `lineas_factura` VALUES ('816', 'OUTSORCING', '1', '175', '0.00', '0.00', '26.25', '201.25', '535', '1', '0.1500', '001-001', '175.00', '', '');
INSERT INTO `lineas_factura` VALUES ('817', 'Kaspersky Premium 1 año', '1', '55.78', '0.00', '0.00', '8.37', '64.15', '536', 'KS Premiun', '0.1500', '001-001', '55.78', '', '');
INSERT INTO `lineas_factura` VALUES ('818', 'OUTSORCING', '1', '1000', '0.00', '0.00', '150.00', '1150.00', '537', '1', '0.1500', '001-001', '1000.00', '', '');
INSERT INTO `lineas_factura` VALUES ('819', 'HOSTING INCONTROL', '1', '60', '0.00', '0.00', '9.00', '69.00', '538', '70', '0.1500', '001-001', '60.00', '', '');
INSERT INTO `lineas_factura` VALUES ('820', 'OUTSORCING', '1', '200', '0.00', '0.00', '30.00', '230.00', '539', '1', '0.1500', '001-001', '200.00', '', '');
INSERT INTO `lineas_factura` VALUES ('821', 'SOPORTE THE-HUB', '1', '400.00', '0.00', '0.00', '60.00', '460.00', '540', '134', '0.1500', '001-001', '400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('822', 'OUTSORCING', '1', '500.00', '0.00', '0.00', '75.00', '575.00', '541', '1', '0.1500', '001-001', '500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('823', 'SERVICIO DE CLOUT CALLING', '1', '245.00', '0.00', '0.00', '36.75', '281.75', '542', '91', '0.1500', '001-001', '245.00', '', '');
INSERT INTO `lineas_factura` VALUES ('824', 'OUTSORCING', '1', '5400', '0.00', '0.00', '810.00', '6210.00', '543', '1', '0.1500', '001-001', '5400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('825', 'LINEA CELULAR', '3', '26.78', '0.00', '0.00', '12.05', '92.39', '544', '198', '0.1500', '001-001', '80.34', '', '');
INSERT INTO `lineas_factura` VALUES ('826', 'GASTOS DE EDUCADORAS', '1', '621.89', '0.00', '0.00', '93.28', '715.17', '545', '136', '0.1500', '001-001', '621.89', '', '');
INSERT INTO `lineas_factura` VALUES ('827', 'OUTSORCING', '1', '400', '0.00', '0.00', '60.00', '460.00', '548', '1', '0.1500', '001-001', '400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('828', 'OUTSORCING', '1', '500', '0.00', '0.00', '75.00', '575.00', '549', '1', '0.1500', '001-001', '500.00', '', '');
INSERT INTO `lineas_factura` VALUES ('829', 'HOSTING INCONTROL', '1', '60', '0.00', '0.00', '9.00', '69.00', '550', '70', '0.1500', '001-001', '60.00', '', '');
INSERT INTO `lineas_factura` VALUES ('830', 'OUTSORCING', '1', '200', '0.00', '0.00', '30.00', '230.00', '551', '1', '0.1500', '001-001', '200.00', '', '');
INSERT INTO `lineas_factura` VALUES ('831', 'OUTSORCING', '1', '5400', '0.00', '0.00', '810.00', '6210.00', '552', '1', '0.1500', '001-001', '5400.00', '', '');
INSERT INTO `lineas_factura` VALUES ('832', 'GASTOS DE EDUCADORAS', '1', '345.89', '0.00', '0.00', '51.88', '397.77', '552', '136', '0.1500', '001-001', '345.89', '', '');
INSERT INTO `lineas_factura` VALUES ('833', 'LINEA CELULAR', '3', '26.78', '0.00', '0.00', '12.05', '92.39', '552', '198', '0.1500', '001-001', '80.34', '', '');
INSERT INTO `lineas_factura` VALUES ('834', 'Recuperación de datos PC DELL DECE', '1', '300', '0.00', '0.00', '45.00', '345.00', '553', 'MEMORIAS', '0.1500', '001-001', '300.00', '', '');
INSERT INTO `lineas_factura` VALUES ('835', 'Pantalla Lapto DELL Vostro 3405', '1', '120', '0.00', '0.00', '0.00', '120.00', '553', 'DISCO', '0.0000', '001-001', '120.00', '', '');
INSERT INTO `lineas_factura` VALUES ('836', 'MEMORIA 8 GB PC2400', '1', '40', '0.00', '0.00', '6.00', '46.00', '553', 'MEMORIAS', '0.1500', '001-001', '40.00', '', '');
INSERT INTO `lineas_factura` VALUES ('837', 'Adaptador Lan tipo C', '1', '35', '0.00', '0.00', '5.25', '40.25', '553', 'MEMORIAS', '0.1500', '001-001', '35.00', '', '');
INSERT INTO `lineas_factura` VALUES ('839', 'Estuche robusto ipad ipad air 5 10.9 p negro', '1', '50', '0.00', '0.00', '7.50', '57.50', '553', 'MEMORIAS', '0.1500', '001-001', '50.00', '', '');
INSERT INTO `lineas_factura` VALUES ('840', 'Estuche con teclado ipad pro 10 ipad air 4/5 10.9 p\\\" negro', '1', '60', '0.00', '0.00', '9.00', '69.00', '553', 'MEMORIAS', '0.1500', '001-001', '60.00', '', '');
INSERT INTO `lineas_factura` VALUES ('841', 'Estuche robusto para ipad decima generacion 10.9 negro', '2', '50', '0.00', '0.00', '15.00', '115.00', '553', 'MEMORIAS', '0.1500', '001-001', '100.00', '', '');

-- ----------------------------
-- Table structure for lineas_nota_credito
-- ----------------------------
DROP TABLE IF EXISTS `lineas_nota_credito`;
CREATE TABLE `lineas_nota_credito` (
  `id_nota_credito_linea` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(255) DEFAULT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `pvp` varchar(255) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT NULL,
  `nota_credito` varchar(255) DEFAULT NULL,
  `descuento` varchar(255) DEFAULT NULL,
  `iva` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `porc_descuento` varchar(255) DEFAULT NULL,
  `referencia` varchar(255) DEFAULT NULL,
  `serie` varchar(255) DEFAULT NULL,
  `porc_iva` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_nota_credito_linea`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lineas_nota_credito
-- ----------------------------
INSERT INTO `lineas_nota_credito` VALUES ('1', 'servicio de trasporte', '1', '1.50', '1.50', '2', '0.00', '0.18', '1.68', '0.00', '10.23.25', '001-002', '0.12');
INSERT INTO `lineas_nota_credito` VALUES ('2', 'servicio de trasporte', '1', '1.50', '1.50', '5', '0.00', '0.18', '1.68', '0.00', '10.23.25', '001-002', '0.12');
INSERT INTO `lineas_nota_credito` VALUES ('3', 'Pollo  1', '1', '150.00', '150.00', '4', '0.00', '0.00', '150.00', '0.00', '01.01.37', '001-002', '0');
INSERT INTO `lineas_nota_credito` VALUES ('4', 'Pollo  1', '1', '150.00', '150.00', '6', '0.00', '0.00', '150.00', '0.00', '01.01.37', '001-002', '0');
INSERT INTO `lineas_nota_credito` VALUES ('5', 'Pollo  1', '1', '1', '1.00', '7', '0.00', '0.00', '1.00', '0.00', '01.01.37', '001-001', '0');
INSERT INTO `lineas_nota_credito` VALUES ('8', 'FUMIGACIÓN NOVIEMBRE DICIEMBRE 2022 Y ENERO FEBRERO 2023', '4', '13.50', '54.00', '9', '0.00', '0.00', '54.00', '0.00', '1', '001-003', '0');
INSERT INTO `lineas_nota_credito` VALUES ('9', 'DESCUENTO', '1', '7.50', '7.50', '10', '0.00', '0.00', '7.50', '0.00', '3', '001-003', '0');
INSERT INTO `lineas_nota_credito` VALUES ('10', 'SERVICIO DE TRANSPORTE LOS DIAS 25 - 26 - 27 - 29 DE JUNIO DE 2023', '1', '47.50', '47.50', '11', '0.00', '0.00', '47.50', '0.00', '2', '001-003', '0');
INSERT INTO `lineas_nota_credito` VALUES ('11', 'SERVICIO DE TRANSPORTE LOS DIAS 26 - 29 DE JUNIO DE 2023', '1', '202.50', '202.50', '12', '0.00', '0.00', '202.50', '0.00', '2', '001-003', '0');
INSERT INTO `lineas_nota_credito` VALUES ('12', 'SERVICIO DE TRANSPORTE LOS DIAS 20 - 21 - 24 DE AGOSTO DE 2023', '1', '7.5', '7.50', '13', '0.00', '0.00', '7.50', '0.00', '2', '001-003', '0');
INSERT INTO `lineas_nota_credito` VALUES ('13', 'SERVICIO DE TRANSPORTE LOS DIAS 20 - 21 - 24 DE AGOSTO DE 2023', '1', '7.41', '7.41', '14', '0.00', '0.00', '7.41', '0.00', '2', '001-003', '0');

-- ----------------------------
-- Table structure for lista_tipo_contribuyente
-- ----------------------------
DROP TABLE IF EXISTS `lista_tipo_contribuyente`;
CREATE TABLE `lista_tipo_contribuyente` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `RUC` varchar(13) COLLATE utf8_spanish_ci DEFAULT '.',
  `Zona` varchar(10) COLLATE utf8_spanish_ci DEFAULT '.',
  `Agente_Retencion` varchar(30) COLLATE utf8_spanish_ci DEFAULT '.',
  `Contribuyente_Especial` bit(1) DEFAULT b'0',
  `RIMPE_E` bit(1) DEFAULT NULL,
  `RIMPE_P` bit(1) DEFAULT NULL,
  `Micro_2020` bit(1) DEFAULT b'0',
  `Micro_2021` bit(1) DEFAULT b'0',
  `X` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '.',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `RUC` (`RUC`)
) ENGINE=InnoDB AUTO_INCREMENT=961384 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of lista_tipo_contribuyente
-- ----------------------------
INSERT INTO `lista_tipo_contribuyente` VALUES ('18535', '0702164179001', 'ZONA 5', 'NAC-DNCRASC20-00000001', '\0', '', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('18536', '0702410077001', 'ZONA 7', 'NAC-DNCRASC20-00000001', '\0', '\0', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('18537', '1002556940001', 'ZONA 4', 'NAC-DNCRASC20-00000001', '\0', '\0', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('18538', '0916403512001', 'ZONA 8', 'NAC-DNCRASC20-00000001', '\0', '\0', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('18539', '1706298955001', 'ZONA 9', 'NAC-DNCRASC20-00000001', '\0', '', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('18540', '1709526907001', 'ZONA 9', 'NAC-DNCRASC20-00000001', '\0', '\0', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('18541', '1711313393001', 'ZONA 9', 'NAC-DNCRASC20-00000001', '\0', '\0', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('18542', '1001864733001', 'ZONA 1', 'NAC-DNCRASC20-00000001', '\0', '', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('18543', '0703151910001', 'ZONA 7', 'NAC-DNCRASC20-00000001', '\0', '\0', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('18544', '0700751563001', 'ZONA 7', 'NAC-DNCRASC20-00000001', '\0', '\0', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('18545', '1704779501001', 'ZONA 9', 'NAC-DNCRASC20-00000001', '\0', '\0', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('18546', '1001969847001', 'ZONA 1', 'NAC-DNCRASC20-00000001', '\0', '\0', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('18547', '1708012677001', 'ZONA 9', 'NAC-DNCRASC20-00000001', '\0', '\0', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('18548', '1714939251001', 'ZONA 4', 'NAC-DNCRASC20-00000001', '\0', '', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('18549', '1201044284001', 'ZONA 8', 'NAC-DNCRASC20-00000001', '\0', '\0', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('18550', '1721010708001', 'ZONA 1', 'NAC-DNCRASC20-00000001', '\0', '', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('961381', '1722214507001', 'ZONA 9', '.', '\0', '', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('961382', '1712605284001', 'ZONA 9', '.', '\0', '', '\0', '\0', '\0', '.');
INSERT INTO `lista_tipo_contribuyente` VALUES ('961383', '1793211628001', 'ZONA 1', '.', '\0', '', '\0', '\0', '\0', '.');

-- ----------------------------
-- Table structure for marcas
-- ----------------------------
DROP TABLE IF EXISTS `marcas`;
CREATE TABLE `marcas` (
  `ID_MARCA` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO` varchar(255) DEFAULT NULL,
  `DESCRIPCION` varchar(255) DEFAULT NULL,
  `ESTADO` char(1) DEFAULT NULL,
  PRIMARY KEY (`ID_MARCA`)
) ENGINE=InnoDB AUTO_INCREMENT=2673 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of marcas
-- ----------------------------
INSERT INTO `marcas` VALUES ('1', '0', 'S/M', 'A');
INSERT INTO `marcas` VALUES ('2', '1', '3COM', 'A');
INSERT INTO `marcas` VALUES ('3', '2', '3M', 'A');
INSERT INTO `marcas` VALUES ('4', '3', 'A.O FORTY', 'A');
INSERT INTO `marcas` VALUES ('5', '4', 'A.O. SPENCER', 'A');
INSERT INTO `marcas` VALUES ('6', '5', 'ABBOTT', 'A');
INSERT INTO `marcas` VALUES ('7', '6', 'ABC', 'A');
INSERT INTO `marcas` VALUES ('8', '7', 'ABPICK', 'A');
INSERT INTO `marcas` VALUES ('9', '8', 'ACAI ELECTRIC COLTA', 'A');
INSERT INTO `marcas` VALUES ('10', '9', 'ACCUPOWER', 'A');
INSERT INTO `marcas` VALUES ('11', '10', 'ACER', 'A');
INSERT INTO `marcas` VALUES ('12', '11', 'ACKER', 'A');
INSERT INTO `marcas` VALUES ('13', '12', 'ACME', 'A');
INSERT INTO `marcas` VALUES ('14', '13', 'ACRIMETAL', 'A');
INSERT INTO `marcas` VALUES ('15', '14', 'ADEC', 'A');
INSERT INTO `marcas` VALUES ('16', '15', 'POWERMAX', 'A');
INSERT INTO `marcas` VALUES ('17', '16', 'ADLER', 'A');
INSERT INTO `marcas` VALUES ('18', '17', 'ADVAN', 'A');
INSERT INTO `marcas` VALUES ('19', '18', 'ADVANTAGE', 'A');
INSERT INTO `marcas` VALUES ('20', '19', 'ADVENT', 'A');
INSERT INTO `marcas` VALUES ('21', '20', 'AESCULAP', 'A');
INSERT INTO `marcas` VALUES ('22', '21', 'AGA', 'A');
INSERT INTO `marcas` VALUES ('23', '22', 'AGIPGAS', 'A');
INSERT INTO `marcas` VALUES ('24', '23', 'AIJON', 'A');
INSERT INTO `marcas` VALUES ('25', '24', 'IPHONE', 'A');
INSERT INTO `marcas` VALUES ('1580', '1579', 'KOPF', 'A');
INSERT INTO `marcas` VALUES ('1581', '1580', 'SANDY', 'A');
INSERT INTO `marcas` VALUES ('1582', '1581', 'TECUNSEH', 'A');
INSERT INTO `marcas` VALUES ('1583', '1582', 'BENCH GRINDER', 'A');
INSERT INTO `marcas` VALUES ('1584', '1583', 'CATA', 'A');
INSERT INTO `marcas` VALUES ('1585', '1584', 'RAPESCO', 'A');
INSERT INTO `marcas` VALUES ('1586', '1585', 'GS', 'A');
INSERT INTO `marcas` VALUES ('1587', '1586', 'TRIKON', 'A');
INSERT INTO `marcas` VALUES ('1588', '1587', 'JASUN', 'A');
INSERT INTO `marcas` VALUES ('1589', '1588', 'TAROS', 'A');
INSERT INTO `marcas` VALUES ('1590', '1589', 'FAHRENHEAT', 'A');
INSERT INTO `marcas` VALUES ('1591', '1590', 'ARMSTRONG', 'A');
INSERT INTO `marcas` VALUES ('1592', '1591', 'BROADCROWN', 'A');
INSERT INTO `marcas` VALUES ('1593', '1592', 'KAISER', 'A');
INSERT INTO `marcas` VALUES ('1594', '1593', 'CODISON', 'A');
INSERT INTO `marcas` VALUES ('1595', '1594', 'HUGER', 'A');
INSERT INTO `marcas` VALUES ('1596', '1595', 'AUDIOVOX', 'A');
INSERT INTO `marcas` VALUES ('1597', '1596', 'BIOEQUIP', 'A');
INSERT INTO `marcas` VALUES ('1598', '1597', 'ASSIN', 'A');
INSERT INTO `marcas` VALUES ('1599', '1598', 'HP', 'A');
INSERT INTO `marcas` VALUES ('1600', '1599', 'CISCO SYSTEM', 'A');
INSERT INTO `marcas` VALUES ('1601', '1600', 'SUN MICROSYSTEM', 'A');
INSERT INTO `marcas` VALUES ('2316', '2315', 'JOBY', 'A');
INSERT INTO `marcas` VALUES ('2317', '2316', 'MULTIBLITZ', 'A');
INSERT INTO `marcas` VALUES ('2318', '2317', 'TRANCELL', 'A');
INSERT INTO `marcas` VALUES ('2319', '2318', 'OBLIQUE', 'A');
INSERT INTO `marcas` VALUES ('2320', '2319', 'INFINITY', 'A');
INSERT INTO `marcas` VALUES ('2321', '2320', 'RADWAG', 'A');
INSERT INTO `marcas` VALUES ('2322', '2321', 'PELIKAN', 'A');
INSERT INTO `marcas` VALUES ('2323', '2322', 'MIDEA', 'A');
INSERT INTO `marcas` VALUES ('2324', '2323', 'SENAL', 'A');
INSERT INTO `marcas` VALUES ('2325', '2324', 'SAMSON', 'A');
INSERT INTO `marcas` VALUES ('2326', '2325', 'VARIZOOM', 'A');
INSERT INTO `marcas` VALUES ('2327', '2326', 'STAINLESS', 'A');
INSERT INTO `marcas` VALUES ('2328', '2327', 'DANBY PREMIERE', 'A');
INSERT INTO `marcas` VALUES ('2329', '2328', 'RECONYX', 'A');
INSERT INTO `marcas` VALUES ('2330', '2329', 'MIDWEST', 'A');
INSERT INTO `marcas` VALUES ('2331', '2330', 'DILAMI', 'A');
INSERT INTO `marcas` VALUES ('2332', '2331', 'ELECTRONIC', 'A');
INSERT INTO `marcas` VALUES ('2333', '2332', 'KYOTO', 'A');
INSERT INTO `marcas` VALUES ('2334', '2333', 'GRAN TEST', 'A');
INSERT INTO `marcas` VALUES ('2335', '2334', 'VEIBON', 'A');
INSERT INTO `marcas` VALUES ('2336', '2335', 'GOWLLANDS', 'A');
INSERT INTO `marcas` VALUES ('2337', '2336', 'MACO', 'A');
INSERT INTO `marcas` VALUES ('2338', '2337', 'ADAM', 'A');
INSERT INTO `marcas` VALUES ('2339', '2338', 'SIMULAIDS', 'A');
INSERT INTO `marcas` VALUES ('2340', '2339', 'RUBI', 'A');
INSERT INTO `marcas` VALUES ('2341', '2340', 'PCE INSTRUMENT', 'A');
INSERT INTO `marcas` VALUES ('2342', '2341', 'PARR', 'A');
INSERT INTO `marcas` VALUES ('2343', '2342', 'STUART', 'A');
INSERT INTO `marcas` VALUES ('2344', '2343', 'COAST', 'A');
INSERT INTO `marcas` VALUES ('2345', '2344', 'EVERMED', 'A');
INSERT INTO `marcas` VALUES ('2346', '2345', 'CATALY', 'A');
INSERT INTO `marcas` VALUES ('2347', '2346', 'ZOLERTIA', 'A');
INSERT INTO `marcas` VALUES ('2348', '2347', 'FRANCOLO', 'A');
INSERT INTO `marcas` VALUES ('2349', '2348', 'TECSUS', 'A');
INSERT INTO `marcas` VALUES ('2350', '2349', 'SOUND BLAST', 'A');
INSERT INTO `marcas` VALUES ('2351', '2350', 'KANOMAX', 'A');
INSERT INTO `marcas` VALUES ('2352', '2351', 'RIOBI', 'A');
INSERT INTO `marcas` VALUES ('2353', '2352', 'BLUEROCK TOOLS', 'A');
INSERT INTO `marcas` VALUES ('2354', '2353', 'ADC', 'A');
INSERT INTO `marcas` VALUES ('2355', '2354', 'RCD', 'A');
INSERT INTO `marcas` VALUES ('2356', '2355', 'SARTURIUS', 'A');
INSERT INTO `marcas` VALUES ('2357', '2356', 'UNIFIED NETWORK CONTROLER', 'A');
INSERT INTO `marcas` VALUES ('2358', '2357', 'BIOTAGE', 'A');
INSERT INTO `marcas` VALUES ('2359', '2358', 'HEATING MANTLE', 'A');
INSERT INTO `marcas` VALUES ('2360', '2359', 'CERAGEM', 'A');
INSERT INTO `marcas` VALUES ('2361', '2360', 'BABYLISS', 'A');
INSERT INTO `marcas` VALUES ('2362', '2361', 'DINO LITE', 'A');
INSERT INTO `marcas` VALUES ('2363', '2362', 'TOUCAN ECO', 'A');
INSERT INTO `marcas` VALUES ('2364', '2363', 'WASPMOTE', 'A');
INSERT INTO `marcas` VALUES ('2365', '2364', 'WHISTLER', 'A');
INSERT INTO `marcas` VALUES ('2366', '2365', 'FLOWATCH', 'A');
INSERT INTO `marcas` VALUES ('2367', '2366', 'YSI', 'A');
INSERT INTO `marcas` VALUES ('2368', '2367', 'K CENTRIFUGE', 'A');
INSERT INTO `marcas` VALUES ('2369', '2368', 'S&M', 'A');
INSERT INTO `marcas` VALUES ('2370', '2369', 'HUMAPETTE', 'A');
INSERT INTO `marcas` VALUES ('2371', '2370', 'ALLEN HEATH', 'A');
INSERT INTO `marcas` VALUES ('2372', '2371', 'SONICS', 'A');
INSERT INTO `marcas` VALUES ('2373', '2372', 'CEBORA', 'A');
INSERT INTO `marcas` VALUES ('2374', '2373', 'LUMENERA', 'A');
INSERT INTO `marcas` VALUES ('2375', '2374', 'RICE LAKE', 'A');
INSERT INTO `marcas` VALUES ('2376', '2375', 'FAT SHARK', 'A');
INSERT INTO `marcas` VALUES ('2377', '2376', 'PARROT', 'A');
INSERT INTO `marcas` VALUES ('2378', '2377', 'ONELAM', 'A');
INSERT INTO `marcas` VALUES ('2379', '2378', 'BIOBASE', 'A');
INSERT INTO `marcas` VALUES ('2380', '2379', 'ECOX', 'A');
INSERT INTO `marcas` VALUES ('2381', '2380', 'ECHO METER', 'A');
INSERT INTO `marcas` VALUES ('2382', '2381', 'SPER SCIENTIFIC', 'A');
INSERT INTO `marcas` VALUES ('2383', '2382', 'TOTALPACK', 'A');
INSERT INTO `marcas` VALUES ('2384', '2383', 'SPEEDOTRON', 'A');
INSERT INTO `marcas` VALUES ('2385', '2384', 'KINECT', 'A');
INSERT INTO `marcas` VALUES ('2386', '2385', 'LEAP MOTION', 'A');
INSERT INTO `marcas` VALUES ('2387', '2386', 'XIANGYI', 'A');
INSERT INTO `marcas` VALUES ('2388', '2387', 'GRAHAM FIELD', 'A');
INSERT INTO `marcas` VALUES ('2389', '2388', 'GLOBAL SECURITY', 'A');
INSERT INTO `marcas` VALUES ('2390', '2389', 'SYNOLOGY', 'A');
INSERT INTO `marcas` VALUES ('2391', '2390', 'OSRAM', 'A');
INSERT INTO `marcas` VALUES ('2392', '2391', 'K', 'A');
INSERT INTO `marcas` VALUES ('2393', '2392', 'PHOTRON LAMPS', 'A');
INSERT INTO `marcas` VALUES ('2394', '2393', 'DEHUMIDIFIER', 'A');
INSERT INTO `marcas` VALUES ('2395', '2394', 'EURO CLONE', 'A');
INSERT INTO `marcas` VALUES ('2396', '2395', 'AIRTRAQ', 'A');
INSERT INTO `marcas` VALUES ('2397', '2396', 'GLASSCO', 'A');
INSERT INTO `marcas` VALUES ('2398', '2397', 'SPINREACT', 'A');
INSERT INTO `marcas` VALUES ('2399', '2398', 'PLUS SED', 'A');
INSERT INTO `marcas` VALUES ('2400', '2399', 'DIFFERENTIAL', 'A');
INSERT INTO `marcas` VALUES ('2401', '2400', 'DIRECTV', 'A');
INSERT INTO `marcas` VALUES ('2402', '2401', 'NORTH FACE', 'A');
INSERT INTO `marcas` VALUES ('2403', '2402', 'TSC', 'A');
INSERT INTO `marcas` VALUES ('2404', '2403', 'XMART', 'A');
INSERT INTO `marcas` VALUES ('2405', '2404', 'EMPI', 'A');
INSERT INTO `marcas` VALUES ('2406', '2405', 'FISNEL SCIENTIFIC', 'A');
INSERT INTO `marcas` VALUES ('2407', '2406', 'ANDINO', 'A');
INSERT INTO `marcas` VALUES ('2408', '2407', '3D SYSTEMS', 'A');
INSERT INTO `marcas` VALUES ('2409', '2408', 'KIPUR', 'A');
INSERT INTO `marcas` VALUES ('2410', '2409', 'CANNON', 'A');
INSERT INTO `marcas` VALUES ('2411', '2410', 'MICROLITE', 'A');
INSERT INTO `marcas` VALUES ('2412', '2411', 'PROMPT', 'A');
INSERT INTO `marcas` VALUES ('2413', '2412', 'NOVALINEA', 'A');
INSERT INTO `marcas` VALUES ('2414', '2413', 'BOWENS', 'A');
INSERT INTO `marcas` VALUES ('2415', '2414', 'COWBOY', 'A');
INSERT INTO `marcas` VALUES ('2416', '2415', 'AKAI PROFESIONAL', 'A');
INSERT INTO `marcas` VALUES ('2417', '2416', 'BESCOR', 'A');
INSERT INTO `marcas` VALUES ('2418', '2417', 'EPHOTO', 'A');
INSERT INTO `marcas` VALUES ('2419', '2418', 'ZOOM', 'A');
INSERT INTO `marcas` VALUES ('2420', '2419', 'RODE RONT', 'A');
INSERT INTO `marcas` VALUES ('2421', '2420', 'FUKE', 'A');
INSERT INTO `marcas` VALUES ('2422', '2421', 'LAMBDA PLUS', 'A');
INSERT INTO `marcas` VALUES ('2423', '2422', 'TCS', 'A');
INSERT INTO `marcas` VALUES ('2424', '2423', 'VERNIER CALIPER', 'A');
INSERT INTO `marcas` VALUES ('2425', '2424', 'FORZA', 'A');
INSERT INTO `marcas` VALUES ('2426', '2425', 'GASSCO', 'A');
INSERT INTO `marcas` VALUES ('2427', '2426', 'MAGIC BULLET', 'A');
INSERT INTO `marcas` VALUES ('2428', '2427', 'GO PRO', 'A');
INSERT INTO `marcas` VALUES ('2429', '2428', 'PHANTOM', 'A');
INSERT INTO `marcas` VALUES ('2430', '2429', 'WPI', 'A');
INSERT INTO `marcas` VALUES ('2431', '2430', 'ENERGIZER', 'A');
INSERT INTO `marcas` VALUES ('2432', '2431', 'MATEST', 'A');
INSERT INTO `marcas` VALUES ('2433', '2432', 'POWER STAGE', 'A');
INSERT INTO `marcas` VALUES ('2434', '2433', 'DSC', 'A');
INSERT INTO `marcas` VALUES ('2435', '2434', 'MC', 'A');
INSERT INTO `marcas` VALUES ('2436', '2435', 'KNF LAB', 'A');
INSERT INTO `marcas` VALUES ('2437', '2436', '3B', 'A');
INSERT INTO `marcas` VALUES ('2438', '2437', 'WERNER', 'A');
INSERT INTO `marcas` VALUES ('2439', '2438', 'TUTTNAVER', 'A');
INSERT INTO `marcas` VALUES ('2440', '2439', 'SPORTECH', 'A');
INSERT INTO `marcas` VALUES ('2441', '2440', 'FITNESS', 'A');
INSERT INTO `marcas` VALUES ('2442', '2441', 'BODY STRONG', 'A');
INSERT INTO `marcas` VALUES ('2443', '2442', 'RACING BIKE', 'A');
INSERT INTO `marcas` VALUES ('2444', '2443', 'LUMENERA', 'A');
INSERT INTO `marcas` VALUES ('2445', '2444', 'SOLDERING IRON', 'A');
INSERT INTO `marcas` VALUES ('2446', '2445', 'ASUS', 'A');
INSERT INTO `marcas` VALUES ('2447', '2446', 'EPONA MEDICAL', 'A');
INSERT INTO `marcas` VALUES ('2448', '2447', 'NEXLINK', 'A');
INSERT INTO `marcas` VALUES ('2449', '2448', 'STAGE', 'A');
INSERT INTO `marcas` VALUES ('2450', '2449', 'ASPIRE', 'A');
INSERT INTO `marcas` VALUES ('2451', '2450', 'EVANS', 'A');
INSERT INTO `marcas` VALUES ('2452', '2451', 'MOTION COMPUTING', 'A');
INSERT INTO `marcas` VALUES ('2453', '2452', 'AIO', 'A');
INSERT INTO `marcas` VALUES ('2454', '2453', 'TAMA', 'A');
INSERT INTO `marcas` VALUES ('2455', '2454', 'GRANDVIEW', 'A');
INSERT INTO `marcas` VALUES ('2456', '2455', 'WILLIAMS SOUND', 'A');
INSERT INTO `marcas` VALUES ('2457', '2456', 'VERA', 'A');
INSERT INTO `marcas` VALUES ('2458', '2457', 'KELI', 'A');
INSERT INTO `marcas` VALUES ('2459', '2458', 'SHIMADZU', 'A');
INSERT INTO `marcas` VALUES ('2460', '2459', 'LASKO', 'A');
INSERT INTO `marcas` VALUES ('2461', '2460', 'LACTATE PLUS', 'A');
INSERT INTO `marcas` VALUES ('2462', '2461', 'NORDIC TRACK', 'A');
INSERT INTO `marcas` VALUES ('2463', '2462', 'SCHILLER', 'A');
INSERT INTO `marcas` VALUES ('2464', '2463', 'HEMOCUE', 'A');
INSERT INTO `marcas` VALUES ('2465', '2464', 'OMAUS', 'A');
INSERT INTO `marcas` VALUES ('2466', '2465', 'RLINK', 'A');
INSERT INTO `marcas` VALUES ('2467', '2466', 'DITEC', 'A');
INSERT INTO `marcas` VALUES ('2468', '2467', 'TRULINK', 'A');
INSERT INTO `marcas` VALUES ('2469', '2468', 'LUXVISION', 'A');
INSERT INTO `marcas` VALUES ('2470', '2469', 'AGIVENT', 'A');
INSERT INTO `marcas` VALUES ('2471', '2470', 'TRIMBLE', 'A');
INSERT INTO `marcas` VALUES ('2472', '2471', 'AUDIO MASTER', 'A');
INSERT INTO `marcas` VALUES ('2473', '2472', 'SPROUT', 'A');
INSERT INTO `marcas` VALUES ('2474', '2473', 'LEXICOM', 'A');
INSERT INTO `marcas` VALUES ('2475', '2474', 'EASYONE PLUS', 'A');
INSERT INTO `marcas` VALUES ('2476', '2475', 'LONBON', 'A');
INSERT INTO `marcas` VALUES ('2477', '2476', 'UNIFIED NETWORK CONTROLLER', 'A');
INSERT INTO `marcas` VALUES ('2478', '2477', 'GAUMARD', 'A');
INSERT INTO `marcas` VALUES ('2479', '2478', 'COMPEX', 'A');
INSERT INTO `marcas` VALUES ('2480', '2479', 'UNC', 'A');
INSERT INTO `marcas` VALUES ('2481', '2480', 'GAUMARD', 'A');
INSERT INTO `marcas` VALUES ('2482', '2481', 'MAKITA', 'A');
INSERT INTO `marcas` VALUES ('2483', '2482', 'RONG LONG', 'A');
INSERT INTO `marcas` VALUES ('2484', '2483', 'PIXIE', 'A');
INSERT INTO `marcas` VALUES ('2485', '2484', 'BK', 'A');
INSERT INTO `marcas` VALUES ('2486', '2485', 'WILDLIFE', 'A');
INSERT INTO `marcas` VALUES ('2487', '2486', 'NIHOH KOHDEN', 'A');
INSERT INTO `marcas` VALUES ('2488', '2487', 'SECTRA', 'A');
INSERT INTO `marcas` VALUES ('2489', '2488', 'ONE TOUCH', 'A');
INSERT INTO `marcas` VALUES ('2490', '2489', 'MASTERFLEX', 'A');
INSERT INTO `marcas` VALUES ('2491', '2490', 'GW INSTEK', 'A');
INSERT INTO `marcas` VALUES ('2492', '2491', 'WATER DIAM', 'A');
INSERT INTO `marcas` VALUES ('2493', '2492', 'NEEWER', 'A');
INSERT INTO `marcas` VALUES ('2494', '2493', 'HERMLE', 'A');
INSERT INTO `marcas` VALUES ('2495', '2494', 'ROCKER', 'A');
INSERT INTO `marcas` VALUES ('2496', '2495', 'KOREX', 'A');
INSERT INTO `marcas` VALUES ('2497', '2496', 'LOCH', 'A');
INSERT INTO `marcas` VALUES ('2498', '2497', 'TEKNO', 'A');
INSERT INTO `marcas` VALUES ('2499', '2498', 'DRIVE', 'A');
INSERT INTO `marcas` VALUES ('2500', '2499', 'ACTIVE', 'A');
INSERT INTO `marcas` VALUES ('2501', '2500', 'PEARL PIPETTES', 'A');
INSERT INTO `marcas` VALUES ('2502', '2501', 'AIRGAS', 'A');
INSERT INTO `marcas` VALUES ('2503', '2502', 'VEKTOR', 'A');
INSERT INTO `marcas` VALUES ('2504', '2503', 'WATHOW', 'A');
INSERT INTO `marcas` VALUES ('2505', '2504', 'PLOTWATCHER PRO', 'A');
INSERT INTO `marcas` VALUES ('2506', '2505', 'GREISINGER', 'A');
INSERT INTO `marcas` VALUES ('2507', '2506', 'KOKEN', 'A');
INSERT INTO `marcas` VALUES ('2508', '2507', 'HEARTSINE', 'A');
INSERT INTO `marcas` VALUES ('2509', '2508', 'JOSON-CARE', 'A');
INSERT INTO `marcas` VALUES ('2510', '2509', 'BLT', 'A');
INSERT INTO `marcas` VALUES ('2511', '2510', 'WALL MOUNT', 'A');
INSERT INTO `marcas` VALUES ('2512', '2511', 'DAIHATSU', 'A');
INSERT INTO `marcas` VALUES ('2513', '2512', 'ADE', 'A');
INSERT INTO `marcas` VALUES ('2514', '2513', 'LIMBS&THINGS', 'A');
INSERT INTO `marcas` VALUES ('2515', '2514', 'HID', 'A');
INSERT INTO `marcas` VALUES ('2516', '2515', 'ALIENWARE', 'A');
INSERT INTO `marcas` VALUES ('2517', '2516', 'LOCH', 'A');
INSERT INTO `marcas` VALUES ('2518', '2517', 'NEEDTEK', 'A');
INSERT INTO `marcas` VALUES ('2519', '2518', 'ROSCOE MEDICAL', 'A');
INSERT INTO `marcas` VALUES ('2520', '2519', 'CALCULATING', 'A');
INSERT INTO `marcas` VALUES ('2521', '2520', 'IP', 'A');
INSERT INTO `marcas` VALUES ('2522', '2521', 'CONRAD', 'A');
INSERT INTO `marcas` VALUES ('2523', '2522', 'LICOR', 'A');
INSERT INTO `marcas` VALUES ('2524', '2523', 'HHD', 'A');
INSERT INTO `marcas` VALUES ('2525', '2524', 'AXYGEN', 'A');
INSERT INTO `marcas` VALUES ('2526', '2525', 'DANTE', 'A');
INSERT INTO `marcas` VALUES ('2527', '2526', 'ERLAB', 'A');
INSERT INTO `marcas` VALUES ('2528', '2527', 'HUAWEI', 'A');
INSERT INTO `marcas` VALUES ('2529', '2528', 'TOPSCIEN', 'A');
INSERT INTO `marcas` VALUES ('2530', '2529', 'DELLEMC', 'A');
INSERT INTO `marcas` VALUES ('2531', '2530', 'DONALDSON TORIT', 'A');
INSERT INTO `marcas` VALUES ('2532', '2531', 'RAYTO', 'A');
INSERT INTO `marcas` VALUES ('2533', '2532', 'ZOMEI', 'A');
INSERT INTO `marcas` VALUES ('2534', '2533', 'MARIENFELD', 'A');
INSERT INTO `marcas` VALUES ('2535', '2534', 'INOX', 'A');
INSERT INTO `marcas` VALUES ('2536', '2535', 'TELLYES', 'A');
INSERT INTO `marcas` VALUES ('2537', '2536', 'APPIED-BIOSYSTEM', 'A');
INSERT INTO `marcas` VALUES ('2538', '2537', 'EASY CAST', 'A');
INSERT INTO `marcas` VALUES ('2539', '2538', 'HAMILTON BEACH', 'A');
INSERT INTO `marcas` VALUES ('2540', '2539', 'MET ONE', 'A');
INSERT INTO `marcas` VALUES ('2541', '2540', 'VORTEXER', 'A');
INSERT INTO `marcas` VALUES ('2542', '2541', 'PIPETTE', 'A');
INSERT INTO `marcas` VALUES ('2543', '2542', 'DINKO', 'A');
INSERT INTO `marcas` VALUES ('2544', '2543', 'SILICON POWER', 'A');
INSERT INTO `marcas` VALUES ('2545', '2544', 'LAB SCIENTIFIC', 'A');
INSERT INTO `marcas` VALUES ('2546', '2545', 'DIGOS', 'A');
INSERT INTO `marcas` VALUES ('2547', '2546', 'HOME CUE', 'A');
INSERT INTO `marcas` VALUES ('2548', '2547', 'OPC', 'A');
INSERT INTO `marcas` VALUES ('2549', '2548', 'ZOTEK', 'A');
INSERT INTO `marcas` VALUES ('2550', '2549', 'DURONIC', 'A');
INSERT INTO `marcas` VALUES ('2551', '2550', 'ATC', 'A');
INSERT INTO `marcas` VALUES ('2552', '2551', 'LARON', 'A');
INSERT INTO `marcas` VALUES ('2553', '2552', 'SHINSLON', 'A');
INSERT INTO `marcas` VALUES ('2554', '2553', 'ELC', 'A');
INSERT INTO `marcas` VALUES ('2672', '12', 'prueba', null);

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id_menu` int(255) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `icono` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '1', 'Home', 'home.php', '<i class=\'fas fa-home\'></i>');
INSERT INTO `menu` VALUES ('2', '2', 'Empresa', '', '<i class=\'fas fa-database\'></i>');
INSERT INTO `menu` VALUES ('3', '2.10', 'Datos Empresa', 'empresa.php', '');
INSERT INTO `menu` VALUES ('4', '2.20', 'Usuarios', 'usuarios.php', '');
INSERT INTO `menu` VALUES ('7', '6', 'Punto venta', '', '<i class=\'fas fa-shopping-bag\'></i>');
INSERT INTO `menu` VALUES ('8', '6.20', 'Facturar', 'cliente_pedido.php', null);
INSERT INTO `menu` VALUES ('13', '2.30', 'Accesos', 'accesos.php', '');
INSERT INTO `menu` VALUES ('17', '4', 'Articulo', '', '<i class=\'fas fa-box\'></i>');
INSERT INTO `menu` VALUES ('26', '4.10', 'Lista de articulos', 'lista_articulos.php', null);
INSERT INTO `menu` VALUES ('36', '2.40', 'Modulos y paginas', 'modulos_paginas.php', null);
INSERT INTO `menu` VALUES ('37', '4.20', 'Parametros de articulo', 'parametros_articulo.php', '');
INSERT INTO `menu` VALUES ('38', '5', 'Documentos electronicos', '', '<i class=\'fas fa-file\'></i>');
INSERT INTO `menu` VALUES ('39', '5.10', 'Kardex', 'kardex.php', null);
INSERT INTO `menu` VALUES ('45', '5.30', 'Lista de facturas', 'lista_facturas.php', null);
INSERT INTO `menu` VALUES ('46', '5.40', 'Lista de retenciones', 'lista_retenciones.php', null);
INSERT INTO `menu` VALUES ('47', '5.50', 'Lista nota de credito', 'lista_nota_credito.php', null);
INSERT INTO `menu` VALUES ('48', '5.60', 'lista guias de remision', 'lista_guia.php', null);
INSERT INTO `menu` VALUES ('49', '3', 'Cliente -  Proveedor', '', '<i class=\'fas fa-user\'></i>');
INSERT INTO `menu` VALUES ('51', '3.10', 'Clientes', 'cliente.php', null);
INSERT INTO `menu` VALUES ('52', '3.20', 'Proveedores', 'proveedores.php', null);
INSERT INTO `menu` VALUES ('53', '7', 'Carga de datos', '', '<i class=\'fas fa-database\'></i>');
INSERT INTO `menu` VALUES ('54', '7.10', 'Subir datos', 'subir_datos.php', null);
INSERT INTO `menu` VALUES ('55', '2.50', 'Secuenciales', 'secuenciales.php', null);

-- ----------------------------
-- Table structure for mesa
-- ----------------------------
DROP TABLE IF EXISTS `mesa`;
CREATE TABLE `mesa` (
  `id_mesa` int(255) NOT NULL AUTO_INCREMENT,
  `producto` varchar(255) DEFAULT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `precio_uni` varchar(255) DEFAULT NULL,
  `porc_descuento` varchar(255) DEFAULT '0',
  `descuento` varchar(255) DEFAULT '0',
  `iva` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  `porc_iva` decimal(8,4) DEFAULT NULL,
  `Serie_No` varchar(100) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT NULL,
  `mesa` varchar(255) DEFAULT NULL,
  `servido` int(1) DEFAULT 0,
  `empresa` int(11) DEFAULT NULL,
  `APP_CLIENTE` varchar(13) DEFAULT '',
  `llevar` bit(1) DEFAULT b'0',
  `procesar` bit(1) DEFAULT b'0',
  `facturado` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id_mesa`),
  KEY `FK_PRODUCTO_LINEA` (`referencia`) USING BTREE,
  KEY `FK_EMPRESA MESA` (`empresa`),
  CONSTRAINT `mesa_ibfk_1` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `mesa_ibfk_2` FOREIGN KEY (`referencia`) REFERENCES `productos` (`referencia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=426 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of mesa
-- ----------------------------

-- ----------------------------
-- Table structure for nota_credito
-- ----------------------------
DROP TABLE IF EXISTS `nota_credito`;
CREATE TABLE `nota_credito` (
  `id_nota_credito` int(11) NOT NULL AUTO_INCREMENT,
  `numero_nc` varchar(255) DEFAULT NULL,
  `fecha_nc` date DEFAULT NULL,
  `serie_nc` varchar(255) DEFAULT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  `autorizacion_nc` varchar(255) DEFAULT NULL,
  `fecha_doc` date DEFAULT NULL,
  `serie_doc` varchar(255) DEFAULT NULL,
  `numero_doc` varchar(255) DEFAULT NULL,
  `autorizacion_doc` varchar(255) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `empresa` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `porc_iva` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_nota_credito`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of nota_credito
-- ----------------------------
INSERT INTO `nota_credito` VALUES ('2', '3', '2023-03-24', '001-002', '41', '2403202304070216417900110010020000000031234567811', '2023-03-24', '001-009', '1', '987654345676543', 'dewvolucion de mercaderi', '6', 'AN', '0.12');
INSERT INTO `nota_credito` VALUES ('4', '5', '2023-03-24', '001-002', '43', '2403202304070216417900110010020000000051234567810', '2023-03-25', '001-002', '12', '', 'mo', '6', 'R', '0.12');
INSERT INTO `nota_credito` VALUES ('5', '6', '2023-03-24', '001-002', '43', '2403202304070216417900110010020000000061234567816', '2023-03-24', '001-002', '12', '', 'devolucion ', '6', 'A', '0.12');
INSERT INTO `nota_credito` VALUES ('6', '7', '2023-03-24', '001-002', '62', '0702164179001', '2023-03-24', '-', '', '', '', '6', 'P', '0.12');
INSERT INTO `nota_credito` VALUES ('7', '1', '2023-04-11', '001-001', '42', '1104202304070216417900110010010000000011234567811', '2023-04-11', '001-001', '2', '1234567890', 'devolucion', '6', 'A', '0.12');
INSERT INTO `nota_credito` VALUES ('9', '1', '2023-04-18', '001-003', '88', '1804202304179268077800120010030000000011234567811', '2023-04-18', '001-003', '000000009', '01804202301179268077800120010030000000091234567816', 'FUMIGACION PLACAS RAB4339', '8', 'A', '0.12');
INSERT INTO `nota_credito` VALUES ('10', '2', '2023-08-15', '001-003', '88', '1508202304179268077800120010030000000021234567819', '2023-08-15', '001-003', '000000052', '1508202301179268077800120010030000000521234567812', 'DESCUENTO', '8', 'AN', '0.12');
INSERT INTO `nota_credito` VALUES ('11', '3', '2023-08-22', '001-003', '88', '2208202304179268077800120010030000000031234567814', '2023-08-22', '001-003', '000000041', '0407202301179268077800120010030000000401234567812', 'DEVOLUCIÓN POR VIAJES NO REALIZADOS', '8', 'A', '0.12');
INSERT INTO `nota_credito` VALUES ('12', '4', '2023-08-22', '001-003', '88', '2208202304179268077800120010030000000041234567811', '2023-08-22', '001-003', '000000041', '0407202301179268077800120010030000000401234567812', 'DEVOLUCION POR VIAJE NO REALIZADO', '8', 'A', '0.12');
INSERT INTO `nota_credito` VALUES ('13', '5', '2023-08-28', '001-003', '88', '2808202304179268077800120010030000000051234567812', '2023-08-28', '001-003', '000000059', '2808202301179268077800120010030000000591234567818', 'DESCUENTO', '8', 'AN', '0.12');
INSERT INTO `nota_credito` VALUES ('14', '6', '2023-08-28', '001-003', '88', '2808202304179268077800120010030000000061234567818', '2023-08-28', '001-003', '000000059', '2808202301179268077800120010030000000591234567818', 'Descuento', '8', 'A', '0.12');

-- ----------------------------
-- Table structure for notificaciones
-- ----------------------------
DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE `notificaciones` (
  `id_noti` int(255) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `cuerpo` varchar(255) DEFAULT NULL,
  `empresa` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `leido` int(1) DEFAULT 0,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_noti`),
  KEY `FK_USUARIO_NOTIFICACION` (`usuario`) USING BTREE,
  KEY `FK_EMPRESA_NOTIFICACION` (`empresa`) USING BTREE,
  CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `notificaciones_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of notificaciones
-- ----------------------------

-- ----------------------------
-- Table structure for pagos_caja
-- ----------------------------
DROP TABLE IF EXISTS `pagos_caja`;
CREATE TABLE `pagos_caja` (
  `id_pagos` int(255) NOT NULL AUTO_INCREMENT,
  `valor_pago` float DEFAULT NULL,
  `id_factura` int(255) DEFAULT NULL,
  `id_forma_pago` int(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `mesa` varchar(11) DEFAULT '1',
  `detalle` varchar(255) DEFAULT NULL,
  `inicial` bit(1) DEFAULT b'0',
  `estado` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id_pagos`),
  KEY `FK_FACTURA_PAGOS` (`id_factura`) USING BTREE,
  KEY `FK_FORMA_PAGOS_PAGOS` (`id_forma_pago`) USING BTREE,
  CONSTRAINT `pagos_caja_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `facturas` (`id_factura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pagos_caja_ibfk_2` FOREIGN KEY (`id_forma_pago`) REFERENCES `forma_pago` (`id_forma_pago`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of pagos_caja
-- ----------------------------
INSERT INTO `pagos_caja` VALUES ('180', '1', null, null, '2022-10-04', '1', 'INICIO DE CAJA', '', '\0');

-- ----------------------------
-- Table structure for porcentaje_iva
-- ----------------------------
DROP TABLE IF EXISTS `porcentaje_iva`;
CREATE TABLE `porcentaje_iva` (
  `id_porc_iva` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) DEFAULT NULL,
  `porcentaje` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  PRIMARY KEY (`id_porc_iva`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of porcentaje_iva
-- ----------------------------
INSERT INTO `porcentaje_iva` VALUES ('1', '0', '0', '2024-01-01', '2025-12-31');
INSERT INTO `porcentaje_iva` VALUES ('2', '2', '12', '2024-01-01', '2025-12-31');
INSERT INTO `porcentaje_iva` VALUES ('3', '3', '14', '2024-01-01', '2025-12-31');
INSERT INTO `porcentaje_iva` VALUES ('4', '4', '15', '2024-01-01', '2025-12-31');

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id_productos` int(255) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio_uni` decimal(8,4) DEFAULT NULL,
  `iva` int(1) DEFAULT 0,
  `stock` varchar(255) DEFAULT NULL,
  `servicio` bit(1) DEFAULT b'0',
  `inventario` int(1) DEFAULT 0,
  `producto_terminado` bit(1) DEFAULT b'0',
  `peso` decimal(8,5) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `codigo_aux` varchar(255) DEFAULT '0',
  `codigo_bar` varchar(255) DEFAULT '0',
  `id_empresa` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `marca` int(11) DEFAULT NULL,
  `modelo` varchar(11) DEFAULT '',
  `uni_medida` varchar(50) DEFAULT 'UNI',
  `color` int(11) DEFAULT NULL,
  `genero` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `sucursal` int(11) DEFAULT NULL,
  `RFID` varchar(255) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `descripcion2` varchar(255) DEFAULT NULL,
  `max` int(255) DEFAULT 0,
  `min` int(255) DEFAULT 0,
  `serie_pro` varchar(100) DEFAULT '',
  `promocion` bit(1) DEFAULT b'0',
  `materia_prima` bit(1) DEFAULT b'0',
  `paquetes` varchar(255) DEFAULT NULL,
  `xpaquetes` varchar(255) DEFAULT NULL,
  `sueltos` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_productos`),
  KEY `referencia` (`referencia`) USING BTREE,
  KEY `FK_EMPRESA_PRODUCTO` (`id_empresa`) USING BTREE,
  KEY `FK_CATEGORIA_PRODUCTO` (`categoria`) USING BTREE,
  KEY `FK_MARCA_PROPDUCTO` (`marca`) USING BTREE,
  KEY `FK_GENERO_PRODUCTO` (`genero`) USING BTREE,
  KEY `FK_COLOR_PRODUCTO` (`color`) USING BTREE,
  KEY `FK_ESTADO_PRODUCTO` (`estado`) USING BTREE,
  KEY `FK_SUCURSAL_PRODUCTO` (`sucursal`) USING BTREE,
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`color`) REFERENCES `colores` (`ID_COLORES`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `productos_ibfk_4` FOREIGN KEY (`estado`) REFERENCES `estado` (`ID_ESTADO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `productos_ibfk_5` FOREIGN KEY (`genero`) REFERENCES `genero` (`ID_GENERO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `productos_ibfk_6` FOREIGN KEY (`marca`) REFERENCES `marcas` (`ID_MARCA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `productos_ibfk_7` FOREIGN KEY (`sucursal`) REFERENCES `sucursales` (`id_sucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1128 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES ('36', '01.01.36', 'Queso', '100.0000', '0', '100', '\0', '1', '', '0.00000', '15', '0', '111111111', '6', '../img/articulos/product-10.jpg', null, null, 'UNI', null, null, null, '8', null, '2022-03-26', null, '100', '10', null, '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('37', '01.01.37', 'Pollo  1', '150.0000', '0', '100', '\0', '1', '', '0.00000', '15', '0', '111111111', '6', '../img/articulos/product-10.jpg', '1', '.', 'UNI', '1', '1', '3', '8', '.', '2022-03-26', '.', '100', '10', '.', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('105', '10.23.25', 'servicio de trasporte', '1.5000', '1', '', '', '0', '\0', '0.00000', '14', '', '', '6', null, '1', '', '', '1', '1', '1', '8', '', '2022-10-19', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('107', '01.01.001', 'SERVICIOS PROFESIONALES', '0.0000', '1', '', '\0', '0', '', '0.00000', '16', '', '', '7', null, '1', '', '', '1', '1', '1', '9', '', '2023-01-05', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('108', '01.01.002', 'SOPORTE EN DESARROLLO PHP Y ENVIO MASIVO DE PI', '0.0000', '1', '', '\0', '0', '', '0.00000', '16', '', '', '7', null, '1', '', '', '1', '1', '1', '9', '', '2023-01-05', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('109', '01.01.03', 'Horas de soporte de infraestructura.(Levantamiento de nuevo host con 1 VM administrado por Hyper-V) ', '44.7000', '1', '', '\0', '0', '', '0.00000', '16', '', '', '7', null, '1', '', '', '1', '1', '1', '9', '', '2023-01-26', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('110', '01.01.004', 'Envio de correos masivos (Enero)', '107.1400', '1', '', '\0', '0', '', '0.00000', '16', '', '', '7', null, '1', '', '', '1', '1', '1', '9', '', '2023-02-08', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('113', '01.01.005', 'Desarrollo', '0.0000', '1', '', '\0', '0', '', '0.00000', '16', '', '', '7', null, '1', '', '', '1', '1', '1', '9', '', '2023-02-27', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('114', '01.01.006', 'mantenimiento', '0.0000', '0', '', '\0', '0', '', '0.00000', '16', '', '', '7', null, '1', '', '', '1', '1', '1', '9', '', '2023-03-03', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('115', '001.001', 'Servicios prueba', '0.0000', '0', '', '\0', '0', '', '0.00000', '17', '', '', '8', null, '1', '', '', '1', '1', '1', '10', '', '2023-04-03', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('119', '001.001', 'prueba 1', '0.0000', '0', '', '\0', '0', '', '0.00000', '17', '', '', '30', null, '1', '', '', '1', '1', '1', '23', '', '2023-04-11', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('121', '2', 'SERVICIO DE TRANSPORTE LOS DIAS 14 Y 26 DE MARZO DE 2023', '81.0000', '0', '', '\0', '0', '', '0.00000', '17', '', '', '8', null, '1', '', '', '8', '1', '1', '10', '', '2023-04-07', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('124', '3', 'SERVICIO DE TRANSPORTE DEL DÍA 14 DE MARZO DE 2022 ', '40.0000', '0', '', '\0', '0', '', '0.00000', '17', '', '', '8', null, '1', '', '', '8', '1', '1', '10', '', '2023-04-07', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('125', '1', 'FUMIGACIÓN NOVIEMBRE', '13.5000', '0', '', '\0', '0', '', '0.00000', '18', '', '', '8', null, '1', '', '', '1', '1', '1', '10', '', '2023-04-18', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('581', '1', 'OUTSORCING', '350.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('582', '2', 'SERVICIOS PRESTADOS - MANTENIENTO DE SERVIDOR', '150.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('583', '3', 'CONFIGURACIÓN DE VPN', '80.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('584', '4', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '70.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('585', '5', 'SISTEMA CONTABLE SMARTCONTROL', '7000.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('586', '6', 'SPECTRA CENTRAL 4 ZONAS EXP. 32 2 PARTIC', '30.6300', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('587', '7', 'TECLADO LED CABLEADO DE 10 ZONAS HORIZON', '34.0800', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('588', '8', 'DISCO DURO 1TB INTELLI-POWER 24-7 CACHE-64MB SATA 6.0GBJS 3.5INC. PURPLE', '72.6900', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('589', '9', 'CONFIGURACIÓN TERMINAL SERVER', '200.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('590', '10', 'CONFIGURACIÓN DE ACTIVE DIRECTORY', '150.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('591', '11', 'UPS 1KVA ON LINE 110V', '310.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('592', '12', 'LICENCIA KASPERSKY CLOUD', '475.9200', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('593', '13', 'LICENCIA ANTIVIRUS SERVER', '168.4400', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('594', '14', 'AM04 POS RF SINGLE EAS ALUMINUM ANTENNA', '892.0800', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('595', '15', 'DYN-STHRFN-CASE DYNAPOS RF HARD TAG', '159.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('596', '16', 'DYN-STDDU DYNAPOS MAGNETIC DETACHER', '51.4100', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('597', '17', 'IMPRESORA TMU220 USB', '303.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('598', '18', 'NVR 16CH CAPACIDAD 40MB 2HDD', '133.8600', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('599', '19', 'BATERIA RECARGABLE 12VDC 7AMP', '16.7400', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('600', '20', 'LICENCIA INTERFAZ BIOMÉTRICO SOYAL A SQL', '910.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('601', '21', 'DISCO DURO 1TB 5400RPM CACHE-8MB SATA', '150.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('602', '22', 'MAT-1236_ETIQUETA S/IMPRESIÓN  TERMICO PROTEGIDO  TROQUELADA AVANCE 25 MM ANCHO 32 MM NUCLEO 1\\u201d', '19.5600', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('603', '23', 'MAT-1236_ETIQUETA S/IMPRESIÓN  TERMICO PROTEGIDO  TROQUELADA AVANCE 25 MM ANCHO 32 MM NUCLEO 1\\u201d', '12.4200', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('604', '24', 'REPARACION NOTEBOOK', '120.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('605', '25', 'TONER NEGRO HP 2354', '42.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('606', '26', 'CARGA TONER N-2345', '32.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('607', '27', 'QPCOM SWITCH  8 PUERTOS 10/100/1000 MBPS', '40.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('608', '28', 'IMPRESORA ZEBRA GC420', '500.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('609', '29', 'KIT 5 CAMARAS DVR + 4 CAM 1080', '692.1600', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('610', '30', 'CONFIGURACION Y PUESTA EN MARCHA', '490.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('611', '31', 'DIMM KINGSTON 4GB DDR4 PC-2133 NON ECC', '85.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('612', '32', 'MBO GIGABYTE H110M-H DDR4 LGA1151 I7 V S R HDMI USB3.0 PCI-EX', '96.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('613', '33', 'PROC. INTEL CORE I5-6400 - 2.7GHZ - 6MB - 4NUCLEOS - DDR4-1866/2133', '282.7500', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('614', '34', 'FUENTE DE PODER 12V Y MATERIALES', '17.5000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('615', '35', 'DISCO DURO 1 TB. 3', '88.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('616', '36', 'CABLR UTP CAT6', '145.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('617', '37', 'HUBBELL PREMISE SJ6A24B ASCENT CATEGORY 6A RJ45 JACK', '8.9000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('618', '38', 'CENTRAL IPBX UCM6204', '523.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('619', '39', 'TELEFONO IP GXP-1628', '54.1500', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('620', '40', 'GXP-1625 / TELEFONO IP', '58.1000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('621', '41', 'ETH. SWITCH POE QPCOM 16PTOS 2SFP QP-1602PEW', '422.4600', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('622', '42', 'ETH. SWITCH QPCOM 16PTOS 10/100/1000 RACK QP-1660R ', '156.8000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('623', '43', 'UNIFI SECURITY GATEWAY', '215.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('624', '44', 'ORGANIZADOR 1 UR', '26.8800', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('625', '45', 'RACK 3U', '42.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('626', '46', 'PUNTOS DE RED Y MATERIALES', '60.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('627', '47', 'INSTALACIÓN Y CONFIGURACIÓN CENTRAL IP', '120.9600', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('628', '48', 'CONFIGURACION E INSTALACION', '240.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('629', '49', 'CABLES USB PARALELO', '18.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('630', '50', 'PATCH PANEL MODULAR PARA  CAT5E Y CAT6 24 PTOS', '21.0200', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('631', '51', 'UNIFI\\u00ae\\u00a0AC APS ', '179.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('632', '52', 'GAC 2500 /  TELEFONO IP AUDIOCONFERENCIA', '526.4000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('633', '53', 'TELEFONO IP GXP-2140', '142.8000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('634', '54', 'GXP-2200EXT / MODULO DE EXTENCIONES', '137.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('635', '55', 'ESTACIÓN BASE DP720', '67.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('636', '56', 'ESTACIÓN BASE DP750', '68.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('637', '57', 'GASTOS DE MOVILIZACION', '245.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('638', '58', 'CONFIGURACIÓN INICIAL SYNOLOGY ', '287.2800', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('639', '59', 'GABINETE   COMPACTO MONOBLOQUE', '157.2300', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('640', '60', 'BANDEJA  ESTANDAR  2 UR.   19\"', '20.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('641', '61', 'MULTITOMA HORIZONTAL 19\"     4 TOMAS DOBLES', '34.9900', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('642', '62', 'ORGANIZADOR CON CANALETA', '20.7500', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('643', '63', 'PATCH CORD 3FT CAT 6 AZUL QUEST', '3.1500', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('644', '64', 'ETH. PANEL CAT6 24 PUERTOS QP-P24 WITH ETH. KEYSTONE JACK SERIE', '21.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('645', '65', 'SERVICIO TÉCNICO / LAPTOPS', '76.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('646', '66', 'TELÉFONO INALAMBRICO KX-TGC222S PANASONIC', '146.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('647', '67', 'MANTENIMIENTO DE CAMARAS', '38.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('648', '68', 'CELULAR SAMSUNG GALAXY J7PRIME 4G-LTE 3GB 5.5INC 16GB MICROSD ADROID WHITE', '360.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('649', '69', 'CENTRAL UCM 6208 IPBX', '803.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('650', '70', 'HOSTING INCONTROL', '20.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('651', '71', 'INSTALACION Y CALIBRACION', '49.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('652', '72', 'DISCO DURO SSD 480GB', '61.8200', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('653', '73', 'KASPERSKY TOTAL SECURITY 1 AÑO', '37.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('654', '74', 'SITIO WEB DINAMICO', '1000.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('655', '75', 'BRAZO MECANICO CIERRA PUERTA YALE', '65.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('656', '76', 'UNIFI CONTROLLER CLOUD KEY', '212.8000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('657', '77', 'CONFIGURACIÓN CLOUD SYSTEM UNIFI AP', '210.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('658', '78', 'CENTRAL TELEFÓNICA PANASONIC KX-TES824', '350.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('659', '79', 'CAMARASTIPO BULLET IR 1080P LENTE FIJO 3.6MM IP66', '59.6400', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('660', '80', 'CAMARA IP TIPO BULLET IR 3 MEGAPIXELES LENTE FIJO 4.0MM IP66', '180.1800', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('661', '81', 'DVR DIGITAL SISTEMA TRIBIDO PARA 8 CANALES COMPRESIÓN 264 /1TB HD', '280.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('662', '82', 'TRANSRECEPTOR TURBO HD DE VIDEO PASIVO DE UN CANAL', '6.8600', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('663', '83', 'ADAPTADORES SWITCHING 12VDC 1.0AMP', '7.8400', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('664', '84', 'KIT DE CAMARAS ANALGOGICAS', '266.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('665', '85', 'CABLE HDMI 15MTS + ADAPTADOR VGA-HDMI', '63.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('666', '86', 'MATERIALES ELECTRICOS', '240.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('667', '87', 'LECTOR BIOMÉTRICO ID FLEX', '243.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('668', '88', 'LECTOR SOYAL AR-725E-M', '203.7000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('669', '89', 'FUENTE DE PODER', '117.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('670', '90', 'ANTENA UNIFI LR WIFI LR', '119.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('671', '91', 'SERVICIO DE CLOUT CALLING', '245.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('672', '92', 'IMPORTACIÓN Y CONFIGURACIÓN SISTEMA MAILCHIMP', '14.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('673', '93', 'CREACIÓN Y CUSTOMIZACIÓN DE CAMPAÑAS / PLANTILLAS', '21.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('674', '94', 'BZL PARA MONAJE DE CERRADURA', '32.3400', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('675', '95', 'CERRADURA ELECTROMAGNÉTICA 600LBS Y TEMPORIZADOR INTEGRADO', '66.6400', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('676', '96', 'PANEL DE ALARMAS 4 ZONAS', '34.8000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('677', '97', 'TECLADO LED CABLEADO DE 10 ZONAS HORIZONTAL', '38.7200', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('678', '98', 'OUTSORCING DE TALENTO', '1898.4000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('679', '99', 'UPGRADE Y PUESTA EN MARCHA 10 LIC MONITORE REMOTO', '3500.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('680', '100', 'PAGO MENSUAL LEASING', '4202.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('681', '101', 'SATA SSD SOLIDDRIVE 480GB', '90.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('682', '102', 'MEMORIAS DE 4GB ', '80.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('683', '103', 'SSD SATA 1GB ENTERPRISE FOR SERVER', '385.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('684', '104', 'SYNOLOGY DISKSTATION DS1621+ 6-BAY NAS', '2184.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('685', '105', 'DISCO DURO  INTERNO - RED PRO - 10TB', '661.0200', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('686', '106', 'UNIFI SWITCH 16 PUERTOS POE', '566.3800', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('687', '107', 'ROUTER UNIFI SECURITY GATEWAY PRO4 ', '512.2100', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('688', '108', 'PATCH CORD 7 PIES', '5.7500', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('689', '109', 'UNIFI SWITCH 24 PUERTOS', '599.8700', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('690', '110', 'CANALETA EMT Y ANCLAJES', '30.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('691', '111', 'SISTEMA DE AMPLIFICACION', '631.2500', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('692', '112', 'CAMARA IP TUBO 2 MP', '56.2500', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('693', '113', 'NVR 8CH POE ', '181.2500', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('694', '114', 'TELEFONO IP 2 CUENTA SIP', '46.2500', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('695', '115', 'UPS ONLINE DE 2KVA', '850.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('696', '116', 'Tarjetas de Proximidad', '2.1500', '1', '', '\0', '0', '', '0.00000', '19', '0', '0', '34', '../img/articulos/116.jpeg', '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('697', '117', 'SWITCH POE 8 PUERTOS', '85.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('698', '118', 'PORTERO ELECTRICO', '206.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('699', '119', 'UNIFI DE 24 PUERTOS US-24 DE UBIQUITI POE', '374.1900', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('700', '120', 'TELEFONO IP INALAMBRICO + BASE CELULAR', '145.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('701', '121', 'RACK DE PISO', '75.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('702', '122', 'BRAZO HIDRAULICO', '35.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('703', '123', 'DISCO DURO DE 4TB NAS', '272.5000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('704', '124', 'GASTOS BIOSEGURIDAD', '50.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('705', '125', 'CARGADOR DE PORTATIL', '55.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('706', '126', 'CABLEADO Y MATERIALES', '80.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('707', '127', 'SYNOLOGY 4-CAMERA LICENSE KEY', '298.4700', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('708', '128', 'SYNOLOGY 8-CAMERA LICENSE KEY', '524.1500', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('709', '129', 'CAMARA ANALOGA FULL COLOR', '63.5300', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('710', '130', 'CAMARA DOMO 5MP', '60.2800', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('711', '131', 'FUENTES DE PODER PULPO', '26.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('712', '132', 'DISCO DURO PURPLE 2TB', '168.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('713', '133', 'UPS INTERACTIVA1000VA', '85.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('714', '134', 'SOPORTE THE-HUB', '100.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('715', '135', 'DVR DE 4 CANALES', '65.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('716', '136', 'GASTOS DE EDUCADORAS', '520.0000', '1', '', '\0', '0', '', '0.00000', '19', '0', '0', '34', null, '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('717', '137', 'SYNOLOGY RS2418+ RACKSTATION 12-BAY NAS ENCLOSURE', '4368.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('718', '138', 'SYNOLOGY RAIL KIT RKS1317', '275.1800', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('719', '139', 'SYNOLOGY M2D20 M.2 ADAPTER CARD', '247.5200', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('720', '140', 'SAMSUNG 1TB 970 EVO PLUS NVME M.2 INTERNAL SSD', '291.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('721', '141', 'HD WD 10TB -7200RPM - NAS', '661.0200', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('722', '142', 'MONTAJE DE RACK', '120.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('723', '143', 'BATER\\u00cdAS SECAS (PARA UPS). 12 V. / 9 AH.', '32.0300', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('724', '144', 'SO-DIMM 8GB DDR4', '88.8700', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('725', '145', 'GASTO EN GIRAS', '10.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('726', '146', 'UPS 750W OFF LINE', '40.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('727', '147', 'TELEFONO IP GRP2602P', '52.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('728', '148', 'ELABORACION DE FOTOGRAFIAS Y VIDEOS', '100.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('729', '149', 'LICENCIA ACCESS MSI COMUNICATOR APUDATA', '347.7600', '1', '', '\0', '0', '', '0.00000', '20', '0', '0', '34', null, '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('730', '150', 'WEBCAM 1080 ', '35.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('731', '151', 'HEATPHONE SIMPLE', '12.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('732', '152', 'LECTOR WIEGAND ESCLAVO', '50.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('733', '153', 'DISCO SSD 980MB', '120.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('734', '154', 'NOT. HP PROBOOK 440 G7 ', '1127.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('735', '155', 'SISTEMA DE SEGURIDAD PARA TALLER', '358.0700', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('736', '156', 'LLAVERO DE PROXIMIDAD', '3.5000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('737', '157', 'UNIDAD USB DE 32GB', '25.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('738', '158', 'DIMM MEMORI ECC 16GB', '292.3200', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('739', '159', 'NOT. DELL INSPIRON 3511 I5', '423.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('740', '160', 'HD  WD 14 TB NAS 5400 RPM', '620.3500', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('741', '161', 'NVR 4 CANALES SIMPLE', '119.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('742', '162', 'NOT. DELL VOSTRO 3400', '963.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('743', '163', 'ETIQUETA POLIPROPILENO', '6.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('744', '164', 'ETIQUETAS RFID 60*25 METAL', '890.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('745', '165', 'UNIFI AP-AC 6 PRO', '245.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('746', '166', 'UNIFI SWITCH 16 PUERTOS ', '415.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('747', '167', 'SOPORTE SISTEMA SMARTLAB', '35.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('748', '168', 'CAPACITACION SISTEMA INCONTROL', '35.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('749', '169', 'SISTEMA DE CABLEADO - MATERIAL', '550.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('750', '170', 'SISTEMA DE AUDIO', '900.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('751', '171', 'SISTEMA DE CCTV', '635.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('752', '172', 'DISEÑ Y MANO DE OBRA', '850.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('753', '173', 'SWICH 16 PUERTOS SIMPLE', '89.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('754', '174', 'UPS ONLINE 3KVA', '466.8200', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('755', '175', 'UNIFI SWITCH 48 PUERTOS', '1152.0400', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('756', '176', 'BATERIA DE NOTEBOOK', '90.7200', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('757', '177', 'SISTEMA DE CABLEADO - MATERIAL', '708.4000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('758', '178', 'SISTEMA DE AUDIO', '1159.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('759', '179', 'SISTEMA DE CCTV', '817.8800', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('760', '180', 'DISEÑ Y MANO DE OBRA', '1094.8000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('761', '181', 'SWICH 16 PUERTOS SIMPLE', '114.6300', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('762', '182', 'OUTSORCING DE TALENTO', '1800.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('763', '183', 'CENTRAL IP 6304', '698.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('764', '184', 'PANTALLA PORTATIL VOSTRO', '260.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('765', '185', 'CAM IP TUBO SELLADA COLORVU 4MP L 2.8MM', '120.4000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('766', '186', 'DISCO DURO ESPECIAL DVR PURPLE 4TB', '116.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('767', '187', 'SWITCH POE 4CH 10/100/1000 + 1 10/1000MB 35W', '53.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('768', '188', 'MOUSE MEETION ERGONOMICO WIRELESS MT-R390', '18.5000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('769', '189', 'PAD MOUSE SPEEDMIND APOYADERA DE GEL', '5.1500', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('770', '190', 'EXTENSOR POWERLINE', '70.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('771', '191', 'TECLADO ALAMBRICO', '10.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('772', '192', 'LECTOR USB KIT: 1D', '309.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('773', '193', 'CAJON DE DINERO  3 POSITIONS KEY LOCK', '51.5200', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('774', '194', 'IMPRESORA TERMICA 80MM 80MM AUTO-CUTTER', '118.5000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('775', '195', 'EQUIPO POS \\u2013 MARCA: ZKTEKO ZKBIO550', '689.0800', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('776', '196', 'LICENCIA KASPERSKY CLOUD PRO', '296.3300', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('777', '197', 'CASE TORRE', '50.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('778', '198', 'LINEA CELULAR', '26.7800', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('779', '199', 'MEMORIA DE 16GB DDR4 2133P', '280.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('780', '200', 'CAMARA OJO DE PEZ | 6MP', '574.4500', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('781', '201', 'CAMARA IP DOMO 5MP L1.6MM PANORAMICA 180\\u00b0', '195.7800', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('782', '202', 'CAMARA OJO DE PEZ | 5MP | 180\\u00b0 ACUSENSE', '386.4000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('783', '203', 'CAMARA PTZ | 2MP | ACUSENSE', '745.7500', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('784', '204', 'GRABADOR IDS DEEPINMIND | 32CH', '1545.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('785', '205', 'GRABADOR 64CH | 8 BAHIAS DISCO DURO', '1776.4600', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('786', '206', 'DISCO DURO 10 TB', '326.8300', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('787', '207', 'DECODER 8 SALIDAS HDMI', '2203.7700', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('788', '208', 'PANTALLA LCD 65 PUL. USO 24/7', '1818.6600', '1', '', '\0', '0', '', '0.00000', '20', '0', '0', '34', null, '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('789', '209', 'MONITOR DE CCTV 43 PUL PARA CCTV', '726.4300', '1', '', '\0', '0', '', '0.00000', '19', '0', '0', '34', null, '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('790', '210', 'CONTROL JOYSTICK HIKVISION CON PANTALLA', '1253.2200', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('791', '211', 'LECTOR BIOMETRICO FACIAL HUELLA', '203.5000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('792', '212', 'FUENTE PARA CONTROL DE ACCESO 5AMP', '34.7800', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('793', '213', 'BATERIA RECARGABLE 12VDC 7AMP', '16.7400', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('794', '214', 'HIKCENTRAL MONITOREO CCTV | 300CH', '8870.4600', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('795', '215', 'LICENCIA HIKCENTRAL PARA 1 CANAL ADICIONAL', '34.7800', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('796', '216', 'LICENCIA HIKCENTRAL GESTIÓN VIDEOWALL', '2165.1300', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('797', '217', 'LIC. HC ACTIVACIÓN MÓDULO ACCESOS 16 PUERTAS', '717.4200', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('798', '218', 'LICENCIA HC PARA 1 ACCESO ADICIONAL', '37.3800', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('799', '219', 'LIC. HC 1 CANAL DE RECONOCIMIENTO FACIAL', '197.3800', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('800', '220', 'LICENCIA HIKCENTRAL PARA GESTION DE VISITAS', '386.4000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('801', '221', 'LICENCENCIA HIKCENTRAL PARA GESTIÓN DE PERSONAL', '930.5000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('802', '222', 'SCANNER OCR PARA EXTRACCIÓN DE DATOS DE CÉLULAS', '1578.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('803', '223', 'INJECTOR POE 60W', '26.1300', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('804', '224', 'DESARROLLO A MEDIDA', '5508.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('805', '225', 'LICENCIA DE USO DE PLATAFORMA MSC', '450.8000', '1', null, '\0', '0', '', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('806', '226', 'SERVIDOR HPE ML30 G10+ E-2314 1P 16G NHP 1TB', '4585.2800', '1', '', '\0', '0', '', '0.00000', '19', '0', '0', '34', '../img/articulos/226.jpeg', '1', 'ML30', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('807', '227', 'PACK DE MANTENIMIENTO ANUAL', '890.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '34', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('808', 'UTP-7-INJ-60W ', 'INJECTOR POE 60W', '26.1300', '0', '', '\0', '0', '', '0.00000', '20', '', '', '34', null, '1', 'UTP-7-INJ-6', '', '1', '1', '1', '26', '', '2023-10-10', 'INJECTOR POE 60W', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('809', '3351843', 'Fiber transceiver module', '4.0000', '1', '', '\0', '0', '', '0.00000', '20', '0', '0', '34', '../img/articulos/3351843.jpeg', '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('810', '6003184', 'Protectores de RJ45', '35.0000', '1', '', '\0', '0', '', '0.00000', '20', '0', '0', '34', '../img/articulos/6003184.jpeg', '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('811', '8304096', 'Conectores RJ45 Cat6', '35.0000', '1', '', '\0', '0', '', '0.00000', '20', '0', '0', '34', '../img/articulos/8304096.jpeg', '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('812', '3028203', 'Cable red blindado Cat6', '220.0000', '1', '', '\0', '0', '', '0.00000', '20', '0', '0', '34', '../img/articulos/3028203.jpeg', '1', '', 'Metros', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('813', '6514552', 'Cable fibra multimodo 6 hilos', '250.0000', '1', '', '\0', '0', '', '0.00000', '20', '0', '0', '34', '../img/articulos/6514552.jpeg', '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('819', '300', 'SERVIDOR DELL PE R340', '2798.6000', '1', '', '\0', '0', '', '0.00000', '20', '0', '', '34', null, '1', '', 'UNI', '1', '1', '1', '26', '', '2023-11-13', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('820', 'DISCO', 'HD 800gb, SSD SAT SATA', '315.0000', '0', '', '\0', '0', '', '0.00000', '20', '', '', '34', null, '1', '', 'UNI', '1', '1', '1', '26', '', '2023-11-24', 'HD 800gb, SSD SAT SATA', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('821', 'MEMORIAS', 'MEMORIA 8 GB PC2400', '35.0000', '1', '', '\0', '0', '', '0.00000', '20', '', '', '34', null, '1', '', '', '1', '1', '1', '26', '', '2023-12-06', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('822', 'DISCOS', 'HD M2 1TB ', '98.0000', '1', '', '\0', '0', '', '0.00000', '20', '', '', '34', null, '1', '', '', '1', '1', '1', '26', '', '2023-12-06', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('823', 'SWITCH', 'SWITCH 24 PUERTOS POE', '462.0000', '1', '', '\0', '0', '', '0.00000', '20', '', '', '34', null, '1', '', '', '1', '1', '1', '26', '', '2023-12-07', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('824', 'HD SSD 240GB ENTERPRISE', 'HD SSD 240GB ENTERPRISE', '273.0000', '1', '', '\0', '0', '', '0.00000', '20', '', '', '34', null, '1', '', '', '1', '1', '1', '26', '', '2023-12-18', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('827', 'hdnas250en', 'HD ENTERPRISE SSD NAS 250GB', '219.9100', '1', '', '\0', '0', '', '0.00000', '20', '', '', '34', null, '1', '', '', '1', '1', '1', '26', '', '2023-12-19', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('828', '1', 'OUTSORCING', '350.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('829', '2', 'SERVICIOS PRESTADOS - MANTENIENTO DE SERVIDOR', '150.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('830', '3', 'CONFIGURACIÓN DE VPN', '80.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('831', '4', 'SERVICIOS GENERALES - SOPORTE TÉCNICO', '70.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('832', '5', 'SISTEMA CONTABLE SMARTCONTROL', '7000.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('833', '6', 'SPECTRA CENTRAL 4 ZONAS EXP. 32 2 PARTIC', '30.6300', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('834', '7', 'TECLADO LED CABLEADO DE 10 ZONAS HORIZON', '34.0800', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('835', '8', 'DISCO DURO 1TB INTELLI-POWER 24-7 CACHE-64MB SATA 6.0GBJS 3.5INC. PURPLE', '72.6900', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('836', '9', 'CONFIGURACIÓN TERMINAL SERVER', '200.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('837', '10', 'CONFIGURACIÓN DE ACTIVE DIRECTORY', '150.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('838', '11', 'UPS 1KVA ON LINE 110V', '310.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('839', '12', 'LICENCIA KASPERSKY CLOUD', '475.9200', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('840', '13', 'LICENCIA ANTIVIRUS SERVER', '168.4400', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('841', '14', 'AM04 POS RF SINGLE EAS ALUMINUM ANTENNA', '892.0800', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('842', '15', 'DYN-STHRFN-CASE DYNAPOS RF HARD TAG', '159.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('843', '16', 'DYN-STDDU DYNAPOS MAGNETIC DETACHER', '51.4100', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('844', '17', 'IMPRESORA TMU220 USB', '303.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('845', '18', 'NVR 16CH CAPACIDAD 40MB 2HDD', '133.8600', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('846', '19', 'BATERIA RECARGABLE 12VDC 7AMP', '16.7400', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('847', '20', 'LICENCIA INTERFAZ BIOMÉTRICO SOYAL A SQL', '910.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('848', '21', 'DISCO DURO 1TB 5400RPM CACHE-8MB SATA', '150.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('849', '22', 'MAT-1236_ETIQUETA S/IMPRESIÓN  TERMICO PROTEGIDO  TROQUELADA AVANCE 25 MM ANCHO 32 MM NUCLEO 1\\u201d', '19.5600', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('850', '23', 'MAT-1236_ETIQUETA S/IMPRESIÓN  TERMICO PROTEGIDO  TROQUELADA AVANCE 25 MM ANCHO 32 MM NUCLEO 1\\u201d', '12.4200', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('851', '24', 'REPARACION NOTEBOOK', '120.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('852', '25', 'TONER NEGRO HP 2354', '42.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('853', '26', 'CARGA TONER N-2345', '32.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('854', '27', 'QPCOM SWITCH  8 PUERTOS 10/100/1000 MBPS', '40.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('855', '28', 'IMPRESORA ZEBRA GC420', '500.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('856', '29', 'KIT 5 CAMARAS DVR + 4 CAM 1080', '692.1600', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('857', '30', 'CONFIGURACION Y PUESTA EN MARCHA', '490.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('858', '31', 'DIMM KINGSTON 4GB DDR4 PC-2133 NON ECC', '85.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('859', '32', 'MBO GIGABYTE H110M-H DDR4 LGA1151 I7 V S R HDMI USB3.0 PCI-EX', '96.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('860', '33', 'PROC. INTEL CORE I5-6400 - 2.7GHZ - 6MB - 4NUCLEOS - DDR4-1866/2133', '282.7500', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('861', '34', 'FUENTE DE PODER 12V Y MATERIALES', '17.5000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('862', '35', 'DISCO DURO 1 TB. 3', '88.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('863', '36', 'CABLR UTP CAT6', '145.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('864', '37', 'HUBBELL PREMISE SJ6A24B ASCENT CATEGORY 6A RJ45 JACK', '8.9000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('865', '38', 'CENTRAL IPBX UCM6204', '523.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('866', '39', 'TELEFONO IP GXP-1628', '54.1500', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('867', '40', 'GXP-1625 / TELEFONO IP', '58.1000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('868', '41', 'ETH. SWITCH POE QPCOM 16PTOS 2SFP QP-1602PEW', '422.4600', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('869', '42', 'ETH. SWITCH QPCOM 16PTOS 10/100/1000 RACK QP-1660R ', '156.8000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('870', '43', 'UNIFI SECURITY GATEWAY', '215.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('871', '44', 'ORGANIZADOR 1 UR', '26.8800', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('872', '45', 'RACK 3U', '42.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('873', '46', 'PUNTOS DE RED Y MATERIALES', '60.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('874', '47', 'INSTALACIÓN Y CONFIGURACIÓN CENTRAL IP', '120.9600', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('875', '48', 'CONFIGURACION E INSTALACION', '240.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('876', '49', 'CABLES USB PARALELO', '18.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('877', '50', 'PATCH PANEL MODULAR PARA  CAT5E Y CAT6 24 PTOS', '21.0200', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('878', '51', 'UNIFI\\u00ae\\u00a0AC APS ', '179.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('879', '52', 'GAC 2500 /  TELEFONO IP AUDIOCONFERENCIA', '526.4000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('880', '53', 'TELEFONO IP GXP-2140', '142.8000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('881', '54', 'GXP-2200EXT / MODULO DE EXTENCIONES', '137.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('882', '55', 'ESTACIÓN BASE DP720', '67.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('883', '56', 'ESTACIÓN BASE DP750', '68.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('884', '57', 'GASTOS DE MOVILIZACION', '245.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('885', '58', 'CONFIGURACIÓN INICIAL SYNOLOGY ', '287.2800', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('886', '59', 'GABINETE   COMPACTO MONOBLOQUE', '157.2300', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('887', '60', 'BANDEJA  ESTANDAR  2 UR.   19\"', '20.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('888', '61', 'MULTITOMA HORIZONTAL 19\"     4 TOMAS DOBLES', '34.9900', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('889', '62', 'ORGANIZADOR CON CANALETA', '20.7500', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('890', '63', 'PATCH CORD 3FT CAT 6 AZUL QUEST', '3.1500', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('891', '64', 'ETH. PANEL CAT6 24 PUERTOS QP-P24 WITH ETH. KEYSTONE JACK SERIE', '21.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('892', '65', 'SERVICIO TÉCNICO / LAPTOPS', '76.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('893', '66', 'TELÉFONO INALAMBRICO KX-TGC222S PANASONIC', '146.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('894', '67', 'MANTENIMIENTO DE CAMARAS', '38.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('895', '68', 'CELULAR SAMSUNG GALAXY J7PRIME 4G-LTE 3GB 5.5INC 16GB MICROSD ADROID WHITE', '360.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('896', '69', 'CENTRAL UCM 6208 IPBX', '803.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('897', '70', 'HOSTING INCONTROL', '20.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('898', '71', 'INSTALACION Y CALIBRACION', '49.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('899', '72', 'DISCO DURO SSD 480GB', '61.8200', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('900', '73', 'KASPERSKY TOTAL SECURITY 1 AÑO', '37.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('901', '74', 'SITIO WEB DINAMICO', '1000.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('902', '75', 'BRAZO MECANICO CIERRA PUERTA YALE', '65.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('903', '76', 'UNIFI CONTROLLER CLOUD KEY', '212.8000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('904', '77', 'CONFIGURACIÓN CLOUD SYSTEM UNIFI AP', '210.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('905', '78', 'CENTRAL TELEFÓNICA PANASONIC KX-TES824', '350.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('906', '79', 'CAMARASTIPO BULLET IR 1080P LENTE FIJO 3.6MM IP66', '59.6400', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('907', '80', 'CAMARA IP TIPO BULLET IR 3 MEGAPIXELES LENTE FIJO 4.0MM IP66', '180.1800', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('908', '81', 'DVR DIGITAL SISTEMA TRIBIDO PARA 8 CANALES COMPRESIÓN 264 /1TB HD', '280.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('909', '82', 'TRANSRECEPTOR TURBO HD DE VIDEO PASIVO DE UN CANAL', '6.8600', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('910', '83', 'ADAPTADORES SWITCHING 12VDC 1.0AMP', '7.8400', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('911', '84', 'KIT DE CAMARAS ANALGOGICAS', '266.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('912', '85', 'CABLE HDMI 15MTS + ADAPTADOR VGA-HDMI', '63.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('913', '86', 'MATERIALES ELECTRICOS', '240.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('914', '87', 'LECTOR BIOMÉTRICO ID FLEX', '243.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('915', '88', 'LECTOR SOYAL AR-725E-M', '203.7000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('916', '89', 'FUENTE DE PODER', '117.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('917', '90', 'ANTENA UNIFI LR WIFI LR', '119.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('918', '91', 'SERVICIO DE CLOUT CALLING', '245.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('919', '92', 'IMPORTACIÓN Y CONFIGURACIÓN SISTEMA MAILCHIMP', '14.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('920', '93', 'CREACIÓN Y CUSTOMIZACIÓN DE CAMPAÑAS / PLANTILLAS', '21.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('921', '94', 'BZL PARA MONAJE DE CERRADURA', '32.3400', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('922', '95', 'CERRADURA ELECTROMAGNÉTICA 600LBS Y TEMPORIZADOR INTEGRADO', '66.6400', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('923', '96', 'PANEL DE ALARMAS 4 ZONAS', '34.8000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('924', '97', 'TECLADO LED CABLEADO DE 10 ZONAS HORIZONTAL', '38.7200', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('925', '98', 'OUTSORCING DE TALENTO', '1898.4000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('926', '99', 'UPGRADE Y PUESTA EN MARCHA 10 LIC MONITORE REMOTO', '3500.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('927', '100', 'PAGO MENSUAL LEASING', '4202.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('928', '101', 'SATA SSD SOLIDDRIVE 480GB', '90.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('929', '102', 'MEMORIAS DE 4GB ', '80.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('930', '103', 'SSD SATA 1GB ENTERPRISE FOR SERVER', '385.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('931', '104', 'SYNOLOGY DISKSTATION DS1621+ 6-BAY NAS', '2184.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('932', '105', 'DISCO DURO  INTERNO - RED PRO - 10TB', '661.0200', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('933', '106', 'UNIFI SWITCH 16 PUERTOS POE', '566.3800', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('934', '107', 'ROUTER UNIFI SECURITY GATEWAY PRO4 ', '512.2100', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('935', '108', 'PATCH CORD 7 PIES', '5.7500', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('936', '109', 'UNIFI SWITCH 24 PUERTOS', '599.8700', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('937', '110', 'CANALETA EMT Y ANCLAJES', '30.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('938', '111', 'SISTEMA DE AMPLIFICACION', '631.2500', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('939', '112', 'CAMARA IP TUBO 2 MP', '56.2500', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('940', '113', 'NVR 8CH POE ', '181.2500', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('941', '114', 'TELEFONO IP 2 CUENTA SIP', '46.2500', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('942', '115', 'UPS ONLINE DE 2KVA', '850.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('943', '116', 'Tarjetas de Proximidad', '2.1500', '1', '', '\0', '0', '', '0.00000', '19', '0', '0', '35', '../img/articulos/116.jpeg', '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('944', '117', 'SWITCH POE 8 PUERTOS', '85.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('945', '118', 'PORTERO ELECTRICO', '206.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('946', '119', 'UNIFI DE 24 PUERTOS US-24 DE UBIQUITI POE', '374.1900', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('947', '120', 'TELEFONO IP INALAMBRICO + BASE CELULAR', '145.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('948', '121', 'RACK DE PISO', '75.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('949', '122', 'BRAZO HIDRAULICO', '35.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('950', '123', 'DISCO DURO DE 4TB NAS', '272.5000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('951', '124', 'GASTOS BIOSEGURIDAD', '50.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('952', '125', 'CARGADOR DE PORTATIL', '55.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('953', '126', 'CABLEADO Y MATERIALES', '80.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('954', '127', 'SYNOLOGY 4-CAMERA LICENSE KEY', '298.4700', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('955', '128', 'SYNOLOGY 8-CAMERA LICENSE KEY', '524.1500', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('956', '129', 'CAMARA ANALOGA FULL COLOR', '63.5300', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('957', '130', 'CAMARA DOMO 5MP', '60.2800', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('958', '131', 'FUENTES DE PODER PULPO', '26.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('959', '132', 'DISCO DURO PURPLE 2TB', '168.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('960', '133', 'UPS INTERACTIVA1000VA', '85.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('961', '134', 'SOPORTE THE-HUB', '100.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('962', '135', 'DVR DE 4 CANALES', '65.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('963', '136', 'GASTOS DE EDUCADORAS', '520.0000', '1', '', '\0', '0', '', '0.00000', '19', '0', '0', '35', null, '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('964', '137', 'SYNOLOGY RS2418+ RACKSTATION 12-BAY NAS ENCLOSURE', '4368.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('965', '138', 'SYNOLOGY RAIL KIT RKS1317', '275.1800', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('966', '139', 'SYNOLOGY M2D20 M.2 ADAPTER CARD', '247.5200', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('967', '140', 'SAMSUNG 1TB 970 EVO PLUS NVME M.2 INTERNAL SSD', '291.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('968', '141', 'HD WD 10TB -7200RPM - NAS', '661.0200', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('969', '142', 'MONTAJE DE RACK', '120.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('970', '143', 'BATER\\u00cdAS SECAS (PARA UPS). 12 V. / 9 AH.', '32.0300', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('971', '144', 'SO-DIMM 8GB DDR4', '88.8700', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('972', '145', 'GASTO EN GIRAS', '10.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('973', '146', 'UPS 750W OFF LINE', '40.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('974', '147', 'TELEFONO IP GRP2602P', '52.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('975', '148', 'ELABORACION DE FOTOGRAFIAS Y VIDEOS', '100.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('976', '149', 'LICENCIA ACCESS MSI COMUNICATOR APUDATA', '347.7600', '1', '', '\0', '0', '', '0.00000', '20', '0', '0', '35', null, '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('977', '150', 'WEBCAM 1080 ', '35.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('978', '151', 'HEATPHONE SIMPLE', '12.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('979', '152', 'LECTOR WIEGAND ESCLAVO', '50.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('980', '153', 'DISCO SSD 980MB', '120.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('981', '154', 'NOT. HP PROBOOK 440 G7 ', '1127.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('982', '155', 'SISTEMA DE SEGURIDAD PARA TALLER', '358.0700', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('983', '156', 'LLAVERO DE PROXIMIDAD', '3.5000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('984', '157', 'UNIDAD USB DE 32GB', '25.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('985', '158', 'DIMM MEMORI ECC 16GB', '292.3200', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('986', '159', 'NOT. DELL INSPIRON 3511 I5', '423.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('987', '160', 'HD  WD 14 TB NAS 5400 RPM', '620.3500', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('988', '161', 'NVR 4 CANALES SIMPLE', '119.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('989', '162', 'NOT. DELL VOSTRO 3400', '963.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('990', '163', 'ETIQUETA POLIPROPILENO', '6.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('991', '164', 'ETIQUETAS RFID 60*25 METAL', '890.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('992', '165', 'UNIFI AP-AC 6 PRO', '245.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('993', '166', 'UNIFI SWITCH 16 PUERTOS ', '415.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('994', '167', 'SOPORTE SISTEMA SMARTLAB', '35.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('995', '168', 'CAPACITACION SISTEMA INCONTROL', '35.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('996', '169', 'SISTEMA DE CABLEADO - MATERIAL', '550.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('997', '170', 'SISTEMA DE AUDIO', '900.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('998', '171', 'SISTEMA DE CCTV', '635.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('999', '172', 'DISEÑ Y MANO DE OBRA', '850.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1000', '173', 'SWICH 16 PUERTOS SIMPLE', '89.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1001', '174', 'UPS ONLINE 3KVA', '466.8200', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1002', '175', 'UNIFI SWITCH 48 PUERTOS', '1152.0400', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1003', '176', 'BATERIA DE NOTEBOOK', '90.7200', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1004', '177', 'SISTEMA DE CABLEADO - MATERIAL', '708.4000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1005', '178', 'SISTEMA DE AUDIO', '1159.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1006', '179', 'SISTEMA DE CCTV', '817.8800', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1007', '180', 'DISEÑ Y MANO DE OBRA', '1094.8000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1008', '181', 'SWICH 16 PUERTOS SIMPLE', '114.6300', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1009', '182', 'OUTSORCING DE TALENTO', '1800.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1010', '183', 'CENTRAL IP 6304', '698.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1011', '184', 'PANTALLA PORTATIL VOSTRO', '260.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1012', '185', 'CAM IP TUBO SELLADA COLORVU 4MP L 2.8MM', '120.4000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1013', '186', 'DISCO DURO ESPECIAL DVR PURPLE 4TB', '116.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1014', '187', 'SWITCH POE 4CH 10/100/1000 + 1 10/1000MB 35W', '53.2000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1015', '188', 'MOUSE MEETION ERGONOMICO WIRELESS MT-R390', '18.5000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1016', '189', 'PAD MOUSE SPEEDMIND APOYADERA DE GEL', '5.1500', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1017', '190', 'EXTENSOR POWERLINE', '70.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1018', '191', 'TECLADO ALAMBRICO', '10.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1019', '192', 'LECTOR USB KIT: 1D', '309.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1020', '193', 'CAJON DE DINERO  3 POSITIONS KEY LOCK', '51.5200', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1021', '194', 'IMPRESORA TERMICA 80MM 80MM AUTO-CUTTER', '118.5000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1022', '195', 'EQUIPO POS \\u2013 MARCA: ZKTEKO ZKBIO550', '689.0800', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1023', '196', 'LICENCIA KASPERSKY CLOUD PRO', '296.3300', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1024', '197', 'CASE TORRE', '50.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1025', '198', 'LINEA CELULAR', '26.7800', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1026', '199', 'MEMORIA DE 16GB DDR4 2133P', '280.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1027', '200', 'CAMARA OJO DE PEZ | 6MP', '574.4500', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1028', '201', 'CAMARA IP DOMO 5MP L1.6MM PANORAMICA 180\\u00b0', '195.7800', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1029', '202', 'CAMARA OJO DE PEZ | 5MP | 180\\u00b0 ACUSENSE', '386.4000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1030', '203', 'CAMARA PTZ | 2MP | ACUSENSE', '745.7500', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1031', '204', 'GRABADOR IDS DEEPINMIND | 32CH', '1545.6000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1032', '205', 'GRABADOR 64CH | 8 BAHIAS DISCO DURO', '1776.4600', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1033', '206', 'DISCO DURO 10 TB', '326.8300', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1034', '207', 'DECODER 8 SALIDAS HDMI', '2203.7700', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1035', '208', 'PANTALLA LCD 65 PUL. USO 24/7', '1818.6600', '1', '', '\0', '0', '', '0.00000', '20', '0', '0', '35', null, '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1036', '209', 'MONITOR DE CCTV 43 PUL PARA CCTV', '726.4300', '1', '', '\0', '0', '', '0.00000', '19', '0', '0', '35', null, '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1037', '210', 'CONTROL JOYSTICK HIKVISION CON PANTALLA', '1253.2200', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1038', '211', 'LECTOR BIOMETRICO FACIAL HUELLA', '203.5000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1039', '212', 'FUENTE PARA CONTROL DE ACCESO 5AMP', '34.7800', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1040', '213', 'BATERIA RECARGABLE 12VDC 7AMP', '16.7400', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1041', '214', 'HIKCENTRAL MONITOREO CCTV | 300CH', '8870.4600', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1042', '215', 'LICENCIA HIKCENTRAL PARA 1 CANAL ADICIONAL', '34.7800', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1043', '216', 'LICENCIA HIKCENTRAL GESTIÓN VIDEOWALL', '2165.1300', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1044', '217', 'LIC. HC ACTIVACIÓN MÓDULO ACCESOS 16 PUERTAS', '717.4200', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1045', '218', 'LICENCIA HC PARA 1 ACCESO ADICIONAL', '37.3800', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1046', '219', 'LIC. HC 1 CANAL DE RECONOCIMIENTO FACIAL', '197.3800', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1047', '220', 'LICENCIA HIKCENTRAL PARA GESTION DE VISITAS', '386.4000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1048', '221', 'LICENCENCIA HIKCENTRAL PARA GESTIÓN DE PERSONAL', '930.5000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1049', '222', 'SCANNER OCR PARA EXTRACCIÓN DE DATOS DE CÉLULAS', '1578.0000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1050', '223', 'INJECTOR POE 60W', '26.1300', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1051', '224', 'DESARROLLO A MEDIDA', '5508.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1052', '225', 'LICENCIA DE USO DE PLATAFORMA MSC', '450.8000', '1', null, '\0', '0', '', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1053', '226', 'SERVIDOR HPE ML30 G10+ E-2314 1P 16G NHP 1TB', '4585.2800', '1', '', '\0', '0', '', '0.00000', '19', '0', '0', '35', '../img/articulos/226.jpeg', '1', 'ML30', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1054', '227', 'PACK DE MANTENIMIENTO ANUAL', '890.0000', '1', null, '', '0', '\0', null, '19', '0', '0', '35', null, null, '', 'UNI', null, null, null, null, null, null, null, '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1055', 'UTP-7-INJ-60W ', 'INJECTOR POE 60W', '26.1300', '0', '', '\0', '0', '', '0.00000', '20', '', '', '35', null, '1', 'UTP-7-INJ-6', '', '1', '1', '1', '26', '', '2023-10-10', 'INJECTOR POE 60W', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1056', '3351843', 'Fiber transceiver module', '4.0000', '1', '', '\0', '0', '', '0.00000', '20', '0', '0', '35', '../img/articulos/3351843.jpeg', '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1057', '6003184', 'Protectores de RJ45', '35.0000', '1', '', '\0', '0', '', '0.00000', '20', '0', '0', '35', '../img/articulos/6003184.jpeg', '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1058', '8304096', 'Conectores RJ45 Cat6', '35.0000', '1', '', '\0', '0', '', '0.00000', '20', '0', '0', '35', '../img/articulos/8304096.jpeg', '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1059', '3028203', 'Cable red blindado Cat6', '220.0000', '1', '', '\0', '0', '', '0.00000', '20', '0', '0', '35', '../img/articulos/3028203.jpeg', '1', '', 'Metros', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1060', '6514552', 'Cable fibra multimodo 6 hilos', '250.0000', '1', '', '\0', '0', '', '0.00000', '20', '0', '0', '35', '../img/articulos/6514552.jpeg', '1', '', 'UNI', '1', '1', '1', '26', '', null, '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1061', '300', 'SERVIDOR DELL PE R340', '2798.6000', '1', '', '\0', '0', '', '0.00000', '20', '0', '', '35', null, '1', '', 'UNI', '1', '1', '1', '26', '', '2023-11-13', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1062', 'DISCO', 'HD 800gb, SSD SAT SATA', '315.0000', '0', '', '\0', '0', '', '0.00000', '20', '', '', '35', null, '1', '', 'UNI', '1', '1', '1', '26', '', '2023-11-24', 'HD 800gb, SSD SAT SATA', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1063', 'MEMORIAS', 'MEMORIA 8 GB PC2400', '35.0000', '1', '', '\0', '0', '', '0.00000', '20', '', '', '35', null, '1', '', '', '1', '1', '1', '26', '', '2023-12-06', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1064', 'DISCOS', 'HD M2 1TB ', '98.0000', '1', '', '\0', '0', '', '0.00000', '20', '', '', '35', null, '1', '', '', '1', '1', '1', '26', '', '2023-12-06', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1065', 'SWITCH', 'SWITCH 24 PUERTOS POE', '462.0000', '1', '', '\0', '0', '', '0.00000', '20', '', '', '35', null, '1', '', '', '1', '1', '1', '26', '', '2023-12-07', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1066', 'HD SSD 240GB ENTERPRISE', 'HD SSD 240GB ENTERPRISE', '273.0000', '1', '', '\0', '0', '', '0.00000', '20', '', '', '35', null, '1', '', '', '1', '1', '1', '26', '', '2023-12-18', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1067', 'hdnas250en', 'HD ENTERPRISE SSD NAS 250GB', '219.9100', '1', '', '\0', '0', '', '0.00000', '20', '', '', '35', null, '1', '', '', '1', '1', '1', '26', '', '2023-12-19', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1087', 'G2100', 'Canon G2100', '42.5000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-01-26', 'G2100', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1088', 'mbo', 'Mainboard G2100', '68.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-01-26', 'mbo', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1089', '8GB', 'DDR4 8GB', '63.6000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-01-26', '8GB', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1090', '500GB', 'SOLID STATE Drive Kingstong 500GB', '38.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-01-26', '500GB', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1092', 'i310cab1', 'Cabezales1 EPSON i310', '45.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Cabezales1 EPSON i310', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1093', 'i310cab2', 'Cabezales3 EPSON i310', '70.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Cabezales3 EPSON i310', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1094', 'Portero1', 'Ip Video Intercom DS-KH6320-WTE', '84.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Portero1', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1095', 'FuentePoder1', 'Fuente de Poder PL-12DCAK', '58.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'FuentePoder1', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1096', 'Acceso2', 'Caja de Accesos 4 Puertas DS-K2604', '158.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Acceso2', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1097', 'Acceso3', 'Lectores Wiegand', '34.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Acceso3', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1098', 'Rack1', 'Rack de 42U', '1780.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Rack1', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1099', 'Rack2', 'Rack de 36U', '980.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Rack2', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1100', 'Rack3', 'Rack Cerrado Aéreo', '450.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Rack3', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1101', 'Cerradura1', 'Electrocerraduras Z y L', '45.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Cerradura1', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1102', 'Rack4', 'Organizador de 6U', '59.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Rack4', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1103', 'Rack5', 'Tomacorreinte Tomas Vertical', '35.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Rack5', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1104', 'Rack6', 'Bandeja metálica de 20cm', '28.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Rack6', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1105', 'Otros1', 'Mano de Obra y Materiales Soldador', '150.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Otros1', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1106', 'Firewall1', 'Dream Machine Special Edition', '642.7100', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Firewall1', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1107', 'wifi1', 'Access Point U6 Enterprise Unifi WIFI', '462.3900', '1', 'wifi1', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1108', 'Switch1', 'Switch Enterprise 8 PoE', '591.1900', '1', 'Switch1', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1109', 'Switch2', 'Switch USW-Enterprise-48-PoE (720W) aace', '2059.5100', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Switch2', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1110', 'Switch3', 'Switch 32-port, Layer 3', '1286.7100', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Switch3', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1111', 'Redes', 'Trans 10 Gbps Long-Range Direct Attach Cable 5m', '50.2300', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Redes', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1112', 'Redes2', 'Trans 10 Gbps Single-Mode Optical Module 10G-D-20', '708.4000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Redes2', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1113', 'Redes3', 'Kit de Patch Cort cortos para Switch', '1661.5200', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'Redes3', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1114', 'UPS', 'UPS 3000VA - 2400W', '892.5800', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-02-15', 'UPS rack', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1115', 'RJE0024', 'RJE0024 RUIJIE REYEE ROUTER GATEWAY CLOUD 5 PTOS GIGA  2WAN RG-EG105G-V2', '117.6000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-03-10', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1116', 'RG-ES226GC', 'RJE0004 RUIJIE REYEE SWITCH CLOUD 24 PTOS POE + 2 SFP 370W  RACK C2 RG-ES226GC-P', '441.0000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-03-10', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1117', 'RG-RAP2260', 'RJE0011 RUIJIE REYEE ACCESS POINT WIFI 6 AX1800 DUAL BAND 2  PTOS GIGA RG-RAP2260(G)', '159.6000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-03-10', '', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1118', 'TELEFONO WIFI ', 'TELEFONO WIFI ', '129.3800', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-05-22', 'TELEFONO WIFI ', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1119', 'UPS 1KVA INTERACTIVO', 'UPS 1KVA INTERACTIVO', '120.2600', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-05-22', 'UPS 1KVA INTERACTIVO', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1120', 'SWITCH POE 8 PUERTOS', 'SWITCH POE 8 PUERTOS', '43.1300', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-05-22', 'SWITCH POE 8 PUERTOS', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1121', 'LECTOR BIOMETRICO', 'LECTOR BIOMETRICO', '186.8800', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-05-22', 'LECTOR BIOMETRICO', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1122', 'PUNTOS DE RED', 'PUNTOS DE RED', '57.5000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-05-22', 'PUNTOS DE RED', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1123', 'PNR5', 'FIRMA ELECTRONICA PNR 5AÑOS', '40.2000', '1', '', '\0', '0', '', '0.00000', '23', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-07-02', 'FIRMA ELECTRONICA PNR 5AÑOS', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1124', 'RFID 45', 'Etiquetas 1.7656x0.5156in (45x13mm); TT, RFID 600roll', '507.6400', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-08-12', 'ETI45*13', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1125', 'RFID 44', 'Etiquetas 1.7656x0.5156in (44.5x19.1mm); TT, RFID 5000roll', '897.1200', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-08-12', 'ETI44.5*19.1', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1126', 'RESINA', 'CINTAS DE RESINA 6200', '124.6000', '1', '', '\0', '0', '', '0.00000', '22', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-08-12', 'RESINA', '0', '0', '', '\0', '\0', null, null, null);
INSERT INTO `productos` VALUES ('1127', 'KS Premiun', 'Kaspersky Premium 1 año', '55.7800', '1', '', '\0', '0', '', '0.00000', '23', '', '', '35', null, '1', '', '', '1', '1', '1', '27', '', '2024-08-28', '', '0', '0', '', '\0', '\0', null, null, null);

-- ----------------------------
-- Table structure for promos
-- ----------------------------
DROP TABLE IF EXISTS `promos`;
CREATE TABLE `promos` (
  `id_promos` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorias` int(255) DEFAULT NULL,
  `id_producto` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_promos`),
  KEY `FK_CATEGIORIAS_PROMOS` (`id_categorias`),
  KEY `FK_CATEGORIAS_PRODUCTO` (`id_producto`),
  CONSTRAINT `promos_ibfk_1` FOREIGN KEY (`id_categorias`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `promos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_productos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of promos
-- ----------------------------

-- ----------------------------
-- Table structure for recetas
-- ----------------------------
DROP TABLE IF EXISTS `recetas`;
CREATE TABLE `recetas` (
  `id_recetas` int(255) NOT NULL AUTO_INCREMENT,
  `id_producto` int(255) DEFAULT NULL,
  `id_materia_prima` int(255) DEFAULT NULL,
  `peso` varchar(255) DEFAULT '',
  `cantidad` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_recetas`),
  KEY `ID_RECETAS_PRODUCTOS` (`id_producto`),
  KEY `ID_RECETAS_MATERIA_PRIMA` (`id_materia_prima`),
  CONSTRAINT `recetas_ibfk_1` FOREIGN KEY (`id_materia_prima`) REFERENCES `productos` (`id_productos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `recetas_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_productos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of recetas
-- ----------------------------

-- ----------------------------
-- Table structure for retenciones
-- ----------------------------
DROP TABLE IF EXISTS `retenciones`;
CREATE TABLE `retenciones` (
  `id_retenciones` int(11) NOT NULL AUTO_INCREMENT,
  `serie` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `idproveedor` varchar(255) DEFAULT NULL,
  `codigoUsuario` varchar(255) DEFAULT NULL,
  `autorizacion` varchar(255) DEFAULT '',
  `fechaEmision` date DEFAULT NULL,
  `EstablecimientoFac` varchar(255) DEFAULT NULL,
  `puntoventa_Fac` varchar(255) DEFAULT NULL,
  `numeroFac` varchar(255) DEFAULT NULL,
  `autorizacionFac` varchar(50) DEFAULT '',
  `emisionFac` date DEFAULT NULL,
  `registroFac` date DEFAULT NULL,
  `VencimientoFac` date DEFAULT NULL,
  `No_IVA` varchar(255) DEFAULT NULL,
  `tarifa0` varchar(255) DEFAULT NULL,
  `tarifa12` varchar(255) DEFAULT NULL,
  `valor_ICE` varchar(255) DEFAULT NULL,
  `estadoRet` char(2) DEFAULT '',
  `id_empresa` varchar(255) DEFAULT NULL,
  `montoIva` varchar(255) DEFAULT '',
  `PagoLocExt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_retenciones`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of retenciones
-- ----------------------------
INSERT INTO `retenciones` VALUES ('12', '001-002', '24', '62', '21', '280120230707021641790011001002000000024123456', '2023-01-28', '001', '002', '123', '0000000001', '2023-01-28', '2023-01-28', '2023-01-28', '120', '130', '140', '150', 'AN', '6', '16.80', '01');
INSERT INTO `retenciones` VALUES ('13', '001-002', '25', '62', '21', '2901202307070216417900110010020000000251234567819', '2023-01-29', '001', '002', '3', '00000000001', '2023-01-29', '2023-01-29', '2023-01-29', '120', '130', '140', '150', 'A', '6', '16.80', '01');
INSERT INTO `retenciones` VALUES ('19', '001-002', '31', '43', '18', '2603202307070216417900110010020000000311234567810', '2023-03-26', '001', '001', '000000001', '0000000001', '2023-03-25', '2023-03-25', '2023-03-25', '120', '120', '0.00', '0.00', 'R', '6', '0.00', '01');
INSERT INTO `retenciones` VALUES ('22', '001-002', '34', '43', '18', '2603202307070216417900110010020000000341234567817', '2023-03-26', '001', '', '', '', '2023-03-26', '2023-03-26', '2023-03-26', '0.00', '12', '0.00', '0.00', 'R', '6', '0.00', '01');
INSERT INTO `retenciones` VALUES ('23', '001-001', '35', '75', '18', '0702164179001', '2023-04-12', '001', '001', '000000001', '0000000001', '2023-04-12', '2023-04-12', '2023-04-12', '120', '130', '140', '150', 'P', '6', '16.80', '01');
INSERT INTO `retenciones` VALUES ('24', '001-001', '1', '62', '18', '0702164179001', '2023-04-12', '001', '001', '000000001', '0000000001', '2023-04-12', '2023-04-12', '2023-04-12', '0.00', '120', '130', '140', 'P', '6', '15.60', '01');
INSERT INTO `retenciones` VALUES ('25', '001-002', '36', '62', '18', '0702164179001', '2023-04-12', '001', '001', '000000001', '0000000001', '2023-04-12', '2023-04-12', '2023-04-12', '120', '130', '120', '150', 'P', '6', '14.40', '01');
INSERT INTO `retenciones` VALUES ('26', '001-001', '2', '51', '18', '1104202307070216417900110010010000000021234567814', '2023-04-11', '001', '008', '000000004', '11234567890', '2023-04-11', '2023-04-11', '2023-04-11', '0.00', '140', '120', '0.00', 'A', '6', '14.40', '01');
INSERT INTO `retenciones` VALUES ('27', '001-001', '3', '62', '18', '1104202307070216417900110010010000000031234567811', '2023-04-11', '001', '001', '000000001', '0000000001', '2023-04-11', '2023-04-11', '2023-04-11', '110', '120', '130', '0.00', 'A', '6', '15.60', '01');

-- ----------------------------
-- Table structure for retenciones_impuestos
-- ----------------------------
DROP TABLE IF EXISTS `retenciones_impuestos`;
CREATE TABLE `retenciones_impuestos` (
  `id_impuesto` int(11) NOT NULL AUTO_INCREMENT,
  `detalle_impuesto` varchar(255) DEFAULT NULL,
  `base_imponible` varchar(255) DEFAULT NULL,
  `porcentajeRet` varchar(255) DEFAULT NULL,
  `valorRetenido` varchar(255) DEFAULT '',
  `serieRet` varchar(255) DEFAULT '',
  `NoRetencion` varchar(255) DEFAULT NULL,
  `AutorizacionRet` varchar(255) DEFAULT NULL,
  `FechaRet` date DEFAULT NULL,
  `FacturaEstab` varchar(255) DEFAULT NULL,
  `FacturaPunto` varchar(255) DEFAULT NULL,
  `NoFactura` varchar(255) DEFAULT NULL,
  `IdProveedor` varchar(255) DEFAULT NULL,
  `codigoUsuario` varchar(255) DEFAULT NULL,
  `Cta_retencion` varchar(255) DEFAULT NULL,
  `bienes_servicios` char(1) DEFAULT '0',
  `codigo_retencion` varchar(255) DEFAULT '.',
  `id_empresa` varchar(255) DEFAULT NULL,
  `PagoLocExt` varchar(10) DEFAULT '01',
  `por_bienes` char(1) DEFAULT '\0',
  `por_servicios` char(1) DEFAULT '\0',
  PRIMARY KEY (`id_impuesto`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of retenciones_impuestos
-- ----------------------------
INSERT INTO `retenciones_impuestos` VALUES ('114', 'RETENCION IVA 10% BIENES', '7.20', '10', '0.72', '001-002', '24', '1234567891234', '2023-01-28', '001', '002', '123', '62', '21', null, '1', '.', '6', '01', '1', '0');
INSERT INTO `retenciones_impuestos` VALUES ('115', 'RETENCION 20% SERVICIOS', '9.60', '20', '1.92', '001-002', '24', '1234567891234', '2023-01-28', '001', '002', '123', '62', '21', null, '1', '.', '6', '01', '0', '1');
INSERT INTO `retenciones_impuestos` VALUES ('116', 'Honorarios profesionales y demas pagos por servicios relacionados con el titulo profesional', '390.00', '10', '39.00', '001-002', '24', '1234567891234', '2023-01-28', '001', '002', '123', '62', '21', null, '0', '303', '6', '01', '0', '0');
INSERT INTO `retenciones_impuestos` VALUES ('117', 'RETENCION IVA 10% BIENES', '7.20', '10', '0.72', '001-002', '25', '1234567891234', '2023-01-29', '001', '002', '3', '62', '21', null, '1', '.', '6', '01', '1', '0');
INSERT INTO `retenciones_impuestos` VALUES ('118', 'RETENCION 20% SERVICIOS', '9.60', '20', '1.92', '001-002', '25', '1234567891234', '2023-01-29', '001', '002', '3', '62', '21', null, '1', '.', '6', '01', '0', '1');
INSERT INTO `retenciones_impuestos` VALUES ('119', 'Honorarios profesionales y demas pagos por servicios relacionados con el titulo profesional', '390.00', '10', '39.00', '001-002', '25', '1234567891234', '2023-01-29', '001', '002', '3', '62', '21', null, '0', '303', '6', '01', '0', '0');
INSERT INTO `retenciones_impuestos` VALUES ('120', 'RETENCION IVA 10% BIENES', '7.20', '10', '0.72', '001-002', '26', '1234567891234', '2023-01-29', '001', '001', '000000001', '62', '21', null, '1', '.', '6', '01', '1', '0');
INSERT INTO `retenciones_impuestos` VALUES ('121', 'RETENCION 20% SERVICIOS', '10.80', '20', '2.16', '001-002', '26', '1234567891234', '2023-01-29', '001', '001', '000000001', '62', '21', null, '1', '.', '6', '01', '0', '1');
INSERT INTO `retenciones_impuestos` VALUES ('122', 'Honorarios profesionales y demas pagos por servicios relacionados con el titulo profesional', '400.00', '10', '40.00', '001-002', '26', '1234567891234', '2023-01-29', '001', '001', '000000001', '62', '21', null, '0', '303', '6', '01', '0', '0');
INSERT INTO `retenciones_impuestos` VALUES ('123', 'RETENCION IVA 10% BIENES', '19.20', '10', '1.92', '001-002', '27', '1234567891234', '2023-01-30', '001', '001', '000000001', '62', '21', null, '1', '.', '6', '01', '1', '0');
INSERT INTO `retenciones_impuestos` VALUES ('124', 'RETENCION IVA 10% BIENES', '19.20', '10', '1.92', '001-002', '28', '1234567891234', '2023-01-30', '001', '001', '000000001', '62', '21', null, '1', '.', '6', '01', '1', '0');
INSERT INTO `retenciones_impuestos` VALUES ('126', 'Servicios prestados por medios de comunicacion y agencias de publicidad', '450.00', '1.75', '7.88', '001-002', '27', '1234567891234', '2023-01-30', '001', '001', '000000001', '62', '21', null, '0', '309', '6', '01', '0', '0');
INSERT INTO `retenciones_impuestos` VALUES ('127', 'Servicios predomina el intelecto no relacionados con el titulo profesional', '222.00', '8', '17.76', '001-002', '29', '1234567891234', '2023-03-25', '001', '001', '000000001', '62', '18', null, '0', '304', '6', '01', '0', '0');
INSERT INTO `retenciones_impuestos` VALUES ('128', 'Honorarios y demas pagos por servicios de docencia', '12.00', '8', '0.96', '001-002', '30', '1234567891234', '2023-03-26', '001', '001', '000000001', '41', '18', null, '0', '304E', '6', '01', '0', '0');
INSERT INTO `retenciones_impuestos` VALUES ('131', 'Honorarios profesionales y demas pagos por servicios relacionados con el titulo profesional', '240.00', '10', '24.00', '001-002', '31', '1234567891234', '2023-03-26', '001', '001', '000000001', '43', '18', null, '0', '303', '6', '01', '0', '0');
INSERT INTO `retenciones_impuestos` VALUES ('132', 'Servicios predomina el intelecto no relacionados con el titulo profesional', '6.00', '8', '0.48', '001-002', '32', '1234567891234', '2023-03-25', '001', '001', '000000001', '62', '18', null, '0', '304', '6', '01', '0', '0');
INSERT INTO `retenciones_impuestos` VALUES ('133', 'RETENCION IVA 10% BIENES', '7.21', '10', '0.72', '001-002', '33', '1234567891234', '2023-03-25', '001', '001', '000000001', '41', '18', null, '1', '.', '6', '01', '1', '0');
INSERT INTO `retenciones_impuestos` VALUES ('134', 'RETENCION 20% SERVICIOS', '9.59', '20', '1.92', '001-002', '33', '1234567891234', '2023-03-25', '001', '001', '000000001', '41', '18', null, '1', '.', '6', '01', '0', '1');
INSERT INTO `retenciones_impuestos` VALUES ('135', 'Honorarios profesionales y demas pagos por servicios relacionados con el titulo profesional', '390.00', '10', '39.00', '001-002', '33', '1234567891234', '2023-03-25', '001', '001', '000000001', '41', '18', null, '0', '303', '6', '01', '0', '0');
INSERT INTO `retenciones_impuestos` VALUES ('136', 'Honorarios profesionales y demas pagos por servicios relacionados con el titulo profesional', '12.00', '10', '1.20', '001-002', '34', '0702164179001', '2023-03-25', '001', '', '', '43', '18', null, '0', '303', '6', '01', '0', '0');
INSERT INTO `retenciones_impuestos` VALUES ('137', 'RETENCION IVA 10% BIENES', '16.80', '10', '1.68', '001-001', '35', '0702164179001', '2023-04-12', '001', '001', '000000001', '75', '18', null, '1', '.', '6', '01', '1', '0');
INSERT INTO `retenciones_impuestos` VALUES ('138', 'Honorarios profesionales y demas pagos por servicios relacionados con el titulo profesional', '390.00', '10', '39.00', '001-001', '35', '0702164179001', '2023-04-12', '001', '001', '000000001', '75', '18', null, '0', '303', '6', '01', '0', '0');
INSERT INTO `retenciones_impuestos` VALUES ('139', 'RETENCION IVA 10% BIENES', '15.60', '10', '1.56', '001-001', '1', '0702164179001', '2023-04-12', '001', '001', '000000001', '62', '18', null, '1', '.', '6', '01', '1', '0');
INSERT INTO `retenciones_impuestos` VALUES ('140', 'RETENCION IVA 10% BIENES', '14.40', '10', '1.44', '001-002', '36', '0702164179001', '2023-04-12', '001', '001', '000000001', '62', '18', null, '1', '.', '6', '01', '1', '0');
INSERT INTO `retenciones_impuestos` VALUES ('141', 'Servicios predomina el intelecto no relacionados con el titulo profesional', '370.00', '8', '29.60', '001-002', '36', '0702164179001', '2023-04-12', '001', '001', '000000001', '62', '18', null, '0', '304', '6', '01', '0', '0');
INSERT INTO `retenciones_impuestos` VALUES ('142', 'Honorarios profesionales y demas pagos por servicios relacionados con el titulo profesional', '260.00', '10', '26.00', '001-001', '2', '0702164179001', '2023-04-12', '001', '008', '000000004', '51', '18', null, '0', '303', '6', '01', '0', '0');
INSERT INTO `retenciones_impuestos` VALUES ('143', 'Honorarios profesionales y demas pagos por servicios relacionados con el titulo profesional', '360.00', '10', '36.00', '001-001', '3', '0702164179001', '2023-04-12', '001', '001', '000000001', '62', '18', null, '0', '303', '6', '01', '0', '0');

-- ----------------------------
-- Table structure for sucursales
-- ----------------------------
DROP TABLE IF EXISTS `sucursales`;
CREATE TABLE `sucursales` (
  `id_sucursal` int(255) NOT NULL AUTO_INCREMENT,
  `telefono_s` varchar(20) DEFAULT '',
  `direccion_s` varchar(255) DEFAULT '',
  `serie_s` varchar(100) DEFAULT '',
  `empresa` int(11) DEFAULT NULL,
  `email_s` varchar(100) DEFAULT NULL,
  `nombre_sucursal` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_sucursal`),
  KEY `FK_SUCURSAL_EMPRESA` (`empresa`) USING BTREE,
  CONSTRAINT `sucursales_ibfk_1` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sucursales
-- ----------------------------
INSERT INTO `sucursales` VALUES ('7', '', '', '001-001', '5', null, 'sucursal principal');
INSERT INTO `sucursales` VALUES ('8', '0987456321', 'direccion', '001-002', '6', 'example@example.com', 'sucursal principal');
INSERT INTO `sucursales` VALUES ('9', '', '', '001-001', '7', 'javier.farinango92@gmail.com', 'SUCURSAL PRINCIPAL');
INSERT INTO `sucursales` VALUES ('10', '0990313904', 'CAYETANO CESTARIS S7-158 Y PADRE ELIAS BRITO', '001-003', '8', 'transpesimalaya2016@hotmail.com', 'SUCURSAL PRINCIPAL');
INSERT INTO `sucursales` VALUES ('23', '0987654321', 'la madrid', '001-001', '30', 'example.com', 'SUCURSAL PRINCIPAL');
INSERT INTO `sucursales` VALUES ('25', '0987242579', 'jipiro y santa barbara', '001-001', '7', 'javier.farinango92@gmail.com', 'SUCURSAL PRINCIPAL');
INSERT INTO `sucursales` VALUES ('26', '3920507', 'De los Motilones N40-345 y Camilo Gallegos', '001-001', '34', 'factura@corsinf.com', 'SUCURSAL PRINCIPAL');
INSERT INTO `sucursales` VALUES ('27', '23920507', 'De Los Motilones N40-345 y Miguel Albornoz\r\n', '001-001', '35', 'mrubio@corsinf.com', 'SUCURSAL PRINCIPAL');

-- ----------------------------
-- Table structure for tabla_naciones
-- ----------------------------
DROP TABLE IF EXISTS `tabla_naciones`;
CREATE TABLE `tabla_naciones` (
  `Codigo` varchar(5) DEFAULT NULL,
  `Descripcion_Rubro` varchar(35) DEFAULT NULL,
  `CPais` varchar(3) DEFAULT NULL,
  `CRegion` varchar(1) DEFAULT NULL,
  `CProvincia` varchar(2) DEFAULT NULL,
  `CCiudad` varchar(2) DEFAULT NULL,
  `TR` varchar(1) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDX_Tabla_Naciones` (`Codigo`,`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tabla_naciones
-- ----------------------------
INSERT INTO `tabla_naciones` VALUES ('0', 'ESTADOS UNIDOS', '001', '.', '.', '.', 'N', '1');
INSERT INTO `tabla_naciones` VALUES ('0', 'CANADA', '002', '.', '.', '.', 'N', '2');
INSERT INTO `tabla_naciones` VALUES ('0', 'PUERTO RICO', '003', '.', '.', '.', 'N', '3');
INSERT INTO `tabla_naciones` VALUES ('0', 'REP. DOMINICANA', '004', '.', '.', '.', 'N', '4');
INSERT INTO `tabla_naciones` VALUES ('0', 'JAPON', '007', '.', '.', '.', 'N', '5');
INSERT INTO `tabla_naciones` VALUES ('0', 'KOREA', '008', '.', '.', '.', 'N', '6');
INSERT INTO `tabla_naciones` VALUES ('0', 'EEUU', '011', '.', '.', '.', 'N', '7');
INSERT INTO `tabla_naciones` VALUES ('0', 'HOLANDA', '031', '.', '.', '.', 'N', '8');
INSERT INTO `tabla_naciones` VALUES ('0', 'FRANCIA/MONACO', '033', '.', '.', '.', 'N', '9');
INSERT INTO `tabla_naciones` VALUES ('0', 'ESPA3/4A', '034', '.', '.', '.', 'N', '10');
INSERT INTO `tabla_naciones` VALUES ('0', 'ITALIA', '039', '.', '.', '.', 'N', '11');
INSERT INTO `tabla_naciones` VALUES ('0', 'GRAN BRETAoA', '044', '.', '.', '.', 'N', '12');
INSERT INTO `tabla_naciones` VALUES ('0', 'ALEMANIA', '049', '.', '.', '.', 'N', '13');
INSERT INTO `tabla_naciones` VALUES ('0', 'PERU', '051', '.', '.', '.', 'N', '14');
INSERT INTO `tabla_naciones` VALUES ('0', 'MEXICO', '052', '.', '.', '.', 'N', '15');
INSERT INTO `tabla_naciones` VALUES ('0', 'CUBA', '053', '.', '.', '.', 'N', '16');
INSERT INTO `tabla_naciones` VALUES ('0', 'ARGENTINA', '054', '.', '.', '.', 'N', '17');
INSERT INTO `tabla_naciones` VALUES ('0', 'BRASIL', '055', '.', '.', '.', 'N', '18');
INSERT INTO `tabla_naciones` VALUES ('0', 'CHILE', '056', '.', '.', '.', 'N', '19');
INSERT INTO `tabla_naciones` VALUES ('0', 'COLOMBIA', '057', '.', '.', '.', 'N', '20');
INSERT INTO `tabla_naciones` VALUES ('0', 'VENEZUELA', '058', '.', '.', '.', 'N', '21');
INSERT INTO `tabla_naciones` VALUES ('0', 'PAKISTAN', '101', '.', '.', '.', 'N', '22');
INSERT INTO `tabla_naciones` VALUES ('0', 'COLOMBIA', '301', '.', '.', '.', 'N', '23');
INSERT INTO `tabla_naciones` VALUES ('0', 'GUATEMALA', '502', '.', '.', '.', 'N', '24');
INSERT INTO `tabla_naciones` VALUES ('0', 'EL SALVADOR', '503', '.', '.', '.', 'N', '25');
INSERT INTO `tabla_naciones` VALUES ('0', 'HONDURAS', '504', '.', '.', '.', 'N', '26');
INSERT INTO `tabla_naciones` VALUES ('0', 'NICARAGUA', '505', '.', '.', '.', 'N', '27');
INSERT INTO `tabla_naciones` VALUES ('0', 'COSTA RICA', '506', '.', '.', '.', 'N', '28');
INSERT INTO `tabla_naciones` VALUES ('0', 'PANAMA', '507', '.', '.', '.', 'N', '29');
INSERT INTO `tabla_naciones` VALUES ('0', 'RUSIA', '577', '.', '.', '.', 'N', '30');
INSERT INTO `tabla_naciones` VALUES ('0', 'BOLIVIA', '591', '.', '.', '.', 'N', '31');
INSERT INTO `tabla_naciones` VALUES ('0', 'ECUADOR', '593', '.', '.', '.', 'N', '32');
INSERT INTO `tabla_naciones` VALUES ('0', 'PARAGUAY', '595', '.', '.', '.', 'N', '33');
INSERT INTO `tabla_naciones` VALUES ('0', 'URUGUAY', '598', '.', '.', '.', 'N', '34');
INSERT INTO `tabla_naciones` VALUES ('0', 'CHINA', '599', '.', '.', '.', 'N', '35');
INSERT INTO `tabla_naciones` VALUES ('0', 'HUNGRIA', '600', '.', '.', '.', 'N', '36');
INSERT INTO `tabla_naciones` VALUES ('0', 'PORTUGAL', '601', '.', '.', '.', 'N', '37');
INSERT INTO `tabla_naciones` VALUES ('0', 'SUECIA', '602', '.', '.', '.', 'N', '38');
INSERT INTO `tabla_naciones` VALUES ('0', 'SUIZA', '603', '.', '.', '.', 'N', '39');
INSERT INTO `tabla_naciones` VALUES ('0', 'BELGICA', '604', '.', '.', '.', 'N', '40');
INSERT INTO `tabla_naciones` VALUES ('0', 'SUDAFRICA', '605', '.', '.', '.', 'N', '41');
INSERT INTO `tabla_naciones` VALUES ('0', 'OTRO', '999', '.', '.', '.', 'N', '42');
INSERT INTO `tabla_naciones` VALUES ('1', 'COSTA', '593', '1', '.', '.', 'R', '43');
INSERT INTO `tabla_naciones` VALUES ('107', 'EL ORO', '593', '1', '07', '.', 'P', '44');
INSERT INTO `tabla_naciones` VALUES ('10701', 'MACHALA', '593', '1', '07', '01', 'C', '45');
INSERT INTO `tabla_naciones` VALUES ('10702', 'ARENILLAS', '593', '1', '07', '02', 'C', '46');
INSERT INTO `tabla_naciones` VALUES ('10703', 'ATAHUALPA', '593', '1', '07', '03', 'C', '47');
INSERT INTO `tabla_naciones` VALUES ('10704', 'BALSAS', '593', '1', '07', '04', 'C', '48');
INSERT INTO `tabla_naciones` VALUES ('10705', 'CHILLA', '593', '1', '07', '05', 'C', '49');
INSERT INTO `tabla_naciones` VALUES ('10706', 'EL GUABO', '593', '1', '07', '06', 'C', '50');
INSERT INTO `tabla_naciones` VALUES ('10707', 'HUAQUILLAS', '593', '1', '07', '07', 'C', '51');
INSERT INTO `tabla_naciones` VALUES ('10708', 'MARCABELI', '593', '1', '07', '08', 'C', '52');
INSERT INTO `tabla_naciones` VALUES ('10709', 'PASAJE', '593', '1', '07', '09', 'C', '53');
INSERT INTO `tabla_naciones` VALUES ('10710', 'PINAS', '593', '1', '07', '10', 'C', '54');
INSERT INTO `tabla_naciones` VALUES ('10711', 'PORTOVELO', '593', '1', '07', '11', 'C', '55');
INSERT INTO `tabla_naciones` VALUES ('10712', 'SANTA ROSA', '593', '1', '07', '12', 'C', '56');
INSERT INTO `tabla_naciones` VALUES ('10713', 'ZARUMA', '593', '1', '07', '13', 'C', '57');
INSERT INTO `tabla_naciones` VALUES ('10714', 'LAS LAJAS', '593', '1', '07', '14', 'C', '58');
INSERT INTO `tabla_naciones` VALUES ('108', 'ESMERALDAS', '593', '1', '08', '.', 'P', '59');
INSERT INTO `tabla_naciones` VALUES ('10801', 'ESMERALDAS', '593', '1', '08', '01', 'C', '60');
INSERT INTO `tabla_naciones` VALUES ('10802', 'ELOY ALFARO', '593', '1', '08', '02', 'C', '61');
INSERT INTO `tabla_naciones` VALUES ('10803', 'MUISNE', '593', '1', '08', '03', 'C', '62');
INSERT INTO `tabla_naciones` VALUES ('10804', 'QUININDE', '593', '1', '08', '04', 'C', '63');
INSERT INTO `tabla_naciones` VALUES ('10805', 'SAN LORENZO', '593', '1', '08', '05', 'C', '64');
INSERT INTO `tabla_naciones` VALUES ('10806', 'ATACAMES', '593', '1', '08', '06', 'C', '65');
INSERT INTO `tabla_naciones` VALUES ('10807', 'RIOVERDE', '593', '1', '08', '07', 'C', '66');
INSERT INTO `tabla_naciones` VALUES ('109', 'GUAYAS', '593', '1', '09', '.', 'P', '67');
INSERT INTO `tabla_naciones` VALUES ('10901', 'GUAYAQUIL', '593', '1', '09', '01', 'C', '68');
INSERT INTO `tabla_naciones` VALUES ('10902', 'ALFREDO BAQUERIZO MORENO', '593', '1', '09', '02', 'C', '69');
INSERT INTO `tabla_naciones` VALUES ('10903', 'BALAO', '593', '1', '09', '03', 'C', '70');
INSERT INTO `tabla_naciones` VALUES ('10904', 'BALZAR', '593', '1', '09', '04', 'C', '71');
INSERT INTO `tabla_naciones` VALUES ('10905', 'COLIMES', '593', '1', '09', '05', 'C', '72');
INSERT INTO `tabla_naciones` VALUES ('10906', 'DAULE', '593', '1', '09', '06', 'C', '73');
INSERT INTO `tabla_naciones` VALUES ('10907', 'DURAN', '593', '1', '09', '07', 'C', '74');
INSERT INTO `tabla_naciones` VALUES ('10908', 'EL EMPALME', '593', '1', '09', '08', 'C', '75');
INSERT INTO `tabla_naciones` VALUES ('10909', 'EL TRIUNFO', '593', '1', '09', '09', 'C', '76');
INSERT INTO `tabla_naciones` VALUES ('10910', 'MILAGRO', '593', '1', '09', '10', 'C', '77');
INSERT INTO `tabla_naciones` VALUES ('10911', 'NARANJAL', '593', '1', '09', '11', 'C', '78');
INSERT INTO `tabla_naciones` VALUES ('10912', 'NARANJITO', '593', '1', '09', '12', 'C', '79');
INSERT INTO `tabla_naciones` VALUES ('10913', 'PALESTINA', '593', '1', '09', '13', 'C', '80');
INSERT INTO `tabla_naciones` VALUES ('10915', 'SALINAS', '593', '1', '09', '15', 'C', '81');
INSERT INTO `tabla_naciones` VALUES ('10916', 'SAMBORONDON', '593', '1', '09', '16', 'C', '82');
INSERT INTO `tabla_naciones` VALUES ('10917', 'SANTA ELENA', '593', '1', '09', '17', 'C', '83');
INSERT INTO `tabla_naciones` VALUES ('10918', 'SANTA LUCIA', '593', '1', '09', '18', 'C', '84');
INSERT INTO `tabla_naciones` VALUES ('10919', 'URBINA JADO', '593', '1', '09', '19', 'C', '85');
INSERT INTO `tabla_naciones` VALUES ('10920', 'SAN JACINTO DE YAGUACHI', '593', '1', '09', '20', 'C', '86');
INSERT INTO `tabla_naciones` VALUES ('10921', 'PLAYAS [GENERAL VILLAMIL]', '593', '1', '09', '21', 'C', '87');
INSERT INTO `tabla_naciones` VALUES ('10922', 'SIMON BOLIVAR', '593', '1', '09', '22', 'C', '88');
INSERT INTO `tabla_naciones` VALUES ('10923', 'CORONEL MARCELINO MARIDUENA', '593', '1', '09', '23', 'C', '89');
INSERT INTO `tabla_naciones` VALUES ('10924', 'LOMAS DE SARGENTILLO', '593', '1', '09', '24', 'C', '90');
INSERT INTO `tabla_naciones` VALUES ('10925', 'NOBOL [VICENTE PIEDRAHITA]', '593', '1', '09', '25', 'C', '91');
INSERT INTO `tabla_naciones` VALUES ('10926', 'LA LIBERTAD', '593', '1', '09', '26', 'C', '92');
INSERT INTO `tabla_naciones` VALUES ('10927', 'GENERAL ANTONIO ELIZALDE [BUCAY]', '593', '1', '09', '27', 'C', '93');
INSERT INTO `tabla_naciones` VALUES ('10928', 'ISIDRO AYORA', '593', '1', '09', '28', 'C', '94');
INSERT INTO `tabla_naciones` VALUES ('112', 'LOS RIOS', '593', '1', '12', '.', 'P', '95');
INSERT INTO `tabla_naciones` VALUES ('11201', 'BABAHOYO', '593', '1', '12', '01', 'C', '96');
INSERT INTO `tabla_naciones` VALUES ('11202', 'BABA', '593', '1', '12', '02', 'C', '97');
INSERT INTO `tabla_naciones` VALUES ('11203', 'MONTALVO', '593', '1', '12', '03', 'C', '98');
INSERT INTO `tabla_naciones` VALUES ('11204', 'PUEBLO VIEJO', '593', '1', '12', '04', 'C', '99');
INSERT INTO `tabla_naciones` VALUES ('11205', 'QUEVEDO', '593', '1', '12', '05', 'C', '100');
INSERT INTO `tabla_naciones` VALUES ('11206', 'URDANETE', '593', '1', '12', '06', 'C', '101');
INSERT INTO `tabla_naciones` VALUES ('11207', 'VENTANAS', '593', '1', '12', '07', 'C', '102');
INSERT INTO `tabla_naciones` VALUES ('11208', 'VINCES', '593', '1', '12', '08', 'C', '103');
INSERT INTO `tabla_naciones` VALUES ('11209', 'PALENQUE', '593', '1', '12', '09', 'C', '104');
INSERT INTO `tabla_naciones` VALUES ('11210', 'BUENA FE', '593', '1', '12', '10', 'C', '105');
INSERT INTO `tabla_naciones` VALUES ('11211', 'VALENCIA', '593', '1', '12', '11', 'C', '106');
INSERT INTO `tabla_naciones` VALUES ('11212', 'MOCACHE', '593', '1', '12', '12', 'C', '107');
INSERT INTO `tabla_naciones` VALUES ('113', 'MANABI', '593', '1', '13', '.', 'P', '108');
INSERT INTO `tabla_naciones` VALUES ('11301', 'PORTOVIEJO', '593', '1', '13', '01', 'C', '109');
INSERT INTO `tabla_naciones` VALUES ('11302', 'BOLIVAR', '593', '1', '13', '02', 'C', '110');
INSERT INTO `tabla_naciones` VALUES ('11303', 'CHONE', '593', '1', '13', '03', 'C', '111');
INSERT INTO `tabla_naciones` VALUES ('11304', 'EL CARMEN', '593', '1', '13', '04', 'C', '112');
INSERT INTO `tabla_naciones` VALUES ('11305', 'FLAVIO ALFARO', '593', '1', '13', '05', 'C', '113');
INSERT INTO `tabla_naciones` VALUES ('11306', 'JIPIJAPA', '593', '1', '13', '06', 'C', '114');
INSERT INTO `tabla_naciones` VALUES ('11307', 'JUNIN', '593', '1', '13', '07', 'C', '115');
INSERT INTO `tabla_naciones` VALUES ('11308', 'MANTA', '593', '1', '13', '08', 'C', '116');
INSERT INTO `tabla_naciones` VALUES ('11309', 'MONTECRISTI', '593', '1', '13', '09', 'C', '117');
INSERT INTO `tabla_naciones` VALUES ('11310', 'PAJAN', '593', '1', '13', '10', 'C', '118');
INSERT INTO `tabla_naciones` VALUES ('11311', 'PICHINCHA', '593', '1', '13', '11', 'C', '119');
INSERT INTO `tabla_naciones` VALUES ('11312', 'ROCAFUERTE', '593', '1', '13', '12', 'C', '120');
INSERT INTO `tabla_naciones` VALUES ('11313', 'SANTA ANA', '593', '1', '13', '13', 'C', '121');
INSERT INTO `tabla_naciones` VALUES ('11314', 'SUCRE', '593', '1', '13', '14', 'C', '122');
INSERT INTO `tabla_naciones` VALUES ('11315', 'TOSAGUA', '593', '1', '13', '15', 'C', '123');
INSERT INTO `tabla_naciones` VALUES ('11316', '24 DE MAYO', '593', '1', '13', '16', 'C', '124');
INSERT INTO `tabla_naciones` VALUES ('11317', 'PEDERNALES', '593', '1', '13', '17', 'C', '125');
INSERT INTO `tabla_naciones` VALUES ('11318', 'OLMEDO', '593', '1', '13', '18', 'C', '126');
INSERT INTO `tabla_naciones` VALUES ('11319', 'PUERTO LOPEZ', '593', '1', '13', '19', 'C', '127');
INSERT INTO `tabla_naciones` VALUES ('11320', 'JAMA', '593', '1', '13', '20', 'C', '128');
INSERT INTO `tabla_naciones` VALUES ('11321', 'JARAMIJO', '593', '1', '13', '21', 'C', '129');
INSERT INTO `tabla_naciones` VALUES ('11322', 'SAN VICENTE', '593', '1', '13', '22', 'C', '130');
INSERT INTO `tabla_naciones` VALUES ('124', 'SANTA ELENA', '593', '1', '24', '.', 'C', '131');
INSERT INTO `tabla_naciones` VALUES ('12401', 'SANTA ELENA', '593', '1', '24', '01', 'C', '132');
INSERT INTO `tabla_naciones` VALUES ('12402', 'LA LIBERTAD', '593', '1', '24', '02', 'C', '133');
INSERT INTO `tabla_naciones` VALUES ('12403', 'SALINAS', '593', '1', '24', '03', 'C', '134');
INSERT INTO `tabla_naciones` VALUES ('2', 'SIERRA', '593', '2', '.', '.', 'R', '135');
INSERT INTO `tabla_naciones` VALUES ('201', 'AZUAY', '593', '2', '01', '.', 'P', '136');
INSERT INTO `tabla_naciones` VALUES ('20101', 'CUENCA', '593', '2', '01', '01', 'C', '137');
INSERT INTO `tabla_naciones` VALUES ('20102', 'GIRON', '593', '2', '01', '02', 'C', '138');
INSERT INTO `tabla_naciones` VALUES ('20103', 'GUALACEO', '593', '2', '01', '03', 'C', '139');
INSERT INTO `tabla_naciones` VALUES ('20104', 'NABON', '593', '2', '01', '04', 'C', '140');
INSERT INTO `tabla_naciones` VALUES ('20105', 'PAUTE', '593', '2', '01', '05', 'C', '141');
INSERT INTO `tabla_naciones` VALUES ('20106', 'PUCARA', '593', '2', '01', '06', 'C', '142');
INSERT INTO `tabla_naciones` VALUES ('20107', 'SAN FERNANDO', '593', '2', '01', '07', 'C', '143');
INSERT INTO `tabla_naciones` VALUES ('20108', 'SANTA ISABEL [CHAGUARURCO]', '593', '2', '01', '08', 'C', '144');
INSERT INTO `tabla_naciones` VALUES ('20109', 'SIGSIG', '593', '2', '01', '09', 'C', '145');
INSERT INTO `tabla_naciones` VALUES ('20110', 'ONA', '593', '2', '01', '10', 'C', '146');
INSERT INTO `tabla_naciones` VALUES ('20111', 'CHORDELEG', '593', '2', '01', '11', 'C', '147');
INSERT INTO `tabla_naciones` VALUES ('20112', 'EL PAN', '593', '2', '01', '12', 'C', '148');
INSERT INTO `tabla_naciones` VALUES ('20113', 'SEVILLA DE ORO', '593', '2', '01', '13', 'C', '149');
INSERT INTO `tabla_naciones` VALUES ('20114', 'GUACHAPALA', '593', '2', '01', '14', 'C', '150');
INSERT INTO `tabla_naciones` VALUES ('20115', 'CAMILO PONCE ENRIQUEZ', '593', '2', '01', '15', 'C', '151');
INSERT INTO `tabla_naciones` VALUES ('202', 'BOLIVAR', '593', '2', '02', '.', 'P', '152');
INSERT INTO `tabla_naciones` VALUES ('20201', 'GUARANDA', '593', '2', '02', '01', 'C', '153');
INSERT INTO `tabla_naciones` VALUES ('20202', 'CHILLANES', '593', '2', '02', '02', 'C', '154');
INSERT INTO `tabla_naciones` VALUES ('20203', 'CHIMBO', '593', '2', '02', '03', 'C', '155');
INSERT INTO `tabla_naciones` VALUES ('20204', 'ECHEANDIA', '593', '2', '02', '04', 'C', '156');
INSERT INTO `tabla_naciones` VALUES ('20205', 'SAN MIGUEL', '593', '2', '02', '05', 'C', '157');
INSERT INTO `tabla_naciones` VALUES ('20206', 'CALUMA', '593', '2', '02', '06', 'C', '158');
INSERT INTO `tabla_naciones` VALUES ('20207', 'LAS NAVES', '593', '2', '02', '07', 'C', '159');
INSERT INTO `tabla_naciones` VALUES ('203', 'CANAR', '593', '2', '03', '.', 'P', '160');
INSERT INTO `tabla_naciones` VALUES ('20301', 'AZOGUES', '593', '2', '03', '01', 'C', '161');
INSERT INTO `tabla_naciones` VALUES ('20302', 'BIBLIAN', '593', '2', '03', '02', 'C', '162');
INSERT INTO `tabla_naciones` VALUES ('20303', 'CANAR', '593', '2', '03', '03', 'C', '163');
INSERT INTO `tabla_naciones` VALUES ('20304', 'LA TRONCAL', '593', '2', '03', '04', 'C', '164');
INSERT INTO `tabla_naciones` VALUES ('20305', 'EL TAMBO', '593', '2', '03', '05', 'C', '165');
INSERT INTO `tabla_naciones` VALUES ('20306', 'DELEG', '593', '2', '03', '06', 'C', '166');
INSERT INTO `tabla_naciones` VALUES ('20307', 'SUSCAL', '593', '2', '03', '07', 'C', '167');
INSERT INTO `tabla_naciones` VALUES ('204', 'CARCHI', '593', '2', '04', '.', 'P', '168');
INSERT INTO `tabla_naciones` VALUES ('20401', 'TULCAN', '593', '2', '04', '01', 'C', '169');
INSERT INTO `tabla_naciones` VALUES ('20402', 'BOLIVAR', '593', '2', '04', '02', 'C', '170');
INSERT INTO `tabla_naciones` VALUES ('20403', 'ESPEJO', '593', '2', '04', '03', 'C', '171');
INSERT INTO `tabla_naciones` VALUES ('20404', 'MIRA [CHONTAHUASI]', '593', '2', '04', '04', 'C', '172');
INSERT INTO `tabla_naciones` VALUES ('20405', 'MONTUFAR', '593', '2', '04', '05', 'C', '173');
INSERT INTO `tabla_naciones` VALUES ('20406', 'SAN PEDRO DE HUACA', '593', '2', '04', '06', 'C', '174');
INSERT INTO `tabla_naciones` VALUES ('205', 'COTOPAXI', '593', '2', '05', '.', 'P', '175');
INSERT INTO `tabla_naciones` VALUES ('20501', 'LATACUNGA', '593', '2', '05', '01', 'C', '176');
INSERT INTO `tabla_naciones` VALUES ('20502', 'LA MANA', '593', '2', '05', '02', 'C', '177');
INSERT INTO `tabla_naciones` VALUES ('20503', 'PANGUA', '593', '2', '05', '03', 'C', '178');
INSERT INTO `tabla_naciones` VALUES ('20504', 'PUJILI', '593', '2', '05', '04', 'C', '179');
INSERT INTO `tabla_naciones` VALUES ('20505', 'SALCEDO', '593', '2', '05', '05', 'C', '180');
INSERT INTO `tabla_naciones` VALUES ('20506', 'SAQUISILI', '593', '2', '05', '06', 'C', '181');
INSERT INTO `tabla_naciones` VALUES ('20507', 'SIGCHOS', '593', '2', '05', '07', 'C', '182');
INSERT INTO `tabla_naciones` VALUES ('206', 'CHIMBORAZO', '593', '2', '06', '.', 'P', '183');
INSERT INTO `tabla_naciones` VALUES ('20601', 'RIOBAMBA', '593', '2', '06', '01', 'C', '184');
INSERT INTO `tabla_naciones` VALUES ('20602', 'ALAUSI', '593', '2', '06', '02', 'C', '185');
INSERT INTO `tabla_naciones` VALUES ('20603', 'COLTA', '593', '2', '06', '03', 'C', '186');
INSERT INTO `tabla_naciones` VALUES ('20604', 'CHAMBO', '593', '2', '06', '04', 'C', '187');
INSERT INTO `tabla_naciones` VALUES ('20605', 'CHUNCHI', '593', '2', '06', '05', 'C', '188');
INSERT INTO `tabla_naciones` VALUES ('20606', 'GUAMOTE', '593', '2', '06', '06', 'C', '189');
INSERT INTO `tabla_naciones` VALUES ('20607', 'GUANO', '593', '2', '06', '07', 'C', '190');
INSERT INTO `tabla_naciones` VALUES ('20608', 'PALLATANGA', '593', '2', '06', '08', 'C', '191');
INSERT INTO `tabla_naciones` VALUES ('20609', 'PENIPE', '593', '2', '06', '09', 'C', '192');
INSERT INTO `tabla_naciones` VALUES ('20610', 'CUMANDA', '593', '2', '06', '10', 'C', '193');
INSERT INTO `tabla_naciones` VALUES ('210', 'IMBABURA', '593', '2', '10', '.', 'P', '194');
INSERT INTO `tabla_naciones` VALUES ('21001', 'IBARRA', '593', '2', '10', '01', 'C', '195');
INSERT INTO `tabla_naciones` VALUES ('21002', 'ANTONIO ANTE', '593', '2', '10', '02', 'C', '196');
INSERT INTO `tabla_naciones` VALUES ('21003', 'COTACACHI', '593', '2', '10', '03', 'C', '197');
INSERT INTO `tabla_naciones` VALUES ('21004', 'OTAVALO', '593', '2', '10', '04', 'C', '198');
INSERT INTO `tabla_naciones` VALUES ('21005', 'PIMAMPIRO', '593', '2', '10', '05', 'C', '199');
INSERT INTO `tabla_naciones` VALUES ('21006', 'SAN MIGUEL DE URCUQUI', '593', '2', '10', '06', 'C', '200');
INSERT INTO `tabla_naciones` VALUES ('211', 'LOJA', '593', '2', '11', '.', 'P', '201');
INSERT INTO `tabla_naciones` VALUES ('21101', 'LOJA', '593', '2', '11', '01', 'C', '202');
INSERT INTO `tabla_naciones` VALUES ('21102', 'CALVAS', '593', '2', '11', '02', 'C', '203');
INSERT INTO `tabla_naciones` VALUES ('21103', 'CATAMAYO', '593', '2', '11', '03', 'C', '204');
INSERT INTO `tabla_naciones` VALUES ('21104', 'CELICA', '593', '2', '11', '04', 'C', '205');
INSERT INTO `tabla_naciones` VALUES ('21105', 'CHAGUARPAMBA', '593', '2', '11', '05', 'C', '206');
INSERT INTO `tabla_naciones` VALUES ('21106', 'ESPINDOLA', '593', '2', '11', '06', 'C', '207');
INSERT INTO `tabla_naciones` VALUES ('21107', 'GONZANAMA', '593', '2', '11', '07', 'C', '208');
INSERT INTO `tabla_naciones` VALUES ('21108', 'MACARA', '593', '2', '11', '08', 'C', '209');
INSERT INTO `tabla_naciones` VALUES ('21109', 'PALTAS', '593', '2', '11', '09', 'C', '210');
INSERT INTO `tabla_naciones` VALUES ('21110', 'PUYANGO', '593', '2', '11', '10', 'C', '211');
INSERT INTO `tabla_naciones` VALUES ('21111', 'SARAGURO', '593', '2', '11', '11', 'C', '212');
INSERT INTO `tabla_naciones` VALUES ('21112', 'SOZORANGA', '593', '2', '11', '12', 'C', '213');
INSERT INTO `tabla_naciones` VALUES ('21113', 'ZAPOTILLO', '593', '2', '11', '13', 'C', '214');
INSERT INTO `tabla_naciones` VALUES ('21114', 'PINDAL', '593', '2', '11', '14', 'C', '215');
INSERT INTO `tabla_naciones` VALUES ('21115', 'QUILANGA', '593', '2', '11', '15', 'C', '216');
INSERT INTO `tabla_naciones` VALUES ('21116', 'OLMEDO', '593', '2', '11', '16', 'C', '217');
INSERT INTO `tabla_naciones` VALUES ('217', 'PICHINCHA', '593', '2', '17', '.', 'P', '218');
INSERT INTO `tabla_naciones` VALUES ('21701', 'QUITO', '593', '2', '17', '01', 'C', '219');
INSERT INTO `tabla_naciones` VALUES ('21702', 'CAYAMBE', '593', '2', '17', '02', 'C', '220');
INSERT INTO `tabla_naciones` VALUES ('21703', 'MEJIA', '593', '2', '17', '03', 'C', '221');
INSERT INTO `tabla_naciones` VALUES ('21704', 'PEDRO MONCAYO', '593', '2', '17', '04', 'C', '222');
INSERT INTO `tabla_naciones` VALUES ('21705', 'RUMINAHUI', '593', '2', '17', '05', 'C', '223');
INSERT INTO `tabla_naciones` VALUES ('21706', 'SANTO DOMINGO DE LOS COLORADOS', '593', '2', '17', '06', 'C', '224');
INSERT INTO `tabla_naciones` VALUES ('21707', 'SAN MIGUEL DE LOS BANCOS', '593', '2', '17', '07', 'C', '225');
INSERT INTO `tabla_naciones` VALUES ('21708', 'PEDRO VICENTE MALDONADO', '593', '2', '17', '08', 'C', '226');
INSERT INTO `tabla_naciones` VALUES ('21709', 'PUERTO QUITO', '593', '2', '17', '09', 'C', '227');
INSERT INTO `tabla_naciones` VALUES ('218', 'TUNGURAHUA', '593', '2', '18', '.', 'P', '228');
INSERT INTO `tabla_naciones` VALUES ('21801', 'AMBATO', '593', '2', '18', '01', 'C', '229');
INSERT INTO `tabla_naciones` VALUES ('21802', 'BANOS DE AGUA SANTA', '593', '2', '18', '02', 'C', '230');
INSERT INTO `tabla_naciones` VALUES ('21803', 'CEVALLOS', '593', '2', '18', '03', 'C', '231');
INSERT INTO `tabla_naciones` VALUES ('21804', 'MOCHA', '593', '2', '18', '04', 'C', '232');
INSERT INTO `tabla_naciones` VALUES ('21805', 'PATATE', '593', '2', '18', '05', 'C', '233');
INSERT INTO `tabla_naciones` VALUES ('21806', 'QUERO', '593', '2', '18', '06', 'C', '234');
INSERT INTO `tabla_naciones` VALUES ('21807', 'SAN PEDRO DE PELILEO', '593', '2', '18', '07', 'C', '235');
INSERT INTO `tabla_naciones` VALUES ('21808', 'SANTIAGO DE PILLARO', '593', '2', '18', '08', 'C', '236');
INSERT INTO `tabla_naciones` VALUES ('21809', 'TISALEO', '593', '2', '18', '09', 'C', '237');
INSERT INTO `tabla_naciones` VALUES ('223', 'SANTO DOMINGO DE LOS TSACHILAS', '593', '2', '23', '.', 'P', '238');
INSERT INTO `tabla_naciones` VALUES ('22301', 'SANTO DOMINGO', '593', '2', '23', '01', 'C', '239');
INSERT INTO `tabla_naciones` VALUES ('3', 'ORIENTE', '593', '3', '.', '.', 'R', '240');
INSERT INTO `tabla_naciones` VALUES ('314', 'MORONA SANTIAGO', '593', '3', '14', '.', 'P', '241');
INSERT INTO `tabla_naciones` VALUES ('31401', 'MORONA', '593', '3', '14', '01', 'C', '242');
INSERT INTO `tabla_naciones` VALUES ('31402', 'GUALAQUIZA', '593', '3', '14', '02', 'C', '243');
INSERT INTO `tabla_naciones` VALUES ('31403', 'LIMON - INDANZA', '593', '3', '14', '03', 'C', '244');
INSERT INTO `tabla_naciones` VALUES ('31404', 'PALORA', '593', '3', '14', '04', 'C', '245');
INSERT INTO `tabla_naciones` VALUES ('31405', 'SANTIAGO', '593', '3', '14', '05', 'C', '246');
INSERT INTO `tabla_naciones` VALUES ('31406', 'SUCUA', '593', '3', '14', '06', 'C', '247');
INSERT INTO `tabla_naciones` VALUES ('31407', 'HUAMBOYA', '593', '3', '14', '07', 'C', '248');
INSERT INTO `tabla_naciones` VALUES ('31408', 'SAN JUAN DON BOSCO', '593', '3', '14', '08', 'C', '249');
INSERT INTO `tabla_naciones` VALUES ('31409', 'TAISHA', '593', '3', '14', '09', 'C', '250');
INSERT INTO `tabla_naciones` VALUES ('31410', 'LOGRONO', '593', '3', '14', '10', 'C', '251');
INSERT INTO `tabla_naciones` VALUES ('31411', 'PABLO VI', '593', '3', '14', '11', 'C', '252');
INSERT INTO `tabla_naciones` VALUES ('31412', 'TIWINTZA', '593', '3', '14', '12', 'C', '253');
INSERT INTO `tabla_naciones` VALUES ('315', 'NAPO', '593', '3', '15', '.', 'P', '254');
INSERT INTO `tabla_naciones` VALUES ('31501', 'TENA', '593', '3', '15', '01', 'C', '255');
INSERT INTO `tabla_naciones` VALUES ('31503', 'ARCHIDONA', '593', '3', '15', '03', 'C', '256');
INSERT INTO `tabla_naciones` VALUES ('31504', 'EL CHACO', '593', '3', '15', '04', 'C', '257');
INSERT INTO `tabla_naciones` VALUES ('31507', 'QUIJOS', '593', '3', '15', '07', 'C', '258');
INSERT INTO `tabla_naciones` VALUES ('31509', 'CARLOS JULIO AROSEMENA T', '593', '3', '15', '09', 'C', '259');
INSERT INTO `tabla_naciones` VALUES ('316', 'PASTAZA', '593', '3', '16', '.', 'P', '260');
INSERT INTO `tabla_naciones` VALUES ('31601', 'PASTAZA', '593', '3', '16', '01', 'C', '261');
INSERT INTO `tabla_naciones` VALUES ('31602', 'MERA', '593', '3', '16', '02', 'C', '262');
INSERT INTO `tabla_naciones` VALUES ('31603', 'SANTA CLARA', '593', '3', '16', '03', 'C', '263');
INSERT INTO `tabla_naciones` VALUES ('31604', 'ARAJUNO', '593', '3', '16', '04', 'C', '264');
INSERT INTO `tabla_naciones` VALUES ('319', 'ZAMORA CHINCHIPE', '593', '3', '19', '.', 'P', '265');
INSERT INTO `tabla_naciones` VALUES ('31901', 'ZAMORA', '593', '3', '19', '01', 'C', '266');
INSERT INTO `tabla_naciones` VALUES ('31902', 'CHINCHIPE', '593', '3', '19', '02', 'C', '267');
INSERT INTO `tabla_naciones` VALUES ('31903', 'NANGARITZA', '593', '3', '19', '03', 'C', '268');
INSERT INTO `tabla_naciones` VALUES ('31904', 'YACUAMBI', '593', '3', '19', '04', 'C', '269');
INSERT INTO `tabla_naciones` VALUES ('31905', 'YANZATZA', '593', '3', '19', '05', 'C', '270');
INSERT INTO `tabla_naciones` VALUES ('31906', 'EL PANGUI', '593', '3', '19', '06', 'C', '271');
INSERT INTO `tabla_naciones` VALUES ('31907', 'CENTINELA DEL CONDOR', '593', '3', '19', '07', 'C', '272');
INSERT INTO `tabla_naciones` VALUES ('31908', 'PALANDA', '593', '3', '19', '08', 'C', '273');
INSERT INTO `tabla_naciones` VALUES ('31909', 'PAQUISHA', '593', '3', '19', '09', 'C', '274');
INSERT INTO `tabla_naciones` VALUES ('321', 'SUCUMBIOS', '593', '3', '21', '.', 'P', '275');
INSERT INTO `tabla_naciones` VALUES ('32101', 'LAGO AGRIO', '593', '3', '21', '01', 'C', '276');
INSERT INTO `tabla_naciones` VALUES ('32102', 'GONZALO PIZARRO', '593', '3', '21', '02', 'C', '277');
INSERT INTO `tabla_naciones` VALUES ('32103', 'PUTUMAYO', '593', '3', '21', '03', 'C', '278');
INSERT INTO `tabla_naciones` VALUES ('32104', 'SHUSHUFINDI', '593', '3', '21', '04', 'C', '279');
INSERT INTO `tabla_naciones` VALUES ('32105', 'SUCUMBIOS', '593', '3', '21', '05', 'C', '280');
INSERT INTO `tabla_naciones` VALUES ('32106', 'CASCALES', '593', '3', '21', '06', 'C', '281');
INSERT INTO `tabla_naciones` VALUES ('32107', 'CUYABENO', '593', '3', '21', '07', 'C', '282');
INSERT INTO `tabla_naciones` VALUES ('322', 'ORELLANA', '593', '3', '22', '.', 'P', '283');
INSERT INTO `tabla_naciones` VALUES ('32201', 'ORELLANA', '593', '3', '22', '01', 'C', '284');
INSERT INTO `tabla_naciones` VALUES ('32202', 'AGUARICO', '593', '3', '22', '02', 'C', '285');
INSERT INTO `tabla_naciones` VALUES ('32203', 'LA JOYA DE LOS SACHAS', '593', '3', '22', '03', 'C', '286');
INSERT INTO `tabla_naciones` VALUES ('32204', 'LORETO', '593', '3', '22', '04', 'C', '287');
INSERT INTO `tabla_naciones` VALUES ('4', 'INSULAR', '593', '4', '.', '.', 'R', '288');
INSERT INTO `tabla_naciones` VALUES ('420', 'GALAPAGOS', '593', '4', '20', '.', 'P', '289');
INSERT INTO `tabla_naciones` VALUES ('42001', 'SAN CRISTOBAL', '593', '4', '20', '01', 'C', '290');
INSERT INTO `tabla_naciones` VALUES ('42002', 'ISABELA', '593', '4', '20', '02', 'C', '291');
INSERT INTO `tabla_naciones` VALUES ('42003', 'SANTA CRUZ', '593', '4', '20', '03', 'C', '292');
INSERT INTO `tabla_naciones` VALUES ('42004', 'PUERTO AYORA', '593', '4', '20', '04', 'C', '293');
INSERT INTO `tabla_naciones` VALUES ('999', 'OTRO', '999', '9', '99', '.', 'P', '294');
INSERT INTO `tabla_naciones` VALUES ('99999', 'OTRO', '999', '9', '99', '99', 'C', '295');

-- ----------------------------
-- Table structure for tabla_referenciales_sri
-- ----------------------------
DROP TABLE IF EXISTS `tabla_referenciales_sri`;
CREATE TABLE `tabla_referenciales_sri` (
  `Tipo_Referencia` varchar(15) DEFAULT NULL,
  `Codigo` varchar(6) DEFAULT NULL,
  `Descripcion` varchar(130) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDX_Tabla_Referenciales_SRI` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tabla_referenciales_sri
-- ----------------------------
INSERT INTO `tabla_referenciales_sri` VALUES ('IDENTIFICACION', '0', 'No aplica', '1');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '0', '.', '2');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '01', 'SIN UTILIZACION DEL SISTEMA FINANCIERO', '3');
INSERT INTO `tabla_referenciales_sri` VALUES ('TARJETAS', '01', 'AMERICAN EXPRESS', '4');
INSERT INTO `tabla_referenciales_sri` VALUES ('EXPORTACION', '01', 'Con Refrendo', '5');
INSERT INTO `tabla_referenciales_sri` VALUES ('TIPO DE PAGO', '01', 'PAGO LOCAL', '6');
INSERT INTO `tabla_referenciales_sri` VALUES ('TRABAJADOR', '01', 'No aplica', '7');
INSERT INTO `tabla_referenciales_sri` VALUES ('PARENTESCO', '01', 'Conyuge', '8');
INSERT INTO `tabla_referenciales_sri` VALUES ('TRABAJADOR', '02', 'Trabajador con discapacidad', '9');
INSERT INTO `tabla_referenciales_sri` VALUES ('PARENTESCO', '02', 'Hijo[a]', '10');
INSERT INTO `tabla_referenciales_sri` VALUES ('TIPO DE PAGO', '02', 'PAGO AL EXTERIOR', '11');
INSERT INTO `tabla_referenciales_sri` VALUES ('EXPORTACION', '02', 'Sin Refrendo', '12');
INSERT INTO `tabla_referenciales_sri` VALUES ('TARJETAS', '02', 'DINERS CLUB', '13');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '02', 'CHEQUE PROPIO', '14');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '03', 'CHEQUE CERTIFICADO', '15');
INSERT INTO `tabla_referenciales_sri` VALUES ('TARJETAS', '03', 'MASTERCARD', '16');
INSERT INTO `tabla_referenciales_sri` VALUES ('PARENTESCO', '03', 'Madre', '17');
INSERT INTO `tabla_referenciales_sri` VALUES ('TRABAJADOR', '03', 'Trabajador que actua en calidad de sustituto de una persona con discapacidad', '18');
INSERT INTO `tabla_referenciales_sri` VALUES ('TRABAJADOR', '04', 'Trabajador tiene conyuge pareja en union de hecho o hijo con discapacidad y se encuentra bajo su cuidado y/o responsabilidad', '19');
INSERT INTO `tabla_referenciales_sri` VALUES ('PARENTESCO', '04', 'Padre', '20');
INSERT INTO `tabla_referenciales_sri` VALUES ('TARJETAS', '04', 'VISA', '21');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '04', 'CHEQUE DE GERENCIA', '22');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '05', 'CHEQUE DEL EXTERIOR', '23');
INSERT INTO `tabla_referenciales_sri` VALUES ('TARJETAS', '05', 'OTRA TARJETA', '24');
INSERT INTO `tabla_referenciales_sri` VALUES ('PARENTESCO', '05', 'Padres', '25');
INSERT INTO `tabla_referenciales_sri` VALUES ('PARENTESCO', '06', 'Abuelo[a]', '26');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '06', 'DEBITO DE CUENTA', '27');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '07', 'TRANSFERENCIA PROPIO BANCO', '28');
INSERT INTO `tabla_referenciales_sri` VALUES ('PARENTESCO', '07', 'Hermano[a]', '29');
INSERT INTO `tabla_referenciales_sri` VALUES ('PARENTESCO', '08', 'Tio[a]', '30');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '08', 'TRANSFERENCIA OTRO BANCO NACIONAL', '31');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '09', 'TRANSFERENCIA BANCO EXTERIOR', '32');
INSERT INTO `tabla_referenciales_sri` VALUES ('PARENTESCO', '09', 'Sobrino[a]', '33');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '1', 'BCE - SISTEMA DE PAGOS INTERBANCARIO - SPI', '34');
INSERT INTO `tabla_referenciales_sri` VALUES ('PARENTESCO', '10', 'Primo[a]', '35');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '10', 'TARJETA DE CREDITO NACIONAL', '36');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '10', 'BANCO PICHINCHA', '37');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '11', 'TARJETA DE CREDITO INTERNACIONAL', '38');
INSERT INTO `tabla_referenciales_sri` VALUES ('PARENTESCO', '11', 'Cunado[a]', '39');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '1119', 'COOP. DE AHORRO Y CREDITO ïONCE DE JUNIOï', '40');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '1141', 'COOP. DE AHORRO Y CRED. ïSANTA ROSAï LTDA', '41');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '1182', 'COOP. DE AHORRO Y CREDITO SAN FRANCISCO DE ASIS LTDA', '42');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '12', 'GIRO', '43');
INSERT INTO `tabla_referenciales_sri` VALUES ('PARENTESCO', '12', 'Compadre', '44');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '13', 'DEPOSITO EN CUENTA [CORRIENTE/AHORROS]', '45');
INSERT INTO `tabla_referenciales_sri` VALUES ('PARENTESCO', '13', 'Comadre', '46');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '14', 'ENDOSO DE INVERSIÒN', '47');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '15', 'COMPENSACION DE DEUDAS', '48');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '16', 'TARJETA DE DEBITO', '49');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '17', 'DINERO ELECTRONICO', '50');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '17', 'BANCO DE GUAYAQUIL S.A', '51');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '18', 'TARJETA PREPAGO', '52');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '19', 'TARJETA DE CREDITO', '53');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '2', 'BANCO DE FOMENTO', '54');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '20', 'OTROS CON UTILIZACION DEL SISTEMA FINANCIERO', '55');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '202', 'BANCO ECUATORIANO DE LA VIVIENDA', '56');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '203', 'CACPECO LTDA', '57');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '204', 'COOP. DE LA PEQUENA EMPRESA DE PASTAZA', '58');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '205', 'COOP. AHORRO Y CREDITO 23 DE JULIO', '59');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '206', 'COOP. AHORRO Y CREDITO 29 DE OCTUBRE', '60');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '207', 'COOP. AHORRO Y CREDITO ANDALUCIA', '61');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '208', 'COOP. AHORRO Y CREDITO COTOCOLLAO', '62');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '209', 'COOP. AHORRO Y CREDITO DESARROLLO PUEBLOS', '63');
INSERT INTO `tabla_referenciales_sri` VALUES ('FORMA DE PAGO', '21', 'ENDOSO DE TITULOS', '64');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '210', 'COOP. AHORRO Y CREDITO EL SAGRARIO', '65');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '211', 'COOP. AHORRO Y CREDITO GUARANDA LTDA', '66');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '2129', 'COOP. MANUEL ESTEBAN GODOY ORTEGA LTDA. COOPMEGO', '67');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '213', 'COOP. JUVENTUD ECUATORIANA PROGRESISTA LTDA', '68');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '215', 'BANCO COOPNACIONAL S.A', '69');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '216', 'COOP. AHORRO Y CREDITO OSCUS', '70');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '217', 'COOP. PABLO MUNOZ VEGA', '71');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '218', 'COOP. AHORRO Y CREDITO PROGRESO', '72');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '219', 'COOP. AHORRO Y CREDITO RIOBAMBA', '73');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '220', 'COOP. AHORRO Y CREDITO SAN FRANCISCO', '74');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '222', 'COOP. AHORRO Y CREDITO TULCAN', '75');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '223', 'COOP. ATUNTAQUI LTDA', '76');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '224', 'COOP. COMERCIO LTDA. [PORTOVIEJO]', '77');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '225', 'COOP. AHORRO Y CREDITO LA DOLOROSA LTDA', '78');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '226', 'COOP. PREVISION AHORRO Y DESARROLLO', '79');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '227', 'COOP.AHORRO Y CREDITO ALIANZA DEL VALLE LTDA', '80');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '228', 'COOPERATIVA DE AHORRO Y CREDITO CONSTRUCCION COMERCIO Y PRODUCCION LTDA', '81');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '229', 'COOP.AHORRO Y CREDITO CHONE LTDA', '82');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '231', 'COOP. AHORRO Y CREDITO SANTA ANA LTDA', '83');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '232', 'FINANCIERA - DINERS CLUB DEL ECUADOR S A', '84');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '233', 'MUTUALISTA AMBATO', '85');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '234', 'MUTUALISTA AZUAY', '86');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '236', 'MUTUALISTA IMBABURA', '87');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '238', 'MUTUALISTA PICHINCHA', '88');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '239', 'PACIFICARD', '89');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '24', 'BANCO CITY BANK', '90');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '25', 'BANCO MACHALA', '91');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '27', 'BANCO DELBANK S.A', '92');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '2753', 'COOP. AHORRO Y CREDITO 9 DE OCTUBRE LTDA', '93');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '29', 'BANCO DE LOJA', '94');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '30', 'BANCO DEL PACIFICO', '95');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '32', 'BANCO INTERNACIONAL', '96');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '3304', 'COOP. DE AHORRO Y CREDITO PADRE JULIAN LORENTE LTDA', '97');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '3352', 'COOP. AHORRO Y CREDITO DE LA LA PEQUENA EMPRESA CACPE BIBLIAN LTDA', '98');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '3364', 'COOP. AHORRO Y CREDITO SAN JOSE LTDA', '99');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '34', 'BANCO AMAZONAS', '100');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '35', 'BANCO DEL AUSTRO', '101');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '36', 'BANCO DE LA PRODUCCION-PROMERICA', '102');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '3615', 'COOP. DE AHORRO Y CREDITO JARDIN AZUAYO', '103');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '37', 'BANCO BOLIVARIANO', '104');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '39', 'BANCO COMERCIAL DE MANABI', '105');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '40', 'BANCO SIN ASIGNAR', '106');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4001', 'BANCO DEL INSTITUTO ECUATORIANO DE SEGURIDAD SOCIAL', '107');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4002', 'BANCO PARA LA ASISTENCIA COMUNITARIA FINCA S.A', '108');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4003', 'BANCO-D-MIRO S.A', '109');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4004', 'COOP. A Y C DE LA PEQ. EMP. CACPE ZAMORA LTDA', '110');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4005', 'COOP. A. Y C. CARROCEROS DE TUNGURAHUA', '111');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4006', 'COOP. AHO.Y CRED.NUEVOS HORIZONTES EL ORO LTDA', '112');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4007', 'COOP. AHORRO Y CREDITO AGRARIA MUSHUK KAWSAY LTDA', '113');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4008', 'COOP. AHORRO Y CREDITO ALIANZA MINAS LTDA', '114');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4009', 'COOP. AHORRO Y CREDITO CAMARA DE COMERCIO DEL CANTON BOLIVAR LTDA', '115');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4010', 'COOP. AHORRO Y CREDITO CAMARA DE COMERCIO INDIGENA DE GUAMOTE LTDA', '116');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4011', 'COOP. AHORRO Y CREDITO CARIAMANGA LTDA', '117');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4012', 'COOP. AHORRO Y CREDITO DE LA CAMARA DE COMERCIO DE PINDAL CADECOPI', '118');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4013', 'COOP. AHORRO Y CREDITO DE LA PEQUENA EMPRESA GUALAQUIZA', '119');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4014', 'COOP. AHORRO Y CREDITO FAMILIA AUSTRAL', '120');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4015', 'COOP. AHORRO Y CREDITO FUNDESARROLLO', '121');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4016', 'COOP. AHORRO Y CREDITO JUAN DE SALINAS LTDA', '122');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4017', 'COOP. AHORRO Y CREDITO LOS RIOS', '123');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4018', 'COOP. AHORRO Y CREDITO MALCHINGUI LTDA', '124');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4019', 'COOP. AHORRO Y CREDITO MANANTIAL DE ORO LTDA', '125');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4020', 'COOP. AHORRO Y CREDITO MI TIERRA', '126');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4021', 'COOP. AHORRO Y CREDITO NUEVA JERUSALEN', '127');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4022', 'COOP. AHORRO Y CREDITO PUELLARO LTDA', '128');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4023', 'COOP. AHORRO Y CREDITO SAN ANTONIO LTDA', '129');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4024', 'COOP. AHORRO Y CREDITO SAN GABRIEL LTDA', '130');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4025', 'COOP. AHORRO Y CREDITO SAN MIGUEL DE LOS BANCOS', '131');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4026', 'COOP. AHORRO Y CREDITO SEMILLA DEL PROGRESO LTDA', '132');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4027', 'COOP. AHORRO Y CREDITO SENOR DE GIRON', '133');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4028', 'COOP. AHORRO Y CREDITO TENA LTDA', '134');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4029', 'COOP. AHORRO Y CREDITO TUNGURAHUA LTDA', '135');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4030', 'COOP. AHORRO. Y CREDI. MUJERES UNIDAS TANTANAKUSHKA WARMIKUNAPAK CACMU LTDA', '136');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4031', 'COOP. DE A Y C EDUCADORES DE PASTAZA LTDA', '137');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4032', 'COOP. DE A Y C GONZANAMA [MIES]', '138');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4033', 'COOP. DE A Y C JUAN PIO DE MORA LTDA', '139');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4034', 'COOP. DE A. Y C. 23 DE MAYO LTDA', '140');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4035', 'COOP. DE A. Y C. BANOS LTDA', '141');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4036', 'COOP. DE A. Y C. CASAG LTDA', '142');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4037', 'COOP. DE A. Y C. CREDISUR LTDA', '143');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4038', 'COOP. DE A. Y C. DE LA PEQ. EMPRESA CACPE MACARA', '144');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4039', 'COOP. DE A. Y C. DE LOS SERV. PUBL. DEL MIN. DE EDUCACION Y CULTURA', '145');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4040', 'COOP. DE A. Y C. DEL COL. FISC. EXPER. VICENTE ROCAFUERTE', '146');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4041', 'COOP. DE A. Y C. DESARROLLO INTEGRAL LTDA', '147');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4042', 'COOP. DE A. Y C. ECUAFUTURO LTDA', '148');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4043', 'COOP. DE A. Y C. ESCENCIA INDIGENA LTDA', '149');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4044', 'COOP. DE A. Y C. FOCLA', '150');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4045', 'COOP. DE A. Y C. FUTURO Y PROGRESO DE GALAPAGOS LTDA', '151');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4046', 'COOP. DE A. Y C. GENERAL RUMINAHUI', '152');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4047', 'COOP. DE A. Y C. GRAMEEN AMAZONAS', '153');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4048', 'COOP. DE A. Y C. GUAMOTE LTDA', '154');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4049', 'COOP. DE A. Y C. LUCHA CAMPESINA LTDA', '155');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4050', 'COOP. DE A. Y C. MAQUITA CUSHUN LTDA', '156');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4051', 'COOP. DE A. Y C. MAQUITA CUSHUNCHIC LTDA', '157');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4052', 'COOP. DE A. Y C. PIJAL', '158');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4053', 'COOP. DE A. Y C. PROFESIONALES DEL VOLANTE UNION LTDA [MIES]', '159');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4054', 'COOP. DE A. Y C. SANTA ROSA DE PATUTAN LTDA', '160');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4055', 'COOP. DE A. Y C. SIERRA CENTRO LTDA', '161');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4056', 'COOP. DE A. Y C. SINCHI RUNA LTDA', '162');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4057', 'COOP. DE A. Y C. SUMAC LLACTA LTDA', '163');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4058', 'COOP. DE A. Y C. UNION MERCEDARIA LTDA', '164');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4059', 'COOP. DE A. Y C. VALLES DEL LIRIO', '165');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4060', 'COOP. DE A. Y C. VENCEDORES DE TUNGURAHUA', '166');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4061', 'COOP. DE AHORRO Y CREDITO ïSIMIATUG LTDAï', '167');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4062', 'COOP. DE AHORRO Y CREDITO 4 DE OCTUBRE LTDA', '168');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4063', 'COOP. DE AHORRO Y CREDITO ACCION Y DESARROLLO LTDA', '169');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4064', 'COOP. DE AHORRO Y CREDITO ALFONSO JARAMILLO C.C.C', '170');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4065', 'COOP. DE AHORRO Y CREDITO ANDINA LTDA', '171');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4066', 'COOP. DE AHORRO Y CREDITO CAMARA DE COMERCIO DE AMBATO LTDA', '172');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4067', 'COOP. DE AHORRO Y CREDITO CREDI FACIL LTDA', '173');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4068', 'COOP. DE AHORRO Y CREDITO CREDIAMIGO LTDA. LOJA [MIES]', '174');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4069', 'COOP. DE AHORRO Y CREDITO CRISTO REY', '175');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4070', 'COOP. DE AHORRO Y CREDITO DE LA PEQ. EMP. CACPE YANZATZA LTDA', '176');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4071', 'COOP. DE AHORRO Y CREDITO DORADO LTDA', '177');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4072', 'COOP. DE AHORRO Y CREDITO EDUC.DEL TUNGURAHUA LTDA', '178');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4073', 'COOP. DE AHORRO Y CREDITO EDUCADORES DE CHIMBORAZO', '179');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4074', 'COOP. DE AHORRO Y CREDITO HUAICANA LTDA', '180');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4075', 'COOP. DE AHORRO Y CREDITO HUAQUILLAS LTDA', '181');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4076', 'COOP. DE AHORRO Y CREDITO JADAN LTDA. [MIES]', '182');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4077', 'COOP. DE AHORRO Y CREDITO LA MERCED LTDA', '183');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4078', 'COOP. DE AHORRO Y CREDITO MUSHUC RUNA LTDA', '184');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4079', 'COOP. DE AHORRO Y CREDITO NUESTROS ABUELOS LTDA', '185');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4080', 'COOP. DE AHORRO Y CREDITO NUEVA HUANCAVILCA LTDA', '186');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4081', 'COOP. DE AHORRO Y CREDITO PEDRO MONCAYO LTDA', '187');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4082', 'COOP. DE AHORRO Y CREDITO PILAHUIN TIO LTDA', '188');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4083', 'COOP. DE AHORRO Y CREDITO PUERTO LOPEZ LTDA', '189');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4084', 'COOP. DE AHORRO Y CREDITO SAN MIGUEL DE SIGCHOS', '190');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4085', 'COOP. ESFUERZO UNIDO PARA EL DESARR. DEL CHILCO LA ESPERANZA', '191');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4086', 'COOP.AHORRO Y CREDITO DE LA PEQUENA EMPRESA DE LOJA CACPE LOJA LTDA', '192');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4087', 'COOP.AHORRO Y CREDITO PRIMERO DE ENERO DEL AUSTRO COOPEA', '193');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4088', 'COOP.DE AHORRO Y CREDITO COCA LTDA', '194');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4089', 'COOP.DE AHORRO Y CREDITO HUAYCO PUNGO LTDA', '195');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4091', 'COOPERATIVA 15 DE AGOSTO PILACOTO', '196');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4092', 'COOPERATIVA DE AHORRO Y CREDITO ïSAN JORGE LTDAï', '197');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4093', 'COOPERATIVA DE AHORRO Y CREDITO 27 DE ABRIL LOJA', '198');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4094', 'COOPERATIVA DE AHORRO Y CREDITO AGRICOLA ïJUNINï LTDA', '199');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4095', 'COOPERATIVA DE AHORRO Y CREDITO AMBATO LTDA', '200');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4096', 'COOPERATIVA DE AHORRO Y CREDITO ARTESANOS LTDA', '201');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4097', 'COOPERATIVA DE AHORRO Y CREDITO CAC-CICA [MIES]', '202');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4098', 'COOPERATIVA DE AHORRO Y CREDITO CACPE CELICA', '203');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4099', 'COOPERATIVA DE AHORRO Y CREDITO CATAMAYO LTDA. [MIES]', '204');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4100', 'COOPERATIVA DE AHORRO Y CREDITO EL CALVARIO LTDA', '205');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4101', 'COOPERATIVA DE AHORRO Y CREDITO ERCO LTDA', '206');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4102', 'COOPERATIVA DE AHORRO Y CREDITO FERNANDO DAQUILEMA', '207');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4103', 'COOPERATIVA DE AHORRO Y CREDITO FORTUNA [MIES]', '208');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4104', 'COOPERATIVA DE AHORRO Y CREDITO INTEGRAL', '209');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4105', 'COOPERATIVA DE AHORRO Y CREDITO LLANGANATES', '210');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4106', 'COOPERATIVA DE AHORRO Y CREDITO MARCABELI LTDA', '211');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4107', 'COOPERATIVA DE AHORRO Y CREDITO NUEVA ESPERANZA', '212');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4108', 'COOPERATIVA DE AHORRO Y CREDITO PILAHUIN', '213');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4109', 'COOPERATIVA DE AHORRO Y CREDITO PROVIDA', '214');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4110', 'COOPERATIVA DE AHORRO Y CREDITO PUCARA LTDA', '215');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4111', 'COOPERATIVA DE AHORRO Y CREDITO QUILANGA LTDA', '216');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4112', 'COOPERATIVA DE AHORRO Y CREDITO SAN JOSE S.J', '217');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4113', 'COOPERATIVA DE AHORRO Y CREDITO SANTA ANITA LTDA', '218');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4115', 'FONDO DE CESANTIA DEL MAGISTERIO ECUATORIANO FCME-FCPC', '219');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4116', 'INTERDIN S.A', '220');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4117', 'COOP. AHORRO Y CREDITO AMAZONAS LTDA', '221');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4118', 'COOP. DE A. Y C. FINANCIERA INDIGENA LTDA', '222');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4119', 'COOP. DE A. Y C. 20 DE FEBRERO LTDA', '223');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4120', 'COOP. DE A. Y C. EDUCADORES TULCAN LTDA', '224');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4166', 'FINANCIERA - CONSULCREDITO S.A', '225');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4167', 'COOPERATIVA DE AHORRO Y CREDITO HUINARA LTDA. [MIES]', '226');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4168', 'COOP. DE A. Y C. INKA KIPU LTDA', '227');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4169', 'COOP. DE A. Y C. ACCION TUNGURAHUA LTDA', '228');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4170', 'COOP. DE A. Y C. 16 DE JUNIO', '229');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4171', 'COOP. A.Y C. ESC.SUP.POLITEC. AGROP. DE MANABI MANUEL FELIX LOPEZ LTDA', '230');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4172', 'COOP. DE A. Y C. INDIGENA ALFA Y OMEGA LTDA.ALFA Y OMEGA LTDA', '231');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4173', 'COOP. DE A. Y C. FENIX', '232');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4174', 'COOP. DE AHORRO Y CREDITO LOS ANDES LATINOS LTDA', '233');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4175', 'COOP. DE AHORRO Y CREDITO GUARUMAL DEL CENTRO LTDA', '234');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4177', 'COOP. DE A. Y C. COOPAC AUSTRO LTDA [MIESS]', '235');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4178', 'COOPERATIVA DE AHORRO Y CREDITO CREA LTDA [ MIES]', '236');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4179', 'CCOP. DE A. Y C. SALASACA', '237');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4180', 'COOP. DE A. Y C. SUMAK SAMY LTDA', '238');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4181', 'COOP. DE A. Y C. INTERCULT. TARPUK RUNA LTDA', '239');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4182', 'COOP. DE A. Y C. CHIBULEO LTDA', '240');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4183', 'COOP. DE A. Y C. EL TESORO PILLARENO', '241');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4184', 'COOP. DE A. Y C. KISAPINCHA LTDA', '242');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4185', 'COOP. DE A. Y C. JUVENTUD UNIDA LTDA', '243');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4186', 'COOP. DE A. Y C. UNION QUISAPINCHA LTDA', '244');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4187', 'COOP. DE A. Y C. 13 DE ABRIL LTDA', '245');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4188', 'COOP. DE A. Y C. SALINAS LTDA', '246');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4189', 'COOP. DE A. Y C. SAN PEDRO LTDA', '247');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4190', 'COOP. DE A. Y C. VIRGEN DEL CISNE', '248');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4191', 'COOP. DE A. Y C. LOS CHASQUIS PASTOCALLE LTDA', '249');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4192', 'COOP. DE A. Y C. COOPINDIGENA LTDA', '250');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4193', 'COOP. DE A. Y C EDUCADORES DE ZAMORA CHINCHIPE', '251');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4194', 'COOPERATIVA DE AHORRO Y CREDITO LAS LAGUNAS [MIESS]', '252');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4195', 'COOP.DE A.Y C. EL COMERCIANTE LTDA [MIES]', '253');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4196', 'COOP. DE AHORRO Y CREDITO EDUCADORES DE EL ORO LTDA', '254');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4197', 'COOP. DE A. Y C. EMPLEADOS BANCARIOS DEL ORO LTDA', '255');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4198', 'COOPERATIVA DE AHORRO Y CREDITO RIOCHICO', '256');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4199', 'COOP. DE A. Y C. LA UNION LTDA', '257');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '42', 'BANCO GENERAL RUMINAHUI', '258');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4200', 'COOP. DE A. Y C. SAN MARTIN DE TISALEO LTDA', '259');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4201', 'COOP. DE A. Y C. ALLI TARPUC LTDA', '260');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4202', 'COOP. DE AHORRO Y CREDITO SAN MIGUEL DE PALLATANGA', '261');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4203', 'COOP. DE A. Y C. PADRE VICENTE PONCE RUBIO', '262');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4213', 'COOP. DE A. Y C. EL TRANSPORTISTA CACET', '263');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4216', 'COOP. DE A Y C. LUZ DEL VALLE', '264');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4217', 'COOP. DE A Y C. ESPERANZA Y PROGRESO DEL VALLE', '265');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4224', 'COOPERATIVA DE AHORRO Y CREDITO RUNA SHUNGO LTDA', '266');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '4227', 'BCE-TRANSFERENCIAS REMESAS', '267');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '43', 'BANCO DEL LITORAL S.A', '268');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '45', 'BANCO SUDAMERICANO', '269');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '50', 'BANCO COFIEC', '270');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5001', 'COOP. DE A. Y C. CORDILLERA DE LOS ANDES LTDA', '271');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5002', 'COOP. DE A. Y C. PUERTO FRANCISCO DE ORELLANA', '272');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5003', 'COOP. DE A. Y C. CHOCO TUNGURAHUA RUNA LTDA', '273');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5004', 'COOP. DE A. Y C. COOPARTAMOS LTDA', '274');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5005', 'COOP. DE A. Y C. CORPORACION CENTRO LTDA', '275');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5006', 'COOP DE A. Y C. SAN JUAN DE COTOGCHOA', '276');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5007', 'COOP. DE A. Y C. EMPRENDEDORES COOPEMPRENDER LTDA', '277');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5008', 'COOP. DE A. Y C. NUEVA LOJA LTDA', '278');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5009', 'COOP. DE A. Y C. PICHNCHA LTDA', '279');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5010', 'COOP.DE AHORRO Y CREDITO CACEC LTDA. [COTOPAXI]', '280');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5011', 'COOP.DE A. Y C. VENCEDORES DE PICHINCHA LTDA', '281');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5012', 'COOPERATIVA DE AHORRO Y CREDITO SAN BARTOLO LTDA', '282');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5013', 'COOP. DE AHORRO Y CREDITO ïEL DISCAPACITADOï LTDA', '283');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5014', 'COOP. DE A. Y C. DEL EMIGRANTE ECUATORIANO Y SU FAMILIA LTDA', '284');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5015', 'COOP. AHORRO Y CREDITO LA LIBERTAD LTDA', '285');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5016', 'COAC CUNA DE LA NACIONALIDAD LTDA', '286');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5017', 'COOP. DE A Y C. SERVIDORES MUNICIPALES DE CUENCA', '287');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5018', 'COOP. DE A. Y C. SAN MARCOS', '288');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5019', 'COOP. DE AHORRO Y CREDITO PROFUTURO LTDA', '289');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5020', 'COOPERATIVA DE AHORRO Y CREDITO MACODES LTDA', '290');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5021', 'COOPERATIVA DE AHORRO Y CREDITO GUACHAPALA LTDA', '291');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5022', 'COOPERATIVA DE AHORRO Y CREDITO SANTA ISABEL LTDA', '292');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5023', 'COOPERATIVA DE AHORRO Y CREDITO GANANSOL LTDA', '293');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5024', 'COOPERATIVA DE AHORRO Y CREDITO DEL AZUAY', '294');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5025', 'COAC DEL SINDICATO DE CHOFERES PROFESIONALES DEL AZUAY', '295');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5026', 'COOPERATIVA DE AHORRO Y CREDITO DEL COLEGIO DE ARQUITECTOS DEL AZUAY', '296');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5027', 'COOPERATIVA DE AHORRO Y CREDITO NUKANCHIK', '297');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5028', 'COOPERATIVA DE AHORRO Y CREDITO SANTA ANA LTDA', '298');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5029', 'COOPERATIVA DE AHORRO Y CREDITO MULTIEMPRESARIAL LTDA', '299');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5031', 'COOP. DE A. Y C. INDIGENA SAC PELILEO', '300');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5032', 'COOP. DE A. Y C. INTERCULTURAL TAWANTINSUYU LTDA', '301');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5033', 'COOP. DE A. Y C. OCIPSA', '302');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5034', 'COOP. DE A. Y C. MUSHUG CAUSAY LTDA', '303');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5035', 'COOP. DE A. Y C. 21 DE NOVIEMBRE LTDA', '304');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5036', 'COOP. DE A. Y C. LA FLORESTA LTDA', '305');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5037', 'COOP. DE A. Y C. CORP. ORG. CAMPESINAS DE QUISAPINCHA COCIQ', '306');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5038', 'COOP. DE A. Y C. MULTICULTURAL BANCO INDIGENA LTDA', '307');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5039', 'COOP DE A. Y C. CRECER WINARI LTDA', '308');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5040', 'COOP. DE A. Y C. BANOS DE AGUA SANTA LTDA', '309');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5041', 'COOP. DE AHORRO Y CREDITO 1 DE JULIO', '310');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5042', 'COOP. DE A. Y C. SUMAK NAN LTDA', '311');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5043', 'COOPERATIVA DE AHORRO Y CREDITO CANAR LTDA', '312');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5044', 'COOPERATIVA DE AHORRO Y CREDITO SAN ANTONIO LTDA', '313');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5045', 'COOP. DE AHORRO Y CREDITO FUNDAR', '314');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5046', 'COAC BUENA FE LTDA', '315');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5047', 'COOP. AHORRO Y CREDITO METROPOLIS LTDA', '316');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5048', 'COOP. DE AHORRO Y CREDITO EL CAFETAL', '317');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5049', 'COOP.DE AHORRO Y CREDITO MICROEMPRESARIAL ïSUCREï', '318');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5050', 'COOP. DE A. Y C. AFROECUATORIANA DE LA PEQ. EMP. LTDA CACAEPE', '319');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5051', 'COOPERATIVA DE AHORRO Y CREDITO JOYOCOTO LTDA', '320');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5052', 'COOP. DE A. Y C. UNIOTAVALO LTDA', '321');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5053', 'COOP. DE A. Y C. UNION EL EJIDO', '322');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5054', 'COOP. DE A. Y C. GENESIS LTDA', '323');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5055', 'COOP. DE A Y C. MARIA AUXILIADORA DE QUIROGA LTDA', '324');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5056', 'COOP. DE A. Y C. FORTALEZA', '325');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5057', 'COOP. DE A. Y C. PUJILI LTDA', '326');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5058', 'COOP. DE A. Y C. CREDIL LTDA', '327');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5059', 'COOP. DE A. Y C. COOPTOPAXI LTDA', '328');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5060', 'COOP. DE A. Y C. ILINIZA LTDA', '329');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5061', 'COOP. DE A. Y C. MUSHUK PAKARI LTDA', '330');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5062', 'COOP. DE A. Y C. UNIBLOCK Y SERVICIOS LTDA', '331');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5063', 'COOP. DE A. Y C. SAN FERNANDO LIMITADA', '332');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5064', 'COOP. DE A. Y C. FUTURO LAMANENSE', '333');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5065', 'COOP. DE A. Y C. SAQUISILI LTDA', '334');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5066', 'COOP. DE A. Y C. INNOVACION ANDINA LTDA', '335');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5067', 'COOP. DE A. Y C. MUSHUK WASI LTDA [ MIES ]', '336');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5068', 'COOP. DE AHORRO Y CREDITO SARAGUROS', '337');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5069', 'COOPERATIVA DE AHORRO Y CREDITO ïINTI WASIï LTDA. [MIES]', '338');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5070', 'COOPERATIVA DE AHORRO Y CREDITO CASA FACIL LTDA', '339');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5071', 'COOPERATIVA DE AHORRO Y CREDITO SOLIDARIA LTDA', '340');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5072', 'COOPERATIVA DE AHORRO Y CREDITO ECONOMIA DEL SUR ïECOSURï', '341');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5073', 'COOPERATIVA DE AHORRO Y CREDITO MIGRANTES Y EMPRENDEDORES', '342');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5074', 'COOPERATIVA DE AHORRO Y CREDITO SAN SEBASTIAN', '343');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5075', 'COOP. DE A. Y C. DEL SINDICATO DE CHOFERES PROFESIONALES DE LOJA', '344');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5077', 'COOPERATIVA DE AHORRO Y CREDITO SOCIO AMIGO', '345');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5078', 'COOP. DE A. Y C. INDIGENAS GALAPAGOS LTDA', '346');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5079', 'COOPERATIVA DE AHORRO Y CREDITO LA BENEFICA LTDA', '347');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5080', 'COOPERATIVA DE AHORRO Y CREDITO SAN ISIDRO LTDA', '348');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5081', 'COOP.DE AHORRO Y CREDITO ABDON CALDERON LTDA', '349');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5082', 'COOP. A Y C CAMARA DE COMERCIO CANTON -EL CARMEN LTDA', '350');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5083', 'COOP.DE AHORRO Y CREDITO AGROPRODUCTIVA MANABI LTDA', '351');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5084', 'COOP. DE AHORRO Y CRED. LA INMACULADA DE SAN PLACIDO LTDA', '352');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5085', 'COOP. AHORRO Y CREDITO CACPE MANABI', '353');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5086', 'COOP.AHORRO Y CREDITO MAGISTERIO MANABITA LIMITADA', '354');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5087', 'COAC TIENDA DE DINERO LTDA', '355');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5088', 'COOP.A.Y C. SANTA MARIA DE LA MANGA DEL CURA LTDA', '356');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5089', 'COOP. DE A. Y C. SOL DE LOS ANDES LTDA', '357');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5090', 'COOP. DE A.Y C. PRODUC. AHORRO INVERS. SERVICIO P.A.I.S. LTDA', '358');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5091', 'COOP. DE A. Y C. FRANDESC LTDA', '359');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5092', 'COOP. DE A. Y C. NUKA LLAKTA LTDA', '360');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5093', 'COOP. DE A Y C. CAMARA DE COMERCIO RIOBAMBA', '361');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5094', 'COOP. DE A. Y C. BASHALAN LTDA', '362');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '5095', 'COOP. DE A. Y C. CAMARA DE COMERCIO SANTO DOMINGO', '363');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '59', 'BANCO SOLIDARIO', '364');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '60', 'BANCO PROCREDIT S.A', '365');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '61', 'BANCO CAPITAL S.A', '366');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '66', 'BANECUADOR B.P.', '367');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '82', 'FINANCIERA - FINANCOOP', '368');
INSERT INTO `tabla_referenciales_sri` VALUES ('PARENTESCO', '98', 'Garante', '369');
INSERT INTO `tabla_referenciales_sri` VALUES ('PARENTESCO', '99', 'Otro', '370');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '9987', 'COOP. ïCALCETAï LTDA', '371');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '9988', 'COOPERATIVA DE AHORRO Y CREDITO MINGA LTDA', '372');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '9989', 'COOP. AHORRO Y CREDITO ACCION RURAL', '373');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '9995', 'COOP. AHORRO Y CREDITO 15 DE ABRIL LTDA', '374');
INSERT INTO `tabla_referenciales_sri` VALUES ('BANCOS Y COOP', '9997', 'COOP. DE AHORRO Y CREDITO POLICIA NACIONAL LTDA', '375');
INSERT INTO `tabla_referenciales_sri` VALUES ('ESTADO EMPRESA', 'BLOQ', 'Bloqueo definitivo', '376');
INSERT INTO `tabla_referenciales_sri` VALUES ('IDENTIFICACION', 'C', 'Cedula de Identidad', '377');
INSERT INTO `tabla_referenciales_sri` VALUES ('ESTADO EMPRESA', 'DBFULL', 'Su Base de Datos esta a punto de colapsar', '378');
INSERT INTO `tabla_referenciales_sri` VALUES ('ESTADO EMPRESA', 'DBMANT', 'Su Base de Datos Necesita Mantenimiento', '379');
INSERT INTO `tabla_referenciales_sri` VALUES ('IDENTIFICACION', 'F', 'Consumidor Final', '380');
INSERT INTO `tabla_referenciales_sri` VALUES ('SEXO', 'F', 'Femenino', '381');
INSERT INTO `tabla_referenciales_sri` VALUES ('SEXO', 'M', 'Masculino', '382');
INSERT INTO `tabla_referenciales_sri` VALUES ('ESTADO EMPRESA', 'MAS360', 'Cartera Vencida por mas 360', '383');
INSERT INTO `tabla_referenciales_sri` VALUES ('APLICA CONVENIO', 'NA', 'No aplica', '384');
INSERT INTO `tabla_referenciales_sri` VALUES ('APLICA CONVENIO', 'NO', 'Sin convenio', '385');
INSERT INTO `tabla_referenciales_sri` VALUES ('ESTADO EMPRESA', 'OK', 'Empresa al Dia', '386');
INSERT INTO `tabla_referenciales_sri` VALUES ('ESTADO EMPRESA', 'OKONLY', 'Empresa al dia solo lectura', '387');
INSERT INTO `tabla_referenciales_sri` VALUES ('ESTADO EMPRESA', 'ONLY', 'Empresa de Solo Lectura', '388');
INSERT INTO `tabla_referenciales_sri` VALUES ('IDENTIFICACION', 'P', 'Pasaporte', '389');
INSERT INTO `tabla_referenciales_sri` VALUES ('ESTADO EMPRESA', 'PAGO', 'Falta de Pago', '390');
INSERT INTO `tabla_referenciales_sri` VALUES ('ESTADO EMPRESA', 'PRUEBA', 'Empresa a prueba por 45 dias', '391');
INSERT INTO `tabla_referenciales_sri` VALUES ('IDENTIFICACION', 'R', 'Registro Unico Contribuyente', '392');
INSERT INTO `tabla_referenciales_sri` VALUES ('ESTADO EMPRESA', 'RENOV', 'Su contrato esta por vencer', '393');
INSERT INTO `tabla_referenciales_sri` VALUES ('APLICA CONVENIO', 'SI', 'Con convenio', '394');
INSERT INTO `tabla_referenciales_sri` VALUES ('ESTADO EMPRESA', 'VEN180', 'Cartera Vencida por 180', '395');
INSERT INTO `tabla_referenciales_sri` VALUES ('ESTADO EMPRESA', 'VEN30', 'Cartera Vencida por 30', '396');
INSERT INTO `tabla_referenciales_sri` VALUES ('ESTADO EMPRESA', 'VEN360', 'Cartera Vencida por 360', '397');
INSERT INTO `tabla_referenciales_sri` VALUES ('ESTADO EMPRESA', 'VEN60', 'Cartera Vencida por 60', '398');
INSERT INTO `tabla_referenciales_sri` VALUES ('ESTADO EMPRESA', 'VEN90', 'Cartera Vencida por 90', '399');
INSERT INTO `tabla_referenciales_sri` VALUES ('ESTADO EMPRESA', 'VRENOV', 'Su contrato esta vencido', '400');

-- ----------------------------
-- Table structure for tamanio
-- ----------------------------
DROP TABLE IF EXISTS `tamanio`;
CREATE TABLE `tamanio` (
  `id_tamanio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `precio` float(255,0) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tamanio`),
  KEY `FK_PRODUCTO_TAMANIO` (`id_producto`),
  CONSTRAINT `tamanio_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_productos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tamanio
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_concepto_retencion
-- ----------------------------
DROP TABLE IF EXISTS `tipo_concepto_retencion`;
CREATE TABLE `tipo_concepto_retencion` (
  `Concepto` varchar(230) DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `Codigo` varchar(5) DEFAULT NULL,
  `Ingresar_Porcentaje` varchar(1) DEFAULT NULL,
  `Fecha_Inicio` datetime DEFAULT NULL,
  `Fecha_Final` datetime DEFAULT NULL,
  `T` varchar(1) DEFAULT NULL,
  `Tipo_Pago` varchar(1) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDX_Tipo_Concepto_Retencion` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tipo_concepto_retencion
-- ----------------------------
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos por Rendimientos Financieros', '5', '308', 'N', '2002-01-01 00:00:00', '2004-03-31 00:00:00', 'N', 'L', '1');
INSERT INTO `tipo_concepto_retencion` VALUES ('Remuneraciones a Deportistas Entrenadores Cuerpo Tecnico y Arbitros', '5', '318', 'S', '2002-01-01 00:00:00', '2004-03-31 00:00:00', 'N', 'L', '2');
INSERT INTO `tipo_concepto_retencion` VALUES ('Transacciones de Bienes [Activos Fijos]', '1', '323', 'N', '2002-01-01 00:00:00', '2004-03-31 00:00:00', 'N', 'L', '3');
INSERT INTO `tipo_concepto_retencion` VALUES ('Transacciones de Bienes [Activos Corrientes]', '1', '325', 'N', '2002-01-01 00:00:00', '2004-03-31 00:00:00', 'N', 'L', '4');
INSERT INTO `tipo_concepto_retencion` VALUES ('Transacciones de Servicios', '1', '327', 'S', '2002-01-01 00:00:00', '2004-03-31 00:00:00', 'N', 'L', '5');
INSERT INTO `tipo_concepto_retencion` VALUES ('Intereses y Comisiones en Operaciones de Credito', '1', '411', 'N', '2002-01-01 00:00:00', '2004-03-31 00:00:00', 'N', 'L', '6');
INSERT INTO `tipo_concepto_retencion` VALUES ('Arrendamiento Mercantil Internacional por Pago de Intereses', '25', '419', 'N', '2002-01-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '7');
INSERT INTO `tipo_concepto_retencion` VALUES ('Arrendamiento Mercantil Internacional cuando no se ejerce la opcion de Compra', '25', '421', 'N', '2002-01-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '8');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos Por Seguros y Reaseguros', '1', '307', 'N', '2002-02-01 00:00:00', '2003-02-28 00:00:00', 'N', 'L', '9');
INSERT INTO `tipo_concepto_retencion` VALUES ('Honorarios Personas Naturales', '8', '302', 'N', '2003-03-01 00:00:00', '2003-03-31 00:00:00', 'N', 'L', '10');
INSERT INTO `tipo_concepto_retencion` VALUES ('Arrendamiento de Bienes Inmuebles de Propiedad de Personas Naturales', '8', '306', 'N', '2003-03-01 00:00:00', '2003-03-31 00:00:00', 'N', 'L', '11');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos Por Seguros y Reaseguros', '1', '307', 'N', '2003-03-01 00:00:00', '2003-03-31 00:00:00', 'N', 'L', '12');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos realizados a Notarios y Registradores de Propiedad o Mercantiles', '8', '337', 'N', '2003-03-01 00:00:00', '2004-03-31 00:00:00', 'N', 'L', '13');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos de Dividendos Anticipados', '25', '339', 'N', '2003-03-01 00:00:00', '2004-03-31 00:00:00', 'N', 'L', '14');
INSERT INTO `tipo_concepto_retencion` VALUES ('Honorarios Personas Naturales', '8', '303', 'N', '2003-04-01 00:00:00', '2006-12-31 00:00:00', 'N', 'L', '15');
INSERT INTO `tipo_concepto_retencion` VALUES ('Remuneracion a Otros Trabajadores Autonomos [N]', '1', '304', 'N', '2003-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '16');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compras Locales de Materia Prima [N]', '1', '306', 'N', '2003-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '17');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compras Locales de Bienes No Producidos por la Sociedad [N]', '1', '307', 'N', '2003-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '18');
INSERT INTO `tipo_concepto_retencion` VALUES ('Suministros y Materiales [N]', '1', '309', 'N', '2003-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '19');
INSERT INTO `tipo_concepto_retencion` VALUES ('Repuestos y Herramientas [N]', '1', '310', 'N', '2003-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '20');
INSERT INTO `tipo_concepto_retencion` VALUES ('Lubricantes [N]', '1', '311', 'N', '2003-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '21');
INSERT INTO `tipo_concepto_retencion` VALUES ('Activos Fijos [N]', '1', '312', 'N', '2003-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '22');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por Concepto de Servicio de Transporte Privado de Pasajeros o Servicio Publico o Privado de Carga[N]', '1', '313', 'N', '2003-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '23');
INSERT INTO `tipo_concepto_retencion` VALUES ('Regalias Derechos de Autor Marcas Patentes y Similares', '0', '314', 'N', '2003-04-01 00:00:00', '2004-03-30 00:00:00', 'N', 'L', '24');
INSERT INTO `tipo_concepto_retencion` VALUES ('Intereses de Creditos Externos registrados en el BCE [N]', '25', '405', 'N', '2003-04-01 00:00:00', '2008-03-31 00:00:00', 'S', 'L', '25');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago Local a Extranjeros por Servicios Ocasionales', '25', '305', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '26');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compras Locales de Materia Prima no Sujeta a retencion [N]', '0', '308', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '27');
INSERT INTO `tipo_concepto_retencion` VALUES ('Regalias Derechos de Autor Marcas Patentes y Similares - Sociedades', '1', '314', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'S', 'L', '28');
INSERT INTO `tipo_concepto_retencion` VALUES ('Regalias Derechos de Autor Marcas Patentes y Similares - Personas Naturales', '8', '314', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '29');
INSERT INTO `tipo_concepto_retencion` VALUES ('Remuneraciones a Deportistas Entrenadores Cuerpo Tecnico y Arbitros', '5', '315', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '30');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos realizados a Notarios y Registradores de Propiedad o Mercantiles', '8', '316', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '31');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por Comisiones Pagadas a Sociedades [N]', '1', '317', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '32');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por Promocion y Publicidad [N]', '1', '318', 'S', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '33');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos por Arrendamientos Mercantil', '1', '319', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '34');
INSERT INTO `tipo_concepto_retencion` VALUES ('Arrendamiento de Bienes Inmuebles de Propiedad de Personas Naturales', '8', '320', 'N', '2004-04-01 00:00:00', '2006-12-31 00:00:00', 'N', 'L', '35');
INSERT INTO `tipo_concepto_retencion` VALUES ('Arrendamiento de Bienes Inmuebles de Propiedad de Sociedades [N]', '5', '321', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '36');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos por Seguros y Reaseguros [10% del valor de las primas facturadas]', '1', '322', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '37');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos por Rendimientos Financieros', '5', '323', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '38');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Depositos Cuenta Corriente', '5', '323A', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '39');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Depositos Cuenta Ahorros Sociedades', '5', '323B1', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'S', 'L', '40');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Depositos Cuenta Ahorros Persona Natural', '0', '323B2', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '41');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Depositos en Cuentas Corrientes Exentas', '0', '323C', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '42');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Compra Cancelacion o Redencion de Mini Bems y Bems 5', '5', '323D', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '43');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Deposito a Plazo', '5', '323E', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '44');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Operaciones de Reporto - REPOS', '5', '323F', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '45');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Inversiones [Captaciones]', '5', '323G', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '46');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Obligaciones', '5', '323H', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '47');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Bonos Convertible en Acciones', '5', '323I', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '48');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Bonos de Organismos y Gobiernos extranjeros', '5', '323J', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '49');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Bonos de Organismos y Gobiernos extranjeros', '5', '323K', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '50');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos o Creditos en Cuenta Real. Empresas Emis. Tarjetas de Credito', '1', '324', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '51');
INSERT INTO `tipo_concepto_retencion` VALUES ('Loterias Rifas Apuestas y Similares', '15', '325', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '52');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por Intereses y Comisiones en Operaciones de Credito entre las Instituciones Sistema Financiero [N]', '1', '326', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '53');
INSERT INTO `tipo_concepto_retencion` VALUES ('Venta de Combustibles a Comercializadoras', '0.2', '327', 'S', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '54');
INSERT INTO `tipo_concepto_retencion` VALUES ('Venta de Combustibles a Distribuidoras', '0.3', '328', 'S', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '55');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por Otros Servicios [N]', '1', '329', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '56');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos de Dividendos Anticipados', '25', '330', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '57');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por Agua Energia Luz y Telecomunicaciones [N]', '1', '331', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '58');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras Compras de Bienes y Servicios no Sujetas a Retencion [N]', '0', '332', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '59');
INSERT INTO `tipo_concepto_retencion` VALUES ('Convenio de Debito o Recaudacion', '0', '333', 'S', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '60');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago con Tarjeta de Credito', '0', '334', 'S', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '61');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por actividades de construccion de obra material inmueble urbanizacion lotizacion o actividades similares', '0', '335', 'N', '2004-04-01 00:00:00', '2007-06-30 00:00:00', 'S', 'L', '62');
INSERT INTO `tipo_concepto_retencion` VALUES ('Base Imponible Conv.Doble Tributacion', '0', '401', 'S', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '63');
INSERT INTO `tipo_concepto_retencion` VALUES ('Intereses y Costos Financieros por Financiamiento de Proveedores Externos [N]', '25', '403', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '64');
INSERT INTO `tipo_concepto_retencion` VALUES ('Intereses de Creditos Externos no registrados en el BCE [N]', '25', '407', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '65');
INSERT INTO `tipo_concepto_retencion` VALUES ('Comisiones y Exportaciones [N]', '25', '409', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '66');
INSERT INTO `tipo_concepto_retencion` VALUES ('Convenio de Doble Tributacion', '25', '410', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '67');
INSERT INTO `tipo_concepto_retencion` VALUES ('Comisiones Pagadas para la Promocion del Turismo Receptivo [N]', '25', '411', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '68');
INSERT INTO `tipo_concepto_retencion` VALUES ('El 4% de las Primas de Cesion o Reaseguros Contratados con Empresas que no tengan establecimiento o representacion permanente en E', '25', '413', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '69');
INSERT INTO `tipo_concepto_retencion` VALUES ('10% de los Pagos efectuados por las Agencias Internacionales de Prensa registradas en la Secretaria de Comunicacion del Estado', '25', '415', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '70');
INSERT INTO `tipo_concepto_retencion` VALUES ('El 10% del Valor de los Contratos de Fletamento de Naves para Empresas de Transporte Aereo o Maritimo Internacional [N]', '25', '417', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '71');
INSERT INTO `tipo_concepto_retencion` VALUES ('B. Imponible Arrendamiento Mercantil Internacional por Pago de Intereses', '25', '423', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '72');
INSERT INTO `tipo_concepto_retencion` VALUES ('B. Imponible Arrendamiento Mercantil Internacional cuando no se ejerce la opcion de Compra', '25', '425', 'N', '2004-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '73');
INSERT INTO `tipo_concepto_retencion` VALUES ('Honorarios Personas Naturales', '5', '303', 'N', '2007-01-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '74');
INSERT INTO `tipo_concepto_retencion` VALUES ('Arrendamiento de Bienes Inmuebles de Propiedad de Personas Naturales', '5', '320', 'N', '2007-01-01 00:00:00', '2007-06-30 00:00:00', 'N', 'L', '75');
INSERT INTO `tipo_concepto_retencion` VALUES ('Honorarios comisiones y dietas a personas naturales', '8', '303', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '76');
INSERT INTO `tipo_concepto_retencion` VALUES ('Remuneracion a Otros Trabajadores Autonomos [N]', '2', '304', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '77');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compras Locales de Materia Prima [N]', '2', '306', 'N', '2007-07-01 00:00:00', '2008-03-31 00:00:00', 'S', 'L', '78');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compras Locales de Bienes No Producidos por la Sociedad [N]', '2', '307', 'N', '2007-07-01 00:00:00', '2008-03-31 00:00:00', 'S', 'L', '79');
INSERT INTO `tipo_concepto_retencion` VALUES ('Suministros y Materiales [N]', '2', '309', 'N', '2007-07-01 00:00:00', '2008-03-31 00:00:00', 'S', 'L', '80');
INSERT INTO `tipo_concepto_retencion` VALUES ('Repuestos y Herramientas [N]', '2', '310', 'N', '2007-07-01 00:00:00', '2008-03-31 00:00:00', 'S', 'L', '81');
INSERT INTO `tipo_concepto_retencion` VALUES ('Lubricantes [N]', '2', '311', 'N', '2007-07-01 00:00:00', '2008-03-31 00:00:00', 'S', 'L', '82');
INSERT INTO `tipo_concepto_retencion` VALUES ('Activos Fijos [N]', '2', '312', 'N', '2007-07-01 00:00:00', '2008-03-31 00:00:00', 'S', 'L', '83');
INSERT INTO `tipo_concepto_retencion` VALUES ('Regalias Derechos de Autor Marcas Patentes y Similares - Sociedades', '2', '314', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '84');
INSERT INTO `tipo_concepto_retencion` VALUES ('Remuneraciones a Deportistas Entrenadores Cuerpo Tecnico y Arbitros', '8', '315', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '85');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por Comisiones Pagadas a Sociedades [N]', '2', '317', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '86');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por Promocion y Publicidad [N]', '2', '318', 'S', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '87');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos por Arrendamientos Mercantil', '2', '319', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '88');
INSERT INTO `tipo_concepto_retencion` VALUES ('Arrendamiento de Bienes Inmuebles de Propiedad de Personas Naturales', '8', '320', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '89');
INSERT INTO `tipo_concepto_retencion` VALUES ('Arrendamiento de Bienes Inmuebles de Propiedad de Sociedades [N]', '8', '321', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '90');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos por Seguros y Reaseguros [10% del valor de las primas facturadas]', '2', '322', 'N', '2007-07-01 00:00:00', '2008-03-31 00:00:00', 'S', 'L', '91');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos por Rendimientos Financieros', '2', '323', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '92');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Depositos Cuenta Corriente', '2', '323A', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '93');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Depositos Cuenta Ahorros Sociedades', '2', '323B1', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '94');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Compra Cancelacion o Redencion de Mini Bems y Bems 5', '2', '323D', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '95');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Deposito a Plazo', '2', '323E', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '96');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Operaciones de Reporto - REPOS', '2', '323F', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '97');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Inversiones [Captaciones]', '2', '323G', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '98');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Obligaciones', '2', '323H', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '99');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Bonos Convertible en Acciones', '2', '323I', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '100');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF: Bonos de Organismos y Gobiernos extranjeros', '2', '323J', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '101');
INSERT INTO `tipo_concepto_retencion` VALUES ('RF:Entre IFIs', '2', '323K', 'S', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '102');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos o Creditos en Cuenta Real. Empresas Emis. Tarjetas de Credito', '2', '324', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '103');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por Otros Servicios [N]', '2', '329', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '104');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por Agua Energia Luz y Telecomunicaciones [N]', '1', '331', 'S', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '105');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por actividades de construccion de obra material inmueble urbanizacion lotizacion o actividades similares', '2', '335', 'N', '2007-07-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '106');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compras Locales de Materia Prima [N]', '1', '306', 'N', '2008-04-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '107');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compras Locales de Bienes No Producidos por la Sociedad [N]', '1', '307', 'N', '2008-04-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '108');
INSERT INTO `tipo_concepto_retencion` VALUES ('Suministros y Materiales [N]', '1', '309', 'N', '2008-04-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '109');
INSERT INTO `tipo_concepto_retencion` VALUES ('Repuestos y Herramientas [N]', '1', '310', 'N', '2008-04-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '110');
INSERT INTO `tipo_concepto_retencion` VALUES ('Lubricantes [N]', '1', '311', 'N', '2008-04-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '111');
INSERT INTO `tipo_concepto_retencion` VALUES ('Activos Fijos [N]', '1', '312', 'N', '2008-04-01 00:00:00', '2008-12-31 00:00:00', 'N', 'L', '112');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos por Seguros y Reaseguros [10% del valor de las primas facturadas]', '1', '322', 'N', '2008-04-01 00:00:00', '2008-12-31 00:00:00', 'S', 'L', '113');
INSERT INTO `tipo_concepto_retencion` VALUES ('Honorarios profesionales y dietas', '8', '303', 'N', '2009-01-01 00:00:00', '2010-05-31 00:00:00', 'S', 'L', '114');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios predomina el intelecto', '8', '304', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '115');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios predomina la mano de obra', '2', '307', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '116');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios entre sociedades', '2', '308', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '117');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios publicidad y comunicacion', '1', '309', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '118');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicio transporte privado de pasajeros o servicio publico o privado de carga', '1', '310', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '119');
INSERT INTO `tipo_concepto_retencion` VALUES ('Transferencia de bienes muebles de naturaleza corporal', '1', '312', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '120');
INSERT INTO `tipo_concepto_retencion` VALUES ('Arrendamiento mercantil', '1', '319', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '121');
INSERT INTO `tipo_concepto_retencion` VALUES ('Arrendamiento bienes inmuebles', '8', '320', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '122');
INSERT INTO `tipo_concepto_retencion` VALUES ('Seguros y reaseguros [primas y cesiones]', '1', '322', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '123');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por rendimientos financieros [No aplica para IFIs]', '2', '323', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '124');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: depositos Cta Corriente', '2', '323A', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '125');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: depositos Cta Ahorros Sociedades', '2', '323B1', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '126');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: depositos Cta Ahorros Persona Natural', '0', '323B2', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '127');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por rendimientos financieros: depositos en cuentas exentas', '0', '323C', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '128');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por rendimientos financieros: compra cancelacion o redencion de mini bem´s y bem´s', '2', '323D', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '129');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: deposito a plazo', '2', '323E', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '130');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por rendimientos financieros: operaciones de reporto - repos', '2', '323F', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '131');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: inversiones [captaciones]', '2', '323G', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '132');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: obligaciones', '2', '323H', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '133');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: bonos convertible en acciones', '2', '323I', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '134');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: bonos de organismos y gobiernos extranjeros', '2', '323J', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '135');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: entre IFIs', '2', '323K', 'S', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '136');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por loterias rifas apuestas y similares', '15', '325', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '137');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por venta de combustibles a comercializadoras [2/ml]', '0.3', '327', 'S', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '138');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por venta de combustibles a distribuidores [2/ml]', '0.2', '328', 'S', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '139');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras compras de bienes y servicios no sujetas a retencion', '0', '332', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '140');
INSERT INTO `tipo_concepto_retencion` VALUES ('Convenio de Debito o Recaudacion', '0', '333', 'S', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '141');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por compras con tarjeta de credito', '0', '334', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '142');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras retenciones aplicables el 1%', '1', '340', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '143');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras retenciones aplicables el 2%', '2', '341', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '144');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras retenciones aplicables el 8%', '8', '342', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '145');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras retenciones aplicables el 25%', '25', '343', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '146');
INSERT INTO `tipo_concepto_retencion` VALUES ('Con convenio de doble tributacion', '0', '401', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '147');
INSERT INTO `tipo_concepto_retencion` VALUES ('Sin convenio de doble tributacion intereses y costos financieros por financiamiento de proveedores externos [en la cuantia que excede a la tasa maxima', '25', '403', 'S', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '148');
INSERT INTO `tipo_concepto_retencion` VALUES ('Sin convenio de doble tributacion intereses de creditos externos registrados en el BCE [en la cuantia que excede a la tasa maxima]', '25', '405', 'S', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '149');
INSERT INTO `tipo_concepto_retencion` VALUES ('Sin convenio de doble tributacion por otros conceptos', '25', '421', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '150');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos al exterior no sujetos a retencion', '0', '427', 'N', '2009-01-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '151');
INSERT INTO `tipo_concepto_retencion` VALUES ('Honorarios profesionales y dietas', '10', '303', 'S', '2010-06-01 00:00:00', '2012-12-31 00:00:00', 'S', 'L', '152');
INSERT INTO `tipo_concepto_retencion` VALUES ('Reembolsos de Gastos Compras de Quien Asume el Gasto', '0', '337', 'S', '2011-01-01 00:00:00', '2012-12-31 00:00:00', 'N', 'L', '153');
INSERT INTO `tipo_concepto_retencion` VALUES ('Honorarios Personas Naturales', '5', '302', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '154');
INSERT INTO `tipo_concepto_retencion` VALUES ('Honorarios profesionales y dietas', '10', '303', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '155');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios predomina el intelecto', '8', '304', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '156');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos por Arrendamiento Mercantil', '1', '305', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '157');
INSERT INTO `tipo_concepto_retencion` VALUES ('Arrendamiento de Bienes Inmuebles de Propiedad de Personas Naturales', '5', '306', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '158');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios predomina la mano de obra', '2', '307', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '159');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios entre sociedades', '2', '308', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '160');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios publicidad y comunicacion', '1', '309', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '161');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicio transporte privado de pasajeros o servicio publico o privado de carga', '1', '310', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '162');
INSERT INTO `tipo_concepto_retencion` VALUES ('Transferencia de bienes muebles de naturaleza corporal', '1', '312', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '163');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos por Comisiones', '1', '315', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '164');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos o Creditos en Cuenta Real. Empresas Emis. Tarjetas de Credito', '1', '316', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '165');
INSERT INTO `tipo_concepto_retencion` VALUES ('Regalias Derechos de Autor Marcas Patentes y Similares', '8', '317', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '166');
INSERT INTO `tipo_concepto_retencion` VALUES ('Arrendamiento mercantile', '1', '319', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '167');
INSERT INTO `tipo_concepto_retencion` VALUES ('Arrendamiento bienes inmuebles', '8', '320', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '168');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos por Servicios Petroleros', '1', '321', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '169');
INSERT INTO `tipo_concepto_retencion` VALUES ('Seguros y reaseguros [primas y cesiones]', '1', '322', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '170');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por rendimientos financieros [No aplica para IFIs]', '2', '323', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '171');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: depositos Cta Corriente', '2', '323A', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '172');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: depositos Cta Ahorros Sociedades', '2', '323B1', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '173');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: depositos Cta Ahorros Persona Natural', '0', '323B2', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '174');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por rendimientos financieros: depositos en cuentas exentas', '0', '323C', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '175');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por rendimientos financieros: compra cancelacion o redencion de mini bem´s y bem´s', '2', '323D', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '176');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: deposito a plazo', '2', '323E', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '177');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por rendimientos financieros: operaciones de reporto – repos', '2', '323F', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '178');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: inversiones [captaciones]', '2', '323G', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '179');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: obligaciones', '2', '323H', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '180');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: bonos convertible en acciones', '2', '323I', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '181');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: bonos de organismos y gobiernos extranjeros', '2', '323J', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '182');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: entre IFIs', '2', '323K', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '183');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por loterias rifas apuestas y similares', '15', '325', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '184');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por venta de combustibles a comercializadoras', '2', '327', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '185');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por venta de combustibles a distribuidores', '3', '328', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '186');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras compras de bienes y servicios no sujetas a retencion', '0', '332', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '187');
INSERT INTO `tipo_concepto_retencion` VALUES ('Convenio de Debito o Recaudacion', '0', '333', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '188');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por compras con tarjeta de credito', '0', '334', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '189');
INSERT INTO `tipo_concepto_retencion` VALUES ('Reembolso de Gasto - Compra Intermediario', '0', '336', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '190');
INSERT INTO `tipo_concepto_retencion` VALUES ('Reembolso de Gasto - Compra de quien asume el gasto', '0', '337', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '191');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos de Dividendos Anticipados', '25', '339', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '192');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras retenciones aplicables el 1%', '1', '340', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '193');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras retenciones aplicables el 2%', '2', '341', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '194');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras retenciones aplicables el 8%', '8', '342', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '195');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras retenciones aplicables a la tarifa de impuesto a la renta prevista para sociedades', '22', '343', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '196');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras retenciones aplicables a otros porcentajes', '0', '344', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '197');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos personas naturales residents', '10', '345', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '198');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos sociedades en paraisos fiscales', '35', '346', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '199');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos anticipados', '22', '347', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '200');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compra local de banano a productor', '2', '348', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '201');
INSERT INTO `tipo_concepto_retencion` VALUES ('Impuesto a la actividad bananera productor-exportador', '2', '349', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '202');
INSERT INTO `tipo_concepto_retencion` VALUES ('Conv. Doble Tributacion', '0', '407', 'N', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '203');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Rentas Inmobiliarias', '0', '500', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '204');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Beneficios Empresariales', '0', '501', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '205');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Servicios Empresariales', '0', '502', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '206');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Navegacion Maritima y/o aerea', '0', '503', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '207');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior – Dividendos', '0', '504', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '208');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior – Intereses', '0', '505', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '209');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Intereses por Finaciamiento de proveedores externos', '0', '506', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '210');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Intereses de creditos externos', '0', '507', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '211');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Creditos de IFIs organismos y gobierno a gobierno', '0', '508', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '212');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Canones o regalias', '0', '509', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '213');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Ganancias de capital', '0', '510', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '214');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Servicios profesionales independientes', '0', '511', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '215');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Servicios profesionales dependientes', '0', '512', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '216');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Artistas y deportistas', '0', '513', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '217');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Participacion de consejeros', '0', '514', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '218');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Entretenimiento Publico', '0', '515', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '219');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior – Pensiones', '0', '516', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '220');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Reembolso de Gastos', '0', '517', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '221');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Funciones Pùblicas', '0', '518', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '222');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior – Estudiantes', '0', '519', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '223');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Por otros conceptos', '0', '520', 'S', '2013-01-01 00:00:00', '2014-09-30 00:00:00', 'N', 'L', '224');
INSERT INTO `tipo_concepto_retencion` VALUES ('Honorarios profesionales y demas pagos por servicios relacionados con el titulo profesional', '10', '303', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '225');
INSERT INTO `tipo_concepto_retencion` VALUES ('Utilizacion o aprovechamiento de la imagen o renombre', '10', '303A', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '226');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios predomina el intelecto no relacionados con el titulo profesional', '8', '304', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '227');
INSERT INTO `tipo_concepto_retencion` VALUES ('Comisiones y demas pagos por servicios predomina intelecto no relacionados con el titulo profesional', '8', '304A', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '228');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos a notarios y registradores de la propiedad y mercantil por sus actividades ejercidas como tales', '8', '304B', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '229');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos a deportistas entrenadores arbitros miembros del cuerpo tecnico por sus actividades ejercidas como tales', '8', '304C', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '230');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos a artistas por sus actividades ejercidas como tales', '8', '304D', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '231');
INSERT INTO `tipo_concepto_retencion` VALUES ('Honorarios y demas pagos por servicios de docencia', '8', '304E', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '232');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios predomina la mano de obra', '2', '307', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '233');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios prestados por medios de comunicacion y agencias de publicidad', '1', '309', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '234');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicio de transporte privado de pasajeros o transporte publico o privado de carga', '1', '310', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '235');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por pagos a traves de liquidacion de compra [nivel cultural o rusticidad]', '2', '311', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '236');
INSERT INTO `tipo_concepto_retencion` VALUES ('Transferencia de bienes muebles de naturaleza corporal', '1', '312', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '237');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compra de bienes de origen agricola avicola pecuario apicola cunicula bioacuatico y forestal', '1', '312A', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '238');
INSERT INTO `tipo_concepto_retencion` VALUES ('Regalias por concepto de franquicias de acuerdo a Ley de Propiedad Intelectual - pago a personas naturales', '8', '314A', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '239');
INSERT INTO `tipo_concepto_retencion` VALUES ('Canones derechos de autor marcas patentes y similares de acuerdo a Ley de Propiedad Intelectual – pago a personas naturales', '8', '314B', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '240');
INSERT INTO `tipo_concepto_retencion` VALUES ('Regalias por concepto de franquicias de acuerdo a Ley de Propiedad Intelectual - pago a sociedades', '8', '314C', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '241');
INSERT INTO `tipo_concepto_retencion` VALUES ('Canones derechos de autor marcas patentes y similares de acuerdo a Ley de Propiedad Intelectual – pago a sociedades', '8', '314D', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '242');
INSERT INTO `tipo_concepto_retencion` VALUES ('Cuotas de arrendamiento mercantil inclusive la de opcion de compra', '1', '319', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '243');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por arrendamiento bienes inmuebles', '8', '320', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '244');
INSERT INTO `tipo_concepto_retencion` VALUES ('Seguros y reaseguros [primas y cesiones]', '1', '322', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '245');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por rendimientos financieros pagados a naturales y sociedades [No a IFIs]', '2', '323', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '246');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: depositos Cta. Corriente', '2', '323A', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '247');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: depositos Cta. Ahorros Sociedades', '2', '323B1', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '248');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por rendimientos financieros: compra cancelacion o redencion de mini bem´s y bem´s', '0', '323D', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '249');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: deposito a plazo fijo gravados', '2', '323E', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '250');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: deposito a plazo fijo exentos', '0', '323E2', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '251');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por rendimientos financieros: operaciones de reporto - repos', '2', '323F', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '252');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: inversiones [captaciones] rendimientos distintos de aquellos pagados a IFIs', '2', '323G', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '253');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: obligaciones', '2', '323H', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '254');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: bonos convertible en acciones', '2', '323I', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '255');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: Intereses en operaciones de credito entre instituciones del sistema financiero y entidades economia popular y solidaria', '1', '323K', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '256');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: Por inversiones entre instituciones del sistema financiero y entidades economia popular y solidaria', '1', '323L', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '257');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: Inversiones en titulos valores en renta fija gravados', '2', '323M', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '258');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: Inversiones en titulos valores en renta fija exentos', '0', '323N', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '259');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: Intereses pagados a bancos y otras entidades sometidas al control de la Superintendencia de Bancos y de la Economia Popular y Solidaria', '0', '323O', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '260');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: Intereses pagados por entidades del sector publico a favor de sujetos pasivos', '2', '323P', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '261');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: Otros intereses y rendimientos financieros gravados', '2', '323Q', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '262');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: Otros intereses y rendimientos financieros exentos', '0', '323R', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '263');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por loterias rifas apuestas y similares', '15', '325', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '264');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por venta de combustibles a comercializadoras [2/mil]', '2', '327', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '265');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por venta de combustibles a distribuidores [3/mil]', '2', '328', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '266');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras compras de bienes y servicios no sujetas a retencion', '0', '332', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '267');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por la enajenacion ocasional de acciones o participaciones y titulos valores', '0', '332A', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '268');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compra de bienes inmuebles', '0', '332B', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '269');
INSERT INTO `tipo_concepto_retencion` VALUES ('Transporte publico de pasajeros', '0', '332C', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '270');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos en el pais por transporte de pasajeros o transporte internacional de carga a companias nacionales o extranjeras de aviacion o maritimas', '0', '332D', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '271');
INSERT INTO `tipo_concepto_retencion` VALUES ('Valores entregados por las cooperativas de transporte a sus socios', '0', '332E', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '272');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compraventa de divisas distintas al dolar de los Estados Unidos de America', '0', '332F', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '273');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos con tarjeta de credito', '0', '334', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '274');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago local tarjeta de credito reportada por la Emisora de tarjeta de credito solo recap', '2', '335', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '275');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior tarjeta de credito reportada por la Emisora de tarjeta de credito solo recap', '0', '335A', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '276');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por energia electrica', '1', '340A', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '277');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por actividades de construccion de obra material inmueble urbanizacion lotizacion o actividades similares', '1', '340B', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '278');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras retenciones aplicables el 2%', '2', '341', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '279');
INSERT INTO `tipo_concepto_retencion` VALUES ('Ganancias de capital [0-10]', '10', '344A', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '280');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos personas naturales residentes en el Ecuador', '0', '345', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '281');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos gravados distribuidos en acciones [reinversion de utilidades sin derecho a reduccion tarifa IR]', '0', '345A', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '282');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos exentos a sociedades nacionales o extranjeras domiciliadas en el Ecuador', '0', '345B', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '283');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos exentos distribuidos en acciones [reinversion de utilidades con derecho a reduccion tarifa IR]', '0', '345C', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '284');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos anticipados', '22', '347', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '285');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos anticipados prestamos accionistas beneficiarios o partìcipes', '22', '347A', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '286');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compra local de banano a productor', '2', '348', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '287');
INSERT INTO `tipo_concepto_retencion` VALUES ('Impuesto a la actividad bananera productor-exportador', '2', '349', 'N', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'L', '288');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Rentas Inmobiliarias', '22', '500', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '289');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Beneficios Empresariales', '22', '501', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '290');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Servicios Empresariales', '22', '502', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '291');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Navegacion Maritima y/o aerea', '22', '503', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '292');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior- Dividendos', '22', '504', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '293');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Dividendos a sociedades en paraisos fiscales [entre 13 y 35]', '35', '504A', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '294');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Dividendos anticipados', '22', '504B', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '295');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Dividendos anticipados prestamos accionistas beneficiarios o partìcipes', '22', '504C', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '296');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Rendimientos financieros', '22', '505', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '297');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior – Intereses de creditos de Instituciones Financieras del exterior', '22', '505A', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '298');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior – Intereses de creditos de gobierno a gobierno', '22', '505B', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '299');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior – Intereses de creditos de organismos multilaterales', '22', '505C', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '300');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Intereses por financiamiento de proveedores externos', '22', '505D', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '301');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Intereses de otros creditos externos', '22', '505E', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '302');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Otros Intereses y Rendimientos Financieros', '22', '505F', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '303');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Canones derechos de autor marcas patentes y similares', '22', '509', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '304');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Regalias por concepto de franquicias', '22', '509A', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '305');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Ganancias de capital', '22', '510', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '306');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Servicios profesionales independientes', '22', '511', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '307');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Servicios profesionales dependientes', '22', '512', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '308');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Artistas', '22', '513', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '309');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Deportistas', '22', '513A', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '310');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Participacion de consejeros', '22', '514', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '311');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Entretenimiento Publico', '22', '515', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '312');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Pensiones', '22', '516', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '313');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Reembolso de Gastos', '22', '517', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '314');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Funciones Publicas', '22', '518', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '315');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Estudiantes', '22', '519', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '316');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Por otros conceptos', '22', '520', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '317');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Pago a proveedores de servicios hoteleros y turisticos en el exterior', '22', '520A', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '318');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Arrendamientos mercantil internacional', '22', '520B', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '319');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Seguros cesiones y reaseguros', '22', '520C', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '320');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Comisiones por exportaciones y por promocion de turismo receptivo', '22', '520D', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '321');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Por las empresas de transporte maritimo o aereo y por empresas pesqueras de alta mar por su actividad', '22', '520E', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '322');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Por las agencias internacionales de prensa', '22', '520F', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '323');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Contratos de fletamento de naves para empresas de transporte aereo o maritimo internacional', '22', '520G', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '324');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - No sujetos a retencion', '22', '521', 'S', '2014-10-01 00:00:00', '2015-02-28 00:00:00', 'S', 'E', '325');
INSERT INTO `tipo_concepto_retencion` VALUES ('Honorarios profesionales y demas pagos por servicios relacionados con el titulo profesional', '10', '303', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '326');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios predomina el intelecto no relacionados con el titulo profesional', '8', '304', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '327');
INSERT INTO `tipo_concepto_retencion` VALUES ('Comisiones y demas pagos por servicios predomina intelecto no relacionados con el titulo profesional', '8', '304A', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '328');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos a notarios y registradores de la propiedad y mercantil por sus actividades ejercidas como tales', '8', '304B', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '329');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos a deportistas entrenadores arbitros miembros del cuerpo tecnico por sus actividades ejercidas como tales', '8', '304C', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '330');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos a artistas por sus actividades ejercidas como tales', '8', '304D', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '331');
INSERT INTO `tipo_concepto_retencion` VALUES ('Honorarios y demas pagos por servicios de docencia', '8', '304E', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '332');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios predomina la mano de obra', '2', '307', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '333');
INSERT INTO `tipo_concepto_retencion` VALUES ('Utilizacion o aprovechamiento de la imagen o renombre', '10', '308', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '334');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios prestados por medios de comunicacion y agencias de publicidad', '1', '309', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '335');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicio de transporte privado de pasajeros o transporte publico o privado de carga', '1', '310', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '336');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por pagos a traves de liquidacion de compra [nivel cultural o rusticidad]', '2', '311', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '337');
INSERT INTO `tipo_concepto_retencion` VALUES ('Transferencia de bienes muebles de naturaleza corporal', '1', '312', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '338');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compra de bienes de origen agricola avicola pecuario apicola cunicula bioacuatico y forestal', '1', '312A', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '339');
INSERT INTO `tipo_concepto_retencion` VALUES ('Regalias por concepto de franquicias de acuerdo a Ley de Propiedad Intelectual - pago a personas naturales', '8', '314A', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '340');
INSERT INTO `tipo_concepto_retencion` VALUES ('Canones derechos de autor marcas patentes y similares de acuerdo a Ley de Propiedad Intelectual – pago a personas naturales', '8', '314B', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '341');
INSERT INTO `tipo_concepto_retencion` VALUES ('Regalias por concepto de franquicias de acuerdo a Ley de Propiedad Intelectual - pago a sociedades', '8', '314C', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '342');
INSERT INTO `tipo_concepto_retencion` VALUES ('Canones derechos de autor marcas patentes y similares de acuerdo a Ley de Propiedad Intelectual – pago a sociedades', '8', '314D', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '343');
INSERT INTO `tipo_concepto_retencion` VALUES ('Cuotas de arrendamiento mercantil inclusive la de opcion de compra', '1', '319', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '344');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por arrendamiento bienes inmuebles', '8', '320', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '345');
INSERT INTO `tipo_concepto_retencion` VALUES ('Seguros y reaseguros [primas y cesiones]', '1', '322', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '346');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por rendimientos financieros pagados a naturales y sociedades [No a IFIs]', '2', '323', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '347');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: Inversiones en titulos valores en renta fija gravados', '2', '323_M', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '348');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: Inversiones en titulos valores en renta fija exentos', '0', '323_N', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '349');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: Intereses pagados a bancos y otras entidades sometidas al control de la Superintendencia de Bancos y de la Economia Popular y Solidaria', '0', '323_O', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '350');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: Intereses pagados por entidades del sector publico a favor de sujetos pasivos', '2', '323_P', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '351');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: depositos Cta. Corriente', '2', '323A', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '352');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: depositos Cta. Ahorros Sociedades', '2', '323B1', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '353');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: deposito a plazo fijo gravados', '2', '323E', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '354');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: deposito a plazo fijo exentos', '0', '323E2', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '355');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por rendimientos financieros: operaciones de reporto - repos', '2', '323F', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '356');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: inversiones [captaciones] rendimientos distintos de aquellos pagados a IFIs', '2', '323G', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '357');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: obligaciones', '2', '323H', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '358');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: bonos convertible en acciones', '2', '323I', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '359');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: Otros intereses y rendimientos financieros gravados', '2', '323Q', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '360');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: Otros intereses y rendimientos financieros exentos', '0', '323R', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '361');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: Intereses en operaciones de credito entre instituciones del sistema financiero y entidades economia popular y solidaria', '1', '324A', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '362');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por RF: Por inversiones entre instituciones del sistema financiero y entidades economia popular y solidaria', '1', '324B', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '363');
INSERT INTO `tipo_concepto_retencion` VALUES ('Anticipo dividendos', '22', '325', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '364');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos anticipados prestamos accionistas beneficiarios o partìcipes', '22', '325A', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '365');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos distribuidos que correspondan al impuesto a la renta unico establecido en el art. 27 de la lrti [hasta el 100%]', '100', '326', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '366');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos distribuidos a personas naturales residentes [1% al 13%]', '13', '327', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '367');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos distribuidos a sociedades residentes [hasta el 100%]', '100', '328', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '368');
INSERT INTO `tipo_concepto_retencion` VALUES ('dividendos distribuidos a fideicomisos residentes [hasta el 100%]', '100', '329', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '369');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos gravados distribuidos en acciones [reinversion de utilidades sin derecho a reduccion tarifa IR]', '0', '330', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '370');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos exentos distribuidos en acciones [reinversion de utilidades con derecho a reduccion tarifa IR]', '0', '331', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '371');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras compras de bienes y servicios no sujetas a retencion', '0', '332', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '372');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por la enajenacion ocasional de acciones o participaciones y titulos valores', '0', '332A', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '373');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compra de bienes inmuebles', '0', '332B', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '374');
INSERT INTO `tipo_concepto_retencion` VALUES ('Transporte publico de pasajeros', '0', '332C', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '375');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos en el pais por transporte de pasajeros o transporte internacional de carga a companias nacionales o extranjeras de aviacion o maritimas', '0', '332D', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '376');
INSERT INTO `tipo_concepto_retencion` VALUES ('Valores entregados por las cooperativas de transporte a sus socios', '0', '332E', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '377');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compraventa de divisas distintas al dolar de los Estados Unidos de America', '0', '332F', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '378');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos con tarjeta de credito', '0', '332G', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '379');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior tarjeta de credito reportada por la Emisora de tarjeta de credito solo recap', '0', '332H', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '380');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a traves de convenio de debito [Clientes IFIS]', '0', '332I', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '381');
INSERT INTO `tipo_concepto_retencion` VALUES ('Enajenacion de derechos representativos de capital y otros derechos cotizados en bolsa ecuatoriana', '0.2', '333', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '382');
INSERT INTO `tipo_concepto_retencion` VALUES ('Enajenacion de derechos representativos de capital y otros derechos no cotizados en bolsa ecuatoriana', '1', '334', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '383');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por loterias rifas apuestas y similares', '15', '335', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '384');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por venta de combustibles a comercializadoras [2/mil]', '2', '336', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '385');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por venta de combustibles a distribuidores [3/mil]', '2', '337', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '386');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compra local de banano a productor [1% -2%]', '2', '338', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '387');
INSERT INTO `tipo_concepto_retencion` VALUES ('Liquidacion impuesto unico a la venta local de banano de produccion propia [hasta el 100%]', '100', '339', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '388');
INSERT INTO `tipo_concepto_retencion` VALUES ('Impuesto unico a la exportacion de banano de produccion propia - componente 1 [1% -2%]', '2', '340', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '389');
INSERT INTO `tipo_concepto_retencion` VALUES ('Impuesto unico a la exportacion de banano de produccion propia - componente 2 [125% - 2%]', '2', '341', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '390');
INSERT INTO `tipo_concepto_retencion` VALUES ('Impuesto unico a la exportacion de banano producido por terceros [05%-2%]', '2', '342', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '391');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras Retenciones Aplicables el 1%', '1', '343', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '392');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por energia electrica', '1', '343A', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '393');
INSERT INTO `tipo_concepto_retencion` VALUES ('Por actividades de construccion de obra material inmueble urbanizacion lotizacion o actividades similares', '1', '343B', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '394');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras retenciones aplicables el 2%', '2', '344', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '395');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago local tarjeta de credito reportada por la Emisora de tarjeta de credito solo recap', '2', '344A', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '396');
INSERT INTO `tipo_concepto_retencion` VALUES ('Ganancias de capital [entre 0 y 10]', '10', '346A', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'L', '397');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Rentas Inmobiliarias [entre 0 y 22]', '22', '500', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '398');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Beneficios Empresariales [entre 0 y 22]', '22', '501', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '399');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Servicios tecnicos administrativos o de consultoria y regalia', '35', '501A', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '400');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Servicios Empresariales [entre 0 y 22]', '22', '502', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '401');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Navegacion Maritima y/o aerea [entre 0 y 22]', '22', '503', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '402');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior- Dividendos distribuidos a personas naturales', '0', '504', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '403');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Dividendos a sociedades [hasta el 100%]', '100', '504A', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '404');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Anticipo dividendos', '22', '504B', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '405');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Dividendos anticipados prestamos accionistas beneficiarios o partìcipes [entre 0 y 22]', '22', '504C', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '406');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Dividendos a fideicomisos [hasta el 100%]', '100', '504D', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '407');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior- Dividendos distribuidos a personas naturales [paraisos fiscales]', '0', '504E', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '408');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Dividendos a sociedades [paraisos fiscales]', '13', '504F', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '409');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Anticipo dividendos [paraisos fiscales]', '25', '504G', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '410');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Dividendos a fideicomisos [paraisos fiscales]', '13', '504H', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '411');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Rendimientos financieros [entre 0 y 22]', '22', '505', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '412');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior – Intereses de creditos de Instituciones Financieras del exterior [entre 0 y 22]', '22', '505A', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '413');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior – Intereses de creditos de gobierno a gobierno [entre 0 y 22]', '22', '505B', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '414');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior – Intereses de creditos de organismos multilaterales [entre 0 y 22]', '22', '505C', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '415');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Intereses por financiamiento de proveedores externos [entre 0 y 22]', '22', '505D', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '416');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Intereses de otros creditos externos [entre 0 y 22]', '22', '505E', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '417');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Otros Intereses y Rendimientos Financieros [entre 0 y 22]', '22', '505F', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '418');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Canones derechos de autor marcas patentes y similares [entre 0 y 22]', '22', '509', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '419');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Regalias por concepto de franquicias [entre 0 y 22]', '22', '509A', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '420');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Ganancias de capital [entre 0 y 22]', '22', '510', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '421');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Servicios profesionales independientes [entre 0 y 22]', '22', '511', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '422');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Servicios profesionales dependientes [entre 0 y 22]', '22', '512', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '423');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Artistas [entre 0 y 22]', '22', '513', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '424');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Deportistas [entre 0 y 22]', '22', '513A', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '425');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Participacion de consejeros [entre 0 y 22]', '22', '514', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '426');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Entretenimiento Publico [entre 0 y 22]', '22', '515', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '427');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Pensiones [entre 0 y 22]', '22', '516', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '428');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Reembolso de Gastos [entre 0 y 22]', '22', '517', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '429');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Funciones Publicas [entre 0 y 22]', '22', '518', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '430');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Estudiantes [entre 0 y 22]', '22', '519', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '431');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Otros conceptos de ingresos gravados [entre 0 y 22]', '22', '520', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '432');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Pago a proveedores de servicios hoteleros y turisticos en el exterior [entre 0 y 22]', '22', '520A', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '433');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Arrendamientos mercantil internacional [entre 0 y 22]', '22', '520B', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '434');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Comisiones por exportaciones y por promocion de turismo receptivo [entre 0 y 22]', '22', '520D', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '435');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Por las empresas de transporte maritimo o aereo y por empresas pesqueras de alta mar por su actividad. [entre 0 y 22]', '22', '520E', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '436');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Por las agencias internacionales de prensa [entre 0 y 22]', '22', '520F', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '437');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Contratos de fletamento de naves para empresas de transporte aereo o maritimo internacional [entre 0 y 22]', '22', '520G', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '438');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Enajenacion de derechos representativos de capital y otros derechos', '5', '521', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '439');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Servicios tecnicos administrativos o de consultoria y regalias con convenio de doble tributacion [hasta el 100%]', '100', '522A', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '440');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Servicios tecnicos administrativos o de consultoria y regalias sin convenio de doble tributacion', '22', '522B', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '441');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Servicios tecnicos administrativos o de consultoria y regalias en paraisos fiscales', '35', '522C', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '442');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Seguros y reaseguros [primas y cesiones] con convenio de doble tributacion [hasta el 100%]', '100', '523A', 'S', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '443');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Seguros y reaseguros [primas y cesiones] sin convenio de doble tributacion', '22', '523B', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '444');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Seguros y reaseguros [primas y cesiones] en paraisos fiscales', '35', '523C', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '445');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior - Otros pagos al exterior no sujetos a retencion', '0', '524', 'N', '2015-03-01 00:00:00', '2020-03-31 00:00:00', 'S', 'E', '446');
INSERT INTO `tipo_concepto_retencion` VALUES ('Honorarios profesionales y demas pagos por servicios relacionados con el titulo profesional', '10', '303', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '447');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios predomina el intelecto no relacionados con el titulo profesional', '8', '304', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '448');
INSERT INTO `tipo_concepto_retencion` VALUES ('Comisiones y demas pagos por servicios predomina intelecto no relacionados con el titulo profesional', '8', '304A', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '449');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos a notarios y registradores de la propiedad y mercantil por sus actividades ejercidas como tales', '8', '304B', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '450');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos a deportistas entrenadores arbitros miembros del cuerpo tecnico por sus actividades ejercidas como tales', '8', '304C', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '451');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos a artistas por sus actividades ejercidas como tales', '8', '304D', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '452');
INSERT INTO `tipo_concepto_retencion` VALUES ('Honorarios y demas pagos por servicios de docencia', '8', '304E', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '453');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios predomina la mano de obra', '2', '307', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '454');
INSERT INTO `tipo_concepto_retencion` VALUES ('Utilizacion o aprovechamiento de la imagen o renombre', '10', '308', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '455');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicios prestados por medios de comunicacion y agencias de publicidad', '1.75', '309', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '456');
INSERT INTO `tipo_concepto_retencion` VALUES ('Servicio de transporte privado de pasajeros o transporte publico o privado de carga', '1', '310', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '457');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos a traves de liquidacion de compra [nivel cultural o rusticidad]', '2', '311', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '458');
INSERT INTO `tipo_concepto_retencion` VALUES ('Transferencia de bienes muebles de naturaleza corporal', '1.75', '312', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '459');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compra de bienes de origen agricola avicola pecuario apicola cunicula bioacuatico forestal y carnes en estado natural', '1', '312A', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '460');
INSERT INTO `tipo_concepto_retencion` VALUES ('Impuesto a la Renta unico para la actividad de produccion y cultivo de palma aceitera', '1', '312B', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '461');
INSERT INTO `tipo_concepto_retencion` VALUES ('Regalias por concepto de franquicias de acuerdo a Ley de Propiedad Intelectual - pago a personas naturales', '8', '314A', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '462');
INSERT INTO `tipo_concepto_retencion` VALUES ('Canones derechos de autor marcas patentes y similares de acuerdo a Ley de Propiedad Intelectual – pago a personas naturales', '8', '314B', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '463');
INSERT INTO `tipo_concepto_retencion` VALUES ('Regalias por concepto de franquicias de acuerdo a Ley de Propiedad Intelectual - pago a sociedades', '8', '314C', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '464');
INSERT INTO `tipo_concepto_retencion` VALUES ('Canones derechos de autor marcas patentes y similares de acuerdo a Ley de Propiedad Intelectual – pago a sociedades', '8', '314D', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '465');
INSERT INTO `tipo_concepto_retencion` VALUES ('Cuotas de arrendamiento mercantil [prestado por sociedades] inclusive la de opcion de compra', '1.75', '319', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '466');
INSERT INTO `tipo_concepto_retencion` VALUES ('Arrendamiento bienes inmuebles', '8', '320', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '467');
INSERT INTO `tipo_concepto_retencion` VALUES ('Seguros y reaseguros [primas y cesiones]', '1.75', '322', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '468');
INSERT INTO `tipo_concepto_retencion` VALUES ('Rendimientos financieros pagados a naturales y sociedades [No a IFIs]', '2', '323', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '469');
INSERT INTO `tipo_concepto_retencion` VALUES ('Rendimientos financieros depositos Cta. Corriente', '2', '323A', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '470');
INSERT INTO `tipo_concepto_retencion` VALUES ('Rendimientos financieros depositos Cta. Ahorros Sociedades', '2', '323B1', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '471');
INSERT INTO `tipo_concepto_retencion` VALUES ('Rendimientos financieros deposito a plazo fijo gravados', '2', '323E', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '472');
INSERT INTO `tipo_concepto_retencion` VALUES ('Rendimientos financieros deposito a plazo fijo exentos', '0', '323E2', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '473');
INSERT INTO `tipo_concepto_retencion` VALUES ('Rendimientos financieros operaciones de reporto - repos', '2', '323F', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '474');
INSERT INTO `tipo_concepto_retencion` VALUES ('Inversiones [captaciones] rendimientos distintos de aquellos pagados a IFIs', '2', '323G', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '475');
INSERT INTO `tipo_concepto_retencion` VALUES ('Rendimientos financieros obligaciones', '2', '323H', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '476');
INSERT INTO `tipo_concepto_retencion` VALUES ('Rendimientos financieros bonos convertible en acciones', '2', '323I', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '477');
INSERT INTO `tipo_concepto_retencion` VALUES ('Rendimientos financieros : Inversiones en titulos valores en renta fija gravados', '2', '323M', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '478');
INSERT INTO `tipo_concepto_retencion` VALUES ('Rendimientos financieros Inversiones en titulos valores en renta fija exentos', '0', '323N', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '479');
INSERT INTO `tipo_concepto_retencion` VALUES ('Intereses y demas rendimientos financieros pagados a bancos y otras entidades sometidas al control de la Superintendencia de Bancos y de la Economia Popular y Solidaria', '0', '323O', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '480');
INSERT INTO `tipo_concepto_retencion` VALUES ('Intereses pagados por entidades del sector publico a favor de sujetos pasivos', '2', '323P', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '481');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otros intereses y rendimientos financieros gravados', '2', '323Q', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '482');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otros intereses y rendimientos financieros exentos', '0', '323R', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '483');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos y creditos en cuenta efectuados por el BCE y los depositos centralizados de valores en calidad de intermediarios a instituciones del sistema financiero por cuenta de otras personas naturales y sociedades', '2', '323S', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '484');
INSERT INTO `tipo_concepto_retencion` VALUES ('Rendimientos financieros originados en la deuda publica ecuatoriana', '0', '323T', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '485');
INSERT INTO `tipo_concepto_retencion` VALUES ('Rendimientos financieros originados en titulos valores de obligaciones de 360 dias o mas para el financiamiento de proyectos publicos en asociacion publico-privada', '0', '323U', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '486');
INSERT INTO `tipo_concepto_retencion` VALUES ('Intereses en operaciones de credito entre instituciones del sistema financiero y entidades economia popular y solidaria', '1', '324A', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '487');
INSERT INTO `tipo_concepto_retencion` VALUES ('Inversiones entre instituciones del sistema financiero y entidades economia popular y solidaria', '1', '324B', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '488');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos y creditos en cuenta efectuados por el BCE y los depositos centralizados de valores en calidad de intermediarios a instituciones del sistema financiero por cuenta de otras instituciones del sistema financiero', '1', '324C', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '489');
INSERT INTO `tipo_concepto_retencion` VALUES ('Anticipo dividendos 22% o 25%', '22', '325', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '490');
INSERT INTO `tipo_concepto_retencion` VALUES ('Prestamos accionistas beneficiarios o participes residentes o establecidos en el Ecuador 22% o 25%', '22', '325A', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '491');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos distribuidos que correspondan al impuesto a la renta unico establecido en el art. 27 de la LRTI', '25', '326', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '492');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos distribuidos a personas naturales residentes', '25', '327', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '493');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos distribuidos a sociedades residentes', '0', '328', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '494');
INSERT INTO `tipo_concepto_retencion` VALUES ('dividendos distribuidos a fideicomisos residentes', '0', '329', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '495');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos en acciones [capitalizacion de utilidades]', '0', '331', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '496');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras compras de bienes y servicios no sujetas a retencion', '0', '332', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '497');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compra de bienes inmuebles', '0', '332B', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '498');
INSERT INTO `tipo_concepto_retencion` VALUES ('Transporte publico de pasajeros', '0', '332C', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '499');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos en el pais por transporte de pasajeros o transporte internacional de carga a companias nacionales o extranjeras de aviacion o maritimas', '0', '332D', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '500');
INSERT INTO `tipo_concepto_retencion` VALUES ('Valores entregados por las cooperativas de transporte a sus socios', '0', '332E', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '501');
INSERT INTO `tipo_concepto_retencion` VALUES ('Compraventa de divisas distintas al dolar de los Estados Unidos de America', '0', '332F', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '502');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pagos con tarjeta de credito', '0', '332G', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '503');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago al exterior tarjeta de credito reportada por la Emisora de tarjeta de credito solo recap', '0', '332H', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '504');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a traves de convenio de debito [Clientes IFIS]', '0', '332I', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '505');
INSERT INTO `tipo_concepto_retencion` VALUES ('Ganancia en la enajenacion de derechos representativos de capital u otros derechos que permitan la exploracion explotacion concesion o similares de sociedades que se coticen en bolsa de valores del Ecuador', '10', '333', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '506');
INSERT INTO `tipo_concepto_retencion` VALUES ('Contraprestacion producida por la enajenacion de derechos representativos de capital u otros derechos que permitan la exploracion explotacion concesion o similares de sociedades no cotizados en bolsa de valores del Ecuador', '1', '334', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '507');
INSERT INTO `tipo_concepto_retencion` VALUES ('Loterias rifas apuestas y similares', '15', '335', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '508');
INSERT INTO `tipo_concepto_retencion` VALUES ('Venta de combustibles a comercializadoras 2/mil', '2', '336', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '509');
INSERT INTO `tipo_concepto_retencion` VALUES ('Venta de combustibles a distribuidores 3/mil', '3', '337', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '510');
INSERT INTO `tipo_concepto_retencion` VALUES ('Produccion y venta local de banano producido o no por el mismo sujeto pasivo 1% a 2%', '1', '338', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '511');
INSERT INTO `tipo_concepto_retencion` VALUES ('Impuesto unico a la exportacion de banano', '3', '340', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '512');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras Retenciones Aplicables el 1%', '1', '343', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', 'L', '513');
INSERT INTO `tipo_concepto_retencion` VALUES ('Energia electrica', '1', '343A', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '514');
INSERT INTO `tipo_concepto_retencion` VALUES ('Actividades de construccion de obra material inmueble urbanizacion lotizacion o actividades similares', '1.75', '343B', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '515');
INSERT INTO `tipo_concepto_retencion` VALUES ('Impuesto Redimible a las botellas plasticas - IRBP', '1', '343C', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '516');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras retenciones aplicables el 2.75%', '2.75', '3440', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '517');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago local tarjeta de credito /debito reportada por la Emisora de tarjeta de credito / entidades del sistema financiero', '2', '344A', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '518');
INSERT INTO `tipo_concepto_retencion` VALUES ('Adquisicion de sustancias minerales dentro del territorio nacional', '2', '344B', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '519');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras retenciones aplicables el 8%', '8', '345', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '520');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras ganancias de capital distintas de enajenacion de derechos representativos de capital', '0', '346A', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '521');
INSERT INTO `tipo_concepto_retencion` VALUES ('Donaciones en dinero -Impuesto a la donaciones', '0', '346B', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '522');
INSERT INTO `tipo_concepto_retencion` VALUES ('Retencion a cargo del propio sujeto pasivo por la exportacion de concentrados y/o elementos metalicos 0% o 10%', '10', '346C', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '523');
INSERT INTO `tipo_concepto_retencion` VALUES ('Retencion a cargo del propio sujeto pasivo por la comercializacion de productos forestales 0% o 10%', '10', '346D', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '524');
INSERT INTO `tipo_concepto_retencion` VALUES ('Impuesto unico a ingresos provenientes de actividades agropecuarias en etapa de produccion / comercializacion local o exportacion', '1', '348', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '525');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras autoretenciones 150% o 175%', '1.75', '350', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '526');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Rentas Inmobiliarias 25% o 35%', '25', '500', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '527');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Beneficios/Servicios Empresariales 25% o 35%', '25', '501', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '528');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Servicios tecnicos administrativos o de consultoria y regalias 25% o 35%', '25', '501A', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '529');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes- Navegacion Maritima y/o aerea 0% o 25% o 35%', '0', '503', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '530');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes- Dividendos distribuidos a personas naturales [domicilados o no en paraiso fiscal] o a sociedades sin beneficiario efectivo persona natural residente en Ecuador', '25', '504', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '531');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos a sociedades con beneficiario efectivo persona natural residente en el Ecuador', '25', '504A', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '532');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos a no residentes incumpliendo el deber de informar la composicion societaria', '35', '504B', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '533');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos a residentes o establecidos en paraisos fiscales o regimenes de menor imposicion [con beneficiario Persona Natural residente en Ecuador]', '25', '504C', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '534');
INSERT INTO `tipo_concepto_retencion` VALUES ('Dividendos a fideicomisos o establecidos en paraisos fiscales o regimenes de menor imposicion [con beneficiario Persona Natural residente en Ecuador]', '25', '504D', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '535');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Anticipo dividendos [no domiciliada en paraisos fiscales o regimenes de menor imposicion] 22% o 25%', '22', '504E', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '536');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Anticipo dividendos [domiciliadas en paraisos fiscales o regimenes de menor imposicion] 22% o 25% o 28%', '22', '504F', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '537');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Prestamos accionistas beneficiarios o partìcipes [no domiciladas en paraisos fiscales o regimenes de menor imposicion] 22% o 25%', '22', '504G', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '538');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Prestamos accionistas beneficiarios o partìcipes [domiciladas en paraisos fiscales o regimenes de menor imposicion] 22% o 25% o 28%', '22', '504H', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '539');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Prestamos no comerciales a partes relacionadas [no domiciladas en paraisos fiscales o regimenes de menor imposicion] 22% o 25%', '22', '504I', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '540');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Prestamos no comerciales a partes relacionadas [domiciladas en paraisos fiscales o regimenes de menor imposicion] 22% o 25% o 28%', '22', '504J', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '541');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Rendimientos financieros 25% o 35%', '25', '505', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '542');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes – Intereses de creditos de Instituciones Financieras del exterior 0% o 25%', '25', '505A', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '543');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes – Intereses de creditos de gobierno a gobierno 0% o 25%', '25', '505B', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '544');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes – Intereses de creditos de organismos multilaterales 0% o 25%', '25', '505C', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '545');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Intereses por financiamiento de proveedores externos', '25', '505D', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '546');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Intereses de otros creditos externos', '25', '505E', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '547');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Otros Intereses y Rendimientos Financieros 25% o 35%', '25', '505F', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '548');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes- Canones derechos de autor marcas patentes y similares 25% o 35%', '25', '509', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '549');
INSERT INTO `tipo_concepto_retencion` VALUES ('PPago a no residentes - Regalias por concepto de franquicias 25% o 35%', '25', '509A', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '550');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Otras ganancias de capital distintas de enajenacion de derechos representativos de capital 5% 25% 35%', '5', '510', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '551');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Servicios profesionales independientes 25% o 35%', '25', '511', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '552');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Servicios profesionales dependientes 25% o 35%', '25', '512', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '553');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes- Artistas 25% o 35%', '25', '513', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '554');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Deportistas 25% o 35%', '25', '513A', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '555');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Participacion de consejeros 25% o 35%', '25', '514', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '556');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Entretenimiento Publico 25% o 35%', '25', '515', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '557');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Pensiones 25% o 35%', '25', '516', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '558');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes- Reembolso de Gastos 25% o 35%', '25', '517', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '559');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes- Funciones Publicas 25% o 35%', '25', '518', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '560');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Estudiantes 25% o 35%', '25', '519', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '561');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Pago a proveedores de servicios hoteleros y turisticos en el exterior 25% o 35%', '25', '520A', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '562');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Arrendamientos mercantil internacional 0% 25% 35%', '0', '520B', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '563');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Comisiones por exportaciones y por promocion de turismo receptivo 0% 25% 35%', '0', '520D', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '564');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Por las empresas de transporte maritimo o aereo y por empresas pesqueras de alta mar por su actividad', '0', '520E', 'N', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '565');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Por las agencias internacionales de prensa 0% 25% 35%', '0', '520F', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '566');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Contratos de fletamento de naves para empresas de transporte aereo o maritimo internacional 0% 25% 35%', '0', '520G', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '567');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Enajenacion de derechos representativos de capital u otros derechos que permitan la exploracion explotacion concesion o similares de sociedades 1% o 10%', '1', '521', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '568');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes - Seguros y reaseguros [primas y cesiones] 0% 25% 35%', '0', '523A', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '569');
INSERT INTO `tipo_concepto_retencion` VALUES ('Pago a no residentes- Donaciones en dinero -Impuesto a la donaciones', '0', '525', 'S', '2020-04-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '570');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras retenciones aplicables a otros porcentajes [Incluyen retenciones al regimen Microempresarial]', '1.75', '346', 'N', '2020-09-01 00:00:00', '2050-12-31 00:00:00', 'S', '.', '571');
INSERT INTO `tipo_concepto_retencion` VALUES ('Otras retenciones aplicables a otros porcentajes [Incluyen retenciones al regimen Microempresarial]', '1.75', '351', 'N', '2021-01-01 00:00:00', '2020-12-31 00:00:00', 'S', '.', '572');

-- ----------------------------
-- Table structure for tipo_retencion
-- ----------------------------
DROP TABLE IF EXISTS `tipo_retencion`;
CREATE TABLE `tipo_retencion` (
  `id_tipo_retencion` int(11) NOT NULL AUTO_INCREMENT,
  `cuenta` varchar(255) DEFAULT '0',
  `porcentaje` varchar(255) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `bienes` bit(1) DEFAULT b'0',
  `servicios` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id_tipo_retencion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tipo_retencion
-- ----------------------------
INSERT INTO `tipo_retencion` VALUES ('1', '0', '10', 'RETENCION IVA 10% BIENES', '', '\0');
INSERT INTO `tipo_retencion` VALUES ('2', '0', '30', 'RETENCION DE IVA 30% COMPRA DE BIENES', '', '\0');
INSERT INTO `tipo_retencion` VALUES ('3', '0', '20', 'RETENCION 20% SERVICIOS', '\0', '');
INSERT INTO `tipo_retencion` VALUES ('4', '0', '70', 'RETENCION IVA POR LA PRESENTACION DE OTROS SERVICIOS', '\0', '');
INSERT INTO `tipo_retencion` VALUES ('5', '0', '100', 'RETENCION DE IVA 100% POR SERVICIOS PROFECIONALES', '\0', '');

-- ----------------------------
-- Table structure for tipo_usuario
-- ----------------------------
DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(255) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(255) DEFAULT NULL,
  `empresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_usuario`),
  KEY `FK_tipo_usuario_empresa` (`empresa`),
  CONSTRAINT `tipo_usuario_ibfk_1` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`id_empresa`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tipo_usuario
-- ----------------------------
INSERT INTO `tipo_usuario` VALUES ('9', 'DBA', '5');
INSERT INTO `tipo_usuario` VALUES ('10', 'ADMINISTRADOR', '5');
INSERT INTO `tipo_usuario` VALUES ('11', 'MOTORIZADO', '5');
INSERT INTO `tipo_usuario` VALUES ('12', 'DBA', '6');
INSERT INTO `tipo_usuario` VALUES ('13', 'CAJERO', '6');
INSERT INTO `tipo_usuario` VALUES ('15', 'CAJA ADMIN', '6');
INSERT INTO `tipo_usuario` VALUES ('16', 'administrador', '8');

-- ----------------------------
-- Table structure for transferencias
-- ----------------------------
DROP TABLE IF EXISTS `transferencias`;
CREATE TABLE `transferencias` (
  `id_transferencias` int(255) NOT NULL AUTO_INCREMENT,
  `id_producto` int(255) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transferencias`),
  KEY `FK_PRODUCTO_TRASNFERENCIA` (`id_producto`) USING BTREE,
  KEY `FK_TRANFERENCIAS_USUARIO` (`id_usuario`),
  CONSTRAINT `transferencias_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `transferencias_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_productos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transferencias
-- ----------------------------

-- ----------------------------
-- Table structure for trans_kardex
-- ----------------------------
DROP TABLE IF EXISTS `trans_kardex`;
CREATE TABLE `trans_kardex` (
  `id_kardex` int(255) NOT NULL AUTO_INCREMENT,
  `id_producto` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `TP` varchar(255) DEFAULT NULL,
  `entrada` varchar(255) DEFAULT NULL,
  `salida` varchar(255) DEFAULT NULL,
  `valor_unitario` varchar(255) DEFAULT NULL,
  `total_iva` varchar(255) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT '',
  `existencias` varchar(255) DEFAULT NULL,
  `costo` varchar(255) DEFAULT NULL,
  `valor_total` varchar(255) DEFAULT '',
  `Factura` varchar(255) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `fecha_Fab` date DEFAULT NULL,
  `fecha_Exp` date DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `proveedor` varchar(255) DEFAULT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  `serie` varchar(255) DEFAULT NULL,
  `empresa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kardex`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of trans_kardex
-- ----------------------------
INSERT INTO `trans_kardex` VALUES ('48', '73', '2022-04-27', 'CD', '94', null, '35.0000', null, '', '94', '35.0000', '3290', null, 'INGRESO INICIAL DE STOCK', null, null, '14', null, null, null, '5');
INSERT INTO `trans_kardex` VALUES ('49', '73', '2022-04-27', 'CD', null, '2', '0', '0', '0', '92', '0', '0', '122', 'SALIDA DE STOCK FACTURA: 122', '2022-04-27', '2022-04-27', '14', null, '22', '001-001', '5');
INSERT INTO `trans_kardex` VALUES ('50', '74', '2022-04-27', 'CD', '91', null, '35.0000', null, '', '91', '35.0000', '3185', null, 'INGRESO INICIAL DE STOCK', null, null, '14', null, null, null, '5');
INSERT INTO `trans_kardex` VALUES ('51', '74', '2022-04-27', 'CD', null, '1', '0', '0', '0', '90', '0', '0', '122', 'SALIDA DE STOCK FACTURA: 122', '2022-04-27', '2022-04-27', '14', null, '22', '001-001', '5');
INSERT INTO `trans_kardex` VALUES ('52', '24', '2022-04-27', 'CD', '-114', null, '150.0000', null, '', '-114', '150.0000', '-17100', null, 'INGRESO INICIAL DE STOCK', null, null, '14', null, null, null, '5');
INSERT INTO `trans_kardex` VALUES ('53', '88', '2022-04-27', 'CD', '6', null, '2.3600', null, '', '6', '2.3600', '14.16', null, 'INGRESO INICIAL DE STOCK', null, null, '14', null, null, null, '5');
INSERT INTO `trans_kardex` VALUES ('54', '88', '2022-04-27', 'CD', null, '120', '150.0000', '81.00', '450.00', '-114', '150.0000', '531.00', '122', 'SALIDA DE STOCK FACTURA: 122', '2022-04-27', '2022-04-27', '14', null, '22', '001-001', '5');
INSERT INTO `trans_kardex` VALUES ('55', '73', '2022-04-27', 'CD', null, '1', '0', '0', '0', '91', '0', '0', '123', 'SALIDA DE STOCK FACTURA: 123', '2022-04-27', '2022-04-27', '14', null, '22', '001-001', '5');
INSERT INTO `trans_kardex` VALUES ('56', '74', '2022-04-27', 'CD', null, '1', '0', '0', '0', '89', '0', '0', '123', 'SALIDA DE STOCK FACTURA: 123', '2022-04-27', '2022-04-27', '14', null, '22', '001-001', '5');
INSERT INTO `trans_kardex` VALUES ('57', '88', '2022-04-27', 'CD', null, '80', '150.0000', '54.00', '300.00', '-194', '150.0000', '354.00', '123', 'SALIDA DE STOCK FACTURA: 123', '2022-04-27', '2022-04-27', '14', null, '22', '001-001', '5');
INSERT INTO `trans_kardex` VALUES ('58', '84', '2022-04-27', 'CD', '1.20', null, '2.3600', null, '', '1.20', '2.3600', '2.832', null, 'INGRESO INICIAL DE STOCK', null, null, '14', null, null, null, '5');
INSERT INTO `trans_kardex` VALUES ('59', '84', '2022-04-27', 'CD', null, '0.6', '150.0000', '54.00', '300.00', '0.6', '150.0000', '354.00', '123', 'SALIDA DE STOCK FACTURA: 123', '2022-04-27', '2022-04-27', '14', null, '22', '001-001', '5');
INSERT INTO `trans_kardex` VALUES ('60', '62', '2022-05-25', 'CD', '100', null, '50.0000', null, '', '100', '50.0000', '5000', null, 'INGRESO INICIAL DE STOCK', null, null, '14', null, null, null, '5');
INSERT INTO `trans_kardex` VALUES ('61', '62', '2022-05-25', 'CD', null, '1', '0', '0', '0', '99', '0', '0', '124', 'SALIDA DE STOCK FACTURA: 124', '2022-05-25', '2022-05-25', '14', null, '22', '001-001', '5');
INSERT INTO `trans_kardex` VALUES ('62', '65', '2022-05-25', 'CD', '99', null, '100.0000', null, '', '99', '100.0000', '9900', null, 'INGRESO INICIAL DE STOCK', null, null, '14', null, null, null, '5');
INSERT INTO `trans_kardex` VALUES ('63', '65', '2022-05-25', 'CD', null, '1', '0', '0', '0', '98', '0', '0', '124', 'SALIDA DE STOCK FACTURA: 124', '2022-05-25', '2022-05-25', '14', null, '22', '001-001', '5');
INSERT INTO `trans_kardex` VALUES ('64', '18', '2022-05-25', 'CD', '100', null, '4.2000', null, '', '100', '4.2000', '420', null, 'INGRESO INICIAL DE STOCK', null, null, '14', null, null, null, '5');
INSERT INTO `trans_kardex` VALUES ('65', '87', '2022-05-25', 'CD', '35', null, '12.3200', null, '', '35', '12.3200', '431.2', null, 'INGRESO INICIAL DE STOCK', null, null, '14', null, null, null, '5');
INSERT INTO `trans_kardex` VALUES ('66', '87', '2022-05-25', 'CD', null, '2', '4.2000', '1.51', '8.40', '33', '4.2000', '9.91', '124', 'SALIDA DE STOCK FACTURA: 124', '2022-05-25', '2022-05-25', '14', null, '22', '001-001', '5');
INSERT INTO `trans_kardex` VALUES ('67', '83', '2022-05-25', 'CD', '33', null, '1.2300', null, '', '33', '1.2300', '40.59', null, 'INGRESO INICIAL DE STOCK', null, null, '14', null, null, null, '5');
INSERT INTO `trans_kardex` VALUES ('68', '83', '2022-05-25', 'CD', null, '2', '4.2000', '1.51', '8.40', '31', '4.2000', '9.91', '124', 'SALIDA DE STOCK FACTURA: 124', '2022-05-25', '2022-05-25', '14', null, '22', '001-001', '5');
INSERT INTO `trans_kardex` VALUES ('69', '85', '2022-05-25', 'CD', '0.00', null, '2.3200', null, '', '0.00', '2.3200', '0', null, 'INGRESO INICIAL DE STOCK', null, null, '14', null, null, null, '5');
INSERT INTO `trans_kardex` VALUES ('70', '85', '2022-05-25', 'CD', null, '0.6', '4.2000', '1.51', '8.40', '-0.6', '4.2000', '9.91', '124', 'SALIDA DE STOCK FACTURA: 124', '2022-05-25', '2022-05-25', '14', null, '22', '001-001', '5');
INSERT INTO `trans_kardex` VALUES ('71', '5', '2022-06-02', 'CD', '100', null, '60.0000', null, '', '100', '60.0000', '6000', null, 'INGRESO INICIAL DE STOCK', null, null, '14', null, null, null, '5');
INSERT INTO `trans_kardex` VALUES ('72', '1', '2022-06-02', 'CD', '100', null, '30.0000', null, '', '100', '30.0000', '3000', null, 'INGRESO INICIAL DE STOCK', null, null, '14', null, null, null, '5');
INSERT INTO `trans_kardex` VALUES ('73', '98', '2022-06-02', 'CD', '100', null, '60.0000', null, '', '100', '60.0000', '6000', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('74', '95', '2022-06-02', 'CD', '100', null, '35.0000', null, '', '100', '35.0000', '3500', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('75', '101', '2022-06-02', 'CD', '100', null, '100.0000', null, '', '100', '100.0000', '10000', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('76', '102', '2022-06-02', 'CD', '100', null, '175.0000', null, '', '100', '175.0000', '17500', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('77', '99', '2022-06-02', 'CD', '100', null, '110.0000', null, '', '100', '110.0000', '11000', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('78', '95', '2022-06-06', 'CD', '100', null, '35.0000', null, '', '100', '35.0000', '3500', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('79', '96', '2022-06-06', 'CD', '100', null, '40.0000', null, '', '100', '40.0000', '4000', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('80', '101', '2022-06-06', 'CD', '100', null, '100.0000', null, '', '100', '100.0000', '10000', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('81', '101', '2022-06-06', 'CD', null, '1', '100.0000', '0', '100.00', '99', '100.0000', '100.00', '149', 'SALIDA DE STOCK FACTURA: 149', '2022-06-06', '2022-06-06', '18', null, '47', '001-001', '6');
INSERT INTO `trans_kardex` VALUES ('82', '96', '2022-06-06', 'CD', null, '1', '40.0000', '0', '40.00', '99', '40.0000', '40.00', '18', 'SALIDA DE STOCK FACTURA: 18', '2022-06-06', '2022-06-06', '18', null, '42', '001-001', '6');
INSERT INTO `trans_kardex` VALUES ('83', '98', '2022-06-06', 'CD', '100', null, '60.0000', null, '', '100', '60.0000', '6000', null, 'INGRESO INICIAL DE STOCK', null, null, '20', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('84', '98', '2022-06-06', 'CD', null, '1', '60.0000', '0', '60.00', '99', '60.0000', '60.00', '19', 'SALIDA DE STOCK FACTURA: 19', '2022-06-06', '2022-06-06', '20', null, '39', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('85', '96', '2022-06-06', 'CD', null, '1', '40.0000', '0', '40.00', '98', '40.0000', '40.00', '19', 'SALIDA DE STOCK FACTURA: 19', '2022-06-06', '2022-06-06', '20', null, '39', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('86', '95', '2022-06-06', 'CD', null, '1', '35.0000', '0', '35.00', '99', '35.0000', '35.00', '19', 'SALIDA DE STOCK FACTURA: 19', '2022-06-06', '2022-06-06', '20', null, '39', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('87', '101', '2022-06-06', 'CD', null, '2', '100.0000', '0', '200.00', '97', '100.0000', '200.00', '20', 'SALIDA DE STOCK FACTURA: 20', '2022-06-06', '2022-06-06', '20', null, '39', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('88', '95', '2022-07-15', 'CD', '99', null, '35.0000', null, '', '99', '35.0000', '3465', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('89', '95', '2022-07-15', 'CD', null, '1', '35.0000', '0', '35.00', '98', '35.0000', '35.00', '21', 'SALIDA DE STOCK FACTURA: 21', '2022-07-15', '2022-07-15', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('90', '98', '2022-07-31', 'CD', '99', null, '60.0000', null, '', '99', '60.0000', '5940', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('91', '98', '2022-07-31', 'CD', null, '1', '60.0000', '0', '60.00', '98', '60.0000', '60.00', '22', 'SALIDA DE STOCK FACTURA: 22', '2022-07-31', '2022-07-31', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('92', '101', '2022-08-01', 'CD', '97', null, '100.0000', null, '', '97', '100.0000', '9700', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('93', '101', '2022-08-01', 'CD', null, '1', '100.0000', '0', '100.00', '96', '100.0000', '100.00', '23', 'SALIDA DE STOCK FACTURA: 23', '2022-08-01', '2022-08-01', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('94', '99', '2022-08-22', 'CD', '100', null, '110.0000', null, '', '100', '110.0000', '11000', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('95', '99', '2022-08-22', 'CD', null, '1', '110.0000', '0', '110.00', '99', '110.0000', '110.00', '24', 'SALIDA DE STOCK FACTURA: 24', '2022-08-22', '2022-08-22', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('96', '98', '2022-08-22', 'CD', '98', null, '60.0000', null, '', '98', '60.0000', '5880', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('97', '98', '2022-08-22', 'CD', null, '1', '60.0000', '0', '60.00', '97', '60.0000', '60.00', '25', 'SALIDA DE STOCK FACTURA: 25', '2022-08-22', '2022-08-22', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('98', '100', '2022-08-22', 'CD', '100', null, '80.0000', null, '', '100', '80.0000', '8000', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('99', '100', '2022-08-22', 'CD', null, '1', '80.0000', '0', '80.00', '99', '80.0000', '80.00', '26', 'SALIDA DE STOCK FACTURA: 26', '2022-08-22', '2022-08-22', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('100', '100', '2022-08-22', 'CD', null, '1', '80.0000', '0', '80.00', '98', '80.0000', '80.00', '27', 'SALIDA DE STOCK FACTURA: 27', '2022-08-22', '2022-08-22', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('101', '101', '2022-08-22', 'CD', '96', null, '100.0000', null, '', '96', '100.0000', '9600', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('102', '101', '2022-08-22', 'CD', null, '1', '100.0000', '0', '100.00', '95', '100.0000', '100.00', '28', 'SALIDA DE STOCK FACTURA: 28', '2022-08-22', '2022-08-22', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('103', '100', '2022-08-22', 'CD', null, '1', '80.0000', '0', '80.00', '97', '80.0000', '80.00', '29', 'SALIDA DE STOCK FACTURA: 29', '2022-08-22', '2022-08-22', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('104', '99', '2022-08-22', 'CD', null, '1', '110.0000', '0', '110.00', '98', '110.0000', '110.00', '30', 'SALIDA DE STOCK FACTURA: 30', '2022-08-22', '2022-08-22', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('105', '95', '2022-08-22', 'CD', '98', null, '35.0000', null, '', '98', '35.0000', '3430', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('106', '95', '2022-08-22', 'CD', null, '1', '35.0000', '0', '35.00', '97', '35.0000', '35.00', '31', 'SALIDA DE STOCK FACTURA: 31', '2022-08-22', '2022-08-22', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('107', '95', '2022-08-22', 'CD', null, '1', '35.0000', '0', '35.00', '96', '35.0000', '35.00', '32', 'SALIDA DE STOCK FACTURA: 32', '2022-08-22', '2022-08-22', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('108', '98', '2022-08-22', 'CD', null, '1', '60.0000', '0', '60.00', '96', '60.0000', '60.00', '33', 'SALIDA DE STOCK FACTURA: 33', '2022-08-22', '2022-08-22', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('109', '98', '2022-08-22', 'CD', null, '1', '60.0000', '0', '60.00', '95', '60.0000', '60.00', '34', 'SALIDA DE STOCK FACTURA: 34', '2022-08-22', '2022-08-22', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('110', '98', '2022-08-22', 'CD', null, '1', '60.0000', '0', '60.00', '94', '60.0000', '60.00', '35', 'SALIDA DE STOCK FACTURA: 35', '2022-08-22', '2022-08-22', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('111', '98', '2022-08-22', 'CD', null, '1', '60.0000', '0', '60.00', '93', '60.0000', '60.00', '36', 'SALIDA DE STOCK FACTURA: 36', '2022-08-22', '2022-08-22', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('112', '98', '2022-08-22', 'CD', null, '1', '60.0000', '0', '60.00', '92', '60.0000', '60.00', '37', 'SALIDA DE STOCK FACTURA: 37', '2022-08-22', '2022-08-22', '18', null, '38', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('113', '98', '2022-09-02', 'CD', '92', null, '60.0000', null, '', '92', '60.0000', '5520', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('114', '98', '2022-09-02', 'CD', null, '1', '60.0000', '0', '60.00', '91', '60.0000', '60.00', '38', 'SALIDA DE STOCK FACTURA: 38', '2022-09-02', '2022-09-02', '18', null, '39', '001-002', '6');
INSERT INTO `trans_kardex` VALUES ('115', '101', '2022-10-04', 'CD', '95', null, '100.0000', null, '', '95', '100.0000', '9500', null, 'INGRESO INICIAL DE STOCK', null, null, '18', null, null, null, '6');
INSERT INTO `trans_kardex` VALUES ('116', '101', '2022-10-04', 'CD', null, '1', '1', '0', '1.00', '94', '1', '1.00', '39', 'SALIDA DE STOCK FACTURA: 39', '2022-10-04', '2022-10-04', '18', null, '38', '001-002', '6');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(255) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(255) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `ci_ruc` varchar(10) DEFAULT NULL,
  `nick` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `serie` varchar(7) DEFAULT NULL,
  `sucursal` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT '../img/sistema/sin_imagen.jpg',
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `FK_USUARIO_EMPRESA` (`id_empresa`) USING BTREE,
  KEY `FK_SUCURSAL_USUARIO` (`sucursal`) USING BTREE,
  KEY `FK_USUARIO_TIPO_USUARIO` (`tipo_usuario`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`sucursal`) REFERENCES `sucursales` (`id_sucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('18', '6', 'PACO', 'EXAMPLE', '147852369', 'Paco', 'Pepe', '001-002', '8', '../img/sistema/sin_imagen.jpg', 'example@example.com', '0222222222', '12');
INSERT INTO `usuario` VALUES ('21', '6', 'invitado', 'example', '1750188326', 'invitado', 'invitado', '001-002', '8', '../img/sistema/sin_imagen.jpg', 'EXAMPLE@EXAMPLE.COM', '0987242589', '13');
INSERT INTO `usuario` VALUES ('22', '7', 'invitado', 'invitado example', '9999999999', 'invitado', 'invitado', '001-001', null, '../img/sistema/sin_imagen.jpg', 'invitado@invitado.com', '022222222222222', '13');
INSERT INTO `usuario` VALUES ('23', '8', 'PACO', 'EXAMPLE', '147852369', 'Paco', 'Pepe', '001-001', '8', '../img/sistema/sin_imagen.jpg', 'example@example.com', '0222222222', '12');
INSERT INTO `usuario` VALUES ('24', '8', 'Geancarlo Asencio', 'CAYETANO CESTARIS S7-158 Y PADRE ELIAS BRITO', '0922284856', '1792680778001', '1792680778001', '001-003', '10', '../img/sistema/sin_imagen.jpg', 'geanasencio@hotmail.com', '0990313904', '16');
INSERT INTO `usuario` VALUES ('36', '30', null, null, null, '1234567890001', '1234567890001', '001-001', null, '../img/sistema/sin_imagen.jpg', null, null, '10');
INSERT INTO `usuario` VALUES ('38', '7', null, null, null, '1722214507001', '1722214507001', '001-001', null, '../img/sistema/sin_imagen.jpg', null, null, '10');
INSERT INTO `usuario` VALUES ('39', '34', null, null, null, '1712605284001', '1712605284001', '001-001', null, '../img/sistema/sin_imagen.jpg', null, null, '10');
INSERT INTO `usuario` VALUES ('40', '35', null, null, null, '1793211628001', '1793211628001', '001-001', null, '../img/sistema/sin_imagen.jpg', null, null, '10');
