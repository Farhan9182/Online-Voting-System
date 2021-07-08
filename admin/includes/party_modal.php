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
              <h4 class="modal-title"><b>Add New Party</b></h4>
            </div>
            <form class="form-horizontal" method="POST" action="party_add.php" enctype="multipart/form-data">
            <div class="modal-body">
              
                <div class="form-group">
                    <label for="PartyID" class="col-sm-3 control-label">Party ID</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="PartyID" name="ID" pattern="^P-.[0-9]+" oninvalid="this.setCustomValidity('Must begin with (P-) followed by numbers.')" oninput="this.setCustomValidity('')" value="P-" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="PartyName" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="PartyName" name="Name" pattern="[a-zA-Z -]+" oninvalid="this.setCustomValidity('Only alphabets are allowed with (-) .')" oninput="this.setCustomValidity('')" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="PartySymbol" class="col-sm-3 control-label">Symbol</label>

                    <div class="col-sm-9">
                      <input type="file" class="form-control" id="PartySymbol" name="photo" accept=".jpg" required="">
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
              <h4 class="modal-title"><b>Edit Party</b></h4>
            </div>
            <form class="form-horizontal" method="POST" action="party_edit.php" enctype="multipart/form-data">
            <div class="modal-body">
              
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_PartyID" class="col-sm-3 control-label">Party ID</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_PartyID" name="edit_ID" readonly="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_PartyName" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_PartyName" name="edit_Name" pattern="[a-zA-Z -]+" oninvalid="this.setCustomValidity('Only alphabets are allowed with (-) .')" oninput="this.setCustomValidity('')" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_PartySymbol" class="col-sm-3 control-label">Symbol</label>

                    <div class="col-sm-9">
                      <input type="file" class="form-control" id="edit_PartySymbol" name="edit_photo" accept=".jpg" required>
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
            <form class="form-horizontal" method="POST" action="party_delete.php">
            <div class="modal-body">
              
                
                <div class="text-center">
                    <p>DELETE PARTY</p>
                    <h2 class="bold fullname"><input type="text" style="text-align: center; border-style: none;" readonly="true" class="id" name="id"></h2>
                    
                    
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



     