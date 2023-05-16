-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 10:27 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EMPLOYEE_ID` varchar(16) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4),'-',''),
  `EMPLOYEE_TYPE` varchar(32) NOT NULL,
  `FIRST_NAME` varchar(64) NOT NULL,
  `LAST_NAME` varchar(64) NOT NULL,
  `CONTACT_NUMBER` varchar(16) NOT NULL,
  `EMAIL_ADDRESS` varchar(64) NOT NULL,
  `BIRTHDAY` date NOT NULL,
  `EMPLOYMENT_DATE` date NOT NULL,
  `ADDRESS` varchar(128) NOT NULL,
  `PROVINCE` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EMPLOYEE_ID`, `EMPLOYEE_TYPE`, `FIRST_NAME`, `LAST_NAME`, `CONTACT_NUMBER`, `EMAIL_ADDRESS`, `BIRTHDAY`, `EMPLOYMENT_DATE`, `ADDRESS`, `PROVINCE`) VALUES
('03451bc7-6f9f-4f', 'Salesman', 'Alexandra', 'Thompson', '140-229-7368x093', 'operkins@example.org', '1987-01-06', '2022-12-10', '53016 Amy Point', 'New Josephton'),
('05f04087-1787-48', 'Installer', 'Kari', 'Brown', '(326)792-1027', 'matthewmurphy@example.org', '1969-05-03', '2019-08-09', '511 King Skyway Apt. 765', 'East Kimberly'),
('08b5875e-b2c6-4e', 'Salesman', 'Christopher', 'Hudson', '001-256-166-5939', 'cfox@example.com', '1983-12-12', '2020-07-15', '3912 Zamora Track Apt. 057', 'Lake Kimberly'),
('0a3c8f32-ef86-49', 'Admin', 'Paula', 'Conrad', '(091)188-6801', 'ywilson@example.com', '1990-07-11', '2019-07-12', '4512 Stewart Road Suite 638', 'Port Ashleytown'),
('0fdd160d-617a-41', 'Intern', 'Melanie', 'Peterson', '(231)209-8599x54', 'grocha@example.com', '1991-01-20', '2021-06-25', '2156 Larson Mountains Apt. 199', 'South Nancyborough'),
('1043cc45-4bcd-45', 'Salesman', 'Rachel', 'Young', '(147)851-5120', 'allisonvillanueva@example.org', '2003-03-10', '2023-01-23', '7964 Laura Ports', 'Morseton'),
('113ef2a0-fe60-45', 'Installer', 'Vanessa', 'Johnson', '071.271.8703', 'shawnmartin@example.com', '1969-09-12', '2022-02-18', '6759 Laura Corner', 'Madisonport'),
('12c46af1-e25c-4d', 'Installer', 'Renee', 'Garrett', '(931)270-2347x27', 'brandy30@example.com', '1981-03-06', '2019-10-12', '31938 Monica Lights Apt. 214', 'New Seantown'),
('12fc3ebd-bfc7-42', 'Admin', 'Haley', 'Diaz', '352-194-7086', 'nancygarza@example.net', '1972-04-19', '2021-11-12', '6807 Kevin Hollow', 'Craigborough'),
('13ddf6f6-9947-4c', 'Intern', 'Travis', 'Leonard', '609-803-8619', 'matthew32@example.net', '1968-09-13', '2019-06-29', '5979 Virginia Club Apt. 932', 'Lake Jessica'),
('19909d20-d458-45', 'Admin', 'Lisa', 'Figueroa', '001-363-484-3073', 'fbanks@example.net', '1993-03-14', '2021-02-14', '2167 Penny Glens', 'Chasemouth'),
('1b26e0c6-233e-4a', 'Intern', 'Robert', 'Caldwell', '001-290-635-0527', 'ejones@example.net', '1967-03-04', '2019-03-04', '2708 David Street', 'New Eileenbury'),
('1ed23d75-e869-4d', 'Installer', 'Anna', 'Waters', '+1-007-433-2090x', 'pespinoza@example.org', '1977-03-09', '2021-06-20', '7577 Kimberly Prairie Suite 825', 'Christinafurt'),
('2634dfd7-fec7-43', 'Intern', 'Brett', 'Thomas', '821-663-8844', 'jasonwilliams@example.com', '2003-02-06', '2021-10-03', '12058 Danielle Meadow', 'Perkinshaven'),
('281b4500-b346-49', 'Salesman', 'Harold', 'Gray', '1450805998', 'natashagilbert@example.com', '1969-08-19', '2018-08-31', '2752 David Field Suite 166', 'East Patricia'),
('29afc858-2bc0-4d', 'Intern', 'Anthony', 'Sullivan', '753-538-0660', 'kaitlynbrown@example.net', '1996-07-22', '2018-11-19', '068 Garcia Ports Apt. 217', 'Lake Megan'),
('2a0f6f28-dfe6-4d', 'Admin', 'Samuel', 'Moore', '(029)159-3108', 'christinefuller@example.com', '1966-04-27', '2022-04-29', '89009 Singh Gateway Suite 057', 'Sandybury'),
('2c4cab2f-bb5c-46', 'Intern', 'Cory', 'Sharp', '009.297.8055x963', 'iedwards@example.org', '1985-06-14', '2019-09-11', '980 Patrick Unions', 'Johnstonfurt'),
('31e8d5d3-2abc-4a', 'Admin', 'Erin', 'Little', '036.525.1992x034', 'barnettbenjamin@example.com', '1965-04-08', '2020-02-01', '81157 Mora Park Suite 140', 'Lake Brianna'),
('330e311a-49f5-49', 'Salesman', 'Gregory', 'Merritt', '+1-277-849-9017x', 'hernandezdavid@example.com', '2004-11-23', '2019-12-17', '698 Thomas Cliffs Suite 672', 'South Rebeccaview'),
('4c90bac4-d650-4c', 'Salesman', 'Bradley', 'Stone', '857.940.4941x944', 'fcampbell@example.org', '1963-02-01', '2021-02-06', '55425 John Knolls', 'Port Katrinabury'),
('4ccb0c41-b9f8-41', 'Salesman', 'Samantha', 'Hall', '425-481-5755x974', 'regina00@example.net', '1966-11-27', '2018-06-08', '891 Snyder Lake', 'Evansstad'),
('4dda4f3e-d434-40', 'Admin', 'Tiffany', 'Wallace', '423-469-5085x185', 'leerobert@example.com', '1975-10-22', '2022-03-28', '6352 Compton Meadows Suite 469', 'Amyborough'),
('57286ea4-793c-44', 'Installer', 'James', 'Perez', '+1-280-297-8824x', 'mary56@example.org', '1964-12-19', '2018-05-11', '43801 Lorraine Run', 'Michelestad'),
('59933a95-1cc8-40', 'Installer', 'Denise', 'Nunez', '001-018-182-7006', 'alyssa42@example.net', '1978-06-20', '2019-10-26', '41502 Holder Stream Apt. 906', 'New Carol'),
('5a648a96-24c6-41', 'Admin', 'Kelly', 'Burton', '855.427.0231', 'lthomas@example.net', '1967-06-09', '2020-03-08', '475 Lisa Run', 'East Mario'),
('663c49d9-fd46-4f', 'Salesman', 'Scott', 'Harrison', '057.923.4073', 'cmaldonado@example.net', '1966-12-02', '2019-10-27', '7775 Martin Road Apt. 748', 'North Courtneyberg'),
('677c9309-5116-47', 'Admin', 'Vanessa', 'Smith', '014.816.6430', 'michellecollins@example.net', '2003-12-15', '2018-09-03', '009 Anderson Junctions Suite 408', 'Nicholashaven'),
('69e2d9d8-163a-48', 'Intern', 'Sara', 'Lara', '001-907-516-8545', 'angelicaanderson@example.net', '1975-07-21', '2020-03-22', '24238 Reid Harbors', 'West Lisa'),
('6aa534c0-d4a3-4f', 'Salesman', 'Melissa', 'Guerra', '992.272.2098x339', 'robin09@example.com', '1995-06-22', '2018-08-24', '4272 Tammie Gateway Suite 991', 'Carolynbury'),
('6b213067-9ccb-4d', 'Admin', 'Marcus', 'Wilson', '(359)995-1175', 'jonesraymond@example.org', '1968-04-05', '2023-02-08', '493 Roberts Glen', 'New Jamesmouth'),
('6c7a6e26-d1c8-45', 'Intern', 'Lonnie', 'Sparks', '+1-696-461-7299', 'brandonpierce@example.org', '1970-04-29', '2022-06-09', '82335 Sarah Wall Suite 520', 'Colestad'),
('752ea8f1-7735-4b', 'Admin', 'Courtney', 'Flores', '7230047043', 'reedbelinda@example.net', '1963-04-04', '2022-12-29', '5763 Travis Club', 'Port Tammy'),
('75d7563c-645b-45', 'Admin', 'Rebecca', 'Chavez', '001-847-837-3429', 'erika58@example.net', '1974-12-26', '2021-08-31', '6775 Grant Court Apt. 334', 'Nathanburgh'),
('77d79f48-4ba9-4c', 'Intern', 'Lynn', 'Martinez', '(537)824-5544', 'allenfaith@example.org', '2002-09-07', '2019-05-21', '2539 Stark Loaf', 'Brownhaven'),
('7b7219ba-b79b-46', 'Admin', 'Jessica', 'Howard', '2237577991', 'jennifer87@example.org', '1992-08-10', '2019-03-30', '2776 Burton Drive', 'Heidistad'),
('7d2c6e16-ed9a-42', 'Installer', 'Scott', 'Stevens', '+1-898-113-8001x', 'clarklindsay@example.net', '2001-03-11', '2021-02-08', '411 Lisa Causeway', 'South Joemouth'),
('7d2e5e6c-08d6-44', 'Admin', 'Jeffrey', 'Whitehead', '001-359-428-2539', 'banderson@example.org', '1981-07-05', '2020-09-23', '032 Payne Divide Apt. 707', 'Ricardotown'),
('80919769-8de9-4f', 'Salesman', 'Mark', 'Johnson', '695-498-7434', 'kristilopez@example.com', '1998-11-23', '2021-08-13', '8491 Zoe Camp', 'Robertsfurt'),
('809fb903efc311ed', 'Admin', 'ROMEO JR', 'BARDILLON', '09760657071', 'romsky.bardillon@gmail.com', '2001-07-30', '2019-10-30', 'SANTA ROSA ', 'LAGUNA'),
('838190bb-f09f-4f', 'Admin', 'Pamela', 'Owens', '492.870.7222', 'deanna85@example.net', '2004-05-17', '2022-08-01', '0453 Patricia Meadow Apt. 175', 'West Penny'),
('88a2ed51-95ac-48', 'Intern', 'Alice', 'Brady', '001-482-721-8818', 'tstone@example.com', '1993-12-22', '2020-12-27', '212 Harvey Harbor Apt. 542', 'Johnshire'),
('8c84ecae-01e7-4f', 'Intern', 'Brian', 'Reed', '(441)979-4783', 'mlopez@example.org', '1995-01-02', '2021-05-22', '0974 Lee Oval Apt. 579', 'New Kellyburgh'),
('9002a48d-9d4f-46', 'Intern', 'Jessica', 'Blake', '(133)829-6087x41', 'heatherferguson@example.com', '1971-04-04', '2018-06-17', '18548 Thomas Cape', 'West Beth'),
('91de985d-4067-4b', 'Installer', 'Melissa', 'Spencer', '(363)581-0831x86', 'ssmith@example.org', '1973-12-05', '2023-01-13', '794 Perez Course', 'Michaelstad'),
('9ff914e5-c01f-4e', 'Installer', 'Edward', 'Crane', '770.392.3348', 'bgarcia@example.com', '1973-07-31', '2021-05-28', '364 Pearson Plains Apt. 375', 'Port Heather'),
('a03371d6efc311ed', 'Salesman', 'JOHN KENNETH', 'VALLEJO', '09123456789', 'jk@gmail.com', '2001-09-20', '2021-12-31', 'SANTA ROSA', 'LAGUNA'),
('a203c4c6-dd6c-40', 'Installer', 'Maurice', 'Wong', '109.373.3080', 'brandonellis@example.com', '1978-03-18', '2019-05-14', '89687 Brown Falls Suite 598', 'Watersstad'),
('a297eaa4-00e6-4e', 'Intern', 'Michael', 'Reyes', '751-233-4495', 'robert18@example.org', '1982-01-07', '2021-09-13', '9202 Sharon Burg Suite 286', 'Trevorton'),
('a77bd910-b601-46', 'Installer', 'Robert', 'Arroyo', '718-864-2815x190', 'yolandaharding@example.com', '1970-04-21', '2019-07-02', '101 Smith Lock Apt. 837', 'Lake Sharifort'),
('ac0dc4f1efca11ed', 'Intern', 'JUSTEIN KHRYSS', 'GARCIA', '09324324432', 'jgarcia@gmail.com', '1998-10-31', '2010-12-31', 'SANTA ROSA ', 'LAGUNA'),
('b3436202efc311ed', 'Installer', 'JOHN PAOLO', 'EVASCO', '09760657071', 'jp@gmail.com,', '2001-07-30', '2021-12-31', 'SANTA ROSA ', 'LAGUNA'),
('bcb150f1-cfae-4d', 'Installer', 'Chris', 'Weber', '471.828.0539', 'bjensen@example.net', '1983-03-09', '2020-01-24', '940 Sandra Island', 'West Georgeland'),
('c0e03d75-03bf-4d', 'Intern', 'Jermaine', 'Bell', '756.249.6951x500', 'stonedaniel@example.org', '1976-05-28', '2018-07-18', '51276 Davies Points', 'Stephensfort'),
('c2b4efb2-982f-48', 'Salesman', 'Tracy', 'Jones', '(434)729-1179x00', 'reyesrobert@example.net', '1971-08-20', '2022-06-17', '29913 Ronald Avenue', 'Samuelview'),
('c5629dfe-4e7d-4d', 'Intern', 'James', 'Gross', '+1-916-928-5312x', 'hnorton@example.net', '1997-07-30', '2020-07-17', '6144 Albert Landing Apt. 782', 'Rebeccaberg'),
('c9b41bb7efc311ed', 'Intern', 'JOSE', 'SEVILLA', '09123456789', 'jose@gmail.com', '2002-07-30', '2021-12-31', 'SANTA ROSA ', 'LAGUNA'),
('cb51b117-8b07-49', 'Installer', 'Mary', 'Murray', '137-616-7975x058', 'harrismichael@example.net', '1995-04-22', '2021-03-03', '2760 Cameron Alley Suite 378', 'Ricefurt'),
('cd4c4ace-1e2a-41', 'Admin', 'Nicole', 'Santiago', '(950)769-9364x62', 'timothy60@example.org', '1984-10-26', '2023-03-31', '92832 Linda Shoals Suite 883', 'West Andrewview'),
('cd700907-01f3-41', 'Admin', 'Bob', 'Mendoza', '001-808-852-8370', 'julie17@example.net', '1978-02-26', '2022-07-21', '3755 Wright Fork', 'South Ashley'),
('cdb4e140-9273-43', 'Salesman', 'Edwin', 'Anderson', '001-662-235-2065', 'brenda46@example.com', '2001-05-18', '2021-01-20', '0236 Long Mills Apt. 403', 'Christopherside'),
('cf4cb813-0d4b-44', 'Installer', 'Allison', 'Thomas', '801-580-6361', 'ojones@example.com', '1967-05-30', '2019-07-11', '14051 Carr Spur', 'Port Andreahaven'),
('d3803dfa-4edd-44', 'Admin', 'Robert', 'Moore', '4365780665', 'saratate@example.org', '1973-12-15', '2019-07-05', '656 Ray Shore Apt. 440', 'Port Michael'),
('d3f201d1-b673-47', 'Intern', 'Matthew', 'Garcia', '0277925465', 'oreyes@example.net', '1988-11-17', '2019-07-06', '256 Swanson Way', 'Port Danielville'),
('d9febe61-57d0-42', 'Salesman', 'Derrick', 'Green', '(605)868-8394x11', 'williamchambers@example.com', '1995-09-24', '2020-12-07', '593 Morris Lodge Apt. 992', 'East George'),
('dd41860c-c98c-4e', 'Installer', 'Tammie', 'Jenkins', '(935)308-8002', 'sherri94@example.com', '2001-07-12', '2021-06-09', '2913 Smith Creek', 'Lake Jessica'),
('dfad5cee-cc72-46', 'Salesman', 'Sandra', 'Mason', '973.583.6982x201', 'cleon@example.org', '1966-01-01', '2019-12-21', '095 Wade Isle', 'New Carla'),
('e272a11f-1ea7-48', 'Salesman', 'Travis', 'Jones', '521.991.8698', 'jamieliu@example.com', '1986-03-29', '2018-11-24', '7700 Ritter Extension Apt. 980', 'Lake Matthewbury'),
('e352a9fa-9cc4-4e', 'Intern', 'Gail', 'Serrano', '559.403.0552x075', 'bishopshaun@example.org', '1982-02-04', '2022-06-15', '218 Doris Manors', 'West Shelley'),
('e3e60e29-fa85-45', 'Intern', 'Regina', 'Cook', '930-353-6574x268', 'leeluke@example.com', '1985-12-26', '2021-08-22', '4982 Shaw Village Suite 554', 'Beckerton'),
('e6242a46-4331-42', 'Salesman', 'Pamela', 'Newman', '(574)701-6325x31', 'danielcortez@example.org', '2003-02-20', '2022-04-01', '3903 Briana Parks', 'Garzaland'),
('e7fcd09e-028c-4e', 'Admin', 'Ashley', 'Bailey', '787.202.4043', 'claytonmarcus@example.net', '1997-08-15', '2018-05-11', '0693 Peterson Hill', 'Rodriguezmouth'),
('e879e14d-f64d-44', 'Installer', 'Jon', 'Wright', '300.027.4414', 'lopezkaren@example.org', '1994-12-01', '2019-11-08', '76773 Marcus Estate', 'East Jason'),
('ea7466a5-79af-41', 'Salesman', 'Dennis', 'Noble', '300-126-6442x898', 'mckinneyanthony@example.org', '1994-12-04', '2022-01-17', '9412 Bryant Hill Apt. 328', 'North Richard'),
('ee8c25b5-5cd8-4f', 'Intern', 'Richard', 'Young', '001-318-138-7903', 'rickyyoder@example.net', '1988-10-30', '2021-11-23', '5285 Brooks Turnpike Apt. 046', 'Stephenland'),
('f2bd45a6-8c39-4d', 'Installer', 'Carlos', 'Lewis', '(934)193-1654x94', 'curtismcdonald@example.com', '1990-05-18', '2021-11-24', '7083 Julie Drives Suite 389', 'Krauseview'),
('f410eb29-7d10-4b', 'Salesman', 'Sarah', 'Key', '172.308.4978', 'zmartin@example.org', '1985-08-20', '2018-11-29', '8949 Nicholas Rest Suite 595', 'Lake Paulaview'),
('f50abed3-0738-43', 'Admin', 'Ashley', 'Nelson', '(766)170-2416', 'joncraig@example.net', '1978-07-28', '2021-11-10', '6994 Mcclain Isle', 'Braunside'),
('f7f2a492-95c3-40', 'Installer', 'Karen', 'Bird', '(885)295-6392', 'robertbaker@example.net', '1963-12-24', '2018-12-28', '06134 Margaret Coves Apt. 471', 'Bennettstad'),
('fbe6554a-b55d-44', 'Installer', 'Andrew', 'Smith', '450-871-7526x701', 'ythomas@example.com', '2001-11-16', '2019-07-30', '0032 Amanda Track', 'Hunterhaven'),
('fc12c499-6ee0-47', 'Salesman', 'Tina', 'Santiago', '(543)207-7583x04', 'humphreyashley@example.org', '1988-12-15', '2022-10-16', '7105 Jeffrey Ranch', 'East John'),
('fcc36980-30bd-4f', 'Admin', 'Wesley', 'Brown', '261.799.0000', 'jasmine58@example.net', '1990-08-06', '2021-09-03', '519 Young Union Apt. 643', 'North Julieside'),
('fdc4b641-d717-49', 'Intern', 'Bryan', 'Hamilton', '460.095.6284x818', 'dalton77@example.com', '2005-02-08', '2018-09-26', '20999 Alexander Ridges', 'Davidberg'),
('fee77991-c5ea-46', 'Installer', 'Sarah', 'Munoz', '688.627.4789x297', 'leah57@example.org', '1968-11-22', '2021-06-14', '78762 Francisco Garden Suite 006', 'North Jacquelinechester'),
('ff421db7-b2c0-49', 'Salesman', 'Rebecca', 'Johnson', '147-411-0335x546', 'dmiller@example.com', '1965-09-13', '2023-01-13', '3891 Jones Avenue', 'South Amyview');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` varchar(16) NOT NULL DEFAULT replace(convert(uuid() using utf8mb4),'-',''),
  `FIRST_NAME` varchar(64) NOT NULL,
  `LAST_NAME` varchar(64) NOT NULL,
  `USERNAME` varchar(16) NOT NULL,
  `PASSWORD` varchar(64) NOT NULL,
  `ROLE` int(16) NOT NULL,
  `LOGIN_ATTEMPTS` int(16) NOT NULL,
  `IS_LOCKED` int(16) NOT NULL,
  `LAST_LOGIN` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `USERNAME`, `PASSWORD`, `ROLE`, `LOGIN_ATTEMPTS`, `IS_LOCKED`, `LAST_LOGIN`) VALUES
('58727a89cdf911ed', 'JOHN', 'DOE', 'owner', '$2y$10$NNjsc/qfqw0VhWXnVXwI4e7epUme3YfQlyWpaXcMdpHqjRvp721ze', 1, 0, 0, '2023-05-11 16:18:07'),
('d29462f6ed4411ed', 'JOSE', 'SEVILLA', 'adminjsevilla', '$2y$10$yweFv.DMgePVyI2ts/DMSeroqarwAOEs/oXEVgzBrG91TIYdlaTNO', 2, 0, 0, '2023-05-08 10:06:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EMPLOYEE_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
