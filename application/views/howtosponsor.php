
<?	include('header_index.php'); ?>
<script type="text/javascript">
 $(document).ready(function(){
  $('.section-content-pages').css({'min-height': (($(window).height()))+'px'});
  $(window).resize(function(){
   $('.section-content-pages').css({'min-height': (($(window).height()))+'px'});
  });
 }); 
</script>
		
		<section class="wrap-sub-header wrap-sub-header-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-inline ul-pages-brdcrmbs">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                            </li>
                            <li class="active">
                                How to sponsor
                            </li>
                        </ul>
                        <h1 class="hw-sponr-ttle">How to Sponsor Challenges on <span class="domainName"><?=ucwords($info['domain'])?></span></h1>
                        <h3 class="hw-sponr-ttle">Learn how to sponsor and advertise your product or brand on our viral challenges on <?=ucwords($info['domain'])?>.</h3>
                        <p>
                            <a href="https://www.contrib.com/signup/challenge/sponsor?domain=<?=ucwords($info['domain'])?>" class="btn btn-danger btn-lg" target="_blank">Sponsor a challenge today!</a>
                        </p>
                    </div>
					<div class="col-lg-6">
					 <iframe width="640" height="360" src="//www.youtube.com/embed/beRi5wU46yo" frameborder="0" allowfullscreen></iframe>
					</div>
                </div>
            </div>
        </section>
        <section class="mdm-ttle-hwtspnr">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="hw-sponr-ttle">Sponsor our challenges and get new visitors and targetted traffic to your sites.</h3>
                    </div>
                </div>
            </div>
        </section>
		<section class="section-content-pages">
            <div class="container">
                <div class="row">
              
                    <div class="we-love about-us2">
                        <div class="col-lg-6">
                            <div class="inner">
                                <div class="icon-left">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <div class="blog-text">
                                    <h3 class="ellipsis" title="<?=ucwords($info['domain'])?>">How to sponsor challenges on <?=ucwords($info['domain'])?></h3>
                                    <p>There are a lot of challenges in <?=ucwords($info['domain'])?> and we would like you to take part in helping source the crowds help in solving it. One of the ways is through sponsoring a challenge or a set of challenges. In return you will get advertising, company and brand recogniction and partnership with one of the worlds greatest domain incubators, Global Ventures.</p>
                                </div>
                                <div class="sepertor">
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="we-love about-us2">
                        <div class="col-lg-6">
                            <div class="inner">
                                <div class="icon-left">
                                    <i class="fa fa-building"></i>
                                </div>
                                <div class="blog-text">
                                    <h3 class="ellipsis" title="challenge.com">Register in Contrib</h3>
                                    <p>The fact that you're already viewing this page mean you would like to sponsor a challenge. Head on to <a href="https://www.contrib.com/signup/challenge/sponsor?domain=<?=ucwords($info['domain'])?>">Sponsor Registration</a> so you can start browsing and sponsoring the challenges 
									you feel are in sync with your goals. <br><br><br></p>
                                </div>
                                <div class="sepertor">
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="we-love about-us2">
                        <div class="col-lg-6">
                            <div class="inner">
                                <div class="icon-left">
                                    <i class="fa fa-hdd-o"></i>
                                </div>
                                <div class="blog-text">
                                    <h3 class="ellipsis" title="challenge.com">Browse Challenges</h3>
                                    <p>The next thing you really want to do is browse the latest challenges.</p>
                                </div>
                                <div class="sepertor">
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="we-love about-us2">
                        <div class="col-lg-6">
                            <div class="inner">
                                <div class="icon-left">
                                    <i class="fa fa-gift"></i>
                                </div>
                                <div class="blog-text">
                                    <h3 class="ellipsis" title="challenge.com">Click the Sponsor Link</h3>
                                    <p>Click the sponsor link and our admin will contact you personally to setup your sponsorship incentives.</p>
                                </div>
                                <div class="sepertor">
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h3>Sponsors</h3>
                    </div>
                     
                    <div class="col-lg-12">
                        <script src="https://tools.contrib.com/cwidget/sponsor?c=<?echo $info_attributes['featured_challenge']?>&f=1"></script>
                    </div>
                    <div class="col-lg-12 text-center">
				        <p>
				         <a target="_blank" class="btn btn-danger btn-lg" href="/home/howtosponsor">Sponsor a challenge today!</a>
				        </p>
                     </div> 
                </div>
            </div>
        </section>
		

<?	include('index_footer.php');?>

