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
						<!--form method='post' action="#" -->
							<div class="row">
								<div class="col width-m-3">
									<label for="username">Username:</label>
									<input class="form-control" type="text" id="uname" name="uname" value="<?=$user['username']?>" disabled>
								</div>							
								<div class="col width-m-3">
									<label for="org">Organization</label>
									<input type="text" class="form-control" id="organization" name="organization" value="<?=Organization::user_org($user['organization'])?>" disabled>
								</div>
							</div> <div class="space"></div>
							<div class="row">
								<div class="col width-m-3">
									<label for="fname">First Name:</label>
									<input class="form-control" type="text" name="fname" id="fname" value="<?=$user['fname']?>" id="fname">
								</div>
								<div class="col width-m-3">
									<label for="lname">Last Name:</label>
									<input class="form-control" type="text" name="lname" id="lname" value="<?=$user['lname']?>" id="lname">
								</div>
							</div> <div class="space"></div>
							<div class="row">
								<div class="col width-m-3">
									<label for="phone">Phone:</label>
									<input class="form-control" type="text" name="phone" id="phone" value="<?=$user['phone']?>" id="lname">
								</div>
								<div class="col width-m-3">
									<label for="email">Email</label>
									<input class="form-control" type="text" name="email" id="email" value="<?=$user['email']?>" id="lname">
								</div>
							</div>
							<div class="space"></div>
							<div class="row">
								<div class="col width-m-3">
									<input class="form-control btn-primary" id="butsave" type="submit" value="save">
								</div>
							</div>
						<!--/form-->
					</fieldset>
					<div class="space"></div>
					<fieldset>
						<form action="/edit/user/<?=$user['username']?>/avatar" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col width-m-3">
								<input type="file" class="form-control" name="media" id="fileToUpload">
							</div>
							<div class="col width-m-3">
								<input type="submit" class="form-control btn-primary" value="Upload Image" name="submit">
							</div>
						</div>
						</form>
					</fieldset>
				</div>
				<div class="space"></div>
				<div class="col">
					<fieldset>
						<legend>Security Details</legend>
						<!--form method='post' action="#" -->
							<!--div class="row">
								<div class="col width-m-3 input-group">
									<label for="phone">2FA Authenitication:</label>
									<input type="radio" name="2fa" value="checked" id="2fa">
								</div>
							</div><div class="space"></div-->
							<div class="row">
								<div class="col width-m-3">
									<label for="phone">Current Password:</label>
									<input class="form-control" type="text" name="cpass" placeholder="current password" id="cpass">
								</div>
							</div><div class="space"></div>
							<div class="row">
								<div class="col width-m-3">
									<label for="phone">New Password:</label>
									<input class="form-control" type="text" name="npass" placeholder="new password" id="npass">
								</div>
								<div class="col width-m-3">
									<label for="email">Confirm Password</label>
									<input class="form-control" type="text" name="cnpass" placeholder="confirm password" id="cnpass">
								</div>
							</div><div class="space"></div>
							<div class="row">
								<div class="col width-m-3">
									<button class="form-control btn-primary" id="butpass">Submit</button>
								</div>
							</div>
						<!--/form>
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
<script>
	//ajax form submissions
		$(document).ready(function () {
		   $('#butsave').on('click', function () {
				$("#butsave").attr("disabled", "disabled");
				var uname = $('#uname').val();
				var fname = $('#fname').val();
				var lname = $('#lname').val();
				var phone = $('#phone').val();
				var email = $('#email').val();
			   if (fname != "" || lname != "" || phone != "" || email != "" || uname != "") {
				   $.ajax({
					   url: "/edit/user/"+uname+"/basic",
					   type: "POST",
						data: {
						   uname: uname,
						   fname: fname,
						   lname: lname,
						   phone: phone,
						   email: email
						},
						cache: false,
					   success: function (dataResult) {
						   var dataResult = JSON.parse(dataResult);
						   if (dataResult.statusCode == 200) {
								//alert('succesfully changed user data')
							} else if (dataResult.statusCode == 201) {
								alert("Error occured !");
							}
						}
					});
				} else {
					alert('Please fill all the field !');
				}
				$("#butsave").removeAttr("disabled");
			});
		});
</script>
<script>
	$(document).ready(function () {
		$('#butpass').on('click', function () {
			$("#butpass").attr("disabled", "disabled");
			var cpass = $('#cpass').val();
			var npass = $('#npass').val();
			var uname = $('#uname').val();
			var cnpass = $('#cnpass').val();
		   	if (cpass != "" || npass != "" || cnpass != "" || uname != "") {
			   	if(npass === cnpass){
					$.ajax({
						url: "/edit/user/"+uname+"/pass",
						type: "POST",
						data: {
							cpass: cpass,
							npass: npass,
							uname: uname
						},
						cache: false,
						success: function (dataResult) {
							var dataResult = JSON.parse(dataResult);
							if (dataResult.statusCode == 200) {
								alert('succesfully changed user data')
							} else if (dataResult.statusCode == 201) {
								alert("Error occured !");
							}
						}
					});
				}else{
					alert('New password Password and Confirmation must be the same')
				}
			} else {
				alert('Please fill all the field !');
			}
			$("#butpass").removeAttr("disabled");
		});
	});
</script>