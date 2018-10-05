-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2016 at 06:19 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sharedocs`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `deldoc`(IN `dcod` INT)
    NO SQL
begin


delete from tbdoc where doccod=dcod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dellst`(IN `lcod` INT)
    NO SQL
begin


delete from tblst where lstcod=lcod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delreg`(IN `rcod` INT)
    NO SQL
begin


delete from tbreg where regcod=rcod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delshr`(IN `scod` INT)
    NO SQL
begin

delete from tbshr where shrcod=scod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispdoc`()
    NO SQL
begin


select * from tbdoc;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `displst`(IN `rcod` INT)
    NO SQL
begin
select * from tblst where lstregcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispreg`()
    NO SQL
begin


select * from tbreg;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispshr`()
    NO SQL
begin


select * from tbshr;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspdocbylst`(IN `lcod` INT)
    NO SQL
select * from tbdoc where doclstcod=lcod order by docupldat desc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspshr`(IN `dcod` INT)
    NO SQL
select regeml from tbreg where regcod in(select shrregcod from tbshr
                                         where shrdoccod=dcod)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspshrdoc`(IN `rcod` INT)
    NO SQL
select * from tbdoc where doccod in(select shrdoccod from
                                    tbshr where shrregcod=rcod) order by docupldat$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `finddoc`(IN `dcod` INT)
    NO SQL
begin

select * from tbdoc where doccod=dcod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findlst`(IN `lcod` INT)
    NO SQL
begin

select * from tblst where lstcod=lcod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findreg`(IN `rcod` INT)
    NO SQL
begin

select * from tbreg where regcod=rcod;


end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findshr`(IN `scod` INT)
    NO SQL
begin

select * from tbshr where shrcod=scod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insdoc`(IN `dtit` VARCHAR(100), IN `dlcod` INT, IN `ddsc` VARCHAR(500), IN `dfil` VARCHAR(50), IN `dudat` DATETIME, OUT `cod` INT)
    NO SQL
begin


insert tbdoc values(null,dtit,dlcod,ddsc,dfil,dudat);
select last_insert_id() into cod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inslst`(IN `lnam` VARCHAR(50), IN `ldsc` VARCHAR(500), IN `lrcod` INT)
    NO SQL
begin

insert tblst values(null,lnam,ldsc,lrcod);


end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insreg`(IN `reml` VARCHAR(50), IN `rpwd` VARCHAR(50), IN `rdat` DATETIME)
    NO SQL
begin

insert tbreg values(null,reml,rpwd,rdat);


end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insshr`(IN `sdat` DATETIME, IN `sdcod` INT, IN `srcod` INT)
    NO SQL
begin


insert tbshr values(null,sdat,sdcod,srcod);

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logincheck`(IN `eml` VARCHAR(100), IN `pwd` VARCHAR(100), OUT `cod` INT)
    NO SQL
begin
declare actpwd varchar(50);
select regpwd from tbreg where regeml=eml into @actpwd;
if @actpwd=pwd then
select regcod from tbreg where regeml=eml into cod; 
else
set cod=-1;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `srcusr`(IN `str` VARCHAR(100), IN `rcod` INT, IN `dcod` INT)
    NO SQL
select regcod,regeml from tbreg where 
regeml like str and regcod!=rcod and 
regcod not in(select shrregcod from tbshr
where shrdoccod=dcod)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `upddoc`(IN `dcod` INT, IN `dtit` VARCHAR(100), IN `dlcod` INT, IN `ddsc` VARCHAR(500), IN `dfil` VARCHAR(50), IN `dudat` DATETIME)
    NO SQL
begin


update tbdoc set  doctit=dtit,doclstcod=dlcod,docdsc=ddsc,docfil=dfil,docupldat=dudat where doccod=dcod;


end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updlst`(IN `lcod` INT, IN `lnam` VARCHAR(50), IN `ldsc` VARCHAR(500), IN `lrcod` INT)
    NO SQL
begin

update tblst set lstnam=lnam,lstdsc=ldsc,lstregcod=lrcod where lstcod=lcod;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updreg`(IN `rcod` INT, IN `reml` VARCHAR(50), IN `rpwd` VARCHAR(50), IN `rdat` DATETIME)
    NO SQL
begin

update tbreg set regeml=reml,regpwd=rpwd,regdat=rdat where regcod=rcod;


