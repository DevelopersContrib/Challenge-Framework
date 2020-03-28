<?
$challengeid = $_GET['challengeId'];
?>
<style type="text/css">
	.jtab-container a {
		text-decoration:none;
	}
  .jtab-container {
  	width:650px;
	min-height:350px;
  	}
	.jtab-content {
		padding:5px;
		min-height:300px;
	}
	.chall_content{
		display:none;
	}
  .jtabs {
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	font-weight:bold;
	float:left;
    padding:8px;
	min-width:100px;
	margin-right:5px;
	-webkit-border-top-left-radius:5px;
	-webkit-border-top-right-radius:5px;
	background-color:#B3B3B3;
	text-align:center;
	color:#FFF;
  }
  div.jtabs:hover {
	  background-color:#8B8B8B;
	  color:#FFF;
	  cursor:pointer
  }
  .jtab-grp-tab {
	  border-bottom:1px solid #8B8B8B;
	  height:29px;
  }
 
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
	?>
	<br>
<div id="jcenter-left">
   <div class="jcenter-inner">
   	<h2 class="p-title">More Details</h2><br />
           <span class='st_sharethis_vcount' displayText='ShareThis'></span>
<span class='st_facebook_vcount' displayText='Facebook'></span>
<span class='st_twitter_vcount' displayText='Tweet'></span>
<span class='st_linkedin_vcount' displayText='LinkedIn'></span>
<span class='st_email_vcount' displayText='Email'></span>
   <div class="clear"></div>
   <br />
		
			<p><?=nl2br(stripslashes($dir->GetTableInfo('Challenges','MoreDetails','ChallengeId',$challengeid)))?></p>
     <br />
      
   <br />
		<div class="jtab-grp-tab">
        	<div class="jtabs" id="jtabs-timeline" style="background-color:#8B8B8B">Timeline</div>
        	<div class="jtabs" id="jtabs-prizes">Prizes</div>
        	<div class="jtabs" id="jtabs-criteria">Criteria for Judging</div>
        	<div class="jtabs" id="jtabs-howto">How to Enter</div>
        <!-- end jtab-grp !--></div>
    	<div class="jtab-content">
        	<div id="content_1">
                <p><div  class="chall_content" id="chall-timeline" style="display:block"><?=$dir->ShowTimeline($challengeid);?></div></p> 
				<p><div  class="chall_content" id="chall-prizes"><?=$dir->ShowPrizes($challengeid);?></div></p>	
				<p><div  class="chall_content" id="chall-criteria"><?=$dir->ShowCriteria($challengeid);?></div></p>
				<p><div  class="chall_content" id="chall-howto"><?=$dir->ShowHowToEnter($challengeid);?></div></p>
            </div>
           <div class="clear"></div>
        </div>
		<div class="clear"></div> 
	</div>
</div>
<div id="jcenter-right">
   <div class="jcenter-inner">
		<? include 'modules/challenge-sponsor.php'; ?>
	</div><!-- class="jcenter-inner" -->
</div> 

<script type="text/javascript">
 (function ($) {
	$("#jtabs-timeline").click(function() {
		$(this).css('background-color','#8B8B8B');
		$('#jtabs-prizes').css('background-color','#B3B3B3');
		$('#jtabs-criteria').css('background-color','#B3B3B3');
		$('#jtabs-howto').css('background-color','#B3B3B3');
		$('#chall-timeline').css('display','block');
		$('#chall-prizes').css('display','none');
		$('#chall-criteria').css('display','none');
		$('#chall-howto').css('display','none');
	});
	$("#jtabs-prizes").click(function() {
		$(this).css('background-color','#8B8B8B');
		$('#jtabs-timeline').css('background-color','#B3B3B3');
		$('#jtabs-criteria').css('background-color','#B3B3B3');
		$('#jtabs-howto').css('background-color','#B3B3B3');
		$('#chall-timeline').css('display','none');
		$('#chall-prizes').css('display','block');
		$('#chall-criteria').css('display','none');
		$('#chall-howto').css('display','none');
	});
	$("#jtabs-criteria").click(function() {
		$(this).css('background-color','#8B8B8B');
		$('#jtabs-timeline').css('background-color','#B3B3B3');
		$('#jtabs-prizes').css('background-color','#B3B3B3');
		$('#jtabs-howto').css('background-color','#B3B3B3');
		$('#chall-timeline').css('display','none');
		$('#chall-prizes').css('display','none');
		$('#chall-criteria').css('display','block');
		$('#chall-howto').css('display','none');
	});
	$("#jtabs-howto").click(function() {
		$(this).css('background-color','#8B8B8B');
		$('#jtabs-timeline').css('background-color','#B3B3B3');
		$('#jtabs-prizes').css('background-color','#B3B3B3');
		$('#jtabs-criteria').css('background-color','#B3B3B3');
		$('#chall-timeline').css('display','none');
		$('#chall-prizes').css('display','none');
		$('#chall-criteria').css('display','none');
		$('#chall-howto').css('display','block');
	});
})(jQuery);
</script>

<script type="text/javascript">var switchTo5x=false;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-d7a9ae85-b3dc-4c43-17a-a45cce5aa5c5"}); </script>