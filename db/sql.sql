-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.24 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Дамп данных таблицы social.messages: ~0 rows (приблизительно)
DELETE FROM `messages`;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `from_user`, `to_user`, `message`, `send_date`, `unread`) VALUES
	(1, 2, 1, 'xuy', '2021-07-25 21:24:46', 1);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Дамп данных таблицы social.tokens: ~0 rows (приблизительно)
DELETE FROM `tokens`;
/*!40000 ALTER TABLE `tokens` DISABLE KEYS */;
INSERT INTO `tokens` (`token_id`, `user_id`, `token`) VALUES
	(1, 2, '1d2cfc24311eba28b8fe091bad197ea6');
/*!40000 ALTER TABLE `tokens` ENABLE KEYS */;

-- Дамп данных таблицы social.users: ~2 rows (приблизительно)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `reg_date`, `last_activity`) VALUES
	(1, 'owoPeef', 'owoPeef', '2021-07-22 19:19:21', '2021-07-22 19:19:21'),
	(2, 'owoPeef2', 'owoPeef2', '2021-07-22 19:20:36', '2021-07-22 19:20:36'),
	(3, 'owoPeef3', 'owoPeef3', '2021-07-23 22:58:12', '2021-07-23 22:58:12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
