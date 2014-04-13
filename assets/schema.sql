-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 04 月 13 日 05:04
-- 服务器版本: 5.5.29
-- PHP 版本: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+08:00";

--
-- 数据库: `cepweek_db`
--

-- --------------------------------------------------------

--
-- 表的结构 `ORDER_TABLE`
--

CREATE TABLE `ORDER_TABLE` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_name` varchar(20) NOT NULL,
  `order_num` int(11) NOT NULL DEFAULT '0',
  `order_cost` int(11) NOT NULL DEFAULT '0',
  `order_cancel_hash` varchar(70) NOT NULL DEFAULT '0',
  `order_type` varchar(10) NOT NULL,
  `order_email` varchar(40) NOT NULL,
  `order_phone` varchar(20) NOT NULL,
  `order_timestamp` datetime DEFAULT NULL,
  `order_title` varchar(20) NOT NULL DEFAULT '0',
  `order_tax_id` varchar(20) NOT NULL DEFAULT '0',
  `order_success` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- 表的结构 `RECEIVER_TABLE`
--

CREATE TABLE `RECEIVER_TABLE` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_order_id` int(11) NOT NULL,
  `rec_name` varchar(20) NOT NULL,
  `rec_num` int(11) NOT NULL DEFAULT '0',
  `rec_address_code` int(11) NOT NULL,
  `rec_address` text NOT NULL,
  `rec_phone` varchar(20) NOT NULL,
  `rec_timestamp` datetime DEFAULT NULL,
  `rec_on_the_way` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rec_id`),
  UNIQUE KEY `rec_id` (`rec_id`),
  KEY `rec_order_id` (`rec_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 限制导出的表
--

--
-- 限制表 `RECEIVER_TABLE`
--
ALTER TABLE `RECEIVER_TABLE`
  ADD CONSTRAINT `RECEIVER_TABLE_ibfk_1` FOREIGN KEY (`rec_order_id`) REFERENCES `ORDER_TABLE` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;


/*
timestamp
name
num
cancel(hash) 
trans(hash) *只有匯款才有

郵遞區號
地址
收貨人姓名
手機
抬頭/統一編號

交易成功 0/1
出貨成功 0/1

(匯款帳號末五碼)
*/