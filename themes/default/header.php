<?php if(!defined('FS_ACCESS')) die('Direct Access Not Allowed !'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	
	<?php if(is_page('single')):  // Single Post ?>
		
		<title><?php page_title(); ?> - <?php site_title(); ?></title>
		
		<meta name="description" content="<?php site_description(); ?>" />
		
	<?php else: // Index or All Pages ?>
	
		<title><?php site_title(); ?></title>
		
		<meta name="description" content="<?php site_description(); ?>" />
		
	<?php endif; ?>
	
    <meta name="keywords" content="<?php site_keywords(); ?>" />
	
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo get_theme_directory_uri(); ?>/assets/css/bootstrap.min.css">
	
    <!-- Favicon -->
    <link rel="icon" href="<?php echo get_theme_directory_uri(); ?>/assets/images/fav.ico" />
	
</head>

<body>

    <div class="container">
	
        <div class="main-header">
		
            <div class="logo">
			<?php
				
				//Example Using Options
				
				//Get Logo
				
				if(!empty(selectSetting('logo')))
				{
					$logo = URL . 'files/' . selectSetting('logo');
				}
				else
				{
					$logo = get_theme_directory_uri() . ' /assets/images/logo.png';
				}
			?>
			
                <img title="<?php site_title(); ?>" src="<?php echo $logo; ?>" alt="logo">
				
            </div>
			
            <div class="d-flex align-items-center">
			
                <div class="d-none d-md-block">
				
                    <a href="<?php echo URL; ?>" title="" class="text-muted mr-3">Home</a>
					
                </div>
				
            </div>

		<div style="margin:auto"></div>
			
		<?php
		
		//Show Contents For Admin
		
		if(is_admin_logged()): ?>
			
            <div class="header-part-right">
			
                <div class="dropdown">
				
                    <div class="user col align-self-end">
					
						<img class="ct-pt" src="<?php echo get_theme_directory_uri(); ?>/assets/images/avatar.png" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						
                        <div class="dropdown-menu text-center dropdown-menu-right" aria-labelledby="userDropdown">
						
                         <a href="<?php echo URL; ?>admin" class="dropdown-item"> <i class="i-Lock-User mr-1"></i> Admin Panel</a>
							
                        </div>
						
                    </div>
					
                </div>
				
            </div>
			
		<?php endif; ?>
		
        </div>