<?php 
 include("includes/header.php");
 include('database.php');
 
?>
	
	<!-- Reservation -->
	<section class="section-reservation bg1-pattern p-t-100 p-b-113">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 p-b-30">
					<div class="t-center">
						<span class="tit2 t-center">
							Sign In Section
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-2">
							Sign in
						</h3>
					</div>

					<form class="wrap-form-reservation size22 m-l-r-auto" method="POST" action="sign_in_php.php">
						
						<div class="row">
						
							<div class="col-md-4">
								<!-- Email -->
								<span class="txt9">
									Email
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="email" name="EMAIL_ADDRESS" placeholder="Email">
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
							</div>

							
						</div>

						<div class="wrap-btn-booking flex-c-m m-t-6">
							<!-- Button3 -->
							<button type="submit" name="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
								Sign In
							</button>
						</div>
					</form>
					
					<div class="wrap-btn-booking flex-c-m m-t-6">
							<span class="txt5 m-10">
								New Member?
							</span>
							<a href="sign_up_design.php" class="btn3 flex-c-m size13 txt11 trans-0-4">Sign UP</a>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php

  include('includes/footer.php');
?>