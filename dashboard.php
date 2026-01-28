<?php include 'config.php';
if (!isset($_SESSION['user_id'])) header("Location: index.php");

$result = $conn->query("SELECT * FROM ebooks ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>E-booki</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<h1>Biblioteka E-booków</h1>
<a href="logout.php">Wyloguj</a>
</header>

<section class="grid">
<?php while ($book = $result->fetch_assoc()): ?>
<div class="card">
<h3><?= htmlspecialchars($book['title']) ?></h3>
<p><?= htmlspecialchars($book['description']) ?></p>
<small>Kategoria: <?= htmlspecialchars($book['category']) ?></small><br>
<a href="download.php?id=<?= $book['id'] ?>"><button>Pobierz PDF</button></a>
</div>
<?php endwhile; ?>
</section>
</body>
</html>