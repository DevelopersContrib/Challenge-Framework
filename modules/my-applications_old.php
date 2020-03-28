<?php
		include_once('includes/challenger_function.php');
		$challenger = new DIR_CHALLENGER;
		
		$applications_array = $challenger->GetMyApplications($_SESSION['userid']);
		
		if($applications_array == 0){
			?>
				<p>An error occurred while we are fetching your info.</p>
			<?
		}else{?>
			<h3>My Applications [<?=sizeof($applications_array)?>]</h3><?
			
			for($i=0; $i < sizeof($applications_array) ; $i++){
			?>
				<div class="submission-gallery">
						<a href="application-<?=$applications_array[$i]['AppId']?>">
							<img width="150" height="150"  src="<?=$challenger->GetTableInfo('AppImages','ImagePath','AppId',$applications_array[$i]['AppId'])?>">
							<p>
								<span style="font-size:10px;"><?=$applications_array[$i]['AppName']?></span>
								<br>
								<span style="font-size:10px;">Challengename :</span>
								<span style="font-size:10px;"><?=$challenger->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$applications_array[$i]['ChallengeId'])?></span>
							</p>
						</a>
				</div>
			<?
			}
		}
	?>
	
	
 <h3>Latest Applications</h3>
	<?=$dir->ShowLatestApplications(6);?>
  <hr />
<style type="text/css">
	.submission-gallery { margin: 10px; float: left; width: 30%; min-height: 270px; }
</style>