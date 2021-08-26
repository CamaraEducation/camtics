<?php 
	include(_LAYOUT.'/header.php');
    $ticket_id   = substr(($_SERVER['REQUEST_URI']), 13);

    //Innitiate the Ticket instance
    $user_ticket = new Ticket;
    $user_ticket = $user_ticket->specific_ticket($ticket_id);

    //Initiate the conversation instance
    $messages    = new Conversation;
    $messages    = $messages->chat($ticket_id);

    //fetch ticket details
    foreach($user_ticket as $_ticket){
        $ticket  = $_ticket;
    }

    
?>
<!-- //header-ends -->
<!-- main content start -->
<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">
		<section class="bg-light">
            <div class='row glass lg-width'>
                <div class="col-sm-1">
                    <center>
                        <img src="<?=$ticket['photo']?>" style="margin:auto;" class="rounded-circle" alt="">
                        <h6><?=$ticket['username']?></h6>
                    </center>
                </div>
                <div class="col">
                    <h6>
                        <span class="text-bold">Update :</span> 
                        <span class="text-secondary"><?=$ticket['update']?> days</span>
                    </h6>
                    <h6>
                        <span class="text-bold">Subject :</span> 
                        <span class="text-secondary"><?=$ticket['subject']?></span>
                    </h6>
                    
                    <span id="dots"></span>
                    <span id="more" style="display: none;">
                    <h6>
                        <span class="text-bold">Message :</span> 
                        <span class="text-secondary"><?=$ticket['content']?></span>
                    </h6>
                        <h6><span class="text-bold">Branch :</span> <span class="text-secondary"><?=$ticket['branch']?></span></h6>
                        <h6><span class="text-bold">organization :</span> <span class="text-secondary"><?=$ticket['organization']?></span></h6>
                        <h6><span class="text-bold">Status :</span> <span class="text-secondary"><?=$ticket['status']?></span></h6>
                        <h6><span class="text-bold">Opened :</span> <span class="text-secondary"><?=$ticket['time']?></span></h6>
                    </span>
                    <p onclick="readMore()" class="text-right" id="readmore">Expand <i class="fas fa-plus-circle"></i></p>
                </div>
            </div>
            <div class='space'></div>

            <!-- ticket conversation -->
            <div class='row glass lg-width overflow h-30' id="chat" onload="gotoBottom()">
                <div class='col'>
                    <ul class="chat">
                        <!-- client -->
                        <?php
                            foreach($messages as $message){ 
								if($message['datedifference']==0){
									$time = $message['timedifference'];
								}else if($message['datedifference']==1){
									$time = $message['datedifference']." day ago";
								}else{
									$time = $message['datedifference']." days ago";
								}
								if($message['init']==2){?>
								<li class="left clearfix"><span class="chat-img pull-left">
									<img src="<?=$message['photo']?>" alt="User Avatar" class="rounded-circle" />
								</span>
									<div class="chat-body clearfix">
										<div class="">
											<strong class="primary-font text-primary"><?=$message['username']?></strong> <small class="pull-right text-muted">
												<span class="glyphicon glyphicon-time"></span><?=$time?></small>
										</div>
										<p class="">
										<?=$message['message']?>
										</p>
									</div>
								</li><?php
								}else{ ?>

								<!-- agent -->
								<li class="right clearfix"><span class="chat-img pull-right">
									<img src="<?=$message['photo']?>" alt="User Avatar" class="rounded-circle" />
								</span>
									<div class="chat-body clearfix">
										<div class="">
											<small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?=$time?></small>
											<strong class="pull-right primary-font text-primary"><?=$message['username']?></strong>
										</div>
										<p class="">
										<?=$message['message']?>
										</p>
									</div>
								</li> <?php }
							} 
						?>
                    </ul>
                </div>
            </div>            
            <!-- ticket conversation -->
            
            <div class="space"></div>
            <!-- message sent success --
            <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            </div>
            <!-- message sent success --
            <div class='row glass lg-width''>
                <div class="col">
                    <form id="conversation" name="form1" method="POST">
                    <div class="input-group">
                        <input id="ticket" name="ticket" value="< ?=substr(($_SERVER['REQUEST_URI']), 13);?>" hidden>
                        <input name="message" id="message" type="text" class="form-control input-sm" placeholder="Type your message here..." required>
                        <span class="input-group-btn"> &nbsp;
                            <button class="btn btn-primary btn-sm" id="butsave">Send</button>
                        </span>
                    </div>
                </div>
            </div>

			<!-- floating buttons -->
			<a href="#" class="float" id="menu-share">
				<i class="fa fa-share my-float"></i>
			</a>
			<ul class="ul">
				<li class="li" title="transfer ticket"><a class="a" href="#">
					<i class="fa fa-upload my-float"></i>
				</a></li>
				<li class="li" title="assign ticket"><a class="a" href="#">
					<i class="fa fa-user my-float"></i>
				</a></li>
				<li class="li" title="Reply"><a class="a" data-toggle="modal" data-target="#replyTicketModal" href="#">
					<i class="fa fa-pencil my-float"></i>
				</a></li>
			</ul>
			
		</section>
		<script src="/assets/js/custom.js"></script>
        
		<!-- modals -->		
		<?php 
			include(_LAYOUT.'/create-ticket.php'); 
			include(_LAYOUT.'/reply-ticket.php');
		?>
		<!-- //modals -->
	</div>
	<!-- //content -->
</div>
<!-- main content end-->
</section>
<?php include(_LAYOUT.'/footer.php') ?>