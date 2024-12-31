<?php
  include('db.php');

if(isset($_POST['login'])){

  $email = $_POST['email'];
  $password = $_POST['password'];

  $login_query = mysqli_query($con,"SELECT * FROM usertable WHERE email = '$email' AND password = '$password' LIMIT 1");
  //$login = mysqli_query($con,$login_query);

  $count = mysqli_num_rows($login_query);

  if($count == 1){

    $row= mysqli_fetch_assoc($login_query);
    
    $email = $row['email'];
    
          echo "<script> window.open('user.php','_self'); </script>";

    session_start();
    $_SESSION['email'] = $email;
    //echo $email ;
    exit();
  }
  else{
      echo "<script> alert(' Incorrect information, try again !!') </script>";
      //echo "<script> window.open('index.php','_self'); </script>";
    }


}
?>