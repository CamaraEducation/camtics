<?php 
	include(_LAYOUT.'/header.php')
?>
<!-- //header-ends -->
<!-- main content start -->
<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">
		<section class="bg-light">
            <div class="row p-3">
                <div class="col">
                    <form>
                        <div class="row">
                            <div class="col">
                                <label for="username">Username:</label>
                                <input class="form-control" type="text" id="mname" value="<?=USER?>" disabled>
                            </div>
                            <div class="col">
                                <label for="fname">First Name:</label>
                                <input class="form-control" type="text" name="fname" value="<?=FNAME?>" id="fname">
                            </div>
                            <div class="col">
                                <label for="lname">Last Name:</label>
                                <input class="form-control" type="text" name="lname" value="<?=LNAME?>" id="lname">
                            </div>
                        </div>
                        <div class="space"></div>
                        <!--CONTACT INFO -->
                        <div class="row">
                            <div class="col">
                                <label for="phone">Phone:</label>
                                <input class="form-control" type="text" name="phone" value="<?=PHONE?>" id="lname">
                            </div>
                            <div class="col">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" name="email" value="<?=EMAIL?>" id="lname">
                            </div>
                            <div class="col">
                                <label for="org">Organization</label>
                                <input type="text" class="form-control" id="organization" value="<?=Organization::user_org(ORG)?>" disabled>
                            </div>
                        </div>
                        <div class="space"></div>
                    </form>
                </div>
                <div class="col-3">
                    <div class="glass h-250 w-200" id="photo" style="background-image:url('<?= PHOTO ?>')"></div>
                </div>
            </div>

		</section>
		<!-- modals -->
		<!-- //modals -->
	</div>
	<!-- //content -->
</div>
<!-- main content end-->
</section>
<?php include(_LAYOUT.'/footer.php') ?>