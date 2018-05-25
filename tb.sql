/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : tb

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-12-24 23:21:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_ad
-- ----------------------------
DROP TABLE IF EXISTS `tp_ad`;
CREATE TABLE `tp_ad` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL DEFAULT '' COMMENT '广告名称',
  `name_en` char(50) NOT NULL DEFAULT '' COMMENT '英广告名称',
  `url` varchar(500) NOT NULL DEFAULT '' COMMENT '广告链接',
  `info` varchar(500) NOT NULL DEFAULT '' COMMENT '广告说明',
  `info_en` varchar(500) NOT NULL DEFAULT '' COMMENT '英广告说明',
  `pic` varchar(200) NOT NULL DEFAULT '' COMMENT '广告图片',
  `pic_en` varchar(200) NOT NULL DEFAULT '' COMMENT '英广告图片',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `verifystate` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1 审核中，2审核通过 ，3不通过',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `position_psid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '广告位置id',
  `user_uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户表关联',
  PRIMARY KEY (`aid`),
  KEY `fk_rb_ad_hd_position1_idx` (`position_psid`),
  KEY `fk_rb_ad_rb_user1_idx` (`user_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='广告表';

-- ----------------------------
-- Records of tp_ad
-- ----------------------------
INSERT INTO `tp_ad` VALUES ('1', '01', '', '              222222222222222222                                          ', '              333333333333333333                                          ', '', 'Uploads/Ad/2017-12-12/5a2fa8f39258e.jpg', '', '1513073346', '1', '103', '1', '4');
INSERT INTO `tp_ad` VALUES ('2', '01', '', '', '', '', './Data/Uploads/image/2016/12/22/585bbc647a1f4.jpg', '', '1482407014', '2', '100', '2', '4');
INSERT INTO `tp_ad` VALUES ('3', '02', '', '', '', '', './Data/Uploads/image/2016/12/22/585bbc70b8670.jpg', '', '1482407026', '2', '100', '2', '4');
INSERT INTO `tp_ad` VALUES ('4', '03', '', '', '', '', './Data/Uploads/image/2016/12/22/585bbc7c1bdb6.jpg', '', '1482407037', '2', '100', '2', '4');
INSERT INTO `tp_ad` VALUES ('5', '01', '', 'https://szhanqun.1688.com/?spm=a2615.2177701.0.0.OiIA3D', '', '', './Data/Uploads/image/2016/12/22/585bbdf22a876.jpg', '', '1482407429', '2', '100', '3', '4');
INSERT INTO `tp_ad` VALUES ('6', '02', '', '', '', '', './Data/Uploads/image/2016/12/22/585bbe0ec8443.jpg', '', '1482407441', '2', '100', '3', '4');
INSERT INTO `tp_ad` VALUES ('7', 'agilsense', '', '#', '', '', '', '', '1482430425', '2', '100', '4', '4');
INSERT INTO `tp_ad` VALUES ('8', 'excelitas', '', '#', '', '', '', '', '1482430444', '2', '100', '4', '4');
INSERT INTO `tp_ad` VALUES ('9', 'china-ans', '', '#', '', '', '', '', '1482430451', '2', '100', '4', '1');
INSERT INTO `tp_ad` VALUES ('10', 'about', '', '', '', '', './Data/Uploads/image/2016/12/23/585c1b1519ff4.jpg', '', '1482430866', '2', '100', '5', '1');
INSERT INTO `tp_ad` VALUES ('11', 'news', '', '', '', '', './Data/Uploads/image/2016/12/23/585c1ae54ab4e.jpg', '', '1482431007', '2', '100', '5', '1');
INSERT INTO `tp_ad` VALUES ('12', 'contact', '', '', '', '', './Data/Uploads/image/2016/12/23/585c1b05a517c.jpg', '', '1482431059', '2', '100', '5', '1');
INSERT INTO `tp_ad` VALUES ('13', '01', '', '', '', '', './Data/Uploads/image/2016/12/23/585cd6a4c4513.jpg', '', '1482479271', '2', '100', '6', '1');
INSERT INTO `tp_ad` VALUES ('14', '02', '', '', '', '', './Data/Uploads/image/2016/12/23/585cd6b2c3247.jpg', '', '1482479285', '2', '100', '6', '1');
INSERT INTO `tp_ad` VALUES ('15', '03', '', '', '', '', './Data/Uploads/image/2016/12/23/585cd6c1eeab4.jpg', '', '1482479299', '2', '100', '6', '1');
INSERT INTO `tp_ad` VALUES ('16', 'Twitter', '', '#', '', '', './Data/Uploads/image/2016/12/23/585ce70947b5a.png', '', '1482483488', '2', '100', '7', '1');
INSERT INTO `tp_ad` VALUES ('17', 'weibo', '', '#', '', '', './Data/Uploads/image/2016/12/23/585ce73562b4c.png', '', '1482483512', '2', '100', '7', '1');
INSERT INTO `tp_ad` VALUES ('18', 'facebook', '', '#', '', '', './Data/Uploads/image/2016/12/23/585ce75379a26.png', '', '1482483603', '2', '100', '7', '1');
INSERT INTO `tp_ad` VALUES ('20', 'eeeeeeeeeeeeeeee', '', '              asda', '              gggggggggg', '', 'Uploads/Ad/2017-12-12/5a2fafb06da05.jpg', '', '1513074608', '1', '105', '2', '4');

-- ----------------------------
-- Table structure for tp_adress
-- ----------------------------
DROP TABLE IF EXISTS `tp_adress`;
CREATE TABLE `tp_adress` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Adress` char(80) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_Adress_user1` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_adress
-- ----------------------------

-- ----------------------------
-- Table structure for tp_article
-- ----------------------------
DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE `tp_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(160) NOT NULL DEFAULT '',
  `add_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `thumb` char(255) NOT NULL DEFAULT '',
  `image` char(255) NOT NULL DEFAULT '',
  `cid` int(10) unsigned NOT NULL,
  `keywords` char(255) NOT NULL DEFAULT '',
  `description` varchar(500) NOT NULL DEFAULT '',
  `edit_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `file` varchar(255) NOT NULL DEFAULT '' COMMENT '文件下载',
  `click` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `sort` int(10) unsigned NOT NULL DEFAULT '100',
  `is_top` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '0,不置顶，1，置顶',
  `flag` set('图文','头条','推荐') DEFAULT NULL COMMENT '属性',
  `verifystate` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0审核中  1 审核通过  2审核失败',
  `resource` char(20) NOT NULL DEFAULT '',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_product_category1` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_article
