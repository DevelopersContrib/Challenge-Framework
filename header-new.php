<? 
session_start();
include ('includes/function.php'); 
$dir = new DIR_LIB_2();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<html lang="en-US">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$domain?></title>
<meta name="title" content="<?=$domain?> " />
<meta name="author" content="Author name"/>
<meta name="date" content="00/00/0000"/> 
<meta name="description" content="<?=$domain?>" />
<meta name="keywords" content="keywords here" />
<meta name="robots" content="INDEX, FOLLOW" />
<link rel="icon" href="images/favicon.ico" />
<!--[if ie 6]>
<link rel="stylesheet" href="css/ie6.css" type="text/css" media="screen" />
<script type="text/javascript" src="css/ie6/iepngfix_tilebg.js"></script>  
<![endif]-->
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/clear_textbox.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="http://mychallenge.com/new/javascripts/tabs.js"></script>
</head>
<body>
<div id="wrap">
<div id="wrap-inside">

	<div id="header">
		<div class="head-left"><a href="#" class="logo" title=""><img src="<?=$logo?>" alt="" height="80px" /></a></div>
		<div class="head-right">
		<? if(!isset($_SESSION['userid'])){?>
			<ul class="top-link">
				<li><a href="register.php">Register</a></li>
				<li>|</li>
				<li><a href="login.php">Login</a></li>
			</ul>
		<?} else {?>
			<ul class="top-link">
				<li>Welcome <a href=""><?=$_SESSION['username']?></a> !</li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		<? } ?>
		</div>     
  </div><!--header -->