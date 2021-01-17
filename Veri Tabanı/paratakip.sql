-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Ara 2020, 19:20:42
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `paratakip`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `chartjs`
--

CREATE TABLE `chartjs` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `amounts` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `chartjs`
--

INSERT INTO `chartjs` (`id`, `title`, `amounts`) VALUES
(1, 'Saglik', 65),
(2, 'Akaryakit', 180),
(3, 'Market', 70),
(4, 'Restoran', 135),
(5, 'Ulasim', 48),
(6, 'Hediye', 182);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haraketler`
--

CREATE TABLE `haraketler` (
  `id` int(200) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `kurum` varchar(200) NOT NULL,
  `harcananmiktar` int(200) NOT NULL,
  `islemhesap` varchar(200) NOT NULL,
  `gbakiye` int(200) NOT NULL,
  `islemtarih` date DEFAULT current_timestamp(),
  `eskibakiye` int(11) NOT NULL,
  `ip` varchar(11) NOT NULL,
  `anlikzaman` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `haraketler`
--

INSERT INTO `haraketler` (`id`, `kategori`, `kurum`, `harcananmiktar`, `islemhesap`, `gbakiye`, `islemtarih`, `eskibakiye`, `ip`, `anlikzaman`) VALUES
(32, 'Saglik', 'Kızılay Eczane', 65, 'Ziraat', 4850, '2020-11-04', 4915, '::1', '2020-11-02 23:01:33'),
(33, 'Akaryakit', 'Shell', 100, 'Yapı Kredi', 3400, '2020-12-21', 3500, '::1', '2020-12-21 13:56:18'),
(34, 'Market', 'Migros', 70, 'Ziraat', 4780, '2020-12-21', 4850, '::1', '2020-12-21 13:56:54'),
(35, 'Restoran', 'Nusret', 135, 'Yapı Kredi', 3265, '2020-12-26', 3400, '::1', '2020-12-26 14:02:09'),
(36, 'Ulasim', 'Kamil Koç', 48, 'Ziraat', 4732, '2020-12-27', 4780, '::1', '2020-12-27 13:57:34'),
(37, 'Hediye', 'Kanatlı Avm', 182, 'Yapı Kredi', 3083, '2020-12-28', 3265, '::1', '2020-12-28 13:58:09'),
(41, 'Akaryakit', 'Bp', 80, 'Ziraatt', 4920, '2020-12-28', 5000, '::1', '2020-12-28 18:11:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hesapekle`
--

