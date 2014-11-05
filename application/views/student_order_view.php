<?php $this->load->view('student_header'); ?>

<?php $this->load->view('student_nav'); ?>

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Order <small>All Order</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Student</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Orders</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<?php $this->load->view('flash_message') ?>
			<!--Start Order List-->
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="portlet yellow-crusta box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>Order
							</div>
							<div class="actions btn-set">
								<?php echo anchor('order/create', '<i class="fa fa-plus"></i> Create', array('class' => 'btn green')); ?>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-responsive">
								<table class="table table-hover table-bordered table-striped">
								<thead>
								<tr>
									<th>
										 Order ID
									</th>
									<th>
										 Caterer
									</th>
									<th>
										 Initated by
									</th>
									<th>
										 Residence
									</th>
									<th>
										 Created at
									</th>
									<th>
										 Updated at
									</th>
									<th>
										 Status
									</th>
									<th></th>
								</tr>
								</thead>
								<tbody>
									<?php foreach ($orders as $order) { ?>
									<tr>
										<td>
											<?php echo anchor('order/' . $order->id, $order->id); ?>
										</td>
										<td><?php echo $order->caterer_name; ?></td>
										<td><?php echo $order->student_name; ?></td>
										<td><?php echo $order->residence_name; ?></td>
										<td><?php echo $order->created_at; ?></td>
										<td><?php echo $order->updated_at; ?></td>
										<td>
											<?php
												if ($order->status == 'OPEN') {
													echo '<span class="label label-primary">' . $order->status . '</span>';
												} else {
													echo '<span class="label label-danger">' . $order->status . '</span>';
												}
											?>
										</td>
										<td>
											<?php echo anchor('order/edit/' . $order->id, 'Edit', array('class' => 'btn btn-sm yellow filter-submit')); ?>
											<?php echo anchor('order/delete/' . $order->id, '<i class="fa fa-times"></i> Remove', array('class' => 'btn btn-sm red filter-cancel', 'onclick' => "return confirm('Are you sure want to delete?');")) ?>
										</td>
									</tr>
									<?php } ?>
								</tbody>
								</table>
							</div>
							
							
						</div>
					</div>
				</div>
			</div>
			<!--End Order List-->
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php $this->load->view('student_footer'); ?>