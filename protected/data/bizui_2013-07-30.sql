-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 07 月 30 日 17:51
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='内容表' AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `bz_posts`
--

INSERT INTO `bz_posts` (`bp_id`, `bu_id`, `bp_title`, `bp_url`, `bp_video_url`, `bp_content`, `bp_score`, `bp_like`, `bp_create_time`) VALUES
(14, 2, '你丫闭嘴', 'http://www.niyabizui.com/', NULL, '', '0.76443975970498', 8, 1374847591),
(13, 2, '程序员与写作 | MacTalk-池建强的随想录 ', 'http://macshuo.com/?p=638', NULL, '', '0.032976118989423', 13, 1374764004),
(10, 2, '终极 Shell | MacTalk-池建强的随想录 ', 'http://macshuo.com/?p=676', NULL, '', '0.0030229543836031', 2, 1374763637),
(11, 2, '大师微电影之新年头老日子—在线播放—《美好2013:大师微电影》—电影—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTg2OTI3NTA4_ev_1.html', NULL, '', '0.0086328716939672', 4, 1374763833),
(12, 2, '美好2013大师微电影吕乐作品《一维》预告片—在线播放—《美好2013:大师微电影》—电影—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTgxMzM3MjQw.html', NULL, '', '0.048779314539037', 19, 1374763880),
(15, 2, '终极 Shell | MacTalk-池建强的随想录 ', 'http://macshuo.com/?p=676', NULL, '', '', 1, 1374848097),
(16, 2, '网站布局、排版优秀的HTML5+CSS3网页设计 | 设计达人', 'http://www.shejidaren.com/html5-css3-website-design.html', NULL, '', '', 1, 1374848486),
(17, 2, '豈風: 我最爱的恶童场景,自己也画了一张练习_动画嘉年华', 'http://animation.diandian.com/post/2013-07-26/40050113495', NULL, '', '', 1, 1374848657),
(18, 2, '【转载】每个人心中都有一个全力奔跑的少女_动画嘉年华', 'http://animation.diandian.com/post/2011-09-26/5318461', NULL, '', '', 1, 1374848718),
(19, 1, 'mysql更新update表某个字段的值为该字段的值加某个随机变量值_同盟者_新浪博客', 'http://blog.sina.com.cn/s/blog_75ad1010010129r5.html', NULL, '', '', 1, 1375089343),
(20, 1, '[V2EX技巧] 贴图和贴代码的方法（写给像我一样的小白） - V2EX', 'http://www.v2ex.com/t/74249', NULL, '', '', 1, 1375089370),
(21, 1, 'mysql下sql语句令某字段值等于原值加上一个字符串 - 十方地藏 - 博客频道 - CSDN.NET', 'http://blog.csdn.net/webdesman/article/details/7425506', NULL, '', '', 1, 1375090257),
(22, 1, 'linux下mysql的root密码忘记解决方法 - 十方地藏 - 博客频道 - CSDN.NET', 'http://blog.csdn.net/webdesman/article/details/7072905', NULL, '', '', 1, 1375090310);

-- --------------------------------------------------------

--
-- 表的结构 `bz_save`
--

CREATE TABLE IF NOT EXISTS `bz_save` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '收藏ID',
  `bu_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `bp_id` int(11) DEFAULT NULL COMMENT '文章ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='收藏表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `bz_save`
--

INSERT INTO `bz_save` (`id`, `bu_id`, `bp_id`) VALUES
(1, 1, 14),
(2, 1, 12);

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
  `bu_reputation` int(10) DEFAULT NULL COMMENT '声望',
  `bu_about` text COMMENT '个人简介',
  PRIMARY KEY (`bu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `bz_user`
--

INSERT INTO `bz_user` (`bu_id`, `bu_email`, `bu_name`, `bu_password`, `bu_reg_ip`, `bu_last_ip`, `bu_last_time`, `bu_create_time`, `bu_status`, `bu_reputation`, `bu_about`) VALUES
(1, 'caizhenghai@gmail.com', 'forecho', '0aab5cf0b063e6e5984787bfa4950d28', NULL, '127.0.0.1', 1375083658, 1328187732, 3, 5, '的哈\r\n的 \r\nhttp://ruby-china.org/\r\n<a href="http://ruby-china.org/">http://ruby-china.org/</a>\r\n<h3><?php echo $model->bu_name; ?> #第 <?php echo $model->bu_id; ?> 位会员</h3>'),
(2, '407329758@qq.com', 'jackeyjiang', '1bbd886460827015e5d605ed44252251', '127.0.0.1', '127.0.0.1', 1374756222, 1374756191, 1, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
