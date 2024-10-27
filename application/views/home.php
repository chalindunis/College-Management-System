
<?php include("inc/header.php");?>

	<div class="hero-image">
	<div class="container">
		<div class="jumbotron">
			<div class="hero-text">
			<h1 style="text-align: center; color: black; padding: 100px 2px 100px 2px;">Welcome to the College Management System</h1>
			<!-- <h2 class="display-5" style="text-align: center; color: black;">Welcome to College Managaement System!</h2> -->
			</div>
		</div>		
	</div>
	</div>

	<div class="container">
		<div class="jumbotron">
			<hr>
			<p>Please login to continue</p>
			<hr> <!-- horizontal rule -->
			<div class="my-4">
				<div class="row">
					<?php if($chkAdminExist>0):?> <!--check for admin registered-->
						
					<?php else:?> <!--dont display reg button only when admin registered-->
						<div class="col-lg-4">
							<?php echo anchor("welcome/adminRegister", "ADMIN REGISTER", ['class'=>'btn btn-primary']
							);?>
						</div>	

					<?php endif;?>
						<div class="col-lg-4">
							<?php echo anchor("welcome/Login", "ADMIN LOGIN", ['class'=>'btn btn-primary']
							);?>
						</div>
					
				</div>
			</div>
		</div>		
	</div>

<?php include("inc/footer.php");?>