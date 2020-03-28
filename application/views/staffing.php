
<?include('header_index.php')?>

		<script type="text/javascript">
			$(document).ready(function(){
				$('.section-content-pages').css({'min-height': (($(window).height()))+'px'});
				$(window).resize(function(){
					$('.section-content-pages').css({'min-height': (($(window).height()))+'px'});
				});
			});
		</script>
		 <section class="wrap-otherPages">
            <div class="wrap-overlayPages text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 contentOther">
                            <h4 class="underlined">WANNA JOIN OUR TEAM?</h4>
                            <h2>At <span class="text-capitalize"><?=ucwords($info['domain'])?></span> we believe in welcoming the challenge of building amazing brands and companies, but we also believe the experience of building should be amazing too.</h2>
                        </div>
                    </div>
                </div>
            </div>
            <img class="img-responsive hide" alt="" title="" src="https://www.shakelaw.com/wp-content/uploads/shake_jobs_instagram.jpg">
        </section>
		
		
		<section class="section-content-pages">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="content-h3" title="challenge.com"><?=ucwords($info['domain'])?> Staffing Form</h2>
                        <ul class="list-unstyled ul-why">
                            <li>
                                <div class="head-sub">
                                    <h4><i class="fa fa-check"></i> Why Join <?=ucwords($info['domain'])?>?</h4>
                                </div>
                                <p class="desc">We are looking for the best of the best, Full-Time, Part-Time, Moonlighting, Contractual and Freelance.</p>
                                <br>
                                <p class="desc">We consult and manage over 100,000 domain name ventures and are always seeking Strategic Partnerships, Applications, Domains, Engineers, Developers, Specialist and just cool smart people around the Globe. Learn more about openings and opportunities with our partner companies and send us your resume or examples to accelerate the process.</p>
                                <br>
                                <p class="desc">Learn more about openings and opportunities with our partner companies.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <iframe frameborder="no" style="width:332px;height:480px;border: none;" scrolling="no" src="https://www.contrib.com/forms/staffing/<?=$info['domain']?>"></iframe>
                    </div>
					
					
					<? if($jobs[0] != ""){ ?>
					
                    <div class="col-lg-12">
                        <br>
                        <h3 class="underlined center-block">CURRENT OPPORTUNITIES</h3>
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
							<? foreach($jobs as $job){ ?>
								 <div class="col-lg-4">
									<div class="box-itemOther">
										<div class="innerBoxItem">
											<a class="aItemBox" href="https://contrib.com/brand/jobs/<?=$job['domain_name']?>/<?=$job['job_id']?>" target="_blank">
												<div class="col-lg-12">
													<h3><?=$job['title']?></h3>
													<p>
													<?
													// strip tags to avoid breaking any html
													$string = strip_tags($job['description']);

													if (strlen($string) > 150) {

														// truncate string
														$stringCut = substr($string, 0, 150);

														// make sure it ends in a word so assassinate doesn't become ass...
														$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
													}
													echo $string;
													?>
													</p>
													<span class="read-more">Apply now</span>
												</div>
											</a>
										</div>
									</div>                             
								</div>							
								
							<? } ?>
                           
                        </div>
                    </div>
					<? } ?>
				</div>
            </div>
        </section>
       



<?
session_start();
 if(!isset($_SESSION['Username'])){ ?>
<?include('index_footer.php')?>
<? } else { ?>
<?include('footer.php');?>
<? } ?>