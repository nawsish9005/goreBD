<?php
	function ShowEmployee($con,$EMPLOYEE){
		$sql = "SELECT `EMPLOYEE_NO`, `EMPLOYEE_NAME` FROM `employee_setup` WHERE `EMPLOYEE_NO` IN ($EMPLOYEE_NO)";
		$query = mysqli_query($con,$sql);
		$result="";
		while($row = mysqli_fetch_array($query)):
			$result.=",".$row['EMPLOYEE_NAME'];
		endwhile;
		return substr($result, 1);
	}

	
?>