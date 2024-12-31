<?php
include('../../config/db_connection.php');
	$SUB_GROUP_NO = $_POST['SUB_GROUP_NO'];
	$sql="SELECT * FROM `gen_cataegories` WHERE `is_deleted`=0 AND `SUB_GROUP_NO`='$SUB_GROUP_NO'";
	$query = mysqli_query($con,$sql);
	$html = "";
	if(mysqli_num_rows($query) > 0){

	 	$html .="<select class='form-control' name='CATEGORIES_NO' id='CATEGORIES_NO'>";
	 	$html .="<option value='-1'>".'--Select Category--'."</option>";
	    while($row = mysqli_fetch_array($query)):
	    	
	        $html .="<option value='".$row['CATEGORIES_NO']."'>".$row['CATEGORIES_NAME']."</option>";
	    endwhile;
	    $html .="</select>";  
	}
    echo $html;
?>