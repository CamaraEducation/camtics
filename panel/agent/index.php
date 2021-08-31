<?php 
	include(_LAYOUT.'/header.php');

	// finding the number of tickets by their specifity
	$count_ticket   = new StaffTicket();
	$num_ticket		= $count_ticket->count_agent_ticket(ID);
	$total_ticket	= array_sum($num_ticket);
	$config			= config();

?>
<!-- main content start -->
<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">
		<div class="welcome-msg pt-3 pb-4">
			<h1>Hi <span class="text-primary"><?=USER?></span>, Welcome back at <?=$config['site'];?></h1>
		</div>
		<!-- statistics data -->
		<div class="statistics">
			<div class="row">
				<div class="col-xl-6 pr-xl-2">
					<div class="row">
						<div class="col-sm-6 pr-sm-2 statistics-grid">
							<div class="card card_border border-primary-top p-4">
								<i class="lnr lnr-users"> </i>
								<h3 class="text-primary number"><?=$num_ticket['open'];?></h3>
								<p class="stat-text">Open Tickets</p>
							</div>
						</div>
						<div class="col-sm-6 pl-sm-2 statistics-grid">
							<div class="card card_border border-primary-top p-4">
								<i class="lnr lnr-eye"> </i>
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
								<i class="lnr lnr-lock"> </i>
								<h3 class="text-danger number"><?=$num_ticket['closed'];?></h3>
								<p class="stat-text">Closed Tickets</p>
							</div>
						</div>
						<div class="col-sm-6 pl-sm-2 statistics-grid">
							<div class="card card_border border-primary-top p-4">
								<i class="lnr lnr-envelope"> </i>
								<h3 class="text-danger number"><?=$total_ticket;?></h3>
								<p class="stat-text">All Tickets</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- modals -->		
			<?php include (_LAYOUT.'/create-ticket.php'); ?>
		<!-- //modals -->
	</div>
	<!-- //content -->
</div>
<!-- main content end-->
</section>
<?php include(_LAYOUT.'/footer.php'); ?>