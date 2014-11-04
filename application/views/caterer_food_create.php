<?php $this->load->view('caterer_header'); ?>

<?php $this->load->view('caterer_nav'); ?>

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Caterer <small>Add Food</small>
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
						<a href="#">Add Food</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<?php echo form_open('food/create', array('class' => 'form-horizontal')); ?>
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<div class="portlet blue-hoki box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i> Food Information
							</div>
						</div>
						<div class="portlet-body form">
							<div class="form-body">
								<div class="form-group">
									<div class="col-md-3 control-label">
										Food Name:
									</div>
									<div class="col-md-9">
										<div class="input-icon right">
											<input type="text" class="form-control" name="name" id="food_name">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-3 control-label">
										Price:
									</div>
									<div class="col-md-9">
										<div class="input-icon right">
											<input type="text" class="form-control" name="price" id="food_price">
										</div>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<input type="submit" class="btn green" value="Add Food">
									</div>
								</div>
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

<?php $this->load->view('caterer_footer'); ?>