<?php
include('../../config/db_connection.php');
	$DIVISION_NO = $_POST['DIVISION_NO'];
	$sql="SELECT * FROM `gen_districts` WHERE  `DIVISION_NO`='$DIVISION_NO' ";
	$query = mysqli_query($con,$sql);
	$html = "";
	if(mysqli_num_rows($query) > 0){
	 	$html .="<select class='form-control' name='DISTRICT_NO' id='DISTRICT_NO'>";
	 	 $html .="<option value='-1'>".Select."</option>";
	 	while($row = mysqli_fetch_array($query)):
	        $html .="<option value='".$row['DISTRICT_NO']."'>".$row['DISTRICT_NAME']."</option>";
	    endwhile;
	    $html .="</select>";  
	}
    echo $html;
?>