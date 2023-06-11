-- db_currencies creation script
-- Author: Wojciech Opydo

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;

--
-- Database: `db_currencies`
--

-- --------------------------------------------------------

--
-- Sttructure of table `table_a`
--

CREATE TABLE `table_a` (
  `id` int NOT NULL,
  `currency` varchar(50) NOT NULL,
  `code` char(3) NOT NULL,
  `mid` float NOT NULL
) ENGINE=InnoDB;

--
-- Sample values for table `table _a`
--

INSERT INTO `table_a` (`id`, `currency`, `code`, `mid`) VALUES
(1, 'bat (Tajlandia)', 'THB', 0.1205),
(2, 'dolar amerykański', 'USD', 4.1887),
(3, 'dolar australijski', 'AUD', 2.8024),
(4, 'dolar Hongkongu', 'HKD', 0.5342),
(5, 'dolar kanadyjski', 'CAD', 3.1286),
(6, 'dolar nowozelandzki', 'NZD', 2.5464),
(7, 'dolar singapurski', 'SGD', 3.1079),
(8, 'euro', 'EUR', 4.479),
(9, 'forint (Węgry)', 'HUF', 0.012144),
(10, 'frank szwajcarski', 'CHF', 4.6211),
(11, 'funt szterling', 'GBP', 5.2109),
(12, 'hrywna (Ukraina)', 'UAH', 0.114),
(13, 'jen (Japonia)', 'JPY', 0.030055),
(14, 'korona czeska', 'CZK', 0.1897),
(15, 'korona duńska', 'DKK', 0.6012),
(16, 'korona islandzka', 'ISK', 0.029761),
(17, 'korona norweska', 'NOK', 0.3794),
(18, 'korona szwedzka', 'SEK', 0.3845),
(19, 'lej rumuński', 'RON', 0.9034),
(20, 'lew (Bułgaria)', 'BGN', 2.2901),
(21, 'lira turecka', 'TRY', 0.181),
(22, 'nowy izraelski szekel', 'ILS', 1.145),
(23, 'peso chilijskie', 'CLP', 0.00526),
(24, 'peso filipińskie', 'PHP', 0.0747),
(25, 'peso meksykańskie', 'MXN', 0.2413),
(26, 'rand (Republika Południowej Afryki)', 'ZAR', 0.2193),
(27, 'real (Brazylia)', 'BRL', 0.8525),
(28, 'ringgit (Malezja)', 'MYR', 0.9098),
(29, 'rupia indonezyjska', 'IDR', 0.00028155),
(30, 'rupia indyjska', 'INR', 0.050772),
(31, 'won południowokoreański', 'KRW', 0.003214),
(32, 'yuan renminbi (Chiny)', 'CNY', 0.5882),
(33, 'SDR (MFW)', 'XDR', 5.5724);

--
-- Polish Zloty (PLN) because in NBP API this currency is not present. It is needed for currency calculator if user want use it.

--
INSERT INTO `table_a` (`id`, `currency`, `code`, `mid`) VALUES
(34, 'Złoty (Polska)', 'PLN', 1);

-- --------------------------------------------------------

--
-- Sttructure of table `table_b`
--

CREATE TABLE `table_b` (
  `id` int NOT NULL,
  `currency` varchar(50) NOT NULL,
  `code` char(3) NOT NULL,
  `mid` float NOT NULL
) ENGINE=InnoDB;

--
-- Sample values for table `table_ b`
--

