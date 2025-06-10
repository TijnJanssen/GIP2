-- Create tables and insert dummy data for rfid_db with Dutch status values

DROP TABLE IF EXISTS user_status;
DROP TABLE IF EXISTS user_classgroup;
DROP TABLE IF EXISTS user;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    username VARCHAR(50)
);

CREATE TABLE user_classgroup (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userId INT,
    classgroupId VARCHAR(10),
    schoolYear VARCHAR(20),
    FOREIGN KEY (userId) REFERENCES user(id)
);

CREATE TABLE user_status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userId INT,
    date DATE,
    period INT,
    status VARCHAR(20),
    FOREIGN KEY (userId) REFERENCES user(id)
);

-- Insert dummy users
INSERT INTO user (firstname, lastname, username) VALUES
('Jan', 'Jansen', 'jjansen'),
('Piet', 'Pietersen', 'ppietersen'),
('Klaas', 'Klaassen', 'kklaassen'),
('Anna', 'Annas', 'aannas'),
('Els', 'Elssen', 'eelssen');

-- Assign users to classgroups for school year 2024-2025
INSERT INTO user_classgroup (userId, classgroupId, schoolYear) VALUES
(1, '6ICW', '2024-2025'),
(2, '6ICW', '2024-2025'),
(3, '6TWE', '2024-2025'),
(4, '6ME', '2024-2025'),
(5, '6ME', '2024-2025');

-- Insert user status for different dates and periods with Dutch status
INSERT INTO user_status (userId, date, period, status) VALUES
(1, '2024-06-01', 1, 'Aanwezig'),
(1, '2024-06-01', 2, 'Afwezig'),
(2, '2024-06-01', 1, 'Aanwezig'),
(3, '2024-06-01', 1, 'Afwezig'),
(4, '2024-06-01', 1, 'Aanwezig'),
(5, '2024-06-01', 1, 'Aanwezig'),
(1, '2024-06-02', 1, 'Afwezig'),
(2, '2024-06-02', 1, 'Aanwezig'),
(3, '2024-06-02', 1, 'Aanwezig'),
(4, '2024-06-02', 1, 'Afwezig'),
(5, '2024-06-02', 1, 'Aanwezig');
