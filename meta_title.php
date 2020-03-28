<?php
	$pagename = str_replace('/','',$_SERVER['PHP_SELF']);
	
	$title = "";
	
	switch($pagename){
		case 'fullpageholder.php':{
			$page = $_GET['page'];
				
				switch($page){
					case 'challenge':{
						$title = "Challenge Details - ".$dir->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$_GET['challengeId']);
					break;}
					case 'submission':{
						$title = "Application Details - ".$dir->GetTableInfo('Applications','AppName','AppId',$_GET['appid']);
					break;}
					case 'submission-gallery':{
						$title = "Application Gallery - ".$dir->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$_GET['challengeId']);
					break;}
					case 'apply':{
						$title = "Submit Application";
					break;}
					case 'company':{
						$title = "Company Profile - ".$_GET['username'];
					break;}
					case 'editchallenge':{
						$title = "Edit Challenge";
					break;}
					case 'contact-full':{
						$title = "Contact Us";
					break;}
					default:{
						$title = ucfirst($page);
						break;
					}
				}
				
			break;
		}
		case 'pageholder.php':{
			$page = $_GET['page'];
			
				switch($page){
					case 'challenger':{
						$title = "Challenger Profile - ".$_GET['username'];
						break;}
					case 'company':{
						$title = "Company Profile - ".$_GET['username'];
						break;}
					default:{
						if(isset($_GET['title'])){
							$title = $_GET['title'];
						}else{
							$title = ucfirst($page);
						}
						break;
					}
				}
			break;
		}
		case 'login.php':{
			$title = "Login to ".$domainname;
			break;
		}
		case 'register.php':{
			$title = "Register to ".$domainname;
			break;
		}
		default:{
			$title = $domainname;
			break;
		}
	}
?>