<?php

if(!isset($_SESSION['userid']))
	echo '<script>window.location.href="login.html"</script>';

if (isset($_POST['userid'])){
$username   = mysql_real_escape_string($_POST['username']);
$email      = mysql_real_escape_string($_POST['email']);
$password   = $_POST['password'];
$password2  = $_POST['password2'];
$skype  = $_POST['skype'];
$country    = $_POST['country'];
$website    = $_POST['website'];
$userid = $_POST['userid'];
$minibio    = mysql_real_escape_string($_POST['minibio']);
$image=$_FILES['image']['name'];
if ($username==""){
  $msg = "Username should not be empty.";
}elseif ($password==""){
  $msg = "Please enter password.";
}elseif ($password!=$password2){
  $msg = "Please reconfirm password.";
}elseif ($email==""){
  $msg = "Please enter email.";
}else if(ValidateEmail($email) == FALSE){
	$msg = "Please enter a valid email.";
}else {
  if (IfExistsProfile('ChallengeMembers','Username',$username,'DomainId',$domainid,$_SESSION['userid'])){
    $msg = "Username already exists.";
  }//else if (IfExistsProfile('ChallengeMembers','Email',$email,'DomainId',$domainid,$_SESSION['userid'])){
    //$msg = "Email already exists.";
  //}
  else {
     if ($image){
     $filename = stripslashes($_FILES['image']['name']);
      preg_match('/([^\\/\:*\?"<>|]+)(?:\.([^\\/\:*\?"<>|\.]+))$/',$filename,$matches);
     $ext = strtolower($matches[2]);
      if (($ext != "jpg") && ($ext != "jpeg") && ($ext != "png") && ($ext != "gif")){
        echo "<p><b class=\"err\">Can't upload file because of unknown extension but details were saved!</b></p>";
        
   		}else {
        
         $start = time();
        $f = $matches[1]."_".$start.".".$ext;
        $newname = "uploads/profile/".$f;
        $copied = move_uploaded_file($_FILES["image"]["tmp_name"],$newname);
        $fileName = $domainUrl.$newname;  
        if (!$copied){
         echo "<p><b class=\"err\">A problem occured file uploading logo but details were saved!</b></p>";
        }
               
        }
      }else {
         $fileName = $dir->GetTableInfo('ChallengeMembers','Photo','ChallengeMemberId',$_SESSION['userid']);
      }
   } 
     
     if (UpdateProfile($username,$password,$email,$skype,$country,$website,$minibio,$fileName,$_SESSION['userid'])=="1"){
			$usertype = $dir->GetTableInfo('ChallengeMembers','UserType','ChallengeMemberId',$_SESSION['userid']);
			$msg = "Update Successful.";
     }else {
			$msg = "Something went wrong in DB query";
     } 
  
  }
}


function ValidateEmail($email){return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email);}

$profile = GetUserProfile($_SESSION['userid']);
?>

<form method="POST" enctype="multipart/form-data" action="">
               <table>
                  <tbody>
                  <tr>
                     <td colspan="2" align="center"><img src="<?=StripProfilePhoto($profile[0]['photo'])?>" height="120px" style="background: url(images/stripey.png);margin-bottom:20px"></td>
                  </tr>
				  <tr valign="top">
                     <td>&nbsp;</td>
                     <td>&nbsp;<div id="form-success"><?=$msg?></div></td>
                  </tr>
                  <tr valign="top">
                     <td>Username:</td>
                     <td><input name="username" size="40" value="<?=$profile[0]['username']?>" type="text" disabled /></td>
                  </tr>
                  <tr valign="top">
                     <td>Password:</td>
                     <td><input name="password" size="40" value="<?=$profile[0]['password']?>" type="password"></td>
                  </tr>
                  <tr valign="top">
                     <td>Confirm Password:</td>
                     <td><input name="password2" size="40" value="<?=$profile[0]['password']?>" type="password"></td>
                  </tr>
                  <tr valign="top">
                    <td>Email:</td>
                    <td><input name="email" size="40" value="<?=$profile[0]['email']?>" type="text" disabled></td>
                  </tr>
				  <tr valign="top">
                    <td>Skype Id:</td>
                    <td><input name="skype" size="40" value="<?=$profile[0]['skype']!=''?$profile[0]['skype']:' '?>" type="text" ></td>
                  </tr>
                  <tr valign="top">
                    <td>Choose Country:</td>
                    <td>
                       <select name="country" style="background-color: white !important;">
                       <?$c = GetCountries();
                         for ($i=0;$i<count($c);$i++){
                              if ($c[$i]==$profile[0]['country']){
                                $sel = "selected='selected'";
                              }else {
                                $sel = "";
                              }
                           echo "<option value=\"".$c[$i]."\" $sel>".$c[$i]."</option>";
                         }
                       ?>
                       </select>
                    </td>
                  </tr>
				  <tr valign="top">
                    <td>Website:</td>
                    <td><input name="website" size="40" value="<?=$profile[0]['website']?>" type="text"></td>
                  </tr>
					
                  <tr valign="top">
                     <td>Minibio:</td>
                     <td><textarea name="minibio" rows="5" cols="50" style="background-color: white !important"><?=$profile[0]['minibio']?></textarea></td>
                  </tr>
                  <tr>
                     <td>Upload/Change profile photo</td>
                     <td><input type="file" name="image" size="45" /></td>
                  </tr>
                  <tr>
							<td colspan="2" align="right">
								<br>
								<input type="hidden" name="userid" value="<?=$_SESSION['userid']?>">
								<button type="submit"><h2>Update Settings</h2></button>
								<input name="username" value="<?=$profile[0]['username']?>" type="hidden"  />
								<input name="email" value="<?=$profile[0]['email']?>" type="hidden"  />
							</td>
                  </tr>
               </tbody></table>
			   </form>


