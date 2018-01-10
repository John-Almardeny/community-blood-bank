/*
*@author: Yahya Almardeny
*@version: 05/03/2017
*/

USE id160877_communit_blood_bank;

######################################################################################################

/*CREATE TABLES*/
CREATE TABLE Donor (
PPS varchar(9) NOT NULL PRIMARY KEY,
fName varchar(25) NOT NULL,
lName varchar(25) NOT NULL,
DOB date NOT NULL,
gender enum('M','F') NOT NULL DEFAULT 'M',
email varchar(35) NOT NULL,
contactNo varchar(15) NOT NULL,
city varchar(15) NOT NULL DEFAULT 'WATERFORD',
street varchar(25) NOT NULL,
timesOfDonations int(1) NOT NULL DEFAULT '0'
);


CREATE TABLE Health_Check (
hId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
bloodPressure varchar(9) NOT NULL,
weight float(4,1) NOT NULL,
height float(4,1) NOT NULL,
heartRate int(3) NOT NULL,
temprature float(3,1) NOT NULL,
alcoholicTest enum('P','F') NOT NULL DEFAULT 'P',
dateOfCheck date,
donorId varchar(9)
);

CREATE TABLE Blood_Unit (
bId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
bloodGroup enum('O+','O-','A+','A-','B+','B-','AB+','AB-') NOT NULL,
amount enum('500','750') NOT NULL DEFAULT '500',
dateOfDonation date NOT NULL,
expiryDate date NOT NULL,
donorId varchar(9)
);

CREATE TABLE Users(
username varchar(20) NOT NULL PRIMARY KEY DEFAULT 'admin',
pass char(40) NOT NULL
);

#////////////////////////////////////////////////////////////////////////////////////////////////////#

/*SET THE CONSTRAINTS*/


ALTER TABLE Health_Check
  ADD CONSTRAINT donorH_fk FOREIGN KEY (donorId) REFERENCES Donor (PPS) ON DELETE CASCADE ON UPDATE CASCADE;
  
ALTER TABLE Blood_Unit
  ADD CONSTRAINT donor_fk FOREIGN KEY (donorId) REFERENCES Donor (PPS) ON DELETE CASCADE ON UPDATE CASCADE;

    


DELIMITER $$
CREATE PROCEDURE `newBloodUnit`(bloodGroup enum('O+','O-','A+','A-','B+','B-','AB+','AB-'),
								amount enum('500','750'),dateOfDonation date, donorId varchar(9))
BEGIN
    INSERT INTO Blood_Unit(bloodGroup, amount, dateOfDonation, expiryDate, donorId)values
							 (bloodGroup, amount, dateOfDonation, DATE_ADD(dateOfDonation,INTERVAL 42 DAY), donorId);
    END$$
DELIMITER ;


INSERT INTO Donor values("82345YA", "Yahya", "Almardeny", "1987-10-25", 'M', "almardeny@gmail.com", "0871025150", "Waterford", "Park Road", 0);
INSERT INTO Donor values("19432NU", "Nuha", "Alnatour", "1990-09-21", 'F', "nuha05sy@gmail.com", "0871025167", "Waterford", "Park Road", 0);
INSERT INTO Donor values("38254JH", "John", "Sina", "1988-05-04", 'M', "johnSina@gmail.com", "0876666666", "Cork", "Old Youghal road", 1);
INSERT INTO Donor values("22548AN", "Anna", "O'brien", "1993-07-12", 'F', "annaob@hotmail.com", "0865478543", "Dublin", "Ballymon Road", 1);
INSERT INTO Donor values("65547RA", "Rayan", "Mccauley", "1977-01-06", 'M', "smccauley@gmail.com", "0810254698", "wexford", "summerhill Road", 1);
INSERT INTO Donor values("44758PE", "Peter", "Reidy", "1982-12-11", 'M', "peter11@hotmail.com", "0897215123", "shannon", "Smithstown Road", 0);
INSERT INTO Donor values("15423JO", "Jory", "Walsh", "1985-08-10", 'F', "joryrose@gmail.com", "0872546893", "Waterford", "Yellow Road", 2);
INSERT INTO Donor values("25379SA", "Sara", "Kelly", "1995-03-28", 'F', "sarak@yahoo.com", "0865478523", "carlow", "Bridge Street", 0);
INSERT INTO Donor values("35412ST", "Stephen", "Smith", "1979-06-26", 'M', "ssmith@gmail.com", "087356715", "Kilkenny", "Dublin Road", 0);
INSERT INTO Donor values("95684KA", "Kathy", "Moore", "1976-04-09", 'F', "ka-more@windowslive.com", "0814502436", "Clonmel", "Davis Road", 0);
INSERT INTO Donor values("12345PR", "Peter", "Reidy", "1984-05-20", 'M', "peter@windowslive.com", "0874502123", "Wexford", "Main Street", 0);
INSERT INTO Donor values("10087RS", "Rosemarry", "Shanhon", "1960-12-20", 'F', "rosierose@windowslive.com", "08540054698", "Waterford", "OConnel Street", 0);
INSERT INTO Donor values("95135JH", "John", "Hanlon", "1987-3-05", 'M', "jHanlon@gmail.com", "0872033487", "Kilkenny", "Main Road", 0);
INSERT INTO Donor values("05784DC", "Declan", "Car", "1979-05-10", 'M', "declan@gmail.com", "0841257801", "Waterford", "William Street", 0);


