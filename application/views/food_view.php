<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>SupperBuddy - Caterer View Food</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="/public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="/public/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="/public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/public/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="/public/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="/public/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/public/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="/public/plugins/bootstrap-datepicker/css/datepicker.css"/>
<link rel="stylesheet" type="text/css" href="/public/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="/public/css/components.css" rel="stylesheet" type="text/css"/>
<link href="/public/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/public/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="/public/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="/public/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-full-width page-footer-fixed">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			<img src="/public/img/logo.png" alt="logo" class="logo-default"/>
			</a>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN HORIZANTAL MENU -->
		<!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
		<!-- DOC: This is desktop version of the horizontal menu. The mobile version is defined(duplicated) sidebar menu below. So the horizontal menu has 2 seperate versions -->
		<div class="hor-menu hor-menu-light hidden-sm hidden-xs">
			<ul class="nav navbar-nav">
				<!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
				<li class="classic-menu-dropdown active">
					<a href="index.html">
					Dashboard <span class="selected">
					</span>
					</a>
				</li>
				<li class="mega-menu-dropdown">
					<a data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
					Mega <i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<!-- Content container to add padding -->
							<div class="mega-menu-content">
								<div class="row">
									<div class="col-md-4">
										<ul class="mega-menu-submenu">
										<li>
											<h3>Layouts</h3>
										</li>
										<li>
											<a href="index_horizontal_menu.html">
											Dashboard & Mega Menu </a>
										</li>
										<li>
											<a href="layout_horizontal_sidebar_menu.html">
											Horizontal & Sidebar Menu </a>
										</li>
										<li>
											<a href="layout_fontawesome_icons.html">
											Layout with Fontawesome</a>
										</li>
										<li>
											<a href="layout_glyphicons.html">
											Layout with Glyphicon</a>
										</li>
										<li>
											<a href="layout_full_height_portlet.html">
											Full Height Portlet <span class="badge badge-roundless badge-danger">new</span></a>
										</li>
										<li>
											<a href="layout_full_height_content.html">
											Full Height Content <span class="badge badge-roundless badge-warning">new</span></a>
										</li>
										<li>
											<a href="layout_horizontal_menu1.html">
											Horizontal Mega Menu 1 </a>
										</li>
										</ul>
									</div>
									<div class="col-md-4">
										<ul class="mega-menu-submenu">
										<li>
											<h3>More Layouts</h3>
										</li>
										<li>
											<a href="layout_horizontal_menu2.html">
											Horizontal Mega Menu 2 </a>
										</li>
										<li>
											<a href="layout_search_on_header1.html">
											Search Box On Header 1 </a>
										</li>
										<li>
											<a href="layout_search_on_header2.html">
											Search Box On Header 2 </a>
										</li>
										<li>
											<a href="layout_sidebar_search_option1.html">
											Sidebar Search Option 1 </a>
										</li>
										<li>
											<a href="layout_sidebar_search_option2.html">
											Sidebar Search Option 2 </a>
										</li>
										<li>
											<a href="layout_sidebar_reversed.html">
											Right Sidebar Page </a>
										</li>
										<li>
											<a href="layout_sidebar_fixed.html">
											Sidebar Fixed Page </a>
										</li>
										</ul>
									</div>
									<div class="col-md-4">
										<ul class="mega-menu-submenu">
										<li>
											<h3>Even More!</h3>
										</li>
										<li>
											<a href="layout_sidebar_closed.html">
											Sidebar Closed Page </a>
										</li>
										<li>
											<a href="layout_ajax.html">
											Content Loading via Ajax </a>
										</li>
										<li>
											<a href="layout_disabled_menu.html">
											Disabled Menu Links </a>
										</li>
										<li>
											<a href="layout_blank_page.html">
											Blank Page </a>
										</li>
										<li>
											<a href="layout_boxed_page.html">
											Boxed Page </a>
										</li>
										<li>
											<a href="layout_language_bar.html">
											Language Switch Bar </a>
										</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</li>
				<li class="mega-menu-dropdown mega-menu-full">
					<a data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
					Full Mega <i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<!-- Content container to add padding -->
							<div class="mega-menu-content ">
								<div class="row">
									<div class="col-md-8">
										<div class="row">
											<div class="col-md-4">
												<ul class="mega-menu-submenu">
												<li>
													<h3>Layouts</h3>
												</li>
												<li>
													<a href="index_horizontal_menu.html">
													<i class="fa fa-angle-right"></i> Dashboard & Mega Menu </a>
												</li>
												<li>
													<a href="layout_horizontal_sidebar_menu.html">
													<i class="fa fa-angle-right"></i> Horizontal & Sidebar Menu </a>
												</li>
												<li>
													<a href="layout_fontawesome_icons.html">
													<i class="fa fa-angle-right"></i> Layout with Fontawesome</a>
												</li>
												<li>
													<a href="layout_glyphicons.html">
													<i class="fa fa-angle-right"></i> Layout with Glyphicon</a>
												</li>
												<li>
													<a href="layout_full_height_portlet.html">
													<i class="fa fa-angle-right"></i> Full Height Portlet <span class="badge badge-roundless badge-danger">new</span></a>
												</li>
												<li>
													<a href="layout_full_height_content.html">
													<i class="fa fa-angle-right"></i> Full Height Content <span class="badge badge-roundless badge-warning">new</span></a>
												</li>
												<li>
													<a href="layout_horizontal_menu1.html">
													<i class="fa fa-angle-right"></i> Horizontal Mega Menu 1 </a>
												</li>
												</ul>
											</div>
											<div class="col-md-4">
												<ul class="mega-menu-submenu">
												<li>
													<h3>More Layouts</h3>
												</li>
												<li>
													<a href="layout_horizontal_menu2.html">
													<i class="fa fa-angle-right"></i> Horizontal Mega Menu 2 </a>
												</li>
												<li>
													<a href="layout_search_on_header1.html">
													<i class="fa fa-angle-right"></i> Search Box On Header 1 </a>
												</li>
												<li>
													<a href="layout_search_on_header2.html">
													<i class="fa fa-angle-right"></i> Search Box On Header 2 </a>
												</li>
												<li>
													<a href="layout_sidebar_search_option1.html">
													<i class="fa fa-angle-right"></i> Sidebar Search Option 1 </a>
												</li>
												<li>
													<a href="layout_sidebar_search_option2.html">
													<i class="fa fa-angle-right"></i> Sidebar Search Option 2 </a>
												</li>
												<li>
													<a href="layout_sidebar_reversed.html">
													<i class="fa fa-angle-right"></i> Right Sidebar Page </a>
												</li>
												<li>
													<a href="layout_sidebar_fixed.html">
													<i class="fa fa-angle-right"></i> Sidebar Fixed Page </a>
												</li>
												</ul>
											</div>
											<div class="col-md-4">
												<ul class="mega-menu-submenu">
												<li>
													<h3>Even More!</h3>
												</li>
												<li>
													<a href="layout_sidebar_closed.html">
													<i class="fa fa-angle-right"></i> Sidebar Closed Page </a>
												</li>
												<li>
													<a href="layout_ajax.html">
													<i class="fa fa-angle-right"></i> Content Loading via Ajax </a>
												</li>
												<li>
													<a href="layout_disabled_menu.html">
													<i class="fa fa-angle-right"></i> Disabled Menu Links </a>
												</li>
												<li>
													<a href="layout_blank_page.html">
													<i class="fa fa-angle-right"></i> Blank Page </a>
												</li>
												<li>
													<a href="layout_boxed_page.html">
													<i class="fa fa-angle-right"></i> Boxed Page </a>
												</li>
												<li>
													<a href="layout_language_bar.html">
													<i class="fa fa-angle-right"></i> Language Switch Bar </a>
												</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div id="accordion" class="panel-group">
											<div class="panel panel-success">
												<div class="panel-heading">
													<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
													Mega Menu Info #1 </a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse in">
													<div class="panel-body">
														 Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements.
													</div>
												</div>
											</div>
											<div class="panel panel-danger">
												<div class="panel-heading">
													<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">
													Mega Menu Info #2 </a>
													</h4>
												</div>
												<div id="collapseTwo" class="panel-collapse collapse">
													<div class="panel-body">
														 Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements.
													</div>
												</div>
											</div>
											<div class="panel panel-info">
												<div class="panel-heading">
													<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
													Mega Menu Info #3 </a>
													</h4>
												</div>
												<div id="collapseThree" class="panel-collapse collapse">
													<div class="panel-body">
														 Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements.
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</li>
				<li class="classic-menu-dropdown">
					<a data-toggle="dropdown" href="javascript:;">
					Classic <i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu pull-left">
						<li>
							<a href="#">
							<i class="fa fa-bookmark-o"></i> Section 1 </a>
						</li>
						<li>
							<a href="#">
							<i class="fa fa-user"></i> Section 2 </a>
						</li>
						<li>
							<a href="#">
							<i class="fa fa-puzzle-piece"></i> Section 3 </a>
						</li>
						<li>
							<a href="#">
							<i class="fa fa-gift"></i> Section 4 </a>
						</li>
						<li>
							<a href="#">
							<i class="fa fa-table"></i> Section 5 </a>
						</li>
						<li class="dropdown-submenu">
							<a href="javascript:;">
							<i class="fa fa-envelope-o"></i> More options </a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">
									Second level link </a>
								</li>
								<li class="dropdown-submenu">
									<a href="javascript:;">
									More options </a>
									<ul class="dropdown-menu">
										<li>
											<a href="index.html">
											Third level link </a>
										</li>
										<li>
											<a href="index.html">
											Third level link </a>
										</li>
										<li>
											<a href="index.html">
											Third level link </a>
										</li>
										<li>
											<a href="index.html">
											Third level link </a>
										</li>
										<li>
											<a href="index.html">
											Third level link </a>
										</li>
									</ul>
								</li>
								<li>
									<a href="index.html">
									Second level link </a>
								</li>
								<li>
									<a href="index.html">
									Second level link </a>
								</li>
								<li>
									<a href="index.html">
									Second level link </a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="">
					Link </a>
				</li>
			</ul>
		</div>
		<!-- END HORIZANTAL MENU -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="../../assets/admin/layout/img/avatar3_small.jpg"/>
					<span class="username username-hide-on-mobile">
					Bob </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="extra_profile.html">
							<i class="icon-user"></i> My Profile </a>
						</li>
						<li>
							<a href="page_calendar.html">
							<i class="icon-calendar"></i> My Calendar </a>
						</li>
						<li>
							<a href="inbox.html">
							<i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
							3 </span>
							</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
							7 </span>
							</a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="extra_lock.html">
							<i class="icon-lock"></i> Lock Screen </a>
						</li>
						<li>
							<a href="login.html">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
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
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="portlet blue-hoki box">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-cogs"></i>Food Information
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
										<td><?php echo $food->price; ?></td>
										<td><?php echo $food->created_at; ?></td>
										<td><?php echo $food->updated_at; ?></td>
										<td> 
										<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-submit"></i> Add</button>
																				
										<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Remove</button>
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
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2014 &copy; NUSSupperBuddy.
	</div>
	<div class="page-footer-tools">
		<span class="go-top">
		<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/public/plugins/respond.min.js"></script>
<script src="/public/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="/public/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="/public/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="/public/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="/public/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/public/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/public/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/public/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/public/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="/public/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/public/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="/public/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/public/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/public/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="/public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/public/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/public/scripts/metronic.js" type="text/javascript"></script>
<script src="/public/scripts/order.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
		jQuery(document).ready(function() {    
			Metronic.init(); // init metronic core components
			Order.init(); // init demo features
		});
	</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>