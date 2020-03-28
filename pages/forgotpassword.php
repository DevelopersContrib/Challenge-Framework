<h1>Forgot Password</h1>

<?php
	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$username = $dir->GetTableInfo('ChallengeMembers','Username','Email',$email);
		$password = $dir->GetTableInfo('ChallengeMembers','Password','Email',$email);
			
			$message = "Your Username is <b>".$username."</b>";
			$message .= " and Password is <b>".$password."</b>";
		
			
			$sendemail = $dir->SendEmail($email,$domain." - Forgot Password",$message,$username);
				if($sendemail == true ){
					?>
						<span>Your login details were sent to <?=$email?>.</span>
					<?
				}
			
	}else{
?>
<form action="" method="POST">
	<h5>Email Address&nbsp;</h5>
	<span>Enter your email address below. We will send your login details in your email.</span><br>
	<input type="text" name="email" id="email" style="margin:8px;width:400px;" />
	<input type="submit" name="submit" value="Submit">
</form>
<?php } ?>