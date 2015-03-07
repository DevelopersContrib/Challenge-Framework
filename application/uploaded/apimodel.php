<?php
include("php_fast_cache.php");

class ApiModel extends Model {
	
	private $api_url = "http://api.contrib.com/request/";
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
	 	    $domain = "playerchat.com";	
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
	
	function getdomaininfo(){
		
        $cache = new phpFastCache();    
	    $info = $cache->get("index_domain_info_".$this->getdomain());
        
	    if($info == null) {
		    $info = array();
			$url = $this->api_url.'getdomaininfo?domain='.$this->getdomain().'&key='.$this->getkey();
		    $result = $this->createApiCall($url, 'GET', $this->headers, array());
		    $data_domain = json_decode($result,true);
	        
			
			  	$info['domainid'] = $data_domain[0]['DomainId'];
		    	$info['domain'] = $data_domain[0]['DomainName'];
		    	$info['memberid'] = $data_domain[0]['MemberId'];
		    	$info['title'] = $data_domain[0]['Title'];
		    	$info['logo'] = $data_domain[0]['Logo'];
		    	$info['description'] = $data_domain[0]['Description'];
		    	$info['account_ga'] = $data_domain[0]['AccountGA'];
		    	$info['description'] = stripslashes(str_replace('\n','<br>',$data_domain[0]['Description']));
			
	       $cache->set("index_domain_info_".$this->getdomain(), $info, 3600*24);
        }
        
		return $info;
   }
   
   function getdomainattributes(){
		
		$info_attributes = array();
		$info_attributes2 = $this->api_url.'getdomainattributes?domain='.$this->getdomain().'&key='.$this->getkey();
		
		$result = $this->createApiCall($info_attributes2, 'GET', $this->headers, array());
		$data_domain_attributes = json_decode($result,true);
	
		if(!$data_domain_attributes[0]['error']){		
				$info_attributes['allow_social_login'] = $data_domain_attributes[0]['allow_social_login'];
				$info_attributes['color'] = $data_domain_attributes[1]['template_color'];
				$info_attributes['intro_title']=  stripslashes($data_domain_attributes[2]['intro_title']);
				$info_attributes['intro_description'] =  stripslashes($data_domain_attributes[3]['intro_description']);
				$info_attributes['category'] = $data_domain_attributes[4]['category'];
				$info_attributes['header_script'] = html_entity_decode(base64_decode($data_domain_attributes[5]['header_script']));
				$info_attributes['custom_html'] = html_entity_decode(base64_decode($data_domain_attributes[6]['custom_html']));
				$info_attributes['descriptive_graphics_url'] =  $data_domain_attributes[7]['descriptive_graphics_url'];		
				$info_attributes['featured_challenge'] =  $data_domain_attributes[8]['featured_challenge'];
       
    	}
		return $info_attributes;
		
		
   
   }
   
   function getfeaturedid(){
   
		
		$info_attributes2 = $this->api_url.'getdomainattributes?domain='.$this->getdomain().'&key='.$this->getkey();
		
		$result = $this->createApiCall($info_attributes2, 'GET', $this->headers, array());
		$data_domain_attributes = json_decode($result,true);
		$feature_id =  $data_domain_attributes[8]['featured_challenge'];
       
		return $feature_id;
		
   
   }
   
   function gettest(){
		
			$info = array();
			$cat_id = 1;
			$limit = 10;
			//$url = $this->api_url.'getFeaturedChallenge?domain='.$this->getdomain().'&key='.$this->getkey();
			//$url2 = 'http://api.contrib.com/request/getnotFeaturedChallenge?domain=artdigest.com&key=5c1bde69a9e783c7edc2e603d8b25023';
			$url3 = $this->api_url.'getdomaininfo?domain='.$this->getdomain().'&key='.$this->getkey();
		    $result = $this->createApiCall($url3, 'GET', $this->headers, array());
		    $data_domain = json_decode($result,true);
	        
			
			return $data_domain;
		
		
   
   }
   
