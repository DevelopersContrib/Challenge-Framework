<?php $usertype = $dir->GetUserInfo($_SESSION['userid'],'UserType');
	
if($usertype != 2 ){ //redirects to broswe if not company
	print "<META http-equiv='refresh' content='0;URL=browse.html'>";	exit;
}

function GetTableInfo($table,$field,$wherefield,$value){
			$result = mysql_query("SELECT `$field` as val from $table where `$wherefield` = '$value'");
				if (!$result){
				   $returnValue = mysql_error();
				}else {            
					while($row = mysql_fetch_array($result)){
						$value = $row['val'];
					}  
				}
		   return $value;
}

$challengeid = $_GET['challengeid'];

	if($challengeid == "" && $challengename != ""){
		$challengeid = $dir->GetTableInfo("Challenges","ChallengeId","URLName",$challengename);
	}
$challengetitle = stripslashes($dir->GetTableInfo("Challenges","ChallengeTitle","ChallengeId",$challengeid));
?>
<script type="text/javascript" src="http://d2qcctj8epnr7y.cloudfront.net/mpglobal/mpjquery.js"></script>
    <script type="text/javascript" src="http://d2qcctj8epnr7y.cloudfront.net/mpglobal/plugins.build0711.js"></script>

	<!-- start JQUERY LIBRARY -->
		<link type="text/css" href="jqueryLibrary/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="jqueryLibrary/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="jqueryLibrary/js/jquery-ui-1.8.17.custom.min.js"></script>
		
		<script>	!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');	</script>
		<script type="text/javascript" src="http://mychallenge.com/fancybox/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
		<script type="text/javascript" src="http://mychallenge.com/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		
			<script type="text/javascript">
			
			$(function() {
				 
				 //delete prize
				 var totalp = $("#totalp").val();
					for(var i=0 ; i < totalp ; i++){
						$("#deleteentry"+i).click(function(){
							
							var cnt = $(this).val();
							var pid = $('#prizeidtodelete'+cnt).val();
							
							var challenge_id = $("#challengeid").val();
							
							$.post("deleteentry.php",{challengeid:challenge_id,type:1,id:pid},function(result){
								$('#fieldrowp'+cnt).html(result);
							});
							
							return false;
						});
					}
					
				//delete criteria
				 var totalc = $("#totalc").val();
					for(var c=0 ; c < totalc ; c++){
						$("#deleteentryc"+c).click(function(){
							
							var cnt2 = $(this).val();
							var cid = $('#criteriaidtodelete'+cnt2).val();
							
							var challenge_id = $("#challengeid").val();
							
							$.post("deleteentry.php",{challengeid:challenge_id,type:2,id:cid},function(result){
								$('#fieldrowc'+cnt2).html(result);
							});
							
							return false;
						});
					}
					
					//delete how to enter
				 var totalh = $("#totalh").val();
					for(var h=0 ; h < totalc ; h++){
						$("#deleteentryh"+h).click(function(){
							
							var cnt3 = $(this).val();
							var hid = $('#howtoidtodelete'+cnt3).val();
							
							var challenge_id = $("#challengeid").val();
							
							$.post("deleteentry.php",{challengeid:challenge_id,type:3,id:hid},function(result){
								$('#fieldrowh'+cnt3).html(result);
							});
							
							return false;
						});
					}
				
				var dates = $( "#submission_from, #submission_to" ).datepicker({
					defaultDate: "+1w",
					changeMonth: true,
					changeYear: true,
					numberOfMonths: 2,
					dateFormat: 'MM dd, yy',
					onSelect: function( selectedDate ) {
						var option = this.id == "submission_from" ? "minDate" : "maxDate",
							instance = $( this ).data( "datepicker" ),
							date = $.datepicker.parseDate(
								instance.settings.dateFormat ||
								$.datepicker._defaults.dateFormat,
								selectedDate, instance.settings );
						dates.not( this ).datepicker( "option", option, date );
					}
				});
				
				var dates_judging = $( "#judging_from, #judging_to" ).datepicker({
					defaultDate: "+1w",
					changeMonth: true,
					changeYear: true,
					numberOfMonths: 2,
					dateFormat: 'MM dd, yy',
					onSelect: function( selectedDate ) {
						var option = this.id == "judging_from" ? "minDate" : "maxDate",
							instance = $( this ).data( "datepicker" ),
							date = $.datepicker.parseDate(
								instance.settings.dateFormat ||
								$.datepicker._defaults.dateFormat,
								selectedDate, instance.settings );
						dates_judging.not( this ).datepicker( "option", option, date );
					}
				});
				
				$( "#announcement_date" ).datepicker({ dateFormat: 'MM dd, yy',changeYear: true,changeMonth: true });
				
				
			function removeSpaces(string) {
				var finalstring = string.split(' ').join('');
				var finalstring = finalstring.replace(/[^a-zA-Z 0-9]+/g,'');
				return finalstring;
			}
			
			$("#title").keyup(function () {
			  var value = $(this).val();
			  var urlvalue = removeSpaces(value);
			  $("#urlvalue").val(urlvalue);
			}).keyup();
			
			$('#AddPrizes').click(function() {
					var cnt1 = (parseInt($("#fieldcnt").val()) + 1);
					$("#fieldcnt").val(cnt1);
					$('#IfPrizesAdded').val('1');
					 
					var newElem = $('#Prizefield-clone').clone().attr('id', 'Prizefield-clone' + cnt1);
					newElem.find('textarea').attr("name","prizeadded"+cnt1);
					newElem.css("display","block");
					newElem.appendTo("#Prizefield");
					
					$('#deleteaddedfieldp').css("display","block");
					
					/*$("#Prizefield-clone").clone().css("display","block").appendTo("#Prizefield").find('textarea').each(function(){$(this).attr("name","prizeadded"+cnt1)});*/
			});
			
			$('#AddCriteria').click(function() {
					var cnt2 = (parseInt($("#fieldcntcriteria").val()) + 1);
					$("#fieldcntcriteria").val(cnt2);
					$("#IfCriteriaAdded").val('1');
					
					var newElem = $('#Criteriafield-clone').clone().attr('id', 'Criteriafield-clone' + cnt2);
					newElem.find('textarea').attr("name","criteriaadded" + cnt2);
					newElem.css("display","block");
					newElem.appendTo("#Criteriafield");
					
					$('#deleteaddedfieldc').css("display","block");
					/*$("#Criteriafield-clone").clone().css("display","block").appendTo("#Criteriafield").find('textarea').each(function(){$(this).attr("name","criteriaadded"+cnt2)});*/
			});
			
			$('#AddHowTo').click(function() {
					var cnt3 = (parseInt($("#fieldcnthowto").val()) + 1);
					$("#fieldcnthowto").val(cnt3);
					$("#IfHowToAdded").val('1');
					
					var newElem = $('#HowTofield-clone').clone().attr('id', 'HowTofield-clone' + cnt3);
					newElem.find('textarea').attr("name","howtoadded" + cnt3);
					newElem.css("display","block");
					newElem.appendTo("#HowTofield");
					
					$('#deleteaddedfieldh').css("display","block");
					
					/*$("#HowTofield-clone").clone().css("display","block").appendTo("#HowTofield").find('textarea').each(function(){$(this).attr("name","howtoadded"+cnt3)});*/
			});		
	
	$('#deleteaddedfieldp').click(function() {
                var cnt1 = (parseInt($("#fieldcnt").val()));
                $('#Prizefield-clone' + cnt1).remove();
				
				if (cnt1-1 == -1){
					$("#fieldcnt").val(-1);
					$('#deleteaddedfieldp').css("display","none");
				}
				
				else{
					var newcnt = cnt1 - 1;
					$("#fieldcnt").val(newcnt);
				}
     });
	
	$('#deleteaddedfieldc').click(function() {
                var cnt2 = (parseInt($("#fieldcntcriteria").val()));
                $('#Criteriafield-clone' + cnt2).remove();
                /*$('#AddPrizes').attr('disabled','');*/
				
				if (cnt2-1 == -1){
					$("#fieldcntcriteria").val(-1);
					$('#deleteaddedfieldc').css("display","none");
				}
				
				else{
					var newcnt = cnt2 - 1;
					$("#fieldcntcriteria").val(newcnt);
				}
     });
	
	$('#deleteaddedfieldh').click(function() {
                var cnt3 = (parseInt($("#fieldcnthowto").val()));
                $('#HowTofield-clone' + cnt3).remove();
				
				if (cnt3-1 == -1){
					$("#fieldcnthowto").val(-1);
					$('#deleteaddedfieldh').css("display","none");
				}
				
				else{
					var newcnt = cnt3 - 1;
					$("#fieldcnthowto").val(newcnt);
				}
     });
	
});
			</script>
	<!-- end JQUERY LIBRARY-->
