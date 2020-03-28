<?php
//include 'http://www.domaindirectory.com/includes/main_functions_test.php';
include 'includes/config.php';
include 'includes/main_functions_test.php';
$dir = new DIR_LIB();

?>
<? include_once 'header.php'; ?>



<div id="container2">
<div id="middlebox">
<div id="content2"> 
	<!-- this is where the magic happens;page transitions and such -->
	<div id="actionbox">
	

		<div class="pages" id="pagestart">

			<div id="emailbox">
			<p id="invitelist"><em> Enter your email to join our Exclusive Invite List</em></p>

                        <form id="signupform" action="">
					<input type="text" id="email" value="your@email.com">
					<input type="hidden" id="refid" value="0">
                                        <input type="hidden" id="domain" value="<?php echo $domain?>">
					<!-- <input type="submit"> -->
				</form>
                        <input type="image" style="vertical-align: middle;" name="submit" id="submit" src="images/Submit-Button.png">
                        
<div class="clear"></div>

	<div id="information" style="text-align:left !important;">

</div>


<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
	/*var initialText = "your@email.com";
        $('#email').focus(function(){
          if( $(this).val()==initialText){
            $(this).val("").removeClass("initial");
          }
        });
        $('#email').blur(function(){
          if($(this).val()==""){
            $(this).val(initialText).addClass("initial");
          }
        });

        $('#submit').hover(
            function(){ // Change the input image's source when we "roll on"
                $(this).attr({ src : '/images/Submit-Button_Hover.png'});
            },
            function(){ // Change the input image's source back to the default on "roll off"
                $(this).attr({ src : '/images/Submit-Button.png'});             }
        );
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                if (cookie.substring(0, 11) == 'user_email=') {
                    cookieValue = decodeURIComponent(cookie.substring(11));
                    postData(cookieValue);
		    break;
                }
            }
        }
        */
       $('#pagesubmit').hide();
       $('#pagesubmit').removeClass('hidden');
       $('#submit').click(function(){
                       
           var email = $('#email').val();
           if(email==''){
                alert('Email is Required.');
                $('#email').focus();
                return false;
            }else if(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i.test(email)==false){
                alert('Please enter a valid email address.');
                $('#email').focus();
                return false;
            }
            var domain = $('#domain').val();
            jQuery.ajax({
                type: "post",url: "leads_post.php",
                data: {'email':email, 'domain':domain},
                success: function(html){
                    $("#emailbox").slideUp('slow');
                    $("#pagesubmit").slideDown('normal');
                    $('#response').append(html);
                    
                }});


       });
		var domain = $('#domain').val();
        jQuery.ajax({
                type: "post",url: "leads_post.php",
                data: {'count':1,'domain':domain},
                success: function(total){
                    var x =1;
					var y = total*25;
					var z = y/50;
					if(y<1000) $('#stats').hide();
					else $('#stats').show();
					
                    var intervalid = setInterval(function(){
                        //x++;
						x = parseInt(x + z);
                        if(x>=total*25){
                            clearInterval(intervalid);
							$("#stats").html(y+' sign ups and counting');
							return;
                        }
                        $("#stats").html(x+' sign ups and counting');
                        
                    },5);
                   
                }});
    });
    /*
function postData(emailVal) {
	$.post('postemail.php', {email: emailVal, referralid: $("#refid").val()},
		function(data){
			$("#shareurl").val(data.reflink).show();
			$("#twitter").html("<a href=\"http://twitter.com/share\" class=\"twitter-share-button\" data-url=\""+data.reflink+"\" data-text=\"I'm one of the first in line to build a viral &ldquo;Launching Soon&rdquo; page with #LaunchRock. Join me #launch\" data-count=\"none\" data-via=\"getlaunchrock\">Tweet</a>").show();
			$.getScript('http://platform.twitter.com/widgets.js',function(){
				return true;
			});
			
                        $("#facebook").html('<iframe src="http://www.facebook.com/plugins/like.php?href=' + escape(data.reflink) + '&amp;layout=button_count&amp;show_faces=false&amp;width=450&amp;action=recommend&amp;font=lucida+grande&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:110px; height:21px;" allowTransparency="true"></iframe>').show();
    
			
			$("#emailbox").slideUp();
			$("#pagesubmit").slideDown();
			if (data.newuser) {
				$("#header_text").html('Thanks! Want to get an early invitation?');
				$("#paragraph_text").html('Invite at least 3 friends using the link below. The more friends you invite, the sooner you&#146;ll get access!');
			} else {
				$("#header_text").html('Welcome back!');
				$("#paragraph_text").html('<b>Your live stats: ' + data.clicks + ' clicks, ' + data.signups + ' sign ups</b><br /><br />The more friends you invite, the sooner you&#146;ll get access!');
			}
			var d = new Date();
			d.setFullYear(d.getFullYear() + 1);
			document.cookie = 'user_email=' + escape(data.email) + '; expires=' + d.toUTCString() + '; path=/; domain=.launchrock.com;';
              	}, "json");
}
$('form').submit(function(){

$(".error").hide();
        var hasError = false;
        var emailReg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 
        var emailaddressVal = $("#email").val();
        if(emailaddressVal == '') {
            $("#information").after('<span class="error">Please enter your email address.</span>');
            hasError = true;
        }
 
        else if(!emailReg.test(emailaddressVal) || emailaddressVal == 'your@email.com') {
            $("#information").after('<span class="error">Enter a valid email address.</span>');
            hasError = true;
        }
 
        if (!hasError) {
		postData($('#email').val());
	}
	return false;
});*/
</script>

			</div>
      <div id="social">
			<table style="border:0px;width:100%;">
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
<script type="text/javascript">var addthis_config = {"data_track_clickback":true,"data_track_addressbar":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=mypagenetwork"></script>
<!-- AddThis Button END -->
			</td>
      
      
      </tr></table>
      </div>
		<div class="pages hidden" id="pagesubmit">
                    <div id="response"></div>
			<div id="description">
			<h3 id="header_text"></h3>
			<p id="paragraph_text"></p>
			<p>To share with your friends, click &ldquo;Share&rdquo; and &ldquo;Tweet&rdquo;:</p>
<a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<br><br>
        <p> <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.socialholdings.com%2F&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;font&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>
</p>
	<div id="sharebuttons"><span id="facebook" style="margin:0 0 10px 60px"></span>
            <span id="twitter"></span></div>
			</div>
<!--<p class="clear" style="text-align: left;">Or copy and paste the following link to share wherever you want!</p>
			<input id="shareurl" type="text" value="" />
    -->
 <!-- <a class="cs_import">Email To Friends</a>-->

		</div>

		<!--<p id="learnmore"><a href="http://blog.launchrock.com" target="_new">our blog</a></p>
	<p style="text-align:left;margin-top:-10px"><a href="http://launchrock.com/login/">Login</a></p>-->
                </div>


</div>


<!-- /content -->
</div>
 <div id="stats" style="display:none;">0 sign ups and counting</div>
<!-- /middlebox -->
</div>
</div>


<? include_once 'footer.php';?>