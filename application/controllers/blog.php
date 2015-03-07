<?php

class Blog extends Controller {

	private $ichallenge_feed_url = "http://ichallenge.com/feed/";
	
	function rollingblog(){
		
		$simplepie = $this->loadModel('ApiModel2');
		
		$feed = $simplepie->rollingblog();
		$template = $this->loadView('rollingblog');
		$template->set('feed',$feed);
		$template->render();
	
	
	}

}

?>