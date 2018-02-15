-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2018 at 04:10 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.27-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nqp`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT '',
  `apellidos` varchar(50) DEFAULT '',
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `direccion` varchar(200) DEFAULT '',
  `telefono` varchar(15) DEFAULT '',
  `movil` varchar(15) DEFAULT '',
  `ciudad` varchar(50) DEFAULT '',
  `pais` varchar(50) DEFAULT '',
  `email` varchar(250) DEFAULT '',
  `sexo` int(11) DEFAULT '0',
  `estado` int(11) DEFAULT '0',
  `tipo` int(11) DEFAULT '0',
  `contrasena` varchar(255) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `facebook` varchar(100) NOT NULL DEFAULT '',
  `twitter` varchar(100) NOT NULL DEFAULT '',
  `youtube` varchar(100) NOT NULL DEFAULT '',
  `instagram` varchar(100) NOT NULL DEFAULT '',
  `visiblefacebook` int(1) NOT NULL DEFAULT '1',
  `visibletwittwe` int(1) NOT NULL DEFAULT '1',
  `visibleyoutu` int(1) NOT NULL DEFAULT '1',
  `visibleinsta` int(1) NOT NULL DEFAULT '1',
  `intereses` varchar(250) NOT NULL DEFAULT '',
  `nombrenit` varchar(100) NOT NULL DEFAULT '',
  `nit` varchar(200) NOT NULL DEFAULT '',
  `tallasblusas` varchar(250) NOT NULL DEFAULT '',
  `tallaspantalones` varchar(250) NOT NULL DEFAULT '',
  `tallaszapatos` varchar(250) NOT NULL DEFAULT '',
  `ano` varchar(20) NOT NULL DEFAULT '',
  `mes` varchar(20) NOT NULL DEFAULT '',
  `dia` varchar(20) NOT NULL DEFAULT '',
  `visibletelefono` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombres`, `apellidos`, `fecha_nacimiento`, `fecha_registro`, `direccion`, `telefono`, `movil`, `ciudad`, `pais`, `email`, `sexo`, `estado`, `tipo`, `contrasena`, `alias`, `foto`, `descripcion`, `facebook`, `twitter`, `youtube`, `instagram`, `visiblefacebook`, `visibletwittwe`, `visibleyoutu`, `visibleinsta`, `intereses`, `nombrenit`, `nit`, `tallasblusas`, `tallaspantalones`, `tallaszapatos`, `ano`, `mes`, `dia`, `visibletelefono`) VALUES
(1, 'helier', 'cortez', '2018-01-01', '2018-01-01 04:00:00', 'los lotes', '123456', '1234567', 'santa cruz', 'bolivia', 'hdnymib@gmail.com', 0, 1, 1, '2cd9f68fef0db1c001e3d592052950e9', 'test', 'XvZf4_eED7TB_vnw4Y57itDtgbSMOrfF.jpg', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus.', '', '', '', '', 1, 1, 1, 1, '', '', '', '', '', '', '', '', '', 1),
(3, 'maria laura', 'aguilera', '1986-02-08', '2018-01-11 06:00:00', 'calle cochabamba 777 edif mystic depto 2C', '76314443', '76314443', 'santa cruz de la sierra', 'Bolivia', 'mlaguileraf@hotmail.com', 1, 1, 1, '41906b5855bcdbc8d3f425bd133e31b5', 'Maria laura', NULL, 'vdkvndknv', '', '', '', '', 1, 1, 1, 1, '', '', '', '', '', '', '', '', '', 1),
(4, 'Carlos Hugo', 'Calvi', '1998-09-11', '2018-01-19 18:21:14', 'B/ Estación Argentina Nº 3430', '', '79852022', 'Santa Cruz', 'Bolivia', 'chcalvi@outlook.com', 0, 1, 0, '515c7571504469f7dd78ba10bf3d1c55', NULL, NULL, NULL, '', '', '', '', 1, 1, 1, 1, '', '', '', '', '', '', '', '', '', 1),
(5, 'Jose Manuel Justiniano Rios', 'prueba', '1991-10-15', '2018-01-25 06:00:00', 'barrio santa ana', '76303932', '1221', 'Santa Cruz', 'prueba', 'jose_manuel3000@hotmail.com', 0, 1, 1, '1f66585f9f129d1c75416ff89e72813d', 'acadeima12', 'wMi2vFsWRDksLmKd8G5l--TgHnLU9sQe.png', 'sjdklasdlñasdlkjbasd', 'https://www.facebook.com/mjustiniano2', 'https://www.facebook.com/mjustiniano2', 'https://www.facebook.com/mjustiniano2', '', 1, 1, 0, 0, 'Me gusta el futblo', '', '', 'XL-(10-12-US)', '5XL-(20-US)', '42-BR/11-US/27.3-cm', '', '1', '1', 0),
(6, 'Lucas alderete Rios', '', NULL, '2018-02-05 23:35:34', 'Barrio lel', '75025066', '123456', 'Santa cruz', 'Bolivia', 'lucas@gmail.com', 0, 1, 0, 'c408745602ca9f18b0ce8e2a45fac88e', 'Lucqui', NULL, NULL, '', '', '', '', 1, 1, 1, 1, '', '', '', '', '', '', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
