
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

		<section id="about-section">
			<!-- Content of the About section -->
			<p>This system is designed as a Schools & Colleges Information Management System. 
				School or College can manage student & staff detail. Here, system has two user roles admin and co-admin. 
				As an admin, add new colleges, add co-admins, add students priviledges are provided while co-admins have 
				view thier student details, update details are the Key features of the sysytem. 
				Additionally CRUD operations have been included.</p>
		</section>
	</div>

<?php include("inc/footer.php");?>