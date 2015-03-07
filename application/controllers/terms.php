<?php

class Terms extends Controller {
	
	function index()
	{
		
		$api = $this->loadModel('PagesApi');
		$helper = $this->loadHelper('Url_helper');
		$api->createrobots();
		$info = $api->getdomaininfo();
		$attr = $api->getattributes();
		
		$template = $this->loadView('pages/terms');
		$header = $this->loadView('pages/header');
		$footer = $this->loadView('pages/footer');
		
		
		$template->set('header', $header);
		$template->set('footer', $footer);
		$header->set('info', $info);
		$footer->set('info', $info);
		$header->set('attr', $attr);
		
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
    
}

?>