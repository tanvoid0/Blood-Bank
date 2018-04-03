<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Donor</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="" action="donors.php" method="post" enctype="multipart/form-data">
                    <?php echo $message; ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="text-center">
                                        <label for="input-file-now-custom-2">Upload Donor Photo</label>
                                        <input type="file" id="image" name="image" class="dropify" data-height="200" required/>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Contact Number:</label>
                                        <input type="text" class="form-control" id="phone" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email ID:</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="occupation">Occupation:</label>
                                        <input type="text" class="form-control" id="occupation" name="occupation">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="age">Age:</label>
                                        <input type="text" class="form-control" id="age" name="age">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="blood-group">Blood Group:</label>
                                        <select class="form-control" name="blood_group" id="blood_group">
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="donationExperience">How many times donated blood?</label>
                                        <input type="text" class="form-control" id="total_donated" name="total_donated">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="donateDate">Last Donation Date:</label>
                                        <input type="date" class="form-control" id="last_donated" name="last_donated">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group">
                                  <label for="address">Address:</label>
                                  <textarea class="form-control" id="address" name="address" placeholder="Road no../House no..." rows="5"></textarea>
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
                                        <input type="text" class="form-control text-center" id="username" name="username">
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
                                <button type="submit" class="btn btn-info btn-block" id="register_user" name="register_user">Submit</button>
                              </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- End of Create Project Modal -->
