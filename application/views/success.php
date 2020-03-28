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
	<link rel="canonical" href="http://<?echo $info['domain'].$_SERVER['REQUEST_URI']?>" />
	<meta name="robots" content="INDEX,FOLLOW">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">		
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<link rel="stylesheet" href="/css/<?=$info_attributes['color']?>/main.css">
	<link rel="stylesheet" href="/css/<?=$info_attributes['color']?>/index.css">
	<link rel="stylesheet" href="/css/<?=$info_attributes['color']?>/dashboard-challenger.css">
	<link rel="stylesheet" href="/css/<?=$info_attributes['color']?>/pages.css">
	<link rel="stylesheet" href="/css/verticals.css">
	<link rel="stylesheet" href="/css/success.css">
	<style>
	.success-page-container {
		padding: 60px 0px 150px;
	}
	.spc-intro {
		font-size: 1.85rem;
		font-weight: 600;
	}
	.spc-domain {
		text-transform: capitalize;
		color: #a6b008;
	}
	.list-inline {
		display: inline-flex;
	}
	.list-inline li {
		padding-right: 8px;
	}
	.stack-pile {
		position: relative;
		display: block;  
		text-align: center;  
		margin: 0 auto 5px;
		border-radius: 15px;
		color: #ffffff;
		font-weight: 600;
		font-size: 1.32rem;
		border-bottom: 5px solid #ead6d6;
		background: #595a59;
		width: 325px;
	}
	.sp1 {		
		height: 85px;
		line-height: 85px;
		margin-bottom: 10px;
	}	
	.sp2 {
		height: 80px;
		line-height: 80px;
	}		
	.sp2:hover {
		background: #333333;
		text-decoration: none;
		color: #ffffff;
	}
	.sp3 {
		height: 80px;
		line-height: 80px;
	}	
	.sp4 {
		height: 80px;
		line-height: 80px;
	}
	.stack-pile .fa {
		font-size: 3rem;
		vertical-align: -7px;
		padding-right: 6px;
	}	
	.stack-signup:hover {
		text-decoration: none;
		background: #CF2B2B;
		color: #ffffff;
	}
	.ribbon {    
		margin: 1em auto .5em;
	}	
	
	.pulse-btn {
		text-align: center;
	}
	.pulse-btn .btn {
		font-weight: 600;
		font-size: 1.32rem;
		padding: 1em 1.5em;
		animation: pulse 1.5s cubic-bezier(0.66, 0.67, 0.83, 0.99) infinite;
		height: 80px;
		line-height: 80px;
		padding: 0 40px;
		margin-bottom: 20px;
		border-radius: 15px;
		background: #c82333;
		border-bottom: 5px solid #ead6d6;
	}
	.pulse-btn .btn:hover {
		background: #980715;
		animation: none;
	}
	.pulse-btn .fa {
		font-size: 3rem;
		vertical-align: -7px;
		padding-right: 6px;
	}
	@keyframes pulse {
		0% {
			outline: 1px solid #C82333;
			outline-offset: 0px;
		}
		30% {
			outline: 1px solid rgba(48, 113, 169, 0.7);
			outline-offset: 10px;
		}
		60% {
			outline: 1px solid rgba(48, 113, 169, 0);
			outline-offset: 20px;
		}
		100% {
			outline: 1px solid rgba(48, 113, 169, 0);
			outline-offset: 60px;
		}
	}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="/">
		<? if($info['logo'] == ''): ?>
		<? echo ucwords($info['domain'])?>
		<? else: ?>
			<img class="logo-menu" src="<?=$info['logo']?>" alt="<?=ucwords($info['domain'])?>" title="<?=ucwords($info['domain'])?>" style="height:30px">
		<? endif;?>
		</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<div class="mr-auto"></div>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="https://www.contrib.com/home/signin" class="nav-link"><i class="fa fa-sign-in"></i> Login</a>
				</li>
				<li class="nav-item">
					<a href="https://referrals.contrib.com/idevaffiliate.php?id=15959&url=http://www.contrib.com/signup/firststep?domain=<?php echo $info['domain']?>" class="nav-link"><i class="fa fa-pencil-square-o"></i> Register</a>
				</li>
			</ul>
		  </div>
	</div>
