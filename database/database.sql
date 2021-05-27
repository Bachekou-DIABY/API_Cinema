CREATE TABLE `Administrator` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(63) NOT NULL,
  `last_name` varchar(63) NOT NULL ,
  `email` varchar(63) NOT NULL ,
  `encrypted_password`varchar(63) NOT NULL ,
  PRIMARY KEY (`id`)
);

INSERT INTO `Administrator` VALUES 
(1,'Dupont','Jean','dupont.jean@gmail.com','$2y$10$Ag8ZkREucXfBy4FS2O2bOeh7ayezQ2zuHrO7D.oDjN.TH0euxUdG6'),
(2,'Dupont','Jeanne','dupont.jeanne@gmail.com','$2y$10$Ag8ZkREucXfBy4FS2O2bOeh7ayezQ2zuHrO7D.oDjN.TH0euxUdG6');

CREATE TABLE `Cinema` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL,
  `adress` varchar(63) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `Cinema` VALUES 
(1,'UGC part-dieu','17 rue du dr Bouchut');

CREATE TABLE `User` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(63) NOT NULL,
  `last_name` varchar(63) NOT NULL,
  `email` varchar(63) NOT NULL,
  `encrypted_password` varchar(63) NOT NULL,
  `id_cinema` int NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT id_user_cinema FOREIGN KEY (`id_cinema`) REFERENCES Cinema(`id`) 
  ON DELETE NO ACTION ON UPDATE NO ACTION
);

INSERT INTO `User` VALUES 
(1,'Dupont','Jean','dupont.jean@gmail.com','$2y$10$Ag8ZkREucXfBy4FS2O2bOeh7ayezQ2zuHrO7D.oDjN.TH0euxUdG6',1);

CREATE TABLE `Film` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `Film` VALUES
(1,'Le Parrain');

CREATE TABLE `Cinema_Film` (
  `id_film` int NOT NULL,
  `id_cinema` int NOT NULL,
  CONSTRAINT id_cinema_film FOREIGN KEY (`id_cinema`) REFERENCES Cinema(`id`) 
  ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT id_film_cinema FOREIGN KEY (`id_film`) REFERENCES Film(`id`) 
  ON DELETE NO ACTION ON UPDATE NO ACTION
);

INSERT INTO `Cinema_Film` VALUES 
(1,1);

CREATE TABLE `Price` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL,
  `amount` float NOT NULL,
  `id_cinema` int NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT id_price_cinema FOREIGN KEY (`id_cinema`) REFERENCES Cinema(`id`) 
  ON DELETE NO ACTION ON UPDATE NO ACTION
);

INSERT INTO `Price` VALUES 
(1,'Plein tarif','9.20',1),
(2,'Etudiant','7.60',1),
(3,'Moins de 14 ans','5.90',1);

CREATE TABLE `Room` (
  `id` int NOT NULL AUTO_INCREMENT,
  `places` int NOT NULL,
  `id_cinema` int NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT id_room_cinema FOREIGN KEY (`id_cinema`) REFERENCES Cinema(`id`) 
  ON DELETE NO ACTION ON UPDATE NO ACTION
);

INSERT INTO `Room` VALUES 
(1,'70',1),
(2,'80',1),
(3,'90',1);

CREATE TABLE `Session` (
  `id` int AUTO_INCREMENT,
  `time` time,
  `date` date,
  `id_film` int,
  `id_room` int,
  PRIMARY KEY (`id`),
  CONSTRAINT id_session_film FOREIGN KEY (`id_film`) REFERENCES Session(`id`) 
  ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT id_session_room FOREIGN KEY (`id_room`) REFERENCES Room(`id`) 
  ON DELETE NO ACTION ON UPDATE NO ACTION
);

INSERT INTO `Session` VALUES 
(1,'06:30:00','2021-06-30',1,1),
(2,'08:00:00','2021-08-01',1,2),
(3,'09:20:00','2021-09-20',1,3);


CREATE TABLE `Ticket` (
  `id` int AUTO_INCREMENT,
  `first_name` varchar(63),
  `last_name` varchar(63),
  `payment_method` varchar(63),
  `id_session` int,
  `id_price` int,
  PRIMARY KEY (`id`),

  CONSTRAINT id_ticket_session FOREIGN KEY (`id_session`) REFERENCES Session(`id`) 
  ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT id_ticket_price FOREIGN KEY (`id_price`) REFERENCES Price(`id`) 
  ON DELETE NO ACTION ON UPDATE NO ACTION

);

INSERT INTO `Ticket` VALUES 
(1,'Pierre','Dupont','Sur place',1,1),
(2,'Paul','Dupont','Sur place',1,2),
(3,'Jacques','Dupont','Sur place',1,3);