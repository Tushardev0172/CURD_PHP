# 📝 PHP CRUD Application

A simple **Create, Read, Update, Delete (CRUD)** application built with **PHP, MySQL, and Tailwind CSS**.  
This project demonstrates how to perform basic database operations and design a responsive UI.

---

## ✨ Features
- ➕ Create new users with **name, email, and age**
- 📋 View all users in a table
- ✏️ Update existing users
- ❌ Delete users with confirmation
- 🎨 Responsive design using **Tailwind CSS**
- ⚡ SweetAlert confirmation dialogs
- 🗄️ MySQL database integration

---

## 🛠️ Technologies Used
- **PHP** (Backend)
- **MySQL** (Database)
- **Tailwind CSS** (Frontend styling)
- **SweetAlert2** (Beautiful alerts & confirmations)

---

## ⚙️ Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/Tushardev0172/CURD_PHP.git
cd CURD_PHP
````

### 2. Create Database
- Open phpMyAdmin or MySQL CLI
- Run the following:
````bash
CREATE DATABASE curd_demo;

USE curd_demo;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  age INT NOT NULL
);
````
### 3. Configure Database Connection
- Create a file inside `config/db.php` with:
```` bash
<?php
$host = "localhost";
$username = "root";
$password = "your_password";
$db = "curd_demo";

$conn = new mysqli($host, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
````

---
## 🚀 Usage
- Start your local server (XAMPP, WAMP, or built-in PHP server).
- Place the project inside `htdocs/` (for XAMPP).
- Open in browser:
```` bash
http://localhost/curd_php/
````

--- 
## 📸 Screenshots
# Home page / Read user
  
<img width="1905" height="978" alt="home page" src="https://github.com/user-attachments/assets/02986a72-0b05-469e-bc04-795eecd89248" />
<img width="1919" height="978" alt="home 2" src="https://github.com/user-attachments/assets/f6d58713-a689-475a-ba99-5ea5605a2618" />

# Create User
  
<img width="1919" height="976" alt="create" src="https://github.com/user-attachments/assets/f1b3f463-b337-4c72-a3cc-a41ecef1df04" />
<img width="1919" height="978" alt="create successful" src="https://github.com/user-attachments/assets/22a45aae-0428-45d3-9215-87c6b753e66a" />

# Update User
  
<img width="1919" height="973" alt="update" src="https://github.com/user-attachments/assets/a757a888-0ebe-4334-8ae3-779286c42076" />
<img width="1919" height="977" alt="update confirm" src="https://github.com/user-attachments/assets/457451d7-f8e3-4324-98a6-363fee170a6a" />

# Delete User
  
<img width="1919" height="975" alt="delete" src="https://github.com/user-attachments/assets/7df23b96-1494-44f9-813f-aba971fe0965" />

---
## 📂 Project Structure
````bash
curd_php/
│── config/
│   └── config.php
│── index.php       # List all users
│── create.php      # Create new user
│── update.php      # Update user
│── delete.php      # Delete user
│── README.md
│── .gitignore
````

## 📜 License
- This project is open-source and available under the MIT License.
[MIT](https://choosealicense.com/licenses/mit/)
