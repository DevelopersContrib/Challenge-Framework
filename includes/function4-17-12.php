<?
require_once(dirname(__FILE__) . '/config2.php');
class DIR_LIB_2 {
	function GetRSS($id){
		Global $domainUrl;
		$query = "Select * from `Challenges` order by ChallengeId desc ";
		$result = mysql_query($query);
		if (!$result) {
			 die('GetRSS:: Invalid query: ' . mysql_error());
		}else{
			$i=0;
			while($row = mysql_fetch_array($result)){
				//$site = $this->GetTableInfo('Domains','DomainName','DomainId',$id);
				$output .= '<item>';
					$output .= '<title>'.$row['ChallengeTitle'].'</title>';
					$output .= '<description>'.stripslashes($row['ChallengeDesc']).'</description>';
					$output .= '<link>'.$domainUrl.'challenge-'.$row['ChallengeId'].'.html</link>';
					$output .= '<pubDate>'.date("D, d M Y H:i:s O", strtotime($row['DatePosted'])).'</pubDate>';
				$output .= '</item> ';
				$i++;
			}
			
		}
		return $output;
	}
	
	function GetRSSchallenge($id,$limit=NULL){
		Global $domainUrl;
		$query = "Select * from `Challenges` order by ChallengeId desc $limit";
		$result = mysql_query($query);
		if (!$result) {
			 die('GetRSS:: Invalid query: ' . mysql_error());
		}else{
			$i=0;
			while($row = mysql_fetch_array($result)){
				//$site = $this->GetTableInfo('Domains','DomainName','DomainId',$id);
				$url = $domainUrl.'challenge-'.$row['ChallengeId'].'.html';
				$output .= '<item>';
					$output .= '<title>'.$row['ChallengeTitle'].'</title>';
					$output .= '<description>'.stripslashes($row['ChallengeDesc']).'  <a href="'.$url.'">Accept the challenge!</a></description>';
					$output .= '<link>'.$url.'</link>';
					$output .= '<pubDate>'.date("D, d M Y H:i:s O", strtotime($row['DatePosted'])).'</pubDate>';
				$output .= '</item> ';
				$i++;
			}
			
		}
		return $output;
	}
		
	function GetRSSuser($id,$limit=NULL){
		Global $domainUrl;
		$query = "Select * from `ChallengeMembers` where DomainId='$id' order by ChallengeMemberId desc $limit";
		$result = mysql_query($query);
		if (!$result) {
			 die('GetRSS:: Invalid query: ' . mysql_error());
		}else{
			$i=0;
			while($row = mysql_fetch_array($result)){
				$site = $this->GetTableInfo('Domains','DomainName','DomainId',$id);
				$url = $domainUrl.'challenger-'.$row['Username'].'.html';
				$output .= '<item>';
					$output .= '<title>We have a new Challenger!</title>';
					$output .= '<description>Welcome '.strtoupper($row['Username']).'! <a href="'.$url.'">View his/her profile!</a></description>';
					$output .= '<link>'.$url.'</link>';
					$output .= '<pubDate>'.date("D, d M Y H:i:s O", strtotime($row['DateSigned'])).'</pubDate>';
				$output .= '</item> ';
				$i++;
			}
			
		}
		return $output;
	}
	
	function GetRSSApp($id,$limit=NULL){
		Global $domainUrl;
		$query = "Select * from `Applications` where ChallengeId='$id' order by AppId desc $limit";
		$result = mysql_query($query);
		if (!$result) {
			 die('GetRSS:: Invalid query: ' . mysql_error());
		}else{
			$i=0;
			while($row = mysql_fetch_array($result)){
				//$site = $this->GetTableInfo('Domains','DomainName','DomainId',$id);
				$output .= '<item>';
					$output .= '<title>'.$row['AppName'].'</title>';
					$output .= '<description>'.stripslashes($row['AppDesc']).'</description>';
					$output .= '<link>'.$domainUrl.'application-'.$row['AppId'].'.html</link>';
					$output .= '<pubDate>'.date("D, d M Y H:i:s O", strtotime($row['AppDatePosted'])).'</pubDate>';
				$output .= '</item> ';
				$i++;
			}
			
		}
		return $output;
	}

