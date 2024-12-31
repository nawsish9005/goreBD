<?php
	include '../config/db_connection.php';
	function get_all_division(){
		$html = "<option value='-1'>--Select--</option>";
		$sql = "SELECT * FROM `gen_divisions` order by `DIVISION_NAME` ASC";
    	$query = $GLOBALS['con']->query($sql);
    	foreach ($query as $value) {
    		$html .= "<option value='".$value['DIVISION_NO']."'>".$value['DIVISION_NAME']."</option>";
    	}
    	return $html;
	}
	function get_all_district(){
		$html = "<option value='-1'>--Select--</option>";
		$sql = "SELECT * FROM `gen_districts` order by `DISTRICT_NAME` ASC";
    	$query = $GLOBALS['con']->query($sql);
    	foreach ($query as $value) {
    		$html .= "<option value='".$value['DISTRICT_NO']."'>".$value['DISTRICT_NAME']."</option>";
    	}
    	return $html;
	}

	    
    
?>