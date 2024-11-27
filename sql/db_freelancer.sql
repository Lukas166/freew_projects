-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2024 pada 02.56
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_freelancer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `Biodata_ID` int(11) NOT NULL,
  `First_name` varchar(50) DEFAULT NULL,
  `Last_name` varchar(50) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone_number` varchar(15) DEFAULT NULL,
  `Jobs` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Language` varchar(50) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `Instagram_account` varchar(100) DEFAULT NULL,
  `Tiktok_account` varchar(100) DEFAULT NULL,
  `RatingAmount` int(11) DEFAULT NULL,
  `RatingStar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`Biodata_ID`, `First_name`, `Last_name`, `Age`, `Email`, `Phone_number`, `Jobs`, `Description`, `Language`, `Location`, `Instagram_account`, `Tiktok_account`, `RatingAmount`, `RatingStar`) VALUES
(1, 'John', 'Doe', 28, 'john.doe@example.com', '+1234567890', 'Software Engineer', 'Passionate about building scalable applications.', 'English', 'San Francisco, CA', 'johndoe_ig', 'johndoe_tk', 163, 13),
(2, 'Orlando', 'Bloem', 25, 'orlandobloemsutono@gmail.com', '081219852023', 'Web Developer, Backend Developer, Full-stack Developer', 'I am not very good at coding', 'Indonesian', 'Indonesia, Jawa Barat', '@rip_unagi', '@notondo', 203, 7),
(3, 'Ali', 'Khan', 25, 'ali.khan@example.com', '+1230984567', 'Content Creator', 'Focused on producing engaging and informative content.', 'English, Urdu', 'Karachi, Pakistan', 'alikhan_ig', 'alikhan_tk', 120, 4),
(5, 'Orlando', 'Bloem', 0, '', '', '', '', '', '', '', '', NULL, NULL),
(6, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Theopillus', 'Samuel', 19, 'theomuel@gmail.com', '081213141516', 'Design Developer', 'Saya sangat hebat dalam mendesain', 'Indonesian', 'Jatinangor, Indonesia', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `Request_ID` int(11) NOT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `description_request` text DEFAULT NULL,
  `Job_requirement` varchar(100) DEFAULT NULL,
  `Min_budget` int(11) DEFAULT NULL,
  `Max_budget` int(11) DEFAULT NULL,
  `Buying_ID` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`Request_ID`, `Title`, `description_request`, `Job_requirement`, `Min_budget`, `Max_budget`, `Buying_ID`) VALUES
(1, 'Game Roblox', 'I need to make a game roblox really quick, I need a developer with atleast 10 years of coding.', 'Game Developer', 3000000, 5000000, 'U002'),
(2, 'Web Pacis UNPAD', 'Aku butuh seseorang untuk membuatkan aku web pacis unpad yang lebih baik dari yang sekarang.', 'Web Developer, Full-stack Developer', 1000000, 1500000, 'U002'),
(3, 'Voice Over for my Movie', 'I need a good voice actor for my movie. A male actor with a deep voice for my movie introduction', 'Voice actor', 500000, 750000, 'U002'),
(4, 'Mobile Game UI Design', 'Looking for a designer to create an intuitive UI for my mobile game.', 'UI/UX Designer', 2000000, 4000000, 'U001'),
(5, 'Database Optimization', 'Need someone to optimize my database for faster queries.', 'Database Administrator', 2500000, 3500000, 'U002'),
(6, 'Custom Logo Design', 'Looking for a creative designer to craft a unique logo for my brand.', 'Graphic Designer', 1500000, 2000000, 'U003'),
(7, 'AI Chatbot Development', 'Build a conversational AI chatbot for customer support.', 'AI Developer', 5000000, 7000000, 'U001'),
(8, 'E-commerce Website Development', 'Create a responsive and dynamic e-commerce website.', 'Full-stack Developer', 7000000, 9000000, 'U002'),
(9, 'Marketing Campaign Strategy', 'Need a marketing expert to design an effective ad campaign.', 'Marketing Specialist', 3000000, 4500000, 'U003'),
(10, 'Voice Over for Podcast', 'Looking for a professional voice artist for my weekly podcast episodes.', 'Voice Actor', 1500000, 2500000, 'U001'),
(11, 'SEO Specialist for Website', 'Looking for an SEO expert to optimize my website for search engines.', 'SEO Specialist', 1000000, 2000000, 'U002'),
(12, 'Freelance Web Developer', 'Need a freelance web developer for ongoing projects.', 'Web Developer', 4000000, 6000000, 'U003'),
(13, 'Android App Development', 'Need an Android developer to build a simple mobile app.', 'Mobile Developer', 2500000, 4000000, 'U001'),
(14, 'Web Application Security Audit', 'I need a security expert to audit my web application for vulnerabilities.', 'Security Analyst', 3000000, 5000000, 'U002'),
(15, '3D Animation for Commercial', 'Looking for a 3D animator to create a commercial animation.', '3D Animator', 4000000, 6000000, 'U003'),
(16, 'Voice Acting for Commercials', 'Need a voice actor for a series of commercials.', 'Voice Actor', 2000000, 4000000, 'U001'),
(17, 'Logo Animation', 'Need a logo animation for a brand video intro.', 'Motion Graphic Designer', 1500000, 2500000, 'U002'),
(18, 'Social Media Marketing', 'Looking for an expert to manage my brand’s social media marketing campaign.', 'Social Media Manager', 2500000, 3500000, 'U003'),
(19, 'Custom WordPress Theme', 'I need a custom WordPress theme for my personal blog.', 'WordPress Developer', 1000000, 2000000, 'U001'),
(20, 'Business Website Development', 'Looking for a developer to create a business website with an online store.', 'Web Developer', 3000000, 5000000, 'U002'),
(21, 'Corporate Video Production', 'Need a videographer for a corporate video production.', 'Videographer', 3500000, 5500000, 'U003'),
(22, 'Online Store Setup', 'Need an expert to set up my online store on Shopify.', 'E-commerce Specialist', 2000000, 4000000, 'U001'),
(23, 'Logo Redesign', 'Looking to redesign my current logo with a more modern look.', 'Graphic Designer', 1000000, 2000000, 'U002'),
(24, 'Game Level Design', 'Need a game level designer for a new mobile game.', 'Game Designer', 4000000, 6000000, 'U003'),
(25, 'Database Migration', 'I need help migrating my database to a new server.', 'Database Administrator', 2500000, 3500000, 'U001'),
(26, 'Freelance Content Writer', 'Looking for a freelance writer to create content for my blog.', 'Content Writer', 1500000, 2500000, 'U002'),
(27, 'Custom Web Application', 'Looking for a developer to build a custom web application from scratch.', 'Web Developer', 5000000, 7000000, 'U003'),
(28, 'I need a Game Developer', 'I really need a game developer right now to make me a roblox game.', 'Game Developer', 2000000, 3000000, 'U011');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description_service` text NOT NULL,
  `selling_id` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`service_id`, `service_type`, `price`, `description_service`, `selling_id`) VALUES
