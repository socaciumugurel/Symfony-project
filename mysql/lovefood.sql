-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2016 at 07:48 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lovefood`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `recipes_id` int(11) DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_comment` datetime NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `recipes_id`, `comment`, `date_of_comment`, `likes`) VALUES
(1, 1, 'O retata minunata', '2016-12-03 15:20:11', 6),
(2, 1, 'Cea mai buna reteta! Minunat', '2016-12-03 11:15:21', 190),
(3, 2, 'Declicious', '2016-12-05 08:00:00', 12),
(9, 5, 'E fff foarte bun', '2016-12-12 17:58:18', 0),
(10, 1, 'buna ideea cu cutia, chiar o sa o aplic saptamana asta, am in plan niste aripioare pane. imi fac planul cu prajelile pe anul asta', '2016-12-12 17:58:51', 0),
(11, 1, 'snitele sunt preferatele mele,am sa incerc sa fac ,sa vad dak ii plac viitorului meu sot.', '2016-12-12 17:58:59', 0),
(12, 1, 'ocmai acum am facut si eu dupa reteta asta, au iesit f bune  vesel mai facem niste cartofi copti dupa care o bere merge perfect.', '2016-12-12 17:59:10', 0),
(13, 2, 'mmmm … arata bine si cred ca este bun . Si eu imi fac singur burgerii acasa ( fetita mea nu stie de McDonald sau altceva de genul acesta ) . Cu siguranta , cu proxima ocazie , o sa incerc reteta ta . Multumim Adi si sa traiesti intru multi ani , impreuna ', '2016-12-12 19:45:55', 0),
(14, 2, 'hârtia de copt e pentru burgeri. nu trebuie să fie unsă cu nimic.', '2016-12-12 19:46:48', 0),
(15, 2, 'dacă te gândești la pâinea de sub chiftea, am puso pe hârtia de copt de pe care am luat chiftelele.', '2016-12-12 19:46:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `recipes_id` int(11) DEFAULT NULL,
  `ingredient` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `recipes_id`, `ingredient`) VALUES
(1, 1, 'o lingurita de unt'),
(3, 1, '1 kg piept de pui dezosat (4 bucati piept de pui)'),
(4, 1, '4 oua'),
(5, 1, '3 linguri faina'),
(6, 1, '150 gr pesmet cu verdeturi (sau pesmet simplu)'),
(7, 1, 'piper, sare'),
(8, 1, 'mult ulei pentru prajit'),
(9, 5, '1 cana orez'),
(10, 5, '1 ardei gras sau capia sau gogosar'),
(11, 5, '1 ceapa mica'),
(12, 5, '2 morcovi'),
(13, 5, 'tulpini de telina'),
(14, 5, 'ulei de masline'),
(15, 5, 'piper si sare'),
(16, 5, 'sos de soia');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pieces` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` double NOT NULL,
  `likes` int(11) NOT NULL,
  `preparation_time` int(11) NOT NULL,
  `cook_time` int(11) NOT NULL,
  `rates` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `method`, `pieces`, `rating`, `likes`, `preparation_time`, `cook_time`, `rates`) VALUES
