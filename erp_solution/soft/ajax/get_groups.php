<?php
include('../../config/db_connection.php');
	$class_no = $_POST['class_no'];
	$sql="SELECT * FROM `mcq_groups` WHERE is_deleted=0 AND `class_no`=$class_no";
	$query = mysqli_query($con,$sql);
	$html = "";
	if(mysqli_num_rows($query) > 0){
	 	$html .="<select class='form-control' id='group_no' name='group_no'>";
	 	$html .="<option value='-1'>".'--Select Group--'."</option>";
	    while($row = mysqli_fetch_array($query)):
	        $html .="<option value='".$row['group_no']."'>".$row['group_name']."</option>";
	    endwhile;
	    $html .="</select>";  
	}
    echo $html;
?>