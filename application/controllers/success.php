<?php

class Success extends Controller {
	
	function index()
	{
		$api = $this->loadModel('ApiModel');
		$helper = $this->loadHelper('Url_helper');
		$email = base64_decode($helper->segment(3));
		$info = $api->getdomaininfo();
		$template = $this->loadView('success');
		$template->set('follow_count',$api->getleadscount());
		$template->set('info',$info);
		$template->set('email',$email);
        $template->render();
	
	}
	
   function exists()
	{
		$api = $this->loadModel('ApiModel');
		$helper = $this->loadHelper('Url_helper');
		$email = base64_decode($helper->segment(3));
		$info = $api->getdomaininfo();
		$template = $this->loadView('success-exist');
		$template->set('info',$info);
		$template->set('email',$email);
        $template->render();
	
	}
	
	
}

?>