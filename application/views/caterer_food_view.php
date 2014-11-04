<?php $this->load->view('caterer_header'); ?>

<?php $this->load->view('caterer_nav'); ?>

<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Caterer <small>View Food</small>
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
						<a href="#">View</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<?php $this->load->view('caterer_flash_message') ?>

				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="portlet blue-hoki box">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cogs"></i>Food
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
									<th class="right">
										 Price
									</th>
									<th>
										 Created at
									</th>
									<th>
										 Updated at
									</th>
									<th>
									</th>
								</tr>
								</thead>
								<tbody>
									<?php foreach ($foods as $food) { ?>
									<tr>
										<td><?php echo $food->name; ?></td>
										<td>$<?php echo number_format($food->price, 2); ?></td>
										<td><?php echo $food->created_at; ?></td>
										<td><?php echo $food->updated_at; ?></td>
										<td> 
											<?php echo anchor('food/edit/' . $food->id, 'Edit', array('class' => 'btn btn-sm yellow filter-submit')); ?>
											<?php echo anchor('food/delete/' . $food->id, '<i class="fa fa-times"></i> Remove', array('class' => 'btn btn-sm red filter-cancel', 'onclick' => "return confirm('Are you sure want to delete?');")) ?>
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
				<!-- END PAGE CONTENT-->
				<!-- <input type="hidden" name="caterer_id" value="" id="caterer-id"> -->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php $this->load->view('caterer_footer'); ?>