<?php $this->load->view('header'); ?>

<?php $this->load->view('nav'); ?>

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
				Caterer <small>View Order</small>
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
						<a href="#">View Order</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<!-- START SEARCH -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-search"></i>Search Order
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<?php echo form_open('caterer/orders', array('class' => 'form-horizontal')); ?>
							<div class="form-body">
								<div class="form-group">
									<div class="col-md-3 control-label">
										 Residence:
									</div>
									<div class="col-md-9">
										 <div class="form-group">
											<select id="residence" name="residence" class="form-control input-large select2me" data-placeholder="Select...">
												<option value=""></option>
												<?php foreach ($residences as $residence) { ?>
												<option value="<?php echo $residence->name; ?>"><?php echo $residence->name; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-3 control-label">
										 Status:
									</div>
									<div class="col-md-9">
										 <div class="form-group">
											<select id="status" name="status" class="form-control input-large select2me" data-placeholder="Select...">
												<option value=""></option>
												<option value="OPEN">OPEN</option>
												<option value="CLOSED">CLOSED</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<button type="Search" class="btn green">Search</button>
									</div>
								</div>
							</div>
							<?php echo form_close(); ?>
							<!-- END FORM-->
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>
			<!-- END SEARCH -->
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="portlet blue-hoki box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>Order Information
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
												Residence
											</th>
											<th>
												Created by
											</th>
											<th>
												Status
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
										<?php foreach ($orders as $order) { ?>
										<tr>
											<td>
												<?php echo anchor('caterer/orders/' . $order->id, $order->id); ?>
											</td>
											<td><?php echo $order->residence_name; ?></td>
											<td><?php echo $order->name; ?></td>
											<td><?php echo $order->status; ?></td>
											<td><?php echo $order->created_at; ?></td>
											<td><?php echo $order->updated_at; ?></td>
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
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php $this->load->view('footer'); ?>