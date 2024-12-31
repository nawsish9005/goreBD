<?php

  include('database.php');
?>
<?php
if(isset($_POST['submit'])){

  $FIRST_NAME = trim($_POST['FIRST_NAME']);
  $LAST_NAME = trim($_POST['LAST_NAME']);
  $EMAIL_ADDRESS = trim($_POST['EMAIL_ADDRESS']);
  $BLOOD_GROUP_NO = $_POST['BLOOD_GROUP_NO'];
  $DISTRICT_NO = $_POST['DISTRICT_NO'];
  $UPAZILA_NO = $_POST['UPAZILA_NO'];
  $USER_CONTACT = trim($_POST['USER_CONTACT']);
  $LAST_DONATE = $_POST['LAST_DONATE'];
  $USER_AGE = trim($_POST['USER_AGE']);
  $GENDER_NO = $_POST['GENDER_NO'];
  $PASSWORD = trim($_POST['PASSWORD']);
  $PASSWORD2 = trim($_POST['PASSWORD2']);
  $ACTIVE_FROM = date('Y-m-d H:i:s');
 
 if($PASSWORD==$PASSWORD2 && strlen($PASSWORD) > 5){
  $PASSWORD = ($PASSWORD);
 
  $login_query = "INSERT INTO my_gore_db(FIRST_NAME,LAST_NAME,EMAIL_ADDRESS,BLOOD_GROUP_NO, DISTRICT_NO ,UPAZILA_NO,USER_CONTACT ,LAST_DONATE,USER_AGE,GENDER_NO,PASSWORD,ACTIVE_FROM) VALUES ('$FIRST_NAME','$LAST_NAME','$EMAIL_ADDRESS','$BLOOD_GROUP_NO','$DISTRICT_NO','$UPAZILA_NO','$USER_CONTACT','$LAST_DONATE','$USER_AGE','$GENDER_NO','$PASSWORD','$ACTIVE_FROM')";
  $login = mysqli_query($con,$login_query);

    if($login == true){

    echo "<script> alert(' successfully save in') </script>";
   echo "<script> window.open('index.php','_self'); </script>";
  }
	}
}
  else{
      echo "<script> alert(' Incorrect information, try again !!') </script>";
      echo "<script> window.open('sign_up_design.php','_self'); </script>";
    }
?>   
