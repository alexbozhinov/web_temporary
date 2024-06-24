-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 26 юни 2022 в 20:40
-- Версия на сървъра: 10.4.24-MariaDB
-- Версия на PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `project`
--

-- --------------------------------------------------------

--
-- Структура на таблица `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `reserved_date` date NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `lector_email` varchar(255) NOT NULL,
  `room_num` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `rooms`
--

INSERT INTO `rooms` (`room_id`, `reserved_date`, `start`, `end`, `lector_email`, `room_num`) VALUES
(76, '2022-06-26', 8, 10, 'peter.p.sabev@gmail.com', '01'),
(77, '2022-06-27', 8, 10, 'peter.p.sabev@gmail.com', '02'),
(78, '2022-06-28', 8, 10, 'peter.p.sabev@gmail.com', '018'),
(79, '2022-06-29', 8, 10, 'peter.p.sabev@gmail.com', '019'),
(80, '2022-06-30', 8, 10, 'peter.p.sabev@gmail.com', '04'),
(81, '2022-07-01', 8, 10, 'peter.p.sabev@gmail.com', '03'),
(82, '2022-07-02', 8, 10, 'peter.p.sabev@gmail.com', '14'),
(83, '2022-07-03', 8, 10, 'peter.p.sabev@gmail.com', '14'),
(84, '2022-07-09', 8, 10, 'peter.p.sabev@gmail.com', '13'),
(85, '2022-06-26', 10, 12, 'peter.p.sabev@gmail.com', '107'),
(86, '2022-06-27', 10, 12, 'peter.p.sabev@gmail.com', '101'),
(87, '2022-06-28', 10, 12, 'peter.p.sabev@gmail.com', '122'),
(88, '2022-06-29', 10, 12, 'peter.p.sabev@gmail.com', '120'),
(89, '2022-06-30', 10, 12, 'peter.p.sabev@gmail.com', '210'),
(90, '2022-07-01', 10, 12, 'peter.p.sabev@gmail.com', '217'),
(91, '2022-07-02', 10, 12, 'peter.p.sabev@gmail.com', '222'),
(92, '2022-07-03', 10, 12, 'peter.p.sabev@gmail.com', '200'),
(93, '2022-07-04', 10, 12, 'peter.p.sabev@gmail.com', '229'),
(94, '2022-06-26', 8, 10, 'peter.p.sabev@gmail.com', '302'),
(95, '2022-06-27', 8, 10, 'peter.p.sabev@gmail.com', '303'),
(96, '2022-06-28', 8, 10, 'peter.p.sabev@gmail.com', '304'),
(97, '2022-06-29', 8, 10, 'peter.p.sabev@gmail.com', '305'),
(98, '2022-06-30', 8, 10, 'peter.p.sabev@gmail.com', '306'),
(99, '2022-07-01', 8, 10, 'peter.p.sabev@gmail.com', '307'),
(100, '2022-07-01', 8, 10, 'peter.p.sabev@gmail.com', '308'),
(101, '2022-07-02', 8, 10, 'peter.p.sabev@gmail.com', '309'),
(102, '2022-07-03', 8, 10, 'peter.p.sabev@gmail.com', '310'),
(103, '2022-07-04', 8, 10, 'peter.p.sabev@gmail.com', '311'),
(104, '2022-07-05', 8, 10, 'peter.p.sabev@gmail.com', '313'),
(105, '2022-07-06', 8, 10, 'peter.p.sabev@gmail.com', '314'),
(106, '2022-07-07', 8, 10, 'peter.p.sabev@gmail.com', '314'),
(107, '2022-07-08', 8, 10, 'peter.p.sabev@gmail.com', '326'),
(108, '2022-07-09', 8, 10, 'peter.p.sabev@gmail.com', '325'),
(109, '2022-07-09', 8, 10, 'peter.p.sabev@gmail.com', '323'),
(110, '2022-07-10', 8, 10, 'peter.p.sabev@gmail.com', '321'),
(111, '2022-07-10', 8, 10, 'peter.p.sabev@gmail.com', '320'),
(112, '2022-06-26', 8, 10, 'peter.p.sabev@gmail.com', '401'),
(113, '2022-06-27', 8, 10, 'peter.p.sabev@gmail.com', '403'),
(114, '2022-06-28', 8, 10, 'peter.p.sabev@gmail.com', '404'),
(115, '2022-06-29', 8, 10, 'peter.p.sabev@gmail.com', '405'),
(116, '2022-07-01', 8, 10, 'peter.p.sabev@gmail.com', '501'),
(117, '2022-07-02', 8, 10, 'peter.p.sabev@gmail.com', '514'),
(118, '2022-07-04', 8, 10, 'peter.p.sabev@gmail.com', '526'),
(119, '2022-07-10', 8, 10, 'peter.p.sabev@gmail.com', '500'),
(120, '2022-07-03', 12, 14, 'peter.p.sabev@gmail.com', '01'),
(121, '2022-07-01', 14, 16, 'peter.p.sabev@gmail.com', '101'),
(122, '2022-07-10', 14, 16, 'peter.p.sabev@gmail.com', '200'),
(123, '2022-07-06', 18, 20, 'peter.p.sabev@gmail.com', '229'),
(124, '2022-07-09', 15, 17, 'peter.p.sabev@gmail.com', '500');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('lector','student') NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `type`) VALUES
('Aleks', 'Bozhinov', 'alex.bozhinov@gmail.com', '$2y$10$PJ94uTaL6LNm4b7ioyvrEuy1GbWYd0z57qYBmLI2U.D94W.S5bi7C', 'student'),
('Boyan', 'Bonchev', 'bbontchev@fmi.uni-sofia.bg', '$2y$10$vPj9yLRkR9.pPxTuZ8dT1euSEo2W/4EiEm8iK83oD0pi3Lkp3La9O', 'lector'),
('Angel', 'Dichev', 'ditchev@fmi.uni-sofia.bg', '$2y$10$0ZDEl4wSCMk4AdGhX9JMLOqkJRv2XSPCAP6VaIwnPzN4flKEtgFAG', 'lector'),
('Nadezhda', 'Frantseva', 'franceva@uni-sofia.bg', '$2y$10$RzocEFjQvDbToFSuFdQ2QOdV8Zy4WC5S5k3X0al6Sp65Ipfhbys02', 'student'),
('Milen', 'Petrov', 'milenp@fmi.uni-sofia.bg', '$2y$10$04zE/aif2nf0uNjnd31cjea2Xj1pzam.iLwIjH8NVzBhiDYdImw2O', 'lector'),
('Peter', 'Sabev', 'peter.p.sabev@gmail.com', '$2y$10$LENBLTvSSdqKDl9Me1UPtujwehW5Q7MIrErqdhtg6hEabKX16PyIe', 'lector');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD KEY `firstName` (`first_name`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
