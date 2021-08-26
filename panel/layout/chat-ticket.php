<?php 
    //Initiate the conversation instance
	$ticketId   = substr(($_SERVER['REQUEST_URI']), 17);
    $messages    = new Conversation;
    $messages    = $messages->chat($ticketId);
?>
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
										<div class="bg-chat chat-left">
											<?=$message['message']?>
										</div>
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
										<div class="bg-chat chat-right">
											<?=$message['message']?>
										</div>
									</div>
								</li> <?php }
							} 
						?>
                    </ul>