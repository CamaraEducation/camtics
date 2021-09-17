<?php 
	include(_LAYOUT.'/header.php')
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<style>
	.badge {
    border-radius: 8px;
    padding: 4px 8px;
    text-transform: uppercase;
    font-size: .7142em;
    line-height: 12px;
    background-color: transparent;
    border: 1px solid;
    margin-bottom: 5px;
    border-radius: .875rem;
}
.bg-green {
    background-color: #50d38a !important;
    color: #fff;
}
.bg-blush {
    background-color: #ff758e !important;
    color: #fff;
}
.bg-amber {
    background-color: #FFC107 !important;
    color: #fff;
}
.bg-red {
    background-color: #ec3b57 !important;
    color: #fff;
}
.bg-blue {
    background-color: #60bafd !important;
    color: #fff;
}
.card {
    background: #fff;
    margin-bottom: 30px;
    transition: .5s;
    border: 0;
    border-radius: .1875rem;
    display: inline-block;
    position: relative;
    width: 100%;
    box-shadow: none;
}
.inbox .action_bar .delete_all {
    margin-bottom: 0;
    margin-top: 8px
}

.inbox .action_bar .btn,
.inbox .action_bar .search {
    margin: 0
}

.inbox .mail_list .list-group-item {
    border: 0;
    padding: 15px;
    margin-bottom: 1px
}

.inbox .mail_list .list-group-item:hover {
    background: #eceeef
}

.inbox .mail_list .list-group-item .media {
    margin: 0;
    width: 100%
}

.inbox .mail_list .list-group-item .controls {
    display: inline-block;
    margin-right: 10px;
    vertical-align: top;
    text-align: center;
    margin-top: 11px
}

.inbox .mail_list .list-group-item .controls .checkbox {
    display: inline-block
}

.inbox .mail_list .list-group-item .controls .checkbox label {
    margin: 0;
    padding: 10px
}

.inbox .mail_list .list-group-item .controls .favourite {
    margin-left: 10px
}

.inbox .mail_list .list-group-item .thumb {
    display: inline-block
}

.inbox .mail_list .list-group-item .thumb img {
    width: 40px
}

.inbox .mail_list .list-group-item .media-heading a {
    color: #555;
    font-weight: normal
}

.inbox .mail_list .list-group-item .media-heading a:hover,
.inbox .mail_list .list-group-item .media-heading a:focus {
    text-decoration: none
}

.inbox .mail_list .list-group-item .media-heading time {
    font-size: 13px;
    margin-right: 10px
}

.inbox .mail_list .list-group-item .media-heading .badge {
    margin-bottom: 0;
    border-radius: 50px;
    font-weight: normal
}

.inbox .mail_list .list-group-item .msg {
    margin-bottom: 0px
}

.inbox .mail_list .unread {
    border-left: 2px solid
}

.inbox .mail_list .unread .media-heading a {
    color: #333;
    font-weight: 700
}

.inbox .btn-group {
    box-shadow: none
}

.inbox .bg-gray {
    background: #e6e6e6
}

