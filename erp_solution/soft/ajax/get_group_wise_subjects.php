<?php
include('../../config/db_connection.php');
	$group_no = $_POST['group_no'];
	$sql="SELECT * FROM `mcq_subjects` WHERE is_deleted=0 AND `group_no`=$group_no";
	$query = mysqli_query($con,$sql);
	$html = "";
	if(mysqli_num_rows($query) > 0){
	 	$html .="<select class='form-control' name='subject_no' id='subject_no'>";
	 	$html .="<option value='0'>".'--Select Subject--'."</option>";
	    while($row = mysqli_fetch_array($query)):
	        $html .="<option value='".$row['subject_no']."'>".$row['subject_name']."</option>";
	    endwhile;
	    $html .="</select>";  
	}
    echo $html;
?>