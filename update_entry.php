<?php
     include("connection.php");
     include("session.php");
		//error_reporting(0);
?>
<?php		
	   if(isset($_POST['update_dt'])){
date_default_timezone_set('Asia/Kolkata');
    $date = date("Y/m/d");
    
$tck_no=$_POST['tck_id'];

$task_update = mysqli_query($db,"UPDATE
	RAYMEDI_ENES.TICKET_ISSUE_MASTER 
	SET
	CISSUE_NAME='".$_POST['edit_dlt']."',
	DUPDATED_DATE='$date'
WHERE
	ITKT_ID ='$tck_no'");
 
if($task_update)
{

echo "<script>alert('Success ! Table Has Updated')</script>";

header('refresh:0;url=issue_master.php');

}
else{

echo "<script>alert('Alert ! Table  Updated Has Failed')</script>";

header('lcoation:issue_master.php');

}
   
}
?>