<!-- Description -->
<div class="modal fade" id="platform">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
                <p id="desc"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Candidate</b></h4>
            </div>
            <form class="form-horizontal" method="POST" action="candidates_add.php" enctype="multipart/form-data">
            <div class="modal-body">
              
                <div class="form-group">
                    <label for="CandidateID" class="col-sm-3 control-label">ID</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="CandidateID" name="ID" maxlength="10" pattern="^CAN-.[0-9]+" oninvalid="this.setCustomValidity('Must begin with (CAN-) followed by numbers.')" oninput="this.setCustomValidity('')" name="Username" value="CAN-" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="CandidateName" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="CandidateName" name="Name" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')" id="ExecutiveName" name="Name" maxlength="30" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="CandidateImage" class="col-sm-3 control-label">Image</label>

                    <div class="col-sm-9">
                      <input type="file" class="form-control" id="CandidateImage" name="photo" accept=".jpg">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Party_ID" class="col-sm-3 control-label">Party</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="Party_ID" name="Party_ID" required>
                        <option value="" selected>- Select -</option>
                        <?php
                          $sql = "SELECT * FROM party";
                          $query = $con->query($sql);
                          while($row = $query->fetch_assoc()){
                            echo "
                              <option value='".$row['Party_ID']."'>".$row['Name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="Part_No" class="col-sm-3 control-label">Part No</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="Part_No" name="Part_No" required>
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
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="candidates_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_ID" class="col-sm-3 control-label">ID</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_ID" name="edit_ID" readonly="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_Name" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_Name" name="edit_Name" pattern="[a-zA-Z ]+" oninvalid="this.setCustomValidity('Only alphabets are allowed.')" oninput="this.setCustomValidity('')" maxlength="30" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_Party_ID" class="col-sm-3 control-label">Party</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="edit_Party_ID" name="edit_Party_ID" required>
                        <option value="" selected>- Select -</option>
                        <?php
                          $sql = "SELECT * FROM party";
                          $query = $con->query($sql);
                          while($row = $query->fetch_assoc()){
                            echo "
                              <option value='".$row['Party_ID']."'>".$row['Name']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="edit_Part_No" class="col-sm-3 control-label">Part No</label>

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
              <form class="form-horizontal" method="POST" action="candidates_delete.php">
                
                <div class="text-center">
                    <p>DELETE CANDIDATE</p>
                    <h2 class="bold fullname"><input type="text" style="text-align: center; border-style: none;" readonly="true" class="id" name="id"></h2>
                    
                    
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

<!-- Update Photo -->



     