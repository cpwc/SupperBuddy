<?php $this->load->view('student_header'); ?>

<?php $this->load->view('student_nav'); ?>

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
				SubOrder <small>Place Order</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Student</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="index.html">Sub Order</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Create</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<!--Start subOrder-->
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="portlet blue-hoki box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>Student Information
							</div>
						</div>
						<div class="portlet-body">
							<div class="row static-info">
								<div class="col-md-2 name">
									Name:
								</div>
								<div class="col-md-7 value">
									<?php echo $student->student_name; ?>
								</div>
							</div>
							<div class="row static-info">
								<div class="col-md-2 name">
									Student ID:
								</div>
								<div class="col-md-7 value">
									<?php echo $student->matric_no; ?>
								</div>
							</div>
							<div class="row static-info">
								<div class="col-md-2 name">
									Email:
								</div>
								<div class="col-md-7 value">
									<?php echo $student->email; ?>
								</div>
							</div>
							<div class="row static-info">	
								<div class="col-md-2 name">
									Phone Number:
								</div>
								<div class="col-md-7 value">
									<?php echo $student->phone; ?>
								</div>
							</div>
							<div class="row static-info">
								<div class="col-md-2 name">
									Residence:
								</div>
								<div class="col-md-7 value">
									<?php echo $student->residence_name; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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
											<div class="table-toolbar">
												<div class="row">
													<div class="col-md-12">
														<div class="btn-group pull-right">
															<button id="new_item" class="btn green">
																Add New Item <i class="fa fa-plus"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
											<?php echo form_open('suborder/create/' . $order->id); ?>
												<div class="table-container">
													<table class="table table-striped table-bordered table-hover" id="datatable_products">
														<thead>
															<tr role="row" class="heading">
																<th>
																	Food
																</th>
																<th>
																	Price
																</th>
																<th>
																	Quantity
																</th>
																<th>
																	Edit
																</th>
																<th>
																	Delete
																</th>
															</tr>
														</thead>
														<tbody>
														</tbody>
													</table>
												</div>
												<input type="hidden" id="caterer_id" name="caterer_id" value="<?php echo $order->caterer_id; ?>">
												<div class="table-toolbar">
													<div class="row">
														<div class="col-md-12">
															<div class="btn-group pull-right">
																<input type="submit" class="btn blue" value="Create Order">
															</div>
														</div>
													</div>
												</div>
											<?php echo form_close(); ?>
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
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php $this->load->view('student_footer'); ?>