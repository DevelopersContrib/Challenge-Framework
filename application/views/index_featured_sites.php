<?//if(count($related_challenges) > 0):?>
    <!--<div class="row">   
        <div class="col-lg-12">
            <h1 class="alreadyIn"><i class="fa fa-cubes"></i> Already in <? //echo $info['domain']?></h1>
            <br>
            <div class="row">
			<? 
			/*$counter2 = 0; 
			while($counter2 < count($related_challenges)){?>
                <div class="col-lg-3 text-center">
                    <a title="<?echo $related_challenges[$counter2]['DomainName']?>" alt="<?echo $related_challenges[$counter2]['DomainName']?>" class="domainAlready" href="http://<?echo $related_challenges[$counter2]['DomainName']?>" >
                        <div class="wrapDomainAlready">
                            <div class="wrapTextDomain">
							<? if($related_challenges[$counter2]['Logo'] == ''){?>
                                <!-- <img class="img-responsive" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/logo-OctoberChallenge1.png"> -->
                                <? echo $related_challenges[$counter2]['DomainName'] ?>
							<? }else{?>
								<img class="img-responsive" alt="<?echo $related_challenges[$counter2]['DomainName']?>" src="<?echo $related_challenges[$counter2]['Logo'] ?>"> 
							<? } ?>
                            </div>
                        </div>
                    </a>
                </div>
			<?	
			if($counter2 == 3){
					break;
			}
			?>
				<? $counter2++; ?>
              <?}*/?>
            </div>
        </div>
    </div>-->
<? //endif; ?>
<div class="row">
    <div class="col-lg-12">
        <br><br>
        <h1 class="alreadyIn"><i class="fa fa-bar-chart-o"></i> Sponsors</h1>
        <br>
    </div>
    <div class="col-lg-12">
        <script src="http://tools.contrib.com/cwidget/sponsor?c=<?echo $info_attributes['featured_challenge']?>&d=<?=$info['domain']?>"></script>
    </div>
</div>