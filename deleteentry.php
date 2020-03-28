<?php
	session_start();
	require_once('includes/config2.php');
		
	$challengeid = $_POST['challengeid'];
	$id = $_POST['id'];
	$type = $_POST['type'];
		
	/*check session, check if current company owns the challenge */
	
	
	if($_SESSION['userid']==""){
		print "Session Expired. Please login";	exit;
	}
	
	$usertype = GetUserInfo($_SESSION['userid'],'UserType');
	
	if($usertype != 2 ){ //redirects to broswe if not company
		print "You are not allowed to do this action";	exit;
	}
	else if(!($_SESSION['userid'] == GetTableInfo('Challenges','CompanyId','ChallengeId',$challengeid))){
		echo "You are not allowed to do this action";
	}
	else{
		switch($type){
			case '1':{
				mysql_query("DELETE FROM ChallengePrizes WHERE PrizeId = '".$id."'") or die(mysql_error());
				break;
			}case '2':{
				mysql_query("DELETE FROM ChallengeCriteria WHERE CriteriaId = '".$id."'") or die(mysql_error());
				break;
			}case '3':{
				mysql_query("DELETE FROM ChallengeHowToEnter WHERE HowToId = '".$id."'") or die(mysql_error());
				break;
			}
			default: break;
		}
	}

	
	function GetUserInfo($memberid,$field){
		$sql = mysql_query("SELECT `$field` as result FROM ChallengeMembers WHERE ChallengeMemberId = '".$memberid."'") or die(mysql_error());
			while($row = mysql_fetch_array($sql)){
				return $row['result'];
			}
	}
	
	function GetTableInfo($table,$field,$wherefield,$value){
		$result = mysql_query("SELECT `$field` as val from $table where `$wherefield` = '$value'");
			if (!$result){
			   $returnValue = mysql_error();
			}else {            
				while($row = mysql_fetch_array($result)){
					//if($field == 'linkedin_picture' && $row==""){$value = " http://webpoints.com/images/avatar-linked.png";}
					$value = $row['val'];
				}  
			}
	   return $value;
	  }
	
?>