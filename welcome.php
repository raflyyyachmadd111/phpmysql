<?php
// Mulai sesi
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["username"])) {
    header("location: index.php");
}

// Ambil nama pengguna dari sesi
$usere = $_SESSION["username"];

// Include file koneksi database
include("koneksi.php");

// Query SQL untuk mengambil data pengguna
$query_users = "SELECT * FROM user";
$result_users = mysqli_query($koneksi, $query_users);

// Query SQL untuk mengambil data barang
$query_barang = "SELECT * FROM barang";
$result_barang = mysqli_query($koneksi, $query_barang);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Admin Page</h3>
                    </div>
                    <?php
                    if (isset($_SESSION['error'])) {

                    ?>
                    <div class="alert alert-danger" role="alert">
                         <?php echo $_SESSION["error"]; ?>
                         <?php unset($_SESSION["error"]); ?>
                    </div>
                    <?php
                  } else if (isset($_SESSION["success"])) {
                  ?>
                  <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION["success"]; ?>
                    <?php unset ($_SESSION["success"]);?>
                  </div>
                  <?php
                  }
                  ?>
                    <div class="card-body text-center">
                        <p>Selamat datang, <?php echo $usere; ?>!</p>
                        <!-- Tambahkan tab untuk tabel pengguna dan tabel barang -->
                        <ul class="nav nav-tabs" id="myTabs">
                            <li class="nav-item">
                                <a class="nav-link active" id="users-tab" data-bs-toggle="tab" href="#users">Tabel Pengguna</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="barang-tab" data-bs-toggle="tab" href="#barang">Tabel Barang</a>
                            </li>
                        </ul>

                        <!-- Konten tab -->
                        <div class="tab-content mt-3">
                            <!-- Tab Pengguna -->
                            <div class="tab-pane fade show active" id="users">
                                <div class="table-responsive">
                                    <h4>Tabel Pengguna</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result_users)) {
                                                echo "<tr>";
                                                echo "<td>{$row['id']}</td>";
                                                echo "<td>{$row['username']}</td>";
                                                echo "<td>{$row['password']}</td>";
                                                echo "<td>
                                        <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                        <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                      </td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Tab Barang -->
                            <div class="tab-pane fade" id="barang">
                                <div class="table-responsive">
                                    <h4>Tabel Barang</h4>
                                    <table class="table table-bordered">
                                        <!-- Struktur tabel barang -->
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger" onclick="logout()">Logout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function logout() {
            Swal.fire({
                title: 'konfirmasi Logout',
                text: 'Anda yakin ingn keluar?',
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Logout'
            }).then((result) => {

                window.location.href = 'logout.php';
            });
        }
    </script>
</body>

</html>