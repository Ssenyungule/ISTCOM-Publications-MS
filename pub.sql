

 create database pub;




CREATE TABLE `publication` (
  `pub_id` int(11) NOT NULL,
  `pub_name` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `publication` (`pub_id`, `pub_name`, `date`) VALUES
(1, 'Modern study of css with Tailwind', '2021-12-01'),
(2, 'Regular expressions', '2021-12-06'),
(3, 'Fullstack Grapghql', '2021-11-30');



CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `names` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `rank` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `user` (`user_id`, `user_name`, `names`, `gender`, `email`, `dob`, `password`, `rank`) VALUES
(1, 'kapo', 'SSENYUNGULE HERBERT', 'Male', 'ngulencyclopedia@outlook.com', '2021-11-30', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'admin'),
(2, 'queen', 'Maama Joan', 'Female', 'maamajoan@gmail.com', '2021-12-06', '410114109270c8ffe4af1706adcad6e29c421f4d', 'user');



ALTER TABLE `publication`
  ADD PRIMARY KEY (`pub_id`),
  ADD KEY `pub_name` (`pub_name`),
  ADD KEY `date` (`date`);



ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `names` (`names`),
  ADD KEY `email` (`email`),
  ADD KEY `gender` (`gender`),
  ADD KEY `password` (`password`),
  ADD KEY `dob` (`dob`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `rank` (`rank`);



ALTER TABLE `publication`
  MODIFY `pub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;




ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

