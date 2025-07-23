<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- <div class="container">
        <h2 class="text-center mb-4">SignIn Page</h2>
        <form method="POST" action="./controls/signinUsers.php">
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="pass" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">SignIn</button>
        </form>
    </div> -->
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow" style="width: 100%; max-width: 900px;">
            <div class="row g-0">
                <!-- ฟอร์มด้านซ้าย -->
                <div class="col-md-6">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">SignIn</h2>
                        <form method="POST" action="./controls/signinUsers.php">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">Password</label>
                                <input type="password" name="pass" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">SignIn</button>
                        </form>
                        <!-- SignUp Link -->
                        <div class="text-center mt-3">
                            <span>Don't have an account?</span>
                            <a href="signup.php">SignUp</a>
                        </div>
                    </div>
                </div>

                <!-- ภาพด้านขวา -->
                <div class="col-md-6">
                    <img src="assets/imgs/ocean.jpg" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;" alt="Image">
                </div>
            </div>
        </div>
    </div>
    <script>
        <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid') : ?>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid email or password',
                footer: 'Please try again.'
            });
        <?php endif; ?>
    </script>
</body>

</html>