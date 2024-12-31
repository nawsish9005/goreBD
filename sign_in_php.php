<?php
  include('database.php');

if(isset($_POST['submit'])){

  $EMAIL_ADDRESS = $_POST['EMAIL_ADDRESS'];
  $PASSWORD = $_POST['PASSWORD'];

  $login_query = mysqli_query($con,"SELECT * FROM my_gore_db WHERE EMAIL_ADDRESS = '$EMAIL_ADDRESS' AND PASSWORD = '$PASSWORD' LIMIT 1");
  //$login = mysqli_query($con,$login_query);

  $count = mysqli_num_rows($login_query);

  if($count == 1){

    $row= mysqli_fetch_assoc($login_query);
    
    $EMAIL_ADDRESS = $row['EMAIL_ADDRESS'];
    
          echo "<script> window.open('user_account.php','_self'); </script>";

    session_start();
    $_SESSION['EMAIL_ADDRESS'] = $EMAIL_ADDRESS;
    //echo $email ;
    exit();
  }
  else{
      echo "<script> alert(' Incorrect information, try again !!') </script>";
      //echo "<script> window.open('index.php','_self'); </script>";
    }

}
?>