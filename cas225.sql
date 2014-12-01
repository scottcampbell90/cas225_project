-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Nov 17, 2014 at 10:38 AM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cas225`
--

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE IF NOT EXISTS `guestbook` (
`id` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`id`, `username`, `comment`, `datetime`) VALUES
(1, 'instructor', 'WOW PHPMYADMIN SO COOL OMGZ!!!', '2014-10-29 23:16:33'),
(2, 'student', 'WHAT?! OMGZ R U CEREALZZZ?!?! COOOOOL SAUZZZZEE', '2014-10-29 23:16:33'),
(3, 'jjones', 'I am very excited to be creating an entry in your guestbook!', '2014-10-29 23:18:11'),
(4, 'ssmart', 'I am the smartest student in my class.', '2014-10-29 23:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(30) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `permissions` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `firstname`, `lastname`, `email`, `password`, `permissions`) VALUES
('instructor', 'Ron', 'Bekey', 'rbeky@pcc.edu', '789b49606c321c8cf228d17942608eff0ccc4171', 'admin'),
('jjones', 'Joe', 'Jones', 'jjones@email.com', '789b49606c321c8cf228d17942608eff0ccc4171', 'user'),
('ssmart', 'Sally', 'Smart', 'ssmart@email.com', '789b49606c321c8cf228d17942608eff0ccc4171', 'user'),
('student', 'Scott', 'Campbell', 'scott.campbell@pcc.edu', '789b49606c321c8cf228d17942608eff0ccc4171', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guestbook`
--
ALTER TABLE `guestbook`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guestbook`
--
ALTER TABLE `guestbook`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;