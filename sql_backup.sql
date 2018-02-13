-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsql-ipg58.eigbox.net
-- Generation Time: Feb 12, 2018 at 06:56 PM
-- Server version: 5.6.37
-- PHP Version: 4.4.9
-- 
-- Database: `marsql`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `event`
-- 

CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `type` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `event`
-- 

INSERT INTO `event` VALUES (1, 'Register Domain', '2017-09-12', 'work');
INSERT INTO `event` VALUES (2, 'Register Class For Spring Semester', '2017-10-23', 'school');
INSERT INTO `event` VALUES (3, 'Fall 2017 Semester Ends', '2017-12-12', 'school');
INSERT INTO `event` VALUES (5, 'Concert: Coldplay', '2017-10-06', 'life');
INSERT INTO `event` VALUES (6, 'Concert: Ludovico Einaudi', '2017-10-19', 'life');
INSERT INTO `event` VALUES (7, 'Fall 2017 Class Ends', '2017-12-01', 'school');
INSERT INTO `event` VALUES (8, 'Spring 2018 Class Begins', '2018-01-08', 'school');
INSERT INTO `event` VALUES (9, 'Start Learning Japanese', '2017-02-08', 'life');
INSERT INTO `event` VALUES (10, 'Concert: Hamilton', '2017-11-29', 'life');
INSERT INTO `event` VALUES (11, 'Concert: Jingle Ball', '2017-12-01', 'life');
INSERT INTO `event` VALUES (12, 'Fly to San Fransico', '2017-11-22', 'life');
INSERT INTO `event` VALUES (13, 'Scope Interview', '2018-01-26', 'work');
INSERT INTO `event` VALUES (14, 'Big Bear Lake', '2018-01-27', 'life');
INSERT INTO `event` VALUES (15, 'Spring 2018 Class Ends', '2018-05-09', 'school');
INSERT INTO `event` VALUES (16, '2018 Spring Breaks', '2018-03-10', 'life');
INSERT INTO `event` VALUES (17, '2018 Chinese New Year', '2018-02-16', 'life');

-- --------------------------------------------------------

-- 
-- Table structure for table `log`
-- 

CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- 
-- Dumping data for table `log`
-- 

INSERT INTO `log` VALUES (1, '日本へ留学しようと思っている。今からとても楽しみだ。', '2017-09-17 03:17:26');
INSERT INTO `log` VALUES (2, '時々遠いピアノ教室へ行きたくないから、寮の辺のピアノがある部屋を行く。', '2017-09-17 03:23:05');
INSERT INTO `log` VALUES (3, '今日友達と一緒に映画を見た。「あの花」という映画だ。実はこの映画見たことがある。(笑)\r\nめんま！とてもかわいい！', '2017-09-18 03:06:50');
INSERT INTO `log` VALUES (4, '最近デジタルピアノを買った。ピアノを弾きたい時にいつでもできるの。', '2017-09-18 03:13:56');
INSERT INTO `log` VALUES (5, 'Perfect pitch is in a way a precondition for all the things to be natively fluent in music. I believe that all children all babies are born with perfect pitch. What happens is that they lose it because it is not reinforced and nobody tells them that an f-sharp is an f-sharp, a b-flat is a b-flat, so how are they to know. Consider how we learn our colors. It is constant, uninterrupted repetition day after day of the names of the various colors. Essentially, the brain receives a bunch of input through the eyes and through the ears. We see a whole spread spectrum of colors from violet to red, and we identify them by people telling us constantly that red is red and green is green and blue is blue. It is the same way we hear a bunch of frequencies from about sixteen to twenty thousand Hertz, and we hear this all the time but nobody is telling us that it is the G is a G so how are we to know. Now think how babies learn their native language. They hear the same word repeated endlessly day after day day in day out. They collect statistics on them, and after a while meanings begin to attach to individual words. The same thing is happening to the sounds. They hear these sounds repeatedly and they hear all kinds of sounds in nature, but these eighty-eight sounds, in fact, they hear more often than the other sounds so as they''re collecting statistics on their sounds. These eighty-eight are beginning to gain on the other sounds.', '2017-09-22 09:54:08');
INSERT INTO `log` VALUES (6, 'さっき、車を運転するのを習った。交差点があると、右にか左に曲がることができる。', '2017-09-27 13:58:38');
INSERT INTO `log` VALUES (7, '今日中に読まなければならない文章がたくさんあって。もしかしたら今日中におわらないかもしれないの。', '2017-09-27 14:14:58');
INSERT INTO `log` VALUES (8, '学校の食堂はあまりおいしくないので、今晩友達と一緒に「ココ壱番屋」というレストランへ行った。', '2017-09-28 01:49:59');
INSERT INTO `log` VALUES (9, '今朝、運転免許をもらった。今から、自分で車を運転することがあるよ', '2017-10-25 23:45:16');
INSERT INTO `log` VALUES (10, '新しい車を安全に運転するために、車を借りて、友達と晩ご飯を食べに行った。', '2017-10-27 19:40:38');
INSERT INTO `log` VALUES (11, 'Three planes while listening to music: (1) the sensuous plane, (2) the expressive plane, which might not have a specific or unanimous word to describe, (3) the sheerly musical plane, of which listeners should increase awareness. Active listener. Not just listening, but listening for something.', '2017-11-29 19:51:31');
INSERT INTO `log` VALUES (12, '餃子の作り方を教えてもらいたいとおもいましたが、あなたは起きなさそうですから、出前を頼んでしまいました。', '2017-12-19 23:23:20');
INSERT INTO `log` VALUES (13, '一年間ずっと日本語を勉強してきました。これからもずっと勉強していきます', '2017-12-25 23:11:06');
INSERT INTO `log` VALUES (14, '小さい時、母にピアノを練習させられました。', '2018-01-03 09:51:49');
INSERT INTO `log` VALUES (15, 'ウェブサイトのバックエンドシステムとログインシステムが完成されたんですわ', '2018-01-11 03:09:42');

-- --------------------------------------------------------

-- 
-- Table structure for table `progress`
-- 

CREATE TABLE `progress` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `progress`
-- 

INSERT INTO `progress` VALUES (1, 'Spring 2018 Semester', '2018-01-08', '2018-05-09');
INSERT INTO `progress` VALUES (2, 'Year 2018', '2018-01-01', '2018-12-31');
INSERT INTO `progress` VALUES (3, 'Spring Recess', '2018-03-10', '2018-03-18');
INSERT INTO `progress` VALUES (4, 'Summer Vacation', '2018-05-09', '2018-08-16');
INSERT INTO `progress` VALUES (5, 'Sophomore Housing', '2018-08-15', '2019-05-08');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `id` varchar(16) NOT NULL,
  `name` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `type` varchar(10) NOT NULL,
  `info` text,
  `coin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` VALUES ('tanjx', 'Mars Tan', '3cda028accb6fe535d7db5ed6231e8ff33379c34', 'jianxuat@usc.edu', 'admin', NULL, 0);
