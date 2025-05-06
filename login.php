<?php
session_start();
include 'database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->execute([$_POST['username']]);
  $user = $stmt->fetch();
  if ($user && password_verify($_POST['password'], $user['password'])) {
    $_SESSION['user'] = $user['username'];
    header('Location: game.php');
  } else {
    echo "not valid";
  }
}
?>
<form method="post">
  Username: <input name="username"><br>
  Password: <input type="password" name="password"><br>
  <button type="submit">Login</button>
</form>