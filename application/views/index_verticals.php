<style>
.getrel {
	text-transform:capitalize;
}
</style>
<?php if (count($getrelateddomains)>0):?>
<div class="row verb">
			  <div class="col-md-8 col-md-offset-2">
				<h2 class="text-center"><i class="fa fa-globe"></i>&nbsp; Other Brands On <span class="getrel"><?php echo $getrelateddomains[0]['slug']?></span> Vertical</h2>
					<div class="vertical-list">
					 <ul class="list-unstyled">
					 <?foreach($getrelateddomains as $verticals):?>
						<??>
						<li class="col-md-4 odd"><a href="<?php echo $verticals['domain_name']?>"><i class="fa fa-arrow-right"></i>&nbsp;<?php echo ucwords($verticals['domain_name'])?></a></li>
					 <?endforeach?>
					 </ul>
				<div class="clearfix"></div>
			</div>
		<div class="col-md-12" style="text-align:center;margin-top:10px;"><a href="http://www.contrib.com/verticals/news/<?php echo $verticals['slug']?>" target="_blank" class="btn btn-success">View More</a></div>
	</div>
</div>
<?endif;?>