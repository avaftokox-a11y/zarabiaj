<?php
include '../config.php';
$user = $conn->query("SELECT is_admin FROM users WHERE id=".$_SESSION['user_id'])->fetch_assoc();
if (!$user['is_admin']) exit("Brak dostępu");
?>
<!DOCTYPE html>
<html>
<head>
<title>Panel Admina</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
<header><h1>Panel Admina</h1></header>
<section>
<a href="add_book.php"><button>Dodaj e-book</button></a>
</section>
</body>
</html>