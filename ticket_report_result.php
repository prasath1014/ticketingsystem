<?php include('page_header_link.php');
include("connection.php");
//include('session.php');
$from_date=$_GET['from_date'];
$to_date=$_GET['to_date'];
$ticket_id=$_GET['ticket_id'];
?>
<style>
.select2bs4 :focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
}
</style>
                <div class="container-fluid card ">
                    <div class="py-5"> </div>
<div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No</th>
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
        if(($_GET['ticket_id']==''))
{
$records = oci_parse( $db,"SELECT
	*
FROM
	RAYMEDI_ENES.ENES_TICKET_DETAILS etd
WHERE etd.DCREATED_DATE>= TO_DATE('$from_date 00:00:00', 'YYYY-MM-DD HH24:MI:SS')
  AND etd.DCREATED_DATE<= TO_DATE('$to_date 23:59:59', 'YYYY-MM-DD HH24:MI:SS')"); // fetch data from database
      oci_execute( $records );
      $sn = 0;
      while ( $data = oci_fetch_array( $records ) ) {
        ?>
                            <tr>
                                <td><?php echo  ++$sn; ?></td>
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
                                <div class="modal-dialog modal-md">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title"><?php

                                                            
                                                    $data['ATTACHMENT'];
                                                              
                                                              ?></h4>
                                                                        </div>
                                    <div class="modal-body">
                                      <img src="<?php echo $data['ATTACHMENT'];?>" style="width: 450px;height:450px;">
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
                    

      
          
          <?php }}
elseif($_GET['from_date'] =='' && $_GET['to_date'] =='') {

$records = oci_parse( $db,"SELECT * FROM RAYMEDI_ENES.ENES_TICKET_DETAILS where ITKT_ID='$ticket_id'" ); // fetch data from database
      oci_execute( $records );
      $sn = 0;
      while ( $data = oci_fetch_array( $records ) ) {
        ?>
                            <tr>
                                <td><?php echo  ++$sn; ?></td>
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
                                <div class="modal-dialog modal-md">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title"><?php

                                                            
                                                    $data['ATTACHMENT'];
                                                              
                                                              ?></h4>
                                      <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <img src="<?php echo $data['ATTACHMENT'];?>" style="width: 250;height: 450;">
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
                           

            <?php }}
			else {

$records = oci_parse( $db,"SELECT
	*
FROM
	RAYMEDI_ENES.ENES_TICKET_DETAILS etd
WHERE etd.DCREATED_DATE>= TO_DATE('$from_date 00:00:00', 'YYYY-MM-DD HH24:MI:SS')
  AND etd.DCREATED_DATE<= TO_DATE('$to_date 23:59:59', 'YYYY-MM-DD HH24:MI:SS') 
  AND etd.ITKT_ID ='$ticket_id'" );// fetch data from database
      oci_execute( $records );
      $sn = 0;
      while ( $data = oci_fetch_array( $records ) ) {
        ?>
                            <tr>
                                <td><?php echo  ++$sn; ?></td>
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
                                <div class="modal-dialog modal-md">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title"><?php

                                                            
                                                    $attachment;
                                                              
                                                              ?></h4>
                                      <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <img src="<?php echo $attachment;?>" style="width: 250;height: 450;">
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
                           

            <?php }}?>
                        </tbody>
						                    </table>
                </div>

     

</div>


 

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
