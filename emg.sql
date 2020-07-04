-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Haz 2020, 12:47:55
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `emg`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `book_image` text NOT NULL,
  `book_name` text NOT NULL,
  `author` text NOT NULL,
  `category` text NOT NULL,
  `page_number` int(11) NOT NULL,
  `isbn` text NOT NULL,
  `tags` text NOT NULL,
  `pdf_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `book`
--

INSERT INTO `book` (`id`, `category_id`, `book_image`, `book_name`, `author`, `category`, `page_number`, `isbn`, `tags`, `pdf_file`) VALUES
(1, 1, 'images/book/brownEyes.png', 'Brown Eyes', 'Paul Stewart', 'Fiction Book', 34, '0 582 401 110 0', 'brown eyes action book paul stewart fiction book', 'Books/Brown_Eyes.pdf'),
(2, 1, 'images/book/thePowerParable.png', 'The Power Parable', 'John Dominic Crossan', 'Fiction Book', 256, '859 9658 12 65', 'The Power Parable John Dominic Crossan Fiction Book', 'Books/The Power of Parable_ How Fiction by Jesus Became Fiction about Jesus.pdf'),
(3, 1, 'images/book/loveOrMoney.png', 'Love Or Money', 'Rowena Akinyemi', 'Fiction Book', 54, '978 0 19 4789080', 'rowena akinyemi Love Or Money fiction book ', 'Books/LoveorMoney.pdf'),
(4, 6, 'images/book/victorianHouses.png', 'Victorian Houses and Their Details', 'Helen Long', 'History Book', 145, '0 7506 4848 1', 'history book victorian houses and their details helen long history book', 'Books/Victorian Houses and their Details.pdf'),
(5, 6, 'images/book/theSixthExyinction.png', 'The Sixth Extinction ', 'Elizabeth Kolbert', 'History Book', 323, '978 0 8050 9979 9', 'The Sixth Extinction An Unnatural History by Elizabeth Kolbert history book', 'Books/The Sixth Extinction An Unnatural History by Elizabeth Kolbert.pdf'),
(6, 2, 'images/book/theLittleBook.png', 'The Little Book of Big Dividends', 'Charles B. Carlson', 'Fiction Book', 201, '978 0 470 567 99 9', 'The Little Book of Big Dividends Charles B. Carlson action book', 'Books/The Little Book of Big Dividends.pdf'),
(7, 3, 'images/book/1001.png', '1001 ways to be Romantic', 'Gregory J. P. Godek', 'Romantic Book', 466, '978 1 4022 1646 6', '1001 ways to be Romantic Gregory J. P. Godek Romantic Book', 'Books/e_1001-ways-to-be-romantic.pdf'),
(8, 3, 'images/book/wiredForLove.png', 'Wired for Love', 'Stan Tatkin', 'Romantic Book', 183, '978 1 60882 059 7', 'Wired for Love Stan Tatkin Romantic Book', 'Books/Wired for Love.pdf'),
(9, 3, 'images/book/writing_selling_romantic.png', 'Writing & Selling Romantic Comedy ', 'Craig Batty & Helen Jacey', 'Romantic Book', 151, '485 178 452 059 7', 'Writing & Selling Romantic Comedy Screenplays Craig Batty & Helen Jacey Romantic Book', 'Books/Writing & Selling Romantic Comedy Screenplays.pdf'),
(10, 4, 'images/book/theRiseOfModern.png', 'The Rise of Modern Philosophy', 'Anthony Kenny', 'Philosophy Book', 371, '0 19 875277 6', 'The Rise of Modsern Philosophy Anthony Kenny Philosophy Book', 'Books/The Rise of Modern Philosophy.pdf'),
(11, 4, 'images/book/philosophyInTheModernWorld.png', 'Philosophy In The Modern World', ' Anthony Kenny', 'Philosophy Book', 364, '978 0 19 875279 0', 'Philosophy In The Modern World Anthony Kenny Philosophy Book', 'Books/Philosophy in the Modern World_ A New History of Western Philosophy.pdf'),
(12, 4, 'images/book/spinoza.png', 'Spinoza In Twenty-First-Century American and French Philosophy', ' Jack Stetter and Charles Ramond', 'Philosophy Book', 435, '978 1 3500 6730 1', 'Spinoza In Twenty-First-Century American and French Philosophy Jack Stetter and Charles Ramond Philosophy Book', 'Books/Spinoza in Twenty-First-Century American and French Philosophy_ Metaphysics, Philosophy of Mind, Moral and Political Philosophy.pdf'),
(13, 4, 'images/book/theHandlyPhilosophyAnswerBook.png', 'The Handly Philosophy Answer Book', 'Naomi Zack', 'Philosophy Book', 435, '978 1 57859 226 5', 'The Handly Philosophy Answer Book Naomi Zack Philosophy Book', 'Books/The Handy Philosophy Answer Book (The Handy Answer Book Series) .pdf'),
(14, 1, 'images/book/scienceFiction.png', 'The Science Fiction Hall of Fame', 'Isaac Asimov', 'Fiction Book', 369, '978 0 7653 0532 9', 'The Science Fiction Hall of Fame Isaac Asimov Fiction Book', 'Books/The Science Fiction Hall of Fame.pdf'),
(15, 1, 'images/book/analog.png', 'Analog ', 'Edward M. Lerner', 'Fiction Book', 143, '251 0 7856 7458 7', 'Analog Edward M. Lerner Fiction Book', 'Books/Analog Science Fiction and Fact - March 2016.pdf'),
(16, 1, 'images/book/plotAndStructure.png', 'Plot & Structure ', 'James Scott Bell', 'Fiction Book', 240, '978 1 58297 294 7', 'Plot & Structure  James Scott Bell Fiction Book', 'Books/Plot & Structure_ Techniques And Exercises For Crafting A Plot That Grips Readers From Start To Finish.pdf');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(1, 'Fiction Books', 'images/categories/fiction.jpg'),
(2, 'Action Books', 'images/categories/action.jpg'),
(3, 'Romantics Books', 'images/categories/romantic.jpg'),
(4, 'Philosophy Books', 'images/categories/philosophy.jpg'),
(5, 'Biographys Book', 'images/categories/biography.jpg'),
(6, 'History Books', 'images/categories/history.jpg'),
(7, 'Science Books\r\n', 'images/categories/science.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `code`
--

CREATE TABLE `code` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` enum('a','p') NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `code`
--

