		<footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <ul class="list-inline ul-footer">
                            <li>
                                <a href="/home/about">About</a>
                            </li>
                            <li>
                                <a href="/home/partners">Partners</a>
                            </li>
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="http://www.contrib.com/home/signin">Login</a>
                            </li>
                            <li>
                                <a href="http://referrals.contrib.com/idevaffiliate.php?id=15959&url=http://www.contrib.com/signup/firststep?domain=<?php echo $info['domain']?>">Register</a>
                            </li>
                            <li>
                                <a href="/home/staffing">We're Hiring</a>
                            </li>
                            <li>
                                <a href="#top" id="show_contactus_dialog" data-toggle="modal" data-target="#form-container">Contact us</a>
                            </li>
                        </ul>
                        <ul class="list-inline ul-sub-footer">
                            <li>
                                &copy <?php echo date("Y"); ?> <?=ucwords($info['domain'])?>
                            </li>
                            <li>
                                <a href="/home/policy">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="/home/terms">Terms and Conditions</a>
                            </li>
                            <li>
                                <a href="/home/sitemap">Sitemap</a>
                            </li>
                            <li>
                                <a href="/home/referral">Referral</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
		
		<input type="hidden" class="image1" id="image1" value="http://d2qcctj8epnr7y.cloudfront.net/images/jayson/challenge-framework/mountain-bike.jpg">
		<input type="hidden" class="image2" id="image2" value="http://d2qcctj8epnr7y.cloudfront.net/images/jayson/challenge-framework/tired-bike.jpg">
		<link rel="stylesheet" type="text/css" href="/css/serviceforms/form.css">
		<style>
		#form-container .text-error{
			color: red;
			font-size: 9px;
		}
		#form-container .requiredFieldError{
			color: red;
			font-size: 12px;
			margin: 10px 0;
		}
		#viewcontriblink{
			text-align:center;
		}
		</style>
		
		<div class="modal fade" id="form-container" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content modal2">
					<div class="modal-header mh-2">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title text-center" id="myModalLabel">
							Contact Us Today !
						</h4>
					</div>		 
					<div class="modal-body mb-2">
						<?include('serviceforms/variables.php')?>	
						<div class="wrap-form wrap-choices ">
									<div class="row">
										<div class="col-lg-12 text-center">
											<h3>
												Hello from <?=ucwords($info['domain'])?>
											</h3>
											<p class="blck-p">
												Please choose any of the options that interests you.
											</p>
											<br><br>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="group-form">
												<p>
													<label class="line-label">
													   <input value="partner_form" type="radio" name="radioForm" />
													   <span class="lbl padding-8">Partner / Develop with <?=ucwords($info['domain'])?></span>
													</label>
												</p>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="group-form">
												<p>
													<label class="line-label">
													   <input value="staffing_form" type="radio" name="radioForm" />
													   <span class="lbl padding-8">
													   		Staffing Opportunities with <?=ucwords($info['domain'])?>
													   </span>
													</label>
												</p>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="group-form">
												<p>
													<label class="line-label">
													   <input value="offer_form" type="radio" name="radioForm" />
													   <span class="lbl padding-8">
													   		Submitting an Offer for <?=ucwords($info['domain'])?>
													   </span>
													</label>
												</p>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="group-form">
												<p>
													<label class="line-label">
													   <input value="inquire_form" type="radio" name="radioForm" />
													   <span class="lbl padding-8">
													   		Inquire / Sponsor with <?=ucwords($info['domain'])?>
													   </span>
													</label>
												</p>
											</div>
										</div>
									</div>
						</div>
								
						<div class="wrap-form wrap-partner ">
							<?include('serviceforms/partner.php')?>						
						</div>
						<div class="wrap-form wrap-staffing ">
							<?include('serviceforms/staffing.php')?>							
						</div>
						<div class="wrap-form wrap-offer ">
							<?include('serviceforms/offer.php')?>
						</div>
						<div class="wrap-form wrap-inquiry ">
							<?include('serviceforms/inquiry.php')?>
						</div>
					</div>
				</div>
			</div>
		</div>
		  <!-- Include all compiled plugins (below), or include individual files as needed -->
 
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.3/jquery.backstretch.min.js"></script>
    <script type="text/javascript" src="/js/imageCentering.min.js"></script>
    <script type="text/javascript" src="/js/jquery.pulsate.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
                jQuery('#show_partner_dialog').click(function(){
				
					jQuery('.line-label .lbl').removeClass('line');
					jQuery("input[name=radioForm]:radio").attr("checked", false);
					
					jQuery('.wrap-form').hide();		
					jQuery('.wrap-partner').fadeIn();
				});
				
                jQuery('#show_contactus_dialog').click(function(){	
					jQuery('.wrap-form').hide();		
					jQuery('.wrap-choices').fadeIn();				
				});
				
                jQuery('input[name=radioForm]').click(function(){
				
					var inputSelect = jQuery('input[name=radioForm]:checked').val();
					
					jQuery('.line-label .lbl').addClass('line');
					jQuery('.line-label').find('.lbl').removeClass('line');

					

					if(inputSelect == 'partner_form'){
						jQuery('.wrap-choices').fadeOut(function(){
							jQuery('.wrap-partner').fadeIn();
						});
					}
					if(inputSelect == 'staffing_form'){
						jQuery('.wrap-choices').fadeOut(function(){
							jQuery('.wrap-staffing').fadeIn();
						});
					}
					if(inputSelect == 'offer_form'){
						jQuery('.wrap-choices').fadeOut(function(){
							jQuery('.wrap-offer').fadeIn();
						});
					}
					if(inputSelect == 'inquire_form'){
						jQuery('.wrap-choices').fadeOut(function(){
							jQuery('.wrap-inquiry').fadeIn();
						});
					}
				});	
            });
			
           function formback(form){				
				jQuery('.wrap-form').hide();
				jQuery('.wrap-choices').fadeIn();
			}
        </script>
		<script>
			jQuery(document).ready(function(){			
				var image1 = $("#image1").val();
				var image2 = $("#image2").val();
				jQuery(".wrap-index2").backstretch([image1,image2], {duration: 10000, fade: 750});

				jQuery(".ftr-img-container img").imgCentering();

				jQuery(".sec2-img-ftr img").imgCentering();

				$(function () {
					$(".email-ftre").pulsate({glow:false});
				});	
				
				$('#more').click(function(){
                    if($('.wrap-more').hasClass('hide')){
                        $('.wrap-more').removeClass('hide');
                    }
                    else{
                        $('.wrap-more').addClass('hide');
                    }
                });	
			});
			 
			
		</script>
   
        
    </body>
</html>