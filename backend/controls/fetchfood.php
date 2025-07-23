<?php
    include 'db.php';

    $sql = "SELECT * FROM `products`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>