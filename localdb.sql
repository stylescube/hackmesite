-- --------------------------------------------------------

--
-- Table structure for table `orders`
--
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `oid` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `timestamp`, `cid`, `pid`) VALUES
(1, '2019-01-23 06:03:01', 1, 1),
(2, '2018-12-11 19:37:51', 1, 3),
(3, '2013-03-17 23:27:19', 2, 1),
(4, '2017-07-28 20:59:22', 2, 2),
(5, '2016-07-01 15:14:30', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `pid` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `pname` varchar(255) DEFAULT NULL,
  `pdesc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `pdesc`) VALUES
(1, 'Product 1', 'description for product 1'),
(2, 'Product 2', 'description for product 2'),
(3, 'Product 3', 'description for product 3'),
(4, 'Product 4', 'description for product 4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `cid` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cfname` varchar(255) DEFAULT NULL,
  `clname` varchar(255) DEFAULT NULL,
  `caddress` varchar(255) DEFAULT NULL,
  `ccity` varchar(255) DEFAULT NULL,
  `czip` int(5) DEFAULT NULL,
  `cphone` varchar(10) DEFAULT NULL,
  `cusername` varchar(255) DEFAULT NULL,
  `cpassword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`cid`, `cfname`, `clname`, `caddress`, `ccity`, `czip`, `cphone`, `cusername`, `cpassword`) VALUES
(1, 'Foo', 'B', '123 Main St. ', 'Redmond', 98004, '5551234567', 'foob', 'password'),
(2, 'Bar', 'Z', '321 Azure Way', 'Redmond', 98052, '5556667777', 'barz', 'password');