	function GetChallengesByStr($str='',$limit=NULL){
		$arr = array();
		$limit = !empty($limit)?" limit $limit":'';
		$query = "Select * from `Challenges` where ChallengeTitle like '%$str%' or ChallengeDesc like '%$str%' order by ChallengeId $limit ";
		$result = mysql_query($query);
		if (!$result) {
			 die('GetLatestApplications:: Invalid query: ' . mysql_error());
		}
		$num_rows = mysql_num_rows($result);
		if ($num_rows > 0){
			while($row = mysql_fetch_array($result)){
				$descLimit = 100;
				$Desc = $row['ChallengeDesc'];
				if (preg_match('/^.{1,'.$descLimit.'}\b/s', strip_tags( $Desc ), $match)){
					$Desc= $match[0];
				}else{
					$Desc= substr( strip_tags( $Desc ), 0, $descLimit );
				}
				$arr[] = array(
					"ChallengeId" => $row['ChallengeId'],
					"CompanyId" => $row['CompanyId'],
					"ChallengeTitle" => $row['ChallengeTitle'],
					"ChallengeDesc" => $row['ChallengeDesc'],
					"ShortDesc" => $Desc,
					"MoreDetails" => $row['MoreDetails'],
					"Photo" => $row['Photo'],
					"DatePosted" => $row['DatePosted']
				);
			}
		} 
		return $arr;
	}
	function GetTableInfo($table,$field,$wherefield,$val){
		$query = "SELECT `$field` as val FROM `$table` where `$wherefield` = '$val'";
		$result = mysql_query($query);
		if (!$result) {
      	$return = 'GetTableInfo:: Invalid query: ' . mysql_error();
		}else{
			$row = mysql_fetch_array($result);
			$return = $row['val'];
		}
		return $return;
	}
	function GetUserInfo($userid,$selectfield){
		$sql = mysql_query("SELECT `$selectfield` as result FROM `ChallengeMembers` WHERE `ChallengeMemberId` = '".$userid."' ") or die();
		while($row = mysql_fetch_array($sql)){
			$returnfield = $row['result'];
		}
		return $returnfield;
	}
	function CheckIfExist($sql){
		$result = mysql_query($sql);
		if(mysql_num_rows($result) == 0){
			return false;
		}else{
			return true;
		}
	}
	function GetUserIdFromLogin($username,$pass){
		$query = "SELECT `ChallengeMemberId` as val FROM `ChallengeMembers` where `Username` = '$username' and `Password` = '$pass'";
		$result = mysql_query($query);
		if (!$result) {
			$return = '';
		}else{
			$row = mysql_fetch_array($result);
			$return = $row['val'];
		}
		return $return;
	}
	function ShowEarthBrowse($sql){
		$result = mysql_query($sql) or die(mysql_error());
		if (!$result){
			$returnValue = mysql_error();
		}else {
			$i=0;
			while($row = mysql_fetch_array($result)){
				$postedby = $this->GetTableInfo('ChallengeMembers','Username','ChallengeMemberId',$row['CompanyId']);
				$i++;				
				$html .= '
					<div class="slide-box ic_container" id="capslide'.$i.'">	
						<a href="challenge-'.$row['ChallengeId'].'.html" target="_blank">
							<div class="thumb"><img src="'.$row['Photo'].'" /></div>
							<div class="text-bot">
								<div class="text-bot-left">
									<div class="text-bot-info-name">
										'.mysql_real_escape_string(substr($row['ChallengeTitle'],0,25)).'
									</div>
									<div class="text-bot-info">
										'.$this->GetTableInfo("ChallengeCategory","CategoryName","ChallengeCategoryId",$row['CategoryId']).'
										<div class="points"> '.$row['Points'].' <span class="ico"></span></div>
									</div>
								</div>	
							</div>
							<div class="overlay" style="display:none;"></div>
							<div class="ic_caption">
								<p class="ic_category">Posted by '.$this->GetTableInfo("ChallengeMembers","Username","ChallengeMemberId",$row['CompanyId']).'</p>
								<p class="ic_text">'.substr($row['ChallengeDesc'],0,375).'</p>
							</div>
						</a>
					</div><!--slide-box -->
			  '; 
			}  
		}
		return $html;
	}
	function ShowChallenge($challengeid){
			$html = '';
			$sql = mysql_query("SELECT * from Challenges WHERE ChallengeId = '".$challengeid."' ");
			if($sql){
				$row = mysql_fetch_array($sql);
				$companyname = $this->GetTableInfo('ChallengeMembers','Username','ChallengeMemberId',$row['CompanyId']);
				$photo = $this->GetTableInfo('ChallengeMembers','Photo','ChallengeMemberId',$row['CompanyId']);
				if($photo=="") $photo = "../images/profile-pic2.jpg";
				$html .= '
						<div class="company-profile-up" style="color:gray">
							<div class="company-box">
								<p>'.$row['ChallengeDesc'].'</p>
							</div>
						</div>
				';	
				return $html;
			}else{
				return mysql_error();
			}
	}
	function CheckApplication($challengeId,$memberId){
			$sql = mysql_query("SELECT * from `Applications` WHERE `ChallengeId` = '$challengeId' and `ChallengeMemberId` = '$memberId'");
			if($sql){
				$cnt = mysql_num_rows($sql);
				if($cnt>0)
					return TRUE;
				else
					return FALSE;
			}else 
				return FALSE;
	}
	function CheckIfGallery($challengeid){
		$sql = mysql_query("SELECT `ChallengeId` FROM `Applications` WHERE ChallengeId = '".$challengeid."' ") or die(mysql_error());
		if(mysql_num_rows($sql) > 0){
			return true;
		}else{
			return false;
		}
	}
	
