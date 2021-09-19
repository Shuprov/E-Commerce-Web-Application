-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 10:29 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panda_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(25) NOT NULL,
  `username` varchar(34) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Shuprov', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(25) NOT NULL,
  `name` varchar(34) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `username`, `password`, `email`) VALUES
(1, 'Shuprov Asifur', 'shuprov', 'asasasasasaHGJH?', 'munmun.jannatunnahar@gmail.com'),
(12, 'Md Asifur Rahman', 'asifur', 'saaHVJHJHBUJHBU?', 'asifurshuprov@gmail.com'),
(13, 'Durjoy Sarker', 'durjoy', 'asasaHVUHVUHVU?', 'durjoy75@gmail.com'),
(14, 'Diproy', 'Diponkar', 'sasasHBHBJH?', 'roy@gmail.com'),
(15, 'Tanvir ahamed', 'Tanvir', 'sasasaKHBHBJH?', 'roy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer_user`
--

CREATE TABLE `customer_user` (
  `id` int(100) NOT NULL,
  `username` varchar(34) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_user`
--

INSERT INTO `customer_user` (`id`, `username`, `password`) VALUES
(1, 'Dip', '123');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(25) NOT NULL,
  `name` varchar(34) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `username`, `password`, `email`) VALUES
(12, 'Md Asifur Rahman', 'shuprov', 'asasHBIB?', 'asas@gmail.com'),
(13, 'Md Asifur Rahman', 'durjoy', 'sasaGYGYH?', 'asifurshuprov@gmail.com'),
(14, 'Durjoy Sarker', 'dujoyy', 'asasGCHGCYHGC?', 'roy@gmail.com'),
(15, 'diponkar', 'royyyyy', 'asasGCHGCYHGC?', 'roy@gmail.com'),
(16, 'Tanvir ahamed', 'Tanvir', 'asasGCHGCYHGC?', 'roy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee_user`
--

CREATE TABLE `employee_user` (
  `id` int(100) NOT NULL,
  `username` varchar(34) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_user`
--

INSERT INTO `employee_user` (`id`, `username`, `password`) VALUES
(1, 'Tanvir', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(25) NOT NULL,
  `name` varchar(34) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(18) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `name`, `username`, `password`, `email`) VALUES
(29, 'Durjoy Sarker', 'shuprov', '12345Sd?g', 'asifurshuprov@gmail.com'),
(32, 'Md Asifur Rahman', 'Suprove', 'asasHGVUVUYVUYU?', 'asifurshuprov@gmail.com'),
(33, 'Diponkar Roy', 'Diproyyy', 'asasaHVUYVUVYU?', 'roy@gmail.com'),
(34, 'Tanvir ahamed', 'Tanvir', 'asasUVUYVUYV?', 'Tanvir@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `manager_user`
--

CREATE TABLE `manager_user` (
  `id` int(100) NOT NULL,
  `username` varchar(34) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager_user`
--

INSERT INTO `manager_user` (`id`, `username`, `password`) VALUES
(1, 'Durjoy', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(34) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `product_quantity` int(100) NOT NULL,
  `product_price` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `brand_name`, `category_name`, `product_quantity`, `product_price`) VALUES
(4, 'wheat', 'pran', 'BRRI', 12, 500),
(5, 'rice', 'pran', 'BRRI', 12, 500),
(6, 'brocolli', 'pran', 'BRRI', 12, 500),
(7, 'meat', 'pran', 'BRRI', 12, 500),
(9, 'capsicum', 'pran', 'BRRI', 12, 500),
(10, 'grain', 'pran', 'BRRI', 12, 500),
(13, 'fish', 'pran', 'BRRI', 12, 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `customer_user`
--
ALTER TABLE `customer_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `employee_user`
--
ALTER TABLE `employee_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- Indexes for table `manager_user`
--
ALTER TABLE `manager_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer_user`
--
ALTER TABLE `customer_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee_user`
--
ALTER TABLE `employee_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `manager_user`
--
ALTER TABLE `manager_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
