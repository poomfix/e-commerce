<?php
include './controls/fetchfood.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin console</title>
    <!-- Bootstrap 5 CDN -->
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
<style>
    body {
        font-family: 'Kanit', sans-serif;
    }
</style>

<body>
    <div class="d-flex">
        <?php include '../backend/components/header.php'; ?>
        <main class="p-4 flex-grow-1">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold" style="color:#290054"><i class="bi bi-list-ul me-2"></i>เมนูอาหารทั้งหมด</h2>
                <a href="addfood.php" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">
                    <i class="bi bi-plus-circle me-2"></i>เพิ่มเมนู
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle shadow-sm rounded-4 overflow-hidden" style="background:rgba(255,255,255,0.97);">
                    <thead class="table-info text-dark">
                        <tr style="font-size:1.1rem;">
                            <!-- <th>number</th> -->
                            <th>No</th>
                            <th>Image</th>
                            <th>Menu</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Added Date</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr class="align-middle">
                            <td class=""><?= $i++; ?></td>
                            <!-- <td class="fw-bold text-primary" style="font-size:1.1rem;">#<?= htmlspecialchars($row['id']); ?></td> -->
                            <td>
                                <img src="../assets/imgs/<?= htmlspecialchars($row['food_imag']); ?>" alt="" class="rounded-3 shadow-sm border border-2" style="width: 90px; height: 90px; object-fit:cover;">
                            </td>
                            <td class="fw-semibold" style="color:#290054; font-size:1.1rem;">
                                <i class="bi bi-egg-fried me-1"></i><?= htmlspecialchars($row['product_name']); ?>
                            </td>
                            <td class="text-secondary"><?= htmlspecialchars($row['description']); ?></td>
                            <td class="fw-bold text-success"><?= htmlspecialchars($row['price']); ?> <span class="text-muted">THB</span></td>
                            <td class="text-center text-info"><?= htmlspecialchars($row['created_at']); ?></td>
                            <td>
                                <a href="editfood.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning rounded-pill px-3 me-1 shadow-sm">
                                    <i class="bi bi-pencil-square"></i> แก้ไข
                                </a>
                                <button class="btn btn-sm btn-danger rounded-pill px-3 shadow-sm" onclick="confirmDelete(<?= $row['id'] ?>)">
                                    <i class="bi bi-trash-fill"></i> ลบ
                                </button>
                                <script>
                                    function confirmDelete(id) {
                                        Swal.fire({
                                            title: 'ต้องการลบเมนูนี้ใช่หรือไม่?',
                                            text: "หากลบแล้วจะไม่สามารถกู้คืนได้!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonText: 'ลบเลย',
                                            cancelButtonText: 'ยกเลิก',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = `controls/deletefood.php?id=` + id;
                                            }
                                        });
                                    }
                                </script>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
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