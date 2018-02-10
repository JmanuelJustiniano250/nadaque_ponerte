-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-01-2018 a las 00:49:43
-- Versión del servidor: 5.7.20-0ubuntu0.16.04.1
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
  `accessToken` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idamin`, `fecha_registro`, `usuario`, `contrasena`, `estado`, `tipo`, `authKey`, `accessToken`) VALUES
(1, '2017-10-07 00:08:28', 'adminmym', '0c450b5b38003a38e8c4754da2f19222', 1, 5, '13165c2a3579f6c4999d8436b181e1fc', '13165c2a3579f6c4999d8436b181e1fc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `idanuncio` int(11) NOT NULL,
  `idcategoria` int(11) DEFAULT '0',
  `idusuario` int(11) DEFAULT '0',
  `titulo` varchar(200) DEFAULT '',
  `decripcion` text,
  `otra_descripcion` text,
  `codigo` varchar(20) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `precio` varchar(10) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `enable` int(11) DEFAULT '0',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_aprobado` datetime DEFAULT NULL,
  `idpaquete` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`idanuncio`, `idcategoria`, `idusuario`, `titulo`, `decripcion`, `otra_descripcion`, `codigo`, `foto`, `precio`, `estado`, `enable`, `fecha_registro`, `fecha_aprobado`, `idpaquete`) VALUES
