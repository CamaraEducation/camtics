<script>
    function getContent(){
		document.getElementById("message").value = document.getElementsByClassName("ql-editor")[0].innerHTML;
    }
</script>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="replyTicketModal" tabindex="-1" role="dialog" aria-labelledby="replyTicketModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="replyTicketModalLongTitle">Write your message</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true"></span>
				</button>
			</div>
			<form id="conversation" name="form1" method="POST" onsubmit="return getContent()">
				<div class="modal-body">
					<div id="editor"></div>					
					<div class="input-group">
						<input id="message" name="message" type="text" class="form-control input-sm" placeholder="Type your message here..." hidden required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="refreshChat()">Close</button>
					<button type="submit" id="butsave" data-dismiss="modal" class="btn btn-primary">Reply</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Initialize Quill editor -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
	var quill = new Quill('#editor', {
		theme: 'snow',
		placeholder: 'write the message here ...',
		modules: {
			toolbar: [
            ["bold", "italic", "underline", "strike"],
            [{ "list": "ordered" }, { "list": "bullet" }],
            ["link", "image", "video"],
            ["clean"]
        ]
		}
	});
</script>

<script>
	//ajax form submissions
	    $(document).ready(function () {
	       $('#butsave').on('click', function () {
            	$("#butsave").attr("disabled", "disabled");
				document.getElementById("message").value = document.getElementsByClassName("ql-editor")[1].innerHTML;
	        	var ticket = "<?=$ticket_id;?>";
	        	var message = $('#message').val();
	           if (message != "") {
	               $.ajax({
	                   url: "/reply/ticket",
                       type: "POST",
	                    data: {
	                       ticket: ticket,
	                       message: message
	                	},
	                	cache: false,
	            	   success: function (dataResult) {
	        	           var dataResult = JSON.parse(dataResult);
	                       if (dataResult.statusCode == 200) {
	                            $("#butsave").removeAttr("disabled");
	                            $('#conversation').find('input:text').val('');
								$(".ql-editor").empty();
                                $('#replyTicketModal').modal('hide');
	                        } else if (dataResult.statusCode == 201) {
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