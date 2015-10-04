/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : yii

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2015-10-03 21:51:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment_admin
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment_admin`;
CREATE TABLE `auth_assignment_admin` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_admin_ibfk_2` (`user_id`),
  CONSTRAINT `auth_assignment_admin_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item_admin` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_assignment_admin_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_assignment_admin
-- ----------------------------
INSERT INTO `auth_assignment_admin` VALUES ('root', '-1', '1440057852');

-- ----------------------------
-- Table structure for auth_item_admin
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_admin`;
CREATE TABLE `auth_item_admin` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `auth_item_admin_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule_admin` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item_admin
-- ----------------------------
INSERT INTO `auth_item_admin` VALUES ('ADMIN-LOG_INDEX', '2', '查看管理员日志', null, null, '1439947339', '1442819868');
INSERT INTO `auth_item_admin` VALUES ('ADMIN_CREATE', '2', '创建管理员', null, null, '1439452596', '1439452596');
INSERT INTO `auth_item_admin` VALUES ('ADMIN_DELETE', '2', '管理员删除', null, null, '1439452642', '1439452642');
INSERT INTO `auth_item_admin` VALUES ('ADMIN_INDEX', '2', '管理员列表', null, null, '1439452656', '1439877888');
INSERT INTO `auth_item_admin` VALUES ('ADMIN_UPDATE', '2', '更改管理员', null, null, '1439452615', '1439452615');
INSERT INTO `auth_item_admin` VALUES ('ADMIN_VIEW', '2', '查看管理员', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('AJAX_UPLOAD', '2', '上传文件', null, null, '1439435784', '1439435784');
INSERT INTO `auth_item_admin` VALUES ('ASSIGNMENT_INDEX', '2', '管理角色分配', null, null, '1439451185', '1439451185');
INSERT INTO `auth_item_admin` VALUES ('LANG_CREATE', '2', '新建语言', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('LANG_DELETE', '2', '删除语言', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('LANG_INDEX', '2', '语言列表', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('LANG_UPDATE', '2', '编辑语言', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('LANG_VIEW', '2', '查看语言', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('PAGE_CREATE', '2', '新建页面', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('PAGE_DELETE', '2', '删除页面', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('PAGE_INDEX', '2', '页面列表', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('PAGE_UPDATE', '2', '编辑页面', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('PAGE_VIEW', '2', '查看页面', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('PAPER-CATEGORY_CREATE', '2', '新建文章栏目', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('PAPER-CATEGORY_DELETE', '2', '删除文章栏目', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('PAPER-CATEGORY_INDEX', '2', '文章栏目列表', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('PAPER-CATEGORY_UPDATE', '2', '编辑文章栏目', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('PAPER-CATEGORY_VIEW', '2', '查看文章栏目', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('PAPER_CREATE', '2', '新建文章', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('PAPER_DELETE', '2', '删除文章', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('PAPER_INDEX', '2', '文章列表', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('PAPER_UPDATE', '2', '编辑文章', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('PAPER_VIEW', '2', '查看文章', null, null, '1439451239', '1439451239');
INSERT INTO `auth_item_admin` VALUES ('PERMISSION_INDEX', '2', '管理规则', null, null, '1439451108', '1439451108');
INSERT INTO `auth_item_admin` VALUES ('ROLE_INDEX', '2', '管理角色', null, null, '1439451143', '1439451143');
INSERT INTO `auth_item_admin` VALUES ('root', '1', '根管理员', null, null, '1439435850', '1441003108');
INSERT INTO `auth_item_admin` VALUES ('SETTING_CREATE', '2', '创建系统设置', null, null, '1439451224', '1439451224');
INSERT INTO `auth_item_admin` VALUES ('SETTING_DELETE', '2', '删除系统设置', null, null, '1439451253', '1439451253');
INSERT INTO `auth_item_admin` VALUES ('SETTING_INDEX', '2', '系统设置浏览', null, null, '1439451279', '1439451279');
INSERT INTO `auth_item_admin` VALUES ('SETTING_UPDATE', '2', '系统设置编辑', null, null, '1439451239', '1439451239');

-- ----------------------------
-- Table structure for auth_item_child_admin
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child_admin`;
CREATE TABLE `auth_item_child_admin` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_admin_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item_admin` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_admin_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item_admin` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item_child_admin
-- ----------------------------
INSERT INTO `auth_item_child_admin` VALUES ('root', 'ADMIN-LOG_INDEX');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'ADMIN_CREATE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'ADMIN_DELETE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'ADMIN_INDEX');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'ADMIN_UPDATE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'ADMIN_VIEW');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'AJAX_UPLOAD');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'ASSIGNMENT_INDEX');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'LANG_CREATE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'LANG_DELETE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'LANG_INDEX');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'LANG_UPDATE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'LANG_VIEW');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'PAGE_CREATE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'PAGE_DELETE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'PAGE_INDEX');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'PAGE_UPDATE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'PAGE_VIEW');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'PAPER-CATEGORY_CREATE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'PAPER-CATEGORY_DELETE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'PAPER-CATEGORY_INDEX');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'PAPER-CATEGORY_UPDATE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'PAPER-CATEGORY_VIEW');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'PAPER_CREATE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'PAPER_DELETE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'PAPER_INDEX');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'PAPER_UPDATE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'PAPER_VIEW');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'PERMISSION_INDEX');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'ROLE_INDEX');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'SETTING_CREATE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'SETTING_DELETE');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'SETTING_INDEX');
INSERT INTO `auth_item_child_admin` VALUES ('root', 'SETTING_UPDATE');

