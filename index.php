<?php
  include 'database/server.php';
  $requests = $crud->getData("SELECT * FROM req ORDER BY donate_date");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/blood.png" type="image/x-icon">
    <title>Welocome to BBMS</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Boogaloo" rel="stylesheet"> -->

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Icofont -->
    <link href="css/icofont.css" rel="stylesheet" type="text/css">
    <!-- Custom css -->
    <link rel="stylesheet" href="css/client.css">
    <!-- Dropify -->
    <link rel="stylesheet" href="css/dropify.min.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <a class="navbar-brand" href="index.php">
        <img src="img/logo.png" alt="">
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Donor Registration</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#requestModal">Request for Blood</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php"><i class="icofont icofont-login"></i> Login</a>
        </li>
      </ul>
    </nav>
    <div class="container">
      <?php
        $cnt = Count($requests);
        $today = date("Y-m-d");
        // $date = date("Y-m-d", strtotime("2018-1-13"));

        if($cnt > 0):
      ?>
        <div class="row">
          <div class="col-12">
            <div id="blood-group">
              <div class="">
                <h4 class="text-center gradient-text">RECENT BLOOD REQUEST</h4>
              </div>
              <div class="recent-request">
                <marquee behavior="scroll" direction="left">
                  <?php foreach ($requests as $key => $row) :
                    $date = date('Y-m-d', strtotime($row['donate_date']));
                    if($today <= $date){
                      $date = date('d-m-Y', strtotime($row['donate_date']));
                    ?>
                      <form method="get" style="display:inline;">
                        <span class="blood-request"><a href="request_details.php?id='<?php echo $row['id']; ?>'"><?php echo $date.", ".$row['blood_group']; ?></a></span>
                      </form>
                  <?php } endforeach; ?>
                </marquee>
              </div>
            </div>
          </div>
        </div>
      <?php endif?>
      <div class="row">
        <div class="col-12">
          <div id="all-donor-list">
            <h4 class="text-center gradient-text">ALL OUR REGISTERED DONORS</h4>
          </div>
          <div id="donor-table">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>Photo</th>
                  <th>Blood Group</th>
                  <th>Name</th>
                  <th>Contact Number</th>
                  <th>Area</th>
                  <th>Blood Donated</th>
                  <th>Donor Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $key => $user): ?>
                <tr>
                  <td>
                    <?php echo '<img src="data:image;base64,'.$user['image'].'" class="img-fluid rounded img-thumbnail" alt="No image" width="80"/> ' ?>
                  </td>
                  <td class="align-middle">
                    <i class="icofont icofont-blood-drop"></i>
                    <?php echo $user['blood_group']; ?>
                  </td>
                  <td class="align-middle">
                    <?php echo $user['name']; ?>
                  </td>
                  <td class="align-middle">
                    <?php echo $user['phone']; ?>
                  </td>
                  <td class="align-middle">
                    <?php echo $user['address']; ?>
                  </td>
                  <td class="align-middle">
                    <?php echo $user['total_donated']; ?> Times!
                  </td>
                  <td class="align-middle">
                    <?php
                      $now = strtotime(date('Y-m-d'));
                      $last_donated = strtotime(date( 'Y-m-d', strtotime($user['last_donated'])));
                      $year1 = date('Y', $now);
                      $year2 = date('Y', $last_donated);

                      $month1 = date('m', $now);
                      $month2 = date('m', $last_donated);

                      $diff = (($year1 - $year2) * 12) + ($month1 - $month2);
                      if($diff < 4){
                          $available = "badge badge-danger";
                          $avl = "Not Available";
                          $ico = "fa fa-exclamation-triangle";
                      }
                      else {
                          $available = "badge badge-success";
                          $avl = "Available";
                          $ico = "fa fa-check";
                      }
                    ?>
                    <span class="<?php echo $available;?>">
                      <i class="<?php echo $ico;?>" aria-hidden="true"></i> <?php echo $avl;?>
                    </span>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <?php include 'donor_registration.php'; ?>
    <?php include 'request_blood.php'; ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Dropify -->
    <script src="js/dropify.min.js"></script>
    <script>
        $(document).ready(function(){
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove:  'Supprimer',
                    error:   'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element){
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element){
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element){
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e){
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
  </body>
</html>
