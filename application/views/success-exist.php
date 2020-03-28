<?	include('header_index.php'); ?>
<style>
.success-container {
	padding-top: 80px;
	padding-bottom: 60px;
}
</style>
<div class="container success-container">
	<div class="row">
		<div class="col-md-12">
			<div class="success-page">
				<div class="sp-bottom">
					<h4>The email you provided is already associated with an existing Contrib account and is already following <?php echo $info['domain']?>.</h4>
				</div>
				<div style="clear:both"><br></div>
				<div class="row">
				<div class="col-md-3 exist-sign">
					<div class="steps"><span>1</span></div>
					<p class="step-head">Login To Contrib</p>
					<a href="http://www.contrib.com/home/signin" class="blinking"><i class="fa fa-pencil-square-o"></i></a>
					<p style="clear:both"></p>
				</div>
				<div class="col-md-3">
					<div class="steps"><span>2</span></div>
					<p class="step-head">Join A Challenge</p>
					<i class="fa fa-star"></i>
					<p style="clear:both"></p>
				</div>
				<div class="col-md-3">
					<div class="steps"><span>3</span></div>
					<p class="step-head">Submit An Entry</p>
					<i class="fa fa-file-text"></i>
					<p style="clear:both"></p>
				</div>
				<div class="col-md-3">
					<div class="steps"><span>4</span></div>
					<p class="step-head">Win Exciting Prizes</p>
					<i class="fa fa-trophy"></i>
					<p style="clear:both"></p>
				</div>
			</div>
			</div>			
		</div>
	</div>
</div>
<?	include('index_footer.php');?>