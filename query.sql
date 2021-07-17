CREATE TABLE `coupons` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `coupon_code` varchar(50) NOT NULL,
 `discount` int(10) NOT NULL COMMENT 'it is in percentage for now',
 `no_of_attempts` int(10) NOT NULL COMMENT 'no of times coupon can be used',
 `no_of_used` int(10) NOT NULL COMMENT 'no of time coupon is used',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='main table to store coupons';

ALTER TABLE `coupons` CHANGE `no_of_used` `no_of_used` INT(10) NOT NULL DEFAULT '0' COMMENT 'no of time coupon is used';