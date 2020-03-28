<?

include('header-new-v2.php');
$earthchaId="120";

$challengeid = $_GET['challengeId'];
?>

<style type="text/css">
	span.rank { display: inline-block; float: left; padding: 10px; background: #FFE87C; font-size: 14px; font-weight: bold;
		color: black; -moz-border-radius: 35px;	-webkit-border-radius: 35px; border-radius: 35px; border: 1px solid #C8B560;}
	.company-profile-up{
			max-width:100%;
			}
		
		.jbox {
		  width:98%;
			height:250px;
			background: rgb(181,189,200); /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2I1YmRjOCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjM2JSIgc3RvcC1jb2xvcj0iIzgyOGM5NSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMyODM0M2IiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(left,  rgba(181,189,200,1) 0%, rgba(130,140,149,1) 36%, rgba(40,52,59,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(181,189,200,1)), color-stop(36%,rgba(130,140,149,1)), color-stop(100%,rgba(40,52,59,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(left,  rgba(181,189,200,1) 0%,rgba(130,140,149,1) 36%,rgba(40,52,59,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(left,  rgba(181,189,200,1) 0%,rgba(130,140,149,1) 36%,rgba(40,52,59,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(left,  rgba(181,189,200,1) 0%,rgba(130,140,149,1) 36%,rgba(40,52,59,1) 100%); /* IE10+ */
background: linear-gradient(left,  rgba(181,189,200,1) 0%,rgba(130,140,149,1) 36%,rgba(40,52,59,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b5bdc8', endColorstr='#28343b',GradientType=1 ); /* IE6-8 */
			padding:30px 10px 10px 10px;
			clear:both;
			border-bottom:25px solid #333;
        }
		.jbox_btn {
		   width:75px;
		   height:30px;
		   background-image:url(images/fill_btn.jpg);
		   background-repeat:repeat-x;
		   border:1px solid #666;
		   text-align:center;
		   margin: 2px;
		   -moz-border-radius:5px;
		   -webkit-border-radius:5px;
		}
		.jbox_img {
			float:left;
			margin-right:10px;
		}
    div.jbox_img img{width:450px;min-height:250px;}
		.jbox_title_cont {
			text-align:left;		
		}
		.jbox_usr_info{
			float:left;
		}
		.jbox_h2 {
			font-size:42px;
			font-family:Arial, Helvetica, sans-serif;
			font-weight:bold;
			color:#FFF;
			text-shadow:0px 2px 2px #333333; 
		}
		.jbox_grad {
		 margin-bottom:40px;
		}
		.jbox_grad  h3{
			font:Arial, sans-serif;
			font-size:22px;
			position: relative;
			color: #464646;
      background: none repeat scroll 0 0 #CCCCCC;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    margin: 5px;
    padding: 0px 0px 0px 3px;
			text-shadow: 2px 2px 8px #EEEEEE;
		}
		.jbox_grad h3 span {
			background:url(images/gradient.png) repeat-x;
  			position: absolute;
  			display: block;
  			width: 100%;
  			height: 31px;
		}
		.jbox_timeline {
			width:100%;
			height:90px;
			-webkit-border-radius:8px;
			-moz-border-radius:8px;
			padding:10px;
		}
	.jtab { background:#ccc; height:20px; padding: 5px 5px 2px 5px; margin-right:5px; float:left; text-align:center;
			color: white; -webkit-border-top-right-radius:5px; -webkit-border-top-left-radius:5px;
			-moz-border-radius-topright:5px; -moz-border-radius-topleft:5px; }
	.jtab a{ color:white}
	.jtab a:hover{ opacity:0.5}
	.jbox_info { font:Arial, sans-serif; font-size:12px; line-height:15px;
		 font-smoothing:always; min-height:40px; vertical-align:middle; padding:5px 10px;
		}
		.jbox_title_desc {
			font-size:20px;
			color:#FFFFFF;
			line-height:24px;
			height:100px;
		}
		.jbox_price {
			background-image:url('http://mychallenge.com/images/prize_ico.gif');
			background-repeat:no-repeat;
			height:65px;
			line-height:16px;
			font-size:12px;
			padding-left:70px;
		    margin-botton:5px;	
		}
		.jbox_cat {
		  padding-top:27px;
		}
		.jbox_cat_h1  {
			font-family:Verdana, Geneva, sans-serif;
		   font-size:16px;
		   font-weight:bold;
		   color:#F30;
		   text-align:left;
		   margin-bottom:5px;
		}
		.jbox_cat ul {
		font-size:13px;
		line-height:25px;
		color:#333333;
		list-style:none;
		}
		.jbox_timeline .tab_01 {
			width:31%;
			height:90%;
			float:left;
			padding:5px;
			text-align:center;
		}
	    .jbox_timeline .tab_01 div:first-child {
		 font-weight:bold;
		 margin-bottom:10px;
		}
		.jbox_timeline .tab_02 div:first-child {
		 font-weight:bold;
		 margin-bottom:10px;
		}
		.jbox_timeline .tab_03 div:first-child {
		 font-weight:bold;
		 margin-bottom:10px;
		}
		.jbox_timeline .tab_02 {
			width:31%;
			height:90%;
			float:left;
			padding:5px;
			text-align:center;
		}
		.jbox_timeline .tab_03 {
			width:31%;
			height:90%;
			float:left;
			padding:5px;
			text-align:center;
		}
		.jbox_timeline .tab_02 {
		  border-left:1px solid  #CCCCCC;;
		  border-right:1px solid  #CCCCCC;
		}
		.jbox_dpost {
			font-size:12px;
		}
		.jbox_dpost span:first-child {
		  padding-right:5px;
		  color:#FFFFFF;
		  font-weight:bold;
		}
</style>

<div class="jwidth">
<center>
<div class="jcenter_hdr">
<div style="float:left; width:60%; height:100%;color:#FFF; text-align:left;">
	<div style="width:90%;margin-left:15px; height:310px; display:table-cell; vertical-align:middle;">
	<h1><?=stripslashes($dir->GetTableInfo('Challenges','ChallengeDesc','ChallengeId',$earthchaId))?></h1>
	</div>
</div>
<div style="float:left; width:40%;"><img src="v2/images/desc-earthchallenge_small.png"></div>
</div>
</center>


</div>

<div class="jcenter">
	
<div class="jcenter_cont">
<ul id="breadcrumb">
	<li><a href="home.php">Home</a></li>
	<li><a href="browse.php" >Browse</a></li>
	<li><a href=""><?=$dir->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$_REQUEST['challengeId'])?></a></li>
</ul>
<br>

	<?php
		echo $dir->ShowChallengeProfileTop($challengeid);
	
		if($dir->GetTableInfo('Challenges','Solved','ChallengeId',$challengeid) == '1'){
			?>
				<div style="padding:8px 32px;background-color:#FFDB80;">
					This challenge is closed. View winning entry <a href="submission_page.php?appid=<?=$dir->GetTableInfo2('AppId','Applications','ChallengeId="'.$challengeid.'" and AppWinner="1" ')?>">here</a>.
				</div>
			<?
		}
	?>
	
	<div id="jcenter-left">
		<div class="jcenter-inner">
			
			<div style="padding:20px;">
				<p class="p-title">More Details<p>
				<p><?=stripslashes($dir->GetTableInfo('Challenges','MoreDetails','ChallengeId',$challengeid))?></p>
			</div>
		
		<div style="padding:20px;">
			<p class="p-title">Timeline<p>
			<p><?=$dir->ShowTimeline($challengeid);?></p>
		</div>
		
		<div style="padding:20px;">
			<p class="p-title">Prizes<p>
			<p><?=$dir->ShowPrizes($challengeid);?></p>
		</div>
		
		<div style="padding:20px;">
			<p class="p-title">Judging Criteria<p>
			<p><?=$dir->ShowCriteria($challengeid);?></p>
		</div>
		
		<div style="padding:20px;">
			<p class="p-title">How To Enter<p>
			<p><?=$dir->ShowHowToEnter($challengeid);?></p>
		</div>
			
		</div><!-- jcenter-inner -->
   </div><!-- jcenter-left -->

<div id="jcenter-right">
   <div class="jcenter-inner">
	   <ul class="side-list">
		<li><h4><a href="#">Challenge Sponsor</a></h4></li>
			<?php
			//$dir->ShowCategories()
				echo $dir->ShowChallengeSponsorDetails($_REQUEST['challengeId']);
				?>
				<li><h4><a href="#">Other Sponsors</a></h4></li>
				<?
				echo $dir->ShowSponsorLists();
			?>
		</ul>
	   </div><!-- class="jcenter-inner" -->
</div><!-- jcenter right-->
    
   <div class="clear"></div>    
    
</div><!-- jcenter_cont -->
 
 <?include_once('footer_.php');?>
 