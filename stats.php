<?php
include 'database.php';
$users = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$scores = $pdo->query("SELECT COUNT(*) FROM scores")->fetchColumn();
?>
<h2>Stats</h2>
<p>Registered users: <?= $users ?></p>
<p>Games played: <?= $scores ?></p>