<?php 
	include(_LAYOUT.'/header.php')
?>
<!-- //header-ends -->
<!-- main content start -->
<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">
		<section class="bg-light">
			<div class="row p-2">
				<div class="col">
					<div class="welcome-msg pt-3 pb-4">
						<h1 class="text-tertiary">Basic Information</h1>
						<div class="row  p-3">
							<div class="col form-group">
								<label for="name">Branch Name</label>
								<input class='form-control' type="text" name="branch" id="branch" disabled>
							</div>
						</div>
						<div class="row p-3">
							<div class="col input-group">
								<span class="input-group-addon">
									<i class="lnr lnr-phone"></i>
								</span>
								<input class="form-control" type="text" name="phone" id="phone">
							</div>
							<div class="col"></div>
						</div>
					</div>
				</div>
				<div class="col">
				<div class="welcome-msg pt-3 pb-4">
						<h1 class="text-tertiary">hi</h1>
					</div>
				</div>
			</div>

		</section>
	</div>
	<!-- //content -->
</div>
<!-- main content end-->
</section>
<?php include(_LAYOUT.'/footer.php') ?>