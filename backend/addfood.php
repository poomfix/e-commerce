<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มรายการอาหาร</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body style="background: linear-gradient(to right, #290054, #00b2ff);">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; max-width: 900px;">
        <div class="card shadow-lg border-0 rounded-4 w-100" style="background: rgba(255,255,255,0.95);">
            <div class="row g-0">
                <!-- ฟอร์มด้านซ้าย -->
                        <div class="col-md-6 py-5 px-4 d-flex flex-column justify-content-center">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <i class="bi bi-egg-fried" style="font-size: 3rem; color: #00b2ff;"></i>
                            <h2 class="fw-bold mt-2" style="color: #290054;">เพิ่มเมนูอาหาร</h2>
                            <p class="text-muted">กรอกข้อมูลเมนูอาหารที่ต้องการเพิ่ม</p>
                        </div>
                        <form method="POST" action="controls/addfoodcontrols.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name_food" class="form-label fw-semibold">ชื่อเมนู <span style="color:red">*</span></label>
                                <input type="text" name="name_food" class="form-control rounded-pill border-primary shadow-sm" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label fw-semibold">รายละเอียด</label>
                                <textarea name="description" class="form-control rounded-3 border-info shadow-sm" rows="2"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label fw-semibold">ราคา <span style="color:red">*</span></label>
                                <input type="number" name="price" class="form-control rounded-pill border-success shadow-sm" min="0" required>
                            </div>
                            <div class="mb-4">
                                <label for="food_imag" class="form-label fw-semibold">รูปภาพ <span style="color:red">*</span></label>
                                <input type="file" name="food_imag" class="form-control border-warning shadow-sm" accept="image/*" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary px-4 rounded-pill fw-bold">
                                    <i class="bi bi-plus-circle me-2"></i>เพิ่มเมนู
                                </button>
                                <a href="food.php" class="btn btn-outline-secondary px-4 rounded-pill fw-bold">
                                    <i class="bi bi-arrow-left-circle me-2"></i>ย้อนกลับ
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- ฟอร์มด้านขวา -->
                <div class="col-md-6 d-none d-md-block">
                    <div class="h-100 d-flex align-items-center justify-content-center">
                        <img src="../assets/imgs/wallhaven-5ge715.jpg" alt="Food Banner" class="img-fluid rounded-4 shadow" style="object-fit: cover; width: 95%; height: 95%; border: 4px solid #00b2ff;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!-- <div class="container">
    <h2>SignUp Page</h2>
    <form method="POST" action="controls/createUsers.php">
        <div class="mb-3">
            <label for="firstname" class="">Firstname</label>
            <input type="text" name="first_name">
        </div>

        <div>
            <label for="">Lastname</label>
            <input type="text" name="last_name">
        </div>

        <div>
            <label for="">Address</label>
            <textarea name="address" id=""></textarea>
        </div>

        <div>
            <label for="">Phone</label>
            <input type="text" name="phone">
        </div>

        <div>
            <label for="">E-Mail</label>
            <input type="email" name="email">
        </div>

        <div>
            <label for="">Password</label>
            <input type="text" name="password">
        </div>

        <button type="submit">SignUp NOW!!</button>
    </form>
</div> -->