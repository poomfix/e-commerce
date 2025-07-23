<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name_food = $_POST['name_food'];
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
         $sql = "INSERT INTO products (product_name, description, price, food_imag) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $name_food,
        $description,
        $price,
        $food_imag
    ]);
    }

    header("Location: ../food.php");
}

// Validate and process the image upload
// if ($image['error'] === UPLOAD_ERR_OK) {
//     $imageName = uniqid('food_', true) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
//     $imagePath = '../assets/imgs/' . $imageName;

//     if (move_uploaded_file($image['tmp_name'], $imagePath)) {
//         // Insert food data into the database
//         $stmt = $pdo->prepare("INSERT INTO food (product_name, description, price, food_imag) VALUES (?, ?, ?, ?)");
//         if ($stmt->execute([$name_food, $description, $price, $imageName])) {
//             $_SESSION['success'] = 'เพิ่มเมนูอาหารเรียบร้อยแล้ว';
//         } else {
//             $_SESSION['error'] = 'เกิดข้อผิดพลาดในการเพิ่มเมนูอาหาร';
//         }
//     } else {
//         $_SESSION['error'] = 'เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ';
//     }
// } else {
//     $_SESSION['error'] = 'กรุณาเลือกไฟล์รูปภาพ';
// }

// header('Location: ../food.php');
exit();
