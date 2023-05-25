-- phpMyAdmin SQL Dump
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: March 8, 2022 at 12:30 PM


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `customers` (
  `CustID` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Phone` char(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `customers` (`CustID`, `Name`, `Phone`) VALUES
(201, 'A. Parks', '(214) 555-0127'),
(202, 'S. Patel', '(849) 811-6298'),
(203, 'A. Hernandez', '(355) 572-5385'),
(204, 'G. Carver', '(753) 763-8656'),
(205, 'Sh. Byers', '(912) 925-5332'),
(206, 'L. Lutz', '(931) 966-1775'),
(207, 'L. Bernal', '(884) 727-0591'),
(208, 'I. Whyte', '(811) 979-7345'),
(209, 'L. Lott', '(954) 706-2219'),
(210, 'G. Clarkson', '(309) 625-1838'),
(211, 'Sh. Dunlap', '(604) 581-6642'),
(212, 'H. Gallegos', '(961) 265-8638'),
(213, 'L. Perkins', '(317) 996-3104'),
(214, 'M. Beach', '(481) 422-0282'),
(215, 'C. Pearce', '(599) 881-5189'),
(216, 'A. Hess', '(516) 570-6411'),
(217, 'M. Lee', '(369) 898-6162'),
(218, 'R. Booker', '(730) 784-6303'),
(219, 'A. Crowther', '(325) 783-4081'),
(220, 'H. Mahoney', '(212) 262-8829'),
(221, 'J. Brown', '(644) 756-0110'),
(222, 'H. Stokes', '(931) 969-7317'),
(223, 'J. Reeves', '(940) 981-5113'),
(224, 'A. Mcghee', '(838) 610-5802'),
(225, 'L. Mullen', '(798) 331-7777'),
(226, 'R. Armstrong', '(325) 783-4081'),
(227, 'J. Greenaway', '(212) 262-8829'),
(228, 'K. Kaiser Acosta', '(228) 576-1557'),
(229, 'D. Kirkpatrick', '(773) 696-8009'),
(230, 'A. Odonnell', '(439) 536-8929'),
(231, 'K. Kay', '(368) 336-5403');


CREATE TABLE `rate` (
  `Type` int(11) NOT NULL,
  `Category` int(11) NOT NULL,
  `Weekly` float NOT NULL,
  `Daily` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `rate` (`Type`, `Category`, `Weekly`, `Daily`) VALUES
(1, 0, 480, 80),
(1, 1, 600, 100),
(2, 0, 530, 90),
(2, 1, 660, 110),
(3, 0, 600, 100),
(3, 1, 710, 120),
(4, 0, 685, 115),
(4, 1, 800, 135),
(5, 0, 780, 130),
(5, 1, 900, 150),
(6, 0, 685, 115),
(6, 1, 800, 135);

\
CREATE TABLE `rental` (
  `CustID` int(11) NOT NULL,
  `VehicleID` char(17) NOT NULL,
  `StartDate` varchar(15) NOT NULL,
  `OrderDate` varchar(15) NOT NULL,
  `RentalType` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `ReturnDate` varchar(15) NOT NULL,
  `TotalAmount` float NOT NULL,
  `PaymentDate` varchar(15) DEFAULT NULL,
  `Returned` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rental` (`CustID`, `VehicleID`, `StartDate`, `OrderDate`, `RentalType`, `Qty`, `ReturnDate`, `TotalAmount`, `PaymentDate`, `Returned`) VALUES
(229, '19VDE1F3XEE414842', '2019-05-06', '2019-04-12', 1, 4, '2019-06-10', 400, '2019-05-06', 1),
(212, '19VDE1F3XEE414842', '2019-06-10', '2019-04-15', 7, 3, '2019-07-01', 1800, '2019-06-10', 1),
(221, '19VDE1F3XEE414842', '2019-07-01', '2019-06-12', 7, 1, '2019-07-08', 600, '2019-07-01', 1),
(221, '19VDE1F3XEE414842', '2019-07-09', '2019-06-12', 1, 2, '2019-07-11', 200, '2019-07-01', 1),
(210, '19VDE1F3XEE414842', '2019-11-01', '2019-10-28', 7, 2, '2019-11-15', 1200, 'NULL', 0),
(221, '19VDE1F3XEE414842', '2020-01-01', '2019-12-15', 7, 4, '2020-01-29', 2400, 'NULL', 0),
(216, '1N6BF0KM0EN101134', '2019-08-02', '2019-03-15', 7, 4, '2019-08-30', 2740, '2019-08-02', 1),
(216, '1N6BF0KM0EN101134', '2019-08-30', '2019-03-15', 1, 2, '2019-09-01', 230, '2019-08-02', 1),
(203, 'JM3KE4DY4F0441471', '2019-09-09', '2019-05-22', 1, 4, '2019-09-13', 460, '2019-09-09', 1),
(210, 'JTHFF2C26F135BX45', '2019-05-01', '2019-04-15', 7, 1, '2019-05-08', 600, '2019-05-08', 1),
(210, 'JTHFF2C26F135BX45', '2019-11-01', '2019-10-28', 7, 2, '2019-11-15', 1200, 'NULL', 0),
(221, 'JTHFF2C26F135BX45', '2020-01-01', '2019-12-15', 7, 4, '2020-01-29', 2400, 'NULL', 0),
(229, 'WAUTFAFH0E0010613', '2019-05-06', '2019-04-12', 1, 4, '2019-06-10', 400, '2019-05-06', 1),
(221, 'WAUTFAFH0E0010613', '2019-07-01', '2019-06-12', 7, 1, '2019-07-08', 600, '2019-07-01', 1),
(221, 'WAUTFAFH0E0010613', '2019-07-09', '2019-06-12', 1, 2, '2019-07-11', 200, '2019-07-01', 1),
(210, 'WAUTFAFH0E0010613', '2019-11-01', '2019-10-28', 7, 2, '2019-11-15', 1200, 'NULL', 0),
(221, 'WAUTFAFH0E0010613', '2020-01-01', '2019-12-15', 7, 4, '2020-01-29', 2400, 'NULL', 0),
(210, 'WBA3A9G51ENN73366', '2019-11-01', '2019-10-28', 7, 2, '2019-11-15', 1200, 'NULL', 0),
(221, 'WBA3A9G51ENN73366', '2020-01-01', '2019-12-15', 7, 4, '2020-01-29', 2400, 'NULL', 0),
(210, 'WBA3B9C59EP458859', '2019-11-01', '2019-10-28', 7, 2, '2019-11-15', 1200, 'NULL', 0),
(221, 'WBA3B9C59EP458859', '2020-01-01', '2019-12-15', 7, 4, '2020-01-29', 2400, 'NULL', 0),
(210, 'WDCGG0EB0EG188709', '2019-11-01', '2019-10-28', 7, 2, '2019-11-15', 1200, 'NULL', 0),
(221, 'WDCGG0EB0EG188709', '2020-01-01', '2019-12-15', 7, 4, '2020-01-29', 2400, 'NULL', 0);


CREATE TABLE `vehicle` (
  `VehicleID` char(17) NOT NULL,
  `Description` varchar(30) NOT NULL,
  `Year` year(4) NOT NULL,
  `Type` int(11) NOT NULL,
  `Category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `vehicle` (`VehicleID`, `Description`, `Year`, `Type`, `Category`) VALUES
('19VDE1F3XEE414842', '\"Acura ILX\"', 2014, 1, 1),
('1FDEE3FL6EDA29122', '\"Ford E 350\"', 2014, 6, 0),
('1FDRF3B61FEA87469', '\"Ford Super Duty Pickup\"', 2015, 5, 0),
('1FTNF1CF2EKE54305', '\"Ford F Series Pickup\"', 2014, 5, 0),
('1G1JD5SB3E4240835', '\"Chevrolet Optra\"', 2014, 1, 0),
('1GB3KZCG1EF117132', '\"Chevrolet Silverado\"', 2014, 5, 0),
('1HGCR2E3XEA305302', '\"Honda Accord\"', 2014, 2, 0),
('1N4AB7AP2EN855026', '\"Nissan Sentra\"', 2014, 1, 0),
('1N6BA0EJ9EN516565', '\"Nissan Titan\"', 2014, 5, 0),
('1N6BF0KM0EN101134', '\"Nissan NV\"', 2014, 6, 0),
('1VWCH7A3XEC037969', '\"Volkswagen Passat\"', 2014, 2, 1),
('2HGFB2F94FH501940', '\"Honda Civic\"', 2015, 1, 0),
('2T3DFREV0FW317743', '\"Toyota RAV4\"', 2015, 4, 0),
('3MZBM1L74EM109736', '\"Mazda 3\"', 2014, 1, 0),
('3N1CE2CP0FL409472', '\"Nissan Versa Note\"', 2015, 1, 0),
('3N1CN7APXEK444458', '\"Nissan Versa\"', 2014, 1, 0),
('3VW2A7AU1FM012211', '\"Volkswagen Golf\"', 2015, 1, 0),
('4S4BRCFC1E3203823', '\"Subaru Outback\"', 2014, 4, 0),
('4S4BSBF39F3261064', '\"Subaru Outback\"', 2015, 4, 0),
('4S4BSELC0F3325370', '\"Subaru Outback\"', 2015, 4, 0),
('5FNRL6H58KB133711', '\"Honda Odyssey\"', 2019, 6, 1),
('5J6RM4H90FL028629', '\"Honda CR-V\"', 2015, 4, 0),
('5N1AL0MM8EL549388', '\"Infiniti JX35\"', 2014, 4, 1),
('5NPDH4AE2FH565275', '\"Hyundai Elantra\"', 2015, 1, 0),
('5TDBKRFH4ES26D590', '\"Toyota Highlander\"', 2014, 4, 0),
('5XYKT4A75FG610224', '\"Kia Sorento\"', 2015, 4, 0),
('5XYKU4A7XFG622415', '\"Kia Sorento\"', 2015, 4, 0),
('5XYKUDA77EG449709', '\"Kia Sorento\"', 2014, 4, 0),
('JF1GPAA61F8314971', '\"Subaru Impreza\"', 2015, 1, 0),
('JH4KC1F50EC800004', '\"Acura RLX\"', 2014, 3, 1),
('JH4KC1F56EC000095', '\"Acura RLX\"', 2014, 3, 1),
('JM1BM1V35E1210570', '\"Mazda 3\"', 2014, 1, 0),
('JM3KE4DY4F0441471', '\"Mazda CX5\"', 2015, 4, 0),
('JM3TB3DV0E0015742', '\"Mazda CX9\"', 2014, 4, 0),
('JN8AS5MV0FW760408', '\"Nissan Rogue Select\"', 2015, 4, 0),
('JTEZUEJR7E5081641', '\"Toyota 4Runner\"', 2014, 4, 0),
('JTHBW1GG1F120DU53', '\"Lexus ES 300h\"', 2015, 2, 1),
('JTHCE1BL3F151DE04', '\"Lexus GS 350\"', 2015, 2, 1),
('JTHDL5EF9F5007221', '\"Lexus LS 460\"', 2015, 3, 1),
('JTHFF2C26F135BX45', '\"Lexus IS 250C\"', 2015, 1, 1),
('JTJHY7AX2F120EA11', '\"Lexus LX 570\"', 2015, 4, 1),
('JTJJM7FX2E152CD75', '\"Lexus GX460\"', 2014, 4, 1),
('JTMBFREV1FJ019885', '\"Toyota RAV4\"', 2015, 4, 0),
('KM8SN4HF0FU107203', '\"Hyundai Santa Fe\"', 2015, 4, 0),
('KMHJT3AF1FU028211', '\"Hyundai Tucson\"', 2015, 4, 0),
('KMHTC6AD8EU998631', '\"Hyundai Veloster\"', 2014, 1, 0),
('KNAFZ4A86E5195865', '\"KIA Sportage\"', 2014, 4, 0),
('KNAFZ4A86E5195895', '\"KIA Forte\"', 2014, 1, 0),
('KNAGN4AD2F5084324', '\"Kia Optima Hybrid\"', 2015, 2, 0),
('KNALN4D75E5A57351', '\"Kia Cadenza\"', 2014, 3, 0),
('KNALU4D42F6025717', '\"Kia K900\"', 2015, 3, 0),
('KNDPCCA65F7791085', '\"KIA Sportage\"', 2015, 4, 0),
('WA1LGAFE8ED001506', '\"Audi Q7\"', 2014, 4, 1),
('WAU32AFD8FN005740', '\"Audi A8\"', 2015, 3, 1),
('WAUTFAFH0E0010613', '\"Audi A5\"', 2014, 1, 1),
('WBA3A9G51ENN73366', '\"BMW 3 Series\"', 2014, 1, 1),
('WBA3B9C59EP458859', '\"BMW 3 Series\"', 2014, 1, 1),
('WBAVL1C57EVR93286', '\"BMW X1\"', 2014, 4, 1),
('WDCGG0EB0EG188709', '\"Mercedes_Benz GLK\"', 2014, 1, 1),
('YV440MDD6F2617077', '\"Volvo XC60\"', 2015, 4, 1),
('YV4940NB5F1191453', '\"Volvo XC70\"', 2015, 4, 1);


CREATE TABLE `vRentalinfo` (
`OrderDate` varchar(15)
,`StartDate` varchar(15)
,`ReturnDate` varchar(15)
,`TotalDays` bigint(21)
,`VIN` char(17)
,`Vehicle` varchar(30)
,`Type` varchar(7)
,`Category` varchar(6)
,`CustomerID` int(11)
,`CustomerName` varchar(30)
,`OrderAmount` float
,`RentalBalance` double
);


DROP TABLE IF EXISTS `vRentalinfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vrentalinfo`  AS SELECT `rental`.`OrderDate` AS `OrderDate`, `rental`.`StartDate` AS `StartDate`, `rental`.`ReturnDate` AS `ReturnDate`, `rental`.`RentalType`* `rental`.`Qty` AS `TotalDays`, `rental`.`VehicleID` AS `VIN`, `vehicle`.`Description` AS `Vehicle`, CASE WHEN `vehicle`.`Type` = 1 THEN 'Compact' WHEN `vehicle`.`Type` = 2 THEN 'Medium' WHEN `vehicle`.`Type` = 3 THEN 'Large' WHEN `vehicle`.`Type` = 4 THEN 'SUV' WHEN `vehicle`.`Type` = 5 THEN 'Truck' WHEN `vehicle`.`Type` = 6 THEN 'VAN' END AS `Type`, CASE WHEN `vehicle`.`Category` = 0 THEN 'BASIC' WHEN `vehicle`.`Category` = 1 THEN 'LUXURY' END AS `Category`, `rental`.`CustID` AS `CustomerID`, `customers`.`Name` AS `CustomerName`, `rental`.`TotalAmount` AS `OrderAmount`, CASE WHEN `rental`.`Returned` = 0 THEN `rental`.`TotalAmount` ELSE 0 END AS `RentalBalance` FROM ((`customers` join `rental`) join `vehicle`) WHERE `rental`.`CustID` = `customers`.`CustID` AND `rental`.`VehicleID` = `vehicle`.`VehicleID` ORDER BY `rental`.`StartDate` ASC ;


ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustID`);


ALTER TABLE `rate`
  ADD PRIMARY KEY (`Type`,`Category`);


ALTER TABLE `rental`
  ADD PRIMARY KEY (`VehicleID`,`StartDate`),
  ADD KEY `CustID` (`CustID`);


ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`VehicleID`),
  ADD KEY `Type` (`Type`,`Category`);


ALTER TABLE `customers`
  MODIFY `CustID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;


ALTER TABLE `rental`
  ADD CONSTRAINT `rental_ibfk_1` FOREIGN KEY (`VehicleID`) REFERENCES `vehicle` (`VehicleID`),
  ADD CONSTRAINT `rental_ibfk_2` FOREIGN KEY (`CustID`) REFERENCES `customers` (`CustID`);


ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`Type`,`Category`) REFERENCES `rate` (`Type`, `Category`);
COMMIT;
