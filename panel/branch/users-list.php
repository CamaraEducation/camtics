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
					<th scope="col">DEPARTMENT</th>
					<th scope="col" class="bg-warning text-center">OPEN</th>
					<th scope="col" class="bg-primary text-center">ACTIVE</th>
					<th scope="col" class="bg-secondary text-center">CLOSED</th>
					<th scope="col">TOTAL</th>
					<th scope="col" class="text-center">ACTION</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$staffs = Staff::branch_staff(BRANCH);				
					foreach($staffs as $staff){ ?>
						<tr>
							<td><?=$no++?></td>
							<td><?=$staff['fname'].' '.$staff['lname']?></td>
							<td><?=$staff['department']?></td>
							<td class="bg-warning text-center"><?=$staff['open']?></td>
							<td class="bg-primary text-center"><?=$staff['active']?></td>
							<td class="bg-secondary text-center"><?=$staff['closed']?></td>
							<td><?=$staff['total']?></td>
							<td class="text-center">
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