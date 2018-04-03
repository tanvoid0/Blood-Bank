<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/blood.png" type="image/x-icon">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Icofont -->
  <link href="css/icofont.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body style="padding-top: 70px;">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <a class="navbar-brand" href="index.php">
      <img src="img/logo.png" alt="">
    </a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="icofont icofont-people"></i> Donor List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php"><i class="icofont icofont-login"></i> Login</a>
      </li>
    </ul>
  </nav>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <?php
          if($message != ""){ ?>
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php
              echo "<strong>".$message."</strong>";
            ?>
          </div>
        <?php } ?>
        <form method="post" action="dashboard.php">
          <div class="form-group">
            <label for="email">Email address</label>
            <input class="form-control" type="text" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email id / Username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" id="password" name="password" placeholder="Password">
          </div>
          <input type="submit" id="login" name="login" class="btn btn-info btn-block" value="Login"/>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