	function ShowChallengeProfileForSubmission($challengeid){
		$html = '';
			$sql = mysql_query("SELECT * from Challenges WHERE ChallengeId = '".$challengeid."' ");
			if($sql){
			$row = mysql_fetch_array($sql);
			
			$companyname = $this->GetTableInfo('ChallengeMembers','Username','ChallengeMemberId',$row['CompanyId']);
			$photo = $this->GetTableInfo('ChallengeMembers','Photo','ChallengeMemberId',$row['CompanyId']);
			if($photo=="") $photo = "../images/profile-pic2.jpg";
			if($this->CheckIfGallery($challengeid) == true){
				$gallery = '<div class="jtab"><a href="application-gallery-'.$challengeid.'.html">View Application Gallery</a></div>';
			}
			if($this->CheckIfExist("SELECT * FROM `Challenges` WHERE `ChallengeId` = '".$challengeid."' and `Solved` = '1' ") === true){
				$winnerapp = '<div class="jtab"><a href="submission_page.php?appid=20">View Winner</a></div>';
			}
				$html .= '
					<div class="jbox_container">
                            	<div class="jtab_mnu_cont">
                                     <div class="jtab"><a href="challenge-'.$challengeid.'.html"><img src="http://mychallenge.com/images/home_ico.png" height="13" width="15"></a></div>  
                                     <div class="jtab">'.$this->GetTableInfo('ChallengeCategory','CategoryName','ChallengeCategoryId',$row['CategoryId']).'</div>  
                                     '.$gallery.$winnerapp.'<div class="jtab">'.$this->CountSubmissions($challengeid).' Followers</div>
								</div>
                            	<div class="jbox">
                                	<div class="jbox_cont">
										<div class="jbox_img"><img src="'.$row['Photo'].'" height="235" width="284"></div>
										<div class="jbox_title_cont"><p class="jbox_h2">'.$row['ChallengeTitle'].'</p></div>
										<p class="jbox_title_desc">'.stripslashes(substr($row["ChallengeDesc"],0,110)).'</p>
									</div>
                                    <div class="jbox_usr_info">
										<div style="margin-top:15px;">
										</div>
                                    </div>
                                </div>
                            </div><!--jbox_container-->
				';
			}
			return $html;
	}
	
