<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("location : /itweb/index.php");
    exit;
}
include 'controls/idfood.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Console</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap js cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="d-flex">
        <?php include '../backend/components/header.php'; ?>

        <main class="p-4 flex-grow-1">
            <h2>Edit Food</h2>
            <form action="controls/editFood1.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $food['id']; ?>">
                <div class="mb-3">
                    <label for="">product_name</label>
                    <input type="text" name="product_name" class="form-control" value="<?= htmlspecialchars($food['product_name']); ?>">
                </div>
                <div class="mb-3">
                    <label for="">description</label>
                    <input type="text" name="description" class="form-control" value="<?= htmlspecialchars($food['description']); ?>">
                </div>
                <div class="mb-3">
                    <label for="">price</label>
                    <input type="text" name="price" class="form-control" value="<?= htmlspecialchars($food['price']); ?>">
                </div>
                <div class="mb-3">
                    <label for="">created_at</label>
                    <input type="text" name="created_at" class="form-control" value="<?= htmlspecialchars($food['created_at']); ?>">
                </div>
                <div class="mb-3">
                    <label for="">Picture</label>
                    <input type="file" name="food_imag" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
                <button type="reset" class="btn btn-danger">รีเซ็ต</button>
                <a href="food.php" class="btn btn-secondary">ย้อนกลับ</a>
            </form>
        </main>
    </div>
</body>

</html>

<?php if (isset($_SESSION['success'])) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '<?= $_SESSION['success']; ?>',
            confirmButtonText: 'OK'
        });
    </script>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>
<?php if (isset($_GET['error'])) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '<?= htmlspecialchars($_GET['error']); ?>',
            confirmButtonText: 'OK'
        });
    </script>
    <?php unset($_GET['error']); ?>
<?php endif; ?>