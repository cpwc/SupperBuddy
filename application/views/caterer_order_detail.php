<?php $this->load->view('header'); ?>

<?php $this->load->view('nav'); ?>

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
				Caterer <small>Order Detail</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="index.html">Caterer</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Order Detail</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="portlet blue-hoki box">
						<div class="portlet-title">
							<div class="caption">
							<i class="fa fa-cogs"></i>Order Information
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
								<i class="fa fa-cogs"></i>Sub Orders
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-responsive">
								<table class="table table-hover table-bordered table-striped">
									<thead>
										<tr>
											<th>
												Food
											</th>
											<th>
												Quantity
											</th>
											<th>
												Price
											</th>
											<th>
												Ordered by
											</th>
											<th>
												USENET ID
											</th>
											<th>
												Created at
											</th>
											<th>
												Updated at
											</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($details as $detail) { ?>
										<tr>
											<td><?php echo $detail->food_name; ?></td>
											<td><?php echo $detail->quantity; ?></td>
											<td>$<?php echo number_format($detail->price, 2); ?></td>
											<td><?php echo $detail->student_name; ?></td>
											<td><?php echo $detail->ordered_by; ?></td>
											<td><?php echo $detail->created_at; ?></td>
											<td><?php echo $detail->updated_at; ?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
			<!-- <input type="hidden" name="caterer_id" value="" id="caterer-id"> -->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php $this->load->view('footer'); ?>