<?php
error_reporting(0);
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
<?php 
                                $sql = mysqli_query($con,"SELECT * FROM my_gore_db LEFT JOIN gen_districts ON gen_districts.DISTRICT_NO = my_gore_db.DISTRICT_NO LEFT JOIN gen_upazila ON gen_upazila.UPAZILA_NO=my_gore_db.UPAZILA_NO LEFT JOIN blood_group ON blood_group.BLOOD_GROUP_NO = my_gore_db.BLOOD_GROUP_NO LEFT JOIN gender ON gender.GENDER_NO = my_gore_db.GENDER_NO WHERE my_gore_db.EMAIL_ADDRESS = '$EMAIL_ADDRESS' ");
                               while($row= mysqli_fetch_assoc($sql))
                                   
                                { 
                                      $FLUID_USER_NO = $row['FLUID_USER_NO'];								
                                      $FIRST_NAME = $row['FIRST_NAME'];
									  $LAST_NAME = $row['LAST_NAME'];
									  $EMAIL_ADDRESS = $row['EMAIL_ADDRESS'];
									  $BLOOD_GROUP = $row['BLOOD_GROUP'];
									  $DISTRICT_NAME = $row['DISTRICT_NO'];
									  $UPAZILA_NAME = $row['UPAZILA_NO'];
									  $USER_CONTACT = $row['USER_CONTACT'];
									  $LAST_DONATE = $row['LAST_DONATE'];
									  $USER_AGE = $row['USER_AGE'];
									  $GENDER = $row['GENDER'];
									  $GENDER_NO = $row['GENDER_NO'];
									  $ACTIVE_FROM = date('Y-m-d H:i:s');
									  $BLOOD_GROUP_NO = $row['BLOOD_GROUP_NO'];
															
								
                               ?>
   
							   
							   	<?php
if (isset($_POST['submit'])) {
    
	$FIRST_NAME = $_POST['FIRST_NAME'];
	$LAST_NAME = $_POST['LAST_NAME'];
	$EMAIL_ADDRESS = $_POST['EMAIL_ADDRESS'];
	$BLOOD_GROUP_NO = $_POST['BLOOD_GROUP_NO'];
	$DISTRICT_NO = $_POST['DISTRICT_NO'];
	$UPAZILA_NO = $_POST['UPAZILA_NO'];
	$USER_CONTACT = $_POST['USER_CONTACT'];
	$LAST_DONATE = $_POST['LAST_DONATE'];
	$USER_AGE = $_POST['USER_AGE'];
	$GENDER_NO = $_POST['GENDER_NO'];
	$ACTIVE_FROM = date('Y-m-d H:i:s');
	
    $query =mysqli_query($con,"UPDATE my_gore_db SET FIRST_NAME = '$FIRST_NAME', LAST_NAME = '$LAST_NAME', EMAIL_ADDRESS = '$EMAIL_ADDRESS', BLOOD_GROUP_NO = '$BLOOD_GROUP_NO',DISTRICT_NO='$DISTRICT_NO', UPAZILA_NO = '$UPAZILA_NO' , USER_CONTACT='$USER_CONTACT', LAST_DONATE='$LAST_DONATE', USER_AGE='$USER_AGE', GENDER_NO='$GENDER_NO', ACTIVE_FROM='$ACTIVE_FROM' WHERE FLUID_USER_NO='$FLUID_USER_NO'");

	if ($query==1) {
		echo "contact successfully updated";
     echo "<script> window.open('user_profile.php','_self'); </script>";
	}else{
		echo "an error occured".$con->error;
	}
}
?>

	<!-- Reservation -->
	<section class="section-reservation bg1-pattern p-t-100 p-b-113">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 p-b-30">
					<div class="t-center">
						<span class="tit2 t-center">
							Edit your profile
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-2">
							Please re-input the necessity forms below
						</h3>
					</div>

					<form class="wrap-form-reservation size22 m-l-r-auto" method="POST" action="">
						<div class="row">
							<div class="col-md-4">
								<!-- Name -->
								<span class="txt9">
									First Name
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="FIRST_NAME" value="<?php echo $FIRST_NAME; ?>" >
								</div>
							</div>
							<div class="col-md-4">
								<!-- Name -->
								<span class="txt9">
									Last Name
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="LAST_NAME" value="<?php echo $LAST_NAME; ?>" >
								</div>
							</div>

							<div class="col-md-4">
								<!-- Email -->
								<span class="txt9">
									Email
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="email" name="EMAIL_ADDRESS" value="<?php echo $EMAIL_ADDRESS; ?>">
								</div>
							</div>
							
						</div>
						<div class="row">
						
							<div class="col-md-4">
								<!-- People -->
								<span class="txt9">
									Blood Group
								</span>
								
								<div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<!-- Select2 -->
									<select class="selection-1" name="BLOOD_GROUP_NO" id="BLOOD_GROUP_NO">
										 <option value = "<?php echo $BLOOD_GROUP_NO; ?>"><?=$row['BLOOD_GROUP']?></option>
											<?php
												
												$s = mysqli_query($con,"SELECT * FROM blood_group");
													while($row1 = mysqli_fetch_assoc($s)){
											?>
												<option value="<?=$row1['BLOOD_GROUP_NO']?>" ><?=$row1['BLOOD_GROUP']?> </option>
											<?php } ?>
									</select>
								</div>

							</div>
							
							<div class="col-md-4">
								<!-- People -->
								<span class="txt9">
									District
								</span>
								
								<div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<!-- Select2 -->
									<select class="selection-1" name="DISTRICT_NO" id="DISTRICT_NO">
										 <option value = "<?php echo $DISTRICT_NAME; ?>"><?php echo $row['DISTRICT_NAME']; ?></option>
											<?php
												
												$s = mysqli_query($con,"SELECT * FROM gen_districts");
													while($row1 = mysqli_fetch_assoc($s)){
											?>
												<option value="<?=$row1['DISTRICT_NO']?>" ><?=$row1['DISTRICT_NAME']?> </option>
											<?php } ?>
									</select>
								</div>

							</div>
							
							<div class="col-md-4">
								<!-- People -->
								<span class="txt9">
									District
								</span>
								
								<div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<!-- Select2 -->
									<select class="selection-1" name="UPAZILA_NO" id="UPAZILA_NO">
										 <option value = "<?php echo $UPAZILA_NAME; ?>"><?php echo $row['UPAZILA_NAME']; ?></option>
											<?php
												
												$sql = "SELECT UPAZILA_NO, gen_upazila FROM gen_districts WHERE DISTRICT_NO = ".$result['DISTRICT_NO'];
													while($row1 = mysqli_fetch_assoc($s)){
											?>
												<option value="<?=$row1['UPAZILA_NO']?>" ><?=$row1['UPAZILA_NAME']?> </option>
											<?php } ?>
									</select>
								</div>

							</div>
							
						</div>
						<div class="row">
						<div class="col-md-4">
								<!-- Phone -->
								<span class="txt9">
									Contact Number
								</span>

								<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="USER_CONTACT" value="<?php echo $USER_CONTACT; ?>">
								</div>
							</div>
							<div class="col-md-4">
								<!-- Date -->
								<span class="txt9">
									Last Donate Date
								</span>

								<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="date" name="LAST_DONATE" value="<?php echo $LAST_DONATE; ?>">
								</div>
							</div>
							<div class="col-md-4">
								<!-- Phone -->
								<span class="txt9">
									Age
								</span>

								<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="number" name="USER_AGE" value="<?php echo $USER_AGE; ?>">
								</div>
							</div>
						</div>
						<div class="row">
						
						<div class="col-md-4">
								<!-- People -->
								<span class="txt9">
									Gender
								</span>
								
								<div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<!-- Select2 -->
									<select class="selection-1" name="GENDER_NO" id="GENDER_NO">
										 <option value = "<?php echo $GENDER_NO; ?>"><?php echo $GENDER; ?></option>
											<?php
												
												$s = mysqli_query($con,"SELECT * FROM gender ");
													while($row1 = mysqli_fetch_assoc($s)){
											?>
												<option value="<?=$row1['GENDER_NO']?>" ><?=$row1['GENDER']?> </option>
											<?php } ?>
									</select>
								</div>
								
							</div>
							
						</div>

						
						<div class="wrap-btn-booking flex-c-m m-t-6">
							<!-- Button3 -->
							<button type="submit" name="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
								Book Table
							</button>
						</div>
					</form>
				</div>
			</div>

			
		</div>
	</section>


<?php
								}							
  include('includes/footer.php');
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#DISTRICT_NO").on("change",function(){
            var DISTRICT_NO = $(this).val();
            if(DISTRICT_NO!= -1){
                $.post("ajax/get_upazila.php",{DISTRICT_NO:DISTRICT_NO},function(data){
                   // console.log(data.trim().length);
                    if(data.trim().length > 0){
                        $("#UPAZILA_NO").html(data);
                       /* $("#ABC").html("<option value='-1'>--Select Upazila--</option>");*/
                    }
                });


            }else{
                $("#UPAZILA_NO").html("<option value='-1'>--Select Upazila--</option>");
               
            }
        });

        
    });
</script>