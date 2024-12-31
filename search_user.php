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

	<!-- Our Story -->
	<section class="bg2-pattern p-t-116 p-b-110 t-center p-l-15 p-r-15">
		<span class="tit2 t-center">
			Blood Group Are shown By Search
		</span>

		<h3 class="tit3 t-center m-b-35 m-t-5">
			.......
		</h3>

	</section>
					<div class="col-lg-3" style="margin-left: 545px;">
						<div class="learnedu-sidebar">
							<div class="search">
								<form method="GET" class="form" action="search_user.php">
									<input name="search" type="text" placeholder="Search ...">
									<button type="submit" name="submit" class="button"><i class="fa fa-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					
	<section class="section-chef bgwhite p-t-115 p-b-95">
		<div class="container t-center">

			<section class="courses single section">
			<div class="container">
				<div class="row">
				<?php 
					
						if(isset($_GET['submit'])){
							$search = $_GET['search'] ;
							$sql = mysqli_query($con,"SELECT * FROM my_gore_db LEFT JOIN gen_districts ON gen_districts.DISTRICT_NO=my_gore_db.DISTRICT_NO LEFT JOIN gen_upazila ON gen_upazila.UPAZILA_NO=my_gore_db.UPAZILA_NO LEFT JOIN blood_group ON blood_group.BLOOD_GROUP_NO=my_gore_db.BLOOD_GROUP_NO LEFT JOIN gender ON gender.GENDER_NO =my_gore_db.GENDER_NO WHERE CONCAT_WS('', BLOOD_GROUP) LIKE '%$search%'");
							$rowcount=mysqli_num_rows($sql);
							
					?>
					<h2> You Have Searched For <span style="color: red"><b><?php echo $search; ?></b></span> Blood Group</h2>
					<?php 
						if($rowcount == '0'){
								echo '<h4 style="color: red">No result</h4>';
							}
							else
					?>
					<div class="col-12">
						<div class="single-main">
							<div class="row">
								<div class="col-lg-4 col-12">
									<!-- Course Features -->
									</div>
									
								</div>	
							</div>	
							<div class="row">
									<div class="col-12">
									<div class="course-required">
									
									   <table class="table table-bordered table-striped table-hover">
									   	<thead>
									   	<tr>
										  <th>No.</th>
									   	  <th>First Name</th>
									      <th>Last Name</th>
									      <th>Email Adress</th>
										  <th>District</th>
									      <th>Contact</th>
										  <th>Gender</th>
									      <th>Age</th>
									      
									      
									      
									     </tr>
									     </thead>
									     <tbody>
										 <?php 

											$i=1;
											while($row= mysqli_fetch_assoc($sql))
											{   
											 
											  ?>
															 
									     <tr>
									     	  <td> <li><span><?=$i++?></span></li> </td>
										      <td><?=$row['FIRST_NAME']?></td>
										      <td><?=$row['LAST_NAME']?></td>
										      <td><?=$row['EMAIL_ADDRESS']?></td>
											  <td><?=$row['DISTRICT_NAME']?></td>
											  <td><?=$row['USER_CONTACT']?></td>
										      <td><?=$row['GENDER']?></td>
										      <td><?=$row['USER_AGE']?></td>
										      
										 </tr>
											<?php	} } ?>
										 <tbody>

										</table>
                                    
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		</div>
	</section>

<?php

  include('includes/footer.php');
?>