<div class="two-thirds column" style="min-height:300px;padding:10px 30px">	
<?if($usertype == 2 && $dir->CheckIfExist("SELECT * FROM Challenges WHERE ChallengeId = '".$challengeid."' AND CompanyId = '".$_SESSION['userid']."' ") == false){
			echo '<div class="warning">You are not allowed to do this action</div>';
		 }else{?>
				<form name="editchallenge" method="POST" enctype="multipart/form-data" action="saveeditchallenge.php" targetajax="#form-success" onsubmit="return ValidateChallengePost()">  
					<h4 class="heading-line">General Information</h4>
					<div class="fieldrow">
						<div class="fieldrow-left">&nbsp;</div>
						<div class="fieldrow-right"><div id="form-success" style="float:left;"></div></div>
					</div><!-- field row -->
					
					<div class="fieldrow">
						<label>Name Your Challenge</label>
						<div class="fieldrow-right"><input type="text" id="title" size="70" style="width:450px;" name="title" value="<?=stripslashes($challengetitle);?>"></div>
					</div><!-- field row -->
					
					<div class="fieldrow">
						<label>Url Name:</label>
						<div class="fieldrow-right">http://mychallenge.com/challenge/<input size="70" style="width:450px;" type="text" name="urlvalue" id="urlvalue" value="<?=$dir->GetTableInfo("Challenges","URLName","ChallengeId",$challengeid)?>"></div>
					</div><!-- field row -->
					
					<div class="fieldrow">
						<label>Choose Category</label>
						<div class="fieldrow-right">
							<select name="category" class="forms" style="width:450px;">
							<option value="">--Select Category--</option>
                    <?
                    $catarray = $dir->GetChallengeCategories();
                    for ($i=0;$i<count($catarray);$i++){?>
                      <option value="<?=$catarray[$i]['id']?>" <?php if($catarray[$i]['id'] == $dir->GetTableInfo("Challenges","CategoryId","ChallengeId",$challengeid)){ echo 'selected="selected"';}?> ><?=$catarray[$i]['name']?></option>
                    <?}
                    
                    ?>
						</select>
						</div>
					</div><!-- field row -->
 
					<div class="fieldrow">
						<label>Describe Challenge</label>
						<div class="fieldrow-right"><textarea name="description" style="width:540px;" id="description" rows="10" cols="50"><?=stripslashes($dir->GetTableInfo("Challenges","ChallengeDesc","ChallengeId",$challengeid))?></textarea></div>
					</div><!-- field row -->
					
					<div class="fieldrow">
						<label>Additional Information</label>
						<div class="fieldrow-right"><textarea name="more_description" style="width:540px;" id="more_description" rows="10" cols="50"><?=stripslashes($dir->GetTableInfo("Challenges","MoreDetails","ChallengeId",$challengeid))?></textarea></div>
					</div><!-- field row -->
					
					<div class="fieldrow">
						<label>Make your challenge noticeable with a picture</label>
						<div class="fieldrow-right"><input type="file" name="image" size="45" value="<?=stripslashes($dir->GetTableInfo("Challenges","Photo","ChallengeId",$challengeid))?>"/></div>
					</div><!-- field row -->
			
					
					<h4 class="heading-line">Timeline</h4>
					
					<input type="hidden" name="timelineid" value="<?=$dir->GetTableInfo('ChallengeTimeline','TimelineId','ChallengeId',$challengeid)?>">
					
					<div class="fieldrow">
						<br><label>Submission Period</label><br>
						<div class="fieldrow-right" style="width:100%;">
							From&nbsp;<input type="text" id="submission_from" name="submission_from" value="<?=date("F d, Y",strtotime($dir->GetTableInfo("ChallengeTimeline","Submission_From","ChallengeId",$challengeid)))?>" />
							To&nbsp;<input type="text" id="submission_to" name="submission_to" value="<?=date("F d, Y",strtotime($dir->GetTableInfo("ChallengeTimeline","Submission_To","ChallengeId",$challengeid)))?>" />
						</div>
					</div><!-- field row -->
					
					<div style="clear:both;"></div>
					
					<div class="fieldrow">
						<label>Judging Period</label>
						<div class="fieldrow-right">
							Start of Judging&nbsp;<input type="text" id="judging_from" name="judging_from" value="<?=date("F d, Y",strtotime($dir->GetTableInfo("ChallengeTimeline","Judging_From","ChallengeId",$challengeid)))?>" />
							End of Judging&nbsp;<input type="text" id="judging_to" name="judging_to" value="<?=date("F d, Y",strtotime($dir->GetTableInfo("ChallengeTimeline","Judging_To","ChallengeId",$challengeid)))?>" />
						</div>
					</div><!-- field row -->
					
					<div style="clear:both;"></div>
					
					<div class="fieldrow">
						<label>Announcement of Winners</label>
						<div class="fieldrow-right">
							<input type="text" name="announcement_date" id="announcement_date" value="<?=date("F d, Y",strtotime($dir->GetTableInfo("ChallengeTimeline","Winners_Announced","ChallengeId",$challengeid)))?>" />
						</div>
					</div><!-- field row -->

					<h4 class="heading-line">Prizes</h4>
					
					<div id="Prizefield">
					<?
					$getprizes = mysql_query("SELECT * FROM ChallengePrizes WHERE ChallengeId = '".$challengeid."' ") or die(mysql_error);
					for($p = 0; $row = mysql_fetch_array($getprizes) ; $p++ ){
					?>
					 <input type="hidden" name="prizesid[]" value="<?=$row['PrizeId']?>" />
						<div class="fieldrow" id="fieldrowp<?=$p?>">
							<div class="fieldrow-left">&nbsp;</div>
							<div class="fieldrow-right">
									<textarea name="prize<?=$p?>" class="long-text" style="width:540px;"><?=stripslashes($row['PrizeDescription'])?></textarea>
									<input type="image" id="deleteentry<?=$p?>" value="<?=$p?>" name="deleteentry<?=$p?>"  style="width:15px;height:15px;" src="http://mychallenge.com/images/delete.png">
									<input type="hidden" id="prizeidtodelete<?=$p?>" value="<?=$row['PrizeId']?>" >
							</div><!-- fieldrow-right -->
						</div><!-- field row -->
					<?}?>
					</div><!-- PrizeField -->
					
					<input type="hidden" name="totalp" id="totalp" value="<?=($p+1)?>">
					<input type="hidden" name="fieldcnt" id="fieldcnt" value="<?echo -1;?>" />
					<input type="hidden" name="IfPrizesAdded" id="IfPrizesAdded" value="0" />
					
					<div class="fieldrow">
						<div class="fieldrow-left">&nbsp;</div>
						<div class="fieldrow-right">
							<input type="button" id="AddPrizes" value="add">
							<input type="button" id="deleteaddedfieldp" value="remove" style="display:none;float:right"></div>
					</div><!-- field row -->
					
					
					<h4 class="heading-line">Criteria for Judging</h4>
					<div id="Criteriafield">
					<?
					$getcriteria = mysql_query("SELECT * FROM ChallengeCriteria WHERE ChallengeId = '".$challengeid."' ") or die(mysql_error);
					for($c = 0; $row = mysql_fetch_array($getcriteria) ; $c++ ){
					?>
					 <input type="hidden" name="criteriaid[]" value="<?=$row['CriteriaId']?>" />
						<div class="fieldrow" id="fieldrowc<?=$c?>">
							<div class="fieldrow-left">&nbsp;</div>
							<div class="fieldrow-right">
								<textarea type="text" name="criteria<?=$c?>" class="long-text" style="width:540px;" ><?=stripslashes($row['CriteriaDescription'])?></textarea>
								<input type="image" id="deleteentryc<?=$c?>" value="<?=$c?>" name="deleteentryc<?=$c?>"  style="width:15px;height:15px;" src="http://mychallenge.com/images/delete.png">
								<input type="hidden" id="criteriaidtodelete<?=$c?>" value="<?=$row['CriteriaId']?>" >
							</div><!-- fieldrow right-->
						</div><!-- field row -->
					<?}?>
					</div><!-- Criteriafield-->
					
					<input type="hidden" name="totalc" id="totalc" value="<?=($c+1)?>">
					<input type="hidden" name="fieldcntcriteria" id="fieldcntcriteria" value="<?echo -1;?>" />
					<input type="hidden" name="IfCriteriaAdded" id="IfCriteriaAdded" value="0" />
					
					<div class="fieldrow">
						<div class="fieldrow-left">&nbsp;</div>
						<div class="fieldrow-right">
							<input type="button" id="AddCriteria" id="AddCriteria" value="add">
							<input type="button" id="deleteaddedfieldc" value="remove" style="display:none;float:right">
						</div>
					</div><!-- field row -->
				
					<h4 class="heading-line">How To Enter</h4>
					<div id="HowTofield">
					<?
					$gethowto = mysql_query("SELECT * FROM ChallengeHowToEnter WHERE ChallengeId = '".$challengeid."' ") or die(mysql_error);
					for($h = 0; $row = mysql_fetch_array($gethowto) ; $h++ ){
					?>
					 <input type="hidden" name="howtoid[]" value="<?=$row['HowToId']?>" />
						<div class="fieldrow" id="fieldrowh<?=$h?>">
							<div class="fieldrow-left">&nbsp;</div>
							<div class="fieldrow-right">
								<textarea type="text" name="howto<?=$h?>" class="long-text" style="width:540px;" ><?=stripslashes($row['HowToDesc'])?></textarea>
								<input type="image" id="deleteentryh<?=$h?>" value="<?=$h?>" name="deleteentryh<?=$h?>"  style="width:15px;height:15px;" src="http://mychallenge.com/images/delete.png">
								<input type="hidden" id="howtoidtodelete<?=$h?>" value="<?=$row['HowToId']?>" >
							</div><!-- fieldrow-right-->
						</div><!-- field row -->
					<?}?>
					</div><!-- HowTofield-->
					
						<input type="hidden" name="totalh" id="totalh" value="<?=($h+1)?>">
						<input type="hidden" name="fieldcnthowto" id="fieldcnthowto" value="<?echo -1;?>" />
						<input type="hidden" name="IfHowToAdded" id="IfHowToAdded" value="0" />
	
					
					<div class="fieldrow">
						<div class="fieldrow-left">&nbsp;</div>
						<div class="fieldrow-right">
							<input type="button" id="AddHowTo" value="add">
							<input type="button" id="deleteaddedfieldh" value="remove" style="display:none;float:right">
						</div>
					</div><!-- field row -->
					
					
					<input type="hidden" name="challengeid" id="challengeid" value="<?=$challengeid?>">
					
					<div class="fieldrow">
						<div class="fieldrow-left">&nbsp;</div>
						 <div class="fieldrow-right">
							<button type="submit"><h2>Save Changes</h2></button>
							<!-- input name="Submit" type="image" src="http://d2qcctj8epnr7y.cloudfront.net/challengeframework/buttn-postchallenge.png" value="Post Challenge Now" -->
						</div>
					</div><!-- field row -->
				
				</form>
				
				<!-- CLONES -->
					<div id="Prizefield-clone" style="display:none;">
						<div class="fieldrow">
							<div class="fieldrow-left" id="left-clone"></div>
							<div class="fieldrow-right" id="right-clone">
								<textarea name="prize" class="long-text" style="width:540px;"></textarea></div>
						</div><!-- field row -->
					</div><!-- PrizeField-clone -->
					
					<div id="Criteriafield-clone" style="display:none;">
						<div class="fieldrow">
							<div class="fieldrow-left" id="left-clone"></div>
							<div class="fieldrow-right" id="right-clone">
								<textarea name="criteria" class="long-text" style="width:540px;" ></textarea></div>
						</div><!-- field row -->
					</div><!-- PrizeField-clone -->
					
					<div id="HowTofield-clone" style="display:none;">
						<div class="fieldrow">
							<div class="fieldrow-left" id="left-clone"></div>
							<div class="fieldrow-right" id="right-clone">
								<textarea name="howto" class="long-text" style="width:540px;" ></textarea></div>
						</div><!-- field row -->
					</div><!-- PrizeField-clone -->
				<!-- end of clones -->
				
			<?} //else if company owner edits ?>
</div><!-- two thirds column-->