-- ----------------------------
-- Table structure for auth_rule_admin
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule_admin`;
CREATE TABLE `auth_rule_admin` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_rule_admin
-- ----------------------------


-- ----------------------------
-- Table structure for eav_group
-- ----------------------------
DROP TABLE IF EXISTS `eav_group`;
CREATE TABLE `eav_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eav_group
-- ----------------------------
INSERT INTO `eav_group` VALUES ('-100', '无');
INSERT INTO `eav_group` VALUES ('1', 'test');

-- ----------------------------
-- Table structure for eav_group_meta_relation
-- ----------------------------
DROP TABLE IF EXISTS `eav_group_meta_relation`;
CREATE TABLE `eav_group_meta_relation` (
  `eav_group_id` int(11) NOT NULL,
  `eav_meta_id` int(11) NOT NULL,
  PRIMARY KEY (`eav_group_id`,`eav_meta_id`),
  KEY `eav_meta_id` (`eav_meta_id`),
  CONSTRAINT `eav_group_meta_relation_ibfk_1` FOREIGN KEY (`eav_group_id`) REFERENCES `eav_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eav_group_meta_relation_ibfk_2` FOREIGN KEY (`eav_meta_id`) REFERENCES `eav_meta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eav_group_meta_relation
-- ----------------------------
INSERT INTO `eav_group_meta_relation` VALUES ('1', '1');
INSERT INTO `eav_group_meta_relation` VALUES ('1', '2');
INSERT INTO `eav_group_meta_relation` VALUES ('1', '3');
INSERT INTO `eav_group_meta_relation` VALUES ('1', '4');
INSERT INTO `eav_group_meta_relation` VALUES ('1', '5');

-- ----------------------------
-- Table structure for eav_meta
-- ----------------------------
DROP TABLE IF EXISTS `eav_meta`;
CREATE TABLE `eav_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `control` enum('droplist','radio','textarea','input','image','editor') NOT NULL DEFAULT 'input',
  `is_require` tinyint(4) NOT NULL,
  `default` longtext NOT NULL,
  `data_type` enum('varchar','text','decimal','int') NOT NULL DEFAULT 'varchar',
  `check_format` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eav_meta
-- ----------------------------
INSERT INTO `eav_meta` VALUES ('1', 'test', 'input', '1', '', 'decimal', '');
INSERT INTO `eav_meta` VALUES ('2', 'test2', 'image', '1', '', 'varchar', '');
INSERT INTO `eav_meta` VALUES ('3', 'test3', 'editor', '1', 'asdasdxzc', 'text', '');
INSERT INTO `eav_meta` VALUES ('4', 'sdfsdfcxv', 'image', '1', '', 'varchar', '');
INSERT INTO `eav_meta` VALUES ('5', 'dropselect', 'droplist', '1', 'dfgcvbcvb', 'varchar', '');

-- ----------------------------
-- Table structure for eav_type
-- ----------------------------
DROP TABLE IF EXISTS `eav_type`;
CREATE TABLE `eav_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eav_type
-- ----------------------------
INSERT INTO `eav_type` VALUES ('-101', '无');
INSERT INTO `eav_type` VALUES ('-100', 'page');

-- ----------------------------
-- Table structure for eav_value_decimal
-- ----------------------------
DROP TABLE IF EXISTS `eav_value_decimal`;
CREATE TABLE `eav_value_decimal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) NOT NULL,
  `eav_type_id` int(11) NOT NULL,
  `eav_meta_id` int(11) NOT NULL,
  `value` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entity_id` (`entity_id`,`eav_type_id`,`eav_meta_id`),
  KEY `eav_type_id` (`eav_type_id`),
  KEY `eav_meta_id` (`eav_meta_id`),
  CONSTRAINT `eav_value_decimal_ibfk_1` FOREIGN KEY (`eav_meta_id`) REFERENCES `eav_meta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eav_value_int_copy_ibfk_1` FOREIGN KEY (`eav_type_id`) REFERENCES `eav_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eav_value_decimal
