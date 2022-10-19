-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.96-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema portalcontabilidade
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ portalcontabilidade;
USE portalcontabilidade;

--
-- Structure for table `portalcontabilidade`.`arquivosfiscais`
--

DROP TABLE IF EXISTS `portalcontabilidade`.`arquivosfiscais`;
CREATE TABLE  `portalcontabilidade`.`arquivosfiscais` (
  `nReg` double NOT NULL auto_increment,
  `nContabil` int(10) unsigned default NULL,
  `CodCliente` int(10) unsigned default NULL,
  `Mes` varchar(2) default NULL,
  `Ano` varchar(5) default NULL,
  `NomeCliente` varchar(100) default NULL,
  `LinkSPEED` varchar(600) NOT NULL,
  `LinkEFD` varchar(600) NOT NULL,
  `DataHoraSPEED` varchar(45) NOT NULL,
  `DataHoraEFD` varchar(45) NOT NULL,
  `Outros` varchar(600) NOT NULL,
  `Suporte` varchar(45) NOT NULL,
  `CNPJ` varchar(45) NOT NULL,
  PRIMARY KEY  (`nReg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portalcontabilidade`.`arquivosfiscais`
--

/*!40000 ALTER TABLE `arquivosfiscais` DISABLE KEYS */;
/*!40000 ALTER TABLE `arquivosfiscais` ENABLE KEYS */;


--
-- Structure for table `portalcontabilidade`.`cadastrocontabil`
--

DROP TABLE IF EXISTS `portalcontabilidade`.`cadastrocontabil`;
CREATE TABLE  `portalcontabilidade`.`cadastrocontabil` (
  `CodContabil` int(10) unsigned NOT NULL auto_increment,
  `NomeContabil` varchar(45) NOT NULL,
  `Desativar` int(10) unsigned default '0',
  PRIMARY KEY  (`CodContabil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portalcontabilidade`.`cadastrocontabil`
--

/*!40000 ALTER TABLE `cadastrocontabil` DISABLE KEYS */;
INSERT INTO `portalcontabilidade`.`cadastrocontabil` (`CodContabil`,`NomeContabil`,`Desativar`) VALUES 
 (1,'RM CONTABILIDADE',0),
 (2,'META CONTE',0);
/*!40000 ALTER TABLE `cadastrocontabil` ENABLE KEYS */;


--
-- Structure for table `portalcontabilidade`.`cliente`
--

DROP TABLE IF EXISTS `portalcontabilidade`.`cliente`;
CREATE TABLE  `portalcontabilidade`.`cliente` (
  `CodCliente` double NOT NULL auto_increment,
  `RazaoSocial` varchar(45) NOT NULL default '0',
  `NomeFantasia` varchar(45) NOT NULL default '0',
  `CNPJ` varchar(45) default '0',
  `Desativado` int(10) unsigned NOT NULL default '0',
  `Denominacao` varchar(45) default NULL,
  PRIMARY KEY  (`CodCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portalcontabilidade`.`cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `portalcontabilidade`.`cliente` (`CodCliente`,`RazaoSocial`,`NomeFantasia`,`CNPJ`,`Desativado`,`Denominacao`) VALUES 
 (1,'CHARLES DEMETRIUS G DA SILVA EIRELI','DLINKS SOFTWARE HOUSE ','30132524000105',0,'DLINKS'),
 (2,'CRUZ DE REBOUCAS COMERCIO DE ALIMENTOS EIRELI','ECONOMICO LOJA 09','34297472000170',0,'SUPERMERCADO ECONOMICO LOJA 9'),
 (3,'BS COMERCIO DE ALIMENTOS E ARMARINHO ','BS COMERCIO DE ALIMENTOS','30681403000104',0,'VAREJÃO RIO DOCE'),
 (4,'IPUTINGA COMERCIO DE ALIMENTOS EIRELI','ECONOMICO LOJA 07 ','29761734000175',0,'SUPERMERCADO ECONOMICO'),
 (5,'JORDAO COMERCIO DE ALIMENTOS LTDA','ECONOMICO LOJA 02 ','20607356000103',0,'MERCADINHO ECONOMICO'),
 (6,'FRIGORIFICO N J D LTDA','BOI BOM LJ 1 - CABO CENTRO','18252582000169',0,'FRIGORIFICO BOI BOM'),
 (7,'SUCUPIRA COMERCIO DE ALIMENTOS LTDA','ECONOMICO PACHECO - SUCUPIRA ','28686920000124',0,'MERCADINHO ECONOMICO'),
 (8,'A M MELO COMERCIO DE ALIMENTOS LTDA','PONTO CERTO','12406173000193',0,'VAREJAO PONTO CERTO'),
 (9,'ECONOMICO COMERCIO DE ALIMENTOS EIRELI','ECONOMICO LOJA 06 ','24822335000153',0,'SUPERMERCADO ECONOMICO'),
 (10,'CABO COMERCIO DE ALIMENTOS LTDA','ECONOMICO LJ 05  ','21545036000120',0,'SUPERMERCADO ECONOMICO');
INSERT INTO `portalcontabilidade`.`cliente` (`CodCliente`,`RazaoSocial`,`NomeFantasia`,`CNPJ`,`Desativado`,`Denominacao`) VALUES 
 (11,'D E RODRIGUES DE SOUSA - SUPERMERCADO','SOUZA LJ 03 - CAJA','31326719000140',0,'CAJAZINHO'),
 (12,'S. MANOEL DE SOUZA MERCADINHO','SOUZA LJ 01','04545623000109',0,'NOVO SOUZA '),
 (13,'BARRETO COMERCIO DE ALIMENTOS EIRELI','ECONOMICO LOJAJ 03 - BARRETO ','29060820000150',0,'MERCADINHO ECONOMICO'),
 (14,'RODRIGUES SILVA SUPERMERCADO LTDA','SOUZA LJ 02 - AQUI','05919681000100',0,'AQUI SUPER CESTAO'),
 (15,'MERCANTIL COSME E FILHOS DE ALIMENTOS LTDA','COMPRE MAIS LJ 05 - COSME E FILHO','30545638000179',0,'LAJEDO SUPERMERCADO'),
 (16,'MERCANTIL COSME DE ALIMENTOS LTDA','COMPRE MAIS LJ 01 - NOSSA Sra O','11950018000170',0,' VAREJAO IPOJUCA '),
 (17,'MERCADINHO BOM GOSTO LTDA ','BOM GOSTO LJ 01 - AGUA FRIA','01956674000127',0,'MERCADINHO BOM GOSTO LTDA'),
 (18,'LAGOA ENCANTADA COMERCIO DE ALIMENTOS EI','ECONOMICO LJ 08 - LAGOA ENCANTADA ','33414205000172',0,'SUPERMERCADO ECONOMICO'),
 (19,'G R FERNANDES MERCADINHO EIRELI','SANTA CLARA LOJA 2 - IBURA','31159111000179',0,'SUPERMERCADO SANTA CLARA');
INSERT INTO `portalcontabilidade`.`cliente` (`CodCliente`,`RazaoSocial`,`NomeFantasia`,`CNPJ`,`Desativado`,`Denominacao`) VALUES 
 (20,'M S COM ALIMENT E LATICINIO LDTA ME','CASA DAS FRUTAS ','14152875000113',0,'M S COM ALIMENT E LATICINIO '),
 (21,'T M RODRIGUES COMERCIO DE ALIMENTOS LTDA','BEM BOM LOJA 01 PINA','22931185000190',0,'T M RODRIGUES COMERCIO'),
 (22,'MERCANTIL ELI DE ALIMENTOS LTDA - ME','MERCANTIL ELI ','21557382000129',0,'MERCANTIL ELI DE ALIMENTOS LTDA - ME'),
 (23,'D&S SUPERMERCADOS LTDA ME','D&S SUPERMERCADO','23026051000198',0,'MERCADINHO ECONOMICO APIPUCOS'),
 (24,'MURIBECA COMERCIO DE ALIMENTOS EIRELI','CAHU LOJA 02','30148015000162',0,'MURIBECA COMERCIO '),
 (25,'COMERCIAL DE ALIMENTOS DORNELAS EIRELI','MINI ECONOMICO','29469870000196',0,'MERCADO MINI ECONOMICO'),
 (26,'JOSE JADILSON SANTOS DE SANTANA','VAREJAO SANTANA ','00866649000190',0,'VAREJAO SANTANA '),
 (27,'MERCANTIL VALENCA DE ALIMENTOS EIRELI -','VAREJAO BRASILEIRO LJ ANTIGA ','21035996000302',0,'VAREJAO BRASILEIRO '),
 (28,'PERNAMBUCO MERCANTIL ALIMENTOS LTDA','COMPRE MAIS LJ 03','07614540000104',0,'VAREJAO IPOJUCA');
INSERT INTO `portalcontabilidade`.`cliente` (`CodCliente`,`RazaoSocial`,`NomeFantasia`,`CNPJ`,`Desativado`,`Denominacao`) VALUES 
 (29,'VARZEA COMERCIO DE ALIMENTOS LTDA','BEM BOM LOJA 02 - VARZEA','31698506000140',0,'BEM BOM SUPERMERCADOS'),
 (30,'JOSELITO RAMOS DE SOUSA ME','SUPERMERCADO TRADICAO','00344753000114',0,'J R S COMERCIO E SERVICOS'),
 (31,'MINI MERCADO NOSSA SENHORA DO O LTDA','COMPRE MAIS LJ 06 - SRA O','33927396000176',0,'COMPRE MAIS SUPERMERCADO'),
 (32,'CAHU COMERCIO DE ALIMENTOS LTDA ME','CAHU LJ 01 - SOCORRO','21425302000181',0,'CAHU COMERCIO DE ALIMENTOS'),
 (33,'FRIGORIFICO N J D LTDA','BOI BOM LJ 02','18252582000240',0,'FRIGORIFICO BOI BOM '),
 (34,'MERCANTIL SAO MIGUEL DE ALIMENTOS LTDA','COMPRE MAIS LJ 04 - CENTRO','08991693000133',0,'VAREJAO IPOJUCA '),
 (35,'LAUDICELIA P GUEDES ME','MERCADINHO J L','20538220000180',0,'MERCADINHO J L'),
 (36,'MERCADINHO SANTA CLARA LTDA - ME','SANTA CLARA LOJA 1 - PIEDADE','20053532000102',0,'MERCADINHO POPULAR '),
 (37,'FRIGORIFICO E PEIXARIA LEVE MAIS LTDA ME','LEVE MAIS','13676535000129',0,'LEVE MAIS '),
 (38,'MERCANTIL VALENCA DE ALIMENTOS EIRELI EP','VAREJAO BRASILEIRO 03','21035996000140',0,'MERCANTIL VALENCA');
INSERT INTO `portalcontabilidade`.`cliente` (`CodCliente`,`RazaoSocial`,`NomeFantasia`,`CNPJ`,`Desativado`,`Denominacao`) VALUES 
 (39,'DELIKAPAN REGENTE PADARIA E DELICATECEN','DELIKAPAN REGENTE','33708951000179',0,'DELIKAPAN REGENTE'),
 (40,'MERCANTIL SAO JERONIMO DE ALIMENTOS LTDA','SAO JERONIMO','09153668000143',0,'CESTAO PERNAMBUCANO '),
 (41,'COMERCIO DE ALIMENTOS COSME LTDA','COMPRE MAIS LJ02 - COSME ','15225759000140',0,'VAREJAO IPOJUCA '),
 (42,'CAETANO COMERCIO DE ALIMENTOS EIRELI','VAREJAO CORDEIRO','28687845000116',0,'CAETANO COMERCIO DE ALIMENTOS'),
 (43,'PRAZERES COMERCIO DE ALIMENTOS LTDA - ME','ECONOMICO PRAZERES ','23102567000174',0,'SUPERMERCADO ECONOMICO '),
 (44,'IVANILDA DA SILVA PAIVA COMERCIO DE ALIM','CESTAO DA BOMBA ','15272117000100',0,'CESTAO DA BOMBA'),
 (45,'REGENTE MERCANTIL DE ALIMENTOS LTDA ME','REGENTE MERCANTIL ','12920325000171',0,'REGENTE MERCANTIL'),
 (46,'S.D. DAS MERCES EIRELI - ME','HORTIFRUT PRIMOS ','08659022000170',0,'HORTIFRUT PRIMOS '),
 (47,'MERCADINHO MUITO MAIS  EIRELI','MUITO MAIS','34808092000152',0,'MERCADINHO MUITO MAIS '),
 (48,'VAREJAO VASCONCELOS DE ALIMENTOS LTDA -','MERCADINHO AGRESTE ','19157466000123',0,'MERCADINHO AGRESTE ');
INSERT INTO `portalcontabilidade`.`cliente` (`CodCliente`,`RazaoSocial`,`NomeFantasia`,`CNPJ`,`Desativado`,`Denominacao`) VALUES 
 (49,'J. DE ALMEIDA DANIEL JUNIOR','PADARIA PROGRESSO','05535678000192',0,'PADARIA PROGRESSO'),
 (50,'JAIME G. SOARES NETO - MERCEARIA-ME','MERCADINHO RIO BRANCO ','05204788000171',0,'MERCADINHO RIO BRANCO '),
 (52,'FILLETS MURO ALTO RESTAURANTE LTDA','FILLETS MURO ALTO ','34104207000128',0,'FILLETS MURO ALTO '),
 (54,'NEOVANT DISTRIBUIDORA DE PRODUTOS LTDA','SPELL CARUARU','21160030000216',0,'NEOVANT DISTRIBUIDORA DE PRODUTOS LTDA'),
 (55,'LUIZANIRA BENICIO SANTOS','LUIZANIRA BENICIO SANTOS','03740468000100',0,'ARMARINHO SANTO AMARO '),
 (56,'IVONE VIEIRA BEZERRA','FRIGORIFICO MANA','10208474000187',0,'FRIGORIFICO MANA'),
 (57,'RESTAURANTE PAJARACA LTDA','RESTAURANTE PAJARACA','17473670000128',0,'RESTAURANTE PAJARACA '),
 (58,'LUIZ DE SOUZA DA SILVA ME','LUIZ DE SOUZA DA SILVA ','15128961000153',0,'LUIZ DE SOUZA '),
 (59,'ANDREA & GERCINA COMERCIO DE ALIMENTOS L','ANDREA & GERCINA COMERCIO','31359845000100',0,'ANDREA & GERCINA '),
 (60,'ADAURI CAVALCANTI DE CARVALHO','LANCHONETE E SORVETERIA IDEAL','06724915000126',0,'LANCHONETE E SORVETERIA IDEAL');
INSERT INTO `portalcontabilidade`.`cliente` (`CodCliente`,`RazaoSocial`,`NomeFantasia`,`CNPJ`,`Desativado`,`Denominacao`) VALUES 
 (61,'NEOVANT DISTRIBUIDORA DE PRODUTOS LTDA','SPELL LOJA DOIS ','21160030000305',0,'NEOVANT DISTRIBUIDORA DE PRODUTOS LTDA'),
 (62,'NEOVANT DISTRIBUIDORA DE PRODUTOS LTDA','VITORYA SPELL LJ03 OLINDA','21160030000488',0,'NEOVANT DISTRIBUIDORA DE PRODUTOS LTDA'),
 (63,'COMERCIO DE ALIMENTOS BEACH LTDA','COMERCIO DE ALIMENTOS BEACH LTDA','31330668000120',0,'BEACH LJ01'),
 (64,'JOAB E DA SILVA PADARIA ME','JOAB E DA SILVA PADARIA','12713149000105',0,'MERCADINHO UMUARAMA '),
 (65,'CLIVIA PAULA B DO NASCIMENTO','CLIVIA PAULA B DO NASCIMENTO','06036707000134',0,'LIVRARIA E LOCADORA SHALON ADONAI'),
 (66,'POUSADA PONTAL DE MARACAIPE LTDA','POUSADA PONTAL DE MARACAIPE LTDA','31596381000147',0,'MARACAIPE '),
 (67,'CASA BELLA COMERCIO DE MOVEIS LTDA','CASA BELLA','32204089000102',0,'CASA BELLA'),
 (68,'POUSADA DOS COQUEIROS LTDA','POUSADA DOS COQUEIROS ','00319860000192',0,'POUSADA DOS COQUEIROS'),
 (69,'PARQUE DA PIZZA RESTAURANTE E PIZZARIA EIRELI','PARQUE DA PIZZA','09114019000133',0,'PARQUE DA PIZZA ');
INSERT INTO `portalcontabilidade`.`cliente` (`CodCliente`,`RazaoSocial`,`NomeFantasia`,`CNPJ`,`Desativado`,`Denominacao`) VALUES 
 (70,'IKB EMPREENDIMENTOS HOTELEIROS  LTDA','IKB EMPREENDIMENTOS HOTELEIROS ','30060380000110',0,'IKB HOTEL'),
 (71,'LBC EMPREENDIMENTOS E SERVICOS HOTELEIRO','LBC EMPREENDIMENTOS E SERVICOS HOTELEIRO','22921197000134',0,'LIRAS DA POESIA '),
 (72,'SOUZA & BECKER RESTAURANTE LTDA','SOUZA & BECKER RESTAURANTE LTDA','34505731000100',0,'FILLETS MURO ALTO OKA'),
 (73,'MR SUPERMERCADOS EIRELI','MR ECONOMIA','25274281000100',0,'MR ECONOMIA '),
 (74,'SUPERMERCADO PAULISTA LTDA','NOVA ERA 2 PAULISTA ANTIGO','31472347000160',0,'NOVA ERA 02'),
 (75,'A.T DE VIVEIROS SERAFIM DIAS MERCADINHO EIREL','MERCADINHO SERAFIM','35226657000156',0,'MERCADINHO SERAFIM'),
 (76,'ELIZA COMERCIO ALIMENTICIO LTDA EPP','PADARIA ELIZA','18274653000124',0,'PADARIA ELIZA '),
 (78,'NEOVANT DISTRIBUIDORA DE PRODUTOS LTDA','NEOVANT DISTRIBUIDORA DE PRODUTOS LTDA','21160030000135',0,'0'),
 (79,'J C BEZERRA MERCADINHO EIRELI','SUPERMERCADO DA ECONOMIA','31007761000107',0,'0'),
 (80,'LANCHONETE UNIR EIRELI','LANCHONETE UNIR ','35794560000140',0,'FRIGORIFICO UNIR ');
INSERT INTO `portalcontabilidade`.`cliente` (`CodCliente`,`RazaoSocial`,`NomeFantasia`,`CNPJ`,`Desativado`,`Denominacao`) VALUES 
 (81,'MERCADINHO BARROS EIRELI ','CESTAO DA ECONOMIA LOJA 03','34856192000154',0,'MERCADINHO BARROS EIRELI '),
 (82,'ISRAEL C DA SILVA MERCADINHO','MERCADINHO DO ISRAEL','35218120000144',0,'MERCADINHO DO ISRAEL'),
 (83,'MARIA APARECIDA BARROS CORREIA ','CESTAO DA ECONOMIA LJ 01','34863078000151',0,'MARIA APARECIDA BARROS CORREIA '),
 (84,'VAREJAO DO POVO','LITO LJ02','33331522000125',0,'A DORNELAS DA SILVA '),
 (85,'SUPERMERCADO NOVA ERA EIRELI ','NOVA ERA ABREU E LIMA LOJA 02','20534381000287',0,'SUPERMERCADO NOVA ERA EIRELI '),
 (86,'L.L COMERCIO VAREJISTA DE ALIMENTOS ','ATACAREJO TODA HORA ','35574552000198',0,'L.L COMERCIO VAREJISTA DE ALIMENTOS '),
 (87,'Q.CANUTO CLEMENTE DA SILVA MERCADINHO ','LITO LOJA 01 ','33821998000144',0,'Q.CANUTO CLEMENTE DA SILVA MERCADINHO '),
 (88,'MARIA DA CONCEICAO DE SANTANA EIRELI','MARIA DA CONCEICAO DE SANTANA EIRELI','04031930000163',0,'MARIA DA CONCEICAO DE SANTANA EIRELI'),
 (89,'A RODRIGUES TENORIO ME ','PANIFICADORA ZE SUAPE','21394805000137',0,'PANIFICADORA ZE SUAPE');
INSERT INTO `portalcontabilidade`.`cliente` (`CodCliente`,`RazaoSocial`,`NomeFantasia`,`CNPJ`,`Desativado`,`Denominacao`) VALUES 
 (90,'P.R DIAS INACIO MERCADINHO EIRELI','SUPERMERCADO SERAFIM ','36729020000145',0,'SUPERMERCADO SERAFIM '),
 (91,'CLOVIS SERGIO CAVALCANTI HORTIFRUTI','KITANDA DO GORDO ','27631096000142',0,'KITANDA DO GORDO'),
 (92,'PEDRO HENRIQUE O. VACONCELOS DO NASCIMENTO ','LANCHONETE UNIAO','30787525000180',0,'PEDRO HENRIQUE O. VACONCELOS DO NASCIMENTO'),
 (93,'A. CARLOS LIMA SILVA MERCADINHO ','A. CARLOS LIMA SILVA MERCADINHO','34895285000198',0,'A. CARLOS LIMA SILVA MERCADINHO'),
 (94,'','','',0,''),
 (95,'','','',0,''),
 (96,'J G SUPERMERCADOS LTDA EPP','SUPERMERCADO DA FAMILIA ','24446192000122',0,'SG SUPERMERCADOS'),
 (97,'SUPERMERCADO NOVA ERA EIRELI','SUPERMERCADO NOVA ERA - LOJA 1','20534381000104',0,'SUPERMERCADO NOVA ERA'),
 (98,'LILIANE BARBOSA DE SOUZA FARMACIA ME ','DROGARIA RECIFE LOJA 01','05255399000175',0,'AGAFARMA '),
 (99,'LILIANE BARBOSA DE SOUZA FARMACIA ME','DROGARIA RECIFE LOJA 02','05255399000256',0,'AGAFARMA'),
 (100,'OSIEL BARBOZA DA SILVA FARMACIA ME ','DROGARIA RECIFE LOJA 02 ','13622768000220',0,'DROGARIA RECIFE LOJA 02');
INSERT INTO `portalcontabilidade`.`cliente` (`CodCliente`,`RazaoSocial`,`NomeFantasia`,`CNPJ`,`Desativado`,`Denominacao`) VALUES 
 (101,'OSIEL BARBOZA DA SILVA FARMACIA ME ','DROGARIA RECIFE LOJA 01','13622768000149',0,'DROGARIA RECIFE LOJA 01 '),
 (102,'OSIEL BARBOZA DA SILVA FARMACIA ME ','DROGARIA RECIFE LOJA 03','13622768000300',0,'DROGARIA RECIFE LOJA 03'),
 (103,'PANIFICADORA SANTIAGO LTDA','PANIFICADORA SANTIAGO','02652491000180',0,'PANIFICADORA SANTIAGO'),
 (104,'VALDECI PEREIRA DUARTE','DUARTE FRIOS','21001651000176',0,'DUARTE FRIOS'),
 (105,'J CANDIDO DOS SANTOS FILHO COMERCIO DE ALIMEN','CANDIDO VENDAS - BEZERROS','33876528000188',0,'CANDIDO VENDAS'),
 (106,'JOSE ANTONIO DA COSTA FILHO ','COMERCIAL COSTA ','08884768000187',0,'COMERCIAL COSTA '),
 (107,'W A L DE OLIVEIRA PADARIA','DELIKAPAN PADARIA','32985347000127',0,'DELIKAPAN'),
 (108,'W.S. RIBEIRO COMERCIO DE MOVEIS EIRELI','W S RIBEIRO','36965871000197',0,'W S RIBEIRO'),
 (109,'MERCADINHO SACRAMENTO DE ALIMENTOS EIRELI','MERCADINHO EXPRESSO','37680432000109',0,'MERCADINHO EXPRESSO'),
 (110,'E A COUTINHO LISBOA FRIGORIFICO EIRELI','FRIGORIFICO LISBOA ','37542296000182',0,'FRIGORIFICO LISBOA');
INSERT INTO `portalcontabilidade`.`cliente` (`CodCliente`,`RazaoSocial`,`NomeFantasia`,`CNPJ`,`Desativado`,`Denominacao`) VALUES 
 (111,'SUPERMERCADO VARZEA LTDA','SUPERTOP - LOJA 1','35792690000143',0,'SUPERTOP'),
 (112,'IVALDO J DE MELO MERCADINHO - EPP','MERCADINHO EMELY','04805258000116',0,'MERCADINHO EMELY'),
 (113,'NATALIA PIRES CORDEIRO','N P MAKEUP','36601955000141',0,'N P MAKEUP'),
 (114,'A. CARLOS LIMA SILVA MERCADINHO','ECONOMICO CURADO','34895285000198',0,'ECONOMICO CURADO'),
 (115,'DR DE SOUSA SUPERMERCADO LTDA','BEM ESTAR - LOJA 1','27492043000198',0,'BEM ESTAR'),
 (116,'DR DE SOUSA SUPERMERCADO LTDA','BEM ESTAR LOJA 2','27492043000279',0,'BEM ESTAR LOJA 2'),
 (117,'OSIEL BARBOZA DA SILVA FARMACIA','DROGARIA RECIFE ','13622768000491',0,'DROGARIA RECIFE'),
 (118,'MERKADAO SEU ANTONIO COMERCIO DE CARNES E ALI','MERKADAO SEU ANTONIO','29413774000126',0,'MERKADAO SEU ANTONIO'),
 (119,'JAIRO.J.SOARES EIRELI','PREÇO BAIXO ','38209973000108',0,'MERCADO PREÇO BAIXO'),
 (120,'J BARBOSA DA SILVA','E DE CASA','36147310000180',0,'E DE CASA'),
 (121,'JOSELITO RAMOS DE SOUSA JUNIOR MERCADINHO EIR','SUPERMERCADO TRADIÇÃO LOJA 2','00344753000203',0,'SUPERMERCADO TRADIÇÃO LOJA 2');
INSERT INTO `portalcontabilidade`.`cliente` (`CodCliente`,`RazaoSocial`,`NomeFantasia`,`CNPJ`,`Desativado`,`Denominacao`) VALUES 
 (122,'I. S. DE LIMA COMERCIAL DE ALIMENTOS','ARMAZEM SEU ANTONIO','35297560000134',0,'ARMAZEM SEU ANTONIO'),
 (123,'SOUTO & MELO COMERCIO DE CARNES LTDA','FRIGORIFICO MAIS CARNES','31736363000113',0,'FRIGORIFICO MAIS CARNES'),
 (124,'COMERCIAL DE ALIMENTOS BEIRA RIO EIRELI','EMPORIO BONDEMAIS','36712886000143',0,'EMPORIO BONDEMAIS'),
 (125,'PONTE DOS CARVALHOS COMERCIO DE ALIMENTOS EIR','ECONOMICO CAHU LOJA 3','39762002000153',0,'SUPERMERCADO ECONOMICO'),
 (126,'COMERCIAL DE ALIMENTOS CADETE DA SILVA EIRELI','MAX ECONOMICO','39994832000106',0,'MERCADINHO CADETE'),
 (127,'MINIMERCADO CONVENCAO EIRELI','MERCADINHO CONVENCAO','32604545000101',0,'NOVO MERCADINHO CONVENCAO'),
 (128,'J.E. COMERCIO VAREJISTA DE ALIMENTOS LTDA EPP','TODA HORA - LOJA 2','21268319000172',0,'O ECONOMICO'),
 (129,'PADARIA E PASTELARIA FLOR DO IBURA LTDA ME','PADARIA FLOR DO IBURA','09946823000189',0,'PADARIA FLOR DO IBURA'),
 (130,'ATACAREJO ECONOMICO EIRELI','ATACAREJO ECONOMICO - CARUARU','41360862000102',0,'ATACAREJO ECONOMICO');
INSERT INTO `portalcontabilidade`.`cliente` (`CodCliente`,`RazaoSocial`,`NomeFantasia`,`CNPJ`,`Desativado`,`Denominacao`) VALUES 
 (131,'MARCIA RODRIGUES PEREIRA LIMA','ECONOMICO PRAZERES - SUPER MIX (SUPERTOP 2)','41374787000139',0,'MARCIA RODRIGUES PEREIRA LIMA 02220932427'),
 (132,'ATACABOM DISTRIBUIDORA E COMERCIO EIRELI EPP','ATACABOM','17678389000121',0,'ATACABOM DISTRIBUIDORA E COMERCIO LTDA'),
 (133,'PONTEZINHA COMERCIO DE ALIMENTOS EIRELI','VAREJÃO ATALAIA','40893603000184',0,'VAREJÃO ATALAIA'),
 (134,'COMERCIAL DE ALIMENTOS ROSENDO EIRELI','ATACADO TODA HORA - LOJA 3','24842017000154',0,'ATACADO TODA HORA - LOJA 3'),
 (135,'MINHAS COMPRAS EIRELI','MEU ATACAREJO - NOVA DESCOBERTA','42285732000115',0,'MEU ATACAREJO'),
 (136,'EF MERCANTIL DE ALIMENTOS LTDA','COMPRE MAIS - LOJA 8 (BARREIROS)','41622618000170',0,'COMPRE MAIS - LOJA 8 (BARREIROS)'),
 (137,'PIRAPAMA COMERCIO DE ALIMENTOS EIRELI','PIRAPAMA COMERCIO DE ALIMENTOS EIRELI','41381944000133',0,'PIRAPAMA COMERCIO DE ALIMENTOS EIRELI'),
 (138,'M DE O MELO COMERCIO ALIMENTICIO LTDA','CHEGA MAIS - JORGE','01410916000182',0,'CHEGA MAIS');
INSERT INTO `portalcontabilidade`.`cliente` (`CodCliente`,`RazaoSocial`,`NomeFantasia`,`CNPJ`,`Desativado`,`Denominacao`) VALUES 
 (139,'J S T DE CARVALHO COMERCIO','VERDINHO NOVA ERA','36859325000171',0,'VERDINHO NOVA ERA'),
 (140,'ME PANIFICADORA EIRELI','PADARIA PAO NOSSO','10961544000173',0,'PAO NOSSO PADARIA'),
 (141,'JONATAS ANDERSON DE OLIVEIRA FARIAS','JONATAS ANDERSON DE OLIVEIRA FARIAS','10988733000130',0,'JONATAS ANDERSON DE OLIVEIRA FARIAS'),
 (142,'G S P COMERCIO DE ALIMENTOS LTDA - EPP','MIRABILANDIA','04969350000111',0,'A & B LANCHES'),
 (143,'BEM BOM PRIME COMERCIO DE ALIMENTOS LTDA','BEM BOM PRIME - LOJA 3','43772282000158',0,'BEM BOM PRIME'),
 (144,'NOSSO ATACAREJO','NOSSO ATACAREJO','43972763000107',0,'NOSSO ATACAREJO'),
 (145,'ATACAREJO ECONOMICO COMERCIO DE ALIMENTOS LTD','CAHU - LOJA 4','43358448000194',0,'ATACAREJO ECONOMICO'),
 (146,'MERCADINHO ATALAIA LTDA','MERCADINHO ATALAIA - LOJA 2','44449405000187',0,'ATALAIA'),
 (147,'COMERCIAL NOVO ISRAEL EIRELI EPP','NOVO ISRAEL - JORGE','04269297000146',0,'SUPER FRUTI'),
 (148,'COMERCIO DE ALIMENTOS ARAUJO LTDA','COMERCIAL ARAUJO','44382568000190',0,'COMERCIAL ARAUJO');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Structure for table `portalcontabilidade`.`contabilidade`
--

DROP TABLE IF EXISTS `portalcontabilidade`.`contabilidade`;
CREATE TABLE  `portalcontabilidade`.`contabilidade` (
  `nReg` int(10) unsigned NOT NULL auto_increment,
  `CodContabil` int(10) unsigned default NULL,
  `NomeContabil` varchar(200) default NULL,
  `CodCliente` int(10) unsigned default NULL,
  `NomeCliente` varchar(200) default NULL,
  `Suporte` varchar(45) NOT NULL,
  `CNPJ` varchar(45) NOT NULL,
  `Liberado` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`nReg`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portalcontabilidade`.`contabilidade`
--

/*!40000 ALTER TABLE `contabilidade` DISABLE KEYS */;
INSERT INTO `portalcontabilidade`.`contabilidade` (`nReg`,`CodContabil`,`NomeContabil`,`CodCliente`,`NomeCliente`,`Suporte`,`CNPJ`,`Liberado`) VALUES 
 (1,1,'RM CONTABILIDADE',3,'BS COMERCIO DE ALIMENTOS','JOSEMAR','30681403000104',1),
 (2,2,'META CONTE',20,'CASA DAS FRUTAS','EVERTON','14152875000113',1);
/*!40000 ALTER TABLE `contabilidade` ENABLE KEYS */;


--
-- Structure for table `portalcontabilidade`.`informativo`
--

DROP TABLE IF EXISTS `portalcontabilidade`.`informativo`;
CREATE TABLE  `portalcontabilidade`.`informativo` (
  `nReg` int(10) unsigned NOT NULL auto_increment,
  `CodContabil` int(10) unsigned NOT NULL,
  `Titulo` varchar(200) NOT NULL,
  `Mensagem` varchar(800) NOT NULL,
  `Todos` int(10) unsigned NOT NULL default '0',
  `NomeContabil` varchar(100) NOT NULL,
  PRIMARY KEY  (`nReg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portalcontabilidade`.`informativo`
--

/*!40000 ALTER TABLE `informativo` DISABLE KEYS */;
/*!40000 ALTER TABLE `informativo` ENABLE KEYS */;


--
-- Structure for table `portalcontabilidade`.`suporte`
--

DROP TABLE IF EXISTS `portalcontabilidade`.`suporte`;
CREATE TABLE  `portalcontabilidade`.`suporte` (
  `nReg` int(10) unsigned NOT NULL auto_increment,
  `Nome` varchar(45) NOT NULL default '0',
  `email` varchar(45) NOT NULL,
  `HoraFechamento` varchar(45) NOT NULL default '00:00',
  `Ramal` varchar(45) NOT NULL default '0',
  `OnLine` int(10) unsigned NOT NULL default '0',
  `Senha` varchar(45) NOT NULL default '0',
  `Direciona` int(10) unsigned NOT NULL default '0',
  `Aud` int(10) unsigned NOT NULL default '0',
  `Diretoria` int(11) NOT NULL default '0',
  `Financeiro` int(10) unsigned NOT NULL default '0',
  `desativado` tinyint(4) default '0',
  `Suporte` int(10) unsigned NOT NULL default '0',
  `AtenAvulsoGerente` int(10) unsigned NOT NULL default '0',
  `DataNascimento` date NOT NULL,
  `Gerente` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`nReg`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portalcontabilidade`.`suporte`
--

/*!40000 ALTER TABLE `suporte` DISABLE KEYS */;
INSERT INTO `portalcontabilidade`.`suporte` (`nReg`,`Nome`,`email`,`HoraFechamento`,`Ramal`,`OnLine`,`Senha`,`Direciona`,`Aud`,`Diretoria`,`Financeiro`,`desativado`,`Suporte`,`AtenAvulsoGerente`,`DataNascimento`,`Gerente`) VALUES 
 (1,'DLINKS','dlinks@dlinks.com.br','09:44','0',0,'1',1,0,0,0,1,0,0,'2018-04-06',0),
 (2,'CHARLES','charles.demetrius@dlinks.com.br','10:26','0',0,'55264',1,1,1,1,0,0,1,'1973-04-26',1),
 (3,'EVERTON','everton.santana@dlinks.com.br','11:19','0',1,'BARALH0',1,1,0,0,0,1,1,'1986-05-08',1),
 (4,'JOSEMAR','josemar.candido@dlinks.com.br','17:02','0',0,'flape12sac',1,1,0,0,0,1,1,'1977-11-15',1),
 (7,'FLAVIO','flavio@dlinks.com.br','09:42','0',0,'breno456',1,0,0,0,0,0,0,'1989-01-26',1),
 (9,'GUSTAVO','gustavo.santos@dlinks.com.br','13:55','0',0,'A4f5j72f9lkh7',1,1,1,1,0,0,1,'1988-05-11',1),
 (10,'SAVIO','savio.fagundes@dlinks.com.br','12:07','0',0,'624636',1,0,0,0,1,1,0,'1999-03-13',0),
 (11,'FLAVIA','financeiro@dlinks.com.br','00:00','0',0,'123456',1,0,0,1,1,0,0,'1984-11-22',1),
 (12,'RONEY','roney.gustavo@dlinks.com.br','00:00','0',1,'220191',1,0,0,0,0,1,0,'1991-01-22',0);
INSERT INTO `portalcontabilidade`.`suporte` (`nReg`,`Nome`,`email`,`HoraFechamento`,`Ramal`,`OnLine`,`Senha`,`Direciona`,`Aud`,`Diretoria`,`Financeiro`,`desativado`,`Suporte`,`AtenAvulsoGerente`,`DataNascimento`,`Gerente`) VALUES 
 (13,'HUGO','hugo.ferreira@dlinks.com.br','00:00','0',0,'8504',1,0,0,0,0,1,0,'1988-09-22',0),
 (14,'JARCILEIDE','jarcileide.nobrega@dlinks.com.br','00:00','0',0,'123456',1,0,0,1,0,0,0,'1989-05-20',0);
/*!40000 ALTER TABLE `suporte` ENABLE KEYS */;


--
-- Structure for table `portalcontabilidade`.`usuarios`
--

DROP TABLE IF EXISTS `portalcontabilidade`.`usuarios`;
CREATE TABLE  `portalcontabilidade`.`usuarios` (
  `nReg` int(10) unsigned NOT NULL auto_increment,
  `CodContabil` int(10) unsigned NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Senha` varchar(45) NOT NULL,
  `Desativar` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`nReg`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portalcontabilidade`.`usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `portalcontabilidade`.`usuarios` (`nReg`,`CodContabil`,`Usuario`,`Senha`,`Desativar`) VALUES 
 (1,1,'RM','123456',0),
 (2,2,'METACONTE','123456',0),
 (4,2,'DLINKS','55264',0),
 (5,1,'DLINKS','260473',0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