INSERT INTO `table_b` (`id`, `currency`, `code`, `mid`) VALUES
(1, 'afgani (Afganistan)', 'AFN', 0.048482),
(2, 'ariary (Madagaskar)', 'MGA', 0.000947),
(3, 'balboa (Panama)', 'PAB', 4.1887),
(4, 'birr etiopski', 'ETB', 0.0767),
(5, 'boliwar soberano (Wenezuela)', 'VES', 0.1576),
(6, 'boliwiano (Boliwia)', 'BOB', 0.6045),
(7, 'colon kostarykański', 'CRC', 0.007807),
(8, 'colon salwadorski', 'SVC', 0.4789),
(9, 'cordoba oro (Nikaragua)', 'NIO', 0.1146),
(10, 'dalasi (Gambia)', 'GMD', 0.0671),
(11, 'denar (Macedonia Północna)', 'MKD', 0.072776),
(12, 'dinar algierski', 'DZD', 0.030645),
(13, 'dinar bahrajski', 'BHD', 11.1197),
(14, 'dinar iracki', 'IQD', 0.0032),
(15, 'dinar jordański', 'JOD', 5.9098),
(16, 'dinar kuwejcki', 'KWD', 13.6202),
(17, 'dinar libijski', 'LYD', 0.869),
(18, 'dinar serbski', 'RSD', 0.0382),
(19, 'dinar tunezyjski', 'TND', 1.3437),
(20, 'dirham marokański', 'MAD', 0.4116),
(21, 'dirham ZEA (Zjednoczone Emiraty Arabskie)', 'AED', 1.1414),
(22, 'dobra (Wyspy Świętego Tomasza i Książęca)', 'STN', 0.181),
(23, 'dolar bahamski', 'BSD', 4.1887),
(24, 'dolar barbadoski', 'BBD', 2.0763),
(25, 'dolar belizeński', 'BZD', 2.0798),
(26, 'dolar brunejski', 'BND', 3.1083),
(27, 'dolar Fidżi', 'FJD', 1.8776),
(28, 'dolar gujański', 'GYD', 0.019822),
(29, 'dolar jamajski', 'JMD', 0.027),
(30, 'dolar liberyjski', 'LRD', 0.0242),
(31, 'dolar namibijski', 'NAD', 0.2187),
(32, 'dolar surinamski', 'SRD', 0.1102),
(33, 'dolar Trynidadu i Tobago', 'TTD', 0.618),
(34, 'dolar wschodniokaraibski', 'XCD', 1.5472),
(35, 'dolar Wysp Salomona', 'SBD', 0.4936),
(36, 'dolar Zimbabwe', 'ZWL', 0.0011),
(37, 'dong (Wietnam)', 'VND', 0.00017851),
(38, 'dram (Armenia)', 'AMD', 0.010895),
(39, 'escudo Zielonego Przylądka', 'CVE', 0.0404),
(40, 'florin arubański', 'AWG', 2.3165),
(41, 'frank burundyjski', 'BIF', 0.001485),
(42, 'frank CFA BCEAO ', 'XOF', 0.006836),
(43, 'frank CFA BEAC', 'XAF', 0.006725),
(44, 'frank CFP  ', 'XPF', 0.037533),
(45, 'frank Dżibuti', 'DJF', 0.023545),
(46, 'frank gwinejski', 'GNF', 0.000488),
(47, 'frank Komorów', 'KMF', 0.009072),
(48, 'frank kongijski (Dem. Republika Konga)', 'CDF', 0.001801),
(49, 'frank rwandyjski', 'RWF', 0.003704),
(50, 'funt egipski', 'EGP', 0.1357),
(51, 'funt gibraltarski', 'GIP', 5.2109),
(52, 'funt libański', 'LBP', 0.000279),
(53, 'funt południowosudański', 'SSP', 0.004388),
(54, 'funt sudański', 'SDG', 0.007),
(55, 'funt syryjski', 'SYP', 0.0017),
(56, 'Ghana cedi ', 'GHS', 0.3694),
(57, 'gourde (Haiti)', 'HTG', 0.0301),
(58, 'guarani (Paragwaj)', 'PYG', 0.000579),
(59, 'gulden Antyli Holenderskich', 'ANG', 2.3261),
(60, 'kina (Papua-Nowa Gwinea)', 'PGK', 1.181),
(61, 'kip (Laos)', 'LAK', 0.000231),
(62, 'kwacha malawijska', 'MWK', 0.004084),
(63, 'kwacha zambijska', 'ZMW', 0.2096),
(64, 'kwanza (Angola)', 'AOA', 0.0068),
(65, 'kyat (Myanmar, Birma)', 'MMK', 0.001996),
(66, 'lari (Gruzja)', 'GEL', 1.605),
(67, 'lej Mołdawii', 'MDL', 0.2351),
(68, 'lek (Albania)', 'ALL', 0.041838),
(69, 'lempira (Honduras)', 'HNL', 0.1704),
(70, 'leone (Sierra Leone)', 'SLE', 0.1847),
(71, 'lilangeni (Eswatini)', 'SZL', 0.2186),
(72, 'loti (Lesotho)', 'LSL', 0.2186),
(73, 'manat azerbejdżański', 'AZN', 2.466),
(74, 'metical (Mozambik)', 'MZN', 0.0654),
(75, 'naira (Nigeria)', 'NGN', 0.008996),
(76, 'nakfa (Erytrea)', 'ERN', 0.2781),
(77, 'nowy dolar tajwański', 'TWD', 0.1364),
(78, 'nowy manat (Turkmenistan)', 'TMT', 1.1976),
(79, 'ouguiya (Mauretania)', 'MRU', 0.1217),
(80, 'pa\'anga (Tonga)', 'TOP', 1.7809),
(81, 'pataca (Makau)', 'MOP', 0.5188),
(82, 'peso argentyńskie', 'ARS', 0.0172),
(83, 'peso dominikańskie', 'DOP', 0.0765),
(84, 'peso kolumbijskie', 'COP', 0.000993),
(85, 'peso kubańskie', 'CUP', 4.1887),
(86, 'peso urugwajskie', 'UYU', 0.1081),
(87, 'pula (Botswana)', 'BWP', 0.3081),
(88, 'quetzal (Gwatemala)', 'GTQ', 0.5354),
(89, 'rial irański', 'IRR', 0.0001),
(90, 'rial jemeński', 'YER', 0.016756),
(91, 'rial katarski', 'QAR', 1.15),
(92, 'rial omański', 'OMR', 10.889),
(93, 'rial saudyjski', 'SAR', 1.1178),
(94, 'riel (Kambodża)', 'KHR', 0.001016),
(95, 'rubel białoruski', 'BYN', 1.2955),
(96, 'rubel rosyjski', 'RUB', 0.0515),
(97, 'rupia lankijska', 'LKR', 0.014444),
(98, 'rupia (Malediwy)', 'MVR', 0.2712),
(99, 'rupia Mauritiusu', 'MUR', 0.0919),
(100, 'rupia nepalska', 'NPR', 0.031751),
(101, 'rupia pakistańska', 'PKR', 0.0148),
(102, 'rupia seszelska', 'SCR', 0.3155),
(103, 'sol (Peru)', 'PEN', 1.1402),
(104, 'som (Kirgistan)', 'KGS', 0.0479),
(105, 'somoni (Tadżykistan)', 'TJS', 0.3843),
(106, 'sum (Uzbekistan)', 'UZS', 0.000366),
(107, 'szyling kenijski', 'KES', 0.030148),
(108, 'szyling somalijski', 'SOS', 0.007374),
(109, 'szyling tanzański', 'TZS', 0.001765),
(110, 'szyling ugandyjski', 'UGX', 0.001121),
(111, 'taka (Bangladesz)', 'BDT', 0.038828),
(112, 'tala (Samoa)', 'WST', 1.5261),
(113, 'tenge (Kazachstan)', 'KZT', 0.009357),
(114, 'tugrik (Mongolia)', 'MNT', 0.001206),
(115, 'vatu (Vanuatu)', 'VUV', 0.034853),
(116, 'wymienialna marka (Bośnia i Hercegowina)', 'BAM', 2.2843);

