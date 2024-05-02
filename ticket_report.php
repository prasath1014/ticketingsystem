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
				<div class="row">
                                             <div class="col-6">
											 
                            <b>From Date</b><br>
              <input type="date" class="form-control" name="frm_dt" id="frm_dt" size="60" >
                                
                        </div>
								<div class="col-6">	
						<b>TO Date</b><br>
              <input type="date" class="form-control" name="to_dt" id="to_dt"  size="60" >
                             </div>   
                      
					<div class="col-6">	
						<b>Ticket Id</b><br>
              <input class="form-control" name="tick_id" id="tick_id" size="60" >
  </div>

  </div>
     <div class="col-3">
                            <input type="button" name="incentive_flow_verfiy" id="incentive_flow_verfiy" value="Search"
                                class="btn form-control rounded-pill" style="margin-top: 28px; margin-left: 568px; background-color: #1b5127; color: #dfc536;">
                            
                        </div>
</div>
      <div class="row">
                            <div class="col-12">
                                <div class="text-center">
                                    <!-- Image loader -->
                                    <div id='loader' style='display: none;'>
                                        <img src="loader1.gif" style="width:200px;">
                                    </div>
                                </div>
                            </div>
                        </div>
<div class="response"></div>

    
                      </div></div>
                 
				    
                </div>
                </div>

                        <!-- Image loader -->

                        <!-- Output Tag -->


                      

<?php include('page_footer_link.php');?>

<script type='text/javascript'>
$(document).ready(function() {
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
    var theResponse = null;
    $("#incentive_flow_verfiy").click(function() {
        $('.response').empty();
        var ticket_id = $('#tick_id').val();
        var from_date = $('#frm_dt').val();
        var to_date = $('#to_dt').val();
		
        $.ajax({
            url: 'ticket_report_result.php',
            type: 'get',
            data: {
                ticket_id: ticket_id,
                from_date: from_date,
                to_date:to_date,
                
                
            },
            beforeSend: function() {
              
                // Show image container
                $("#loader").show();
                //$('#login_for_review').modal('show');
            },
            success: function(response) {
                
                $('.response').empty();
                $('.response').append(response);
            },
            complete: function(data) {
                // Hide image container
                $("#loader").hide();

            }
        });

    });
});
</script>
