<?php 
	include(_LAYOUT.'/header.php')
?>
<!-- //header-ends -->
<!-- main content start -->
<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">
        <section class="bg-light border-primary-top">
        	<form action="/create/branch" method="POST" >
				<div class="form">
					<div class="row">
						<div class="col">
							<div>
								<label>Branch</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>
						</div>                        
						<div class="col">
							<div>
								<label>Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Name" required>
                            </div>
						</div>						
					</div> <br>
                    <div class="row">
						<div class="col">
							<div>
								<label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Name" required>
                            </div>
						</div>                        
						<div class="col">
							<div>
								<label>Country</label>
                                <input class="form-control" list="countries" name="country" placeholder="Country" id="country">
                                <datalist id="countries">
                                    <?php
                                        $countries = file_get_contents('https://restcountries.eu/rest/v2/regionalbloc/au');
                                        $countries = json_decode($countries, true);
                                    
                                        foreach($countries as $country){ ?>
                                            <option value="<?=$country['name']?>"><?=$country['nativeName']?> (<?=$country['callingCodes']['0']?>)</option>
                                            <?php
                                        }
                                    ?>
                                </datalist>
                            </div>
						</div>						
					</div>
					<div class="space">
						<center>
							<button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
							<button type="submit" class="btn btn-success">Create</button>
						</center>
					</div>
				</div>				
			</form>

        </section>	
		<!-- modals -->		
			<?php include (_LAYOUT.'/create-ticket.php'); ?>
		<!-- //modals -->
	</div>
	<!-- //content -->
</div>
<!-- main content end-->
</section>
<?php include(_LAYOUT.'/footer.php') ?>