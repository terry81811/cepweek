-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2014 年 05 月 02 日 11:44
-- 伺服器版本: 5.5.37
-- PHP 版本: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫: `cepweek_db`
--

-- --------------------------------------------------------

--
-- 表的結構 `ORDER_TABLE`
--

CREATE TABLE IF NOT EXISTS `ORDER_TABLE` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_name` varchar(20) NOT NULL,
  `order_num` int(11) NOT NULL DEFAULT '0',
  `order_cost` int(11) NOT NULL DEFAULT '0',
  `order_cancel_hash` varchar(70) NOT NULL DEFAULT '0',
  `order_type` varchar(11) NOT NULL,
  `order_email` varchar(40) NOT NULL,
  `order_phone` varchar(20) NOT NULL,
  `order_timestamp` datetime DEFAULT NULL,
  `order_title` varchar(20) NOT NULL DEFAULT '0',
  `order_tax_id` varchar(20) NOT NULL DEFAULT '0',
  `order_address` text NOT NULL,
  `order_add_num` int(11) NOT NULL,
  `order_acc_name` varchar(50) NOT NULL,
  `order_bank_id` varchar(5) NOT NULL,
  `order_last_id` varchar(5) NOT NULL,
  `order_success` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- 轉存資料表中的資料 `ORDER_TABLE`
--

INSERT INTO `ORDER_TABLE` (`order_id`, `order_name`, `order_num`, `order_cost`, `order_cancel_hash`, `order_type`, `order_email`, `order_phone`, `order_timestamp`, `order_title`, `order_tax_id`, `order_address`, `order_add_num`, `order_acc_name`, `order_bank_id`, `order_last_id`, `order_success`) VALUES
(20, '林中一', 16, 6240, '434ef7529cfe8dcad5dcb6d19215c81a8ee814389411e07d507e5c260a2e690f', 'remittance', 'argoskenny@gmail.com', '0955905623', '2014-04-30 06:17:02', '五一八網路科技公司', '', '新北市三重區重新路五段609巷4號5樓 ', 24159, '林中一', '822', '57112', 0),
(21, '劉撫', 1, 540, 'f1f1fc612065b6b060d80b5cc70c15f85bc1f8940d8c2613a05be0d14337203f', 'webatm', 'falongk@yahoo.com.tw', '0920369080', '2014-04-30 12:15:06', '', '', '', 0, '', '', '', 0),
(22, '安祥', 15, 5850, 'e568000acc173eca974930329e128bb4d10d339b1680d7460ad004433bf9db18', 'remittance', 'an1539@ms10.hinet.net', '0917680829', '2014-04-30 16:03:26', '', '', '', 820, '安祥', '009', '45285', 0),
(23, '安祥', 15, 5850, 'ec429f7e20e808d961e310b0c8b2047f5c7861eb519359cb2c867cf2250c0374', 'remittance', 'an1539@ms10.hinet.net', '0917680829', '2014-04-30 16:06:02', '', '', '', 0, '安祥', '009', '45285', 0),
(24, '曾明彥', 3, 1320, '1aadcd07f654c3337b1cac8dd474a3302544bf809848073de75a4b305ad78017', 'remittance', 'r97b45027@ntu.edu.tw', '0910361311', '2014-04-30 16:07:33', '', '', '', 0, '曾明彥', '007', '40726', 0),
(25, '王俞文', 2, 930, '6da327e37eac7616377cd23b87e2b2b9795832171411e95e93b035170ad447b3', 'remittance', 'elsie_1201@hotmail.com', '0927188861', '2014-04-30 16:29:31', '', '', '', 0, '王俞文', '700', '47303', 0),
(26, '陳旻均', 1, 540, 'bb674238d80416dad74505438db6f6ffb1eda67e2f0255121051dc71cde03f96', 'webatm', 'b99504035@ntu.edu.tw', '0988269056', '2014-04-30 16:31:15', '', '', '', 0, '', '', '', 0),
(27, '林品卉', 1, 540, '8b9eb40f2523475f20d70bd2591f87f90bfe58239344fbaa56e42c6536112998', 'remittance', 'pin081807@gmail.com', '0972313712', '2014-04-30 16:37:22', '', '', '', 0, '林品卉', '700', '49399', 0),
(28, '古安智', 1, 540, 'ff801dc7e5ee3b4ae1c50b24a653d41ad5168766c0aeadf73240cb71f4ed39aa', 'remittance', 'naturalgoo100@gmail.com', '0930-721-816', '2014-04-30 16:43:42', '', '', '', 0, '古安智', '700', '46908', 0),
(29, '劉佳怡', 2, 930, 'd8687602ae72e590f83ec8cc91fc506a319ee40af749efef5c1c3eba3486e6a1', 'remittance', 'L11263@ms38.hinet.net', '0916123190', '2014-04-30 16:52:25', '', '', '', 0, '劉佳怡', '812', '12776', 0),
(30, '劉佳怡', 2, 930, '95f1ea3c0464d7db686c9e68e0d8afdf4e2ee4642664b739ea2ca195f9ce6e3f', 'remittance', 'L11263@ms38.hinet.net', '0916123190', '2014-04-30 16:55:44', '', '', '', 0, '劉佳怡', '812', '12776', 0),
(31, '楊舒凡', 1, 540, '14d5a277eab672ca5983e15f349c343eec34687510f6c7eb92e51b4fa8eaf076', 'remittance', 'may78119@hotmail.com', '0928193758', '2014-04-30 17:00:33', '', '', '', 0, '楊舒凡', '700', '53476', 0),
(32, '劉佳怡', 2, 930, '32343d38b22968abc5e87563668f041bc796ea2c689a28abdf287bea9d2dc58a', 'remittance', 'L11263@ms38.hinet.net', '0916123190', '2014-04-30 17:02:16', '', '', '', 0, '劉佳怡', '812', '12776', 0),
(33, '劉佳怡', 5, 2100, 'f2dc0ed3ffc05129bc311b27022d9b67b938576da23203e23ec977ac398f447c', 'remittance', 'L11263@ms38.hinet.net', '0916123190', '2014-04-30 17:05:50', '', '', '', 0, '劉佳怡', '812', '12776', 0),
(34, '黃湘寧', 1, 540, 'e5add9ab2324f4973c91c51fde5f7dc264b84960ec941be0902c68a2b933f33c', 'remittance', 'evajob@msn.com', '0989001998', '2014-04-30 17:15:18', '', '', '', 0, '黃湘寧', '007', '29794', 0),
(35, '黃湘寧', 1, 540, '491115c8d9e078fe3a25bb39dda70d416bb4f239a25256fc7bb957014882913b', 'remittance', 'evajob@msn.com', '0989001998', '2014-04-30 17:16:07', '', '', '', 0, '黃湘寧', '007', '29794', 0),
(36, '許祐甄', 2, 930, '8b5d353a411a6f4d7eea8f52207efbea09df14303e7cca5e23d229bca173a136', 'webatm', 'every2ever@gmail.com', '0928218096', '2014-04-30 18:34:34', '', '', '', 0, '', '', '', 0),
(37, '許祐甄', 2, 930, 'd20d99f190d3e21da216db5b2d5a67ddc1f3981abad88791dd5fa9a0b1020cda', 'remittance', 'every2ever@gmail.com', '0928218096', '2014-04-30 18:38:49', '', '', '', 0, '許祐甄', '822', '41513', 0),
(38, '蔡譯頡', 2, 930, '5079fc62016aa8c9c3f196a0bfeeb7c21aa4e3d65061e23e8cab86563c72378e', 'remittance', 'geo0975@hotmail.com', '0975268107', '2014-05-01 01:17:59', '', '', '', 0, '蔡譯頡', '012', '24636', 0),
(39, '闕淑美', 1, 540, '809a961ff9c6692fb2eb1b2634627827c8d2228ffaabff92d105b5cac410e104', 'webatm', 'smc@email.ctci.org.tw', '0952042767', '2014-05-01 02:01:43', '', '', '', 0, '', '', '', 0),
(40, '陳彥松', 1, 540, 'ceba18b925de612e73c654d6c0fa88afc0e8d40cd40eefbe56aab988607e06f6', 'webatm', 'b00901150@ntu.edu.tw', '0911001958', '2014-05-01 02:15:23', '', '', '', 0, '', '', '', 0),
(41, '沈俐', 1, 540, 'c028bdf09110c6add7a192898ab0ce0c0f39f95f8f8f1bcd0471cb277979e605', 'remittance', 'b00104032@ntu.edu.tw', '0910069880', '2014-05-01 02:33:18', '', '', '', 23576, '沈俐', '700', '07494', 0),
(42, '張雅筑', 14, 5460, '13e5da2d29fa83731d4df67e93456e23d107603469fb0e46acc7a8efd4ec180a', 'remittance', 'kidaimirai@gmail.com', '0911237599', '2014-05-01 04:29:51', '', '', '', 0, '張雅筑', '700', '65951', 0),
(43, '蔡淯妃', 1, 540, 'ed36a375e84ecde5bb372ddfd9febd486455953afabf149c145d176b27ac025d', 'webatm', 'b02406042@ntu.edu.tw', '0926193064', '2014-05-01 04:37:50', '', '', '', 10617, '', '', '', 0),
(45, '陳旻均', 1, 540, 'e61e167363bee1b85ff5c374135e9fbe5a8926b20032bce0ec8167258320ca02', 'remittance', 'b99504035@ntu.edu.tw', '0988269056', '2014-05-01 05:50:15', '', '', '', 0, '陳旻均', '021', '61537', 0),
(46, '郭家辰', 1, 540, 'c45a8b7084c9783988003ae36a5324ddbbe1e9c00921e260edd7c2d891d7a090', 'webatm', 'johnkuo7711@gmail.com', '0987-253-886', '2014-05-01 07:17:53', '', '', '', 0, '', '', '', 0),
(47, '郭家辰', 1, 540, '51b00e51a6a9ccf2030e14d5410e74d14d8163571107e6af15c6340e925020e4', 'webatm', 'johnkuo7711@gmail.com', '0987-253-886', '2014-05-01 07:18:52', '', '', '', 0, '', '', '', 0),
(48, '郭家辰', 1, 540, 'c1730a6d50b89068d2c7503fe9dc0c8b8b0f68bce8fa4a668791d01ef661a8ff', 'webatm', 'johnkuo7711@gmail.com', '0987-253-886', '2014-05-01 07:19:15', '', '', '', 0, '', '', '', 1),
(49, '郭家辰', 1, 540, 'e9a2b961e417e8f540ea0d3a436ffd00672b65d824f6d9958eb8249f69112ea4', 'webatm', 'johnkuo7711@gmail.com', '0987-253-886', '2014-05-01 07:21:47', '', '', '', 0, '', '', '', 0),
(50, '陳璿安', 2, 930, 'e1258870a81eff18269a07d39ab95b58e4ade2f184f13ee8ddcc6d369b9cbb6a', 'remittance', 'angor77712@gate.sinica.edu.tw', '0911-640-047', '2014-05-01 09:08:01', '', '', '', 0, '陳璿安', '700', '15302', 0),
(51, '蔡沛彤', 3, 1320, 'b57fc5beb6df30908ba26581390923e5c3279c6e0ce5f6d5dddc60246287b884', 'remittance', 'pei1125@hotmail.com', '0910-911925', '2014-05-01 11:13:31', '', '', '', 0, '蔡沛彤', '030', '82376', 0),
(52, '黃淑雲', 10, 3900, 'dfdbe1da960c387fd132f799d115e40a4bec04e9c4aa6ef23acfdf3077a21efa', 'remittance', 'dodo9155@gmail.com', '0921587106', '2014-05-01 11:55:41', '', '', '', 0, '黃淑雲', '004', '01615', 0),
(53, '黃纖雅', 1, 540, '15d7a48b5c62245c6f3f7260befa8c807a2c8705a6699feca3b4cb329ee2197d', 'remittance', 'b99504116@ntu.edu.tw', '0988-035-614', '2014-05-01 13:12:54', '', '', '', 0, '黃纖雅', '007', '35944', 0),
(54, '周賢杰', 6, 2490, 'e1ff50ee84af7c254765f6bb9446fa57b5c3ff807d56ebd9c0eb4b7819416272', 'remittance', 'tr751461@msa.tra.gov.tw', '0937890795', '2014-05-01 13:39:02', '', '', '', 0, '周', '700', '33394', 0),
(55, '劉禾塏', 2, 1080, '51e85462c10cdeb831442402f4c92ef32f6771a65cf627d0bd76b823ec9ab752', 'remittance', 'egg821022@gmail.com', '0975051135', '2014-05-01 13:57:44', '', '', '', 0, '陳燕惠', '700', '10975', 0),
(56, '周盈君', 2, 930, 'bcd3da98ed5e6250cba9993d9e9f555a8470736f7a6f75e0faf8388b1d276e9b', 'webatm', 'gaussjoy@gmail.com', '0988-219-889', '2014-05-01 14:03:52', '', '', '台中市西屯區福中里福中九街13巷18號', 0, '', '', '', 0),
(57, '周盈君', 2, 930, 'bc14281506d64260c29583ea4440f3af4022d91dccd12df9d04b7b7227802119', 'webatm', 'gaussjoy@gmail.com', '0988-219-889', '2014-05-01 14:05:33', '', '', '台中市西屯區福中里福中九街13巷18號', 0, '', '', '', 1),
(58, '闕淑美', 2, 930, 'd4f8dcde65d510d9e1ccdc783379e89dc26fb4a909e5c7b703e893ff405475aa', 'remittance', 'smc@email.ctci.org.tw', '0952042767', '2014-05-01 14:48:49', '', '', '', 0, '', '', '', 0),
(59, '林茂裕', 1, 540, 'de75819beabdf949f352c1cb597442048c694601d78a23b62101deaadbc8fcd3', 'remittance', 'stan.my.lin@gmail.com', '0939-337-433', '2014-05-01 15:12:28', '', '', '', 0, '林茂裕', '812', '18248', 0),
(60, '王儒慧', 2, 930, '4ed27dd503c5f7b0a5deeab08d93d4aa519a76b84cce0bc63a41e3636dbc9940', 'remittance', 't3919@ms25.hinet.net', '0926-116249', '2014-05-01 15:15:43', '', '', '', 0, '王儒慧', '700', '43323', 0),
(61, '黃雅鈴', 2, 1080, 'd47444444f7ecec0a95b3f1f7fa99e47258b8e79ce47d34a408fdf04efa7b530', 'remittance', 'i6348@hotmail.com', '0987-539-199', '2014-05-01 15:26:01', '', '', '', 0, '黃雅鈴', '812', '85567', 0),
(62, '徐美玉', 5, 2100, '78d83e587bf8e80390809a8281e44dbc09022dd2289011a06f153ef6155affe3', 'webatm', 'a2257268@yahoo.com.tw', '0933333889', '2014-05-01 15:26:43', '', '', '', 0, '', '', '', 0),
(63, '鄭筠榛', 5, 2100, 'c187fea694857bb2c1e533d814210e842807cb799beb8fe03967ae082cdf59f4', 'webatm', 'paticheng@ntu.edu.tw', '0988295258', '2014-05-02 01:16:00', '', '', '台北市大安區羅斯福路四段一號台大中文系203室', 106, '', '', '', 0),
(64, '蔡明訓', 1, 540, '22e27df78fced90e024d0d655dce9ebef81eb5ea5df06cd7c06ae1a86e67c478', 'webatm', 'terrytsai0811@gmail.com', '0972184329', '2014-05-02 02:13:30', '', '', '地址2', 111, '', '', '', 0),
(65, '陳春滿', 23, 8970, '971d736726cbda439dca4faf19c8bb22910ff995d8533a8860cfec84f0aaee9e', 'webatm', 'chunman@mail.mcu.edu.tw', '0973031260', '2014-05-02 03:33:33', '', '', '台北市士林區中山北路五段250號', 111, '', '', '', 0),
(66, '鄭喬木', 2, 930, 'ecedfcb5ef1afcd0606c218b1e72113dcba8ebb5b8eda1c444acfc65c0a8d345', 'remittance', 'chiaomu@gmail.com', '0936152314', '2014-05-02 03:40:35', '', '', '', 0, '鄭喬木', '008', '19277', 0),
(67, '陳春滿', 23, 8970, 'a0dcef9f1dd06ea919c0b3598deb168f3a3abe396bef448ae7d81bce09051193', 'webatm', 'chunman@mail.mcu.edu.tw', '0973031260', '2014-05-02 03:48:28', '', '', '台北市士林區中山北路五段250號', 111, '', '', '', 0),
(68, '陳春滿', 23, 8970, '2bf591d177156c3982f5f52c32e1e73cad018966fe34f003dccf3c801851f3f4', 'webatm', 'chunman@mail.mcu.edu.tw', '0973031260', '2014-05-02 03:54:42', '', '', '台北市士林區中山北路五段250號', 111, '', '', '', 0),
(69, '陳春滿', 23, 8970, 'b42f4f1de06048fa22a5790c1552e7e4fdd9c18df269eb2bea5f13e74b20dd45', 'webatm', 'chunman@mail.mcu.edu.tw', '0973031260', '2014-05-02 03:58:50', '', '', '台北市士林區中山北路五段250號', 111, '', '', '', 1),
(70, '阮明利', 3, 1320, '2c8e98c148e1722c7400cea99fe72d0772eb5a29df25a0b8e9bca19e5ba616b0', 'remittance', 'mlroan@ttu.edu.tw', '0982-184-974', '2014-05-02 04:01:31', '', '', '', 0, '阮明利', '822', '05861', 0),
(71, '陳春滿', 23, 8970, '91d78c0e053599943db3901a32639b6ba0dac2488c942f794455c11587c2f4fd', 'webatm', 'chunman@mail.mcu.edu.tw', '0973031260', '2014-05-02 04:09:01', '', '', '台北市士林區中山北路五段250號', 111, '', '', '', 0),
(72, '林若馨', 2, 930, 'e5d83b9c6ea024287815edb6bc29ce09f42a48332745665419e1a6850e3ebf40', 'remittance', 'b99a01244@ntu.edu.tw', '0937980054', '2014-05-02 04:38:42', '', '', '', 0, '林若馨', '700', '27588', 0),
(73, '蔡政達', 1, 540, 'a595d4dc10511a1158c6524227d946a7da858aa043a6cf942927f02099c286c4', 'webatm', 'cdtsai@ntu.edu.tw', '0920416538', '2014-05-02 05:28:27', '無', '無', '台北市民生東路3段117號13樓', 105, '', '', '', 1),
(74, '劉振豪', 1, 540, '42b6fb96187c52a87af58c9fa44baae0a1329f048c6004a76a10907ac99e7527', 'webatm', 'sherlock-08226@email.esunbank.com.tw', '0920369080；022175131', '2014-05-02 05:34:39', '', '', '', 0, '', '', '', 0),
(75, '劉振豪', 1, 540, '55356f2543f4fc96dc7e1b7d7ca52cb5241bbb45a5b5459e712e597cfe021e10', 'webatm', 'sherlock-08226@email.esunbank.com.tw', '0920369080', '2014-05-02 05:39:21', '', '', '', 0, '', '', '', 1),
(76, '王俊傑', 1, 540, 'f709476b9765a6d843fe257f2bd083cd97ba550c3aa1dd44a2acc1d7c2375724', 'webatm', 'fhyi.jjw@gmail.com', '0922322994', '2014-05-02 07:07:54', '', '', '', 0, '', '', '', 1),
(77, '王繼娟', 1, 540, '07ff5631aec7611a8e456e1b07f6b631d9f0d8e6ba000e014684f3d02e08b0b0', 'remittance', 'chichuan.wang@gmail.com', '0972782273', '2014-05-02 07:18:14', '', '', '', 0, '王繼娟', '700', '93561', 0),
(78, '葉芯憓', 1, 540, 'a44bc2a5d4df047be2d8956fe9ec95674575aa81ac106b149eb5054a22859780', 'remittance', 'zxp910407@gmail.com', '0921051894', '2014-05-02 11:11:58', '', '', '', 0, '葉芯憓', '700', '95945', 0);

-- --------------------------------------------------------

--
-- 表的結構 `RECEIVER_TABLE`
--

CREATE TABLE IF NOT EXISTS `RECEIVER_TABLE` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_order_id` int(11) NOT NULL,
  `rec_pay_success` int(1) NOT NULL DEFAULT '0',
  `rec_name` varchar(20) NOT NULL,
  `rec_num` int(11) NOT NULL DEFAULT '0',
  `rec_address_code` int(11) NOT NULL,
  `rec_address` text NOT NULL,
  `rec_phone` varchar(20) NOT NULL,
  `rec_arrive_time` varchar(10) NOT NULL,
  `rec_timestamp` datetime DEFAULT NULL,
  `rec_on_the_way` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rec_id`),
  UNIQUE KEY `rec_id` (`rec_id`),
  KEY `rec_order_id` (`rec_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=85 ;

