    <script type="text/javascript">
        $(document).ready( function() {
           $(".sec2-img-ftr img").imgCentering();
		   jQuery(".wrapImgChallengeFtrd img").imgCentering();
        });
    </script>
   

<!--------------------------------------------------------------------------------->


<?// echo count($getnotfeatured); ?>
<?if(count($getnotfeatured) > 0):?>
		  <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1><i class="fa fa-star-half-full"></i> Other Related Challenges </h1>
                        <br>
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <ul class="list-unstyled">
							
							  <? $counter = 0;?>
							   <? foreach($getnotfeatured as $data){?>
                                <li class="col-lg-3">
                                    <div class="row">
                                        <div class="col-lg-12 challengeBoxFeature">
                                            <a href="/challenge/details/<?=$data['ChallengeId']?>">
                                                <div class="challengeBoxContent">
                                                    <div class="challengeBoxHeader">
													  <div class="wrapImgChallengeFtrd">
                                                        <?php
                                                        if(strpos($data['Photo'],'cdn.vnoc') < -1) {
                                                            $pos = strrpos($data['Photo'],'/');
                                                            $img = "https://cdn.vnoc.com/challenge".substr($data['Photo'],$pos);
                                                        } else {
                                                            $img = $data['Photo'];
                                                        }
                                                        ?>
                                                        <img class="thumbnail img-responsive" src="<?=$img?>" title="alt="<?=stripslashes($data['ChallengeTitle'])?>" alt="<?=stripslashes($data['ChallengeTitle'])?>">
														</div>
                                                        <div class="challengeBoxDetails">
                                                            <div class="challengeDetailsDays">
                                                                <i class="fa fa-clock-o"></i> <?=($data['remaining_days']<0)?'0':str_replace("days","",$data['remaining_days'])?> day/s left
                                                            </div>
                                                            <div class="challengeBoxInfo">
                                                                <div class="head">
                                                                    <?=stripslashes($data['ChallengeTitle'])?>
                                                                </div>
                                                                <p class="boxDesc">
                                                                    <? 
																		$limit = 100;
																											
																											
																		if(strlen($data['ChallengeDesc']) > $limit){	
																		$data['ChallengeDesc'] = substr($data['ChallengeDesc'], 0, strrpos(substr($data['ChallengeDesc'], 0, $limit),' ')).'...';
																		}
																		
																		echo $data['ChallengeDesc'];
																	
																	?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="challengeBoxSee pull-right">
                                                        Join this Challenge
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
								<?
									if($counter == 3){
										break;
									}
									?>
									<? $counter++; ?>
								<?}?>
						
                            </ul>
                        </div>
                        <br>    
                    </div>
                </div>
<? endif; ?>
<? //echo count($related_challenges); ?>

<!--------------------------------------------------------------------------------->				
           