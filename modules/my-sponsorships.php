<?php
		$sponsorshiparray = $dir->GetMySponsorship($_SESSION['userid']);
		
		if($sponsorshiparray == 0){
			?>
				<h2 class="p-title">My Sponsorships </h2>
				<p>You have not sponsored a challenge yet.</p>
			<?
		}else{?>
			<h2 class="p-title">My Sponsorships [<?=sizeof($sponsorshiparray)?>]</h2><?
			
			for($i=0; $i < sizeof($sponsorshiparray) ; $i++){
				if($sponsorshiparray[$i]['SponsorshipType'] == '1'){ $type = "Monetary $".$sponsorshiparray[$i]['Amount']; }
				if($sponsorshiparray[$i]['SponsorshipType'] == '2'){ $type = "Miscellaneous"; }
			?>
				<div class="slide-box ic_container" id="capslide<?=$i?>">
							<a href="challenge-<?=$sponsorshiparray[$i]['ChallengeId']?>.html" target="_blank">
								<div class="thumb"><img src="<?=$dir->GetTableInfo('Challenges','Photo','ChallengeId',$sponsorshiparray[$i]['ChallengeId'])?>" /></div>
								<div class="text-bot">
								<div class="text-bot-left">
									<div class="text-bot-info-name">
										<?=$dir->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$sponsorshiparray[$i]['ChallengeId'])?>
									</div>
									<div class="text-bot-info">
										<?=$dir->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$sponsorshiparray[$i]['ChallengeId'])?>
										<div class="points">&nbsp;</div>
									</div>
								</div><!-- text-bot-left -->	
								</div><!-- text bot -->
								
								<div class="overlay" style="display:none;"></div>
							<div class="ic_caption">
								<p class="ic_category">Sponsorship:&nbsp;<?=$type?></p>
								<p class="ic_text"><?=substr($dir->GetTableInfo('Challenges','ChallengeDesc','ChallengeId',$sponsorshiparray[$i]['ChallengeId']),0,375)?></p>
							</div>
						</a>
				</div><!--slide-box -->
	
			<?
			}
		}
	?>
	
	<div style="clear:both"></div>
 <h2 class="p-title">Latest Applications</h2>
	<?=$dir->ShowLatestApplications(9);?>
  <hr />
<style type="text/css">
	.submission-gallery { margin: 10px; float: left; width: 30%; min-height: 270px; }
</style>

<script type="text/javascript" src="http://mychallenge.com/js/jquery.capSlide.js"></script>
<script type="text/javascript">
   $(function() {
		$("#capslide1,#capslide2,#capslide3,#capslide4,#capslide5,#capslide6,#capslide7,#capslide0").capslide({
         caption_color	: 'white',
         caption_bgcolor	: 'black',
         overlay_bgcolor : 'black',
         border			: '',
         showcaption	    : false
      });
   });
</script>

<style>

.slide-box { width:42%; float:left; height:150px; background:#fff; padding:5px; position:relative; border:1px solid #E2E2E2;
margin:0 30px 30px 0;box-shadow: rgba(0,0,0,0.5) 0px 0px 14px;text-align:left;
} 
.slide-box a.close{ position:absolute; top:10px; right:10px; background:url(../images/close-circ.png) no-repeat; width:13px; 
height:13px;z-index:8000; cursor:pointer;}
.slide-box a:hover.close{ background:url(../images/close-circ.png) no-repeat 0 -13px;}
.slide-box .thumb{ text-align:center; }
.slide-box .thumb img{ border:none; margin-bottom:5px;padding: 0px;margin: 0;width:230px;height:90px;}
.slide-box .text-bot { margin:0px;padding:0px;width:99%; float:left;
background: rgb(255,255,255); /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNlNWU1ZTUiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(left,  rgba(255,255,255,1) 0%, rgba(229,229,229,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(255,255,255,1)), color-stop(100%,rgba(229,229,229,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(left,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(left,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(left,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%); /* IE10+ */
background: linear-gradient(left,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e5e5e5',GradientType=1 ); /* IE6-8 */

}
.slide-box .text-bot-left { width:100%; float:left;} 
.slide-box .text-bot-left .text-bot-info { font-size:10px; line-height:12px; margin-bottom:10px; color:#999;text-align:right;}
.slide-box .text-bot-left .text-bot-info span{ color:#333;}
.slide-box .text-bot-left .text-bot-info div.points{float:left;width:80px;height:10px;text-align:left;font-size:13px;}
.slide-box .text-bot-left .text-bot-info-name { padding:5px 0px 3px 5px;font-size:15px;color:#333;font-weight:bold;margin-bottom:5px}
.slide-box .text-bot-thumb { width:45px; float:right;} 
.slide-box .text-bot-thumb img{ width:45px !important; border:0;}
.col2{width:70%;line-height:15px;font-size:11px;}


/* BROWSE PAGE HOVER*/
.ic_container{
    vertical-align:baseline;
    
    position:relative;
    /*-moz-border-radius:10px;
    -webkit-border-radius:10px;
    -khtml-border-radius:10px;
    -moz-box-shadow: 0 1px 3px #888;
    -webkit-box-shadow: 0 1px 3px #888;*/
}
.overlay{
    opacity:0.3;
    position:absolute;
    top:0px;
    bottom:0px;
    left:0px;
    right:0px;
    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=50);
}
.ic_caption{
    position:absolute;    
    opacity:0.8;   
    overflow:hidden;
    margin:0px;
    padding:0px;
    left:0px;
    right:0px;
    cursor:default;
    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=60);
}
.ic_category{
    text-transform:uppercase;
    font-size:12px;
    letter-spacing:1px;
    padding:5px;
    margin:0px;
}
.ic_caption h3{
    padding:0px 5px 5px 5px;
    margin:0px;
    font-size:18px;
}
.ic_text{
    padding:5px;
    margin:0px;
    text-align:justify;
    font-size:11px;

}
/* END BROWSE PAGE HOVER*/
</style>