	function ShowChallengeProfileTop($challengeid){
			$html = '';
			$sql = mysql_query("SELECT * from Challenges WHERE ChallengeId = '".$challengeid."' ");
			if($sql){
			$row = mysql_fetch_array($sql);
			if($this->CheckApplication($challengeid,$_SESSION['userid'])===FALSE && $_SESSION['usertype'] == '1' && $row['Solved'] == '0' ){
						$application_link = '<a class="button-href orange"  href="applychallenge-'.$row['ChallengeId'].'.html" target="_blank">Submit Application</a>';
			}else if($this->CheckApplication($challengeid,$_SESSION['userid'])===TRUE && $_SESSION['usertype'] == '1' && $row['Solved'] == '0'){
						$application_link = '<p class="error">You have already submitted an application to this challenge.</p>';
			}else if($_SESSION['usertype'] == '2' && $this->CheckIfExist("SELECT * FROM `Challenges` WHERE `ChallengeId` = '".$challengeid."' and `CompanyId`='".$_SESSION['userid']."' ") == true){ 
						$application_link = '<a class="button-href orange" href="editchallenge-'.$challengeid.'.html">Edit Challenge</a>';
			}else $application_link = '';	
			$companyname = $this->GetTableInfo('ChallengeMembers','Username','ChallengeMemberId',$row['CompanyId']);
			$photo = $this->GetTableInfo('ChallengeMembers','Photo','ChallengeMemberId',$row['CompanyId']);
			if($photo=="") $photo = "../images/profile-pic2.jpg";
			if($this->CheckIfGallery($challengeid) == true){
				$gallery = '<div class="jtab"><a href="application-gallery-'.$challengeid.'.html">View Application Gallery</a></div>';
			}
			if($this->CheckIfExist("SELECT * FROM `Challenges` WHERE `ChallengeId` = '".$challengeid."' and `Solved` = '1' ") === true){
				$winnerapp = '<div class="jtab"><a href="submission_page.php?appid=20">View Winner</a></div>';
			}
				$html .= '
					<div class="jbox_container">
                            	<div class="jtab_mnu_cont">
                                     <div class="jtab"><a href="challenge-'.$challengeid.'.html"><img src="http://mychallenge.com/images/home_ico.png" height="13" width="15"></a></div>  
                                     <div class="jtab">'.$this->GetTableInfo('ChallengeCategory','CategoryName','ChallengeCategoryId',$row['CategoryId']).'</div>  
                                     '.$gallery.$winnerapp.'<div class="jtab">'.$this->CountSubmissions($challengeid).' Followers</div>
								</div>
                            	<div class="jbox">
                                	<div class="jbox_cont">
										<div class="jbox_img"><img src="'.$row['Photo'].'" height="235" width="284"></div>
										<div class="jbox_title_cont"><p class="jbox_h2">'.$row['ChallengeTitle'].'</p></div>
										<p class="jbox_title_desc">'.stripslashes(substr($row["ChallengeDesc"],0,110)).'</p>
									</div>
                                    <div class="jbox_usr_info">
										<div style="margin-top:15px;">
											'.$application_link.'
											<!--<button class="jbox_btn">clear</button>-->
										</div>
                                    </div>
                                </div>
                            </div><!--jbox_container-->
				';
			}
			return $html;
	}
	function ShowChallenge2($challengeid){
			$html = '';
			$sql = mysql_query("SELECT * from Challenges WHERE ChallengeId = '".$challengeid."' ");
			if($sql){
				$row = mysql_fetch_array($sql);	
				$html .= '
						<div class="company-profile-up">
							<div class="jbox_c1">
								<div class="jbox_grad">
									<h3><span></span>More Details</h3>
									<div class="jbox_info">'.$row['MoreDetails'].'</div>
								</div> 
								<div class="jbox_grad">
									<h3><span></span>Timeline</h3>
									'.$this->ShowTimeline($challengeid).'
								</div> 
								<div class="jbox_grad">
									<h3><span></span>Prizes</h3>
									'.$this->ShowPrizes($challengeid).'
								</div> 
								<div class="jbox_grad"><h3><span></span>Judging Criteria</h3>
									'.$this->ShowCriteria($challengeid).'
								</div> 
								<div class="jbox_grad"><h3><span></span>How to Enter</h3>
									'.$this->ShowHowToEnter($challengeid).'
								</div>  
							</div><!--jbox_cl-->
						</div><!--company-profile-up-->
					';	
				return $html;
			}else{
				return mysql_error();
			}
	}
	function ShowPrizes($challengeid){
			$query = mysql_query("SELECT * FROM ChallengePrizes WHERE ChallengeId='".$challengeid."' ") or die(mysql_error());
				while($temp = mysql_fetch_array($query)){
					$html .= '<div class="jbox_price">'.$temp['PrizeDescription'].'</div>';	
				}
				return $html;
	}
	function ShowTimeline($challengeid){
			$query = mysql_query("SELECT * FROM ChallengeTimeline WHERE ChallengeId='".$challengeid."' ") or die(mysql_error());
				$temp = mysql_fetch_array($query);
								$html .='
									<div class="jbox_timeline">
										<div class="tab_01">
											<div>Submission in Schedule</div>
											<div>From: '.$this->reformatdate($temp['Submission_From']).'</div>
											<div>To: '.$this->reformatdate($temp['Submission_To']).'</div>
										</div>
										<div class="tab_02">
											<div>Judging</div>
											<div>Start: '.$this->reformatdate($temp['Judging_From']).'</div>
											<div>End: '.$this->reformatdate($temp['Judging_To']).'</div>
										</div>
										<div class="tab_03">
											<div>Announcement of Winners</div>
											<div>Start: '.$this->reformatdate($temp['Winners_Announced']).'</div>
										</div>
									</div>
								';
				return $html;
	}
	function ShowCriteria($challengeid){
			$query = mysql_query("SELECT * FROM ChallengeCriteria WHERE ChallengeId='".$challengeid."' ") or die(mysql_error());
				$i = 1;
				while($temp = mysql_fetch_array($query)){
					$html .= '<div class="jbox_info"><span class="rank">'.$i.'</span>'.$temp['CriteriaDescription'].'</div>';	
					$i++;
				}
				return $html;
	}
	function ShowHowToEnter($challengeid){
			$query = mysql_query("SELECT * FROM ChallengeHowToEnter WHERE ChallengeId='".$challengeid."' ") or die(mysql_error());
				$i = 1;
				while($temp = mysql_fetch_array($query)){
					$html .= '<div class="jbox_info"><span class="rank">'.$i.'</span>&nbsp;&nbsp;'.$temp['HowToDesc'].'</div>';	
					$i++;
				}
				return $html;
	}
	function CountAttempts($id){
			$result = mysql_query("SELECT *	FROM ChallengeSolution where ChallengeId = '$id'");
			if(!$result){
				$returnValue = mysql_error();
			}
			else{
				$count = mysql_num_rows($result);
			}
			return $count;
	}
	
	function CountRows($table,$condition){
			$result = mysql_query("SELECT COUNT(*) AS TOTAL FROM $table WHERE $condition ");
			if(!$result){
				$returnValue = mysql_error();
			}
			else{
				$row = mysql_fetch_array($result);
				$returnvalue = $row['TOTAL'];
			}	
			return $returnvalue;
	}
	
