<?php $this->load->view('student_header'); ?>

<?php $this->load->view('student_nav'); ?>

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Order <small>Create Order</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Student</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Order</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">#<?php echo $order->id; ?></a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<?php echo form_open('order/create'); ?>
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- Begin: life time stats -->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>Order
							</div>
							<div class="actions">
								<?php echo anchor('order', '<i class="fa fa-reply"></i> Back', array('class' => 'btn yellow')); ?>
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="portlet blue-hoki box">
										<div class="portlet-title">
											<div class="caption">
												<i class="fa fa-cogs"></i>Initiator Information
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
							<!--Start Caterer-->
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="portlet green-meadow box">
										<div class="portlet-title">
											<div class="caption">
												<i class="fa fa-cogs"></i>Caterer
											</div>
										</div>
										<div class="portlet-body">
											<div class="row static-info">
												<div class="col-md-2 name">
													 Order ID:
												</div>
												<div class="col-md-7 value">
													 <?php echo $order->id; ?>
												</div>
											</div>
											<div class="row static-info">
												<div class="col-md-2 name">
													 Caterer:
												</div>
												<div class="col-md-7 value">
													 <?php echo $caterer->name; ?>
												</div>
											</div>
											
											<div class="row static-info">
												<div class="col-md-2 name">
													 Email:
												</div>
												<div class="col-md-7 value">
													 <?php echo $caterer->email; ?>
												</div>
											</div>
											<div class="row static-info">
												<div class="col-md-2 name">
													 Phone Number:
												</div>
												<div class="col-md-7 value">
													 <?php echo $caterer->phone; ?>
												</div>
											</div>
											<div class="row static-info">
												<div class="col-md-2 name">
													 Description:
												</div>
												<div class="col-md-7 value">
													<?php echo $caterer->description; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--End Caterer-->
							<!--Start subOrder-->
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="portlet yellow-crusta box">
										<div class="portlet-title">
											<div class="caption">
												<i class="fa fa-cogs"></i>Sub Order
											</div>
											<div class="actions">
												<?php echo anchor('food', '<i class="fa fa-pencil"></i> Place Order', array('class' => 'btn btn-success')); ?>
											</div>

										</div>
										<div class="portlet-body">
										 
											<div class="table-responsive">
												<table class="table table-hover table-bordered table-striped">
												<thead>
												<tr>
													<th>
														 SubOrder ID
													</th>
													<th>
														 Created by
													</th>
													<th>
														 Updated at
													</th>
													<th>
														 Paid
													</th>
													<th>
														 Total Price
													</th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<?php foreach ($suborders as $suborder) { ?>
													<tr>
														<td><?php echo $suborder->id; ?></td>
														<td><?php echo $suborder->ordered_by; ?></td>
														<td><?php echo $suborder->updated_at; ?></td>
														<td><?php echo $suborder->paid; ?></td>
														<td>$<?php echo number_format($suborder->total_price, 2); ?></td>
													</tr>
													<?php } ?>
													
												</tr>															
												</tbody>
												</table>
											</div>
											
											
										</div>
									</div>
								</div>
							</div>
							<!--End subOrder-->
						</div>
					</div>
					<!-- End: life time stats -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
			<?php echo form_close(); ?>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php $this->load->view('student_footer'); ?>