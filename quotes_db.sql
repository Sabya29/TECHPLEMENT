-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2024 at 06:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quotes_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `quote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `author`, `quote`) VALUES
(1, 'Albert Einstein', 'Imagination is more important than knowledge. Knowledge is limited. Imagination encircles the world.'),
(2, 'Maya Angelou', 'If you don\'t like something, change it. If you can\'t change it, change your attitude.'),
(3, 'Nelson Mandela', 'It always seems impossible until it\'s done.'),
(4, 'Eleanor Roosevelt', 'No one can make you feel inferior without your consent.'),
(5, 'Steve Jobs', 'Innovation distinguishes between a leader and a follower.'),
(6, 'Helen Keller', 'Alone we can do so little; together we can do so much.'),
(7, 'Mahatma Gandhi', 'Live as if you were to die tomorrow. Learn as if you were to live forever.'),
(8, 'Mark Twain', 'Twenty years from now you will be more disappointed by the things you didn’t do than by the ones you did do.'),
(9, 'Confucius', 'The man who moves a mountain begins by carrying away small stones.'),
(10, 'Audrey Hepburn', 'As you grow older, you will discover that you have two hands, one for helping yourself, the other for helping others.'),
(11, 'Martin Luther King Jr.', 'Injustice anywhere is a threat to justice everywhere.'),
(12, 'Franklin D. Roosevelt', 'When you reach the end of your rope, tie a knot in it and hang on.'),
(13, 'Oscar Wilde', 'To live is the rarest thing in the world. Most people exist, that is all.'),
(14, 'Aristotle', 'We are what we repeatedly do. Excellence, then, is not an act, but a habit.'),
(15, 'Amelia Earhart', 'The most effective way to do it, is to do it.'),
(16, 'J.K. Rowling', 'We do not need magic to transform our world. We carry all the power we need inside ourselves already.'),
(17, 'Dalai Lama', 'Be kind whenever possible. It is always possible.'),
(18, 'Walt Disney', 'The way to get started is to quit talking and begin doing.'),
(19, 'Mother Teresa', 'Spread love everywhere you go. Let no one ever come to you without leaving happier.'),
(20, 'Albert Schweitzer', 'Success is not the key to happiness. Happiness is the key to success. If you love what you are doing, you will be successful.'),
(21, 'Lao Tzu', 'The journey of a thousand miles begins with one step.'),
(22, 'Abraham Lincoln', 'In the end, it\'s not the years in your life that count. It\'s the life in your years.'),
(23, 'Confucius', 'It does not matter how slowly you go as long as you do not stop.'),
(24, 'Benjamin Franklin', 'Tell me and I forget. Teach me and I remember. Involve me and I learn.'),
(25, 'Henry Ford', 'Whether you think you can or you think you can’t, you’re right.'),
(26, 'John Lennon', 'Life is what happens when you\'re busy making other plans.'),
(27, 'Thomas A. Edison', 'I have not failed. I\'ve just found 10,000 ways that won\'t work.'),
(28, 'Robert H. Schuller', 'Tough times never last, but tough people do.'),
(29, 'Winston Churchill', 'Success is not final, failure is not fatal: It is the courage to continue that counts.'),
(30, 'C.S. Lewis', 'You are never too old to set another goal or to dream a new dream.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'sabya', '$2y$10$agTSjmPXwIsvgGOXVIjCf.mckZTf4od9esp4cLeDr0Mjc4yBxiKXW', '2024-06-29 04:12:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
