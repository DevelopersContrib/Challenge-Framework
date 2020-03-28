		function LoginCheck(){
		
			var username = $('#username').val();
			var password = $('#password').val();
			var domainUrl = $('#domainUrl').val();
			
			$('.form-warning').html('');
			$('#log-loading').css('display','block');
			
			if(username==""){
				$('#log-loading').css('display','none');
				$('.form-warning').html('* Please provide a username *');
				return false;
			}
			else if(password==""){
				$('#log-loading').css('display','none');
				$('.form-warning').html('* Please provide a password *');
				return false;
			}
			else{
				$.post("logincheck.php",{username:username,password:password},function(data){
					//	$('.form-warning').html(data);
					if(data=='0'){
						$('.form-warning').html('* Login incorrect! *');
					}				
					else
						window.location.href=domainUrl+"home.html";
				})
				.complete(function() { $('#log-loading').css('display','none'); });
				return false;
			}
			
		}