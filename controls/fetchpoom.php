<?php
include './controls/db.php';

$sql = "SELECT `first_name`, `last_name`, `address`, `email` FROM `users` WHERE id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();
$addr = $stmt->fetch(PDO::FETCH_ASSOC);