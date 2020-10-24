-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Agu 2020 pada 16.00
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payunganakbangsa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_gallery`
--

CREATE TABLE `category_gallery` (
  `id_category` int(8) NOT NULL,
  `category` varchar(225) NOT NULL,
  `lang` enum('EN','ID') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category_gallery`
--

INSERT INTO `category_gallery` (`id_category`, `category`, `lang`) VALUES
(4, 'WEB', 'EN'),
(5, 'DEKSTOP', 'EN'),
(6, 'ANDROID', 'EN'),
(7, 'DATABASE', 'EN'),
(8, 'DEVOPS', 'EN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(8) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `no_hp` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `website` varchar(225) NOT NULL,
  `title` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id_faq`, `nama`, `email`, `no_hp`, `description`, `status`, `date_post`, `website`, `title`) VALUES
(1, 'aaaa', 'aa', 'aaa', 'a', 0, '2020-07-31 23:40:55', '', ''),
(2, 'sasas', 'admin@gmail.com', 'asasa', 'asass', 0, '2020-08-03 13:48:00', 'asas', 'asas'),
(3, 'dini', 'dini@gmail.com', '085206451636', 'Hola', 0, '2020-08-03 13:49:40', 'payunganakbangsa.com', 'Sapa aja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(8) NOT NULL,
  `title` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lang` enum('EN','ID') NOT NULL,
  `client_name` varchar(225) NOT NULL,
  `client_foto` varchar(225) NOT NULL,
  `id_category` int(8) NOT NULL,
  `counter` int(8) NOT NULL,
  `author` varchar(225) NOT NULL,
  `tags` varchar(225) NOT NULL,
  `slug_gallery` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `title`, `foto`, `description`, `status`, `date_post`, `lang`, `client_name`, `client_foto`, `id_category`, `counter`, `author`, `tags`, `slug_gallery`) VALUES
