-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2018 at 05:08 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `central_city_blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `blog_name` varchar(45) NOT NULL,
  `blog_description` text,
  `blog_post_date` datetime NOT NULL,
  `blog_post_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `category_id`, `blog_name`, `blog_description`, `blog_post_date`, `blog_post_user`) VALUES
(5, 21, 'MotherBoard', 'Lorem Ipsom Delor\r\n							\r\n						', '2018-04-15 13:50:09', 8),
(6, 21, 'CMOS', 'Life without CMOS							\r\n						', '2018-04-15 13:50:42', 8),
(7, 22, 'Business 101', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed scelerisque nunc malesuada mauris fermentum commodo. Integer non pellentesque augue, vitae pellentesque tortor. Ut gravida ullamcorper dolor, ac fringilla mauris interdum id. Nulla porta egestas nisi, et eleifend nisl tincidunt suscipit. Suspendisse massa ex, fringilla quis orci a, rhoncus porta nulla. Aliquam diam velit, bibendum sit amet suscipit eget, mollis in purus. Sed mattis ultricies scelerisque. Integer ligula magna, feugiat non purus eget, pharetra volutpat orci. Duis gravida neque erat, nec venenatis dui dictum vel. Maecenas molestie tortor nec justo porttitor, in sagittis libero consequat. Maecenas finibus porttitor nisl vitae tincidunt.							\r\n						', '2018-04-15 14:59:45', 11),
(8, 22, 'Business 102', '		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed scelerisque nunc malesuada mauris fermentum commodo. Integer non pellentesque augue, vitae pellentesque tortor. Ut gravida ullamcorper dolor, ac fringilla mauris interdum id. Nulla porta egestas nisi, et eleifend nisl tincidunt suscipit. Suspendisse massa ex, fringilla quis orci a, rhoncus porta nulla. Aliquam diam velit, bibendum sit amet suscipit eget, mollis in purus. Sed mattis ultricies scelerisque. Integer ligula magna, feugiat non purus eget, pharetra volutpat orci. Duis gravida neque erat, nec venenatis dui dictum vel. Maecenas molestie tortor nec justo porttitor, in sagittis libero consequat. Maecenas finibus porttitor nisl vitae tincidunt.					\r\n						', '2018-04-15 15:04:44', 11),
(9, 22, 'Business 103', '	function addBlog(){\r\n\r\n\r\n			$(\"#addBlogForm\").submit(function(event){\r\n				event.preventDefault();\r\n				//alert(\'submit\');\r\n				//alert($(\'#addBlogForm\').serialize());\r\n				$.ajax({\r\n							type: \"POST\",\r\n							url : \"<?php echo base_url(\'category_and_blog_controller/add_blog_action\')?>\",\r\n							dataType: \"json\",\r\n							data :$(\'#addBlogForm\').serialize(),\r\n							success:function(data){\r\n								if(data.code ==\"200\"){\r\n									//window.location=\"register\";\r\n									//alert(\"Success: \" + data.msg);\r\n									$(\".display-success\").css(\"display\",\"block\");\r\n									$(\".display-error\").css(\"display\",\"none\");\r\n									$(\"#addBlogForm\").trigger(\"reset\");\r\n									//$(\"#category_list_div\").load();\r\n									removeSuccessMessage();\r\n\r\n									\r\n									\r\n								}else{\r\n									$(\".display-error\").html(\"<ul>\" + data.msg + \"</ul>\");\r\n									$(\".display-error\").css(\"display\",\"block\");\r\n									$(\".display-success\").css(\"display\",\"none\");\r\n								}\r\n							}\r\n\r\n						});\r\n			});\r\n		}\r\n							\r\n						', '2018-04-15 15:38:22', 11),
(10, 21, 'Digital Electronics', '	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed scelerisque nunc malesuada mauris fermentum commodo. Integer non pellentesque augue, vitae pellentesque tortor. Ut gravida ullamcorper dolor, ac fringilla mauris interdum id. Nulla porta egestas nisi, et eleifend nisl tincidunt suscipit. Suspendisse massa ex, fringilla quis orci a, rhoncus porta nulla. Aliquam diam velit, bibendum sit amet suscipit eget, mollis in purus. Sed mattis ultricies scelerisque. Integer ligula magna, feugiat non purus eget, pharetra volutpat orci. Duis gravida neque erat, nec venenatis dui dictum vel. Maecenas molestie tortor nec justo porttitor, in sagittis libero consequat. Maecenas finibus porttitor nisl vitae tincidunt.						\r\n						', '2018-04-15 16:13:01', 11);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(21, 'Computer'),
(22, 'Business'),
(23, 'Arts'),
(24, 'Musics'),
(25, 'Foods');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `blogger_name` varchar(85) NOT NULL,
  `position` varchar(45) NOT NULL,
  `company` varchar(100) NOT NULL,
  `address` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `blogger_name`, `position`, `company`, `address`, `username`, `password`) VALUES
(8, 'Ivan Christian Jay Funcion', 'DevOps Engineer', 'Justice League', 'Central City', 'godspeed', 'godspeed'),
(9, 'Alexis Rhodes', 'Duelists Level 5', 'Obelisk Blue', 'Fissure Island', 'alexisrhodes', 'alexisrhodes'),
(10, 'Alexis Rhodes', 'Duelist', 'Obelisk Blue', 'Fissure Island', 'alexisrhodes', 'alexisrhodes'),
(11, 'Shannela Almira Funcion', 'Head Blogger', 'Insta Institute', 'Bacolod', 'almira17', 'almira17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
