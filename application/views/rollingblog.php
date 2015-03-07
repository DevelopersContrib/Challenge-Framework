<?

	//var_dump($feed);
	//echo "test";

	echo "<pre>";
		
	//	print_r($feed);
	
	echo "</pre>";
	
	
	


?>
   <?php $i = 0;?>
	<?php foreach ($feed->get_items() as $item):?>
		
			
			<a href="<?php echo $item->get_permalink(); ?>" target="_blank">
			   <?php echo html_entity_decode($item->get_title()) ?>
			  
			  
			   
			</a>
			 <?php echo $item->get_date();?>
			<?php echo $item->get_description();?>
			
			
		
	 <?php endforeach;?>  