(8, 'DEVOPS TRAINER FOR BKN', 'devops-process5.png', '<p>DEVOPS FOR KEMENTERIAN BKN</p>\r\nDESCRIPTION\r\n\r\nCommunication skill is one of the most important skills for any supervisors and managers. Their ability to convey ideas, influence another, and getting feedbacks is key to their success in their job that eventually creating value for the organization. Communication skill includes listening skill, build relationship, set clear priorities, facilitate collaboration, and conveys the organization’s vision.\r\n\r\nWithout a doubt, any supervisors/managers who excel all of those skills are good leaders.\r\n\r\nTo equip you, supervisors and managers, with excellent communication skill, Foster & Bridge Indonesia offers you a workshop/training on Communication Skill for Supervisors/Managers. With this training, you will sharpen your already existing communication skill and take it up to a higher level, customize it to your success performing the job and managing your teams.', 1, '2020-08-03 12:14:14', 'EN', 'KEMENTERIAN BKN', 'bkn1.jpg', 8, 36, 'Andre', 'DEVOPS ,BKN', 'devops-trainer-for-bkn.html'),
(9, 'SIOPAK KEMENDAGRI', 'dekstopapp2.jpg', '<p>SIOPAK KEMENDAGRI RI</p>\r\nDESCRIPTION\r\n\r\nCommunication skill is one of the most important skills for any supervisors and managers. Their ability to convey ideas, influence another, and getting feedbacks is key to their success in their job that eventually creating value for the organization. Communication skill includes listening skill, build relationship, set clear priorities, facilitate collaboration, and conveys the organization’s vision.\r\n\r\nWithout a doubt, any supervisors/managers who excel all of those skills are good leaders.\r\n\r\nTo equip you, supervisors and managers, with excellent communication skill, Foster & Bridge Indonesia offers you a workshop/training on Communication Skill for Supervisors/Managers. With this training, you will sharpen your already existing communication skill and take it up to a higher level, customize it to your success performing the job and managing your teams.', 1, '2020-08-03 13:46:02', 'EN', 'BPSDM KEMENDAGRI ', 'Logo_of_the_Ministry_of_Home_Affairs_of_the_Republic_of_Indonesia.png', 4, 111, 'Andre', 'SIOPAK,BPSDM KEMENDAGRI', 'siopak-kemendagri.html'),
(10, 'Card Reader for e-KTP', 'background1.jpg', '<p>Document application for Pemprov Kupang , to read biometric by Chip e-KTP.</p>\r\nDESCRIPTION\r\n\r\nCommunication skill is one of the most important skills for any supervisors and managers. Their ability to convey ideas, influence another, and getting feedbacks is key to their success in their job that eventually creating value for the organization. Communication skill includes listening skill, build relationship, set clear priorities, facilitate collaboration, and conveys the organization’s vision.\r\n\r\nWithout a doubt, any supervisors/managers who excel all of those skills are good leaders.\r\n\r\nTo equip you, supervisors and managers, with excellent communication skill, Foster & Bridge Indonesia offers you a workshop/training on Communication Skill for Supervisors/Managers. With this training, you will sharpen your already existing communication skill and take it up to a higher level, customize it to your success performing the job and managing your teams.', 1, '2020-08-03 13:22:23', 'EN', 'Dinas Kependudukan Kupang', '198304172009121001-2306201.png', 8, 14, 'Andre', 'e-KTP,Card Reader', 'card-reader-for-e-ktp.html'),
(11, 'Virtual Job Fair ', 'web-application-firewall-e15517934936631.jpg', '<p>Virtual job fair application for Employeer and job seeker</p>\r\nDESCRIPTION\r\n\r\nCommunication skill is one of the most important skills for any supervisors and managers. Their ability to convey ideas, influence another, and getting feedbacks is key to their success in their job that eventually creating value for the organization. Communication skill includes listening skill, build relationship, set clear priorities, facilitate collaboration, and conveys the organization’s vision.\r\n\r\nWithout a doubt, any supervisors/managers who excel all of those skills are good leaders.\r\n\r\nTo equip you, supervisors and managers, with excellent communication skill, Foster & Bridge Indonesia offers you a workshop/training on Communication Skill for Supervisors/Managers. With this training, you will sharpen your already existing communication skill and take it up to a higher level, customize it to your success performing the job and managing your teams.', 1, '2020-08-03 08:46:58', 'EN', 'KEMNAKER RI', 'Logo_Kemnaker.png', 8, 23, 'Andre', 'Virtual job fair ,Kemnaker RI', 'virtual-job-fair.html');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_administrator`
--

CREATE TABLE `master_administrator` (
  `id_administrator` int(8) NOT NULL,
  `name` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level_login` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `cookie` varchar(225) NOT NULL,
  `date_save` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `latest_session` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status_online` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_administrator`
--