-- --------------------------------------------------------

--
-- Structure of tabele `table_c`
--

CREATE TABLE `table_c` (
  `id` int NOT NULL,
  `currency` varchar(50) NOT NULL,
  `code` char(3) NOT NULL,
  `bid` float NOT NULL,
  `ask` float NOT NULL
) ENGINE=InnoDB;

--
-- Zrzut danych tabeli `table_c`
--

INSERT INTO `table_c` (`id`, `currency`, `code`, `bid`, `ask`) VALUES
(1, 'dolar amerykański', 'USD', 4.1607, 4.2447),
(2, 'dolar australijski', 'AUD', 2.7661, 2.8219),
(3, 'dolar kanadyjski', 'CAD', 3.0954, 3.158),
(4, 'euro', 'EUR', 4.4406, 4.5304),
(5, 'forint (Węgry)', 'HUF', 0.012056, 0.0123),
(6, 'frank szwajcarski', 'CHF', 4.5764, 4.6688),
(7, 'funt szterling', 'GBP', 5.1581, 5.2623),
(8, 'jen (Japonia)', 'JPY', 0.029736, 0.030336),
(9, 'korona czeska', 'CZK', 0.1885, 0.1923),
(10, 'korona duńska', 'DKK', 0.5962, 0.6082),
(11, 'korona norweska', 'NOK', 0.374, 0.3816),
(12, 'korona szwedzka', 'SEK', 0.3811, 0.3889),
(13, 'SDR (MFW)', 'XDR', 5.5172, 5.6286);

