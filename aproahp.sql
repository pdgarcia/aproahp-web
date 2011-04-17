-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2011 at 01:41 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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
  `BLG_Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `BLG_Titulo` varchar(50) NOT NULL,
  `BLG_Autor` varchar(50) NOT NULL,
  `BLG_Email` varchar(50) NOT NULL,
  `BLG_Comentario` varchar(5000) NOT NULL,
  PRIMARY KEY (`BLG_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`BLG_ID`, `BLG_Fecha`, `BLG_Titulo`, `BLG_Autor`, `BLG_Email`, `BLG_Comentario`) VALUES
(1, '2011-01-21 21:19:54', 'test de blog', 'yo', '', 'asfasfasfva\r\naviasvj\r\nasvjavpoa\r\navasvijavkav\r\n\r\n'),
(3, '2011-01-21 21:23:48', 'otro comentario mas', 'tambien lo hago yo', '', 'a ver que pasa '),
(4, '2011-01-21 21:27:51', 'otro comentario mas', 'tambien lo hago yo', '', 'a ver que pasa '),
(5, '2011-01-21 21:28:46', 'otro comentario mas', 'tambien lo hago yo', '', 'a ver que pasa '),
(7, '2011-01-21 21:32:26', 'otro test mas de blog', 'quien va a ser', '', 'sarasa\r\nssssarasitaaa\r\nholaa'),
(8, '2011-01-21 21:35:31', 'g', 'sdfg', '', 'asdfg'),
(9, '2011-01-22 16:07:16', 'comentario', 'otra vez yo', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a risus et sem condimentum iaculis ac vitae metus. Phasellus vel justo ut ipsum congue fringilla a vitae lorem. Ut vel rhoncus leo. Suspendisse potenti. Suspendisse consequat malesuada nunc, ut condimentum purus tincidunt a. Curabitur ultricies ornare magna. Duis rhoncus ornare risus, ac dictum nisl volutpat nec. Nulla vel quam id odio tempus adipiscing vestibulum varius metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(10, '2011-01-22 16:09:37', 'otro comentario', 'quien va a ser', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a risus et sem condimentum iaculis ac vitae metus. Phasellus vel justo ut ipsum congue fringilla a vitae lorem. Ut vel rhoncus leo. Suspendisse potenti. Suspendisse consequat malesuada nunc, ut condimentum purus tincidunt a. Curabitur ultricies ornare magna. Duis rhoncus ornare risus, ac dictum nisl volutpat nec. Nulla vel quam id odio tempus adipiscing vestibulum varius metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed quis ipsum id neque consequat ultricies. '),
(11, '2011-04-05 19:55:41', 'que mierda pasa', 'yo mismo', 'yo@pepe.com', 'sarasasasasa'),
(14, '2011-04-05 21:39:47', 'asfasdf', 'asdfasdf', '', 'asdfasdfa\r\n\r\n\r\nasdfasdf\r\n\r\n\r\nasdfaasfd'),
(13, '2011-04-05 21:34:15', 'XXXXXXXXXXX', 'XXYoXXXXX', 'pepe@pepe.com', 'qwrwefsvasvasdcv\r\nasvzc\r\na\r\nva\r\ndvbsdbhsdsdbsxvzxcvzxcv');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_categorias`
--

INSERT INTO `tbl_categorias` (`CAT_ID`, `CAT_Visible`, `CAT_Nombre`, `CAT_Comentarios`) VALUES
(1, 0, 'Comunicados', 'Comunicados publicados por la AsociaciÃ³n'),
(2, 0, 'Documentos de uso interno', 'Documentos de uso interno de la AsociaciÃ³n'),
(4, 0, 'Modelos de escritos', 'Modelos de escritos'),
(3, 0, 'Acuerdos de colaboraciÃ³n con otras entidades', 'Acuerdos de colaboraciÃ³n con otras entidades');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_config`
--

DROP TABLE IF EXISTS `tbl_config`;
CREATE TABLE IF NOT EXISTS `tbl_config` (
  `CFG_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `CFG_key` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `CFG_value` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`CFG_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_config`
--

INSERT INTO `tbl_config` (`CFG_ID`, `CFG_key`, `CFG_value`) VALUES
(1, 'rincon_adminuser', '3'),
(2, 'opositores_adminuser', '3');

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
  `DOC_Description` varchar(500) NOT NULL,
  `DOC_Texto` varchar(5000) NOT NULL,
  `DOC_Attach` varchar(200) NOT NULL,
  UNIQUE KEY `DOC_ID` (`DOC_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_documentos`
--

INSERT INTO `tbl_documentos` (`DOC_ID`, `DOC_Fecha`, `DOC_Autor`, `DOC_Categoria`, `DOC_Titulo`, `DOC_Description`, `DOC_Texto`, `DOC_Attach`) VALUES
(11, '0000-00-00 00:00:00', 1, 1, 'asdfg', 'safgavadcsd c df  sd mslssd \r\nscvdkvmcsÃ±dvlkcdsvcjnsdvsdjcndsfv\r\nsdvsdv\r\n', 'sdvlsd ndlsj sfvsvs\r\nsvsd jsdldsk vds\r\n\r\n\r\ndsvsdvnsd sv\r\n', '1302225013_redp4428.pdf'),
(13, '0000-00-00 00:00:00', 1, 3, 'Titulo Titulo Titulo Titulo Titulo Titulo Titulo T', 'Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resumen Resu', 'Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Te', '1302225299_iTunesConnect_DeveloperGuide.pdf'),
(14, '0000-00-00 00:00:00', 1, 1, 'afjasdfÃ±jasdfsdf', 'asdfasfasfasdfascascasdcs', 'asdfasdfasdfasdffaewt', '1302336630_msxchng_cmcvmdc.pdf'),
(15, '0000-00-00 00:00:00', 1, 1, 'qwerty', '123', '456', '1302607520_msxchng_cmcvmdc.pdf'),
(16, '0000-00-00 00:00:00', 1, 1, '34234234', 'dcdscdscd', 'sdfcsdcsdfc', '1302607546_AS4AS_e.pdf'),
(18, '2011-04-14 00:00:00', 1, 3, 'otra vez en el futuro', 'publicado en el futuro', 'a ver que pasa maÃ±ana', '1302657864_iPhone_Business.pdf'),
(19, '2011-04-13 00:00:00', 1, 3, 'hoy', 'publicado hoy, el anterior se publico para maÃ±ana', 'maÃ±annaaaa', '1302658058_AS4AS_e.pdf');

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
  `NOT_Titulo` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `NOT_resumen` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `NOT_texto` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`NOT_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tbl_noticias`
--

INSERT INTO `tbl_noticias` (`NOT_ID`, `NOT_FECHA`, `NOT_Autor`, `NOT_Titulo`, `NOT_resumen`, `NOT_texto`) VALUES
(15, '0000-00-00 00:00:00', 1, 'a', 'qwerty', 'erfwewerwecwececcwrvwrcrwc'),
(16, '0000-00-00 00:00:00', 1, 'poiuyt', 'dxsxc', 'cscasxnasklxjnasxkjansxjaksnxasjnxsdjxnasx'),
(17, '0000-00-00 00:00:00', 1, 'sarasasasdsdcsdc', 'La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida', 'La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)'),
(8, '0000-00-00 00:00:00', 1, 'RESOLUCIÃ“N de 29 de abril de 2005', 'de la Presidencia de la Agencia Estatal de AdministraciÃ³n Tributaria por la que se convoca, para funcionarios del Grupo C', 'de la Presidencia de la Agencia Estatal de AdministraciÃ³n Tributaria por la que se convoca, para funcionarios del Grupo C'),
(18, '0000-00-00 00:00:00', 1, '12', '34', '56'),
(19, '2011-04-04 00:00:00', 1, '78', '90', '123'),
(33, '2011-04-12 00:00:00', 1, 'otra Prueba', 'La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida', 'La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los requisitos establecidos en estos Estatutos. (Articulo 1Â° de los Estatutos)La AsociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica, es una OrganizaciÃ³n de Ã¡mbito nacional, creada de acuerdo con lo prevenido en la Ley 11/85, de 2 de agosto de Libertad Sindical, regida por los principios de funcionamiento democrÃ¡tico y, por tanto, de respeto a las opiniones y manifestaciones de sus asociados, e integrada por los miembros del Cuerpo General Administrativo del Estado especialidad Agentes de la Hacienda PÃºblica en puestos de trabajo de la AdministraciÃ³n PÃºblica Financiera y Tributaria en el Ãrea de tributos, que voluntariamente lo soliciten y cumplan los r'),
(21, '0000-00-00 00:00:00', 1, 'asdfgsd', 'sdgsdg', 'sdfgsdfgsdg'),
(22, '0000-00-00 00:00:00', 1, 'prueba fecha', 'prueba fecha', 'asdfasfasdf'),
(23, '0000-00-00 00:00:00', 1, 'asdfasdf', 'asdfasfasf', 'asdfasfasdf'),
(24, '0000-00-00 00:00:00', 1, 'anda', 'a', 'cagar'),
(25, '0000-00-00 00:00:00', 1, 'cagar', 'a', 'anda'),
(26, '0000-00-00 00:00:00', 1, '1', '22', '333'),
(27, '0000-00-00 00:00:00', 1, 'poi', 'iuyt', 'fgh'),
(28, '0000-00-00 00:00:00', 1, '134134124124', '1234124124', '123441241241234'),
(29, '2011-04-14 00:00:00', 1, 'qwerty', 'ytrewq', 'qwertyuiopÃ±lkjhgfdsazxcvbnm,'),
(30, '2011-04-13 00:00:00', 1, '24rd', 'wefwecwce', 'cwecwec4v 4rvc'),
(31, '2011-04-22 00:00:00', 1, '2243dwde', 'asdcacadfc', ' dscsdfcscv'),
(32, '2011-04-14 00:00:00', 1, 'Prueba de feed', 'Esta entrada es para probar como va el feed de la pagina con mas texto, y tambiÃ©n vamos a ver el tema de acentos ,maÃ±ana Ã¡ Ã© Ã±Ã±', 'aquÃ­ esta el texto de la entrada del feed , a ver que pasa\r\nesto es para la asociaciÃ³n Profesional de Agentes de la Hacienda PÃºblica\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_opositores`
--

DROP TABLE IF EXISTS `tbl_opositores`;
CREATE TABLE IF NOT EXISTS `tbl_opositores` (
  `OPT_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `OPT_Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `OPT_Titulo` varchar(50) NOT NULL,
  `OPT_Autor` varchar(50) NOT NULL,
  `OPT_Email` varchar(50) NOT NULL,
  `OPT_Comentario` varchar(5000) NOT NULL,
  PRIMARY KEY (`OPT_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_opositores`
--

INSERT INTO `tbl_opositores` (`OPT_ID`, `OPT_Fecha`, `OPT_Titulo`, `OPT_Autor`, `OPT_Email`, `OPT_Comentario`) VALUES
(18, '2011-04-06 12:12:56', '123', '2134', '213', '12424214213412'),
(19, '2011-04-15 02:55:27', 'pregunta', 'Yo', '', 'donde coÃ±o estÃ¡n los documentos en esta web\r\n\r\nEn esta pÃ¡gina puedes encontrar informaciÃ³n de interÃ©s. si estÃ¡s preparÃ¡ndote para obtener una plaza de Agente de la Hacienda PÃºblica tanto por el turno libre como por el de promociÃ³n interna.');

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

--
-- Dumping data for table `tbl_tagrel`
--


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

--
-- Dumping data for table `tbl_tags`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`USR_ID`, `USR_username`, `USR_password`, `USR_Displayname`, `USR_email`, `USR_Activo`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', 'pdgarcia@gmail.com', 1),
(2, 'bek', '7270425d2ca0ef20bff91880b614384f', 'Belen', 'bek@test.com', 1),
(3, 'Elenix', '721e5d7d28f66086bec4e28f0c7dd718', 'Elena', 'elena@test.com', 1);
