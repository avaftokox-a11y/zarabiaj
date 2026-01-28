<?php
$host = "localhost";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass);
$conn->query("CREATE DATABASE IF NOT EXISTS ebook_site CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
$conn->select_db("ebook_site");

$conn->query("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    is_admin TINYINT(1) DEFAULT 0
)");

$conn->query("CREATE TABLE IF NOT EXISTS ebooks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    category VARCHAR(100),
    file_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

$email = "admin@admin.pl";
$password = password_hash("admin123", PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT IGNORE INTO users (email, password, is_admin) VALUES (?, ?, 1)");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();

echo "Gotowe. Admin: admin@admin.pl / admin123";
?>