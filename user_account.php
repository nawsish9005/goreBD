<?php
include("database.php");
   session_start();
	$EMAIL_ADDRESS = $_SESSION['EMAIL_ADDRESS'];

if(!isset($_SESSION['EMAIL_ADDRESS'])){
    header("location: sign_in_design.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<nav class="mb-1 navbar navbar-expand-lg navbar-dark secondary-color lighten-1" style="background-color: red;">
			
			<!-- Logo -->
			
				<div class="logo">
		<a href="index.php">
			<img src="images/icons/logo2.png" alt="IMG-LOGO" data-logofixed="images/icons/logo2.png">
		</a>
	</div>
		
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
					aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

					<!-- Menu -->
					<div class="collapse navbar-collapse" id="navbarSupportedContent-555">
						
							<ul class="navbar-nav mr-auto">
							  <li style="background-color: red; margin-left: 20px;">
								<a class="nav-link" href="index.php">Home
								  <span class="sr-only">(current)</span>
								</a>
							  </li>
							  <li style="background-color: red; margin-left: 20px;">
								<a class="nav-link" href="conditions.php">Conditions</a>
							  </li>
							  <li style="background-color: red; margin-left: 20px;">
								<a class="nav-link" href="contact.php">Contact</a>
							  </li>
							  
							</ul>
							<ul>
                            <?php 
                                $sql = mysqli_query($con,"SELECT * FROM my_gore_db WHERE EMAIL_ADDRESS = '$EMAIL_ADDRESS' ");
                               while($row= mysqli_fetch_assoc($sql))

                                {   
                                  $PROFILE_PICTURE = $row['PROFILE_PICTURE'];
                                   $FIRST_NAME = $row['FIRST_NAME'];
                                    $LAST_NAME = $row['LAST_NAME'];
                                  $r = '';
                                  $w = ' ';
                                  ?>
                              <li class="nav-item avatar dropdown">
										<?php 
										  if ($PROFILE_PICTURE == $r){

										  echo '<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="rounded-circle" alt="avatar image" style="height: 60px;" src="uploads/pro_pic/1.jpg"></a>' ; ?>
										  
										  <?php 

									  }
									   else{ echo 
									   '<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="rounded-circle" alt="avatar image" style="height: 60px;" src="uploads/pro_pic/'?><?php echo $PROFILE_PICTURE;?>"><?php '</a>'; }}?>
									   <font> <span><?php echo $FIRST_NAME ;?><?php echo $w; ?><?php echo $LAST_NAME ;?></span> </font>
										  
                              
                              
                               <div class="dropdown-menu dropdown-menu-right dropdown-secondary" style="margin-left: -40px;" aria-labelledby="navbarDropdownMenuLink-55">

                                <?php
                                    
                                    $getcontacts = mysqli_query($con,"SELECT * FROM my_gore_db WHERE EMAIL_ADDRESS= '$EMAIL_ADDRESS'");

                                    while ($contacts=mysqli_fetch_array($getcontacts)) {

                                    ?>
                                <a class="dropdown-item" style="margin-bottom: -25px;" href="image_upload.php?useremail=<?php echo $contacts['EMAIL_ADDRESS'] ; }?>">Add Picture</a><br>
                                <a class="dropdown-item" style="margin-bottom: -25px;" href="user_profile.php">View Profile</a><br>
								<a class="dropdown-item" style="margin-bottom: -3px;" href="change_password.php">Change Password</a>
                                <a class="dropdown-item" style="margin-bottom: -3px;" href="logout.php">Logout</a>
                              </div>
							  </li>
							</ul>
							
					</div>
		</nav>
	</header>

	<!-- Our Story -->
	<section class="bg2-pattern p-t-116 p-b-110 t-center p-l-15 p-r-15" style="margin-bottom: -110px;">
		Welcome 
		<span class="tit2 t-center">
			<?php echo $FIRST_NAME ;?>...
		</span>
		<p class="t-center size32 m-l-r-auto">
			..........................
		</p>
		<section id="services" class="services-section section-global-wrapper">
		<h2>Now Our Total Doner: 
		    <?php

                $sql = mysqli_query($con,"SELECT COUNT(FLUID_USER_NO) AS total FROM  my_gore_db");
		  	  
			    while ($row = mysqli_fetch_assoc($sql)) {
				$t = $row['total'];
				   echo $t ;   
				} ?>
            </h2>
		
		
		
		
        </section>
		<!-- Sign up -->
	<div class="section-signup bg1-pattern p-t-85 p-b-85">
		<form class="flex-c-m flex-w flex-col-c-m-lg p-l-5 p-r-5" method="get" action="search_user.php">
			<span class="txt5 m-10">
				Enter Blood Group
			</span>

			<div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
				<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="search" placeholder="Email Adrress" required="required">
				<i class="fa fa-search ab-r-m m-r-18" aria-hidden="true"></i>
			</div>

			<!-- Button3 -->
			<button type="submit" name="submit" class="btn3 flex-c-m size18 txt11 trans-0-4 m-10">
				Search
			</button>
		</form>
	</div>
	</section>
	<!-- Delicious & Romantic-->
	<section class="bg1-pattern p-t-120 p-b-105">
		<div class="container">
			<!-- Delicious -->
			<div class="row">
			

				
			</div>

		</div>
	</section>


<?php

  include('includes/footer.php');
?>