-- ----------------------------
INSERT INTO `tp_article` VALUES ('22', '大波妹', '1511908734', 'Uploads/News/2017-12-01/thumb_5a206f6a80b0b.jpg', 'Uploads/News/2017-12-01/5a206f6a80b0b.jpg', '13', '              333', '近日，国内知名装饰品牌玛致建材发布全新品牌战略，定义新品牌精神“东方西式美”，同时，亮相2016春夏广告大片。多种好看的装饰方案上阵引起了社会各界的广泛关注...                          ', '1512075114', '', '152', '0', '0', null, '1', 'sky', '0');
INSERT INTO `tp_article` VALUES ('3', '锤子222', '1511908734', 'Uploads/News/2017-12-01/thumb_5a206fe773d94.jpg', 'Uploads/News/2017-12-01/5a206fe773d94.jpg', '13', ' 去', ' 近日，国内知名装饰品牌玛致建材发布全新品牌战略，定义新品牌精神“东方西式美”，同时，亮相2016春夏广告大片。多种好看的装饰方案上阵引起了社会各界的广泛关注...                                                                                                                                                                                                      ', '1512076591', '', '0', '103', '0', '图文', '1', 'sky', '0');
INSERT INTO `tp_article` VALUES ('4', '华为mate8', '1511908734', '', 'Uploads/images/20140812/thumb_1407847243.jpg', '21', '              333', '                                                                      ', '1513161483', '', '0', '0', '0', null, '1', 'sky', '4');
INSERT INTO `tp_article` VALUES ('5', '要求', '1511908734', '', 'Uploads/Join/2017-12-05/5a25924f849f1.jpg', '18', '              333', '                                                        ', '1512411758', '', '0', '0', '0', null, '1', 'sky', '0');
INSERT INTO `tp_article` VALUES ('6', '艾玛', '1511908734', 'Uploads/News/2017-12-01/thumb_5a20728c4eed5.jpg', 'Uploads/News/2017-12-01/5a20728c4eed5.jpg', '15', '              333', '近日，国内知名装饰品牌玛致建材发布全新品牌战略，定义新品牌精神“东方西式美”，同时，亮相2016春夏广告大片。多种好看的装饰方案上阵引起了社会各界的广泛关注...                                                                                                                                         ', '1512313568', '', '111', '123', '0', '推荐', '1', 'sky', '0');
INSERT INTO `tp_article` VALUES ('20', '活动美女', '1511908734', '', 'Uploads/About/2017-12-05/5a2580209a138.jpg', '10', '              333', '                                                                      ', '1512407151', '', '0', '0', '0', null, '1', 'sky', '0');
INSERT INTO `tp_article` VALUES ('9', 'kkkkkkkkkkkk', '1511908734', '', 'Uploads/images/20140812/thumb_1407847408.jpg', '14', '              333', '                            ', '1511915379', '', '0', '0', '0', null, '0', 'admin', '0');
INSERT INTO `tp_article` VALUES ('10', 'ggg', '1511908734', '', 'Uploads/Video/2017-12-05/5a2597823a5ca.jpg', '11', '              333', '  近日，国内知名装饰品牌玛致建材发布全新品牌战略，定义新品牌精神“东方西式美”，同时，亮相2016春夏广告大片。多种好看的装饰方案上阵引起了社会各界的广泛关注...                                                 ', '1512413058', '', '0', '0', '0', null, '1', 'sky', '0');
INSERT INTO `tp_article` VALUES ('11', 'kkkkkkkkkkkk', '1511908734', '', 'Uploads/images/20140813/thumb_1407899398.jpg', '14', '              333', '                            ', '1511915379', '', '0', '0', '0', null, '0', 'admin', '0');
INSERT INTO `tp_article` VALUES ('12', '文化', '1511908734', '', 'Uploads/About/2017-12-05/5a2580a2d5032.jpg', '8', '              333', '                                                        ', '1512407216', '', '0', '0', '0', null, '1', 'sky', '0');
INSERT INTO `tp_article` VALUES ('21', '历程', '1511908734', '', 'Uploads/About/2017-12-05/5a2580d056990.jpg', '9', '              333', '                                          ', '1512407248', '', '0', '0', '0', null, '1', 'sky', '0');
INSERT INTO `tp_article` VALUES ('18', '多种好看的装饰方案CDR格式下载', '1511908734', '', 'Uploads/Video/2017-12-05/5a2595fec53f8.jpg', '11', '              333', ' 近日，国内知名装饰品牌玛致建材发布全新品牌战略，定义新品牌精神“东方西式美”，同时，亮相2016春夏广告大片。多种好看的装饰方案上阵引起了社会各界的广泛关注...', '1512412670', '', '0', '0', '0', null, '1', 'sky', '0');
INSERT INTO `tp_article` VALUES ('57', 'kkkkkkkkkkkk', '1511908734', 'Uploads/News/2017-11-30/thumb_5a1fe04a09a0f.jpg', 'Uploads/News/2017-11-30/5a1fe04a09a0f.jpg', '11', '              333', '                                          ', '1512038474', '', '0', '0', '0', '头条', '0', 'sky', '0');
INSERT INTO `tp_article` VALUES ('59', 'kkkkkkkkkkkk', '1511908734', '', 'uploads/images/20140901/thumb_5403ef2b4afe2.jpg', '14', '              333', '                            ', '1511915379', '', '0', '0', '0', null, '0', 'admin', '0');
INSERT INTO `tp_article` VALUES ('54', 'kkkkkkkkkkkk', '1511908734', '', 'Uploads/images/20140829/thumb_1409306942.jpg', '14', '              333', '                            ', '1511915379', '', '0', '0', '0', null, '0', 'admin', '0');
INSERT INTO `tp_article` VALUES ('53', '品牌概括', '1511908734', '', 'Uploads/About/2017-12-04/5a2564ba9c94c.jpg', '7', '              333', '                                                                                    ', '1512400058', '', '0', '0', '0', null, '1', 'sky', '0');
INSERT INTO `tp_article` VALUES ('52', 'kkkkkkkkkkkk', '1511908734', '', 'Uploads/images/20140829/thumb_1409297601.jpg', '14', '              333', '                            ', '1511915379', '', '0', '0', '0', null, '0', 'admin', '0');
INSERT INTO `tp_article` VALUES ('70', '爱的速递', '1512062050', 'Uploads/News/2017-12-01/thumb_5a203c628485e.jpg', 'Uploads/News/2017-12-01/5a203c628485e.jpg', '11', '', '   近日，国内知名装饰品牌玛致建材发布全新品牌战略，定义新品牌精神“东方西式美”，同时，亮相2016春夏广告大片。多种好看的装饰方案上阵引起了社会各界的广泛关注...                         ', '1512413020', '', '0', '0', '0', '头条', '1', 'sky', '0');
INSERT INTO `tp_article` VALUES ('62', '斯蒂芬', '1511908734', 'Uploads/News/2017-12-01/thumb_5a2072cd42192.jpg', 'Uploads/News/2017-12-01/5a2072cd42192.jpg', '14', '              333', '近日，国内知名装饰品牌玛致建材发布全新品牌战略，定义新品牌精神“东方西式美”，同时，亮相2016春夏广告大片。多种好看的装饰方案上阵引起了社会各界的广泛关注...                                      ', '1512075981', '', '0', '0', '0', null, '1', 'sky', '0');
INSERT INTO `tp_article` VALUES ('69', '啦啦啦', '1511917370', 'Uploads/News/2017-12-01/thumb_5a2072b8f1313.jpg', 'Uploads/News/2017-12-01/5a2072b8f1313.jpg', '15', '              11111111111', '近日，国内知名装饰品牌玛致建材发布全新品牌战略，定义新品牌精神“东方西式美”，同时，亮相2016春夏广告大片。多种好看的装饰方案上阵引起了社会各界的广泛关注...                                                                                          ', '1512075960', '', '0', '101', '0', '头条', '1', 'sky', '0');
INSERT INTO `tp_article` VALUES ('71', '速度5', '1512066115', '', 'Uploads/Video/2017-12-05/5a2596151008b.jpg', '12', '', '近日，国内知名装饰品牌玛致建材发布全新品牌战略，定义新品牌精神“东方西式美”，同时，亮相2016春夏广告大片。多种好看的装饰方案上阵引起了社会各界的广泛关注...', '1512412693', '', '0', '0', '0', '头条', '1', 'sky', '0');
INSERT INTO `tp_article` VALUES ('72', '你特么', '1512069445', '', '', '17', '              555', '              6666', '1512069445', '', '333', '101', '0', null, '0', 'sky', '0');
INSERT INTO `tp_article` VALUES ('73', '野人王', '1512401002', '', 'Uploads/News/2017-12-04/5a25686a2f1a5.jpg', '13', '              333', '              ', '1512401002', '', '0', '0', '0', null, '1', 'sky', '0');
INSERT INTO `tp_article` VALUES ('74', '水电费', '1512401682', '', 'Uploads/News/2017-12-04/5a256b12058b5.jpg', '14', '', '              ', '1512401682', '', '0', '0', '0', null, '1', 'sky', '0');
INSERT INTO `tp_article` VALUES ('77', '这种阿萨德', '1512358896', '', '', '14', '', '                            ', '1512402254', '', '0', '0', '0', null, '0', 'sky', '0');
INSERT INTO `tp_article` VALUES ('78', '联系我们', '1512417802', '', 'Uploads/Contact/2017-12-05/5a25aa0b2476a.png', '16', '', '              ', '1512417802', '', '0', '0', '0', null, '1', 'sky', '0');

