-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-01-11 09:28:33
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wangshop`
--

-- --------------------------------------------------------

--
-- 表的结构 `sp_address`
--

CREATE TABLE `sp_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'users表关联id',
  `phone` int(11) NOT NULL COMMENT '电话号',
  `name` int(11) NOT NULL COMMENT '收货人名',
  `address` int(11) NOT NULL COMMENT '地址',
  `is_default` tinyint(1) NOT NULL DEFAULT '2' COMMENT '是否默认,1,默认;2,非默认'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='用户收货地址表';

-- --------------------------------------------------------

--
-- 表的结构 `sp_orders`
--

CREATE TABLE `sp_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_num` varchar(32) COLLATE utf8_bin NOT NULL COMMENT '订单号',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT 'users表关联id',
  `address_id` int(10) UNSIGNED NOT NULL COMMENT '地址表关联id',
  `total` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00' COMMENT '总价',
  `info` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '订单信息',
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态,1新订单,2接单,3拒绝'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 表的结构 `sp_products`
--

CREATE TABLE `sp_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8_bin NOT NULL COMMENT '商品名',
  `price` decimal(10,2) UNSIGNED DEFAULT '0.00' COMMENT '价格',
  `pic_url` varchar(100) COLLATE utf8_bin NOT NULL COMMENT '图片',
  `create_time` timestamp NOT NULL COMMENT '创建时间戳',
  `update_time` timestamp NOT NULL COMMENT '更新时间戳'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 表的结构 `sp_users`
--

CREATE TABLE `sp_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '用户显示名',
  `login` varchar(32) COLLATE utf8_bin NOT NULL COMMENT '登录账号，唯一',
  `pass` varchar(60) COLLATE utf8_bin NOT NULL COMMENT '密码',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sp_address`
--
ALTER TABLE `sp_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_orders`
--
ALTER TABLE `sp_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_num` (`order_num`);

--
-- Indexes for table `sp_products`
--
ALTER TABLE `sp_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sp_users`
--
ALTER TABLE `sp_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `sp_address`
--
ALTER TABLE `sp_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `sp_orders`
--
ALTER TABLE `sp_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `sp_products`
--
ALTER TABLE `sp_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `sp_users`
--
ALTER TABLE `sp_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
