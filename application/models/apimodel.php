<?php
//include("php_fast_cache.php");
include("simplepie.php");

class ApiModel extends Model {
	
	private $api_url = "http://api.contrib.com/request/";
	private $ichallenge_feed_url = "http://ichallenge.com/feed/";
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
	
	 function getdomain(){
	 	if(defined('ENV')){
	 	    $domain = "octoberchallenge.com";	
	 	}else {
			$domain = $_SERVER["HTTP_HOST"]."".$_SERVER['REQUEST_URI'];//input sitename without www
	        $domain = $_SERVER["HTTP_HOST"];
	        $domain = str_replace("http://","",$domain);
	    	$domain = str_replace("www.","",$domain);
	 	}
    	return $domain;
	}

	function getkey(){
		return md5($this->getdomain());
	}
	
	function getaffiliatelink(){
		global $domain_affiliate_link;
        return $domain_affiliate_link;
	}
	
	function getdomaininfo(){		
		    global $domainid;
        global $domain_title;
        global $logo;
        global $description;
        global $account_ga;
      		global $domain;
          global $piwik_id;
			  	$info['domainid'] = $domainid;
		    	$info['domain'] = $domain;
		    	$info['title'] = $domain_title;
		    	$info['logo'] = $logo;
		    	$info['description'] = $description;
		    	$info['account_ga'] = $account_ga;
          $info['piwik_id'] = $piwik_id;
		    	$info['description'] = stripslashes(str_replace('\n','<br>',$info['description']));
		
		return $info;
		
      
   }
   
   function getdomainattributes(){
				
		global $allow_social_login;
		global $color;
		global $intro_title;
		global $intro_description;
		global $category;
		global $header_script;
		global $custom_html;
		global $descriptive_graphics_url;
		global $featured_challenge;
        
		    	
		    	
				
				
				$info_attributes['allow_social_login'] = $allow_social_login;
				$info_attributes['color'] = $color;
				$info_attributes['intro_title']=  stripslashes($intro_title);
				$info_attributes['intro_description'] =  stripslashes($intro_description);
				$info_attributes['category'] = $category;
				$info_attributes['header_script'] = html_entity_decode(base64_decode($header_script));
				$info_attributes['custom_html'] = html_entity_decode(base64_decode($custom_html));
				$info_attributes['descriptive_graphics_url'] =  $descriptive_graphics_url;		
				$info_attributes['featured_challenge'] =  $featured_challenge;
				
				
				if($info_attributes['color']=='' || $info_attributes['color'] == '{{COLOR}}')
				{
					$info_attributes['color']='blue';
				}
				if($info_attributes['allow_social_login']==''){ $info_attributes['allow_social_login']='0'; }
				if($info_attributes['intro_title']=='{{INTRO_TITLE}}'){ $info_attributes['intro_title']='Browse and Join Great Challenges'; }
				if($info_attributes['category']==''){ $info_attributes['category']='4'; }
				if($info_attributes['featured_challenge']==''){ $info_attributes['featured_challenge']='222'; }
    
       return $info_attributes;
		
		
   
   }
   
	function getjobsperdomain(){
		global $jobs;
		return $jobs;
	}
   
   function getfeaturedchallenge(){
   
   
   
		global $ChallengeId;
		global $ChallengeTitle;
		global $ChallengeDesc ;
		global	$EquityPoints ;
		global	$Slug ;
		global	$short_desc;
		global	$Photo;
		global	$MoreDetails;
		global	$Submission_To;
		global	$remaining_days;
		
		
		
		$info['ChallengeId'] = $ChallengeId;
		$info['ChallengeTitle'] = $ChallengeTitle;
		$info['ChallengeDesc'] =  $ChallengeDesc ;
		$info['EquityPoints'] = 	$EquityPoints ;
		$info['Slug'] = $Slug ;
		$info['short_desc'] = $short_desc;
		$info['Photo'] =$Photo;
		$info['MoreDetails'] = $MoreDetails;
		$info['Submission_To'] = $Submission_To;
		$info['remaining_days'] = $remaining_days;
		
		return $info;
   
		
		
   }
   
   function getnotfeatured(){
		
		global $not_featured;
		$not_featured_sites = $not_featured;
		
		return $not_featured_sites;
		
   }
   
   function getpartners(){
		global $partners;
		return $partners;
   }
   
   function getrelatedchallenges(){
   
	
	 
	 global $related_sites;
	 
	 $related_sites_list = $related_sites;
	 
	 return $related_sites_list;
   
   }
   
	function getleadscount(){
			$url = $this->api_url.'getdomainleadscount?domain='.$this->getdomain().'&key='.$this->getkey();
			$result = $this->createApiCall($url, 'GET', $this->headers, array());
			$data_follow_count = json_decode($result,true);
			 if ($data_follow_count['success']){
					$leads = ($data_follow_count['data']['leads'] + 1 ) * 25;
				}else {
					$leads = 1 * 25;
			}
	    return $leads;
	}
	
	
	function rollingblog(){
		
		$simplepie = new SimplePie();
		$simplepie->set_feed_url($this->ichallenge_feed_url);
		$simplepie->init();
		$simplepie->handle_content_type();
		$feed= $this->simplepie;
	
		return $simplepie;
	
	}
	
   function getbanner(){
     global $footer_banner;
		 return $footer_banner;
	}
   
   function createrobots(){
		//	generate robots.txt if not exist
		$filename = ROOT_DIR .'/robots.txt';
		//if(!(file_exists($filename))) {
		$my_file = ROOT_DIR .'/robots.txt';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
		$data = '---BEGIN ROBOTS.TXT ---
		User-Agent: *
		Disallow:
		
		Sitemap: http://'.$this->getdomain().'/sitemap
		--- END ROBOTS.TXT ----';
		fwrite($handle, $data);
	}
   
   
   
   
  
   
   
   
  
   
}
?>