-- ----------------------------
-- Table structure for tp_article2
-- ----------------------------
DROP TABLE IF EXISTS `tp_article2`;
CREATE TABLE `tp_article2` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_title` char(100) NOT NULL DEFAULT '',
  `sort` char(10) NOT NULL DEFAULT '',
  `click` char(10) NOT NULL DEFAULT '0',
  `flag` set('图文','头条','推荐') DEFAULT NULL,
  `is_top` tinyint(1) NOT NULL,
  `keywords` varchar(500) NOT NULL DEFAULT '',
  `description` varchar(500) NOT NULL DEFAULT '',
  `file` varchar(200) NOT NULL DEFAULT '',
  `pic` varchar(200) NOT NULL DEFAULT '',
  `addtime` int(11) NOT NULL,
  `edittime` int(11) NOT NULL,
  `resource` char(11) NOT NULL DEFAULT '',
  `verifystate` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1审核中  2 审核通过  3审核失败',
  `cid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '栏目表关联',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户表关联',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_article2
-- ----------------------------

-- ----------------------------
-- Table structure for tp_article_description
-- ----------------------------
DROP TABLE IF EXISTS `tp_article_description`;
CREATE TABLE `tp_article_description` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` text COMMENT '内容详情',
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`product_id`),
  UNIQUE KEY `idproduct descrition_UNIQUE` (`id`) USING BTREE,
  KEY `fk_product descrition_product1` (`product_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_article_description