--
-- 轉存資料表中的資料 `RECEIVER_TABLE`
--

INSERT INTO `RECEIVER_TABLE` (`rec_id`, `rec_order_id`, `rec_pay_success`, `rec_name`, `rec_num`, `rec_address_code`, `rec_address`, `rec_phone`, `rec_arrive_time`, `rec_timestamp`, `rec_on_the_way`) VALUES
(21, 20, 0, '五一八網路科技公司', 16, 24159, '新北市三重區重新路五段609巷4號5樓', '0955905623', '白天', '2014-04-30 06:17:02', 0),
(22, 21, 0, '劉大', 1, 205, '台北市test ', '09', '不指定', '2014-04-30 12:15:06', 0),
(23, 22, 0, '安祥', 15, 820, '高雄市岡山區岡山路99號1樓 誼美藥局', '0917680829', '5/12-5/15白', '2014-04-30 16:03:26', 0),
(24, 23, 0, '安祥', 15, 804, '高雄市鼓山區美術館路191號3樓', '0917680829', '5/12-5/15白', '2014-04-30 16:06:02', 0),
(25, 24, 0, '曾明彥', 3, 239, '新北市鶯歌區永昌里陽明街12號4樓', '0910361311', '白天', '2014-04-30 16:07:33', 0),
(26, 25, 0, '王俞文', 2, 220, '新北市板橋區文化路二段307號11樓', '0927188861', '白天', '2014-04-30 16:29:31', 0),
(27, 26, 0, '張碧燕', 1, 402, '台中市南區德富路378號12樓之一', '0910502000', '不指定', '2014-04-30 16:31:15', 0),
(28, 27, 0, '林品卉', 1, 351, '苗栗縣頭份鎮水源路339號', '0972313712', '晚上', '2014-04-30 16:37:22', 0),
(29, 28, 0, '古安智', 1, 222, '新北市深坑區北深路三段206巷一弄一號一樓', '0930-721-816', '白天', '2014-04-30 16:43:42', 0),
(30, 29, 0, '楊孟翰', 2, 235, '新北市中和區連城路258號6樓之5', '0930777889', '白天', '2014-04-30 16:52:25', 0),
(31, 30, 0, '簡慈儀', 2, 241, '新北市三重區平安街22號1樓', '0925196808', '白天', '2014-04-30 16:55:44', 0),
(32, 31, 0, '楊舒凡', 1, 51441, '彰化縣溪湖鎮彰水路三段194號', '0928193758', '不指定', '2014-04-30 17:00:33', 0),
(33, 32, 0, '劉佳音', 2, 112, '北市北投區公館路153號4樓', '0910200983', '白天', '2014-04-30 17:02:16', 0),
(34, 33, 0, '劉佳怡', 5, 100, '北市延平南路61號10樓C', '0916123190', '白天', '2014-04-30 17:05:50', 0),
(35, 34, 0, '黃湘寧', 1, 407, '台中市西屯區工業一路72巷60號6樓之一', '0989001998', '白天', '2014-04-30 17:15:18', 0),
(36, 34, 0, '', 0, 0, '', '', '白天', '2014-04-30 17:15:18', 0),
(37, 35, 0, '龍玉純', 1, 520, '520彰化縣員林鎮員大路二段46巷52弄20號', '04-8351974', '白天', '2014-04-30 17:16:07', 0),
(38, 35, 0, '', 0, 0, '', '', '白天', '2014-04-30 17:16:07', 0),
(39, 36, 0, '張硯詠', 2, 231, '新北市新店區大豐路16巷3弄13號9樓', '0911332075', '晚上', '2014-04-30 18:34:34', 0),
(40, 37, 0, '張硯詠', 2, 231, '新北市新店區大豐路16巷3弄13號9樓', '0911332075', '晚上', '2014-04-30 18:38:49', 0),
(41, 38, 0, '蔡譯頡', 2, 807, '高雄市三民區哈爾濱街113巷20號', '0975268107', '晚上', '2014-05-01 01:17:59', 0),
(42, 39, 0, '闕淑美', 1, 106, '北市大安區敦化南路2段97號8樓', '0952042767', '白天', '2014-05-01 02:01:43', 0),
(43, 40, 0, '陳國日', 1, 830, '高雄市鳳山區文衡路359號9樓', '0958131179', '晚上', '2014-05-01 02:15:23', 0),
(44, 41, 0, '沈俐', 1, 23576, '新北市中和區安平路89號4樓之3', '0910069880', '不指定', '2014-05-01 02:33:18', 0),
(45, 42, 0, '張雅筑', 14, 81155, '高雄市楠梓區後昌路512號', '0911237599', '5/9白天', '2014-05-01 04:29:51', 0),
(46, 43, 0, '蔡東穆', 1, 80052, '高雄市新興區南華路45號', '0981568491', '白天', '2014-05-01 04:37:51', 0),
(49, 45, 0, '張碧燕', 1, 402, '台中市南區德富路378號12樓之一', '0910502000', '不指定', '2014-05-01 05:50:15', 0),
(50, 46, 0, '劉文玲', 1, 971, '花蓮縣新城鄉大漢村華興街148巷1弄13號', '0987-190-589', '晚上', '2014-05-01 07:17:53', 0),
(51, 47, 0, '劉文玲', 1, 971, '花蓮縣新城鄉大漢村華興街148巷1弄13號', '0987-190-589', '晚上', '2014-05-01 07:18:52', 0),
(52, 48, 1, '劉文玲', 1, 971, '花蓮縣新城鄉大漢村華興街148巷1弄13號', '0987-190-589', '晚上', '2014-05-01 07:19:15', 0),
(53, 49, 0, '劉文玲', 1, 971, '花蓮縣新城鄉大漢村華興街148巷1弄13號', '0987-190-589', '晚上', '2014-05-01 07:21:47', 0),
(54, 50, 0, '蕭毓庭', 2, 70145, '台南市東區育樂街170號3樓306', '0919587277', '晚上', '2014-05-01 09:08:01', 0),
(55, 51, 0, '蔡沛彤', 3, 420, '台中市豐原區圓環南路23號4樓之1', '0910-911-925', '5/9(五)晚上', '2014-05-01 11:13:31', 0),
(56, 52, 0, '傅慧婷', 10, 830, '高雄市鳳山區瑞竹路211-1號', '0912881471', '5/9(五)白天', '2014-05-01 11:55:41', 0),
(57, 53, 0, '黃淑媛', 1, 950, '台東市樂利路32號', '0937-579-797', '5/11(日)白天', '2014-05-01 13:12:54', 0),
(58, 54, 0, '周', 6, 22405, '新', '0937890795', '5/9(五)晚上', '2014-05-01 13:39:03', 0),
(59, 55, 0, '陳品怡', 1, 242, '新北市新莊區明安西路266巷10號', '0988107880', '5/10(六)晚上', '2014-05-01 13:57:44', 0),
(60, 55, 0, '劉采璇', 1, 116, '台北市文山區景興路42巷2弄1號3樓', '0919288853', '5/10(六)晚上', '2014-05-01 13:57:44', 0),
(61, 56, 0, '周盈君', 2, 406, '台中市西屯區福中里福中九街13巷18號', '0988219889', '5/9(五)白天', '2014-05-01 14:03:52', 0),
(62, 57, 1, '周盈君', 2, 406, '台中市西屯區福中里福中九街13巷18號', '0988219889', '5/9(五)白天', '2014-05-01 14:05:33', 0),
(63, 58, 0, '闕淑美', 2, 106, '北市敦化南路2段97號8樓', '0952042767', '5/9(五)白天', '2014-05-01 14:48:49', 0),
(64, 59, 0, '林茂裕', 1, 114, '台北市內湖區成功路四段182巷8弄1號4樓', '0939-337-433', '不指定', '2014-05-01 15:12:28', 0),
(65, 60, 0, '王儒慧', 2, 513, '彰化縣埔心鄉經口村中山路207巷3弄8號', '0926-116249', '5/9(五)白天', '2014-05-01 15:15:43', 0),
(66, 61, 0, '吳得珊', 1, 261, '宜蘭縣頭城鎮三和路348號', '0920-608-823', '5/10(六)白天', '2014-05-01 15:26:01', 0),
(67, 61, 0, '黃雅鈴', 1, 701, '台南市東區林森路二段238-6號7樓', '0987-539-199', '不指定', '2014-05-01 15:26:01', 0),
(68, 62, 0, '徐美玉', 5, 700, '台南市中西區忠義路二段47號8樓', '0933333889', '5/9(五)白天', '2014-05-01 15:26:43', 0),
(69, 63, 0, '鄭筠榛', 5, 106, '台北市大安區羅斯福路四段一號台大中文系203室', '0988295258', '白天', '2014-05-02 01:16:00', 0),
(70, 64, 0, '蔡明訓測試', 1, 100, '地址1', '0972184329', '不指定', '2014-05-02 02:13:30', 0),
(71, 65, 0, '陳春滿', 23, 111, '台北市士林區中山北路五段250號(主控室)', '0973031260', '5/9(五)白天', '2014-05-02 03:33:33', 0),
(72, 66, 0, '鄭喬木', 2, 221, '新北市汐止區水源路二段36巷21號13樓', '0936152314', '5/9(五)晚上', '2014-05-02 03:40:35', 0),
(73, 67, 0, '陳春滿', 23, 111, '台北市士林區中山北路五段250號(主控室)', '0973031260', '5/9(五)白天', '2014-05-02 03:48:28', 0),
(75, 69, 1, '陳春滿', 23, 111, '台北市士林區中山北路五段250號', '0973031260', '5/9(五)白天', '2014-05-02 03:58:50', 0),
(76, 70, 0, '阮明利', 3, 104, '台北市中山區德惠街7-1號大同大學材料工程系', '0982-184-974', '白天', '2014-05-02 04:01:32', 0),
(78, 72, 0, '林若馨', 2, 940, '屏東縣枋寮鄉人和村民族路18號', '0937980054', '5/9(五)晚上', '2014-05-02 04:38:42', 0),
(80, 74, 0, '劉振豪', 1, 105, '台北市民生東路117號11樓（電子金融部）', '0920369080', '不指定', '2014-05-02 05:34:39', 0),
(81, 75, 1, '劉振豪', 1, 105, '台北市民生東路三段117號11樓（電子金融部）', '0920369080', '不指定', '2014-05-02 05:39:21', 0),
(82, 76, 1, '王俊傑', 1, 335, '桃園縣大溪鎮三元一街19巷2弄20號', '0922322994', '5/10(六)白天', '2014-05-02 07:07:54', 0),
(83, 77, 0, '王繼娟', 1, 244, '新北市林口區文化三路二段6號4樓', '0972782273', '5/9(五)晚上', '2014-05-02 07:18:14', 0),
(84, 78, 0, '葉芯憓', 1, 106, '臺北市大安區羅斯福路四段一號臺大農場內考種館', '0921051894', '5/9(五)白天', '2014-05-02 11:11:58', 0);

--
-- 匯出資料表的 Constraints
--

--
-- 資料表的 Constraints `RECEIVER_TABLE`
--
ALTER TABLE `RECEIVER_TABLE`
  ADD CONSTRAINT `RECEIVER_TABLE_ibfk_1` FOREIGN KEY (`rec_order_id`) REFERENCES `ORDER_TABLE` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