INSERT INTO `code` (`id`, `code`, `status`) VALUES
(1, 'UTAA', 'p'),
(2, 'DENEME123', 'p'),
(3, 'SENIOR', 'a'),
(4, 'PROJECT', 'p'),
(5, 'ZOOM12', 'a'),
(6, 'UTAA123', 'a'),
(7, 'THKU32', 'a');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `list`
--

CREATE TABLE `list` (
  `id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `list`
--

INSERT INTO `list` (`id`, `book_id`, `user_id`) VALUES
(1, 2, 2),
(2, 4, 2),
(26, 5, 3),
(27, 6, 3),
(30, 8, 1),
(31, 5, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `image`, `link`) VALUES
(1, 'images/sliders/book1.png', '/yeni_son/book.php?id=11'),
(2, 'images/sliders/book2.png', '/yeni_son/book.php?id=6'),
(3, 'images/sliders/book3.png', '/yeni_son/book.php?id=1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `surname` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `uid` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `phone`, `email`, `uid`, `password`) VALUES
(1, 'Necati Berk', 'Celik', '5455425532', 'necatiberk@gmail.com', 'UTAA', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Kemal', 'Uraz', '5546954323', 'xx@gmail.com', 'DENEME123', 'f561aaf6ef0bf14d4208bb46a4ccb3ad'),
(3, 'ayhan', 'turan', '5548962356', 'k@gmail.com', 'PROJECT', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `machine_code` (`uid`(16)),
  ADD KEY `uid` (`uid`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `code`
--
ALTER TABLE `code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `list`
--
ALTER TABLE `list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
