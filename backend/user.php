<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("location : /itweb/index.php");
    exit;
}
?>

<?php
include '../controls/fetchUser.php';
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
            <h2>Manage Users</h2>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>images</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Tel Number</th>
                        <th>Create Date</th>
                        <th>Role</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td class="text-center"><?= htmlspecialchars($row['id']); ?></td>
                            <td><img src="../assets/imgs/<?= htmlspecialchars($row['profile_image']); ?>" alt="" style="width: 100px;"></td>
                            <td class="text-center"><?= htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']); ?></td>
                            <td><?= htmlspecialchars($row['email']); ?></td>
                            <td class="text-center"><?= htmlspecialchars($row['phone']); ?></td>
                            <td class="text-center"><?= htmlspecialchars($row['creat_at']); ?></td>
                            <td class="text-center"><?= htmlspecialchars($row['role']); ?></td>
                            <td class="text-center">
                                <a href="edituser.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $row['id'] ?>)">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                                <script>
                                    function confirmDelete(id) {
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "You won't be able to revert this!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonText: 'Yes, delete it!',
                                            cancelButtonText: 'No, cancel!',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = `controls/deleteUser.php?id=` + id;
                                            }
                                        });
                                    }
                                </script>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
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
</body>

</html>