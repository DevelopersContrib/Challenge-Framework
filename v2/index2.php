<?php

include('header-new-v2.php');

$earthchaId="120";

?>

<div class="jwidth">

<center>

<div class="jcenter_hdr">

<div style="float:left; width:60%; height:100%;color:#FFF; text-align:left;">

	<div style="width:90%;margin-left:15px; height:310px; display:table-cell; vertical-align:middle;">

	<h1><?=stripslashes($dir->GetTableInfo('Challenges','ChallengeDesc','ChallengeId',$earthchaId))?></h1>

	</div>

</div>

<div style="float:left; width:40%;"><img src="v2/images/desc-earthchallenge_small.png"></div>

</div>

</center>





</div>



<div class="jcenter">

<center>

	<div class="jcenter_cont">

  

    	<div class="jsection">

            

    	<div class="jsection-tab">

        <p class="p-title"><img src="v2/images/ico_02.png"><a href="su">See Apps</a></p>

        <p>Check out latest applications for <?=$domain?></p>

        </div>

    	<div class="jsection-tab">

            <p class="p-title"><img src="v2/images/ico_03.png"><a href="browse.html">BROWSE</a></p>

        <p>Find among the challenges which interests you the most. </p>

        </div>

    	<div class="jsection-tab">

            <p class="p-title"><img src="v2/images/ico_01.png"><a href="browse.html">APPLY</a></p>

        <p>Submit your original idea and expect to 

		<br>win!</p>

    

        </div>

    	<div class="jsection-tab">

            <p class="p-title"><img src="v2/images/ico_04.png"><a href="#">SPONSOR</a></p>

        	<p>Ask the world. Be a sponsor. Encourage individuals to take part in making things happen.</p>

        </div>

    </div>

   <div style="clear:both;height:5px;"></div>

   <hr  style="width:97%;margin-bottom:2px;margin-top:0px; color:#CCC; opacity:0.4">

   <!-- another sec !-->

    

   


    

   <center>

       &nbsp;

   </center>

   

 </div>  <!-- jcenter cont --> 

    

<?include('footer_.php')?>