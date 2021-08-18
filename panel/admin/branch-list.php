<?php include(_LAYOUT.'/header.php'); ?>
<!-- //header-ends -->
<!-- main content start -->
<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">
		<section class="bg-light">
		<table class="table">
			<thead class="thead-light table-striped table-hover">
				<tr>
					<th scope="col">#</th>
					<th scope="col">NAME</th>
					<th scope="col" class="bg-warning text-center">OPEN</th>
					<th scope="col" class="bg-primary text-center">ACTIVE</th>
					<th scope="col" class="bg-secondary text-center">CLOSED</th>
					<th scope="col" class="text-center">ACTION</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$branches = new branch;
					$branches = $branches -> list_branches();
				
					foreach($branches as $branch){ ?>
						<tr>
							<td><?=$no++?></td>
							<td><?=$branch['name']?></td>
							<td class="bg-warning text-center"><?=$branch['open']?></td>
							<td class="bg-primary text-center"><?=$branch['active']?></td>
							<td class="bg-secondary text-center"><?=$branch['closed']?></td>
							<td class="text-center">
								<a href="/manage/branch.<?=$branch['id']?>" title="manage branch">
									<i class="fa fa-cog"></i> &nbsp;
								</a>
								<a href="/view/branch.<?=$branch['id']?>" title="view branch">
									<i class="fa fa-eye text-blue"></i> &nbsp;
								</a>
								<a href="/delete/branch.<?=$branch['id']?>" title="Delete branch">
									<i class="fa fa-trash text-danger"></i> &nbsp;
								</a>
							</td>
						</tr>
					<?php
					}
				?>				
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