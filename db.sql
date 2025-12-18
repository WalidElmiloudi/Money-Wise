CREATE DATABASE IF NOT EXISTS smart_wallet;
USE smart_wallet;
CREATE TABLE IF NOT EXISTS incomes(
  id INT PRIMARY KEY AUTO_INCREMENT,
  montant DECIMAL(10,2),
  date DATE DEFAULT (CURRENT_TIME),
  description TEXT,
  category VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS expences(
  id INT PRIMARY KEY AUTO_INCREMENT,
  montant DECIMAL(10,2),
  date DATE DEFAULT (CURRENT_TIME),
  description TEXT,
  category VARCHAR(255)
);

ALTER TABLE incomes ADD userID INT;
ALTER TABLE expences ADD userID INT;

CREATE TABLE IF NOT EXISTS users(
 id int PRIMARY KEY AUTO_INCREMENT,
 name VARCHAR(255),
 email VARCHAR(100) UNIQUE,
 password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS cards(
id INT PRIMARY KEY AUTO_INCREMENT,
user_id INT,
statut ENUM('main','secondary'),
balance DECIMAL(10,2),
bank_name VARCHAR(20),
card_number INT,
expiration_date DATE,
CCV INT
);

CREATE TABLE IF NOT EXISTS category_limits(
  id INT PRIMARY KEY AUTO_INCREMENT,
  category VARCHAR(30),
  limit_amount DECIMAL(10,2),
  amount DECIMAL(10,2)
)


CREATE TABLE IF NOT EXISTS recurring_transactions(
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_ID INT,
  amount DECIMAL(10,2),
  type ENUM('incomes','expences'),
  category VARCHAR(30)
)