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

	<!-- analytics -->
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-29828968-4']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
	<!-- analytics-->

<script type="text/javascript" src="js/clear_textbox.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="http://mychallenge.com/new/javascripts/tabs.js"></script>
</head>
<body>
<div class="jfill_top">
	<ul class="top-link">
		<li> About </<a></li>
		<li> Contact </<a></li>
		<li> Sponsors </<a></li>
		<li> Staffing </<a></li>
		<li> Services </<a></li>
	</ul>
<div class="container">
	<div class="head-right"><!--start of top menu-->

	<? if(!isset($_SESSION['userid'])){?>
			<ul class="top-link">
				<li><a href="register.html">Register</a></li>
				<li>|</li>
				<li><a href="login.html">Login</a></li>
			</ul>
		<?} else {?>
			<ul class="top-link">
				<li>Welcome <a href=""><?=$_SESSION['username']?></a> !</li>
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