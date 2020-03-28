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
		background-color:#6DC378;
		padding:10px;
	
	}
	
.jcol {
		float:left;
		min-width:150px;
		text-align:left;
		padding:5px;
		
	}
	
	.jcol:first-child div
	{
		padding-left:2px;
		border-right:1px solid #CCC;
		
	}
	
	
	.jcol h1 {
		color:#39B54A;
	}
	
	.jcol h2, h3, h4,h5,  a {
		color:#2D9239;
		text-decoration:none;
	}
	
	.jcol-section  {
		font-size:12px;
		font-weight:bold;
		padding-top:10px;
		list-style:none;
		line-height:22px;
		padding-left:5px;
		padding-bottom:20px;
		
	}
	
	.jcol-section a {
		color:#333333;
		text-decoration:none;
	}
	
	.jcol-section a:hover {
		color:#2D9239;
		text-decoration:none;
	}
	
	.jcol-section-title {
		font-size:16px;
		font-weight:bold;
		color:#2D9239;
	    border-bottom:1px solid #2D9239;
	}
	
	
	.jcol p {
		font-size:12px;
	}
	
	
</style>
<script type="text/javascript" src="../includes/sponsor.js"></script>
<br />
	<table class="contact-hold">
	
	<?if($_SESSION['userid'] == ""){
		echo '<p class="p-title">Please login</p>';
	}else{?>
	
		<p class="p-title">My Sponsorships</p>
	<?
		$mylist = $dir->GetMySponsorship($_SESSION['userid']);
		if($mylist == 0){ echo "You have not sponsored a challenge yet.";
		}else{
			for($i=0; $i < sizeof($mylist) ; $i++ ){
				if($mylist[$i]['SponsorshipType'] == 1){ $amountstring = 'Amount: '.$mylist[$i]['Amount']; }
				else{ $amountstring = '';}
				
				 $html .= '<div>
					'.($i+1).'&nbsp;'.$dir->GetTableInfo('Challenges','ChallengeTitle','ChallengeId',$mylist[$i]['ChallengeId']).' '.$amountstring.'
				 <div><br>';
			}
				echo $html;
		}
		
	?>

<!-- p class="p-title">Search Current Challenges<p>
	<center>
                	<div style="padding-top:80px;"></div>
                        <div><img width="300" height="100" src="images/img_srch_challenge.png"</div>
                        
                        <input class="j-search-inp" type="text" />
                        <img src="/images/btn_search.png" style="vertical-align:middle;"/>
     
                        
                    	<div style="padding-bottom:50px; border:0px;"></div>
   				 <hr style="width:90%;"/>
  			  			
    </center>
	
<div class="jcol" style="width:70%;">	
	<div class="j-column" style="margin-top:-20px;border:0px;height:250px; -moz-column-width:300px; -webkit-column-width:300px;">
        		<div class="j-column-sec" style="margin-bottom:20px; border:0px;">
                <div style="float:left; border:0px;"><img src="images/dummy_ico_01.png" /></div>
                <div style="border:0px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et quam sit amet augue <a href="#">commodo</a></div>
                </div>
        
        
        		<div class="j-column-sec" style="margin-bottom:20px; border:0px;">
                <div style="float:left; border:0px;"><img src="images/dummy_ico_02.png" /></div>
                <div style="border:0px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et quam sit amet augue <a href="#">commodo</a></div>
                </div>
        
        		<div class="j-column-sec" style="margin-bottom:20px; border:0px;">
                <div style="float:left; border:0px;"><img src="images/dummy_ico_03.png" /></div>
                <div style="border:0px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer et quam sit amet augue <a href="#">commodo</a></div>
                </div>
</div><!-- jcol -->        
        
     <br class="clear" />    
  		
        
   </div><!-- j-column -->
	<br class="clear" />     
	
<p class="p-title">Communicate with admin for sponsorships</p>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
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
			});
			
			function SaveSponsorship(){
				var sponsorid = $("#sponsorid").val();
				var type = $("#hiddentype").val();
				if(type == 1){ var message = $("#message").val(); }
				else{var message = $("#message2").val();}
			
				var amount = $("#amount").val();
				var challengeid = $("#challengeid").val();
				
				$.post("savesponsorship.php",{sponsorid:sponsorid,type:type,message:message,amount:amount,challengeid:challengeid},function(data){
					$('#def').css('display','block');
					$('#def').html(data);
						$('#monetary').css('display','none');
						$('#type2').css('display','none');
						$('#myRadioGroup').css('display','none');
				});
				return false;
			}
			
		</script>
	
	
	
	
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
						<input type="checkbox" name="sendback">Send me copy of this email</input>
						<input type="hidden" name="sponsorid" id="sponsorid" value="1"> <!-- remove this! -->
						<input type="hidden" name="challengeid" value="120"> <!-- remove this! -->
						<button name="submit" value="Submit">Submit</button><br>
					</form>	
				</div>
				<div id="type2" style="display:none;">
					<form onsubmit="return SaveSponsorship();" method="POST">
						<label>Message </label> <br><textarea name="message2" id="message2" style="width:428px" ></textarea><br><br>
							<input type="checkbox" name="sendback">Send me copy of this email</input><br>
							<input type="hidden" name="sponsorid" id="sponsorid" value="1"> <!-- remove this! -->
							<input type="hidden" name="challengeid" id="challengeid" value="120"> <!-- remove this! -->
							<input type="hidden" name="amount" id="amount" value="120"> <!-- remove this! -->
						<button name="submit" value="Submit">Submit</button>
					</form>	
				</div>
				<input type="hidden" name="hiddentype" id="hiddentype" value="1">
			</div>
			
            
     </div>

		<?} /*else if loggedin*/?>
	</table>	
	<br class="clear" />
	<br><br>
<br class="clear" />    
<br class="clear" />    
<br class="clear" />