<?php
include 'config.php';
if (!isset($_SESSION['user_id'])) exit();

$id = intval($_GET['id']);
$res = $conn->query("SELECT file_name FROM ebooks WHERE id=$id")->fetch_assoc();

$file = "uploads/" . $res['file_name'];

if (file_exists($file)) {
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="'.$res['file_name'].'"');
    readfile($file);
    exit();
}
?>