(1, 'Web Development', 500000, 'Professional web development services tailored to your needs.', 'U001'),
(2, 'Graphic Design', 300000, 'Creative graphic design services for stunning visuals.', 'U002'),
(3, 'SEO Optimization', 400000, 'Optimize your website visibility with expert SEO services.', 'U003'),
(4, 'App Development', 700000, 'Custom app development services for mobile and desktop platforms.', 'U001'),
(5, 'Social Media Marketing', 350000, 'Boost your online presence with social media marketing strategies.', 'U002'),
(31, 'Voice Over', 250000, 'Professional voice-over services for videos, ads, and more.', 'U001'),
(32, 'Logo Design', 200000, 'Logo design services for unique brand identity.', 'U002'),
(33, 'Design Content Writing', 150000, 'Engaging content writing services with a design focus.', 'U003'),
(34, 'Video Editing', 300000, 'High-quality video editing for professional projects.', 'U001'),
(35, 'Photography', 400000, 'Capture memorable moments with expert photography services.', 'U002'),
(36, 'UX/UI Design', 450000, 'User-centered UX/UI design for seamless experiences.', 'U003'),
(37, 'Web Brand Strategy', 500000, 'Comprehensive web brand strategy development services.', 'U001'),
(38, 'Digital Marketing', 350000, 'Targeted digital marketing campaigns for online growth.', 'U002'),
(39, 'Website Maintenance', 250000, 'Reliable website maintenance to ensure smooth operation.', 'U003'),
(40, 'E-commerce Development', 600000, 'Tailored e-commerce development for online businesses.', 'U001'),
(41, 'Design App UI/UX', 400000, 'Innovative app UI/UX design for engaging user interfaces.', 'U002'),
(42, '3D Animation', 800000, 'Immersive 3D animation services for impactful visuals.', 'U003'),
(43, 'Mobile App Marketing', 500000, 'Effective mobile app marketing strategies for success.', 'U001'),
(44, 'Social Media Management', 200000, 'Social media management for consistent online presence.', 'U002'),
(45, 'Product Photography', 350000, 'Product photography services to showcase your offerings.', 'U003'),
(46, 'Logo Animation', 350000, 'Dynamic logo animation to elevate your brand identity.', 'U001'),
(47, 'Voice Acting', 250000, 'Voice acting services for character and narration needs.', 'U002'),
(48, 'Web App Development', 650000, 'Cutting-edge web app development services.', 'U003'),
(49, 'Print Design', 200000, 'Print design services for brochures, posters, and more.', 'U001'),
(50, 'SEO Content Writing', 300000, 'SEO content writing services to boost website traffic.', 'U002'),
(51, 'Virtual Assistant', 250000, '', 'U003'),
(52, 'E-book Design', 220000, '', 'U001'),
(53, 'Social Media Ad Campaigns', 400000, '', 'U002'),
(54, 'Influencer Marketing', 500000, '', 'U003'),
(55, 'Digital Illustration', 350000, '', 'U001'),
(56, 'Email Marketing', 300000, '', 'U002'),
(57, 'App Store Optimization', 400000, '', 'U003'),
(58, 'Landing Page Design', 300000, '', 'U001'),
(59, 'Web Hosting', 150000, '', 'U002'),
(60, 'Technical Writing', 350000, '', 'U003'),
(61, 'Photo Retouching', 200000, '', 'U001'),
(62, 'Business Logo Design', 250000, '', 'U002'),
(63, 'Content Strategy', 400000, '', 'U003'),
(64, 'Online Course Development', 600000, '', 'U001'),
(65, 'Ad Creative Design', 500000, '', 'U002'),
(66, 'Game Development for Roblox', 3000000, 'I can make everykind of roblox game, all of them is very good and i can make it better.', 'U002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `Transaction_ID` int(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `OfferDescription` text DEFAULT NULL,
  `OfferPrice` int(11) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Service_ID` int(11) DEFAULT NULL,
  `Request_ID` int(11) DEFAULT NULL,
  `User_ID` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`Transaction_ID`, `Type`, `OfferDescription`, `OfferPrice`, `Status`, `Service_ID`, `Request_ID`, `User_ID`) VALUES
(1, 'notseen', 'I want you to make me a web with 10k resolution and i want it to be very very good. The web is about a game like RPG so people can play it without downloading the game', 3000000, 'finished_service_r', 1, NULL, 'U002'),
(2, 'notseen', 'Aku mau 1 dong plssssss', 5000000, 'pending_service', 33, NULL, 'U002'),
(3, 'notseen', 'buatkan mie gacoan', 3455444, 'accepted_service', 34, NULL, 'U002'),
(4, 'notseen', 'I could my you a design game very easily because i have 20 years of experience', 2500000, 'finished_service_r', NULL, 4, 'U002'),
(5, 'notseen', 'I like you to make me a tycoon about bussiness tycoon where you can invest into alot of businness. I hope you can finish it in the next Month. I cannot wait to see the result.', 4500000, 'finished_service_r', 66, NULL, 'U001'),
(6, 'notseen', 'Tolong edit fotoku di gunung fuji dong pls, aku butuh secepatnya', 200000, 'finished_service_r', 35, NULL, 'U011'),
(7, 'notseen', 'I can make you a game about tycoon for about 20 dollars ', 2500000, 'declined_request', NULL, 28, 'U002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` varchar(5) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Biodata_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `Biodata_ID`) VALUES
('U001', 'Lonel132', '$2y$10$b/s2yjL6wG5Zop2oX85cTOOPLjcjXpHNrENbrPv5ST1B50x0nYmEi', 1),
('U002', 'Orlando', '$2y$10$p.vcQ/dFAyXc.LtAlK93feNKM4jziOdvrepLFLLP6W39SzDkqeL/i', 2),
('U003', 'Wilson', '$2y$10$B7zg3oDrR/f9UvMY2.tAh.scJpQ6g/P4dOJVpUENfqLX4tVfJFkd.', 3),
('U009', 'lukas', '$2y$10$e2X6ju6i3fQcUK1gKiTlHOU9dhNsiDRh/5t5hfeKOBpt2WHFRhIE.', 5),
('U010', 'Devin', '$2y$10$WbBNQa37dc95ptiZd8ncde8ReomcNBsdYInKxfWiu0N8ijhzKtHt6', 6),
('U011', 'SamuelTheo', '$2y$10$QDDpBnkhT1FtJWfkmALimebN9pphely72dgOvnfoF07RlBrr4uRHa', 7);

