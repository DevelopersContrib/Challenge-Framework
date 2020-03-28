<?	include('header_index.php'); ?>
<section class="wrap-sub-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-inline ul-pages-brdcrmbs">
                            <li>
                                <a href="<?=$siteurl?>">Home</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                            </li>
                            <li class="active">
                                About
                            </li>
                        </ul>
                        <h1>About <span class="domainName"><?=ucwords($info['domain'])?></span></h1>
                        <h3>Create, Browse and Join <?=ucwords($info['domain'])?>.</h3>
                        <p>
                            <?=ucwords($info['domain'])?> is built on the crowdsource gamification mix which allows people to create challenges on <?=ucwords($info['domain'])?>, share <?=ucwords($info['domain'])?> challenges and crowd source those challenges to be able to gain rewards.
                        </p>
                        <p>
                            <a href="http://www.contrib.com/marketplace/challenges" class="btn btn-danger">Find Challenges</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-content-pages">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="content-h3">Why <?=ucwords($info['domain'])?></h2>
                        <ul class="list-unstyled ul-why">
                            <li>
                                <div class="head-sub">
                                    <h4><i class="fa fa-check"></i> Challenge and Gamification Platform</h4>
                                </div>
                                <p class="desc">Our <?=ucwords($info['domain'])?> using Contrib.com's Challenge and gamification platform is easy to navigate and is updated with the latest challenges from related Challenge Sites.</p>
                            </li>
                            <li>
                                <div class="head-sub">
                                    <h4><i class="fa fa-check"></i> Strong Niche Community</h4>
                                </div>
                                <p class="desc">With many viral challenges, we pride ourselves on having a wide variety of niche based communities - developers, designers, idea makers, builders, engineers all solving problems and creating solutions for anyone who needs it.</p>
                            </li>
                            <li>
                                <div class="head-sub">
                                    <h4><i class="fa fa-check"></i> Powered by <a href="">Contrib</a></h4>
                                </div>
                                <p class="desc"><?=ucwords($info['domain'])?> is a venture of GlobalVentures.com and built using Contrib.com Challenge platform.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <!-- <img class="img-responsive" title="challenge about" alt="challenges" src="http://mychallenge.com/images/desc_mychallenge_about.png"> -->
                    </div>
                    <div class="col-lg-12">
                        <div class="divider-wrap"></div>
                    </div>
                    <div class="col-lg-12">
                        <h2 class="content-h3 text-center" title="challenge.com">How it works</h2>
                    </div>
                    <div class="we-love about-us2">
                        <div class="col-lg-6">
                            <div class="inner">
                                <div class="icon-left">
                                    <i class="fa fa-hdd-o"></i>
                                </div>
                                <div class="blog-text">
                                    <h3 class="ellipsis" title="challenge.com">Browse Challenges on <?=ucwords($info['domain'])?></h3>
                                    <p>Browse challenges by going to our <a href="http://www.contrib.com/marketplace/challenges">Public Challenges directory</a> and find one or two that interests you.</p>
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
                                    <i class="fa fa-cubes"></i>
                                </div>
                                <div class="blog-text">
                                    <h3>Join Challenges</h3>
                                    <p><a href="http://www.contrib.com">Join the challenge community</a> and start solving problems that the Why <?=ucwords($info['domain'])?> community needs.</p>
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
                                    <i class="fa fa-trophy"></i>
                                </div>
                                <div class="blog-text">
                                    <h3>Sponsor Challenges</h3>
                                    <p>If you would like to advertise or get more pageviews to your company or you just want to simply want to solve a specific problem, sponsorship is easy.</p>
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
                                    <i class="fa fa-sign-in"></i>
                                </div>
                                <br>
                                <div class="blog-text">
                                    <h3>Register for free or Login</h3>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p>
                                                <a href="http://referrals.contrib.com/idevaffiliate.php?id=15959&url=http://www.contrib.com/signup/firststep?domain=<?php echo $info['domain']?>" class="btn btn-primary btn-block">Sign Up</a>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>
                                                <a href="http://www.contrib.com/home/signin" class="btn btn-warning btn-block">Login</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="sepertor">
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?	include('index_footer.php');?>