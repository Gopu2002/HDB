<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $mobno = $_POST['mobilenumber'];
    $email = $_POST['email'];

    $query = mysqli_query($con, "select ID from tbladmin where Email='$email' and MobileNumber='$mobno'");
    $ret = mysqli_fetch_array($query);

    if ($ret > 0) {
        $_SESSION['mobilenumber'] = $mobno;
        $_SESSION['email'] = $email;

        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Verification Successful!',
                    text: 'You will be redirected to reset your password.',
                    icon: 'success',
                    confirmButtonText: 'Proceed'
                }).then(() => {
                    window.location.href = 'reset-password.php';
                });
            });
        </script>";
    } else {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Verification Failed!',
                    text: 'Invalid details. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'Retry'
                });
            });
        </script>";
    }
}
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>

  <title>Hello Dreamy Birds | Forgot Password
  </title>
  <link rel="icon" type="logo/png" href="logo/logo (24).ico">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
    rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
    rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="../app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/icheck/custom.css">

  <link rel="stylesheet" type="text/css" href="../app-assets/css/app.css">

  <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/login-register.css">

  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.25/dist/sweetalert2.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.25/dist/sweetalert2.all.min.js"></script>

</head>

<body class="vertical-layout vertical-menu 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar"
  data-open="click" data-menu="vertical-menu" data-col="1-column">

  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="../index.php">

              <img src="logo/logo (29).ico" href="../index.php" class="navbar-brand-img h-100" alt="main_logo" height="50" width="50">
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container">
        <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
          <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="../index.php"><i class="ficon ft-arrow-left"></i></a></li>

          </ul>
        </div>
      </div>
    </div>
  </nav>

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                    <h4 style="font-weight: bold"> Hello Dreamy Birds</h4>
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Recover your password</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">

                    <form class="form-horizontal" action="" method="post">
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                          <fieldset class="form-group position-relative has-icon-left">
                            <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address"
                              tabindex="4" required="true" required data-validation-required-message="Please enter email address.">
                            <div class="form-control-position">
                              <i class="ft-mail"></i>
                            </div>
                            <div class="help-block font-small-3"></div>
                          </fieldset>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                          <fieldset class="form-group position-relative has-icon-left">
                            <input type="text" name="mobilenumber" id="mobilenumber" class="form-control input-lg"
                              placeholder="Contact Number" required="true" maxlength="10" tabindex="3" required data-validation-required-message="Please enter display name.">
                            <div class="form-control-position">
                              <i class="ft-user"></i>
                            </div>
                            <div class="help-block font-small-3"></div>
                          </fieldset>
                        </div>

                      </div>




                      <div class="row">
                        <div class="col-6 col-sm-6 col-md-6">
                          <button type="submit" name="submit" class="btn btn-info btn-lg btn-block"><i class="ft-user"></i>Reset</button>

                        </div>
                        <div class="col-6 col-sm-6 col-md-6">
                          <a href="login.php" class="btn btn-danger btn-lg btn-block"><i class="ft-unlock"></i> Login</a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <footer class="footer fixed-bottom footer-dark navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; <?php echo date('Y'); ?> <a class="text-bold-800 grey darken-2">Hello Dreamy Birds </a>, All rights reserved. </span>

    </p>
  </footer>

  <script src="../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>


  <script src="../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"
    type="text/javascript"></script>
  <script src="../app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>


  <script src="../app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="../app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="../app-assets/js/scripts/customizer.js" type="text/javascript"></script>


  <script src="../app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>

</body>

</html>