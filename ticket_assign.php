<?php include('page_header_link.php');
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

                <div class="container-fluid card ">
                    <div class="py-5"> </div>

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No</th>
								<th>Assigned To</th>
								<th>Ticket Id</th>
								<th>Created By</th>
								<th>Department</th>
								<th>Issue Type</th>
								<th>Details</th>
								<th>Attachment</th>
                                <th>Created Date</th>
								<th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
      $records = oci_parse( $db, " SELECT * FROM RAYMEDI_ENES.ENES_TICKET_DETAILS " ); // fetch data from database
      oci_execute( $records );
      $sn = 0;
      while ( $data = oci_fetch_array( $records ) ) {
        ?>
                            <tr>
                                <td><?php echo  ++$sn; ?></td>
								<td class="text-center"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#<?php echo "a" .$sn; ?>">
                                    <i class="material-icons">Edit</i>
                                  </a>
                                                                
                                <div class="modal fade" id="<?php echo "a" .$sn; ?>">
                                <div class="modal-dialog modal-xl">
                                  <div class="modal-content">
								  <div class="card border">
						<div class="modal-header">
						
                          <h2 class="text-center" align="center"></h2>
						 
						  </div>
                                      

                                <!-- /.card-header -->
                                <div class="card-body">
                                  <form name="form1" method="post">
                                        <div class="text-center">
										
                                            <div class="row">
				
                                             <div class="col-3">
											 
                            <b>Ticket Id</b><br>
              <input class="form-control" name="edit_tck" id="edit_tck" value="<?php echo $data['ITKT_ID']; ?>" size="60" >
                                
                        </div>
								<div class="col-3">	
						<b>Issue</b><br>
              <input class="form-control" name="edit_iss" id="edit_iss" value="<?php echo $data['CISSUE_TYPE']; ?>" size="60" readonly>
                             </div>   


					<div class="col-3">	
						<b>Updated Date</b><br>
              <input class="form-control" name="edit_usr_id" id="edit_up_dt" value="<?php echo date("Y-m-d"); ?>" size="60" readonly>
  </div>	
  			           <div class="py-5"> </div>
					   <div class="col-3">
											<b>Updated Status</b><br> 
                            
                       <select class=" form-control " name="status_out" id="status_out"
                                searchable="Search here..">
                                <option value="">Select Status</option>
                                <option value="Completed">Completed</option>
                                <option value="Inprocess">Inprocess</option>
                                
                            </select>
                        </div>
  </div>						

<div class="col-2">
						 <button type="save" name="update_sts" id="update_sts" class="form-control btn btn-success rounded-pill" style="background-color: #3dac78; margin-top: 78px; margin-left: 457px;">Update</button>
						 
						 </div>						
                                            
                                            <!-- /.card-body -->
                                        </div>
									</form>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div></div>
                              <!-- /.modal --></td>
								<td><?php echo $data['ITKT_ID'];?></td>
								<td><?php echo $data['CNAME'];?></td>
								<td><?php echo $data['CDEPARTMENT'];?></td>
								<td><?php echo $data['CISSUE_TYPE'];?></td>
								<td><?php echo $data['CTICKET_DETAILS'];?></td>
								<td><?php  $attachment=  $data['ATTACHMENT'];
                      if($attachment !='')
                      { ?>
                   
                      <a class="btn btn-sm" data-toggle="modal" data-target="#<?php echo "b" .$sn; ?>" style="background-color: #8fe670;">
                                    View
                                  </a>
                                <?php } else { ?>

                                  
                                <label>No Attachment</label>
                                  
                                <?php } ?>
                                <div class="modal fade" id="<?php echo "b" .$sn; ?>">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title"><?php

                                                            
                                                    $row['ATTACHMENT'];
                                                              
                                                              ?></h4>
                                      <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <img src="<?php echo $row['ATTACHMENT'];?>" style="width: 250;height: 450;">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>

                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal --></td>
								<td><?php echo $data['DCREATED_DATE'];?></td>
								<td><?php echo $data['CTICKET_STATUS'];?></td>
                                
                            </tr>
                            <?php } ?>
                        </tbody>
						                    </table>
                </div>

     




            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<?php

																			  
	   if(isset($_POST['update_sts']))
{
date_default_timezone_set('Asia/Kolkata');
     $date = date("Y-m-d");
     $log_time = date('Y-m-d h:i:s A');
$tck_no=$_POST['ITKT_ID'];


$task_update = oci_parse($db,"UPDATE
	RAYMEDI_ENES.ENES_TICKET_DETAILS 
	SET
	CTICKET_STATUS='".$_POST['status_out']."',
	CSOLVED_BY='$login_session',
	DSOLVED_DATE=TO_DATE('$date','YYYY-MM-DD HH24:MI:SS') where ITKT_ID='".$_POST['edit_tck']."'");
    $result = oci_execute($task_update);

if($result)
{

echo "<script>alert('Success ! Status Has Updated')</script>";

header('refresh:0;url=ticket_assign.php');

}
else{

echo "<script>alert('Alert ! Updation Has Failed')</script>";

header('lcoation:ticket_assign.php');

}
   
}
?>

<?php include('page_footer_link.php');?>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": false,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [{
                extend: "excel",
                className: "btn  btn-info",
                titleAttr: 'Export in Excel',
                text: "<i class='mdi mdi-file-excel'>&nbsp; Excel</i>",
                init: function(api, node, config) {
                    $(node).removeClass('btn-default')
                }
            }, {
                extend: "pdf",
                className: "btn  btn-info",
                titleAttr: "Export in PDF",
                text: "<i class='mdi mdi-file-pdf-box'>&nbsp; PDF</i>",
                init: function(api, node, config) {
                    $(node).removeClass('btn-default')
                }
            }, {
                extend: "print",
                className: "btn  btn-info",
                titleAttr: 'Export in Excel',
                text: "<i class='mdi mdi-printer'>&nbsp; Print</i>",
                init: function(api, node, config) {
                    $(node).removeClass('btn-default')
                }
            }]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": false,
        });
    });
    </script>