-- --------------------------------------------------------

--
-- Structure for table `table_info` 
--

CREATE TABLE `table_info` (
  `id` int NOT NULL,
  `tablename` char(7) CHARACTER SET utf8mb4 NOT NULL,
  `no` varchar(16) NOT NULL,
  `effectivedate` date NOT NULL
) ENGINE=InnoDB;

--
-- Sample values for table `table_info`
--

INSERT INTO `table_info` (`id`, `tablename`, `no`, `effectivedate`) VALUES
(1, 'table_a', '109/A/NBP/2023', '2023-06-07'),
(2, 'table_b', '023/B/NBP/2023', '2023-06-07'),
(3, 'table_c', '109/C/NBP/2023', '2023-06-07');

--
-- Structure for table `table_history`
--

CREATE TABLE `table_history` (
  `id` int NOT NULL,
  `operation_date` date NOT NULL,
  `currency_from` char(3) NOT NULL,
  `currency_to` char(3) NOT NULL,
  `budget` float NOT NULL,
  `rate` float NOT NULL,
  `result` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Sample values for table `table_history`
--

INSERT INTO `table_history` (`id`, `operation_date`, `currency_from`, `currency_to`, `budget`, `rate`, `result`) VALUES
(1, '2023-06-09', 'ALL', 'AMD', 200, 3.84011, 768.022);

-- --------------------------------------------------------

--
-- SQL inctruction to create view `view_currencies`
--

CREATE VIEW `view_currencies`  AS SELECT `table_a`.`id` AS `id`, `table_a`.`currency` AS `currency`, `table_a`.`code` AS `code`, `table_a`.`mid` AS `mid` FROM `table_a` union select `table_b`.`id` AS `id`,`table_b`.`currency` AS `currency`,`table_b`.`code` AS `code`,`table_b`.`mid` AS `mid` from `table_b` order by `currency`  ;

--
-- Table indexes
--

--
-- Indexes for table `table_a`
--
ALTER TABLE `table_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_b`
--
ALTER TABLE `table_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_c`
--
ALTER TABLE `table_c`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_history`
--
ALTER TABLE `table_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `table_info`
--
ALTER TABLE `table_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for tables
--

--
-- AUTO_INCREMENT for table `table_a`
--

ALTER TABLE `table_a`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `table_b`
--
ALTER TABLE `table_b`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `table_c`
--
ALTER TABLE `table_c`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
  
--
-- AUTO_INCREMENT dla tabeli `table_info`
--
ALTER TABLE `table_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
  
--
-- AUTO_INCREMENT dla tabeli `table_history`
--
ALTER TABLE `table_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT; 
  
  
COMMIT;