end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updshr`(IN `scod` INT, IN `sdat` DATETIME, IN `sdcod` INT, IN `srcod` INT)
    NO SQL
begin

update tbshr set shrdat=sdat,shrdoccod=sdcod,shrregcod=srcod where shrcod=scod;

end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbdoc`
--

CREATE TABLE IF NOT EXISTS `tbdoc` (
  `doccod` int(11) NOT NULL AUTO_INCREMENT,
  `doctit` varchar(100) NOT NULL,
  `doclstcod` int(11) NOT NULL,
  `docdsc` varchar(500) NOT NULL,
  `docfil` varchar(50) NOT NULL,
  `docupldat` datetime NOT NULL,
  PRIMARY KEY (`doccod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbdoc`
--

INSERT INTO `tbdoc` (`doccod`, `doctit`, `doclstcod`, `docdsc`, `docfil`, `docupldat`) VALUES
(10, 'Introduction of Asp.net', 7, 'This document contains the basic theory of Asp.net ', '.pdf', '2016-07-11 00:00:00'),
(11, 'java script advance library angular js', 1, 'This document will provide you the basic syntax of angular js which is the advance library of java script and very fast with performance and user friendly.', '.js', '2016-07-17 00:00:00'),
(12, 'Basic terms of SQL', 4, 'This document contains the basic structure of data base handling', '.pdf', '2016-07-17 00:00:00'),
(13, 'Diagram of C', 5, 'This document will provide you the structure of c with digram', '.png', '2016-07-17 00:00:00'),
(14, 'Basic introduction of Java', 6, 'this document contains the basic theory and basic structure of java which is helpful for beginners', '.pdf', '2016-07-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblst`
--

CREATE TABLE IF NOT EXISTS `tblst` (
  `lstcod` int(11) NOT NULL AUTO_INCREMENT,
  `lstnam` varchar(50) NOT NULL,
  `lstdsc` varchar(500) NOT NULL,
  `lstregcod` int(11) NOT NULL,
  PRIMARY KEY (`lstcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tblst`
--

INSERT INTO `tblst` (`lstcod`, `lstnam`, `lstdsc`, `lstregcod`) VALUES
(1, 'Angular js introduction', 'this list contain basic syntax of angular js', 1),
(4, 'SQL introduction', 'This list contain the basic theory of SQL', 1),
(5, 'Introduction of c', 'This list contains the basic structure of c it contains a structure diegram in it', 1),
(6, 'Java ', 'This list contains the basic java introduction and the basic syntax Java ', 2),
(7, 'Asp.net introduction', 'This list contains the basic introduction of Asp.net', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbreg`
--

CREATE TABLE IF NOT EXISTS `tbreg` (
  `regcod` int(11) NOT NULL AUTO_INCREMENT,
  `regeml` varchar(50) NOT NULL,
  `regpwd` varchar(50) NOT NULL,
  `regdat` datetime NOT NULL,
  PRIMARY KEY (`regcod`),
  UNIQUE KEY `regeml` (`regeml`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbreg`
--

INSERT INTO `tbreg` (`regcod`, `regeml`, `regpwd`, `regdat`) VALUES
(1, 'abc@gmail.com', 'abc123', '2016-06-30 00:00:00'),
(2, 'abc@yahoo.com', 'abc', '2016-07-05 00:00:00'),
(3, 'atul@gmail.com', 'atul', '2016-07-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbshr`
--

CREATE TABLE IF NOT EXISTS `tbshr` (
  `shrcod` int(11) NOT NULL AUTO_INCREMENT,
  `shrdat` datetime NOT NULL,
  `shrdoccod` int(11) NOT NULL,
  `shrregcod` int(11) NOT NULL,
  PRIMARY KEY (`shrcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbshr`
--

INSERT INTO `tbshr` (`shrcod`, `shrdat`, `shrdoccod`, `shrregcod`) VALUES
(1, '2016-07-13 00:00:00', 10, 3),
(2, '2016-07-13 00:00:00', 10, 4),
(3, '2016-07-15 00:00:00', 10, 12),
(4, '2016-07-15 00:00:00', 10, 9),
(5, '2016-07-15 00:00:00', 10, 9),
(6, '2016-07-15 00:00:00', 6, 2),
(7, '2016-07-16 00:00:00', 6, 3),
(8, '2016-07-17 00:00:00', 13, 2),
(9, '2016-07-17 00:00:00', 10, 1),
(10, '2016-07-17 00:00:00', 10, 1),
(11, '2016-07-17 00:00:00', 14, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