   function getfeaturedchallenge(){
   
		$info = array();
		$url = $this->api_url.'getFeaturedChallenge?domain='.$this->getdomain().'&key='.$this->getkey().'&featured_id='.$this->getfeaturedid();
		$result = $this->createApiCall($url, 'GET', $this->headers, array());
		$data_challenge = json_decode($result,true);
		
		$info['ChallengeId'] = $data_challenge[0]['ChallengeId'];
		$info['ChallengeTitle'] = $data_challenge[0]['ChallengeTitle'];
		$info['ChallengeDesc'] = $data_challenge[0]['ChallengeDesc'];
		$info['EquityPoints'] = $data_challenge[0]['EquityPoints'];
		$info['Slug'] = $data_challenge[0]['Slug'];
		$info['short_desc'] = $data_challenge[0]['short_desc'];
		$info['Photo'] = $data_challenge[0]['Photo'];
		$info['MoreDetails'] = $data_challenge[0]['MoreDetails'];
		$info['Submission_To'] = $data_challenge[0]['Submission_To'];
		$info['remaining_days'] = $data_challenge[0]['remaining_days'];

		return $info;
		
		
   }
   
   function getnotfeatured(){
		
		$info = array();
		$limit = 3;
		
		
		$url = $this->api_url.'getnotFeaturedChallenge?domain='.$this->getdomain().'&key='.$this->getkey().'&featured_id='.$this->getfeaturedid();
		$result = $this->createApiCall($url, 'GET', $this->headers, array());
		$featured_sites = json_decode($result,true);
		
		/*while($featured_sites == NULL){
			$featured_sites = json_decode($result,true);
		}*/
		
		if(!$featured_sites['error']){
			$counter = 0;
			while($counter < $limit){
				$featured_sites[$counter]['ChallengeId'] = $featured_sites[$counter]['ChallengeId'];
				$featured_sites[$counter]['ChallengeTitle'] = $featured_sites[$counter]['ChallengeTitle'];
				$featured_sites[$counter]['ChallengeDesc'] = $featured_sites[$counter]['ChallengeDesc'];
				$featured_sites[$counter]['EquityPoints'] = $featured_sites[$counter]['EquityPoints'];
				$featured_sites[$counter]['Slug'] = $featured_sites[$counter]['Slug'];
				$featured_sites[$counter]['short_desc'] = $featured_sites[$counter]['short_desc'];
				$featured_sites[$counter]['Photo'] = $featured_sites[$counter]['Photo'];
				$featured_sites[$counter]['MoreDetails'] = $featured_sites[$counter]['MoreDetails'];
				$featured_sites[$counter]['Submission_To'] = $featured_sites[$counter]['Submission_To'];
				$featured_sites[$counter]['remaining_days'] = $featured_sites[$counter]['remaining_days'];
				$counter++;
			}
		
		}
		 return $featured_sites;
   
   
   
   
   }
   
   function getrelatedchallenges($domain_id){
   
	 $limit = 10;
	 $categoryid = 1;
	 $info_attributes = array();
	 $url = $this->api_url.'getRelatedChallenges?domainid='.$domainid.'&key='.$this->getkey().'&count='.$limit.'&categoryid='.$categoryid;
   
	 $result = $this->createApiCall($url, 'GET', $this->headers, array());
	 $related_sites = json_decode($result,true);
   
   
		
	/*while ($related_sites == NULL){
        $related_sites = json_decode($result,true);
    }*/
				//var_dump($related_sites);
				//exit;
					
	if(!$related_sites['error']){
		$counter = 0;
		while($counter < $limit){
			$related_sites_list[$counter]['name'] = $related_sites[$counter]['DomainName'];
			$related_sites_list[$counter]['id'] = $related_sites[$counter]['DomainId'];
			$related_sites_list[$counter]['logo'] = $related_sites[$counter]['Logo'];
			$counter++;
		}
	}
	 return $related_sites_list;
   
   }
   
   function getmembersubmision($challenge_id){
		
		$info_member = array();
		$url = $this->api_url.'getChallengesubmissions?domain='.$this->getdomain().'&key='.$this->getkey().'&challenge_id='.$challenge_id;
		$result = $this->createApiCall($url, 'GET', $this->headers, array());
		$data_member = json_decode($result,true);
		
		$info_member['avatar'] =  $data_member[0]['profile_image'];
		$info_member['username'] = $data_member[0]['Username'];
		
		return $info_member;
		
   
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
