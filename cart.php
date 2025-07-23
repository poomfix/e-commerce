<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
        }
        .cart-card {
            background: #fffafc;
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px 0 rgba(180, 200, 255, 0.15);
            border: none;
        }
        .list-group-item {
            background: #f7faff;
            border-radius: 1rem !important;
            margin-bottom: 1rem;
            border: none;
            box-shadow: 0 2px 8px 0 rgba(180, 200, 255, 0.10);
        }
        .btn-group .btn {
            border-radius: 2rem !important;
            font-weight: 500;
        }
        .btn-success {
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
        .img-thumbnail {
            border-radius: 1rem;
            border: 2px solid #e0eafc;
            box-shadow: 0 2px 8px 0 rgba(180, 200, 255, 0.10);
        }
        h2 {
            color: #6c63ff;
            font-weight: 700;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <?php include './components/header.php'; ?>

    <section id="cart_product" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="cart-card p-4 mb-5">
                        <h2 class="mb-4 text-center"><i class="bi bi-basket-fill me-2"></i>แสดงข้อมูลตะกร้าสินค้า</h2>
                        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                            <ul class="list-group">
                                <?php foreach ($_SESSION['cart'] as $item): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="d-flex w-100">
                                            <img src="./assets/imgs/<?= htmlspecialchars($item['productImage']); ?>" alt="Product Image" class="img-thumbnail me-3" style="height: 80px; width: 80px; object-fit: cover;">
                                            <div class="ms-1 w-100">
                                                <h5 class="mb-1" style="color:#6c63ff; font-weight:600; letter-spacing:1px;">
                                                    <i class="bi bi-cup-hot me-1"></i><?= htmlspecialchars($item['productName']); ?>
                                                </h5>
                                                <p class="mb-1"><strong style="color:#2d6a4f;">Price:</strong> <?= htmlspecialchars($item['productPrice']); ?> <span style="color:#b68900;">บาท</span></p>
                                                <p class="mb-0"><strong style="color:#d7263d;">Quantity:</strong> <?= htmlspecialchars($item['quantity']); ?></p>
                                            </div>
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button class="btn btn-success btn-sm">
                                                <i class="bi bi-plus-circle-fill"></i> เพิ่ม
                                            </button>
                                            <button class="btn btn-warning btn-sm">
                                                <i class="bi bi-dash-circle-fill"></i> ลด
                                            </button>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash-fill"></i> ลบ
                                            </button>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-center col-12 py-5" style="color:#b68900; font-size:1.2rem;">ไม่มีสินค้าในตะกร้า</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include './components/footer.php'; ?>
</body>

</html>