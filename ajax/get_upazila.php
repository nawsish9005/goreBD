<?php
include('../database.php');
	$DISTRICT_NO = $_POST['DISTRICT_NO'];
	echo $sql="SELECT * FROM `gen_upazila` WHERE `DISTRICT_NO`='$DISTRICT_NO' ";
	$query = mysqli_query($con,$sql);
	$html = "";
	if(mysqli_num_rows($query) > 0){
	 	$html .="<select class='form-control' name='UPAZILA_NO' id='UPAZILA_NO'>";
	 	$html .="<option value='-1'>".'--Select Department--'."</option>";
	    while($row = mysqli_fetch_array($query)):
	        $html .="<option value='".$row['UPAZILA_NO']."'>".$row['UPAZILA_NAME']."</option>";
	    endwhile;
	    $html .="</select>";  
	}
    echo $html;
?>