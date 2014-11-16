-- phpMyAdmin SQL Dump
-- version 4.0.0
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 10 月 16 日 16:27
-- 服务器版本: 5.5.32-log
-- PHP 版本: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `bc_parent` int(11) NOT NULL COMMENT '父级评论ID',
  `bc_like` int(11) NOT NULL DEFAULT '1' COMMENT '评论赞',
  `bc_create_time` int(10) NOT NULL COMMENT '评论时间',
  `bc_path` varchar(100) NOT NULL DEFAULT '' COMMENT '排序',
  PRIMARY KEY (`bc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `bz_comments`
--

INSERT INTO `bz_comments` (`bc_id`, `bp_id`, `bu_id`, `bc_text`, `bc_status`, `bc_parent`, `bc_like`, `bc_create_time`, `bc_path`) VALUES
(15, 28, 3, '龙门镖局，镖镖必砸。', 1, 0, 3, 1376141527, ''),
(16, 44, 3, '看吐了。', 1, 0, 1, 1376323227, ''),
(17, 44, 1, '好蛋疼', 1, 0, 1, 1376323337, ''),
(18, 47, 1, '背景乐超赞！', 1, 0, 1, 1376397088, ''),
(19, 59, 1, '提交分享你喜欢的视频网页地址，最好能找到源地址。\r\n看到别人提交的视频链接，如果喜欢可以点赞。', 1, 0, 1, 1377068394, ''),
(20, 48, 1, '赞', 1, 0, 1, 1377232251, ''),
(21, 59, 1, '已增加评论邮件提醒功能，所以不出意外你应该能收到这个消息。', 1, 0, 1, 1377232321, ''),
(22, 48, 10, '赞~~~', 1, 0, 1, 1377243624, ''),
(23, 48, 10, '赞~~~', 1, 0, 1, 1377243627, ''),
(24, 66, 1, '为什么配的是英文的歌曲呢？', 1, 0, 1, 1377522610, ''),
(25, 59, 12, '个人猜测改版的目的是为了规避视频版权问题吧！', 1, 0, 1, 1377856345, ''),
(26, 59, 1, '当然不是。之前的版本视频都来自网上，这个不存在版本什么的问题。改版的原因其实很简单，只是想让大家都来参与，分享好的视频。', 1, 25, 1, 1377866455, '-25'),
(27, 40, 12, '讽刺啊，都是2货啊！', 1, 0, 1, 1378632954, ''),
(28, 66, 12, '不错，赞一个！', 1, 0, 1, 1378633365, ''),
(29, 99, 3, '艹！还能不能在一起愉快的玩耍了。', 1, 0, 1, 1378640618, ''),
(30, 105, 1, '演唱会运用来自好莱坞特效团队的高科技“虚拟影像重建技术', 1, 0, 1, 1378708910, ''),
(31, 44, 7, '什么时候能加上直接播放的功能呢？为什么不可以直接播放捏', 1, 17, 1, 1378888178, '-17'),
(32, 46, 12, '赞一个先！坐着慢慢看。', 1, 0, 1, 1378958127, ''),
(33, 112, 12, '自己顶自己一下，再赞一个，看能不能上首页！o(∩_∩)o 哈哈', 1, 0, 1, 1378958379, ''),
(34, 44, 1, '现在已经加上这个功能了', 1, 31, 1, 1381117050, '-17-31'),
(35, 44, 12, '看不下去了，果断点×。\r\n我去年买了个登山包，超耐磨。', 1, 0, 1, 1381287627, ''),
(36, 44, 12, '看不下去了，果断点×。\r\n我去年买了个登山包，超耐磨。', 1, 0, 1, 1381287644, '');

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
  `bp_img_url` varchar(255) DEFAULT NULL COMMENT '图片地址',
  `bp_content` varchar(255) DEFAULT '' COMMENT '简单说明',
  `bp_score` varchar(20) DEFAULT '' COMMENT 'HN算法排名',
  `bp_like` int(11) DEFAULT NULL COMMENT '赞',
  `bp_create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`bp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='内容表' AUTO_INCREMENT=143 ;

--
-- 转存表中的数据 `bz_posts`
--

INSERT INTO `bz_posts` (`bp_id`, `bu_id`, `bp_title`, `bp_url`, `bp_video_url`, `bp_img_url`, `bp_content`, `bp_score`, `bp_like`, `bp_create_time`) VALUES
(27, 1, '苹果新广告-每天face time—在线播放—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTkzMzc3NTky.html', NULL, '', '', '5.8214521170782E-6', 4, 1376124135),
(28, 1, '《龙门镖局》 最后一版预告片，也是迄今为止大家最喜欢的一版。', 'http://v.youku.com/v_show/id_XNTkwMTgzMDI0.html', NULL, '', '', '5.8261237486517E-6', 4, 1376126526),
(29, 1, '和你赛跑的不是人 30—在线播放—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTc5MzYwMjE2.html', NULL, '', '', '3.8841424549762E-6', 3, 1376126572),
(30, 3, '《万万没想到》爆笑预告 - 叫兽易小星', 'http://v.youku.com/v_show/id_XNTkwNTE0NjYw.html', NULL, '', '《万万没想到》以夸张而幽默的方式描绘了屌丝代表王大锤意想不到的传奇故事。剧情内容包罗万象，从当下热门话题到经典历史故事，调侃的视角幽默的语言独树一帜。作为职场界，名医届，相亲届的著名屌丝，王大锤每天的生活都多姿多彩而又变幻莫测。本来只是一场很简单的面试，但在王大锤看来却变成了一个探案现场，最后的面试结果更是让人意想不到；本来很经典的刘备大义摔儿的故事，在王大锤眼里却变成了一场啼笑皆非的闹剧，从而深刻揭露了刘备的另外一面…\r\n', '5.8561047992304E-6', 4, 1376141800),
(31, 1, '鸭梨公司 糗事百科微电影 第一集《求职》【高清】—在线播放—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTczMjA2NjA4.html', NULL, '', '', '3.9041224195492E-6', 3, 1376141840),
(32, 3, '《卑鄙的我2》小黄人之歌—《Y.M.C.A》', 'http://www.56.com/u95/v_OTQyOTA1MDA.html', NULL, '', '【小黄人演唱《卑鄙的我2》又一经典歌曲《Y.M.C.A.》】呆萌贱萌、卖萌无下限的黄豆豆们成功虏获了世界千万影迷的心，一起来欣赏一下！', '1.9528438506147E-6', 2, 1376143031),
(34, 1, '你的女神你不懂 31—在线播放—《罗辑思维 2013》—资讯—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTgxODEyODA0.html', NULL, '', '', '5.8615775544859E-6', 4, 1376144575),
(35, 3, '敖厂长出品:【据说是全球最难吃泡面】《我不是吃货》第十一期', 'http://v.youku.com/v_show/id_XNTkyMzI2NjE2.html', NULL, '', '全世界最难吃的泡面是什么样的？国外著名面食评荐网站《拉面评鉴》告诉你老外心中最难吃的泡面，而这款泡面竟然来自“某大国”', '1.9593630782776E-6', 2, 1376152923),
(36, 1, 'Nokia Lumia 925广告：更好的相片—在线播放—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTkyNzU0MDQ0.html', NULL, '', '', '3.9638970217057E-6', 3, 1376186801),
(37, 1, '超赞动画：海贼王鲁夫大战火影忍者我爱罗—在线播放—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTkxNzIzODUy.html', NULL, '', '', '3.9641647450489E-6', 3, 1376187000),
(38, 1, '4B青年欢乐多 24—在线播放—《【牛人】飞碟说》—综艺—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTgxMzkyMjYw.html', NULL, '', '现代青年，大多都是过着苦、二、装、傻B的生活，而他们被统称为：4B青年！举例说明，苦B罗永浩：罗永浩首先是个胖子，其次是个吹牛B脸不红气不喘的中年胖子。他长着一张女神连呵呵都不愿打的苦B脸，干的也是一堆瞎B忙不赚钱的苦逼事。', '7.9284694150855E-6', 5, 1376187052),
(39, 1, '[游侠网]国外玩家自制《半条命2》真人短片—在线播放—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTkzNjIyODcy.html', NULL, '', '', '1.9828777604273E-6', 2, 1376188182),
(40, 1, '反派当成这样 还不如一把火把自己给烧了……—在线播放—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTkwNzU1MTI0.html', NULL, '', '', '1.9836467033345E-6', 2, 1376189324),
(41, 1, 'p', 'http://www.tudou.com/programs/view/45-l8j951Jo/?resourceId=0_06_02_99', NULL, '', '', '1.9872869492577E-6', 2, 1376194721),
(42, 6, '【哎】', 'http://v.youku.com/v_show/id_XMjAwNTE4MjY4.html', NULL, '', '说实话，当时没在意，或者是没看懂。后来发生了一些事，偶尔有把这部微电影拿出来看了，不禁问：如果你是男猪脚，你会喊出最后的那个“哎”。我觉得我也很慢！', '5.9790301461657E-6', 4, 1376203175),
(43, 3, '秘鲁Movistar电信公司广告Connected中文字幕', 'http://www.tudou.com/programs/view/OO58c3hBcOA/', NULL, '', '这是看过的最动人的一个剪辑。如果我已经为了梦想竭尽全力，你是否愿意助我一臂之力。', '2.064982140636E-6', 2, 1376306362),
(44, 7, '让你们看看什么叫做不作死就会死，俄罗斯人民真是走在全世界人民之前了！', 'http://v.youku.com/v_show/id_XNTg0NDQ0NTI4', NULL, '', '亲们，让你们看看什么叫做不作死就会死，俄罗斯人民真是走在全世界人民之前了！三观毁的你连渣都找不到，这个系列有3部，请慢慢欣赏……准备好塑料袋，真的很痛！', '2.0661972590123E-6', 2, 1376308056),
(45, 1, '【胡戈出品】隐形侠大战外星人', 'http://www.tudou.com/programs/view/TfVef-MHss8/?resourceId=0_06_02_99', NULL, '', '', '4.1554280966036E-6', 3, 1376324035),
(46, 1, '【男人向前冲：104个电影猛男】—在线播放—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTkwODk4NTc2.html', NULL, '', '', '2.0779283302252E-6', 2, 1376324331),
(47, 1, '二十多岁应该拥有的10次旅行  130803 原创精选—在线播放—《原创精选 2013》—综艺—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTkwODMwOTY4.html', NULL, '', '', '4.1577164971527E-6', 3, 1376325615),
(48, 2, '万万没想到', 'http://v.youku.com/v_show/id_XNTk1MTgwMzg0.html', NULL, '', '【正片首发】我叫王大锤,面试成功当上总经理,出任CEO,迎娶白富美,走上了人生巅峰!But万万没想到!这只是一场游戏一场梦,醒来才发现我还是被刘备摔来摔去的2B儿子阿斗!谨以此片——古今"双拼"第一神剧#万万没想到#02集#进击的刘备#缅怀我那还有些小激动的白日梦与即将入洞房的白富美!http://t.cn/zQQKG07', '8.4232604088827E-6', 5, 1376362452),
(49, 1, '大学生就业指数 说穿了都是血和泪', 'http://my.tv.sohu.com/us/142791311/59155784.shtml', NULL, '', '', '2.1317962053282E-6', 2, 1376397268),
(50, 1, '吴念真导演《新年头老日子》—在线播放—《美好2013:大师微电影》—电影—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTg2OTI3NTA4.html', NULL, '', '', '2.1318338752588E-6', 2, 1376397318),
(51, 1, '请勿放弃治疗：2013 Vine短视频集锦—在线播放—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTk0NDQxNDMy.html', NULL, '', '', '2.1344235258443E-6', 2, 1376400752),
(52, 1, '【七印部落】乔布斯：遗失的访谈_中英双语字幕版—在线播放—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTUxNDY1NDY4.html', NULL, '', '', '2.2021296646509E-6', 2, 1376488294),
(71, 1, '《怪兽大学》中文版终极预告片 小眼仔卖萌无限—在线播放', 'http://v.youku.com/v_show/id_XNTk1MzEyMjY0.html', NULL, '', '', '0', 1, 1377864847),
(53, 1, 'iOS 7', 'http://www.tudou.com/programs/view/g2Z33VAULlg/', NULL, '', '', '2.2683982171434E-6', 2, 1376570015),
(54, 1, 'HTC 小罗伯特·唐尼广告完整版—在线播放—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTk2MzY4MzI0.html', NULL, '', '', '2.2685533995612E-6', 2, 1376570202),
(55, 3, '『创意音乐短片 ——传递』', 'http://www.56.com/u86/v_OTUyMTcxMzE.html/1030_sonicluo3.html', NULL, '', '【创意音乐短片《传递》】美好的画面，治愈的音乐，看完心情一下子就明亮起来了！！帮助别人，就是帮助自己，怀着一颗感恩的心，把爱传递下去，世界就能美好~~ 满满的正能量！背景音乐是 MatisYahu 的《One Day》', '5.1107135865017E-6', 3, 1376885100),
(56, 3, '万万没想到》第3话【生好多孩子】', 'http://v.youku.com/v_show/id_XNTk4MTU1MDk2.html', NULL, '', '《万万没想到》第3话【生好多孩子】上线！！！本系列首次出现女角色！！！终于有女孩愿意来演了！！！', '2.6754264743284E-6', 2, 1377001097),
(57, 1, '「ZEALER 出品」手机辐射究竟有多可怕?_视频在线观看 - 56.com', 'http://www.56.com/u68/v_OTU1MTk1Njk.html', NULL, '', '', '2.6771371768483E-6', 2, 1377002691),
(58, 3, '萌妹子微电影《我在北京有个梦之COS团长》@淘梦网 发行计划', 'http://www.56.com/u76/v_OTU0NDg2NDk.html', NULL, '', '萌妹子微电影《我在北京有个梦之COS团长》来了！一个COS团长组建团队打比赛，在北京苦逼的追求着自己的梦想。好多萌妹子呢，都萌哭了！搞笑却不恶意卖萌的短片，绝对推荐！', '5.3654034508422E-6', 3, 1377007865),
(59, 9, '这改版改成什么样的？能不能说来听听', 'http://niyabizui.com/index.php?r=posts/create', NULL, '', '这改版改成什么样的？能不能说来听听\r\n这域名倒是不错，我记住了，想上来看看，结果改版了', '5.490495510372E-6', 3, 1377064895),
(60, 1, '日本AU的系列广告「PLAY SCREEN」篇', 'http://v.youku.com/v_show/id_XNTk4OTQ1NzM2.html', NULL, '', '人机互动什么的太帅了！', '2.7775858160517E-6', 2, 1377093595),
(69, 1, '《行尸走肉》（The Walking Dead）第四季首款4分钟预告片', 'http://v.youku.com/v_show/id_XNTg1MTk4ODky.html', NULL, '', '', '1.006942778693E-5', 4, 1377532546),
(66, 2, '华语电影集锦 2012', 'http://www.yinyuetai.com/video/581617', NULL, '', '因为那么点小片段居然想看整部电影了。剪得很有感觉~~~~~', '6.4452050048361E-6', 3, 1377442026),
(61, 1, '飞碟说第31集：合租房里的中国式青春-动漫视频在线观看 - 56.com', 'http://www.56.com/u74/v_OTU2MzE3NzU.html', NULL, '', '', '3.0015836870901E-6', 2, 1377279027),
(62, 1, 'Vivek:笑自己.自己笑—在线播放—《一席》—教育—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTkyNjM4NjY0.html', NULL, '', '香港网页大赛冠军，香港最搞笑的人(HK''s Funniest Person 2007)，Vivek是全港中英文栋笃笑Stand-up comedy冠军。一个生活在香港的印度人，IT工程师。鲜明的文化差异在他身上碰撞，不可思议的组合在他身上呈现。', '6.0044992204883E-6', 3, 1377279546),
(63, 1, '【创意广告】Smart Ideas for Smarter Cities', 'http://v.youku.com/v_show/id_XNTY4MDY1Mjg4.html', NULL, '', '一个好的广告，不仅仅是创意，还有便利。', '3.006192111865E-6', 2, 1377282615),
(64, 1, '艳遇—在线播放—《艳遇》—电影—优酷网，视频高清在线观看', 'http://v.youku.com/v_show/id_XNTk0OTg2Mjgw.html', NULL, '', '', '3.0793887874893E-6', 2, 1377338480),
(65, 1, '【藤缠楼】街头相机捕捉路人幸福笑容—在线播放', 'http://v.youku.com/v_show/id_XNTkxODY3NjA4.html', NULL, '', '', '3.0804744128644E-6', 2, 1377339293),
(67, 1, '《为爱电影的人》（ 时光网2011年全新改版宣传片）', 'http://v.youku.com/v_show/id_XMjc0NDYzMDI4.html', NULL, '', '虽然这个视频出来比较久了，但是很喜欢。', '3.3423827703741E-6', 2, 1377523283),
(68, 1, 'I Forgot My Phone—在线播放', 'http://v.youku.com/v_show/id_XNjAwOTMzODI4.html', NULL, '', '', '3.3560088910488E-6', 2, 1377532240),
(70, 3, '飞碟说：别让大学上了你 32', 'http://v.youku.com/v_show/id_XNjAyMTc0MjE2_ev_7.html', NULL, '', '', '0', 1, 1377701703),
(72, 1, '中文字幕]钢3花絮deconstructing.the.scene.attack.on.air.force—在线播放', 'http://v.youku.com/v_show/id_XNjAxOTY2ODQw.html', NULL, '', '《钢铁侠3》一段八分钟的视频，讲述戏中铁罐救空中坠下的13个人的花絮。8天拍摄时间，62次飞行，跳伞超过600次，用降落伞480次，单纯只有绿幕绝对比不过实景拍摄效果啦！', '0', 1, 1377865630),
(73, 1, 'iPhone 5S оƬ', 'http://v.ku6.com/show/QXRLAf8M3Ck7khPYvWkkfg...html', NULL, '', '', '0', 1, 1377865697),
(74, 1, '金赫导演感人微电影 《健康树》—在线播放', 'http://v.youku.com/v_show/id_XNTAzODg4MjA4.html', NULL, '', '', '0', 1, 1377866279),
(75, 1, '男女对约会的不同理解—在线播放', 'http://v.youku.com/v_show/id_XNTA0ODA3NTc2.html', NULL, '', '', '0', 1, 1377866735),
(76, 1, '《美国恐怖故事》第三季预告片—专辑：《《剧说》第20期：2013优酷英美剧秋季档巡礼》—在线播放', 'http://v.youku.com/v_show/id_XNTkzMzIyMjg4.html?f=19682468', NULL, '', '', '0', 1, 1377869902),
(77, 1, '神盾局特工 Marvels Agents of SHIELD 全长预告片（2013新剧）—专辑：《《剧说》第20期：2013优酷英美剧秋季档巡礼》—在线播放', 'http://v.youku.com/v_show/id_XNTU3MjI5NjY4.html?f=19682468', NULL, '', '', '0', 1, 1377869941),
(78, 1, '为什么要拒绝导盲犬？换成别的动物会如何？', 'http://v.youku.com/v_show/id_XNTYzNTA3NzI0.html', NULL, '', '', '0', 1, 1377878089),
(79, 1, 'Elon Musk：钢铁侠传奇人生—在线播放', 'http://v.youku.com/v_show/id_XNTg1MDgxMzQw.html', NULL, '', '', '0', 1, 1377953178),
(80, 1, '魅族MX3 产品展示—在线播放', 'http://v.youku.com/v_show/id_XNjA0MTYzMjgw.html', NULL, '', '', '0', 1, 1378127358),
(81, 2, '违章动物-高清MV', 'http://v.yinyuetai.com/video/752903', NULL, '', '', '4.7151238998718E-6', 2, 1378213595),
(82, 1, '万妖集结 《斗战神》史诗CG全篇正式发布—在线播放', 'http://v.youku.com/v_show/id_XNjA0OTU3NzEy.html', NULL, '', '', '0', 1, 1378353088),
(83, 1, '外国薯片广告萌翻了', 'http://www.56.com/u13/v_NTg3NjQ5OTQ.html', 'http://player.56.com/v_NTg3NjQ5OTQ.swf', '', '', '0', 1, 1378365008),
(84, 1, '小钢牙（流畅）', 'http://www.56.com/u46/v_ODgwODk1MzE.html/1030_cdcly21.html/', 'http://player.56.com/v_ODgwODk1MzE.swf', 'http://v197.56img.com/images/1/11/tianyahongloui56olo56i56.com_136270550971hd_b.jpg', '', '0', 1, 1378374819),
(85, 1, '小米手机3 3D演示视频', 'http://v.youku.com/v_show/id_XNjA1MzExMjE2.html', 'http://player.youku.com/player.php/sid/XNjA1MzExMjE2/lianyue.swf', 'http://g1.ykimg.com/1100641F465228127C856B056C1F7A6830FC0A-FB9D-FE05-8A29-3917D83E15F6', '', '0', 1, 1378374974),
(86, 1, '进击の王大锤', 'http://v.youku.com/v_show/id_XNjA1MjcxMDU2.html', 'http://player.youku.com/player.php/sid/XNjA1MjcxMDU2/lianyue.swf', 'http://g2.ykimg.com/1100641F465227F6D1D31C02A061B20FF5B474-6958-4031-61DF-1373D3A6F194', '', '0', 1, 1378376265),
(87, 1, '苹果、三星、诺基亚 星球大战', 'http://v.youku.com/v_show/id_XNjA1MzAyMjAw.html', 'http://player.youku.com/player.php/sid/XNjA1MzAyMjAw/lianyue.swf', 'http://g4.ykimg.com/1100641F4652280DA72E52132E8A525D69EAED-7134-EC6F-8FC7-CA37A8B9BDB0', '', '0', 1, 1378376436),
(88, 1, '56出品《龙斌大话电影》第2期：天台爱情', 'http://www.56.com/u50/v_OTYyODk4MTU.html', 'http://player.56.com/v_OTYyODk4MTU.swf', 'http://v19.56img.com/images/11/29/lbdhdyi56olo56i56.com_137835335387hd_b.jpg', '', '0', 1, 1378376722),
(89, 1, '武林高手的自我修养 33', 'http://v.youku.com/v_show/id_XNjA1MTA5NDIw.html', 'http://player.youku.com/player.php/sid/XNjA1MTA5NDIw/lianyue.swf', 'http://g2.ykimg.com/1100401F46522745D5AB1007ED621312B33A8D-DA49-73D8-A4B0-86660CCC959F', '', '0', 1, 1378451078),
(90, 1, 'Show手旁观40：女主播献身求调教 二晕大战巨乳妹弹尽人绝！', 'http://v.youku.com/v_show/id_XNjA0NjMxNzI0.html', 'http://player.youku.com/player.php/sid/XNjA0NjMxNzI0/lianyue.swf', 'http://g4.ykimg.com/1100641F465225CE6F0204058698636E02BBF8-C4A7-188D-D351-C863BE6D28C4', '', '0', 1, 1378458588),
(91, 1, '《丢自行车的人》', 'http://www.tudou.com/listplay/mcjDxNEE5qI/SamQlqbPYzg.html?FR=LIAN', 'http://www.tudou.com/v/SamQlqbPYzg/lianyue.swf', 'http://i2.tdimg.com/174/632/861/w.jpg', '', '0', 1, 1378462180),
(92, 1, '《二周目侦探》蔫吧桃作坊用诚意在毁经典的作品！p.s.侦探好贱，结尾好噎人', 'http://www.tudou.com/listplay/mcjDxNEE5qI/70N-DbI2jh8.html', 'http://www.tudou.com/v/70N-DbI2jh8/lianyue.swf', 'http://i1.tdimg.com/168/015/270/w.jpg', '', '0', 1, 1378464826),
(93, 1, '糗事百科系列微电影《鸭梨公司》第十一集《发工资》', 'http://v.youku.com/v_show/id_XNjAyMzQzNDg0.html', 'http://player.youku.com/player.php/sid/XNjAyMzQzNDg0/lianyue.swf', 'http://g2.ykimg.com/1100641F46521EB36DA6AD0585FC1870D864F5-82FB-C011-21E1-8FE0101DA55E', '', '0', 1, 1378473182),
(94, 1, '《鸭梨公司》第十二集-大结局', 'http://v.youku.com/v_show/id_XNjA1MDQ0ODY0.html', 'http://player.youku.com/player.php/sid/XNjA1MDQ0ODY0/lianyue.swf', 'http://g4.ykimg.com/1100641F46522719ABD4B70585FC18CAF603A1-60C3-7A67-A171-9920EE3FD4B0', '', '0', 1, 1378474461),
(95, 1, '腾讯播客-「ZEALER 出品」Leap Motion上手体验', 'http://v.qq.com/boke/page/n/j/3/n0117qfxtj3.html', NULL, NULL, '', '0', 1, 1378553569),
(96, 1, '「ZEALER 出品」浮空操作电脑？Leap Motion上手体验！', 'http://www.56.com/u60/v_OTY0MTYxOTM.html', 'http://player.56.com/v_OTY0MTYxOTM.swf', 'http://v48.56img.com/images/19/14/zealermediai56olo56i56.com_137854227462hd_b.jpg', '', '0', 1, 1378553628),
(97, 1, '索尼泰国创意广告—女大十八变', 'http://v.youku.com/v_show/id_XMzE0ODYyNjg0.html', 'http://player.youku.com/player.php/sid/XMzE0ODYyNjg0/lianyue.swf', 'http://g2.ykimg.com/1100641F464EA1823DEC19059C183154F3DD9B-F50A-D5D4-3985-01D1E3A01D68', '', '0', 1, 1378553656),
(98, 1, '万万没想到 04 一起玩甄嬛', 'http://v.youku.com/v_show/id_XNjAxMzE0MzMy.html', 'http://player.youku.com/player.php/sid/XNjAxMzE0MzMy/lianyue.swf', 'http://g3.ykimg.com/1100641F46521B29F2EA9406257BB67E96D81C-BE8C-7D9D-F166-B41E8E9D8DF4', '', '0', 1, 1378621614),
(99, 3, '某S：郭小四的臆想世界，暑期垃圾片盘点 高清', 'http://www.56.com/u38/v_OTYyNjI1MjM.html#st=262', 'http://player.56.com/v_OTYyNjI1MjM.swf', 'http://v19.56img.com/images/18/9/r502470867i56olo56i56.com_137828793274hd_b.jpg', '还能不能在一起愉快的玩耍了。', '6.0619100859419E-6', 2, 1378640517),
(100, 1, 'iPhone5s简介_恶搞版', 'http://v.youku.com/v_show/id_XNjA2NTgxMDQ4.html', 'http://player.youku.com/player.php/sid/XNjA2NTgxMDQ4/lianyue.swf', 'http://g2.ykimg.com/1100641F46522C2E39C52A02C20EEEFB23E282-4862-3318-C27E-5127C0B26005', '', '0', 1, 1378694186),
(101, 1, '【七印部落】乔布斯：遗失的访谈_中英双语字幕版_V1.2精校版', 'http://v.youku.com/v_show/id_XNTU0OTQyMzIw.html', 'http://player.youku.com/player.php/sid/XNTU0OTQyMzIw/lianyue.swf', 'http://g4.ykimg.com/1100641F46518CCDF3559402AB35F4ABDEE556-9B34-BCA4-0D70-802EC1504138', '', '0', 1, 1378694817),
(102, 1, '万万没想到 05 大舌头悟空', 'http://v.youku.com/v_show/id_XNjA0Mjk0MzE2.html', 'http://player.youku.com/player.php/sid/XNjA0Mjk0MzE2/lianyue.swf', 'http://g1.ykimg.com/1100641F4652244900B47A06257BB6279282E4-43DB-3FF5-4A5A-987213B6FE8F', '', '0', 1, 1378695368),
(103, 1, '男女大不同，女人肿么就想象力那么丰富呢？', 'http://v.youku.com/v_show/id_XNjA1NTUzOTIw.html', 'http://player.youku.com/player.php/sid/XNjA1NTUzOTIw/lianyue.swf', 'http://g1.ykimg.com/1100641F465228A0D0B95407AE5B605719BC08-D521-B2C4-519F-91DE60F90421', '', '0', 1, 1378695950),
(104, 1, '高仿《万万没想到》 技术贴： 如何最快地追到学妹 ', 'http://v.youku.com/v_show/id_XNjA2NDQxNjQ0.html', 'http://player.youku.com/player.php/sid/XNjA2NDQxNjQ0/lianyue.swf', 'http://g1.ykimg.com/1100641F46522BC634B0FE00E9057D4A1AF4FD-C7C9-53C9-C6A9-DF3E770017C2', '', '0', 1, 1378708462),
(105, 1, '周杰伦和邓丽君隔空对唱《你怎么说》《红尘客栈》《千里之外》', 'http://v.youku.com/v_show/id_XNjA2NDAyMjYw.html', 'http://player.youku.com/player.php/sid/XNjA2NDAyMjYw/lianyue.swf', 'http://g1.ykimg.com/1100641F46522AAC7849F9014725B4C35DBDD2-75C4-5487-D22F-8FCCFD6C4447', '9月6日台北小巨蛋，周杰伦身后浮现字幕：”我曾经幻想，如果我能穿越时空，回到三十年前，跟她合唱一首歌，那是多么荣幸的一件事情“然后，邓丽君，出现了。。。好美的穿越，震惊了有木有！', '0', 1, 1378708892),
(106, 1, '这才是真正的cosplay！！2013圣地亚哥国际动漫展cosplay集锦.带你去看老美漫展上的那些神还原！！', 'http://www.56.com/u68/v_OTQ0MTQ2NDE.html', 'http://player.56.com/v_OTQ0MTQ2NDE.swf', 'http://v164.56img.com/images/14/8/r358750910i56olo56i56.com_sc_137480786031hd_b.jpg', '', '0', 1, 1378710165),
(107, 1, '2011年的一则旧广告', 'http://v.youku.com/v_show/id_XNDk3NTAxMzY4.html', 'http://player.youku.com/player.php/sid/XNDk3NTAxMzY4/lianyue.swf', 'http://g3.ykimg.com/1100641F4650E6DE9E6DC0004AF8EA1BE5231F-BF97-E7F9-5801-34B23E1FB20B', '真正的广告就是：看完之后，你一点都不想成为他们的顾客，而是想加入他们。', '0', 1, 1378710399),
(108, 1, '万万没想到 06 我要当老师', 'http://v.youku.com/v_show/id_XNjA3MjMwODEy.html', 'http://player.youku.com/player.php/sid/XNjA3MjMwODEy/lianyue.swf', 'http://g3.ykimg.com/1100641F46522A2BB68B0906257BB663BEB706-109D-1923-8F64-8BAA3B2D00AC', '', '0', 1, 1378789473),
(109, 1, '【字幕版来了】Youtube网友自制广告，恶搞iPhone 5S、5C', 'http://www.tudou.com/programs/view/3mySnAWA9Dg/', 'http://www.tudou.com/v/3mySnAWA9Dg/lianyue.swf', 'http://i4.tdimg.com/175/870/323/w.jpg', '', '0', 1, 1378813626),
(110, 1, '苹果iPhone 5s官方宣传视频中文字幕版', 'http://v.qq.com/cover/7/79tced4jzqdyjqs.html?vid=c0012s3ibjz', 'http://static.video.qq.com/TPout.swf?vid=c0012s3ibjz&ref=lianyue.org', 'http://vpic.video.qq.com/9440027/c0012s3ibjz.png', '', '0', 1, 1378865613),
(111, 1, 'iPhone 5c 官方宣传片', 'http://v.youku.com/v_show/id_XNjA3NjMyNjc2.html', 'http://player.youku.com/player.php/sid/XNjA3NjMyNjc2/lianyue.swf', 'http://g2.ykimg.com/1100401F46522F71E10496059E49FE77F391E4-0F27-A856-3C72-C262F0C320D8', '', '7.0297381074792E-6', 2, 1378865661),
(112, 12, '一分钟验证真心话', 'http://v.youku.com/v_show/id_XNjAwODg1NTAw.html?f=19629520', 'http://player.youku.com/player.php/sid/XNjAwODg1NTAw/lianyue.swf', 'http://g1.ykimg.com/1100641F46521A87005D41050A79452D1FFDAF-841F-C115-3BE7-5AC0EE39EE0C', '真心话大冒险贩售机，只收勇气不收钱。', '7.4992341470067E-6', 2, 1378958268),
(113, 12, '好电影为何总被“禁”？', 'http://v.youku.com/v_show/id_XNjA2ODEyMTg4.html', 'http://player.youku.com/player.php/sid/XNjA2ODEyMTg4/lianyue.swf', 'http://g3.ykimg.com/1100641F46522D555AFA4A00422C39D19A8FDD-C2E7-7C3A-D118-30188029FF43', '老友记：林兆华 吴念真《不做传统的奴隶》', '0', 1, 1378958498),
(114, 12, '脚踝断了！', 'http://v.youku.com/v_show/id_XNjA3MzQ4Mzgw.html?f=19901634', 'http://player.youku.com/player.php/sid/XNjA3MzQ4Mzgw/lianyue.swf', 'http://g3.ykimg.com/1100401F46522EB49205E800EE07B52C8FE8F4-C659-9371-7DF7-E0F49823A25E', '街球场2013年最新残暴过人大合集', '0', 1, 1378961059),
(115, 12, '嘻哈四重奏 第五季 第1集 ', 'http://v.youku.com/v_show/id_XNTg5NDY2NzI0.html', 'http://player.youku.com/player.php/sid/XNTg5NDY2NzI0/lianyue.swf', 'http://g4.ykimg.com/1100641F4651FBA43F011806257BB6A3C11BC0-6C3F-B6AC-F017-B63A92D3F7A0', '嘻哈四重奏 第五季 第1集 ', '0', 1, 1379904515),
(116, 12, '嘻哈四重奏 第五季 第2集 ', 'http://v.youku.com/v_show/id_XNTg5NDY3MTEy.html', 'http://player.youku.com/player.php/sid/XNTg5NDY3MTEy/lianyue.swf', 'http://g2.ykimg.com/1100641F4651FBA295D1D206257BB64D53BED0-B013-CD4E-F82B-B6067C9AB189', '嘻哈四重奏 第五季 第2集 ', '0', 1, 1379904534),
(117, 12, '嘻哈四重奏 第五季 第3集 ', 'http://v.youku.com/v_show/id_XNTk2NzUyMDQ0.html', 'http://player.youku.com/player.php/sid/XNTk2NzUyMDQ0/lianyue.swf', 'http://g3.ykimg.com/1100641F46520BED3E467006257BB663B9CDC7-AF53-DD34-C389-070E41018254', '嘻哈四重奏 第五季 第3集 ', '0', 1, 1379904548),
(118, 12, '嘻哈四重奏 第五季 第4集 ', 'http://v.youku.com/v_show/id_XNTk4MDg1MjIw.html', 'http://player.youku.com/player.php/sid/XNTk4MDg1MjIw/lianyue.swf', 'http://g2.ykimg.com/1100641F46521200B15D93021BBB97304C40BC-C81A-D86D-7AA0-DC634DBF6C4D', '嘻哈四重奏 第五季 第4集 ', '0', 1, 1379904566),
(119, 12, '嘻哈四重奏 第五季 第5集 ', 'http://v.youku.com/v_show/id_XNjAyODY5OTQ0.html', 'http://player.youku.com/player.php/sid/XNjAyODY5OTQ0/lianyue.swf', 'http://g1.ykimg.com/1100641F46521DE6F8520306257BB6AC7B94C7-6504-8546-FC78-772321E086FC', '嘻哈四重奏 第五季 第5集 ', '0', 1, 1379904584),
(120, 12, '嘻哈四重奏 第五季 第6集 ', 'http://v.youku.com/v_show/id_XNjA1NzA5NTM2.html', 'http://player.youku.com/player.php/sid/XNjA1NzA5NTM2/lianyue.swf', 'http://g3.ykimg.com/1100641F46521DE036E20706257BB6A6771DFB-B8BC-9BA7-F5D5-E1C2493AB100', '嘻哈四重奏 第五季 第6集 ', '0', 1, 1379904599),
(121, 12, '嘻哈四重奏第五季 第7集', 'http://v.youku.com/v_show/id_XNjEwNTk5NjEy.html', 'http://player.youku.com/player.php/sid/XNjEwNTk5NjEy/lianyue.swf', 'http://g2.ykimg.com/1100401F46523958BD528A134787B6F9B3D249-5CD4-E9EC-5274-B3CD15B03878', '嘻哈四重奏第五季 第7集', '0', 1, 1379904632),
(122, 12, '嘻哈四重奏第五季 第8集', 'http://v.youku.com/v_show/id_XNjExNzIyNzI4.html', 'http://player.youku.com/player.php/sid/XNjExNzIyNzI4/lianyue.swf', 'http://g1.ykimg.com/1100641F46523D5E446C5A04A56B283A1C0E27-D04C-FEA7-ACF3-3C72CDC3B13F', '嘻哈四重奏第五季 第8集', '0', 1, 1379904658),
(123, 1, '神盾局特工 第一季 01', 'http://v.youku.com/v_show/id_XNjEzMzA3MjI4.html', 'http://player.youku.com/player.php/sid/XNjEzMzA3MjI4/lianyue.swf', 'http://g3.ykimg.com/11270F1F465242CBFAEC2F00000000CA0F188C-7917-557C-EFC5-0FDE8E5020E6', '', '0', 1, 1380114185),
(124, 1, '眼见为实 --- 创意广告（2012莫比乌斯最佳广告特效）', 'http://www.56.com/u96/v_OTE0NDc5MjU.html/1030_cdcly21.html', 'http://player.56.com/v_OTE0NDc5MjU.swf', 'http://v167.56img.com/images/14/18/zc5991335i56olo56i56.com_sc_136810688998hd_b.jpg', '', '0', 1, 1380114805),
(125, 1, '「ZEALER 出品」 红米手机测评', 'http://v.youku.com/v_show/id_XNjEzNTg4MDAw.html', 'http://player.youku.com/player.php/sid/XNjEzNTg4MDAw/lianyue.swf', 'http://g1.ykimg.com/1100401F465242E7AC241F0359955BC0E218AF-E095-AA97-1E9C-9736AC23A1EA', '', '0', 1, 1380121022),
(126, 1, '万万没想到 08 员工的愤怒', 'http://v.youku.com/v_show/id_XNjEyNzA2ODIw.html', 'http://player.youku.com/player.php/sid/XNjEyNzA2ODIw/lianyue.swf', 'http://g3.ykimg.com/1100641F4652401FC2794706257BB6040C8BF7-1602-2409-7E68-14DEB77B543D', '', '0', 1, 1380121203),
(127, 1, '万万没想到 07 标准偶像剧', 'http://v.youku.com/v_show/id_XNjA5OTIzMDc2.html', 'http://player.youku.com/player.php/sid/XNjA5OTIzMDc2/lianyue.swf', 'http://g3.ykimg.com/1100641F465236ABF6BCBA06257BB645D7BB56-D5B0-13AD-CFC6-BD59EE47E2BB', '', '0', 1, 1380121234),
(128, 1, '实验短片《瞬步》', 'http://www.56.com/u86/v_OTMxMzgyMTk.html/1030_sonicluo3.html', 'http://player.56.com/v_OTMxMzgyMTk.swf', 'http://v155.56img.com/images/9/12/wpbisymani56olo56i56.com_13720397916hd_b.jpg', '', '0', 1, 1380121259),
(129, 1, '小鹏:那束微光 就是梦想', 'http://v.youku.com/v_show/id_XNDUwNDAzNzg0.html', 'http://player.youku.com/player.php/sid/XNDUwNDAzNzg0/lianyue.swf', 'http://g1.ykimg.com/1100401F4650544D50C6B207383F55E26FD202-9831-E99E-BC19-AA8A660BC121', '', '2.2684202248088E-5', 2, 1380121403),
(130, 1, '《极品飞车》电影版中文预告首发 豪车竞技极速狂飙', 'http://v.youku.com/v_show/id_XNjEzNjQ0NDg0.html', 'http://player.youku.com/player.php/sid/XNjEzNjQ0NDg0/lianyue.swf', 'http://g2.ykimg.com/1100401F4652430675D5E808DCBFE942EA088C-1468-7C14-0907-715523372474', '', '0', 1, 1380159402),
(131, 1, '【牛男创业】团队流程协作管理平台TRELLO（牛男字幕组）', 'http://v.youku.com/v_show/id_XNTAzMzUwNjY4.html', 'http://player.youku.com/player.php/sid/XNTAzMzUwNjY4/lianyue.swf', 'http://g3.ykimg.com/1100641F4650F80C4E50FF04A4526EFDA45C68-90BC-F1E2-1BB2-6607E126C635', '', '0', 1, 1380384345),
(132, 1, '夢想．激勵人心的演說', 'http://v.youku.com/v_show/id_XNjE0MjYzMjMy.html', 'http://player.youku.com/player.php/sid/XNjE0MjYzMjMy/lianyue.swf', 'http://g4.ykimg.com/1100641F46524532C358ED032D325223D041FA-4157-9CA3-AB92-47DBF275FC61', '', '3.5190547777618E-5', 2, 1380417790),
(133, 1, 'Apple WWDC 2010 keynote 中文字幕版-part2', 'http://v.youku.com/v_show/id_XMTkyOTY5NzI0.html', 'http://player.youku.com/player.php/sid/XMTkyOTY5NzI0/lianyue.swf', 'http://g1.ykimg.com/1100641F464C4E35C8F03E002C6E7035FEEF51-D5ED-BA92-A7AA-E69ACBE1A5DD', '', '0', 1, 1381075767),
(134, 1, '当我们在知乎讨论时', 'http://v.youku.com/v_show/id_XNjEwNTk4MjIw.html', 'http://player.youku.com/player.php/sid/XNjEwNTk4MjIw/lianyue.swf', 'http://g1.ykimg.com/1100401F465239561479C113451780F3A9C3A3-50ED-E777-2E36-7BE1465C8B0C', '', '0', 1, 1381075833),
(135, 1, '【MV】音乐短片\n	-蓝雨伞之恋 The Blue Umbrella (2013)-高清MV在线播放-音悦台-口袋·FAN-看好音乐', 'http://v.yinyuetai.com/video/779407', NULL, NULL, '', '0', 1, 1381111983),
(136, 1, '王自如-思想报告', 'http://v.youku.com/v_show/id_XNjE3OTgyODky.html', 'http://player.youku.com/player.php/sid/XNjE3OTgyODky/lianyue.swf', 'http://g1.ykimg.com/1100641F4652519900AF060359955B93DE1F0D-58AE-403D-258E-F65F5DAC00EB', '', '0', 1, 1381119353),
(137, 1, '56音乐下午茶 第304期【特色榜】这一首唱给前度的歌', 'http://www.56.com/u94/v_ODM5OTM5NzE.html/1030_quanmin2012.html', 'http://player.56.com/v_ODM5OTM5NzE.swf', 'http://v19.56img.com/images/22/24/hitea56i56olo56i56.com_135778286146hd_b.jpg', '', '0', 1, 1381139280),
(138, 1, '「ZEALER 分享」Samsung Galaxy Gear- A Long Time Coming', 'http://v.youku.com/v_show/id_XNjE4Mjc1NDcy.html', 'http://player.youku.com/player.php/sid/XNjE4Mjc1NDcy/lianyue.swf', 'http://g1.ykimg.com/1100641F46525279A8D566083DB83B4981BEC1-4F4A-B578-8F6A-9210B6DF72FD', '', '0', 1, 1381139624),
(139, 1, '电影《了不起的盖兹比 》幕后特效', 'http://video.sina.com.cn/v/b/116235133-2549228714.html', 'http://you.video.sina.com.cn/api/sinawebApi/outplayrefer.php/vid=_2549228714_', 'http://p2.v.iask.com/338/770/116235133_2.jpg', '', '0', 1, 1381227847),
(140, 1, '[少数派404视频第1弹]僵尸世界大战错错错_少数派_新浪播客\n', 'http://video.sina.com.cn/v/b/116105952-1815249517.html', 'http://you.video.sina.com.cn/api/sinawebApi/outplayrefer.php/vid=_1815249517_', 'http://p1.v.iask.com/849/10/116105952_2.jpg', '', '0', 1, 1381228481),
(141, 1, '56出品《龙斌大话电影》11期：分手合约', 'http://www.56.com/u22/v_OTc4MzE4OTk.html', 'http://player.56.com/v_OTc4MzE4OTk.swf', 'http://v19.56img.com/images/18/1/lbdhdyi56olo56i56.com_sc_13805298671hd_b.jpg', '', '0', 1, 1381236084),
(142, 1, '万万没想到 09：大丈夫许仙', 'http://v.youku.com/v_show/id_XNjE4MzQyNjA4.html', 'http://player.youku.com/player.php/sid/XNjE4MzQyNjA4/lianyue.swf', 'http://g4.ykimg.com/1100641F4652528D335E4906257BB646B89D40-D4B9-E5FB-492A-8BDC4F246360', '', '0', 1, 1381236138);

-- --------------------------------------------------------

--
-- 表的结构 `bz_save`
--

CREATE TABLE IF NOT EXISTS `bz_save` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '收藏ID',
  `bu_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `bp_id` int(11) DEFAULT NULL COMMENT '文章ID',
  `type` tinyint(1) DEFAULT NULL COMMENT '收藏分类 1是文章 2是评论',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='收藏表' AUTO_INCREMENT=91 ;

--
-- 转存表中的数据 `bz_save`
--

INSERT INTO `bz_save` (`id`, `bu_id`, `bp_id`, `type`) VALUES
(14, 2, 27, 1),
(15, 3, 28, 1),
(16, 3, 29, 1),
(17, 3, 27, 1),
(18, 1, 30, 1),
(19, 3, 34, 1),
(20, 3, 36, 1),
(21, 3, 42, 1),
(22, 7, 38, 1),
(23, 7, 15, 2),
(24, 1, 48, 1),
(25, 8, 30, 1),
(26, 3, 48, 1),
(27, 3, 37, 1),
(28, 3, 31, 1),
(29, 3, 45, 1),
(30, 3, 47, 1),
(31, 2, 34, 1),
(32, 3, 38, 1),
(33, 1, 55, 1),
(34, 9, 28, 1),
(35, 9, 42, 1),
(36, 10, 48, 1),
(37, 10, 42, 1),
(38, 1, 58, 1),
(39, 1, 15, 2),
(40, 3, 62, 1),
(41, 1, 66, 1),
(42, 10, 69, 1),
(43, 10, 68, 1),
(44, 10, 67, 1),
(45, 10, 58, 1),
(46, 10, 62, 1),
(47, 10, 66, 1),
(48, 10, 29, 1),
(49, 10, 31, 1),
(50, 10, 36, 1),
(51, 10, 37, 1),
(52, 10, 45, 1),
(53, 10, 47, 1),
(54, 10, 27, 1),
(55, 10, 28, 1),
(56, 10, 30, 1),
(57, 10, 34, 1),
(58, 10, 38, 1),
(59, 10, 55, 1),
(60, 10, 39, 1),
(61, 10, 40, 1),
(62, 10, 41, 1),
(63, 10, 43, 1),
(64, 10, 44, 1),
(65, 10, 46, 1),
(66, 10, 49, 1),
(67, 10, 50, 1),
(68, 10, 51, 1),
(69, 10, 52, 1),
(70, 10, 53, 1),
(71, 10, 54, 1),
(72, 10, 56, 1),
(73, 10, 57, 1),
(74, 10, 59, 1),
(75, 10, 61, 1),
(76, 10, 60, 1),
(77, 10, 63, 1),
(78, 10, 64, 1),
(79, 10, 65, 1),
(80, 10, 32, 1),
(81, 10, 35, 1),
(82, 12, 59, 1),
(83, 2, 69, 1),
(84, 1, 81, 1),
(85, 3, 69, 1),
(86, 1, 99, 1),
(87, 7, 111, 1),
(88, 1, 112, 1),
(89, 2, 132, 1),
(90, 2, 129, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `bz_user`
--

INSERT INTO `bz_user` (`bu_id`, `bu_email`, `bu_name`, `bu_password`, `bu_reg_ip`, `bu_last_ip`, `bu_last_time`, `bu_create_time`, `bu_status`, `bu_reputation`, `bu_about`) VALUES
(1, 'caizhenghai@gmail.com', 'forecho', '0aab5cf0b063e6e5984787bfa4950d28', '香港香港特别行政区网友', '中国广东省东莞市网友', 1381656572, 1376123722, 1, 538, 'I wrote niyabizui.'),
(2, 'cxx217@qq.com', 'MExiaoxia', '0e754c000d97d1be45ee07d2203588ff', '中国北京市北京市网友', '中国北京市北京市网友', 1380799452, 1376124627, 1, 42, NULL),
(3, 'qianyugang520@live.cn', 'qianyugang', 'ccbb413da2db27f12e658da9726eaf7b', '中国广东省深圳市网友', '中国广东省深圳市网友', 1377283101, 1376141095, 1, 52, 'http://www.102no.com'),
(4, '407329758@qq.com', 'jackeyjiang', 'fa7fd680d41c39cb2ea9b9339135f01e', '中国广东省深圳市网友', '中国广东省深圳市网友', 1376144030, 1376144011, 1, 47, NULL),
(5, '1989404ZHAO@SINA.CN', '4444SHU4444', '17c008629d0a87ece3e86eda886c6a2b', '中国河南省网友', '中国河南省网友', 1376146315, 1376146238, 1, 47, NULL),
(6, '331661289@qq.com', 'Nikolausyan', '33d89017fae8943f4c3014dbb2d11a3b', '中国湖北省武汉市网友', '中国湖北省武汉市网友', 1376203062, 1376147266, 1, 60, NULL),
(7, 'chopperrui@qq.com', 'chopperrui', '6e7287c1b870783753b370f8e2db1d3e', '中国新疆维吾尔自治区乌鲁木齐市网友', '中国新疆维吾尔自治区乌鲁木齐市网友', 1376307860, 1376307847, 1, 50, '一只特立独行的巨蟹女。'),
(8, '35393071@qq.com', 'a35393071', '43b2a9113de4588b72241434f43f0f09', '中国湖北省武汉市网友', '中国湖北省武汉市网友', 1376374396, 1376374386, 1, 46, NULL),
(9, '3363698@qq.com', 'abcabc', '46f94c8de14fb36680850768ff1b7f2a', '中国广东省广州市网友', '中国广东省广州市网友', 1377064826, 1377064807, 1, 52, NULL),
(10, 'phenone@163.com', 'phenone', '93c48a7cb58bc34ba082190f89db973b', '中国湖北省武汉市网友', '中国湖北省武汉市网友', 1377672515, 1377234572, 1, 10, ''),
(11, 'spartak@sina.com', 'testuser', '149787a6b7986f31b3dcc0e4e857cd2a', '中国山东省临沂市网友', '中国山东省临沂市网友', 1377252061, 1377252044, 1, 47, NULL),
(12, 'thefading@163.com', 'huiwolf', '783598198c03f8747f0af4d051a3a77f', '中国湖北省武汉市网友', '中国湖北省武汉市网友', 1381287284, 1377855986, 1, 122, '凡心所向，素履所往；生如逆旅，一苇以航。'),
(13, 'jhy5188@126.com', 'jhy5188', '51d66b5ff778bc893c19f55a94232e6d', '中国河北省邢台市网友', '中国河北省邢台市网友', 1379733240, 1379733225, 1, 47, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
