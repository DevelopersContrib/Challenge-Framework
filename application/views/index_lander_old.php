<style>
    .badge-postn{
    	position: absolute;
    	right: 90px;
    	top: 3px;
    	z-index: 10;
    }
    .r-d{
    	animation-delay: 2.5s;
    }
    .rotateIn{
    	animation-name: rotateIn;
    }
    .animated{
    	animation-duration: 1s;
        animation-fill-mode: both;
    }
    .inputBgCstm{
        height:46px !important;
    }
    /* Landscape phones and down */
    @media (max-width: 480px) { 
        .badge-postn{
            right: 5px;
        }
        .animated.rotateIn.r-d.badge-postn img {
            width: 100px;
        }
        .img-index-2{
            max-width: 100%;
        }
        .h1-index2{
            font-size: 27px;
        }
        .aMoreInfo span{
            font-size: 24px;
        }
        .alreadyIn {
            font-size: 27px;
        }
    }
</style>


<!--------------------------------------------------------------------------------->

<div style="position:relative;">
	<div class="animated rotateIn r-d badge-postn">
		<a alt="Contrib Brand" target="_blank" href="http://referrals.contrib.com/idevaffiliate.php?id=15959&url=http://www.contrib.com/signup/firststep?domain=<?php echo $info['domain']?>">
		<img alt="<?=ucwords($info['domain'])?> - A Contrib Brand" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/badge-contrib-3.png">
		</a>
	</div>
</div>


<div class="wrap-index2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="wrap-header-text-index2">
                            <p class="text-center">
								<? if($info['logo']!=''){ ?>
									 <h1 class="text-center"> <a href="http://<?=$info['domain']?>"><img alt="<?=ucwords($info['domain'])?> " title="<?=ucwords($info['domain'])?>" class="img-responsive img-index-2" src="<?=$info['logo']?>"></a></h1>
								<? }else{ ?>
									<h1 class="h1-index2 text-center" style="color: #31708f;"><?=ucwords($info['domain'])?></h1>
								<? } ?>
                            </p>
                            <h2 class="h1-index2 text-center">
								<? if($info['description']!=''){
										echo stripslashes(str_replace('\n','<br>',$info['description']));
									}else{
										echo 'Learn more about Joining our Partner Network.';
								} ?>
                            </h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
								<form action="http://www.contrib.com/signup/firststep?domain=<?=$info['domain']?>" method="post">
									<div class="input-group">
										<input type="text" class="form-control input-lg" id="email" name="email" placeholder="Enter your email address">
										<span class="input-group-btn">
											<button class="btn btn-danger btn-lg email-ftre inputBgCstm">
												<i class="fa fa-edit"></i>
												Sign Up
											</button>
										</span>
									</div><!-- /input-group -->
								</form>
								<!--<i><h3 style="color:#fff; text-shadow: 0 2px 5px #000000;" class="text-center">We will never rent, sell or share your email to a third party.</h3></i>
                                <br><br><br>-->
								<br>
									<p class="text-center" style="color:#fff; text-shadow: 0 2px 5px #000000;">We will never rent, sell or share your email to a third party.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-half-1">
            <div class="container">
                <div class="row">   
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <a class="aMoreInfo" href="">
                                    <span>
                                        <i class="fa fa-search"></i>
                                        Browse <?=ucwords($info['domain'])?> Challenges
                                    </span>
                                    <p>
                                        Check out our Current Challenges at <? echo $info['domain'] ?>
                                    </p>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a class="aMoreInfo" href="">
                                    <span>
                                        <i class="fa fa-thumbs-o-up"></i>
                                        Join Challenges
                                    </span>
                                    <p>
                                        Are you the type a challenge wrangler? Come and Join us at <?=ucwords($info['domain'])?>. It'll be fun.
                                    </p>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a class="aMoreInfo" href="">
                                    <span>
                                        <i class="fa fa-gift"></i>
                                        Win Challenges at <?=ucwords($info['domain'])?>
                                    </span>
                                    <p>
                                        Great Free Prizes or <?=ucwords($info['domain'])?> Equity awaits our challenge winners.
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!--------------------------------------------------------------------------------->
