<?php
include '../config.php';
$user = $conn->query("SELECT is_admin FROM users WHERE id=".$_SESSION['user_id'])->fetch_assoc();
if (!$user['is_admin']) exit("Brak dostępu");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $cat = $_POST['category'];

    $file = basename($_FILES['pdf']['name']);
    move_uploaded_file($_FILES['pdf']['tmp_name'], "../uploads/" . $file);

    $stmt = $conn->prepare("INSERT INTO ebooks (title, description, category, file_name) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $desc, $cat, $file);
    $stmt->execute();

    header("Location: panel.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dodaj e-book</title>
<link rel="stylesheet" href="../style.css">
</head>
<body class="login-body">
<div class="login-box">
<h1>Dodaj e-book</h1>
<form method="POST" enctype="multipart/form-data">
<input name="title" placeholder="Tytuł" required>
<input name="category" placeholder="Kategoria" required>
<textarea name="description" placeholder="Opis"></textarea>
<input type="file" name="pdf" accept="application/pdf" required>
<button type="submit">Dodaj</button>
</form>
</div>
</body>
</html>