-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 07 2024 г., 17:32
-- Версия сервера: 5.7.39
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `otdelcadrov`
--

-- --------------------------------------------------------

--
-- Структура таблицы `autorisation`
--

CREATE TABLE `autorisation` (
  `idAuto` int(11) NOT NULL,
  `login` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_fk` int(11) NOT NULL,
  `FamLogin` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NameLogin` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtchLogin` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `autorisation`
--

INSERT INTO `autorisation` (`idAuto`, `login`, `password`, `status_fk`, `FamLogin`, `NameLogin`, `OtchLogin`) VALUES
(1, 'admin', 'admin', 1, 'Кругленя', 'Вячеслав', 'Юрьевич'),
(4, '123', '123', 2, 'Баженов', 'Артем', 'Сергеевич');

-- --------------------------------------------------------

--
-- Структура таблицы `dannie_sotrydnika`
--

CREATE TABLE `dannie_sotrydnika` (
  `idSotr` int(11) NOT NULL,
  `Imya_Sotr` char(15) DEFAULT NULL,
  `Familia_Sotr` char(15) DEFAULT NULL,
  `Otchestvo_Sotr` char(15) DEFAULT NULL,
  `Adress` char(40) DEFAULT NULL,
  `Document_Priem_idPriem` int(11) NOT NULL,
  `Phone_Num` char(12) DEFAULT NULL,
  `data_rojdenia` date DEFAULT NULL,
  `voennoe_obyazatelstvo` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dannie_sotrydnika`
--

INSERT INTO `dannie_sotrydnika` (`idSotr`, `Imya_Sotr`, `Familia_Sotr`, `Otchestvo_Sotr`, `Adress`, `Document_Priem_idPriem`, `Phone_Num`, `data_rojdenia`, `voennoe_obyazatelstvo`) VALUES
(1, 'Артем', 'Баженов', 'Сергеевич', 'Вишневая 2', 6, '89953262034', '2004-09-30', 'Нет'),
(2, 'Ульяна', 'Шкенева', 'Александровна', 'Романово', 7, '89113456789', '2005-04-22', 'Нет'),
(3, 'Павел', 'Мороз', 'Сергеевич', 'ул. Павлика Морозова', 8, '88005553535', '2007-03-21', 'Да');

-- --------------------------------------------------------

--
-- Структура таблицы `document_priem`
--

CREATE TABLE `document_priem` (
  `idPriem` int(11) NOT NULL,
  `Familia_Sotr` char(15) DEFAULT NULL,
  `Imya_Sotr` char(15) DEFAULT NULL,
  `Otchestvo_Sotr` char(15) DEFAULT NULL,
  `Data_Priema` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Doljnost_idDoljnost` int(11) NOT NULL,
  `Otdel_idOtdel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `document_priem`
--

INSERT INTO `document_priem` (`idPriem`, `Familia_Sotr`, `Imya_Sotr`, `Otchestvo_Sotr`, `Data_Priema`, `Doljnost_idDoljnost`, `Otdel_idOtdel`) VALUES
(6, 'Баженов', 'Артем', 'Сергеевич', '2024-05-19 21:00:00', 6, 6),
(7, 'Шкенева', 'Ульяна', 'Александровна', '2024-05-25 00:23:42', 4, 5),
(8, 'Мороз', 'Павел', 'Сергеевич', '2024-05-26 21:00:00', 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `document_yvolnenie`
--

CREATE TABLE `document_yvolnenie` (
  `idYvolnenie` int(11) NOT NULL,
  `Data_Yvolnenia` date DEFAULT NULL,
  `Document_Priem_idPriem` int(11) NOT NULL,
  `Osnovania_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `document_yvolnenie`
--

INSERT INTO `document_yvolnenie` (`idYvolnenie`, `Data_Yvolnenia`, `Document_Priem_idPriem`, `Osnovania_FK`) VALUES
(3, '1899-12-30', 7, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `doljnost`
--

CREATE TABLE `doljnost` (
  `idDoljnost` int(11) NOT NULL,
  `Naimen_Doljnost` char(25) DEFAULT NULL,
  `Oklad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `doljnost`
--

INSERT INTO `doljnost` (`idDoljnost`, `Naimen_Doljnost`, `Oklad`) VALUES
(1, 'Продавец', 22000),
(2, 'Уборщик', 18000),
(4, 'Бариста', 21000),
(5, 'Менеджер', 35000),
(6, 'Пиццевокер', 25000),
(7, 'Консультант', 19000);

-- --------------------------------------------------------

--
-- Структура таблицы `doljnost_needs`
--

CREATE TABLE `doljnost_needs` (
  `idDoljNeed` int(11) NOT NULL,
  `Otdel_fk` int(11) NOT NULL,
  `Dolj_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `doljnost_needs`
--

INSERT INTO `doljnost_needs` (`idDoljNeed`, `Otdel_fk`, `Dolj_fk`) VALUES
(14, 1, 5),
(16, 6, 4),
(17, 5, 1),
(18, 5, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `osnovania`
--

CREATE TABLE `osnovania` (
  `idOsnovania` int(11) NOT NULL,
  `Osnovanie` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `osnovania`
--

INSERT INTO `osnovania` (`idOsnovania`, `Osnovanie`) VALUES
(1, 'Частые прогулы'),
(2, 'Декрет'),
(3, 'Сел в тюрьму'),
(4, 'Ушел в армию'),
(5, 'Украл поддон'),
(6, 'Сгорел в машине'),
(7, 'Умер');

-- --------------------------------------------------------

--
-- Структура таблицы `otdel`
--

CREATE TABLE `otdel` (
  `idOtdel` int(11) NOT NULL,
  `Naimen_Otdel` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `otdel`
--

INSERT INTO `otdel` (`idOtdel`, `Naimen_Otdel`) VALUES
(1, 'Отдел продаж'),
(2, 'Отдел рекламы'),
(3, 'Отдел бухгалтерии'),
(5, 'Отдел обслуживания'),
(6, 'Работники кухни');

-- --------------------------------------------------------

--
-- Структура таблицы `otpysk_doc`
--

CREATE TABLE `otpysk_doc` (
  `idotpysk` int(11) NOT NULL,
  `sotr_fk` int(11) NOT NULL,
  `rabotal_s` date NOT NULL,
  `rabotal_do` date NOT NULL,
  `osn_otp_start` date NOT NULL,
  `osn_otp_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `otpysk_doc`
--

INSERT INTO `otpysk_doc` (`idotpysk`, `sotr_fk`, `rabotal_s`, `rabotal_do`, `osn_otp_start`, `osn_otp_end`) VALUES
(1, 1, '2023-04-12', '2024-05-11', '2024-05-11', '2024-06-13');

-- --------------------------------------------------------

--
-- Структура таблицы `priemsotr`
--

CREATE TABLE `priemsotr` (
  `idPriemSotr` int(11) NOT NULL,
  `RabotaDoNas` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KogdaRabotal` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Obrazovanie` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DopInfo` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dolj_fk` int(11) NOT NULL,
  `Otdel_fk` int(11) NOT NULL,
  `status_priem_fk` int(11) NOT NULL,
  `auto_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `priemsotr`
--

INSERT INTO `priemsotr` (`idPriemSotr`, `RabotaDoNas`, `KogdaRabotal`, `Obrazovanie`, `DopInfo`, `Dolj_fk`, `Otdel_fk`, `status_priem_fk`, `auto_fk`) VALUES
(8, 'Бутыль, Пивной Двор', 'с 2023-07-28 по 2023-11-01', 'Среднее специальноe', 'фанат белок', 4, 6, 1, 4),
(9, 'Бутыль', 'с 2023-07-28 по 2023-11-01', 'Среднее специальное', 'Крутой чувак', 1, 1, 2, 4),
(10, 'Бутыль, Пивной Двор', '4 месяца', 'Среднее специальное', 'фанат белок', 5, 1, 3, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `idStatus` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`idStatus`, `status`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Структура таблицы `status_priem`
--

CREATE TABLE `status_priem` (
  `idStatusPr` int(11) NOT NULL,
  `status_priem` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status_priem`
--

INSERT INTO `status_priem` (`idStatusPr`, `status_priem`) VALUES
(1, 'Принят'),
(2, 'Не принят'),
(3, 'На рассморении');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `autorisation`
--
ALTER TABLE `autorisation`
  ADD PRIMARY KEY (`idAuto`),
  ADD KEY `status_fk` (`status_fk`);

--
-- Индексы таблицы `dannie_sotrydnika`
--
ALTER TABLE `dannie_sotrydnika`
  ADD PRIMARY KEY (`idSotr`),
  ADD KEY `Prikaz_fk_idx` (`Document_Priem_idPriem`);

--
-- Индексы таблицы `document_priem`
--
ALTER TABLE `document_priem`
  ADD PRIMARY KEY (`idPriem`),
  ADD KEY `fk_Document_Priem_Doljnost_idx` (`Doljnost_idDoljnost`),
  ADD KEY `fk_Document_Priem_Otdel1_idx` (`Otdel_idOtdel`);

--
-- Индексы таблицы `document_yvolnenie`
--
ALTER TABLE `document_yvolnenie`
  ADD PRIMARY KEY (`idYvolnenie`),
  ADD KEY `fk_Document_Yvolnenie_Document_Priem1_idx` (`Document_Priem_idPriem`),
  ADD KEY `fk_Document_Yvolnenie_Osnovania1_idx` (`Osnovania_FK`);

--
-- Индексы таблицы `doljnost`
--
ALTER TABLE `doljnost`
  ADD PRIMARY KEY (`idDoljnost`);

--
-- Индексы таблицы `doljnost_needs`
--
ALTER TABLE `doljnost_needs`
  ADD PRIMARY KEY (`idDoljNeed`),
  ADD KEY `doljnost_needs_ibfk_1` (`Dolj_fk`),
  ADD KEY `Otdel_fk` (`Otdel_fk`);

--
-- Индексы таблицы `osnovania`
--
ALTER TABLE `osnovania`
  ADD PRIMARY KEY (`idOsnovania`);

--
-- Индексы таблицы `otdel`
--
ALTER TABLE `otdel`
  ADD PRIMARY KEY (`idOtdel`);

--
-- Индексы таблицы `otpysk_doc`
--
ALTER TABLE `otpysk_doc`
  ADD PRIMARY KEY (`idotpysk`),
  ADD KEY `sotr_fk` (`sotr_fk`);

--
-- Индексы таблицы `priemsotr`
--
ALTER TABLE `priemsotr`
  ADD PRIMARY KEY (`idPriemSotr`),
  ADD KEY `Otdel_fk` (`Otdel_fk`),
  ADD KEY `Dolj_fk` (`Dolj_fk`),
  ADD KEY `status_priem` (`status_priem_fk`),
  ADD KEY `auto_fk` (`auto_fk`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idStatus`);

--
-- Индексы таблицы `status_priem`
--
ALTER TABLE `status_priem`
  ADD PRIMARY KEY (`idStatusPr`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `autorisation`
--
ALTER TABLE `autorisation`
  MODIFY `idAuto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `dannie_sotrydnika`
--
ALTER TABLE `dannie_sotrydnika`
  MODIFY `idSotr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `document_priem`
--
ALTER TABLE `document_priem`
  MODIFY `idPriem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `document_yvolnenie`
--
ALTER TABLE `document_yvolnenie`
  MODIFY `idYvolnenie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `doljnost`
--
ALTER TABLE `doljnost`
  MODIFY `idDoljnost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `doljnost_needs`
--
ALTER TABLE `doljnost_needs`
  MODIFY `idDoljNeed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `osnovania`
--
ALTER TABLE `osnovania`
  MODIFY `idOsnovania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `otdel`
--
ALTER TABLE `otdel`
  MODIFY `idOtdel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `otpysk_doc`
--
ALTER TABLE `otpysk_doc`
  MODIFY `idotpysk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `priemsotr`
--
ALTER TABLE `priemsotr`
  MODIFY `idPriemSotr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `status_priem`
--
ALTER TABLE `status_priem`
  MODIFY `idStatusPr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `autorisation`
--
ALTER TABLE `autorisation`
  ADD CONSTRAINT `autorisation_ibfk_1` FOREIGN KEY (`status_fk`) REFERENCES `status` (`idStatus`);

--
-- Ограничения внешнего ключа таблицы `dannie_sotrydnika`
--
ALTER TABLE `dannie_sotrydnika`
  ADD CONSTRAINT `dannie_sotrydnika_ibfk_1` FOREIGN KEY (`Document_Priem_idPriem`) REFERENCES `document_priem` (`idPriem`);

--
-- Ограничения внешнего ключа таблицы `document_priem`
--
ALTER TABLE `document_priem`
  ADD CONSTRAINT `document_priem_ibfk_1` FOREIGN KEY (`Doljnost_idDoljnost`) REFERENCES `doljnost` (`idDoljnost`),
  ADD CONSTRAINT `document_priem_ibfk_2` FOREIGN KEY (`Otdel_idOtdel`) REFERENCES `otdel` (`idOtdel`);

--
-- Ограничения внешнего ключа таблицы `document_yvolnenie`
--
ALTER TABLE `document_yvolnenie`
  ADD CONSTRAINT `document_yvolnenie_ibfk_1` FOREIGN KEY (`Document_Priem_idPriem`) REFERENCES `document_priem` (`idPriem`),
  ADD CONSTRAINT `document_yvolnenie_ibfk_2` FOREIGN KEY (`Osnovania_FK`) REFERENCES `osnovania` (`idOsnovania`);

--
-- Ограничения внешнего ключа таблицы `doljnost_needs`
--
ALTER TABLE `doljnost_needs`
  ADD CONSTRAINT `doljnost_needs_ibfk_1` FOREIGN KEY (`Dolj_fk`) REFERENCES `doljnost` (`idDoljnost`),
  ADD CONSTRAINT `doljnost_needs_ibfk_2` FOREIGN KEY (`Otdel_fk`) REFERENCES `otdel` (`idOtdel`);

--
-- Ограничения внешнего ключа таблицы `otpysk_doc`
--
ALTER TABLE `otpysk_doc`
  ADD CONSTRAINT `otpysk_doc_ibfk_1` FOREIGN KEY (`sotr_fk`) REFERENCES `dannie_sotrydnika` (`idSotr`);

--
-- Ограничения внешнего ключа таблицы `priemsotr`
--
ALTER TABLE `priemsotr`
  ADD CONSTRAINT `priemsotr_ibfk_1` FOREIGN KEY (`Otdel_fk`) REFERENCES `otdel` (`idOtdel`),
  ADD CONSTRAINT `priemsotr_ibfk_2` FOREIGN KEY (`Dolj_fk`) REFERENCES `doljnost` (`idDoljnost`),
  ADD CONSTRAINT `priemsotr_ibfk_3` FOREIGN KEY (`status_priem_fk`) REFERENCES `status_priem` (`idStatusPr`),
  ADD CONSTRAINT `priemsotr_ibfk_4` FOREIGN KEY (`auto_fk`) REFERENCES `autorisation` (`idAuto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
