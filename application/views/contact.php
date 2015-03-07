<?	include('header_index.php'); ?>
     <section class="wrap-sub-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-inline ul-pages-brdcrmbs">
                            <li>
                                <a href="<?=$info['domain']?>">Home</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                            </li>
                            <li class="active">
                                Contact <?=ucwords($info['domain'])?>
                            </li>
                        </ul>
                        <h1>Contact <span class="domainName"><?=ucwords($info['domain'])?></span></h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-content-pages">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
						&nbsp;
					</div>
                    <div class="col-lg-4">
                        <iframe width="600" height="600" frameborder="0" src="http://domaindirectory.com/servicepage/contactus2_form.php?domain=<?=$info['domain']?>"></iframe>
                    </div>
					<div class="col-lg-4">
						&nbsp;
					</div>
                </div>
            </div>
        </section>





<?	include('index_footer.php');?>