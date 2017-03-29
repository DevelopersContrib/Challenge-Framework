<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<style>
body {
	overflow-x:hidden;
}
.blog-container {
	border-radius:4px;
	margin:20px 0px;
	background:#fff;
}
.blog-container .panel {
	box-shadow:none;
	background:none;
}
/* Custom container */
.container-full {
  margin: 0 auto;
  width: 100%;
}
.container-full .blogs {
	background:#fff;
}
.blog-box .col-md-2 {
	text-align:center;
}
.sides {
	background: #4ED1D5;
	padding:0px 0px;
	padding-top: 20px;
	padding-bottom:20px;
}
.spacer {
	margin-top:20px;
}
.blogs {
	padding-left: 30px;
}
.blog-head {
	background:#f5f5f5;
	text-align:center;
	border-bottom: 1px solid #dedede;
	margin-bottom: 30px;
	padding: 20px;	
}
.blog-prof {
	float:left;
	width:25%;
	text-align:center;
}
.blog-container {
	float:left;
	width:75%;
	margin-top: 0px;
}
.blog-container h3 {
	margin:0px;
	font-size:21px;
}
.blog-container h4 {
	font-size:19px;
}
.blog-box {
	border-bottom:1px dashed #ccc;
	margin-bottom:30px;
	margin-right: 20px;
}
.sides .feat-box {
	padding: 10px 20px;
	background: none repeat scroll 0% 0% #ffffff;
	border-radius:4px;
}
.sides .feat-box h3 {
	margin: 0px;
}
.sides .featured {
	margin-bottom:30px;
}
.sides .featured .daysleft {
	font-size:19px;
	font-weight:bold;
}
.sides .featured .progress {
	margin-bottom: 3px;
}
.sides .related {
	margin-bottom:30px;
}
.sides .newsfeeed {
	margin-bottom:30px;
}
.sides .other-rel li {
	background: none repeat scroll 0% 0% #ffffff;
	border: 2px solid #4ED1D5;
	border-radius:4px;
	text-align:center;
	padding: 15px 5px;
}
.sides .other-rel h4 {
	font-size:17px;
}
.sides .nfbox {
	background:#ffffff;
	padding:10px;
	border-radius:4px;
}
.sides .newsfeeed .twdate {
	font-size:12px;
}
.sides .newsfeeed .tmsg {
	margin:0px;
}
.sides .newsfeeed .pfeed {
	padding-bottom:10px;
	margin-bottom:10px;
	border-bottom: 1px solid #dedede;
}
.sides .newsfeeed .atsite {
	color:#555;
	font-size:12px;
}
.sides h2 {
	font-size:27px;
	color:#ffffff;
}
.sides .panel-body {
	padding:8px;
	font-size: 12px;
}
.rel-desc {
	height: 120px;
background: #ccc;
}
</style>
<?	include('header_index.php'); ?>
<div class="container">
      <div class="row">
        <div class="col-lg-8">
			<h2 class="blog-head"><?php echo $info['title']?></h2>
					<div class="row">
						<div class="spacer"></div>
						<!-- blog -->
						<?php if (count($micronews) > 0):?>
						<?php foreach ($micronews as $k=>$v):?>
							<div class="blog-box">							
								<div class="col-md-2">
								  <a class="blog-title" href="#">
								  <?php if ($v['profile_image'] == '' || $v['profile_image']==null):?>
								      <img alt="http://www.contrib.com/people/me/<?php echo $v['Username']?>" src="http://d2qcctj8epnr7y.cloudfront.net/sheina/contrib/default_avatar.png" style="width:100px;height:100px" class="img-circle">
								      <?php else:?>
								       <img alt="http://www.contrib.com/people/me/<?php echo $v['Username']?>" src="http://www.contrib.com/uploads/profile/<?php echo $v['profile_image'] ?>" style="width:100px;height:100px" class="img-circle">
								  <?php endif?>
								  </a>
								  <p><?php echo $v['FirstName'].' '.$v['LastName']?></p>
								</div>
								<div class="col-md-10">
								  <div class="rower">
									  <h4><?php echo stripcslashes($v['message'])?></h4>
									  <small class="text-muted"><?php echo date("M d, Y", strtotime($v['date_posted']));?>&nbsp;&nbsp;<i class="fa fa-circle"></i>&nbsp;&nbsp;<a href="#" class="text-muted">Read More</a></small>
									  </h4>
								  </div>
								</div>
								<div style="clear:both"></div>							
							</div>
							
						<?php endforeach;?>
						<?php endif?>
						<!-- end blog -->
					</div>
        </div>

        <div class="col-lg-4 sides">
        <?  if ($featured_id != '0'):?>
          <div class="featured">
			<h2><i class="fa fa-star"></i>&nbsp;Featured Challenge</h2>
			<div class="feat-box">
				<a href="#"><h3><?php echo $f['ChallengeTitle']?></h3></a>
				<p><?php echo stripcslashes($f['ChallengeDesc'])?></p>				
				<div class="progress">
				  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
				  </div>
				</div>
				<p class="daysleft"><?php echo $f['remaining_days']?> Days Left</p>
			</div>
		  </div>
      <?endif?>
		  <div class="related">
			<h2><i class="fa fa-sun-o"></i>&nbsp;Other Related Challenge</h2>
			<div class="other-rel">
				<!-- -->
				<?php if (count($related) > 0):?>
				<ul class="list-unstyled">
				  <?php $ri =0;?>
				   <?php foreach ($related as $k2=>$v2):?>
				       <?php if ($ri > 3) break;?>
				       <li class="col-md-6">
							<a href=""><h4><?php echo $v2['ChallengeTitle']?></h4></a>
							<p class="rel-desc"><img class="img-responsive" src="<?php echo $v2['Photo']?>"></p>
							<p><a href="http://www.contrib.com/challenge/details/<?=$v2['ChallengeId']?>/<?=$v2['Slug']?>" type="button" class="btn btn-success">Join This Challenge</a></p>
						</li>
						<?php $ri++?>
					<?php endforeach;?>
				</ul>
				<?php endif?>
				<!-- -->
				<div style="clear:both"></div>
			</div>
		  </div>
		  <div class="newsfeeed">
			<h2><i class="fa fa-newspaper-o"></i>&nbsp;Discussion Newsfeed</h2>
			<div class="nfbox">
				
				    <script src="http://tools.contrib.com/cwidget/newsfeeds/?d=<?php echo $info['domain']?>&l=3"></script>
				
			</div>
		  </div>
        </div>
      </div>
</div> <!-- /container full -->
<?	include('index_footer.php');?>