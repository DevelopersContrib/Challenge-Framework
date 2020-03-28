<?
$def_id=0;
$ser_id=0;
?>

<style>
.contact-hold{font-size:12px;font-weight: bold;}
#submit {height:40px !important;width:100px !important;float:right} 
.contact-hold input.c-in {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #BAC2C7;
    color: #000000;
    font-size: 12px;
    height: 26px;
    padding: 0 10px;
    width: 230px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
}

.j-search-inp {
		-webkit-border-radius:8px;
		-moz-border-radius:8px;
		width:350px;
		border:1px solid #CCC;
		background-color:#F15421;
		padding:10px;
	
	}
	

	
	.j-col-addcss{
		margin-bottom:20px;float:left;width:45%;height:110px;margin:10px;
	}
	
	.j-col-addcss img {
		
		width:90%;
		height:60px;
	}
	
	
	.j-column-sec {
		border-left:0px !important;
		margin-bottom:20px;
	}
	
	
	.j-column-sec div {	
		border-left:0px #000;
	}
	
	
	.j-column-sec img {
	   padding:5px;   
	}
	
	table.myTable {
		font-family:Arial, Helvetica, sans-serif;
		font-size:12px;
		font-weight:normal; 	
		width:100%
	}
	tr.alt td {
		background-color: #F0F0F0;
	}
	.alt_odd {	
		background-color:#E2E2E2;
	}
	.td_spon{
		padding:10px; font-size:13px;
		color: black;
		text-shadow: 2px 2px 2px white;
	}
	
</style>
<script type="text/javascript" src="../includes/sponsor.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$(".myTable tr:even").addClass("alt");
				$(".myTable tr:odd").addClass("alt_odd");
	
				$("input[name$='sponsorship']").click(function() {
						$('#def').css('display','none');
						var choice = $(this).val();
						if(choice == 1){
							$('#monetary').css('display','block');
							$('#type2').css('display','none');
							$('#hiddentype').val(1);
						}
						else if(choice == 2){
							$('#monetary').css('display','none');
							$('#type2').css('display','block');
							$('#hiddentype').val(2);
						}
				});
				
				var def_id = $('#def_id').val();
				var domainUrl = $('#domainUrl').val();
				for(var x = 0; x<=def_id;x++){
					$('#default-'+x).click(function() {
						$('#loader').show();
						$('.j-column1').css('display','none');
						$('.j-column2').css('display','block');
						var div_id =$(this).attr('id');
						div_id = div_id.replace('default-','');
						var chall_id = $('#def_id-'+div_id).val();
						var url= domainUrl+'pages/post/search_prof.php';
				
						$.post(url, { id:chall_id }, function(data) {
							//alert(data);
							$('#loader').hide();
							
							var back = '<div style="width:100%"><a href="javascript:;" id="search_back1" onclick="searchBack()" style="float:right"><b>&laquo; BACK</b></a></div>'; 
							$('.j-column2').html(back+data);
							
						});
					});
				}
					
				$('#btn-search').click(function(){
						var str = $('#txt-search').val();
						var ser_id = 0;
						if(str!=''){
							$('#loader').show();
							$.ajax({
							  url: domainUrl+'pages/post/search_post.php',
							  data:{
									q:encodeURIComponent(str),
								},
								success: function(res){
									$('#loader').hide();
									
									var data = jQuery.parseJSON(res).result;
									$('.j-column2').html('');
									for(var x = 0; x<data.length;x++){
										$('.j-column2').append(
										'<div class="j-column-sec j-col-addcss" id="search-'+x+'">'+
										'<div style="float:left; border:0px;"><img src="'+data[x].Photo+'" /></div>'+
										'<br>'+data[x].ShortDesc+'... <a href="javascript:;"><b>more</b></a></div>'+
										'<input type="hidden" id="search_id-'+x+'" value="'+data[x].ChallengeId+'">'+
										'</div>');
										
										ser_id = x;
									}
									
									$('.j-column1').css('display','none');
									$('.j-column2').css('display','block');
									
									for(var y = 0; y<=ser_id;y++){
										$('#search-'+y).click(function() {
											$('#loader').show();
											var div_id2 =$(this).attr('id');
											div_id2 = div_id2.replace('search-','');
											var chall_id2 = $('#search_id-'+div_id2).val();
											var url2= domainUrl+'pages/post/search_prof.php';
											var alert = 'gosg';
											$.post(url2, { id:chall_id2 }, function(data) {
												//alert(data);
												$('#loader').hide();
												$('.j-column1').css('display','none');
												$('.j-column2').css('display','block');
												var back = '<a href="javascript:;" id="search_back" onclick="searchBack()" style="float:right"><b>&laquo; BACK</b></a>'; 
												$('.j-column2').html(back+data);
												
											});
										});
									}
									
									return;
								}
							});
							
						}
				});	
			});
			
			function searchBack(){
				$('.j-column1').css('display','block');
				$('.j-column2').css('display','none');
				$('.j-column2').html('');
				$('#sponsor-form').css('display','none');
				$('#form1-challengeid').val('');
				$('#form2-challengeid').val('');
			}
			
			function beAsponsor(id){
				$('#sponsor-form').css('display','block');
				$('#form1-challengeid').val(id);
				$('#form2-challengeid').val(id);
			}
			
			function SaveSponsorship(){
				var sponsorid = $("#sponsorid").val();
				var type = $("#hiddentype").val();
				if(type == 1){ var message = $("#message").val(); }
				else{var message = $("#message2").val();}
			
				var amount = $("#amount").val();
				var challengeid = $("#form1-challengeid").val();
				
				if(challengeid=="")
					challengeid = $("#form2-challengeid").val();
				
				var sendback1 = $('input:checkbox[name=sendback1]').is(':checked');
				var sendback2 = $('input:checkbox[name=sendback2]').is(':checked');
					var emailsponsor = 0;
						
						if(sendback1 == true){ emailsponsor = 1;}
						else if(sendback2 == true){ emailsponsor = 1; }
					
				$.post("savesponsorship.php",{sponsorid:sponsorid,type:type,message:message,amount:amount,challengeid:challengeid,emailsponsor:emailsponsor},function(data){
					alert(data);
					window.location="sponsor.html";
					/*$('#def').css('display','block');
					$('#def').html(data);
					$('#monetary').css('display','none');
					$('#type2').css('display','none');
					$('#myRadioGroup').css('display','none');*/
				});
				return false;
			}
			
		</script>

