<?php $this->load->view('student_header'); ?>

<?php $this->load->view('student_nav'); ?>

<!-- BEGIN CONTAINER -->
<div class="page-container">
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
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Order <small>Place Order</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Place Order</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- Begin: life time stats -->
					<div class="portlet">
						<div class="portlet-title">
						</div>
						<div class="portlet-body">
							<div class="tabbable">
								<ul class="nav nav-tabs nav-tabs-lg">
									<li class="active">
										<a href="#tab_1" data-toggle="tab">
										Place Order </a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1">
										<!--Start subOrder-->
										<div class="row">
											<div class="col-md-12 col-sm-12">
												<div class="portlet yellow-crusta box">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-cogs"></i>Sub Order Details
														</div>
													</div>
													<div class="portlet-body">
													<!-- BEGIN PAGE CONTENT-->
													<div class="row">
														<div class="col-md-12">
															<!-- Begin: life time stats -->
															<div class="portlet">
																<div class="portlet-body">
																  <div id="food-details"> 
																	<div class="table-container">
																		<table class="table table-striped table-bordered table-hover" id="datatable_products">
																		<thead>
																		<tr role="row" class="heading">
																			<th width="10%">
																				 ID
																			</th>
																			<th width="15%">
																				 Food
																			</th>
																			<th width="15%">
																				 Price
																			</th>
																			<th width="10%">
																				 Quantity
																			</th>
																			<th width="10%">
																				 Actions
																			</th>
																		</tr>
																		<tr role="row" class="filter">
																			<td>
																				1
																			</td>
																			<td>
																				<div class="form-group">
																						<select id="food" name="food" class="form-control input-large select2me" data-placeholder="Select...">
																							<option value=""></option>
																							<?php foreach ($foods as $food) { ?>
																							<option value="<?php echo $food->id; ?>"><?php echo $food->name; ?></option>
																							<?php } ?>
																						</select>
																				</div>
																			</td>
																			<td>
																				 <div id="food-price" class="col-md-7 value">
																				 </div>
																			</td>
																			<td>
																				<div class="margin-bottom-5">
																					<input type="text" class="form-control form-filter input-sm" name="quantity" placeholder="QTY"/>
																				</div>
																				
																			</td>
																			
																			<td>
																				
																					<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-submit"></i> Add</button>
																				
																				<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Remove</button>
																			</td>
																		</tr>
																		</thead>
																		<tbody>
																		</tbody>
																		</table>
																	 </div>
																   </div>
																</div>
															</div>
															<!-- End: life time stats -->
														</div>
													</div>
													<!-- END PAGE CONTENT-->

													</div>
												</div>
											</div>
											
										</div>
										<!--End subOrder-->
									</div>
								</div>
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
</div>
<!-- END CONTAINER -->

<?php $this->load->view('student_footer	'); ?>