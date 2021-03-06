<?php if(!defined('FS_ACCESS')) die('Direct Access Not Allowed !'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo selectSetting('site_name'); ?> - Login To Admin Panel</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="icon" href="<?php echo URL; ?>assets/imgs/fav.ico" />
</head>

<body>
    <div class="auth-layout-wrap" style="background-image: url(<?php echo URL; ?>assets/images/login.jpg)">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="<?php echo URL; ?>assets/images/logo.png" alt="">
                            </div>
                            <h1 class="mb-3 text-18 text-center">Reset Password</h1>
							
					
						<?php if(isset($msg) && !empty($msg)): ?>
							<div class="alert alert-danger text-center" role="alert">
								<?php echo $msg; ?>
							</div>
						<?php endif; ?>
							<form id="login" action="<?php echo URL; ?>admin/forgotPost" class="text-center border border-light p-5" method="post">
                                <div class="form-group">
                                    <label for="forgot_email">Enter Your Email</label>
                                    <input id="forgot_email" name="forgot_email" class="form-control form-control-rounded" type="email">
                                </div>
								<input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?> ">
                                <button name="submit" type="submit" class="btn btn-rounded btn-primary btn-block mt-2">Submit</button>
                            </form>
                            <div class="mt-3 text-center">
                                <a href="<?php echo URL; ?>admin/" class="text-muted"><u>Back to Login</u></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<script type="text/javascript" src="<?php echo get_theme_directory_uri(); ?>/assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo get_theme_directory_uri(); ?>/assets/js/script.min.js"></script>
</body>
</html>