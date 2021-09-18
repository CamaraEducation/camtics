<?php 
	include(_LAYOUT.'/header.php');

	// finding the number of tickets by their specifity
	$num_ticket		= Ticket::count_tickets(BRANCH);
	$total_ticket	= array_sum($num_ticket);
	$config			= config();

?>
<!-- main content start -->
<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">
		<div class="welcome-msg pt-3 pb-4">
			<h1 class="text-tertiary">Hi <span class="text-primary text-bold"><?=USER;?></span>, Welcome back at <?=$config['site'];?></h1>
		</div>
		<!-- statistics data -->
		<div class="statistics">
			<div class="row">
				<div class="col-xl-6 pr-xl-2">
					<div class="row">
						<div class="col-sm-6 pr-sm-2 statistics-grid">
							<div class="card card_border border-primary-top p-4">
								<i class="lnr lnr-sad"> </i>
								<h3 class="text-primary number"><?=$num_ticket['open'];?></h3>
								<p class="stat-text">Open Tickets</p>
							</div>
						</div>
						<div class="col-sm-6 pl-sm-2 statistics-grid">
							<div class="card card_border border-primary-top p-4">
								<i class="lnr lnr-neutral"> </i>
								<h3 class="text-secondary number"><?=$num_ticket['active'];?></h3>
								<p class="stat-text">Pending Tickets</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 pl-xl-2">
					<div class="row">
						<div class="col-sm-6 pl-sm-2 statistics-grid">
							<div class="card card_border border-primary-top p-4">
								<i class="lnr lnr-smile"> </i>
								<h3 class="text-danger number"><?=$num_ticket['closed'];?></h3>
								<p class="stat-text">Closed Tickets</p>
							</div>
						</div>
						<div class="col-sm-6 pl-sm-2 statistics-grid">
							<div class="card card_border border-primary-top p-4">
								<i class="lnr lnr-envelope"> </i>
								<h3 class="text-warning number"><?=$total_ticket;?></h3>
								<p class="stat-text">All Tickets</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="welcome-msg pt-3 pb-4">
			<h1 class="text-tertiary">General Branch Summary</h1>
		</div>
		<!-- statistics data -->
		<div class="statistics">
			<div class="row">
				<div class="col-xl-6 pr-xl-2">
					<div class="row">
						<div class="col-sm-6 pr-sm-2 statistics-grid">
							<div class="card card_border border-secondary-top p-4">
								<i class="lnr lnr-users"> </i>
								<?php $staff_count = Staff::count_all(BRANCH); ?>
								<h3 class="text-success number"><?=$staff_count['total'];?></h3>
								<p class="stat-text">Staffs</p>
							</div>
						</div>
						<div class="col-sm-6 pl-sm-2 statistics-grid">
							<div class="card card_border border-secondary-top p-4">
								<i class="lnr lnr-dice"> </i>
								<?php $dep_count = Department::count_all(BRANCH); ?>
								<h3 class="text-success number"><?=$dep_count['total'];?></h3>
								<p class="stat-text">Departments</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 pl-xl-2">
					<div class="row">
						<div class="col-sm-6 pl-sm-2 statistics-grid">
							<div class="card card_border border-secondary-top p-4">
								<i class="lnr lnr-apartment"> </i>
								<h3 class="text-success number"><?=$num_ticket['closed'];?></h3>
								<p class="stat-text">Organizations</p>
							</div>
						</div>
						<div class="col-sm-6 pl-sm-2 statistics-grid">
							<div class="card card_border border-secondary-top p-4">
								<i class="lnr lnr-phone"> </i>
								<h3 class="text-success number">0</h3>
								<p class="stat-text">SMS Balance</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- //statistics data -->
	</div>
	<!-- //content -->
</div>
<!-- main content end-->
</section>
<?php include(_LAYOUT.'/footer.php'); ?>