<?

include('header-new-v2.php');
$earthchaId="120";
$challengeid = $_GET['challengeid'];
$challengename = $dir->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$challengeid);


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
			<li>Application Gallery</li>
		</ul>
		<br>
		<div id="jcenter-left">
			<div class="jcenter-inner">
				<p class="p-title">Application Gallery for <?=$challengename?></p>
				<p><?=$dir->ShowSubmissions($challengeid);?></p>
			</div>
		</div>
		<div id="jcenter-right">
			<div class="jcenter-inner">
				<ul class="side-list">
					<li><h4><a href="#">Challenge Sponsor</a></h4></li>
					<?=$dir->ShowChallengeSponsorDetails($_REQUEST['challengeid']);?>
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
.submission-gallery{ margin:10px 10px 60px 10px; float:left; height:160px; width:30%; }
</style>