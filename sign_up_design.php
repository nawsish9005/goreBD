<?php 
 include("includes/header.php");
 include("database.php");
?>
	<!-- Reservation -->
	<section class="section-reservation bg1-pattern p-t-100 p-b-113">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 p-b-30">
					<div class="t-center">
						<span class="tit2 t-center">
							Registration
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-2">
							Please input the forms below
						</h3>
					</div>

					<form class="wrap-form-reservation size22 m-l-r-auto" method="POST" action="sign_up_php.php">
						<div class="row">
							<div class="col-md-4">
								<!-- Name -->
								<span class="txt9">
									First Name
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="FIRST_NAME" placeholder="First Name">
								</div>
								<p class="error_message" id="first_name_error"></p>
							</div>
							<div class="col-md-4">
								<!-- Name -->
								<span class="txt9">
									Last Name
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="LAST_NAME" placeholder="Last Name">
								</div>
								<p class="error_message" id="last_name_error"></p>
							</div>

							<div class="col-md-4">
								<!-- Email -->
								<span class="txt9">
									Email
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="email" name="EMAIL_ADDRESS" placeholder="Email Address">
								</div>
								<p class="error_message" id="email_address_error"></p>
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
										 <option>--Select Group--</option>
											<?php
												$sql = "SELECT * FROM `blood_group`";
												$result = mysqli_query($con,$sql);
												while($row = mysqli_fetch_array($result)):
											?>
												<option value="<?=$row['BLOOD_GROUP_NO']?>" ><?=$row['BLOOD_GROUP']?></option>
											<?php endwhile;?>
									</select>
									<p class="error_message" id="blood_group_error"></p>
								</div>

							</div>

							<div class="col-md-4">
								<!-- Time -->
								<span class="txt9">
									District
								</span>

								<div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<!-- Select2 -->
									<select class="selection-1" name="DISTRICT_NO" id="DISTRICT_NO">
										 <option value="-1">--Select District--</option>
											<?php
												$sql = "SELECT * FROM `gen_districts`";
												$result = mysqli_query($con,$sql);
												while($row = mysqli_fetch_array($result)):
											?>
												<option value="<?=$row['DISTRICT_NO']?>" ><?=$row['DISTRICT_NAME']?></option>
											<?php endwhile;?>
									</select>
									<p class="error_message" id="district_no_error"></p>
								</div>
							</div>

							<div class="col-md-4">
								<!-- People -->
								<span class="txt9">
									Upazila/Thana
								</span>

								<div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<!-- Select2 -->
									<select class="selection-1" name="UPAZILA_NO" id="UPAZILA_NO">
										<option value="-1">--Select Upazila--</option>
									</select>
									<p class="error_message" id="upazila_no_error"></p>
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
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="USER_CONTACT" placeholder="Contact Number">
								</div>
								<p class="error_message" id="user_contact_error"></p>
							</div>
							<div class="col-md-4">
								<!-- Date -->
								<span class="txt9">
									Last Donate Date
								</span>

								<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="date" name="LAST_DONATE" placeholder="Last Donate Date">
								</div>
								<p class="error_message" id="last_donate_error"></p>
							</div>
							<div class="col-md-4">
								<!-- Phone -->
								<span class="txt9">
									Age
								</span>

								<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="number" name="USER_AGE" placeholder="Age">
								</div>
								<p class="error_message" id="user_age_error"></p>
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
										 <option>--Select Group--</option>
											<?php
												$sql = "SELECT * FROM `gender`";
												$result = mysqli_query($con,$sql);
												while($row = mysqli_fetch_array($result)):
											?>
												<option value="<?=$row['GENDER_NO']?>" ><?=$row['GENDER']?></option>
											<?php endwhile;?>
									</select>
									<p class="error_message" id="blood_group_error"></p>
								</div>

							</div>
							
							<div class="col-md-4">
								<!-- Name -->
								<span class="txt9">
									Password
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="PASSWORD" placeholder="Password">
								</div>
								<p class="error_message" id="password_error"></p>
							</div>

							<div class="col-md-4">
								<!-- Email -->
								<span class="txt9">
									Re-Type Password
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="PASSWORD2" placeholder="Re-Type Password">
								</div>
								<p class="error_message" id="re_password_error"></p>
							</div>
							
						</div>

						
						<div class="wrap-btn-booking flex-c-m m-t-6">
							<!-- Button3 -->
							<button type="submit" name="submit" ID="btnAdd" class="btn3 flex-c-m size13 txt11 trans-0-4">
								Sign Up
							</button>
						</div>
					</form>
				</div>
			</div>

			
		</div>
	</section>


