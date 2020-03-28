<?php
		$sponsorshiparray = $dir->GetMySponsorship($_SESSION['userid']);
		
		if($sponsorshiparray == 0){
			?>
				<p>You have not sponsored a challenge yet.</p>
			<?
		}else{?>
			<h3>My Sponsorships [<?=sizeof($sponsorshiparray)?>]</h3><?
			
			for($i=0; $i < sizeof($sponsorshiparray) ; $i++){
				if($sponsorshiparray[$i]['SponsorshipType'] == '1'){ $type = "Monetary ".$sponsorshiparray[$i]['Amount']; }
				if($sponsorshiparray[$i]['SponsorshipType'] == '2'){ $type = "Miscellaneous"; }
			?>
				<div class="submission-gallery">
							<img width="150" height="150" src="<?=$dir->GetTableInfo('Challenges','Photo','ChallengeId',$sponsorshiparray[$i]['ChallengeId'])?>">
							<p>
								<span style="font-size:10px;"><?=$type?></span>
								<br>
								<span style="font-size:10px;">Challengename :</span>
								<span style="font-size:10px;"><?=$dir->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$sponsorshiparray[$i]['ChallengeId'])?></span>
							</p>
				</div>
				
				
			<?
			}
		}
	?>
	
	<div style="clear:both"></div>
 <h3>Latest Applications</h3>
	<?=$dir->ShowLatestApplications(9);?>
  <hr />
<style type="text/css">
	.submission-gallery { margin: 10px; float: left; width: 30%; min-height: 270px; }
</style>