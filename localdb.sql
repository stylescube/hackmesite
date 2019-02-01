-- --------------------------------------------------------

--
-- Table structure for table `custandprod`
--

CREATE TABLE `custandprod` (
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custandprod`
--

INSERT INTO `custandprod` (`cid`, `pid`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 2),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
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
-- Table structure for table `testtable`
--

CREATE TABLE `testtable` (
  `ttid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `cid` int(11) NOT NULL,
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`cid`);
