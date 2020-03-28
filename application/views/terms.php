
<?include('header_index.php')?>


   <section class="wrap-sub-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-inline ul-pages-brdcrmbs">
                            <li>
                                <a href="<?=BASE_URL?>">Home</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                            </li>
                            <li class="active">
                                Term and Conditions
                            </li>
                        </ul>
                        <h1>Terms and Condition</h1>
                        <p>
                            Welcome to our online store! <?=ucwords($info['domain'])?> and its associates provide their services to you subject to the following conditions. If you visit or shop within this website, you accept these conditions. Please read them carefully.
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





<?include('index_footer.php')?>
