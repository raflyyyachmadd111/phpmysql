<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    
    <title>Login web</title>
  </head>
  <body>

    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                    <h1 class="card-title text-center">L O G I N</h1>
                    <?php
                    session_start(); 
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
            </div>
            <div class="card-text">
                <form method="post" action="process_login.php">
                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" class="form-control" name="username" aria-describedby="emailHelp">
                      <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                  <p class="mt-3">Belum punya akun? <a href="register.php">Register</a></p>
            </div>
        </div>
    </div>
    

   
  </body>
</html>