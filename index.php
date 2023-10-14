<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="images/Bangladesh_Air_Force_emblem.svg.png"/>
  <title>MAINT CONTROL BAF MTR</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="styles/webfont.css">
  <link rel="stylesheet" href="styles/climacons-font.css">
  <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="styles/font-awesome.css">
  <link rel="stylesheet" href="styles/card.css">
  <link rel="stylesheet" href="styles/sli.css">
  <link rel="stylesheet" href="styles/animate.css">
  <link rel="stylesheet" href="styles/app.css">
  <link rel="stylesheet" href="styles/app.skins.css">
  <!-- endbuild -->
</head>

<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane"></div>
    </div>
  </div>
  <!-- /page loading spinner -->
  <div class="app signin usersession">
    <div class="session-wrapper">
      <div class="page-height-o row-equal align-middle">
        <div class="column">
          <div class="card bg-white no-border">
            <div class="card-block">
              <div id="loginMessage"></div>
              <form role="form" id="loginForm" class="form-layout" action="" method="POST">
                <div class="text-center m-b">
                  <img width="80px" height="80px" src="images/Bangladesh_Air_Force_emblem.svg.png" alt="">
                  <h2>MAINT CONTROL BAF MTR</h2>
                </div>
                <div class="form-inputs">
                  <label class="text-uppercase">Email</label>
                  <input type="email" class="form-control input-lg" placeholder="Username" name="username" id="username" required>
                  <label class="text-uppercase">Password</label>
                  <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" required>
                </div>
                <input type="hidden" name="login" pass="login" value="login">
                <button style="background-color: #0A6BB0;border:none;outline:none" class="btn btn-primary btn-block btn-lg m-b" type="submit" name="submit" id="submit">Login</button>
                <a style="font-size:15px" href="#forget_password" data-toggle="modal" class="forgot_pass">Forgot your password?</a>
                <a style="font-size:15px" href="signup.php" class="forgot_pass ml-5">Signup here</a>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- bottom footer -->
    <!-- Forget Pass -->
    <div class="modal fade" id="forget_password">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Password Reset Request</h4>
          </div>
          <div class="modal-body">
            <div class="forget_pass">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div id="forgetPassMessage"></div>
                  <form id="forgetPassForm" action="" method="POST">
                    <div id="forgetMessage"></div>
                    <div class="form-group">
                      <label for="">Enter You Email *</label>
                      <input type="text" class="form-control" id="forget_pass" name="forget_pass" placeholder="Enter You Email" required>
                      <input hidden type="text" id="forgetPass" value="forgetPass" name="forgetPass">
                    </div>
                    <button type="submit" name="forgetPass" id="forgetPass" class="btn btn-info">Submit</button>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Forget Pass -->

    <!-- /bottom footer -->
  </div>
  <!-- build:js({.tmp,app}) scripts/app.min.js -->
  <script src="scripts/helpers/modernizr.js"></script>
  <script src="vendor/jquery/dist/jquery.js"></script>
  <script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
  <script src="vendor/fastclick/lib/fastclick.js"></script>
  <script src="vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src="scripts/helpers/smartresize.js"></script>
  <script src="scripts/constants.js"></script>
  <script src="scripts/main.js"></script>
  <script type="text/javascript" src="ajax.js"></script>
  <!-- endbuild -->
</body>

</html>