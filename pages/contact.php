<?php
//include 'http://www.domaindirectory.com/includes/main_functions_test.php';
include ($_SERVER['DOCUMENT_ROOT']).'/includes/main_functions_test.php';
$dir2 = new DIR_LIB();

?>

<style type="text/css" media=screen>
<!--
/*CONTACT FORM*/

.form-box {
   
   font-size: 11px;
    margin-bottom: 15px;
    width:520px;
    margin-left:auto;margin-right:auto;
}
.form-content {
  
    width:480px;
	
}
.form-content .form-hold {
    float: left;
    margin-bottom:10px;
    width:480px;
}
.form-content .form-hold b {
    display: block;
    margin: 0 0 3px;
    padding: 5px 0 0;
}
.form-content .form-hold select.slc-1 {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #BAC2C7;
    color: #000000;
    font-size: 12px;
    height: 26px;
    margin-bottom: 5px;
    padding:3px 3px 3px 10px;
    width: 255px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
	margin-top:3px;
}
.form-content .form-hold .form-label {
    float: left;
    font-weight: bold;
    padding: 7px 0 0;
    width:180px;
}
.form-content .form-hold .form-label span {
    color: #E2001A;
}
.form-content .form-hold .form-input {
    float:left;
    width: 196px;
}
.form-content .form-hold .form-input input.in-1 {
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
.form-content .form-hold .form-label2 {
    float: left;
    font-weight: bold;
    padding: 7px 0 0;
    width: 180px;
	
}
.form-content .form-hold .form-label2 span {
    color: #E2001A;
}
.form-content .form-hold .form-input2 {
    float:left;
    width: 136px;
}
.form-content .form-hold .form-input2 input.in-2 {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #BAC2C7;
    color: #000000;
    font-size: 12px;
    height: 26px;
    padding: 0 10px;
    width:150px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
}


.form-content .form-hold .form-input span {
    float: right;
    padding: 5px 0 0;
    text-align: right;
}
.form-content .form-hold .form-input p {
    margin-bottom: 0 !important;
}
.form-content .form-hold textarea.text-a-1 {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #BAC2C7;
    color: #000000;
    font-size: 12px;
    height:150px;
    padding: 10px;
    width:456px;
}
#email {width:230px !important;}
#submit {height:40px !important;width:100px !important;} 
-->
</style>
<script type="text/javascript" src="/includes/contactus.js"></script>




<h2>Contact <?=$domain?></h2>
<div class="form-box">

	<div class="form-content">
            <form id="frmservice" action="">
    	<div class="form-hold">
        	<div class="form-label">NAME:</div>
            <div class="form-input"><input id="name" class="in-1" name="" type="text" value="" ></div>
        </div><!--form-hold-->

        <div class="form-hold">
        	<div class="form-label">EMAIL:</div>
            <div class="form-input"><input id="email" class="in-1" name="" type="text" value="" ></div>
        </div><!--form-hold-->
        <div class="form-hold">
        	<div class="form-label2">CONTACT NUMBER:</div>
            <div class="form-input2"><input id="contact" class="in-2" name="" type="text" value="" ></div>
        </div><!--form-hold-->

        <div class="form-hold">
        	<div class="form-label">Service </div>
           <div class="form-input">
                <?php echo $dir->getServiceType();?>
            <!--<select class="slc-1" id="service_">
                <option value="1">App Development</option>
                <option value="2">Business Management</option>
                <option value="3">Content Development</option>
                <option value="4">Conversion Rate Optimization</option>
                <option value="5">Custom WebSite Design and Development</option>
                <option value="6">Online PR</option>
                <option value="7">Online Reputation Management</option>
                <option value="8">Pay Per Click Marketing</option>
                <option value="9">Search Engine Optimization</option>
                <option value="10">Social Media Marketing</option>
                <option value="11">Web Management</option>
            </select>-->
            </div>
        </div><!--form-hold-->

        <div class="form-hold">
        	<b>INQUIRY MESSAGE </b>
            <textarea id="msg" name="" cols="" rows="" class="text-a-1"></textarea>
            <input id="domain" value="<?php echo $domain?>" type="hidden"/>
        </div><!--form-hold-->
        </form>
        <br class="clear" /><br class="clear" />
        <input id="submit" name="" class="f-right" type="image" src="http://domaindirectory.com/servicepage/images/submit-btn.png">
            <div id="response" >
				        <br class="clear" /><br class="clear" />
                <div id="res_msg"></div>
				<br class="clear" /><br class="clear" />
				<br class="clear" /><br class="clear" />
                <div id="share">
                    <h6>To share with your friends, click "Like" and "Tweet":</h6><br>
                    <a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                     <br class="clear" /><br class="clear" />
                    <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.domaindirectory.com%2Fservicepage%2F&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;font&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>
                </div>
                
            </div>

    </div><!--form-content-->


  
</div><!--form-box -->