	function CountSubmissions($challengeid){
			$result = mysql_query("SELECT *	FROM Applications where ChallengeId = '$challengeid'");
			if(!$result){
				$returnValue = mysql_error();
			}
			else{
				$count = mysql_num_rows($result);
			}
			return $count;
	}
	function ShowCategories(){
		$result = mysql_query("SELECT * FROM `ChallengeCategory` order by CategoryName");
		if (!$result){
			$html = mysql_error();
		}else {
			while($row = mysql_fetch_array($result)){
				$html .='
					<li><a href="http://mychallenge.com/browse.php?id='.$row['ChallengeCategoryId'].'">'.$row['CategoryName'].'</a></li>
				';
			}
		}
		return $html;
	}
	function CheckLogin($u,$p){
		$query = "SELECT ChallengeMemberId from `ChallengeMembers` where `Username` = '$u' and `Password` = '$p'";
		$result = mysql_query($query);
		if (!$result) {
      	$return = 'CheckLogin:: Invalid query: ' . mysql_error();
		}else{
			$row = mysql_num_rows($result);
			if($row>0)
				$return = TRUE;
			else
				$return = FALSE;
		}
		return $return;
	}
	function CheckUsernameIfExist($username){
		$query = "SELECT * FROM `ChallengeMembers` where `Username` = '$username'";
		$result = mysql_query($query);
		if (!$result) {
			 die('CheckEmail:: Invalid query: ' . mysql_error());
		}else{
			$row = mysql_num_rows($result);
			if($row>0)
				$return = TRUE;
			else
				$return = FALSE;
		}
		return $return;
	}
	function CheckEmailIfExist($email){
		$query = "SELECT * FROM `ChallengeMembers` where `Email` = '$email'";
		$result = mysql_query($query);
		if (!$result) {
			 die('CheckEmail:: Invalid query: ' . mysql_error());
		}else{
			$row = mysql_num_rows($result);
			if($row>0)
				$return = TRUE;
			else
				$return = FALSE;
		}
		return $return;
	}	
	function RegisterMember($username,$password,$email,$country,$domainid,$usertype){
		$query = "Insert into ChallengeMembers (Username,Password,Email,Country,DomainId,UserType,DateSigned) values ('$username','$password','$email','$country','$domainid','$usertype',NOW())";
		$result = mysql_query($query);
		if (!$result) {
            die('RegisterMember:: Invalid query: ' . mysql_error());
        }else {
			$message = "1";     
        }
		return $message;
	}
	function ApplicationSave($name,$desc,$challengeid,$userid){
			$query = "Insert into Applications (AppName,AppDesc,AppDatePosted,ChallengeId,ChallengeMemberId) values ('$name','$desc',NOW(),'$challengeid','$userid')";
			$result = mysql_query($query);
			if (!$result) {
				return 0;
			}else {
				//$sql = mysql_query("SELECT * from `Applications` WHERE `AppName` = '$name' and `AppDesc` = '$desc' and `ChallengeId`");
				$message = mysql_insert_id();     
				return $message;
            }
	}
	function AppImageSave($appid,$path){
			$query = "Insert into AppImages (AppId,ImagePath) values ('$appid','$path')";
			$result = mysql_query($query);
			if (!$result) {
				return mysql_error();
			}
	}
	function AppVideoSave($appid,$url){
			$query = "Insert into AppVideo (AppId,Url) values ('$appid','$url')";
			$result = mysql_query($query);
			if (!$result) {
				return mysql_error();
			}
	}
	function AppFileSave($appid,$path){
			$query = "Insert into AppFiles (AppId,FilePath) values ('$appid','$path')";
			$result = mysql_query($query);
			if (!$result) {
				return mysql_error();
			}
	}
	function ShowSubmissions($challengeid){
		$result = mysql_query("SELECT * FROM `Applications` WHERE ChallengeId='".$challengeid."' ");
		if(!$result){
			$html = mysql_error();
		}else{
			$html = '';
			for($i = 1 ; $row = mysql_fetch_array($result); $i++ ){
				$html .= '<div class="submission-gallery">
						<a href="application-'.$row['AppId'].'.html"><img width="150" height="150"  style="padding:10px;border:1px solid #CCC" src="'.$this->GetTableInfo('AppImages','ImagePath','AppId',$row['AppId']).'">
							<p>
								<span style="color:gray;font-size:13px;font-weight:bold">'.$row['AppName'].'</span>
								<br>
								<span style="font-size:10px;">Submitted by :</span>
								<span style="font-size:10px;">'.$this->GetTableInfo('ChallengeMembers','UserName','ChallengeMemberId',$row['ChallengeMemberId']).'</span>
							</p>
						</a>
						</div>';
			}
		}
		return $html;
	}
	function ShowMySubmissions($userid){
		$result = mysql_query("SELECT * FROM `Applications` WHERE ChallengeMemberId='".$userid."' ");
		if(!$result){
			$html = mysql_error();
		}else{
			$html = '';
			for($i = 1 ; $row = mysql_fetch_array($result); $i++ ){
				$html .= '
        <div class="jgal-thumb">
    	<div class="jgal-img">
        	<div class="jgal-img-hover" style="display:table-cell; vertical-align:bottom;  background-image:url('.$this->GetTableInfo('AppImages','ImagePath','AppId',$row['AppId']).');">
				<div class="jgal-info">
                	<div><a href="application-'.$row['AppId'].'.html">'.$row['AppName'].'</a></div>
                	<div>Challenge : '.$this->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$row['ChallengeId']).'</span></div>
                </div>            
                
            </div>
        </div>
    </div>
				';
			}
		}
		return $html;
	}
	function ShowLatestApplications($limit=NULL){
		$result = mysql_query("SELECT * FROM `Applications` order by AppId desc limit $limit");
		if(!$result){
			$html = mysql_error();
		}else{
			$html = '';
			$cnt=0;
			for($i = 1 ; $row = mysql_fetch_array($result); $i++ ){
				$username = $this->GetUserInfo($row['ChallengeMemberId'],'Username');
				$html .= '
        <div class="jgal-thumb">
    	<div class="jgal-img">
        	<div class="jgal-img-hover" style="display:table-cell; vertical-align:bottom;  background-image:url('.$this->GetTableInfo('AppImages','ImagePath','AppId',$row['AppId']).');">
				<div class="jgal-info">
                	<div><a href="application-'.$row['AppId'].'.html">'.$row['AppName'].'</a></div>
                	<div><a href="challenger-'.$username.'.html">
						'.$this->GetTableInfo('ChallengeMembers','UserName','ChallengeMemberId',$row['ChallengeMemberId']).'</a></div>
                </div>            
                
            </div>
        </div>
    </div>
'; $cnt=$i;
			}
			if($cnt==0){ $html ='No Applications found.';}
		}
		return $html;
	}
	function GetAppSingle($appId){
			$i=0;
			$html1 .='<div class="app-gall-bigbox">';
			$html2 .='<div class="app-gall-thumbnail" >
						<!--<div class="thumb-left">
							<a href="#" class="aquo">&laquo;</a>
						</div>-->';
			$sql2 = mysql_query("SELECT * from `AppImages` WHERE `AppId` = '$appId'");
			if($sql2){
				while($row2 = mysql_fetch_array($sql2)){
					$i++;
					if($i==1){
						$class1 ='gall-big-box-active';
						$class2 ='gall-thumb-active';
					}else{
						$class1 ='gall-big-box';
						$class2 ='';
					}
					$html1 .='
						<div id="object'.$i.'" class="'.$class1.'" >
							<center><img src="'.$row2['ImagePath'].'" class="obj-img"></center>
						</div>
					';	
					$html2 .='
						<div id="thumb'.$i.'" class="gall-thumb  '.$class2.'">
							<img src="'.$row2['ImagePath'].'" style="border:1px solid #CCC;width:50px; height:50px; padding:5px; margin:5px; background:white">
						</div>
					';					
				}
			}
			unset($sql2);
			$sql = mysql_query("SELECT * from `AppVideo` WHERE `AppId` = '$appId'");
			if($sql){
				while($row = mysql_fetch_array($sql)){
					$i++;
					if($i==1){
						$class1 ='gall-big-box-active';
						$class2 ='gall-thumb-active';
					}else{
						$class1 ='gall-big-box';
						$class2 ='';
					}
					$html1 .='
						<div id="object'.$i.'" class="'.$class1.'">'.$row['Url'].'</div>
					';	
					$html2 .='
						<div id="thumb'.$i.'" class="gall-thumb  '.$class2.'">
							<img src="http://mychallenge.com/images/video.jpg" style="border:1px solid #CCC;width:50px; height:50px; padding:5px; margin:5px; background:white">
						</div>
					';					
				}
			}
			unset($sql);
			$html1 .='</div>';
			$html2 .='
				<!--<div class="thumb-right">
					<a href="#" class="aquo">&raquo;</a>
				</div>--></div>
			';
			$html = $html1.' '.$html2.'<input type="hidden" id="gall-cnt" value="'.$i.'">';
			return $html;
		}
		function GetChallengeCategories(){
				$cat = array();
				$query = "SELECT * from ChallengeCategory order by CategoryName";
				$result = mysql_query($query);
				if (!$result) {
							   die('GetChallengeCategories:: Invalid query: ' . mysql_error());
							 }
				$num_rows = mysql_num_rows($result);
				$i = 0;
					if ($num_rows > 0){
							  while($res = mysql_fetch_array($result))
								{
								  $cat[$i]['id'] = $res['ChallengeCategoryId'];
								  $cat[$i]['name'] = $res['CategoryName'];
								  $i++;
								}
					} 
				return $cat;
		}
		function ShowChallengeSponsorDetails($challengeid){
			$companyid = $this->GetTableInfo('Challenges','CompanyId','ChallengeId',$challengeid);
			$sql = mysql_query("SELECT * FROM `ChallengeMembers` WHERE `ChallengeMemberId`='".$companyid."' ");
			if(!sql){
				return mysql_error();
			}else{
				$row = mysql_fetch_array($sql);
				$html = '<div>
					<img src="'.$row['Photo'].'" width="100" height="100"><br>
					<p><a href="company-profile-'.$row['Username'].'.html">'.$row['Username'].'</a><br>
					<i><a href="'.$row['Website'].'">'.$row['Website'].'</i>
					</p>
					</div>';	
				return $html;
			}
		}
		function ShowSponsorLists(){
			$sql = mysql_query("SELECT * FROM `ChallengeMembers` WHERE `UserType` = '2' ");
			if($sql){
				$html = '';
					while($row = mysql_fetch_array($sql)){
						$html .='<li><a href="company-profile-'.$row['Username'].'.html">'.$row['Username'].'</a></li>';
					}
				return $html;
			}else{
				return mysql_error();
			}
		}
		function GetTableInfo2($field,$table,$condition){
			$query = "SELECT `$field` as val FROM `$table` where ".$condition;
			$result = mysql_query($query);
			if (!$result) {
			$return = 'GetTableInfo:: Invalid query: ' . mysql_error();
			}else{
				$row = mysql_fetch_array($result);
				$return = $row['val'];
			}
			return $return;
		}
		function reformatdate($date_to_reformat){
			$temp_date = date_create($date_to_reformat);
			$date_reformatted = date_format($temp_date, "F d, Y");
			return $date_reformatted;
		}
		function GetMySponsorship($companyid){
			$results = mysql_query("SELECT * FROM SponsorContact WHERE SponsorId = '".$companyid."'");
			if(!$results){
				return mysql_error();
			}else{
				if(mysql_num_rows($results) == 0){
					return 0;
				}else{
					$resultarray = array();
					for($i = 0; $row = mysql_fetch_array($results) ; $i++){
						$resultarray[$i]['SponsorshipType'] = $row['SponsorshipType'];
						$resultarray[$i]['Amount'] = $row['Amount'];
						$resultarray[$i]['ChallengeId'] = $row['ChallengeId'];
					}
					return $resultarray;
				}
			}
		}
		function GetLatestUsersArray($limit=NULL){
			$prof = array();
			$query = "Select * from `ChallengeMembers` order by ChallengeMemberId desc limit $limit";
			$result = mysql_query($query);
			if (!$result) {
				 die('GetLatestApplications:: Invalid query: ' . mysql_error());
			}
			$num_rows = mysql_num_rows($result);
			$i = 0;
			if ($num_rows > 0){
				while($res = mysql_fetch_array($result)){
					$prof[$i]['ChallengeMemberId'] = $res['ChallengeMemberId'];
					$prof[$i]['Username'] = $res['Username'];
					$prof[$i]['Password'] = $res['Password'];
					$prof[$i]['Email'] = $res['Email'];
					$prof[$i]['Country'] = $res['Country'];
					$prof[$i]['UserType'] = $res['UserType'];
					$prof[$i]['Minibio'] = $res['Minibio'];
					$prof[$i]['Photo'] = $res['Photo'];
					$prof[$i]['website'] = $res['Website'];
					$prof[$i]['domainId'] = $res['DomainId'];
					$prof[$i]['DateSigned'] = $res['DateSigned'];
					$i++;
				}
			} 
			return $prof;
		}
		function GetLatestAppArray($limit=NULL){
			$appDetails = array();
			$query = "Select * from `Applications` order by AppId desc limit $limit";
			$result = mysql_query($query);
			if (!$result) {
				 die('GetLatestApplications:: Invalid query: ' . mysql_error());
			}
			$num_rows = mysql_num_rows($result);
			$i = 0;
			if ($num_rows > 0){
				while($res = mysql_fetch_array($result)){
					$appDetails[$i]['AppId'] = $res['AppId'];
					$appDetails[$i]['AppName'] = $res['AppName'];
					$appDetails[$i]['AppDesc'] = $res['AppDesc'];
					$appDetails[$i]['AppImage'] = $this->GetTableInfo('AppImages','ImagePath','AppId',$res['AppId']);
					$appDetails[$i]['AppDatePosted'] = $res['AppDatePosted'];
					$appDetails[$i]['ChallengeId'] = $res['ChallengeId'];
					$appDetails[$i]['ChallengeMemberId'] = $res['ChallengeMemberId'];
					$appDetails[$i]['AppWinner'] = $res['AppWinner'];
					$i++;
				}
			} 
			return $appDetails;
		}
		function GetAppImagesArray($appid){
			$appImage = array();
			$query = "Select * from `AppImages` where AppId = '$appid'";
			$result = mysql_query($query);
			if (!$result) {
				 die('GetAppImagesArray:: Invalid query: ' . mysql_error());
			}
			$num_rows = mysql_num_rows($result);
			$i = 0;
			if ($num_rows > 0){
				while($res = mysql_fetch_array($result)){
					$appImage[$i]['ImageId'] = $res['ImageId'];
					$appImage[$i]['ImagePath'] = $res['ImagePath'];
					$i++;
				}
			} 
			return $appImage;
		}
		function GetAppVideoArray($appid){
			$appVideo = array();
			$query = "Select * from `AppVideo` where AppId = '$appid'";
			$result = mysql_query($query);
			if (!$result) {
				 die('GetAppVideoArray:: Invalid query: ' . mysql_error());
			}
			$num_rows = mysql_num_rows($result);
			$i = 0;
			if ($num_rows > 0){
				while($res = mysql_fetch_array($result)){
					$appVideo[$i]['VideoId'] = $res['VideoId'];
					$appVideo[$i]['Url'] = $res['Url'];
					$i++;
				}
			} 
			return $appVideo;
		}
		function GetAppFileArray($appid){
			$appFile = array();
			$query = "Select * from `AppFiles` where AppId = '$appid'";
			$result = mysql_query($query);
			if (!$result) {
				 die('GetAppFileArray:: Invalid query: ' . mysql_error());
			}
			$num_rows = mysql_num_rows($result);
			$i = 0;
			if ($num_rows > 0){
				while($res = mysql_fetch_array($result)){
					$appFile[$i]['FileId'] = $res['FileId'];
					$appFile[$i]['FilePath'] = $res['FilePath'];
					$i++;
				}
			} 
			return $appFile;
		}
		function GetLatestUsers(){
			$sql = mysql_query("SELECT * FROM ChallengeMembers WHERE UserType='1' and NOT Photo='' ORDER BY ChallengeMemberId DESC LIMIT 8");
			if($sql){
				$html = '<div class="latest-challengers">';
					while($row = mysql_fetch_array($sql)){
						$html .= '<a href="challenger-'.$row['Username'].'.html"><img src="'.$row['Photo'].'"></a>';
					}
				$html .= '</div><div style="clear:both;"></div>';
				return $html;
			}else{
				return 0;
			}
		}
		
