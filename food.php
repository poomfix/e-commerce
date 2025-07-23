<?php
include './controls/fetchProduct.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อาหาร</title>
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
    <style>
        body {
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
        }
        .food-card {
            background: #fffafc;
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px 0 rgba(180, 200, 255, 0.15);
            border: none;
        }
        .table {
            background: #f7faff;
            border-radius: 1rem;
            box-shadow: 0 2px 8px 0 rgba(180, 200, 255, 0.10);
            overflow: hidden;
        }
        .table th, .table td {
            vertical-align: middle !important;
        }
        .table thead {
            background: #e0eafc;
        }
        .btn-group .btn, .btn {
            border-radius: 2rem !important;
            font-weight: 500;
        }
        .btn-primary {
            background: #b2f7ef;
            color: #2d6a4f;
            border: none;
        }
        .btn-warning {
            background: #ffe5b4;
            color: #b68900;
            border: none;
        }
        .btn-danger {
            background: #ffd6e0;
            color: #d7263d;
            border: none;
        }
        .rounded-3 {
            border-radius: 1rem !important;
        }
        .fw-bold {
            color: #6c63ff;
            font-weight: 700 !important;
            letter-spacing: 1px;
        }
        .fw-semibold {
            font-weight: 600 !important;
        }
    </style>
</head>
<body>
    <?php include './components/header.php'; ?>
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="food-card p-4 mb-5">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="fw-bold"><i class="bi bi-list-ul me-2"></i>เมนูอาหารทั้งหมด</h2>
                            
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered align-middle">
                                <thead>
                                    <tr style="font-size:1.1rem;">
                                        
                                        <th>Image</th>
                                        <th>Menu</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Added Date</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr class="align-middle">
                                        
                                        <td>
                                            <img src="./assets/imgs/<?= htmlspecialchars($row['food_imag']); ?>" alt="" class="rounded-3 shadow-sm border border-2" style="width: 90px; height: 90px; object-fit:cover;">
                                        </td>
                                        <td class="fw-semibold" style="color:#6c63ff; font-size:1.1rem;">
                                            <i class="bi bi-egg-fried me-1"></i><?= htmlspecialchars($row['product_name']); ?>
                                        </td>
                                        <td class="text-secondary"><?= htmlspecialchars($row['description']); ?></td>
                                        <td class="fw-bold text-success"><?= htmlspecialchars($row['price']); ?> <span class="text-muted">THB</span></td>
                                        <td class="text-center text-info"><?= htmlspecialchars($row['created_at']); ?></td>
                                        
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>