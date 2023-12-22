-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:4306
-- Üretim Zamanı: 13 Ara 2023, 03:39:49
-- Sunucu sürümü: 5.7.24
-- PHP Sürümü: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `prod_prod0x`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `affiliate_users`
--

CREATE TABLE `affiliate_users` (
  `id` int(11) NOT NULL,
  `inviting` varchar(1024) NOT NULL,
  `guest` varchar(1024) NOT NULL,
  `earning` longtext NOT NULL,
  `time` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon_key` longtext NOT NULL,
  `coupon_code` longtext NOT NULL,
  `coupon_discount` longtext NOT NULL,
  `coupon_expired` longtext NOT NULL,
  `coupon_limit` longtext NOT NULL,
  `coupon_product` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_key`, `coupon_code`, `coupon_discount`, `coupon_expired`, `coupon_limit`, `coupon_product`) VALUES
(1, '840136f9-8549-4de3-89be-658febec1fdd', '4YYt5G3AY1LWxDqKU18k8g==', '15', '1704113998', '2', 'ALL');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `coupon_used`
--

CREATE TABLE `coupon_used` (
  `id` int(11) NOT NULL,
  `user_key` longtext NOT NULL,
  `coupon_key` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `db_logs`
--

CREATE TABLE `db_logs` (
  `id` int(11) NOT NULL,
  `errno` int(2) NOT NULL,
  `errtype` varchar(32) NOT NULL,
  `errstr` text NOT NULL,
  `errfile` varchar(255) NOT NULL,
  `errline` int(4) NOT NULL,
  `user_agent` varchar(120) NOT NULL,
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `db_logs`
--

INSERT INTO `db_logs` (`id`, `errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES
(39, 0, '0', 'Call to undefined method Sellix\\PhpSdk\\Sellix::create_cart()', 'D:\\htdocs_prod\\prod-0x\\application\\controllers\\Pay.php', 126, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '127.0.0.1', '2023-12-03 04:42:49'),
(40, 0, '0', 'Call to undefined method Sellix\\PhpSdk\\Sellix::create_cart()', 'D:\\htdocs_prod\\prod-0x\\application\\controllers\\Pay.php', 126, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '127.0.0.1', '2023-12-03 04:43:13'),
(41, 400, '400', 'Invalid Product Type.', 'D:\\htdocs_prod\\prod-0x\\application\\third_party\\vendor\\sellix\\php-sdk\\src\\Sellix.php', 47, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '127.0.0.1', '2023-12-03 04:49:19'),
(42, 400, '400', 'Invalid Product Type.', 'D:\\htdocs_prod\\prod-0x\\application\\third_party\\vendor\\sellix\\php-sdk\\src\\Sellix.php', 47, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '127.0.0.1', '2023-12-03 04:51:27'),
(43, 400, '400', 'Invalid Product Type.', 'D:\\htdocs_prod\\prod-0x\\application\\third_party\\vendor\\sellix\\php-sdk\\src\\Sellix.php', 47, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '127.0.0.1', '2023-12-03 04:52:04'),
(44, 0, '0', 'syntax error, unexpected identifier \"submit\"', 'D:\\htdocs_prod\\prod-0x\\application\\views\\frontend\\pages\\cart.php', 39, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '127.0.0.1', '2023-12-13 03:08:28'),
(45, 0, '0', 'syntax error, unexpected identifier \"submit\"', 'D:\\htdocs_prod\\prod-0x\\application\\views\\frontend\\pages\\cart.php', 39, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '127.0.0.1', '2023-12-13 03:09:08');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `link` longtext NOT NULL,
  `text` longtext NOT NULL,
  `answer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `faq`
--

INSERT INTO `faq` (`id`, `link`, `text`, `answer`) VALUES
(1, 'tutorial', 'Can I Use The Products On Multiple Devices At The Same Time?', 'Answer to question 1 here..'),
(2, 'tutorial', 'I Have An Issue About Product, How Can I Get Help?', 'Answer to question 2 here...'),
(3, 'tutorial', 'The Spoofer Removes Ban From Account ?', 'Answer to question 3 here..'),
(4, 'tutorial', 'What Is Polymorphism ?', 'Answer to question 4 here...'),
(5, 'tutorial', 'What Is Spoofer ?', 'Answer to question 5 here...');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `loader_tokens`
--

CREATE TABLE `loader_tokens` (
  `id` int(11) NOT NULL,
  `token` longtext NOT NULL,
  `expired_time` longtext NOT NULL,
  `ip_address` longtext NOT NULL,
  `status` enum('active','passive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `loader_tokens`
--

INSERT INTO `loader_tokens` (`id`, `token`, `expired_time`, `ip_address`, `status`) VALUES
(1, 'wxU5nZx41Pg9Q7x9gtucdapb8Nio4hJh87Ad3ggMjx22vmXzcODp2DjDU22V1kjlKF6AFnEepDMJiJkybktMbxbBe1FU0oT77bxrio27OLQvUc02FgpqHzT5tk1XybRxxUPamfjUFeigMr5E0mmXJ8UHnqFlTHyqlYKWxWef1c5LT3g8zM6HPQfZrRH3rnmgc7pYhYBrnc5wCcMrOSlNraEH5EBkyiVGMQBzkQ0CimpMO7bvAfxb3DsTsqSQei5pSjNntkLUNLno0m5Beq6YqANTWWFyHeWYG01l7YY1v8iL0ZPcyp5G8SKQ5pDpoGy5nSJF2cMzggMMZ0xbfEPkZeNiWbVzzbgpsPsW4zRCFW1hSNAVNBy6uFRFbjffaWiHoqYTmd8ln4OJFr3tSj6pYRz7E313fnRZFiAokUZSuKeXL0ds4aE3wGUuPG68UxFQM9w6Dx3ZBshyLicGsleo9ApbrMUjwKuEjTFwAJwwmksGCcV1PBgWjOQrvCg4qY0J', '1701534148', 'Lo3yzIdkxxYZUXcOhtWdWQ==', 'active');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` longtext NOT NULL,
  `time` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_key` longtext NOT NULL,
  `user_key` longtext NOT NULL,
  `product_key` longtext NOT NULL,
  `period` longtext NOT NULL,
  `start_time` longtext NOT NULL,
  `finish_time` longtext NOT NULL,
  `price` longtext NOT NULL,
  `status` enum('active','passive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_key` longtext NOT NULL,
  `user_key` longtext NOT NULL,
  `product_key` longtext NOT NULL,
  `uniqid` longtext NOT NULL,
  `url` longtext NOT NULL,
  `period` longtext NOT NULL,
  `price` longtext NOT NULL,
  `status` enum('pending','completed','canceled') NOT NULL,
  `time` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_key` longtext NOT NULL,
  `product_slug` longtext NOT NULL,
  `product_name` longtext NOT NULL,
  `product_description` longtext NOT NULL,
  `product_subtitle` longtext NOT NULL,
  `product_image` longtext NOT NULL,
  `product_period` longtext NOT NULL,
  `product_features` longtext NOT NULL,
  `product_video` longtext NOT NULL,
  `product_link` longtext NOT NULL,
  `product_link_mirror` longtext NOT NULL,
  `product_status` enum('draft','deactive','active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `product_key`, `product_slug`, `product_name`, `product_description`, `product_subtitle`, `product_image`, `product_period`, `product_features`, `product_video`, `product_link`, `product_link_mirror`, `product_status`) VALUES
(1, 'b69ad28cf5ff4d8b35477097368f36b4', 'pubg', 'Playerunknowns Battlegrounds', '                  <span>Enhancing Your Apex Legends Experience With Apex Legends</span>                   <span>Cheats, Scripts and Hacks.</span>                   <span>Safe and Secure Apex Legends Hacks.</span>', 'UNLOCKING THE POTENTIAL OF LEAGUE OF LEGENDS WITH OUR HACKS', '3.webp', '{\"basic\":{\"day\":\"3\",\"price\":\"10\",\"info\":[\"Undetected\",\"Internal\",\"Orbwalker\",\"Prediction\",\"Awareness\",\"Activator\",\"Zoomhack\"]},\"gold\":{\"day\":\"7\",\"price\":\"20\",\"info\":[\"Undetected\",\"Internal\",\"Orbwalker\",\"Prediction\",\"Awareness\",\"Activator\",\"Zoomhack\"]},\"platinum\":{\"day\":\"30\",\"price\":\"50\",\"info\":[\"Undetected\",\"Internal\",\"Orbwalker\",\"Prediction\",\"Awareness\",\"Activator\",\"Zoomhack\"]}}', '{\"aim\":[\"Advanced Recoil\",\"Aim Bot\",\"Recoil Control Sys\",\"Visible Lock\",\"Realitive Fov\"],\"misc\":[\"Bunny Hop\",\"Third Person\",\"Weapen Chams\",\"Fake Duck\",\"Skin Changer\",\"Map Radar\"],\"visual\":[\"Visibility Check\",\"Health Shield Info\",\"Glow Esp\",\"Item Esp\",\"Zoom Hack\"]}', 'https://www.youtube.com/embed/u1oqfdh4xBY?si=VfB-1P1jPr8De0uq', '', '', 'active'),
(2, 'c063870716c00a743321f780cdb95c20', 'rainbow-six-siege', 'Rainbow Six Siege', '', '', '1.webp', '{\"basic\":{\"day\":\"3\",\"price\":\"10\",\"info\":[\"Undetected\",\"Internal\",\"Orbwalker\",\"Prediction\",\"Awareness\",\"Activator\",\"Zoomhack\"]},\"gold\":{\"day\":\"7\",\"price\":\"20\",\"info\":[\"Undetected\",\"Internal\",\"Orbwalker\",\"Prediction\",\"Awareness\",\"Activator\",\"Zoomhack\"]},\"platinum\":{\"day\":\"30\",\"price\":\"50\",\"info\":[\"Undetected\",\"Internal\",\"Orbwalker\",\"Prediction\",\"Awareness\",\"Activator\",\"Zoomhack\"]}}', '{\"aim\":[\"Advanced Recoil\",\"Aim Bot\",\"Recoil Control Sys\",\"Visible Lock\",\"Realitive Fov\"],\"misc\":[\"Bunny Hop\",\"Third Person\",\"Weapen Chams\",\"Fake Duck\",\"Skin Changer\",\"Map Radar\"],\"visual\":[\"Visibility Check\",\"Health Shield Info\",\"Glow Esp\",\"Item Esp\",\"Zoom Hack\"]}', 'https://www.youtube.com/embed/-TKfvTHRM6E?si=_wAm_4gk1iYdYK85', '', '', 'active'),
(3, 'f5e265d607cb720058fc166e00083fe8', 'rust', 'Rust', '', '', '2.webp', '{\"basic\":{\"day\":\"3\",\"price\":\"10\",\"info\":[\"Undetected\",\"Internal\",\"Orbwalker\",\"Prediction\",\"Awareness\",\"Activator\",\"Zoomhack\"]},\"gold\":{\"day\":\"7\",\"price\":\"20\",\"info\":[\"Undetected\",\"Internal\",\"Orbwalker\",\"Prediction\",\"Awareness\",\"Activator\",\"Zoomhack\"]},\"platinum\":{\"day\":\"30\",\"price\":\"50\",\"info\":[\"Undetected\",\"Internal\",\"Orbwalker\",\"Prediction\",\"Awareness\",\"Activator\",\"Zoomhack\"]}}', '{\"aim\":[\"Advanced Recoil\",\"Aim Bot\",\"Recoil Control Sys\",\"Visible Lock\",\"Realitive Fov\"],\"misc\":[\"Bunny Hop\",\"Third Person\",\"Weapen Chams\",\"Fake Duck\",\"Skin Changer\",\"Map Radar\"],\"visual\":[\"Visibility Check\",\"Health Shield Info\",\"Glow Esp\",\"Item Esp\",\"Zoom Hack\"]}', 'https://www.youtube.com/embed/LGcECozNXEw?si=XeYWcJ1H0b8pzjtU', '', '', 'active');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `encrypt_key` longtext NOT NULL,
  `play_button` longtext NOT NULL,
  `sellix_api` longtext NOT NULL,
  `discord` longtext NOT NULL,
  `instagram` longtext NOT NULL,
  `tiktok` longtext NOT NULL,
  `youtube` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `encrypt_key`, `play_button`, `sellix_api`, `discord`, `instagram`, `tiktok`, `youtube`) VALUES
(1, '267165ab4271cc63610007e1c3c8d5846f916ea6481911795b5e078e202df13b576c579f20f3f3142c53ecffdd3045f62b532fb7459d6e86deda5feaddab08e6', 'https://www.youtube.com/embed/2Q0-c2Kw7HE?si=0hhH0T_eYYrVTuhx', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_key` varchar(1024) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `balance` varchar(1024) NOT NULL,
  `affiliate_code` varchar(1024) NOT NULL,
  `hardware_id` longtext NOT NULL,
  `hwid_time` longtext NOT NULL,
  `last_login` varchar(1024) NOT NULL,
  `last_ip` varchar(1024) NOT NULL,
  `last_forgot` longtext NOT NULL,
  `user_token` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `user_key`, `email`, `password`, `balance`, `affiliate_code`, `hardware_id`, `hwid_time`, `last_login`, `last_ip`, `last_forgot`, `user_token`) VALUES
(4, 'ed2052d7-3f45-460f-b9ce-ab23d8e0d3b9', '1uvR+snqZjC0wq8eS8g3GOAi65tuz8x/fF9ftAgdyRQ=', 'whBKf1AL+VGhYPp37/vWDw==', '0', 'y4qst6et', '', '1701555853', 'X8sYiOpQkTxaQhGLsZuimw==', 'ZEV1gyNrsm5QysiRed3fuw==', '', 'e7e7d88b446e514e20d102e1dda621f8'),
(5, 'aad31b1e-3c77-4e84-8c28-a2a363e95160', 'gx6muK3zmAddvlEGZx4WyL49dh9Aq6aEj2I8jP5uzPU=', 'whBKf1AL+VGhYPp37/vWDw==', '0', '2rtxjw0g', '', '', '3GPruSSjsAst0QknI6tQag==', 'vS8gqUWBoKVYU2CqN/bSWg==', '', ''),
(6, '1b66a917-29d1-41f8-a7e6-c39c2ca1d257', 'BLdRDjKEzN3VHiYs6vWsGnc92VwHhWS1PDeKA0h30f4=', 'whBKf1AL+VGhYPp37/vWDw==', '0', '6ho6ujym', '', '', 'MCNkXGPAwWj4CSPMr6pedg==', '3K2D/HR1R6IE/Sgn0NxN4w==', '', ''),
(7, '015ebd0e-252d-43a5-a528-944948ece1d7', 'ZFV+WEykaYKBMfVRIhRa/A==', 'whBKf1AL+VGhYPp37/vWDw==', '0', '8758rdwj', '', '', 'L08SvBZUe7BKRypgwkr3KQ==', 'SzpAlyyxWlLPVolhnGgFyw==', '', ''),
(8, '456b3711-ac29-40cf-bd82-aa2e1dc4e1ee', 'UEGF0rn8DarTzoH5WsqCZKCRSb5YIfU0aRiSa/KtL/A=', 'lD+nKb68V9eXXWJLLc8rvg==', '0', 'dx59uj5u', '', '', '4/g0jaxz621pL/0LuIKFzA==', 'dYaFug/vdHicLyrVuG4fOA==', '', ''),
(9, '309507cd-d632-4ba3-b65e-db039efc1cb2', 'wYnlyL/qc4Vg5I3qCon+V+sJaE9lkl9htUz50wLtIEM=', 'Ee9b80x1WQGvhYiPMJ+kQA==', '0', '7cvtwf11', 'advgjkhasgfh3kej3k4', '', 'uqUDmGPu64HShrAXhr/8iA==', '4R8hnF0CvuaeHJQp+XNM9A==', '', '5e512fa7ab831dfc77b06df6b5e502de');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `affiliate_users`
--
ALTER TABLE `affiliate_users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `coupon_used`
--
ALTER TABLE `coupon_used`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `db_logs`
--
ALTER TABLE `db_logs`
  ADD PRIMARY KEY (`id`,`ip_address`,`user_agent`);

--
-- Tablo için indeksler `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `loader_tokens`
--
ALTER TABLE `loader_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `affiliate_users`
--
ALTER TABLE `affiliate_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `coupon_used`
--
ALTER TABLE `coupon_used`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `db_logs`
--
ALTER TABLE `db_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Tablo için AUTO_INCREMENT değeri `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `loader_tokens`
--
ALTER TABLE `loader_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
