<?php include 'include/header.php';?>
<?php $table_heading = "Change Password";?>
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>
<?php
	if(isset($_POST['update']))
	{
		$OLD_PASS = md5(trim($_POST['OLD_PASS']));
		$NEW_PASS1 = trim($_POST['NEW_PASS1']);
		$NEW_PASS2 = trim($_POST['NEW_PASS2']);
		$USER_NO = $_SESSION['user']['USER_NO'];
		$sql = "SELECT * FROM `gen_users` WHERE `PASSWORD` = '$OLD_PASS' AND `USER_NO` = '$USER_NO'";
		$query = mysqli_query($con,$sql);
		$row_count = mysqli_num_rows($query);
		
		if($row_count == 1)
		{
			if(strlen($NEW_PASS1) < 6)
			{
				$mgs = "Password too short! Password Length at least 6 characters.";
				$class = "red_color alert alert-warning alert-dismissable col-md-6";
			}
			elseif (!preg_match("#[0-9]+#", $NEW_PASS1)) {
				$mgs = "Password must include at least one number!";
				$class = "red_color alert alert-warning alert-dismissable col-md-6";
			}
			elseif (!preg_match("#[a-zA-Z]+#", $NEW_PASS1)) {
				$mgs = "Password must include at least one letter!";
				$class = "red_color";
			}    
			elseif($NEW_PASS1 == $NEW_PASS2)
			{
				$NEW_PASS = md5($NEW_PASS1);
				$sql = "UPDATE `gen_users` SET `PASSWORD`= '$NEW_PASS' WHERE `USER_NO` = '$USER_NO'";
				$result = mysqli_query($con,$sql);
				if($result)
				{
					$mgs = "Password Change Successfully!";
					$class = "green_color alert alert-success col-md-6 alert-dismissable";
				}
				else
				{
					$mgs = "Password Change Faild!";
					$class = "red_color alert alert-warning alert-dismissable col-md-6";
				}
			}
			else
			{
				$mgs = "New Password does not match!";
				$class = "red_color alert alert-warning alert-dismissable col-md-6";
			}
		}
		else
		{
			$mgs = "Old Password does not match!";
			$class = "red_color alert alert-warning alert-dismissable col-md-6";	
		}
	}
	else
	{
		$class = "";
		$mgs = "";
	}
?>

     <form class="cmxform form-horizontal " id="signupForm" method="post" action="" >
     <div class="form-group " <?php if($mgs=="")echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-1 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><?=$mgs?></div>
            <div>
                <input type="hidden" name="address_id" value="<?=$result['address_id']?>"   />
            </div>
        </div>
        <div class="form-group ">
            <label for="location" class="control-label col-lg-3">Old Password  </label>
            <div class="col-lg-4">
                <input type="password" class=" form-control" id="" name="OLD_PASS" type="text" required style="" >
                
            </div>
        </div>
        <div class="form-group ">
            <label for="location" class="control-label col-lg-3">New Password  </label>
            <div class="col-lg-4">
                <input type="password" class=" form-control" id="" name="NEW_PASS1" type="text"  style="" >
            </div>
        </div>
        <div class="form-group ">
            <label for="contact" class="control-label col-lg-3">Confirm Password </label>
            <div class="col-lg-4">
                <input type="password" class=" form-control" id="" name="NEW_PASS2" type="text" required style="" >
                
            </div>
        </div>
         <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" name="update" value="Change Password" />
                
            </div>
        </div>
       
    </form>
                                
<?php include 'include/body-bottom.php';?>
<?php include 'include/footer.php';?>
