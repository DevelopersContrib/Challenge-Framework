<?php

class Challenge extends Controller {
	private  $api_url = "http://api2.contrib.co/request/";
    private $headers = array('Accept: application/json');
	
function createApiCall($url, $method, $headers, $data = array(),$user=null,$pass=null)
{
        if (($method == 'PUT') || ($method=='DELETE'))
        {
            $headers[] = 'X-HTTP-Method-Override: '.$method;
        }

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
        if ($user){
         curl_setopt($handle, CURLOPT_USERPWD, $user.':'.$pass);
        } 

        switch($method)
        {
            case 'GET':
                break;
            case 'POST':
                curl_setopt($handle, CURLOPT_POST, true);
                curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'PUT':
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'DELETE':
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
        }
        $response = curl_exec($handle);
        return $response;
}
	
function details()
	{
		$notfeatured = array();
		$counter = 0;
		$api = $this->loadModel('ApiModel');
		$helper = $this->loadHelper('Url_helper');
		$info = $api->getdomaininfo();
		$test = 0;
		$domain_id = $info['domainid'];
		$domain = $info['domain'];
		$key = md5('vnoc.com');
		$info_attributes = $api->getdomainattributes();
		$related_challenges = $api->getrelatedchallenges();
		$getnotfeatured = $api->getnotfeatured();
		$getrelateddomains = $api->getrelateddomains();
		$getfunding = $api->getfunding();
		//$feed = $api->rollingblog();
	    $featured_id = $helper->segment(3);
	   
	    $info_attributes3 = $this->api_url.'getFeaturedChallenge?domain='.$domain.'&key='.$key.'&featured_id='.$featured_id;
	    $result3 = $this->createApiCall($info_attributes3, 'GET', $this->headers, array());
    	$data_challenge = json_decode($result3,true);
  	
    
	  	if (isset($data_challenge['success'])){
	  		$getfeaturedchallenge = $data_challenge['data'][0];
	  	}else {
	  		$getfeaturedchallenge = array();
	  	}
	    
	  	
		//$getfeaturedchallenge = $api->getfeaturedchallenge();
		
		// echo '<pre>';
		// print_r($getfeaturedchallenge);
		// echo '</pre>';
		// die();
		
		$template = $this->loadView('details');
        $template->set('featured_id',$featured_id);
		$template->set('follow_count',$api->getleadscount());
		$template->set('info', $info);
		$template->set('test', $test);
		//$template->set('feed',$feed);
		$template->set('notfeatured',$notfeatured);
		$template->set('getfeaturedchallenge',$getfeaturedchallenge);
		$template->set('getrelateddomains',$getrelateddomains);
		$template->set('getnotfeatured',$getnotfeatured);
		$template->set('getfunding',$getfunding);
		$template->set('info_attributes',$info_attributes);
		$template->set('related_challenges',$related_challenges);
        $template->set('footer_banner', $api->getbanner());
        $template->set('cdiscussions', $api->getchallengediscussions());
		$template->render();
	}
	
	
}

?>