</nav>
<div class="container" style="display:none;">
	<div class="row">
		<div class="col-md-12">
			<div class="success-page">
				<div class="sp-top">
					<h3>Thank you for signing up on <?php echo $info['domain']?> which is a part of our Challenge Ventures!</h3>
					<h1 class="ribbon">
					   <strong class="ribbon-content">You are #<?php echo number_format($follow_count)?> Challenger</strong>
					</h1>
					<div id="socials_container" style="text-align:center;margin-bottom:10px">&nbsp;</div>
				</div>
				<div style="clear:both"><br></div>
				<div class="sp-bottom">
					<h4>You are not done yet. You still need to continue your signup <br>and be able to join challenges and win cash or equity ponts.</h4>
				</div>
				<div style="clear:both"><br></div>
				<div class="row">
				<div class="col-md-3 col-sign">
					<div class="steps"><span>1</span></div>
					<p class="step-head">Sign Up To Contrib</p>
					<a href="http://www.contrib.com/signup/challengenew/challenger?domain=<?php echo $info['domain']?>&email=<?php echo $email?>" class="blinking"><i class="fa fa-pencil-square-o"></i></a>
					<p style="clear:both"></p>
				</div>
				<div class="col-md-3">
					<div class="steps"><span>2</span></div>
					<p class="step-head">Join A Challenge</p>
					<i class="fa fa-star"></i>
					<p style="clear:both"></p>
				</div>
				<div class="col-md-3">
					<div class="steps"><span>3</span></div>
					<p class="step-head">Submit An Entry</p>
					<i class="fa fa-file-text"></i>
					<p style="clear:both"></p>
				</div>
				<div class="col-md-3">
					<div class="steps"><span>4</span></div>
					<p class="step-head">Win Exciting Prizes</p>
					<i class="fa fa-trophy"></i>
					<p style="clear:both"></p>
				</div>
			</div>
			</div>			
		</div>
	</div>
</div>


<!-- Stack Design -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="success-page-container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h3 class="spc-intro">Thank you for signing up on <b class="spc-domain"><?php echo $info['domain']?></b> <br>which is a part of our Challenge Ventures!</h3>
						<h1 class="ribbon">
						   <strong class="ribbon-content">You are #<?php echo number_format($follow_count)?> Challenger</strong>
						</h1>
						<div class="text-center" id="socials_container">&nbsp;</div>
					</div>
					<div class="col-md-12 text-center">
						<h5>You are not done yet. You still need to continue your signup <br>and be able to join challenges and win cash or equity ponts.</h5>
					</div>					
				</div>
				<div class="row justify-content-center">
					<div class="col-md-8 text-center pt-4">	
						
						<div class="piler">
							<div class="pulse-btn">
								<a href="http://www.contrib.com/signup/challengenew/challenger?domain=<?php echo $info['domain']?>&email=<?php echo $email?>" class="btn btn-danger">
								<i class="fa fa-pencil-square-o"></i>
								Sign Up To Contrib</a>
							</div>			
							<a class="stack-pile sp2" href="http://www.contrib.com/signup/challengenew/challenger?domain=<?php echo $info['domain']?>&email=<?php echo $email?>">								
								<i class="fa fa-star"></i>
								<span>Join A Challenge</span>
							</a>
							<div class="stack-pile sp3">
								<i class="fa fa-file-text"></i>
								<span>Submit An Entry</span>
							</div>
							<div class="stack-pile sp4">
								<i class="fa fa-trophy"></i>
								<span>Win Exciting Prizes</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- -->

<script>
$(function() {
var domain_name = '<?php echo $info['domain']?>';	
			getsocial(domain_name,'fb','http://d2qcctj8epnr7y.cloudfront.net/sheina/contrib/social_icons/1396251686_facebook_circle_color.png');
			getsocial(domain_name,'twitter','http://d2qcctj8epnr7y.cloudfront.net/sheina/contrib/social_icons/1396251704_twitter_circle_color.png');
			getsocial(domain_name,'gplus','http://d2qcctj8epnr7y.cloudfront.net/sheina/contrib/social_icons/gplus.png');
			getsocial(domain_name,'linkedin','http://d2qcctj8epnr7y.cloudfront.net/sheina/contrib/social_icons/linkedin.png');	
});
function getsocial(domain_name,social,icon_src){	
			$.getJSON('http://manage.vnoc.com/socialmedia/getDomainSocialsAPI/'+domain_name+'/'+social,function(data){
							var socialdata = data[0];
							if(socialdata.error == true){
								//do nothing
							}else if(socialdata.profile_url == ""){
								//do nothing
									getsocial('ichallenge.com',social,icon_src);
							}else if(socialdata.profile_url == "null" || socialdata.profile_url == null){
								//do nothing
							}else{
								$('#socials_container').append('&nbsp;<a href="'+socialdata.profile_url+'"><img src="'+icon_src+'" height="40px"></a>&nbsp;');
							}		
			});
		}
</script>
<?	include('index_footer.php');?>