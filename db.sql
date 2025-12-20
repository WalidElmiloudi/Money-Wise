CREATE DATABASE IF NOT EXISTS smart_wallet;
USE smart_wallet;

CREATE TABLE IF NOT EXISTS incomes(
  id INT PRIMARY KEY AUTO_INCREMENT,
  montant DECIMAL(10,2),
  date DATE DEFAULT (CURRENT_TIME),
  description TEXT,
  category VARCHAR(255),
  card_id INT
);
CREATE TABLE IF NOT EXISTS expences(
  id INT PRIMARY KEY AUTO_INCREMENT,
  montant DECIMAL(10,2),
  date DATE DEFAULT (CURRENT_TIME),
  description TEXT,
  category VARCHAR(255),
  card_id INT
);


CREATE TABLE IF NOT EXISTS users(
 id int PRIMARY KEY AUTO_INCREMENT,
 name VARCHAR(255),
 email VARCHAR(100) UNIQUE,
 password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS cards(
id INT PRIMARY KEY AUTO_INCREMENT,
user_id INT,
statut ENUM('main','secondary') DEFAULT 'secondary',
balance DECIMAL(10,2) DEFAULT 0,
card_holder VARCHAR(20),
card_number VARCHAR(20),
expiration_date DATE,
CCV INT
);


CREATE TABLE IF NOT EXISTS category_limits(
  id INT PRIMARY KEY AUTO_INCREMENT,
  category VARCHAR(30),
  limit_amount DECIMAL(10,2),
  user_id INT
);

CREATE TABLE IF NOT EXISTS recurring_transactions(
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_ID INT,
  amount DECIMAL(10,2),
  type ENUM('incomes','expences'),
  category VARCHAR(30)
);

show tables;

select sum(e.montant) from expences e left join cards c on e.card_id = c.id join users u on c.user_id = u.id where e.category = 'Housing';