<?php 
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
			<form action="create-ticket" method="POST" id="createTicket" onsubmit="return getContent()">
				<!-- message sent success -->
				<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				</div>
				<!-- sent message -->
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<select type="text" name="department" class="form-control" title="select department" id="department" required>
								<option value="" hidden>select department</option>
								<?php
									$client_department = $department->client_department(BRANCH);
									foreach($client_department as $id => $value){?>
										<option value="<?=$id?>"><?=$value?></option>
										<?php
									}
								?>
							</select>
						</div>
						<div class="col">
							<select type="text" name="urgency" class="form-control" title="select urgency" required id="urgency">
								<option value="" hidden>urgency</option>
								<option value="3">Normal</option>
								<option value="2">High</option>
								<option value="1">Very High</option>
							</select>
						</div>
					</div><br>
					<div class="row">
						<div class="col">
							<input type="text" name="subject" class="form-control" placeholder="Ticket Subject" id="subject" required>
						</div>
					</div><br>
					<div id="create"></div>
					<div class="row">
						<div class="col">
							<input type="text" name="message" id="message" required hidden></textarea>
						</div>
					</div><br>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" id="save" class="btn btn-success">Submit Ticket</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
	var quill = new Quill('#create', {
		theme: 'snow',
		placeholder: 'write the message here ...',
		modules: {
			toolbar: [
				['bold', 'italic'],
				['link', 'blockquote', 'code-block', 'image'],
				[{ list: 'ordered' }, { list: 'bullet' }]
        	]
		}
	});
</script>
<script>
	//ajax form submissions
	    $(document).ready(function () {
	       $('#save').on('click', function () {
            	$("#save").attr("disabled", "disabled");
				document.getElementById("message").value = document.getElementsByClassName("ql-editor")[0].innerHTML;
				var department = $('#department').val();
				var urgency = $('#urgency').val();
				var subject = $('#subject').val();
	        	var message = $('#message').val();
	           if (department != "") {
	               //confirm('in here everything is right');
	               $.ajax({
	                   url: "create-ticket",
                       type: "POST",
	                    data: {
	                       department: department,
						   urgency: urgency,
						   subject: subject,
	                       message: message
	                	},
	                	cache: false,
	            	   success: function (dataResult) {
	        	           var dataResult = JSON.parse(dataResult);
	                       if (dataResult.statusCode == 200) {
	                            $("#save").removeAttr("disabled");
	                            $('#createTicket').find('input:text').val('');
								$(".ql-editor").empty();
                                $("#success").show();
	                            $('#success').html('message sent!');
	                            setTimeout(function() {
	                                $( "#success" ).hide();
	                            }, 2000);
	                        } else if (dataResult.statusCode == 201) {
	                            $("#save").removeAttr("disabled");
	                            alert("Error occured !");
	                        }
	                    }
	                });
	            } else {
	                alert('Please fill all the field !');
	            }
	        });
	    });
</script>