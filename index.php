<?php
	/*
	 * @name: FastScript
	 * @author: Pedram Asbaghi Pour
	 * @file: Index Router
	 * @date: 28/02/2019
	 * @version: 1.0.0
	 * @email: pedroxam@gmail.com
	*/

	// Check Installation
	if(!file_exists(dirname( __FILE__ ) . '/config.php')) {
		header('Location: ./installer.php');
		exit;
	}

	// Start Session
	session_start();

	// Load Config
	require dirname( __FILE__ ) . '/config.php';
	
	// Load Database Class
	require dirname( __FILE__ ) . '/class/Database.php';
	
	// Load Functions
	require dirname( __FILE__ ) . '/inc/functions.php';
	
	// Load Cache Class
	require dirname( __FILE__ ) . '/class/phpFastCache.php';
	
	// Load Simple Class
	require dirname( __FILE__ ) . '/class/SimpleClass.php';
	
	// Load Router Class
	require dirname( __FILE__ ) . '/class/Router.php';
	
    $filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
	if (php_sapi_name() === 'cli-server' && is_file($filename)) {
		return false;
	}
	
    // Create a Router
    $router = new \FsRouter\Router\Router();
	
    // Before Router Middleware
    $router->before('GET', '/.*', function () {
        header('X-Powered-By: FastScript/router');
    });
	
    // Front Handler [ home ]
    $router->homeHandler(function () {
        header($_SERVER['SERVER_PROTOCOL']);
		load(get_home());
    });
	
    // Example Page Handler
	$router->get('/page/', function () {
		load(get_page());
	});
	
	
	// Admin Panel
	$router->get('/admin', function () {
		 if(is_admin_logged())
		 {
			load(getAdminPanel());
		 }
		 else {
			load(getLoginForm());
		 }
	});
	
	// Forgot Password Page
	$router->get('admin/forgot', function () {
		load(getForgotForm());
	});
	
	// Admin Login Form
	$router->post('admin/loginPost', function () {
		if(isset($_POST['username']) && !empty($_POST['password']))
		{
			$user = strip_tags($_POST['username']);
			$pass = strip_tags($_POST['password']);
			
			$login = adminLogin($user,$pass);
			
			if($login) {
				header('Location:' . URL . 'admin');
				exit;
			}
			else {
				load(getLoginForm('Please Enter Currect Details'));
			}
		}
	});
	
	// Admin Forgot Form
	$router->post('admin/forgotPost', function () {
		if(isset($_POST['submit']) && !empty($_POST['forgot_email']))
		{
			$email = strip_tags($_POST['forgot_email']);
			$forgot = forgotPassword($email,$_POST['ip']);
			
			if($forgot=='ok') {
				load(getForgotForm('Done ! Please Check Your Email.'));
			}
			elseif($forgot=='err') {
				load(getForgotForm('Error: Email Address Not found In Our Database.'));
			}
			elseif($forgot=='fail') {
				load(getForgotForm('Failed: Please Check Email Setting On your server.'));
			}
		}
	});
	
	// Save Setting
	$router->post('admin/saveSettings', function () {
		if(is_admin_logged()){
			load(saveSettings());
		}
	});
	
	// Save Profile
	$router->post('admin/saveProfile', function () {
		if(is_admin_logged()){
			load(saveProfile());
		}
	});
	
	// Save Theme
	$router->post('admin/saveTheme', function () {
		if(is_admin_logged()){
			load(saveTheme());
		}
	});
	
	// Upload Logo
	$router->post('admin/uploadLogo', function () {
		if(is_admin_logged()){
			load(upload_file());
		}
	});
	
	// Admin Logout
	$router->get('/logout', function () {
		unset($_SESSION['user']);
		header('Location:' . URL);
		load;
	});
	
	// Purge Cache
	$router->post('admin/purge', function () {
		if(is_admin_logged()){
			load(purge_cache());
		}
	});

	/*
		Example Using POST Handler
		
		$router->post('/custom/(.*?)', function () {
			load( someFunction );
		});
	*/
	
	// Start Router
	$router->run();