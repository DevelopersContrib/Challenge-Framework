<?php
//include 'http://www.domaindirectory.com/includes/main_functions_test.php';
include 'includes/main_functions_test.php';
$dir = new DIR_LIB();
include_once 'header-page.php'; 
	if($_POST['step']=='step2'){
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$company = $_POST['company'];
			$phone = $_POST['phone'];
			$email = $_POST['email2'];
			$password = $_POST['pass1'];
			$password2 = $_POST['pass2'];
			$domain = $_POST['domain']; 
        	
         
			@require_once('recaptchalib.php');
			$publickey = "6Le6rMESAAAAAGZ4euLGtDyQO-hrC5yqxWfwUDaM";
			$privatekey = "6Le6rMESAAAAAJhbSBT2tU13Bhrezo_PhgIwZZW5";
			$resp = null;
			$error = null;
			$resp = recaptcha_check_answer ($privatekey,
			$_SERVER["REMOTE_ADDR"],
			$_POST["recaptcha_challenge_field"],
			$_POST["recaptcha_response_field"]);
			
			if ($resp->is_valid) {
				if ($dir->CheckEmailExist($email)){
					$error = "Email already exists.";
				}
				else if ($dir->SaveUser($firstname,$lastname,$company,$phone,$email,$password,$domain)=="success"){
					$error =  "Successfully registered! <br>An email has been sent to you to verify your account!<br>";
				}
			} 	
			else {
				$error = $resp->error;
			}
			
			
	}
?>
<script type="text/javascript" src="/includes/sponsor.js"></script>
<div id="container2">
<div id="middlebox">
<div id="content2">
<h2>Interested in Sponsoring, Partnering or Supporting  <?=$domain?>, Join Free today</h2>
<br />
<form action="" method="post" id="submitform"> 
	<table class="contact-hold">
		<tr>
			<td></td>
			<td><font color="#FF5B00"><b><?=$error?></b></font></td>
		</tr>
		<tr>
			<td><b>FIRST NAME <font color="#FF5B00">*</font> :</b></td>
			<td><input id="firstname" name="firstname" type="text" class="c-in" value="<?=$_POST['firstname']?>"/></td>
		</tr>	
		
		<tr>
			<td><b>LAST NAME <font color="#FF5B00">*</font></b> :</td>
			<td><input id="lastname" name="lastname" type="text" class="c-in" value="<?=$_POST['lastname']?>"/></td>
		</tr>	
		<tr>
			<td><b>COMPANY </b></td>
			<td><input id="company" name="company"  type="text" class="c-in" value="<?=$_POST['company']?>"/></td>
		</tr>	
      <tr>
			<td><b>PHONE <font color="#FF5B00">*</font></b> :</td>
			<td><input name="phone" id="phone" type="text" class="c-in" value="<?=$_POST['phone']?>" /></td>
		</tr>	
		<tr>
			<td><b>EMAIL <font color="#FF5B00">*</font></b> :</td>
			<td><input name="email2" id="email2" type="text" class="c-in" value="<?=$_POST['email2']?>" /></td>
		</tr>	
		<tr>
			<td><b>PASSWORD <font color="#FF5B00">*</font></b> :</td>
			<td><input name="pass1" id="pass1" type="password" class="c-in" value=""/></td>
		</tr>	
		<tr>
			<td><b>CONFIRM PASSWORD <font color="#FF5B00">*</font></b> :</td>
			<td><input name="pass2" id="pass2" type="password" class="c-in" value=""/></td>
		</tr>

			<tr>
				<td>Choose type of Sponsorship</td>
				 <input type="radio" name="sponsorship" value="1"  />Monetary Sponsorship<br>
				 <input type="radio" name="sponsorship" value="2" />Another Sponsorship
			</tr>
			
			<div id="monetary" style="display:none">
				<tr>
					<td><b>Amount <font color="#FF5B00">*</font></b> :</td>
					<td><input name="amount" type="text" value=""/></td>
				</tr>
			</div>
		
		<tr>
			<td></td>
			<td>
				<? @require_once('recaptchalib.php');
				$publickey = "6Le6rMESAAAAAGZ4euLGtDyQO-hrC5yqxWfwUDaM";
				$privatekey = "6Le6rMESAAAAAJhbSBT2tU13Bhrezo_PhgIwZZW5";
				echo recaptcha_get_html($publickey, $error); 
				
				?>
				
			</td>
		</tr>		
	</table>	
	<br class="clear" />
	<input type="hidden" name="domain" value="<?=$domain?>">
   <input type="hidden" name="step" value="step2">
	<input id="submit" type="image" src="http://domaindirectory.com/servicepage/images/submit-btn.png">
	<br><br>
</form>
<br class="clear" />    
<br class="clear" />    
<br class="clear" />    
<div style="font-size:11px">
	<b><?=$domain?> </b>is considered a premium domain and at Domain Directory, 
	most of the domains are for development with in our Rapid Domain Builder platform. 
	Very few offers we receive on our domains are result in a transaction so please put your highest 
	and best offer forward to avoid wasting anytime. Good luck and wishing you a great 2011. 
</div>
 
</div>
</div>
</div>
<? include_once 'footer.php';?>
<style>
.contact-hold{font-size:12px;color:white;font-weight: bold;}
#submit {height:40px !important;width:100px !important;float:right} 
.contact-hold input.c-in {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #BAC2C7;
    color: #000000;
    font-size: 12px;
    height: 26px;
    padding: 0 10px;
    width: 230px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
}
</style>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
			$(document).ready(function() {
			$("input[name$='sponsorship']").click(function() {
					var choice = $(this).val();
					if(choice == 1){
						$('#monetary').css('display','block');
					}
					else if(choice == 2){
						$('#monetary').css('display','none');
					}
				});
			});
</script>