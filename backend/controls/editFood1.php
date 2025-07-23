<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $food_imag = null;

    if (isset($_FILES['food_imag']) && $_FILES['food_imag']['error'] === 0) {
        $target_dir = "../../assets/imgs/";
        $image_name = basename($_FILES['food_imag']['name']);
        $target_file = $target_dir . $image_name;

        $imagefileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($imagefileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES['food_imag']['tmp_name'], $target_file)) {
                $food_imag = $image_name;
                $_SESSION['success'] = "Image uploaded successfully!";
            } else {
                $_SESSION['error'] = "Failed to upload image.";
                header("Location: ../editfood.php?id=" . $id);
                exit;
            }
        } else {
            $_SESSION['error'] = "Invalid image format.";
            header("Location: ../editfood.php?id=" . $id);
            exit;
        }
    }

    $stmt = $pdo->prepare("UPDATE products SET product_name = ?, description = ?, price = ?" . ($food_imag ? ", food_imag = ?" : "") . " WHERE id = ?");
    $params = [$product_name, $description, $price];
    if ($food_imag) {
        $params[] = $food_imag;
    }
    $params[] = $id;
    $result = $stmt->execute($params);

    if ($result) {
        $_SESSION['success'] = "Product updated successfully!";
        header("Location: ../food.php");
    } else {
        $_SESSION['error'] = "Failed to update product.";
        header("Location: ../editfood.php?id=" . $id);
    }

    exit;
}
