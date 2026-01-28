<?php include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Rejestracja</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="login-body">
<div class="login-box">
<h1>Rejestracja</h1>
<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Hasło" required>
<button type="submit">Załóż konto</button>
</form>
</div>
</body>
</html>