		function GetChallengePosts($companyid){
			$query = mysql_query("SELECT * FROM `Challenges` WHERE CompanyId = '".$companyid."' and CategoryId = '5' ");
			if($query){
				$returnarray = array();
				
				for($i=0;$row = mysql_fetch_array($query);$i++){
					$returnarray[$i]['ChallengeId'] = $row['ChallengeId'];
					$returnarray[$i]['ChallengeTitle'] = $row['ChallengeTitle'];
					$returnarray[$i]['URLName'] = $row['URLName'];
				}
				
				return $returnarray;
				
			}else{
				return 0;
			}
		}
		
		
		function SendEmail($to,$subject,$message,$username){
			global $domain;
			global $logo;
			
			$mailbody="";
			$mailbody.="<table width='600' cellspacing='0' cellpadding='0' class='tableborder' align='center' style='border:1px solid #cccccc;font:11px Tahoma,Verdana,sans-serif;color:#000000'>";
			$mailbody.="<tr><td><img src='".$logo."' width='602' height='38' alt='&nbsp;&nbsp;".$domain."' style='background-color:#1784C9;color:#fff;font:bold 24px Tahoma,Verdana,sans-Serif;display:block'></td></tr>";
			$mailbody.="<tr><td>";
			$mailbody.="<table width='98%' border='0' align='center'>";
			$mailbody.="<tr class='mtext'><td>&nbsp;</td></tr>";
			$mailbody.="<tr class='mtext'><td>Hi <b>".$username.",</b></td></tr>";
			$mailbody.="<tr class='mtext'><td>&nbsp;</td></tr>";
		
			$mailbody.="<tr class='mtext'><td>".$message."</td></tr>";
			
		
			$mailbody.="<tr class='mtext'><td>&nbsp;</td></tr>";
			$mailbody.="<tr class='mtext'><td>&nbsp;</td></tr>";
			$mailbody.="<tr class='mtext'><td>All the best,</td></tr>";
			$mailbody.="<tr class='mtext'><td>".$domain." Team</td></tr>";
			$mailbody.="</table></td></tr>";
			$mailbody.="<tr><td>&nbsp;</td></tr>";
			$mailbody.="</table>";
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html\r\n";
			mail($to,$subject,$mailbody,$headers);
			return true;
		
		}
		
		
		function GetFeaturedChallenge(){
			global $domain_id;
			$domaincategory = $this->GetTableInfo('Challenges','CategoryId','ChallengeId',$domain_id);
			$query = mysql_query("SELECT * FROM Challenges WHERE CategoryId = '".$domaincategory."' and Solved = '0' ORDER BY RAND() ");
			if($query){
				$result_array = array();
					$row = mysql_fetch_array($query);
					$result_array['ChallengeId'] = $row['ChallengeId'];
					$result_array['ChallengeTitle'] = $row['ChallengeTitle'];
					$result_array['ChallengeDesc'] = $row['ChallengeDesc'];
					$result_array['Photo'] = $row['Photo'];
					$reult_array['ComapnyId'] = $row['CompanyId'];
				return $result_array;
				
			}else{
				return false;
			}
		}
		
		
}//END OF CLASS
?>