<?php
	session_start();
	include 'includes/config2.php';
	include('includes/function.php');

	$dir = new DIR_LIB_2;
	
	//save sponsorship
		$sponsorid = $_POST['sponsorid'];
		$sponsorshiptype = $_POST['type'];
		$message = mysql_real_escape_string($_POST['message']);
		$amount = mysql_real_escape_string($_POST['amount']);
		$challengeid = $_POST['challengeid'];
		$emailsponsor = $_POST['emailsponsor'];
		
		
	if($sponsorid == ""){
		echo "Please login";
	}else if($message == ""){
		echo "Please send us a short message.";
	}else if($challengeid == ""){
		echo "No challenge selected";
	}else if($amount == "" && $type == "1"){
		echo "Please input amount of sponsorship";
	}else{
		//ready to save sponsorship
		if($amount == "" && $type == "2"){ $amount = 0;}
		
		$saved = mysql_query("INSERT INTO SponsorContact(SponsorshipType,ChallengeId,SponsorId,Message,Amount,DateSubmit) VALUES('".$sponsorshiptype."','".$challengeid."','".$sponsorid."','".$message."','".$amount."',NOW())");
		if(!$saved){
			echo "An error occurred. Please try again. <br>Error: ".mysql_error();
		}else{
				
				if($emailsponsor == '1'){
					$to = $dir->GetUserInfo($sponsorid,'Email');
					$subject = "Challenge Sponsorship";
					$username = $dir->GetUserInfo($sponsorid,'Username');
					//echo $to." ".$subject." ".$username." ".$message;
					$dir->SendEmail($to,$subject,$message,$username);
				}
				
			echo "Thank you for your kindness. We will contact you as soon as we get your message.";
		}
	}
	
?>