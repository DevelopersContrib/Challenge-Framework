<?php
//require_once("php_fast_cache.php");

class PagesApi extends Model {
	
	private $api_url = "http://api2.contrib.com/jobs/";
	private $api1 = "http://api.contrib.com/request/";
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
	 	
			$domain = $_SERVER["HTTP_HOST"]."".$_SERVER['REQUEST_URI'];//input sitename without www
	        if(stristr($domain,'~') ===FALSE) {
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
		       $result =  $this->createApiCall($url, 'GET', $this->headers, array());
		       $data_domain = json_decode($result,true);
		       $domain =   $data_domain['data']['domain'];		   
			}
			
	 	
		
		//$domain = 'referrals.com';
    	return $domain;
	}

	function getkey(){
		return md5($this->getdomain());
	}
	
	function getdomaininfo(){
		
        // $cache = new phpFastCache();    
	    // $info = $cache->get("index_domain_info_".$this->getdomain());
        
	    if($info == null) {
		    $info = array();
			$url = $this->api_url.'getdomaininfo?domain='.$this->getdomain().'&key='.$this->getkey();
		    $result = $this->createApiCall($url, 'GET', $this->headers, array());
		    $data_domain = json_decode($result,true);
	        
		    if ($data_domain['success']){	
			  	$info['domainid'] = $data_domain['data']['DomainId'];
		    	$info['domain'] = $data_domain['data']['DomainName'];
		    	$info['memberid'] = $data_domain['data']['MemberId'];
		    	$info['title'] = $data_domain['data']['Title'];
		    	$info['logo'] = $data_domain['data']['Logo'];
		    	$info['description'] = $data_domain['data']['Description'];
		    	$info['account_ga'] = $data_domain['data']['AccountGA'];
		    	$info['description'] = stripslashes(str_replace('\n','<br>',$info['description']));
			}
	        // $cache->set("index_domain_info_".$this->getdomain(), $info, 3600*24*7);
        }
        
		return $info;
   }
   
 
   
	
   
	function getattributes(){
		// $cache = new phpFastCache();    
	    // $info = $cache->get("index_domain_info_attr_".$this->getdomain());
        
	    if($info == null) {
		    $info = array();
			$url = $this->api_url.'getdomainattributes?domain='.$this->getdomain().'&key='.$this->getkey();
		    $result = $this->createApiCall($url, 'GET', $this->headers, array());
		    $data_domain = json_decode($result,true);
	        
		    if ($data_domain['success']){	
		    	
		    	$info['background_image'] = $data_domain['data']['background_image_url'];
    		   	$info['introduction'] = $data_domain['data']['introduction'];
    			$info['about'] = $data_domain['data']['about'];
    		    $info['forsale'] = $data_domain['data']['show_for_sale_banner'];
    		    $info['forsaletext'] = $data_domain['data']['for_sale_text'];
    	
    		    if($info['forsaletext']=='') $info['forsaletext'] = 'This domain belongs to the Global Ventures network. We have interesting opportunities for work, sponsors and partnerships.';
    		  
			}
	        // $cache->set("index_domain_info_attr_".$this->getdomain(), $info, 3600*24*7);
        }
       return $info;
   }
   
	function getbanner(){
		// $cache = new phpFastCache();    
	    // $banner = $cache->get("index_domain_info_banner_".$this->getdomain());
        
	    if($banner == null) {
		    $url = $this->api_url.'getbannercode?d='.$this->getdomain().'&p=footer';
		    $result = $this->createApiCall($url, 'GET', $this->headers, array());
		    $data_ads = json_decode($result,true);
            $banner = html_entity_decode(base64_decode($data_ads['data']['content']));
	        // $cache->set("index_domain_info_banner_".$this->getdomain(), $banner, 3600*24*7);
        }
        return $banner;
	}
   
	
	function getaffiliatelink(){
		// $cache = new phpFastCache();    
	    // $link = $cache->get("index_domain_info_link_".$this->getdomain());
        
	    if($link == null) {
		    
			$url = $this->api_url.'getdomainaffiliateid?domain='.$this->getdomain().'&key='.$this->getkey();
		    $result = $this->createApiCall($url, 'GET', $this->headers, array());
	        $data_domain_affiliate = json_decode($result,true);
		    if ($data_domain_affiliate['success']){
		    	$domain_affiliate_id = $data_domain_affiliate['data']['affiliate_id'];
		    }else {
		    	$domain_affiliate_id = '391'; //contrib.com affiliate id
		    }
		    
		    $link = 'http://referrals.contrib.com/idevaffiliate.php?id='.$domain_affiliate_id.'&url=http://www.contrib.com/signup/firststep?domain='.$this->getdomain();
            // $cache->set("index_domain_info_link_".$this->getdomain(), $link, 3600*24*7);
        }
        return $link;
	}
	
	function getwidgets($type){
		// $cache = new phpFastCache();    
	    // $widgets = $cache->get("index_domain_info_widgets".$type."_".$this->getdomain());
        
	    if($widgets == null) {
		    $url = $this->api_url.'getwidget?ma='.$type.'&key='.$this->getkey();
		    $result = $this->createApiCall($url, 'GET', $this->headers, array());
		    $widgets = json_decode($result,true);
            // $cache->set("index_domain_info_widgets".$type."_".$this->getdomain(), $widgets, 3600*24*7);
        }
        return $widgets;
	}
	
	function getsignupformdata(){
		
	    // $cache = new phpFastCache();    
	    // $forms = $cache->get("index_domain_info_forms_".$this->getdomain());
        
	    if($forms == null) {
		    $url = $this->api_url.'getsignupformdata';
		    $result = $this->createApiCall($url, 'GET', $this->headers, array());
		    $forms = json_decode($result,true);
            // $cache->set("index_domain_info_forms_".$this->getdomain(), $forms, 3600*24*7);
        }
        return $forms;
	}
   
	function getpartners(){
		// $cache = new phpFastCache();    
	    // $partners = $cache->get("index_domain_info_partners_".$this->getdomain());
        $domain_name = $this->getdomain();
		
	    if($partners == null) {
		    $url = $this->api_url.'getpartners?domain='.$domain_name.'&key='.$this->getkey();
		    $result = $this->createApiCall($url, 'GET', $this->headers, array());
		    $partners_result = json_decode($result,true);
		    $partners = array();  
	        if ($partners_result['success']){
		          $partners = $partners_result['data'];
	         }else{
				$partners = null;
			 }	
            // $cache->set("index_domain_info_partners_".$this->getdomain(), $partners, 3600*24*7);
        }
        return $partners;
	}
	
	function getjobsperdomain(){
		// $cache = new phpFastCache();   
		$domain_name = $this->getdomain();
		$url = 'http://api.contrib.com/request/getjobsperdomain?domain='.$domain_name;
		
		//$jobs = $cache->get("index_domain_info_jobs_".$this->getdomain());
		
		 if($jobs == null) {
			$result = $this->createApiCall($url, 'GET', $this->headers, array());
			$jobs = json_decode($result,true);
			if($jobs[0]['error']){
				return null;
			}else{
				// $cache->set("index_domain_info_jobs_".$this->getdomain(), $jobs, 3600*24*7);
			}
		}
		return $jobs;
	}
	
	function getTeamPerDomain(){
		// $cache = new phpFastCache();   
		$domain_name = $this->getdomain();
		$url = 'http://api.contrib.com/request/getTeamPerDomain?domain_name='.$domain_name.'&key='.$key;
		
		//$team_members = $cache->get("index_domain_info_team_".$this->getdomain());
		//if($team_members == null) {
			$result = $this->createApiCall($url, 'GET', $this->headers, array());
			$team_members = json_decode($result,true);
			if($team_members[0]['error']){
				return null;
			}else{
				// $cache->set("index_domain_info_team_".$this->getdomain(), $team_members, 3600*24*7);
			}
		//}
		return $team_members;
	}
	
	
	function getideasperdomain(){
		$cache = new phpFastCache();   
		$domain_name = $this->getdomain();
		$key = md5('vnoc.com');
		$url = 'http://api.contrib.com/request/getdomainideas?domain='.$domain_name.'&key='.$key;
		
		// $ideas = $cache->get("index_domain_info_ideas_".$this->getdomain());
		if($ideas == null) {
			$result = $this->createApiCall($url, 'GET', $this->headers, array());
			$ideas = json_decode($result,true);
			if($ideas[0]['error'] == true){
				return null;
			}else{
				// $cache->set("index_domain_info_team_".$this->getdomain(), $ideas, 3600*24*7);
			}
		}
		return $ideas;
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
	
	function getnewsfeed(){
		$key = md5('vnoc.com');
		$domain_name = $this->getdomain();
		//$domain_name = 'referrals.com';
		$url = 'http://api.contrib.com/request/getNewsFeed?domain='.$domain_name.'&key='.$key;
		$result = $this->createApiCall($url, 'GET', $this->headers, array());
		$newsfeed = json_decode($result,true);
		if($newsfeed[0]['error']){
			return null;
		}else{
			return $newsfeed;
		}
	}
	
	
	
	
	
	
	
	function getdomainfollowcount(){
		
		$domain_name = $this->getdomain();
		$key = md5('vnoc.com');
		$url = 'http://api.contrib.com/request/getdomainfollowcount?domain='.$domain_name.'&key='.$key;
		
		$result = $this->createApiCall($url, 'GET', $this->headers, array());
		$total = json_decode($result,true);
		if($total[0]['error'] == true){
			return null;
		}else{
			return $total[0]['total'];
		}
	}
	
	
	function getboardid(){
		$domain_name = $this->getdomain();
		$key = md5('vnoc.com');
		$url = 'http://api.contrib.com/request/getdiscussionbydomain?domain='.$domain_name.'&key='.$key;
		
		$result = $this->createApiCall($url, 'GET', $this->headers, array());
		$id = json_decode($result,true);
		if($id[0]['error'] == true){
			return null;
		}else{
			return $id[0]['discussion_id'];
		}
	}
	
	function getofferscount(){
		$domain_name = $this->getdomain();
		$key = md5('vnoc.com');
		$url = 'http://api.contrib.com/request/getOffersCount?domain='.$domain_name.'&key='.$key;
		
		$result = $this->createApiCall($url, 'GET', $this->headers, array());
		$offers = json_decode($result,true);
		if($offers[0]['error'] == true){
			return null;
		}else{
			return $offers[0]['count'];
		}
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
   
	function getfeatured(){
		// $cache = new phpFastCache();    
	    // $info = $cache->get("index_domain_challenge_feautured_".$this->getdomain());
        
	    if($info == null) {
		    $info = array();
			$url = $this->api_url.'getdomaininfo?domain='.$this->getdomain().'&key='.$this->getkey();
		    $result = $this->createApiCall($url, 'GET', $this->headers, array());
		    $data_domain = json_decode($result,true);
	        
			
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
				
	      // $cache->set("index_domain_challenge_feautured_".$this->getdomain(), $info, 3600*24);
        }
        
		return $info;
	}
	
	function getchallengeattributes(){
		// $cache = new phpFastCache();
		// $info = $cache->get("index_domain_challenge_feautured_".$this->getdomain());
		
		if($info == null){
			 $info = array();
			 $url = $this->api1.'getdomainattributes?domain='.$this->getdomain().'&key='.$this->getkey();
			 $result = $this->createApiCall($url, 'GET', $this->headers, array());
		     $data_domain = json_decode($result,true);
			 
			 
			 $info['allow_social'] = $data_domain['allow_social_login'];
			 $info['template_color'] = $data_domain['template_color'];
			 $info['intro_title'] = $data_domain['intro_title'];
			 $info['intro_description'] = $data_domain['intro_description'];
			 $info['category'] = $data_domain['category'];
			 $info['header_script'] = $data_domain['header_script'];
			 $info['custom_html'] = $data_domain['custom_html'];
			 $info['descriptive_graphics_url'] = $data_domain['descriptive_graphics_url'];
			 $info['featured_challenge'] = $data_domain['featured_challenge'];
			 
			 // $cache->set("index_domain_challenge_feautured_".$this->getdomain(), $info, 3600*24);
		}
		
		return $info;
	}
   
   
} //end of model
?>
