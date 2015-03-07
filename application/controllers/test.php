<?php

class Test extends Controller {
	
	function index()
	{
		
		$api = $this->loadModel('ApiModel2');
		$helper = $this->loadHelper('Url_helper');
		$getnotfeatured = $api->getnotfeatured();
		$template = $this->loadView('sheinatest');
		$template->set('getnotfeatured', $getnotfeatured);
		
		$template->render();
	}
    
}

?>
