<?php include('page_header_link.php');?>
<?php
     include("connection.php");
     //include('session.php');
	 ?>
<style>
.select2bs4 :focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
}
</style>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include('navbar.php');?>
    <!-- partial -->
    <?php include('topbar.php');?>
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_settings-panel.html -->
        <?php include('menubar.php');?>
        <!-- partial -->
        <!-- partial:../../partials/_sidebar.html -->

        <!-- partial -->
        <div class="main-panel">
            <div class="col-12 grid-margin">



            <form method="POST" enctype="multipart/form-data" id="myform" action="ticket_insert.php">
                <div class="container-fluid">
                    <div class="row  py-3">
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-header text-left  ">
                                    <h3 class="font-weight-bold    py-1">New Ticket</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <input type="hidden" id="invoice_id" name="invoice_id" value="">
                                        <input type="hidden" id="invoice_id2" name="invoice_id2" value="">
                                        <div class="col">
                                            <div class="md-3 ">
                                                <label>Name<span class="text-danger">*</span></label>
                                                <input type="text" id="search_query" name="search_query"
                                                    value="<?php echo $login_session; ?>" readonly class="form-control "
                                                    placeholder="Name" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col">
                                            <label>Department<span class="text-danger">*</span></label>
                                            <select class="form-control select2bs4" data-placeholder="Select Department"
                                                style="width: 100%;" name="txt_department" id="txt_department" required
                                                searchable="Search here..">
                                                <option value="" disabled selected>Select Department</option>
                                                <?php 
                  $str="SELECT NDEPARTMENT_ID ,CDEPARTMENT_NAME  FROM RAYMEDI_ENES.ENES_DEPARTMENT_MASTER edm  GROUP BY NDEPARTMENT_ID ,CDEPARTMENT_NAME ";
                  $result=mysqli_query($db,$str);
                  
                  $data=array();
                  while($row=mysqli_fetch_array($result)){
                    echo '<option value="'.$row[1].'"  >'.$row[1].'</option>';
                  }
                  ?>
                                            </select>
                                        </div>
                                        <!-- Subject -->
                                        <div class="col">
                                            <label>Issue Type<span class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <select class="form-control select2bs4"
                                                    data-placeholder="Select Issue Type" style="width: 100%;"
                                                    name="issetype" id="issetype" required searchable="Search here..">
                                                    <option value="" disabled selected>Select issue Type</option>
                                                    <?php 
                  $iss="SELECT * FROM RAYMEDI_ENES.TICKET_ISSUE_MASTER tim";
                  $iss_result=mysqli_query($db,$iss);
                  
                  $data=array();
                  while($row1=mysqli_fetch_array($iss_result)){
                    echo '<option value="'.$row1[1].'" >'.$row1[1].'</option>';
                  }
                  ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col py-2">
                                            <div class="form-group">
                                                <label for="">Ticket Details<span class="text-danger">*</span> </label>
                                                <textarea name="msg" id="msg" class="form-control rounded-0" rows="6"
                                                    required></textarea>
                                            </div>
                                            <input type='file' id="myFile" name="myFile" multiple class="btn btn-info"
                                                onchange="readURL(this);" />
                                            <input type="button" class="btn btn-secondary btn-sml" data-toggle="modal"
                                                data-target="#img_view" value="View" />
                                            <br>
                                        </div>
                                        <div class="col py-2">

                                            <div class="col">
                                                <label>Priority<span class="text-danger">*</span> </label>
                                                <select class="form-control" style="width: 100%;" name="priority"
                                                    id="priority" required>
                                                    <option value="" disabled selected>Select Priority</option>
                                                    <option value="High">High</option>
                                                    <option value="Medium">Medium </option>
                                                    <option value="Low">Low</option>
                                                </select>
                                                <label>Created Person Name<span class="text-danger">*</span></label>
                                                <input type="text" id="Ticket_per_name" name="Ticket_per_name"
                                                    class="form-control " placeholder="Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" card-footer bg-white text-right">
                                        <div class=" md-2">
                                            <input type="submit" name="btnSubmit" id="btnSubmit" value="Save"
                                                class="btn btn-success  " />
                                            <a type="reset" href="" id="re_value" class="btn btn-warning">Clear<a/>
                                        </div>

                                        <!-- Default form contact -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- image view model -->
                <div class="modal fade" id="img_view" tabindex="-1" role="dialog" aria-labelledby="img_view"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="img_view">Attached Image File</h5>
                                <button type="button" class="close"  data-dismiss="modal" aria-label="Close"> <span
                                        aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="modal-body"> <img id="blah" name="blah" height="250" width="400" src=""
                                    alt="No Attachment..!" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            </div>
            <!-- content-wrapper ends -->

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<?php include('page_footer_link.php');?>
<script>
// File Upload
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var x1 = "";
        reader.onload = function(e) {
            $('#blah')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>