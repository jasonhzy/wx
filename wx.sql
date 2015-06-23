CREATE DATABASE IF NOT EXISTS `wx` DEFAULT CHARSET utf8 COLLATE utf8_general_ci;

USE `wx`;

CREATE TABLE IF NOT EXISTS `wx_users`(
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(60) NOT NULL  COMMENT '用户名',
  `pwd` VARCHAR(32) NOT NULL  COMMENT '密码',
  `mobile` VARCHAR(30),
  `status` ENUM('0', '1') DEFAULT '0' COMMENT '0:default 1:delete',
  `viptime` INT,
  `create_time` INT,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `wx_wxusers`(
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `wxname` VARCHAR(60) NOT NULL COMMENT '公众号名称',
  `wxid` VARCHAR(20) NOT NULL COMMENT '公众号原始ID',
  `weixin` CHAR(20) NOT NULL COMMENT '微信号',
  `type` ENUM('0', '1')  NOT NULL COMMENT '0:是订阅号 1:是服务号',
  `is_authed`  ENUM('0', '1')  NOT NULL COMMENT '0:未认证 1:已认证',
  `token` VARCHAR(200) NOT NULL,
  `create_time` INT,
  `update_time` INT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token`(`token`),
  INDEX `user_id`(`user_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;