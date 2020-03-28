<?php
include('header-new-v2.php');
	if(isset($_SESSION['userid'])){ ?>
	<script>window.location="/home.html";</script>	
	<? 
	}

?>
<div class="jwidth">
<center>
<div class="jcenter_hdr">
<div style="float:left; width:60%; height:100%;color:#FFF; text-align:left;">
	<div style="width:90%;margin-left:15px; height:310px; display:table-cell; vertical-align:middle;">
	<h1><?=$small_description?></h1>
	</div>
</div>
<div style="float:left; width:40%;"><img src="<?=$desc_graphic?>" style="height:280px;"></div>
</div>
</center>
 <div class="clear"></div>  
</div>
<div class="jcenter">
	<div class="jcenter_cont">
	<div class="slide-container">
	<style>
	/* #Tabs (activate in tabs.js)
================================================== */
	ul.tabs {
		display: block;
		margin: 0 0 20px 0;
		padding: 0;
		border-bottom: solid 1px #ddd; }
	ul.tabs li {
		display: block;
		width: auto;
		height: 30px;
		padding: 0;
		float: left;
		margin-bottom: 0; }
	ul.tabs li a {
		display: block;
		text-decoration: none;
		width: auto;
		height: 29px;
		padding: 0px 20px;
		line-height: 30px;
		border: solid 1px #ddd;
		border-width: 1px 1px 0 0;
		margin: 0;
		background: #f5f5f5;
		font-size: 13px; }
	ul.tabs li a.active {
		background: #fff;
		height: 30px;
		position: relative;
		top: -4px;
		padding-top: 4px;
		border-left-width: 1px;
		margin: 0 0 0 -1px;
		color: #111;
		-moz-border-radius-topleft: 2px;
		-webkit-border-top-left-radius: 2px;
		border-top-left-radius: 2px;
		-moz-border-radius-topright: 2px;
		-webkit-border-top-right-radius: 2px;
		border-top-right-radius: 2px; }
	ul.tabs li:first-child a.active {
		margin-left: 0; }
	ul.tabs li:first-child a {
		border-width: 1px 1px 0 1px;
		-moz-border-radius-topleft: 2px;
		-webkit-border-top-left-radius: 2px;
		border-top-left-radius: 2px; }
	ul.tabs li:last-child a {
		-moz-border-radius-topright: 2px;
		-webkit-border-top-right-radius: 2px;
		border-top-right-radius: 2px; }
	ul.tabs-content { margin: 0; display: block; }
	ul.tabs-content > li { display:none; }
	ul.tabs-content > li.active { display: block; }
	/* Clearfixing tabs for beautiful stacking */
	ul.tabs:before,
	ul.tabs:after {
	  content: '\0020';
	  display: block;
	  overflow: hidden;
	  visibility: hidden;
	  width: 0;
	  height: 0; }
	ul.tabs:after {
	  clear: both; }
	ul.tabs {
	  zoom: 1; 
	  background:white}
	</style>
	<script type="text/javascript" src="js/register.js"></script>
	<form method="POST"  onsubmit="return RegisterCheck()">
	<div class="form-box register">
	<ul class="tabs">
		<li id="regTABchallenger"><a class="active" href="#">Register as Challenger</a></li>
		<li id="regTABcompany"><a href="#">Register as Company</a></li>
	</ul>
		<h4 id="regTABtitle">Register Now as CHALLENGER</h4>
		<br>
		<div class="form-box-hold">
			<div class="form-box-text">USERNAME :</div>
			<div class="form-box-input"><input id="username" name="username" value="" type="text" size="23" /></div>
		</div>
		<div class="form-box-hold">
			<div class="form-box-text">PASSWORD :</div>
			<div class="form-box-input"><input id="password" name="password" value="" type="password" size="23" /></div>
		</div>
		<div class="form-box-hold">
			<div class="form-box-text">CONFIRM PASSWORD :</div>
			<div class="form-box-input"><input id="password2" name="password2" value="" type="password" size="23" /></div>
		</div>
		<div class="form-box-hold">
			<div class="form-box-text">E-MAIL :</div>
			<div class="form-box-input"><input id="email" name="email" value="" type="text" size="23" /></div>
		</div>
		<div class="form-box-hold">
			<div class="form-box-text">COUNTRY :</div>
			<div class="form-box-input"><select id="country" name="country"><option value="">--select country--</option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antarctica">Antarctica</option><option value="Antigua Barbuda">Antigua Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia Herzegovina">Bosnia Herzegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island">Bouvet Island</option><option value="Brazil">Brazil</option><option value="British Indian">British Indian</option><option value="British Virgin Islands">British Virgin Islands</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Rep">Central African Rep</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos Islands">Cocos Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="East Timor">East Timor</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern">French Southern</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard/McDonald Islands">Heard/McDonald Islands</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Ivory Coast">Ivory Coast</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macau">Macau</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="North Korea">North Korea</option><option value="Northern Mariana">Northern Mariana</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn Island">Pitcairn Island</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reunion">Reunion</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="S. Georgia/S. Sandwich">S. Georgia/S. Sandwich</option><option value="Saint Kitts &amp; Nevis">Saint Kitts &amp; Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia and Montenegro">Serbia and Montenegro</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Korea">South Korea</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="St. Helena">St. Helena</option><option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option><option value="St. Vincent Grenadines">St. Vincent Grenadines</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard Jan May. Islnd">Svalbard Jan May. Islnd</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks/Caicos Islands">Turks/Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="U.S. Min.Outlying Islands">U.S. Min.Outlying Islands</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States of America">United States of America</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Vatican City">Vatican City</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Virgin Islands">Virgin Islands</option><option value="Wallis/Futuna Islands">Wallis/Futuna Islands</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Zaire">Zaire</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option></select></div>
		</div>
		<div class="form-box-hold">
        <div class="form-box-right">
				<input type="hidden" name="domain" value="<?=$domain?>">
				<input type="hidden" name="domainidUrl" id="domainUrl" size="20" value="<?=$domainUrl?>" />
				<input type="hidden" name="usertype" id="usertype" value="1">
				<button class="form-submit-right" />REGISTER</button>
				<span id="log-loading" style="color:red;display:none">
					<img src="http://linked.com/images/loader.gif">Checking...
				</span>
				<span class="form-warning"></span>
			</div>
		</div>
	</div><!--form-box-->
	<div class="form-box rightbar">
			<br>
			<img src="http://d2qcctj8epnr7y.cloudfront.net/images/marvinpogi/desc-mychallenge1.png">
			<p class="text" id="regTABpara">If you join as a challenger, you will be able to take part in joining a live challenge, 
			add points to your tab and a chance to split revenues with the challenge.</p>
	</div>
	 </form> 
</div><!--slide-container -->
  <br class="clear" /> 	
	</div><!-- jcenter cont -->
 <div class="clear"></div>  
 <?include_once('footer_.php');?>
 <script type="text/javascript">
 (function ($) {
	$("#regTABchallenger").click(function() {
		$('#usertype').val('1');
		$('#regTABtitle').html('Register Now as CHALLENGER');
		$('#regTABpara').html('If you join as a challenger, you will be able to take part in joining a live challenge, add points to your tab and a chance to split revenues with the challenge.');
	});
	$('#regTABcompany').click(function(){
		$('#usertype').val('2');	
		$('#regTABtitle').html('Register as COMPANY/SPONSOR');
		$('#regTABpara').html('If you join as a company or a sponsor you will be able to take part in owning a challenge by sponsoring it. Sponsor, invite challengers and then split revenues.');
	});
})(jQuery);
 </script>