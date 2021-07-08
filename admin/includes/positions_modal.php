<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Position</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="positions_add.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="ExecutiveUsername" class="col-sm-3 control-label">Username</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="ExecutiveUsername" maxlength="10" pattern="^EX-.[0-9]+" oninvalid="this.setCustomValidity('Must begin with (EX-) followed by numbers.')" oninput="this.setCustomValidity('')" name="Username" value="EX-" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ExecutivePassword" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="Password" class="form-control" id="ExecutivePassword" name="Password" oninvalid="this.setCustomValidity('Password length must be between 7-15 characters.')" oninput="this.setCustomValidity('')" minlength="7" maxlength="15" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ExecutiveName" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')" id="ExecutiveName" name="Name" maxlength="30" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ExecutiveContact_No" class="col-sm-3 control-label">Contact_No</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="ExecutiveContact_No" oninvalid="this.setCustomValidity('Please enter valid mobile number of 10 digits')" oninput="this.setCustomValidity('')" name="Contact_No" pattern="[1-9]{1}[0-9]{9}" maxlength="10" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ExecutiveAddress" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="ExecutiveAddress" name="Address" maxlength="50" pattern="[a-zA-Z0-9 ,.-]+" oninvalid="this.setCustomValidity('Only alphanumeric characters with (-)&(,)&(.) is allowed.')" oninput="this.setCustomValidity('')" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ExecutivePart_No" class="col-sm-3 control-label">Part_No</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="ExecutivePart_No" name="Part_No" required>
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
                    <label for="ExecutivePhoto" class="col-sm-3 control-label">Image</label>

                    <div class="col-sm-9">
                      <input type="file" name="photo" id="ExecutivePhoto" accept=".jpg"  required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
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
              <h4 class="modal-title"><b>Edit Position</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="positions_edit.php" enctype="multipart/form-data">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_Username" class="col-sm-3 control-label">Username</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_Username" name="edit_Username" readonly="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_Password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="edit_Password" name="edit_Password" oninvalid="this.setCustomValidity('Password length must be between 7-15 characters.')" oninput="this.setCustomValidity('')" minlength="7" maxlength="15" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_Name" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_Name" name="edit_Name" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')" maxlength="30" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_Contact_No" class="col-sm-3 control-label">Contact_No</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_Contact_No" name="edit_Contact_No" oninvalid="this.setCustomValidity('Please enter valid mobile number of 10 digits')" oninput="this.setCustomValidity('')" maxlength="10" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_Address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_Address" name="edit_Address" maxlength="50" pattern="[a-zA-Z0-9 ,.-]+" oninvalid="this.setCustomValidity('Only alphanumeric characters with (-)&(,)&(.) is allowed.')" oninput="this.setCustomValidity('')" required>
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
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
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
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="positions_delete.php">
                
                <div class="text-center">
                    <p>DELETE Executive</p>
                    
                    <h2 class="bold description"><input type="text" style="text-align: center; border-style: none;" readonly="true" class="id" name="id"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>



     