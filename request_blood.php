<!-- The Modal -->
<div class="modal fade" id="requestModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Request for Donor</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="" action="index.php" method="post" enctype="multipart/form-data">
                    <?php echo $message; ?>
                    <div class="row justify-content-md-center">
                      <div class="col-8">
                        <div class="form-group row">
                          <label for="requesterName" class="col-3">Your Name : </label>
                          <div class="col-9">
                            <input type="text" class="form-control" id="requesterName" name="requesterName">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="patientName" class="col-3">Patient Name : </label>
                          <div class="col-9">
                            <input type="text" class="form-control" id="patientName" name="patientName">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="hospitalName" class="col-3">Hospital Name : </label>
                          <div class="col-9">
                            <input type="text" class="form-control" id="hospitalName" name="hospitalName">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="donationAddress" class="col-3">Where to Donate : </label>
                          <div class="col-9">
                            <textarea class="form-control" id="donationAddress" name="donationAddress" rows="4" placeholder="Full address where to donate blood ?"></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="bloodGroup" class="col-3">Which Blood Group : </label>
                          <div class="col-9">
                            <select class="form-control" name="bloodGroup" id="bloodGroup">
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
                        <div class="form-group row">
                          <label for="bloodQuantity" class="col-3">How Many Bags Blood are Needed : </label>
                          <div class="col-9">
                            <input type="text" class="form-control" id="bloodQuantity" name="bloodQuantity">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="contactNumber" class="col-3">Contact Number : </label>
                          <div class="col-9">
                            <input type="text" class="form-control" id="contactNumber" name="contactNumber">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="donatingDate" class="col-3">When You Need Blood : </label>
                          <div class="col-9">
                            <input type="date" class="form-control" id="donatingDate" name="donatingDate">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-8 col-4">
                            <button type="submit" class="btn btn-info btn-block" id="request_blood" name="request_blood">Submit Request</button>
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
