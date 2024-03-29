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
      <li class="breadcrumb-item active">Edit Donor</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Edit Donor
      </div>
      <div class="card-body">
        <form class="" action="donors.php" method="post" enctype="multipart/form-data">
          <input type="hidden" id="user_id" name="user_id" value="<?php echo $user['id'];?>">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                      <div class="col-4">
                        <div class="text-center">
                          <label for="image">Upload Donor Photo</label><br>
                          <input type="file" id="image" name="image" class="dropify" data-height="200"/ value="">
                        </div>
                      </div>
                      <div class="col-8">
                        <div class="form-group">
                          <label for="name">Name:</label>
                          <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name'] ;?>">
                        </div>
                        <div class="form-group">
                          <label for="phone">Contact Number:</label>
                          <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['phone'] ;?>">
                        </div>
                        <div class="form-group">
                          <label for="email">Email ID:</label>
                          <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email'] ;?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4">
                        <div class="form-group">
                          <label for="occupation">Occupation:</label>
                          <input type="text" class="form-control" id="occupation" name="occupation" value="<?php echo $user['occupation'] ;?>">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label for="age">Age:</label>
                          <input type="text" class="form-control" id="age" name="age" value="<?php echo $user['age'] ;?>">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label for="blood_group">Blood Group:</label>
                          <select class="form-control" name="blood_group" id="blood_group">
                            <?php
                              echo "<option value='".$user['blood_group']."'>".$user['blood_group']."</option>";

                              foreach($blood_group as $group){
                                echo "<option value='$group'>$group</option>";
                              }
                             ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="total_donated">How many times donated blood?</label>
                          <input type="text" class="form-control" id="total_donated" name="total_donated" value="<?php echo $user['total_donated'];?>">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="last_donated">Last Donation Date:</label>
                          <input type="date" class="form-control" id="last_donated" name="last_donated" value="<?php echo date('Y-m-d', strtotime($user['last_donated'])); ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label for="address">Address:</label>
                          <textarea class="form-control" id="address" name="address" placeholder="Road no../House no..." rows="5"><?php echo $user['address']; ?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <fieldset class="text-center">
                                <legend>Donor Account</legend>
                                <div class="row">
                                  <div class="col-4">
                                    <div class="form-group">
                                      <label for="username">Donor Username:</label>
                                      <input type="text" class="form-control text-center" id="username" name="username" value="<?php echo $user['username']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-4">
                                    <div class="form-group">
                                      <label for="password">Password:</label>
                                      <input type="password" class="form-control text-center" id="password" name="password">
                                    </div>
                                  </div>
                                  <div class="col-4">
                                    <div class="form-group">
                                      <label for="confirmPassword">Confirm Password:</label>
                                      <input type="password" class="form-control text-center" id="confirmPassword" name="confirmPassword">
                                    </div>
                                  </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                      <div class="offset-4 col-4">
                        <button type="submit" class="btn btn-info btn-block" id="update_user" name="update_user">Update</button>
                      </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->

<?php include 'includs/footer.php'; }?>
