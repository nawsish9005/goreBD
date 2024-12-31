<?php
include('../../config/db_connection.php');
	$DISTRICT_NO = $_POST['DISTRICT_NO'];
	$sql="SELECT * FROM `gen_upazila` WHERE  `DISTRICT_NO`='$DISTRICT_NO' ";
	$query = mysqli_query($con,$sql);
	$html = "";
	if(mysqli_num_rows($query) > 0){
	 	$html .="<select class='form-control' name='UPAZILA_NO' id='UPAZILA_NO'>";
	 	while($row = mysqli_fetch_array($query)):
	        $html .="<option value='".$row['UPAZILA_NO']."'>".$row['UPAZILA_NAME']."</option>";
	    endwhile;
	    $html .="</select>";  
	}
    echo $html;
?>