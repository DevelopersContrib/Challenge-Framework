<?

include('header-new-v2.php');
$earthchaId="120";
$challengeid = $_REQUEST['challengeId'];
$challengename = $dir->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$challengeid);

if(!isset($_SESSION['userid'])){ ?>
	<script>window.location="http://earthchallenge.com/login.php";</script>	<?
}

if($_POST['submit-button']=='send'){
	$name = $_POST['appli-name'];
	$desc = $_POST['appli-desc'];
	$challengeid = $_POST['chall_id'];
	$userid = $_POST['userid'];
	$vid_cnt = $_POST['appli-vid-cnt'];
	$vid = $_POST['appli-vid'];
	
	if($appid = $dir->ApplicationSave($name,$desc,$challengeid,$userid)){
		$cnt = 0;
		while(list($key,$value) = each($_FILES['appli-image']['name'])){
			$cnt++;
			if(!empty($value)){
				$filename = $value;
				preg_match('/([^\\/\:*\?"<>|]+)(?:\.([^\\/\:*\?"<>|\.]+))$/',$filename,$matches);
				$ext = strtolower($matches[2]);
				//if (($ext == "jpg") || ($ext == "jpeg") || ($ext == "png") || ($ext == "gif")){
					$start = time();
					$add = "uploads/submission/images/img_".$start."_".$cnt.".".$ext;
                      
					copy($_FILES['appli-image']['tmp_name'][$key], $add);
					chmod("$add",0777);
					$add = $domainUrl.$add;
					$dir->AppImageSave($appid,$add);
				//}
			}
		}
		$cnt2 = 0;
		while(list($key2,$value2) = each($_FILES['appli-file']['name'])){
			$cnt2++;
			if(!empty($value2)){
				$filename2 = $value2;
				preg_match('/([^\\/\:*\?"<>|]+)(?:\.([^\\/\:*\?"<>|\.]+))$/',$filename2,$matches2);
				$ext2 = strtolower($matches2[2]);
				//$filename2=str_replace(" ","_",$filename2);// Add _ inplace of blank space in file name, you can remove this line
				$start2 = time();
				$add2 = "uploads/submission/files/file_".$start2."_".$cnt2.".".$ext2;
                      
				copy($_FILES['appli-file']['tmp_name'][$key2], $add2);
				chmod("$add2",0777);
				$add2 = $domainUrl.$add2;
				$dir->AppFileSave($appid,$add2);
			}
		}
		
		for($i=0; $i<$vid_cnt; $i++){
			$vid_url = $vid[$i];
			//echo $vid_url.'<br>';
			if($vid_url!="")
				$dir->AppVideoSave($appid,$vid_url);
		}
		?>
			<script>window.location="http://earthchallenge.com/submission_page.php?appid=<?=$appid?>";</script>	
		<?
	} 
	//else echo 'error';
	
}



?>
<div class="jwidth">
	<center>
	<div class="jcenter_hdr">
		<div style="float:left; width:60%; height:100%;color:#FFF; text-align:left;">
			<div style="width:90%;margin-left:15px; height:310px; display:table-cell; vertical-align:middle;">
				<h1><?=$dir->GetTableInfo('Challenges','ChallengeDesc','ChallengeId',$earthchaId)?></h1>
			</div>
		</div>
		<div style="float:left; width:40%;"><img src="v2/images/desc-earthchallenge_small.png"></div>
	</div>
	</center>
	<div class="clear"></div>  
</div>

