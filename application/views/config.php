<?php
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
   $api_url = "http://api2.contrib.co/request/";
   $headers = array('Accept: application/json');
   
if (!file_exists('config-framework.php')) {

     
    $file = file_get_contents('config-template.php');
    
    $domain = $_SERVER["HTTP_HOST"]."".$_SERVER['REQUEST_URI'];//input sitename without www
    //$domain = 'http://www.javapoint.com';
    
    if(stristr($domain, '~') ===FALSE) {
    	$domain = $_SERVER["HTTP_HOST"];
        $domain = str_replace("http://","",$domain);
    	$domain = str_replace("www.","",$domain);
    	$key = md5($domain);
    }else {
       $key = md5('vnoc.com');
       $d = explode('~',$domain);
       $user = str_replace('/','',$d[1]);
        $host = $_SERVER["HTTP_HOST"];
		$host = str_replace("http://","",$host);
		$host = str_replace("www.","",$host);
		$url = $api_url.'getdomainbyusername?username='.$user.'&key='.$key.'&host='.$host;
    
       $result =  createApiCall($url, 'GET', $headers, array());
       $data_domain = json_decode($result,true);
       $error = 0;
       $domain =   $data_domain[0]['domain'];
    	
    }
    
    $data_domain = NULL;
    
 
    while ($data_domain == NULL){
    
      $url = $api_url.'getdomaininfo?domain='.$domain.'&key='.$key;
      $result = createApiCall($url, 'GET', $headers, array());
      $data_domain = json_decode($result,true);
   } 

    	$domainid = $data_domain['data']['DomainId'];
    	$domainname = $data_domain['data']['DomainName'];
    	$memberid = $data_domain['data']['MemberId'];
    	$title = $data_domain['data']['Title'];
    	$logo = $data_domain['data']['Logo'];
    	$description = $data_domain['data']['Description'];
    	$account_ga = $data_domain['data']['AccountGA'];
    	$description = stripslashes(str_replace('\n','<br>',$description));
    	
	      $url2 = $api_url.'getdomainattributes?domain='.$domain.'&key='.$key;
	      $result2 = createApiCall($url2, 'GET', $headers, array());
	      $data_domain2 = json_decode($result2,true);
    	
	       

			$color = $data_domain2['data']['template_color'];
			$intro_title =  stripslashes($data_domain2['data']['intro_title']);
			$intro_description =  stripslashes($data_domain2['data']['intro_description']);
			$category = $data_domain2['data']['category'];	
			$featured_challenge = '';
			$featured_challenge =  $data_domain2['data']['featured_challenge'];
			
			if (isset($data_domain2['data']['background_url'])){
				$background_url = $data_domain2['data']['background_url'];
			}else {
				$background_url = "";
			}
			
			
			if($featured_challenge==''){ $featured_challenge='0'; }
			
		
	if ($featured_challenge != '0'){ 
  
    	$info_attributes3 = $api_url.'getFeaturedChallenge?domain='.$domain.'&key='.$key.'&featured_id='.$featured_challenge;
      $result3 = createApiCall($info_attributes3, 'GET', $headers, array());
    	$data_challenge = json_decode($result3,true);
  	
    
  	if (isset($data_challenge['success'])){
  		$featured_array = $data_challenge['data'];
  	}else {
  		$featured_array = array();
  	}
	
	}else {
     $featured_array = array();
  }
  
  
  
   	if ($featured_challenge != '0'){ 
	
    $info_attributes3 = $api_url.'GetChallengeLinks?domain='.$domain.'&key='.$key.'&featured_id='.$featured_challenge;
    $result3 = createApiCall($info_attributes3, 'GET', $headers, array());
	$data_link = json_decode($result3,true);
	
	if (isset($data_link['success'])){
		$link_array = $data_link['data'];
	}else {
		$link_array = array();
	}
  
  }else {
     $link_array = array();
  }
	
  
  
   	if ($featured_challenge != '0'){ 
	
    $info_attributes3 = $api_url.'GetChallengeRequirements?domain='.$domain.'&key='.$key.'&featured_id='.$featured_challenge;
    $result3 = createApiCall($info_attributes3, 'GET', $headers, array());
	$data_req = json_decode($result3,true);
	
	if (isset($data_req['success'])){
		$req_array = $data_req['data'];
	}else {
		$req_array = array();
	}
  
  }else {
     $req_array = array();
  }
  
  
  	if ($featured_challenge != '0'){ 
      $info_attributes3 = $api_url.'GetChallengeChallengers?domain='.$domain.'&key='.$key.'&featured_id='.$featured_challenge;
      $result3 = createApiCall($info_attributes3, 'GET', $headers, array());
    	$data_gers = json_decode($result3,true);
    	
    	if (isset($data_gers['success'])){
    		$gers_array = $data_gers['data'];
    	}else {
    		$gers_array = array();
    	}
	
  }else {
     $gers_array = array();
  
  }
  
  
  	if ($featured_challenge != '0'){
      $info_attributes3 = $api_url.'GetChallengeDiscussions?domain='.$domain.'&key='.$key.'&featured_id='.$featured_challenge;
      $result3 = createApiCall($info_attributes3, 'GET', $headers, array());
    	$data_dis = json_decode($result3,true);
    	
    	if (isset($data_dis['success'])){
    		$discussion_array = $data_dis['data'];
    	}else {
    		$discussion_array = array();
    	}
  
  }  else {
      $discussion_array = array();
  }
  
	
	
	//-----------------------------------------------------------------------------
	
	
		$url_notfeatured = $api_url.'getnotFeaturedChallenge?domain='.$domain.'&key='.$key.'&featured_id='.$featured_challenge;
		$result_notfeatured = createApiCall($url_notfeatured, 'GET', $headers, array());
		$not_featured_sites = json_decode($result_notfeatured,true);
		
	
		
			
		
			$limit = 4;
			$counter = 0;
			
			while($counter < $limit){
			
				$not_featured_sites2[$counter]['ChallengeId'] = $not_featured_sites['data'][$counter]['ChallengeId'];
				$not_featured_sites2[$counter]['ChallengeTitle'] = $not_featured_sites['data'][$counter]['ChallengeTitle'];
				$not_featured_sites2[$counter]['ChallengeDesc'] = $not_featured_sites['data'][$counter]['ChallengeDesc'];
				$not_featured_sites2[$counter]['EquityPoints'] = $not_featured_sites['data'][$counter]['EquityPoints'];
				$not_featured_sites2[$counter]['Slug'] = $not_featured_sites['data'][$counter]['Slug'];
				$not_featured_sites2[$counter]['short_desc'] = $not_featured_sites['data'][$counter]['short_desc'];
				$not_featured_sites2[$counter]['Photo'] = $not_featured_sites['data'][$counter]['Photo'];
				$not_featured_sites2[$counter]['MoreDetails'] = $not_featured_sites['data'][$counter]['MoreDetails'];
				$not_featured_sites2[$counter]['Submission_To'] = $not_featured_sites['data'][$counter]['Submission_To'];
				$not_featured_sites2[$counter]['remaining_days'] = $not_featured_sites['data'][$counter]['remaining_days'];
				$counter++;
			}
			
			
			
		
	
	//-----------------------------------------------------------------------------
	
	
	
	
		$limit_related_sites = 10;
			$categoryid_related_sites = 0;
		if($category == ""){
			$categoryid_related_sites = 1;
		}else{
			$categoryid_related_sites = $category;
		}
		$url_related_sites = $api_url.'getRelatedChallenges?domainid='.$domainid.'&key='.$key.'&count='.$limit_related_sites.'&categoryid='.$categoryid_related_sites;
		
		$result_related_sites = createApiCall($url_related_sites, 'GET', $headers, array());
		$related_sites = json_decode($result_related_sites,true);
		
	    if ((isset($related_sites['success'])) && (count($related_sites) > 0)){
		
		
			$counter = 0;
			$limit_related = 4;
			
			foreach($related_sites['data'] as $k=>$related){
				
				$related_sites2[$counter]['name'] = $related['DomainName'];
				$related_sites2[$counter]['id'] = $related['DomainId'];
				$related_sites2[$counter]['logo'] = $related['Logo'];
				$counter++;
			}
			
		
		
	}else{
	
		$related_sites2[0]['name'] = 'codechallenge.com';
		$related_sites2[0]['id'] = '';
		$related_sites2[0]['logo'] = 'http://d2qcctj8epnr7y.cloudfront.net/images/2013/logo-ichallenge1.png';
	
		$related_sites2[1]['name'] = 'echallenge.com';
		$related_sites2[1]['id'] = '';
		$related_sites2[1]['logo'] = 'http://contrib.com/uploads/logo/echallenge.png';
	
		$related_sites2[2]['name'] = 'filmchallenge.com';
		$related_sites2[2]['id'] = '';
		$related_sites2[2]['logo'] = 'http://d2qcctj8epnr7y.cloudfront.net/images/marvinpogi/logo-filmchallenge.png';
		
		$related_sites2[3]['name'] = 'healthchallenge.net';
		$related_sites2[3]['id'] = '';
		$related_sites2[3]['logo'] = 'http://d2qcctj8epnr7y.cloudfront.net/images/2013/logo-HealthChallenge2.png';
	}
	
	
	
	$url = $api_url.'getpartners?domain='.$domain.'&key='.$key;
	$result = createApiCall($url, 'GET', $headers, array());
	$partners_result = json_decode($result,true);
	if (count($partners_result) > 0){
		
		$partners = $partners_result;
	}else{
		$partners = array();
	}
	
	$url = $api_url.'getjobsperdomain?domain='.$domain.'&key='.$key;
	$result = createApiCall($url, 'GET', $headers, array());
	$jobs_array = json_decode($result,true);
	if (count($jobs_array) > 0){
		
		$jobs = $jobs_array;
	}else{
		$jobs = array();
	}
    
    //get domain affiliate id
    $url = $api_url.'getdomainaffiliateid?domain='.$domain.'&key='.$key;
    $result = createApiCall($url, 'GET', $headers, array());
    $data_domain_affiliate = json_decode($result,true);
    if ($data_domain_affiliate['success']){
    	$domain_affiliate_id = $data_domain_affiliate['affiliate_id'];
    }else {
    	$domain_affiliate_id = '391'; //contrib.com affiliate id
    }
    $domain_affiliate_link = 'http://referrals.contrib.com/idevaffiliate.php?id='.$domain_affiliate_id.'&url=http://www.contrib.com/signup/firststep?domain='.$domain;
    
  
   $url3 = $api_url.'GetPiwikId?domain='.$domain.'&key='.$key;
   $result3 = createApiCall($url3, 'GET', $headers, array());
   $data_domain3 = json_decode($result3,true);
   $piwik_id = $data_domain3['data']['idsite'];
     
     
    //get monetize ads from vnoc
    $url = $api_url.'getbannercode?d='.$domain.'&p=footer';
    $result = createApiCall($url, 'GET', $headers, array());
    $data_ads = json_decode($result,true);
    $footer_banner = html_entity_decode(base64_decode($data_ads['data']['content']));
	
   //get related domains
	$url = $api_url.'getrelateddomains?domain='.$domain.'&limit=15';
	$result = createApiCall($url, 'GET', $headers, array());
	$data_domains = json_decode($result,true);
	if ($data_domains['success']){
		$related_domains = $data_domains['data'];
	}
 
  //get fund campaigns
	$url = $api_url.'getfundcampaigns';
	$result = createApiCall($url, 'GET', $headers, array()); 
	$items = json_decode($result,true);
	if ($items['success']){
		$campaigns = $items['data'];
	}
     
	//get micronews
    $url = $api_url.'getmicronews?domain='.$domain.'&key='.$key.'&limit=3';
	$result = createApiCall($url, 'GET', $headers, array()); 
	$news = json_decode($result,true);
	if ($news['success']){
		$micronews = $news['data'];
	}
	
    //create file
  
   $file = str_replace('{{DOMAIN}}',$domain , $file);
   $file = str_replace('{{DOMAINID}}',$domainid , $file);
   $file = str_replace('{{MEMBER_ID}}',$memberid, $file);
   $file = str_replace('{{TITLE}}',$title, $file);
   $file = str_replace('{{LOGO}}',$logo, $file);
   $file = str_replace('{{DESCRIPTION}}',strip_tags($description), $file);
   $file = str_replace('{{ACCOUNT_GA}}',$account_ga, $file);
   $file = str_replace('{{PIWIK_ID}}',$piwik_id, $file);
  // $file = str_replace('{{SOCIAL_LOGIN}}',$allow_social_login,$file);
   $file = str_replace('{{COLOR}}',$color,$file);
   $file = str_replace('{{INTRO_TITLE}}',strip_tags($intro_title),$file);
   $file = str_replace('{{SMALL_DESCRIPTION}}',strip_tags($intro_description),$file);
   $file = str_replace('{{CATEGORYID}}',$category,$file);
   $file = str_replace('{{BACKGROUND_URL}}',$background_url,$file);
   $file = str_replace('{{FOOTER_BANNER}}',$footer_banner, $file);
  // $file = str_replace('{{HEADER_SCRIPT}}',$header_script,$file);
  // $file = str_replace('{{CUSTOM_HTML}}',$custom_html,$file);
  // $file = str_replace('{{DESC_GRAPHIC}}',$descriptive_graphics_url,$file);
   $file = str_replace('{{FEATURED_CHALLENGE}}',strip_tags($featured_challenge),$file);
   $file = str_replace('{{AFF_LINK}}',$domain_affiliate_link, $file);
   
   $file = str_replace('{{FEATUREDC}}',var_export($featured_array, true), $file);
   $file = str_replace('{{CDISCUSSIONS}}',var_export($discussion_array, true), $file);
   
   $file = str_replace('{{NOT_FEATURED_SITES}}',var_export($not_featured_sites2, true), $file);
   $file = str_replace('{{RELATED_SITES}}',var_export($related_sites2, true), $file);
   $file = str_replace('{{PARTNERS}}',var_export($partners, true), $file);
   $file = str_replace('{{JOBS}}',var_export($jobs, true), $file);
   $file = str_replace('{{RELATED_DOMAINS}}',var_export($related_domains, true), $file);
   $file = str_replace('{{FUND_CAMPAIGNS}}',var_export($campaigns, true), $file);
   $file = str_replace('{{MICRONEWS}}',var_export($micronews, true), $file);
   $file = str_replace('{{CLINKS}}',var_export($link_array, true), $file);
   $file = str_replace('{{CREQUIREMENTS}}',var_export($req_array, true), $file);
   $file = str_replace('{{CHALLENGERS}}',var_export($gers_array, true), $file);

   
  file_put_contents('config-framework.php', $file);
}

include "./config-framework.php";


  
	
if(defined('ENV'))
   //$config['base_url'] = 'http://localhost/challengenew/';
    $config['base_url'] = 'http://octoberchallenge.com/';
else
    $config['base_url']	= '/';

 // Base URL including trailing slash (e.g. http://localhost/)

$config['default_controller'] = 'home'; // Default controller to load
$config['error_controller'] = 'error'; // Controller used for errors (e.g. 404, 500 etc)

if(defined('ENV')){
	$config['db_host'] = ''; // Database host (e.g. localhost)
	$config['db_name'] = ''; // Database name
	$config['db_username'] = ''; // Database username
	$config['db_password'] = ''; // Database password
}else {
	$config['db_host'] = ''; // Database host (e.g. localhost)
	$config['db_name'] = ''; // Database name
	$config['db_username'] = ''; // Database username
	$config['db_password'] = ''; // Database password
}
?>