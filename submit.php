<? 
include ('includes/function.php'); 
$dir = new DIR_LIB_2();

//check if loggedin

//get challenge detail
$challengeid = $_GET['challengeid'];
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

<style type="text/css">
	.field-submit{margin:10px 0px 0px; }
	.title{font-size:2em;font-weight:bold;padding-bottom:4px;margin-bottom:0;margin-top:5px;color:#C0C0C0}
	.field-submit p{font-color:#999;font-size:12px;margin:2px;}
	input[type="file"] { background: none; }
	.field-submit .title{width:400px;}
</style>

</head>
<body>
<div id="wrap">
<div id="wrap-inside">

	<div id="header">
		<div class="head-left"><a href="#" class="logo" title=""><img src="<?=$logo?>" alt="" height="80px" /></a></div>
		<div class="head-right">
			<ul class="top-link">
				<li><a href="#">Register</a></li>
				<li>|</li>
				<li><a href="#">Login</a></li>
			</ul>
		</div>     
  </div><!--header -->
   
<div id="container">
	<div class="menu-holder">
      <ul class="main-menu">
			<li><a href="home.php"> Home</a></li>
			<li><a href="browse.php" class="active">Browse</a></li>
		</ul><!--main-menu -->
   </div><!--menu-holder -->

<div id="inner">
<div id="content">
<div id="left">
<div class="heading"><h2><span><a href="browse.php">Browse</a> &raquo; EarthChallenge.com</span></h2></div>
	
	<h1>Submit Solution to <?=$dir->GetTableInfo("Challenges","ChallengeTitle","ChallengeId",$challengeid)?></h1>

<form action="" method="POST" enctype="multipart/form-data">	
	<div class="field-submit">
		<span class="title">Name</span>
		<p>How do you want to call your submission</p>
		<input name="title" class="title" type="text"></input>
	</div>
	
	<div class="field-submit">
		<span class="title">Description</span>
		<p>Describe your solution</p>
		<textarea name="description" class="title"></textarea>
	</div>
	
	<div class="field-submit">
		<span class="title">Upload File</span>
		<p>Add .pdf or .doc file</p>
		<input name="title" type="file"></input>
	</div>
	
	<br><br>
	<div><input type="submit" name="submit" value="SUBMIT"></input></div>
</form>	

</div><!--left -->

<div id="right">

<div class="heading"><h2><span> Browse MyChallenge.com</span></h2></div>
<ul class="side-list">
	<li><h4><a href="#">Categories</a></h4></li>
	<?=$dir->ShowCategories()?>
</ul>

</div><!--right-->

  <br class="clear" /> 
</div><!--content -->
</div><!--inner -->

</div><!--container -->

<div id="footer"> 
	<ul class="foot-menu">
      <li><a href="about.php">About</a></li>
      <li><span>|</span></li>
		<li><a href="contact.php">Contact</a></li>
		<li><span>|</span></li>
		<li><a href="sponsor.php">Sponsor</a></li>
		<li><span>|</span></li>
		<li><a href="staffing.php">Staffing</a></li>
		<li><span>|</span></li>
      <li><a href="services.php">Services</a></li>
	</ul><!--foot-menu -->
   <p class="copyright">&copy; <?=$domain?> 2012-2013. All rights reserved</p>

</div><!--footer -->

</div><!--wrap-inside -->
</div><!--wrap -->
</body>
</html>
