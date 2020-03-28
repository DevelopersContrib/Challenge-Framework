<?php
function api_getdomaininfo($domain){
	global $api_url;
	$url = $api_url.'getdomaininfo?';
   	   $fields_string = "";
	   $fields = array(
		            'domain'=>urlencode($domain)
		           
		        );
		
		foreach($fields as $key=>$value) 
		 { 
		 	$fields_string .= $key.'='.$value.'&'; 
		 }
		rtrim($fields_string,'&');
		
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url."".$fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		
	   return json_decode($result);
}

function api_getchallengeinfo($domainid){
	global $api_url;
	$url = $api_url.'getchallengeinfo?';
   	   $fields_string = "";
	   $fields = array(
		            'domainid'=>urlencode($domainid)
		        );
		
		foreach($fields as $key=>$value) 
		 { 
		 	$fields_string .= $key.'='.$value.'&'; 
		 }
		rtrim($fields_string,'&');
		
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url."".$fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		
		curl_close($ch);
	    return json_decode($result);
}