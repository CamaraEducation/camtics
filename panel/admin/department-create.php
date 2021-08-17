<?php 
	include(_LAYOUT.'/header.php')
?>
<!-- //header-ends -->
<!-- main content start -->
<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">
        <section class="bg-light">
        <form action="create-ticket" method="POST" >
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="col">
                                <input type="text" name="subject" class="form-control" placeholder="Department's Name" required>
                            </div>
						</div>
						<div class="col">
							<select type="text" name="urgency" class="form-control" title="select urgency" required>
								<option value="" hidden>urgency</option>
								<option value="3">Normal</option>
								<option value="2">High</option>
								<option value="1">Very High</option>
							</select>
						</div>
					</div><br>
					<div class="row">
						<div class="col">
							<input type="text" name="subject" class="form-control" placeholder="Ticket Subject" required>
						</div>
					</div><br>
					<div class="row">
						<div class="col">
							<textarea type="text" name="message" class="form-control" placeholder="Enter Ticket Details" minlegth="160" required></textarea>
						</div>
					</div><br>
					<div class="row">
						<div class="col">
							<input type="file" name="file" class="form-control" placeholder="Attachment">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Submit Ticket</button>
				</div>
			</form>

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