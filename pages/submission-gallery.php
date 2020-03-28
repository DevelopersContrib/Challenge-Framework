<?
$challengeid = $_GET['challengeId'];
$challengename = $dir->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$challengeid);
?>
<style>
.submission-gallery{ margin:10px 10px 60px 10px; float:left; height:160px; width:30%; }
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
		<h2 class="p-title">Application Gallery for <?=$challengename?></h2>
		<p><?=$dir->ShowSubmissions($challengeid);?></p>
	</div>
</div>

<div id="jcenter-right">
   <div class="jcenter-inner">
	  <? include 'modules/challenge-sponsor.php'; ?>
	</div><!-- class="jcenter-inner" -->
</div> 

