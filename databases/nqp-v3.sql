-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-10-2017 a las 09:37:26
-- Versión del servidor: 5.7.19-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nqp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idamin` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` varchar(50) DEFAULT '',
  `contrasena` varchar(255) DEFAULT '',
  `estado` int(11) DEFAULT '0',
  `tipo` int(11) DEFAULT '0',
  `authKey` varchar(255) DEFAULT '',
  `accessToken` varchar(255) DEFAULT '',
  `idusuario` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idamin`, `fecha_registro`, `usuario`, `contrasena`, `estado`, `tipo`, `authKey`, `accessToken`, `idusuario`) VALUES
(1, '2017-10-07 00:08:28', 'adminmym', '0c450b5b38003a38e8c4754da2f19222', 1, 5, '13165c2a3579f6c4999d8436b181e1fc', '13165c2a3579f6c4999d8436b181e1fc', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anunciantes`
--

CREATE TABLE `anunciantes` (
  `idanunciante` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(11) DEFAULT '0',
  `foto` varchar(250) DEFAULT '',
  `alias` varchar(100) DEFAULT '',
  `ciudad` varchar(50) DEFAULT '',
  `direccion` varchar(100) DEFAULT '',
  `telefono` varchar(15) DEFAULT '',
  `celular` varchar(15) DEFAULT '',
  `email` varchar(250) DEFAULT '',
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `idanuncio` int(11) NOT NULL,
  `idcategoria` int(11) DEFAULT '0',
  `titulo` varchar(200) DEFAULT '',
  `decripcion` text,
  `otra_descripcion` text,
  `codigo` varchar(20) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `precio` varchar(10) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `enable` int(11) DEFAULT '0',
  `destacado` mediumint(1) NOT NULL DEFAULT '0',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios_filtros`
--

CREATE TABLE `anuncios_filtros` (
  `idpf` int(11) NOT NULL,
  `idfiltro` int(11) DEFAULT NULL,
  `idanuncio` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios_galeria`
--

CREATE TABLE `anuncios_galeria` (
  `idgaleria` int(11) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idanuncio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `idbanner` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT '',
  `idcategoria` int(11) DEFAULT '0',
  `foto` varchar(250) DEFAULT '',
  `descripcion` varchar(100) DEFAULT '',
  `target` int(11) DEFAULT '0',
  `url` varchar(250) DEFAULT '',
  `fecha_regisro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`idbanner`, `titulo`, `idcategoria`, `foto`, `descripcion`, `target`, `url`, `fecha_regisro`, `estado`) VALUES
(1, 'ad', 8, 'bannerpromo1', 'sda', 0, '', '2017-10-11 21:57:59', 1),
(2, 'ad', 8, 'bannerpromo2', 'sda', 0, '', '2017-10-12 21:57:59', 1),
(3, 'ad', 8, 'bannerpromo3', 'sda', 0, '', '2017-10-12 21:57:59', 1),
(4, 'ad', 9, 'bannertienda1', 'sda', 0, '', '2017-10-01 21:57:59', 1),
(5, 'ad', 9, 'bannertienda2', 'sda', 0, '', '2017-10-01 22:57:59', 1),
(6, 'ad', 9, 'bannertienda3', 'sda', 0, '', '2017-10-01 22:57:59', 1),
(7, 'ad', 20, 'bannerpublicidad1.jpg', 'sda', 0, '', '2017-10-01 22:57:59', 1),
(8, 'ad', 20, 'bannerpublicidad2.jpg', 'sda', 0, '', '2017-10-01 22:57:59', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `imagen` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(200) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(11) DEFAULT '0',
  `idpadre` int(11) DEFAULT '0',
  `idmodulo` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nombre`, `imagen`, `alias`, `fecha_registro`, `estado`, `idpadre`, `idmodulo`) VALUES
(3, 'Noticias', '', 'noticias', '2017-10-18 19:08:40', 1, 0, 2),
(7, 'Novedades', '@web/imagen/categorias/catnovedades.jpg', 'novedades', '2017-10-18 19:08:40', 1, 3, 2),
(8, 'Banner_promociones', '', 'banner_promociones', '2017-10-16 19:08:40', 1, 0, 3),
(9, 'Banner_tiendas', '', 'banner_tiendas', '2017-10-17 19:08:40', 1, 0, 3),
(10, 'Tendencias', '@web/imagen/categorias/cattendencias.jpg', 'tendencias', '2017-10-18 19:08:40', 1, 3, 2),
(11, 'Cool Outfits', '@web/imagen/categorias/catcool.jpg', 'cool', '2017-10-18 19:08:40', 1, 3, 2),
(12, 'Blog', '@web/imagen/categorias/catblog.jpg', 'blog', '2017-10-18 19:08:40', 1, 3, 2),
(13, 'Anuncios', '', 'anuncios', '2017-10-18 19:08:40', 1, 0, 6),
(14, 'Vestidos', '', 'vestidos', '2017-10-18 19:08:40', 1, 13, 6),
(15, 'Pantalones', '', 'pantalones', '2017-10-18 19:08:40', 1, 13, 6),
(16, 'Blusas', '', 'blusas', '2017-10-18 19:08:40', 1, 13, 6),
(17, 'Chaquetas', '', 'chaquetas', '2017-10-18 19:08:40', 1, 13, 6),
(18, 'Faldas', '', 'faldas', '2017-10-18 19:08:40', 1, 13, 6),
(19, 'Ropa interior', '', 'ropainterior', '2017-10-18 19:08:40', 1, 13, 6),
(20, 'Banner_publicidad_inicio', '', 'banner_publicidad_inicio', '2017-10-17 19:08:40', 1, 0, 3),
(21, 'quienes somos', '', 'quienes-somos', '2017-10-20 20:26:06', 0, 21, 7),
(22, 'Como funciona', '', 'Como-funciona', '2017-10-23 13:32:32', 0, 0, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `idconfiguracion` int(11) NOT NULL,
  `titulo_pagina` varchar(500) DEFAULT '',
  `resumen_pagina` text,
  `meta_palabrasclaves` text NOT NULL,
  `email` varchar(250) DEFAULT '',
  `telefono` varchar(15) DEFAULT '',
  `movil` varchar(15) DEFAULT '',
  `direccion` varchar(200) DEFAULT '',
  `twitter` varchar(200) DEFAULT '',
  `facebook` varchar(200) DEFAULT '',
  `youtube` varchar(200) DEFAULT NULL,
  `coordenadas` varchar(200) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`idconfiguracion`, `titulo_pagina`, `resumen_pagina`, `meta_palabrasclaves`, `email`, `telefono`, `movil`, `direccion`, `twitter`, `facebook`, `youtube`, `coordenadas`) VALUES
(1, 'NADA QUE PONERTE', '', 'NADA QUE PONERTE', 'marialaura@nadaqueponerte.com', '3325667', '76314443', 'Calle Cochabamba 777', '', '', NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `idcontenido` int(11) NOT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT '',
  `contenido` text,
  `fecha_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`idcontenido`, `idcategoria`, `titulo`, `contenido`, `fecha_modificacion`, `estado`) VALUES
(1, 21, 'quienes somos', '<p>tst</p>\r\n', '2017-10-21 00:27:14', NULL),
(2, 22, 'Como funciona', '', '2017-10-23 17:32:51', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filtros`
--

CREATE TABLE `filtros` (
  `idfiltro` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT '',
  `estado` int(11) DEFAULT '0',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idPadre` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `filtros`
--

INSERT INTO `filtros` (`idfiltro`, `nombre`, `estado`, `fecha_registro`, `idPadre`) VALUES
(1, 'Condicion del producto', 1, '2017-10-20 18:41:54', NULL),
(2, 'Nuevo con etiqueta', 1, '2017-10-20 19:13:04', 1),
(3, 'Nuevo sin etiqueta', 1, '2017-10-20 19:13:34', 1),
(4, 'Tallas de los productos', 1, '2017-10-20 19:14:13', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `idmodulo` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `alias` varchar(200) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(11) DEFAULT '0',
  `icono` varchar(50) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`idmodulo`, `nombre`, `alias`, `fecha_registro`, `estado`, `icono`) VALUES
(1, 'Categorias', 'categorias', '2017-10-09 00:28:08', 1, ''),
(2, 'Noticias', 'noticias', '2017-10-09 00:28:08', 1, 'newspaper-o'),
(3, 'Banners', 'banners', '2017-10-11 20:11:20', 1, ''),
(4, 'Filtros', 'filtros', '2017-10-11 22:04:49', 1, ''),
(5, 'Paquetes', 'paquetes', '2017-10-12 00:23:55', 1, ''),
(6, 'Anuncios', 'anuncios', '2017-10-12 00:23:55', 1, ''),
(7, 'Contenido', 'contenido', '2017-10-20 20:25:47', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `idnoticia` int(11) NOT NULL,
  `idcategoria` int(11) DEFAULT '0',
  `fecha_noticia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fuente` varchar(100) DEFAULT '',
  `foto` varchar(250) DEFAULT '',
  `titulo` varchar(100) DEFAULT '',
  `resumen` text,
  `contenido` text,
  `video` varchar(250) DEFAULT '',
  `estado` int(11) DEFAULT '0',
  `destacado` char(1) NOT NULL DEFAULT '0',
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idnoticia`, `idcategoria`, `fecha_noticia`, `fuente`, `foto`, `titulo`, `resumen`, `contenido`, `video`, `estado`, `destacado`, `fecha_registro`) VALUES
(1, 1, '2017-10-19 13:56:52', 'test', '@web/imagen/noticias/noti1.jpg', 'CONTRARIAMENTE A TODA CREENCIA POPULAR', 'loren ipsum', '<p>loren ipsum</p>\r\n', '1234567', 1, '1', '2017-10-10 02:18:02'),
(2, 1, '2017-10-19 13:56:52', 'test', '@web/imagen/noticias/noti2.jpg', 'CONTRARIAMENTE A TODA CREENCIA POPULAR', 'loren ipsum', '<p>loren ipsum</p>\r\n', '1234567', 1, '1', '2017-10-10 02:18:02'),
(3, 1, '2017-10-19 13:56:52', 'test', '@web/imagen/noticias/noti3.jpg', 'CONTRARIAMENTE A TODA CREENCIA POPULAR', 'loren ipsum', '<p>loren ipsum</p>\r\n', '1234567', 1, '1', '2017-10-10 02:18:02'),
(4, 1, '2017-10-19 13:56:52', 'test', '@web/imagen/noticias/noti4.jpg', 'CONTRARIAMENTE A TODA CREENCIA POPULAR', 'loren ipsum', '<p>loren ipsum</p>\r\n', '1234567', 1, '1', '2017-10-10 02:18:02'),
(5, 1, '2017-10-19 13:56:52', 'test', '@web/imagen/noticias/noti5.jpg', 'CONTRARIAMENTE A TODA CREENCIA POPULAR', 'loren ipsum', '<p>loren ipsum</p>\r\n', '1234567', 1, '1', '2017-10-10 02:18:02'),
(6, 1, '2017-10-19 13:56:52', 'test', '@web/imagen/noticias/noti6.jpg', 'CONTRARIAMENTE A TODA CREENCIA POPULAR', 'loren ipsum', '<p>loren ipsum</p>\r\n', '1234567', 1, '1', '2017-10-10 02:18:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias_galeria`
--

CREATE TABLE `noticias_galeria` (
  `idgaleria` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` varchar(250) DEFAULT '',
  `idnoticia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `idpaquete` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `descripcion` text,
  `estado` int(11) DEFAULT '0',
  `nro_anuncios` int(11) DEFAULT '0',
  `tiempo_vida` int(11) DEFAULT '0',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`idpaquete`, `nombre`, `descripcion`, `estado`, `nro_anuncios`, `tiempo_vida`, `fecha_registro`) VALUES
(1, 'test paquete', 'paquete de prueba', 0, 3, 2, '2017-10-12 00:52:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `idpromocion` int(11) NOT NULL,
  `codigo` varchar(200) DEFAULT NULL,
  `nro_usos` int(11) DEFAULT '0',
  `estado` int(11) DEFAULT '0',
  `fecha_limite` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fehca_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idusuario_crea` int(11) DEFAULT NULL,
  `idpaquete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones_usos`
--

CREATE TABLE `promociones_usos` (
  `idpuso` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `idpromocion` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT '',
  `apellidos` varchar(50) DEFAULT '',
  `fecha_nacimiento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `direccion` varchar(200) DEFAULT '',
  `telefono` varchar(15) DEFAULT '',
  `movil` varchar(15) DEFAULT '',
  `ciudad` varchar(50) DEFAULT '',
  `pais` varchar(50) DEFAULT '',
  `email` varchar(250) DEFAULT '',
  `sexo` int(11) DEFAULT '0',
  `estado` int(11) DEFAULT '0',
  `tipo` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idamin`);

--
-- Indices de la tabla `anunciantes`
--
ALTER TABLE `anunciantes`
  ADD PRIMARY KEY (`idanunciante`);

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`idanuncio`);

--
-- Indices de la tabla `anuncios_filtros`
--
ALTER TABLE `anuncios_filtros`
  ADD PRIMARY KEY (`idpf`);

--
-- Indices de la tabla `anuncios_galeria`
--
ALTER TABLE `anuncios_galeria`
  ADD PRIMARY KEY (`idgaleria`);

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`idbanner`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`idconfiguracion`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`idcontenido`);

--
-- Indices de la tabla `filtros`
--
ALTER TABLE `filtros`
  ADD PRIMARY KEY (`idfiltro`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idnoticia`);

--
-- Indices de la tabla `noticias_galeria`
--
ALTER TABLE `noticias_galeria`
  ADD PRIMARY KEY (`idgaleria`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`idpaquete`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`idpromocion`);

--
-- Indices de la tabla `promociones_usos`
--
ALTER TABLE `promociones_usos`
  ADD PRIMARY KEY (`idpuso`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `anunciantes`
--
ALTER TABLE `anunciantes`
  MODIFY `idanunciante` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `idanuncio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `anuncios_filtros`
--
ALTER TABLE `anuncios_filtros`
  MODIFY `idpf` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `anuncios_galeria`
--
ALTER TABLE `anuncios_galeria`
  MODIFY `idgaleria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `idbanner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `idconfiguracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `idcontenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `filtros`
--
ALTER TABLE `filtros`
  MODIFY `idfiltro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idmodulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idnoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `noticias_galeria`
--
ALTER TABLE `noticias_galeria`
  MODIFY `idgaleria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `idpaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `idpromocion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `promociones_usos`
--
ALTER TABLE `promociones_usos`
  MODIFY `idpuso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
