/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : lanzhou

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-03-22 09:13:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `allergen`
-- ----------------------------
DROP TABLE IF EXISTS `allergen`;
CREATE TABLE `allergen` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `did` varchar(20) NOT NULL COMMENT '上级分类id',
  `name` varchar(20) NOT NULL COMMENT '分类名称',
  `level` varchar(20) NOT NULL COMMENT '分类级别',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='过敏源分类表';

-- ----------------------------
-- Records of allergen
-- ----------------------------
INSERT INTO `allergen` VALUES ('0', '', '全部过敏源', '');
INSERT INTO `allergen` VALUES ('9', '0', '营养制剂', '');
INSERT INTO `allergen` VALUES ('11', '9', '配方粉', '');
INSERT INTO `allergen` VALUES ('12', '0', '药食两用食物及其它', '');
INSERT INTO `allergen` VALUES ('13', '12', '其它', '');
INSERT INTO `allergen` VALUES ('14', '12', '药食两用植物', '');
INSERT INTO `allergen` VALUES ('15', '0', '调味品类', '');
INSERT INTO `allergen` VALUES ('16', '15', '香辛料', '');
INSERT INTO `allergen` VALUES ('17', '15', '咸菜类', '');
INSERT INTO `allergen` VALUES ('18', '15', '盐、味精及其它', '');
INSERT INTO `allergen` VALUES ('19', '15', '腐乳', '');
INSERT INTO `allergen` VALUES ('20', '15', '酱', '');
INSERT INTO `allergen` VALUES ('21', '15', '醋', '');
INSERT INTO `allergen` VALUES ('22', '15', '酱油', '');

-- ----------------------------
-- Table structure for `disease`
-- ----------------------------
DROP TABLE IF EXISTS `disease`;
CREATE TABLE `disease` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `did` varchar(20) NOT NULL COMMENT '上级分类id',
  `name` varchar(20) NOT NULL COMMENT '分类名称',
  `level` varchar(20) NOT NULL COMMENT '分类级别',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='病例分类表';

-- ----------------------------
-- Records of disease
-- ----------------------------
INSERT INTO `disease` VALUES ('0', '', '全部病例', '');
INSERT INTO `disease` VALUES ('9', '0', '特殊人群', '');
INSERT INTO `disease` VALUES ('10', '9', '增肌减脂', '');
INSERT INTO `disease` VALUES ('11', '9', '更年期', '');
INSERT INTO `disease` VALUES ('12', '9', '老年人', '');
INSERT INTO `disease` VALUES ('13', '9', '素食人群', '');
INSERT INTO `disease` VALUES ('14', '9', '哺乳期', '');
INSERT INTO `disease` VALUES ('15', '9', '孕晚期', '');
INSERT INTO `disease` VALUES ('16', '9', '孕中期', '');
INSERT INTO `disease` VALUES ('17', '9', '孕早期', '');
INSERT INTO `disease` VALUES ('18', '9', '孕前期', '');
INSERT INTO `disease` VALUES ('19', '9', '7-17岁儿童青少年', '');
INSERT INTO `disease` VALUES ('20', '9', '4-6岁儿童', '');
INSERT INTO `disease` VALUES ('21', '9', '2-3岁儿童', '');
INSERT INTO `disease` VALUES ('22', '9', '13-24月龄婴儿', '');
INSERT INTO `disease` VALUES ('23', '9', '10-12月龄婴儿', '');
INSERT INTO `disease` VALUES ('24', '9', '7-9月龄婴儿', '');
INSERT INTO `disease` VALUES ('25', '9', '0-6月龄婴儿', '');

