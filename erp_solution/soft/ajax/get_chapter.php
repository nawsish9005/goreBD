<?php
include('../../config/db_connection.php');
	$SUBJECT_NO = $_POST['SUBJECT_NO'];
	$sql="SELECT * FROM `gen_chapter` WHERE is_deleted=0 AND `SUBJECT_NO`=$SUBJECT_NO";
	$query = mysqli_query($con,$sql);
	$html = "";
	if(mysqli_num_rows($query) > 0){
	 	$html .="<select class='form-control' name='CLASS_NO' id='CLASS_NO'>";
	 	$html .="<option value='-1'>".'--Select Chapter--'."</option>";
	    while($row = mysqli_fetch_array($query)):
	        $html .="<option value='".$row['CHAPTER_NO']."'>".$row['CHAPTER_TITLE']."</option>";
	    endwhile;
	    $html .="</select>";  
	}
    echo $html;
?>