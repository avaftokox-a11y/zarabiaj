<?php include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result && password_verify($password, $result['password'])) {
        $_SESSION['user_id'] = $result['id'];
        header("Location: dashboard.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Logowanie</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="login-body">
<div class="login-box">
<h1>Logowanie</h1>
<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Hasło" required>
<button type="submit">Zaloguj</button>
</form>
<p><a href="register.php">Utwórz konto</a></p>
</div>
</body>
</html>