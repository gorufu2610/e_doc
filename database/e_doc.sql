-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 12:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_doc`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_doc`
--

CREATE TABLE `acc_doc` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `acc_doc`
--

INSERT INTO `acc_doc` (`id`, `title`, `detail`, `img`) VALUES
(2, 'การปรับปรุงกระบวนการบัญชี', 'ในรอบเดือนที่ผ่านมา เราได้ทำการปรับปรุงกระบวนการบัญชีเพื่อเพิ่มความเร็วและความแม่นยำในการบันทึกข้อมูลบัญชี การปรับปรุงนี้ได้เป็นที่เรียบร้อยและมีผลกระทบบวนการทางการเงินในทางบวก', 'aaa.png'),
(3, 'การสรุปรายงานการเงินประจำเดือน', 'เราได้สรุปรายงานการเงินประจำเดือนโดยครบถ้วนและตรงตามกำหนด ทำให้ทางบริษัทสามารถติดตามสถานะการเงินและวางแผนการเงินได้อย่างมีประสิทธิภาพ', '600719_07.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `it_doc`
--

CREATE TABLE `it_doc` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `it_doc`
--

INSERT INTO `it_doc` (`id`, `title`, `detail`, `img`) VALUES
(8, 'แจ้งสั่งซื้ออุปกรณ์คอมพิวเตอร์ในสำนักงาน', 'รายงานการสั่งซื้ออุปกรณ์คอมพิวเตอร์\r\n\r\n\r\nเรื่อง: การสั่งซื้ออุปกรณ์คอมพิวเตอร์ในสำนักงาน\r\n\r\nขอแจ้งให้ทราบว่า ในการพัฒนาความเป็นอยู่และความสามารถในการทำงานของสำนักงานของเรา เราต้องการอุปกรณ์คอมพิวเตอร์เพิ่มเติมเพื่อขับเคลื่อนกิจกรรมที่เกี่ยวข้องกับเทคโนโลยีสารสนเทศและการสื่อสารอย่างเหมาะสม ดังนั้น เรามีความจำเป็นที่จะสั่งซื้ออุปกรณ์คอมพิวเตอร์\r\n\r\nด้วยความนับถือ', '600719_07.jpg'),
(9, 'โครงการพัฒนาซอฟต์แวร์ใหม่', 'เรากำลังพัฒนาซอฟต์แวร์ใหม่ที่จะช่วยเพิ่มประสิทธิภาพในการบริหารจัดการและเพิ่มความสามารถในการติดตามโครงการที่ต่างกัน โครงการนี้กำลังดำเนินการอย่างต่อเนื่อง และเราคาดหวังว่าจะเสร็จสิ้นภายในเดือนถัดไป', 'ลายเซ็น_ชวรัตน์_ชาญวีรกูล.png');

-- --------------------------------------------------------

--
-- Table structure for table `mk_doc`
--

CREATE TABLE `mk_doc` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mk_doc`
--

INSERT INTO `mk_doc` (`id`, `title`, `detail`, `img`) VALUES
(2, 'กิจกรรมการตลาดและโครงการโฆษณา', 'เราได้ดำเนินกิจกรรมการตลาดอย่างต่อเนื่องเพื่อเสริมสร้างการรับรู้และยอดขายของผลิตภัณฑ์ของเรา โครงการโฆษณาใหม่ก็กำลังถูกจัดทำขึ้นเพื่อเปิดตลาดใหม่', '600719_07.jpg'),
(3, 'การวิเคราะห์ตลาดและศึกษาความต้องการของลูกค้า', 'เรากำลังทำการวิเคราะห์ตลาดอย่างลึกซึ้งเพื่อเข้าใจความต้องการและความพึงพอใจของลูกค้า ซึ่งจะช่วยในการพัฒนาผลิตภัณฑ์และกิจกรรมการตลาดให้ตอบสนองต่อตลาดเป้าหมาย', 'ลายเซ็น_ชวรัตน์_ชาญวีรกูล.png');

-- --------------------------------------------------------

--
-- Table structure for table `revice_acc`
--

CREATE TABLE `revice_acc` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `revice_acc`
--

INSERT INTO `revice_acc` (`id`, `title`, `detail`, `img`) VALUES
(33, 'โครงการพัฒนาซอฟต์แวร์ใหม่', 'เรากำลังพัฒนาซอฟต์แวร์ใหม่ที่จะช่วยเพิ่มประสิทธิภาพในการบริหารจัดการและเพิ่มความสามารถในการติดตามโครงการที่ต่างกัน โครงการนี้กำลังดำเนินการอย่างต่อเนื่อง และเราคาดหวังว่าจะเสร็จสิ้นภายในเดือนถัดไป', 'ลายเซ็น_ชวรัตน์_ชาญวีรกูล.png');

-- --------------------------------------------------------

--
-- Table structure for table `revice_it`
--

CREATE TABLE `revice_it` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `revice_it`
--

INSERT INTO `revice_it` (`id`, `title`, `detail`, `img`) VALUES
(6, 'การสรุปรายงานการเงินประจำเดือน', 'เราได้สรุปรายงานการเงินประจำเดือนโดยครบถ้วนและตรงตามกำหนด ทำให้ทางบริษัทสามารถติดตามสถานะการเงินและวางแผนการเงินได้อย่างมีประสิทธิภาพ', 'aaa.png'),
(7, 'การวิเคราะห์ตลาดและศึกษาความต้องการของลูกค้า', 'เรากำลังทำการวิเคราะห์ตลาดอย่างลึกซึ้งเพื่อเข้าใจความต้องการและความพึงพอใจของลูกค้า ซึ่งจะช่วยในการพัฒนาผลิตภัณฑ์และกิจกรรมการตลาดให้ตอบสนองต่อตลาดเป้าหมาย', 'ลายเซ็น_ชวรัตน์_ชาญวีรกูล.png');

-- --------------------------------------------------------

--
-- Table structure for table `revice_mk`
--

CREATE TABLE `revice_mk` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `revice_mk`
--

INSERT INTO `revice_mk` (`id`, `title`, `detail`, `img`) VALUES
(5, 'การปรับปรุงกระบวนการบัญชี', 'ในรอบเดือนที่ผ่านมา เราได้ทำการปรับปรุงกระบวนการบัญชีเพื่อเพิ่มความเร็วและความแม่นยำในการบันทึกข้อมูลบัญชี การปรับปรุงนี้ได้เป็นที่เรียบร้อยและมีผลกระทบบวนการทางการเงินในทางบวก', 'aaa.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`) VALUES
(1, 'mkuser', '1234', 'mk'),
(3, 'ituser', '1234', 'it'),
(5, 'accuser', '1234', 'acc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_doc`
--
ALTER TABLE `acc_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_doc`
--
ALTER TABLE `it_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_doc`
--
ALTER TABLE `mk_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revice_acc`
--
ALTER TABLE `revice_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revice_it`
--
ALTER TABLE `revice_it`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revice_mk`
--
ALTER TABLE `revice_mk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_doc`
--
ALTER TABLE `acc_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `it_doc`
--
ALTER TABLE `it_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mk_doc`
--
ALTER TABLE `mk_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `revice_acc`
--
ALTER TABLE `revice_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `revice_it`
--
ALTER TABLE `revice_it`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `revice_mk`
--
ALTER TABLE `revice_mk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
