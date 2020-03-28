<?
if(!isset($_SESSION['userid'])){ ?>
	<script>window.location.href="/login.php";</script>	<?
}
?>

<!--todo : mmb show users latest applications if the user has one, if not show this next steps instead-->
<?php
	$usertype = $dir->GetUserInfo($_SESSION['userid'],'UserType');
	$_SESSION['usertype'] = $usertype;
		
	switch($usertype){
		case '1':{
			if($dir->CheckIfExist("SELECT * FROM `Applications` WHERE ChallengeMemberId = '".$_SESSION['userid']."' ") == true){
				include ($_SERVER['DOCUMENT_ROOT']).'/modules/my-applications.php';
			}else{
				include ($_SERVER['DOCUMENT_ROOT']).'/modules/user-howto.php';
			}
			break;
		}
		case '2':{
			include ($_SERVER['DOCUMENT_ROOT']).'/modules/my-sponsorships.php';
			break;
		}
		default:{
			include ($_SERVER['DOCUMENT_ROOT']).'/modules/user-howto.php';
			break;
		}
		
	}
		
?> 