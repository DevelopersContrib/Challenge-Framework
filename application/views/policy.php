
<?include('header_index.php')?>


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
                                Privacy Policy
                            </li>
                        </ul>
                        <h1>Privacy Policy</h1>
                        <p>
                           This privacy policy sets out how <?=ucwords($info['domain'])?> uses and protects any information that you give <?=ucwords($info['domain'])?> when you use this website. <?=ucwords($info['domain'])?> is committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website, then you can be assured that it will only be used in accordance with this privacy statement. <?=ucwords($info['domain'])?> may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes. This policy is effective from 18th of January, 2012.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-content-pages">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                       <?php echo $content?>
                    </div>
                </div>
            </div>
        </section>



<?	include('index_footer.php');?>
