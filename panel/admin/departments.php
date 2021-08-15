<?php include(_LAYOUT.'/header.php'); ?>
<!-- //header-ends -->
<!-- main content start -->
<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">
		<section class="back-light">
		<table class="table">
			<thead class="thead-light table-striped table-hover">
				<tr>
					<th scope="col">#</th>
					<th scope="col">NAME</th>
					<th scope="col">DESCRIPTION</th>
					<th scope="col">BRANCH</th>
					<th scope="col" class="bg-warning">OPEN</th>
					<th scope="col" class="bg-primary">ACTIVE</th>
					<th scope="col" class="bg-secondary">CLOSED</th>
					<th scope="col">ACTION</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
		</section>
		<!-- modals -->		
			<?php include (_LAYOUT.'/create-ticket.php'); ?>
		<!-- //modals -->
	</div>
	<!-- //content -->
</div>
<!-- main content end-->
</section>
<?php include(_LAYOUT.'/footer.php') ?>