
CREATE TABLE `ORDER` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_name` varchar(20) NOT NULL,
  `order_num` int(11) NOT NULL DEFAULT 0,

  `order_cancel_hash` varchar(40) NOT NULL DEFAULT 0,
  `order_trans_id` int(11) NOT NULL,

  `order_address_code` int(11) NOT NULL,
  `order_address` text NOT NULL,
  `order_receiver_name` varchar(20) NOT NULL,
  `order_phone` varchar(20) NOT NULL,
  `order_timestamp` datetime DEFAULT NULL,

  `order_title` varchar(20) NOT NULL DEFAULT 0,
  `order_tax_id` varchar(20) NOT NULL DEFAULT 0,
  
  `order_success` int(11) NOT NULL DEFAULT 0,
  `order_delivery` int(11) NOT NULL DEFAULT 0,
  


  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


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