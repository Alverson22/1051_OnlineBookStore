-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-23 19:48:21
-- 伺服器版本: 10.1.19-MariaDB
-- PHP 版本： 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `onlinebookstore`
--

-- --------------------------------------------------------

--
-- 資料表結構 `books`
--

CREATE TABLE `books` (
  `ISBN` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `BookName` varchar(50) CHARACTER SET utf32 NOT NULL,
  `Holders` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `books`
--

INSERT INTO `books` (`ISBN`, `Author`, `Type`, `BookName`, `Holders`) VALUES
('0123456789', '王小明', '健康', '吃得健康', '洪家楷'),
('21231231', '王勇磬', '財經', '如何致富', '洪家楷'),
('987-654-321', '王大陸', '娛樂', '大平台', 'LDE'),
('Test01', 'Test01', 'Test01', 'Test01', '洪家楷'),
('Test02', 'Test02', 'Test02', 'Test02', 'LDE');

-- --------------------------------------------------------

--
-- 資料表結構 `borrower`
--

CREATE TABLE `borrower` (
  `Borrower` varchar(50) NOT NULL,
  `Cellphone` varchar(255) NOT NULL,
  `BookName` varchar(255) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `Loaner_Number` int(100) NOT NULL,
  `Loaner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `loaner`
--

CREATE TABLE `loaner` (
  `Loaner` varchar(50) NOT NULL,
  `Cellphone` varchar(255) NOT NULL,
  `BookName` varchar(255) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `Loaner_Number` int(100) NOT NULL,
  `Borrower` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `StudentID` varchar(255) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Cellphone` varchar(10) DEFAULT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `members`
--

INSERT INTO `members` (`StudentID`, `Name`, `Cellphone`, `Address`, `Email`, `Password`) VALUES
('00357022', '洪家楷', '0912345678', 'XXX', '00357022@ntou.edu.mail', '00357022'),
('00357140', 'LDE', '1234567', '123', '123@123', '00357140');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN`);

--
-- 資料表索引 `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`Loaner_Number`);

--
-- 資料表索引 `loaner`
--
ALTER TABLE `loaner`
  ADD PRIMARY KEY (`Loaner_Number`);

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `Name` (`Name`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `borrower`
--
ALTER TABLE `borrower`
  MODIFY `Loaner_Number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 使用資料表 AUTO_INCREMENT `loaner`
--
ALTER TABLE `loaner`
  MODIFY `Loaner_Number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
