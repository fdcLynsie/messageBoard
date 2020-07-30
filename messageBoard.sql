CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(50),
  `gender` char(1),
  `birthdate` datetime,
  `hubby` text,
  `last_login_time` datetime,
  `created` datetime,
  `modified` datetime,
  `created_ip` varchar(20),
  `modified_ip` varchar(20)
);

CREATE TABLE `messages` (
  `id` int(11) PRIMARY KEY,
  `to_id` int(11),
  `from_id` int(11),
  `content` text,
  `created` datetime,
  `modified` datetime
);
