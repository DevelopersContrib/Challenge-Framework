<? 
session_start();
include ('includes/function.php'); 
$dir = new DIR_LIB_2();
include('meta_title.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<html lang="en-US">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<meta name="title" content="<?=$domain?> " />
<meta name="description" content="<?=$domain?>" />
<meta name="keywords" content="<?=$domain?>" />
<meta name="robots" content="INDEX, FOLLOW" />
<link rel="icon" href="images/favicon.ico" />
<!--[if ie 6]>
<link rel="stylesheet" href="css/ie6.css" type="text/css" media="screen" />
<script type="text/javascript" src="css/ie6/iepngfix_tilebg.js"></script>  
<![endif]-->
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="v2/style-v2.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/color-option/<?=$color?>.css" type="text/css" media="screen" />

<script type="text/javascript" src="js/clear_textbox.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="http://mychallenge.com/new/javascripts/tabs.js"></script>
</head>
<body>
<div class="jfill_top">

<div class="container">
	<div class="head-right" style="width:100%"><!--start of top menu-->

	<? if(!isset($_SESSION['userid'])){?>
			<ul class="top-link">
				<li class="li-pad"> <a href="about.html">About </a></li>
				<li class="li-pad"> <a href="contact.html">Contact </a></li>
				<li class="li-pad"> <a href="sponsors.html">Sponsors </a></li>
				<li class="li-pad"> <a href="staffing.html">Staffing </a></li>
				<li class="li-pad-last"> <a href="services.html">Services </a></li>
				<li><a href="register.html">Register</a></li>
				<li>|</li>
				<li><a href="login.html">Login</a></li>
			</ul>
		<?} else {?>
			<ul class="top-link">
				<li class="li-pad"> <a href="about.html">About </a></li>
				<li class="li-pad"> <a href="contact.html">Contact </a></li>
				<li class="li-pad"> <a href="sponsors.html">Sponsors </a></li>
				<li class="li-pad"> <a href="staffing.html">Staffing </a></li>
				<li class="li-pad-last"> <a href="services.html">Services </a></li>
				<li>Welcome <a href="#" class="li-pad-user"><?=$_SESSION['username']?></a> !</li>
				<li><a href="settings.html">Settings</a></li>
				<li><a href="logout.html">Logout</a></li>
				<li><a href="http://company.mychallenge.com/">Help</a></li>
				
			</ul>
		<? } ?>
    </div><!-- end top menu -->
</div>
</div>
<div class="jheadr"><!--start of header -->
<div class="container">
<div class="head-left">
<a href="http://<?=$domain?>"><img src="<?=$logo?>" style="max-height:90px;"></a>
</div>
</div>
</div><!--end of header-->