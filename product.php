<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            /* ไล่สีพาสเทลแนวนอน */
            background: linear-gradient(to right, rgb(111, 124, 122), rgb(196, 159, 231), #e0bbf4, rgb(172, 122, 238));
        }
    </style>
</head>

<body>
    <?php include './controls/fetchProduct.php'; ?>
    <section id="fecth_user" class="py-5">
        <div class="container">
            <h2 class="mb-4 d-flex justifly-item-center justify-content-center align-items-center">แสดงสินค้า</h2>
            <?php if ($stmt->rowCount() > 0) : ?>
                <div class="container mt-5">
                    <div class="row">
                        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($row['id'] . " " . htmlspecialchars($row['product_name'])); ?></h5>
                                        <p class="card-text"><strong>description:</strong><?php echo htmlspecialchars($row['description']); ?></p>
                                        <p class="card-text"><strong>price:</strong><?php echo htmlspecialchars($row['price']); ?></p>
                                        <p class="card-text"><strong>created_at:</strong><?php echo htmlspecialchars($row['created_at']); ?></p>
                                        <button class="btn btn-primary " id="add-to-cart"
                                            data-id="<?= htmlspecialchars($row['id']); ?>"
                                            data-name="<?= htmlspecialchars($row['product_name']); ?>"
                                            data-price="<?= htmlspecialchars($row['price']); ?>"
                                            data-image="<?= htmlspecialchars($row['food_imag']); ?>">
                                            เพิ่มสินค้า</button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            <?php endif ?>
        </div>
    </section>
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addToCartButtons = document.querySelectorAll('#add-to-cart');

        addToCartButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                const productName = this.getAttribute('data-name');
                const productPrice = this.getAttribute('data-price');
                const productImage = this.getAttribute('data-image');
                fetch('./controls/addToCart.php', {
                    method: 'POST',
                    body: new URLSearchParams({
                        productId: productId,
                        productName: productName,
                        productPrice: productPrice,
                        productImage: productImage
                    })
                })
                .then(response => response.text())
                .then(data => {
                    Swal.fire({
                        title: 'Success',
                        text: 'Add to cart success',
                        icon: 'success',
                        confirmButtonText: 'Yes',
                    })
                })
            })
        })
    })
</script>