<?php
//include("php_fast_cache.php");
//include("simplepie.php");

class ApiModel extends Model {
	
	private $api_url = "http://api2.contrib.co/request/";
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
          global $keywords;
          		$info['keywords'] = $keywords;
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
		global $background_url;
        
		    	
		    	
				
				
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
                $info_attributes['background_url'] =  $background_url;
				
       return $info_attributes;
		
		
   
   }
   
	function getjobsperdomain(){
		global $jobs;
		return $jobs;
	}
   
   function getfeaturedchallenge(){
   
   
   
		global $featuredc;
		global $clinks ;
		global $crequirements;
    global $challengers;
		
		$info['ChallengeId'] = $featuredc[0]['ChallengeId'];
		$info['ChallengeTitle'] = $featuredc[0]['ChallengeTitle'];
		$info['ChallengeDesc'] =  $featuredc[0]['ChallengeDesc'];
		$info['EquityPoints'] =  $featuredc[0]['EquityPoints'];
		$info['Slug'] = $featuredc[0]['Slug'];
		$info['short_desc'] = $featuredc[0]['short_desc'];
		$info['Photo'] = $featuredc[0]['Photo'];
		$info['MoreDetails'] = $featuredc[0]['MoreDetails'];
		$info['Submission_To'] = $featuredc[0]['Submission_To'];
		$info['remaining_days'] = $featuredc[0]['remaining_days'];
		$info['PrizeDescription'] = $featuredc[0]['PrizeDescription'];
		$info['Judging_From'] = $featuredc[0]['Judging_From'];
		$info['Judging_To'] = $featuredc[0]['Judging_To'];
		$info['Submission_From'] = $featuredc[0]['Submission_From'];
		$info['Winners_Announced'] = $featuredc[0]['Winners_Announced'];
		$info['CriteriaDescription'] = $featuredc[0]['CriteriaDescription'];
		$info['participants'] = $featuredc[0]['participants'];
		$info['HowToDesc'] = $featuredc[0]['HowToDesc'];
		$info['HashTag'] = $featuredc[0]['HashTag'];
		$info['DaysRequired'] = $featuredc[0]['DaysRequired'];
		$info['Links'] = $clinks;
		
		$info_attributes3 = $this->api_url.'GetChallengeRequirements?domain='.$this->getdomain().'&key='.$this->getkey().'&featured_id='.$featuredc[0]['ChallengeId'];
		
		$result3 = $this->createApiCall($info_attributes3, 'GET', $this->headers, array());
		
		$crequirements = json_decode($result3,true);
		
		
		$info['Requirements'] = $crequirements['data'];
    $info['Challengers'] = $challengers;
		
		
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
		    $url = $this->api_url.'Getdomainleadscount?domain='.$this->getdomain().'&key='.$this->getkey();
			$result = $this->createApiCall($url, 'GET', $this->headers, array());
			$data_follow_count = json_decode($result,true);
			if (!$data_follow_count['error'])
		       {
		       	$follow_count = ($data_follow_count['data']['leads'] + 1 ) * 25;
		       }else {
		       	$follow_count = 1 * 25;
		     }
	      return $follow_count;
	}
	
	
	/*function rollingblog(){
		
		$simplepie = new SimplePie();
		$simplepie->set_feed_url($this->ichallenge_feed_url);
		$simplepie->init();
		$simplepie->handle_content_type();
		$feed= $this->simplepie;
	
		return $simplepie;
	
	}*/
	
   function getbanner(){
     global $footer_banner;
		 return $footer_banner;
	}
	
	function getrelateddomains(){
		
		global $related_domains;
		$domain_verticals = $related_domains;
		
		return $domain_verticals;
		
	
	
	}
	
	function getfunding(){
		
		global $fund_campaigns;
		$campains = $fund_campaigns;
		return $campains;
		
	}
	
	function getmicronews(){
		global $micronews;
		return $micronews;
	}
   
	function getnewsfeeds(){
	     $url = $this->api_url.'getnewsfeed?domain='.$this->getdomain().'&key='.$this->getkey().'&limit=3';
         $result =  $this->createApiCall($url, 'GET', $this->headers, array());
    	 $newfeed = json_decode($result,true);
    	 if ((isset($newfeed['success'])) && (count($newfeed['data'])>0)){
    	 	$info = $newfeed['data'];
    	 }else {
    	 	$info = array();
    	 }
    	 
    	  return $info;
	}
	
    function getchallengediscussions(){
		global $cdiscussions;
		return $cdiscussions;
	}
  
  function getfeaturedid(){
         global $featured_challenge;
         return $featured_challenge;
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
