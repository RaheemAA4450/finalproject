<?php
session_start();
include 'database.php';
if (isset($_SESSION['user']) && isset($_POST['result'])) {
  $stmt = $pdo->prepare("INSERT INTO scores (username, result) VALUES (?, ?)");
  $stmt->execute([$_SESSION['user'], $_POST['result']]);
}
?>