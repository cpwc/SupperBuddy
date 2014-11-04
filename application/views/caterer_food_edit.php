<?php $this->load->view('caterer_header'); ?>

<?php $this->load->view('caterer_nav'); ?>

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Caterer <small>Edit Food</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="index.html">Food</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Edit</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<?php echo form_open('food/edit/' . $food->id); ?>
				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="portlet blue-hoki box">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cogs"></i>Food Information
								</div>
							</div>
							<div class="portlet-body">
								<div class="form-group">
									<div class="col-md-3">
										Food Name:
									</div>
									<div class="col-md-9">
										<div class="input-icon right">
											<input type="text" class="form-control" name="name" id="food_name" value="<?php echo $food->name; ?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-3">
										 Price:
									</div>
									<div class="col-md-7">
										 <div class="input-icon right">
											<input type="text" class="form-control" name="price" id="food_price" value="<?php echo $food->price; ?>">
										</div>
									</div>
								</div>
								<div class="row static-info">
									<div class="col-md-2 name">
										
									</div>
									<div class="col-md-7 value">
										<input type="submit" class="btn default" value="Edit Food">
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