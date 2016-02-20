-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2016 at 07:46 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jeanknowscars`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE IF NOT EXISTS `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=43 ;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$Bf6w3i..zKGaDjSnTsSG2Wo6Jx6uzg.', 'admin', 'arun.govindaraj@qfor.com', '', '2016-02-17 10:52:28', '', 0, 'admin'),
(6, 'todd-lassa', '$P$Bpzv/QmYLoV78/9bQFE00N9MDl5BER0', 'todd-lassa', 'todd.lassa@automobilemag.com', '', '2016-02-18 12:19:25', '', 0, 'Todd Lassa'),
(7, 'joe-sherman', '$P$BwvSOclgVrIZY4E2zwAcnMGQJFL3RC.', 'joe-sherman', '', '', '2016-02-18 12:19:26', '', 0, 'Joe Sherman'),
(8, 'david-zenlea', '$P$BPrxhPAB7G9rB2lo.5Qg9w77q5Q5LU/', 'david-zenlea', 'david.zenlea@automobilemag.com', '', '2016-02-18 12:19:26', '', 0, 'David Zenlea'),
(9, 'jean-jennings', '$P$BSchNhXHB9EeCtDQibOMO07jxvAVEQ/', 'jean-jennings', 'jean.jennings@automobilemag.com', '', '2016-02-18 12:19:26', '', 0, 'Jean Jennings'),
(10, 'robert-cumberford', '$P$B.iZOacqC57ia0wMLnn7uU4BgFM9bx0', 'robert-cumberford', 'rcumberford@gmail.com', '', '2016-02-18 12:19:26', '', 0, 'Robert Cumberford'),
(11, 'jamie-kitman', '$P$B83Fsd4ysX9XORZdOtx3TtlxTAOyuH/', 'jamie-kitman', '', '', '2016-02-18 12:19:27', '', 0, 'Jamie Kitman'),
(12, 'ronald-ahrens', '$P$BN0G1NVocUzmHvO2JCv.HdnOtv6KEs.', 'ronald-ahrens', '', '', '2016-02-18 12:19:27', '', 0, 'Ronald Ahrens'),
(13, 'joel-arellano', '$P$BHaRBj9Rlcxhwwh20OWM4EXclhRaNx1', 'joel-arellano', 'authors@automotive.com', '', '2016-02-18 12:19:27', '', 0, 'Joel Arellano'),
(14, 'tamara-warren', '$P$BNI.6H6cgPZq0D7dJoCQkbn1EwqdzU.', 'tamara-warren', '', '', '2016-02-18 12:19:27', '', 0, 'Tamara Warren'),
(15, 'tony-swan', '$P$BaZMIN3UDR0kBlJLEJYHOJbTdMRu9P1', 'tony-swan', '', '', '2016-02-18 12:19:28', '', 0, 'Tony Swan'),
(16, 'jake-holmes', '$P$Bd8e75T2LTamm/URZYQvLASYIPiRFB1', 'jake-holmes', 'jake.holmes@sorc.com', '', '2016-02-18 12:19:28', '', 0, 'Jake Holmes'),
(17, 'greg-fink', '$P$BFVKk.AYKUKR0Dja.lvV6FIpfYBxik0', 'greg-fink', '', '', '2016-02-18 12:19:28', '', 0, 'Greg Fink'),
(18, 'christina-lawson', '$P$BHQO/zvxbcOvkYwHGIm.NHmx6UmHcr.', 'christina-lawson', '', '', '2016-02-18 12:19:29', '', 0, 'Christina Lawson'),
(19, 'laura-sky-brown', '$P$BBLfX.ppnjhrCJJoVZbMrGXj0v8A8x0', 'laura-sky-brown', 'laura.brown@sorc.com', '', '2016-02-18 12:19:29', '', 0, 'Laura Sky Brown'),
(20, 'annie-white', '$P$BIqxWnbo4L6QffX7SYYqdlgVdFgSaQ1', 'annie-white', '', '', '2016-02-18 12:19:29', '', 0, 'Annie White'),
(21, 'scott-allen', '$P$BOZErBISd8K8DK53/4LZZ8dPVf4dh70', 'scott-allen', 'scott.allen@sorc.com', '', '2016-02-18 12:19:29', '', 0, 'Scott Allen'),
(22, 'catherine-carver', '$P$BabeoV839N8m5l0wxLhXm7487SoyGn/', 'catherine-carver', '', '', '2016-02-18 12:19:30', '', 0, 'Catherine Carver'),
(23, 'gabrielle-george', '$P$BxyN4b80JNLbWgN9uyFA0AXONDNdaw.', 'gabrielle-george', '', '', '2016-02-18 12:19:30', '', 0, 'Gabrielle George'),
(24, 'julie-halpert', '$P$B5VlR57mBAUEHQ424440nBZznQUsXG1', 'julie-halpert', '', '', '2016-02-18 12:19:30', '', 0, 'Julie Halpert'),
(25, 'jessica-webster', '$P$BdMkKiu1NjRRyZ6l6Ug6KzEq14uDWm1', 'jessica-webster', '', '', '2016-02-18 12:19:31', '', 0, 'Jessica Webster'),
(26, 'liane-yvkoff', '$P$Bf6jya9DYO6Hx7IyYBwZU1ZsQE15lm0', 'liane-yvkoff', '', '', '2016-02-18 12:19:31', '', 0, 'Liane Yvkoff'),
(27, 'christina-tynan-wood', '$P$BGt1jTrzX9kMpdz1N72HkF2zzvMahl/', 'christina-tynan-wood', '', '', '2016-02-18 12:19:31', '', 0, 'Christina Tynan-Wood'),
(28, 'jen-dunnaway', '$P$Bi0sHuQnP9kEpu0HoxIFXcgHEb8Tzp.', 'jen-dunnaway', '', '', '2016-02-18 12:19:31', '', 0, 'Jen Dunnaway'),
(29, 'thomas-kinzer', '$P$BncGxs28qOwmTAhBwISaEYJ5LekXgd0', 'thomas-kinzer', '', '', '2016-02-18 12:19:32', '', 0, 'Thomas Kinzer'),
(30, 'holly-reich', '$P$BhirmTmICri/Es5xXQ6oFFZTdBhyoC/', 'holly-reich', '', '', '2016-02-18 12:19:32', '', 0, 'Holly Reich'),
(31, 'martina-tesarova', '$P$BU5MQG465d6OctS2MzHzWctoRuZhiu1', 'martina-tesarova', '', '', '2016-02-18 12:19:32', '', 0, 'Martina Tesarova'),
(32, 'molly-jean', '$P$Bj2N7B5TL1CAwDahtR.kqF12kvdUZ6.', 'molly-jean', 'molly.jean@sorc.com', '', '2016-02-18 12:19:32', '', 0, 'Molly Jean'),
(33, 'joseph-capparella', '$P$BSchHWeYmahOlCFflPDsNt5SlUENHI1', 'joseph-capparella', '', '', '2016-02-18 12:19:33', '', 0, 'Joseph Capparella'),
(34, 'annie-boniface', '$P$BfIrh0dqDQfpuvzWC/GfU6DuPHNMC90', 'annie-boniface', '', '', '2016-02-18 12:19:33', '', 0, 'Annie Boniface'),
(35, 'anna-eby', '$P$BmS0EoQkv8HH8U3QElu4qreWWOan7F/', 'anna-eby', '', '', '2016-02-18 12:19:33', '', 0, 'Anna Eby'),
(36, 'susan-carpenter', '$P$B9UUGKQLvuoy./h4CVfeSj/bLeIWWB/', 'susan-carpenter', 'jkcfeedback@jeanknowscars.com', '', '2016-02-18 12:19:34', '', 0, 'Susan Carpenter'),
(37, 'simone-samano', '$P$BH/iLPT9gQUis7JE8RwOQs4bKOIiIm/', 'simone-samano', '', '', '2016-02-18 12:19:34', '', 0, 'Simone Samano'),
(38, 'eric-weiner', '$P$BCpBUi55vdwROqnjSTbI6zWIHxtCnn.', 'eric-weiner', '', '', '2016-02-18 12:19:34', '', 0, 'Eric Weiner'),
(39, 'elizabeth-sobieski', '$P$BwuQXmmjJWVqBMs4oSQrKJ1rd7dpUy1', 'elizabeth-sobieski', '', '', '2016-02-18 12:19:34', '', 0, 'Elizabeth Sobieski'),
(40, 'elaine-nadalin', '$P$B/vCiCs9sTxScChLscIT1sBIGKL4HM0', 'elaine-nadalin', '', '', '2016-02-18 12:19:35', '', 0, 'Elaine Nadalin'),
(41, 'susan-campbell', '$P$BjywRC6wPy1bW7bYJfHDjGiMRY/f2j.', 'susan-campbell', '', '', '2016-02-18 12:19:35', '', 0, 'Susan Campbell'),
(42, 'garrett-sammons', '$P$BCra2EETA0sk8a1Y2ZofnBrdHpQiEv1', 'garrett-sammons', '', '', '2016-02-18 12:19:35', '', 0, 'Garrett Sammons');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
