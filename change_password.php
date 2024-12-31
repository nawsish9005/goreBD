<?php
include("database.php");
   session_start();
	$EMAIL_ADDRESS = $_SESSION['EMAIL_ADDRESS'];

if(!isset($_SESSION['EMAIL_ADDRESS'])){
    header("location: sign_in_design.php");

}

?>
<?php 
 include("includes/header.php");
?>
	<!-- Contact form -->
	<section class="section-contact bg1-pattern p-t-90 p-b-113">
		<!-- Map -->
		<div class="container">
			<h3 class="tit7 t-center p-b-62 p-t-105">
				Change password
			</h3>
			
	<?php
	if(isset($_POST['submit']))
	{
		$OLD_PASSWORD = $_POST['OLD_PASSWORD'];
		$NEW_PASSWORD1 = $_POST['NEW_PASSWORD1'];
		$NEW_PASSWORD2 = $_POST['NEW_PASSWORD2'];
		$EMAIL_ADDRESS = $_SESSION['EMAIL_ADDRESS'];
		$sql = "SELECT * FROM my_gore_db WHERE PASSWORD = '$OLD_PASSWORD' AND EMAIL_ADDRESS='$EMAIL_ADDRESS' ";
		$query = mysqli_query($con,$sql);
		$row_count = mysqli_num_rows($query);
		
		if($row_count == 1)
		{
			if(strlen($NEW_PASSWORD1) < 6)
			{
				echo "<script> alert(' Password too short! Password Length at least 6 characters') </script>";
			}
			
			elseif($NEW_PASSWORD1 == $NEW_PASSWORD2)
			{
				$NEW_PASS = $NEW_PASSWORD1;
				$sql = "UPDATE my_gore_db SET PASSWORD = '$NEW_PASS' WHERE EMAIL_ADDRESS='$EMAIL_ADDRESS'";
				$result = mysqli_query($con,$sql);
				if($result)
				{
				echo "<script> alert(' Password Change Successfully') </script>";
				 echo "<script> window.open('user_account.php','_self'); </script>";
				}
				else
				{
				
					echo "<script> alert('Password Change Faild!') </script>";
				}
			}
			else
			{
			echo "<script> alert('New Password does not match!') </script>";
			}
		}
		else
		{
			echo "<script> alert('Old Password does not match!') </script>";
		}
	}

?>

			<form class="wrap-form-reservation size22 m-l-r-auto" method="POST" action="change_password.php">
				<div class="row">
					<div class="col-md-4">
						<!-- Name -->
						<span class="txt9">
							Old password
						</span>

						<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="OLD_PASSWORD" placeholder="Old password">
						</div>
					</div>

					<div class="col-md-4">
						<!-- Name -->
						<span class="txt9">
							New Password
						</span>

						<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="NEW_PASSWORD1" placeholder="New Password">
						</div>
					</div>

					<div class="col-md-4">
						<!-- Phone -->
						<span class="txt9">
							Confirm password
						</span>

						<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
							<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="NEW_PASSWORD2" placeholder="Confirm password">
						</div>
					</div>
				</div>

				<div class="wrap-btn-booking flex-c-m m-t-13">
					<!-- Button3 -->
					<button type="submit" name="submit" class="btn3 flex-c-m size36 txt11 trans-0-4">
						Submit
					</button>
				</div>
			</form>

			
		</div>
	</section>


	<!-- Footer -->
	<footer class="bg1">
	

		<div class="end-footer bg2">
			<div class="container">
				<div class="flex-sb-m flex-w p-t-22 p-b-22">
					<div class="p-t-5 p-b-5">
						<a href="#" class="fs-15 c-white"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
						<a href="#" class="fs-15 c-white"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
						<a href="#" class="fs-15 c-white"><i class="fa fa-twitter m-l-18" aria-hidden="true"></i></a>
					</div>

					<div class="txt17 p-r-20 p-t-5 p-b-5">
						Copyright &copy; 2018 All rights reserved  |  <i class="fa fa-heart"></i> by <a href="https://gorebd.com" target="_blank">GoreBD</a>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/parallax100/parallax100.js"></script>
	<script type="text/javascript">
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