<?
	
	/*functions*/
	
function StripProfilePhoto($photo){
    if  (substr($photo, 0, 7)!="http://"){
    $imgurl = "http://earthchallenge/images/default_challenge_icon.png";
    }else {
      $imgurl = $photo;
    }
                           
return $imgurl;
}


function GetUserProfile($userid){
$prof = array();
$query = "Select * from ChallengeMembers where ChallengeMemberId='$userid' ";
$result = mysql_query($query);
if (!$result) {
               die('GetUserProfile:: Invalid query: ' . mysql_error());
             }
$num_rows = mysql_num_rows($result);
$i = 0;
    if ($num_rows > 0){
              while($res = mysql_fetch_array($result))
            	{
            	  $prof[$i]['ChallengeMemberId'] = $res['ChallengeMemberId'];
                $prof[$i]['username'] = $res['Username'];
            	  $prof[$i]['password'] = $res['Password'];
            	  $prof[$i]['email'] = $res['Email'];
            	  $prof[$i]['skype'] = $res['SkypeID'];
            	  $prof[$i]['country'] = $res['Country'];
            	  $prof[$i]['usertype'] = $res['UserType'];
            	  $prof[$i]['minibio'] = $res['Minibio'];
            	  $prof[$i]['photo'] = $res['Photo'];
            	  $prof[$i]['website'] = $res['Website'];
            	  $i++;
            	}
  	} 
return $prof;
}

function GetCountries(){
$arr = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia Herzegovina", "Botswana", "Bouvet Island", "Brazil", "British Indian", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Rep", "Chad", "Chile", "China", "Christmas Island", "Cocos Islands", "Colombia", "Comoros", "Congo", "Cook Islands", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard/McDonald Islands", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Ivory Coast", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "North Korea", "Northern Mariana", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn Island", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "S. Georgia/S. Sandwich", "Saint Kitts & Nevis", "Saint Lucia", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "St. Vincent Grenadines", "Sudan", "Suriname", "Svalbard Jan May. Islnd", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks/Caicos Islands", "Tuvalu", "U.S. Min.Outlying Islands", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Virgin Islands", "Wallis/Futuna Islands", "Western Sahara", "Yemen", "Zaire", "Zambia", "Zimbabwe");
return $arr;
}

function UpdateProfile($username,$password,$email,$skype,$country,$website,$minibio,$photo,$userid){
$message="";
$query = "Update ChallengeMembers set Username='$username',Password='$password',Email='$email',
Country='$country',Website='$website',Minibio='$minibio', Photo='$photo', SkypeID='$skype' where ChallengeMemberId=$userid";
$result = mysql_query($query);
 if (!$result) {
               die('UpdateProfile:: Invalid query: ' . mysql_error());
             }else {
              $message = "1";     
             }
 return $message;
}

function IfExistsProfile($table,$field1,$value1,$field2,$value2,$userid){
$exists = FALSE;
$query = "SELECT * FROM `$table` where $field1='$value1' AND $field2='$value2' AND ChallengeMemberId !=".$userid;
$result = mysql_query($query);
if (!$result) {
               die('IfExistsProfile:: Invalid query: ' . mysql_error());
             }
$num_rows = mysql_num_rows($result);
    if ($num_rows > 0){
            $exists = TRUE; 
  	} 
   return $exists;  
}


?>