<br />

	<input type="hidden" id="domainUrl" value="<?=$domainUrl?>">
	
	<?if($_SESSION['userid'] == ""){
		echo '<p>Please login .. <a href="'.$domainUrl.'login.html">Click here</a></p>';
	}else if($_SESSION['usertype'] == "1"){
		echo '<p>You need to Register as a Company to Sponsor a Challenge...</p>';
	}else{?>
	
		<p class="p-title">My Sponsorships</p>
	<?
		$mylist = $dir->GetMySponsorship($_SESSION['userid']);
		if($mylist == 0){ 
			echo "You have not sponsored a challenge yet.";
		}else{
			$html = '
				<table border="0" width="400" cellpadding="0" cellspacing="0" class="myTable">
					  <tr>
						<th></th>
						<th></th>
						<th></th>
					  </tr>
				';
			for($i=0; $i < sizeof($mylist) ; $i++ ){
				if($mylist[$i]['SponsorshipType'] == 1){ $amountstring = 'Amount: '.$mylist[$i]['Amount']; }
				else{ $amountstring = '';}
				
				 $html .= '
					  <tr sty>
						<td class="td_spon"> ['.($i+1).']</td>
						<td class="td_spon"> '.$dir->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$mylist[$i]['ChallengeId']).'</td>
						<td class="td_spon"> '.$amountstring.'</td>
					  </tr>
				 ';
			}
			$html .= '</table>';
			echo $html;
		}
		
	?>


<!-- search challenge -->
		<center>
            <div style="padding-top:80px;"></div>
            <div><img src="images/image-search.png"></div>
                        
           <input id="txt-search" class="j-search-inp" type="text" style="-webkit-border-radius:8px;-moz-border-radius:8px;width:350px;border:1px solid #CCC;background-color:#F0F0F0;padding:10px;"/>
             <a id="btn-search" href="javascript:;" ><img src="images/btn_search.png" style="vertical-align:middle;"/> </a>
						
           
   			 <hr style="width:90%;"/>

			<img style="display:none;" id="loader" src="http://assets.tpshub.com/images/progress.gif" />
       </center>

	   
	   <div class="j-column j-column1" style="margin-top:-20px;border:0px;-moz-column-width:300px; -webkit-column-width:300px;display:block">
	 
			<?	$data = $dir->GetChallengesByStr('earth');
				for($x = 0; $x<sizeof($data);$x++){ ?>	
					<div class="j-column-sec j-col-addcss" id="default-<?=$x?>">
						<div style="float:left; border:0px;">
							<img src="<?=$data[$x]['Photo']?>" />
							<br><?=$data[$x]['ShortDesc']?>... &nbsp;<a href="javascript:;"><b>more</b></a>
						</div>
						<input type="hidden" id="def_id-<?=$x?>" value="<?=$data[$x]['ChallengeId']?>">
					</div>
			<?		$def_id=$x;
				}
			?>
	   </div><!-- j-column1 -->
	   
	   <div class="j-column j-column2" style="margin-top:-20px;border:0px;-moz-column-width:300px; -webkit-column-width:300px;display:none">

	   </div><!-- j-column2 -->
		<input type="hidden" id="def_id" value="<?=$def_id?>">
		<input type="hidden" id="ser_id" value="<?=$ser_id?>">

<!-- end of search challenge -->
 
  
	<br class="clear" />     
<div style="display:none" id="sponsor-form">	
<p class="p-title">Communicate with admin for sponsorships</p>
	<div style="border:1px solid #39B54A;padding:0px;padding-bottom:20px; width:85%;">
            <div style="background-color:#39B54A;padding:5px;margin-bottom:10px;color:#FFF;">Please choose sponsorship</div>
            <!-- div style="border:0px;">
                        	
            	<select>
				<option>Monetary Sponsorship</option>
                	<option>Another Sponsorship</option>            
            	</select>
            
            </div>
			
			
			<div id="def" style="display:block;">
				<span class="default-text">Please choose sponsorship</span>
		</div><br -->
		
		<div style="padding:10px 20px;">
			<div id="myRadioGroup" style="display:block">
			<label> Sponsorship: </label>
				<input type="radio" name="sponsorship" value="1"  /> Monetary Sponsorship <br>
				<input type="radio" name="sponsorship" value="2" /> Another Sponsorship  
			</div><!-- myradioGroup --->
				<br>
				<div id="monetary" style="display:none;">
					<form onsubmit="return SaveSponsorship();" method="POST">
						<label>Amount (in USD)</label><br><input type="text" name="amount" id="amount" /><br>
						<label> Message </label> <br><textarea name="message" id="message" style="width:428px" ></textarea><br>
						<input type="checkbox" name="sendback1" id="sendback1" value="1">Send me copy of this email</input><br>
						<input type="hidden" name="sponsorid" id="sponsorid" value="<?=$_SESSION['userid']?>"> <!-- remove this! -->
						<input type="hidden" name="challengeid" id="form1-challengeid" value=""> <!-- remove this! -->
						<button name="submit" value="Submit">Submit</button><br>
					</form>	
				</div>
				<div id="type2" style="display:none;">
					<form onsubmit="return SaveSponsorship();" method="POST">
						<label>Message </label> <br><textarea name="message2" id="message2" style="width:428px" ></textarea><br><br>
							<input type="checkbox" name="sendback2" id="sendback2" value="2">Send me copy of this email</input><br>
							<input type="hidden" name="sponsorid" id="sponsorid" value="<?=$_SESSION['userid']?>"> <!-- remove this! -->
							<input type="hidden" name="challengeid" id="form2-challengeid" value=""> <!-- remove this! -->
							<input type="hidden" name="amount" id="amount" value="0"> <!-- remove this! -->
						<button name="submit" value="Submit">Submit</button>
					</form>	
				</div>
				<input type="hidden" name="hiddentype" id="hiddentype" value="1">
		</div>
			
            
    </div>
</div>
		<?} /*else if loggedin*/?>
		
	<br class="clear" />
	<br><br>
<br class="clear" />    
<br class="clear" />    
<br class="clear" />
