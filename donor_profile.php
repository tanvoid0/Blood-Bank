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
      <li class="breadcrumb-item active">
        <a href="donors.php">Blood Donors</a>
      </li>
      <li class="breadcrumb-item active">Donor Profile</li>
    </ol>

    <div class="row justify-content-md-center">
      <div class="col-8">
        <!-- Example DataTables Card-->
        <div class="card mb-3 profile-card">
          <div class="row justify-content-md-center">
            <div class="col-3">
              <?php echo '<img src="data:image;base64,'.$profile['image'].'" class="img-thumbnail rounded-circle" alt="No image Found"/> ' ?>
            </div>
          </div>
          <div class="row justify-content-md-center">
            <div class="col-8">
              <table class="table table-bordered table-striped">
                <tbody>
                  <tr>
                    <td>
                      <strong>Name : </strong>
                    </td>
                    <td><?php echo $profile['name'];?></td>
                  </tr>
                  <tr>
                    <td>
                      <strong>Blood Group : </strong>
                    </td>
                    <td><i class="icofont icofont-blood-drop"></i><?php echo $profile['blood_group'] ;?></td>
                  </tr>
                  <tr>
                    <td>
                      <strong>Email ID : </strong>
                    </td>
                    <td><?php echo $profile['email'] ;?></td>
                  </tr>
                  <tr>
                    <td>
                      <strong>Contact Number : </strong>
                    </td>
                    <td><?php echo $profile['phone'];?></td>
                  </tr>
                  <tr>
                    <td>
                      <strong>Age : </strong>
                    </td>
                    <td><?php echo $profile['age'] ;?></td>
                  </tr>
                  <tr>
                    <td>
                      <strong>Address : </strong>
                    </td>
                    <td><?php echo $profile['address'] ;?></td>
                  </tr>
                  <tr>
                    <td>
                      <strong>Occupation : </strong>
                    </td>
                    <td><?php echo $profile['occupation'];;?></td>
                  </tr>
                  <tr>
                    <td>
                      <strong>Donation Experience : </strong>
                    </td>
                    <td><?php echo $profile['total_donated'] ;?> Times</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->

<?php include 'includs/footer.php'; }?>
