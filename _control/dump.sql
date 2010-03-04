-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 02 2009 г., 19:46
-- Версия сервера: 5.0.18
-- Версия PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- База данных: `mifi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
  `g_id` int(10) unsigned NOT NULL auto_increment COMMENT 'Auto increment ID',
  `g_team` int(10) unsigned NOT NULL COMMENT 'Team ID',
  `g_date_time` datetime NOT NULL,
  `g_remarks` text NOT NULL,
  PRIMARY KEY  (`g_id`),
  KEY `m_team` (`g_team`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Matches schedule' AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `game`
--

INSERT INTO `game` (`g_id`, `g_team`, `g_date_time`, `g_remarks`) VALUES
(1, 1, '2009-09-05 10:00:00', 'Очень важно'),
(2, 3, '2009-09-06 13:45:00', 'Супер дерби! Всем быть!');

-- --------------------------------------------------------

--
-- Структура таблицы `game_user_link`
--

DROP TABLE IF EXISTS `game_user_link`;
CREATE TABLE `game_user_link` (
  `gul_id` int(10) unsigned NOT NULL auto_increment COMMENT 'Auto increment ID',
  `gul_user` int(10) unsigned NOT NULL COMMENT 'User id',
  `gul_game` int(10) unsigned NOT NULL COMMENT 'Game ID',
  `gul_go` tinyint(3) unsigned NOT NULL COMMENT 'Флаг, показывает, что человек идет',
  `gul_remarks` varchar(255) NOT NULL COMMENT 'Комментарии от пользователя',
  PRIMARY KEY  (`gul_id`),
  KEY `gul_user` (`gul_user`,`gul_game`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Связь игроков с играми' AUTO_INCREMENT=38 ;

--
-- Дамп данных таблицы `game_user_link`
--

INSERT INTO `game_user_link` (`gul_id`, `gul_user`, `gul_game`, `gul_go`, `gul_remarks`) VALUES
(35, 1, 1, 0, 'Поменял Ветко'),
(36, 2, 1, 0, 'Поменял Ветко'),
(16, 1, 2, 1, 'Поменял Ветко'),
(37, 2, 2, 0, 'Поменял Ветко');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `role_name` varchar(10) NOT NULL COMMENT 'Имя роли',
  `role_description` varchar(255) NOT NULL COMMENT 'Описание роли',
  PRIMARY KEY  (`role_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Хранит информацию о возможных ур';

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`role_name`, `role_description`) VALUES
('adm', 'admin'),
('user', 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE `team` (
  `t_id` int(10) unsigned NOT NULL auto_increment COMMENT 'Auto increment ID',
  `t_name` varchar(255) NOT NULL COMMENT 'Team name',
  PRIMARY KEY  (`t_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `team`
--

INSERT INTO `team` (`t_id`, `t_name`) VALUES
(1, 'Аспирант-2'),
(2, 'Спарта'),
(3, 'Телеги'),
(4, 'Конфианза'),
(5, 'Чертаново'),
(6, 'МюПИ'),
(7, 'Хамовники'),
(8, 'Северсталь'),
(9, 'Вега'),
(10, 'Сев. Бутово'),
(11, 'Галактика'),
(12, 'Кран Юнайтед'),
(13, 'Вива-ла'),
(14, 'ХФК'),
(15, 'Лимантис'),
(16, 'Феникс'),
(17, 'Штурм');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL auto_increment COMMENT 'User''s autoincrement ID',
  `user_fam` varchar(255) NOT NULL COMMENT 'User''s family',
  `user_name` varchar(255) NOT NULL COMMENT 'User''s name',
  `user_email` varchar(255) NOT NULL COMMENT 'User''s email',
  `user_login` varchar(32) NOT NULL COMMENT 'Логин',
  `user_pwd` varchar(32) NOT NULL COMMENT 'Пароль Хранится в зашифрованном виде',
  `user_create_dtm` datetime NOT NULL COMMENT 'Дата-время заведения в системе',
  `user_state` char(1) NOT NULL COMMENT 'Статус (A – активен, B- заблокирован)',
  `user_state_dtm` datetime NOT NULL COMMENT 'Дата-время изменения статуса',
  `user_role` varchar(10) NOT NULL COMMENT 'Роль юзера (adm-админ, svisor - супервайзер, user -пользователь), [role->role_name]',
  `user_supervisor` int(10) unsigned NOT NULL COMMENT 'Проставляется id супервайзера',
  `user_login_dtm` datetime NOT NULL COMMENT 'Время последнего входа. ',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_login` (`user_login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `user_fam`, `user_name`, `user_email`, `user_login`, `user_pwd`, `user_create_dtm`, `user_state`, `user_state_dtm`, `user_role`, `user_supervisor`, `user_login_dtm`) VALUES
(1, 'Ветко', 'Сергей', 'sergey@vetko.net', 'Svarog', 'a518307d11516c8d2163b52946357c5f', '2009-09-01 18:21:17', 'a', '2009-09-01 18:21:17', 'adm', 0, '2008-08-26 11:08:02'),
(2, 'Романов', 'Сергей', 'segenadich@rambler.ru', 'test', '', '2009-09-01 18:22:00', 'a', '2009-09-02 19:39:05', 'user', 0, '0000-00-00 00:00:00');
