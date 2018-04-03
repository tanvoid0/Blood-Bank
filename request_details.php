<?php include 'database/server.php';
if($_GET['id']){
  $id = $_GET['id'];
  // echo $id;
  $request = $crud->search('req', 'id', $id);
}
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
      <div class="row justify-content-md-center">
        <div class="col-6">
          <div id="requestDetails">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td><strong>Requester Name</strong></td>
                  <td><?php echo $request['name'] ;?></td>
                </tr>
                <tr>
                  <td><strong>Patient Name</strong></td>
                  <td><?php echo $request['p_name'] ;?></td>
                </tr>
                <tr>
                  <td><strong>Hospital</strong></td>
                  <td><?php echo $request['hospital_name'] ?></td>
                </tr>
                <tr>
                  <td><strong>Address</strong></td>
                  <td><?php echo $request['address'] ;?></td>
                </tr>
                <tr>
                  <td><strong>Blood Group</strong></td>
                  <td><?php echo $request['blood_group'] ;?></td>
                </tr>
                <tr>
                  <td><strong>Donating Date</strong></td>
                  <td><?php $date = date('d-m-Y',strtotime($request['donate_date'])) ; echo $date;?></td>
                </tr>
                <tr>
                  <td><strong>How many bags</strong></td>
                  <td><?php echo $request['bag_count'] ;?></td>
                </tr>
                <tr>
                  <td><strong>Contact Number</strong></td>
                  <td><?php echo $request['contact'] ;?></td>
                </tr>
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
