-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-01-17 09:28:56
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
  `phone` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '电话号',
  `name` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '收货人名',
  `gender` tinyint(1) UNSIGNED NOT NULL COMMENT '性别，男性(1);女性(2)',
  `address` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '地址',
  `is_default` tinyint(1) NOT NULL DEFAULT '2' COMMENT '是否默认,1,默认;2,非默认'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='用户收货地址表';

--
-- 转存表中的数据 `sp_address`
--

INSERT INTO `sp_address` (`id`, `user_id`, `phone`, `name`, `gender`, `address`, `is_default`) VALUES
(8, 4, '136555.', '试试', 1, '我我我我我我我哦我', 2),
(2, 4, '13624503310', '测试', 1, '少时诵诗书所所所所所所所所所所所所所所所所所所所所所', 1),
(9, 4, '78784545', '事实上', 2, '打发打发的大哥', 2);

-- --------------------------------------------------------

--
-- 表的结构 `sp_config`
--

CREATE TABLE `sp_config` (
  `id` int(10) NOT NULL,
  `open_time` time NOT NULL COMMENT '开业时间',
  `close_time` time NOT NULL COMMENT '歇业时间',
  `content` text COLLATE utf8_bin NOT NULL COMMENT '店铺公告'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `sp_config`
--

INSERT INTO `sp_config` (`id`, `open_time`, `close_time`, `content`) VALUES
(1, '06:00:00', '20:00:00', '');

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
  `info` text CHARACTER SET utf8mb4 NOT NULL COMMENT '订单信息',
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态,1新订单,2接单,3拒绝'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `sp_orders`
--

INSERT INTO `sp_orders` (`id`, `order_num`, `user_id`, `address_id`, `total`, `info`, `create_time`, `status`) VALUES
(7, '2017011717272867650756', 4, 8, '64.75', '[{"name":"\\u9e21\\u817f","num":1},{"name":"\\u51b0\\u7ea2\\u8336","num":1},{"name":"\\u7092\\u997c","num":1},{"name":"\\u725b\\u8089","num":1}]', '2017-01-17 17:27:28', 1),
(8, '2017011717275384415893', 4, 8, '48.33', '[{"name":"\\u7092\\u997c","num":1},{"name":"\\u725b\\u8089","num":1},{"name":"\\u62ab\\u8428","num":1}]', '2017-01-17 17:27:53', 1);

-- --------------------------------------------------------

--
-- 表的结构 `sp_products`
--

CREATE TABLE `sp_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8_bin NOT NULL COMMENT '商品名',
  `price` decimal(10,2) UNSIGNED DEFAULT '0.00' COMMENT '价格',
  `pic_url` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '图片',
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间戳',
  `update_time` datetime NOT NULL COMMENT '更新时间戳'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `sp_products`
--

INSERT INTO `sp_products` (`id`, `name`, `price`, `pic_url`, `create_time`, `update_time`) VALUES
(1, '汉堡', '5.55', '/uploads/product/f1.png', '2017-01-16 16:42:03', '2017-01-16 16:42:03'),
(2, '可乐', '3.52', '/uploads/product/f2.png', '2017-01-16 16:42:03', '2017-01-17 04:00:00'),
(3, '油条', '6.00', '/uploads/product/f3.png', '2017-01-16 16:42:03', '2017-01-17 05:00:00'),
(4, '披萨', '12.33', '/uploads/product/f4.png', '2017-01-16 16:42:03', '2017-01-17 06:00:00'),
(5, '冰激凌', '7.35', '/uploads/product/f5.png', '2017-01-16 16:42:03', '2017-01-17 08:00:00'),
(6, '冰红茶', '3.00', '/uploads/product/f6.png', '2017-01-16 16:42:03', '2017-01-17 09:00:00'),
(7, '鸡腿', '25.75', '/uploads/product/f7.png', '2017-01-16 16:42:03', '2017-01-17 10:00:00'),
(8, '炒饼', '6.00', '/uploads/product/f8.png', '2017-01-16 16:42:03', '2017-01-17 11:00:00'),
(9, '牛肉', '30.00', '/uploads/product/f9.png', '2017-01-16 16:42:03', '2017-01-17 12:00:00');

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
-- 转存表中的数据 `sp_users`
--

INSERT INTO `sp_users` (`id`, `name`, `login`, `pass`, `create_time`) VALUES
(4, '姚震', 'kwc5132', '1d1bf2a52e6f762d62b7f978c0ec7075', '2017-01-12 05:27:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sp_address`
--
ALTER TABLE `sp_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_config`
--
ALTER TABLE `sp_config`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `sp_orders`
--
ALTER TABLE `sp_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `sp_products`
--
ALTER TABLE `sp_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `sp_users`
--
ALTER TABLE `sp_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
