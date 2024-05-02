<?php 
//include('header.php');
include('connection.php');
error_reporting(0);
include("session.php");
//insert the data 
if(isset($_POST['btnSubmit'])){
	
 
	
	//if(($_POST['po_reqs_no'] !='' && $_POST['po_date'] !='' && $_POST['po_store'] !='' && $_POST['po_city'] !='' && $_POST['po_area'] !='' && $_POST['po_state'] !='' && $_POST['po_sm'] !='' && $_POST['po_cm_am'] !='' && $_POST['po_zm_agm'] !='' && $_POST['po_sgm'] !='' && $_POST['po_eq_type'] !='' && $_POST['po_vendor_name'] !='' && $_POST['po_specification'] !='' && $_POST['po_make'] !='' && $_POST['po_model'] !='' && $_POST['po_capacity'] !='' && $_POST['po_capacity'] !='' && $_POST['po_details'] !='' && $_POST['po_payment_terms'] !='' && $_POST['po_wranty'] !='' && $_POST['po_immediate_regular'] !='' && $_POST['po_sanction_non_sanction'] !='' && $_POST['po_requested_sm_asm'] !='')){
	
  $addsugcatephoto=$_FILES['myFile']['name'];
$addsubphoto="Ticket_image/".$addsugcatephoto;
    move_uploaded_file($_FILES["myFile"]["tmp_name"],$addsubphoto);
 
date_default_timezone_set('Asia/Kolkata');
     $date = date("Y-m-d");
     $log_time = date('Y-m-d h:i:s A');
	 $status="Pending";

$add=mysqli_query($db,"INSERT INTO RAYMEDI_ENES.ENES_TICKET_DETAILS (CNAME,	
                                                                            CDEPARTMENT,
																			CISSUE_TYPE,
																			CTICKET_DETAILS,
																			CPRIORITY,
																			CCREATED_PERSON,
                                                                            ATTACHMENT,
																			CTICKET_STATUS) 
																			values('".$_POST['search_query']."','".$_POST['txt_department']."','".$_POST['issetype']."','".$_POST['msg']."','".$_POST['priority']."','".$_POST['Ticket_per_name']."','$addsubphoto','".$status."')");
                   

if($add)
{

echo "<script>alert('Success ! Ticket has created')</script>";

 header('refresh:0;url=ticket.php');

}
else{

echo "<script>alert('Alert ! Ticket Creation failed')</script>";

 //header('refresh:0;url=ticket.php');

}//}else {
       // echo "<script>alert('Alert ! Kindly Check Some Details Has Not Enter Porperly')</script>";
    //}
}?>