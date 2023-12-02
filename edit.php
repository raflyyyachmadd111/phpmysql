<?php

include("koneksi.php");

if (isset($_GET['id'])) {


    $id = $_GET['id'];


    $sql = "SELECT * FROM user WHERE id=$id";
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
                                            <h3 class="text-center">Edit User</h3>
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
                                            <form method="post" action="process_update.php">
                                                    <div class="mb-3">
                                                            <label for="username" class="form-label">Username:</label>
                                                            <input name="id" type="hidden" value="<?php echo $siswa['id'] ?>">
                                <label for="username" class="form-label">username:</label>
                                                            <input type="text" class="form-control" value="<?php echo $siswa['username'] ?>" name="username" required autofocus>
                                                       
                            </div>
                                                    <div class="mb-3">
                                                            <label for="username" class="form-label">Password:</label>
                                                            <input type="password" class="form-control" name="password">
                                                        </div>
                                                    <div class="mb-3">
                                                            <label for="confirm_password" class="form-label">Confirm Password:</label>
                                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
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