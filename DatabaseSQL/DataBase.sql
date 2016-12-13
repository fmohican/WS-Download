/*
Navicat MySQL Data Transfer

Source Server         : 85.204.135.100_3306
Source Server Version : 100028
Source Host           : 85.204.135.100:3306
Source Database       : E4hXV8Hqp77CQuS

Target Server Type    : MYSQL
Target Server Version : 100028
File Encoding         : 65001

Date: 2016-12-13 20:03:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for download
-- ----------------------------
DROP TABLE IF EXISTS `download`;
CREATE TABLE `download` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nume` text,
  `img` text,
  `tag` text,
  `type` text,
  `linkdl` text,
  `linkmal` text,
  `linkws` text,
  `size` varchar(255) DEFAULT NULL,
  `eps` int(2) DEFAULT NULL,
  `lan` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  `mail` varchar(255) NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `access` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
