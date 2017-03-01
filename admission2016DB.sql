/*
 Navicat Premium Data Transfer

 Source Server         : Bangkok University
 Source Server Type    : MySQL
 Source Server Version : 50173
 Source Host           : localhost
 Source Database       : admission2016DB

 Target Server Type    : MySQL
 Target Server Version : 50173
 File Encoding         : utf-8

 Date: 02/28/2017 13:36:19 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `dk_bilingual_courses`
-- ----------------------------
DROP TABLE IF EXISTS `dk_bilingual_courses`;
CREATE TABLE `dk_bilingual_courses` (
  `courses_id` int(2) NOT NULL,
  `courses_name_en` varchar(255) DEFAULT NULL,
  `courses_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`courses_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `dk_bilingual_courses`
-- ----------------------------
BEGIN;
INSERT INTO `dk_bilingual_courses` VALUES ('1', 'School of Accounting', 'คณะบัญชี'), ('2', 'School of Communication Arts - Advertising', 'คณะนิเทศศาสตร์ สาขาโฆษณา'), ('3', 'School of Humanities and Tourism Management - Hotel Management', 'คณะมนุษยศาสตร์และการจัดการการท่องเที่ยว สาขาการจัดการการโรงแรม'), ('4', 'School of Business Administration - Margeting', 'คณะบริหาร สาขาการตลาด');
COMMIT;

-- ----------------------------
--  Table structure for `dk_bilingual_register`
-- ----------------------------
DROP TABLE IF EXISTS `dk_bilingual_register`;
CREATE TABLE `dk_bilingual_register` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_fullname` varchar(255) DEFAULT NULL,
  `reg_mobile` varchar(30) DEFAULT NULL,
  `reg_email` varchar(255) DEFAULT NULL,
  `reg_courses` int(2) DEFAULT NULL,
  `reg_ipaddress` varchar(60) DEFAULT NULL,
  `reg_create` datetime DEFAULT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

SET FOREIGN_KEY_CHECKS = 1;
