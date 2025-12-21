# Money Wise – Personal Finance Management App (v2)

## 📌 Project Overview

**Money Wise** is a personal finance management web application that helps users track their **income, expenses, cards, limits, and transfers** in a secure and structured way.


---

## 🛠️ Tech Stack

* **Backend:** PHP (PDO)
* **Database:** MySQL
* **Authentication:** Email + Password (hashed)
* **Security:** Prepared statements, password hashing, sessions

---

## 🔐 Features Implemented

### A. Authentication & Security (Core Only)

*  User registration (email, full name, password)
*  User login (email + password)
*  User logout
*  Secure session handling
*  OTP authentication

---

### 💳 B. Bank Card Management

*  Add one or more bank cards
*  Associate incomes with a specific card
*  View balance per card

Each card is treated as an independent financial source, allowing accurate tracking of funds.

---

### 📊 C. Monthly Spending Limits (By Category)

* Define a monthly limit for each expense category
* Automatic blocking of expenses exceeding the monthly limit

This helps users stay within budget and prevents overspending.

---

### 🔁 D. Recurring Monthly Transactions

* Define recurring incomes or expenses (salary, rent, internet, etc.)
* Automatic generation of recurring transactions at the beginning of each month

This feature reduces manual input and ensures consistency in financial tracking.

---

### 🔄 E. Transfers Between Users

*  Send money to another user via **Name or unique ID**
*  Define a **main card** to receive transfers
*  View transfer history (sent & received)

---

## 📂 Database Overview (Simplified)

Main tables:

* `users`
* `cards`
* `transactions`
* `category_limits`
* `incomes`
* `expences`
* `recurring_transactions`
* `transactions`

All database interactions use **prepared statements** to prevent SQL injection.

---

## 🔒 Security Practices

* Passwords stored using `password_hash()`
* Login validation with `password_verify()`
* PDO prepared statements
* Session-based authentication
* Access control on protected routes

---

## 🚀 Future Improvements

* New IP detection & email alerts
* Spending limit email warnings
* Advanced dashboard with charts & analytics

---

## 👨‍💻 Authors

This project was developed as part of an academic backend development assignment using **PHP & MySQL**.

---

## 📄 License

This project is for **educational purposes only**.

