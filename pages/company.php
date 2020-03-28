	
<?php
	$companyid = $dir->GetTableInfo('ChallengeMembers','ChallengeMemberId','Username',$_REQUEST['username']);
?>
	<div class="jcol">	
		<h2><?=$_REQUEST['username']?></h2>
   			
        <img src="<?=$dir->GetTableInfo('ChallengeMembers','Photo','ChallengeMemberId',$companyid)?>" hspace="10" align="middle">
		<br>
		<p>
		<span><?=$dir->GetTableInfo('ChallengeMembers','Country','ChallengeMemberId',$companyid)?> &mdash; <?=$dir->GetTableInfo('ChallengeMembers','Email','ChallengeMemberId',$companyid)?> </span>
		</p>
		
   		<p>
        <?=$dir->GetTableInfo('ChallengeMembers','Minibio','ChallengeMemberId',$companyid)?>

   		<p>Visit:  <?=$dir->GetTableInfo('ChallengeMembers','Website','ChallengeMemberId',$companyid)?></p>
		
		<h4>My Challenge Post:</h4>
        
        <div class="j-column">
        	
			<?php
				$posts = $dir->GetChallengePosts($companyid);
				if($posts == 0){
				?>
					<p><?=$username?> has no posts yet.</p>
				<?
				}else{
					for($i=0; $i<sizeof($posts); $i++){
					?>
						<a href="http://mychallenge.com/challenge_post.php?challengeid=<?=$posts[$i]['ChallengeId']?>"><li><?=$posts[$i]['ChallengeTitle']?></li></a>
					<?
					}
				}
			?>
        </div>
		
	</div><!-- jcol -->
	