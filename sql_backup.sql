-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsql-ipg58.eigbox.net
-- Generation Time: Jan 21, 2018 at 05:03 PM
-- Server version: 5.6.37
-- PHP Version: 4.4.9
-- 
-- Database: `marsql`
-- 
CREATE DATABASE `marsql` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `marsql`;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `event`
-- 

INSERT INTO `event` VALUES (1, 'Register Domain', '2017-09-12', '');
INSERT INTO `event` VALUES (2, 'Register Class For Spring Semester', '2017-10-23', '');
INSERT INTO `event` VALUES (3, 'End of Fall 2017 Semester', '2017-12-12', '');
INSERT INTO `event` VALUES (4, 'Start of Spring 2018 Semester', '2018-01-08', '');
INSERT INTO `event` VALUES (5, 'Concert: Coldplay', '2017-10-06', '');
INSERT INTO `event` VALUES (6, 'Concert: Ludovico Einaudi', '2017-10-19', '');
INSERT INTO `event` VALUES (7, 'Fall 2017 Class Ends', '2017-12-01', '');
INSERT INTO `event` VALUES (8, 'Spring 2018 Class begins', '2018-01-08', '1');
INSERT INTO `event` VALUES (9, 'Start Learning Japanese', '2017-02-08', '2');
INSERT INTO `event` VALUES (10, 'Hamilton', '2017-11-29', '2');
INSERT INTO `event` VALUES (11, 'Jingle Ball', '2017-12-01', '2');
INSERT INTO `event` VALUES (12, 'Fly to San Fransico', '2017-11-22', '2');

-- --------------------------------------------------------

-- 
-- Table structure for table `log`
-- 

CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

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
-- Table structure for table `practice`
-- 

CREATE TABLE `practice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` char(15) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `practice`
-- 

INSERT INTO `practice` VALUES (1, 'piano', '2017-09-16 17:10:00', '2017-09-16 18:40:00');
INSERT INTO `practice` VALUES (2, 'piano', '2017-09-18 16:00:00', '2017-09-18 17:00:00');
INSERT INTO `practice` VALUES (3, 'piano', '2017-09-20 17:20:00', '2017-09-20 18:05:00');
INSERT INTO `practice` VALUES (4, 'piano', '2017-09-21 18:40:00', '2017-09-21 20:35:00');
INSERT INTO `practice` VALUES (5, 'piano', '2017-09-24 16:15:00', '2017-09-24 18:35:00');
INSERT INTO `practice` VALUES (6, 'piano', '2017-09-25 16:05:00', '2017-09-25 17:30:00');
INSERT INTO `practice` VALUES (7, 'piano', '2017-09-26 15:30:00', '2017-09-26 17:30:00');
INSERT INTO `practice` VALUES (8, 'piano', '2017-09-28 15:30:00', '2017-09-28 17:00:00');
INSERT INTO `practice` VALUES (9, 'piano', '2017-10-01 16:30:00', '2017-10-01 18:00:00');
