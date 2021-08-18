<?php 
	include(_LAYOUT.'/header.php')
?>
<!-- //header-ends -->
<!-- main content start -->
<div class="main-content">
	<!-- content -->
	<div class="container-fluid content-top-gap">
        <section class="bg-light border-primary-top">
        	<form action="/create/department" method="POST" >
				<div class="form">
					<div class="row">
						<div class="col">
							<div>
								<label>Department</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>
						</div>
						<div class="col">
							<div>
								<label>Branch</label>
								<select type="text" name="branch" class="form-control" title="select Branch" required>
									<option value="" hidden>Branch</option>
									<?php 
										$fetch_branch = new Branch;
										$fetched_branch = $fetch_branch->fetch_branches();
										foreach($fetched_branch as $branch){ ?>
											<option value="<?=$branch['id']?>"><?=$branch['country']?></option><?php
										}
									?>
								</select>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col">
							<div>
								<label>Description</label>
								<textarea type="text" name="description" class="form-control" placeholder="Department's Description" minlegth="160" required></textarea>
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