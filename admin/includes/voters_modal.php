<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Voter</b></h4>
            </div>
            <form class="form-horizontal" method="POST" action="voters_add.php" enctype="multipart/form-data">
            <div class="modal-body">
              
                <div class="form-group">
                    <label for="VoterID" class="col-sm-3 control-label">VoterID</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="VoterID" name="VoterID" maxlength="10" value="YHX-" pattern="^YHX-.[0-9]+" oninvalid="this.setCustomValidity('Must begin with (YHX-) followed by numbers.')" oninput="this.setCustomValidity('')" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="VoterName" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="VoterName" name="Name" maxlength="30" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Voterpassword" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="Voterpassword" name="password" minlength="7" maxlength="15" oninvalid="this.setCustomValidity('Password length must be between 7-15 characters.')" oninput="this.setCustomValidity('')" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="VoterFather_Name" class="col-sm-3 control-label">Father's Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="VoterFather_Name" name="Father_Name" maxlength="30" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="VoterSex" class="col-sm-3 control-label">Sex</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="VoterSex" name="Sex" required>
                          <option value="" selected>- Select -</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Others">Others</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="VoterDOB" class="col-sm-3 control-label">DOB</label>

                    <div class="col-sm-9">
                      <input type="date" class="date-picker form-control" id="VoterDOB" name="DOB" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="VoterAddress" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="VoterAddress" name="Address" maxlength="50" pattern="[a-zA-Z0-9 ,.-]+" oninvalid="this.setCustomValidity('Only alphanumeric characters with (-)&(,)&(.) is allowed.')" oninput="this.setCustomValidity('')" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="VoterPart_No" class="col-sm-3 control-label">Part_No</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="VoterPart_No" name="Part_No" required>
                        <option value="" selected>- Select -</option>
                        <?php
                          $sql = "SELECT * FROM `part` ";
                          $query = $con->query($sql);
                          while($row = $query->fetch_assoc()){
                            echo "
                              <option value='".$row['Part_No']."'>".$row['Name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="VoterCity" class="col-sm-3 control-label">City</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="VoterCity" name="City" maxlength="30" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="VoterPhoto" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="VoterPhoto" name="photo" type=".jpg">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Voter</b></h4>
            </div>
            <form class="form-horizontal" method="POST" action="voters_edit.php">
            <div class="modal-body">
              
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_VoterID" class="col-sm-3 control-label">VoterID</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_VoterID" name="edit_VoterID" readonly="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_Name" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_Name" name="edit_Name" maxlength="30" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="edit_password" name="edit_password" minlength="7" maxlength="15" oninvalid="this.setCustomValidity('Password length must be between 7-15 characters.')" oninput="this.setCustomValidity('')" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_Father_Name" class="col-sm-3 control-label">Father's Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_Father_Name" name="edit_Father_Name" maxlength="30" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_Sex" class="col-sm-3 control-label">Sex</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="edit_Sex" name="edit_Sex" required>
                          <option value="" selected>- Select -</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Others">Others</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_DOB" class="col-sm-3 control-label">DOB</label>

                    <div class="col-sm-9">
                      <input type="date" class="date-picker form-control" id="edit_DOB" name="edit_DOB" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_Address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_Address" name="edit_Address" maxlength="50" pattern="[a-zA-Z0-9 ,.-]+" oninvalid="this.setCustomValidity('Only alphanumeric characters with (-)&(,)&(.) is allowed.')" oninput="this.setCustomValidity('')" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_Part_No" class="col-sm-3 control-label">Part_No</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="edit_Part_No" name="edit_Part_No" required>
                        <option value="" selected>- Select -</option>
                        <?php
                          $sql = "SELECT * FROM `part` ";
                          $query = $con->query($sql);
                          while($row = $query->fetch_assoc()){
                            echo "
                              <option value='".$row['Part_No']."'>".$row['Name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_City" class="col-sm-3 control-label">City</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_City" name="edit_City" maxlength="30" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <form class="form-horizontal" method="POST" action="voters_delete.php">
            <div class="modal-body">
              
                
                <div class="text-center">
                    <p>DELETE VOTER</p>
                    <h2 class="bold fullname"><input type="text" style="text-align: center; border-style: none;" class="id" readonly="true" name="id"></h2>
                    
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Photo -->



     