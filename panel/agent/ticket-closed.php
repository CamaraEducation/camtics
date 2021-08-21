<?php 
	include(_LAYOUT.'/header.php')
?>
<!-- main content start -->
<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">
		<section class="bg-light">
			<table class="table">
				<thead class="thead-light table-striped table-hover">
					<tr>
						<th scope="col">#</th>
						<th scope="col">BRANCH</th>
						<th scope="col">DEPARTMENT</th>
						<th scope="col">SUBJECT</th>
						<th scope="col">CONTENTS</th>
						<th scope="col">CLOSED</th>
						<th scope="col">ACTION</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						$fetch_closed_Tickets = new StafFTicket;
						$closed_tickets = $fetch_closed_Tickets->closed_tickets();
						foreach($closed_tickets as $ticket){ //$no=+1; ?>
							<tr>
								<td><?=$no++?></td>
								<td><?=$ticket['branch']?></td>
								<td><?=$ticket['department']?></td>
								<td><?=$ticket['subject']?></td>
								<td><?=$ticket['message']?></td>
								<td><?=$ticket['update']?> days</td>
								<td>
								<?php if($ticket['id']>0){ ?>	
									<a title="view the ticket" href="/view/ticket.<?=$ticket['id']?>"><i class="fas fa-eye text-primary"></i></a> &nbsp;
									<a title="reopen the ticket" href="/close/ticket.<?=$ticket['id']?>"><i class="fas fa-unlock text-success"></i></a> &nbsp;
								<?php }else{echo 'NA';} ?>
								</td>
							</tr> <?php
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