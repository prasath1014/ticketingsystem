<!DOCTYPE html>
<html lang="en">

<?php include('page_header_link.php');?>


<body>
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
                <div class="">
                    <div class="row">


                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Location Master </h4>
                                    <p class="card-description">
                                    							
                                    </p>
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Employee Location</th>
                                                    <th>Employee Address</th>
                                                    <th>Pincode</th>
                                                    <th>Created By</th>
                                                    <th>Created Date</th>
                            
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                    $date = date("Y-m-d");
                                        $sql="SELECT * FROM RAYMEDI_ENES.ENES_LOCATION_MASTER  order by NLOCATION_ID DESC";
                                        $result=oci_parse($db,$sql);
                                        oci_execute($result);
                                    $location_sno=1;
                                        while($row=oci_fetch_array($result)){
                                            ?>
                                                <tr>
                                                    <td><?php echo  $location_sno; ?></td>
                                                    <td><?php echo $row["CLOCATION_NAME"]; ?></td>
                                                    <td><?php echo $row["CLOCATION_ADDRESS"]; ?></td>
                                                    <td><?php echo $row["CLOCATION_PINCODE"]; ?></td>
                                                    <td><?php echo $row["CCREATED_BY"]; ?></td>
                                                    <td><?php echo $row["DCREATED_DATE"].' '.$row["CCREATED_TIME"]; ?></td>

                                                  


                                                </tr>
                                                <?php
       $location_sno++; }
     ?>



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- content-wrapper ends -->

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php include('page_footer_link.php');?>
    <!-- Page specific script -->
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
</body>

</html>