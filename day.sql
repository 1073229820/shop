/*
Navicat MySQL Data Transfer

Source Server         : 本地连接
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : day

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2017-07-11 10:56:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'hash加密',
  `userpic` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户头像',
  `sex` tinyint(4) NOT NULL COMMENT '1男 2女',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(3) unsigned NOT NULL COMMENT '1：启用 2：禁用',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('1', 'admin', '$2y$10$W7lRu3TKuuxYewixgQVpRe9us3FA71SwapAp0byls3RmkS2xlDbZu', 'uploads/2017071109520059642f406971a.jpg', '1', '1073229820@qq.com', '1', '2017-07-11 00:50:50', '2017-07-11 09:52:00');
INSERT INTO `admins` VALUES ('2', 'lys', '$2y$10$hmu8CrBrUcfuoT0CBefA9.XmjHeIWYxvCo6NwY3RD5Wt8e/orzzMW', '', '1', 'aaaaa@qq.com', '1', '2017-07-11 00:52:17', '2017-07-11 00:52:17');
INSERT INTO `admins` VALUES ('3', 'admin2', '$2y$10$3XwxQpKLncmfgLsXObto3uHDG8kV3nQGtbzWLy.2BHn0cJ/iGyzhC', 'uploads/201707110415295963e061d74a4.jpg', '2', '222@qq.com', '1', '2017-07-11 04:15:30', '2017-07-11 04:15:30');

-- ----------------------------
-- Table structure for admin_login_infos
-- ----------------------------
DROP TABLE IF EXISTS `admin_login_infos`;
CREATE TABLE `admin_login_infos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `ipaddr` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT '登录ip',
  `logintime` datetime NOT NULL COMMENT '登录时间',
  `pass_wrong_time_status` tinyint(4) NOT NULL COMMENT '登录密码错误状态 0:正常 2:错误',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_login_infos
-- ----------------------------

-- ----------------------------
-- Table structure for attributes
-- ----------------------------
DROP TABLE IF EXISTS `attributes`;
CREATE TABLE `attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attr_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '属性名',
  `attr_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '属性可选值',
  `type_id` int(11) NOT NULL COMMENT '属性对应的第二级类决定',
  `attr_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '属性对应price表的attr1和attr2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of attributes
-- ----------------------------
INSERT INTO `attributes` VALUES ('4', '颜色', '黑色,白色,红色,金色', '4', 'attr1');
INSERT INTO `attributes` VALUES ('5', '内存', '32G,64G', '4', 'attr2');
INSERT INTO `attributes` VALUES ('6', '颜色', '黑色,白色,红色,金色', '6', 'attr1');
INSERT INTO `attributes` VALUES ('7', '尺寸', 'L,M,S,XL', '6', 'attr2');
INSERT INTO `attributes` VALUES ('8', '颜色', '黑色,白色,红色,金色', '5', 'attr1');
INSERT INTO `attributes` VALUES ('9', '尺寸', '大屏,小屏', '5', 'attr2');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '类别的名字',
  `pid` int(11) NOT NULL COMMENT '父类id',
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '类别路径',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('6', '上衣', '3', '0,3');
INSERT INTO `categories` VALUES ('3', '衣服', '0', '0');
INSERT INTO `categories` VALUES ('2', '数码', '0', '0');
INSERT INTO `categories` VALUES ('1', '食物', '0', '0');
INSERT INTO `categories` VALUES ('4', '手机', '2', '0,2');
INSERT INTO `categories` VALUES ('5', '电脑', '2', '0,2');
INSERT INTO `categories` VALUES ('90', '卫龙辣条', '74', '0,1,74');
INSERT INTO `categories` VALUES ('9', '小米', '4', '0,2,4');
INSERT INTO `categories` VALUES ('74', '零食', '1', '0,1');
INSERT INTO `categories` VALUES ('75', '水果', '1', '0,1');
INSERT INTO `categories` VALUES ('76', '长袖', '6', '0,3,6');
INSERT INTO `categories` VALUES ('89', '牛仔裤', '7', '0,3,7');
INSERT INTO `categories` VALUES ('85', 'T400', '5', '0,2,5');
INSERT INTO `categories` VALUES ('91', '苹果', '75', '0,1,75');
INSERT INTO `categories` VALUES ('92', '苹果电脑', '5', '0,2,5');

-- ----------------------------
-- Table structure for descrs
-- ----------------------------
DROP TABLE IF EXISTS `descrs`;
CREATE TABLE `descrs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descrs` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品的图文介绍',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of descrs
-- ----------------------------
INSERT INTO `descrs` VALUES ('5', '小米的一款手机小米的一款手机小米的一款手机小米的一款手机小米的一款手机小米的一款手机小米的一款手机小米的一款手机小米的一款手机小米的一款手机小米的一款手机小米的一款手机小米的一款手机小米的一款手机小米的一款手机小米的一款手机小米的一款手机');
INSERT INTO `descrs` VALUES ('6', '爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家');
INSERT INTO `descrs` VALUES ('7', '爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家');
INSERT INTO `descrs` VALUES ('8', '爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家');
INSERT INTO `descrs` VALUES ('9', '爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家');
INSERT INTO `descrs` VALUES ('10', '爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家');
INSERT INTO `descrs` VALUES ('11', '爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家');
INSERT INTO `descrs` VALUES ('12', '爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家爱奇艺值家');
INSERT INTO `descrs` VALUES ('13', '爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c');
INSERT INTO `descrs` VALUES ('14', '爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c');
INSERT INTO `descrs` VALUES ('15', '爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c');
INSERT INTO `descrs` VALUES ('16', '爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c');
INSERT INTO `descrs` VALUES ('17', '爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c');
INSERT INTO `descrs` VALUES ('18', '爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c');
INSERT INTO `descrs` VALUES ('19', '爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c');
INSERT INTO `descrs` VALUES ('20', '爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c');
INSERT INTO `descrs` VALUES ('21', '爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c');
INSERT INTO `descrs` VALUES ('22', '爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c爱奇艺值家c');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `production` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '生产厂家',
  `type_id` int(11) DEFAULT NULL COMMENT '种类id',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商品名',
  `descr` text COLLATE utf8_unicode_ci COMMENT '简单的描述',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态，1=>新添加，2=>在售,3=>下架',
  `store` int(11) DEFAULT NULL COMMENT '总存量',
  `num` int(11) DEFAULT '0' COMMENT '被购买的次数',
  `clicknum` int(11) DEFAULT '0' COMMENT '点击量',
  `hot` int(11) DEFAULT '0' COMMENT '热卖，0为否，1为热卖',
  `recommend` int(11) DEFAULT '0' COMMENT '0为不推荐，1为推荐',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('5', '小米之家', '9', '小米1', '小米的一款手机', '1', '22', '0', '0', '1', '0', '2017-07-11 06:24:25', '2017-07-11 06:24:25', 'uploads/k1.jpg');
INSERT INTO `goods` VALUES ('6', '爱奇艺值家', '85', 'T400', '爱奇艺值家爱奇艺值家爱奇艺值家', '1', '66', '0', '0', '0', '1', '2017-07-11 06:24:25', '2017-07-11 06:28:55', 'uploads/k2.jpg');
INSERT INTO `goods` VALUES ('7', '爱奇艺值家', '85', 'T400', '爱奇艺值家爱奇艺值家爱奇艺值家', '1', '66', '0', '0', '1', '0', '2017-07-11 06:24:25', '2017-07-11 06:28:56', 'uploads/k2.jpg');
INSERT INTO `goods` VALUES ('8', '爱奇艺值家', '85', 'T400', '爱奇艺值家爱奇艺值家爱奇艺值家', '1', '66', '0', '0', '0', '1', '2017-07-11 06:24:25', '2017-07-11 06:28:57', 'uploads/k2.jpg');
INSERT INTO `goods` VALUES ('9', '爱奇艺值家', '85', 'T400', '爱奇艺值家爱奇艺值家爱奇艺值家', '1', '66', '0', '0', '1', '0', '2017-07-11 06:24:25', '2017-07-11 06:28:58', 'uploads/k2.jpg');
INSERT INTO `goods` VALUES ('10', '爱奇艺值家', '85', 'T400', '爱奇艺值家爱奇艺值家爱奇艺值家', '1', '66', '0', '0', '0', '1', '2017-07-11 06:24:25', '2017-07-11 06:28:59', 'uploads/k2.jpg');
INSERT INTO `goods` VALUES ('11', '爱奇艺值家', '85', 'T400', '爱奇艺值家爱奇艺值家爱奇艺值家', '1', '66', '0', '0', '1', '0', '2017-07-11 06:24:25', '2017-07-11 06:29:00', 'uploads/k2.jpg');
INSERT INTO `goods` VALUES ('12', '爱奇艺值家', '85', 'T400', '爱奇艺值家爱奇艺值家爱奇艺值家', '1', '66', '0', '0', '0', '1', '2017-07-11 06:24:25', '2017-07-11 06:29:01', 'uploads/k2.jpg');
INSERT INTO `goods` VALUES ('13', '爱奇艺值家c', '76', '艾菲丽长袍', '爱奇艺值家c爱奇艺值家c', '1', '132', '0', '0', '1', '0', '2017-07-11 06:30:24', '2017-07-11 06:36:16', 'uploads/k3.jpg');
INSERT INTO `goods` VALUES ('14', '爱奇艺值家c', '76', '艾菲丽长袍', '爱奇艺值家c爱奇艺值家c', '1', '132', '0', '0', '0', '1', '2017-07-11 06:30:24', '2017-07-11 06:36:17', 'uploads/k3.jpg');
INSERT INTO `goods` VALUES ('15', '爱奇艺值家c', '76', '艾菲丽长袍', '爱奇艺值家c爱奇艺值家c', '1', '132', '0', '0', '0', '0', '2017-07-11 06:30:24', '2017-07-11 06:30:24', 'uploads/k3.jpg');
INSERT INTO `goods` VALUES ('16', '爱奇艺值家c', '76', '艾菲丽长袍', '爱奇艺值家c爱奇艺值家c', '1', '132', '0', '0', '0', '0', '2017-07-11 06:30:24', '2017-07-11 06:30:24', 'uploads/k3.jpg');
INSERT INTO `goods` VALUES ('17', '爱奇艺值家c', '76', '艾菲丽长袍', '爱奇艺值家c爱奇艺值家c', '1', '132', '0', '0', '0', '0', '2017-07-11 06:30:24', '2017-07-11 06:30:24', 'uploads/k3.jpg');
INSERT INTO `goods` VALUES ('18', '爱奇艺值家c', '76', '艾菲丽长袍', '爱奇艺值家c爱奇艺值家c', '1', '132', '0', '0', '0', '0', '2017-07-11 06:30:24', '2017-07-11 06:30:24', 'uploads/k3.jpg');
INSERT INTO `goods` VALUES ('19', '爱奇艺值家c', '76', '艾菲丽长袍', '爱奇艺值家c爱奇艺值家c', '1', '132', '0', '0', '0', '0', '2017-07-11 06:30:24', '2017-07-11 06:30:24', 'uploads/k3.jpg');
INSERT INTO `goods` VALUES ('20', '爱奇艺值家c', '76', '艾菲丽长袍', '爱奇艺值家c爱奇艺值家c', '1', '132', '0', '0', '0', '0', '2017-07-11 06:30:24', '2017-07-11 06:30:24', 'uploads/k3.jpg');
INSERT INTO `goods` VALUES ('21', null, null, null, null, null, null, '0', '0', '0', '0', null, null, 'uploads/k3.jpg');
INSERT INTO `goods` VALUES ('22', null, null, null, null, null, null, '0', '0', '0', '0', null, null, 'uploads/k3.jpg');

-- ----------------------------
-- Table structure for goods_orders
-- ----------------------------
DROP TABLE IF EXISTS `goods_orders`;
CREATE TABLE `goods_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of goods_orders
-- ----------------------------
INSERT INTO `goods_orders` VALUES ('1', '1', '2');
INSERT INTO `goods_orders` VALUES ('2', '1', '3');

-- ----------------------------
-- Table structure for links
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort_num` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of links
-- ----------------------------
INSERT INTO `links` VALUES ('1', '百度', 'http://www.baidu.com', '1', '0');
INSERT INTO `links` VALUES ('2', '百度1', 'http://www.baidu.com', '2', '0');
INSERT INTO `links` VALUES ('3', 'baidu1', 'http://www.baidu.com', '1', '1');
INSERT INTO `links` VALUES ('4', 'baidu1', 'http://www.baidu.com', '1', '1');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2017_06_21_065649_create_goods_table', '1');
INSERT INTO `migrations` VALUES ('2017_06_21_112906_entrust_setup_tables', '1');
INSERT INTO `migrations` VALUES ('2017_06_21_122426_create_admins_table', '1');
INSERT INTO `migrations` VALUES ('2017_06_22_060121_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2017_06_26_222204_create_userinfos_table', '1');
INSERT INTO `migrations` VALUES ('2017_06_29_202457_create_links_table', '1');
INSERT INTO `migrations` VALUES ('2017_06_30_152154_create_prices_table', '1');
INSERT INTO `migrations` VALUES ('2017_07_03_092015_create_admin_login_infos_table', '1');
INSERT INTO `migrations` VALUES ('2017_07_03_093152_create_descrs_table', '1');
INSERT INTO `migrations` VALUES ('2017_07_04_150153_create_attributes_table', '1');
INSERT INTO `migrations` VALUES ('2017_07_04_150258_create_categories_table', '1');
INSERT INTO `migrations` VALUES ('2017_07_08_003921_create_orders_table', '1');
INSERT INTO `migrations` VALUES ('2017_07_08_004041_create_goods_orders_table', '1');
INSERT INTO `migrations` VALUES ('2017_07_08_004125_create_orders_detail_table', '1');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cnee_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cnee_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cnee_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cnee_province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cnee_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cnee_area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ordertime` int(11) NOT NULL,
  `paytime` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '4', '12', '11111111111', '23', '', '', '', '34', '414997172652781', '1499717265', '0', '110', '0');

-- ----------------------------
-- Table structure for orders_detail
-- ----------------------------
DROP TABLE IF EXISTS `orders_detail`;
CREATE TABLE `orders_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `buynum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders_detail
-- ----------------------------
INSERT INTO `orders_detail` VALUES ('1', '1', '2', '22', '3');
INSERT INTO `orders_detail` VALUES ('2', '1', '3', '22', '2');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'admin_create', '创建管理员', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('2', 'admin_edit', '编辑管理员', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('3', 'admin_delete', '删除管理员', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('4', 'user_create', '创建用户', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('5', 'user_edit', '编辑用户', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('6', 'user_delete', '删除用户', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('7', 'role_create', '创建角色', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('8', 'role_edit', '编辑角色', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('9', 'role_delete', '删除角色', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('10', 'perms_create', '创建权限', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('11', 'perms_edit', '编辑权限', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('12', 'perms_delete', '删除权限', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('13', 'category_create', '创建商品分类', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('14', 'category_edit', '编辑商品分类', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('15', 'category_delete', '删除商品分类', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('16', 'goods_create', '创建商品', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('17', 'goods_edit', '编辑商品', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('18', 'goods_delete', '删除商品', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('19', 'orders_create', '创建订单', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('20', 'orders_edit', '编辑订单', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('21', 'orders_delete', '删除订单', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('22', 'link_create', '创建友链', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('23', 'link_edit', '编辑友链', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('24', 'link_delete', '删除友链', null, '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `permissions` VALUES ('25', 'dsfasdf', 'asdf', '', '2017-07-11 00:53:44', '2017-07-11 00:53:44');

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('10', '2');
INSERT INTO `permission_role` VALUES ('11', '2');
INSERT INTO `permission_role` VALUES ('22', '3');
INSERT INTO `permission_role` VALUES ('23', '3');

-- ----------------------------
-- Table structure for prices
-- ----------------------------
DROP TABLE IF EXISTS `prices`;
CREATE TABLE `prices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attr1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '影响价格的属性1',
  `attr2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '影响价格的属性2',
  `price` double(6,2) DEFAULT NULL COMMENT '商品价格',
  `store` int(11) DEFAULT NULL COMMENT '库存',
  `goods_id` int(11) DEFAULT NULL COMMENT '商品的id',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商品图片',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of prices
-- ----------------------------
INSERT INTO `prices` VALUES ('25', '黑色', '32G', '100.00', '22', '5', 'uploads/k1.jpg');
INSERT INTO `prices` VALUES ('26', '金色', '大屏', '45.00', '66', '6', 'uploads/k2.jpg');
INSERT INTO `prices` VALUES ('27', '金色', '大屏', '45.00', '66', '7', 'uploads/k2.jpg');
INSERT INTO `prices` VALUES ('28', '金色', '大屏', '45.00', '66', '8', 'uploads/k2.jpg');
INSERT INTO `prices` VALUES ('29', '金色', '大屏', '45.00', '66', '9', 'uploads/k2.jpg');
INSERT INTO `prices` VALUES ('30', '金色', '大屏', '45.00', '66', '10', 'uploads/k2.jpg');
INSERT INTO `prices` VALUES ('31', '金色', '大屏', '45.00', '66', '11', 'uploads/k2.jpg');
INSERT INTO `prices` VALUES ('32', '金色', '大屏', '45.00', '66', '12', 'uploads/k2.jpg');
INSERT INTO `prices` VALUES ('33', '红色', 'XL', '555.00', '132', '13', 'uploads/k3.jpg');
INSERT INTO `prices` VALUES ('34', '红色', 'XL', '555.00', '132', '14', 'uploads/k3.jpg');
INSERT INTO `prices` VALUES ('35', '红色', 'XL', '555.00', '132', '15', 'uploads/k3.jpg');
INSERT INTO `prices` VALUES ('36', '红色', 'XL', '555.00', '132', '16', 'uploads/k3.jpg');
INSERT INTO `prices` VALUES ('37', '红色', 'XL', '555.00', '132', '17', 'uploads/k3.jpg');
INSERT INTO `prices` VALUES ('38', '红色', 'XL', '555.00', '132', '18', 'uploads/k3.jpg');
INSERT INTO `prices` VALUES ('39', '红色', 'XL', '555.00', '132', '19', 'uploads/k3.jpg');
INSERT INTO `prices` VALUES ('40', '红色', 'XL', '555.00', '132', '20', 'uploads/k3.jpg');
INSERT INTO `prices` VALUES ('41', '红色', 'XL', '555.00', '132', '21', 'uploads/k3.jpg');
INSERT INTO `prices` VALUES ('42', '红色', 'XL', '555.00', '132', '22', 'uploads/k3.jpg');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', '超级管理员', 'super admin role', '2017-07-11 00:50:50', '2017-07-11 00:50:50');
INSERT INTO `roles` VALUES ('2', 'll', 'adfa', 'asd', '2017-07-11 00:52:41', '2017-07-11 00:52:41');
INSERT INTO `roles` VALUES ('3', 'test', '11', '123', '2017-07-11 04:16:34', '2017-07-11 04:16:34');

-- ----------------------------
-- Table structure for role_admin
-- ----------------------------
DROP TABLE IF EXISTS `role_admin`;
CREATE TABLE `role_admin` (
  `admin_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`admin_id`,`role_id`),
  KEY `role_admin_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role_admin
-- ----------------------------
INSERT INTO `role_admin` VALUES ('1', '1');
INSERT INTO `role_admin` VALUES ('2', '2');
INSERT INTO `role_admin` VALUES ('3', '3');

-- ----------------------------
-- Table structure for userinfos
-- ----------------------------
DROP TABLE IF EXISTS `userinfos`;
CREATE TABLE `userinfos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ipaddr` int(11) NOT NULL,
  `logintime` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `pass_wrong_time_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of userinfos
-- ----------------------------
INSERT INTO `userinfos` VALUES ('1', '1270', '1499706003', '1', '0');
INSERT INTO `userinfos` VALUES ('2', '1270', '1499706123', '1', '1');
INSERT INTO `userinfos` VALUES ('3', '1270', '1499706409', '2', '1');
INSERT INTO `userinfos` VALUES ('4', '1270', '1499706427', '2', '0');
INSERT INTO `userinfos` VALUES ('5', '1270', '1499706941', '2', '0');
INSERT INTO `userinfos` VALUES ('6', '1270', '1499708793', '2', '0');
INSERT INTO `userinfos` VALUES ('7', '1270', '1499711778', '2', '1');
INSERT INTO `userinfos` VALUES ('10', '1270', '1499712179', '2', '0');
INSERT INTO `userinfos` VALUES ('11', '1270', '1499712674', '3', '0');
INSERT INTO `userinfos` VALUES ('12', '1270', '1499712865', '4', '0');
INSERT INTO `userinfos` VALUES ('13', '1270', '1499717232', '4', '0');
INSERT INTO `userinfos` VALUES ('14', '1270', '1499719799', '5', '0');
INSERT INTO `userinfos` VALUES ('15', '1270', '1499719973', '5', '1');
INSERT INTO `userinfos` VALUES ('16', '1270', '1499719987', '5', '1');
INSERT INTO `userinfos` VALUES ('17', '1270', '1499720032', '5', '1');
INSERT INTO `userinfos` VALUES ('18', '1270', '1499720095', '6', '0');
INSERT INTO `userinfos` VALUES ('19', '1270', '1499720145', '6', '0');
INSERT INTO `userinfos` VALUES ('20', '1270', '1499720196', '6', '1');
INSERT INTO `userinfos` VALUES ('21', '1270', '1499720370', '2', '1');
INSERT INTO `userinfos` VALUES ('22', '1270', '1499720760', '7', '0');
INSERT INTO `userinfos` VALUES ('23', '1270', '1499720860', '7', '0');
INSERT INTO `userinfos` VALUES ('24', '1270', '1499720888', '7', '1');
INSERT INTO `userinfos` VALUES ('25', '1270', '1499721206', '8', '0');
INSERT INTO `userinfos` VALUES ('26', '1270', '1499721239', '8', '0');
INSERT INTO `userinfos` VALUES ('27', '1270', '1499721269', '8', '1');
INSERT INTO `userinfos` VALUES ('28', '1270', '1499721813', '9', '0');
INSERT INTO `userinfos` VALUES ('29', '1270', '1499722047', '9', '1');
INSERT INTO `userinfos` VALUES ('30', '1270', '1499722065', '9', '0');
INSERT INTO `userinfos` VALUES ('31', '1270', '1499722090', '9', '0');
INSERT INTO `userinfos` VALUES ('32', '1270', '1499722129', '9', '1');
INSERT INTO `userinfos` VALUES ('33', '1270', '1499722140', '9', '1');
INSERT INTO `userinfos` VALUES ('36', '1270', '1499722260', '9', '1');
INSERT INTO `userinfos` VALUES ('37', '1270', '1499722303', '10', '0');
INSERT INTO `userinfos` VALUES ('38', '1270', '1499722322', '10', '1');
INSERT INTO `userinfos` VALUES ('39', '1270', '1499722335', '10', '1');
INSERT INTO `userinfos` VALUES ('41', '1270', '1499722393', '10', '0');
INSERT INTO `userinfos` VALUES ('42', '1270', '1499722422', '10', '0');
INSERT INTO `userinfos` VALUES ('43', '1270', '1499722586', '10', '0');
INSERT INTO `userinfos` VALUES ('44', '1270', '1499724255', '9', '0');
INSERT INTO `userinfos` VALUES ('45', '1270', '1499724333', '9', '0');
INSERT INTO `userinfos` VALUES ('46', '1270', '1499726439', '11', '0');
INSERT INTO `userinfos` VALUES ('47', '1270', '1499726464', '11', '0');
INSERT INTO `userinfos` VALUES ('48', '1270', '1499726502', '11', '0');
INSERT INTO `userinfos` VALUES ('49', '1270', '1499726520', '11', '1');
INSERT INTO `userinfos` VALUES ('50', '1270', '1499726530', '11', '1');
INSERT INTO `userinfos` VALUES ('51', '1270', '1499726540', '11', '1');
INSERT INTO `userinfos` VALUES ('52', '1270', '1499727312', '12', '0');
INSERT INTO `userinfos` VALUES ('53', '1270', '1499727409', '12', '0');
INSERT INTO `userinfos` VALUES ('54', '1270', '1499732843', '4', '0');
INSERT INTO `userinfos` VALUES ('55', '1270', '1499735102', '14', '0');
INSERT INTO `userinfos` VALUES ('56', '1270', '1499735128', '14', '0');
INSERT INTO `userinfos` VALUES ('57', '1270', '1499735150', '14', '0');
INSERT INTO `userinfos` VALUES ('58', '1270', '1499738047', '4', '0');
INSERT INTO `userinfos` VALUES ('59', '1270', '1499738115', '15', '0');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `pass` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `userpic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(4) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addtime` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'name', '奥好烦', '654321', '', '13812345678', '1', 'aaf@qq.com', '66e185d00396b2daa87dcce0abacfe8d', '1499705975', '1');
INSERT INTO `users` VALUES ('2', 'eeee', '安抚', '$2y$10$GxEtcs6xQG7hS5ADbDO68ODygo8.UHQ4AYqDzy2E8af8ivYt1E4/a', '', '13812345678', '1', 'hhh@qq.com', '66e185d00396b2daa87dcce0abacfe8d', '1499706394', '1');
INSERT INTO `users` VALUES ('3', 'namename', '金涛', '$2y$10$38ndWML83ZImSp1CrzfTbu5rv.GfTiqhthZkKRwSH/1cJBEGhFQLO', '', '13812345678', '1', '1@qq.com', '66e185d00396b2daa87dcce0abacfe8d', '1499712661', '1');
INSERT INTO `users` VALUES ('4', 'zs', '朱帅', '$2y$10$OeNZudcFzxsoZe0jNNak6etp7kqb04jWkCknWS3.MTUt6s2beqUtK', '', '13434533333', '1', '222@qq.com', '66e185d00396b2daa87dcce0abacfe8d', '1499712854', '1');
INSERT INTO `users` VALUES ('14', 'jay', '结论', '$2y$10$tDK2h.wmgdf30Z6bV/ZvLumeXOn6JkhP/kb3eegcdPyqZx/9F11hG', '', '13812345678', '1', '1111@qq.com', '', '1499735089', '0');
INSERT INTO `users` VALUES ('8', 'namename', '激恼激恼', '$2y$10$0NbNOEDf7IIH77WSlJNu.eczTxu.4NKKEHMLxP1kfWAmwlQsCxgKq', '', '13812345678', '1', '12@qq.com', '66e185d00396b2daa87dcce0abacfe8d', '1499721182', '1');
INSERT INTO `users` VALUES ('9', 'namename', '锦涛', '$2y$10$oLoebO9rWhiAZST97H8gG.P1U2BWq5Pb6AgnQ.96O0k0XfBdnD5qC', '', '13812345678', '1', 'jadynhoo@qq.com', '66e185d00396b2daa87dcce0abacfe8d', '1499721800', '1');
INSERT INTO `users` VALUES ('10', 'otkotk', '锦涛', '$2y$10$lZLh1E1nBYBwixXMAuVvHOp1UpsyJnGT20La2jzs4jbYdMswb2sMu', '', '13812345678', '1', 'jay@qq.com', '66e185d00396b2daa87dcce0abacfe8d', '1499722288', '1');
INSERT INTO `users` VALUES ('13', 'namename', '锦涛', '$2y$10$ixmvcFTvzqfh0aplKS8o6uotkomGu8PmEYhr4.zG0ayMH2kdypJFm', '', '13812345678', '1', '78@qq.com', '', '1499735029', '1');
INSERT INTO `users` VALUES ('11', 'namename', '结论', '$2y$10$arIUDkYN3tTLzKLbazqSpuwO2hRwlzQX4cEgENQ5anWPmRwygCc4e', '', '13812345678', '1', '1314520@qq.con', '66e185d00396b2daa87dcce0abacfe8d', '1499726427', '1');
INSERT INTO `users` VALUES ('15', 'zs', '朱帅', '$2y$10$4qt6T6uDDW5SMWVh/Lxu6uYDbLluDGuPnqEJc16K1lR09gVHS75IO', '', '13812345678', '1', 'zhusuai@163.com', '', '1499738103', '1');
