-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 07 月 24 日 18:12
-- 服务器版本: 5.5.31-0ubuntu0.13.04.1
-- PHP 版本: 5.4.9-4ubuntu2.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bizui`
--

-- --------------------------------------------------------

--
-- 表的结构 `bz_comments`
--

CREATE TABLE IF NOT EXISTS `bz_comments` (
  `bc_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论ID',
  `bp_id` int(11) NOT NULL COMMENT '文章ID',
  `bu_id` int(11) NOT NULL COMMENT '用户ID',
  `bc_text` text NOT NULL COMMENT '评论内容',
  `bc_status` tinyint(1) DEFAULT '1' COMMENT '是否隐藏  1否2是',
  `bc_parent` int(11) NOT NULL COMMENT '父级评论',
  `bc_create_time` int(10) NOT NULL COMMENT '评论时间',
  PRIMARY KEY (`bc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bz_options`
--

CREATE TABLE IF NOT EXISTS `bz_options` (
  `bo_name` varchar(32) NOT NULL DEFAULT '' COMMENT '配置名称',
  `bo_value` text COMMENT '配置值',
  PRIMARY KEY (`bo_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='配置表';

-- --------------------------------------------------------

--
-- 表的结构 `bz_posts`
--

CREATE TABLE IF NOT EXISTS `bz_posts` (
  `bp_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '内容ID',
  `bu_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `bp_title` varchar(255) DEFAULT NULL COMMENT '标题',
  `bp_url` varchar(255) NOT NULL DEFAULT '' COMMENT '视频地址',
  `bp_video_url` varchar(255) DEFAULT NULL COMMENT 'flash地址',
  `bp_content` varchar(255) DEFAULT '' COMMENT '简单说明',
  `bp_score` varchar(20) DEFAULT '' COMMENT 'HN算法排名',
  `bp_like` int(11) DEFAULT NULL COMMENT '赞',
  `bp_create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`bp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='内容表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `bz_posts`
--

INSERT INTO `bz_posts` (`bp_id`, `bu_id`, `bp_title`, `bp_url`, `bp_video_url`, `bp_content`, `bp_score`, `bp_like`, `bp_create_time`) VALUES
(1, 1, '你好', 'http://news.dbanotes.net/', 'http://news.dbanotes.net/', '你好吗', '1', 2, 1374653036),
(2, 1, '你好', 'http://news.dbanotes.net/', 'http://news.dbanotes.net/', '你好吗', '2', 2, 1374659139),
(3, 1, '你好', 'http://news.dbanotes.net/', 'http://news.dbanotes.net/', '你好吗', '1', 2, 1374659397);

-- --------------------------------------------------------

--
-- 表的结构 `bz_save`
--

CREATE TABLE IF NOT EXISTS `bz_save` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '收藏ID',
  `bu_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `bp_id` int(11) DEFAULT NULL COMMENT '文章ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='收藏表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bz_user`
--

CREATE TABLE IF NOT EXISTS `bz_user` (
  `bu_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '会员ID',
  `bu_email` varchar(255) NOT NULL COMMENT 'Email',
  `bu_name` varchar(25) DEFAULT '' COMMENT '用户名',
  `bu_password` varchar(100) NOT NULL DEFAULT '' COMMENT '密码',
  `bu_reg_ip` varchar(25) DEFAULT NULL COMMENT '注册IP',
  `bu_last_ip` varchar(25) DEFAULT NULL COMMENT '最后登录IP',
  `bu_last_time` int(10) DEFAULT NULL COMMENT '最后登录时间',
  `bu_create_time` int(10) DEFAULT NULL COMMENT '注册时间',
  `bu_status` tinyint(1) DEFAULT '1' COMMENT '是否冻结 1否 2是',
  PRIMARY KEY (`bu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `bz_user`
--

INSERT INTO `bz_user` (`bu_id`, `bu_email`, `bu_name`, `bu_password`, `bu_reg_ip`, `bu_last_ip`, `bu_last_time`, `bu_create_time`, `bu_status`) VALUES
(1, 'caizhenghai@gmail.com', 'forecho', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
