<?php include('header/header.php'); ?>
<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
				<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title">Modal title</h4>
							</div>
							<div class="modal-body">
								 Widget settings form goes here
							</div>
							<div class="modal-footer">
								<button type="button" class="btn blue">Save changes</button>
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
				<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				<!-- BEGIN STYLE CUSTOMIZER -->
	
	<!-- END STYLE CUSTOMIZER -->
				<!-- BEGIN PAGE HEADER-->
				<h3 class="page-title">
				Subadmins<small></small>
				</h3>
				
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12">
						
						<!-- Begin: life time stats -->
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-user font-green-sharp"></i>
									<span class="caption-subject font-yellow-gold bold uppercase">Subadmin Listings</span>
									<span class="caption-helper"></span>
								</div>
								<div class="actions">
									<a href="<?php echo base_url('index.php/subadmin/add_subadmin'); ?>" class="btn btn-circle yellow ">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
									Add New Sub Admin</span>
									</a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-container">
									
									<table class="table table-striped table-bordered table-hover" id="1lr_table">
									<thead>
									<tr role="row" class="heading">
										
										<th width="2%">
											 Sl. No.
										</th>
										<th width="20%">
											 Name
										</th>
										<th width="20%">
											 Email
										</th>
										<th width="20%">
											Username
										</th>
                                        <th width="20%">
											Role
										</th>
										
                                        
                                       
										
										<th width="10%">
											 Actions
										</th>
                                        
                                        
									</tr>
									</thead>
									<tbody>
                                <?php
                                    if(!empty($subadmins))
                                    {
                                        $count = 0;
                                        foreach($subadmins as $admin)
                                        {
                                            $count++;
                                ?>
									<tr role="row" class="filter">
										
										<td>
											<?php echo $count; ?>
										</td>
										<td>
											<?php echo $admin->name; ?>
										</td>
										<td>
											<?php echo $admin->email; ?>
										</td>
										<td>
											<?php echo $admin->username; ?>
								        </td>
                                        <td>
											<?php echo $admin->role; ?>
								        </td>
                                        
                                       
									
                                       
                                        <td>
											<button class="btn btn-sm green-haze filter-cancel margin-bottom-5" type="button"  onClick="location.href='#'"><i class="fa fa-pencil"></i> Edit</button>
                                            
                                            <button class="btn btn-sm red filter-cancel margin-bottom-5" type="button"><i class="fa fa-times"></i> Delete</button>
										</td>
                                    </tr>
                                        <?php } ?>
                                    <?php } ?>
									
									</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- End: life time stats -->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
		</div>
		<!-- END CONTENT -->

<?php include('header/footer.php'); ?>