(1, 'Snitel de pui', 'Pieptul se taie felii, cate 3-4 felii din fiecare bucata.\nFiecare felie se bate pe ambele parti pana devine subtirel. Se pipereaza feliile.\n* daca nu folositi pesmet cu verdeturi care e deja sarat puneti si putina sare pe feliile de carne\nIntr-o tigaie se incinge bine ulei cam de 2 degete.\nIntr-un bol se bat ouale cu putina sare si apoi se incorporeaza faina. Pesmetul se pune pe o farfurie lata.\nFiecare felie de carne se scufunda in vasul cu ou , apoi se trece prin pesmet pe ambele parti.\nSe pajesc snitelele cam 3 minute pe o parte si apoi inca 3 pe cealalta. Se scot pe servetele de hartie sa se absoarba grasimea.', '6', 4.5, 43, 20, 45, 0),
(2, 'Burgeri', 'Intr-o cratita, pe foc, se pune la calit in putin unt ceapa alba cu o foaie de dafin si piper si se rumeneste amestecul. Apoi, se stinge totul cu putin Wiskey, daca-ti place adaosul de aroma. Se lasa la racit si se scoate dafinul si se amesteca cu carnea tocata. Se framanta bine sa se lege carnea si in felul acesta nu se mai desprinde pe gratar. Apoi, modelezi bile de carne egale pe carne le turtesti la o dimensiune mai mare decat chifla cu 2 cm si o grosime de un deget jumatate, minim. Se lasa carnea la rece.\nDupa aceea, se taie ceapa rosie, rosia si castravetele murat in otet. Se pregateste mustarul Dijon si maioneza de casa cu putina ceapa verde. Se taie doua felii de cheddar afumat si maturat si se spala si taie salata.\nSe scoate carnea din frigider si se incinge bine gratarul.  Se unge carnea cu putin ulei, se da cu sare si piper si se pune pe gratar. Dupa un minut se intoarce burgerul si se pune putin mustar Dijon si tabasco peste. Carnea trebuie gatita mediu.\nSe pune si baconul pe gratar si atunci cand carnea este aproape gata si baconul destul de crocant, se face un turn impreuna cu cheddar-ul. Se pune si chifla taiata in doua sa se rumeneasca si apoi se monteaza burger-ul dupa bunul plac.\n\n\nCiteste pe Foodstory: http://foodstory.stirileprotv.ro/evenimente/chef-foa-te-invata-sa-faci-un-burger-delicios#ixzz4SdyZ4wSb \nFollow us: foodstory.ro on Facebook', '2', 3, 12, 20, 10, 0),
(5, 'Orez chinezesc cu legume si sos de soia', 'Orezul (preferabil orez cu bob lung) se spala bine si se lasa aproximativ o ora in apa rece. Se adauga la o cana de orez o cana de apa si 3 linguri de ulei de masline. Orezul se fierbe intr-o oala care nu se lipeste pe fund urmand 3 pasi simpli: initial se fierbe la foc mare fara capac, cand incepe sa clocoteasca se pune capacul intr-o parte in asa fel incat sa iasa aburul si se da focul mediu. Nu uitati sa amestecati din cand in cand. Cand incep sa se faca cratere in orez se da focul mic si se asaza bine capacul. Se mai lasa pe foc pana cand fierbe. Daca spalati bine orezul si puneti si ulei de masline la fiert nu se vor mai lipi boabele.\r\n\r\n Intre timp, se spala legumele si se curata. Ardeii se taie in patratele, ceapa in patru, apoi fiecare sfert se taie in trei si foile de ceapa se despart una de cealalta. Morcovii se taie in rondele oblice, subtiri. Dupa gust se iau tulpinite de telina si se taie rondele. \r\n\r\n Intr-o tigaie suficient de mare (preferabil un wok) se incing 3-4 linguri de ulei si se pun legumele la foc iute. Se amesteca in continuu in asa fel incat legumele sa nu se inmoaie sau sa se arda. Cand ceapa isi pierde iuteala si morcovii sunt aurii se adauga orezul fiert. Se lasa pe foc in continuare 3-4 minute. Este foarte important ca in permanenta sa se amestece, ca sa nu se lipeasca. Se adauga sos de soia, piper si daca mai este nevoie sare. \r\n\r\n Se poate consuma ca atare sau ca garnitura.', '3', 4.2, 37, 40, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_pictures`
--

CREATE TABLE `recipe_pictures` (
  `id` int(11) NOT NULL,
  `recipes_id` int(11) DEFAULT NULL,
  `file_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recipe_pictures`
--

INSERT INTO `recipe_pictures` (`id`, `recipes_id`, `file_location`) VALUES
(7, 2, 'df35dbe690794ad9c9be799660116206.jpeg'),
(8, 2, '01dec97c06d6bc92b83da5b331b6eb5b.jpeg'),
(9, 2, 'd30221d2644832330e68ef5adce75b6d.jpeg'),
(10, 5, '8b3dc7b1cd184b1a2bc7b45168bbfa7e.jpeg'),
(11, 5, '965e3713bff64000b7a2f8d530a381f9.jpeg'),
(12, 5, 'a47f3bca1f7df758d259234f06d15b7b.jpeg'),
(13, 1, '5dfb7c364c19b38e120850fe578efc0a.jpeg'),
(14, 1, '6d3e3ce5be177404789e14341f1de35c.jpeg'),
(15, 1, '0d6fe9db446801b7982c385f3044f79a.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `username`, `is_active`) VALUES
(1, 'mugurel.socaciu@gmail.com', '$2a$08$jHZj/wJfcVKlIwr5AvR78euJxYK7Ku5kURNhNx.7.CSIJ3Pq6LEPC', 'df', 0),
(2, 'ciobi@gmail.com', '$2y$13$ryTGL7BnedNNyQMxFK4.he9VFy8.EDY5BfEVY60faWzyZMYYs3B.K', 'ciobi', 1),
(3, 'sdf@eaf.com', '$2y$13$97vtxEKanMe4uBvRXnReFOOz8i7UjXUDtMTOBaHLPlyDtAVQG8Nq.', 'mugu', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5F9E962AFDF2B1FA` (`recipes_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4B60114FFDF2B1FA` (`recipes_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_pictures`
--
ALTER TABLE `recipe_pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F9EC8A5EFDF2B1FA` (`recipes_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `recipe_pictures`
--
ALTER TABLE `recipe_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_5F9E962AFDF2B1FA` FOREIGN KEY (`recipes_id`) REFERENCES `recipes` (`id`);

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `FK_4B60114FFDF2B1FA` FOREIGN KEY (`recipes_id`) REFERENCES `recipes` (`id`);

--
-- Constraints for table `recipe_pictures`
--
ALTER TABLE `recipe_pictures`
  ADD CONSTRAINT `FK_F9EC8A5EFDF2B1FA` FOREIGN KEY (`recipes_id`) REFERENCES `recipes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
