DROP TABLE IF EXISTS `NewIdea`;

CREATE TABLE `NewIdea` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(20) DEFAULT NULL,
  `NewIdea` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
);

DROP TABLE IF EXISTS `Questionnaire`;

CREATE TABLE `Questionnaire` (
  `Id` bigint(20) DEFAULT NULL,
  `C1` varchar(255) DEFAULT NULL,
  `C2` varchar(255) DEFAULT NULL,
  `C3` varchar(255) DEFAULT NULL,
  `C4` varchar(255) DEFAULT NULL,
  `UserId` bigint(20) DEFAULT NULL
);

DROP TABLE IF EXISTS `Questions`;

CREATE TABLE `Questions` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Question` varchar(255) DEFAULT NULL,
  `UserId` bigint(20) DEFAULT NULL,
  `Date` int(11) DEFAULT NULL,
  `AnswerContext` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
);

DROP TABLE IF EXISTS `UserImages`;

CREATE TABLE `UserImages` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `UserId` bigint(20) DEFAULT NULL,
  `Url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
);

DROP TABLE IF EXISTS `UserLeng`;

CREATE TABLE `UserLeng` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Date` int(11) DEFAULT NULL,
  `Icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
);