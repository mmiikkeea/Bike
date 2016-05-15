-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2014 年 01 月 10 日 20:53
-- 伺服器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `bike`
--
CREATE DATABASE IF NOT EXISTS `bike` DEFAULT CHARACTER SET big5 COLLATE big5_chinese_ci;
USE `bike`;

-- --------------------------------------------------------

--
-- 表的結構 `authority`
--

CREATE TABLE IF NOT EXISTS `authority` (
  `authority_ID` int(11) NOT NULL,
  `authority_idenitification` varchar(45) NOT NULL,
  PRIMARY KEY (`authority_ID`),
  UNIQUE KEY `authority_UNIQUE` (`authority_idenitification`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 轉存資料表中的資料 `authority`
--

INSERT INTO `authority` (`authority_ID`, `authority_idenitification`) VALUES
(2, '一般會員'),
(1, '管理員');

-- --------------------------------------------------------

--
-- 表的結構 `bikeorder`
--

CREATE TABLE IF NOT EXISTS `bikeorder` (
  `order_no` int(10) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_amount` int(10) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_bankAcc` varchar(10) NOT NULL,
  `order_shipNO` varchar(20) NOT NULL,
  `order_memberID` varchar(11) NOT NULL,
  `order_recvName` varchar(20) NOT NULL,
  `order_recvTel` varchar(20) NOT NULL,
  `order_recvAddress` varchar(100) NOT NULL,
  `order_recvTime` varchar(20) NOT NULL,
  PRIMARY KEY (`order_no`)
) ENGINE=InnoDB DEFAULT CHARSET=big5;

--
-- 轉存資料表中的資料 `bikeorder`
--

INSERT INTO `bikeorder` (`order_no`, `order_date`, `order_amount`, `order_status`, `order_bankAcc`, `order_shipNO`, `order_memberID`, `order_recvName`, `order_recvTel`, `order_recvAddress`, `order_recvTime`) VALUES
(102, '2014-01-05 11:34:13', 984, '已出貨', '55555', '5566999', '28', 'Bob', '0933455444', 'ilan some where', '09:00~12:00'),
(103, '2014-01-05 11:43:22', 984, '已匯款，訂單處理中', '1234', '', '28', '55', '66', '2233', '09:00~12:00'),
(104, '2014-01-05 11:47:17', 984, '未付款', '', '', '28', 'Anson', '99997766', 'ilan city home', '09:00~12:00'),
(105, '2014-01-05 11:54:01', 984, '已出貨', '7777', '55667777', '28', 'dd', '7654534', 'sdsdfsdfs', '09:00~12:00'),
(106, '2014-01-05 12:40:16', 984, '未付款', '', '', '28', 'Anson', '0978778778', '忠孝東路', '全天'),
(107, '2014-01-05 18:08:04', 984, '已出貨', '09876', 'ujd97777', '28', 'Anson', '0988877766', 'taipei', '09:00~12:00'),
(109, '2014-01-07 21:34:01', 369, '確認匯款中', '12111', '', '27', 'Jack', '0977777777', '台北', '12:00~18:00'),
(110, '2014-01-07 21:56:08', 246, '未付款', '', '', '27', 'Yen', '0977777777', 'Japan', '09:00~12:00'),
(113, '2014-01-07 22:52:46', 123, '已出貨', '', '', '30', '王小明', '0988787666', '台北市萬華路124號5樓', '09:00~12:00'),
(115, '2014-01-08 10:26:56', 1599, '未付款', '', '', '27', 'Anson', '0988787666', '台灣', '09:00~12:00'),
(116, '2014-01-08 10:43:22', 615, '未付款', '', '', '27', '王小明', '0922333333', '桃園縣中壢市中大路300號', '18:00~20:00'),
(117, '2014-01-08 14:01:37', 123, '已出貨', '55555', '5566999', '30', '王小明', '0988787666', '桃園縣中壢市中大路300號', '09:00~12:00'),
(118, '2014-01-08 16:19:32', 123, '未付款', '', '', '30', '王小明', '0988787666', '桃園縣中壢市中大路300號', '09:00~12:00'),
(119, '2014-01-10 15:54:58', 369, '未付款', '', '', '27', '123', '123', '123', '09:00~12:00');

-- --------------------------------------------------------

--
-- 表的結構 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_ID` int(11) NOT NULL AUTO_INCREMENT,
  `member_account` varchar(45) DEFAULT NULL,
  `member_password` varchar(45) DEFAULT NULL,
  `member_firstName` varchar(45) DEFAULT NULL,
  `member_secondName` varchar(45) DEFAULT NULL,
  `member_sex` int(11) DEFAULT NULL,
  `member_born` varchar(45) DEFAULT NULL,
  `member_email` varchar(45) DEFAULT NULL,
  `member_phone` varchar(45) DEFAULT NULL,
  `member_address` varchar(45) DEFAULT NULL,
  `member_registDate` varchar(45) DEFAULT NULL,
  `authority_ID` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`member_ID`),
  UNIQUE KEY `id_UNIQUE` (`member_ID`),
  UNIQUE KEY `account_UNIQUE` (`member_account`),
  KEY `authority_id_idx` (`authority_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=1 ROW_FORMAT=DYNAMIC;

--
-- 轉存資料表中的資料 `member`
--

INSERT INTO `member` (`member_ID`, `member_account`, `member_password`, `member_firstName`, `member_secondName`, `member_sex`, `member_born`, `member_email`, `member_phone`, `member_address`, `member_registDate`, `authority_ID`) VALUES
(12, 'admin', 'admin', 'fredfred', 'wu', 1, '1926/5/1', 'student@ncu.edu.tw', '1234567890', '新北市蘆洲區民族路444號', '2013-12-26 07:12:08', 1),
(19, 'test', 'test', 'wu', 'gun', 1, '1944/5/11', 'student1@ncu.edu.tw', '2222222222', '新北市蘆洲區民族路44號', '2013-12-26 10:12:08', 2),
(20, 'test2', '1234', 'wu', 'kun', 1, '1923/8/7', '123@adsff', '1233333333', 'dddd', '2013-12-31 16:57:45', 2),
(24, 'test3', 'test', 'test', 'test', 1, '1914/1/1', 'test@test', 'test', 'test', '2014-01-01 14:15:29', 2),
(25, 'host1', 'test', 'test', 'test', 2, '2008/10/1', 'test@test', '1244444444', '全家', '2014-01-01 14:21:45', 2),
(26, 'twtt', '123', '123', '123', 1, '1914/1/1', '12@233', '1233', '123', '2014-01-02 13:56:13', 2),
(27, 'anson', 'anson', 'anson', 'chiang', 1, '1914/1/1', 'anson@asgard', '09r454', 'ilan', '2014-01-03 05:54:14', 2),
(28, 'bob', 'bob', 'bob', 'gin', 1, '1914/1/1', 'sdfsdf@sdfsdf', '7545454', 'dfdfdf', '2014-01-03 06:33:52', 2),
(29, 'kevin', 'kevin', 'kevin', 'lin', 1, '1914/1/1', 'god@military', '0975838383', 'ilan', '2014-01-05 03:16:39', 2),
(30, 'mike', '123', '王', '小排', 1, '1914/1/1', 'anson@gmail.com', '0988787393', '台北市', '2014-01-07 14:13:27', 2);

-- --------------------------------------------------------

--
-- 表的結構 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `news_title` varchar(30) NOT NULL,
  `news_content` text NOT NULL,
  `news_image` text NOT NULL,
  `news_date` date NOT NULL,
  PRIMARY KEY (`news_ID`),
  UNIQUE KEY `news_title_3` (`news_title`),
  UNIQUE KEY `news_title_4` (`news_title`),
  KEY `news_title_2` (`news_title`),
  KEY `news_id` (`news_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 轉存資料表中的資料 `news`
--

INSERT INTO `news` (`news_ID`, `news_title`, `news_content`, `news_image`, `news_date`) VALUES
(1, '捷安特連續三年榮獲臺灣二十大國際品牌第七名', '由經濟部工業局主辦，《數位時代》雜誌和國際知名品牌顧問公司Interbrand承辦的「2013年台灣國際品牌價值調查」，捷安特連續三年榮獲臺灣二十大國際品牌第七名。\r\n \r\n感謝全球消費者的支持，捷安特再次獲得「臺灣二十大國際品牌第七名」，品牌價值3.86億，成長13%！\r\n \r\n由工業研究會與全球最具公信力品牌顧問公司「Interbrand」共同舉辦的第十一屆「臺灣二十大國際品牌頒獎典禮」於11月底公佈，捷安特榮獲第七名，因全球消費者的信賴和支持，Giant年年入選前十二大台灣國際品牌，並9次入選前十大，今年則再次獲得第七名，品牌價值3.86億！\r\n \r\nGiant自1972年成立以來，即期許自己能成為站在世界舞台上的巨人，推動自行車的優點，為世界帶來更美好的生活！\r\n \r\n近年來Giant推廣「Giant Cycling World捷安特自行車世界」，透過多樣專業產品及貼心服務，拉近消費者與自行車關係，讓更多人有機會享受自行車騎乘樂趣！\r\n \r\n多年來，捷安特對產品品質的堅持，深受媒體與消費者的信任與肯定，也因各界的支持，每年捷安特皆入選台灣二十大，今年蟬聯第三次臺灣第七大國際品牌，再次感謝全球消費者支持，Giant會持續初衷，為消費者創造更美好的自行車世界！', 'test1.jpg', '2013-12-10'),
(2, 'Rabobank 公路越野賽選手續放光芒站上頒獎台', 'Lars der Haar與Pauline Ferrand-Prevot在上週日於比利時舉行的Vlaamse Industrieprijs Bosduin公路越野賽中雙雙為Rabobank團隊奪得佳績。Ferrand-Prevot在女子菁英組中站上頒獎台的第二名，而Lars der Haar在稍後黃昏時分舉行的男子菁英組中再接再厲也同樣奪下第二名。\r\n \r\nFerrand-Prevot是來自法國21歲的年輕新秀，她原隸屬於由Liv/giant所贊助的Rabobank女子車隊，並成為少數多棲的選手，在公路賽、越野車賽以及公路越野賽中都可以見到她拚博的身影。而這場比賽的結果，最終以僅落後冠軍地主選手Sanne Cant六秒鐘的時間拿下第二名，難能可貴的是，這同時也是今年為止她在各項比賽中表現最好的一役。\r\n \r\n焦點來到男子菁英組的賽場，Van der Haar是目前公路越野賽世界盃的積分領先王，本賽事依然踩著專屬於公路越野賽場的Giant TCX Advanced參賽並取得第二名，這個第二名是繼上週在Vlaamse Druivencross經典大賽中取得第二名後，連續取得的第二個站上頒獎台的成就。而在本賽事結束後，年僅22歲的Van der Haar也將目標調整回世界盃的賽場上，也就是本周末將於比利時Namur舉行的世界盃第四站賽事。', 'test2.jpg', '2013-12-18'),
(3, '【NEWS】2014東海岸部落慢騎漫遊行程時間上架了～', '期盼已久的東海岸部落慢騎漫遊2014行程時間已經出爐囉～ 現在即可線上報名預約明年度的遊程時間， 或來電捷安特旅行社04-35075168為您服務。', 'test3.jpg', '2013-12-13'),
(5, '集榮耀於一身的Vos 稱霸2013年女子自行車職業車壇', '隨著2013年進入最後一天，今年也是 Rabobank-Liv/giant車手Marianne Vos豐收的一年。這位來自荷蘭的自行車超級巨星，在精彩的2013年共囊括了包含公路以及公路越野2個世界錦標賽冠軍在內的28座冠軍，這不只是一項傲人的成績，更是現今職業自行車壇中無人能及的偉大紀錄。\r\n\r\n\r\n今年是屬於Vos的一年，尤其在荷蘭當地，Vos的成就被媒體以及大眾票選為年度最佳女子運動員；緊接著這項榮耀的加冕，上週自行車屆的權威雜誌Velo magazine更肯定她今年在自行車壇的表現非常全面，值得榮膺為「2013全球年度最佳女子運動員」的殊榮。\r\n\r\n\r\nVelo雜誌的主編Mattew Beaudin甚至以這樣的文字來說明今年Vos的精彩表現：「我們正在見證偉大成就的誕生。」「現今職業女子自行車壇是屬於Marianne Vos的年代，能夠連續在公路賽以及公路越野賽世界錦標賽連莊，這項奇蹟也只有她能夠完成了！」\r\n\r\n\r\nVos是車隊的隊長，除了專注比賽外，在賽場上賽場下也還必須負起帶隊的責任，並持續的幫助Liv/giant這個新品牌在女子自行車的開發上有更好的表現。而開發出來的女性專屬空氣力學自行車Envie Advanced，也協助她今年在Tuscany取得第三座的公路世界錦標賽冠軍。\r\n\r\n\r\n除了公路賽之外，Vos不只雙棲公路越野賽，她更加入隸屬於捷安特職業XC車隊的陣容，在2013年的春季更參與了幾場越野登山車賽， 而這些參賽取得好成績的經驗也讓Vos開始認真思考接下來參加奧運登山越野賽項目的可能性。\r\n\r\n\r\nVos在年度即將結束之際受訪表示：「我要特別的感謝我身旁的朋友以及我所有的隊友。」「她們在須忍受我的抱怨的同時，還是全力的協助我去取得這些成就，真的非常謝謝大家。」\r\n\r\n\r\n其實，Vos是個非常謙虛的選手，讓我們一起恭喜她2013年所為我們所達成的一切成就。', 'test4.jpg', '2013-12-31'),
(6, 'Van der Haar贏得世界盃Zolder站冠軍', 'Rabobank車隊選手Lars van der Haar上週四於比利時Zolder所舉辦的2013年度世界盃公路越野賽第三站，順利的摘下今年賽季的第三面金牌。這面金牌其實得來並不輕鬆，最終的決勝點來自於終點前的衝刺，Van der Haar騎乘TCX Advanced擺脫了追兵，在泥濘的雪地中拿下冠軍。女子組部分，則由Marianne Vos摘下第二名。\r\n \r\nVan der Haar在這場高速、高技術性的比賽中一路都跑得很順暢，即使遭遇許多選手的攻擊以及領先選手的不斷更迭，仍能一貫保持在集團的前方；直到比賽來到最後的衝刺，三人為首的領先集團展開衝刺，Van der Haar甩開另兩名本地捷克選手Martin Bina、Zdenek Stybar的糾纏一馬當先拿下冠軍。\r\n \r\n「比賽前我看了23歲以下組別的比賽，很明顯的這個賽道屬於技術型的場地。」van der Haar賽後說道：「我的策略是讓自己保持在集團前端的位置，可以看出來這非常有效！」在這一站拿下冠軍後，總計van der Haar共拿下五站中的三個冠軍，繼續穩居世界盃的積分領先位置。「我還是必須在接下來的兩站，Rome以及Nommay有持續的好表現。我會盡全力在最終站Nommay比賽後將冠軍給帶回家。」\r\n \r\n女子組競賽部分，好戲是Vos再次單挑目前世界盃積分領先的冠軍Compton。Vos騎乘TCX Advanced參賽，比賽開始她的狀況很不錯，與比利時當地選手Sanne Cant在開賽的第一圈就脫離主集團在前方領先，第二圈開始Compton發覺不能讓兩人單飛離開，因此催足了馬力追上兩人並再加速反超前。此時Vos第一時間並沒有回應這個攻擊，而是到了最後一圈才脫離Cant往前追領先的Compton，然而這時已經無法撼動Compton的領先，最終以20秒的時間差距拿下第二名。\r\n \r\nVos目前為奧運女子公路冠軍以及世錦賽女子公路冠軍，她同時也是四屆公路越野賽世界盃的冠軍。今年在在公路越野世界盃參賽的策略，是選擇性的參加部分的世界盃賽程來做調整，主要目標則是瞄準2014年二月份在Vos的家鄉Hoogerheide所舉辦的公路越野世界錦標賽，希望能拿下第七個世錦賽冠軍頭銜。\r\n \r\n世界盃第六站將在1月5日於Rome舉行，而最後一場比賽將在1月26日於法國的Nommay舉行。', 'test5.jpg', '2013-12-30'),
(8, 'Liv/giant全球首創 女性專用27.5越野自行車系列', '【猶他州帕克城訊】以女性角度出發的Liv/giant自行車品牌今天首度推出全系列搭配27.5吋輪胎的女性專用越野自行車。Liv/giant全新的越野(XC)、登山(trail)、林道(enduro)自行車提供碳纖與鋁合金兩種選擇，為妳帶來最佳的騎乘品質與表現，實踐幫助女性享受絕佳越野自行車體驗的品牌承諾。\r\n \r\nLiv/giant 2014年車種中，具備5個全新產品線共13台車種都將搭載27.5吋越野平台。全新越野系列耗費二年時間開發完成，已在多次大型賽事中亮相，並為Liv/giant贏得許多佳績，而Liv/giant的專業贊助選手群也在開發中也扮演了重要的角色。\r\n \r\nLiv/giant全球產品經理 Abby Santurbane指出：「據我們的研究發現，27.5理想地結合動感、越野與操控等特點，特別適合女性自行騎士，與我們合作的專業選手也十分肯定這些優勢。」\r\n \r\n27.5吋自行車結合Liv/giant專為女性設計的3F（合身Fit、美型Form、功能Function）車架幾何概念，同時兼具29吋所有的操控與穩定性，並保有更優秀的動感與適合女性的尺寸。全新的27.5吋女性專用車架，針對不同地形與騎乘方式設計專有車款，擁有完美的安全跨高與較短的軸距，可大幅改善操控效果，讓女性更自信、安全地享受越野自行車體驗。\r\n \r\n正在為2016年奧運準備的世界冠軍Marianne Vos以Obsess Advanced單避震車款原型車贏得了四月份Sea Otter Classic海獺盃越野與短距離項目冠軍。Obsess Advanced原型車是第一輛女性專屬27.5吋碳纖單避震越野自行車架。\r\n \r\nMarianne Vos表示：「我的隊友們有人選擇騎乘29吋自行車，雖然有較好的穩定性，但對於多數女性選手來說，大輪徑也是一種挑戰。」她特別指出27.5吋解決了這樣的困擾：「27.5吋自行車剛剛好，它在速度和重量上都符合我的需要，具有絕佳的控制性，且有著遠勝於26吋的穩定性。我只要使用很少的力氣就可以啟動與加速前進，十分輕鬆！」U23組越野世界冠軍Jolanda Neff在協助測試與定義2014年Obsess Advanced上，也有極大貢獻。\r\n \r\nLiv/giant針對更具難度的越野道路(XC)，開發出Lust Advanced系列，是全球第一輛專為女性設計的全避震27.5吋碳纖維車架，也是專為更專業挑剔的越野及登山自行車手所設計的Liv/giant旗艦車款，使用高級碳纖維車架與4吋Maestro避震系統。Lust系列同時提供了輕量化ALUXX SL鋁合金車架版本。\r\n \r\nLiv/giant針對極具挑戰性的登山與林道推出 Intrigue系列，提供5.5吋Maestro避震系統與ALUXX SL鋁合金車架。來自Giant Factory越野自行車隊的選手Kelli Emmett，參與過多項越野與林道賽事，也協同開發了Lust和Intrigue車架平台。\r\n \r\nEmmett讚嘆道：「27.5吋帶來的感受截然不同！Lust和Intrigue兩台車都有無可比擬的加速能力，操控性大增。在越野賽事中，Lust Advanced的大小與加速比29吋更優秀。而Intrigue完美結合穩定、操控與靈敏等優勢，可輕易越過各種地形與賽道，是林道賽事的最佳選擇。」\r\n \r\n除了上述的全新車款，Liv/giant推出Tempt系列為27.5吋鋁合金單避震自行車，讓更多女性騎士都可以享受27.5吋平台與優點。Tempt系列的跨高較低，尺寸適當，適合初學者及追求運動健身效果的的女性登山車首愛好者。\r\n \r\n以下為Liv/giant將在2014年推出搭載27.5吋平台的越野自行車系：\r\n \r\nObsess Advanced（高級碳纖單避震越野自行車）\r\nLust Advanced（高級碳纖全避震越野自行車，台灣未販售）\r\nLust（ALUXX SL鋁合金全避震越野自行車）\r\nIntrigue（ALUXX SL鋁合金全避震登山林道自行車）\r\nTempt（ALUXX鋁合金單避震越野自行車）\r\n \r\n2014年Liv/giant  27.5吋越野自行車將於今夏起在捷安特與Liv/giant全球通路販售。\r\n \r\n※實際規格以台灣上市為主。\r\n※台灣預計9月份上市。', 'test6.jpg', '2013-07-31'),
(11, '長征圓夢 募笑容 弘道第4屆不老騎士 重機車、摩托車、電動自', '弘道老人福利基金會第4屆「不老騎士」將於9月29日從屏東縣恆春鎮啟程，並將以3天時間，橫跨7個縣市、挑戰310公里路程，預計在10月1日抵達臺中市政府，當日正好是國際老人日，不老騎士們除了以行動展現台灣的不老追夢精神外，更將提出迎老倡議宣言，號召大家「歡喜做老人」，一起募及萬人白髮笑容照片！\r\n \r\n 今年「不老騎士」陣容龐大，在包括JTI、太古汽車、捷安特及自行車暨健康科技工業研究發展中心(以下簡稱CHC)等企業、單位的公益支持下，首度加入電動自行車隊，再加上重機車隊與摩托車隊，3支車隊共45位騎士齊出發；同時有來自包括 JTI、CHC、高雄醫學大學的志工約70人將分別擔任交管或陪騎志工，捷安特與太古汽車也分別派出專業技師及支援車，一路守護車隊的安全與順利；此外，為確保騎士們的健康與安全，也將有兩位來自國軍馬祖醫院的護士擔任隨隊醫護志工，而透過「環台醫療策略聯盟」的協助，全程更將有兩部救護車跟隨在車隊後方，隨時因應各種突發狀況。\r\n \r\n \r\n3車隊50騎士，年紀最長89歲，演員曾江也來了！\r\n 今年重機車隊部份，再度由71歲的美國Discovery頻道製作人史塔(Peter Starr)帶領7位平均年齡68歲的美國騎士來台參與；摩托車隊部份，則有20位平均年齡78歲的長輩參與，年紀最大的是來自臺北市的89歲郭深森爺爺，陣中唯一女騎士則是77歲的劉邱壬妹。\r\n \r\n 而最考驗體力的電動自行車隊則有18位平均年齡64歲的騎士參與，藉由電動自行車的智能動力助踩系統，讓300公里路程不再那麼遙遠，追夢變得更容易了！而其中最高齡是來自香港的知名演員曾江，今年已經78歲的他參與超過上百部港片演出的曾江，螢光幕前的形象總是帶著梟雄般的霸氣，早年曾以「射雕英雄傳」中的「黃藥師」一角紅極一時，之後，在許多江湖電影中都可見其演出身影，包括「跛豪」中的探長「雷老虎」等。\r\n \r\n    曾江去年底曾受邀參加「不老騎士-歐兜邁環台日記」在香港的電影特映會，電影中不老騎士們熱血追夢的精神也勾起他年輕時騎摩托車拍片的回憶，這次他原本想參與摩托車騎乘，但因駕照已在幾年前繳回，重考也來不及，所以改參加電動自行車隊，他也將參加10月1日由臺中市政府主辦的國際老人日「友善樂齡‧幸福臺中」論壇活動，分享自己的「老」經驗。\r\n   \r\n \r\n傳遞不老夢想 募集白髮笑容\r\n  第四屆不老騎士們9月29日上午8點在屏東縣恆春鎮東門啟程，啟程典禮上，由弘道老人福利基金會與公益支持企業JTI共同授旗給不老騎士，並由JTI台灣總經理柯邁謙(Marchant Kuys)代表揮動出征大旗，揭開第4屆「不老騎士」的圓夢之旅。\r\n \r\n 因應車隊前進速度不同，將兵分三路前進，但部份地點將大集合將一路北上，第一晚將下榻於高雄市仁武區，挑戰距離是100公里；第二天更將挑戰140公里路程，一路前進至雲林縣斗南鎮；第三天則預計在下午三點之前完成70公里路程，並於臺中市政府前廣場達陣。\r\n \r\n 本屆不老騎士除了一圓自己的追夢之夢，更身負多項重要任務，除將參訪老人安養機構，將追夢活力與勇氣帶給更多長者外；不老騎士們也將在旅程中寄出一張夢想明信片，向一位朋友分享追夢心情，並鼓勵朋友也能用具體行動，為自己打造精采生活與多元生命價值。\r\n \r\n 第四屆不老騎士也將擔任圓夢大使，陪伴住在屏東縣潮州鎮的80歲陳順發阿公圓夢。獨居的陳順發阿公腳會突發性失去知覺，也會突發性的耳鳴、暈眩，因此無法全程參與不老騎士活動，但他早年也住在恆春鎮，為了做生意，常常騎著機車到臺北市批貨，再回南部販售，小從日常生活用品，大到豬公都曾載過，當年的奮鬥往事歷歷在目，讓他很希望也可以成為不老騎士。\r\n \r\n 弘道潮州志工站在安全前提下幫阿公圓夢，因此，帶著陳順發阿公與第四屆不老騎士一起從恆春鎮出發，感受一小段追夢的快樂，並在車隊抵達潮州鎮後，由陳順發阿公代表擔任歡迎大使，歡迎車隊抵達，並帶領志工與鎮民一起為不老騎士們獻上祝福。\r\n \r\n 此外，第四屆不老騎士們更將一路募集「白髮笑容」照片，響應弘道將於10月1日提出的「迎老倡議-歡喜做老人」，透過白髮笑容照片的收集，希望帶動更多人發現白髮笑容之美，進而不再恐老、懼老。不老騎士們不只是圓夢，更要為打造高齡友善城市盡一份心力。\r\n \r\n \r\n行前體能培訓 認真學習不缺席\r\n 因應這場長征，弘道也從7月20日起展開連續8週，每週一天的培訓課程，來自全台灣各地的不老騎士不辭辛苦，每週準時報到，除了培養團隊默契與情感之外，也邀請中國醫藥大學運動治療師陳韋均來為長輩們進行體能與肌耐力的訓練，主要著重在強化心肺功能及下肢膝力與核心肌肉訓練，同時也教導騎士們透過正確而適當的伸展，適時紓緩筋骨；此外，弘道也帶領不老騎士與志工們在9月初進行40公里路程的試騎，幫助長輩們適應團體車隊前進模式。\r\n \r\n 第四屆不老騎士年紀最長的是來自臺北市的89歲郭深森爺爺，他說，他一直都有環島的想法，但因找不到伴而無法成行，去年兒女帶他去看「不老騎士-歐兜邁環台日記」電影後，讓他重燃環島夢，為了期待有一天成為不老騎士，他天天運動，保持良好的體能，報名面試時，他更是超級有信心的表示：「我年紀最大，身體又很好，不錄取我要錄取誰呢？」\r\n \r\n 此外，來自高雄市的86歲爺爺鄭學錦雖然住的遠，但從沒請過假，每次為了到臺中市參加培訓課程，他清晨4點就起床，5點半騎機車從家中到高鐵左營站，搭高鐵抵達台中新烏日站後，再搭台鐵區間車到台中火車站，然後換搭公車到弘道總會辦公室，雖然每次都要如此奔波，他卻一點都不嫌累，甚至還會主動為自己安排體能加強訓練。\r\n \r\n    鄭學錦爺爺說，他5年前第一次看到不老騎士短版紀錄片後，就一直請女兒幫忙留意弘道老人福利基金會是否再舉辦類似活動，並且要記得幫他報名，結果去年又錯過報名的時間，讓鄭爺爺又氣又惱的跟女兒說「再沒有報名上，要打你們屁股！」\r\n \r\n    而在自行車隊中， 住在臺中市的75歲陳松增阿公平日就是弘道的志工，陳阿公說，自己的人生很平淡，希望老的時候可以塗點彩色，增加美麗的記憶，所以一聽到第四屆不老騎士有自行車隊時，馬上就報名參加，為了準備這趟旅程，除了天天維持打網球外，也天天騎20公里的自行車來訓練自己，他說：「身為台灣人，一定要認識台灣，以前都是坐車看，現在要騎自行車慢慢看。」\r\n \r\n \r\n 台灣不老精神 重塑國際看老新角度\r\n 弘道老人福利基金會董事長王乃弘表示，第一屆不老騎士其中10位平均已經87歲的不老騎士在8月前往美西展開「不老騎士美國騎蹟之旅」，他們展現的不老精神感動無數美國人；而這次第四屆不老騎士同樣有來自美國、香港等地的國際騎士加入，透過這些行動，讓國際看見台灣在銀髮浪潮下的軟實力與社會力外，更希望藉此傳揚不老精神與微孝行動，重塑他國社會大眾對老化的觀感與正向態度。\r\n \r\n 王乃弘也表示，弘道在幫助長輩圓夢，再創長輩生命新價值的同時，更希望慢慢改變大眾看老的觀念，希望讓大家不再恐老、懼老，在學習尊老、惜老的過程中，更能看見白髮之智與美，進而愛老，因此，在未來的一年內，弘道希望號召大眾一起來拍攝「白髮笑容」透過大眾的鏡頭，帶領我們一起看見白髮的美麗與活力，進而扭轉看老角度。歡迎社會大眾上弘道官網或臉書粉絲團查詢活動詳情。\r\n \r\n  JTI台灣總經理柯邁謙(Marchant Kuys)也表示：「JTI長期投注公益的力量，深入長者關懷的領域，希望在滿足長者生活的基本需求外，也能主動關心他們的心靈，鼓勵長者勇於追夢。」JTI已連續4年支持弘道不老夢想活動，總累計成功激勵6,780位長者活出不老精神。今年要做的不僅僅是讓社會看見這些長者們的活力，鼓勵長者融入社會，更要告訴民眾，實行孝道只要發揮一點點的力量，幫助、尊重及鼓勵長輩們勇敢追夢，就是實現『微孝』精神最好的方法。', 'test7.jpg', '2013-09-27');

-- --------------------------------------------------------

--
-- 表的結構 `newsproduct`
--

CREATE TABLE IF NOT EXISTS `newsproduct` (
  `news_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  PRIMARY KEY (`news_ID`,`product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=big5;

--
-- 轉存資料表中的資料 `newsproduct`
--

INSERT INTO `newsproduct` (`news_ID`, `product_ID`) VALUES
(1, 1),
(1, 2),
(1, 7),
(1, 8),
(1, 9),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20);

-- --------------------------------------------------------

--
-- 表的結構 `orderitem`
--

CREATE TABLE IF NOT EXISTS `orderitem` (
  `order_no` int(10) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `orderitem_buyQty` int(11) NOT NULL,
  PRIMARY KEY (`order_no`,`product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=big5;

--
-- 轉存資料表中的資料 `orderitem`
--

INSERT INTO `orderitem` (`order_no`, `product_ID`, `orderitem_buyQty`) VALUES
(102, 1, 5),
(102, 2, 3),
(103, 1, 5),
(103, 2, 3),
(104, 1, 5),
(104, 2, 3),
(105, 1, 5),
(105, 2, 3),
(105, 7, 2),
(105, 8, 1),
(105, 9, 3),
(106, 1, 5),
(106, 2, 3),
(106, 7, 2),
(106, 8, 1),
(106, 9, 3),
(107, 1, 5),
(107, 2, 3),
(107, 7, 2),
(107, 8, 1),
(107, 9, 3),
(109, 1, 3),
(110, 2, 1),
(110, 7, 1),
(113, 1, 1),
(115, 1, 5),
(115, 2, 3),
(115, 7, 5),
(116, 1, 1),
(116, 2, 4),
(117, 1, 1),
(118, 2, 1),
(119, 1, 1),
(119, 2, 1),
(119, 7, 1);

-- --------------------------------------------------------

--
-- 表的結構 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `product_name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商品名稱',
  `type_ID` int(11) DEFAULT NULL COMMENT '商品種類ID',
  `product_price` int(11) DEFAULT NULL COMMENT '商品價錢',
  `product_quantity` int(11) DEFAULT NULL COMMENT '商品庫存數量',
  `product_image_path` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商品圖片位址',
  PRIMARY KEY (`product_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='商品清單' AUTO_INCREMENT=27 ;

--
-- 轉存資料表中的資料 `product`
--

INSERT INTO `product` (`product_ID`, `product_name`, `type_ID`, `product_price`, `product_quantity`, `product_image_path`) VALUES
(1, '高級單車', 4, 123, 48, './images/product/1.jpg'),
(2, '運動衣', 3, 123, 48, './images/product/2.jpg'),
(7, '人身物品001', 1, 123, 49, './images/product/4.jpg'),
(8, '人身物品002', 1, 123, 50, './images/product/5.jpg'),
(9, '帽子', 1, 123, 50, './images/product/6.jpg'),
(10, '人身物品003', 1, 123, 50, './images/product/8.jpg'),
(11, '排汗褲', 1, 123, 50, './images/product/9.jpg'),
(12, '產品1', 1, 123, 50, './images/product/10.jpg'),
(13, '產品2', 1, 123, 50, './images/product/11.jpg'),
(14, '產品3', 1, 123, 50, './images/product/12.jpg'),
(15, '產品4', 1, 123, 50, './images/product/13.jpg'),
(16, '產品5', 1, 123, 50, './images/product/0.jpg'),
(17, '產品6', 2, 123, 50, './images/product/7.jpg'),
(18, '產品7', 2, 123, 50, './images/product/14.jpg'),
(19, '產品8', 2, 123, 50, './images/product/15.jpg'),
(20, '產品9', 2, 123, 50, './images/product/16.jpg'),
(21, '產品10', 2, 123, 50, './images/product/17.jpg'),
(22, '產品11', 2, 123, 50, './images/product/18.jpg'),
(23, '產品12', 2, 123, 50, './images/product/19.jpg'),
(24, '產品13', 2, 123, 50, './images/product/20.jpg'),
(25, '產品14', 2, 123, 50, './images/product/21.jpg'),
(26, '產品15', 2, 123, 50, './images/product/22.jpg');

-- --------------------------------------------------------

--
-- 表的結構 `product_type`
--

CREATE TABLE IF NOT EXISTS `product_type` (
  `type_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品編號',
  `type_name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商品名稱',
  PRIMARY KEY (`type_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- 轉存資料表中的資料 `product_type`
--

INSERT INTO `product_type` (`type_ID`, `type_name`) VALUES
(1, '人身物品'),
(2, '單車配件'),
(3, '傳動變速'),
(4, '單車'),
(5, '維修保養');

-- --------------------------------------------------------

--
-- 表的結構 `shopcart`
--

CREATE TABLE IF NOT EXISTS `shopcart` (
  `member_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `shopcart_buyQty` int(11) NOT NULL,
  PRIMARY KEY (`member_ID`,`product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=big5;

--
-- 轉存資料表中的資料 `shopcart`
--

INSERT INTO `shopcart` (`member_ID`, `product_ID`, `shopcart_buyQty`) VALUES
(28, 1, 5),
(28, 2, 3),
(28, 7, 2),
(28, 8, 1),
(28, 9, 3);

--
-- 匯出資料表的 Constraints
--

--
-- 資料表的 Constraints `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `authority_id` FOREIGN KEY (`authority_id`) REFERENCES `authority` (`authority_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