-- ----------------------------
INSERT INTO `tp_article_description` VALUES ('1', '斯蒂芬是士大夫撒', '22');
INSERT INTO `tp_article_description` VALUES ('2', '斯蒂芬是士大夫撒', '16');
INSERT INTO `tp_article_description` VALUES ('3', '“天霸精緻建材”源自於台灣萬利昌有限公司 &lt;br /&gt;\r\n天霸秉持一貫的用心與堅持；在設計開發與生產流程及品質管制上，精益求精；更在新層次產品的定位上植入，\r\n        綠色地球、永續生命的概念，並以~“MAZAL”【瑪緻】為新層次系列產品的保證與承諾，象徵著遠比鑽石更\r\n        堅，比所有承諾更確實可靠的一種……內在精神標準之建立。並未產品注入更寬廣的視野與更謙卑關懷德的心\r\n        意。 &lt;br /&gt;\r\n本公司目前共擁有8500平米、二廠六線、近三百員工的生產能力。年產值可達美金1000萬。\r\n        在銷售網絡上已建立台灣、香港、澳門、泰國、日本、土耳其、尼日利亞、中東地區、加拿大、美國等固定總\r\n        代理商通道。而後將以打造中國全國各地直銷服務網絡為短程目標。 &lt;br /&gt;\r\n“天霸精緻建材”源自於台灣萬利昌有限公司 &lt;br /&gt;\r\n天霸秉持一貫的用心與堅持；在設計開發與生產流程及品質管制上，精益求精；更在新層次產品的定位上植入，\r\n        綠色地球、永續生命的概念，並以~“MAZAL”【瑪緻】為新層次系列產品的保證與承諾，象徵著遠比鑽石更\r\n        堅，比所有承諾更確實可靠的一種……內在精神標準之建立。並未產品注入更寬廣的視野與更謙卑關懷德的心\r\n        意。 &lt;br /&gt;\r\n本公司目前共擁有8500平米、二廠六線、近三百員工的生產能力。年產值可達美金1000萬。\r\n        在銷售網絡上已建立台灣、香港、澳門、泰國、日本、土耳其、尼日利亞、中東地區、加拿大、美國等固定總\r\n        代理商通道。而後將以打造中國全國各地直銷服務網絡為短程目標。 &lt;br /&gt;', '53');
INSERT INTO `tp_article_description` VALUES ('4', '上锁的房间', '54');
INSERT INTO `tp_article_description` VALUES ('5', '送佛送到西天333', '57');
INSERT INTO `tp_article_description` VALUES ('6', '88888888888888', '3');
INSERT INTO `tp_article_description` VALUES ('7', '随碟附送地方', '59');
INSERT INTO `tp_article_description` VALUES ('8', '“天霸精緻建材”源自於台灣萬利昌有限公司 22222&lt;br /&gt;\r\n天霸秉持一貫的用心與堅持；在設計開發與生產流程及品質管制上，精益求精；更在新層次產品的定位上植入，\r\n        綠色地球、永續生命的概念，並以~“MAZAL”【瑪緻】為新層次系列產品的保證與承諾，象徵著遠比鑽石更\r\n        堅，比所有承諾更確實可靠的一種……內在精神標準之建立。並未產品注入更寬廣的視野與更謙卑關懷德的心\r\n        意。 &lt;br /&gt;\r\n本公司目前共擁有8500平米、二廠六線、近三百員工的生產能力。年產值可達美金1000萬。\r\n        在銷售網絡上已建立台灣、香港、澳門、泰國、日本、土耳其、尼日利亞、中東地區、加拿大、美國等固定總\r\n        代理商通道。而後將以打造中國全國各地直銷服務網絡為短程目標。 &lt;br /&gt;\r\n“天霸精緻建材”源自於台灣萬利昌有限公司 &lt;br /&gt;\r\n天霸秉持一貫的用心與堅持；在設計開發與生產流程及品質管制上，精益求精；更在新層次產品的定位上植入，\r\n        綠色地球、永續生命的概念，並以~“MAZAL”【瑪緻】為新層次系列產品的保證與承諾，象徵著遠比鑽石更\r\n        堅，比所有承諾更確實可靠的一種……內在精神標準之建立。並未產品注入更寬廣的視野與更謙卑關懷德的心\r\n        意。 &lt;br /&gt;\r\n本公司目前共擁有8500平米、二廠六線、近三百員工的生產能力。年產值可達美金1000萬。\r\n        在銷售網絡上已建立台灣、香港、澳門、泰國、日本、土耳其、尼日利亞、中東地區、加拿大、美國等固定總\r\n        代理商通道。而後將以打造中國全國各地直銷服務網絡為短程目標。', '12');
INSERT INTO `tp_article_description` VALUES ('9', '“天霸精緻建材”源自於台灣萬利昌有限公司 &lt;br /&gt;\r\n天霸秉持一貫的用心與堅持；在設計開發與生產流程及品質管制上，精益求精；更在新層次產品的定位上植入，\r\n        綠色地球、永續生命的概念，並以~“MAZAL”【瑪緻】為新層次系列產品的保證與承諾，象徵著遠比鑽石更\r\n        堅，比所有承諾更確實可靠的一種……內在精神標準之建立。並未產品注入更寬廣的視野與更謙卑關懷德的心\r\n        意。 &lt;br /&gt;\r\n本公司目前共擁有8500平米、二廠六線、近三百員工的生產能力。年產值可達美金1000萬。\r\n        在銷售網絡上已建立台灣、香港、澳門、泰國、日本、土耳其、尼日利亞、中東地區、加拿大、美國等固定總\r\n        代理商通道。而後將以打造中國全國各地直銷服務網絡為短程目標。 &lt;br /&gt;\r\n“天霸精緻建材”源自於台灣萬利昌有限公司 &lt;br /&gt;\r\n天霸秉持一貫的用心與堅持；在設計開發與生產流程及品質管制上，精益求精；更在新層次產品的定位上植入，\r\n        綠色地球、永續生命的概念，並以~“MAZAL”【瑪緻】為新層次系列產品的保證與承諾，象徵著遠比鑽石更\r\n        堅，比所有承諾更確實可靠的一種……內在精神標準之建立。並未產品注入更寬廣的視野與更謙卑關懷德的心\r\n        意。 &lt;br /&gt;\r\n本公司目前共擁有8500平米、二廠六線、近三百員工的生產能力。年產值可達美金1000萬。\r\n        在銷售網絡上已建立台灣、香港、澳門、泰國、日本、土耳其、尼日利亞、中東地區、加拿大、美國等固定總\r\n        代理商通道。而後將以打造中國全國各地直銷服務網絡為短程目標。', '21');
INSERT INTO `tp_article_description` VALUES ('10', '&lt;strong&gt;53类3000多种产品&lt;/strong&gt; &lt;br /&gt;\r\n多元化产品项目─全面性提供设计师空间搭配选择 &lt;br /&gt;\r\n独特性产品效果—满足设计师丰富的创意发想 &lt;br /&gt;\r\n高质量艺术收藏—精致化、艺术化PU装饰建材 &lt;br /&gt;\r\n唯一拥有从『设计、开发、制模、配料、生产、销售、服务』全方位服务及团队的PU建材厂家。 &lt;br /&gt;\r\n唯一拥有『独特彩绘效果技术』及『弧线订制加工技术』的PU装饰建材厂家。 &lt;br /&gt;\r\n每年持续创新上百种新式样、新颜色的PU建材厂家；在深圳、上海、台湾设有大型仓储销售中心的PU装饰建材厂\r\n商。每年持续于北京、上海、广州、台湾多次参加大型展会的PU厂家。率先将PU装饰建材品牌化、艺术化营销推\r\n广于全东亚地区的厂商；定期安排品牌经销商以及所有员工接受教育训练课程的培训，根据阶级、部门、区域、\r\n需求等各方面进一步设计课程，全面性带领经销商和员工，共同成长。', '5');
INSERT INTO `tp_article_description` VALUES ('11', '“天霸精緻建材”源自於台灣萬利昌有限公司&lt;br /&gt;\r\n天霸秉持一貫的用心與堅持；在設計開發與生產流程及品質管制上，精益求精；更在新層次產品的定位上植入， 綠色地球、永續生命的概念，並以~“MAZAL”【瑪緻】為新層次系列產品的保證與承諾，象徵著遠比鑽石更 堅，比所有承諾更確實可靠的一種……內在精神標準之建立。並未產品注入更寬廣的視野與更謙卑關懷德的心 意。&lt;br /&gt;\r\n本公司目前共擁有8500平米、二廠六線、近三百員工的生產能力。年產值可達美金1000萬。 在銷售網絡上已建立台灣、香港、澳門、泰國、日本、土耳其、尼日利亞、中東地區、加拿大、美國等固定總 代理商通道。而後將以打造中國全國各地直銷服務網絡為短程目標。&lt;br /&gt;\r\n“天霸精緻建材”源自於台灣萬利昌有限公司&lt;br /&gt;\r\n天霸秉持一貫的用心與堅持；在設計開發與生產流程及品質管制上，精益求精；更在新層次產品的定位上植入， 綠色地球、永續生命的概念，並以~“MAZAL”【瑪緻】為新層次系列產品的保證與承諾，象徵著遠比鑽石更 堅，比所有承諾更確實可靠的一種……內在精神標準之建立。並未產品注入更寬廣的視野與更謙卑關懷德的心 意。&lt;br /&gt;\r\n本公司目前共擁有8500平米、二廠六線、近三百員工的生產能力。年產值可達美金1000萬。 在銷售網絡上已建立台灣、香港、澳門、泰國、日本、土耳其、尼日利亞、中東地區、加拿大、美國等固定總 代理商通道。而後將以打造中國全國各地直銷服務網絡為短程目標。 &lt;br /&gt;\r\n&lt;br /&gt;', '6');
INSERT INTO `tp_article_description` VALUES ('12', '編　號 WE-2501A (風) &lt;br /&gt;\r\n備　註 &lt;br /&gt;\r\n尺　寸 2215 x 860 x 50 mm &lt;br /&gt;\r\n材　質 PU &lt;br /&gt;', '4');
INSERT INTO `tp_article_description` VALUES ('13', '555555555555', '0');
INSERT INTO `tp_article_description` VALUES ('14', '3333333333333', '0');
INSERT INTO `tp_article_description` VALUES ('15', '4654', '0');
INSERT INTO `tp_article_description` VALUES ('16', '555', '0');
INSERT INTO `tp_article_description` VALUES ('17', '66666', '0');
INSERT INTO `tp_article_description` VALUES ('18', '11111111111111', '73');
INSERT INTO `tp_article_description` VALUES ('19', '999999999999', '74');
INSERT INTO `tp_article_description` VALUES ('20', '“天霸精緻建材”源自於台灣萬利昌有限公司 &lt;br /&gt;\r\n天霸秉持一貫的用心與堅持；在設計開發與生產流程及品質管制上，精益求精；更在新層次產品的定位上植入，\r\n        綠色地球、永續生命的概念，並以~“MAZAL”【瑪緻】為新層次系列產品的保證與承諾，象徵著遠比鑽石更\r\n        堅，比所有承諾更確實可靠的一種……內在精神標準之建立。並未產品注入更寬廣的視野與更謙卑關懷德的心\r\n        意。 &lt;br /&gt;\r\n本公司目前共擁有8500平米、二廠六線、近三百員工的生產能力。年產值可達美金1000萬。\r\n        在銷售網絡上已建立台灣、香港、澳門、泰國、日本、土耳其、尼日利亞、中東地區、加拿大、美國等固定總\r\n        代理商通道。而後將以打造中國全國各地直銷服務網絡為短程目標。 &lt;br /&gt;\r\n“天霸精緻建材”源自於台灣萬利昌有限公司 &lt;br /&gt;\r\n天霸秉持一貫的用心與堅持；在設計開發與生產流程及品質管制上，精益求精；更在新層次產品的定位上植入，\r\n        綠色地球、永續生命的概念，並以~“MAZAL”【瑪緻】為新層次系列產品的保證與承諾，象徵著遠比鑽石更\r\n        堅，比所有承諾更確實可靠的一種……內在精神標準之建立。並未產品注入更寬廣的視野與更謙卑關懷德的心\r\n        意。 &lt;br /&gt;\r\n本公司目前共擁有8500平米、二廠六線、近三百員工的生產能力。年產值可達美金1000萬。\r\n        在銷售網絡上已建立台灣、香港、澳門、泰國、日本、土耳其、尼日利亞、中東地區、加拿大、美國等固定總\r\n        代理商通道。而後將以打造中國全國各地直銷服務網絡為短程目標。', '20');
INSERT INTO `tp_article_description` VALUES ('21', '阿斯达', '77');
INSERT INTO `tp_article_description` VALUES ('22', '“天霸精緻建材”源自於台灣萬利昌有限公司 &lt;br /&gt;\r\n地址：中国 广东 深圳市龙岗区 金葵东路(北)15号 &lt;br /&gt;\r\n电话：86-0755-22671212 &lt;br /&gt;\r\n传真：86-0755-22671212 &lt;br /&gt;\r\n邮编：518000 &lt;br /&gt;\r\n邮箱：TIANBA@qq.com &lt;br /&gt;\r\nQQ：294441884 &lt;br /&gt;\r\n销售热线：18126259090（Sally）', '78');

