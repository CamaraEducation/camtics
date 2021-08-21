<?php 
	include(_LAYOUT.'/header.php');

	// finding the number of tickets by their specifity
	$count_ticket   = new ClientTicket();
	$num_ticket		= $count_ticket->count_ticket(ID);
	$total_ticket	= array_sum($num_ticket);
	$config			= config();

?>
<!-- main content start -->
<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">
		<div class="welcome-msg pt-3 pb-4">
			<h1>Hi <span class="text-primary"><?=USER?></span>, Welcome back at <?=$config['site'];?></h1>
		</div>
		<!-- statistics data -->
		<div class="statistics">
			<div class="row">
				<div class="col-xl-6 pr-xl-2">
					<div class="row">
						<div class="col-sm-6 pr-sm-2 statistics-grid">
							<div class="card card_border border-primary-top p-4">
								<i class="lnr lnr-users"> </i>
								<h3 class="text-primary number"><?=$num_ticket['open'];?></h3>
								<p class="stat-text">Open Tickets</p>
							</div>
						</div>
						<div class="col-sm-6 pl-sm-2 statistics-grid">
							<div class="card card_border border-primary-top p-4">
								<i class="lnr lnr-eye"> </i>
								<h3 class="text-secondary number"><?=$num_ticket['active'];?></h3>
								<p class="stat-text">Pending Tickets</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 pl-xl-2">
					<div class="row">
						<div class="col-sm-6 pl-sm-2 statistics-grid">
							<div class="card card_border border-primary-top p-4">
								<i class="lnr lnr-lock"> </i>
								<h3 class="text-danger number"><?=$num_ticket['closed'];?></h3>
								<p class="stat-text">Closed Tickets</p>
							</div>
						</div>
						<div class="col-sm-6 pl-sm-2 statistics-grid">
							<div class="card card_border border-primary-top p-4">
								<i class="lnr lnr-envelope"> </i>
								<h3 class="text-danger number"><?=$total_ticket;?></h3>
								<p class="stat-text">All Tickets</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- //statistics data -->
		<!-- chatting -->
		<div class="data-tables">
			<div class="row">
				<div class="col-lg-12 chart-grid mb-4">
					<div class="card card_border p-4">
						<div class="card-header chart-grid__header pl-0 pt-0">
							Chatting
						</div>
						<div class="messaging">
							<div class="inbox_msg">
								<div class="inbox_people">
									<div class="headind_srch">
										<div class="srch_bar">
											<div class="stylish-input-group">
												<input type="text" class="search-bar" placeholder="Search Chat">
												<span class="input-group-addon">
												<button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
												</span> 
											</div>
										</div>
									</div>
									<div class="inbox_chat">
										<div class="chat_list active_chat">
											<div class="chat_people">
												<div class="chat_img"> <img src="/assets/images/avatar5.jpg" alt="Alexander" class="img-fluid">
												</div>
												<div class="chat_ib">
													<h5>Alexander <span class="chat_date">1 hour ago</span></h5>
													<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
												</div>
											</div>
										</div>
										<div class="chat_list">
											<div class="chat_people">
												<div class="chat_img"> <img src="/assets/images/avatar3.jpg" alt="Anderson" class="img-fluid">
												</div>
												<div class="chat_ib">
													<h5>Anderson <span class="chat_date">5 hours ago</span></h5>
													<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
												</div>
											</div>
										</div>
										<div class="chat_list">
											<div class="chat_people">
												<div class="chat_img"> <img src="/assets/images/avatar5.jpg" alt="Isabella" class="img-fluid">
												</div>
												<div class="chat_ib">
													<h5>Isabella <span class="chat_date">Yesterday</span></h5>
													<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
												</div>
											</div>
										</div>
										<div class="chat_list">
											<div class="chat_people">
												<div class="chat_img"> <img src="/assets/images/avatar4.jpg" alt="Charlotte" class="img-fluid">
												</div>
												<div class="chat_ib">
													<h5>Charlotte <span class="chat_date">Mar 04</span></h5>
													<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
												</div>
											</div>
										</div>
										<div class="chat_list">
											<div class="chat_people">
												<div class="chat_img"> <img src="/assets/images/avatar2.jpg" alt="Davidson" class="img-fluid">
												</div>
												<div class="chat_ib">
													<h5>Davidson <span class="chat_date">Feb 18</span></h5>
													<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
												</div>
											</div>
										</div>
										<div class="chat_list">
											<div class="chat_people">
												<div class="chat_img"> <img src="/assets/images/avatar1.jpg" alt="Elexa ker" class="img-fluid">
												</div>
												<div class="chat_ib">
													<h5>Elexa ker <span class="chat_date">Feb 04</span></h5>
													<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
												</div>
											</div>
										</div>
										<div class="chat_list">
											<div class="chat_people">
												<div class="chat_img"> <img src="/assets/images/avatar4.jpg" alt="Charlotte" class="img-fluid">
												</div>
												<div class="chat_ib">
													<h5>Charlotte <span class="chat_date">Jan 28</span></h5>
													<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="mesgs">
									<div class="msg_history">
										<div class="incoming_msg">
											<div class="incoming_msg_img"> <img src="/assets/images/avatar5.jpg" alt="Alexander"
												class="img-fluid"> </div>
											<div class="received_msg">
												<div class="received_withd_msg">
													<p>Coming along nicely, we've got a Lorem ipsum dolor sit amet consectetur adipisicing elit.
													</p>
													<span class="time_date"> 10:05 AM | Mar 9</span>
												</div>
											</div>
										</div>
										<div class="outgoing_msg">
											<div class="sent_msg">
												<p>Great start, I've added some Lorem ipsum dolor sit amet. </p>
												<span class="time_date"> 12:15 PM | Mar 9</span>
											</div>
										</div>
										<div class="incoming_msg">
											<div class="incoming_msg_img"> <img src="/assets/images/avatar5.jpg" alt="Alexander"
												class="img-fluid"> </div>
											<div class="received_msg">
												<div class="received_withd_msg">
													<p>Sed ut perspiciatis unde omnis iste natus error sit</p>
													<span class="time_date"> 09:16 AM | Yesterday</span>
												</div>
											</div>
										</div>
										<div class="outgoing_msg">
											<div class="sent_msg">
												<p>But I must explain to you.</p>
												<span class="time_date"> 03:15 PM | Today</span>
											</div>
										</div>
										<div class="incoming_msg">
											<div class="incoming_msg_img"> <img src="/assets/images/avatar5.jpg" alt="Alexander"
												class="img-fluid"> </div>
											<div class="received_msg">
												<div class="received_withd_msg">
													<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
														voluptatum deleniti atque corrupti quos dolores.
													</p>
													<span class="time_date"> 03:16 PM | Today</span>
												</div>
											</div>
										</div>
									</div>
									<div class="type_msg">
										<div class="input_msg_write">
											<input type="text" class="write_msg" placeholder="Type a message" />
											<button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o"
												aria-hidden="true"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- //chatting -->
		<!-- modals -->		
			<?php include (_LAYOUT.'/create-ticket.php'); ?>
		<!-- //modals -->
	</div>
	<!-- //content -->
</div>
<!-- main content end-->
</section>
<?php include(_LAYOUT.'/footer.php'); ?>