-- ----------------------------

-- ----------------------------
-- Table structure for eav_value_int
-- ----------------------------
DROP TABLE IF EXISTS `eav_value_int`;
CREATE TABLE `eav_value_int` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) NOT NULL,
  `eav_type_id` int(11) NOT NULL,
  `eav_meta_id` int(11) NOT NULL,
  `value` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entity_id` (`entity_id`,`eav_type_id`,`eav_meta_id`),
  KEY `eav_type_id` (`eav_type_id`),
  KEY `eav_meta_id` (`eav_meta_id`),
  CONSTRAINT `eav_value_int_ibfk_1` FOREIGN KEY (`eav_type_id`) REFERENCES `eav_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eav_value_int_ibfk_2` FOREIGN KEY (`eav_meta_id`) REFERENCES `eav_meta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eav_value_int
-- ----------------------------

-- ----------------------------
-- Table structure for eav_value_range
-- ----------------------------
DROP TABLE IF EXISTS `eav_value_range`;
CREATE TABLE `eav_value_range` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`value`),
  UNIQUE KEY `value` (`value`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eav_value_range
-- ----------------------------
INSERT INTO `eav_value_range` VALUES ('1', 'aaa', 'a1');
INSERT INTO `eav_value_range` VALUES ('2', 'bbb', 'a2');
INSERT INTO `eav_value_range` VALUES ('3', 'ccc', 'a3');

-- ----------------------------
-- Table structure for eav_value_range_relation
-- ----------------------------
DROP TABLE IF EXISTS `eav_value_range_relation`;
CREATE TABLE `eav_value_range_relation` (
  `eav_meta_id` int(11) NOT NULL,
  `eav_value_range_id` int(11) NOT NULL,
  PRIMARY KEY (`eav_meta_id`,`eav_value_range_id`),
  KEY `eav_value_range_id` (`eav_value_range_id`),
  CONSTRAINT `eav_value_range_relation_ibfk_3` FOREIGN KEY (`eav_meta_id`) REFERENCES `eav_meta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eav_value_range_relation_ibfk_4` FOREIGN KEY (`eav_value_range_id`) REFERENCES `eav_value_range` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eav_value_range_relation
-- ----------------------------
INSERT INTO `eav_value_range_relation` VALUES ('5', '1');
INSERT INTO `eav_value_range_relation` VALUES ('5', '2');
INSERT INTO `eav_value_range_relation` VALUES ('5', '3');

-- ----------------------------
-- Table structure for eav_value_text
-- ----------------------------
DROP TABLE IF EXISTS `eav_value_text`;
CREATE TABLE `eav_value_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) NOT NULL,
  `eav_type_id` int(11) NOT NULL,
  `eav_meta_id` int(11) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entity_id` (`entity_id`,`eav_type_id`,`eav_meta_id`),
  KEY `eav_type_id` (`eav_type_id`),
  KEY `eav_meta_id` (`eav_meta_id`),
  CONSTRAINT `eav_value_text_ibfk_1` FOREIGN KEY (`eav_type_id`) REFERENCES `eav_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eav_value_text_ibfk_2` FOREIGN KEY (`eav_meta_id`) REFERENCES `eav_meta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eav_value_text
-- ----------------------------
INSERT INTO `eav_value_text` VALUES ('1', '9', '-100', '3', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\ndsadsadasd\r\n</body>\r\n</html>');

-- ----------------------------
-- Table structure for eav_value_varchar
-- ----------------------------
DROP TABLE IF EXISTS `eav_value_varchar`;
CREATE TABLE `eav_value_varchar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) NOT NULL,
  `eav_type_id` int(11) NOT NULL,
  `eav_meta_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entity_id` (`entity_id`,`eav_type_id`,`eav_meta_id`),
  KEY `eav_type_id` (`eav_type_id`),
  KEY `eav_meta_id` (`eav_meta_id`),
  CONSTRAINT `eav_value_varchar_ibfk_1` FOREIGN KEY (`eav_type_id`) REFERENCES `eav_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eav_value_varchar_ibfk_2` FOREIGN KEY (`eav_meta_id`) REFERENCES `eav_meta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eav_value_varchar
-- ----------------------------
INSERT INTO `eav_value_varchar` VALUES ('2', '9', '-100', '1', 'asdasdasd');
INSERT INTO `eav_value_varchar` VALUES ('3', '9', '-100', '4', '/upload/1443878379813576722.jpg');
INSERT INTO `eav_value_varchar` VALUES ('4', '9', '-100', '5', 'a2');
INSERT INTO `eav_value_varchar` VALUES ('5', '9', '-100', '2', '/upload/1443878375557664744.jpg');
