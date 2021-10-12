<?php 
	include(_LAYOUT.'/header.php');
	$branch = Branch::fetch_branch();
?>
<!-- //header-ends -->
<!-- main content start -->
<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">
		<section class="bg-light">

			<!-- message sent success -->
			<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			</div>
			<!-- sent message -->

			<div class="row p-2">
				<div class="col width-m-3">
					<div class="row p-3">
						<div class="col form-group">
							<label for="fname">First Name</label>
							<input class='form-control' placeholder="first name" type="text" name="fname" id="fname">
						</div>
					</div>
					<div class="row p-3">
						<div class="col form-group">
							<label for="phone">Last Name</label>
							<input class="form-control" type="text" placeholder="last name" name="lname" id="lname">
						</div>
					</div>
					<div class="row p-3">
						<div class="col form-group">
							<label for="phone">Phone</label>
							<input class="form-control" type="text" placeholder="phone number" name="phone" id="phone">
						</div>
					</div>
					<div class="row p-3">
						<div class="col form-group">
							<label for="phone">Email</label>
							<input class="form-control" type="text" placeholder="email" name="email" id="email">
						</div>
					</div>
				</div>
				<div class="col width-m-3">
					<div class="row p-3">
						<div class="col form-group">
							<label for="imap">Username</label>
							<input class="form-control" type="text" placeholder="username" name="username" id="username">
						</div>
					</div>
					<div class="row p-3">
						<div class="col form-group">
							<label for="role">Role</label>
							<select class="form-control" id="role" name="role" placeholder="select agent">
								<option value="" hidden>Select user Role</option>
								<option value="3">Head of Department</option>
								<option value="4">Normal Staff</option>								
							</select>
						</div>
					</div>
					<div class="row p-3">
						<div class="col form-group">
							<label for="department">Department</label>
							<select class="form-control" id="department" name="department" placeholder="select agent">
								<option value="" hidden>Select Department</option>
								<?php
									$client_department = Department::client_department(BRANCH);
									foreach($client_department as $id => $value){?>
										<option value="<?=$id?>"><?=$value?></option>
									<?php
									}
								?>
							</select>
						</div>
					</div>
					<div class="row p-3">
						<div class="col form-group">
							<label for="branch">Branch</label>
							<select type="text" id="branch" name="branch" class="form-control" title="select Branch" disabled required>
								<?php 
								$branch = Branch::fetch_branch(); ?>
								<option selected value="<?=$branch['id']?>"><?=$branch['country']?></option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row p-3">
				<div class="col form-group"><br>
					<button class='btn btn-primary width-5' style="margin: 0 38%; width: 20vw;" type="submit" id="submit">create</button>
				</div>
			</div>
		</section>
	</div>
</div>
<!-- main content end-->
</section>

<script>
	//ajax form submissions
	    $(document).ready(function () {
	       $('#submit').on('click', function () {
            	$("#submit").attr("disabled", "disabled");
	        	var fname    = $('#fname').val();
	        	var lname    = $('#lname').val();
	        	var phone    = $('#phone').val();
	        	var email    = $('#email').val();
	        	var username = $('#username').val();
	        	var role   	 = $('#role').val();
	        	var branch   = $('#branch').val();
	        	var department = $('#department').val();
	           if (fname != "" && lname != "" && phone != "" && email != "" && username != "" && role != "" && branch != "" && department != "") {
	               $.ajax({
	                   url: "/add/user/new",
                       type: "POST",
	                    data: {
							fname	 : fname,
							lname	 : lname,
							phone	 : phone,
							email	 : email,
							username : username,
							role	 : role,
							branch	 : branch,
							department : department
	                	},
	                	cache: false,
	            	   success: function (dataResult) {
	        	           var dataResult = JSON.parse(dataResult);
	                       if (dataResult.statusCode == 200) {
								//$(".form-control").empty();
                                $("#success").show();
	                            $('#success').html('User successfully created !');
	                            setTimeout(function() {
	                                $( "#success" ).hide();
	                            }, 2000);
	                        } else if (dataResult.statusCode == 201) {
	                            alert("Error occured !");
	                        }
							$("#submit").removeAttr("disabled");
	                    }
	                });
	            } else {
					$("#submit").removeAttr("disabled");
	                alert('Please fill all the field !');
	            }
	        });
	    });
</script>
<?php include(_LAYOUT.'/footer.php') ?>