<?php

  include('includes/footer.php');
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#DISTRICT_NO").on("change",function(){
            var DISTRICT_NO = $(this).val();
            if(DISTRICT_NO!= -1){
                $.post("ajax/get_upazila.php",{DISTRICT_NO:DISTRICT_NO},function(data){
                    if(data.trim().length > 0){
                        $("#UPAZILA_NO").html(data);
                    }
                });


            }else{
                $("#UPAZILA_NO").html("<option value='-1'>--Select Upazila--</option>");
               
            }
        });

        
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
    
    $("#btnAdd").on("click",function() {
        $("#first_name_error").html("&nbsp;");
        $("#last_name_error").html("&nbsp;");
        $("#email_address_error").html("&nbsp;");
        $("#blood_group_error").html("&nbsp;");
        $("#district_no_error").html("&nbsp;");
		$("#upazila_no_error").html("&nbsp;");
        $("#user_contact_error").html("&nbsp;");
        $("#last_donate_error").html("&nbsp;");
        $("#user_age_error").html("&nbsp;");
        $("#user_gender_error").html("&nbsp;");
		
		 $("#last_donate_error").html("&nbsp;");
        $("#user_age_error").html("&nbsp;");
        $("#user_gender_error").html("&nbsp;");

        $("#BANK_NAMES").attr("class","form-control");
        $("#ACCOUNT_NUMBERS").attr("class","form-control");
        $("#ADDRESSS").attr("class","form-control");
        $("#OPENING_BALANCES").attr("class","form-control");
        $("#ACCOUNT_TYPE_NOS").attr("class","form-control");
       
        var BANK_NAMES = $("#BANK_NAMES").val().trim();
        var ACCOUNT_NUMBERS = $("#ACCOUNT_NUMBERS").val().trim();
        var ADDRESSS = $("#ADDRESSS").val().trim();
        var OPENING_BALANCES = $("#OPENING_BALANCES").val().trim();
        var ACCOUNT_TYPE_NOS = $("#ACCOUNT_TYPE_NOS").val().trim();

        if(BANK_NAMES == "") {
            $("#bank_name_error").text("Bank Name is required");
            $("#BANK_NAMES").attr("class","form-control error_input");
            $("#BANK_NAMES").focus();
            return false;
        }
        if(ACCOUNT_NUMBERS == "") {
            $("#account_number_error").text("Account Number is required");
            $("#ACCOUNT_NUMBERS").attr("class","form-control error_input");
            $("#ACCOUNT_NUMBERS").focus();
            return false;
        }
        if(ADDRESSS == "") {
            $("#address_error").text("Address is required");
            $("#ADDRESSS").attr("class","form-control error_input");
            $("#ADDRESSS").focus();
            return false;
        }
        if(OPENING_BALANCES == "") {
            $("#opening_balance_error").text("Opening Balance is required");
            $("#OPENING_BALANCES").attr("class","form-control error_input");
            $("#OPENING_BALANCES").focus();
            return false;
        }
        if(ACCOUNT_TYPE_NOS == "") {
            $("#account_type_error").text("Account Type is required");
            $("#ACCOUNT_TYPE_NOS").attr("class","form-control error_input");
            $("#ACCOUNT_TYPE_NOS").focus();
            return false;
        }
        
       
    });
});

</script>