<?php
	//list of my challenges
		session_start();
		include('includes/config2.php');
		include('includes/function.php');
		
		$dir = new DIR_LIB_2;
		
		$mylist = $dir->GetMySponsorship(1);
		$html = sizeof($mylist);
		for($i=0; $i < sizeof($mylist) ; $i++ ){
			 $html .= '<div>
				'.($i+1).'&nbsp;'.$dir->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$mylist[$i]['ChallengeId']).'<br>
				Amount:'.$mylist[$i]['Amount'].'
			 <div>';
		}
		
		echo $html;
?>