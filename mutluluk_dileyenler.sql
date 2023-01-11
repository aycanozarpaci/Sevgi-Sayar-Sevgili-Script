-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 11 Oca 2023, 21:50:14
-- Sunucu sürümü: 5.7.33
-- PHP Sürümü: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `aycan_aycanme`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mutluluk_dileyenler`
--

CREATE TABLE `mutluluk_dileyenler` (
  `mutluluk_id` int(11) NOT NULL,
  `mutluluk_ip` varchar(250) NOT NULL,
  `mutluluk_tarih` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `mutluluk_dileyenler`
--

INSERT INTO `mutluluk_dileyenler` (`mutluluk_id`, `mutluluk_ip`, `mutluluk_tarih`) VALUES
(1, '::1', '2023-01-11');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `mutluluk_dileyenler`
--
ALTER TABLE `mutluluk_dileyenler`
  ADD PRIMARY KEY (`mutluluk_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `mutluluk_dileyenler`
--
ALTER TABLE `mutluluk_dileyenler`
  MODIFY `mutluluk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
