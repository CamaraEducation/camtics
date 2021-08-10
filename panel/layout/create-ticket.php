<?php //include(Department.'/department.php');
$department = new Department ?>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Create a Ticket</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="create-ticket" method="POST" >
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<select type="text" name="department" class="form-control" title="select department" required>
								<option value="" hidden>select department</option>
								<?php
									$client_department = $department->client_department();
									foreach($client_department as $id => $value){?>
										<option value="<?=$id?>"><?=$value?></option>
										<?php
									}
								?>
							</select>
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
		</div>
	</div>
</div>