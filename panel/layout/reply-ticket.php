<!-- Modal -->
<div class="modal fade" id="replyTicketModal" tabindex="-1" role="dialog" aria-labelledby="replyTicketModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="replyTicketModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
	//ajax form submissions
        $(document).ready(function () {
            $('#butsave').on('click', function () {
                $("#butsave").attr("disabled", "disabled");
                var ticket = "<?=$ticket_id;?>";
                var message = $('#message').val();
                if (message != "") {
                    //alert('in here everything is right');
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
                                $("#success").show();
                                $('#success').html('message sent!');
                                setTimeout(function() {
                                    $( "#success" ).hide();
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