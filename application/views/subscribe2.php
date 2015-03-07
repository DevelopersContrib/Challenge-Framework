<link rel="stylesheet" type="text/css" href="/js/jquery.fancybox-buttons.css?v=1.0.5" />
<link rel="stylesheet" type="text/css" href="/js/jquery.fancybox-thumbs.css?v=1.0.7" />
<link rel="stylesheet" type="text/css" href="/js/jquery.fancybox.css?v=2.1.5" media="screen" />
<style>
	.content {
		background: none repeat scroll 0 0 rgba(0, 0, 0, 0.8);
		color: #FFFFFF;
		padding: 25px 0 35px;
		position: relative;
		text-align: center;
		width: 100%;
	}
	
	.wrap-email-input {
		border-radius: 10px;
		/*box-shadow: 0 0 25px rgba(105, 105, 105, 0.27) inset;*/
		margin: auto;
		padding: 8px;
		width: 496px;
	}
	.email-glow {
		border-radius: 4px;
		
		margin-bottom: 0;
		padding: 0;
	}
	.email-glow input[type="text"], .email-glow input[type="password"] {
		height: 30px;
		width: 368px;
	}
	.btn-lg {
		font-size: 13.5px;
		height: 40px;
	}
	.img-domain {
		height: 90px;
	}
	.input-xlarge {
		width: 270px;
	}
	.content h2 {
		font-size: 22.5px !important;
	}
	.warningprompt{
		margin-bottom: 20px;
		color: orange;
	}
	#closep{
		text-align: right;
		font-weight: bold;
		margin-top: -15px;
		width: 98%;
		cursor:pointer;
	}
	#leadcontent{
		margin-bottom: 20px;
	}
</style>



<link href="/js/jquery.counter-analog.css" media="screen" rel="stylesheet" type="text/css" />
<link href="/js/jquery.counter-analog2.css" media="screen" rel="stylesheet" type="text/css" />


<a class="fancybox" style="position:fixed;top:100px" href="#inline1" title=""></a>
<div id="inline1" style="display: none;padding: 3px;width:750px">
	<div class="content">
		<div id="closep"> x </div>
		<? if($info['logo']!=''){ ?>
			 <a href="http://<?=ucwords($info['domain'])?>"><img class="img-domain" src="<?=$info['logo']?>" alt="<?=ucwords($info['domain'])?>" title="<?=ucwords($info['domain'])?>"/></a>					
		<? }else{ ?>
			<h1 style="padding-bottom:10px"><?=ucwords($info['domain'])?></h1>
		<? } ?>
		<h2>
				<? if($info['description']!=''){
					echo stripslashes(str_replace('\n','<br>',$info['description']));
				}else{
					echo 'Learn more about Joining our Partner Network.';
				} ?>
		</h2>
		
		
		
		<div class="row-fluid" id="leadcontent">
			<form class="form-inline" id="leadform" style="margin: 0;">
				
				<div class="wrap-email-input" id="frm-subscribe">
					<div class="input-append email-glow control-group success">							
						<input class="form-control" id="emails2" type="text" placeholder="email@yahoo.com" style="color: #575757;">
						<input type="hidden" id="refid" value="0">
						<input type="hidden" id="domain" value="<?php echo preg_replace("/www./","",$_SERVER['HTTP_HOST'])?>">
						<input type="hidden" id="user_ip" value="<?php echo $_SERVER['REMOTE_ADDR']?>">
						<button class="btn btn-success btn-lg" id="submitLead" type="button">Go!</button>							
					</div>
					
				</div>
				
				
			</form>	
		</div>
		<div class="row-fluid">
			<div id="social">
				<table style="border:0px;width: 350px;margin: 0 auto;">
				<tr>
					<td valign='top' style='width:15%;'>
						<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
						<script type="IN/Share" data-url="http://www.linked.com"></script>
					</td>
					<td valign='top' style='width:85%;'>

						<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
						<a class="addthis_button_preferred_1"></a>
						<a class="addthis_button_preferred_2"></a>
						<a class="addthis_button_preferred_3"></a>
						<a class="addthis_button_preferred_4"></a>
						<a class="addthis_button_compact"></a>
						<a class="addthis_counter addthis_bubble_style"></a>
						</div>
						<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
						<!-- AddThis Button END -->
					</td>    
				</tr>
				</table>
			</div>
		</div>
		
		
		 <center style="margin: 15px 30px 20px 30px;">
			<span class="counter counter-analog" data-direction="up" data-interval="1" data-format="9999999" data-stop="<?=$follow_count?>">
				<span class="part part0">
				<?
				$count = 7;
				$digits = strlen($follow_count);
				$splittedString = str_split($follow_count);
				for($i=$count; $i>0; $i--){
					if($i==$digits){
						for($j=0;$j<$digits;$j++){						
							echo '<span class="digit digit'.$splittedString[$j].'"></span>';
						}	
						break;					
					}else{
						echo '<span class="digit digit0"></span>';
					}
				}
				?>
				</span>	
			</span>
		</center>
		
		<p style="font-color:white"><i>We will never rent, sell or share your email to a third party.</i></p>
	</div>
</div>
	<script src="/js/jquery.counter.js" type="text/javascript"></script>
	

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="/js/jquery.fancybox.js?v=2.1.5"></script>
<!-- Add Button helper (this is optional) -->
<script type="text/javascript" src="/js/jquery.fancybox-buttons.js?v=1.0.5"></script>
<!-- Add Thumbnail helper (this is optional) -->
<script type="text/javascript" src="/js/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="/js/jquery.fancybox-media.js?v=1.0.6"></script>
<script src="/js/lead.js" type="text/javascript"></script>
