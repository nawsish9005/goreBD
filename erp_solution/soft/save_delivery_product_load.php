<?php
	session_start();
	include '../config/db_connection.php';
	$CREATED_BY = $_SESSION['user']['USER_NO'];
	$CREATED_ON = date("Y-m-d h:i:s");
	$EMPLOYEE_NO =$_POST['EMPLOYEE_NO'];
	$EMPLOYEE_NAME = $_POST['EMPLOYEE_NAME'];
	$EMPLOYEE_ADD = $_POST['EMPLOYEE_ADD'];
	
	$sql = "INSERT INTO employee_master SET EMPLOYEE_NO = '$EMPLOYEE_NO', EMPLOYEE_NAME = '$EMPLOYEE_NAME', EMPLOYEE_ADD = '$EMPLOYEE_ADD', 
	 CREATED_BY = '$CREATED_BY', CREATED_ON = '$CREATED_ON'";
	$query = mysqli_query($con,$sql);
	
	$EMPLOYEE_ID = mysqli_insert_id($con);
	//
	$MOBILE_NO_LIST = $_POST['mobile_no_list'];
	$MOBILE_NO_LIST = explode(",",$MOBILE_NO_LIST);

	$EMAIL_NAME_LIST = $_POST['email_name_list'];
	$EMAIL_NAME_LIST = explode(",",$EMAIL_NAME_LIST);

	$row_count = count($MOBILE_NO_LIST);
	for ($i=0;$i<$row_count;$i++) {
		$MOBILE_NO = $MOBILE_NO_LIST[$i];
		$EMAIL_NAME = $EMAIL_NAME_LIST[$i];
	 $sql = "INSERT INTO employee_info SET EMPLOYEE_ID = '$EMPLOYEE_ID', MOBILE_NO = '$MOBILE_NO', EMAIL_NAME = '$EMAIL_NAME',
	CREATED_BY = '$CREATED_BY', CREATED_ON = '$CREATED_ON'";
		$query = mysqli_query($con,$sql);
	}
	echo $query;
?>