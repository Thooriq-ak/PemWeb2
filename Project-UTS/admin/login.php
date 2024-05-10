<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="fonts/icomoon/style.css" />

  <link rel="stylesheet" href="css/owl.carousel.min.css" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css" />

  <title>Login | Puskesmas</title>
</head>

<body>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid" />
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4 text-center">
                <h3>Sign In</h3>
              </div>
              <form action="proses.php" method="POST">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="hidden" name="submit" value="login">
                  <input type="text" class="form-control" name="username" id="username" required />
                </div>
                <div class="form-group last mb-4">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" required />
                </div>

                <div class="d-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-0">
                    <span class="caption">Remember me</span>
                    <input type="checkbox" name="remember_me" />
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="register.php" class="forgot-pass">Register Here!</a></span>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-block btn-primary mb-6">Log In</button>
                  </div>
                  <div class="col-md-6">
                    <a href="index.html" class="mb-6">
                      <button type="button" class="btn btn-block btn-primary ">Back</button></a>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>