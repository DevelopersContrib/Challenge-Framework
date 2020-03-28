<?php
	//approvesubmission.php
	session_start();
	include_once('includes/function.php');
	$dir = NEW DIR_LIB_2;
	?>
	<html>
	<style type="text/css">
		button{background: #EEE;
background: #EEE -moz-linear-gradient(top, rgba(255, 255, 255, .2) 0%, rgba(0, 0, 0, .2) 100%);
background: #EEE -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255, 255, 255, .2)), color-stop(100%,rgba(0, 0, 0, .2)));
background: #EEE -webkit-linear-gradient(top, rgba(255, 255, 255, .2) 0%,rgba(0, 0, 0, .2) 100%);
background: #EEE -o-linear-gradient(top, rgba(255, 255, 255, .2) 0%,rgba(0, 0, 0, .2) 100%);
background: #EEE -ms-linear-gradient(top, rgba(255, 255, 255, .2) 0%,rgba(0, 0, 0, .2) 100%);
background: #EEE linear-gradient(top, rgba(255, 255, 255, .2) 0%,rgba(0, 0, 0, .2) 100%);
border: 1px solid #AAA;
border-top: 1px solid #CCC;
border-left: 1px solid #CCC;
padding: 4px 12px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
border-radius: 3px;
color: #444;
display: inline-block;
font-size: 11px;
font-weight: bold;
text-decoration: none;
text-shadow: 0 1px rgba(255, 255, 255, .75);
cursor: pointer;
margin-bottom: 20px;
line-height: 21px;
font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;}
	
	</style>
	<div style="background-image: url(images/fill_top.jpg);background-repeat: repeat-x;">

	<?
	if(isset($_POST['approve'])){
		//echo "approve".$_POST['appid'].$_POST['challengeid'];
		$appid = $_POST['appid'];
		$challengeid = $_POST['challengeid'];
		
		$query = mysql_query("UPDATE `Challenges` SET `Solved` = '1' WHERE `ChallengeId` = '".$challengeid."' ");
		
		
		if($query){
			$query2 = mysql_query("UPDATE `Applications` SET `AppWinner` = '1' WHERE `AppId` = '".$appid."' ");
			if($query2){
				echo "You successfully selected challenge winner.";
				?>
					<br>
					<button style="float:left" onclick="event.preventDefault(); parent.$.fancybox.close();">
						<span>Ok</span>
					</button>
				<?
			}else{
				echo "Something went wrong. Please try again.";
				?>
					<br>
					<button style="float:left" onclick="event.preventDefault(); parent.$.fancybox.close();">
						<span>Ok</span>
					</button>
				<?
			}
		}else{
			echo "Something went wrong. Please try again.";
			?>
				<button style="float:left" onclick="event.preventDefault(); parent.$.fancybox.close();">
					<span>Ok</span>
				</button>
			<?
		}
		
	}else{
		$applicationid = $_GET['appid'];
		$challengeid = $dir->GetTableInfo('Applications','ChallengeId','AppId',$applicationid);
		$companyid = $_SESSION['userid'];
		
		if($applicationid == "" || $applicationid == " "){
			echo "Something went wrong.".$applicationid;
		}else if($dir->CheckIfExist("SELECT * FROM `Challenges` WHERE `ChallengeId`='".$challengeid."' and `CompanyId`='".$companyid."' ") == false){
			echo "You are not allowed to do this action.";
		}else{
				echo "Are you sure you want to approve this submission?";
			?>
					<br>
					<button style="float:left" onclick="event.preventDefault(); parent.$.fancybox.close();">
						<span>Cancel</span>
					</button>
					<form action="" method="POST">
						<input type="hidden" name="appid" value="<?=$applicationid?>" />
						<input type="hidden" name="challengeid" value="<?=$challengeid?>" />
						<button style="float:right" name="approve">Approve</button>
					</form>
			<?
		}
	}
?>
	</div>
</html>
