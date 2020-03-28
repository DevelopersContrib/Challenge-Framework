<? if(!isset($_SESSION['userid'])){ ?>
	<script>window.location="<?=$domainUrl?>";</script>	
<? } if($_SESSION['usertype']=='2'){ ?>
	<script>window.location="<?=$domainUrl?>/browse.html";</script>	
<? }?>
	
<style>
.submission-gallery{ margin:10px 10px 60px 10px; float:left; height:160px; width:30%; }
</style>
<br>
<p class="p-title">My Submissions</p>
<p><?=$dir->ShowMySubmissions($_SESSION['userid']);?></p>



<br>