@media only screen and (max-width: 767px) {
    .inbox .mail_list .list-group-item .controls {
        margin-top: 3px
    }
}
</style>
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
						<ul class="mail_list list-group list-unstyled">
							<li class="list-group-item">
								<div class="media">
									<div class="pull-left">                                
										<div class="controls">
											<div class="checkbox">
												<input type="checkbox" id="basic_checkbox_1">
												<label for="basic_checkbox_1"></label>
											</div>
											<a href="javascript:void(0);" class="favourite text-muted hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star-outline"></i></a>
										</div>
										<div class="thumb hidden-sm-down m-r-20"> <img src="assets/images/xs/avatar1.jpg" class="rounded-circle" alt=""> </div>
									</div>
									<div class="media-body">
										<div class="media-heading">
											<a href="mail-single.html" class="m-r-10">Velit a labore</a>
											<span class="badge bg-blue">Family</span>
											<small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt"></i> </small>
										</div>
										<p class="msg">Lorem Ipsum is simply dumm dummy text of the printing and typesetting industry. </p>
									</div>
								</div>
							</li>
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
											<a href="mail-single.html" class="m-r-10">Simply dummy text</a>
											<span class="badge bg-amber">Shop</span>
											<small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt"></i> </small>
										</div>
										<p class="msg">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>                                
									</div>
								</div>
							</li>
							<li class="list-group-item">
								<div class="media">
									<div class="pull-left">
										<div class="controls">
											<div class="checkbox">
												<input type="checkbox" id="basic_checkbox_3">
												<label for="basic_checkbox_3"></label>
											</div>
											<a href="javascript:void(0);" class="favourite text-muted hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star-outline"></i></a>
										</div>
										<div class="thumb hidden-sm-down m-r-20"> <img src="assets/images/xs/avatar3.jpg" class="rounded-circle" alt=""> </div>
									</div>
									<div class="media-body">
										<div class="media-heading">
											<a href="mail-single.html" class="m-r-10">Velit a labore</a>
											<span class="badge bg-red">Google</span>
											<small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt"></i> </small>
										</div>
										<p class="msg"> If you are going to use a passage of Lorem Ipsum, you need to be sure</p>                                
									</div>
								</div>
							</li>
							<li class="list-group-item unread">
								<div class="media">
									<div class="pull-left">
										<div class="controls">
											<div class="checkbox">
												<input type="checkbox" id="basic_checkbox_4">
												<label for="basic_checkbox_4"></label>
											</div>
											<a href="javascript:void(0);" class="favourite text-muted hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star-outline"></i></a>
										</div>
										<div class="thumb hidden-sm-down m-r-20"> <img src="assets/images/xs/avatar4.jpg" class="rounded-circle" alt=""> </div>
									</div>
									<div class="media-body">
										<div class="media-heading">
											<a href="mail-single.html" class="m-r-10">Variations of passages</a>
											<span class="badge bg-blush">Themeforest</span>
											<small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt"></i> </small>
										</div>
										<p class="msg">There are many variations of passages of Lorem Ipsum available, but the majority </p>                                
									</div>
								</div>
							</li>
							<li class="list-group-item">
								<div class="media">
									<div class="pull-left">
										<div class="controls">
											<div class="checkbox">
												<input type="checkbox" id="basic_checkbox_5">
												<label for="basic_checkbox_5"></label>
											</div>
											<a href="javascript:void(0);" class="favourite text-muted hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star-outline"></i></a>
										</div>
										<div class="thumb hidden-sm-down m-r-20"> <img src="assets/images/xs/avatar5.jpg" class="rounded-circle" alt=""> </div>
									</div>
									<div class="media-body">
										<div class="media-heading">
											<a href="mail-single.html" class="m-r-10">Generators on the Internet</a>
											<span class="badge bg-green">Work</span>
											<small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt"></i> </small>
										</div>
										<p class="msg">LAll the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</p>                                
									</div>
								</div>
							</li>
							<li class="list-group-item">
								<div class="media">
									<div class="pull-left">
										<div class="controls">
											<div class="checkbox">
												<input type="checkbox" id="basic_checkbox_6">
												<label for="basic_checkbox_6"></label>
											</div>
											<a href="javascript:void(0);" class="favourite col-amber hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star"></i></a>
										</div>
										<div class="thumb hidden-sm-down m-r-20"> <img src="assets/images/xs/avatar6.jpg" class="rounded-circle" alt=""> </div>
									</div>
									<div class="media-body">
										<div class="media-heading">
											<a href="mail-single.html" class="m-r-10">Contrary to popular</a>
											<span class="badge bg-blush">Themeforest</span>
											<small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt"></i> </small>
										</div>
										<p class="msg">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical</p>
									</div>
								</div>
							</li>
							<li class="list-group-item">
								<div class="media">
									<div class="pull-left">
										<div class="controls">
											<div class="checkbox">
												<input type="checkbox" id="basic_checkbox_7">
												<label for="basic_checkbox_7"></label>
											</div>
											<a href="javascript:void(0);" class="favourite col-amber hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star"></i></a>
										</div>
										<div class="thumb hidden-sm-down m-r-20"> <img src="assets/images/xs/avatar7.jpg" class="rounded-circle" alt=""> </div>
									</div>
									<div class="media-body">
										<div class="media-heading">
											<a href="mail-single.html" class="m-r-10">Velit a labore</a>
											<span class="badge bg-green">Work</span>
											<small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt"></i> </small>
										</div>
										<p class="msg">Lorem Ipsum is simply dumm dummy text of the printing and typesetting industry. </p>                                
									</div>
								</div>
							</li>
							<li class="list-group-item">
								<div class="media">
									<div class="pull-left">
										<div class="controls">
											<div class="checkbox">
												<input type="checkbox" id="basic_checkbox_8" checked="">
												<label for="basic_checkbox_8"></label>
											</div>
											<a href="javascript:void(0);" class="favourite col-amber hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star"></i></a>
										</div>
										<div class="thumb hidden-sm-down m-r-20"> <img src="assets/images/xs/avatar8.jpg" class="rounded-circle" alt=""> </div>
									</div>
									<div class="media-body">
										<div class="media-heading">
											<a href="mail-single.html" class="m-r-10">Variations of passages</a>
											<span class="badge bg-blush">Themeforest</span>
											<small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt"></i> </small>
										</div>
										<p class="msg">There are many variations of passages of Lorem Ipsum available, but the majority </p>                                
									</div>
								</div>
							</li>
							<li class="list-group-item">
								<div class="media">
									<div class="pull-left">
										<div class="controls">
											<div class="checkbox">
												<input type="checkbox" id="basic_checkbox_9">
												<label for="basic_checkbox_9"></label>
											</div>
											<a href="javascript:void(0);" class="favourite text-muted hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star-outline"></i></a>
										</div>
										<div class="thumb hidden-sm-down m-r-20"> <img src="assets/images/xs/avatar9.jpg" class="rounded-circle" alt=""> </div>
									</div>
									<div class="media-body">
										<div class="media-heading">
											<a href="mail-single.html" class="m-r-10">Generators on the Internet</a>
											<span class="badge bg-green">Work</span>
											<small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt"></i> </small>
										</div>
										<p class="msg">LAll the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</p>                                
									</div>
								</div>
							</li>
							<li class="list-group-item">
								<div class="media">
									<div class="pull-left">
										<div class="controls">
											<div class="checkbox">
												<input type="checkbox" id="basic_checkbox_10">
												<label for="basic_checkbox_10"></label>
											</div>
											<a href="javascript:void(0);" class="favourite text-muted hidden-sm-down" data-toggle="active"><i class="zmdi zmdi-star-outline"></i></a>
										</div>
										<div class="thumb hidden-sm-down m-r-20"> <img src="assets/images/xs/avatar10.jpg" class="rounded-circle" alt=""> </div>
									</div>
									<div class="media-body">
										<div class="media-heading">
											<a href="mail-single.html" class="m-r-10">Velit a labore</a>
											<span class="badge bg-blue">Family</span>
											<small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">12:35 AM</time><i class="zmdi zmdi-attachment-alt"></i> </small>
										</div>
										<p class="msg">Lorem Ipsum is simply dumm dummy text of the printing and typesetting industry. </p>
									</div>
								</div>
							</li>
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