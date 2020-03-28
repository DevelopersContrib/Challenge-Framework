<?
session_start();
include ('includes/function.php'); 
$dir = new DIR_LIB_2();

$u = $_POST['username'];
$p = $_POST['password'];

if($dir->CheckLogin($u,$p)===TRUE){
	$login = 1;
	$_SESSION['userid'] =  $dir->GetTableInfo('ChallengeMembers','ChallengeMemberId','Username',$u);
	$_SESSION['username'] =  $u;
	$_SESSION['usertype'] = $dir->GetTableInfo('ChallengeMembers','UserType','ChallengeMemberId',$_SESSION['userid']);
	
}else{
	$login = '0';
}
echo $login;
?>
