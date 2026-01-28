<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ebook_site";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Błąd połączenia z bazą");

session_start();
?>