INSERT INTO `master_administrator` (`id_administrator`, `name`, `username`, `password`, `level_login`, `status`, `foto`, `cookie`, `date_save`, `date_updated`, `latest_session`, `status_online`) VALUES
(1, 'Andre', 'andre', 'andre', 1, 1, 'payung anak bangsa.png', '', '2020-08-03 13:50:20', '0000-00-00 00:00:00', '2020-08-03 01:50:20', 1),
(2, 'admin', 'admin', 'admin', 1, 1, 'header_payung.png', '', '2020-08-01 15:49:25', '0000-00-00 00:00:00', '2020-08-01 03:49:25', 1),
(3, 'user', 'user', 'user', 1, 1, 'world.png', '', '2020-07-31 16:25:52', '0000-00-00 00:00:00', '2020-07-31 04:25:46', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_article`
--

CREATE TABLE `master_article` (
  `id_article` int(8) NOT NULL,
  `id_category_article` int(8) NOT NULL,
  `lang` enum('EN','ID') NOT NULL,
  `description` text NOT NULL,
  `slug_article` varchar(225) NOT NULL,
  `author` varchar(225) NOT NULL,
  `counter` int(8) NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foto` varchar(225) NOT NULL,
  `tag` text NOT NULL,
  `title` varchar(225) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_article`
--

INSERT INTO `master_article` (`id_article`, `id_category_article`, `lang`, `description`, `slug_article`, `author`, `counter`, `date_post`, `foto`, `tag`, `title`, `status`) VALUES
(22, 2, 'EN', '<p>What is startup ???</p>\r\n\r\n<p>maybe there are still many people who do not understand this term, including me, but after reading several articles about the definition of startup, I write again in this article. maybe it can help you a little in understanding the meaning of startup itself.The term Startup itself is an absorption word from English which means the action or process of starting a new organization or business venture. According to Wikipedia, Startup refers to companies that have not been operational long. These companies are mostly newly established companies and are in the development and research phase to find the right market.Currently the term Startup is more widely used to describe companies that smell of technology, the web, the internet and those related to that realm. Why did it happen?Looking back, it turns out that this happened because the term Startup itself became popular internationally during the dot-com buble, so what else is the dot-com buble? the dot-com buble phenomenon is when in that period (1998-2000) many dot-com companies were established simultaneously.</p>\r\n', 'definition-of-startup.html', 'Andre', 41, '2020-08-03 12:14:33', 'Kesuksesan-Ditentukan-Oleh-Pola-Pikir-Kita.png', 'Start Up', 'Definition of startup ', 1),
(23, 4, 'EN', '<p><strong>DESCRIPTION </strong></p>\r\n\r\n<p><strong>Communication skill is one of the most important skills for any supervisors and managers.</strong> Their ability to convey ideas, influence another, and getting feedbacks is key to their success in their job that eventually creating value for the organization. Communication skill includes listening skill, build relationship, set clear priorities, facilitate collaboration, and conveys the organization&rsquo;s vision.</p>\r\n\r\n<p>Without a doubt, any supervisors/managers who excel all of those skills are good leaders.</p>\r\n\r\n<p>To equip you, supervisors and managers, with excellent communication skill, Foster &amp; Bridge Indonesia offers you a workshop/training on Communication Skill for Supervisors/Managers. With this training, you will sharpen your already existing communication skill and take it up to a higher level, customize it to your success performing the job and managing your teams.</p>\r\n', 'communication-skills-for-supervisors-and-managers.html', 'Andre', 22, '2020-08-03 13:28:03', 'https__cdn.evbuc.com_images_95293629_314691967052_1_original.20200304-092443.jpg', 'Communication Skills,People Development,Management', 'Communication Skills for Supervisors and Managers', 1),
(24, 4, 'EN', '<p>To address the issue of business writing competencies for employees, a workshop is to be conducted. This workshop offers a fundamental understanding of business writing and some best practices that participants can learn from.</p>\r\n\r\n<p>The Business Writing Skills workshop is train. In it, participants will find mini presentations, group and lead discussion, games enrich the learning points, music and video clip, and feedback and evaluation.</p>\r\n\r\n<p>Outline</p>\r\n\r\n<p>&bull; Achieving Success with Effective Business Communication (Writing)</p>\r\n\r\n<p>&bull; Understanding the principles, rules and guidelines of business communication</p>\r\n\r\n<p>&bull; Understanding personal writing style vs. style of writing reports on demand</p>\r\n\r\n<p>&bull; Observing House Style (rules of the company)</p>\r\n\r\n<p>&bull; Accountability &amp; Legal implication of in-writing information</p>\r\n\r\n<p>&bull; Common mistakes and failures that usually occurs in the writing</p>\r\n\r\n<p>&bull; The do&rsquo;s and don&rsquo;ts of writing email, memo, minutes of meeting, report and proposal</p>\r\n\r\n<p>&bull; The role of emotional and social quotients in writing process</p>\r\n\r\n<p>&bull; Writing Techniques: The Preparation Stages</p>\r\n\r\n<p>&bull; Establish primary aim and objective of the writing</p>\r\n\r\n<p>&bull; Identifying the readers&rsquo; characters, expectations and needs, behavior, and knowledge</p>\r\n\r\n<p>&bull; Selecting and filtering the source materials for your writing, and sorting based on the principle of JIS (Justify, Importance, Simplify) the importance and the need to simplify</p>\r\n\r\n<p>&bull; Planning the structure of the writing (MIF &ndash; Most Important First)</p>\r\n\r\n<p>&bull; Writing Techniques: The Writing Stages</p>\r\n\r\n<p>&bull; Applying steps of writing process (Structure, clear &amp; concise content, expression and context of business writing)</p>\r\n\r\n<p>&bull; Crafting brief yet powerful messages</p>\r\n\r\n<p>&bull; Crafting messages for electronic media</p>\r\n\r\n<p>&bull; The use of visual media aids such as charts, diagrams, info graphic in your report</p>\r\n\r\n<p>&bull; Applying professional business standards in the writing process</p>\r\n\r\n<p>&bull; Writing in Action (practical exercise)</p>\r\n\r\n<p>&bull; Writing Techniques: Editing Stages</p>\r\n', 'business-writing-skills.html', 'Andre', 29, '2020-08-03 12:14:53', 'https__cdn.evbuc.com_images_95638755_314691967052_1_original.20200306-024632.jpg', 'Business,Development,Business Managament', 'Business writing skills', 1),
(25, 2, 'EN', '<p><br />\r\nWe are the gateway to IT solutions for anyone.</p>\r\n\r\n<p>For over 7 years, Payung Anak Bangsa As (We ) ,is an IT company that we created based on our love for the world of information technology, we want to grow and want to continue to advance the IT ecosystem in Indonesia and in the world.<br />\r\nWe want to be a gateway for anyone, so that it can be a solution, especially in the world of information technology.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'we-are-the-gateway-to-it-solutions-for-anyone.html', 'Andre', 3, '2020-08-03 12:15:09', 'web-application-firewall-e15517934936632.jpg', 'Technology,IT', ' We are the gateway to IT solutions for anyone', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_category_article`
--

CREATE TABLE `master_category_article` (
  `id_category_article` int(8) NOT NULL,
  `category_article` varchar(225) NOT NULL,
  `lang` enum('EN','ID') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_category_article`
--

INSERT INTO `master_category_article` (`id_category_article`, `category_article`, `lang`) VALUES
(2, 'START UP', 'EN'),
(3, 'Technology Enthusiast', 'EN'),
(4, 'IT DEV', 'EN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `page`
--

CREATE TABLE `page` (
  `id_page` int(8) NOT NULL,
  `page` varchar(225) NOT NULL,
  `lang` enum('EN','ID') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `page`
--

INSERT INTO `page` (`id_page`, `page`, `lang`) VALUES
(1, 'PROFILE', 'EN'),
(4, 'TERMS', 'EN'),
(5, 'ABOUT US', 'EN'),
(6, 'CONTACT', 'EN'),
(7, 'OUR SERVICES', 'EN'),
(8, 'PROFIL', 'ID');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide`
--

CREATE TABLE `slide` (
  `id` int(8) NOT NULL,
  `title` varchar(225) NOT NULL,
  `slug_slider` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `author` varchar(225) NOT NULL,
  `counter` int(8) NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lang` enum('EN','ID') NOT NULL,
  `sub_title` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`id`, `title`, `slug_slider`, `description`, `status`, `author`, `counter`, `date_post`, `lang`, `sub_title`, `foto`) VALUES
(3, 'WEB APPLICATION', 'web-application.html', '<p>Together with many industries, we have worked on more than 70 website-based applications that are integrated with a variety of hardware, with high architecture and security.</p>\r\n', 1, '', 0, '2020-08-01 19:04:32', 'EN', 'MONOLITICH AND MICRO SERVICE', 'Lines1.mp4'),
(4, 'DEKSTOP APPLICATION', 'dekstop-application.html', '<p>With our experience, we have worked on desktop programs that are capable of reading e-KTP chips, modem &amp; qrcode scanner.</p>\r\n', 1, '', 0, '2020-08-01 19:04:15', 'EN', 'MULTI CROSS PLATFORM', 'animation-intro1.mp4'),
(5, 'BIG DATA', 'big-data.html', '<p>With our experience in big data, we can help you manage your enterprise database.</p>\r\n', 1, '', 0, '2020-08-01 19:19:11', 'EN', 'DATABASE CLUSTER', 'forest.mp4'),
(6, 'ANDROID APPLICATION', 'android-application.html', '<p>With more than 7 years of experience in the programming world, we have worked on many android-based applications, with native technology and with hybrid technology modeling.</p>\r\n', 1, '', 0, '2020-08-01 19:19:13', 'EN', ' NATIVE & HYBRID TECHNOLOGY', 'android.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_page`
--

CREATE TABLE `sub_page` (
  `id_sub_page` int(8) NOT NULL,
  `id_page` int(8) NOT NULL,
  `counter` int(8) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `status` int(1) NOT NULL,
  `lang` enum('EN','ID') NOT NULL,
  `slug_sub_page` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_page`
--

INSERT INTO `sub_page` (`id_sub_page`, `id_page`, `counter`, `title`, `description`, `date_post`, `author`, `foto`, `status`, `lang`, `slug_sub_page`) VALUES
(3, 1, 40, 'Profil Payung Anak Bangsa is a company engaged in IT Solution', '<p>PT. Payung Anak Bangsa is a company engaged in IT Solution. As an experienced IT consultant, we can provide the right solution for all kinds of the problems in managing your IT system and enterprise architecture. We&#39;ll provide advice and include in the implementation of your system ,so that it can improve the performance of your business. We have skilled and experienced professionals in their fields.</p>\r\n', '2020-08-03 13:59:40', 'Andre', '7f9b10ef227d04d42838556ac1313931.png', 1, 'EN', 'profil-payung-anak-bangsa-is-a-company-engaged-in-it-solution.html'),
(4, 7, 2, 'OUR SERVICES', '<p>PT. Payung Anak Bangsa is a company engaged in IT Solution. As an experienced IT consultant, we can provide the right solution for all kinds of the problems in managing your IT system and enterprise architecture. We&#39;ll provide advice and include in the implementation of your system ,so that it can improve the performance of your business. We have skilled and experienced professionals in their fields.</p>\r\n', '2020-08-03 13:56:30', 'Andre', '6089b6c5614d1b0529f08bb94515c3af.png', 0, 'EN', 'our-services.html'),
(6, 4, 17, 'OUR TERMS', '<p>PT. Payung Anak Bangsa is a company engaged in IT Solution. As an experienced IT consultant, we can provide the right solution for all kinds of the problems in managing your IT system and enterprise architecture. We&#39;ll provide advice and include in the implementation of your system ,so that it can improve the performance of your business. We have skilled and experienced professionals in their fields.</p>\r\n', '2020-08-03 13:56:42', 'Andre', '04227b0e627f40b770b8e6ace164ee10.png', 0, 'EN', 'our-terms.html'),
(7, 8, 1, 'Profil Payung Anak Bangsa adalah perusahaan yang bergerak di bidang IT Solution', '<p>PT. Payung Anak Bangsa adalah perusahaan yang bergerak di bidang IT Solution. Sebagai konsultan IT yang berpengalaman, kami dapat memberikan solusi yang tepat untuk semua jenis masalah dalam mengelola sistem TI dan arsitektur perusahaan Anda. Kami akan memberikan saran dan memasukkan dalam implementasi sistem Anda, sehingga dapat meningkatkan kinerja bisnis Anda. Kami memiliki profesional yang terampil dan berpengalaman di bidangnya.</p>\r\n', '2020-08-03 13:59:44', 'Andre', '2dfa9100a0b129f842ca99186ea70c48.png', 1, 'ID', 'profil-payung-anak-bangsa-adalah-perusahaan-yang-bergerak-di-bidang-it-solution.html');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_gallery`
--
ALTER TABLE `category_gallery`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `master_administrator`
--
ALTER TABLE `master_administrator`
  ADD PRIMARY KEY (`id_administrator`);

--
-- Indexes for table `master_article`
--
ALTER TABLE `master_article`
  ADD PRIMARY KEY (`id_article`);

--
-- Indexes for table `master_category_article`
--
ALTER TABLE `master_category_article`
  ADD PRIMARY KEY (`id_category_article`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_page`
--
ALTER TABLE `sub_page`
  ADD PRIMARY KEY (`id_sub_page`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_gallery`
--
ALTER TABLE `category_gallery`
  MODIFY `id_category` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `master_administrator`
--
ALTER TABLE `master_administrator`
  MODIFY `id_administrator` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_article`
--
ALTER TABLE `master_article`
  MODIFY `id_article` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `master_category_article`
--
ALTER TABLE `master_category_article`
  MODIFY `id_category_article` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sub_page`
--
ALTER TABLE `sub_page`
  MODIFY `id_sub_page` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
