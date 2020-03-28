<html>
	<head>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
			$("input[name$='sponsorship']").click(function() {
					$('#def').css('display','none');
					var choice = $(this).val();
					if(choice == 1){
						$('#monetary').css('display','block');
						$('#type2').css('display','none');
					}
					else if(choice == 2){
						$('#monetary').css('display','none');
						$('#type2').css('display','block');
					}
				});
			});
			
			function SaveSponsorship(){
				var sponsorid = $("#sponsorid").val();
				var type = $("input[name$='sponsorship']").val();
				var message = $("#message").val();
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
	</head>
	<body>
	
		<div id="def" style="display:block;">
				<span class="default-text">Please choose sponsorship</span>
		</div><br>
		<div id="myRadioGroup" style="display:block">
			Monetary Sponsorship <input type="radio" name="sponsorship" value="1"  /><br>
			Another Sponsorship  <input type="radio" name="sponsorship" value="2" />
		</div><!-- myradioGroup --->
			<br>
			<div id="monetary" style="display:none;">
				<form onsubmit="return SaveSponsorship()" method="POST">
					Amount <input type="text" name="amount" id="amount" /><br>
					Message <textarea name="message" id="message" ></textarea><br>
					<input type="checkbox" name="sendback">Send me copy of this email</input>
					<input type="hidden" name="type" value="1"><br>
					<input type="hidden" name="sponsorid" id="sponsorid" value="1"> <!-- remove this! -->
					<input type="hidden" name="challengeid" value="120"> <!-- remove this! -->
					<button name="submit" value="Submit">Submit</button><br>
				</form>	
			</div>
			<div id="type2" style="display:none;">
				<form onsubmit="return SaveSponsorship()" method="POST">
					Message <textarea name="message" ></textarea><br>
						<input type="hidden" name="type" value="2"><br>
						<input type="checkbox" name="sendback">Send me copy of this email</input><br>
						<input type="hidden" name="sponsorid" id="sponsorid" value="1"> <!-- remove this! -->
						<input type="hidden" name="challengeid" id="challengeid" value="120"> <!-- remove this! -->
						<input type="hidden" name="amount" id="amount" value="120"> <!-- remove this! -->
					<button name="submit" value="Submit">Submit</button>
				</form>	
			</div>

	</body>
</html>