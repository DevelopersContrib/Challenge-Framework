<?php

include('header-new-v2.php');

$page = $_REQUEST['page'];
$title = $_REQUEST['title']; 

if($title!="Home")
	$pageUrl = '<a href="'.$page.'.html">'.$title.'</a>';
else $pageUrl = '';
?>
<STYLE type="text/css">
/* = STEPS CONTAINER
----------------------------*/
.wizard-steps {
    margin:20px 10px 0px 10px;
    padding:0px;
    position: relative;
    clear:both;font-size:18px;color:rgb(112,112,112);
   
}
.wizard-steps div {
    position:relative;
}
/* = STEP NUMBERS
----------------------------*/
.wizard-steps span {
    display: block;
    float: left;font-weight:bold;
    font-size: 10px;
    text-align:center;
    width:15px;
    margin: 2px 5px 0px 0px;
    line-height:15px;
    color: #ccc;
    background: #FFF;
    border: 2px solid #CCC;
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    border-radius:10px;
}
/* = DEFAULT STEPS
----------------------------*/
.wizard-steps a {
    position:relative;
    display:block;
    width:auto;
    height:24px;
    margin-right: 18px;
    padding:0px 10px 0px 3px;
    float: left;
    font-size:11px;
    line-height:24px;
    color:#666;
    background: #F0EEE3;
    text-decoration:none;
    text-shadow:1px 1px 1px rgba(255,255,255, 0.8);
}
.wizard-steps a:before {
    width:0px;
    height:0px;
    border-top: 12px solid #F0EEE3;
    border-bottom: 12px solid #F0EEE3;
    border-left:12px solid transparent;
    position: absolute;
    content: "";
    top: 0px;
    left: -12px;
}
.wizard-steps a:after {
    width: 0;
    height: 0;
    border-top: 12px solid transparent;
    border-bottom: 12px solid transparent;
    border-left:12px solid #F0EEE3;
    position: absolute;
    content: "";
    top: 0px;
    right: -12px;
}
 
/* = COMPLETED STEPS
----------------------------*/
 
.wizard-steps .completed-step a {
    color:#163038;
    background: #A3C1C9;
}
.wizard-steps .completed-step a:before {
    border-top: 12px solid #A3C1C9;
    border-bottom: 12px solid #A3C1C9;
}
.wizard-steps .completed-step a:after {
    border-left: 12px solid #A3C1C9;
}
.wizard-steps .completed-step span {
    border: 2px solid #163038;
    color: #163038;
    text-shadow:none;
}
/* = ACTIVE STEPS
----------------------------*/
.wizard-steps .active-step a {
    color:#A3C1C9;
    background: #163038;
    text-shadow:1px 1px 1px rgba(0,0,0, 0.8);
}
.wizard-steps .active-step a:before {
    border-top: 12px solid #163038;
    border-bottom: 12px solid #163038;
}
.wizard-steps .active-step a:after {
    border-left: 12px solid #163038;
}
.wizard-steps .active-step span {
    color: #163038;
    -webkit-box-shadow:0px 0px 2px rgba(0,0,0, 0.8);
    -moz-box-shadow:0px 0px 2px rgba(0,0,0, 0.8);
    box-shadow:0px 0px 2px rgba(0,0,0, 0.8);
    text-shadow:none;
    border: 2px solid #A3C1C9;
}
/* = HOVER STATES
----------------------------*/
.wizard-steps .completed-step:hover a, .wizard-steps .active-step:hover a {
    color:#fff;
    background: #8F061E;
    text-shadow:1px 1px 1px rgba(0,0,0, 0.8);
}
.wizard-steps .completed-step:hover span, .wizard-steps .active-step:hover span {
    color:#8F061E;
}
.wizard-steps .completed-step:hover a:before, .wizard-steps .active-step:hover a:before {
    border-top: 12px solid #8F061E;
    border-bottom: 12px solid #8F061E;
}
.wizard-steps .completed-step:hover a:after, .wizard-steps .active-step:hover a:after {
    border-left: 12px solid #8F061E;
}

.wizard steps .desc{width:200px;float:left;}
.wizard steps .desc p{font-size:14px !important;line-height:16px !important;font-weight:normal !important;}
</style>

<div class="jwidth_page">
<div class="container">


	<h1><?=$title?></h1>
</div>


</div>

<div class="jcenter">

    
	<div class="jcenter_cont">
      <ul id="breadcrumb">
			<li><a href="home.html">Home</a></li>
      	<li><?=$pageUrl?></li>
		</ul>
   <div class="clear"></div> 
   <div id="jcenter-left">
   <div class="jcenter-inner">
   <!--todo : mmb show users latest applications if the user has one, if not show this next steps instead-->
  <? include 'pages/'.$page.'.php';
  ?>
  
  
  <div class="clear"></div>
  </div>
   </div>
   <div id="jcenter-right">
   <div class="jcenter-inner">
    <?
    include 'modules/modules-user-sidebar.php';
    ?>
    <div class="clear"></div>
    <BR />
    <BR />
    <p class="p-title">SPONSORS</p>
          <!--/* OpenX iFrame Tag v2.8.7 */-->

<iframe id='aeb5b817' name='aeb5b817' src='http://adring.ecorp.com/www/delivery/afr.php?zoneid=1&amp;target=_blank&amp;cb=INSERT_RANDOM_NUMBER_HERE' frameborder='0' scrolling='no' width='250' height='250' allowtransparency='true'><script type='text/javascript'>
<!--// <![CDATA[
   document.write ("<nolayer>");
   document.write ("<a href='http://adring.ecorp.com/www/delivery/ck.php?n=a5718b60&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://adring.ecorp.com/www/delivery/avw.php?zoneid=1&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=a5718b60' border='0' alt='' /></a>");
   document.write ("</nolayer>");
   document.write ("<ilayer id='layeraeb5b817' visibility='hidden' width='250' height='250'></ilayer>");
// ]]> -->
</script><noscript>
  <a href='http://adring.ecorp.com/www/delivery/ck.php?n=aeb5b817' target='_blank'>
  <img src='http://adring.ecorp.com/www/delivery/avw.php?zoneid=1&target=_blank&cb=INSERT_RANDOM_NUMBER_HERE' border='0' alt='' /></a></noscript></iframe>


<!-- Placement Comment -->
<layer src='http://adring.ecorp.com/www/delivery/afr.php?n=aeb5b817&zoneid=1&target=_blank&cb=INSERT_RANDOM_NUMBER_HERE&rewrite=0' width='250' height='250' visibility='hidden' onload="moveToAbsolute(layeraeb5b817.pageX,layeraeb5b817.pageY);clip.width=250;clip.height=250;visibility='show';"></layer>
<br />
<br />
<br />
   </div>
   </div> 
    
  
    
  <div class="clear"></div>  
   
 </div>   
    
</div>






    

<?include('footer_.php')?>