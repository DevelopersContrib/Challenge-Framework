<!DOCTYPE html>
<html>
    <head>
        <title><? echo ucwords($info['domain']) ." - ". $info['title']?></title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="content-language" content="en-US">
		<meta name="title" content="<? echo $info['domain'] ." - ". $info['title']?>">
		<meta name="description" content="<?echo $info['description']?>">
		<meta name="keywords" content="<? echo $info['keywords'];?>">
		<meta name="author" content="<?php echo $info['domain']; ?>">
		<link rel="canonical" href="https://<?echo $info['domain'].$_SERVER['REQUEST_URI']?>" />
		<meta name="robots" content="INDEX,FOLLOW">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">		
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
        <link rel="stylesheet" href="/css/<?=$info_attributes['color']?>/main.css">
        <link rel="stylesheet" href="/css/<?=$info_attributes['color']?>/index.css">
		<link rel="stylesheet" href="/css/<?=$info_attributes['color']?>/dashboard-challenger.css">
		<link rel="stylesheet" href="/css/<?=$info_attributes['color']?>/pages.css">
		<link rel="stylesheet" href="/css/verticals.css">
		<link rel="stylesheet" href="/css/success.css">		
		<style>
		.media-body, .media-left, .media-right {
			display: table-cell;
			vertical-align: top;
		}
		.media-left, .media > .pull-left {
			padding-right: 10px;
		}
		.media-right, .media > .pull-right {
			padding-left: 10px;
		}
		.contrib-task-container .media-heading {
			margin: 10px;
		}
		.contrib-task-container .media-right .btn-danger {
			margin-top: 5px;
		}
		.chllnge-ftre-cont {
			overflow-y: scroll !important;
		}
		.wrap-sec {
			box-shadow: none !important;
		}
		.circle-icon {
			border: none;
			color: #096fa2;		
			background: #ece7e7;
		}
		.section-2, .wrap-ch-details {			
			font-family: 'Montserrat', sans-serif;
		}
		.section-2 h1, .wrap-ch-details h1 {			
			font-weight: 800;
		}
		.sponchallenge {			
			background: #none !important;
			border: none !important;
			padding: 0px !important;
			box-shadow: none !important;
		}
		.challengeBoxContent {
			background-color: white;
			box-shadow: 0 0 16px 1px rgba(0,0,0,.20);
			padding-top: 30px;
			padding-bottom: 15px;
		}
		.challengeBoxHeader {
			border: none;			
		}
		.alreadyIn {
			text-align: center;
			margin-top: -50px;
		}
		.verb h2 {			
			font-family: 'Montserrat', sans-serif;
			font-weight: 800;
		}
		.tabbable .main {
			box-shadow: none;
		}
		.vert-con {
			background: #f3f3f3;
		}
		.tabbable .nav-tabs > li > a {
			font-weight: 700;
		}
		.blog-text h3 {
			font-weight: 700;
		}
		.text-uppercase {
			text-transform: capitalize;
		}
		.ttle-ftre {
			color: #42
			font-family: arial !important;
		}
		</style>
		 <script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', '<?php echo $info['account_ga']?>', '<?php echo $domain?>');
			  ga('send', 'pageview');
		</script>
    
    <!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//www.stats.numberchallenge.com/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', <?=$info['piwik_id'] ?>]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//www.stats.numberchallenge.com/piwik.php?idsite=<?=$info['piwik_id'] ?>" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
		
		<!-- Go to www.addthis.com/dashboard to customize your tools -->
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52314a997bb36246"></script>
		
		
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	  </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
					<? if($info['logo'] == ''): ?>
					<? echo ucwords($info['domain'])?>
					<? else: ?>
                        <img class="logo-menu" src="<?=$info['logo']?>" alt="<?=ucwords($info['domain'])?>" title="<?=ucwords($info['domain'])?>" style="height:30px">
					<? endif;?>
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="https://www.contrib.com/marketplace/challenges" target="_blank"><i class="fa fa-hdd-o"></i> Browse Challenges
						</a></li>
                        <li><a href="/home/howtosponsor"><i class="fa fa-trophy"></i> Sponsor Challenges</a></li>
						<!-- <li><a href="/blog"><i class="fa fa-comments"></i> Blog</a></li> -->
						<li><a href="/home/apps"><i class="fa fa-rocket"></i> Apps</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="https://www.contrib.com/home/signin"><i class="fa fa-sign-in"></i> Login</a></li>
                        <li><a href="https://www.contrib.com/signup/firststep?domain=<?php echo $info['domain']?>"><i class="fa fa-pencil-square-o"></i> Register</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
<style>
<?php if (!empty($info_attributes['background_url'])):?>
.wrap-index2{
    background:url('<?php echo $info_attributes['background_url']?>') no-repeat fixed rgba(0,0,0,0);
	background-size: cover;
	position: relative;
}
<?php else:?>
.wrap-index2{
    background:url('https://cdn.vnoc.com/background/bg1-challenge.jpg') rgba(0,0,0,0) !important;
	background-size: cover !important;
	position: relative;
	background-repeat: no-repeat !important;
}
<?php endif?>
</style>        