<?php
session_start();
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM Products WHERE id = ?");
    $result = $stmt->execute([$id]);

    if ($result) {
        $_SESSION['success'] = "User deleted successfully.";
        header("Location: ../food.php");
    } else {
        $_SESSION['error'] = "Failed to delete user.";
        header("Location: ../food.php");
    }
    
    exit;
}
?>