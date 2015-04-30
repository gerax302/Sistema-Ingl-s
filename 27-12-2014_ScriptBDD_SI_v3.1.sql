create database ingles;

use ingles; 


--
-- Base de datos: `ingles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `NoControl` varchar(45) NOT NULL COMMENT 'PrimaryKey del Alumno.',
  `nombre` varchar(45) DEFAULT NULL COMMENT 'Nombre  inicial del alumno.',
  `apellidoPaterno` varchar(45) DEFAULT NULL COMMENT 'Apellido paterno del alumno.',
  `apellidoMaterno` varchar(45) DEFAULT NULL COMMENT 'Apellido materno del alumno.',
  `domicilio` varchar(45) DEFAULT NULL COMMENT 'domicilio del alumno.',
  `passwordAlumno` varchar(45) DEFAULT NULL COMMENT 'Contraseña del alumno',
  `telefono` varchar(45) DEFAULT NULL COMMENT 'teléfono del alumno.',
  `correo` varchar(45) DEFAULT NULL COMMENT 'correo electrónico del  alumno.',
  `edad` int(11) DEFAULT NULL COMMENT 'edad del alumno.',
  `sexo` varchar(45) DEFAULT NULL COMMENT 'sexo del alumno.',
  `planEstudios` varchar(45) DEFAULT NULL COMMENT 'plan de estudios del alumno.',
  `carrera` varchar(45) DEFAULT NULL COMMENT 'Carrera en la cual esta estudiando el alumno',
  `estadoAlumno` varchar(45) DEFAULT NULL COMMENT 'estado del alumno en el cual dirá si esta inscrito o no',
  `motivoBaja` varchar(100) DEFAULT NULL COMMENT 'Relacion donde el alumno se sabra si esta inscrito, reinscrito o  esta dado de baja',
  `preguntaSeguridad` varchar(100) DEFAULT NULL COMMENT 'Pregunta con la cual,  se pordra recuperar contraseña.',
  `respuestaSeguridad` varchar(50) DEFAULT NULL COMMENT 'Respuesta con la cual,  se pordra recuperar contraseña.',
  `fotografia` longblob COMMENT 'Fotografia del alumno.',
  `idnivel` varchar(100) NOT NULL,
  `idGrupo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`NoControl`),
  KEY `fk_alumno_nivel1_idx` (`idnivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`NoControl`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `domicilio`, `passwordAlumno`, `telefono`, `correo`, `edad`, `sexo`, `planEstudios`, `carrera`, `estadoAlumno`, `motivoBaja`, `preguntaSeguridad`, `respuestaSeguridad`, `fotografia`, `idnivel`, `idGrupo`) VALUES
('JOJO', 'Peter', 'spider', 'man', 'camino de las lomas', 'peter123', '4371002105', 'mestrella@gmail.com', 33, '1', 'Externo', NULL, '1', NULL, '1', 'charcarron', NULL, 'Ingles IAgosto-Diciembre2014', 'vacio'),
('MEME', 'Luis', 'GonzÃ¡lez', 'Juarez', 'camino de las lomas', 'meme123', '4371002105', 'mestrella@gmail.com', 33, '1', 'Externo', NULL, '1', NULL, '1', 'charcarron', NULL, 'Ingles IAgosto-Diciembre2014', 'Ingles I2014A'),
('Z11020026', 'Ale', 'Rossman', 'Pinto', 'lomas del valle', 'ale123', '4371002105', 'mestrella@gmail.com', 33, '2', '1', 'IngenierÃ­a en Sistemas Computacionales', '1', NULL, 'Â¿CuÃ¡l es el nombre de  tu canciÃ³n favorita?', 'Chacarron', NULL, 'Ingles IAgosto-Diciembre2014', 'Ingles I2014A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE IF NOT EXISTS `asignatura` (
  `idAsignatura` int(11) NOT NULL COMMENT 'Primary Key de la Asignatura',
  `nombre` varchar(45) DEFAULT NULL COMMENT 'Nombre de la Asignatura (Materia)',
  `profesor_matricula` varchar(45) DEFAULT NULL,
  `alumno_NoControl` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAsignatura`),
  KEY `fk_asignatura_profesor1_idx` (`profesor_matricula`),
  KEY `fk_asignatura_alumno1_idx` (`alumno_NoControl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE IF NOT EXISTS `calificaciones` (
  `idCalificaciones` varchar(100) NOT NULL,
  `nivelAlumno` varchar(45) DEFAULT NULL,
  `unidad1` varchar(45) DEFAULT NULL,
  `unidad2` varchar(45) DEFAULT NULL,
  `unidad3` varchar(45) DEFAULT NULL,
  `unidad4` varchar(45) DEFAULT NULL,
  `unidad5` varchar(45) DEFAULT NULL,
  `unidad6` varchar(45) DEFAULT NULL,
  `unidad7` varchar(45) DEFAULT NULL,
  `unidad8` varchar(45) DEFAULT NULL,
  `unidad9` varchar(45) DEFAULT NULL,
  `unidad10` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCalificaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`idCalificaciones`, `nivelAlumno`, `unidad1`, `unidad2`, `unidad3`, `unidad4`, `unidad5`, `unidad6`, `unidad7`, `unidad8`, `unidad9`, `unidad10`) VALUES
('MEMEIngles I2014A', 'Ingles I', '78', '78', '89', '89', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA'),
('Z11020026Ingles I2014A', 'Ingles I', '100', '78', '89', '100', '89', '89', 'NA', 'NA', 'NA', 'NA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE IF NOT EXISTS `carrera` (
  `idcarrera` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key de carrera',
  `carrera` varchar(100) NOT NULL COMMENT 'campo carreras.',
  PRIMARY KEY (`idcarrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE IF NOT EXISTS `dias` (
  `idDia` int(100) NOT NULL AUTO_INCREMENT,
  `nombreDia` varchar(45) DEFAULT NULL,
  `horaInicio` varchar(45) DEFAULT NULL,
  `horaFin` varchar(45) DEFAULT NULL,
  `grupo_idGrupo` varchar(100) NOT NULL,
  PRIMARY KEY (`idDia`),
  KEY `fk_dias_grupo1_idx` (`grupo_idGrupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `dias`
--

INSERT INTO `dias` (`idDia`, `nombreDia`, `horaInicio`, `horaFin`, `grupo_idGrupo`) VALUES
(1, 'Lunes', '', '', 'Ingles I2014A'),
(2, 'Martes', '', '', 'Ingles I2014A'),
(3, 'Lunes', '', '', 'Ingles I2014B'),
(22, 'Lunes', '14:03', '12:08', 'Ingles I2014D'),
(23, 'Jueves', '14:00', '12:12', 'Ingles I2014D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dosificaciongeneral`
--

CREATE TABLE IF NOT EXISTS `dosificaciongeneral` (
  `idDosificacionGeneral` varchar(100) NOT NULL COMMENT 'Llave primaria de la Dosificación.',
  `formato` varchar(100) DEFAULT NULL COMMENT 'Formato a llenar Dosificación.',
  `responsable` varchar(100) DEFAULT NULL COMMENT 'Responsable de revisar la Dosificación.',
  `codigoDosificacion` varchar(100) DEFAULT NULL COMMENT 'Código de la Dosificación.',
  `revision` int(11) DEFAULT NULL COMMENT 'Número de  revición de la Dosificación.',
  `fechaDosificacion` date DEFAULT NULL COMMENT 'Fecha de la Dosificación.',
  `asignatura` varchar(45) DEFAULT NULL COMMENT 'Asignatura de la Dosificación.',
  `horasTeoricas` int(11) DEFAULT NULL COMMENT 'Horas teóricas de la Dosificación.',
  `horasPracticas` int(11) DEFAULT NULL COMMENT 'Horas practicas de la Dosificación.',
  `creditos` int(11) DEFAULT NULL COMMENT 'Créditos de la Dosificación.',
  `grupo` varchar(45) DEFAULT NULL COMMENT 'Grupo de la Dosificación.',
  `periodo` varchar(45) DEFAULT NULL COMMENT 'Periódo laboral del profesor.',
  `objetivoCurso` mediumtext COMMENT 'Objetivo del curso .',
  `aportacionCurso` mediumtext COMMENT 'Aportación del curso al perfil profesional.',
  `temaAnterior` varchar(100) DEFAULT NULL COMMENT 'Tema anterior.',
  `temaPosterior` varchar(100) DEFAULT NULL COMMENT 'Tema posterior.',
  `asignaturaAnterior` varchar(100) DEFAULT NULL COMMENT 'Asignatura anterior.',
  `asignaturaPosterior` varchar(100) DEFAULT NULL COMMENT 'Asignatura  posterior.',
  PRIMARY KEY (`idDosificacionGeneral`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dosificaciongeneral`
--

INSERT INTO `dosificaciongeneral` (`idDosificacionGeneral`, `formato`, `responsable`, `codigoDosificacion`, `revision`, `fechaDosificacion`, `asignatura`, `horasTeoricas`, `horasPracticas`, `creditos`, `grupo`, `periodo`, `objetivoCurso`, `aportacionCurso`, `temaAnterior`, `temaPosterior`, `asignaturaAnterior`, `asignaturaPosterior`) VALUES
('Rafael  Campa  PerezAgosto-Diciembre2014Ingles IA', 'DosificaciÃ³n de programa', 'Rafael  Campa  Perez', '12232', 2, '2014-12-09', 'Ingles I', 34, 45, 79, 'A', 'Agosto-Diciembre2014', 'NADA DE NADA\r\n', 'NADA DE NADA   \r\n', 'Ninguna', 'Ninguna', 'Ninguna', 'Ninguna'),
('Rafael  Campa  PerezAgosto-Diciembre2014Ingles IIA', 'DosificaciÃ³n de programa', 'Rafael  Campa  Perez', '12232', 2, '2014-12-16', 'Ingles II', 34, 34, 68, 'A', 'Agosto-Diciembre2014', 'Nada de nada\r\n', 'Nada de nada   \r\n', 'Ninguna', 'Ninguna', 'Ninguna', 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dosificacionunidad`
--

CREATE TABLE IF NOT EXISTS `dosificacionunidad` (
  `idDosificacionPorUnidad` varchar(100) NOT NULL COMMENT 'Primary key  de Dosificación.',
  `grupo` varchar(100) NOT NULL,
  `unidad` varchar(100) DEFAULT NULL COMMENT 'Hace referencia al número de la unidad  (Unidad : I,II,III...).',
  `nombreUnidad` varchar(200) DEFAULT NULL COMMENT 'Nombre de la unidad .',
  `objetivoAprendizaje` varchar(100) DEFAULT NULL COMMENT 'Objetivo general de la unidad.',
  `contenidoTemasSubtemas` mediumtext COMMENT 'Contenido que se inpartirá de la unidad (Temas y Subtemas).',
  `estrategiasDidacticas` mediumtext CHARACTER SET latin1 COLLATE latin1_spanish_ci COMMENT 'Estrategias  didácticas de la unidad.',
  `estrategiasAprendizaje` mediumtext COMMENT 'Estrategias  de aprendizaje por unidad.',
  `desarrolloNoHoras` double DEFAULT NULL COMMENT 'Número de horas en el desarrollo de la unidad.',
  `desarrolloInicio` date DEFAULT NULL COMMENT 'Fecha de inicio del desarrollo de la unidad.',
  `desarrolloTermino` date DEFAULT NULL COMMENT 'Fecha de término del desarrollo de la unidad.',
  `evaluacion` mediumtext COMMENT 'Especificación de  como se evaluará la unidad.',
  `practicasVisitas` mediumtext COMMENT 'Prácticas  o visitas a realizar por unidad.',
  `recursosDidacticos` mediumtext COMMENT 'Recursos por apoyarse  en la unidad.',
  `fuentesInformacion` mediumtext COMMENT 'Fuentes de donde se obtiene la información  como apoyo a la unidad.',
  PRIMARY KEY (`idDosificacionPorUnidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dosificacionunidad`
--

INSERT INTO `dosificacionunidad` (`idDosificacionPorUnidad`, `grupo`, `unidad`, `nombreUnidad`, `objetivoAprendizaje`, `contenidoTemasSubtemas`, `estrategiasDidacticas`, `estrategiasAprendizaje`, `desarrolloNoHoras`, `desarrolloInicio`, `desarrolloTermino`, `evaluacion`, `practicasVisitas`, `recursosDidacticos`, `fuentesInformacion`) VALUES
('Rafael  Campa  PerezAgosto-Diciembre2014Ingles IA1', 'Ingles IA', '1', 'what do you do?', 'la vida es bella', 'Pero no justa ', 'A veces ganamos ', 'A veces perdemos ', 34, '2014-12-16', '2014-12-16', 'Nada de nada', 'Porque ale ', 'jaja no jala', 'Si si jala \r\n        '),
('Rafael  Campa  PerezAgosto-Diciembre2014Ingles IIA1', 'Ingles IIA', '1', 'what do you do?', 'Cosas de la vida\r\n\r\n', 'Nada de nada', 'Menos ', 'MAS MENOS ', 34, '2014-12-16', '2014-12-17', 'NADA', 'NADA ', 'NADA', 'NADA \r\n        ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formapago`
--

CREATE TABLE IF NOT EXISTS `formapago` (
  `idFormaPago` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PrimaryKey del FormaPago.',
  `tipoPago` varchar(45) NOT NULL COMMENT 'Forma en la que se pago (recibo/prorroga)',
  `numeroRecibo` varchar(45) DEFAULT NULL COMMENT 'es el numero del recibo si es que pago con recibo',
  `fechaLimite` date DEFAULT NULL COMMENT 'Fecha limite a pagar si es que el alumno solicito prorroga',
  `nivelPagado` varchar(45) NOT NULL COMMENT 'espesifica el nibel el cual el alumno ya pago',
  `Alumno_NoControl` varchar(45) NOT NULL COMMENT 'id del alumno',
  PRIMARY KEY (`idFormaPago`),
  KEY `fk_formaPago_Alumno1_idx` (`Alumno_NoControl`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Volcado de datos para la tabla `formapago`
--

INSERT INTO `formapago` (`idFormaPago`, `tipoPago`, `numeroRecibo`, `fechaLimite`, `nivelPagado`, `Alumno_NoControl`) VALUES
(43, '2', '', '2014-12-03', 'Ingles I', 'MEME'),
(44, '1', '1234553', '0000-00-00', 'Ingles I', 'Z11020026'),
(45, '1', '1234', '0000-00-00', ' Ingles II', 'MEME'),
(46, '2', '', '2014-12-17', 'Ingles I', 'JOJO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotografia`
--

CREATE TABLE IF NOT EXISTS `fotografia` (
  `idfotografia` varchar(45) NOT NULL,
  `imagen` longblob,
  `tipoFoto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfotografia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `idGrupo` varchar(100) NOT NULL,
  `nombreGrupo` varchar(45) DEFAULT NULL,
  `numAlumnos` int(11) DEFAULT NULL,
  `totalAlumnos` int(11) NOT NULL,
  `nivel_idnivel` varchar(100) NOT NULL,
  `profesor_matricula` varchar(45) NOT NULL,
  `estadoGrupo` varchar(45) NOT NULL,
  PRIMARY KEY (`idGrupo`),
  KEY `fk_grupo_nivel1_idx` (`nivel_idnivel`),
  KEY `fk_grupo_profesor1_idx` (`profesor_matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`idGrupo`, `nombreGrupo`, `numAlumnos`, `totalAlumnos`, `nivel_idnivel`, `profesor_matricula`, `estadoGrupo`) VALUES
('Ingles I2014A', 'A', 2, 0, 'Ingles IAgosto-Diciembre2014', 'QWERTY', 'Activo'),
('Ingles I2014B', 'B', NULL, 0, 'Ingles IAgosto-Diciembre2014', 'QWERTY', 'Activo'),
('Ingles I2014C', 'C', NULL, 0, 'Ingles IAgosto-Diciembre2014', 'QWERTY', 'Activo'),
('Ingles I2014D', 'D', NULL, 0, 'Ingles IAgosto-Diciembre2014', 'QWERTY', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `idnivel` varchar(100) NOT NULL,
  `nivelIngles` varchar(100) NOT NULL,
  `periodo` varchar(100) NOT NULL,
  `anio` int(11) NOT NULL,
  `estadoNivel` varchar(45) NOT NULL,
  PRIMARY KEY (`idnivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`idnivel`, `nivelIngles`, `periodo`, `anio`, `estadoNivel`) VALUES
('Ingles IAgosto-Diciembre2014', 'Ingles I', 'Agosto-Diciembre', 2014, 'Activo'),
('Ingles IIAgosto-Diciembre2014', 'Ingles II', 'Agosto-Diciembre', 2014, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `matricula` varchar(45) NOT NULL COMMENT 'Primary key , matrícula del profesor (Número de control).',
  `nombre` varchar(100) DEFAULT NULL COMMENT 'Específica el nombre del profesor.',
  `apellidoPaterno` varchar(100) DEFAULT NULL COMMENT 'Específica el apellido paterno  del profesor.',
  `apellidoMaterno` varchar(100) DEFAULT NULL COMMENT 'Específica el apellido materno  del profesor.',
  `direccion` varchar(100) DEFAULT NULL COMMENT 'Dirección del profesor.',
  `telefono` varchar(45) DEFAULT NULL COMMENT 'Teléfono del profesor.',
  `correo` varchar(100) DEFAULT NULL COMMENT 'Correo electrónico del profesor.',
  `certificaciones` varchar(300) DEFAULT NULL COMMENT 'Certificaciones del profesor.',
  `experiencia` varchar(300) DEFAULT NULL COMMENT 'Experiencia del profesor.',
  `fechaIngreso` date DEFAULT NULL COMMENT 'Fecha en que ingresó el profesor.',
  `nivelesImpartidos` varchar(100) DEFAULT NULL COMMENT 'Niveles impartidos del profesor.',
  `nivelImpartidoActualmente` varchar(100) DEFAULT NULL COMMENT 'Nivel impartido actualmente.',
  `periodoLaboral` varchar(100) DEFAULT NULL COMMENT 'Periodo laboral del profesor.',
  `estadoLaboral` varchar(45) DEFAULT NULL COMMENT 'Estado laboral del profesor (Activo, inactivo: solicitud personal, incapacidad, problemas laborales).',
  `passwordProfesor` varchar(45) DEFAULT NULL COMMENT 'Contraseña del profesor',
  `preguntaSeguridad` varchar(100) DEFAULT NULL COMMENT 'Pregunta con la cual,  se pordra recuperar contraseña.',
  `respuestaSeguridad` varchar(50) DEFAULT NULL COMMENT 'Respuesta con la cual,  se pordra recuperar contraseña.',
  `fotografia` longblob COMMENT 'Fotografia del profesor',
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`matricula`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `direccion`, `telefono`, `correo`, `certificaciones`, `experiencia`, `fechaIngreso`, `nivelesImpartidos`, `nivelImpartidoActualmente`, `periodoLaboral`, `estadoLaboral`, `passwordProfesor`, `preguntaSeguridad`, `respuestaSeguridad`, `fotografia`) VALUES
('QWERTY', 'Rafael', 'Campa', 'Perez', 'Atolinga No.20', '4371002105', 'mestrella@gmail.com', 'TOEIC', 'tres aÃ±os de compromiso', '2014-12-10', ' I II III', ' I II', 'periodo1', '1', 'rafa123', '2', 'Tlaltenango', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_dosificaciongeneral`
--

CREATE TABLE IF NOT EXISTS `profesor_dosificaciongeneral` (
  `fk_idDosificacionGeneral` varchar(45) NOT NULL COMMENT 'Foreing Key de la dosificación general',
  `fk_idAsignatura` int(11) NOT NULL COMMENT 'Foreing Key de Asignatura',
  KEY `fk_idAsignatura` (`fk_idAsignatura`),
  KEY `fk_profesor_has_dosificaciongeneral_dosificaciongeneral1_idx` (`fk_idDosificacionGeneral`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reinscripcion`
--

CREATE TABLE IF NOT EXISTS `reinscripcion` (
  `idReinscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `NoControl` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidoPaterno` varchar(45) DEFAULT NULL,
  `apellidoMaterno` varchar(45) DEFAULT NULL,
  `domicilio` varchar(45) NOT NULL,
  `passwordAlumno` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `planEstudios` varchar(45) DEFAULT NULL,
  `carrera` varchar(45) DEFAULT NULL,
  `estadoAlumno` varchar(45) DEFAULT NULL,
  `preguntaSeguridad` varchar(100) DEFAULT NULL,
  `respuestaSeguridad` varchar(100) DEFAULT NULL,
  `idnivel` varchar(100) DEFAULT NULL,
  `idGrupo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idReinscripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `reinscripcion`
--

INSERT INTO `reinscripcion` (`idReinscripcion`, `NoControl`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `domicilio`, `passwordAlumno`, `telefono`, `correo`, `edad`, `sexo`, `planEstudios`, `carrera`, `estadoAlumno`, `preguntaSeguridad`, `respuestaSeguridad`, `idnivel`, `idGrupo`) VALUES
(32, 'MEME', 'Luis', 'GonzÃ¡lez', 'Juarez', 'camino de las lomas', 'meme123', '4371002105', 'mestrella@gmail.com', 33, '1', 'Externo', '', '1', '1', 'charcarron', 'Ingles IIAgosto-Diciembre2014', 'Ingles II2014A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key del usuario',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre del usuario con el que se va a iniciar sesión.',
  `passwordUsuario` varchar(45) NOT NULL COMMENT 'Contraseña del usuario.',
  `preguntaSeguridad` varchar(100) DEFAULT NULL COMMENT 'Pregunta con la cual,  se pordra recuperar contraseña.',
  `respuestaSeguridad` varchar(50) DEFAULT NULL COMMENT 'Respuesta con la cual,  se pordra recuperar contraseña.',
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `passwordUsuario`, `preguntaSeguridad`, `respuestaSeguridad`) VALUES
(1, 'administrador', '1234', '2', 'Tlaltenango'),
(2, 'secretaria', '1234', NULL, NULL),
(3, 'subdireccion', '1234', NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_alumno_nivel1` FOREIGN KEY (`idnivel`) REFERENCES `nivel` (`idnivel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `fk_asignatura_alumno1` FOREIGN KEY (`alumno_NoControl`) REFERENCES `alumno` (`NoControl`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignatura_profesor1` FOREIGN KEY (`profesor_matricula`) REFERENCES `profesor` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dias`
--
ALTER TABLE `dias`
  ADD CONSTRAINT `fk_dias_grupo1` FOREIGN KEY (`grupo_idGrupo`) REFERENCES `grupo` (`idGrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `formapago`
--
ALTER TABLE `formapago`
  ADD CONSTRAINT `fk_formaPago_Alumno1` FOREIGN KEY (`Alumno_NoControl`) REFERENCES `alumno` (`NoControl`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `fk_grupo_nivel1` FOREIGN KEY (`nivel_idnivel`) REFERENCES `nivel` (`idnivel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupo_profesor1` FOREIGN KEY (`profesor_matricula`) REFERENCES `profesor` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `profesor_dosificaciongeneral`
--
ALTER TABLE `profesor_dosificaciongeneral`
  ADD CONSTRAINT `fk_idAsignatura` FOREIGN KEY (`fk_idAsignatura`) REFERENCES `asignatura` (`idAsignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_idDosificacionGeneral` FOREIGN KEY (`fk_idDosificacionGeneral`) REFERENCES `dosificaciongeneral` (`idDosificacionGeneral`) ON DELETE NO ACTION ON UPDATE NO ACTION;

