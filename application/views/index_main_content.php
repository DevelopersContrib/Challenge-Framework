
 <!--<link rel="stylesheet" href="<?//=BASE_URL?>/css/black/index.css">-->

			
<!--------------------------------------------------------------------------------->



 <div class="row">
	<div class="col-lg-12">
		<h1><i class="fa fa-star-o"></i> Featured Challenge</h1>
		<br>
	</div>
	<div class="col-lg-12 wrap-sec wrap-margBtm">
		<div class="row">
			<div class="col-xs-12 col-lg-5 ftr-img">
				<div class="row">
					<div class="wrap-cmpgn-ftr">
						<div class="left">Featured Challenge</div>
					</div>
				</div>
				<div class="row">
					<div class="ftr-img-container" style="position: static; overflow: hidden; background-color: transparent;">
						<img src="<?=$getfeaturedchallenge['Photo']?>" class="img-responsive" alt="<?=stripslashes($getfeaturedchallenge['ChallengeTitle'])?>" title="<?=stripslashes($getfeaturedchallenge['ChallengeTitle'])?>">
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-lg-7 chllnge-ftre-cont">
				<h3>
					<a class="ttle-ftre" href="http://www.contrib.com/challenge/details/<?=$getfeaturedchallenge['ChallengeId']?>/<?=$getfeaturedchallenge['Slug']?>">
						 <?=stripslashes($getfeaturedchallenge['ChallengeTitle'])?>
					</a>
				</h3>
				<div class="desc-index2">
					 <? 
						//$limit2 = 200;
						
						$feat_chall2 = $getfeaturedchallenge['ChallengeDesc'];
															
						//if(strlen($feat_chall2) > $limit2){	
						//$feat_chall2 = substr($feat_chall2, 0, strrpos(substr($feat_chall2, 0, $limit),' ')).'...';
						//}
						
						echo stripslashes($feat_chall2);
								
					?>
				</div>
				<br>
				<div class="progress">
					<div style="width: 100%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-danger">
						<span class="sr-only">50% Complete</span>
					</div>
				</div>
				<ul class="list-inline ul-ftre-chllenge">
					<li>
						<span class="ftr-num"><?=($getfeaturedchallenge['remaining_days']<0)?'0':str_replace("days","",$getfeaturedchallenge['remaining_days'])?></span>
						Days Left
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!--------------------------------------------------------------------------------->
   
<!--<script type="text/javascript" src="/js/registerIndex.js" ></script>-->
<script type="text/javascript">
	$(document).ready( function() {
	   $(".ftr-img-container img").imgCentering();
	});
</script>