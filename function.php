<?

require_once(dirname(__FILE__) . '/config2.php');

class DIR_LIB_2 {
	
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
	
	function ShowEarthBrowse(){
		$result = mysql_query("SELECT * FROM `Challenges` where CategoryId='5' order by ChallengeTitle");
		if (!$result){
			$returnValue = mysql_error();
		}else {
			while($row = mysql_fetch_array($result)){
				$postedby = $this->GetTableInfo('ChallengeMembers','Username','ChallengeMemberId',$row['CompanyId']);
								
				$html .= '
					<div class="jsection-tab">
					<div class="slide-box" >
						<a href="browse-prof.php?challengeId='.$row['ChallengeId'].'" class="box">
						<!--<a href="#" class="close"></a>-->
						<div class="thumb"><img src="'.$row['Photo'].'" height="100%" width="100%"  alt=" " /></div>
						<div class="text-bot">
							<span>'.mysql_real_escape_string(substr($row['ChallengeTitle'],0,30)).'</span>	
						</div>
						</a>
					</div><!--slide-box -->
					</div><!--jsection-tab -->
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
	
	
	function ShowChallengeProfileTop($challengeid){
			$html = '';
			$sql = mysql_query("SELECT * from Challenges WHERE ChallengeId = '".$challengeid."' ");
			
			if($sql){
			$row = mysql_fetch_array($sql);
			
			if($this->CheckApplication($challengeid,$_SESSION['userid'])===FALSE && $_SESSION['usertype'] == '1' && $row['Solved'] == '0' ){
						$application_link = '<a class="button-href orange"  href="submission.php?challengeId='.$row['ChallengeId'].'" target="_blank">Submit Application</a>';
				}else if($_SESSION['usertype'] == '2' && $this->CheckIfExist("SELECT * FROM `Challenges` WHERE `ChallengeId` = '".$challengeid."' and `CompanyId`='".$_SESSION['userid']."' ") == true){ 
						$application_link = '<a class="button-href orange" href="editchallenge.php?challengeid='.$challengeid.'">Edit Challenge</a>';
				}else $application_link = '';				
				$companyname = $this->GetTableInfo('ChallengeMembers','Username','ChallengeMemberId',$row['CompanyId']);
				$photo = $this->GetTableInfo('ChallengeMembers','Photo','ChallengeMemberId',$row['CompanyId']);
				if($photo=="") $photo = "../images/profile-pic2.jpg";
			
			if($this->CheckIfGallery($challengeid) == true){
				$gallery = '<div class="jtab"><a href="submission_gallery.php?challengeid='.$challengeid.'">View Application Gallery</a></div>';
			}
			if($this->CheckIfExist("SELECT * FROM `Challenges` WHERE `ChallengeId` = '".$challengeid."' and `Solved` = '1' ") === true){
				$winnerapp = '<div class="jtab"><a href="submission_page.php?appid=20">View Winner</a></div>';
			}
			
				$html .= '
					<div class="jbox_container">
                            	<div class="jtab_mnu_cont">
                                     <div class="jtab"><img src="http://mychallenge.com/images/home_ico.png" height="13" width="15"></div>  
                                     <div class="jtab">'.$this->GetTableInfo('ChallengeCategory','CategoryName','ChallengeCategoryId',$row['CategoryId']).'</div>  
                                     '.$gallery.$winnerapp.'
								</div>
								
                            	<div class="jbox">
                                	<div class="jbox_cont">
										<div class="jbox_img"><img src="'.$row['Photo'].'" height="235" width="284"></div>
										<div class="jbox_title_cont"><p class="jbox_h2">'.$row['ChallengeTitle'].'</p></div>
										<p class="jbox_title_desc">'.mysql_real_escape_string(substr($row["ChallengeDesc"],0,110)).'</p>
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
			
				while($temp = mysql_fetch_array($query)){
					$html .= '<div class="jbox_info"><span class="rank">'.$i.'</span>'.$temp['HowToDesc'].'</div>';	
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
	
	function ShowSubmissions($challengeid){
		$result = mysql_query("SELECT * FROM `Applications` WHERE ChallengeId='".$challengeid."' ");
		if(!$result){
			$html = mysql_error();
		}else{
			$html = '';
			for($i = 1 ; $row = mysql_fetch_array($result); $i++ ){
				$html .= '<div class="submission-gallery">
						<a href="submission_page.php?appid='.$row['AppId'].'"><img width="150" height="150"  style="padding:10px;border:1px solid #CCC" src="'.$this->GetTableInfo('AppImages','ImagePath','AppId',$row['AppId']).'">
							<p>Submitted by:'.$this->GetTableInfo('ChallengeMembers','UserName','ChallengeMemberId',$row['ChallengeMemberId']).'</p>
						</a></div>';
			}
		}
		return $html;
	}
	
	
	function GetAppSingle($appId){
			
			$i=0;
			$html1 .='<div class="app-gall-bigbox">';
			$html2 .='<div class="app-gall-thumbnail" >
						<div class="thumb-left">
							<a href="#" class="aquo">&laquo;</a>
						</div>';
			
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
				<div class="thumb-right">
					<a href="#" class="aquo">&raquo;</a>
				</div></div>
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
					<p><a href="#">'.$row['Username'].'</a><br>
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
						$html .='<li><a href="#">'.$row['Username'].'</a></li>';
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
	

}//END OF CLASS

?>