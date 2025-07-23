<?php
    include 'db.php';
    session_start();

    $sql = "SELECT * FROM `products`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>