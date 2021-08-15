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
					<th scope="col" class="bg-warning text-center">OPEN</th>
					<th scope="col" class="bg-primary text-center">ACTIVE</th>
					<th scope="col" class="bg-secondary text-center">CLOSED</th>
					<th scope="col" class="text-center">ACTION</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$departments = new Department;
					$departments = $departments -> fetch_departments();
				
					foreach($departments as $department){ ?>
						<tr>
							<td><?=$no++?></td>
							<td><?=$department['name']?></td>
							<td><?=$department['description']?></td>
							<td><?=$department['branch']?></td>
							<td class="bg-warning text-center"><?=$department['open']?></td>
							<td class="bg-primary text-center"><?=$department['active']?></td>
							<td class="bg-secondary text-center"><?=$department['closed']?></td>
							<td class="bg-light text-center">
								<a href="/manage/department.<?=$department['id']?>" title="manage department">
									<i class="fa fa-cog"></i> &nbsp;
								</a>
								<a href="/view/department.<?=$department['id']?>" title="view department">
									<i class="fa fa-eye text-blue"></i> &nbsp;
								</a>
								<a href="/delete/department.<?=$department['id']?>" title="Delete department">
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