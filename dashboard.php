  <?php
  include 'database/server.php';

  if(empty($_SESSION["user_id"])) {
      include 'login.php';
  } else {
  include 'includs/header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">

      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><?php
        echo "Hello ".$_SESSION['name']."<br>";?></strong> Welcome to Dashboard
      </div>

      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-users" aria-hidden="true"></i>
              </div>
              <div class="mr-5">
                    <?php foreach($total_donor as $key => $donor){
                        echo $donor['donor']."  Donors!";
                    } ?>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="donors.php">
              <span class="float-left">View All</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

  <?php include 'includs/footer.php'; }?>
