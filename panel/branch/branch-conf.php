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
			<marquee behavior="" class="text-red" direction="left">section under active development</marquee>
			<div class="row p-2">
				<div class="col">
					<div class="welcome-msg pt-3 pb-4">
						<h1 class="text-tertiary">Basic Information</h1>
					</div>
					<div class="row  p-3">
						<div class="col form-group">
							<label for="name">Branch Name</label>
							<input class='form-control' value="<?=$branch['name']?>" type="text" name="branch" id="branch" disabled>
						</div>
					</div>
					<div class="row p-3">
						<div class="col form-group">
							<label for="phone">Phone</label>
							<input class="form-control" type="text" value="<?=$branch['phone']?>" name="phone" id="phone" disabled>
						</div>
					</div>
					<div class="row p-3">
						<div class="col form-group">
							<label for="phone">Email</label>
							<input class="form-control" type="text" value="<?=$branch['email']?>" name="phone" id="phone" disabled>
						</div>
					</div>
					<div class="row p-3">
						<div class="col form-group">
							<center>
								<input class="btn btn-secondary text-center" style="width: 200px;" type="submit">
							</center>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="welcome-msg pt-3 pb-4">
						<h1 class="text-tertiary">Email Information</h1>
					</div>
					<div class="row p-3">
						<div class="col form-group">
							<label for="imap">Imap server</label>
							<input class="form-control" type="text" value="<?=$branch['imap']?>" disabled name="imap" id="imap">
						</div>
					</div>
					<div class="row p-3">
						<div class="col form-group">
							<label for="smtp">smtp relay</label>
							<input class="form-control" type="text" value="<?=$branch['smtp']?>" disabled name="smtp" id="phone">
						</div>
					</div>
					<div class="row p-3">
						<div class="col form-group">
							<label for="smtp">relay pass</label>
							<input class="form-control" type="text" value="<?=md5($branch['ePass'])?>" disabled name="smtp" id="phone">
						</div>
					</div>
					<div class="row p-3">
						<div class="col form-group">
							<center>
								<input class="btn btn-secondary text-center" style="width: 200px;" type="submit">
							</center>
						</div>
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