--
-- Trigger `users`
--
DELIMITER $$
CREATE TRIGGER `before_user_insert` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
    DECLARE next_id INT;

    -- Dapatkan nomor auto-increment dari tabel user_auto_increment
    INSERT INTO user_auto_increment VALUES (NULL);
    SET next_id = LAST_INSERT_ID();

    -- Gabungkan 'U' dengan nomor auto-increment untuk menghasilkan user_id
    SET NEW.user_id = CONCAT('U', LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_auto_increment`
--

CREATE TABLE `user_auto_increment` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_auto_increment`
--

INSERT INTO `user_auto_increment` (`id`) VALUES
(1),
(2),
(3),
(8),
(9),
(10),
(11);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`Biodata_ID`);

--
-- Indeks untuk tabel `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Request_ID`),
  ADD KEY `Buying_ID` (`Buying_ID`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `selling_id` (`selling_id`),
  ADD KEY `idx_service_type` (`service_type`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Transaction_ID`),
  ADD KEY `Service_ID` (`Service_ID`),
  ADD KEY `Request_ID` (`Request_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_users_biodata` (`Biodata_ID`);

--
-- Indeks untuk tabel `user_auto_increment`
--
ALTER TABLE `user_auto_increment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biodata`
--
ALTER TABLE `biodata`
  MODIFY `Biodata_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `Request_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_auto_increment`
--
ALTER TABLE `user_auto_increment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`Buying_ID`) REFERENCES `users` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`selling_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`Service_ID`) REFERENCES `service` (`service_id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`Request_ID`) REFERENCES `request` (`Request_ID`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`User_ID`) REFERENCES `users` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_biodata` FOREIGN KEY (`Biodata_ID`) REFERENCES `biodata` (`Biodata_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
