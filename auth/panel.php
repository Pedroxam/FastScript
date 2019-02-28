<?php if(!defined('FS_ACCESS')) die('Direct Access Not Allowed !'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
	 <!-- Style -->
    <link href="<?php echo URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>assets/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?php echo URL; ?>assets/css/sweetalert.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>assets/css/nprogress.css" rel="stylesheet">
    <link href="<?php echo URL; ?>assets/css/custom.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="<?php echo URL; ?>assets/imgs/fav.ico" />
</head>
<body>
    <div class="app-admin-wrap">
        <div class="main-header">
            <div class="logo">
                <a href="<?php echo URL; ?>" title="View Site">
					<img src="<?php echo URL; ?>assets/images/logo.png" alt="logo">
				</a>
            </div>

            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>
			
            <div style="margin:auto"></div>

            <div class="header-part-right">
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
                <div class="dropdown">
                    <div class="user col align-self-end">
                        <img class="pointer" src="<?php echo URL; ?>assets/images/avatar.png" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i> Admin
                            </div>
                            <a class="dropdown-item" href="<?php echo URL; ?>logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="side-content-wrap">
            <div class="sidebar-left open" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    <li class="nav-item">
                        <a class="nav-item-hold" href="#dashboard">
                            <i class="nav-icon i-Bar-Chart"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="#settings">
                            <i class="nav-icon i-Data-Settings"></i>
                            <span class="nav-text">Settings</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="#account" target="_blank">
                            <i class="nav-icon i-Safe-Box1"></i>
                            <span class="nav-text">Account</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                </ul>
            </div>
            <div class="sidebar-overlay"></div>
        </div>
        <!--=============== Left side End ================-->

        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">

            <div id="dashboard" class="change-content">
			
			<h2 class="text-muted mb-4 p-2">Welcome Back <?php echo get_admin_name(); ?> !</h2>
			
            <div class="row">
				
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Add-User"></i>
                            <div class="col-md-10">
                                <p class="text-muted mt-2 mb-0">All Time Visitors</p>
                                <p class="text-primary text-24 line-height-1 mt-2">
								</p>
                            </div>
                        </div>
                    </div>
                </div>
				
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Download"></i>
                            <div class="col-md-10">
                                <p class="text-muted mt-2 mb-0">Total Downloads</p>
                                <p class="text-primary text-24 line-height-1 mt-2">
								</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Last"></i>
                            <div class="col-md-10">
                                <p class="text-muted mt-2 mb-0">Something Else</p>
                                <p class="text-primary text-24 line-height-1 mt-2">
								</p>
                            </div>
                        </div>
                    </div>
                </div>
				
                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Stroller"></i>
                            <div class="col-md-10">
                                <p class="text-muted mt-2 mb-0">Other Stats</p>
                                <p class="text-primary text-24 line-height-1 mt-2">
								</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Dropbox"></i>
                            <div class="col-md-10">
                                <p class="text-muted mt-2 mb-0">Fast Script Options</p>
                                <p class="text-primary text-24 line-height-1 mt-2">
								</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body">
                            <i class="i-Dropbox text-danger"></i>
                            <div class="col-md-10">
                                <p class="text-danger pt-4 mb-0">Create your own projects with this script and then sell them to the Worlds !</p>
                                <p class="text-primary text-24 line-height-1 mt-2">
								</p>
                            </div>
                        </div>
                    </div>
                </div>
				
            </div>
			
		</div> <!--#dashboard-->
			
			
		<div id="settings" class="change-content">
				
				<div class="row">
				
					<div class="col-md-12 col-sm-12">
					
                            <ul class="nav nav-pills ml-3" id="myPillTab" role="tablist">
                                <li class="nav-itemB">
                                    <a class="nav-link active show" id="home-icon-pill" data-toggle="pill" href="#generalPill" role="tab" aria-controls="generalPill" aria-selected="false"><i class="nav-icon i-Home1 mr-1"></i>General</a>
                                </li>
                                <li class="nav-itemB">
                                    <a class="nav-link" id="contact-icon-pill" data-toggle="pill" href="#themePill" role="tab" aria-controls="themePill" aria-selected="false"><i class="nav-icon i-Computer-Secure mr-1"></i> Appearance </a>
                                </li>
                                <li class="nav-itemB">
                                    <a class="nav-link" id="contact-icon-pill" data-toggle="pill" href="#infoPill" role="tab" aria-controls="infoPill" aria-selected="false"><i class="nav-icon i-Cursor-Click mr-1"></i> Help </a>
                                </li>
                            </ul>
							
							<hr/>
					
                            <div class="tab-content" id="myPillTabContent">
							
							<!--General-->
						
                                <div class="tab-pane fade active show" id="generalPill" role="tabpanel" aria-labelledby="home-icon-pill">
								
								  <!-- Setting Form -->
									<form id="setting">

										<div class="row">

											<div class="col-md-6 col-sm-12">
												<div class="card mb-4">
												
													<div class="card-body">
															<div class="row">
																<div class="card-title ml-3  w-100 font-weight-bold">General Setting</div>
																<div class="col-md-4 col-sm-12">
																	<div class="form-group">
																		<label for="name">Site Name</label>
																		<input type="text" id="site_name" name="site_name" class="form-control" value="<?php echo selectSetting('site_name'); ?>" placeholder="">
																	</div>
																</div>
																<div class="col-md-8 col-sm-12">
																	<div class="form-group">
																		<label for="name">Site Description</label>
																		<input type="text" id="site_desc" name="site_desc" class="form-control" value="<?php echo selectSetting('site_desc'); ?>" placeholder="free download subtitles and ...">
																	</div>
																</div>
																<div class="col-md-12 col-sm-12">
																	<div class="form-group">
																		<fieldset>
																			<label>Site Keywords</label>
																			<div class="form-group">
																				<textarea class="form-control" aria-label="With textarea" name="tags"><?php echo selectSetting('site_keywords'); ?></textarea>
																			<p class="text-muted pt-2">Separate by (,) comma.</p>
																			</div>
																		</fieldset>
																	</div>
																</div>
																<div class="col-md-12 col-sm-12">
																	<div class="form-group">
																		<label for="name">Admin Email</label>
																		<input type="email" id="email" name="email" class="form-control" value="<?php echo selectSetting('admin_email'); ?>" placeholder="">
																	</div>
																</div>
																<div class="col-lg-12 col-sm-12 text-center">
																	<button name="submit" class="btn btn-primary mt-4" type="submit">Save Changes</button>
																</div>
															</div>
														</div>
													</div>
												</div>
												
													<div class="col-md-6 col-sm-12">
														  <div class="card mb-4">
																<div class="card-body">
																		<div class="row">
																			<div class="card-title ml-3 w-100 font-weight-bold">Site Setting</div>
																			<div class="col-md-<?php echo (selectSetting('cache_method')=="files")? "6" : "12"; ?> col-sm-12">
																				<div class="form-group">
																					<label for="name">Maximum of Days for Keeping Page Caches</label>
																					<input type="number" name="cache_days" id="cache_days" class="form-control" value="<?php echo selectSetting('cache_days'); ?>" placeholder="Default: 2">
																				</div>
																				<small class="mt-1">It is calculated in days, for example 2 is 2 days.</small>
																			</div>
																			<div class="col-md-6 col-sm-12 text-center">
																			<?php if(selectSetting('cache_method')=="files"): ?>
																			<button type="button" class="btn btn-dark mt-4" id="alert-cache">Purge All Caches</button>
																			<?php endif; ?>
																			</div>
																			<div class="col-md-12 form-group mt-3">
																				<label for="picker1" class="text-dark font-weight-bold pb-2">Cache Method</label>
																				<select name="cache_method" class="form-control">
																					<option value="files" <?php if(selectSetting('cache_method')=="files") echo 'selected'; ?>>File (Default)</option>
																					<option <?php if(selectSetting('cache_method')=="apc") echo 'selected'; ?> value="apc">APC</option>
																					<option <?php if(selectSetting('cache_method')=="pdo") echo 'selected'; ?> value="pdo">PDO</option>
																					<option <?php if(selectSetting('cache_method')=="wincache") echo 'selected'; ?> value="wincache">Wincached</option>
																					<option <?php if(selectSetting('cache_method')=="xcache") echo 'selected'; ?> value="xcache">XCache</option>
																				</select>
																				<p class="w-100 ml-2 mt-2 text-muted">Which method should be used for storing and retrieving cached items.</p>
																				<div class="alert alert-warning">"File" is the best option for most cases and should not be changed, unless you are familiar with another cache method and have it set up on the server already.</div>
																			</div>
																			<div class="col-lg-12 col-sm-12 text-center mt-2">
																				<button name="submit" class="btn btn-primary" type="submit">Save Changes</button>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															
														<div class="col-md-6 col-sm-12">
														  <div class="card mb-4">
																<div class="card-body">
																		<div class="row">
																		
																			<div class="card-title ml-3 w-100 font-weight-bold">Custom Setting</div>
																			
																			<div class="col-lg-12 col-sm-12 text-center mt-2">
																			
																				<p>Write Your Options In panel.php File</p>
																				
																			</div>
																			
																			<div class="col-lg-12 col-sm-12 text-center">
																				<button name="submit" class="btn btn-primary mt-4" type="submit">Save Changes</button>
																			</div>
																			
																		</div>
																	</div>
																</div>
															</div>
															
														</div>
													
											</form> <!-- Form -->
                                </div>
				
						<!--Appearance-->
						
                         <div class="tab-pane fade" id="themePill" role="tabpanel" aria-labelledby="profile-icon-pill">
						 
									<div class="row">
									
											<div class="col-lg-6 col-sm-12">
												<form id="theme">
													<div class="card mb-4">
														<div class="card-body">
														<div class="card-title w-100 font-weight-bold">Select Site Theme</div>
															<?php foreach(getThemes() as $theme){ ?>
																<label class="radio radio-outline-primary ml-3 ">
																	<input type="radio" name="theme" value="<?php echo $theme['name']; ?>" <?php if(selectSetting('theme')== $theme['name']) echo 'checked';?>>
																	<span><?php echo $theme['name']; ?></span>
																	<span class="checkmark"></span>
																</label>
															 <?php } ?>
															<div class="alert alert-warning">You Can Upload Your Custom Themes into "themes" folder. the default theme has a simple coding, which you can easily prepare according to their format.</div>
															 <div class="col-lg-12 col-sm-12 text-center">
																<button name="submit" class="btn btn-primary mt-4" type="submit">Save Changes</button>
														   </div>
														</div>
													</div>
											</div>
											
											<div class="col-lg-6 col-sm-12">
													<div class="card mb-4">
														<div class="card-body">
																	<div class="card-title w-100 font-weight-bold">Home Logo</div>
																	<div class="col-lg-12 col-sm-12 text-center">
																		<?php if(!empty(selectSetting('logo'))): ?>
																		<img id="oldlogo" src="<?php echo URL . 'files/' . selectSetting('logo'); ?>" class="img-fluid w-20 rounded" alt="logo">
																		<?php else: ?>
																		<img id="oldlogo" src="<?php echo URL; ?>/assets/images/logo.png" class="img-fluid w-20 rounded" alt="logo">
																		<?php endif; ?>
																		<img id="newlogo" src="" class="img-fluid w-20 mb-3 rounded hidden" alt="logo">
																		<div class="mt-2"></div>
																		<a class="btn btn-info btn-sm mt-3 text-white" id="removeLogo">Remove Logo</a>
																		<div class="m-auto mt-2"></div>
																		<a class="btn btn-dark btn-md mt-4 text-white" id="upload">Choose File</a>
																	</div>
																	
																	<div class="hidden">
																		<input type="file" name="file" id="file">
																		<input type="hidden" name="logo" id="logo" value="<?php echo selectSetting('logo'); ?>">
																	</div>
															
																	 <div class="col-lg-12 col-sm-12 text-center">
																		<button name="submit" class="btn btn-primary mt-4" type="submit">Save Changes</button>
																	</div>
																	
																</div>
															</div>
												</form>
										</div>
                                </div>
                            </div>
							
						 <!--Help-->
						
                         <div class="tab-pane fade" id="infoPill" role="tabpanel" aria-labelledby="profile-icon-pill">
						 
							    <div class="breadcrumb">
									<h1 class="w-100">Some Functions For Build Custom Theme</h1>
								</div>
								
							<div class="separator-breadcrumb border-top"></div>
			
							<div class="row">
								<div class="col-md-12">
									<div class="accordion" id="accordionExample">
										<div class="card">
											<div class="card-header" id="headingOne">
												<h5 class="mb-0">
													<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
														The Essential files that should be within the theme
													</button>
												</h5>
											</div>

											<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
												<div class="card-body">
													
													<ul>
														<li>header</li>
														<li>index</li>
														<li>footer</li>
														<li>page</li>
														<li>search</li>
													</ul>
													
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="headingTwo">
												<h5 class="mb-0">
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
														Php Codes for Executing Some Functions
													</button>
												</h5>
											</div>
											<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
												<div class="card-body">
												
													<ul style="sfont-family:monospace !important">
													
														<li>Site URL:</li>
														<li class="bg-dark text-white p-2 mt-3 mb-3"><?php echo htmlentities('<?php echo URL; ?>'); ?></li>
														
														<li>Site Name:</li>
														<li class="bg-dark text-white p-2 mt-3 mb-3"><?php echo htmlentities('<?php site_title(); ?>'); ?></li>
														
														<li>Site Description:</li>
														<li class="bg-dark text-white p-2 mt-3 mb-3"><?php echo htmlentities('<?php site_description(); ?>'); ?></li>
														
														<li>Site Keywords:</li>
														<li class="bg-dark text-white p-2 mt-3 mb-3"><?php echo htmlentities('<?php site_keywords(); ?>'); ?></li>
													
														<li>Page Title:</li>
														<li class="bg-dark text-white p-2 mt-3 mb-3"><?php echo htmlentities('<?php page_title(); ?>'); ?></li>
													
														<li>Current Theme Directory URL:</li>
														<li class="bg-dark text-white p-2 mt-3 mb-3"><?php echo htmlentities('<?php echo get_theme_directory_uri(); ?>'); ?></li>
														<li>Check for Admin Access:</li>
														<li class="bg-dark text-white p-2 mt-3 mb-3"><?php echo htmlentities("<?php if( is_admin_logged() ) {
															//do_something
														}
														?>"); ?></li>
													</ul>
												
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						
					</div>
					
				</div>
		
			</div>
			
		</div> <!--#setting-->
			
			<div id="account" class="change-content">
			
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Account Setting</div>

								<!-- Form -->
								<form id="profile">
								
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label for="name">Username</label>
												<input type="text" id="username" name="username" class="form-control" value="" placeholder=" ">
											</div>
										</div>
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
												<label for="name">Password</label>
												<input type="password" id="password" name="password" class="form-control" value="" placeholder="">
											</div>
										</div>
										<div class="row m-auto">
											<div class="col-lg-12 col-sm-12 text-center">
											<button name="submit" class="btn btn-danger mt-4" type="submit">Save Changes </button>
											</div>
										</div>
									</div>
									
								</form>
								<!-- //Form -->
                        </div>
                    </div>
                </div>
			
            </div> <!--#account-->

        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

	<!-- Scripts -->
    <script src="<?php echo URL; ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo URL; ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo URL; ?>assets/js/perfect-scrollbar.min.js"></script>
    <script src="<?php echo URL; ?>assets/js/echarts.min.js"></script>
    <script src="<?php echo URL; ?>assets/js/echart.options.min.js"></script>
    <script src="<?php echo URL; ?>assets/js/sweetalert2.min.js"></script>
    <script src="<?php echo URL; ?>assets/js/sweetalert.script.js"></script>
    <script src="<?php echo URL; ?>assets/js/dashboard.v1.script.min.js"></script>
    <script src="<?php echo URL; ?>assets/js/script.min.js"></script>
    <script src="<?php echo URL; ?>assets/js/nprogress.js"></script>
	<input type="hidden" id="base_url" value="<?php echo URL; ?>">
	
	<!-- Default FastScript Ajax -->
    <script src="<?php echo URL; ?>assets/js/ajax.js"></script>
	
</body>
</html>