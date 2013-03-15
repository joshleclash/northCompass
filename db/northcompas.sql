-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2013 at 03:51 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `northcompas`
--

-- --------------------------------------------------------

--
-- Table structure for table `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `CscDepartamento` int(11) DEFAULT NULL,
  `CscCiudad` int(11) DEFAULT NULL,
  `DscCiudad` varchar(20) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `Csc_Cliente` int(11) NOT NULL AUTO_INCREMENT,
  `Dsc_Cliente` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Csc_Cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `creacion`
--

CREATE TABLE IF NOT EXISTS `creacion` (
  `Csc_Creacion` int(11) NOT NULL AUTO_INCREMENT,
  `Num_Identificacion` varchar(15) DEFAULT NULL,
  `Login_Csc` int(11) DEFAULT NULL,
  `Nombres` varchar(30) DEFAULT NULL,
  `Apellidos` varchar(30) DEFAULT NULL,
  `Nombre_Completo` varchar(60) NOT NULL,
  `T_Identificacion` varchar(20) NOT NULL,
  `Departamento` varchar(20) NOT NULL,
  `Ciudad` varchar(20) NOT NULL,
  `Barrio` varchar(20) NOT NULL,
  `Dsc_Barrio` varchar(30) NOT NULL,
  `Empresa` varchar(50) NOT NULL,
  `T_Contrato` varchar(30) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Tel_Fijo` varchar(20) NOT NULL,
  `Tel_Celular` varchar(20) NOT NULL,
  `Tel_Celular2` varchar(20) NOT NULL,
  `Cargo` varchar(20) NOT NULL,
  `Observaciones` text NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Placas` varchar(20) DEFAULT NULL,
  `Estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Csc_Creacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `CscDepartamento` int(11) DEFAULT NULL,
  `DscDepartamento` varchar(50) DEFAULT NULL,
  `Pais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info_familiar`
--

CREATE TABLE IF NOT EXISTS `info_familiar` (
  `Csc_Info_Familiar` int(11) NOT NULL AUTO_INCREMENT,
  `Nombres_Familiares` varchar(40) DEFAULT NULL,
  `Apellidos_Familiares` varchar(40) DEFAULT NULL,
  `Nombre_Amigo` varchar(40) DEFAULT NULL,
  `Apellido_Amigo` varchar(40) DEFAULT NULL,
  `Nombre_Conyuge` varchar(40) DEFAULT NULL,
  `Apellidos_Conyuge` varchar(40) DEFAULT NULL,
  `Nombre_Padre` varchar(40) DEFAULT NULL,
  `Apellido_Padre` varchar(40) DEFAULT NULL,
  `Nombre_Madre` varchar(40) DEFAULT NULL,
  `Apellidos_Madre` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Csc_Info_Familiar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ingresos`
--

CREATE TABLE IF NOT EXISTS `ingresos` (
  `Csc_Ingresos` int(11) NOT NULL AUTO_INCREMENT,
  `Login_Csc` int(11) DEFAULT NULL,
  `Acepto` varchar(20) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`Csc_Ingresos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `Csc_Login` int(11) NOT NULL AUTO_INCREMENT,
  `PassWord` varchar(20) DEFAULT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `Perfil` varchar(20) DEFAULT NULL,
  `Usuario` varchar(20) DEFAULT NULL,
  `Cliente_Csc` int(11) DEFAULT NULL,
  `Mail` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Csc_Login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE IF NOT EXISTS `pdf` (
  `Csc_Pdf` int(11) NOT NULL AUTO_INCREMENT,
  `PdfFile` varchar(50) DEFAULT NULL,
  `Identificacion` varchar(20) DEFAULT NULL,
  `Terceros_Csc` int(11) DEFAULT NULL,
  `Usuario_Csc` int(11) DEFAULT NULL,
  PRIMARY KEY (`Csc_Pdf`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `terceros`
--

CREATE TABLE IF NOT EXISTS `terceros` (
  `Csc_Terceros` varchar(11) NOT NULL,
  `Dsc_Terceros` varchar(50) DEFAULT NULL,
  `Estado_Csc` int(11) DEFAULT NULL,
  `Cliente_Csc` int(11) DEFAULT NULL,
  PRIMARY KEY (`Csc_Terceros`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
