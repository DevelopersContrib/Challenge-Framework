<?php
include "includes/main_functions_test.php";
//include 'http://www.domaindirectory.com/includes/main_functions_test.php';
$dir = new DIR_LIB();
if(isset ($_REQUEST['count'])){
    die($dir->CountLeads($_REQUEST['domain']));
}
$email = $_REQUEST['email'];
$domain = $_REQUEST['domain'];
//add codes to check if the email is already saved in database..
// if already in database, skipp save line
  $save = "success";
  
//else if new email

$save = $dir->SaveLeads($email,$domain);
if($save=="success"){
	$admin_emails = '';
	$admin = $dir->GetAdminData();
	for($x =0;$x<count($admin);$x++){
            if($admin_emails!='') $admin_emails .= ',';
            $admin_emails .= $admin[$x]['admin_email'];
	}
/*	$contactname = $name;
	$contactmsg = $msg;
	$to=$email;
	$subject = "Domain Directory Service Inquiry Form Submission";
	$headers = "From: DomainDirectory.com <$admin_emails>\r\n".'X-Mailer: PHP/' . phpversion();
	$messages= "Hello ".$contactname.",\n\n ";
	$messages.="Thank you for contacting us.  \n\n";
	$messages.="Your message has already been received by our team. One of our colleagues will contact you shortly. \r\n";
	$messages.="\n\n DomainDirectory.com Team";    
	$emailmessage = wordwrap($messages);
	$sentmail = mail($to,$subject,$emailmessage,$headers);
	$contactemail = "$admin_emails";
	$headers2 = "From: ".$contactname."<".$email.">\r\n".'X-Mailer: PHP/' . phpversion();
	$contactmessage = wordwrap($contactmsg);
	$sentmail2 = mail($contactemail,$subject,$contactmessage,$headers2);
	echo "Thank you.  <br><br>";
        //echo "Service inquiry successfully submitted!  <br><br>";
	echo "Your message has already been received by our team. One of our colleagues will contact you shortly. ";  */
	#
    $to = $email; 
    $from = $domain; 
    $subject = "          $domain Private Beta Invite"; 
    $contactname = $name;
    //begin of HTML message 
    $message = '
<html> 
  <body>
  <br><br>
  <div style="border:1px gray;width:640px;margin-left:auto;margin-right:auto;">
    <div style="background:#6699FF;padding:5px;">
            <h1><p><font size="5" color = "white">
              '.$domain.' Private Beta Invite
            </font></p></h1>
    </div>
    <div><p> <font color = "gray" size = "3">
    <br>
    Hi,
    <br><br>
    You are now in our private and exclusive beta list! <br />
    Thanks for your interest in '.$domain.'! You&#39;ve been added to our queue for         Beta access to the '.$domain.' platform. We&#39;ll be in touch soon! </b> <br><br><br>
     </p></div>
     <div style = "background: #E0E0E0">
      <p><font size="2" color = "#696565">
              '.$domain.' <br />
              <br />
              You are receiving this email because you created an account at '.$domain.'.
        </font>
      </p>
     </div>
     </div>
  </body> 
</html>'; 
   //end of message 
    $headers  = "From: $from\r\n"; 
    $headers .= "Content-type: text/html\r\n"; 
    //options to send to cc+bcc 
    //$headers .= "Cc: [email]maa@p-i-s.cXom[/email]"; 
    //$headers .= "Bcc: [email]email@maaking.cXom[/email]"; 
    // now lets send the email. 
    mail($to, $subject, $message, $headers); 
    echo "Your email will never be sold and kept strictly for notification when we launch!";
}else{
	echo $save;
}
?>