<?php
include("connect_db.php");

// sql to create table

/*
CREATE TABLE `acc_banking` (
    `acc_bank_id` int(11) NOT NULL,
    `user_id` int(11) DEFAULT NULL,
    `bank_account_no` varchar(30) DEFAULT NULL,
    `bank_account_name` varchar(100) DEFAULT NULL,
    `bank_id` int(11) DEFAULT NULL,
    `bank_info` varchar(100) DEFAULT NULL,
    `verify_status` tinyint(4) DEFAULT NULL,
    `admin_verify_id` int(11) DEFAULT NULL,
    `bank_verify_pic` varchar(200) DEFAULT NULL,
    `active_status` tinyint(4) DEFAULT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  CREATE TABLE `acc_bookmarks` (
    `user_id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `bookmark_note` text DEFAULT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  CREATE TABLE `acc_comment` (
    `comment_id` int(11) NOT NULL,
    `user_id` int(11) DEFAULT NULL,
    `product_id` int(11) DEFAULT NULL,
    `creator_id` int(11) DEFAULT NULL,
    `comment_mode` tinyint(4) DEFAULT NULL,
    `comment` text DEFAULT NULL,
    `time_write` timestamp,
    `comment_status` tinyint(4) DEFAULT NULL,
    `reply_comment_id` int(11) DEFAULT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT  current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  CREATE TABLE `acc_contact` (
    `contact_id` int(11) NOT NULL,
    `user_id` int(11) DEFAULT NULL,
    `contact_type` tinyint(4) DEFAULT NULL,
    `contact_app` tinyint(4) DEFAULT NULL,
    `contact_show_name` varchar(100) DEFAULT NULL,
    `contact_data` varchar(200) DEFAULT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  CREATE TABLE `acc_following` (
    `creator_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `follow_priority` tinyint(4) DEFAULT NULL,
    `follow_mode` tinyint(4) DEFAULT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  CREATE TABLE `acc_like` (
    `product_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `like_mode` tinyint(4) DEFAULT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  CREATE TABLE `acc_paybuy` (
    `payment_id` varchar(10) NOT NULL,
    `product_id` int(11) DEFAULT NULL,
    `commission_id` varchar(10) DEFAULT NULL,
    `payer_id` int(11) DEFAULT NULL,
    `payment_mode` tinyint(4) DEFAULT NULL,
    `acc_banking_id` int(11) DEFAULT NULL,
    `price_total` float DEFAULT NULL,
    `note_addon` varchar(300) DEFAULT NULL,
    `ref1_slip` varchar(50) DEFAULT NULL,
    `ref2_slip` varchar(50) DEFAULT NULL,
    `img_slip` varchar(200) DEFAULT NULL,
    `time_slip` datetime DEFAULT NULL,
    `payment_status` tinyint(4) DEFAULT NULL,
    `admin_verify_id` int(11) DEFAULT NULL,
    `datetime_admin_verify` timestamp,
    `datetime_creator_verify` timestamp,
    `datetime_user_cofirm` timestamp
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  CREATE TABLE `acc_paybuy_code` (
    `payment_id` varchar(10) NOT NULL,
    `promotion_code` varchar(20) NOT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1; 
  CREATE TABLE `acc_user` (
    `user_id` int(11) NOT NULL,
    `username` varchar(20) DEFAULT NULL,
    `pic_user` varchar(200) DEFAULT NULL,
    `password` varchar(200) DEFAULT NULL,
    `email` varchar(100) DEFAULT NULL,
    `nickname` varchar(100) DEFAULT NULL,
    `first_name` varchar(50) DEFAULT NULL,
    `last_name` varchar(50) DEFAULT NULL,
    `gender` varchar(1) DEFAULT NULL,
    `date_birth` date DEFAULT NULL,
    `phone` varchar(10) DEFAULT NULL,
    `address` text DEFAULT NULL,
    `user_role` varchar(1) DEFAULT NULL,
    `recommend_commission` float DEFAULT NULL,
    `commission_status` tinyint(4) DEFAULT NULL,
    `id_card` varchar(13) DEFAULT NULL,
    `papercard_pic` varchar(200) DEFAULT NULL,
    `user_w_card_pic` varchar(200) DEFAULT NULL,
    `verify_status` tinyint(4) DEFAULT NULL,
    `admin_verify_id` int(11) DEFAULT NULL,
    `status_user` tinyint(4) DEFAULT NULL,
    `date_in_member` timestamp ,
    `date_in_creator` timestamp ,
    `timestamp_update` timestamp NOT NULL DEFAULT  current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  CREATE TABLE `bid_auction` (
    `bid_product_id` int(11) NOT NULL,
    `product_id` int(11) DEFAULT NULL,
    `start_datetime` datetime DEFAULT NULL,
    `expire_datetime` datetime DEFAULT NULL,
    `minimum_price` float DEFAULT NULL,
    `expected_price` float DEFAULT NULL,
    `total_round` int(11) DEFAULT NULL,
    `final_price` float DEFAULT NULL,
    `user_id` int(11) DEFAULT NULL,
    `bid_status` tinyint(4) DEFAULT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  
  CREATE TABLE `dict_banks` (
    `bank_id` int(11) NOT NULL,
    `bank_label` text DEFAULT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  CREATE TABLE `dict_category` (
    `category_id` int(11) NOT NULL,
    `label` varchar(120) DEFAULT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  
  CREATE TABLE `dict_tags` (
    `tags_id` int(11) NOT NULL,
    `tags_label` text DEFAULT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  
  CREATE TABLE `log_auction` (
    `product_bid_id` int(11) NOT NULL,
    `bid_product_id` int(11) DEFAULT NULL,
    `bid_round` int(11) DEFAULT NULL,
    `price_offer` float DEFAULT NULL,
    `user_id` int(11) DEFAULT NULL,
    `bid_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  

  
  CREATE TABLE `log_chatting` (
    `log_room_id` int(11) NOT NULL,
    `chat_room_id` varchar(10) DEFAULT NULL,
    `user_id` int(11) DEFAULT NULL,
    `text_type` tinyint(4) DEFAULT NULL,
    `text_chat` text DEFAULT NULL,
    `time_chat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  CREATE TABLE `mkt_commission` (
    `commission_id` varchar(10) NOT NULL,
    `user_id` int(11) DEFAULT NULL,
    `creator_id` int(11) DEFAULT NULL,
    `request_price` float DEFAULT NULL,
    `first_pay` float DEFAULT NULL,
    `job_color` tinyint(4) DEFAULT NULL,
    `job_scale` tinyint(4) DEFAULT NULL,
    `job_description` text DEFAULT NULL,
    `job_mature` tinyint(4) DEFAULT NULL,
    `job_private` tinyint(4) DEFAULT NULL,
    `job_category` int(11) DEFAULT NULL,
    `job_co_right_mode` tinyint(4) DEFAULT NULL,
    `datetime_limit` datetime DEFAULT NULL,
    `extend_time_status` tinyint(4) DEFAULT NULL,
    `commsission_status` tinyint(4) DEFAULT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `datetime_create` timestamp NOT NULL DEFAULT  current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  
  CREATE TABLE `mkt_product` (
    `product_id` int(11) NOT NULL,
    `creator_id` int(11) DEFAULT NULL,
    `product_name` varchar(50) DEFAULT NULL,
    `description` text DEFAULT NULL,
    `public_date` datetime DEFAULT NULL,
    `category_id` int(11) DEFAULT NULL,
    `default_price` float DEFAULT NULL,
    `quantity` int(11) DEFAULT NULL,
    `co_right_mode` tinyint(4) DEFAULT NULL,
    `sale_mode` tinyint(4) DEFAULT NULL,
    `mature_mode` tinyint(4) DEFAULT NULL,
    `product_status` tinyint(4) DEFAULT NULL,
    `access_mode` tinyint(4) DEFAULT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  
  
  CREATE TABLE `mkt_product_file` (
    `product_file_id` int(11) NOT NULL,
    `product_id` int(11) DEFAULT NULL,
    `show_status` tinyint(4) DEFAULT NULL,
    `gift_mode` tinyint(4) DEFAULT NULL,
    `show_priority` int(11) DEFAULT NULL,
    `file_id` varchar(200) DEFAULT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  
  CREATE TABLE `mkt_promotion` (
    `promotion_code` varchar(20) NOT NULL,
    `name_promotion` varchar(100) DEFAULT NULL,
    `duedate_start` datetime DEFAULT NULL,
    `duedate_end` datetime DEFAULT NULL,
    `promotion_type` varchar(1) DEFAULT NULL,
    `discount` float DEFAULT NULL,
    `detail` text DEFAULT NULL,
    `auto_use_free` tinyint(4) DEFAULT NULL,
    `cod_for_some_creator` int(11) DEFAULT NULL,
    `cod_for_some_category` int(11) DEFAULT NULL,
    `cod_counting` int(11) DEFAULT NULL,
    `cod_minimum_price` float DEFAULT NULL,
    `cod_maximum_discount` float DEFAULT NULL,
    `cod_use_together` tinyint(4) DEFAULT NULL,
    `promotion_status` tinyint(4) DEFAULT NULL,
    `created_by` int(11) DEFAULT NULL,
    `created_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  
  CREATE TABLE `pth_file` (
    `file_id` varchar(200) NOT NULL,
    `user_id` int(11) DEFAULT NULL,
    `file_path` text DEFAULT NULL,
    `file_topic` text DEFAULT NULL,
    `file_detail` text DEFAULT NULL,
    `file_type` varchar(50) DEFAULT NULL,
    `file_view` tinyint(4) DEFAULT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  
  CREATE TABLE `room_chatting` (
    `chat_room_id` varchar(10) NOT NULL,
    `room_name` varchar(10) DEFAULT NULL,
    `room_pic` varchar(10) DEFAULT NULL,
    `room_status` tinyint(1) DEFAULT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  CREATE TABLE `room_user` (
    `chat_room_id` varchar(10) NOT NULL,
    `user_id` int(11) NOT NULL,
    `name_aka` varchar(50) DEFAULT NULL,
    `timestamp_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  
  ALTER TABLE `acc_banking`
    ADD PRIMARY KEY (`acc_bank_id`),
    ADD KEY `bank_id` (`bank_id`),
    ADD KEY `bank_verify_pic` (`bank_verify_pic`),
    ADD KEY `user_id` (`user_id`),
    ADD KEY `admin_verify_id` (`admin_verify_id`);
  
  
  ALTER TABLE `acc_bookmarks`
    ADD PRIMARY KEY (`user_id`,`product_id`),
    ADD KEY `product_id` (`product_id`);
  
  ALTER TABLE `acc_comment`
    ADD PRIMARY KEY (`comment_id`),
    ADD KEY `product_id` (`product_id`),
    ADD KEY `creator_id` (`creator_id`),
    ADD KEY `user_id` (`user_id`);
  
  ALTER TABLE `acc_contact`
    ADD PRIMARY KEY (`contact_id`),
    ADD KEY `user_id` (`user_id`);
  
  ALTER TABLE `acc_following`
    ADD PRIMARY KEY (`creator_id`,`user_id`),
    ADD KEY `user_id` (`user_id`);
  
  ALTER TABLE `acc_like`
    ADD PRIMARY KEY (`product_id`,`user_id`),
    ADD KEY `user_id` (`user_id`);
  
  ALTER TABLE `acc_paybuy`
    ADD PRIMARY KEY (`payment_id`),
    ADD KEY `admin_verify_id` (`admin_verify_id`),
    ADD KEY `product_id` (`product_id`),
    ADD KEY `payer_id` (`payer_id`),
    ADD KEY `commission_id` (`commission_id`),
    ADD KEY `acc_banking_id` (`acc_banking_id`);
  
  ALTER TABLE `acc_paybuy_code`
    ADD PRIMARY KEY (`payment_id`,`promotion_code`),
    ADD KEY `promotion_code` (`promotion_code`);
  

  ALTER TABLE `acc_user`
    ADD PRIMARY KEY (`user_id`);

  ALTER TABLE `bid_auction`
    ADD PRIMARY KEY (`bid_product_id`),
    ADD KEY `product_id` (`product_id`),
    ADD KEY `user_id` (`user_id`);
  
  ALTER TABLE `dict_banks`
    ADD PRIMARY KEY (`bank_id`);
  
  ALTER TABLE `dict_category`
    ADD PRIMARY KEY (`category_id`);
  
  ALTER TABLE `dict_tags`
    ADD PRIMARY KEY (`tags_id`);
  
  ALTER TABLE `log_auction`
    ADD PRIMARY KEY (`product_bid_id`),
    ADD KEY `bid_product_id` (`bid_product_id`),
    ADD KEY `user_id` (`user_id`);
  
  ALTER TABLE `log_chatting`
    ADD PRIMARY KEY (`log_room_id`),
    ADD KEY `user_id` (`user_id`),
    ADD KEY `chat_room_id` (`chat_room_id`);
  
  ALTER TABLE `mkt_commission`
    ADD PRIMARY KEY (`commission_id`),
    ADD KEY `job_category` (`job_category`),
    ADD KEY `user_id` (`user_id`),
    ADD KEY `creator_id` (`creator_id`);
  
  ALTER TABLE `mkt_product`
    ADD PRIMARY KEY (`product_id`),
    ADD KEY `creator_id` (`creator_id`),
    ADD KEY `category_id` (`category_id`);
  
  ALTER TABLE `mkt_product_file`
    ADD PRIMARY KEY (`product_file_id`),
    ADD KEY `file_id` (`file_id`),
    ADD KEY `product_id` (`product_id`);
  
  ALTER TABLE `mkt_promotion`
    ADD PRIMARY KEY (`promotion_code`),
    ADD KEY `cod_for_some_category` (`cod_for_some_category`),
    ADD KEY `cod_for_some_creator` (`cod_for_some_creator`);
  
  ALTER TABLE `pth_file`
    ADD PRIMARY KEY (`file_id`),
    ADD KEY `user_id` (`user_id`);
  
  ALTER TABLE `room_chatting`
    ADD PRIMARY KEY (`chat_room_id`),
    ADD KEY `room_pic` (`room_pic`);
  
  ALTER TABLE `room_user`
    ADD PRIMARY KEY (`chat_room_id`,`user_id`),
    ADD KEY `user_id` (`user_id`);
  
  ALTER TABLE `acc_banking`
    ADD CONSTRAINT `acc_banking_ibfk_1` FOREIGN KEY (`bank_id`) REFERENCES `dict_banks` (`bank_id`),
    ADD CONSTRAINT `acc_banking_ibfk_2` FOREIGN KEY (`bank_verify_pic`) REFERENCES `pth_file` (`file_id`),
    ADD CONSTRAINT `acc_banking_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `acc_user` (`user_id`),
    ADD CONSTRAINT `acc_banking_ibfk_4` FOREIGN KEY (`admin_verify_id`) REFERENCES `acc_user` (`user_id`);
  
  ALTER TABLE `acc_bookmarks`
    ADD CONSTRAINT `acc_bookmarks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `acc_user` (`user_id`),
    ADD CONSTRAINT `acc_bookmarks_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `mkt_product` (`product_id`);
  
  ALTER TABLE `acc_comment`
    ADD CONSTRAINT `acc_comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `mkt_product` (`product_id`),
    ADD CONSTRAINT `acc_comment_ibfk_2` FOREIGN KEY (`creator_id`) REFERENCES `acc_user` (`user_id`),
    ADD CONSTRAINT `acc_comment_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `acc_user` (`user_id`);
  
  ALTER TABLE `acc_contact`
    ADD CONSTRAINT `acc_contact_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `acc_user` (`user_id`);
  
  ALTER TABLE `acc_following`
    ADD CONSTRAINT `acc_following_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `acc_user` (`user_id`),
    ADD CONSTRAINT `acc_following_ibfk_2` FOREIGN KEY (`creator_id`) REFERENCES `acc_user` (`user_id`);
  
  ALTER TABLE `acc_like`
    ADD CONSTRAINT `acc_like_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `mkt_product` (`product_id`),
    ADD CONSTRAINT `acc_like_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `acc_user` (`user_id`);
  
  ALTER TABLE `acc_paybuy`
    ADD CONSTRAINT `acc_paybuy_ibfk_1` FOREIGN KEY (`admin_verify_id`) REFERENCES `acc_user` (`user_id`),
    ADD CONSTRAINT `acc_paybuy_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `mkt_product` (`product_id`),
    ADD CONSTRAINT `acc_paybuy_ibfk_3` FOREIGN KEY (`payer_id`) REFERENCES `acc_user` (`user_id`),
    ADD CONSTRAINT `acc_paybuy_ibfk_4` FOREIGN KEY (`commission_id`) REFERENCES `mkt_commission` (`commission_id`),
    ADD CONSTRAINT `acc_paybuy_ibfk_5` FOREIGN KEY (`acc_banking_id`) REFERENCES `acc_banking` (`acc_bank_id`);
  ALTER TABLE `acc_paybuy_code`
    ADD CONSTRAINT `acc_paybuy_code_ibfk_1` FOREIGN KEY (`promotion_code`) REFERENCES `mkt_promotion` (`promotion_code`),
    ADD CONSTRAINT `acc_paybuy_code_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `acc_paybuy` (`payment_id`);
  ALTER TABLE `bid_auction`
    ADD CONSTRAINT `bid_auction_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `mkt_product` (`product_id`),
    ADD CONSTRAINT `bid_auction_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `acc_user` (`user_id`);
  ALTER TABLE `log_auction`
    ADD CONSTRAINT `log_auction_ibfk_1` FOREIGN KEY (`bid_product_id`) REFERENCES `bid_auction` (`bid_product_id`),
    ADD CONSTRAINT `log_auction_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `acc_user` (`user_id`);
  ALTER TABLE `log_chatting`
    ADD CONSTRAINT `log_chatting_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `acc_user` (`user_id`),
    ADD CONSTRAINT `log_chatting_ibfk_2` FOREIGN KEY (`chat_room_id`) REFERENCES `room_user` (`chat_room_id`);
  ALTER TABLE `mkt_commission`
    ADD CONSTRAINT `mkt_commission_ibfk_1` FOREIGN KEY (`job_category`) REFERENCES `dict_category` (`category_id`),
    ADD CONSTRAINT `mkt_commission_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `acc_user` (`user_id`),
    ADD CONSTRAINT `mkt_commission_ibfk_3` FOREIGN KEY (`creator_id`) REFERENCES `acc_user` (`user_id`);
  ALTER TABLE `mkt_product`
    ADD CONSTRAINT `mkt_product_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `acc_user` (`user_id`),
    ADD CONSTRAINT `mkt_product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `dict_category` (`category_id`);
  ALTER TABLE `mkt_product_file`
    ADD CONSTRAINT `mkt_product_file_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `pth_file` (`file_id`),
    ADD CONSTRAINT `mkt_product_file_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `mkt_product` (`product_id`);
  ALTER TABLE `mkt_promotion`
    ADD CONSTRAINT `mkt_promotion_ibfk_1` FOREIGN KEY (`cod_for_some_category`) REFERENCES `dict_category` (`category_id`),
    ADD CONSTRAINT `mkt_promotion_ibfk_2` FOREIGN KEY (`cod_for_some_creator`) REFERENCES `acc_user` (`user_id`);
  ALTER TABLE `pth_file`
    ADD CONSTRAINT `pth_file_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `acc_user` (`user_id`);
  ALTER TABLE `room_chatting`
    ADD CONSTRAINT `room_chatting_ibfk_1` FOREIGN KEY (`room_pic`) REFERENCES `pth_file` (`file_id`),
    ADD CONSTRAINT `room_chatting_ibfk_2` FOREIGN KEY (`chat_room_id`) REFERENCES `room_user` (`chat_room_id`);
  ALTER TABLE `room_user`
    ADD CONSTRAINT `room_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `acc_user` (`user_id`);
  COMMIT;

*/
$sql = "";

// if ($conn->multi_query($sql) === TRUE) {
//   echo "Table MyGuests created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }
echo "fff";

$conn->close();
?>