<div class="jcenter">
	<div class="jcenter_cont">
		<ul id="breadcrumb">
			<li><a href="home.php">Home</a></li>
			<li><a href="browse.php" >Browse</a></li>
			<li><a href="browse-prof.php?challengeId=<?=$challengeid?>"><?=$dir->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$challengeid)?></a></li>
			<li><a href="submission_gallery.php?challengeid=<?=$challengeid?>">Application Gallery</a></li>
			<li>Submit Application</li>
		</ul>
		<br>
		<div id="jcenter-left">
			<div class="jcenter-inner">
				<p class="p-title">Submit an Application for <?=$challengename?></p>
				
				<script type="text/javascript" src="js/submission.js"></script>
				<form method="POST" enctype="multipart/form-data" >
					<div class="appli-box">
						<h5>* Name</h5>
						<span>Give a name to your application. This is required.</span><br>
						<input type="text" name="appli-name" id="appli-name" class="in-name" />
					</div>
					<div class="appli-box">
						<h5>* Description</h5>
						<span>Add a summary of your application. This will appear on the entry page. This is required.</span><br>
						<textarea name="appli-desc" id="appli-desc" class="in-desc"></textarea>
					</div>
					<div class="appli-box">
						<h5>* Image</h5>
						<span>The first image is used for your entry in listing pages. Upload several and we'll make them into a gallery.
						They should be jpg, gif or png files no larger than 2mb.</span><br>
						<span id="img-add-box" >
							<input type="file" name="appli-image[]" id="appli-image-1" />
						</span>
						<br> <button id="img-more" style="float:right">+ Add more</button>
					</div>
					<div class="appli-box">
						<h5>Video</h5>
						<span>You can add one or more videos by providing the embed script of the video. This is not required but this may increase the validation of your application.</span><br>
						<span id="vid-add-box">Paste embed script here:<textarea name="appli-vid[]" id="appli-vid-1" class="in-desc"></textarea></span>
						<button id="vid-more" style="float:right">+ Add more</button>
					</div>
					<div class="appli-box">
						<h5>File</h5>
						<span>This is not required but this may increase the validation of your application. Files should not be larger than 5mb.</span><br>
						<span id="file-add-box"><input type="file" name="appli-file[]" id="appli-file-1" size="45" /></textarea></span>
						<button id="file-more" style="float:right">+ Add more</button>
					</div>
					<div class="appli-box">
						Note: Please thoroughly check all the fields. Once it is submitted, you can not modify the data.<br>
						<input type="checkbox" name="accept"> I have read and understand the above condition.	
					</div>
					<input type="hidden" id="chall_id" name="chall_id" value="<?=$challengeid?>">
					<input type="hidden" id="userid" name="userid" value="<?=$_SESSION['userid']?>">
					<input type="hidden" id="appli-image-cnt" name="appli-image-cnt" value="1" />
					<input type="hidden" id="appli-vid-cnt" name="appli-vid-cnt" value="1" />
					<input type="hidden" id="appli-file-cnt" name="appli-file-cnt" value="1" />
					<button name="submit-button" id="submit" value="send">Submit Application for Review</button>
				</form>
	 
			</div>
		</div>
		<div id="jcenter-right">
			<div class="jcenter-inner">
				<ul class="side-list">
					<li><h4><a href="#">Challenge Sponsor</a></h4></li>
					<?=$dir->ShowChallengeSponsorDetails($challengeid);?>
				</ul>
				<ul 	class="side-list">
					<li><h4><a href="#">Other Sponsors</a></h4></li>
					<?=$dir->ShowSponsorLists();?>
				</ul>
			</div>	
		</div>
	
		<div class="clear"></div> 
	
	</div>     
</div>

<div class="clear"></div>  

<div class="jfooter">
    <center>
        <div class="footer-tab-section">
           	<div class="footer-tab">
                <span>About</span>
                <ul>
				<li><a href="#">My Company</a></li>
                <li><a href="#">Book Now</a></li>
                <li><a href="#">Resources</a></li>
                </ul>
            </div>

			<div class="footer-tab">
                <span>Contacts</span>
 			    <ul>
				<li><a href="#">My Company</a></li>
                <li><a href="#">Book Now</a></li>
                <li><a href="#">Resources</a></li>
				</ul>
			</div>

			<div class="footer-tab">
                <span>Sponsors</span>
                <ul>
				<li><a href="#">My Company</a></li>
                <li><a href="#">Book Now</a></li>
                <li><a href="#">Resources</a></li>
				</ul>
            </div>
            
            <div class="footer-tab">
                <span>Staffing</span>
                <ul>
				<li><a href="#">My Company</a></li>
                <li><a href="#">Book Now</a></li>
                <li><a href="#">Resources</a></li>
				</ul>
			</div>
            
            <div class="footer-tab">
                <span>Services</span>
                <ul>
				<li><a href="#">My Company</a></li>
                <li><a href="#">Book Now</a></li>
                <li><a href="#">Resources</a></li>
				</ul>
			</div>
            
         </div>
    </center> 
</div>

</div>

</body>
</html>
<style>
/*SUBMISSION*/
.appli-box{margin-bottom:30px;line-height:20px}
.appli-box .in-name{width:100%}
.appli-box .in-desc{width:100%}
.appli-box #image-upload-gallery{padding: 10px 0 0 10px;background: #F6F6F6;overflow: hidden;border: 1px solid #CCC;margin-top: 10px;}
.appli-box #image-upload-gallery li{position: relative;float: left;margin: 0 13px 13px 0;line-height: 0;cursor: move;}
.appli-sidebar{width: 230px;float: right;border-left: 2px solid #CCC;padding-left: 10px;min-height: 690px;}
</style>