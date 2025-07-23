<?php
    include './backend/controls/db.php';

    $sql = "SELECT * FROM `users`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>