DROP DATABASE IF EXISTS cars;
CREATE DATABASE IF NOT EXISTS cars;
USE cars;

CREATE TABLE car_details (
	id			int	NOT NULL AUTO_INCREMENT,
	make		varchar(233)	NOT NULL,
	model		varchar(233)	NOT NULL,
	PRIMARY KEY(id)
);

INSERT INTO car_details (make, model) VALUES  ('Ford', 'Fiesta');
INSERT INTO car_details (make, model) VALUES  ('BMW', '5-Series');
INSERT INTO car_details (make, model) VALUES  ('Audi', 'A6');
INSERT INTO car_details (make, model) VALUES  ('Kia', 'XXX');