CREATE TABLE `hesapekle` (
  `id` int(11) NOT NULL,
  `hesapadi` varchar(200) NOT NULL,
  `birim` varchar(200) NOT NULL,
  `nakitkart` varchar(200) NOT NULL,
  `miktar` int(11) NOT NULL,
  `hesaptarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `hesapekle`
--

INSERT INTO `hesapekle` (`id`, `hesapadi`, `birim`, `nakitkart`, `miktar`, `hesaptarih`) VALUES
(96, 'Ziraatt', 'TL', 'Nakit', 4920, '2020-12-27 09:55:50'),
(128, 'Yapı Kredi', 'TL', 'Kart', 3103, '2020-12-28 13:54:31'),
(130, 'Teb', 'Dolar', 'Kart', 1500, '2020-12-28 15:03:02');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kisilog`
--

CREATE TABLE `kisilog` (
  `id` int(11) NOT NULL,
  `kisimail` varchar(30) NOT NULL,
  `kisiharaket` varchar(100) NOT NULL,
  `kisitarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(10) NOT NULL,
  `kdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kisilog`
--

INSERT INTO `kisilog` (`id`, `kisimail`, `kisiharaket`, `kisitarih`, `ip`, `kdate`) VALUES
(75, 'STElbatra@hotmail.com', 'Giriş Yaptı', '2020-12-20 12:36:24', '::1', '2020-12-20'),
(81, 'STElbatra@hotmail.com', 'Çıkış Yaptı', '2020-12-20 13:49:14', '::1', '2020-12-20'),
(83, 'STElbatra@hotmail.com', 'Yapı Kredi isminde yeni bir hesap oluşturdu', '2020-12-25 13:54:31', '::1', '2020-12-25'),
(84, 'STElbatra@hotmail.com', 'Saglik kategorisinde harcama yaptı', '2020-12-25 13:55:57', '::1', '2020-12-25'),
(85, 'STElbatra@hotmail.com', 'Akaryakit kategorisinde harcama yaptı', '2020-12-26 13:59:47', '::1', '2020-12-26'),
(86, 'STElbatra@hotmail.com', 'Market kategorisinde harcama yaptı', '2020-12-26 13:59:56', '::1', '2020-12-26'),
(87, 'STElbatra@hotmail.com', 'Restoran kategorisinde harcama yaptı', '2020-12-28 13:57:08', '::1', '2020-12-28'),
(88, 'STElbatra@hotmail.com', 'Ulasim kategorisinde harcama yaptı', '2020-12-28 13:57:34', '::1', '2020-12-28'),
(89, 'STElbatra@hotmail.com', 'Hediye kategorisinde harcama yaptı', '2020-12-28 13:58:09', '::1', '2020-12-28'),
(97, 'STElbatra@hotmail.com', 'TEB isminde yeni bir hesap oluşturdu', '2020-12-28 15:03:02', '::1', '2020-12-28'),
(152, 'STElbatra@hotmail.com', 'Giriş Yaptı', '2020-12-28 18:07:17', '::1', '2020-12-28'),
(153, 'STElbatra@hotmail.com', 'Garanti isminde yeni bir hesap oluşturdu', '2020-12-28 18:07:54', '::1', '2020-12-28'),
(154, 'STElbatra@hotmail.com', 'Garanti Eskişehir İsimli hesabı güncelledi', '2020-12-28 18:09:08', '::1', '2020-12-28'),
(155, 'STElbatra@hotmail.com', 'Akaryakit kategorisinde harcama yaptı', '2020-12-28 18:11:28', '::1', '2020-12-28'),
(156, 'STElbatra@hotmail.com', 'Üye Bilgilerini Güncelledi', '2020-12-28 18:12:21', '::1', '2020-12-28'),
(157, 'STElbatra@hotmail.com', 'Çıkış Yaptı', '2020-12-28 18:13:15', '::1', '2020-12-28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `parabirimi`
--

CREATE TABLE `parabirimi` (
  `id` int(11) NOT NULL,
  `pbirim` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `parabirimi`
--

INSERT INTO `parabirimi` (`id`, `pbirim`) VALUES
(1, 'TL'),
(2, 'Dolar'),
(3, 'Euro'),
(4, 'Sterlin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(200) NOT NULL,
  `kullanici_mail` varchar(200) NOT NULL,
  `kullanici_tel` int(20) NOT NULL,
  `kullanici_adres` varchar(200) NOT NULL,
  `kullanici_sifre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `kullanici_adi`, `kullanici_mail`, `kullanici_tel`, `kullanici_adres`, `kullanici_sifre`) VALUES
(1, 'Semih Dağhan', 'STElbatra@hotmail.com', 2147483647, 'Ankara', '123456');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `chartjs`
--
ALTER TABLE `chartjs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `haraketler`
--
ALTER TABLE `haraketler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hesapekle`
--
ALTER TABLE `hesapekle`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kisilog`
--
ALTER TABLE `kisilog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `parabirimi`
--
ALTER TABLE `parabirimi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `chartjs`
--
ALTER TABLE `chartjs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `haraketler`
--
ALTER TABLE `haraketler`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Tablo için AUTO_INCREMENT değeri `hesapekle`
--
ALTER TABLE `hesapekle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- Tablo için AUTO_INCREMENT değeri `kisilog`
--
ALTER TABLE `kisilog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- Tablo için AUTO_INCREMENT değeri `parabirimi`
--
ALTER TABLE `parabirimi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
