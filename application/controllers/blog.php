<?php

class Blog extends Controller {

	private $ichallenge_feed_url = "http://ichallenge.com/feed/";
	
    function index(){
		
		$api = $this->loadModel('ApiModel');
		$helper = $this->loadHelper('Url_helper');
		$info = $api->getdomaininfo();
		$info_attributes = $api->getdomainattributes();
    $featured_id = $api->getfeaturedid();	
		$template = $this->loadView('blog');
    $template->set('featured_id',$featured_id);
		$template->set('info',$info);
		$template->set('info_attributes',$info_attributes);
    $template->set('footer_banner', $api->getbanner());
    $template->set('micronews', $api->getmicronews());
    $template->set('f',$api->getfeaturedchallenge());
    $template->set('related',$api->getnotfeatured());
    $template->set('newsfeeds',$api->getnewsfeeds());
    $template->render();
	
	
	}
	
	function rollingblog(){
		
		$simplepie = $this->loadModel('ApiModel2');
		
		$feed = $simplepie->rollingblog();
		$template = $this->loadView('rollingblog');
		$template->set('feed',$feed);
		$template->render();
	
	
	}

}

?>