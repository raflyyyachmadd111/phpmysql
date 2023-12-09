<?php

include("koneksi.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM barang WHERE id=$id";
    $query = mysqli_query($koneksi, $sql);
    $siswa = mysqli_fetch_assoc($query);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
       
    <meta charset="UTF-8">
       
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit User</title>
       
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
            <div class="row justify-content-center">
                    <div class="col-md-6">
                            <div class="card">
                                    <div class="card-header">
                                            <h3 class="text-center">Edit Barang</h3>
                        <?php
                        session_start();
                        if (isset($_SESSION['error'])) {

                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_SESSION["error"]; ?>
                                <?php unset($_SESSION["error"]); ?>
                            </div>
                        <?php
                        }
                        ?>

                                       
                    </div>
                                    <div class="card-body">
                                            <form method="post" action="process_updatebarang.php">
                            <input name="id" type="hidden" value="<?php echo $siswa['id'] ?>">
                                                    <div class="mb-3">
                                <label for="username" class="form-label">Nama Barang:</label>
                                 <input type="text" class="form-control" value="<?php echo $siswa['nama_barang'] ?>" name="nama_barang" required autofocus>
                            </div>
                                                    <div class="mb-3">
                                <label for="username" class="form-label">Harga Barang:</label>
                                 <input type="text" class="form-control" value="<?php echo $siswa['harga_barang'] ?>" name="harga_barang" required autofocus>
                            </div>
                                                    <div class="mb-3">
                                <label for="username" class="form-label">Jumlah Barang:</label>
                                 <input type="text" class="form-control" value="<?php echo $siswa['jumlah_barang'] ?>" name="jumlah_barang" required autofocus>
                            </div>
                                                   
                            <div class="d-flex justify-content-between">
                                <a href="welcome.php" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                                               
                        </form>
                                        </div>
                                </div>
                        </div>
                </div>
    </div>

</body>

</html>