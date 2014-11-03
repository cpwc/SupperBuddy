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
				<?php echo form_open('catererorder/search'); ?>
				<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-search"></i>Search Tools
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
								<div class="form-body">
									<div class="row search-form-default">
										<div class="col-md-12">
											
												<div class="input-group" style="width:50%">
													<div class="input-cont">
														<input type="text" placeholder="Search by Hall.." name="hall" class="form-control"/>
													</div>
												</div>
										
										</div>
									</div>
									<br>
									<div class="row search-form-default">
										<div class="col-md-12">
												<div class="input-group" style="width:50%">
													<div class="input-cont" >
														<input type="text" placeholder="Search by Status.." name="status" class="form-control"/>
													</div>
												</div>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<input type="submit" value="Search" class="btn purple"><i class="fa fa-search"></i></input>
										</div>
									</div>
								</div>
						
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
										 Status
									</th>
									<th>
										 Created by
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
										<td><?php echo $order->id; ?></td>
										<td><?php echo $order->status; ?></td>
										<td><?php echo $order->created_by; ?></td>
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
				<!-- <input type="hidden" name="caterer_id" value="" id="caterer-id"> -->
				<?php echo form_close(); ?>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php $this->load->view('footer'); ?>