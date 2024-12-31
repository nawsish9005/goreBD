<?php
include('../../config/db_connection.php');
	$GROUP_NO = $_POST['GROUP_NO'];
	$sql="SELECT * FROM `gen_sub_groups` WHERE  `GROUP_NO`='$GROUP_NO' ";
	$query = mysqli_query($con,$sql);
	$html = "";
	if(mysqli_num_rows($query) > 0){

	 	$html .="<select class='form-control' name='SUB_GROUP_NO' id='SUB_GROUP_NO'>";
	 	$html .="<option value='-1'>".'--Select Sub Group--'."</option>";
	 	while($row = mysqli_fetch_array($query)):
	        $html .="<option value='".$row['SUB_GROUP_NO']."'>".$row['SUB_GROUP_NAME']."</option>";
	    endwhile;
	    $html .="</select>";  
	}
    echo $html;
?>