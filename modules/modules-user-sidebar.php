<? if($_SESSION['usertype']=='1'){?>
<div class="jsection-tab">
<p class="p-title"><a href="mysubmissions.html"><img src="images/ico_03.png">My Submissions</a></p>
<p>Check out my submissions on specific challenges</p>
</div>
<? } ?>
<div class="jsection-tab">
<p class="p-title"><a href="browse.html"><img src="v2/images/ico_03.png">BROWSE</a></p>
<p>Find among the challenges which interests you the most. </p>
</div>
<div class="jsection-tab">
<p class="p-title"><a href="browse.html"><img src="v2/images/ico_01.png">APPLY</a><p>
<p>Submit your original idea to solve the current challenge and share to your peers to win!</p>
</div>
<?if($_SESSION['usertype'] == '2'){?>
<div class="jsection-tab">
<p class="p-title"><a href="sponsor.html"><img src="v2/images/ico_04.png">SPONSOR</a></p>
<p>Be a sponsor for this domain and make your company known.</p>
</div>
<?}?>
<p class="p-title">Latest Challengers</p>
<?php
	echo $dir->GetLatestUsers();
?>