
<?php include("inc/header.php");?>
	<div class="container">
		<div class="jumbotron">
			<h2 class="display-5" style="text-align: center;">Welcome to College Managaement System!</h2>
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
							<?php echo anchor("welcome/login", "ADMIN LOGIN", ['class'=>'btn btn-primary']
							);?>
						</div>
					
				</div>
			</div>
		</div>		
	</div>

<?php include("inc/footer.php");?>