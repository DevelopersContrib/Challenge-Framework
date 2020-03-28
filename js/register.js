		function RegisterCheck(){
		
			var username = $('#username').val();
			var password = $('#password').val();
			var password2 = $('#password2').val();
			var email = $('#email').val();
			var country = $('#country').val();
			var domain = $('#domain').val();
			var usertype= $('#usertype').val();
			var domainUrl= $('#domainUrl').val();
			var emailfilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			var usernamefilter = "_!@#$%^&*()+=-[]\\\';,./{}|\":<>? ";
			
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
			else if(password2==""){
				$('#log-loading').css('display','none');
				$('.form-warning').html('* Please confirm your password *');
				return false;
			}
			else if(password!=password2){
				$('#log-loading').css('display','none');
				$('.form-warning').html('* Password did not match *');
				return false;
			}
			else if(email==""){
				$('#log-loading').css('display','none');
				$('.form-warning').html('* Please provide an email *');
				return false;
			}
			else if(!emailfilter.test(email)){
				$('#log-loading').css('display','none');
				$('.form-warning').html('* Contains invalid email address *');
				return false;
			}
			else if(country==""){
				$('#log-loading').css('display','none');
				$('.form-warning').html('* Please select a country *');
				return false;
			}
			else{
				var flag=0;
				for (var i = 0; i < username.length; i++) {
					if (usernamefilter.indexOf(username.charAt(i)) != -1) {
							flag = 1; break;
					}
				}
				if(flag==1){
					$('#log-loading').css('display','none');
					$('.form-warning').html('* Username contains invalid characters*');
					return false;
				}else{
					$.post("registercheck.php",{username:username,password:password,email:email,country:country,usertype:usertype},function(data){
						$('#log-loading').css('display','none');
						//$('.form-warning').html(data);
						
						//alert(data);
						if(data=='4'){
							$('.form-warning').html('* Username already taken *');
						}
						else if(data=='3'){
							$('.form-warning').html('* Another member is already using that email *');
						}
						else if(data=='2'){	
							$('.form-warning').html('* Error, something went wrong. *');
						}
						else if(data=='1'){
							//alert(domainUrl);
							window.location.href=domainUrl+"home.html";
						}
						
					});
				}
				
				return false;
			}
			
		}
		

		