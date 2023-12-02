<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                        <?php
                        session_start();
                        if (isset($_SESSION["error"])) {
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
                                <?php unset($_SESSION["success"]); ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="card-body">
                        <!-- Form login -->
                        <form method="post" action="process_login.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        <p class="mt-3">Belum punya akun? <a href="register.php">Register</a></p>
                        <!-- End Form login -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