-- ----------------------------
-- Table structure for tp_article_img
-- ----------------------------
DROP TABLE IF EXISTS `tp_article_img`;
CREATE TABLE `tp_article_img` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `large` char(255) NOT NULL DEFAULT '',
  `medium` char(255) NOT NULL DEFAULT '',
  `small` char(255) NOT NULL DEFAULT '',
  `aid` tinyint(2) unsigned NOT NULL,
  `sort` int(10) unsigned NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_product_img_product1` (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_article_img
-- ----------------------------
INSERT INTO `tp_article_img` VALUES ('4', '', '', 'Uploads/images/20140901/thumb_5403ef2b4a338.jpg', '59', '100');
INSERT INTO `tp_article_img` VALUES ('5', '', '', 'Uploads/images/20140901/thumb_5403ef2b4afe2.jpg', '59', '100');
INSERT INTO `tp_article_img` VALUES ('6', '', '', 'Uploads/images/20140901/thumb_5403ef2b4b8d3.jpg', '59', '100');

-- ----------------------------
-- Table structure for tp_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `tp_auth_group`;
CREATE TABLE `tp_auth_group` (
  `id` int(10) NOT NULL,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `rules` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_auth_group
-- ----------------------------
INSERT INTO `tp_auth_group` VALUES ('1', '普通会员', '1', '1,2,3');
INSERT INTO `tp_auth_group` VALUES ('2', '高级会员', '1', '1,2,3,4,5,6');
INSERT INTO `tp_auth_group` VALUES ('3', '超级会员', '1', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70');

-- ----------------------------
-- Table structure for tp_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `tp_auth_group_access`;
CREATE TABLE `tp_auth_group_access` (
  `uid` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表明细';

-- ----------------------------
-- Records of tp_auth_group_access
-- ----------------------------
INSERT INTO `tp_auth_group_access` VALUES ('1', '3');
INSERT INTO `tp_auth_group_access` VALUES ('4', '3');
INSERT INTO `tp_auth_group_access` VALUES ('10', '0');

-- ----------------------------
-- Table structure for tp_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `tp_auth_rule`;
CREATE TABLE `tp_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(15) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(30) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示导航',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `condition` char(100) NOT NULL DEFAULT '',
  `sort` int(6) unsigned NOT NULL DEFAULT '100' COMMENT '排序',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_auth_rule
