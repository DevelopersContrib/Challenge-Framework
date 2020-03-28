	
<?php
	$challengerid = $dir->GetTableInfo('ChallengeMembers','ChallengeMemberId','Username',$_REQUEST['username']);
	$photo = $dir->GetTableInfo('ChallengeMembers','Photo','ChallengeMemberId',$challengerid);
	if($photo=='') $photo = 'http://mychallenge.com/images/no_person.jpg';
	$website = $dir->GetTableInfo('ChallengeMembers','Website','ChallengeMemberId',$challengerid);
	$visit='';
	if($website!='')
		$visit = '<p>Visit:  '.$website.'</p>';
?>
	<div class="jcol">	
		<h2><?=$_REQUEST['username']?></h2>
   			
        <img width="200" height="200" src="<?=$photo?>" hspace="10" align="middle">
		<br>
		<p>
		<span><?=$dir->GetTableInfo('ChallengeMembers','Country','ChallengeMemberId',$challengerid)?> &mdash; <?=$dir->GetTableInfo('ChallengeMembers','Email','ChallengeMemberId',$challengerid)?> </span>
		</p>
		
   		<p>
        <?=$dir->GetTableInfo('ChallengeMembers','Minibio','ChallengeMemberId',$challengerid)?>

   		<?=$visit?>
		
		<h4>Challenger Statistics</h4>
			
			<p>Submissions: <?=$dir->CountRows('Applications','ChallengeMemberId = '.$challengerid)?></p>
			<p>Approved Solutions: <?=$dir->CountRows('Applications','AppWinner = "1" AND ChallengeMemberId = '.$challengerid)?></p>
		
	</div><!-- jcol -->
	