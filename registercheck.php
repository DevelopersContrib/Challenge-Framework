<?
session_start();
include ('includes/function.php'); 
$dir = new DIR_LIB_2();

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$country = $_POST['country'];
$usertype = $_POST['usertype'];
$domainid = $domain_id;

if($dir->CheckEmailIfExist($email)===FALSE){
	if($dir->CheckUsernameIfExist($username)===FALSE){
		if($dir->RegisterMember($username,$password,$email,$country,$domainid,$usertype)==1){ //if success
						
			$subject = "Welcome to EarthChallenge!";
			$message = "This email is a notification that you have been registered to earthchallenge.";
				
			$dir->SendEmail($email,$subject,$message,$username);
			$_SESSION['userid'] =  $dir->GetTableInfo('ChallengeMembers','ChallengeMemberId','Username',$username);
			$_SESSION['username'] =  $username;
			
			$return = '1';//success
			
		}else{
			$return = '2'; //error
		}	
	}
	else{
		$return = '4'; //username already taken
	}
}else{
	$return = '3'; //email already exist
}
echo $return;


?>
