<?	include('header_index.php'); ?>
<div class="container">
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
					<h4>You are not done yet. You still need to continue your signup and be able to join challenges and win cash or equity ponts.</h4>
				</div>
				<div style="clear:both"><br></div>
				<div class="row">
				<div class="col-md-3 col-sign">
					<div class="steps"><span>1</span></div>
					<p class="step-head">Sign Up To Contrib</p>
					<a href="http://www.contrib.com/signup/challenge/challenger?domain=<?php echo $info['domain']?>&email=<?php echo $email?>" class="blinking"><i class="fa fa-pencil-square-o"></i></a>
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