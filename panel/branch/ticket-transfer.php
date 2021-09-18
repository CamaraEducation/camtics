<!-- Modal -->
<div class="modal fade" id="transferTicketCenter" tabindex="-1" role="dialog" aria-labelledby="transferTicketCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="transferTicketLongTitle">Transfer ticket</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
	  </div>
	  <form id="transferTicket" method="POST">
		<div class="modal-body">
			<!-- ticket transfered successfully -->
				<div class="alert alert-success alert-dismissible" id="transfersuccess" style="display:none;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				</div>
			<!-- ticket transfered successfully -->
			<div class="row">
				<div class="col">
					<select class="form-control" id="department" name="department" placeholder="select agent">
						<option value="" hidden>Select Department</option>
						<?php
							$client_department = Department::client_department(BRANCH);
							foreach($client_department as $id => $value){?>
								<option value="<?=$id?>"><?=$value?></option>
							<?php
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" id="buttransfer" class="btn btn-primary">Save changes</button>
		</div>
	  </form>
	</div>
  </div>
</div>

<script>
	//ajax form submissions
		$(document).ready(function () {
		   $('#buttransfer').on('click', function () {
				$("#buttransfer").attr("disabled", "disabled");
				var ticket  = "<?=$ticket_id;?>";
				var department    = $('#department').val();
			   if (department != "") {
				   $.ajax({
					   url: "/transfer/ticket",
					   type: "POST",
						data: {
						   ticket: ticket,
						   department: department
						},
						cache: false,
					   success: function (dataResult) {
						   var dataResult = JSON.parse(dataResult);
						   if (dataResult.statusCode == 200) {
								$("#buttransfer").removeAttr("disabled");
								$("#transfersuccess").show();
								$('#transfersuccess').html('Ticket Succesfully Transferred!');
								setTimeout(function() {
									$( "#transfersuccess" ).hide();
								}, 2000);
							} else if (dataResult.statusCode == 201) {
								alert("Error occured !");
								$("#buttransfer").removeAttr("disabled");
							}
						}
					});
				} else {
					alert('Please fill all the field !');
					$("#buttransfer").removeAttr("disabled");
				}
			});
		});
</script>