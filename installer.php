<?php
/*
 * @name: FastScript
 * @author: Pedram Asbaghi Pour
 * @file: Default Script Installation
 * @date: 28/02/2019
 * @version: 1.0.0
 * @email: pedroxam@gmail.com
*/
 
 error_reporting(0);
 
// Check Installation
if(file_exists(dirname(__FILE__) . '/config.php')) {
	header('Location: ./index.php');
	exit;
}

 /*===========================
  # Setup Database and Config File
============================*/

$script_installed = false;
$status = false;

if(isset($_POST['submit']))
{
$dbhost = strip_tags($_POST['database_host']);
$dbname = strip_tags($_POST['database_name']);
$dbuser = strip_tags($_POST['database_username']);
$dbpass = strip_tags($_POST['database_password']);

if(empty($dbname)){ $status .= 'Please Enter Database Name';}
if(empty($dbuser)){ $status .= 'Please Enter Database User Name';}
if(empty($dbhost)){ $status .= 'Please Enter Database Host';}

$con = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

// Check connection
if (mysqli_connect_errno())
{
   $status .= "Database Connnection Error: " . mysqli_connect_error();
}

$continue = false;
$filename = 'database.sql';
$templine = '';
$lines = file($filename);
foreach ($lines as $line) {
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

 $templine .= $line;
 if (substr(trim($line), -1, 1) == ';') {
	 if(@mysqli_query($con, $templine)) {
		 $continue = true;
	 }
	$templine = '';
 }
}

@mysqli_close($con);

if($continue) {

$temp = "<?php
/*
 * @name: FastScript - Build Your Project With Most Already Functions
 * @author: Pedram Asbaghi Pour
 * @date: 28/02/2019
 * @version: 1.0.0
 * @email: pedroxam@gmail.com
*/

/*========================================
  ## Debug Mode ##
========================================*/
error_reporting(0);
/*========================================
  ## Database Info ##
========================================*/
\$dbhost	= '$dbhost';
\$username	= '$dbuser';
\$password  = '$dbpass';
\$dbname	= '$dbname';
/*========================================
  ## Get Site URL ##
========================================*/
\$protocol = ((!empty(\$_SERVER['HTTPS']) && \$_SERVER['HTTPS'] != 'off') || \$_SERVER['SERVER_PORT'] == 443) ? \"https://\" : \"http://\";
\$url = \$protocol . \$_SERVER['HTTP_HOST'] . \$_SERVER['PHP_SELF'];
\$url = str_replace('index.php','',\$url);
/*========================================
  ## Defines ##
========================================*/
define('URL', \$url);
define('FS_ACCESS', true);
define('DB_HOST', \$dbhost);
define('DB_NAME', \$dbname);
define('DB_USER', \$username);
define('DB_PASS', \$password);
?>";

$put = file_put_contents('config.php',$temp);

if(!$put) {
	$status .= 'Please Makesure CHMOD 0777 or any Writable Permission for all script folders.';
}
else {
	$script_installed = true;
	
	if(!file_exists(dirname(__FILE__) . '/cache')) {
		@mkdir('cache', 0777);
	} else
		$status .= 'Please Makesure CHMOD 0777 or any Writable Permission for cache folder.';
		
}

}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AutoSub Installation</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/compiled.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="assets/css/mdb.min.css" rel="stylesheet">
    <!-- Animate -->
    <link href="assets/css/animate.min.css" rel="stylesheet">
    <!-- Custom style -->
    <link href="assets/css/admin.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="assets/imgs/fav.ico" />
	<style>strong{font-weight:700}.form-group { display: block; text-align: left; font-weight: 700; }.alert{border-radius:0}</style>
</head>
<body style="background:#ccc;">

<div class="container">

<div class="card animated m-3 zoomInDown">


    <h5 class="card-header success-color white-text text-center py-4">
        <strong>Install Script</strong>
    </h5>
	
	
<?php if($script_installed) { ?>

    <div class="card-body m-4 px-lg-5 pt-0">

    <div class="text-center">
	
		<strong class="text-success">Congratulations ! Installation Succesfully</strong>
		
		<br>
		<br>
		
		<h4>Default Login Details</h4>
		
		<p>Username:<br> <strong>admin</strong></p>
		<p>Password:<br> <strong>admin</strong></p>
  
		<a href="./admin" target="_blank" class="btn btn-danger">
			Login to Site
		</a>
		
		<a href="./index.php" target="_blank" class="btn btn-success">
			Visit Site
		</a>
		
    </div>

    </div>

<?php } else { ?>

    <!--Card content-->
    <div class="card-body m-4 px-lg-5 pt-0">
	

		<?php if(!empty($status)): ?>
			<div class="alert alert-danger" rols="alert"><?php echo $status; ?></div>
		<?php endif; ?>
	
		<div class="alert alert-info" rols="alert">Enter Your Database Details And Click on Install Button.</div>
		
        <!-- Form -->
        <form dir="ltr" class="text-center" method="POST" action="" style="color:#222;">

		<div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Database Host</label>
						<input type="text" name="database_host" class="form-control" value="localhost" placeholder="eg: localhost" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Database Name</label>
						<input type="text" name="database_name" class="form-control" placeholder="eg: mydata" required>
                    </div>
                </div>
           </div>
		   
		   
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Database User Name</label>
						<input type="text" name="database_username" class="form-control" placeholder="eg: root" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Database Password</label>
						<input type="text" name="database_password" class="form-control" placeholder="eg: 123456..." >
                    </div>
                </div>
            </div>
			
            <button class="btn btn-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="submit" type="submit">Install</button>

        </form>
        <!-- Form -->

    </div>
	
<?php } ?>

</div>

</div>

<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/mdb.min.js"></script>
<script type="text/javascript" src="assets/js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>