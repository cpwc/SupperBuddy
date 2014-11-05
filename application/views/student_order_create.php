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
						<a href="index.html">Order</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Create</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<?php echo form_open('order/create'); ?>
				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="portlet blue-hoki box">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cogs"></i>Student Information
								</div>
								<div class="actions btn-set">
									<?php echo anchor('order', '<i class="fa fa-reply"></i> Back', array('class' => 'btn yellow')); ?>
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
										 Caterer:
									</div>
									<div class="col-md-7 value">
										 <div class="form-group">
												<select id="caterer" name="caterer" class="form-control input-large select2me" data-placeholder="Select...">
													<option value=""></option>
													<?php foreach ($caterers as $caterer) { ?>
													<option value="<?php echo $caterer->id; ?>"><?php echo $caterer->name; ?></option>
													<?php } ?>
												</select>
										</div>
									</div>
								</div>
								
								<div id="caterer-details">
									<div class="row static-info">
										<div class="col-md-2 name">
											 Email:
										</div>
										<div id="caterer-email" class="col-md-7 value">
										</div>
									</div>
									<div class="row static-info">
										<div class="col-md-2 name">
											 Phone:
										</div>
										<div id="caterer-phone" class="col-md-7 value">
										</div>
									</div>
									<div class="row static-info">
										<div class="col-md-2 name">
											 Address:
										</div>
										<div id="caterer-address" class="col-md-7 value">
										</div>
									</div>
									<div class="row static-info">
										<div class="col-md-2 name">
											 Description:
										</div>
										<div id="caterer-description" class="col-md-7 value">
										</div>
									</div>
									<div class="row static-info">
										<div class="col-md-2 name">
											 
										</div>
										<div class="col-md-7 value">
											 <input type="submit" class="btn default" value="Create Order">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--End Caterer-->
				<!-- END PAGE CONTENT-->
				<input type="hidden" name="matric_no" value="<?php echo $student->matric_no; ?>">
				<!-- <input type="hidden" name="caterer_id" value="" id="caterer-id"> -->
			<?php echo form_close(); ?>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php $this->load->view('student_footer'); ?>