CALL newBloodUnit("O+", "500", "2017-01-10", "05784DC");
CALL newBloodUnit("AB+", "750", "2017-04-01", "82345YA");
CALL newBloodUnit("O+", "500", "2017-02-27", "19432NU");
CALL newBloodUnit("O-", "750", "2017-02-20", "38254JH");
CALL newBloodUnit("A+", "500", "2017-02-22", "22548AN");
CALL newBloodUnit("B+", "500", "2017-02-25", "65547RA");
CALL newBloodUnit("O+", "500", "2017-01-01", "44758PE");
CALL newBloodUnit("B-", "500", "2017-02-24", "15423JO");
CALL newBloodUnit("O+", "500", "2017-03-24", "12345PR");
CALL newBloodUnit("AB-", "500", "2017-03-28", "10087RS");
CALL newBloodUnit("O+", "500", "2017-02-21", "95135JH");

									


INSERT INTO Health_Check (bloodPressure, weight,height,heartRate,temprature,alcoholicTest,dateOfCheck,donorId) values 
							('12.5/8', 80, 171, 75, 37, 'P', '2017-03-01', "82345YA");
INSERT INTO Health_Check (bloodPressure, weight,height,heartRate,temprature,alcoholicTest,dateOfCheck,donorId) values 
							('11/7.5', 68, 174, 70, 37, 'P', '2017-02-27',  "19432NU");
INSERT INTO Health_Check (bloodPressure, weight,height,heartRate,temprature,alcoholicTest,dateOfCheck,donorId) values 
							('12/8.2', 85, 182, 72, 37, 'P', '2017-02-20',  "38254JH");
INSERT INTO Health_Check (bloodPressure, weight,height,heartRate,temprature,alcoholicTest,dateOfCheck,donorId) values 
							('11.8/7.6', 60, 162, 66, 37, 'P', '2017-02-22',  "22548AN");
INSERT INTO Health_Check (bloodPressure, weight,height,heartRate,temprature,alcoholicTest,dateOfCheck,donorId) values 
							('12.7/7.9', 78, 184, 74, 37, 'P', '2017-02-25',  "65547RA");
INSERT INTO Health_Check (bloodPressure, weight,height,heartRate,temprature,alcoholicTest,dateOfCheck,donorId) values 
							('13/8.5', 75, 176, 78, 37, 'P', '2017-01-01',  "44758PE");
INSERT INTO Health_Check (bloodPressure, weight,height,heartRate,temprature,alcoholicTest,dateOfCheck,donorId) values 
							('12/8', 55, 172, 68, 37, 'P', '2017-02-24',  "15423JO");
INSERT INTO Health_Check (bloodPressure, weight,height,heartRate,temprature,alcoholicTest,dateOfCheck,donorId) values 
							('12.3/8.1', 58, 168, 70, 37, 'P', '2017-02-20',  "25379SA");
INSERT INTO Health_Check (bloodPressure, weight,height,heartRate,temprature,alcoholicTest,dateOfCheck,donorId) values 
							('11.6/7.6', 87, 180, 80, 37, 'P', '2017-02-26', "35412ST");
INSERT INTO Health_Check (bloodPressure, weight,height,heartRate,temprature,alcoholicTest,dateOfCheck,donorId) values 
							('11.5/8', 62, 158, 73, 37, 'P', '2017-02-19', "95684KA");
INSERT INTO Health_Check (bloodPressure, weight,height,heartRate,temprature,alcoholicTest,dateOfCheck,donorId) values 
							('12/8', 60, 175, 70, 63.5, 'P', '2017-03-24', "12345PR");

							
#users
#username: root password: root (encrypted in SHA-1)
INSERT INTO Users values ('root', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785');









