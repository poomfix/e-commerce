<?php
    include 'db.php';

//ดึงข้อมูลผู้ใช้ตามไอดี
 $id = $_GET['id'];
 $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
 $stmt->execute([$id]);
 $food = $stmt->fetch(PDO::FETCH_ASSOC);
?>