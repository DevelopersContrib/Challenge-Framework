<style>
@media (max-width: 1366px) {
        .wrap-header-text-index2 {
            padding: 150px 0 30px !important;
        }
}
@media (max-width: 1199.98px) {
        .wrap-header-text-index2 {
            padding: 150px 0 30px !important;
        }
}
.imc .col-lg-12 {
        background: #ffffff;
}
.wrap-sec {   
    margin-top: 0px;
}
.wrap-ch-details {
    padding: 0px 0px 20px;
    border: none;
}
.wrap-ch-details.ch-d-2 {
    background: none;
}
</style>
<script type="text/javascript" src="https://tools.contrib.com/cwidget/roundbadge?d=<?=$info['domain']?>"></script>
<div class="wrap-index2">
			<div class="bg-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="wrap-header-text-index2">
                            <p class="text-center">
								<? if($info['logo']!=''){ ?>
									 <h1 class="text-center"> <a href="https://<?=$info['domain']?>"><img alt="<?=ucwords($info['domain'])?> " title="<?=ucwords($info['domain'])?>" class="img-responsive img-index-2" src="<?=$info['logo']?>"></a></h1>
								<? }else{ ?>
									<h1 class="h1-index2 text-center" style="color: #5af582;"><?=ucwords($info['domain'])?></h1>
								<? } ?>
                            </p>
                            <h2 class="h2-desc text-center">
								<? if($info['description']!=''){
										echo stripslashes(str_replace('\n','<br>',$info['description']));
									}else{
										echo 'Learn more about Joining our Partner Network.';
								} ?>
                            </h2>
                        </div>
						<div id="socials_container" style="text-align:center;margin-bottom:10px">&nbsp;</div>
                        <!-- -->
                    </div>
                </div>
            </div>
        </div>
        <?  if ($featured_id != '0'):?>

        	<section class="section-2 imc" style="background: #ffffff; margin-top: -285px;">
        		<div class="container">
        			<?  include('index_main_content.php');?>
        		</div>
        	</section>

        	<?	
        	include('index_featured_details.php');
        	?>

        <?endif?>

        <div class="section-half-1 bjw-con" id="challengejoin">
            <div class="container">
                <div class="row text-center">
					<div class="col-lg-12 sh-intro">
						<h3>Join Now And Play Some Amazing Challenges</h3>
					</div>
					<div class="leadform-container col-lg-6 col-lg-offset-3" id="leadcontent">
						<form id="leadform">
							<div class="input-group">
								<input type="text" class="form-control input-lg" id="email" name="email" placeholder="Enter your email address">
								<input type="text" class="form-control input-lg" id="secret" name="secret" value="" style="display:none;">
								<input type="hidden" id="refid" value="0">
								<input type="hidden" id="domain" value="<?php echo preg_replace("/www./","",$_SERVER['HTTP_HOST'])?>">
								<input type="hidden" id="user_ip" value="<?php echo $_SERVER['REMOTE_ADDR']?>">
								<span class="input-group-btn">
									<button class="btn btn-danger btn-lg email-ftre inputBgCstm" id="submitLead">
										<i class="fa fa-edit"></i>
										Join Us
									</button>
								</span>
							</div><!-- /input-group -->
						</form>						
					</div>
					<div class="col-lg-4">
						<div class="aMoreInfo" href="">
							<span>
								<i class="fa fa-search"></i><br>
								Browse <?=ucwords($info['domain'])?> 
							</span>
							<p>
								Check out our newest challenges today.
							</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="aMoreInfo" href="">
							<span>
								<i class="fa fa-thumbs-o-up"></i><br>
								Join Challenges
							</span>
							<p>
								Are you the type a challenge wrangler? Come and Join us at <?=ucwords($info['domain'])?>. It'll be fun.
							</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="aMoreInfo" href="">
							<span>
								<i class="fa fa-gift"></i><br>
								Win Prizes and Equity Points 
							</span>
							<p>
								Great Free Prizes or <?=ucwords($info['domain'])?> Equity awaits our challenge winners.
							</p>
						</div>
					</div>
                </div>
            </div>
        </div>
<!--   -->
<script>
$(function() {
var domain_name = $('#domain').val();

			getsocial(domain_name,'fb','https://cdn.vnoc.com/icons/facebook.png');
			getsocial(domain_name,'twitter','https://cdn.vnoc.com/icons/twitter.png');
			/* getsocial(domain_name,'gplus','https://d2qcctj8epnr7y.cloudfront.net/sheina/contrib/social_icons/gplus.png'); */
			getsocial(domain_name,'linkedin','https://cdn.vnoc.com/icons/linkedin(1).png');
			
});
function getsocial(domain_name,social,icon_src){
	
			$.getJSON('https://manage.vnoc.com/socialmedia/getDomainSocialsAPI/'+domain_name+'/'+social,function(data){
							var socialdata = data[0];
							if(socialdata.error == true){
								//do nothing
							}else if(socialdata.profile_url == ""){
								//do nothing
									getsocial('ichallenge.com',social,icon_src);
							}else if(socialdata.profile_url == "null" || socialdata.profile_url == null){
								//do nothing
							}else{
								$('#socials_container').append('&nbsp;<a href="'+socialdata.profile_url+'"><img src="'+icon_src+'" alt="'+social+'" title="'+social+'" height="40px"></a>&nbsp;');
								if (socialdata.request_social=='twitter'){
									 $('a.twitter').attr('href',socialdata.profile_url);
								}else if (socialdata.request_social=='fb'){
									 $('a.facebook').attr('href',socialdata.profile_url);
								}else if (socialdata.request_social=='linkedin'){
									 $('a.linkedin').attr('href',socialdata.profile_url);
								}
							}		
			});
		}






		
</script>
