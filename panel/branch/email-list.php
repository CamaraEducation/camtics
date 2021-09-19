<?php 
	include(_LAYOUT.'/header.php');
	$x=array("blue","amber","red","green","success", 'info', 'secondary');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="/assets/css/emailbox.css">
<!-- //header-ends -->
<!-- main content start -->
<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">
		<div class="container">
		<section class="content inbox">
			<div class="container-fluid">       
				<div class="row clearfix">
					<div class="col-md-12 col-lg-12 col-xl-12">
						<ul class="mail_list list-group list-unstyled"> <?php
							$emails = ImapClient::get_message();
							foreach($emails as $email){ 
								$y=rand(0,6);?>
								<li class="list-group-item unread">
									<div class="media">
										<div class="pull-left">
											<div class="controls">
												<div class="checkbox">
													<input type="checkbox" id="basic_checkbox_2">
													<label for="basic_checkbox_2"></label>
												</div>
												<a href="javascript:void(0);" class="favourite col-amber hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star"></i></a>
											</div>
											<div class="thumb hidden-sm-down m-r-20"> <img src="assets/images/xs/avatar2.jpg" class="rounded-circle" alt=""> </div>
										</div>
										<div class="media-body">
											<div class="media-heading">
												<a href="#" class="m-r-10"><?=substr($email['subject'], 0, 50)?></a>
												<span class="badge bg-<?=$x[$y]?>"><?=$email['from_name']?></span>
												<small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017"><?=substr($email['date'], 5, 11)?></time><i class="zmdi zmdi-attachment-alt"></i> </small>
											</div>
											<p class="msg"><?=substr(strip_tags($email['html']), 0, 140)?></p>                                
										</div>
									</div>
								</li><?php
							} ?>
						</ul>
					</div>
				</div>
			</div>
		</section>
		</div>
	</div>
	<!-- //content -->
</div>
<!-- main content end-->
</section>
<?php include(_LAYOUT.'/footer.php') ?>