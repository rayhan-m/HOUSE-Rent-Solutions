/*
MySQL Data Transfer
Source Host: localhost
Source Database: homerent
Target Host: localhost
Target Database: homerent
Date: 9/24/2019 12:01:00 AM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `adminid` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phn_no` varchar(11) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `postid` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `details` varchar(500) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`postid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for booking
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `bookid` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `flatid` int(10) DEFAULT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `house_number` varchar(50) DEFAULT NULL,
  `flat_type` varchar(50) DEFAULT NULL,
  `flat_no` varchar(20) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `phn_no` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `msg` varchar(200) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for building
-- ----------------------------
DROP TABLE IF EXISTS `building`;
CREATE TABLE `building` (
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `house_name` varchar(100) DEFAULT NULL,
  `house_number` varchar(100) DEFAULT NULL,
  `road_number` varchar(100) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `post_code` int(10) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for expense
-- ----------------------------
DROP TABLE IF EXISTS `expense`;
CREATE TABLE `expense` (
  `expenseid` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `expense_type` varchar(50) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `month` varchar(20) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`expenseid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for feedback
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `feedbackid` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `flatid` int(10) DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `approvement` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`feedbackid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for flat
-- ----------------------------
DROP TABLE IF EXISTS `flat`;
CREATE TABLE `flat` (
  `flatid` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `house_number` varchar(30) DEFAULT NULL,
  `flat_type` varchar(50) DEFAULT NULL,
  `flat_no` varchar(20) DEFAULT NULL,
  `rent` int(10) DEFAULT NULL,
  `service_charge` int(10) DEFAULT NULL,
  `security_deposit` varchar(100) DEFAULT NULL,
  `flat_release_policy` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `flat_size` int(10) DEFAULT NULL,
  `bedroom` int(10) DEFAULT NULL,
  `bathroom` int(10) DEFAULT NULL,
  `phn_no` int(11) DEFAULT NULL,
  `bkash` int(11) DEFAULT NULL,
  `conditions` varchar(300) DEFAULT NULL,
  `facilities` varchar(300) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `availability` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`flatid`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for flat_type
-- ----------------------------
DROP TABLE IF EXISTS `flat_type`;
CREATE TABLE `flat_type` (
  `typeid` int(10) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`typeid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for leave_notice
-- ----------------------------
DROP TABLE IF EXISTS `leave_notice`;
CREATE TABLE `leave_notice` (
  `lnid` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `flatid` int(10) DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `file` varchar(150) DEFAULT '',
  `date` varchar(30) DEFAULT NULL,
  `status` varchar(50) DEFAULT '',
  `approvement` varchar(50) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`lnid`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for notice
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `noticeid` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`noticeid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for owner
-- ----------------------------
DROP TABLE IF EXISTS `owner`;
CREATE TABLE `owner` (
  `ownerid` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phn_no` varchar(11) DEFAULT NULL,
  `nid` int(15) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ownerid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `paymentid` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `flatid` int(10) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `rent` int(10) DEFAULT NULL,
  `payment_date` varchar(50) DEFAULT NULL,
  `payment_month` varchar(50) DEFAULT NULL,
  `tr_id` varchar(100) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`paymentid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tenant
-- ----------------------------
DROP TABLE IF EXISTS `tenant`;
CREATE TABLE `tenant` (
  `user_id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phn_no` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `entry_month` varchar(50) DEFAULT NULL,
  `exit_month` varchar(50) DEFAULT NULL,
  `flatid` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tenant_reg_form
-- ----------------------------
DROP TABLE IF EXISTS `tenant_reg_form`;
CREATE TABLE `tenant_reg_form` (
  `regid` int(10) NOT NULL AUTO_INCREMENT,
  `tenantid` int(10) DEFAULT NULL,
  `flatid` int(10) DEFAULT NULL,
  `house_number` varchar(50) DEFAULT NULL,
  `road_number` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `post_code` int(10) DEFAULT NULL,
  `tenant_name` varchar(50) DEFAULT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `dob` varchar(30) DEFAULT NULL,
  `marital_status` varchar(30) DEFAULT NULL,
  `address1` varchar(200) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `phn_num1` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nid_no1` int(14) DEFAULT NULL,
  `passport_no` int(16) DEFAULT NULL,
  `ref_name` varchar(50) DEFAULT NULL,
  `relation` varchar(50) DEFAULT NULL,
  `address2` varchar(200) DEFAULT NULL,
  `phn_num2` int(11) DEFAULT NULL,
  `housewife_name` varchar(50) DEFAULT NULL,
  `nid_no2` int(14) DEFAULT NULL,
  `address3` varchar(200) DEFAULT NULL,
  `phn_num3` int(11) DEFAULT NULL,
  `driver_name` varchar(50) DEFAULT '',
  `nid_no3` int(14) DEFAULT NULL,
  `address4` varchar(200) DEFAULT NULL,
  `phn_num4` int(11) DEFAULT NULL,
  `pre_owner_name` varchar(50) DEFAULT NULL,
  `address5` varchar(200) DEFAULT NULL,
  `phn_num5` int(11) DEFAULT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`regid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'Super Admin', 'Admin', 'admin', 'admin@gmail.com', '01742857306', 'Mirpur', 'upload/20190816_182340.jpg');
INSERT INTO `blog` VALUES ('00000001', 'owner', 'abc', '09/15/2019', 'dfhghg', 'Published', 'blog/custom-front-doors.jpg');
INSERT INTO `blog` VALUES ('00000003', 'owner', 'Registration notice', '09/15/2019', 'fgjghj jghf ghjfgjgfj jhghfjgjh jghjgfjfg yu6uytht uytyurtuyr', 'Published', 'blog/2.png');
INSERT INTO `booking` VALUES ('0000000047', '26', 'owner', '320', 'Family House', 'A1', 'upload/City-2Queen-beds-window-NEW-wide.jpg', 'rayhan', 'rayhan mahmud', '1742857306', 'rayhan35@diit.info', 'I want to book this flat', 'Leaved');
INSERT INTO `booking` VALUES ('0000000048', '27', 'mahmud', '477', 'Sublet', 'B2', 'upload/4371959006c91ae3_2171-w521-h304-b0-p0--modern-bedroom.jpg', 'rayhan_mahmud', 'rayhan mahmud', '1742857306', 'rayhan35@diit.info', 'I want to book this flat', 'Leaved');
INSERT INTO `booking` VALUES ('0000000049', '27', 'mahmud', '477', 'Sublet', 'B2', 'upload/4371959006c91ae3_2171-w521-h304-b0-p0--modern-bedroom.jpg', 'rayhan', 'rayhan mahmud', '1742857306', 'rayhan35@diit.info', 'I want to Book this Flat.', 'Approved');
INSERT INTO `building` VALUES ('28', 'owner', 'Ma Monjil', '320', '289', 'West Shewrapara', '1216', 'Its a nice house', 'upload/gettyimages-479767332-612x612.jpg', 'Public');
INSERT INTO `building` VALUES ('29', 'mahmud', 'Mahbub House', '477', '289', 'West Shewrapara', '1216', 'Its a sweet house', 'upload/images_(1).jpg', 'Public');
INSERT INTO `expense` VALUES ('0000000006', 'Utility Bill', '2000', '16 Sep 2019', 'September', 'Confirmed', 'owner');
INSERT INTO `expense` VALUES ('0000000007', 'Utility Bill', '2000', '16 Sep 2019', 'September', 'Confirmed', 'mahmud');
INSERT INTO `feedback` VALUES ('10', 'rayhan', '26', 'owner', 'Door Problem', 'Its broken.please repair it.', 'upload/custom-front-doors.jpg', '09/16/2019', 'Done', 'Accepted');
INSERT INTO `feedback` VALUES ('11', 'rayhan_mahmud', '27', 'mahmud', 'Door Problem', 'Door not working', 'upload/custom-front-doors.jpg', '09/16/2019', 'Done', 'Accepted');
INSERT INTO `flat` VALUES ('26', 'owner', '320', 'Family House', 'A1', '15000', '2000', '1 Month rent', 'Leace notice before 2 month', 'Mirpur', '1200', '3', '2', '1742857306', '1742857306', 'Keep clean always. ', '1. Lift\r\n2. Always water\r\n', 'upload/City-2Queen-beds-window-NEW-wide.jpg', 'Public', 'Available');
INSERT INTO `flat` VALUES ('27', 'mahmud', '477', 'Sublet', 'B2', '20000', '3000', '1 Month rent', 'Leave Notice before 2 month', 'Mirpur', '1500', '3', '2', '123456789', '1521254564', 'Test', 'Test', 'upload/4371959006c91ae3_2171-w521-h304-b0-p0--modern-bedroom.jpg', 'Public', 'Booked');
INSERT INTO `flat` VALUES ('28', 'mahmud', '477', 'Bachelor Mess', 'A10', '10000', '1000', '1 Month rent', 'Leave Notice before 2 month', 'Mirpur', '1000', '2', '2', '123456789', '1742857306', 'jhgdf', 'hkjdsgj', 'upload/superior-queen-2-1900w.jpg', 'Public', 'Available');
INSERT INTO `flat_type` VALUES ('1', 'family');
INSERT INTO `flat_type` VALUES ('19', 'mess11');
INSERT INTO `leave_notice` VALUES ('34', 'rayhan', '26', 'owner', 'leaveNotice/Sample-Letter-Giving-Notice.pdf', '09/16/2019', 'done', 'Accepted', 'old');
INSERT INTO `leave_notice` VALUES ('35', 'rayhan_mahmud', '27', 'mahmud', 'leaveNotice/Sample-Letter-Giving-Notice.pdf', '09/16/2019', 'done', 'Accepted', 'old');
INSERT INTO `notice` VALUES ('11', 'owner', 'new notice', '09/16/2019', 'notice/Sample-Letter-Giving-Notice.pdf', 'Published');
INSERT INTO `notice` VALUES ('12', 'mahmud', 'new notice', '09/16/2019', 'notice/House_Rent_Solutions.pdf', 'Published');
INSERT INTO `owner` VALUES ('0000000004', 'Rayhan Mahmud', 'owner', '123456', 'rayhan35@diit.info', '01742857306', '5353456', 'Mirpur', 'upload/20190816_182340.jpg', 'Active');
INSERT INTO `owner` VALUES ('0000000008', 'Mahmud Rayhan', 'mahmud', '123456', 'mahmud35@diit.info', '01521254564', '123456789', 'Mirpur', 'upload/1234.png', 'Active');
INSERT INTO `payment` VALUES ('0000000016', '26', 'rayhan', 'owner', '15000', '16 Sep 2019', 'January', 'D4dsD5', 'Bkash', 'Paid');
INSERT INTO `payment` VALUES ('0000000017', '27', 'rayhan_mahmud', 'mahmud', '20000', '16 Sep 2019', 'January', 'D4dsD5', 'Bkash', 'Paid');
INSERT INTO `payment` VALUES ('0000000018', '27', 'rayhan_mahmud', 'mahmud', '20000', '16 Sep 2019', 'February', '-----', 'Cash', 'Paid');
INSERT INTO `tenant` VALUES ('0000000014', 'Rayhan', 'Mahmud', 'rayhan', '123', 'rayhan35@diit.info', '01742857306', 'mirpur', 'upload/1234.png', 'mahmud', 'September 2019', 'September 2019', '27');
INSERT INTO `tenant` VALUES ('0000000017', 'Rayhan', 'Mahmud', 'rayhan_mahmud', '123', 'rayhan35@diit.info', '01742857306', 'Dhanmondi', 'upload/20190816_182340.jpg', 'mahmud', 'September 2019', 'September 2019', '27');
INSERT INTO `tenant_reg_form` VALUES ('8', '14', '26', '320', '289', 'West Shewrapara', '1216', 'Rayhan', 'sample', '2019-09-03', 'Unmarried', 'kalkini', 'DIU', 'islam', 'BSc', '1742857306', 'rayhan35@diit.info', '123456789', '123456789', 'Kobir Hossain', 'Uncle', 'kalkini', '1521254564', 'Rohima', '123456789', 'kalkini', '174000000', 'Rohim', '123456789', 'dhaka', '174000000', 'Akkas mia', 'farmgate', '140000000', 'Job transfer', 'done', 'rayhan');
INSERT INTO `tenant_reg_form` VALUES ('9', '17', '27', '477', '289', 'West Shewrapara', '1216', 'Mahmud Rayhan', 'Mofazzal Haque', '1997-06-30', 'Unmarried', 'kalkini', 'DIU', 'islam', 'BSc', '1521254564', 'rayhan35@diit.info', '123456789', '1231456789', 'Kobir Hossain', 'Uncle', 'kalkini', '1521254564', 'Rohima', '123456789', 'kalkini', '1521254564', 'Rohim', '213456987', 'dhaka', '1521254564', 'Akkas mia', 'farmgate', '1521254564', 'Job transfer', 'done', 'rayhan_mahmud');
