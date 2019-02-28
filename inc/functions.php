<?php
/*
 * @name: FastScript
 * @author: Pedram Asbaghi Pour
 * @file: Most Usable Functions
 * @date: 28/02/2019
 * @version: 1.0.0
 * @email: pedroxam@gmail.com
*/

/**
 *	Database Connection
*/
function databaseConnction()
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$db	= new MysqliDb ($mysqli);
	return $db;
}

/*
 * Get Current URI
 */
function currentURI($name = false)
{
	$match = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
	$uri = substr($_SERVER['REQUEST_URI'], strlen($match));
    if (strstr($uri, '?')) {
		$uri = substr($uri, 0, strpos($uri, '?'));
    }
	$trim = str_replace(['dl/','download/','subtitles/'], '', trim($uri, '/'));
	
	if(!$name)
	{
		return $trim;
	}
	else {
		
		$trim = ucwords(urldecode(str_replace('-',' ',$trim)));
		
		if(preg_match('/(.*?)\//', $trim, $JustName)) {
			
			if(isset($JustName[1])) {
				return trim( $JustName[1] );
			} else {
				return trim( str_replace('/', '', $JustName[0]) );
			}
			
		}
		else {
			return $trim;
		}
	}
}

/**
 *  Inject Page
*/
function load($name)
{
	die( $name );
}

/**
 *  Inject Method
*/
function request($name)
{
	if(isset($_REQUEST[ $name ]) && !empty($_REQUEST[ $name ]))
		return trim( $_REQUEST[ $name ] );
}

/*
 * Get Admin Panel
 */
function getAdminPanel($msg='') {
	if(!empty($msg)) {
		$data['msg'] = $msg;
	}
	include( dirname( __DIR__ ) . '/auth/panel.php' );
}

/*
 * Get Login Form
 */
function getLoginForm($msg='') {
	if(!empty($msg)) {
		$data['msg'] = $msg;
	}
	include( dirname( __DIR__ ) . '/auth/login.php' );
}

/*
 * Get Forgot Password Form
 */
function getForgotForm($msg='') {
	if(!empty($msg)) {
		$data['msg'] = $msg;
	}
	include( dirname( __DIR__ ) . '/auth/forgot.php' );
}

/*
 * Forgot Password
 */
function forgotPassword($email,$ip)
{
	$db	= databaseConnction();
	$db->where("ID", 1);
	$row = $db->getOne("my_admin");
	$db_user = $row['user'];
	$db_pass = $row['pass'];
	
	$message = "Your Details:\n Username: $db_user \n Password: $db_pass \n If you did not submit this request, please do not pay attention to this email.";
	
	$db_email = selectSetting('admin_email');
	
	if($email !== $db_email) {
		return 'err';
	}
	else {
		$send = sendEmail('AutoSub - Password Reset', $db_email, $message, $ip);
		if($send)
			return 'ok';
		else
			return 'fail';
	}
}

/*
 * Save Profile Details
 */
function saveProfile()
{
	$user = request('username');
	$pass = request('password');
	
	if(empty($user) && empty($pass))
		return 'err';
	
	$db = databaseConnction();

	$db->where("ID", '1');
		$update = $db->update("my_admin", [ 'user' => $user ]);
	
    if ($update)
	{
		return 'ok';
	}
	else return 'err';
}

/*
 * Send Email
 */
function sendEmail($name, $email, $message, $ip)
{
    $admin_email = selectSetting('admin_email');

	if(empty($admin_email))
		return false;
	
	$subject = "New message";
	
    $message = ' Message:' . $message . ' Email:' . $email . ' Name:' . $name . ' IP:' . $ip;
	
    $headers = 'From: ' . $admin_email . '' . "\r\n" .
            'Reply-To: ' . $admin_email . '' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
	
	if(@mail($admin_email, $subject, $message, $headers))
	{
		return true;
	}
	else return false;
}

/*
 * Determine is Target Page or not
 */
function is_page($name)
{
	$current = $_SERVER['REQUEST_URI'];
	
	if(strpos($current, "/$name/") !== false) {
		return true;
	}
	else return false;
}

/**
 * Get Admin Name
*/
function get_admin_name()
{
	$db = databaseConnction();
	$db->where("id", 1);
	$user = $db->getOne("my_admin");
	return $user['user'];
}

/**
 * Check Admin Login
*/
function is_admin_logged()
{
	if(isset($_SESSION['user'])){
		
		//increasing security
		$adminName = get_admin_name();
	
		if($adminName == $_SESSION['user']) {
			return true;
		} else {
			return false;
		}
		
	} else return false;
}

/**
 * Admin Login
*/
function adminLogin($user, $pass)
{
	$db	= databaseConnction();
	$db->where("ID", 1);
	$row = $db->getOne("my_admin");
	
	$Duser = $row['user'];
	$Dpass = $row['pass'];
	
	if ($user == $Duser && $pass == $Dpass) {
		
		$_SESSION['user'] = $Duser;
			
		return true;
		
        }
		else {
            return false;
        }
}

/*
 * Save Settings To Database
 */
