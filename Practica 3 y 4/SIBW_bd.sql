-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: SIBW_bd
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organizador` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci,
  `imagen` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_p_m` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES ('1','Torneo Mario Kart 8 Deluxe','Nintendo','28/07/19 a las 19:00','Mario Kart 8 Deluxe es un videojuego de carreras desarrollado y publicado por Nintendo para la consola Nintendo Switch. Es la undécima entrega de la serie Mario Kart, novena en consolas de Nintendo, lanzado mundialmente el 28 de abril de 2017. Cuenta con todo lo visto previamente en Mario Kart 8 (pistas, personajes, DLCs, vehículos...). Aunque no incluye nuevas pistas de carreras, incluye nuevos personajes y un mejorado modo batalla. \r\n\r\nPresentamos el cuarto torneo de Mario Kart 8 Deluxe dentro del Campeonato Nacional organizado por Nintendo España. Es el último de los 4 que se realizarán desde <a href=\"http://www.nintenderos.com\">Nintenderos</a> y dará comienzo el día 28 de julio a partir de las 19:00. Serán unas horas para correr todas las carreras y descubrir si eres tan bueno como para pasar a la siguiente ronda.','img/1','2019-03-26 15:30:11'),('2','Evento Pokémon Go','Niantic','19/03/19 - 26/03/19','Niantic ha confirmado un nuevo evento para Pokémon GO: el evento de equinoccio.\n\nEl evento se estrena el próximo 19 de marzo y dura hasta el 26 de marzo, tiempo durante el cual aparecerán más Pokémon de tipo Planta. Además, Lunatone y Solrock cambiarán de hemisferio.\n\n¡Es tu oportunidad para cazar un gran número de Pokémon! Además de los Pokémon satélite, consigue otros como Oddish, Exeggcute, Sunkern o Shroomish.','img/2','2019-03-26 15:30:11'),('3','Salida Assassins Creed III','Ubisoft','29/03/19','Ubisoft ha anunciado que la remasterización de este juego de PS3 saldrá a la venta a finales de marzo para PC, PS4 y XBOX One. Los usuarios de Nintendo Switch tendrán que esperar al 21 de mayo de este mismo año para poder disfrutar de este juego en su consola. \r\n\r\nAssassin\'s Creed III Remastered incluirá todos los DLC lanzados para el título original, soporte para resolución 4K y HDR y mejoras en las mecánicas de juego. El precio de este juego será de 39.99€. Además, podremos encontrar por 10€ más la Signature Edition, que incluirá además un steelbook exclusivo y dos litografías.','img/3','2019-03-26 15:30:11'),('4','Campeonato LOL','Riot Games','13/04/19','Mario Kart 8 Deluxe es un videojuego de carreras desarrollado y publicado por Nintendo para la consola Nintendo Switch. Es la undécima entrega de la serie Mario Kart, novena en consolas de Nintendo, lanzado mundialmente el 28 de abril de 2017. Cuenta con todo lo visto previamente en Mario Kart 8 (pistas, personajes, DLCs, vehículos...). Aunque no incluye nuevas pistas de carreras, incluye nuevos personajes y un mejorado modo batalla.\r\n\r\nPresentamos el cuarto torneo de Mario Kart 8 Deluxe dentro del Campeonato Nacional organizado por Nintendo España. Es el último de los 4 que se realizarán desde <a href=\"https://www.nintenderos.com/\">Nintenderos.com</a> y dará comienzo el día 28 de julio a partir de las 19:00. Serán unas horas para correr todas las carreras y descubrir si eres tan bueno como para pasar a la siguiente ronda.','img/4','2019-03-26 15:30:11'),('5','Fortnite','Epic Games','04/04/16','Fortnite es un videojuego del año 2017 desarrollado por la empresa Epic Games, lanzado como diferentes paquetes de software que presentan diferentes modos de juego, pero que comparten el mismo motor general de juego y las mecánicas. Fue anunciado en los Spike Video Game Awards en 2011.\n\nLos modos de juego publicados incluyen Fortnite Battle Royale, un juego gratuito donde hasta cien jugadores luchan en una isla, en espacios cada vez más pequeños debido a la tormenta, para ser la última persona en pie, y Fortnite: Salvar el mundo, un juego cooperativo de hasta cuatro jugadores que consiste en luchar contra carcasas, criaturas parecidas a zombis, utilizando objetos y fortificaciones.\n\nAmbos modos de juego se lanzaron en 2017 como títulos de acceso anticipado. Salvar el Mundo está disponible solo para Windows, macOS, PlayStation 4 y Xbox One, mientras que Battle Royale ha sido publicado también para Nintendo Switch, dispositivos iOS y para Android.','img/5.jpg','2019-04-23 16:00:00');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otras`
--

DROP TABLE IF EXISTS `otras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `otras` (
  `enlace_o` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`enlace_o`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otras`
--

LOCK TABLES `otras` WRITE;
/*!40000 ALTER TABLE `otras` DISABLE KEYS */;
INSERT INTO `otras` VALUES ('changelog','Cambios','Practica 3: \r\n\r\nSe tendrán en cuenta los siguientes aspectos:\r\n-Arquitectura del sistema: MVC (10 %)\r\n-Identificamos al menos 3 tipos de elementos que pueden ser accesibles (8 %)\r\n•Evento: Con la información que ya se ha comentado en prácticas anteriores. No hace falta añadir más de 5 o 6 eventos: los necesarios para que los listados que se muestren tengan un aspecto razonable.\r\n• Página de información general: Son páginas con información general sobre el sitio, como por ejemplo, la página de contacto, página de los creadores el sitio, información legal, etc. El contenido de dichas páginas debe estar guardado en la BD.\r\n• Etiquetas: Cada evento podrá tener una o más etiquetas, de manera que luego se podrán listar los eventos que estén ligados a una etiqueta particular.\r\n-Uso de Twig como motor de plantillas. Las plantillas usan correctamente el mecanismo de herencia (10 %)\r\n-Usa GET con un id de evento o páginas (2 %)\r\n-Respecto a los comentarios, en la BD se guardan los siguientes datos: (5 %)\r\n• Evento comentado\r\n• Dirección IP utilizada\r\n• Nombre\r\n• Correo electrónico del usuario que hace el comentario\r\n• Fecha y hora del comentario\r\n• Texto del comentario\r\n-En la BD se guarda la lista de palabras prohibidas y se usa para la funcionalidad correspondiente (2 %)\r\n-Usa POST para datos del formulario (3 %)\r\n-Validación en servidor de TODAS las variables GET y POST (independientemente de las validaciones Javascript, que un atacante se puede saltar fácilmente) (10 %)\r\n-En botones de TW y FB se muestra una ventana emergente de Javascript con el siguiente mensaje: (5 %)\r\n‘‘Se publicará en Twitter (o Facebook, según corresponda) el siguiente mensaje:\r\nTEXTO DEL MENSAJE’’\r\n\r\nLa ventana se cerrará pulsando dentro de ella en una opción denominada Aceptar.\r\nEl TEXTO DEL MENSAJE anterior contiene:\r\n• El tı́tulo del evento\r\n• Vı́a @elnombredevuestrositio\r\n• La foto del evento\r\n-En la página evento imprimir: (5 %)\r\n• Arriba a la izquierda aparece el logotipo\r\n• El evento se muestra con foto grande a todo lo ancho\r\n• El texto está a dos columnas\r\n• Si hay vı́deos, se pone su URL\r\n-En cada evento se ve la fecha de publicación y la fecha de última modificación (3 %)\r\n-Se cuida la estética, con contenido y texto limpio (sólo se permite negrita), y se evitan otros aspectos de formato en el texto (2 %)\r\n-Se cuida la seguridad del sistema: (10 %)\r\n• Prevenir inyecciones de SQL o de otro código\r\n• El usuario de conexión con la BD es distinto de root\r\n• El usuario y contraseña de conexión no está incrustado en varios sitios\r\n• Conexiones a la BD (1 por petición HTTP, no por consulta)\r\n• Uso de clase especı́fica para la gestión de la BD (mejor con interfaz\r\nmysqli orientado a objetos)\r\n-Hay galerı́a de fotos (en al menos un evento) (5 %)\r\n-Usa clases y métodos de clase (2 %)\r\n-La información de la BD está en tablas bien estructuradas (3 %)\r\n-Uso de sesiones/HTML5 storage (5 %)\r\n-Menú dinámico (a partir de datos en la BD) (5 %)\r\n-Hay posibilidad de incluir vı́deos (5 %)\r\n-Extras (10 %)'),('sobreNosotros','Sobre nosotros','Somos dos estudiantes de la Universidad de Granada que estudian 3º de Ingeniería Informática, en la especialidad de Ingeniería del Software.\r\n\r\nEsta practica ha sido desarrollada para la asignatura de Sistemas de Información Basados en Web (SIBW). \r\n\r\nSi quieres contactar con nosotros para información o contrato, no dudes en hacerlo en nuestros correos electrónicos: \r\n\r\n- Pedro Domínguez López: pedrodominguez@correo.ugr.es\r\n- Juan Francisco Díaz Moreno: juanfrandm98@correo.ugr.es');
/*!40000 ALTER TABLE `otras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prohibidas`
--

DROP TABLE IF EXISTS `prohibidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prohibidas` (
  `palabra` varchar(23) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`palabra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prohibidas`
--

LOCK TABLES `prohibidas` WRITE;
/*!40000 ALTER TABLE `prohibidas` DISABLE KEYS */;
INSERT INTO `prohibidas` VALUES ('cojones'),('coño'),('gilipollas'),('mierda'),('polla'),('puta'),('subnormal');
/*!40000 ALTER TABLE `prohibidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiene_c`
--

DROP TABLE IF EXISTS `tiene_c`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiene_c` (
  `id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `cuerpo` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiene_c`
--

LOCK TABLES `tiene_c` WRITE;
/*!40000 ALTER TABLE `tiene_c` DISABLE KEYS */;
INSERT INTO `tiene_c` VALUES ('1','152.015.224.132','pablito777','pabloh777@gmail.com','2018-07-28 12:02:24','El mario kart es una **** ***** es mejor el fortnite'),('1','145.245.143.133','eyquepasa','wikiperritos@gmail.com','2018-07-28 20:32:04','es mi juego favorito 100% recomendado el fortnite es de niños ratas'),('2','10.0.2.2','dgdg','hola@hotmail.com','2019-04-19 10:19:15','; DROP TABLE comentarios;'),('2','10.0.2.2','dgd','hola@hotmail.com','2019-04-19 10:20:53',';DROP TABLE tiene_c;'),('2','10.0.2.2',';DROP TABLE tiene_c;','hola@hotmail.com','2019-04-19 10:24:24','asfs'),('2','10.0.2.2','ramon_makina','ramoncj@gmail.com','2019-04-19 12:29:03','el poemon go esta pasado de moda ya nadie juega es una ****** que no vale para nada una caca'),('5','10.0.2.2','antonio96','antonio96@correo.ugr.es','2019-04-23 04:41:59','el fornai es de niños ratas es mejor el pubg');
/*!40000 ALTER TABLE `tiene_c` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiene_e`
--

DROP TABLE IF EXISTS `tiene_e`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiene_e` (
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiene_e`
--

LOCK TABLES `tiene_e` WRITE;
/*!40000 ALTER TABLE `tiene_e` DISABLE KEYS */;
INSERT INTO `tiene_e` VALUES ('+3','1'),('Assasin\'s Creed','3'),('Comparativa','3'),('Consola','1'),('Consola','3'),('League of Legends','4'),('Mario Kart','1'),('MOBA','4'),('Multijugador','1'),('Niantic','2'),('Nintendo','1'),('PC','3'),('PC','4'),('Pokemon','2'),('Realidad Aumentada','2'),('Riot Games','4'),('Telefonos','2'),('Ubisoft','3');
/*!40000 ALTER TABLE `tiene_e` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiene_i`
--

DROP TABLE IF EXISTS `tiene_i`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiene_i` (
  `enlace_i` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creditos` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`enlace_i`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiene_i`
--

LOCK TABLES `tiene_i` WRITE;
/*!40000 ALTER TABLE `tiene_i` DISABLE KEYS */;
INSERT INTO `tiene_i` VALUES ('img/1_1','1','Nintendo: Mario Kart'),('img/1_2','1','Nintendo: Mario Kart'),('img/1_3','1','Nintendo: Mario Kart'),('img/1_4','1','Nintendo: Mario Kart'),('img/2_1','2','Oddish'),('img/3_1','3','Comparación'),('img/4_1','4','League of Legends'),('img/5_1.jpg','5','Fortnite'),('img/5_2.jpeg','5','Fortnite'),('img/5_3.jpg','5','Fortnite');
/*!40000 ALTER TABLE `tiene_i` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiene_v`
--

DROP TABLE IF EXISTS `tiene_v`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiene_v` (
  `enlace_v` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`enlace_v`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiene_v`
--

LOCK TABLES `tiene_v` WRITE;
/*!40000 ALTER TABLE `tiene_v` DISABLE KEYS */;
INSERT INTO `tiene_v` VALUES ('vid/mario_kart_video','1');
/*!40000 ALTER TABLE `tiene_v` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-23 14:44:54
