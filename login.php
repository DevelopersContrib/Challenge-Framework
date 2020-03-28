<?php
include('header-new-v2.php');
	if(isset($_SESSION['userid'])){ ?>
	<script>window.location="/home.html";</script>	
	<? 
	}

?>
<div class="jwidth">
<center>
<div class="jcenter_hdr">
<div style="float:left; width:60%; height:100%;color:#FFF; text-align:left;">
	<div style="width:90%;margin-left:15px; height:310px; display:table-cell; vertical-align:middle;">
	<h1><?=$small_description?></h1>
	</div>
</div>
<div style="float:left; width:40%;"><img src="<?=$desc_graphic?>" style="height:280px;"></div>
</div>
</center>
 <div class="clear"></div>  
</div>
<div class="jcenter">
	<div class="jcenter_cont">
		<div class="slide-container">
	<script type="text/javascript" src="js/login.js"></script>
	<form method="POST"  onsubmit="return LoginCheck()">
		<div class="form-box">
			<h1>LOGIN NOW</h1>
			<div class="form-box-hold">
				<div class="form-box-text">USERNAME:</div>
				<div class="form-box-input"><input name="username" id="username" type="text" /></div>
			</div>
			<div class="form-box-hold">
				<div class="form-box-text">PASSWORD:</div>
				<div class="form-box-input"><input name="password" id="password" type="password" /></div>
			</div>
			<div class="form-box-hold">
				<div class="form-box-right">
					<span class="form-check"><input name="" type="checkbox" value="" /></span> 
					Remember me 
					<span class="form-space">|</span>
					<a href="forgotpassword.html">Forgot Password?</a>
				</div>
			</div>
			<div class="form-box-hold">
				<div class="form-box-right"><a href="register.php" class="form-link">Don't have account?  Register here</a></div>
			</div>
			<div class="form-box-hold">
				<div class="form-box-text">&nbsp;</div>
				<div class="form-box-right">
						<input type="hidden" name="domainid" id="domainid" size="20" value="<?=$domainid?>" />
						<input type="hidden" name="domainidUrl" id="domainUrl" size="20" value="<?=$domainUrl?>" />
						<button  class="form-submit-left" />LOGIN</button>
						<span id="log-loading" style="color:red;display:none">
							<img src="http://linked.com/images/loader.gif">Checking...
						</span>
						<span class="form-warning"></span>
				</div>
			</div>
		</div><!--form-box -->
		<div>
			<br><br>
			<img src="http://d2qcctj8epnr7y.cloudfront.net/images/marvinpogi/desc-mychallenge1.png">
		</div>
	</form>
</div><!--slide-container -->
  <br class="clear" /> 	
	</div><!-- jcenter cont -->
 <div class="clear"></div>  
 <?include_once('footer_.php');?>