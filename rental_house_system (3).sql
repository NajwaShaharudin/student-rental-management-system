-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 09:51 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_house_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$uvy/0YNGixyrioy1PEovgeIL27Y9CHktUOTnpK4f4YspL5MRaBlzm'),
(2, 'admin2', '$2y$10$m7tWdZpYq7.2xJdXJ8oxmOlVfqo3ahnjr4QYXj5JG9nSzcjSQ9hxm'),
(3, 'Ashraf', '$2y$10$IRCGly4ORfxtiglAuVhTxuODsq6TKVrfK2q7rVWw16h4oiBxg4Bz.');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `rent` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`id`, `type`, `rent`, `address`, `info`, `image_url`) VALUES
(15, 'Condominium', 'RM 1600', 'The Heights Residence', 'The Heights Residence\r\n-Block D Corner Lot\r\n-889 sqft\r\n-3R 2B 1P\r\n-Fully Furnished', 'Condo.jpg'),
(16, 'Semi-Detached House', 'RM 1700', 'Taman Tasik Utama Semi-D', 'Area: Taman Tasik Utama\r\nType: 1 sty SemiD\r\nSize: 45x80 sqft\r\nB/B: 3/3\r\nDirection: North\r\nFully or Partial Furnished: Fully Furnished, only 2 heater, fridge & washing machine will provide', 'teres2.jpg'),
(17, 'Bungalow House', 'RM 2800', 'Vista Kirana', '2 Storey Bungalow\r\nLocation : vista Kirana ,Ayer Melaka\r\n\r\n* Gated Guarded\r\n* Land Size :8000 sqft\r\n* 5 Bedrooms\r\n* 4 Bathrooms\r\n* auto gate\r\n* Aircon', 'bungalow.jpg'),
(18, 'Apartment', 'RM 750', 'Apartment Sri Utama Taman Tasik Utama', 'Tingkat 4\r\n\r\n3 bilik tidur\r\n2 bilik air\r\nPerabot sedia ada :-\r\n- Katil single\r\n- Almari\r\n- Meja\r\n-Mesin Basuh\r\n-Dapur Gas', 'Condo2.jpg'),
(19, 'Apartment', 'RM 690', 'Blok Kemboja - Flat Taman Tasik Utama', '~ Blok Kemboja\r\n~ Ground Floor\r\n~ Basic unit\r\n~ 3 bilik 2 bilik air\r\n~ Prefer Muslim\r\n~ Berdekatan MITC', 'Flat.jpg'),
(20, 'Terraced House', 'RM 900', 'Rumah Teres 1 Tingkat Baru di Anjung Gapam', 'Bilik di lengkapi Katil,Tilam, Almari baju, Kipas syiling/dinding, Lampu.\r\nRumah di pasang grill, kabinet dapur stainless steel, sinki, stove, meja makan, peti sejuk 2 pintu, mesin basuh automatik, dan ampaian baju.\r\nTingkap dan sliding door bertinted.\r\nT', 'Teres.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `landlord_register`
--

CREATE TABLE `landlord_register` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `landlord_register`
--

INSERT INTO `landlord_register` (`id`, `fullname`, `email`, `password`) VALUES
(1, 'Najwa', 'najwashaharudinoj@gmail.com', '$2y$10$N2OfYB0Zpx1tLnR6vc/sF.njflIW0rEEU56QIQY8MH.3Xgu5B5KXK');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `matricNo` varchar(255) NOT NULL,
  `ic_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `username`, `password`, `phone_num`, `email`, `address`, `matricNo`, `ic_no`) VALUES
(1, 'Najwa binti Shaharudin', '6118', '$2y$10$RHpYOqqc21ins84NEfFegOvNP7HJs3l1tpkXb.RL2EyagLy2H36hC', '011-56290036', 'B032110419@student.utem.edu.my', 'No 1094 Taman Bukit Tambun Perdana, Durian Tunggal, Melaka', 'B032110418', '990827-02-6118'),
(2, 'Muhammad Suhail Azmin bin Baharom', '1111', '$2y$10$Ue1xLVoPFf6fD6wVq89VnuV9ucPDLr4Qpg6/x6u.rxLlrxO9j5sfS', '014-9240191', 'B032210050@student.utem.edu.my', 'Lot 162 Jalan Sungai Besi, Pudu, Kuala Lumpur ', 'B032210050', '990213-04-1111'),
(3, 'Muhamad Afiq Rifqi bin Fairullizan', '2222', '$2y$10$3RVq7xZX1b95MTtvRT/Qge5sct0lXq3gjYG0RYoZUtd.QOIvYS2mG', '011-29042432', 'B032210032@student.utem.edu.my', 'Jalan Indah 15, Bukit Indah, Iskandar Puteri, Johor ', 'B032210032', '990715-05-2222'),
(4, 'Muhammad Iqhwan bin Jamal Rodzi', '3333', '$2y$10$3iLUw4Hx.Lprb3LoqqVn/O55ktjl.tNUttQVAJFEyWBl9kHAu8ZOS', '012-4756776', 'B032110056@student.utem.edu.my', 'JalanTKK 2/1, Bandar Kinrara, Puchong, Selangor', 'B032110056', '980224-01-3333'),
(5, 'Wan Mahirah binti Wan Mashruhim', '4444', '$2y$10$3bPjB5xhpq3tCpydDVs32u46JozBbE5ntbFT8dxLZ67fXF0ARzuNa', '012-3535719', 'B032110244@student.utem.edu.my', 'Jln PJU 10/16B, Damansara Damai, Damansara, Selangor ', 'B032110244', '000102-03-4444'),
(9, 'Siow Zhe Yi', '5555', '$2y$10$3nTYVfKBUwZEYaarheyJKOK0DIe6DmXkrruZ2qJp68HDYk3fz93xS', '018-4354654', 'B032220024@student.utem.edu.my', 'Lorong Tegak Aman 2, Pekan, Pahang ', 'B032220024', '000330-04-4544'),
(10, 'Nabil Aqmar bin Zuhaimi', '6666', '$2y$10$hRqYDFz.39vxm8RdgKsv1.7zuWqV2KA27HahwCn40QX9oJrm0//Yy', '019-4541893', 'B032210058@student.utem.edu.my', 'Taman Kuantan, Lorong Seri Kuantan 101, Kuantan, Pahang', 'B032210058', '000611-03-5118'),
(11, 'Nor Balqish binti Mohamad Nasri', '7777', '$2y$10$jolvYgDYw7TK4zUTJwkStePUfTUuu.9Q2KUO9oJQ8Dt0lBONXrkC2', '010-4989885', 'B032110395@student.utem.edu.my', 'Jalan Mutiara Emas 10/11, Mount Austin, Johor Bahru, Johor', 'B032110395', '000921-05-8712'),
(12, 'Muhammad Zahiruddin bin Mustaza', '8888', '$2y$10$17g5OtOLe0VC2njwXLxvN.GkBsaS.OKrzvAqNMdhMZ0sDqMU/ShSm', '012-9898719', 'B032110210@student.utem.edu.my', '45 Taman Mutiara, Balik Pulau, Barat Daya, Penang', 'B032110210', '000215-02-5513'),
(13, 'Muhammad Syahir bin Ahmad Kamal', '9999', '$2y$10$cwWmL5Hq6i/Qv/E6FXVFI.fGTNkNIUFiIHa2SaIf8ZfVhbXx9MWN.', '010-4741232', 'B032210045@student.utem.edu.my', 'Tingkat Betek 6, Taman Sungai Rambai, Bukit Mertajam, Penang', 'B032210045', '000129-03-3113'),
(14, 'Lim Zhao Hong', '1000', '$2y$10$.iR0UPtiM/oih8vXoVdDtedBpDBtu/raA.lgqKHprORvMBdMjNkqa', '012-3133945', 'B032110143@student.utem.edu.my', 'Jalan Mayang Pasir 2, Bayan Lepas, Penang', 'B032110143', '990287-02-8118'),
(15, 'Mohamad Zulkarnain bin Mohd Anuar', '1100', '$2y$10$gCMgef4QRjohVUmYNoF9BO5E5pnPinzbYDiTRScILPATOgDjT8y1K', '014-4849954', 'B032110368@student.utem.edu.my', 'Tingkat Paya Terubong 4, Ayer Itam, Penang', 'B032110368', '990109-02-7232'),
(16, 'Irdina Frisya binti Mohd Farid', '1200', '$2y$10$SzciUrhh5D7bkqITf3xUGuKL7.qjrs556.2h8mY0q9DYtgTvrdD7.', '011-56480047', 'B032110396@student.utem.edu.my', '55 Lorong Bukit Kukus, Paya Terubong, Ayer Itam, Penang', 'B032110396', '990522-02-6114'),
(17, 'Hairul Akhmal Bashyar bin Hairul Anuar', '1300', '$2y$10$CHPOnCzlXfmlb3my8PSvO.fyMXyVEhIrok0Iwk9TbvRqPoDiVhPJK', '013-5656122', 'B032210005@student.utem.edu.my', 'Bandar Universiti Teknologi Lagenda, Mantin, Negeri Sembilan', 'B032210005', '980201-03-3454'),
(18, 'Siti Nur Syafiqah binti Nasir', '1400', '$2y$10$H8GWXtwDYf0D3zsucBDz9uSvUrYD3K4lIyhpkUjayT5rBzXAITL7W', '017-12848413', 'B032110095@student.utem.edu.my', 'Jalan Rasah Utama 2, Rasah, Negeri Sembilan', 'B032110095', '990407-05-8112');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landlord_register`
--
ALTER TABLE `landlord_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `landlord_register`
--
ALTER TABLE `landlord_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
