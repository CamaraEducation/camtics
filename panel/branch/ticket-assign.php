<!-- Modal -->
<div class="modal fade" id="assignTicketCenter" tabindex="-1" role="dialog" aria-labelledby="assignTicketCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="assignTicketLongTitle">Assign ticket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
        </button>
      </div>
      <form id="assignTicket" method="POST">
        <div class="modal-body">
            <!-- ticket assigned successfully -->
				<div class="alert alert-success alert-dismissible" id="assignsuccess" style="display:none;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				</div>
            <!-- ticket assigned successfully -->
            <div class="row">
                <div class="col">
                    <select class="form-control" id="user" name="user" placeholder="select agent">
                        <option value="" hidden>Select user</option>
                        <?php
                            $department_user = new Staff;
                            $department_user = $department_user -> department_staff(BRANCH, $ticket['dep_id']);
                            foreach($department_user as $staff){ ?>
                                <option value='<?=$staff['id']?>'><?=$staff['username']?></option><?php
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="butassign" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
	//ajax form submissions
	    $(document).ready(function () {
	       $('#butassign').on('click', function () {
            	$("#butassign").attr("disabled", "disabled");
	        	var ticket  = "<?=$ticket_id;?>";
	        	var user    = $('#user').val();
	           if (message != "") {
	               $.ajax({
	                   url: "/assign/ticket",
                       type: "POST",
	                    data: {
	                       ticket: ticket,
	                       user: user
	                	},
	                	cache: false,
	            	   success: function (dataResult) {
	        	           var dataResult = JSON.parse(dataResult);
	                       if (dataResult.statusCode == 200) {
	                            $("#butassign").removeAttr("disabled");
                                $("#assignsuccess").show();
	                            $('#assignsuccess').html('User successfully assigned!');
	                            setTimeout(function() {
	                                $( "#assignsuccess" ).hide();
	                            }, 2000);
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