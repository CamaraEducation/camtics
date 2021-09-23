<?php 
	include(_LAYOUT.'/header.php');
	$user = User::fetch_user($id);
?>
<!-- main content start -->
<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">
		<section class="bg-light">
			<div class="row p-3">
				<div class="col">
					<fieldset>
						<legend class="text-tertiary">Basic Information</legend>
						<form>
							<div class="row">
								<div class="col width-m-3">
									<label for="username">Username:</label>
									<input class="form-control" type="text" id="mname" value="<?=$user['username']?>" disabled>
								</div>							
								<div class="col width-m-3">
									<label for="org">Organization</label>
									<input type="text" class="form-control" id="organization" value="<?=Organization::user_org($user['organization'])?>" disabled>
								</div>
							</div> <div class="space"></div>
							<div class="row">
								<div class="col width-m-3">
									<label for="fname">First Name:</label>
									<input class="form-control" type="text" name="fname" value="<?=$user['fname']?>" id="fname">
								</div>
								<div class="col width-m-3">
									<label for="lname">Last Name:</label>
									<input class="form-control" type="text" name="lname" value="<?=$user['lname']?>" id="lname">
								</div>
							</div> <div class="space"></div>
							<div class="row">
								<div class="col width-m-3">
									<label for="phone">Phone:</label>
									<input class="form-control" type="text" name="phone" value="<?=$user['phone']?>" id="lname">
								</div>
								<div class="col width-m-3">
									<label for="email">Email</label>
									<input class="form-control" type="text" name="email" value="<?=$user['email']?>" id="lname">
								</div>
							</div>
							<div class="space"></div>
							<div class="row">
								<div class="col width-m-3">
									<input class="form-control btn-primary" type="submit" value="save">
								</div>
							</div>
						</form>
					</fieldset>
					<div class="space"></div>
					<fieldset>
						<form>
							<div class="row">
								<div class="col width-m-3">
									<label for="phone">Profile Photo:</label>
									<input class="form-control" type="file" name="image" id="image">
								</div>
								<div class="col width-m-3">
									<label for="phone"></label>
									<input class="form-control btn-primary" type="submit" value="change photo" name="image" id="image">
								</div>
							</div>
						</form>
					</fieldset>
				</div>
				<div class="space"></div>
				<div class="col">
					<fieldset>
						<legend>Security Details</legend>
						<form>
							<div class="row">
								<div class="col width-m-3 input-group">
									<label for="phone">2FA Authenitication:</label>
									<input type="radio" name="2fa" value="checked" id="2fa">
								</div>
							</div><div class="space"></div>
							<div class="row">
								<div class="col width-m-3">
									<label for="phone">Current Password:</label>
									<input class="form-control" type="text" name="phone" placeholder="current password" id="cpass">
								</div>
							</div><div class="space"></div>
							<div class="row">
								<div class="col width-m-3">
									<label for="phone">New Password:</label>
									<input class="form-control" type="text" name="phone" placeholder="new password" id="npass">
								</div>
								<div class="col width-m-3">
									<label for="email">Confirm Password</label>
									<input class="form-control" type="text" name="email" placeholder="confirm password" id="cnpass">
								</div>
							</div><div class="space"></div>
							<div class="row">
								<div class="col width-m-3">
									<input class="form-control btn-primary" type="submit" value="save">
								</div>
							</div>
						</form>
					</fieldset>
				</div>
			</div>

		</section>
	</div>
	<!-- //content -->
</div>
<!-- main content end-->
</section>
<?php include(_LAYOUT.'/footer.php') ?>