function saveSettings()
{
	$name		= !empty(request('site_name')) ? request('site_name') : '';
	$desc		= !empty(request('site_desc')) ? request('site_desc') : '';
	$tags		= !empty(request('tags')) ? request('tags') : '';
	$email		= !empty(request('email')) ? request('email') : '';
	$days		= !empty(request('cache_days')) ? request('cache_days') : '';
	$method		= !empty(request('cache_method')) ? request('cache_method') : '';
	
	$db = databaseConnction();
	
	$data = [
			  'site_name' => $name,
			  'admin_email' => $email,
			  'site_desc' => $desc,
			  'site_keywords' => $tags,
			  'cache_days' => $days,
			  'cache_method' => $method
			];
	
	if($db->update("my_settings", $data))
		return 'ok';
}

/**
 * Select Setting From Database
*/
function selectSetting($val)
{
	$db	 = databaseConnction();
	$db->where("id", 1);
	$row = $db->getOne("my_settings");
	return $row[ $val ];
}

/**
 * Get All Themes
*/
function getThemes()
{
	$dirs = array_filter(glob('themes/*'), 'is_dir');
	$index = array();
	$index['name'] = '';

	$index = 0;
	foreach ($dirs as $dir) {
		 $themes[$index]['name'] = str_replace('themes/','',$dir);
		 $index++;
	}
	
	return $themes;
}

/**
 * Save Customize Setting to Database
*/
function saveTheme()
{
	$theme	= request('theme');
	$logo	= request('logo');
	
	$db = databaseConnction();
	$db->where("id",1);
	$update = $db->update("my_settings", ['logo' => $logo, 'theme' => $theme]);
	
	if($update)
		return 'ok';
	else
		return 'err';
}

/**
 *  Browser Detection
*/
function browserDetection()
{
    $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
    if(preg_match('/(chromium)[ \/]([\w.]+)/', $ua))
            $browser = 'Chromium';
    elseif(preg_match('/(chrome)[ \/]([\w.]+)/', $ua))
            $browser = 'Chrome';
    elseif(preg_match('/(safari)[ \/]([\w.]+)/', $ua))
            $browser = 'Safari';
    elseif(preg_match('/(opera)[ \/]([\w.]+)/', $ua))
            $browser = 'Opera';
    elseif(preg_match('/(msie)[ \/]([\w.]+)/', $ua))
            $browser = 'Msie';
    elseif(preg_match('/(mozilla)[ \/]([\w.]+)/', $ua))
            $browser = 'Mozilla';
	else
		$browser = substr($_SERVER['HTTP_USER_AGENT'],0,10);

    return $browser;
}

/**
 * Upload File
*/
function upload_file($sub = false)
{
	if( !empty($_FILES['file']) ) {
			$path = dirname(__DIR__) . '/files/';
			$path = $path . basename($_FILES['file']['name']);
			if( move_uploaded_file($_FILES['file']['tmp_name'], $path) ) {
			  return basename($_FILES['file']['name']);
			  $name = URL . 'files/' . basename($_FILES['file']['name']);
			  return $name;
			}
		else return false;
	}
}

/**
 * Get Theme Directory URI
*/
function get_theme_directory_uri()
{
	$currentTheme = selectSetting('theme');
	$themePath	 = URL . 'themes/' . $currentTheme;
	return rawurldecode($themePath);
}

/**
 * Get Site Content Part
*/
function get_site_part($part)
{
	$currentTheme	= selectSetting('theme');
	
	$directory		= dirname( __DIR__ ) . '/themes/' . $currentTheme;
	
	if(!file_exists($directory)){
		exit('Theme Folder Missed !');
	}
	
	include $directory . '/' .  $part . '.php';
}

/**
 * Get Site Header
*/
function get_header()
{
	return get_site_part('header');
}

/**
 * Get Site Footer
*/
function get_footer()
{
	return get_site_part('footer');
}

/**
 * Get Site body with selection part
*/
function get_body_and($part)
{
	$directory	=	dirname( __DIR__ ) . '/themes/' . selectSetting('theme');
	
	if(file_exists($f = $directory . '/functions.php')){
		require_once($f);
	}
	
	get_header();
		get_site_part($part);
	get_footer();
}

/**
 * Get index
*/
function get_home()
{
	return get_body_and('index');
}

/**
 * Ge Page
*/
function get_page()
{
	return get_body_and('page');
}

/**
 * Get Search Page
*/
function get_search_page()
{
	return get_body_and('search');
}

/**
 * Get Single Page
*/
function get_single_page()
{
	return get_body_and('single');
}

/**
 * Get Status of Option
*/
function get_option($opt)
{
	if(selectSetting($opt)=="on"){
		return true;
	}
	else return false;
}

/**
 * Get Site Title
*/
function site_title()
{
	echo trim( selectSetting('site_desc') );
}

/**
 * Get Current Page Title
*/
function page_title()
{
	echo trim( currentURI(true) );
}

/**
 * Get Site Description
*/
function site_description()
{
	echo trim( selectSetting('site_desc') );
}

/**
 * Get Site Keywords
*/
function site_keywords()
{
	echo trim( selectSetting('site_keywords') );
}

/*
 * Get Cache Method
*/
function Cmethod()
{
	$method = selectSetting('cache_method');
	
		if(!empty($method))
			return trim($method);
		else
			return 'files'; //default files method
}

/**
 * Purge Cache
*/
function purge_cache()
{
	$directory  = dirname(__DIR__) . '/cache/cache.storage/files/';
    foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) {
           unlink($file);
        }
		else {
            @unlink($file);
        }
    }
    rmdir($directory);
	return true;
}