-- ----------------------------
INSERT INTO `tp_auth_rule` VALUES ('1', '0', 'config', '设置', '1', '0', '1', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('2', '1', 'Admin/config', '系统设置', '1', '1', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('3', '2', 'Admin/config/add', '系统设置添加', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('4', '2', 'Admin/config/edit', '系统设置编辑', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('5', '65', 'Admin/User/index', '管理员列表', '1', '0', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('6', '5', 'Admin/User/add', '添加管理员', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('7', '5', 'Admin/User/edit', '编辑管理员', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('8', '5', 'Admin/User/del', '删除管理员', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('13', '0', 'Admin/User/logout', '退出', '1', '0', '1', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('14', '65', 'Admin/Rule/index', '权限等级管理', '1', '0', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('15', '14', 'Admin/Rule/add', '权限等级添加', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('16', '14', 'Admin/Rule/edit', '权限等级编辑', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('20', '14', 'Admin/Rule/del', '权限等级删除', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('21', '65', 'Admin/Auth/index', '权限管理列表', '1', '0', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('22', '21', 'Admin/Auth/add', '权限添加', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('23', '21', 'Admin/Auth/edit', '权限编辑', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('24', '21', 'Admin/Auth/del', '权限删除', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('25', '64', 'Admin/Article/index', '文章管理', '1', '0', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('26', '25', 'Admin/Article/add', '文章添加', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('27', '25', 'Admin/Article/edit', '文章编辑', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('28', '25', 'Admin/Article/del', '文章删除', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('29', '66', 'Admin/Member/index', '会员管理', '1', '0', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('30', '29', 'Admin/Member/add', '会员添加', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('31', '29', 'Admin/Member/edit', '会员编辑', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('32', '29', 'Admin/Member/del', '会员删除', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('33', '66', 'Admin/Level/index', '会员等级管理', '1', '0', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('34', '33', 'Admin/Level/add', '会员等级添加', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('35', '33', 'Admin/Level/edit', '会员等级编辑', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('36', '33', 'Admin/Level/del', '会员等级删除', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('37', '66', 'Admin/Comment/index', '会员评论列表', '1', '0', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('38', '37', 'Admin/Comment/edit', '会员评论编辑', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('39', '67', 'Admin/Ad/index', '广告管理', '1', '0', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('40', '39', 'Admin/Ad/add', '广告添加', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('41', '39', 'Admin/Ad/edit', '广告修改', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('42', '39', 'Admin/Ad/del', '广告删除', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('43', '67', 'Admin/Position/index', '广告位管理', '1', '0', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('45', '43', 'Admin/Position/add', '广告位添加', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('46', '43', 'Admin/Position/edit', '广告位编辑', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('47', '43', 'Admin/Position/del', '广告位删除', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('48', '1', 'Other', '其他管理', '1', '0', '2', '', '105', '1');
INSERT INTO `tp_auth_rule` VALUES ('50', '48', 'Admin/Category/index', '栏目管理', '1', '0', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('51', '50', 'Admin/Category/add', '栏目添加', '1', '0', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('52', '50', 'Admin/Category/edit', '栏目编辑', '1', '0', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('53', '50', 'Admin/Category/del', '栏目删除', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('54', '48', 'Admin/Debris/index', '碎片管理', '1', '0', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('55', '54', 'Admin/Debris/add', '碎片添加', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('56', '54', 'Admin/Debris/edit', '碎片编辑', '1', '0', '34', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('57', '54', 'Admin/Debris/del', '碎片删除', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('58', '48', 'Admin/Feedback/index', '留言管理', '1', '0', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('59', '58', 'Admin/Feedback/edit', '留言编辑', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('60', '48', 'Admin/Uploads/index', '附件管理', '1', '0', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('61', '60', 'Admin/Uploads/edit', '附件编辑', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('62', '60', 'Admin/Uploads/del', '附件删除', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('63', '48', 'Admin/Log/index', '操作日记记录', '1', '0', '3', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('64', '1', 'Content', '内容中心', '1', '0', '2', '', '101', '1');
INSERT INTO `tp_auth_rule` VALUES ('65', '1', 'Manager', '管理员中心', '1', '0', '2', '', '102', '1');
INSERT INTO `tp_auth_rule` VALUES ('66', '1', 'Member', '会员中心', '1', '0', '2', '', '103', '1');
INSERT INTO `tp_auth_rule` VALUES ('67', '1', 'Ad', '广告中心', '1', '0', '2', '', '104', '1');
INSERT INTO `tp_auth_rule` VALUES ('68', '2', 'Admin/backup/add', '备份数据库', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('69', '2', 'Admin/backup/recover', '还原数据库', '1', '0', '4', '', '100', '1');
INSERT INTO `tp_auth_rule` VALUES ('70', '2', 'Admin/backup/del', '删除备份', '1', '0', '4', '', '100', '1');

-- ----------------------------
-- Table structure for tp_brand
-- ----------------------------
DROP TABLE IF EXISTS `tp_brand`;
CREATE TABLE `tp_brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_brand
-- ----------------------------
INSERT INTO `tp_brand` VALUES ('1', '三星');
INSERT INTO `tp_brand` VALUES ('2', '小米');
INSERT INTO `tp_brand` VALUES ('3', '苹果');
INSERT INTO `tp_brand` VALUES ('4', '诺基亚');
INSERT INTO `tp_brand` VALUES ('5', '华为');
INSERT INTO `tp_brand` VALUES ('6', '索爱');
INSERT INTO `tp_brand` VALUES ('7', '中兴');
INSERT INTO `tp_brand` VALUES ('8', '其他');

-- ----------------------------
-- Table structure for tp_category
-- ----------------------------
DROP TABLE IF EXISTS `tp_category`;
CREATE TABLE `tp_category` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL DEFAULT '',
  `pid` int(11) NOT NULL,
  `keywords` char(255) NOT NULL DEFAULT '',
  `description` varchar(500) NOT NULL DEFAULT '',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示 1 显示 0 不显示',
  `remark` char(30) NOT NULL DEFAULT '',
  `view` char(30) NOT NULL DEFAULT '',
  `image` char(150) NOT NULL DEFAULT '',
  `sort` int(6) unsigned NOT NULL DEFAULT '100',
  `target` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1,当前窗口，2，子窗口',
  PRIMARY KEY (`cid`),
  UNIQUE KEY `id_UNIQUE` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_category
-- ----------------------------
INSERT INTO `tp_category` VALUES ('1', '关于我们', '0', '11111', '222222                                                                      ', '1', 'About', '', 'Uploads/Category/2017-12-10/5a2c21d7de8bd.jpg', '100', '2');
INSERT INTO `tp_category` VALUES ('2', '视频中心', '0', '', '', '1', 'Video', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('3', '热点新闻', '0', '', '', '1', 'News', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('4', '产品中心', '0', '', '', '1', 'Product', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('5', '招商加盟', '0', '', '', '1', 'Join', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('6', '联系我们', '0', '', '', '1', 'Contact', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('7', '品牌概述', '1', '', '', '1', '', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('8', '公司文化', '1', '', '', '1', '', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('9', '发展历程', '1', '', '', '1', '', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('10', '活动剪影', '1', '', '', '1', '', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('11', '亚洲', '2', '', '', '1', '', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('12', '欧美', '2', '', '', '1', '', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('13', '时事热点', '3', '', '', '1', '', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('14', '体育热点', '3', '', '', '1', '', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('15', '宅热点', '3', '', '', '1', '', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('16', '联系我们', '6', '', '', '1', '', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('17', '在线留言', '6', '', '', '1', '', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('18', '招商要求', '5', '', '', '1', '', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('19', '招商区域', '5', '', '', '1', '', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('20', '拍照手机', '4', '', '', '1', '', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('21', '商务手机', '4', '', '', '1', '', '', '', '100', '1');
INSERT INTO `tp_category` VALUES ('22', '音乐手机', '4', '', '', '1', '', '', '', '100', '1');

-- ----------------------------
-- Table structure for tp_comment
-- ----------------------------
DROP TABLE IF EXISTS `tp_comment`;
CREATE TABLE `tp_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `centent` char(255) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `addtime` char(15) NOT NULL DEFAULT '',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '审核中，0；审核通过，1；审核失败，2',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_comment_user1` (`user_id`),
  KEY `fk_comment_product1` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_comment
-- ----------------------------

-- ----------------------------
-- Table structure for tp_config
-- ----------------------------
DROP TABLE IF EXISTS `tp_config`;
CREATE TABLE `tp_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` char(100) NOT NULL DEFAULT '' COMMENT '引用代码',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '中文说明',
  `body` varchar(500) NOT NULL DEFAULT '' COMMENT '具体信息',
  `config_type` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1图片 2单行文本 3 多行文本',
  `group` enum('基本设置','更多设置') NOT NULL DEFAULT '基本设置',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='网站配置';

-- ----------------------------
-- Records of tp_config
-- ----------------------------
INSERT INTO `tp_config` VALUES ('1', 'cfg_name', '网站标题', '深圳翰群科技有限公司 ', '2', '基本设置', '0');
INSERT INTO `tp_config` VALUES ('2', 'cfg_keywords', '关键字', '关键字', '3', '基本设置', '0');
INSERT INTO `tp_config` VALUES ('3', 'cfg_description', '描述', '描述', '3', '基本设置', '0');
INSERT INTO `tp_config` VALUES ('4', 'cfg_copyright', '底部信息', 'Copyright@ 2013-2014 \n版权所有：深圳翰群科技有限公司 ', '3', '基本设置', '0');
INSERT INTO `tp_config` VALUES ('11', 'cfg_address', '地址', '广东省深圳市宝安区龙华镇大浪华丰路豪迈工业园3栋4/5楼', '2', '基本设置', '0');
INSERT INTO `tp_config` VALUES ('9', 'cfg_image', '图片上传格式', 'gif|png|jpg|jpeg', '3', '更多设置', '0');
INSERT INTO `tp_config` VALUES ('6', 'cfg_logo', 'LOGO', './Data/Uploads/image/2016/12/22/585ba76684751.png', '1', '更多设置', '0');
INSERT INTO `tp_config` VALUES ('7', 'cfg_icp', '备案号', '备案号', '2', '基本设置', '0');
INSERT INTO `tp_config` VALUES ('8', 'cfg_count', '引用', '', '3', '更多设置', '0');
INSERT INTO `tp_config` VALUES ('10', 'cfg_file', '文件上传格式', 'doc|docx|ppt|pptx|xls|xlsx|zip|rar|7z|gif|png|jpg|jpeg|pdf', '3', '更多设置', '0');
INSERT INTO `tp_config` VALUES ('12', 'cfg_tel', '电话', '0755-25875075  ', '2', '基本设置', '0');
INSERT INTO `tp_config` VALUES ('13', 'cfg_email', '邮箱', 'admin-hk@contintechind.com ', '2', '基本设置', '0');
INSERT INTO `tp_config` VALUES ('14', 'cfg_pic_small_width', '图集小图宽', '55', '2', '更多设置', '0');
INSERT INTO `tp_config` VALUES ('15', 'cfg_pic_small_height', '图集小图高', '55', '2', '更多设置', '0');
INSERT INTO `tp_config` VALUES ('16', 'cfg_pic_medium_width', '图集中图宽', '300', '2', '更多设置', '0');
INSERT INTO `tp_config` VALUES ('17', 'cfg_pic_medium_height', '图集中图高', '300', '2', '更多设置', '0');
INSERT INTO `tp_config` VALUES ('18', 'cfg_map', '百度地图地址', '深圳市腾讯大厦', '2', '更多设置', '0');
INSERT INTO `tp_config` VALUES ('20', 'cfg_smtp', 'smtp地址', '', '2', '更多设置', '100');
INSERT INTO `tp_config` VALUES ('21', 'cfg_email_account', '邮箱账号', '', '2', '更多设置', '100');
INSERT INTO `tp_config` VALUES ('22', 'cfg_email_password', '邮箱密码', '', '2', '更多设置', '100');
INSERT INTO `tp_config` VALUES ('23', 'cfg_language_en', '开启英文版', '0', '5', '更多设置', '100');
INSERT INTO `tp_config` VALUES ('24', 'cfg_is_airlines', '开启在线客服', '0', '5', '更多设置', '100');
INSERT INTO `tp_config` VALUES ('25', 'cfg_is_oss', '开启阿里云OSS', '0', '5', '更多设置', '100');
INSERT INTO `tp_config` VALUES ('26', 'cfg_web', '网站域名', 'www.conward.com ', '2', '基本设置', '100');
INSERT INTO `tp_config` VALUES ('27', 'cfg_Contacts', '联系人', '陈小姐', '2', '基本设置', '100');
INSERT INTO `tp_config` VALUES ('28', 'cfg_fax', '传真', '0755-25929119', '2', '基本设置', '100');

-- ----------------------------
-- Table structure for tp_debris
-- ----------------------------
DROP TABLE IF EXISTS `tp_debris`;
CREATE TABLE `tp_debris` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(255) NOT NULL DEFAULT '' COMMENT '碎片标题',
  `title_en` char(255) NOT NULL DEFAULT '' COMMENT '英碎片标题',
  `pic_en` varchar(500) NOT NULL DEFAULT '' COMMENT '英图片',
  `pic` varchar(500) NOT NULL DEFAULT '' COMMENT '图片',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `body` text COMMENT '详细内容',
  `body_en` text COMMENT '英详细内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='碎片表';

-- ----------------------------
-- Records of tp_debris
-- ----------------------------
INSERT INTO `tp_debris` VALUES ('1', '领先潮流', '', '', 'Uploads/Debris/2017-12-12/5a2fe2bc1206c.jpg', '1513087703', '&lt;div class=&quot;t&quot;&gt;\r\n	领先潮流&lt;span&gt;&lt;/span&gt;智能生活\r\n	&lt;p&gt;\r\n		Leading trend Intelligent life\r\n	&lt;/p&gt;\r\n&lt;/div&gt;', null);
INSERT INTO `tp_debris` VALUES ('2', '和和美美', '', '', 'Uploads/Debris/2017-12-12/5a2fe2f45508c.jpg', '1513087732', '范菲菲', null);

-- ----------------------------
-- Table structure for tp_feedback
-- ----------------------------
DROP TABLE IF EXISTS `tp_feedback`;
CREATE TABLE `tp_feedback` (
  `fid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `theme` char(100) NOT NULL DEFAULT '' COMMENT '主题',
  `body` text COMMENT '内容',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '留言时间',
  `people` char(20) NOT NULL DEFAULT '' COMMENT '联系人',
  `email` varchar(60) NOT NULL DEFAULT '' COMMENT '电子邮件',
  `address` varchar(500) NOT NULL DEFAULT '' COMMENT '地址',
  `tel` char(10) NOT NULL DEFAULT '' COMMENT '固定电话',
  `phone` char(11) NOT NULL DEFAULT '' COMMENT '手机',
  `lookstate` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1没有看 2已经阅读',
  `showstate` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0不显示 1显示',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级',
  `user_uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员表关联外键',
  PRIMARY KEY (`fid`),
  KEY `fk_hd_feedback_rb_user1_idx` (`user_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='留言表';

-- ----------------------------
-- Records of tp_feedback
-- ----------------------------
INSERT INTO `tp_feedback` VALUES ('1', 'sss', 'ffffffffff', '1482406848', '体育', 'dddddd', '', '4565465132', '13713941522', '1', '0', '0', '0');
INSERT INTO `tp_feedback` VALUES ('2', 'dd', '123234234', '1482478942', 'ddd', 'dd', '', 'dd', '', '1', '0', '0', '0');
INSERT INTO `tp_feedback` VALUES ('3', 'ddd', '123123', '1483035235', 'ddd', 'ss', '', 'dd', '', '1', '0', '0', '0');
INSERT INTO `tp_feedback` VALUES ('4', '', '师傅', '1513197840', '咪咪', '', '', '1827615185', '', '1', '0', '0', '0');

-- ----------------------------
-- Table structure for tp_order
-- ----------------------------
DROP TABLE IF EXISTS `tp_order`;
CREATE TABLE `tp_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_NO` char(30) NOT NULL,
  `Adress_id` int(10) unsigned DEFAULT NULL,
  `total_price` float(10,0) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `data` varchar(1000) NOT NULL,
  `addtime` char(25) NOT NULL,
  `static` tinyint(4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_order_Adress1` (`Adress_id`),
  KEY `fk_order_user1` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_order
-- ----------------------------
INSERT INTO `tp_order` VALUES ('54', '201408290430032208', null, '30000', '28', '{\"22\":{\"id\":\"22\",\"price\":\"10000\",\"shop_price\":\"11111\",\"count\":\"30\",\"name\":\"\\u571f\\u661f\",\"image\":\"Uploads\\/images\\/20140813\\/1407899664.jpg\",\"num\":3,\"m\":\"on\",\"total\":30000}}', '20140829043003', '0');
INSERT INTO `tp_order` VALUES ('55', '201408290523509107', null, '10000', '28', '{\"22\":{\"id\":\"22\",\"price\":\"10000\",\"shop_price\":\"11111\",\"count\":\"30\",\"name\":\"\\u571f\\u661f\",\"image\":\"Uploads\\/images\\/20140813\\/1407899664.jpg\",\"num\":\"1\",\"m\":\"on\",\"total\":10000}}', '20140829052350', '0');
INSERT INTO `tp_order` VALUES ('51', '201408290412416884', null, '0', '28', 'null', '20140829041241', '0');
INSERT INTO `tp_order` VALUES ('52', '201408290413172055', null, '0', '28', 'null', '20140829041317', '0');
INSERT INTO `tp_order` VALUES ('53', '201408290415189894', null, '0', '28', 'null', '20140829041518', '0');
INSERT INTO `tp_order` VALUES ('46', '201408280833206138', null, '3500', '28', '{\"4\":{\"id\":\"4\",\"price\":\"3500\",\"shop_price\":\"3750\",\"count\":\"18\",\"name\":\"\\u4e09\\u661fS3\",\"image\":\"Uploads\\/images\\/20140812\\/1407847243.jpg\",\"num\":\"1\",\"m\":\"on\",\"total\":3500}}', '2147483647', '0');
INSERT INTO `tp_order` VALUES ('44', '201408280827389753', null, '3500', '28', '{\"4\":{\"id\":\"4\",\"price\":\"3500\",\"shop_price\":\"3750\",\"count\":\"18\",\"name\":\"\\u4e09\\u661fS3\",\"image\":\"Uploads\\/images\\/20140812\\/1407847243.jpg\",\"num\":\"1\",\"m\":\"on\",\"total\":3500}}', '2147483647', '0');
INSERT INTO `tp_order` VALUES ('47', '201408291034178647', null, '10000', '0', '{\"22\":{\"id\":\"22\",\"price\":\"10000\",\"shop_price\":\"11111\",\"count\":\"30\",\"name\":\"\\u571f\\u661f\",\"image\":\"Uploads\\/images\\/20140813\\/1407899664.jpg\",\"num\":\"1\",\"m\":\"on\",\"total\":10000}}', '2147483647', '0');
INSERT INTO `tp_order` VALUES ('49', '201408291227093607', null, '10000', '0', '{\"22\":{\"id\":\"22\",\"price\":\"10000\",\"shop_price\":\"11111\",\"count\":\"30\",\"name\":\"\\u571f\\u661f\",\"image\":\"Uploads\\/images\\/20140813\\/1407899664.jpg\",\"num\":\"1\",\"m\":\"on\",\"total\":10000}}', '20140829122709', '0');

-- ----------------------------
-- Table structure for tp_order_has_product
-- ----------------------------
DROP TABLE IF EXISTS `tp_order_has_product`;
CREATE TABLE `tp_order_has_product` (
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `fk_order_has_product_product1` (`product_id`),
  KEY `fk_order_has_product_order1` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_order_has_product
-- ----------------------------

-- ----------------------------
-- Table structure for tp_position
-- ----------------------------
DROP TABLE IF EXISTS `tp_position`;
CREATE TABLE `tp_position` (
  `psid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position_name` char(100) NOT NULL DEFAULT '' COMMENT '位置名称',
  `width` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '宽度',
  `height` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '高度',
  PRIMARY KEY (`psid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='广告位置';

-- ----------------------------
-- Records of tp_position
-- ----------------------------
INSERT INTO `tp_position` VALUES ('1', '首页幻灯图', '200', '100');
INSERT INTO `tp_position` VALUES ('2', '合作伙伴', '0', '0');
INSERT INTO `tp_position` VALUES ('3', '首页底部图', '0', '0');
INSERT INTO `tp_position` VALUES ('4', '友情链接', '0', '0');
INSERT INTO `tp_position` VALUES ('5', 'banner', '0', '0');
INSERT INTO `tp_position` VALUES ('6', '产品banner', '0', '0');
INSERT INTO `tp_position` VALUES ('7', '分享按钮', '0', '0');
INSERT INTO `tp_position` VALUES ('8', '底部', '150', '75');

-- ----------------------------
-- Table structure for tp_product
-- ----------------------------
DROP TABLE IF EXISTS `tp_product`;
CREATE TABLE `tp_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(160) NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `add_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `shop_price` float unsigned NOT NULL,
  `price` float unsigned NOT NULL,
  `image` char(200) NOT NULL DEFAULT '',
  `cid` int(10) unsigned NOT NULL,
  `count` int(10) unsigned NOT NULL,
  `keywords` char(255) NOT NULL DEFAULT '',
  `description` varchar(500) NOT NULL DEFAULT '',
  `edit_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `click` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `sort` int(10) unsigned NOT NULL DEFAULT '0',
  `is_top` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '0,不置顶，1，置顶',
  `flag` set('图文','头条','推荐') DEFAULT NULL COMMENT '属性',
  `verifystate` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1审核中  2 审核通过  3审核失败',
  `resource` char(20) NOT NULL DEFAULT '',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_product_brand` (`brand_id`),
  KEY `fk_product_category1` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_product
-- ----------------------------
INSERT INTO `tp_product` VALUES ('22', '土星', '1', '20140813', '11111', '10000', 'Uploads/images/20140813/thumb_1407899664.jpg', '5', '30', '', '', '0', '0', '105', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('3', '三星S2', '1', '20140731', '3750', '3500', 'Uploads/images/20140812/thumb_1407847333.jpg', '5', '9', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('4', '三星S3', '1', '20140731', '3750', '3500', 'Uploads/images/20140812/thumb_1407847243.jpg', '5', '18', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('5', '三星S4', '1', '20140731', '3750', '3500', 'Uploads/images/20140806/thumb_1407289325.jpg', '5', '7', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('6', '锤子手机2', '2', '20140804', '3333', '3000', 'Uploads/images/20140805/thumb_1407209125.jpg', '6', '46', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('20', '火星3', '8', '20140813', '10000', '9666', 'Uploads/images/20140813/thumb_1407899238.jpg', '7', '48', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('19', '虫子899', '5', '20140813', '7999', '6000', 'Uploads/images/20140813/thumb_1407898958.jpg', '6', '100', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('9', '阿什顿手机', '1', '20140804', '5000', '4888', 'Uploads/images/20140812/thumb_1407847408.jpg', '15', '100', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('10', '热土手机', '1', '20140804', '3333', '2499', 'Uploads/images/20140805/thumb_1407209125.jpg', '6', '30', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('11', '阿萨德手机', '1', '20140804', '5000', '4666', 'Uploads/images/20140813/thumb_1407899398.jpg', '14', '30', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('12', '三星Samsung', '1', '20140805', '3750', '3500', 'Uploads/images/20140805/thumb_1407209125.jpg', '5', '3', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('15', '苹果5', '0', '20140812', '5000', '4666', 'Uploads/images/20140812/thumb_1407847243.jpg', '6', '100', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('21', '水星3', '8', '20140813', '9999', '8999', 'Uploads/images/20140813/thumb_1407899398.jpg', '5', '48', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('16', '杯素5', '5', '1482336000', '7999', '7000', 'Uploads/images/20140812/thumb_1407847333.jpg', '13', '3', '777777', '88888888', '0', '566', '101', '0', null, '1', 'sky', '0');
INSERT INTO `tp_product` VALUES ('17', '斯蒂芬3', '1', '20140812', '6999', '6000', 'Uploads/images/20140812/thumb_1407847408.jpg', '4', '30', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('18', '土星', '1', '20140812', '11111', '10000', 'Uploads/images/20140812/thumb_1407847476.jpg', '5', '36', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('57', '撒蛋4545', '1', '20140829', '3000', '2888', 'Uploads/images/20140829/thumb_1409315310.jpg', '6', '100', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('59', '木星y7', '1', '20140901', '10888', '10000', 'uploads/images/20140901/thumb_5403ef2b4afe2.jpg', '15', '100', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('54', '彗星ssy', '1', '20140829', '6000', '5555', 'Uploads/images/20140829/thumb_1409306942.jpg', '6', '100', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('53', '金星456', '1', '20140829', '19999', '18888', 'Uploads/images/20140829/thumb_1409299207.jpg', '13', '100', '', '', '0', '0', '0', '0', null, '1', '', '0');
INSERT INTO `tp_product` VALUES ('52', '木星33', '1', '20140829', '9999', '9666', 'Uploads/images/20140829/thumb_1409297601.jpg', '14', '30', '', '', '0', '0', '0', '0', null, '1', '', '0');

-- ----------------------------
-- Table structure for tp_user
-- ----------------------------
DROP TABLE IF EXISTS `tp_user`;
CREATE TABLE `tp_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(15) NOT NULL,
  `password` char(32) NOT NULL,
  `login_ip` char(20) NOT NULL DEFAULT '' COMMENT '登录ip',
  `login_time` int(10) unsigned NOT NULL DEFAULT '0',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `role_id` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `times` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `is_lock` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否锁定，0正常，1锁定',
  `image` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `nickname` varchar(50) NOT NULL DEFAULT '',
  `type_id` int(10) unsigned NOT NULL,
  `email` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `id_UNIQUE` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_user
-- ----------------------------
INSERT INTO `tp_user` VALUES ('4', 'sky', '14e1b600b1fd579f47433b88e8d85291', '0.0.0.0', '1513703381', '0', '3', '52', '0', 'Uploads/Admin/2017-12-10/5a2c392e1d8dd.jpg', 'Uploads/Admin/2017-12-10/thumb_5a2c392e1d8dd.jpg', '', '0', '');
INSERT INTO `tp_user` VALUES ('1', 'admin', '14e1b600b1fd579f47433b88e8d85291', '', '0', '0', '2', '0', '0', '', '', '', '0', '');
INSERT INTO `tp_user` VALUES ('5', 'abc', 'd5f11ace1096430249d206b8f0a7db9c', '', '0', '1512848287', '2', '0', '0', 'Uploads/Admin/2017-12-10/5a2c3cf8f1985.jpg', 'Uploads/Admin/2017-12-10/thumb_5a2c3cf8f1985.jpg', '', '0', '');
INSERT INTO `tp_user` VALUES ('9', 'opp', '74be16979710d4c4e7c6647856088456', '', '1513015273', '1513015273', '0', '2', '0', '', '', 'DD', '2', 'wwwt_ok@163.com');
INSERT INTO `tp_user` VALUES ('10', 'aaa', '14e1b600b1fd579f47433b88e8d85291', '', '0', '1513017442', '1', '0', '0', '', '', 'bbb', '3', 'wwwt');
INSERT INTO `tp_user` VALUES ('12', 'tony', '130811dbd239c97bd9ce933de7349f20', '', '1513100874', '1513100874', '1', '1', '0', '', '', '', '1', 'wwwt_ok@163.com');

-- ----------------------------
-- Table structure for tp_user_comment
-- ----------------------------
DROP TABLE IF EXISTS `tp_user_comment`;
CREATE TABLE `tp_user_comment` (
  `cmid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(500) NOT NULL DEFAULT '' COMMENT '评论内容',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论时间',
  `verifystate` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1审核中 2 审核通过  3 不通过',
  `article_aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章主表关联外键',
  `user_uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户表关联外键',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `score` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评分',
  PRIMARY KEY (`cmid`),
  KEY `fk_rb_user_comment_rb_article1_idx` (`article_aid`),
  KEY `fk_rb_user_comment_rb_user1_idx` (`user_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='评论表';

-- ----------------------------
-- Records of tp_user_comment
-- ----------------------------
INSERT INTO `tp_user_comment` VALUES ('1', 'asdasdasd', '1513013693', '0', '0', '4', '0', '0');

-- ----------------------------
-- Table structure for tp_user_info
-- ----------------------------
DROP TABLE IF EXISTS `tp_user_info`;
CREATE TABLE `tp_user_info` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `realname` char(20) NOT NULL DEFAULT '' COMMENT '昵称',
  `sex` enum('女','男') NOT NULL DEFAULT '男' COMMENT '性别',
  `city` char(200) NOT NULL DEFAULT '' COMMENT '国家',
  `country` char(200) NOT NULL DEFAULT '' COMMENT '城市',
  `address` varchar(255) NOT NULL DEFAULT '',
  `province` char(200) NOT NULL DEFAULT '' COMMENT '省份',
  `language` char(255) NOT NULL DEFAULT '' COMMENT '语言',
  `headimgurl` varchar(500) NOT NULL DEFAULT '' COMMENT '用户头像，最后一个数值代表正方形头像大小（有0、46、64、96、132数值可选，0代表640*640正方形头像），用户没有头像时该项为空。若用户更换头像，原有头像URL将失效。',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `phone` char(15) NOT NULL DEFAULT '',
  `face` varchar(200) NOT NULL DEFAULT '',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='微信关注列表组信息';

-- ----------------------------
-- Records of tp_user_info
-- ----------------------------
INSERT INTO `tp_user_info` VALUES ('1', 'tony', '男', '', '', '', '', '', '', '0000-00-00', '13765158822', '', '12');

-- ----------------------------
-- Table structure for tp_user_type
-- ----------------------------
DROP TABLE IF EXISTS `tp_user_type`;
CREATE TABLE `tp_user_type` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `level_name` char(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_user_type
-- ----------------------------
INSERT INTO `tp_user_type` VALUES ('1', '游客');
INSERT INTO `tp_user_type` VALUES ('2', '普通会员');
INSERT INTO `tp_user_type` VALUES ('3', 'vip会员');
INSERT INTO `tp_user_type` VALUES ('4', '白金会员');
INSERT INTO `tp_user_type` VALUES ('5', '皇钻会员');
