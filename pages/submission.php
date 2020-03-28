<?
$appid = $_REQUEST['appid'];
$appname = $dir->GetTableInfo('Applications','AppName','AppId',$appid);
$appdesc = $dir->GetTableInfo('Applications','AppDesc','AppId',$appid);
$challengeid = $dir->GetTableInfo('Applications','ChallengeId','AppId',$appid);
$companyId = $dir->GetTableInfo('Challenges','CompanyId','ChallengeId',$challengeid);
$appusername = $dir->GetUserInfo($dir->GetTableInfo('Applications','ChallengeMemberId','AppId',$appid),'Username');
?>
<style>
	.gall-big-box{ display:none;}
	.gall-big-box-active{ display:block;background:#000;}
  .gall-big-box-active img{border:5px solid #fff;}
	.gall-thumb{float:left;opacity:0.5}
	.gall-thumb:hover{opacity:1;cursor:pointer}
	.gall-thumb-active{opacity:1}
	.gall-desc{ width: 580px;float:left;margin-bottom:100px;padding-left:15px;font-size:14px;line-height:18px;color:rgb(128,128,128);}
	.obj-img{height:400px; max-width:560px}
	.app-gall-outer{min-height:300px;padding-left:10px}
	.app-gall-bigbox{width: 580px;padding: 15px;}
	.app-gall-thumbnail{ width: 580px; height:110px; float:left;margin-left:5px;}
	.app-gall-thumbnail .thumb-left{ float:left;width:30px;text-align:center;margin-right:20px;padding-top: 20px;}
	.app-gall-thumbnail a.aquo{ font-size:45px;color:gray;text-decoration:none}
	.app-gall-thumbnail .thumb-right{ float:right;width:30px;text-align:center;margin-left:20px;padding-top: 30px;}
</style>
<br>
 <?
		echo $dir->ShowChallengeProfileTop($challengeid);
	
		if($dir->GetTableInfo('Challenges','Solved','ChallengeId',$challengeid) == '1'){
			?>
				<div style="padding:8px 32px;background-color:#FFDB80;">
					This challenge is closed. View winning entry <a href="submission_page.php?appid=<?=$dir->GetTableInfo2('AppId','Applications','ChallengeId="'.$challengeid.'" and AppWinner="1" ')?>">here</a>.
				</div>
			<?
		}
		if($dir->GetTableInfo('Applications','ChallengeMemberId','AppId',$appid) == $_SESSION['userid']){
			?>
				<div style="padding:8px 32px;background-color:#FFDB80;">
					This is your entry.
				</div>
			<?
		}
?>
<br>

	<? if($dir->CheckIfExist("SELECT * FROM `Applications` WHERE `AppId` = '".$appid."'") == false){
					echo "This application does not exist.<br><br><br><br><br><br><br><br>";
	}
	else{ ?>		
	<div id="jcenter-left">
		<div class="jcenter-inner">
					
					<h2 class="p-title"><?=$appname?></h2>
					<p>Submitted by: &nbsp; <a href="challenger-<?=$appusername?>.html"><?=$appusername?></a></p>
					<div class="app-gallery">
						<?=$dir->GetAppSingle($appid)?>
						<div class="gall-desc" >
							<? 
								echo $appdesc;
								$files = $dir->GetAppliFiles($appid);
								if($companyId==$_SESSION['userid']){
									for($i=0; $i<sizeof($files); $i++){
										if($i==0)
											echo '<br><br>Download Attachments: <br>';
										echo ($i+1).') <a href="'.$files[$i].'" target="_blank" style="color:red;text-decoration:underline">Attachment '.($i+1).'</a><br>';
									} 
								}
							?>
							
						</div>
						<? //if company viewing posted the current challenge, buttons for approval will display
						if($dir->CheckIfExist("SELECT * FROM `Challenges` WHERE ChallengeId = '".$challengeid."' and `CompanyId` = '".$_SESSION['userid']."' ") == true
						&& $dir->GetTableInfo('Challenges','Solved','ChallengeId',$challengeid) == '0'){ ?>	
							<a href="approvesubmission.php?appid=<?=$appid?>" id="approve" class="button-href orange" style="float:right; margin-bottom:20px">Approve</a>	
						<? } ?>
					</div>
					
		</div>
	</div>
	<div id="jcenter-right">
		<div class="jcenter-inner">
			<? include 'modules/challenge-sponsor.php'; ?>
		</div><!-- class="jcenter-inner" -->
	</div> 
	<? } ?>
	

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