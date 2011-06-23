-- phpMyAdmin SQL Dump
-- version 3.4.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2011 at 03:04 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aproahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

DROP TABLE IF EXISTS `tbl_blog`;
CREATE TABLE IF NOT EXISTS `tbl_blog` (
  `BLG_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `BLG_Activa` tinyint(1) NOT NULL,
  `BLG_Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `BLG_Titulo` varchar(50) NOT NULL,
  `BLG_Autor` varchar(50) NOT NULL,
  `BLG_Email` varchar(50) NOT NULL,
  `BLG_Comentario` varchar(5000) NOT NULL,
  PRIMARY KEY (`BLG_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`BLG_ID`, `BLG_Activa`, `BLG_Fecha`, `BLG_Titulo`, `BLG_Autor`, `BLG_Email`, `BLG_Comentario`) VALUES
(1, 0, '2011-01-21 20:19:54', 'test de blog', 'yo', '', 'asfasfasfva\r\naviasvj\r\nasvjavpoa\r\navasvijavkav\r\n\r\n'),
(19, 0, '2011-05-28 19:08:11', 'qazxsw', 'edcvfr', '', 'rbgrtbcrthbcht'),
(4, 0, '2011-01-21 20:27:51', 'otro comentario mas', 'tambien lo hago yo', '', 'a ver que pasa '),
(5, 0, '2011-01-21 20:28:46', 'otro comentario mas', 'tambien lo hago yo', '', 'a ver que pasa '),
(7, 0, '2011-01-21 20:32:26', 'otro test mas de blog', 'quien va a ser', '', 'sarasa\r\nssssarasitaaa\r\nholaa'),
(9, 0, '2011-01-22 15:07:16', 'comentario', 'otra vez yo', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a risus et sem condimentum iaculis ac vitae metus. Phasellus vel justo ut ipsum congue fringilla a vitae lorem. Ut vel rhoncus leo. Suspendisse potenti. Suspendisse consequat malesuada nunc, ut condimentum purus tincidunt a. Curabitur ultricies ornare magna. Duis rhoncus ornare risus, ac dictum nisl volutpat nec. Nulla vel quam id odio tempus adipiscing vestibulum varius metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(10, 0, '2011-01-22 15:09:37', 'otro comentario', 'quien va a ser', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a risus et sem condimentum iaculis ac vitae metus. Phasellus vel justo ut ipsum congue fringilla a vitae lorem. Ut vel rhoncus leo. Suspendisse potenti. Suspendisse consequat malesuada nunc, ut condimentum purus tincidunt a. Curabitur ultricies ornare magna. Duis rhoncus ornare risus, ac dictum nisl volutpat nec. Nulla vel quam id odio tempus adipiscing vestibulum varius metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed quis ipsum id neque consequat ultricies. '),
(11, 0, '2011-04-05 17:55:41', 'que mierda pasa', 'yo mismo', 'yo@pepe.com', 'sarasasasasa'),
(18, 0, '2011-05-18 11:12:36', 'prueba', 'Pablo', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categorias`
--

DROP TABLE IF EXISTS `tbl_categorias`;
CREATE TABLE IF NOT EXISTS `tbl_categorias` (
  `CAT_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `CAT_Visible` tinyint(1) NOT NULL,
  `CAT_Nombre` varchar(50) NOT NULL,
  `CAT_Comentarios` varchar(200) NOT NULL,
  UNIQUE KEY `ID` (`CAT_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_categorias`
--

INSERT INTO `tbl_categorias` (`CAT_ID`, `CAT_Visible`, `CAT_Nombre`, `CAT_Comentarios`) VALUES
(1, 1, 'Comunicados', 'Comunicados publicados por la AsociaciÃ³n'),
(2, 1, 'Documentos de uso interno', 'Documentos de uso interno de la AsociaciÃ³n'),
(4, 1, 'Modelos de escritos', 'Modelos de escritos'),
(3, 1, 'Acuerdos de colaboraciÃ³n con otras entidades', 'Acuerdos de colaboraciÃ³n con otras entidades'),
(5, 1, 'Actas', 'Actas generadas en las Reuniones de la AsociaciÃ³n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_config`
--

DROP TABLE IF EXISTS `tbl_config`;
CREATE TABLE IF NOT EXISTS `tbl_config` (
  `CFG_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `CFG_key` varchar(100) NOT NULL,
  `CFG_value` varchar(200) NOT NULL,
  PRIMARY KEY (`CFG_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_config`
--

INSERT INTO `tbl_config` (`CFG_ID`, `CFG_key`, `CFG_value`) VALUES
(1, 'rincon_adminuser', '3'),
(2, 'opositores_adminuser', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documentos`
--

DROP TABLE IF EXISTS `tbl_documentos`;
CREATE TABLE IF NOT EXISTS `tbl_documentos` (
  `DOC_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `DOC_Fecha` datetime NOT NULL,
  `DOC_Autor` bigint(20) NOT NULL,
  `DOC_Categoria` bigint(20) NOT NULL,
  `DOC_Titulo` varchar(50) NOT NULL,
  `DOC_Resumen` varchar(500) NOT NULL,
  `DOC_Texto` text NOT NULL,
  `DOC_Attach` varchar(200) NOT NULL,
  UNIQUE KEY `DOC_ID` (`DOC_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_documentos`
--

INSERT INTO `tbl_documentos` (`DOC_ID`, `DOC_Fecha`, `DOC_Autor`, `DOC_Categoria`, `DOC_Titulo`, `DOC_Resumen`, `DOC_Texto`, `DOC_Attach`) VALUES
(29, '2011-05-31 00:00:00', 1, 1, 'subido pdf', 'Pdf con mierda reemplazado', 'monton de mierda, pero ahora imagen', '1306803270_1213358117-13.jpg'),
(30, '2011-06-04 00:00:00', 1, 5, 'adf', 'qazzrdf', 'gn', '1307157981_About Stacks.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_links`
--

DROP TABLE IF EXISTS `tbl_links`;
CREATE TABLE IF NOT EXISTS `tbl_links` (
  `LINK_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `LINK_Fecha` datetime NOT NULL,
  `LINK_Categoria` varchar(50) NOT NULL,
  `LINK_Descripcion` varchar(100) NOT NULL,
  `LINK_url` varchar(200) NOT NULL,
  `LINK_img` varchar(50) NOT NULL,
  PRIMARY KEY (`LINK_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_links`
--

INSERT INTO `tbl_links` (`LINK_ID`, `LINK_Fecha`, `LINK_Categoria`, `LINK_Descripcion`, `LINK_url`, `LINK_img`) VALUES
(1, '0000-00-00 00:00:00', '', 'test', 'www.google.es', 'imagen1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_noticias`
--

DROP TABLE IF EXISTS `tbl_noticias`;
CREATE TABLE IF NOT EXISTS `tbl_noticias` (
  `NOT_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOT_FECHA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NOT_Autor` bigint(20) NOT NULL,
  `NOT_Titulo` varchar(50) NOT NULL,
  `NOT_resumen` varchar(500) NOT NULL,
  `NOT_texto` text NOT NULL,
  PRIMARY KEY (`NOT_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `tbl_noticias`
--

INSERT INTO `tbl_noticias` (`NOT_ID`, `NOT_FECHA`, `NOT_Autor`, `NOT_Titulo`, `NOT_resumen`, `NOT_texto`) VALUES
(15, '0000-00-00 00:00:00', 1, 'a', 'qwerty', 'erfwewerwecwececcwrvwrcrwc'),
(16, '0000-00-00 00:00:00', 1, 'poiuyt', 'dxsxc', 'cscasxnasklxjnasxkjansxjaksnxasjnxsdjxnasx'),
(17, '0000-00-00 00:00:00', 1, 'sarasasasdsdcsdc', 'La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida', 'La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)'),
(8, '0000-00-00 00:00:00', 1, 'RESOLUCIÃ“N de 29 de abril de 2005', 'de la Presidencia de la Agencia Estatal de AdministraciÃ³n Tributaria por la que se convoca, para funcionarios del Grupo C', 'de la Presidencia de la Agencia Estatal de AdministraciÃ³n Tributaria por la que se convoca, para funcionarios del Grupo C'),
(18, '0000-00-00 00:00:00', 1, '12', '34', '56'),
(19, '2011-04-03 22:00:00', 1, '78', '90', '123'),
(44, '2011-04-30 22:00:00', 1, '1234567890', 'asdfghjklÃ±', 'zxcvbnmoiuytrewq\r\nzxcvbnm\r\n\r\nsepe'),
(45, '2011-04-29 22:00:00', 1, 'qaz', 'xxsw', 'edc'),
(46, '2011-04-29 22:00:00', 1, 'Dicodina', 'sera lupus', ''),
(21, '0000-00-00 00:00:00', 1, 'asdfgsd', 'sdgsdg', 'sdfgsdfgsdg'),
(22, '0000-00-00 00:00:00', 1, 'prueba fecha', 'prueba fecha', 'asdfasfasdf'),
(23, '0000-00-00 00:00:00', 1, 'asdfasdf', 'asdfasfasf', 'asdfasfasdf'),
(24, '0000-00-00 00:00:00', 1, 'anda', 'a', 'cagar'),
(25, '0000-00-00 00:00:00', 1, 'cagar', 'a', 'anda'),
(26, '0000-00-00 00:00:00', 1, '1', '22', '333'),
(27, '0000-00-00 00:00:00', 1, 'poi', 'iuyt', 'fgh'),
(28, '0000-00-00 00:00:00', 1, '134134124124', '1234124124', '123441241241234'),
(29, '2011-04-13 22:00:00', 1, 'qwerty', 'ytrewq', 'qwertyuiopÃ±lkjhgfdsazxcvbnm,'),
(30, '2011-04-12 22:00:00', 1, '24rd', 'wefwecwce', 'cwecwec4v 4rvc'),
(31, '2011-04-21 22:00:00', 1, '2243dwde', 'asdcacadfc 1111', ' dscsdfcscv'),
(32, '2011-04-13 22:00:00', 1, 'Prueba de feed', 'Esta entrada es para probar como va el feed de la pagina con mas texto, y tambiÃ©n vamos a ver el tema de acentos ,maÃ±ana Ã¡ Ã© Ã±Ã±', 'aquÃ­ esta el texto de la entrada del feed , a ver que pasa\r\nesto es para la asociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica\r\n\r\n'),
(36, '2011-04-19 22:00:00', 1, 'Nuevo super CRUD', 'mola el nuevo super guay CRUD', ''),
(37, '2011-04-30 22:00:00', 1, 'EspaÃ±a se prepara para dar el salto al protocolo ', 'El Consejo de Ministros ha aprobado el plan para la incorporaciÃ³n del nuevo protocolo de Internet, el IPv6, en EspaÃ±a, que coexistirÃ¡ "durante unos aÃ±os" con el antiguo IPv4.', 'Debido al agotamiento de las direcciones de la versiÃ³n anterior del protocolo, el Ministerio de Industria ha impulsado un plan cuyo objetivo es difundir informaciÃ³n didÃ¡ctica sobre el IPv6 y dinamizar los cambios tecnolÃ³gicos que resulten necesarios para su incorporaciÃ³n efectiva.\r\n\r\nEntre otras medidas, el Gobierno ha creado una web informativa sobre el nuevo protocolo, a la que se sumarÃ¡n jornadas teÃ³rico-prÃ¡cticas sobre sus aspectos tÃ©cnicos y ayudas del Plan Avanza para proyectos relacionados con Ã©l.\r\n\r\nInternet se quedaba sin direcciones\r\n\r\nLas direcciones IP (Internet Protocol) constituyen el sistema de identificaciÃ³n que permite que diferentes dispositivos conectados a Internet puedan comunicarse entre sÃ­. DesempeÃ±an en Internet un papel anÃ¡logo al nÃºmero telefÃ³nico en el servicio de telefonÃ­a tradicional, permitiendo el intercambio de informaciÃ³n entre dos o mÃ¡s puntos de la red.\r\n\r\nSin embargo, en Internet no hay una planificaciÃ³n de los recursos de direccionamiento por parte de las Administraciones PÃºblicas: el responsable de la asignaciÃ³n de direcciones es la corporaciÃ³n sin Ã¡nimo de lucro ICANN (Internet Corporation for Assigned Names and Numbers).\r\n\r\nDesde 1981 se emplea el denominado protocolo IP versiÃ³n 4 (IPv4), que ofrece alrededor de 4.295 millones de direcciones de Internet a nivel global. En su momento se considerÃ³ "suficiente" para cubrir todas las necesidades de futuro.\r\n\r\nNo obstante, en febrero de este aÃ±o la ICANN asignÃ³ en su totalidad el repositorio global de direccionamiento IPv4 y, previsiblemente, a lo largo del aÃ±o se producirÃ¡ tambiÃ©n la asignaciÃ³n total de las direcciones IPv4 disponibles en Europa.\r\n\r\nAnte la rÃ¡pida extensiÃ³n de Internet a escala global, en el aÃ±o 1998 se desarrollÃ³ la versiÃ³n IPv6, que permite la asignaciÃ³n de 340 sextillones de direcciones Ãºnicas de Internet, una cantidad prÃ¡cticamente ilimitada, pasando la longitud de la direcciÃ³n IP de 32 a 128 bits de longitud.\r\n\r\nAdemÃ¡s, el protocolo IPv6 introduce nuevas mejoras en Internet, entre ellas mÃ¡s seguridad y simplicidad de procesamiento en la red, segÃºn asegura Industria.'),
(48, '2011-05-14 22:00:00', 1, 'asdfasdf', 'ppelkdfmgkfkkfkmvÃ±kvmsdvkmsdÃ±kvm', 'sdvsdlkvnsdÃ±lvksdfÃ±lvksdflvksdvÃ±\r\ns\r\ndv\r\nsdv\r\nsdfvsdfv\r\nsd\r\nvsd\r\nvd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_opositores`
--

DROP TABLE IF EXISTS `tbl_opositores`;
CREATE TABLE IF NOT EXISTS `tbl_opositores` (
  `OPT_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `OPT_Activa` tinyint(1) NOT NULL,
  `OPT_Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `OPT_Titulo` varchar(50) NOT NULL,
  `OPT_Autor` varchar(50) NOT NULL,
  `OPT_Email` varchar(50) NOT NULL,
  `OPT_Comentario` varchar(5000) NOT NULL,
  PRIMARY KEY (`OPT_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tbl_opositores`
--

INSERT INTO `tbl_opositores` (`OPT_ID`, `OPT_Activa`, `OPT_Fecha`, `OPT_Titulo`, `OPT_Autor`, `OPT_Email`, `OPT_Comentario`) VALUES
(18, 0, '2011-04-06 10:12:56', '123', '2134', '213', '12424214213412'),
(19, 0, '2011-04-15 00:55:27', 'pregunta', 'Yo', '', 'donde coÃ±o estÃ¡n los documentos en esta web\r\n\r\nEn esta pÃ¡gina puedes encontrar informaciÃ³n de interÃ©s. si estÃ¡s preparÃ¡ndote para obtener una plaza de Agente de la Hacienda PÃºblica tanto por el turno libre como por el de promociÃ³n interna.'),
(20, 0, '2011-04-15 11:27:37', 'hola', 'usuario', 'add#gmail.com', 'sfcdfscsdsdf'),
(21, 0, '2011-04-15 11:28:31', 'que tal', 'usuario', 'aaa', 'cascmalsckmecemc'),
(22, 0, '2011-04-15 11:48:46', 'asd', 'fff', '', 'asfcafcv'),
(24, 0, '2011-04-16 00:08:24', 'Pregunta sobre la vida sexual del erizo de mar', 'Pablete', 'federico_santiago.bello@roche.com', 'sarasssaaaaiara\r\n\r\nadssdeferf'),
(25, 0, '2011-05-18 11:12:05', 'a ver ahora', 'yo', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(32, 0, '2011-05-28 18:34:46', 'asdf', 'fdas', '', 'afvdfcervcevce'),
(33, 0, '2011-05-28 18:36:11', 'qwerty', 'ytrewq', '', '1234567890'),
(34, 0, '2011-05-28 18:41:36', 'qaz', 'zaq', '', 'wsx'),
(35, 0, '2011-05-28 18:42:36', 'plk', 'khbgy', '', 'hjnkm'),
(36, 0, '2011-05-28 18:56:43', '12345678', 'poiuytr', '', 'fytghj'),
(37, 0, '2011-05-28 19:07:50', '12345678', '431234', '', 'adfasdcadcadcd'),
(38, 0, '2011-06-03 02:30:11', 'test', 'yo', '', 'comentario');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tagrel`
--

DROP TABLE IF EXISTS `tbl_tagrel`;
CREATE TABLE IF NOT EXISTS `tbl_tagrel` (
  `TAGR_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `TAGR_DOCID` bigint(20) NOT NULL,
  `TAGR_TAGID` bigint(20) NOT NULL,
  PRIMARY KEY (`TAGR_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

DROP TABLE IF EXISTS `tbl_tags`;
CREATE TABLE IF NOT EXISTS `tbl_tags` (
  `TAG_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `TAG_nombre` varchar(15) NOT NULL,
  `TAG_comentarios` varchar(50) NOT NULL,
  UNIQUE KEY `ID` (`TAG_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `USR_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `USR_username` varchar(32) NOT NULL,
  `USR_password` varchar(32) NOT NULL,
  `USR_Displayname` varchar(32) NOT NULL,
  `USR_email` varchar(100) NOT NULL,
  `USR_Activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`USR_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`USR_ID`, `USR_username`, `USR_password`, `USR_Displayname`, `USR_email`, `USR_Activo`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', 'pdgarcia@gmail.com', 1),
(2, 'bek', '7270425d2ca0ef20bff91880b614384f', 'Belen', 'bek@test.com', 1),
(3, 'Elenix', '721e5d7d28f66086bec4e28f0c7dd718', 'Elena', 'elena@test.com', 1),
(21, 'pipi', '16d5d24f5b09a1991bd4e5f57bf11237', 'pipi', 'pipi@g.com', 1),
(20, 'pepe', 'md5(qwerty)', 'pepe', 'pepe@g.com', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
