

 <?php $i = 0;?>
	
<div class="row">
    <div class="col-lg-12">
        <div id="nt-example2-container">
            <ul id="nt-example2">
			<?php foreach ($feed->get_items() as $item):?>
                <li data-infos="<?php echo strip_tags($item->get_description());?>">
                    <i class="fa fa-fw fa-play state"></i>
                    <span class="hour"> <?php echo $item->get_date();?></span><a href="<?php echo $item->get_permalink(); ?>" target="_blank"> <?php echo html_entity_decode($item->get_title()) ?></a>
                </li>
           <?php endforeach;?> 
            </ul>
			<?php foreach ($feed->get_items() as $item):?>
			<?php if ($i<1):?>
            <div id="nt-example2-infos-container">
                <div id="nt-example2-infos-triangle"></div>
                <div id="nt-example2-infos" class="row">
                    <div class="col-xs-4 centered">
                        <div class="infos-hour">
                          <?php echo $item->get_date();?>
                        </div>
                        <i class="fa fa-arrow-left" id="nt-example2-prev"></i>
                        <i class="fa fa-arrow-right" id="nt-example2-next"></i>
                    </div>
                    <div class="col-xs-8">
                        <div class="infos-text"><?php echo strip_tags($item->get_description());?></div>
                    </div>
                </div>
            </div>
			 <?php else: break;?>
			<?php endif?>
			<?php $i++;?>
			 <?php endforeach;?> 
        </div>
    </div>
</div>