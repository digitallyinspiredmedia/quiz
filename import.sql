
CREATE TABLE IF NOT EXISTS `Users` (
  `UID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Fuid` varchar(100) NOT NULL,
  `Ffname` varchar(60) NOT NULL,
  `Femail` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`UID`)
);

CREATE TABLE IF NOT EXISTS `Result` (
  `UID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Fuid` varchar(100) NOT NULL,
  `Ffname` varchar(60) NOT NULL,
  `Femail` varchar(60) DEFAULT NULL,
  `type` varchar(60) NOT NULL,
  `total` varchar(60) NOT NULL,
  PRIMARY KEY (`UID`)
);