-- ----------------------------
-- Table structure for `food`
-- ----------------------------
DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bianhao` varchar(255) DEFAULT NULL,
  `mip` varchar(50) DEFAULT NULL COMMENT '米饭食用频次',
  `mis` varchar(50) DEFAULT NULL COMMENT '米饭每次摄入量',
  `mir` varchar(50) DEFAULT NULL COMMENT '米饭热量',
  `zhp` varchar(50) DEFAULT NULL COMMENT '粥食用频次',
  `zhs` varchar(50) DEFAULT NULL COMMENT '粥摄入量',
  `zhr` varchar(50) DEFAULT NULL COMMENT '粥热量',
  `mfp` varchar(50) DEFAULT NULL COMMENT '面粉类食用频次',
  `mfs` varchar(50) DEFAULT NULL COMMENT '面粉类摄入量',
  `mfr` varchar(50) DEFAULT NULL COMMENT '面粉热量',
  `tdp` varchar(50) DEFAULT NULL COMMENT '甜点食用频次',
  `tds` varchar(50) DEFAULT NULL COMMENT '甜点摄入量',
  `tdr` varchar(50) DEFAULT NULL COMMENT '甜点热量',
  `yzp` varchar(50) DEFAULT NULL COMMENT '油炸食用频次',
  `yzs` varchar(50) DEFAULT NULL COMMENT '油炸摄入量',
  `yzr` varchar(50) DEFAULT NULL COMMENT '油炸热量',
  `yxp` varchar(50) DEFAULT NULL COMMENT '有馅类频次',
  `yxs` varchar(50) DEFAULT NULL COMMENT '有馅类摄入量',
  `yxr` varchar(50) DEFAULT NULL COMMENT '有馅热量',
  `czp` varchar(50) DEFAULT NULL COMMENT '粗粮食用频次',
  `czs` varchar(50) DEFAULT NULL COMMENT '粗杂粮摄入量',
  `czr` varchar(50) DEFAULT NULL COMMENT '粗杂粮热量',
  `slp` varchar(50) DEFAULT NULL COMMENT '薯类食用频次',
  `sls` varchar(50) DEFAULT NULL COMMENT '薯类摄入量',
  `slr` varchar(50) DEFAULT NULL COMMENT '薯类热量',
  `nnp` varchar(50) DEFAULT NULL COMMENT '牛奶食用频次',
  `nns` varchar(50) DEFAULT NULL COMMENT '牛奶摄入量',
  `nnr` varchar(50) DEFAULT NULL COMMENT '牛奶热量',
  `jdp` varchar(50) DEFAULT NULL COMMENT '鸡蛋食用频次',
  `jds` varchar(50) DEFAULT NULL COMMENT '鸡蛋摄入量',
  `jdr` varchar(50) DEFAULT NULL COMMENT '鸡蛋热量',
  `hrp` varchar(50) DEFAULT NULL COMMENT '红肉食用频次',
  `hrs` varchar(50) DEFAULT NULL COMMENT '红肉摄入量',
  `hrr` varchar(50) DEFAULT NULL COMMENT '红肉热量',
  `jqp` varchar(50) DEFAULT NULL COMMENT '家禽食用频次',
  `jqs` varchar(50) DEFAULT NULL COMMENT '家禽摄入量',
  `jqr` varchar(50) DEFAULT NULL COMMENT '家禽热量',
  `jgrp` varchar(50) DEFAULT NULL COMMENT '加工肉食用频次',
  `jgrs` varchar(50) DEFAULT NULL COMMENT '加工肉摄入量',
  `jgrr` varchar(50) DEFAULT NULL COMMENT '加工肉热量',
  `hxlp` varchar(50) DEFAULT NULL COMMENT '河鲜类食用频次',
  `hxls` varchar(50) DEFAULT NULL COMMENT '河鲜类摄入量',
  `hxlr` varchar(50) DEFAULT NULL COMMENT '河鲜类热量',
  `haixianp` varchar(50) DEFAULT NULL COMMENT '海鲜类食用频次',
  `haixians` varchar(50) DEFAULT NULL COMMENT '海鲜类摄入量',
  `haixianr` varchar(50) DEFAULT NULL COMMENT '海鲜类热量',
  `dzpp` varchar(50) DEFAULT NULL COMMENT '豆制品食用频次',
  `dzps` varchar(50) DEFAULT NULL COMMENT '豆制品摄入量',
  `dzpr` varchar(50) DEFAULT NULL COMMENT '豆制品热量',
  `jglp` varchar(50) DEFAULT NULL COMMENT '坚果类食用频次',
  `jgls` varchar(50) DEFAULT NULL COMMENT '坚果类摄入量',
  `jglr` varchar(50) DEFAULT NULL COMMENT '坚果类热量',
  `ssscp` varchar(50) DEFAULT NULL COMMENT '深色蔬菜食用频次',
  `ssscs` varchar(50) DEFAULT NULL COMMENT '深色蔬菜摄入量',
  `ssscr` varchar(50) DEFAULT NULL COMMENT '深色蔬菜热量',
  `qsscp` varchar(50) DEFAULT NULL COMMENT '浅色蔬菜食用频次',
  `qsscs` varchar(50) DEFAULT NULL COMMENT '浅色蔬菜摄入量',
  `qsscr` varchar(50) DEFAULT NULL COMMENT '浅色蔬菜热量',
  `jgp` varchar(50) DEFAULT NULL COMMENT '菌菇食用频次',
  `jgs` varchar(50) DEFAULT NULL COMMENT '菌菇摄入量',
  `jgr` varchar(50) DEFAULT NULL COMMENT '菌菇热量',
  `sgp` varchar(50) DEFAULT NULL COMMENT '水果食用频次',
  `sgs` varchar(50) DEFAULT NULL COMMENT '水果摄入量',
  `sgr` varchar(50) DEFAULT NULL COMMENT '水果热量',
  `typp` varchar(50) DEFAULT NULL COMMENT '甜饮品食用频次',
  `typs` varchar(50) DEFAULT NULL COMMENT '甜饮品摄入量',
  `typr` varchar(50) DEFAULT NULL COMMENT '甜饮品热量',
  `pjiup` varchar(50) DEFAULT NULL COMMENT '啤酒食用频次',
  `pjius` varchar(50) DEFAULT NULL COMMENT '啤酒摄入量',
  `pjiur` varchar(50) DEFAULT NULL COMMENT '啤酒热量',
  `hjiup` varchar(50) DEFAULT NULL COMMENT '黄酒食用频次',
  `hjius` varchar(50) DEFAULT NULL COMMENT '黄酒摄入量',
  `hjiur` varchar(50) DEFAULT NULL COMMENT '黄酒热量',
  `bjiup` varchar(50) DEFAULT NULL COMMENT '白酒食用频次',
  `bjius` varchar(50) DEFAULT NULL COMMENT '白酒摄入量',
  `bjiur` varchar(50) DEFAULT NULL COMMENT '白酒热量',
  `hhjiup` varchar(50) DEFAULT NULL COMMENT '红酒食用频次',
  `hhjius` varchar(50) DEFAULT NULL COMMENT '红酒摄入量',
  `hhjiur` varchar(50) DEFAULT NULL COMMENT '红酒热量',
  `shuip` varchar(50) DEFAULT NULL COMMENT '水食用频次',
  `shuis` varchar(50) DEFAULT NULL COMMENT '水摄入量',
  `shuir` varchar(50) DEFAULT NULL COMMENT '水热量',
  `tcp` varchar(50) DEFAULT NULL COMMENT '汤菜食用频次',
  `tcs` varchar(50) DEFAULT NULL COMMENT '汤菜摄入量',
  `tcr` varchar(50) DEFAULT NULL COMMENT '汤菜热量',
  `time` varchar(50) DEFAULT NULL COMMENT '提交时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of food
-- ----------------------------
INSERT INTO `food` VALUES ('1', 'R0C000032707', '每月1-3次', ' 二两', '100', '每周3-4次', '一两及以下', '50', '每周1-2次', ' 二两', '100', '每天1次', ' 二两', '100', '每周3-4次', ' 二两', '100', '每周1-2次', ' 四两', '200', '每天1次', ' 三两', '150', '每天1次', '一两及以下', '50', '每周5-6次', ' 200毫升', '200', '每周3-4次', ' 2/3个', '33', '每周3-4次', '一两及以下', '50', '每周5-6次', ' 四两', '200', '每天2次', ' 四两', '200', '每天1次', ' 三两', '150', '每周5-6次', ' 四两', '200', '每天1次', ' 四两', '200', '每天1次', ' 五两及以上', '250', '每周5-6次', ' 二两', '100', '每天1次', ' 三两', '150', '每周1-2次', ' 四两', '200', '每周3-4次', ' 三两', '150', '每天1次', ' 一瓶', '650', '每天1次', ' 两瓶', '1300', '每周3-4次', ' 150毫升', '150', '每天3次以上', ' 200毫升', '200', '每天1次', ' 200毫升', '200', '每天1次', ' 4-7杯', '1100', '每周3-4次', ' 三两', '150', '1552616394');

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '会员id',
  `cardid` varchar(20) NOT NULL COMMENT '会员卡关联号',
  `name` varchar(20) NOT NULL COMMENT '会员姓名',
  `sex` enum('男','女') DEFAULT NULL COMMENT '性别',
  `age` int(4) DEFAULT NULL COMMENT '年龄',
  `idnum` varchar(25) DEFAULT NULL COMMENT '身份证号',
  `birthday` varchar(25) DEFAULT NULL COMMENT '生日',
  `tel` varchar(20) DEFAULT NULL COMMENT '电话',
  `zhiye` varchar(20) DEFAULT NULL COMMENT '职业',
  `edu` varchar(20) DEFAULT NULL COMMENT '文化程度',
  `jdtime` int(11) DEFAULT NULL COMMENT '建档时间',
  `province` varchar(50) DEFAULT NULL COMMENT '省份',
  `city` varchar(50) DEFAULT NULL COMMENT '市区',
  `area` varchar(50) DEFAULT NULL COMMENT '区域',
  `addr` varchar(50) DEFAULT NULL COMMENT '详细地址',
  `mbs` varchar(200) DEFAULT NULL COMMENT '慢病史',
  `jws` varchar(200) DEFAULT NULL COMMENT '既往史',
  `jzs` varchar(200) DEFAULT NULL COMMENT '家族史',
  `gms` enum('0','1') DEFAULT '0' COMMENT '过敏史1有0无',
  `gmsy` varchar(200) DEFAULT NULL COMMENT '过敏源',
  `yys` enum('0','1') DEFAULT '0' COMMENT '用药史1有0无',
  `yylb` varchar(200) DEFAULT NULL COMMENT '用药类别',
  `ypmc` varchar(200) DEFAULT NULL COMMENT '药品名称',
  `xys` enum('0','1') DEFAULT '0' COMMENT '吸烟史1有0无',
  `xysj` varchar(10) DEFAULT NULL COMMENT '吸烟年限单位年',
  `xypl` varchar(10) DEFAULT NULL COMMENT '吸烟频率单位根/天',
  `yjs` enum('0','1') DEFAULT '0' COMMENT '饮酒史1有0无',
  `yjlb` varchar(200) DEFAULT NULL COMMENT '饮酒类别',
  `yjl` varchar(10) DEFAULT NULL COMMENT '饮酒量单位ml',
  `smqk` enum('0','1') DEFAULT '0' COMMENT '睡眠情况1良好0较差',
  `smsc` varchar(10) DEFAULT NULL COMMENT '睡眠时常单位小时',
  `ydcs` varchar(10) DEFAULT NULL COMMENT '运动次数单位次/周',
  `ydxs` varchar(10) DEFAULT NULL COMMENT '运动小时',
  `ydfz` varchar(10) DEFAULT NULL COMMENT '运动分钟',
  `dlxm` varchar(10) DEFAULT NULL COMMENT '锻炼项目',
  `ysxg` varchar(20) DEFAULT NULL COMMENT '饮食习惯',
  `jcrs` varchar(20) DEFAULT NULL COMMENT '就餐人数',
  `huny` varchar(20) DEFAULT NULL COMMENT '婚姻',
  `sg` varchar(10) DEFAULT NULL COMMENT '身高单位cm',
  `tz` varchar(10) DEFAULT NULL COMMENT '体重单位kg',
  `bmi` varchar(10) DEFAULT NULL COMMENT 'bmi',
  `sgopj` varchar(20) DEFAULT NULL COMMENT '身高评价',
  `yw` varchar(10) DEFAULT NULL COMMENT '腰围单位cm',
  `tw` varchar(10) DEFAULT NULL COMMENT '臀围单位cm',
  `ytb` varchar(10) DEFAULT NULL COMMENT '腰臀比',
  `ytpj` varchar(20) DEFAULT NULL COMMENT '腰臀评价',
  `ssy` varchar(10) DEFAULT NULL COMMENT '收缩压单位mmhg',
  `szy` varchar(10) DEFAULT NULL COMMENT '舒张压单位mmhg',
  `xypj` varchar(20) DEFAULT NULL COMMENT '血压评价',
  `gysz` varchar(10) DEFAULT NULL COMMENT '甘油三酯mmol/L',
  `zdgc` varchar(10) DEFAULT NULL COMMENT '总胆固醇',
  `sgpj` varchar(20) DEFAULT NULL COMMENT '三高评价',
  `gdb` varchar(10) DEFAULT NULL COMMENT '高蛋白',
  `ddb` varchar(10) DEFAULT NULL COMMENT '低蛋白',
  `dbpj` varchar(20) DEFAULT NULL COMMENT '蛋白评价',
  `kfxt` varchar(10) DEFAULT NULL COMMENT '空腹血糖',
  `chxt` varchar(10) DEFAULT NULL COMMENT '餐后血糖',
  `xtpj` varchar(20) DEFAULT NULL COMMENT '血糖评价',
  `xns` varchar(10) DEFAULT NULL COMMENT '血尿酸',
  `xnspj` varchar(20) DEFAULT NULL COMMENT '血尿酸评价',
  `xhdb` varchar(10) DEFAULT NULL COMMENT '血红蛋白',
  `xhdbpj` varchar(10) DEFAULT NULL COMMENT '血红蛋白评价',
  `ts` varchar(10) DEFAULT NULL COMMENT '同型半胱氨酸',
  `tspj` varchar(20) DEFAULT NULL COMMENT '同酸评价',
  `gmd` varchar(10) DEFAULT NULL COMMENT '骨密度',
  `gmdpj` varchar(20) DEFAULT NULL COMMENT '骨密度评价',
  `tys` text COMMENT '同意书图片签名',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', '21', '啊', '男', '58', '612424199505030010', '1540396800', '18329556944', '农民', '中专', '1540483200', null, null, null, null, null, null, null, '0', null, '0', null, null, '0', null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1538977757');
INSERT INTO `member` VALUES ('2', '', '', '男', '0', '', '', '', '无', '无', '0', '0', '0', '0', '0', null, null, null, '0', null, '0', null, null, '0', null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1539162214');
INSERT INTO `member` VALUES ('3', '', '啦啦啦', '男', '0', '', '', '', '无', '无', '0', '0', '0', '0', '0', '', '', '', '0', '', '0', '降压药', '', '0', '', '', '0', '请选择', '', '0', '', '', '', '', '', '甜食', '', '已婚', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', null, '1541649278');
INSERT INTO `member` VALUES ('4', '2', '测试', '男', '24', '612424199505030010', '1542902400', '18325874745', '白领', '博士', '1542297600', '北京市', '北京市市辖区', '东城区', '阿萨德', '老年人,素食人群', '素食人群,孕晚期', '老年人,孕晚期', '1', '哺乳期', '1', '降脂药', '阿莫西林', '1', '12', '20', '0', '', '', '1', '7', '10', '10', '', '素食人群', '荤食', '2', '已婚', '170', '65', '22.49', '正常', '80', '90', '0.89', '正常', '120', '75', '正常血压', '1', '3', '正常', '1', '2', '非正常', '5', '6', '正常血糖', '300', '正常', '5', '正常值', '6', '正常', '-2', '骨量低', null, '1542353983');
INSERT INTO `member` VALUES ('5', '', '测试', '男', '24', '612424199505030010', null, '18329556944', '白领', '博士', null, '北京市', '北京市市辖区', '东城区', '暗示的时代', null, null, null, '0', null, '0', null, null, '0', null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `member` VALUES ('6', '', '测试', '男', '24', '612424199505030010', null, '18329556944', '白领', '博士', null, '北京市', '北京市市辖区', '东城区', '朝阳区', null, null, null, '0', null, '0', null, null, '0', null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `member` VALUES ('7', '', '测试', '男', '24', '612424199505030010', null, '18329556944', '白领', '博士', null, '北京市', '北京市市辖区', '东城区', '请问', null, null, null, '0', null, '0', null, null, '0', null, null, '0', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `member_card`
-- ----------------------------
DROP TABLE IF EXISTS `member_card`;
CREATE TABLE `member_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xuliehao` varchar(50) NOT NULL COMMENT '会员卡序列号',
  `bianhao` varchar(50) NOT NULL COMMENT '会员卡号',
  `zhikaren` varchar(50) NOT NULL COMMENT '制卡人',
  `time` varchar(50) NOT NULL COMMENT '制卡时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='会员卡';

-- ----------------------------
-- Records of member_card
-- ----------------------------
INSERT INTO `member_card` VALUES ('2', 'B1ACD121', 'R0C000032707', '100', '1542006518');
INSERT INTO `member_card` VALUES ('3', 'B1ACD122', '123123123', '100', '1542012673');

-- ----------------------------
-- Table structure for `motion`
-- ----------------------------
DROP TABLE IF EXISTS `motion`;
CREATE TABLE `motion` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `did` varchar(20) NOT NULL COMMENT '上级分类id',
  `name` varchar(20) NOT NULL COMMENT '分类名称',
  `level` varchar(20) NOT NULL COMMENT '分类级别',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='过敏源分类表';

-- ----------------------------
-- Records of motion
-- ----------------------------
INSERT INTO `motion` VALUES ('0', '', '全部运动', '');
INSERT INTO `motion` VALUES ('11', '0', '跳绳', '');
INSERT INTO `motion` VALUES ('12', '0', '跑步', '');
INSERT INTO `motion` VALUES ('13', '0', '舞蹈', '');
INSERT INTO `motion` VALUES ('14', '0', '自行车', '');
INSERT INTO `motion` VALUES ('15', '11', '快速', '');
INSERT INTO `motion` VALUES ('16', '11', '中速、一般', '');
INSERT INTO `motion` VALUES ('17', '11', '慢速', '');
INSERT INTO `motion` VALUES ('18', '12', '跑、上楼', '');
INSERT INTO `motion` VALUES ('19', '12', '慢跑，一般', '');
INSERT INTO `motion` VALUES ('20', '12', '走跑结合', '');
INSERT INTO `motion` VALUES ('21', '13', '广场舞', '');
INSERT INTO `motion` VALUES ('22', '13', '瑜伽', '');
INSERT INTO `motion` VALUES ('23', '13', '快速', '');
INSERT INTO `motion` VALUES ('24', '13', '中速', '');
INSERT INTO `motion` VALUES ('25', '13', '慢速', '');
INSERT INTO `motion` VALUES ('26', '14', '16千米每小时-19千米每小时', '');
INSERT INTO `motion` VALUES ('27', '14', '12千米每小时-16千米每小时', '');
