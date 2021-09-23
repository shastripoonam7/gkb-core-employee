<div class="">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Employee Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Srno</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Hobbies</th>
                                        <th>Gender</th>
                                        <th>Joining Date</th>
                                        <th>Department</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Srno</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Hobbies</th>
                                        <th>Gender</th>
                                        <th>Joining Date</th>
                                        <th>Department</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>

<!-- Employee Modal -->
<div id="EmpModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Employee Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('', ["id" => "myform", "name" => "myform", "enctype" => "multipart/form-data"]); ?>
                <input type="hidden" id='hdn_id' name='hdn_id' />
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            placeholder="Enter First Name">
                    </div>
                    <div class="col-md-6">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            placeholder="Enter Last Name">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="email">Email Id</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter Your Email ID">
                    </div>
                    <div class="col-md-6">
                        <label class="" for="hobbies">Hobbies</label>
                        <div class="col-md-12 chkcls">
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="" name="hobbies[]" value="TV" />
                                <label class="form-check-label">TV</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="" name="hobbies[]" value="Coding" />
                                <label class="form-check-label">Coding</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="" name="hobbies[]"
                                    value="Reading" />
                                <label class="form-check-label">Reading</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="" name="hobbies[]" value="Skiing" />
                                <label class="form-check-label">Skiing</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="gender">Gender</label>
                        <div class="col-md-12 radiocls">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="m" name="gender" value="Male" />
                                <label class="form-check-label">Male</labe>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="f" name="gender" value="Female" />
                                <label class="form-check-label">Female</labe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="joining_date">Joining Date</label>
                        <input type="date" class="form-control" id="joining_date" name="joining_date" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="department">Department</label>
                        <select id="department" name="department" class='form-control'>
                            <option value="">Select Department</option>
                            <option value="HR">HR</option>
                            <option value="Admin">Admin</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Production">Production</option>
                        </select>
                    </div>
                    <div class="col-md-6 file-div">
                        <label for="upload">Upload Image</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" />
                    </div>
                </div>
                <div class="row form-group reset-div">
                    <div class="col-md-6 ">
                        <button type="button" class="btn btn-primary" id="reset-image" onclick="resetimage()">Change
                            Image</button>
                    </div>
                    <div class="col-md-6 reset-image" style="display:none;">
                        <label for="upload">Upload Image</label>
                        <input type="file" class="form-control-file" id="image1" name="image1" accept="image/*" />
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addEmp" onclick="addEmp()">Add</button>
                <button type="button" class="btn btn-warning" id="editEmp" onclick="editEmp()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="ImageModal" class="modal bd-example-modal-sm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img  class="img-fluid" src="" id='empimage' />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary" id="addEmp" onclick="addEmp()">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

<!-- Import Modal -->
<div id="ImportModal" class="modal bd-example-modal-sm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import CSV File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(cndDir1."/Employee/ImportCSV", ["id" => "mycsvform", "name" => "mycsvform", "enctype" => "multipart/form-data"]); ?>
                <div class="row">
                    <label for="upload">Upload CSV</label>
                    <input type="file" class="form-control-file" id="upload_csv" name="upload_csv" accept=".csv" />
                </div>
            </div>
            <div class="col-md-12 form-group">
                <button type="button" class="btn btn-primary" id="uploadcsvbtn" onclick="uploadcsv()">Save</button>
            </div>
            <?php
echo form_close();
?>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>