(1, 0, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', '00001', 'anuncio1.jpg', '1', 1, 0, '2018-01-01 20:07:05', NULL, 1),
(2, 0, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', '00001', 'anuncio1.jpg', '1', 1, 0, '2018-01-01 20:07:05', NULL, 1),
(3, 0, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', '00001', 'anuncio1.jpg', '1', 1, 0, '2018-01-01 20:07:05', NULL, 1),
(4, 0, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', '00001', 'anuncio1.jpg', '1', 1, 0, '2018-01-01 20:07:05', NULL, 1),
(5, 0, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', '00001', 'anuncio1.jpg', '1', 1, 0, '2018-01-01 20:07:05', NULL, 1),
(6, 0, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', '00001', 'anuncio1.jpg', '1', 1, 0, '2018-01-01 20:07:05', NULL, 1),
(7, 0, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', '00001', 'anuncio1.jpg', '1', 1, 0, '2018-01-01 20:07:05', NULL, 1),
(8, 0, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', '00001', 'anuncio1.jpg', '1', 1, 0, '2018-01-01 20:07:05', NULL, 1),
(9, 0, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper at urna eget placerat. In luctus ipsum quis diam pharetra tincidunt. In malesuada augue a lectus tincidunt, ac suscipit augue dictum. Ut cursus molestie ex quis condimentum. Curabitur vestibulum eu tortor eu interdum. Aliquam viverra quis massa quis pretium.\n\nSuspendisse sed nibh consectetur, placerat eros a, egestas urna. Vestibulum quis posuere libero, ac suscipit libero. Nam nec lacinia justo, ut commodo nibh. Aliquam at sodales mauris. Curabitur ut tellus quam. Maecenas vitae tempus turpis, vel tempor purus. Praesent porttitor risus sed enim ullamcorper pretium. Vivamus nec auctor enim. Donec eu leo vitae quam imperdiet convallis sed sit amet magna. Morbi rutrum arcu eget turpis suscipit finibus. Nulla facilisi. Pellentesque id sem at tortor convallis condimentum eget eget mi. Donec finibus dapibus volutpat. Morbi sagittis dui et diam lacinia, eu dictum mauris consequat. Fusce faucibus leo ex, sit amet consectetur purus vulputate fringilla.', '00001', 'anuncio1.jpg', '1', 1, 0, '2018-01-01 20:07:05', NULL, 1),
(10, 16, 1, 'asd', '<p>asd</p>\r\n', '<p>asd</p>\r\n', NULL, 'tIOu81j7vgfSa7Grvb8mrTNVQPMVDsC8.png', '123', 0, 0, '2018-01-08 07:58:10', NULL, 1);

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

--
-- Volcado de datos para la tabla `anuncios_galeria`
--

INSERT INTO `anuncios_galeria` (`idgaleria`, `foto`, `fecha_registro`, `idanuncio`) VALUES
(1, 'lxDW1FoglHj9vndTqA-dFimixsbyj7XS.png', '2018-01-08 08:13:03', 10),
(2, '-VEMa0QI19msFOvQVzKyQiAlDcqW9Lbv.png', '2018-01-08 08:13:03', 10),
(3, 'kb2QhQHtjUGaDUKxTDxCnLYDqo8aEkE8.png', '2018-01-08 08:13:03', 10),
(4, 'nO3phph3BDk-nMi8WTrcQde6s6AK4Me-.png', '2018-01-08 08:13:03', 10),
(5, '8BjLPQ7MF2gcu0eWcYxwH_PCKBtpCV-L.png', '2018-01-08 08:16:30', 10),
(6, '44qiznJicAx1phdjmMRqPpr-Ybgm5Cjv.png', '2018-01-08 08:16:30', 10),
(7, 'xzMZIwnsVuqkl_APL4ThCI6irSJnvLKz.png', '2018-01-08 08:16:30', 10),
(8, '09fiAOR-YdwTQ2yVtHZa6M0Jzl528zXE.png', '2018-01-08 08:16:31', 10),
(9, '8hs0EcapD2Je7kBMEPA0NJ9MTKPM2Ot7.png', '2018-01-08 08:17:49', 10),
(10, 'wHbCCYG5sMryt1s-14Py_OmFHQgO2ATm.png', '2018-01-08 08:17:50', 10),
(11, 'cSfDmbcuWUJJ7BzvF3u2QmeNKKBAqUD_.png', '2018-01-08 08:17:50', 10),
(12, 'HywCOD1GfPLU_Xw4JOzTIXOGgA_6HHJc.png', '2018-01-08 08:17:50', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios_visitas`
--

CREATE TABLE `anuncios_visitas` (
  `idvisita` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idanuncio` int(11) DEFAULT '0'
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
(1, 'ad', 8, 'dwdCaRKOoZBmtdypBrZ9XTfhmngQ9wJ5.jpg', 'sda', 0, '#', '2017-10-11 21:57:59', 1),
(2, 'ad', 8, 'r1FWyJmThxznUWy8JLmjrZOu5G4PcnKQ.jpg', 'sda', 0, '#', '2017-10-12 21:57:59', 1),
(3, 'ad', 8, '-w48KooG-i6NbzgEjWCoKSPQG-OYzu1p.jpg', 'sda', 0, '#', '2017-10-12 21:57:59', 1),
(4, 'ad', 9, 'BCI5f5yUiXuladhNipRSKpqmPve9xzJk.jpg', 'sda', 0, '#', '2017-10-01 21:57:59', 1),
(5, 'ad', 9, 'UmhDgIAzJ4-q6o-02xfeR8XSbSB6cfE3.jpg', 'sda', 0, '#', '2017-10-01 22:57:59', 1),
(6, 'ad', 9, 'fu3gotpUtl6RdnawOo32nlHdNVVvIm3E.jpg', 'sda', 0, '#', '2017-10-01 22:57:59', 1),
(7, 'ad', 20, 'eS4CIYfVBhsUz3Ij6pL3g5BQX6bZpsKr.jpg', 'banner1', 0, '#', '2017-10-01 22:57:59', 1),
(8, 'ad', 23, 'QAc25c6TyovtIYKExHWx0lNdneoHd08o.jpg', 'banner', 0, '#', '2017-10-01 22:57:59', 1),
(9, '', 26, 'lYvZaTTKuGQIUU_tDz7k_FmzXWC82nlp.jpg', '', 0, '#', '2017-12-22 01:59:32', 1),
(10, '', 27, 'sbRoyh5grNRKzjS1sVdxRruyUXP6IH5o.jpg', '', 0, '#', '2017-12-22 01:59:58', 1);

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
(20, 'Banner_publicidad_inicio_1', '', 'banner_publicidad_inicio', '2017-10-17 19:08:40', 1, 0, 3),
(21, 'quienes somos', '', 'quienes-somos', '2017-10-20 20:26:06', 0, 0, 7),
(22, 'Como funciona', '', 'como-funciona', '2017-10-23 13:32:32', 0, 0, 7),
(23, 'Banner_publicidad_inicio_2', '', 'Banner_publicidad_inicio_2', '2017-12-17 18:39:35', 0, 0, 3),
(24, 'banners_publicidad_1', '', 'banners_publicidad_1', '2017-12-17 18:50:24', 0, 0, 3),
(25, 'banners_publicidad_2', '', 'banners_publicidad_2', '2017-12-17 18:50:39', 0, 0, 3),
(26, 'banner_anuncio1', '', 'banner_anuncio1', '2017-12-22 01:56:42', 0, 0, 3),
(27, 'banner_anuncio2', '', 'banner_anuncio2', '2017-12-22 01:57:00', 0, 0, 3),
(28, 'como vender', '', 'como-vender', '2018-01-08 03:21:43', 0, 0, 7),
(29, 'como comprar', '', 'como-comprar', '2018-01-08 03:26:43', 0, 0, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idcompra` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT '0',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idpaquete` int(11) DEFAULT '0',
  `fecha_aprovacion` datetime DEFAULT NULL,
  `precio` double DEFAULT '0',
  `estado` int(11) DEFAULT '0',
  `nombre_factura` varchar(50) DEFAULT '',
  `nit_factura` varchar(50) DEFAULT '',
  `tipo_pago` int(11) DEFAULT '0',
  `session` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idcompra`, `idusuario`, `fecha_registro`, `idpaquete`, `fecha_aprovacion`, `precio`, `estado`, `nombre_factura`, `nit_factura`, `tipo_pago`, `session`) VALUES
(2, 1, '2018-01-02 06:14:30', 1, NULL, 0, 1, 'test', '12345', 0, 'L7Z0TzGxZwTZL-Wu40cd750bba9870f18aada2478b24840a');

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
  `instagram` varchar(200) DEFAULT '',
  `coordenadas` varchar(200) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`idconfiguracion`, `titulo_pagina`, `resumen_pagina`, `meta_palabrasclaves`, `email`, `telefono`, `movil`, `direccion`, `twitter`, `facebook`, `youtube`, `instagram`, `coordenadas`) VALUES
(1, 'NADA QUE PONERTE', '', 'NADA QUE PONERTE', 'marialaura@nadaqueponerte.com', '3325667', '76314443', 'Calle Cochabamba 777', '', '', NULL, '', '');

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
(1, 21, 'quienes somos', '<h1 style="margin-bottom: 0.28cm; text-align: left;">QUIENES SOMOS</h1>\r\n\r\n<p style="margin-bottom:0.28cm; text-align:left"><span style="line-height:108%"><span style="orphans:2"><span style="widows:2"><i>Hola! Soy Maria Laura y somos un equipo de mujeres din&aacute;micas, expertas vaciadoras de armarios para que mediante nuestra plataforma puedas ganar unos pesitos extra, y puedas volver a gastarlos con las bellezas que se publican aqu&iacute; mismo!</i></span></span></span></p>\r\n\r\n<p style="margin-bottom:0.28cm; text-align:left"><span style="line-height:108%"><span style="orphans:2"><span style="widows:2"><i>Que tal comprar un vestido floreado largo de d&iacute;a? Una paleta de sombras que no encontrabas por ning&uacute;n lugar? Unos zapatos perfectos para tu look de fin de semana? En fin publica y compra lo que quieras! Ojo! Solo prendas y accesorios de mujer.</i></span></span></span></p>\r\n\r\n<p style="margin-bottom:0.28cm; text-align:left"><span style="line-height:108%"><span style="orphans:2"><span style="widows:2"><i>Estamos establecidos en Santa Cruz de la Sierra y queremos integrar a toda Bolivia mediante la moda (y los armarios!)</i></span></span></span></p>\r\n\r\n<p style="margin-bottom:0.28cm; text-align:left"><span style="line-height:108%"><span style="orphans:2"><span style="widows:2"><i>Estamos sumamente felices de tenerte de visita, siempre estamos atentas a tus dudas, comentarios y sugerencias, solo cont&aacute;ctanos! </i></span></span></span></p>\r\n\r\n<p style="margin-bottom:0.28cm; text-align:left"><span style="line-height:108%"><span style="orphans:2"><span style="widows:2"><i>Esperamos que vac&iacute;es tu armario con nosotros y compres de los anuncios todo lo que te gusta, porque la vida es una!</i><font face="Calibri Light, serif"><font size="4"><font style="font-size: 16pt"><b> </b></font></font></font></span></span></span></p>\r\n', '2018-01-08 07:19:45', NULL),
(2, 22, 'Como funciona', '<h1 style="margin-bottom: 0cm; text-align: left;">COMO FUNCIONA</h1>\r\n\r\n<p style="margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font face="Bell MT, serif">Fashion lovers&hellip;.llegamos a su rescate !!! </font></span></span></span></p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left"><span style="line-height:0.66cm"><span style="orphans:2"><span style="widows:2"><font face="Times New Roman, serif"><font size="3"><font style="font-size: 12pt"><font face="Bell MT, serif"><font size="2"><font style="font-size: 11pt">Te imaginas encontrar gente con tu mismo estilo y poder comprar lo que hay en su armario, que incre&iacute;ble no? Inclusive m&aacute;s si puedes poder en venta tu armario tambi&eacute;n!</font></font></font></font></font></font></span></span></span></p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font face="Bell MT, serif">Nada que Ponerte es una plataforma de anuncios de personas como t&uacute; que ofrecen prendas de vestir, accesorios y maquillaje en estado nuevo o semi-nuevo para uso de mujeres. Venimos a revolucionar tu forma de vender y comprar moda! </font></span></span></span></p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font face="Bell MT, serif">Compra en los armarios de toda Bolivia y por supuesto, pon a la venta tambi&eacute;n el tuyo con las prendas en buen estado que buscan nuevo due&ntilde;o! (Unos pesitos extra y limpieza de armario asegurada</font><font face="Bell MT, serif">)</font></span></span></span></p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font face="Bell MT, serif">Navega por los siguientes temas para que no te quede duda de usar nuestra plataforma.</font></span></span></span></p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left">&nbsp;</p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font face="Bell MT, serif">-Publicar anuncios de ropa, accesorios y maquillaje:</font></span></span></span></p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font face="Bell MT, serif">Crea tu perfil con tus datos personales y un correo v&aacute;lido, o inicia sesi&oacute;n con tu cuenta, escoge si quieres comprar un anuncio suelto o un paquete de anuncios. </font></span></span></span></p>\r\n\r\n<p style="margin-top:0.21cm; margin-bottom:0.21cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font face="Bell MT, serif">Luego a&ntilde;ade una descripci&oacute;n bonita y real de la prenda/accesorio/maquillaje a la que se va a referir el anuncio, indica el estado de uso de la misma, as&iacute;gnale un precio atractivo para ti y para el comprador, sube hasta 5 fotos para el anuncio, pero recuerda que esas fotos siempre tienen que hacer referencia al mismo art&iacute;culo para que cuando alguien aplique filtros de b&uacute;squeda, te pueda encontrar r&aacute;pidamente.</font></span></span></span></p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font face="Bell MT, serif">&iexcl;El pago de la publicaci&oacute;n no puede ser m&aacute;s f&aacute;cil! Paga tu publicaci&oacute;n online segura o en las diversas formas de pago habilitadas, recibir&aacute;s un correo confirmando la correcta recepci&oacute;n del pago, y nuestro equipo te informar&aacute; por correo la aprobaci&oacute;n de tu anuncio en poquito tiempo. </font><font face="Bell MT, serif"><font size="1"><font style="font-size: 8pt"><i>(ver Condiciones de uso).</i></font></font></font><font face="Bell MT, serif"><font size="1"><font style="font-size: 8pt"><i>NECESITO QUE HAYA UN LINK DE ENLACE AH&Iacute;.</i></font></font></font></span></span></span></p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font face="Bell MT, serif">Hazte notar! Comparte tu anuncio en redes sociales, y no te olvides de responder r&aacute;pidamente los mensajes y llamadas de posibles compradoras, ya que cada interacci&oacute;n puede ser una venta.</font></span></span></span></p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left">&nbsp;</p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font face="Bell MT, serif">-Contactar por una prenda a una vendedora</font></span></span></span></p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font face="Bell MT, serif">&iquest;No tienes nada que ponerte? &iexcl;No es problema! Utiliza nuestros filtros de b&uacute;squeda seg&uacute;n tus gustos y necesidades, ubica la prenda/accesorio/maquillaje que te interesa, luego inicia sesi&oacute;n o bien cr&eacute;ate un usuario para poder ver los datos de contacto de esa vendedora cuando das clic en QUIERO CONTACTAR A LA VENDEDORA, anota su n&uacute;mero de tel&eacute;fono o celular o m&aacute;ndale un mensaje a su perfil.</font></span></span></span></p>\r\n\r\n<p style="margin-top:0.21cm; margin-bottom:0.21cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font face="Bell MT, serif">En el contacto, expresa tu inter&eacute;s en la compra, confirma precio y caracter&iacute;sticas para luego encontrarte con la vendedora! </font><font face="Bell MT, serif"><font size="2"><font style="font-size: 9pt"><i>(<a href="#_10._Como_me" style="color:#0000ff">ver opciones como me puedo juntar</a>).</i></font></font></font><font face="Bell MT, serif"><font size="1"><font style="font-size: 8pt"><i> NECESITO QUE HAYA UN LINK DE ENLACE AH&Iacute;.</i></font></font></font></span></span></span></p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left">&nbsp;</p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font face="Bell MT, serif">-Comentar en anuncios, colocar puntuaciones y comentarios a las vendedoras en base a la experiencia que has tenido con tu compra</font></span></span></span></p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font face="Bell MT, serif">Te encanto la prenda que compraste? La vendedora fue amable? Las caracter&iacute;sticas de la prenda no eran las descritas en el anuncio? En base a tu experiencia de compra da tu puntuaci&oacute;n de la vendedora y tambi&eacute;n comenta en su perfil en el margen del respeto, esto para lograr una comunidad y ayudar a las dem&aacute;s compradoras y vendedoras a contactar y comprar con confianza y seguridad</font><font face="Calibri, serif">.</font></span></span></span></p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left">&nbsp;</p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font face="Bell MT, serif">-Precios y duraci&oacute;n de los anuncios</font></span></span></span></p>\r\n\r\n<p style="margin-bottom:0cm; text-align:left"><span style="line-height:108%"><span style="orphans:2"><span style="widows:2"><font face="Bell MT, serif">El precio de los anuncios son los siguientes:</font></span></span></span></p>\r\n\r\n<table style="border:1px solid #00000a" width="551">\r\n	<colgroup>\r\n		<col width="137" />\r\n		<col width="110" />\r\n		<col width="123" />\r\n		<col width="123" />\r\n	</colgroup>\r\n	<tbody>\r\n		<tr valign="top">\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="137">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">Tipo anuncio</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="110">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">Cantidad de anuncios</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="123">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">Precio</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="123">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">Duraci&oacute;n</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr valign="top">\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="137">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">Anuncio suelto</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="110">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">1</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="123">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">25 Bs.</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="123">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">45 d&iacute;as</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr valign="top">\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="137">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">Paquete 1</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="110">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">3</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="123">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">60 Bs.</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="123">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">60 d&iacute;as (paquete)</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr valign="top">\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="137">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">Paquete 2</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="110">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">6</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="123">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">115 Bs.</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="123">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">75 d&iacute;as (paquete)</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr valign="top">\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="137">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">Paquete 3</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="110">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">12</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="123">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">200 Bs.</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="123">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">90 d&iacute;as (paquete)</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr valign="top">\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="137">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">Paquete 4</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="110">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">50</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="123">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">690 Bs.</span></span></span></p>\r\n			</td>\r\n			<td style="border:1px solid #00000a; padding-top:0cm; padding-bottom:0cm; padding-left:0.2cm; padding-right:0.19cm" width="123">\r\n			<p style="margin-bottom:0.25cm; text-align:left"><span style="line-height:120%"><span style="orphans:2"><span style="widows:2">110 d&iacute;as (paquete)</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="margin-bottom:0.28cm; text-align:left"><br />\r\n<span style="line-height:108%"><span style="orphans:2"><span style="widows:2">Si ninguno de los paquetes se ajusta a tus necesidades cont&aacute;ctanos que con gusto te ayudaremos.</span></span></span></p>\r\n\r\n<p style="margin-bottom:0.28cm; text-align:left"><span style="line-height:108%"><span style="orphans:2"><span style="widows:2">-Prendas permitidas para los anuncios</span></span></span></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Vestidos</span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Blusas</span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Trajes de ba&ntilde;o</span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Maquillaje</span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Zapatos</span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Sombreros</span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Pantalones</span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Bijouteria</span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Ropa deportiva</span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Camisas</span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Chaquetas</span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Enterizos</span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Kimonos</span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Carteras</span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Shorts</span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Ropa pre-mam&aacute;</span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.42cm; margin-bottom:0.42cm; text-align:left"><span style="line-height:150%"><span style="orphans:2"><span style="widows:2">Ropa interior</span></span></span></p>\r\n	</li>\r\n</ul>\r\n\r\n<p style="margin-bottom:0.28cm; text-align:left"><span style="line-height:108%"><span style="orphans:2"><span style="widows:2">Todos los art&iacute;culos pueden ser en condici&oacute;n nuevo (con etiqueta o sin etiqueta) o semi nuevo, pero aseg&uacute;rate de que est&eacute;n en buen estado, y deben tener la calidad y caracter&iacute;sticas dad en la descripci&oacute;n del anuncio.</span></span></span></p>\r\n\r\n<p style="margin-bottom:0.28cm; text-align:left"><span style="line-height:108%"><span style="orphans:2"><span style="widows:2">Recuerda que todos los anuncios son aprobados por nuestro backoffice en un espacio de un par de horas.</span></span></span></p>\r\n', '2018-01-08 07:20:05', NULL),
(3, 28, 'como vender', '<h1>COMO VENDER</h1>\r\n\r\n<p>NqP es una plataforma C2C de anuncios online, tus prendas/accesorios son publicados en la plataforma mediante anuncios que tu misma realizas y pagas online, no te moves ni un poquito donde estes!</p>\r\n\r\n<p>Los pasos de COMO VENDER en NqP te muestro a continuaci&oacute;n:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Busca en tu closet las prendas/accesorios en buen estado con un valor de venta interesante, tambi&eacute;n pueden ser nuevos.</p>\r\n	</li>\r\n	<li>\r\n	<p>Inicia sesi&oacute;n o cr&eacute;ate un usuario y sigue las instrucciones en el correo que te enviemos.</p>\r\n	</li>\r\n	<li>\r\n	<p>Busca Crear anuncio, y determina si quieres un paquete de anuncios (te sale mas baratito) o anuncio suelto.</p>\r\n	</li>\r\n	<li>\r\n	<p>Llena los campos requeridos en el anuncio, y recuerda que cada anuncio debe de referirse a UNA SOLA PRENDA/ACCESORIO.</p>\r\n	</li>\r\n	<li>\r\n	<p>Paralelamente dale una le&iacute;da con cuidado a nuestras reglas de publicaci&oacute;n (link ah&iacute;)</p>\r\n	</li>\r\n	<li>\r\n	<p>Procede a terminar el anuncio haciendo clic en ANUNCIO TERMINADO.</p>\r\n	</li>\r\n	<li>\r\n	<p>Se te llevar&aacute; autom&aacute;ticamente a la pasarela de pagos con tu tarjeta de cr&eacute;dito/debito.</p>\r\n	</li>\r\n	<li>\r\n	<p>Los pagos en NqP son sumamente seguros con PAGOSNET, no hay nada que temer!</p>\r\n	</li>\r\n	<li>\r\n	<p>Una vez hagas el pago y nosotros lo hayamos recepcionado te enviaremos correos electr&oacute;nicos confirmando eso, y anunci&aacute;ndote que tu anuncio est&aacute; en proceso de aprobaci&oacute;n.</p>\r\n	</li>\r\n	<li>\r\n	<p>Tu anuncio puede ser aprobado o puesto a modificaci&oacute;n, te avisaremos en un lapso de m&aacute;ximo 48 horas)</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>Es bastante f&aacute;cil ganar unos pesitos extra y vender tus tesoros por medio de nuestros anuncios.</p>\r\n\r\n<p>Si tienes alguna duda, comentario o nos propones otro m&eacute;todo de pago cont&aacute;ctanos (link en contactanos) estaremos m&aacute;s que felices de siempre ayudarte.</p>\r\n', '2018-01-08 07:26:17', NULL),
(4, 29, 'como comprar', '<h1 style="margin-bottom: 0.28cm; text-align: left;">COMO COMPRAR</h1>\r\n\r\n<p style="margin-bottom:0.28cm; text-align:left"><span style="line-height:108%"><span style="orphans:2"><span style="widows:2">Somos mujeres &iexcl;amamos comprar!</span></span></span></p>\r\n\r\n<p style="margin-bottom:0.28cm; text-align:left"><span style="line-height:108%"><span style="orphans:2"><span style="widows:2">Te explico c&oacute;mo comprar por medio de nuestros anuncios:</span></span></span></p>\r\n\r\n<ol>\r\n	<li>\r\n	<p style="margin-top:0.13cm; margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font color="#666666"><font face="Arial, serif"><font size="3"><font style="font-size: 11pt">Ingresa a nuestra plataforma, comienza a navegar y utiliza los muchos filtros que est&aacute;n disponibles.</font></font></font></font></span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.13cm; margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font color="#666666"><font face="Arial, serif"><font size="3"><font style="font-size: 11pt">Encuentra la prenda/accesorio que te gusta y crees que te quedar&iacute;a bien </font></font></font></font></span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.13cm; margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font color="#666666"><font face="Arial, serif"><font size="3"><font style="font-size: 11pt">A la vendedora de eses anuncio puedes mandarle mensaje privado, comunicarte a los datos de contacto que se muestran en el anuncio o bien dejarle un comentario en el anuncio.</font></font></font></font></span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.13cm; margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font color="#666666"><font face="Arial, serif"><font size="3"><font style="font-size: 11pt">Un peque&ntilde;o consejo de amiga: no esperes mucho en hablar con la vendedora, porque las cosas son &uacute;nicas y vuelan!</font></font></font></font></span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.13cm; margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font color="#666666"><font face="Arial, serif"><font size="3"><font style="font-size: 11pt">Coordina como estas m&aacute;s c&oacute;moda junt&aacute;ndote con ella, revisa nuestras opciones de </font></font></font></font><a href="#_10._Como_me" style="color:#0000ff"><font face="Arial, serif"><font size="3"><font style="font-size: 11pt"><i>c&oacute;mo me puedo juntar</i></font></font></font></a><font color="#666666"><font face="Arial, serif"><font size="3"><font style="font-size: 11pt"> (link ah&iacute; en c&oacute;mo me puedo juntar)</font></font></font></font></span></span></span></p>\r\n	</li>\r\n	<li>\r\n	<p style="margin-top:0.13cm; margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font color="#666666"><font face="Arial, serif"><font size="3"><font style="font-size: 11pt">Si se concret&oacute; la compra es buen tiempo para&nbsp;</font></font></font></font><font face="Arial, serif"><font size="3"><font style="font-size: 11pt">dejar una valoraci&oacute;n</font></font></font><font color="#666666"><font face="Arial, serif"><font size="3"><font style="font-size: 11pt">&nbsp;en el perfil de la vendedora, tu decides si buena o mala (ojo con respeto) pero que ayude a la comunidad NqP en comprar con confianza.</font></font></font></font></span></span></span></p>\r\n	</li>\r\n</ol>\r\n\r\n<p style="margin-top:0.13cm; margin-bottom:0cm; text-align:left">&nbsp;</p>\r\n\r\n<p style="margin-top:0.13cm; margin-bottom:0cm; text-align:left"><span style="line-height:100%"><span style="orphans:2"><span style="widows:2"><font color="#666666"><font face="Arial, serif"><font size="3"><font style="font-size: 11pt">&iquest;Dudas? &iquest;Comentarios? Somos todos o&iacute;dos! Cont&aacute;ctanos (link ah&iacute; en contactanos)</font></font></font></font></span></span></span></p>\r\n', '2018-01-08 07:27:47', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deseo`
--

CREATE TABLE `deseo` (
  `iddeseo` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idanuncio` int(11) DEFAULT '0',
  `idusuario` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faq`
--

CREATE TABLE `faq` (
  `idfaq` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT '',
  `contenido` text,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `faq`
--

INSERT INTO `faq` (`idfaq`, `titulo`, `contenido`, `fecha_creacion`, `estado`) VALUES
(1, 'Lorem Ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae purus varius, facilisis tellus in, consequat augue. Vestibulum ornare est orci, nec auctor nulla dictum ac. Nam erat erat, eleifend ac diam sit amet, laoreet aliquam enim. Fusce tortor nibh, blandit quis nulla at, rutrum sodales diam. Aliquam diam sapien, aliquam nec sapien eu, vestibulum aliquet arcu. Suspendisse fermentum ut urna vitae porttitor. Aliquam maximus orci nisi, in aliquet mi pharetra ut. Maecenas mattis placerat magna. Aliquam sed lacus nec eros euismod tincidunt vitae sed justo.</p>\r\n   \r\n   <p>Nulla risus nunc, luctus nec ante fermentum, feugiat cursus elit. Phasellus quis mollis odio. Sed id purus tristique dolor vehicula aliquet. Vivamus tellus lacus, pulvinar non nisl id, pharetra blandit ex. Curabitur egestas felis eu sodales rhoncus. Sed molestie rhoncus metus in venenatis. Sed elementum mauris quis lorem congue, in condimentum nisi molestie.\r\n   \r\n</p>\r\n', '2018-01-01 02:07:30', 1);

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
(7, 'Contenido', 'contenido', '2017-10-20 20:25:47', 1, ''),
(8, 'FAQ', 'faq', '2017-12-31 22:04:13', 1, ''),
(9, 'Newsletter', 'newsletter', '2017-12-31 23:23:46', 1, ''),
(10, 'Promociones', 'promociones', '2017-12-31 23:49:56', 1, ''),
(11, 'Usuarios', 'usuarios', '2018-01-01 01:09:59', 1, ''),
(12, 'Compras', 'compra', '2018-01-01 01:41:24', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletter`
--

CREATE TABLE `newsletter` (
  `idnews` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT '',
  `email` varchar(200) DEFAULT '',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `newsletter`
--

INSERT INTO `newsletter` (`idnews`, `nombre`, `email`, `fecha_registro`) VALUES
(1, '', 'hdnymib@gmail.com', '2018-01-06 20:09:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `idnoticia` int(11) NOT NULL,
  `idcategoria` int(11) DEFAULT '0',
  `fecha_noticia` timestamp NULL DEFAULT NULL,
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
(1, 7, '2017-12-31 23:06:56', 'test', 'OhOjcWW-RCKzgeXT_ahxD4gzIYfio43r.jpg', 'CONTRARIAMENTE A TODA CREENCIA POPULAR', 'loren ipsum', '<p>loren ipsum</p>\r\n', '1234567', 1, '1', '2017-10-10 02:18:02'),
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
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `idnotificaciones` int(11) NOT NULL,
  `texto` text,
  `fecha_modificacion` timestamp NULL DEFAULT NULL,
  `dia_envio` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `idpaquete` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `precio` double DEFAULT '0',
  `descripcion` text,
  `estado` int(11) DEFAULT '0',
  `nro_anuncios` int(11) DEFAULT '0',
  `tiempo_vida` int(11) DEFAULT '0',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`idpaquete`, `nombre`, `precio`, `descripcion`, `estado`, `nro_anuncios`, `tiempo_vida`, `fecha_registro`) VALUES
(1, 'test paquete', 0, '<p>paquete de prueba</p>\r\n\r\n<p>detalle de paquete</p>\r\n', 1, 3, 2, '2017-10-12 00:52:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `idpromocion` int(11) NOT NULL,
  `codigo` varchar(200) DEFAULT NULL,
  `nro_usos` int(11) DEFAULT '0',
  `estado` int(11) DEFAULT '0',
  `fecha_limite` timestamp NULL DEFAULT NULL,
  `fehca_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idadministrator` int(11) DEFAULT NULL,
  `idpaquete` int(11) DEFAULT NULL,
  `precio` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`idpromocion`, `codigo`, `nro_usos`, `estado`, `fecha_limite`, `fehca_registro`, `idadministrator`, `idpaquete`, `precio`) VALUES
(2, '001', 2, 1, '2018-01-01 01:08:56', '2018-01-01 05:08:43', 1, 1, 0);

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
  `fecha_nacimiento` timestamp NULL DEFAULT NULL,
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
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombres`, `apellidos`, `fecha_nacimiento`, `fecha_registro`, `direccion`, `telefono`, `movil`, `ciudad`, `pais`, `email`, `sexo`, `estado`, `tipo`, `contrasena`, `alias`, `foto`, `descripcion`) VALUES
(1, 'helier', 'cortez', '2018-01-01 23:38:08', '2018-01-01 04:00:00', 'los lotes', '123456', '1234567', 'santa cruz', 'bolivia', 'hdnymib@gmail.com', 0, 1, 1, 'e10adc3949ba59abbe56e057f20f883e', 'test', 'XvZf4_eED7TB_vnw4Y57itDtgbSMOrfF.jpg', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum semper sagittis. Quisque vel urna in diam viverra gravida. Donec vel sagittis ante, et feugiat metus.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idamin`);

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
-- Indices de la tabla `anuncios_visitas`
--
ALTER TABLE `anuncios_visitas`
  ADD PRIMARY KEY (`idvisita`);

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
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idcompra`);

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
-- Indices de la tabla `deseo`
--
ALTER TABLE `deseo`
  ADD PRIMARY KEY (`iddeseo`);

--
-- Indices de la tabla `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idfaq`);

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
-- Indices de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`idnews`);

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
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`idnotificaciones`);

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
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `idanuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `anuncios_filtros`
--
ALTER TABLE `anuncios_filtros`
  MODIFY `idpf` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `anuncios_galeria`
--
ALTER TABLE `anuncios_galeria`
  MODIFY `idgaleria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `anuncios_visitas`
--
ALTER TABLE `anuncios_visitas`
  MODIFY `idvisita` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `idbanner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `idconfiguracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `idcontenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `deseo`
--
ALTER TABLE `deseo`
  MODIFY `iddeseo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `faq`
--
ALTER TABLE `faq`
  MODIFY `idfaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `filtros`
--
ALTER TABLE `filtros`
  MODIFY `idfiltro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idmodulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `idnews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `idnotificaciones` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `idpaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `idpromocion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `promociones_usos`
--
ALTER TABLE `promociones_usos`
  MODIFY `idpuso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
