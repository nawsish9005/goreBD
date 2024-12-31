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
	<title>Home</title>
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
		<div class="wrap-menu-header gradient1 trans-0-4">
			<div class="container h-full">
				<div class="wrap_header trans-0-3">
					<!-- Logo -->
					<div class="logo">
						<a href="index.php">
							<img src="images/icons/logo2.png" alt="IMG-LOGO" data-logofixed="images/icons/logo2.png">
						</a>
					</div>

					<!-- Menu -->
					<div class="wrap_menu p-l-45 p-l-0-xl">
						<nav class="menu">
							<ul class="main_menu">
								<li>
									<a href="index.php">Home</a>
								</li>

								<li>
									<a href="gallery.php">Gallery</a>
								</li>

								<li>
									<a href="conditions.php">Conditions</a>
								</li>

								<li>
									<a href="sign_in_design.php">Signin</a>
								</li>

								<li>
									<a href="contact.php">Contact</a>
								</li>
								<li>
								<div>
						
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
                              <div class="wrap_menu p-l-0-xl" type="button" data-toggle="dropdown"> 
										<?php 
										  if ($PROFILE_PICTURE == $r){

										  echo '<a class="nav-link" href="#">
										  <img style="height:50px;width:95px;" class="profile-pic img-circle" src="uploads/pro_pic/1.jpg"></a>';?>
										  
										  <?php 

									  }
									   else{ echo 
									   '<a class="nav-link" href="#"><img style="height:50px;width:95px;" class="profile-pic img-circle" src="uploads/pro_pic/'?><?php echo $PROFILE_PICTURE;?>"><?php '</a>'; }}?>
									   <font> <span><?php echo $FIRST_NAME ;?><?php echo $w; ?><?php echo $LAST_NAME ;?></span> </font>
										  
                              
                              </div>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-top: -2px;">

                                <?php
                                    
                                    $getcontacts = mysqli_query($con,"SELECT * FROM my_gore_db WHERE EMAIL_ADDRESS= '$EMAIL_ADDRESS'");

                                    while ($contacts=mysqli_fetch_array($getcontacts)) {

                                    ?>
                                <a class="dropdown-item" style="margin-bottom: -25px;" href="image_upload.php?useremail=<?php echo $contacts['EMAIL_ADDRESS'] ; }?>">Add Picture</a><br>
                                <a class="dropdown-item" style="margin-bottom: -25px;" href="user_profile.php">View Profile</a><br>
                                <a class="dropdown-item" style="margin-bottom: -3px;" href="logout.php">Logout</a>
                              </div>
                        
					</div>
					</li>
							</ul>
						</nav>
					</div>

					<!-- Social -->
					
				</div>
			</div>
		</div>
	</header>

	<!-- Sidebar -->
	<aside class="sidebar trans-0-4">
		<!-- Button Hide sidebar -->
		<button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

		<!-- - -->
		<ul class="menu-sidebar p-t-95 p-b-70">
			
		</ul>

		<!-- - -->
	</aside>


	<!-- Our Story -->
	<section class="bg2-pattern p-t-116 p-b-110 t-center p-l-15 p-r-15">
	
		<h3 class="t-center m-b-35 m-t-5">
			Welcome
		</h3>
								<?php 
                                $sql = mysqli_query($con,"SELECT * FROM my_gore_db WHERE EMAIL_ADDRESS = '$EMAIL_ADDRESS' ");
                               while($row= mysqli_fetch_assoc($sql))

                                {   
                                  
                                   $FIRST_NAME = $row['FIRST_NAME'];
                                    $LAST_NAME = $row['LAST_NAME'];
                                  ?>
		<span class="tit2 t-center">
								 <?php echo $FIRST_NAME ;?> <?php echo $LAST_NAME ;?> <?php } ?> 
		</span>

	</section>


	<!-- Delicious & Romantic-->
	<section class="bg1-pattern p-t-120 p-b-105" style="margin-top: -100px;">
		<div class="container">
			<!-- Delicious -->
			<div class="row">
			<?php 
                                $sql = mysqli_query($con,"SELECT * FROM my_gore_db LEFT JOIN gen_districts ON gen_districts.DISTRICT_NO = my_gore_db.DISTRICT_NO LEFT JOIN gen_upazila ON gen_upazila.UPAZILA_NO=my_gore_db.UPAZILA_NO LEFT JOIN blood_group ON blood_group.BLOOD_GROUP_NO = my_gore_db.BLOOD_GROUP_NO LEFT JOIN gender ON gender.GENDER_NO = my_gore_db.GENDER_NO WHERE EMAIL_ADDRESS = '$EMAIL_ADDRESS' ");
                               while($row= mysqli_fetch_assoc($sql))

                                {   
                                  
									  $FIRST_NAME = $row['FIRST_NAME'];
									  $LAST_NAME = $row['LAST_NAME'];
									  $EMAIL_ADDRESS = $row['EMAIL_ADDRESS'];
									  $BLOOD_GROUP = $row['BLOOD_GROUP'];
									  $DISTRICT_NO = $row['DISTRICT_NO'];
									  $UPAZILA_NO = $row['UPAZILA_NO'];
									  $USER_CONTACT = $row['USER_CONTACT'];
									  $LAST_DONATE = $row['LAST_DONATE'];
									  $USER_AGE = $row['USER_AGE'];
									  $GENDER_NO = $row['GENDER_NO'];
									  $ACTIVE_FROM = $row['ACTIVE_FROM'];
									  $CURRENT_DATE = date('Y-m-d');
								
									$d2    = date("Y-m-d"); // This is current date
									$date1 = date_create("$LAST_DONATE");
									$date2 = date_create("$d2");
									$diff  = date_diff($date1,$date2);
									$d = $diff->format("%R%a"); //This is the difference between current date and blood donate date

									 $next_date = 120-$d; // This is remaining date of next blood donation
								  
								  
								  ?>
				<div class="col-md-6 p-t-45 p-b-30">
					<div class="wrap-text-delicious t-center">
						<div class="section-signup bg1-pattern p-t-85 p-b-85" style="margin-top: -40px;">
		
								<span class="txt5 m-10">
									User Name: 
								</span>
								<span class="tit2 t-center">
								 <?php echo $FIRST_NAME ;?> <?php echo $LAST_NAME ;?> 
								</span>
								<br>
								<span class="txt5 m-10">
									Email Address
								</span><br>
								<span class="tit2 t-center">
								 <?php echo $EMAIL_ADDRESS ;?>
								</span>	
								<br>
								<span class="txt5 m-10">
									Blood Group:
								</span>
								<span class="tit2 t-center">
								 <?php echo $BLOOD_GROUP ;?>
								</span><br>
								<span class="txt5 m-10">
									Last Donate date
								</span>
							
								<span class="tit2 t-center">
								
								<?php
								if($next_date == '0' || $next_date < '0'){
									echo 'available';
								}elseif($next_date >= '1'){
									echo 'Unvaliable';
								}
								else echo 'none';
								
								?>
								</span><br>
								
								<span class="txt5 m-10">
									User Age
								</span>
								<span class="tit2 t-center">
								 <?php echo $USER_AGE ;?>
								</span><br>
								<span class="txt5 m-10">
									Contact Number
								</span>
								<span class="tit2 t-center">
								 <?php echo $USER_CONTACT ;?>
								</span>
								
						</div>
						
						<a class="btn3 flex-c-m size18 txt11 trans-0-4 m-10" href="edit_user_profile.php">View Profile</a>
						
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<div class="wrap-pic-delicious size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img src="uploads/pro_pic/<?php echo $PROFILE_PICTURE ; ?>" alt="IMG-OUR">
					</div>
				</div>
								<?php } ?>
			</div>

		</div>
	</section>

<?php

  include('includes/footer.php');
?>