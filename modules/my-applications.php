
<!-- end-jgallery !-->

<script type="text/javascript">

	$(this).ready(function() {
		$('.jgal-info').css('opacity',0);
		
	$('.jgal-info').mouseover(function(){
				$(this).animate({
					opacity:1,
					},100,function(){
						});
			})
	
		$('.jgal-info').mouseleave(function(){
				$(this).animate({
					opacity:0,
					},100,function(){
						});
			})
					

    });



</script>
<?php
		include_once('includes/challenger_function.php');
		$challenger = new DIR_CHALLENGER;
		$applications_array = $challenger->GetMyApplications($_SESSION['userid']);
		if($applications_array == 0){
			?>
				<p>An error occurred while we are fetching your info.</p>
			<?
		}else{?>
			<h2 class="p-title">My Applications [<?=sizeof($applications_array)?>]</h2>
      
      <?
			for($i=0; $i < sizeof($applications_array) ; $i++){
			?>
       <div class="jgal-thumb">
    	<div class="jgal-img">
        	<div class="jgal-img-hover" style="display:table-cell; vertical-align:bottom;  background-image:url(<?=$challenger->GetTableInfo('AppImages','ImagePath','AppId',$applications_array[$i]['AppId'])?>);">
				<div class="jgal-info">
                	<div><a href="application-<?=$applications_array[$i]['AppId']?>.html"><?=$applications_array[$i]['AppName']?></a></div>
                	<div><?=$challenger->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$applications_array[$i]['ChallengeId'])?></div>
                </div>            
                
            </div>
        </div>
    </div>
      
			<?
			}
		}
	?>
<div class="clear"></div>
  <hr />
<br />  
  
 <h3 class="p-title">Latest Applications</h3>
	<?=$dir->ShowLatestApplications(6);?>
  <hr />
