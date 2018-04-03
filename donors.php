<?php
    include 'database/server.php';
    if(empty($_SESSION["user_id"])) {
      include 'login.php';
  } else {

    include 'includs/header.php';
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Blood Donors</li>
    </ol>
    <?php //echo "id: $id";
      // echo "session ID: ".$_SESSION['user_id']."<br>";
      // echo "Rank: ".$rank['rank'];
      // echo "session rank: ".$_SESSION['rank']."<br>";

     ?>

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> All Blood Donors
        <?php if($_SESSION['rank'] == 1): ?>
          <a href="#" class="btn btn-info float-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Register New Donor</a>
        <?php endif;?>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Blood Group</th>
                <th>Address</th>
                <th>Occupation</th>
                <th>Blood Donated</th>
                <th>Donation Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $key => $user): ?>
              <tr>
                <td>
                  <?php echo '<img src="data:image;base64,'.$user['image'].'" class="img-fluid rounded-circle img-thumbnail" width="80" alt="No image"/> ' ?>
                </td>
                <td class="align-middle">
                  <?php echo $user['name'];
                  // echo $user['id']."<br>";
                   ?>
                </td>
                <td class="align-middle">
                  <?php echo $user['blood_group']; ?>
                </td>
                <td class="align-middle">
                  <?php echo $user['address']; ?>
                </td>
                <td class="align-middle">
                  <?php echo $user['occupation']; ?>
                </td>
                <td class="align-middle">
                  <?php echo $user['total_donated']; ?> Times
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
                  <span class="<?php echo $available ;?>"><i class="<?php echo $ico; ?>" aria-hidden="true"></i><?php echo $avl;?></span>
                </td>
                <td class="align-middle">
                  <div class="btn-group">
                    <form class="" action="donor_profile.php" method="post">
                      <input type="hidden" id="user_id" name="user_id" value="<?php echo $user['id'];?>">
                      <button id="view_profile" name="view_profile" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="View Full Profile"><i class="fa fa-eye" aria-hidden="true"></i></button>
                    </form>
                    <?php// if($_SESSION['rank'] == 1): ?>
                      <?php if(($_SESSION['user_id'] == $user['id']) or ($_SESSION['rank'] == 1)): ?>

                    <form class="" action="edit-donor.php" method="post">
                      <input type="hidden" id="user_id" name="user_id" value="<?php echo $user['id'];?>">
                      <button name="edit_user" id="edit_user" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit Profile"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                    </form>
                    <form method="post" action="donors.php">
                      <input type="hidden" id="user_id" name="user_id" value="<?php echo $user['id'];?>">
                      <button name="delete_user" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Profile"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </form>
                  <?php endif;?>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php include 'add_donor.php';?>
  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->

<?php include 'includs/footer.php'; }?>
