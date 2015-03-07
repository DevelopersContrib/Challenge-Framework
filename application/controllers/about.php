<?php

class About extends Controller {
	
	function index()
	{
		
		$api = $this->loadModel('PagesApi');
		$helper = $this->loadHelper('Url_helper');
		$api->createrobots();
		$info = $api->getdomaininfo();
		$info_attributes = $api->getattributes();
		
		$template = $this->loadView('pages/about_index');
		$header = $this->loadView('pages/header');
		$footer = $this->loadView('pages/footer');
		
		
		$template->set('header', $header);
		$template->set('footer', $footer);
		$header->set('info', $info);
		$footer->set('info', $info);
		//$header->set('attr', $attr);
		$header->set('info_attributes', $info_attributes);
		
		$template->set('info', $info);
		$template->set('domain_affiliate_link',$api->getaffiliatelink());
		$template->set('follow_count',$api->getleadscount());
		$template->set('roles',$roles);
		$template->set('intentions',$intentions);
		$template->set('industries',$industries);
		$template->set('experiences',$experiences);
		$template->set('formdata', $formdata);
		$template->set('footer_banner', $api->getbanner());
		$template->set('forsale', $api->getbanner());
		$template->set('base_url',$helper->base_url());
		$template->render();
	}
	
	function test(){
		//$template = $this->loadView('pages/test');
		//$template->set('test','1');		
		//$template->render();
		echo 'test';
	}
	
	function test2(){
		$api = $this->loadModel('PagesApi');
		$helper = $this->loadHelper('Url_helper');
		
		$info = $api->getdomaininfo();
		
		$template = $this->loadView('pages/test');
		$template->set('test','2');
		$template->set('info',$info);
		$template->render();
	}
	
	function test3(){
		$api = $this->loadModel('PagesApi');
		$helper = $this->loadHelper('Url_helper');
		
		$info_attributes = $api->getattributes();
		
		$template = $this->loadView('pages/test');
		$template->set('test','3');
		$template->set('info_attributes',$info_attributes);
		$template->render();
	}
    
}

?>