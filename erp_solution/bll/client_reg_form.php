<?php
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$homme_district = $_POST['homme_district'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$occupation = $_POST['occupation'];
	$id_type = $_POST['id_type'];
	$id_number = $_POST['id_number'];
	$problem_type = $_POST['problem_type'];
	$problem_details = $_POST['problem_details'];
	

	
	echo "Name: $name, Mobile: $mobile , Email: $email, Address:$address,  Home: $homme_district, Gender:$gender,DOB: $dob ,
		Occupation:$occupation,  ID Type: $id_type, ID No:$id_number, Prb Type:$problem_type, Prb Details:$problem_details  " ;
	
?>

