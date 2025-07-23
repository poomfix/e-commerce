<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /itweb/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="d-flex">
        <?php include '../backend/components/header.php'; ?>
        

        <main class="p-4 flex-grow-1">
            <h2>Welcome <?php echo htmlspecialchars($_SESSION['name']); ?></h2>
            <p>Here Dashboard</p>
        </main>
    </div>
</body>
</html>