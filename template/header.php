<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['email'])) {
  header('Location:index.php');
} else {
  $username = $_SESSION['email'];
  $type = $_SESSION['type'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" type="image/png" href="images/Bangladesh_Air_Force_emblem.svg.png" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MAINT CONTROL BAF MTR</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="styles/font-awesome.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  <style>
    body {
      color: #414658;
      font-family: 'Ubuntu', sans-serif;
      background-color: transparent;
    }

    body::after {
      content: "";
      background-image: url("images/bg.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
      background-size: 500px;
      opacity: 0.5;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      position: fixed;
      z-index: -1;
    }

    div.container-fluid {
      background-color: transparent !important;
    }

    nav {
      font-weight: 400;
    }

    .rounded-table {
      border-radius: 25px !important;
      overflow: hidden;
    }
  </style>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #011617">
    <a class="font-weight-bold navbar-brand" href="dashboard.php">
      <img src="images/Bangladesh_Air_Force_emblem.svg.png" height="50px" href="dashboard.php" />
      MAINT CONTROL BAF MTR
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <a class="font-weight-bold nav-item nav-link" style="color: white;" href="dashboard.php">HOME</a>
        <a class="font-weight-bold nav-item nav-link" style="color: white;" href="aircraft-types.php">AIRCRAFT TYPES</a>
        <?php if ($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'supervisor' ) : ?>
          <a class="font-weight-bold nav-item nav-link" style="color: white;" href="teammember.php">USERS</a>
        <?php endif; ?>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: white;" href="#" id="navbarDropdownTransactionLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Transactions
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownTransactionLink">
            <a class="dropdown-item" href="dailytransaction.php">Daily transaction</a>
            <a class="dropdown-item" href="transactionreport.php">Transaction report</a>
          </div>
        </li> -->

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: white;" href="#" id="navbarDropdownAccLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="images\Bangladesh_Air_Force_emblem.svg.png" height="20px" style="border-radius: 25px" class="header-avatar img-circle" alt="user" title="user" />
            <span><?php echo $username; ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownAccLink">
            <a class="font-weight-bold dropdown-item" href="changepassword.php">Settings</a>
            <a class="font-weight-bold dropdown-item" href="logout.php">Logout</a>
          </div>
        </li>
      </div>
    </div>
  </nav>