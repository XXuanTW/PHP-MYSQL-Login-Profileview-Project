-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `gtms`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `account` varchar(10) NOT NULL,
  `password` varchar(16) NOT NULL,
  `type` int(1) NOT NULL COMMENT '1=student 2=teacher 3=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`account`, `password`, `type`) VALUES
('A10723006', 'XXX', 1),
('A10723017', 'XXX', 3),
('A10723036', 'XXX', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `now`
--

CREATE TABLE `now` (
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `now`
--

INSERT INTO `now` (`year`) VALUES
(2020);

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--

CREATE TABLE `student` (
  `name` varchar(5) NOT NULL,
  `stno` varchar(10) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `topicno` int(8) NOT NULL,
  `leader` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `student`
--

INSERT INTO `student` (`name`, `stno`, `sex`, `tel`, `email`, `topicno`, `leader`) VALUES
('蔡佳玲', 'A10723006', 'F', '0978787878', 'A10723006@yuntech.ed', 20200001, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `teacher`
--

CREATE TABLE `teacher` (
  `no` varchar(10) NOT NULL,
  `name` varchar(5) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `teacher`
--

INSERT INTO `teacher` (`no`, `name`, `tel`, `email`) VALUES
('A10723036', 'OUO', '0912345678', 'LULUOUO@yunt.edu.tw'),
('T108951', '林文揚', '0900358845', 'T108951@nku.edu.tw');

-- --------------------------------------------------------

--
-- 資料表結構 `topicdata`
--

CREATE TABLE `topicdata` (
  `No` int(8) NOT NULL,
  `year` int(4) NOT NULL,
  `name` varchar(10) NOT NULL,
  `teacherno` varchar(10) NOT NULL,
  `score` int(3) NOT NULL,
  `price` varchar(500) NOT NULL,
  `document` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `exe` varchar(20) NOT NULL,
  `post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `topicdata`
--

INSERT INTO `topicdata` (`No`, `year`, `name`, `teacherno`, `score`, `price`, `document`, `code`, `exe`, `post`) VALUES
(20200001, 2020, '專題1', 'T108951', 100, '第一名', '001.pdf', '001.zip', '001.exe', '001.png');

-- --------------------------------------------------------

--
-- 資料表結構 `worker`
--

CREATE TABLE `worker` (
  `year` int(4) NOT NULL,
  `teacher` varchar(5) NOT NULL,
  `worker` varchar(11) NOT NULL,
  `Judge1` varchar(5) NOT NULL,
  `Judge2` varchar(5) NOT NULL,
  `Judge3` varchar(5) NOT NULL,
  `time` date NOT NULL,
  `place` varchar(50) NOT NULL,
  `no1` int(8) NOT NULL,
  `no2` int(8) NOT NULL,
  `no3` int(8) NOT NULL,
  `no4` int(8) NOT NULL,
  `post` varchar(11) NOT NULL,
  `scoretable` varchar(11) NOT NULL,
  `ticket` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `worker`
--

INSERT INTO `worker` (`year`, `teacher`, `worker`, `Judge1`, `Judge2`, `Judge3`, `time`, `place`, `no1`, `no2`, `no3`, `no4`, `post`, `scoretable`, `ticket`) VALUES
(2020, '黃純敏', '030.csv', '黃xx', '朱xx', '李xx', '2020-06-06', '雲科大禮堂', 0, 0, 0, 0, '030.png', '030.docx', '2020.docx');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account`);

--
-- 資料表索引 `now`
--
ALTER TABLE `now`
  ADD PRIMARY KEY (`year`);

--
-- 資料表索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stno`),
  ADD KEY `stno` (`stno`);

--
-- 資料表索引 `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no` (`no`);

--
-- 資料表索引 `topicdata`
--
ALTER TABLE `topicdata`
  ADD PRIMARY KEY (`No`),
  ADD KEY `teacherno` (`teacherno`);

--
-- 資料表索引 `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`year`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
