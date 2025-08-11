

CREATE TABLE `assistance` (
  `idassistance` int(11) NOT NULL AUTO_INCREMENT,
  `idpeople` int(11) NOT NULL,
  `kind_id` int(11) DEFAULT NULL,
  `fecha_star` datetime NOT NULL,
  `fecha_end` datetime DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idassistance`),
  KEY `fk_assistance_personal_idx` (`idpeople`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

INSERT INTO assistance VALUES("60","2211","1","2022-11-02 16:29:56","2022-11-02 17:21:17","","0");
INSERT INTO assistance VALUES("61","2210","1","2022-11-02 16:30:34","2022-11-02 17:22:59","","0");
INSERT INTO assistance VALUES("64","2805","2","2022-11-02 00:00:00","","PERMISO POR SALUD","");
INSERT INTO assistance VALUES("65","2806","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("66","2807","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("67","2808","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("68","2809","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("69","2810","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("70","2811","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("71","2812","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("72","2813","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("73","2814","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("74","2815","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("75","2816","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("76","2817","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("77","2818","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("78","2819","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("79","2820","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("80","2821","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("81","2822","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("82","2823","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("83","2824","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("84","2825","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("85","2826","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("86","2827","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("87","2828","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("88","2829","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("89","2830","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("90","2831","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("91","2832","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("92","2833","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("93","2834","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("94","2835","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("95","2836","3","2022-11-02 00:00:00","","","");
INSERT INTO assistance VALUES("96","2211","1","2022-11-02 17:22:48","","","1");
INSERT INTO assistance VALUES("97","2211","3","2022-11-04 00:00:00","","","");
INSERT INTO assistance VALUES("98","2210","3","2022-11-04 00:00:00","","","");
INSERT INTO assistance VALUES("99","2211","3","2022-11-03 00:00:00","","","");
INSERT INTO assistance VALUES("100","2210","3","2022-11-03 00:00:00","","","");
INSERT INTO assistance VALUES("101","2841","1","2022-11-05 23:28:04","","","0");
INSERT INTO assistance VALUES("102","2841","3","2022-11-04 00:00:00","","","");
INSERT INTO assistance VALUES("103","2841","2","2022-11-03 00:00:00","","permiso por salud","");



CREATE TABLE `calendar` (
  `idcalendar` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `color` varchar(50) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `tipo` int(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`idcalendar`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO calendar VALUES("8","FERIADO","#ff0000","2022-06-07 00:00:00","2022-06-08 00:00:00","1","1");
INSERT INTO calendar VALUES("9","FERIADO","#ff0000","2022-11-09 00:00:00","2022-11-10 00:00:00","1","1");



CREATE TABLE `consulaten` (
  `idconsulaten` int(11) NOT NULL AUTO_INCREMENT,
  `iduserform` int(11) NOT NULL,
  `msj_usu` varchar(500) NOT NULL,
  `adjunto` varchar(100) NOT NULL,
  `fech_actual` datetime NOT NULL,
  PRIMARY KEY (`idconsulaten`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO consulaten VALUES("1","1","ENVIO DEL REGISTRO DE ASISTENCIAS SOLICITADO","1667427406.xlsx","2022-11-02 17:16:45");
INSERT INTO consulaten VALUES("2","2","se atendio su","1667709500.pdf","2022-11-05 23:38:20");



CREATE TABLE `consulrech` (
  `idconsulrech` int(11) NOT NULL AUTO_INCREMENT,
  `iduserform` int(11) NOT NULL,
  `msj_usu` varchar(500) NOT NULL,
  `fech_actual` datetime NOT NULL,
  PRIMARY KEY (`idconsulrech`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `consulta` (
  `iduserform` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ape_paterno` varchar(100) DEFAULT NULL,
  `ape_materno` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `document` varchar(100) DEFAULT NULL,
  `num_exp` varchar(200) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `condicion` tinyint(1) NOT NULL,
  PRIMARY KEY (`iduserform`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO consulta VALUES("1","4858365844","Jose","Carhuapoma","Huaman","881-2188","978-083-556","josecarhuapoma2@gmail.com","PERU","SOLICITO ASISTENCIAS","SOLICITO ASISTENCIAS DE MI MENJOR HIJO PEDRO ARIAS DEL CUARTO DE BACHILLERATO...... DE LOS MESES JUNIO","1667427194.pdf","SAV-001-22","2022-11-02 17:13:13","2");
INSERT INTO consulta VALUES("2","47742273","grimaldo","juep","sanchez","015-874_","987-635-987","grimaldojuepsanchez@gmail.com","AWAJUN Y NUEVA","RETIRO","por motivo de viaje ","1667709287.pdf","SAV-002-22","2022-11-05 23:34:47","2");



CREATE TABLE `entity` (
  `identity` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_en` varchar(50) NOT NULL,
  `direccion_en` varchar(200) NOT NULL,
  `telefono_en` varchar(20) DEFAULT NULL,
  `imagen_en` varchar(100) NOT NULL,
  PRIMARY KEY (`identity`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO entity VALUES("1","I.E MOGROVEJO","LAMBAYAQUE","+51 978 083 556","1664683080.png");



CREATE TABLE `fut` (
  `idfut` int(11) NOT NULL AUTO_INCREMENT,
  `fut_document` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idfut`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO fut VALUES("1","1664918091.docx");



CREATE TABLE `groups` (
  `idgroup` int(11) NOT NULL AUTO_INCREMENT,
  `detalle_group` varchar(50) NOT NULL,
  `status_group` tinyint(4) NOT NULL,
  PRIMARY KEY (`idgroup`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO groups VALUES("1","Estudiante","1");
INSERT INTO groups VALUES("2","Docente","1");
INSERT INTO groups VALUES("3","Administrativo","1");



CREATE TABLE `people` (
  `idpeople` int(11) NOT NULL AUTO_INCREMENT,
  `lastname_peo` varchar(100) NOT NULL,
  `name_peo` varchar(100) NOT NULL,
  `tipodoc_peo` varchar(50) NOT NULL,
  `numberdoc_peo` varchar(50) NOT NULL,
  `datos1_peo` varchar(100) NOT NULL,
  `datos2_peo` varchar(100) NOT NULL,
  `codpostal_peo` varchar(10) NOT NULL,
  `phone_peo` varchar(20) NOT NULL,
  `mail_peo` varchar(50) NOT NULL,
  `tipo_peo` varchar(100) NOT NULL,
  `anio_peo` varchar(20) NOT NULL,
  `qrcode` varchar(50) NOT NULL,
  `imagencrop` varchar(50) DEFAULT NULL,
  `status_peo` tinyint(4) NOT NULL,
  PRIMARY KEY (`idpeople`)
) ENGINE=InnoDB AUTO_INCREMENT=2842 DEFAULT CHARSET=utf8;

INSERT INTO people VALUES("2210","Jose","Carhuapoma","DNI","747586325","ASISTENTE","ASISTENTE","+51","8002555","josecarhuapoma2@gmail.com","Docente","2022","747586325.png","","1");
INSERT INTO people VALUES("2211","Gia","Sanchez","DNI","58659845","Asistente","Asistente","+51","0","carhuapoma_a5@hotmail.com","Docente","2022","58659845.png","","1");
INSERT INTO people VALUES("2610","BRAVO CEDEÑO","ANGEL MANUEL","Cedula","1352970634","INICIAL 3 AÑOS ","A","593","0","dianatheslim@hotmail.com ","Estudiante","2022","1352970634.png","","1");
INSERT INTO people VALUES("2611","CASTRO TEJENA","DOMENICA CECILIA","Cedula","1352971970","INICIAL 3 AÑOS ","A","593","0","erika_tejena@hotmail.com ","Estudiante","2022","1352971970.png","","1");
INSERT INTO people VALUES("2612","FERNANDEZ GARCIA","AMI SAMIRA","Cedula","1353080284","INICIAL 3 AÑOS ","A","593","0","geiberxx3000@hotmail.com","Estudiante","2022","1353080284.png","","1");
INSERT INTO people VALUES("2613","MACIAS NAVARRETE","SAMUEL ANDRES","Cedula","1352996498","INICIAL 3 AÑOS ","A","593","0","carlosmave261089@gmail.com ","Estudiante","2022","1352996498.png","","1");
INSERT INTO people VALUES("2614","MERA MOREIRA","STIBALY ITZAYANA","Cedula","1353130600","INICIAL 3 AÑOS ","A","593","0","victor.mera.mendoza@gmail.com ","Estudiante","2022","1353130600.png","","1");
INSERT INTO people VALUES("2615","MEZA CEDEÑO","GIANNA VALENTINA","Cedula","1352962391","INICIAL 3 AÑOS ","A","593","0","leandrameza_emy19@hotmail.com ","Estudiante","2022","1352962391.png","","1");
INSERT INTO people VALUES("2616","MOREIRA MENDIETA","MARIA CAMILA","Cedula","1353092743","INICIAL 3 AÑOS ","A","593","0","maholy_933@hotmail.com ","Estudiante","2022","1353092743.png","","1");
INSERT INTO people VALUES("2617","NAVIA ALAVA","KALETH DARIO","Cedula","1353102435","INICIAL 3 AÑOS ","A","593","0","may_elizabeth_52@hotmail.com","Estudiante","2022","1353102435.png","","1");
INSERT INTO people VALUES("2618","TEJENA CUZME","JUAN ELIAN","Cedula","1353045782","INICIAL 3 AÑOS ","A","593","0","tamy_dou@hotmail.com","Estudiante","2022","1353045782.png","","1");
INSERT INTO people VALUES("2619","ALCIVAR ZAMORA","CHRISLEINY TRINIDAD","Cedula","1352855108","INICIAL 4 AÑOS ","A","593","0","mariamenendez580@gmail.com ","Estudiante","2022","1352855108.png","","1");
INSERT INTO people VALUES("2620","BARCIA MACIAS","JOSE MIGUEL","Cedula","1352913832","INICIAL 4 AÑOS ","A","593","0","maciasmarisela593@gmail.com ","Estudiante","2022","1352913832.png","","1");
INSERT INTO people VALUES("2621","CAMPOVERDE LUNA","SAMARA LUISANA","Cedula","1352835100","INICIAL 4 AÑOS ","A","593","0","dali_lunasanchez@hotmail.com","Estudiante","2022","1352835100.png","","1");
INSERT INTO people VALUES("2622","CORREA MARTINEZ","SOFIA DANIELA","Cedula","1352713760","INICIAL 4 AÑOS ","A","593","0","tanya3084@hotmail.com","Estudiante","2022","1352713760.png","","1");
INSERT INTO people VALUES("2623","GONZALEZ DIAZ","ALBERTO EMILIO","Cedula","962745840","INICIAL 4 AÑOS ","A","593","0","sheila2160@hotmail.com","Estudiante","2022","962745840.png","","1");
INSERT INTO people VALUES("2624","HEREDIA BRAVO","AINHOA ANTONELLA","Cedula","1352712887","INICIAL 4 AÑOS ","A","593","0","joandresherediamendoza@hotmail.com ","Estudiante","2022","1352712887.png","","1");
INSERT INTO people VALUES("2625","LOOR BASURTO","ANDREA CRISTHINA","Cedula","1352852238","INICIAL 4 AÑOS ","A","593","0","angelloecu1980@hotmail.com ","Estudiante","2022","1352852238.png","","1");
INSERT INTO people VALUES("2626","MENDOZA SALAZAR","MARIA VICTORIA","Cedula","962258646","INICIAL 4 AÑOS ","A","593","0","fannysalazar87@hotmail.com","Estudiante","2022","962258646.png","","1");
INSERT INTO people VALUES("2627","MOLINA ZAMBRANO","ABBY ISABELLA","Cedula","1352907693","INICIAL 4 AÑOS ","A","593","0","jenzam83@hotmail.com","Estudiante","2022","1352907693.png","","1");
INSERT INTO people VALUES("2628","PIN ARTEAGA","CARLOS EMILIO","Cedula","1352861825","INICIAL 4 AÑOS ","A","593","0","jessita_arteaga@hotmail.com ","Estudiante","2022","1352861825.png","","1");
INSERT INTO people VALUES("2629","RAMIREZ MERO","IVANNA SOPHIA","Cedula","1352783847","INICIAL 4 AÑOS ","A","593","0","ro.ivan84@hotmail.com ","Estudiante","2022","1352783847.png","","1");
INSERT INTO people VALUES("2631","ROSADO PEÑA","ITZHAYANA DEYLU","Cedula","1352948499","INICIAL 4 AÑOS ","A","593","0","ld.penavera@gmail.com","Estudiante","2022","1352948499.png","","1");
INSERT INTO people VALUES("2632","TOALA SANCHEZ","ARIANA VALENTINA","Cedula","1352772428","INICIAL 4 AÑOS ","A","593","0","thecat2607@hotmail.com","Estudiante","2022","1352772428.png","","1");
INSERT INTO people VALUES("2633","TREJO CEDEÑO","MARA EDUARDA","Cedula","1352613648","INICIAL 4 AÑOS ","A","593","0","irinatrejo3@gmail.com","Estudiante","2022","1352613648.png","","1");
INSERT INTO people VALUES("2634","ZAMBRANO VERGARA","MAURO MAXIMILIANO","Cedula","963041561","INICIAL 4 AÑOS ","A","593","0","drmau23@hotmail.com","Estudiante","2022","963041561.png","","1");
INSERT INTO people VALUES("2635","ALDAZ LOOR","KATE YARELI","Cedula","1758161325","PRIMER GRADO BASICO","A","593","0","foriss12@gmail.com ","Estudiante","2022","1758161325.png","","1");
INSERT INTO people VALUES("2636","EXPOSITO CHAVEZ","MARIA VALERIE","Cedula","1352654295","PRIMER GRADO BASICO","A","593","0","tft.academicdirection@gmail.com ","Estudiante","2022","1352654295.png","","1");
INSERT INTO people VALUES("2637","GONZALEZ GUADAMUD","KATE ELIZABETH","Cedula","1352646804","PRIMER GRADO BASICO","A","593","0","ytat312012@hotmail.com ","Estudiante","2022","1352646804.png","","1");
INSERT INTO people VALUES("2638","GUTIERREZ PINCAY","MARIANA MICKAELA","Cedula","1352664096","PRIMER GRADO BASICO","A","593","0","yanilinda17@hotmail.com ","Estudiante","2022","1352664096.png","","1");
INSERT INTO people VALUES("2639","INDARTE LATORRE","KYLIE DANIELA","Cedula","1352649303","PRIMER GRADO BASICO","A","593","0","kdindarte@gmail.com","Estudiante","2022","1352649303.png","","1");
INSERT INTO people VALUES("2640","MACIAS BOWEN","ISAI SALVADOR","Cedula","1352470205","PRIMER GRADO BASICO","A","593","0","nairthee@hotmail.com ","Estudiante","2022","1352470205.png","","1");
INSERT INTO people VALUES("2641","MEZA CEDEÑO","GIA VERENA","Cedula","1352431686","PRIMER GRADO BASICO","A","593","0","leandrameza_emy19@hotmail.com ","Estudiante","2022","1352431686.png","","1");
INSERT INTO people VALUES("2642","MUÑIZ ACOSTA","SOFIA ANALYZ","Cedula","1352499618","PRIMER GRADO BASICO","A","593","0","looracostac@hotmail.com ","Estudiante","2022","1352499618.png","","1");
INSERT INTO people VALUES("2643","SANCHEZ VELEZ","PAOLA SOPHIA","Cedula","1352511206","PRIMER GRADO BASICO","A","593","0","kerlylagatita@icloud.com","Estudiante","2022","1352511206.png","","1");
INSERT INTO people VALUES("2644","TAPIA BAQUE","FERNANDO IVAN","Cedula","1352563660","PRIMER GRADO BASICO","A","593","0","sheylabaquemero@gmail.com","Estudiante","2022","1352563660.png","","1");
INSERT INTO people VALUES("2645","VEINTIMILLA GARCIA","FIORELA CRISTINA","Cedula","1352463663","PRIMER GRADO BASICO","A","593","0","cristhiansveintimilla@gmail.com","Estudiante","2022","1352463663.png","","1");
INSERT INTO people VALUES("2646","YANG ZHU","JINGYOU CRISTINA","Cedula","1352656290","PRIMER GRADO BASICO","A","593","0","1010726788@99.com","Estudiante","2022","1352656290.png","","1");
INSERT INTO people VALUES("2647","ALARCON SANCLEMENTE","NIRVANA ","Cedula","1352280372","SEGUNDO GRADO BASICO","A","593","0","dianpatty@hotmail.com ","Estudiante","2022","1352280372.png","","1");
INSERT INTO people VALUES("2648","ALDAZ LOOR","KILLARI ISABELLA","Cedula","1757344161","SEGUNDO GRADO BASICO","A","593","0","foriss12@gmail.com ","Estudiante","2022","1757344161.png","","1");
INSERT INTO people VALUES("2649","ANDRADE MENDOZA","AISHA ZANIAH","Cedula","1352380347","SEGUNDO GRADO BASICO","A","593","0","martha-mendozap@hotmail.com","Estudiante","2022","1352380347.png","","1");
INSERT INTO people VALUES("2650","BELLO VELEZ","AMIRA NOHELIA","Cedula","1352397424","SEGUNDO GRADO BASICO","A","593","0","xime_andu3000@hotmail.com","Estudiante","2022","1352397424.png","","1");
INSERT INTO people VALUES("2651","BOWEN GILER","ISABELLA PAULETTE","Cedula","1352417040","SEGUNDO GRADO BASICO","A","593","0","sngilerint.89@gmail.com ","Estudiante","2022","1352417040.png","","1");
INSERT INTO people VALUES("2652","GARCIA MANRESA","SEBASTIAN ","Cedula","1352210197","SEGUNDO GRADO BASICO","A","593","0","patrimanre@gmail.com","Estudiante","2022","1352210197.png","","1");
INSERT INTO people VALUES("2653","GILER MACIAS","MIA ISABELLA","Cedula","1352267486","SEGUNDO GRADO BASICO","A","593","0","by_meby@hotmail.com ","Estudiante","2022","1352267486.png","","1");
INSERT INTO people VALUES("2654","LOPEZ MONTERO","QUINIDIO DAVID","Cedula","1757414337","SEGUNDO GRADO BASICO","A","593","0","hectorlodu@hotmail.com ","Estudiante","2022","1757414337.png","","1");
INSERT INTO people VALUES("2655","MERA CORRAL","AYNARA VALESKA","Cedula","1352194482","SEGUNDO GRADO BASICO","A","593","0","pao-corral27@hotmail.com","Estudiante","2022","1352194482.png","","1");
INSERT INTO people VALUES("2656","MURILLO VELEZ","CRISTOPHER AARON","Cedula","1352237448","SEGUNDO GRADO BASICO","A","593","0","overmurillo@yahoo.com","Estudiante","2022","1352237448.png","","1");
INSERT INTO people VALUES("2657","NAZATE MORALES","EMMA VICTORIA","Cedula","1352299018","SEGUNDO GRADO BASICO","A","593","0","morales.vanessaj@gmail.com","Estudiante","2022","1352299018.png","","1");
INSERT INTO people VALUES("2658","OSPITIA GUERRERO","MIA VICTORIA","Cedula","961186442","SEGUNDO GRADO BASICO","A","593","0","karinaguerreromacias24@hotmail.com ","Estudiante","2022","961186442.png","","1");
INSERT INTO people VALUES("2659","PINARGOTE CORNEJO","DAVID VALENTINO","Cedula","1352238735","SEGUNDO GRADO BASICO","A","593","0","david.pinargote@utm.edu.ec","Estudiante","2022","1352238735.png","","1");
INSERT INTO people VALUES("2660","PUCO PERERO","SHEILY JULIETH","Cedula","1352267015","SEGUNDO GRADO BASICO","A","593","0","sheryljulissa@hotmail.com","Estudiante","2022","1352267015.png","","1");
INSERT INTO people VALUES("2661","QUIROZ PEÑA","NATASHA SARAI","Cedula","1352237190","SEGUNDO GRADO BASICO","A","593","0","daniyfreddy.ramon@gmail.com","Estudiante","2022","1352237190.png","","1");
INSERT INTO people VALUES("2662","RIVADENEIRA ZAMBRANO","AARON EMANUEL","Cedula","1352252819","SEGUNDO GRADO BASICO","A","593","0","silverzanriv@gmail.com ","Estudiante","2022","1352252819.png","","1");
INSERT INTO people VALUES("2663","RODRIGUEZ LOOR","SHAILENE GREGORIA","Cedula","1352190084","SEGUNDO GRADO BASICO","A","593","0","puka_loor@hotmail.com","Estudiante","2022","1352190084.png","","1");
INSERT INTO people VALUES("2664","VELEZ GARCIA","NAIN GABRIELA","Cedula","1352422859","SEGUNDO GRADO BASICO","A","593","0","tgarcia1970gs@hotmail.com","Estudiante","2022","1352422859.png","","1");
INSERT INTO people VALUES("2665","YENCHONG PERALTA","MIA VICTORIA","Cedula","1352296840","SEGUNDO GRADO BASICO","A","593","0","jperalta06@outlook.com ","Estudiante","2022","1352296840.png","","1");
INSERT INTO people VALUES("2666","ALAVA BERMELLO","KASSANDRA ASHLEY","Cedula","1352156192","TERCER GRADO BASICO","A","593","0","kleolo@hotmail.com ","Estudiante","2022","1352156192.png","","1");
INSERT INTO people VALUES("2667","ALVIA TORRES","VICTORIA ALEXANDRA","Cedula","1352074080","TERCER GRADO BASICO","A","593","0","victoralexalvia@gmail.com","Estudiante","2022","1352074080.png","","1");
INSERT INTO people VALUES("2668","CARREÑO VEGA","BENIS AHINOA","Cedula","1351937436","TERCER GRADO BASICO","A","593","0","johaino10@gmail.com ","Estudiante","2022","1351937436.png","","1");
INSERT INTO people VALUES("2669","GUERRERO FARIAS","AHITANA ROMINA","Cedula","1352102865","TERCER GRADO BASICO","A","593","0","zetty.farias@grupodifare.com","Estudiante","2022","1352102865.png","","1");
INSERT INTO people VALUES("2670","HIDROVO CEVALLOS","JOSELYN ALAISA","Cedula","1352141731","TERCER GRADO BASICO","A","593","0","josehidrovo@hotmail.com ","Estudiante","2022","1352141731.png","","1");
INSERT INTO people VALUES("2671","LARA ZAMBRANO","HELEN RAFAELA","Cedula","1351901739","TERCER GRADO BASICO","A","593","0","claudiazamze@gmail.com ","Estudiante","2022","1351901739.png","","1");
INSERT INTO people VALUES("2672","MACIAS RODRIGUEZ","MARIANO LEONEL","Cedula","1351545353","TERCER GRADO BASICO","A","593","0","carho31@hotmail.com ","Estudiante","2022","1351545353.png","","1");
INSERT INTO people VALUES("2673","NAVARRETE RIVAS","JOSE DOMINIC","Cedula","1352172330","TERCER GRADO BASICO","A","593","0","annbelrivas2009@hotmail.com ","Estudiante","2022","1352172330.png","","1");
INSERT INTO people VALUES("2674","PACHAY CHINGA","ANDREA PATRICIA","Cedula","1352023426","TERCER GRADO BASICO","A","593","0","andrechinga@hotmail.com ","Estudiante","2022","1352023426.png","","1");
INSERT INTO people VALUES("2675","PALMA CRUZATTY","ROMINA GUADALUPE","Cedula","1351992787","TERCER GRADO BASICO","A","593","0","cruzattysofia@gmail.com","Estudiante","2022","1351992787.png","","1");
INSERT INTO people VALUES("2676","PEÑA LOOR","GIANNA ANTHONELLA","Cedula","1352093072","TERCER GRADO BASICO","A","593","0","cloor.mariana@gmail.com ","Estudiante","2022","1352093072.png","","1");
INSERT INTO people VALUES("2677","PINARGOTE MEZA","LUBER MAXIMILIANO","Cedula","1352088601","TERCER GRADO BASICO","A","593","0","karimezalara@hotmail.com","Estudiante","2022","1352088601.png","","1");
INSERT INTO people VALUES("2678","ROLDAN MACIAS","SAHYDI LIA","Cedula","1352219768","TERCER GRADO BASICO","A","593","0","sadatrc@hotmail.es","Estudiante","2022","1352219768.png","","1");
INSERT INTO people VALUES("2679","ROSERO MORALES","VALENTINA ANTONELLA","Cedula","1756668586","TERCER GRADO BASICO","A","593","0","erik.yadir22@hotmail.com ","Estudiante","2022","1756668586.png","","1");
INSERT INTO people VALUES("2680","VALDIVIEZO VALDIVIEZO","DERECK ADRIAN","Cedula","1352020836","TERCER GRADO BASICO","A","593","0","gin-161@hotmail.com","Estudiante","2022","1352020836.png","","1");
INSERT INTO people VALUES("2681","VERA SEGOVIA","JESHUA MATHEO","Cedula","1352007478","TERCER GRADO BASICO","A","593","0","lindasegoviaa@gmail.com","Estudiante","2022","1352007478.png","","1");
INSERT INTO people VALUES("2682","ZAMBRANO MACIAS","JAIME ARTURO","Cedula","1352059495","TERCER GRADO BASICO","A","593","0","blanchymaromero@hotmail.com","Estudiante","2022","1352059495.png","","1");
INSERT INTO people VALUES("2683","ANDRADE MENDOZA","SHENOA ZANIAH","Cedula","1351716301","CUARTO GRADO BASICO","A","593","0","martha-mendozap@hotmail.com","Estudiante","2022","1351716301.png","","1");
INSERT INTO people VALUES("2684","CEDEÑO SOLORZANO","CRISTOFER DAVID","Cedula","1351006455","CUARTO GRADO BASICO","A","593","0","sandra.sn.c@hotmail.com","Estudiante","2022","1351006455.png","","1");
INSERT INTO people VALUES("2685","CHIRAN TOALA","JAIRO USAIM","Cedula","932580707","CUARTO GRADO BASICO","A","593","0","ht-enay2@live.com ","Estudiante","2022","932580707.png","","1");
INSERT INTO people VALUES("2686","COLLAGUAZO PARRALES","IKER JESUS","Cedula","1351564214","CUARTO GRADO BASICO","A","593","0","luiscollaguazokareniker@gmail.com","Estudiante","2022","1351564214.png","","1");
INSERT INTO people VALUES("2687","FARFAN ZAMBRANO","ANDREW SEBASTIAN","Cedula","1351864267","CUARTO GRADO BASICO","A","593","0","mzambrano26@yahoo.es","Estudiante","2022","1351864267.png","","1");
INSERT INTO people VALUES("2688","GARCIA LI","CAMILA SHANAI","Cedula","1351784887","CUARTO GRADO BASICO","A","593","0"," li.li.milcover@gmail.com ","Estudiante","2022","1351784887.png","","1");
INSERT INTO people VALUES("2689","GUTIERREZ PINCAY","VALENTINA MERCEDES","Cedula","1351090400","CUARTO GRADO BASICO","A","593","0","yanilinda17@hotmail.com ","Estudiante","2022","1351090400.png","","1");
INSERT INTO people VALUES("2690","LOOR BASURTO","CRISTHIAN ANDRES","Cedula","1351227234","CUARTO GRADO BASICO","A","593","0","angelloecu1980@hotmail.com","Estudiante","2022","1351227234.png","","1");
INSERT INTO people VALUES("2691","LOOR BASURTO","CRISTHIAN XAVIER","Cedula","1351227119","CUARTO GRADO BASICO","A","593","0","angelloecu1980@hotmail.com","Estudiante","2022","1351227119.png","","1");
INSERT INTO people VALUES("2692","LOOR RIVAS","BLISSIE ELIANA","Cedula","1351311756","CUARTO GRADO BASICO","A","593","0","chinaeli86@hotmail.com ","Estudiante","2022","1351311756.png","","1");
INSERT INTO people VALUES("2693","MOLINA REYES","JEREMY MATHIAS","Cedula","1351870645","CUARTO GRADO BASICO","A","593","0","vanessareyes2007@yahoo.es","Estudiante","2022","1351870645.png","","1");
INSERT INTO people VALUES("2694","MOREIRA LOOR","DARLYE SARAHI","Cedula","1351378680","CUARTO GRADO BASICO","A","593","0","gabyloor796@gmail.com ","Estudiante","2022","1351378680.png","","1");
INSERT INTO people VALUES("2695","MOREIRA MENDIETA","FIORELLA MARINA","Cedula","1351192511","CUARTO GRADO BASICO","A","593","0","cirugiamaxilo08@hotmail.com","Estudiante","2022","1351192511.png","","1");
INSERT INTO people VALUES("2696","OJEDA MOREIRA","SAMANTHA ANNAHY","Cedula","1351906639","CUARTO GRADO BASICO","A","593","0","derlyza96@gmail.com ","Estudiante","2022","1351906639.png","","1");
INSERT INTO people VALUES("2697","POZO SANCHEZ","DOMENICA LARISSA","Cedula","1351410996","CUARTO GRADO BASICO","A","593","0","jpozomera@hotmail.com ","Estudiante","2022","1351410996.png","","1");
INSERT INTO people VALUES("2698","QUIROZ PONCE","ROSA ELENA","Cedula","1351808827","CUARTO GRADO BASICO","A","593","0","cindyelena86@hotmail.com","Estudiante","2022","1351808827.png","","1");
INSERT INTO people VALUES("2699","RAMOS VERA","NOHELIA ANNABEL","Cedula","1351598279","CUARTO GRADO BASICO","A","593","0","roxinohelia@hotmail.com ","Estudiante","2022","1351598279.png","","1");
INSERT INTO people VALUES("2700","RODRIGUEZ URDANIGO","NASHLEY VALERIA","Cedula","1351782980","CUARTO GRADO BASICO","A","593","0","darwin14-31@hotmail.com","Estudiante","2022","1351782980.png","","1");
INSERT INTO people VALUES("2701","TOLA INTRIAGO","EDWIN ISAIAS","Cedula","1351630163","CUARTO GRADO BASICO","A","593","0","saii25@hotmail.com","Estudiante","2022","1351630163.png","","1");
INSERT INTO people VALUES("2702","ALAVA VELIZ","ANGEL LUCCIANO","Cedula","1350905038","QUINTO GRADO BASICO","A","593","0","magavepi@hotmail.com ","Estudiante","2022","1350905038.png","","1");
INSERT INTO people VALUES("2703","ANCHUNDIA REYNA","MATTHEW JARED","Cedula","1350860837","QUINTO GRADO BASICO","A","593","0","marcel.reyna@hotmail.com","Estudiante","2022","1350860837.png","","1");
INSERT INTO people VALUES("2704","BERMELLO ZAMBRANO","JEASLY KRISHELL","Cedula","1317163614","QUINTO GRADO BASICO","A","593","0","jeasly89@hotmail.com","Estudiante","2022","1317163614.png","","1");
INSERT INTO people VALUES("2705","CARRERA INTRIAGO","CATRIEL FERNANDO","Cedula","1351862162","QUINTO GRADO BASICO","A","593","0","yanikaintriago@gmail.com","Estudiante","2022","1351862162.png","","1");
INSERT INTO people VALUES("2706","CARRION MENENDEZ","KRISTHEL AKANE","Cedula","1317291910","QUINTO GRADO BASICO","A","593","0","arq_adriancarrionb@hotmail.com","Estudiante","2022","1317291910.png","","1");
INSERT INTO people VALUES("2707","CUENCA VILLAMAR","MIA SARIK","Cedula","1350796874","QUINTO GRADO BASICO","A","593","0"," jessicavillamar@hotmail.com ","Estudiante","2022","1350796874.png","","1");
INSERT INTO people VALUES("2708","GUERRERO SABANDO","SAMIA SOPHIA","Cedula","1350966949","QUINTO GRADO BASICO","A","593","0","sandysabando79@gmail.com","Estudiante","2022","1350966949.png","","1");
INSERT INTO people VALUES("2709","INDARTE LATORRE","KEYDI GISELLE","Cedula","1350416440","QUINTO GRADO BASICO","A","593","0","gibelac86@gmail.com","Estudiante","2022","1350416440.png","","1");
INSERT INTO people VALUES("2710","INTRIAGO MOLINA","SANTIAGO JAVIER","Cedula","1317381877","QUINTO GRADO BASICO","A","593","0","franciscojavi09@hotmail.com","Estudiante","2022","1317381877.png","","1");
INSERT INTO people VALUES("2711","LOOR PALMA","THIAGO ALEXANDER","Cedula","1350970511","QUINTO GRADO BASICO","A","593","0","silvia_paty14@hotmail.com","Estudiante","2022","1350970511.png","","1");
INSERT INTO people VALUES("2712","LOOR RIVAS","GEMA ALEJANDRA","Cedula","1317281903","QUINTO GRADO BASICO","A","593","0","chinaeli86@hotmail.com ","Estudiante","2022","1317281903.png","","1");
INSERT INTO people VALUES("2713","MACIAS BALDA","FABIO SAID","Cedula","1316927555","QUINTO GRADO BASICO","A","593","0","byronmacias20@gmail.com","Estudiante","2022","1316927555.png","","1");
INSERT INTO people VALUES("2714","MARCILLO MEJIA","MATHIAS BENJAMIN","Cedula","1317329876","QUINTO GRADO BASICO","A","593","0","karenmejia021991@gmail.com ","Estudiante","2022","1317329876.png","","1");
INSERT INTO people VALUES("2715","MEJIA INTRIAGO","STEVEN FERNANDO","Cedula","1350894893","QUINTO GRADO BASICO","A","593","0","maribelmejiar@hotmail.com","Estudiante","2022","1350894893.png","","1");
INSERT INTO people VALUES("2716","MOLINA ZAMBRANO","AMELIA MISHELL","Cedula","1350969240","QUINTO GRADO BASICO","A","593","0","jevazavi@hotmail.com ","Estudiante","2022","1350969240.png","","1");
INSERT INTO people VALUES("2717","NAVIA ALAVA","KENNETH DARIO","Cedula","1350904742","QUINTO GRADO BASICO","A","593","0","dariojorge29@hotmail.com ","Estudiante","2022","1350904742.png","","1");
INSERT INTO people VALUES("2718","PEÑA LOOR","GARY ALEJANDRO","Cedula","1350952113","QUINTO GRADO BASICO","A","593","0","cloor.mariana@gmail.com ","Estudiante","2022","1350952113.png","","1");
INSERT INTO people VALUES("2719","PINARGOTE PINO","SOFIA ISABELLA","Cedula","1317180204","QUINTO GRADO BASICO","A","593","0","pinoisabel@hotmail.com","Estudiante","2022","1317180204.png","","1");
INSERT INTO people VALUES("2720","PINTO CEDEÑO","BIANCA JULIETH","Cedula","1350892061","QUINTO GRADO BASICO","A","593","0","mafersita1989@live.com","Estudiante","2022","1350892061.png","","1");
INSERT INTO people VALUES("2721","ROBLES SABANDO","ARELLYS SOPHIA","Cedula","1350384879","QUINTO GRADO BASICO","A","593","0","kelly_sabando04-90@hotmail.com","Estudiante","2022","1350384879.png","","1");
INSERT INTO people VALUES("2722","VELASQUEZ SANTANA","AMINHA RAFAELA","Cedula","1350874473","QUINTO GRADO BASICO","A","593","0","aliana_dm@hotmail.com","Estudiante","2022","1350874473.png","","1");
INSERT INTO people VALUES("2723","BARCIA CARDENAS","ABBY SOLANGE","Cedula","1350155337","SEXTO GRADO BASICO","A","593","0","kathy_cardenas@hotmail.com","Estudiante","2022","1350155337.png","","1");
INSERT INTO people VALUES("2724","BARCIA MACIAS","MIGUEL ANGEL","Cedula","1350213201","SEXTO GRADO BASICO","A","593","0","maciasmarisela593@gmail.com ","Estudiante","2022","1350213201.png","","1");
INSERT INTO people VALUES("2725","BARREIRO CAICEDO","LUDWIG SEBASTIAN","Cedula","1317315891","SEXTO GRADO BASICO","A","593","0","olindacaice@yahoo.es","Estudiante","2022","1317315891.png","","1");
INSERT INTO people VALUES("2726","CEDEÑO GARCIA","ASHLEY SARAHI","Cedula","1317117503","SEXTO GRADO BASICO","A","593","0","janagarcia3010@hotmail.com","Estudiante","2022","1317117503.png","","1");
INSERT INTO people VALUES("2727","COBEÑA VELEZ","LIZ ELIANA","Cedula","1317903183","SEXTO GRADO BASICO","A","593","0","ginavelez19761@gmail.com","Estudiante","2022","1317903183.png","","1");
INSERT INTO people VALUES("2728","ESCANDON MENDOZA","EDISON GABRIEL","Cedula","1350299853","SEXTO GRADO BASICO","A","593","0","javipoli_escandon23@hotmail.com ","Estudiante","2022","1350299853.png","","1");
INSERT INTO people VALUES("2729","GOROZABEL MEJIA","FABIAN ANDRES","Cedula","1316974755","SEXTO GRADO BASICO","A","593","0","andreasofiamrf@hotmail.es ","Estudiante","2022","1316974755.png","","1");
INSERT INTO people VALUES("2730","HERNANDEZ ROJAS","ESTEBAN ","Cedula","1011326958","SEXTO GRADO BASICO","A","593","0","johannarojasp@hotmail.com","Estudiante","2022","1011326958.png","","1");
INSERT INTO people VALUES("2731","INTRIAGO ALARCON","KAROLY CAMILA","Cedula","1317069175","SEXTO GRADO BASICO","A","593","0","gabriella_512@hotmail.com ","Estudiante","2022","1317069175.png","","1");
INSERT INTO people VALUES("2732","MACIAS PINARGOTE","ANGIE ANABELLA","Cedula","1350096598","SEXTO GRADO BASICO","A","593","0","anylaconcho21@gmail.com ","Estudiante","2022","1350096598.png","","1");
INSERT INTO people VALUES("2733","MACIAS ZAMBRANO","VIVIANA ZHARIK","Cedula","1350316806","SEXTO GRADO BASICO","A","593","0","zambranoviviana2106@gmail.com ","Estudiante","2022","1350316806.png","","1");
INSERT INTO people VALUES("2734","MEJIA QUELAL","MIA VALENTINA","Cedula","1351774334","SEXTO GRADO BASICO","A","593","0","quelalyadira5@gmail.com ","Estudiante","2022","1351774334.png","","1");
INSERT INTO people VALUES("2735","MOLINA ZAMBRANO","JAIME ANDRES","Cedula","1350339105","SEXTO GRADO BASICO","A","593","0","jaimemolialt81@gmail.com","Estudiante","2022","1350339105.png","","1");
INSERT INTO people VALUES("2736","MOREIRA SALTOS","VALENTINA KRISTHEL","Cedula","1350780126","SEXTO GRADO BASICO","A","593","0","memilydayana@gmail.com","Estudiante","2022","1350780126.png","","1");
INSERT INTO people VALUES("2737","NAVIA ALAVA","JORGE DARIO","Cedula","1350904593","SEXTO GRADO BASICO","A","593","0","may_elizabeth_52@hotmail.com ","Estudiante","2022","1350904593.png","","1");
INSERT INTO people VALUES("2738","ORDOÑEZ BRAVO","ASHLEY MICAELA","Cedula","1317786430","SEXTO GRADO BASICO","A","593","0","cesarlolo_86@hotmail.com","Estudiante","2022","1317786430.png","","1");
INSERT INTO people VALUES("2739","PICO MACIAS","CESAR JAHIR","Cedula","1350128276","SEXTO GRADO BASICO","A","593","0","yescy75@hotmail.com","Estudiante","2022","1350128276.png","","1");
INSERT INTO people VALUES("2740","PORRAS PONCE","CRISTIAN JESUS","Cedula","1317052494","SEXTO GRADO BASICO","A","593","0","poncejose1957@hotmail.com","Estudiante","2022","1317052494.png","","1");
INSERT INTO people VALUES("2741","QUIROZ PEÑA","FREDDY RAMON","Cedula","1317010294","SEXTO GRADO BASICO","A","593","0","daniy.freddy.ramon@gmail.com ","Estudiante","2022","1317010294.png","","1");
INSERT INTO people VALUES("2742","ROSERO MORALES","JUSTIN JOEL","Cedula","1753008604","SEXTO GRADO BASICO","A","593","0","erik.yadir22@hotmail.com ","Estudiante","2022","1753008604.png","","1");
INSERT INTO people VALUES("2743","SAN ANDRES MACÍAS","CESAR ALEJANDRO","Cedula","1317769865","SEXTO GRADO BASICO","A","593","0","aifos_inzehs87@hotmail.com","Estudiante","2022","1317769865.png","","1");
INSERT INTO people VALUES("2744","SUAREZ GARCIA","BRIANNA SARAHI","Cedula","1350227052","SEXTO GRADO BASICO","A","593","0","vetrene75@hotmail.com","Estudiante","2022","1350227052.png","","1");
INSERT INTO people VALUES("2745","VELASQUEZ MACIAS","SABRINA SHANIK","Cedula","1317027595","SEXTO GRADO BASICO","A","593","0","nildamacias52@hotmail.com","Estudiante","2022","1317027595.png","","1");
INSERT INTO people VALUES("2746","VILLAGOMEZ ARGANDOÑA","AMIR DANIEL","Cedula","1350135867","SEXTO GRADO BASICO","A","593","0","dannyvillagomez@hotmail.com ","Estudiante","2022","1350135867.png","","1");
INSERT INTO people VALUES("2747","ABRIL BARBA","LOURDES VALENTINA","Cedula","1316379187","SEPTIMO GRADO BASICO","A","593","0","alebarba1989@gmail.com ","Estudiante","2022","1316379187.png","","1");
INSERT INTO people VALUES("2748","ALCIVAR ZAMORA","EILENY CHRISTINA","Cedula","1350152052","SEPTIMO GRADO BASICO","A","593","0","gemyzame09@outlook.com","Estudiante","2022","1350152052.png","","1");
INSERT INTO people VALUES("2749","ARTEAGA BERGARA","MIA STEFANIA","Cedula","1350116701","SEPTIMO GRADO BASICO","A","593","0","henryarteaga26@hotmail.com ","Estudiante","2022","1350116701.png","","1");
INSERT INTO people VALUES("2750","BOWEN GILER","EDUARDO SEBASTIAN","Cedula","1350245625","SEPTIMO GRADO BASICO","A","593","0","sngilerint.89@gmail.com ","Estudiante","2022","1350245625.png","","1");
INSERT INTO people VALUES("2751","CARREÑO VEGA","ALEX XAVIER","Cedula","3050221971","SEPTIMO GRADO BASICO","A","593","0","johaino10@gmail.com ","Estudiante","2022","3050221971.png","","1");
INSERT INTO people VALUES("2752","CEDEÑO VENEGAS","VIVIAN FABIANA","Cedula","1316571932","SEPTIMO GRADO BASICO","A","593","0","mifaceve08@hotmail.com","Estudiante","2022","1316571932.png","","1");
INSERT INTO people VALUES("2753","CHAMBA ROSERO","DANNY HERNAN","Cedula","1351292071","SEPTIMO GRADO BASICO","A","593","0","roserocarmen92@gmail.com","Estudiante","2022","1351292071.png","","1");
INSERT INTO people VALUES("2754","COTERA VERGARA","ANTHONY JADEM","Cedula","1350114938","SEPTIMO GRADO BASICO","A","593","0","drmau23@hotmail.com","Estudiante","2022","1350114938.png","","1");
INSERT INTO people VALUES("2755","FERNANDEZ CEVALLOS","IVANNA SIMONETH","Cedula","1350195192","SEPTIMO GRADO BASICO","A","593","0","yulice90@hotmail.com ","Estudiante","2022","1350195192.png","","1");
INSERT INTO people VALUES("2756","GARCIA MERA","MATHIAS SANTIAGO","Cedula","1350270136","SEPTIMO GRADO BASICO","A","593","0","carloseduardogarciapal@yahoo.com ","Estudiante","2022","1350270136.png","","1");
INSERT INTO people VALUES("2757","HAMZY SUAREZ","RAYAN ","Cedula","1350931877","SEPTIMO GRADO BASICO","A","593","0","isabelsce@hotmail.com","Estudiante","2022","1350931877.png","","1");
INSERT INTO people VALUES("2758","INDARTE GARCIA","EMILIA ELIZABETH","Cedula","1350079115","SEPTIMO GRADO BASICO","A","593","0","jazmin_141999@hotmail.com","Estudiante","2022","1350079115.png","","1");
INSERT INTO people VALUES("2759","INTRIAGO GUEVARA","EDUARDO ANDRES","Cedula","1350409619","SEPTIMO GRADO BASICO","A","593","0","miguelintriago8411@gmail.com ","Estudiante","2022","1350409619.png","","1");
INSERT INTO people VALUES("2760","INTRIAGO PINARGOTE","FABRICIO JAVIER","Cedula","1350084164","SEPTIMO GRADO BASICO","A","593","0","jemnyelip@gmail.com","Estudiante","2022","1350084164.png","","1");
INSERT INTO people VALUES("2761","MACIAS RODRIGUEZ","CARLOS JOSE","Cedula","1351545643","SEPTIMO GRADO BASICO","A","593","0","carho31@hotmail.com ","Estudiante","2022","1351545643.png","","1");
INSERT INTO people VALUES("2762","MENESES MEZA","MARGY MISMAR","Cedula","1350825046","SEPTIMO GRADO BASICO","A","593","0","tanyitameza@yahoo.es","Estudiante","2022","1350825046.png","","1");
INSERT INTO people VALUES("2763","MERO CHICA","AMBRA MARISA","Cedula","1350073076","SEPTIMO GRADO BASICO","A","593","0","maritzachica30@yahoo.com","Estudiante","2022","1350073076.png","","1");
INSERT INTO people VALUES("2764","MEZA AVELLAN","MATIAS ALESSANDRO","Cedula","1316511532","SEPTIMO GRADO BASICO","A","593","0","maggyac1966@hotmail.com","Estudiante","2022","1316511532.png","","1");
INSERT INTO people VALUES("2765","PATIÑO ROMAN","LIZZYS AISHA","Cedula","1316571296","SEPTIMO GRADO BASICO","A","593","0","marciaroman1987@gmail.com ","Estudiante","2022","1316571296.png","","1");
INSERT INTO people VALUES("2766","RIVADENEIRA ZAMBRANO","KRISTHEL NAYELI","Cedula","1350052690","SEPTIMO GRADO BASICO","A","593","0","silverzamriv@gmail.com ","Estudiante","2022","1350052690.png","","1");
INSERT INTO people VALUES("2767","TOLA INTRIAGO","EDWIN MATIAS","Cedula","1316629797","SEPTIMO GRADO BASICO","A","593","0","saii25@hotmail.com","Estudiante","2022","1316629797.png","","1");
INSERT INTO people VALUES("2768","VITERI SUAREZ","BRIANA MAYULETH","Cedula","1350234926","SEPTIMO GRADO BASICO","A","593","0","mayuleth88@hotmail.com ","Estudiante","2022","1350234926.png","","1");
INSERT INTO people VALUES("2769","YANQUI MACIAS","ANITA MARIANGEL","Cedula","1350087191","SEPTIMO GRADO BASICO","A","593","0","rikcirugene@hotmail.es","Estudiante","2022","1350087191.png","","1");
INSERT INTO people VALUES("2770","ZAMBRANO CEDEÑO","JAMES FRANCESO","Cedula","1350616817","SEPTIMO GRADO BASICO","A","593","0","alondra_31@hotmail.com ","Estudiante","2022","1350616817.png","","1");
INSERT INTO people VALUES("2771","ALARCON LOOR","YANDRY DAVID","Cedula","1350243836","OCTAVO GRADO BASICO","A","593","0","lornacrazy@hotmail.com ","Estudiante","2022","1350243836.png","","1");
INSERT INTO people VALUES("2772","BARCIA CARDENAS","GIANNA CECILIA","Cedula","1315887099","OCTAVO GRADO BASICO","A","593","0","kathy_cardenas@hotmail.com","Estudiante","2022","1315887099.png","","1");
INSERT INTO people VALUES("2773","BARCIA MACIAS","MEYLI ANELYSE","Cedula","1317909339","OCTAVO GRADO BASICO","A","593","0","iselamaciasz@yahoo.com","Estudiante","2022","1317909339.png","","1");
INSERT INTO people VALUES("2774","BARREIRO COELLO","CAMILA NATALYE","Cedula","1350872824","OCTAVO GRADO BASICO","A","593","0","priscilacoellov@gmail.com ","Estudiante","2022","1350872824.png","","1");
INSERT INTO people VALUES("2775","BRIONES ZAMBRANO","JOHAN MIGUEL","Cedula","1315717916","OCTAVO GRADO BASICO","A","593","0","tamiprinces2008@hotmail.com","Estudiante","2022","1315717916.png","","1");
INSERT INTO people VALUES("2776","CELORIO MOREIRA","AITANA BELEN","Cedula","1350886584","OCTAVO GRADO BASICO","A","593","0","celoriokathia@gmail.com ","Estudiante","2022","1350886584.png","","1");
INSERT INTO people VALUES("2777","CEVALLOS CEDEÑO","XAVIER ALEJANDRO","Cedula","1350334643","OCTAVO GRADO BASICO","A","593","0","cristhiancevallos81@hotmail.com ","Estudiante","2022","1350334643.png","","1");
INSERT INTO people VALUES("2778","CRUZ ECHEVERRIA","BEYLY ROMINA","Cedula","1351370984","OCTAVO GRADO BASICO","A","593","0","domenicaecheverria884@gmail.com","Estudiante","2022","1351370984.png","","1");
INSERT INTO people VALUES("2779","DELGADO LOOR","KARLA MARIANGEL","Cedula","1316725827","OCTAVO GRADO BASICO","A","593","0","viviana.loor@hotmail.com","Estudiante","2022","1316725827.png","","1");
INSERT INTO people VALUES("2780","FERNANDEZ GARCIA","AIMER SAMIR","Cedula","1316165552","OCTAVO GRADO BASICO","A","593","0","geiberxx3000@hotmail.com","Estudiante","2022","1316165552.png","","1");
INSERT INTO people VALUES("2781","GONZALEZ GUADAMUD","KENT LEONARDO","Cedula","1315717577","OCTAVO GRADO BASICO","A","593","0","kentsua1982@gmail.com ","Estudiante","2022","1315717577.png","","1");
INSERT INTO people VALUES("2782","IBARRA MOLINA","CARLOS ANTONIO","Cedula","1350125934","OCTAVO GRADO BASICO","A","593","0","elinaaleximolina@yahoo.es","Estudiante","2022","1350125934.png","","1");
INSERT INTO people VALUES("2783","LOOR CEVALLOS","KAROLINA JULIETH","Cedula","1350852982","OCTAVO GRADO BASICO","A","593","0","ceciliacevallos_87@hotmail.com ","Estudiante","2022","1350852982.png","","1");
INSERT INTO people VALUES("2784","MENENDEZ VELIZ","MARCOS ZACKIEL","Cedula","1350647234","OCTAVO GRADO BASICO","A","593","0","marnava80@hotmail.com","Estudiante","2022","1350647234.png","","1");
INSERT INTO people VALUES("2785","NAZATE MORALES","PRISCILLA SARAHI","Cedula","1350307219","OCTAVO GRADO BASICO","A","593","0","morales.vanessaj@gmail.com","Estudiante","2022","1350307219.png","","1");
INSERT INTO people VALUES("2786","OSORIO PARRAGA","CARLOS EMILIO","Cedula","1316206893","OCTAVO GRADO BASICO","A","593","0","ligiageoconda15@hotmail.com ","Estudiante","2022","1316206893.png","","1");
INSERT INTO people VALUES("2787","PONCE VASQUEZ","EDGAR IVAN","Cedula","1315775104","OCTAVO GRADO BASICO","A","593","0","nelyhermoza@hotmail.com ","Estudiante","2022","1315775104.png","","1");
INSERT INTO people VALUES("2788","RIVERA ZAMBRANO","SHALLIRA ANTONELLA","Cedula","1316444155","OCTAVO GRADO BASICO","A","593","0","salliraantonella@gmail.com ","Estudiante","2022","1316444155.png","","1");
INSERT INTO people VALUES("2789","ALAVA VELIZ","TABATA ANDREINA","Cedula","1350692396","OCTAVO GRADO BASICO","A","593","0","magavepi@hotmail.com ","Estudiante","2022","1350692396.png","","1");
INSERT INTO people VALUES("2790","CACERES MENENDEZ","WILLIAN RAFAEL","Cedula","1351153323","OCTAVO GRADO BASICO","A","593","0","karenwrafag@hotmail.com","Estudiante","2022","1351153323.png","","1");
INSERT INTO people VALUES("2791","COBEÑA COBEÑA","CARLOS ALEJANDRO","Cedula","1350045504","OCTAVO GRADO BASICO","A","593","0","sandracobena.ec@gmail.com ","Estudiante","2022","1350045504.png","","1");
INSERT INTO people VALUES("2792","CUENCA VILLAMAR","MILENA SAMANTHA","Cedula","1350090104","OCTAVO GRADO BASICO","A","593","0"," jessicavillamar@hotmail.com ","Estudiante","2022","1350090104.png","","1");
INSERT INTO people VALUES("2793","MENDOZA QUIJANO","MARTA VALENTINA","Cedula","1315824928","OCTAVO GRADO BASICO","A","593","0","intriagouvita@gmail.com","Estudiante","2022","1315824928.png","","1");
INSERT INTO people VALUES("2794","MORALES MENDOZA","MARIA FERNANDA","Cedula","1351139868","OCTAVO GRADO BASICO","A","593","0","isabelmendoza.ICMI@gmail.com","Estudiante","2022","1351139868.png","","1");
INSERT INTO people VALUES("2795","MURILLO MENDOZA","ASHLEY JULIETH","Cedula","1315824464","OCTAVO GRADO BASICO","A","593","0","paolamendoza121979@gmail.com","Estudiante","2022","1315824464.png","","1");
INSERT INTO people VALUES("2796","PICO CEDEÑO","THAISHA SAMANTHA","Cedula","2350466674","OCTAVO GRADO BASICO","A","593","0","picocedenothisha@gmail.com ","Estudiante","2022","2350466674.png","","1");
INSERT INTO people VALUES("2797","PINARGOTE MEZA","LUBER ARIEL","Cedula","1316224391","OCTAVO GRADO BASICO","A","593","0","comercialmialmacen@hotmail.com","Estudiante","2022","1316224391.png","","1");
INSERT INTO people VALUES("2798","PINOARGOTE CHAVEZ","CARLOS JOSUE","Cedula","1316074424","OCTAVO GRADO BASICO","A","593","0","llilabell17@hotmail.com","Estudiante","2022","1316074424.png","","1");
INSERT INTO people VALUES("2799","REYES SANTANA","ANA VALENTINA","Cedula","1351577216","OCTAVO GRADO BASICO","A","593","0","acrissama@hotmail.com ","Estudiante","2022","1351577216.png","","1");
INSERT INTO people VALUES("2800","SANTANA VERGARA","KEVIN JOSUE","Cedula","1350284970","OCTAVO GRADO BASICO","A","593","0","drmau23@hotmail.com","Estudiante","2022","1350284970.png","","1");
INSERT INTO people VALUES("2801","TOLEDO ACOSTA","LADY ANAHI","Cedula","1315886604","OCTAVO GRADO BASICO","A","593","0","andruthescod@hotmail.es","Estudiante","2022","1315886604.png","","1");
INSERT INTO people VALUES("2802","VELEZ ALCIVAR","FELIX JOSE","Cedula","1315826204","OCTAVO GRADO BASICO","A","593","0","glenjan1220@hotmail.com","Estudiante","2022","1315826204.png","","1");
INSERT INTO people VALUES("2803","VELIZ MORALES","GABRIELA SIMUY","Cedula","1350480164","OCTAVO GRADO BASICO","A","593","0","yagamo88@outlook.com ","Estudiante","2022","1350480164.png","","1");
INSERT INTO people VALUES("2804","VERA SUAREZ","EMI SAYAY","Cedula","1350038111","OCTAVO GRADO BASICO","A","593","0","jonnathan8827@hotmail.com ","Estudiante","2022","1350038111.png","","1");
INSERT INTO people VALUES("2805","ALDAZ BARRE","STEVE GAVRIELL","Cedula","1750609123","NOVENO GRADO BASICO","A","593","0","foriss12@gmail.com ","Estudiante","2022","1750609123.png","","1");
INSERT INTO people VALUES("2806","ARTEAGA CEDEÑO","MARIANGEL ","Cedula","1315180925","NOVENO GRADO BASICO","A","593","0","jahairacede130@gmail.com ","Estudiante","2022","1315180925.png","","1");
INSERT INTO people VALUES("2807","BRAVO QUIROGA","AUDRINA NICOLE","Cedula","1315362242","NOVENO GRADO BASICO","A","593","0","reja19nov@hotmail.com ","Estudiante","2022","1315362242.png","","1");
INSERT INTO people VALUES("2808","BRITO SUAREZ","DIEGO XAVIER","Cedula","1350285613","NOVENO GRADO BASICO","A","593","0","eugeniasuarez2@hotmail.com ","Estudiante","2022","1350285613.png","","1");
INSERT INTO people VALUES("2809","CHAVEZ ALVARADO","SHENOA ANAHI","Cedula","1317855003","NOVENO GRADO BASICO","A","593","0","marlenesperanza75@gmail.com","Estudiante","2022","1317855003.png","","1");
INSERT INTO people VALUES("2810","CHIRAN TOALA","SONIA LOURDES","Cedula","1315161545","NOVENO GRADO BASICO","A","593","0","ht-enay2@live.com","Estudiante","2022","1315161545.png","","1");
INSERT INTO people VALUES("2811","COBEÑA PALMA","DEBIE CAMILA","Cedula","1350199079","NOVENO GRADO BASICO","A","593","0","joeli2_palma@hotmail.com ","Estudiante","2022","1350199079.png","","1");
INSERT INTO people VALUES("2812","DEMERA NAVARRETE","HENRRY ALEXANDER","Cedula","1350896955","NOVENO GRADO BASICO","A","593","0","myna0092@yahoo.com","Estudiante","2022","1350896955.png","","1");
INSERT INTO people VALUES("2813","FALCONI BAQUE","CAMILA ISABEL","Cedula","1350873483","NOVENO GRADO BASICO","A","593","0","elizabethbg_90@hotmail.com","Estudiante","2022","1350873483.png","","1");
INSERT INTO people VALUES("2814","GARCIA VERA","DANNA GABRIELA","Cedula","1350039531","NOVENO GRADO BASICO","A","593","0","polinho88@hotmail.com","Estudiante","2022","1350039531.png","","1");
INSERT INTO people VALUES("2815","GOMEZ AGUAIZA","BRITHANY SABIETH","Cedula","1317082830","NOVENO GRADO BASICO","A","593","0","gomezaguaizabrithanysabieth@gmail.com ","Estudiante","2022","1317082830.png","","1");
INSERT INTO people VALUES("2816","INTRIAGO GUEVARA","SAMANTHA ABIGAIL","Cedula","1316200789","NOVENO GRADO BASICO","A","593","0","miguelintriago8411@gmail.com ","Estudiante","2022","1316200789.png","","1");
INSERT INTO people VALUES("2817","LARA ZAMBRANO","CLAUDIA ALEJANDRA","Cedula","1316201738","NOVENO GRADO BASICO","A","593","0","claudiazamze@gmail.com ","Estudiante","2022","1316201738.png","","1");
INSERT INTO people VALUES("2818","LOOR CEVALLOS","KAMILA VALENTINA","Cedula","1350853006","NOVENO GRADO BASICO","A","593","0","ceciliacevallos_87@hotmail.com ","Estudiante","2022","1350853006.png","","1");
INSERT INTO people VALUES("2819","LOOR MACIAS","DANNA SOFIA","Cedula","1316506284","NOVENO GRADO BASICO","A","593","0","aifos_inzehs87@hotmail.com","Estudiante","2022","1316506284.png","","1");
INSERT INTO people VALUES("2820","MACIAS BALLESTEROS","NATHALY JAMILETH","Cedula","1314496934","NOVENO GRADO BASICO","A","593","0","jessy_bn78@outlook.com","Estudiante","2022","1314496934.png","","1");
INSERT INTO people VALUES("2821","MENESES MEZA","MARYSOL MISLEY","Cedula","1350825079","NOVENO GRADO BASICO","A","593","0","tanyitameza@yahoo.es","Estudiante","2022","1350825079.png","","1");
INSERT INTO people VALUES("2822","MONTERO MOLINA","BRITHANY ANAHI","Cedula","1351123391","NOVENO GRADO BASICO","A","593","0","cristian259@hotmail.com","Estudiante","2022","1351123391.png","","1");
INSERT INTO people VALUES("2823","MOREIRA LOOR","DIXI BELINDA","Cedula","1315362929","NOVENO GRADO BASICO","A","593","0","arqsolution2016@hotmail.com","Estudiante","2022","1315362929.png","","1");
INSERT INTO people VALUES("2824","OCHOA MEJIA","KAREN FABIANA","Cedula","1351471832","NOVENO GRADO BASICO","A","593","0","karenmijia021991@gmail.com ","Estudiante","2022","1351471832.png","","1");
INSERT INTO people VALUES("2825","PARRAGA BUCHELY","AIXA ORIANA","Cedula","1315881811","NOVENO GRADO BASICO","A","593","0","gabyvero85@hotmail.com ","Estudiante","2022","1315881811.png","","1");
INSERT INTO people VALUES("2826","PARRAGA QUIROZ","CARLOS EMANUEL","Cedula","1351411036","NOVENO GRADO BASICO","A","593","0","sabrivanessa_12@hotmail.com","Estudiante","2022","1351411036.png","","1");
INSERT INTO people VALUES("2827","PINARGOTE CORNEJO","ESTHER VALENTINA","Cedula","1316178225","NOVENO GRADO BASICO","A","593","0","david.pinargote@utm.edu.ec","Estudiante","2022","1316178225.png","","1");
INSERT INTO people VALUES("2828","REINA DE LA CRUZ","AMY VALENTINA","Cedula","1350309637","NOVENO GRADO BASICO","A","593","0","luissaoreinaromero@hotmail.com","Estudiante","2022","1350309637.png","","1");
INSERT INTO people VALUES("2829","REYNA ALARCON","KRISTYN GISLADY","Cedula","1315181014","NOVENO GRADO BASICO","A","593","0","yreynamoreira@gmail.com","Estudiante","2022","1315181014.png","","1");
INSERT INTO people VALUES("2830","RIVADENEIRA ZAMBRANO","KEISI VALENTINA","Cedula","1314611011","NOVENO GRADO BASICO","A","593","0","silverzamriv@gmail.com ","Estudiante","2022","1314611011.png","","1");
INSERT INTO people VALUES("2831","TAPIA PICO","JESSICA CORINA","Cedula","1351084809","NOVENO GRADO BASICO","A","593","0","techimia83@hotmail.com ","Estudiante","2022","1351084809.png","","1");
INSERT INTO people VALUES("2832","VEGA CANTOS","ASHLEY LISETTE","Cedula","1350031231","NOVENO GRADO BASICO","A","593","0","lizacampi_18@hotmail.com ","Estudiante","2022","1350031231.png","","1");
INSERT INTO people VALUES("2833","VEINTIMILLA GARCIA","ANDREA ROMINA","Cedula","1316073749","NOVENO GRADO BASICO","A","593","0","cristhiansveintimilla@gmail.com","Estudiante","2022","1316073749.png","","1");
INSERT INTO people VALUES("2834","VERA GOVEA","SCHEZNARDA ZULEIKA","Cedula","1315973816","NOVENO GRADO BASICO","A","593","0","ronaldvm29@hotmail.com","Estudiante","2022","1315973816.png","","1");
INSERT INTO people VALUES("2835","VILLAMAR GILER","DANNA VALESKA","Cedula","1350266316","NOVENO GRADO BASICO","A","593","0","mari_g1982@hotmail.com","Estudiante","2022","1350266316.png","","1");
INSERT INTO people VALUES("2836","ZAMBRANO LOOR","NAYZHEL EDLIANA","Cedula","1316239027","NOVENO GRADO BASICO","A","593","0","nancyloor78@hotmail.com ","Estudiante","2022","1316239027.png","","1");
INSERT INTO people VALUES("2837","ALCIVAR BASURTO","ASHLEY NOELIA","Cedula","1316166014","DECIMO GRADO BASICO","A","593","0","belencitanatasha@hotmail.com","Estudiante","2022","1316166014.png","","1");
INSERT INTO people VALUES("2838","ALMEIDA CEDEÑO","ISAAC ALIRIO","Cedula","1315603595","DECIMO GRADO BASICO","A","593","0","varineacedeno@gmail.com ","Estudiante","2022","1315603595.png","","1");
INSERT INTO people VALUES("2839","CAMACHO VELEZ","KAREN ANTONELA","Cedula","1313128033","DECIMO GRADO BASICO","A","593","0","benosebe@hotmail.com","Estudiante","2022","1313128033.png","","1");
INSERT INTO people VALUES("2840","CARRILLO SANTANA","EDUARDO CARLOS","Cedula","1350776041","DECIMO GRADO BASICO","A","593","0","ecarrillo74@yahoo.es","Estudiante","2022","1350776041.png","","1");
INSERT INTO people VALUES("2841","juep sanchez","grimaldo","DNI","47742273","ing","ing","+51","982579856","grimaldojuepsanchez@gmail.com","Administrativo","2022","47742273.png","1667708624.png","1");



CREATE TABLE `period` (
  `idperiod` int(11) NOT NULL AUTO_INCREMENT,
  `name_per` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`idperiod`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO period VALUES("1","2021","1");
INSERT INTO period VALUES("2","2022","1");



CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`idpermiso`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO permiso VALUES("1","Escritorio");
INSERT INTO permiso VALUES("2","Configuraciones");
INSERT INTO permiso VALUES("3","Personal");
INSERT INTO permiso VALUES("4","Card Qr");
INSERT INTO permiso VALUES("5","Asistencias");
INSERT INTO permiso VALUES("6","Reportes");
INSERT INTO permiso VALUES("7","Accesos");
INSERT INTO permiso VALUES("8","Seguridad");
INSERT INTO permiso VALUES("9","Mensajes");
INSERT INTO permiso VALUES("10","Calendar");



CREATE TABLE `time_active` (
  `idtimeactive` int(11) NOT NULL AUTO_INCREMENT,
  `horain_tim` time NOT NULL,
  `horafin_tim` time NOT NULL,
  PRIMARY KEY (`idtimeactive`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO time_active VALUES("1","01:00:00","23:59:00");



CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO usuario VALUES("1","Jose Carhupoma H","Administrador","123","123","1597905511.png","1");
INSERT INTO usuario VALUES("3","user","user","user","user","1657427181.png","1");



CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL,
  PRIMARY KEY (`idusuario_permiso`),
  KEY `fk_usuario_permiso_idpermiso` (`idpermiso`),
  KEY `fk_usuario_usuario_idusuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4;

INSERT INTO usuario_permiso VALUES("61","3","1");
INSERT INTO usuario_permiso VALUES("107","1","1");
INSERT INTO usuario_permiso VALUES("108","1","2");
INSERT INTO usuario_permiso VALUES("109","1","3");
INSERT INTO usuario_permiso VALUES("110","1","4");
INSERT INTO usuario_permiso VALUES("111","1","5");
INSERT INTO usuario_permiso VALUES("112","1","6");
INSERT INTO usuario_permiso VALUES("113","1","7");
INSERT INTO usuario_permiso VALUES("114","1","8");
INSERT INTO usuario_permiso VALUES("115","1","9");
INSERT INTO usuario_permiso VALUES("116","1","10");



CREATE TABLE `validate` (
  `status_bd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO validate VALUES("1");

