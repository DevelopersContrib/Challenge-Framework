<?php

include('header-new-v2.php');
$earthchaId="120";
$appid = $_GET['appid'];
$appname = $dir->GetTableInfo('Applications','AppName','AppId',$appid);
$appdesc = $dir->GetTableInfo('Applications','AppDesc','AppId',$appid);
$challengeid = $dir->GetTableInfo('Applications','ChallengeId','AppId',$appid);
$challengename = $dir->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$challengeid);

?>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="fancybox/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript">
			$(document).ready(function() {	
					$("#approve").fancybox({
					'width'				: '25%',
					'height'			: '25%',
					'autoScale'			: true,
					'transitionIn'		: 'none',
					'transitionOut'		: 'none',
					'type'				: 'iframe',
					'onClosed'			: function() {parent.location.reload(true);}
				});
			});
	</script>

<div class="jwidth">
	<center>
	<div class="jcenter_hdr">
		<div style="float:left; width:60%; height:100%;color:#FFF; text-align:left;">
			<div style="width:90%;margin-left:15px; height:310px; display:table-cell; vertical-align:middle;">
				<h1><?=$dir->GetTableInfo('Challenges','ChallengeDesc','ChallengeId',$earthchaId)?></h1>
			</div>
		</div>
		<div style="float:left; width:40%;"><img src="v2/images/desc-earthchallenge_small.png"></div>
	</div>
	</center>
	<div class="clear"></div>  
</div>

<div class="jcenter">
	<div class="jcenter_cont">
		<ul id="breadcrumb">
			<li><a href="home.php">Home</a></li>
			<li><a href="browse.php" >Browse</a></li>
			<li><a href="browse-prof.php?challengeId=<?=$challengeid?>"><?=$dir->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$challengeid)?></a></li>
			<li><a href="submission_gallery.php?challengeid=<?=$challengeid?>">Application Gallery</a></li>
			<li><?=$appname?></li>
		</ul>
		<br>
		<div id="jcenter-left">
			<div class="jcenter-inner">
				<? if($dir->CheckIfExist("SELECT * FROM `Applications` WHERE `AppId` = '".$appid."'") == false){
					echo "This application does not exist.";
				}
				else{ ?>
					<p class="p-title"><?=$appname?></p>
					<div class="app-gallery">
						<?=$dir->GetAppSingle($appid)?>
						<div class="gall-desc" ><?=$appdesc?></div>
						<? //if company viewing posted the current challenge, buttons for approval will display
						if($dir->CheckIfExist("SELECT * FROM `Challenges` WHERE ChallengeId = '".$challengeid."' and `CompanyId` = '".$_SESSION['userid']."' ") == true
						&& $dir->GetTableInfo('Challenges','Solved','ChallengeId',$challengeid) == '0'){ ?>	
							<a href="approvesubmission.php?appid=<?=$appid?>" id="approve" class="button-href orange" style="float:right; margin-bottom:20px">Approve</a>	
						<? } ?>
						
					</div>
					
				<? } ?>
				
				
			</div>
		</div>
		<div id="jcenter-right">
			<div class="jcenter-inner">
				<ul class="side-list">
					<li><h4><a href="#">Challenge Sponsor</a></h4></li>
					<?=$dir->ShowChallengeSponsorDetails($challengeid);?>
				</ul>
				<ul class="side-list">
					<li><h4><a href="#">Other Sponsors</a></h4></li>
					<?=$dir->ShowSponsorLists();?>
				</ul>
			</div>	
		</div>
	
		<div class="clear"></div> 
	
	</div>     
</div>

<div class="clear"></div>  

<div class="jfooter">
    <center>
        <div class="footer-tab-section">
           	<div class="footer-tab">
                <span>About</span>
                <ul>
				<li><a href="#">My Company</a></li>
                <li><a href="#">Book Now</a></li>
                <li><a href="#">Resources</a></li>
                </ul>
            </div>

			<div class="footer-tab">
                <span>Contacts</span>
 			    <ul>
				<li><a href="#">My Company</a></li>
                <li><a href="#">Book Now</a></li>
                <li><a href="#">Resources</a></li>
				</ul>
			</div>

			<div class="footer-tab">
                <span>Sponsors</span>
                <ul>
				<li><a href="#">My Company</a></li>
                <li><a href="#">Book Now</a></li>
                <li><a href="#">Resources</a></li>
				</ul>
            </div>
            
            <div class="footer-tab">
                <span>Staffing</span>
                <ul>
				<li><a href="#">My Company</a></li>
                <li><a href="#">Book Now</a></li>
                <li><a href="#">Resources</a></li>
				</ul>
			</div>
            
            <div class="footer-tab">
                <span>Services</span>
                <ul>
				<li><a href="#">My Company</a></li>
                <li><a href="#">Book Now</a></li>
                <li><a href="#">Resources</a></li>
				</ul>
			</div>
            
         </div>
    </center> 
</div>

</div>

</body>
</html>
<style>
	.gall-big-box{ display:none}
	.gall-big-box-active{ display:block}
	.gall-thumb{float:left;opacity:0.5}
	.gall-thumb:hover{opacity:1;cursor:pointer}
	.gall-thumb-active{opacity:1}
	.gall-desc{ width: 580px;float:left;margin:20px;font-size:12px}
	.obj-img{height:400px; max-width:560px}
	.app-gall-outer{min-height:300px;padding-left:10px}
	.app-gall-bigbox{width: 580px;height: 400px;padding: 15px;background:white}
	.app-gall-thumbnail{ width: 580px; height:110px; float:left;padding:0 15px 0 25px}
	.app-gall-thumbnail .thumb-left{ float:left;width:30px;text-align:center;margin-right:20px;padding-top: 20px;}
	.app-gall-thumbnail a.aquo{ font-size:45px;color:gray;text-decoration:none}
	.app-gall-thumbnail .thumb-right{ float:right;width:30px;text-align:center;margin-left:20px;padding-top: 30px;}
</style>
<script type="text/javascript">
			$(document).ready(function (){
				var cnt = $("#gall-cnt").val();
				//alert(cnt);
				
				for(var i=1;i<=cnt;i++){
					$("#thumb"+i).click(function(){
						var x = $(this).attr("id");
						var y = x.replace('thumb','');
						//alert(y);
						
						for(var j=1;j<=cnt;j++){
							if(y==j){
								$("#object"+j).attr("class", "gall-big-box-active");
								$("#thumb"+j).attr("class", "gall-thumb  gall-thumb-active");
							}
							else{
								$("#object"+j).attr("class", "gall-big-box");
								$("#thumb"+j).attr("class", "gall-thumb");
							}
						}
					});
				}
			});
</script>